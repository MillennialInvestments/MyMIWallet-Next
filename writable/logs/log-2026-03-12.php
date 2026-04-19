<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [REQUEST][END]
INFO - 2026-03-12 00:00:01 --> [REQ_ID=bf3a4c2300ed] [PERF] Execution time=0.050361
DEBUG - 2026-03-12 00:01:22 --> [REQ_ID=cdc801e95afd] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:06:22 --> [REQ_ID=3dda909f6da0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [REQUEST][START] GET /
DEBUG - 2026-03-12 00:06:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [FILTER_BEFORE] /
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 00:06:37 --> [CSRF] token name=csrf_test_name hash=a0de1c1ae80fa2f8a1e0c417185b64a4
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 00:06:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 00:06:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 00:06:37 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 00:06:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [FILTER_AFTER]
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [LIFECYCLE][END] status=200 duration_ms=630.41 memory_delta=4194304
INFO - 2026-03-12 00:06:37 --> [REQ_ID=057567ea957a] [PERF] Execution time=0.628482
DEBUG - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [REQUEST][END]
INFO - 2026-03-12 00:06:37 --> [REQ_ID=9207a8f5dcc9] [PERF] Execution time=0.649178
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 00:06:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 00:06:38 --> [CSRF] token name=csrf_test_name hash=3fe52b596f437a1dc324615c55277ecb
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=b906a3b1f626] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 00:06:38 --> [REQ_ID=b906a3b1f626] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=b906a3b1f626] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-12 00:06:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 00:06:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 00:06:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 00:06:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 00:06:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 00:06:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 00:06:38 --> [REQ_ID=b906a3b1f626] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 00:06:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 00:06:38 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [FILTER_AFTER]
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [LIFECYCLE][END] status=200 duration_ms=538.02 memory_delta=2097152
INFO - 2026-03-12 00:06:38 --> [REQ_ID=b906a3b1f626] [PERF] Execution time=0.537791
DEBUG - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [REQUEST][END]
INFO - 2026-03-12 00:06:38 --> [REQ_ID=c7ec80397f57] [PERF] Execution time=0.551279
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=e88c69a9ec7a] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 00:06:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=e88c69a9ec7a] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=e88c69a9ec7a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=e88c69a9ec7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 00:06:39 --> [CSRF] token name=csrf_test_name hash=555d20782f54607472fd94f8969a4163
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=56f8cf6ff84c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 00:06:39 --> [REQ_ID=56f8cf6ff84c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=56f8cf6ff84c] [METHOD_ENTRY] show
DEBUG - 2026-03-12 00:06:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 00:06:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 00:06:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 00:06:39 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-12 00:06:39 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:06:39 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:06:39 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-12 00:06:39 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-12 00:06:39 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 00:06:39 --> [REQ_ID=56f8cf6ff84c] [PERF] Execution time=0.032117
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 00:06:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 00:06:39 --> [CSRF] token name=csrf_test_name hash=392284ccc32050450b31043b55ecdfae
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=c38a98babbc2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 00:06:39 --> [REQ_ID=c38a98babbc2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=c38a98babbc2] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-12 00:06:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 00:06:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 00:06:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 00:06:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 00:06:39 --> [REQ_ID=c38a98babbc2] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 00:06:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 00:06:39 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [FILTER_AFTER]
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [LIFECYCLE][END] status=200 duration_ms=539.14 memory_delta=4194304
INFO - 2026-03-12 00:06:39 --> [REQ_ID=c38a98babbc2] [PERF] Execution time=0.539192
DEBUG - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [REQUEST][END]
INFO - 2026-03-12 00:06:39 --> [REQ_ID=ee574b5eaf43] [PERF] Execution time=0.548578
DEBUG - 2026-03-12 00:08:59 --> [REQ_ID=70cab3937c6b] [REQUEST][START] GET /index.php/Apex/Referral
DEBUG - 2026-03-12 00:08:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:08:59 --> [REQ_ID=70cab3937c6b] [REQUEST][END]
INFO - 2026-03-12 00:08:59 --> [REQ_ID=70cab3937c6b] [PERF] Execution time=0.040595
DEBUG - 2026-03-12 00:11:22 --> [REQ_ID=a9418707f392] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [REQUEST][END]
INFO - 2026-03-12 00:15:01 --> [REQ_ID=53efb127802b] [PERF] Execution time=0.045437
DEBUG - 2026-03-12 00:16:22 --> [REQ_ID=02aea5910615] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:21:22 --> [REQ_ID=6b9a7be36670] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:26:22 --> [REQ_ID=9cdda0147c52] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:31:22 --> [REQ_ID=82a6bec1ceae] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:36:22 --> [REQ_ID=deec7a0fec1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:41:22 --> [REQ_ID=584a796d4e0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:46:22 --> [REQ_ID=3218d716f88b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:51:22 --> [REQ_ID=5d8a06cde435] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 00:56:22 --> [REQ_ID=13b4dd13ab33] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 00:56:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 00:56:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 00:56:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:00:01 --> [REQ_ID=b915c4dd088a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:00:02 --> [REQ_ID=b915c4dd088a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 01:00:02 --> [REQ_ID=b915c4dd088a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 01:00:02 --> [REQ_ID=b915c4dd088a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 01:00:02 --> [REQ_ID=b915c4dd088a] [REQUEST][END]
INFO - 2026-03-12 01:00:02 --> [REQ_ID=b915c4dd088a] [PERF] Execution time=0.117215
DEBUG - 2026-03-12 01:01:22 --> [REQ_ID=8cd3c39d6f83] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:06:22 --> [REQ_ID=48e7345dc141] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:11:22 --> [REQ_ID=23178b35c5f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [REQUEST][END]
INFO - 2026-03-12 01:15:01 --> [REQ_ID=99e14329f714] [PERF] Execution time=0.046275
DEBUG - 2026-03-12 01:16:22 --> [REQ_ID=2f33ad76beb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:21:22 --> [REQ_ID=ae391a87403a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:21:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:26:22 --> [REQ_ID=26a35bf48d8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-12 01:27:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-12 01:27:45 --> [CSRF] token name=csrf_test_name hash=053198bf61616e9f3f080990f69cf18f
DEBUG - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [REQUEST][END]
INFO - 2026-03-12 01:27:45 --> [REQ_ID=da815ee7e24c] [PERF] Execution time=0.055025
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 01:27:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 01:27:46 --> [CSRF] token name=csrf_test_name hash=eb2901d55ae2f678e70d700e38d5618c
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=0a13a9d2f170] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 01:27:46 --> [REQ_ID=0a13a9d2f170] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [FILTER_AFTER]
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [LIFECYCLE][END] status=200 duration_ms=71.13 memory_delta=0
INFO - 2026-03-12 01:27:46 --> [REQ_ID=0a13a9d2f170] [PERF] Execution time=0.070893
DEBUG - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [REQUEST][END]
INFO - 2026-03-12 01:27:46 --> [REQ_ID=9a4c80f5185f] [PERF] Execution time=0.083028
DEBUG - 2026-03-12 01:31:22 --> [REQ_ID=10741e8a92d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:36:22 --> [REQ_ID=d9c40b051b61] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:41:22 --> [REQ_ID=40aef9ceffc9] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:46:22 --> [REQ_ID=7d63be32cd1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=ddd5f62c6f7e] [REQUEST][START] GET /
DEBUG - 2026-03-12 01:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=ddd5f62c6f7e] [FILTER_BEFORE] /
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=ddd5f62c6f7e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=ddd5f62c6f7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 01:48:58 --> [CSRF] token name=csrf_test_name hash=02339a9c0aa0ea8987cc97ab23c1bfd2
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=42d344b3b25f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 01:48:58 --> [REQ_ID=42d344b3b25f] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 01:48:58 --> [REQ_ID=42d344b3b25f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 01:48:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 01:48:58 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 01:48:58 --> [REQ_ID=42d344b3b25f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 01:48:58 --> [REQ_ID=42d344b3b25f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 01:48:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 01:48:59 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 01:48:59 --> [REQ_ID=ddd5f62c6f7e] [FILTER_AFTER]
DEBUG - 2026-03-12 01:48:59 --> [REQ_ID=ddd5f62c6f7e] [LIFECYCLE][END] status=200 duration_ms=655.41 memory_delta=4194304
INFO - 2026-03-12 01:48:59 --> [REQ_ID=42d344b3b25f] [PERF] Execution time=0.651779
DEBUG - 2026-03-12 01:48:59 --> [REQ_ID=ddd5f62c6f7e] [REQUEST][END]
INFO - 2026-03-12 01:48:59 --> [REQ_ID=ddd5f62c6f7e] [PERF] Execution time=0.704017
DEBUG - 2026-03-12 01:51:22 --> [REQ_ID=5e0d3e63440d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:56:22 --> [REQ_ID=4a46daf9c1a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [REQUEST][START] GET /
DEBUG - 2026-03-12 01:57:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [FILTER_BEFORE] /
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 01:57:05 --> [CSRF] token name=csrf_test_name hash=553f6d3db9c340d10bfc43a4963211d4
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 01:57:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 01:57:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 01:57:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 01:57:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [FILTER_AFTER]
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [LIFECYCLE][END] status=200 duration_ms=799.99 memory_delta=4194304
INFO - 2026-03-12 01:57:05 --> [REQ_ID=8df67774ae70] [PERF] Execution time=0.798053
DEBUG - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [REQUEST][END]
INFO - 2026-03-12 01:57:05 --> [REQ_ID=24264ddc228c] [PERF] Execution time=0.818619
DEBUG - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [REQUEST][END]
INFO - 2026-03-12 02:00:02 --> [REQ_ID=7ddffb7f6a9d] [PERF] Execution time=0.047512
DEBUG - 2026-03-12 02:01:22 --> [REQ_ID=b1173c1ff3c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:06:22 --> [REQ_ID=8ca98827ff7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:11:22 --> [REQ_ID=377f4396c9c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=ca3e4c7ca576] [REQUEST][START] GET /
DEBUG - 2026-03-12 02:14:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=ca3e4c7ca576] [FILTER_BEFORE] /
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=ca3e4c7ca576] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=ca3e4c7ca576] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 02:14:40 --> [CSRF] token name=csrf_test_name hash=32f0e0318eb9273a15cacff4300565d5
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=25e250f13b69] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 02:14:40 --> [REQ_ID=25e250f13b69] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 02:14:40 --> [REQ_ID=25e250f13b69] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 02:14:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:14:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 02:14:40 --> [REQ_ID=25e250f13b69] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 02:14:40 --> [REQ_ID=25e250f13b69] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 02:14:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 02:14:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 02:14:41 --> [REQ_ID=ca3e4c7ca576] [FILTER_AFTER]
DEBUG - 2026-03-12 02:14:41 --> [REQ_ID=ca3e4c7ca576] [LIFECYCLE][END] status=200 duration_ms=599.24 memory_delta=4194304
INFO - 2026-03-12 02:14:41 --> [REQ_ID=25e250f13b69] [PERF] Execution time=0.597179
DEBUG - 2026-03-12 02:14:41 --> [REQ_ID=ca3e4c7ca576] [REQUEST][END]
INFO - 2026-03-12 02:14:41 --> [REQ_ID=ca3e4c7ca576] [PERF] Execution time=0.638759
DEBUG - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [REQUEST][END]
INFO - 2026-03-12 02:15:01 --> [REQ_ID=6706da192b06] [PERF] Execution time=0.017986
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [REQUEST][START] GET /index.php/Knowledgebase/Integrating-Wallets
DEBUG - 2026-03-12 02:15:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [FILTER_BEFORE] /index.php/Knowledgebase/Integrating-Wallets
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=integratingWallets
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Integrating-Wallets
DEBUG - 2026-03-12 02:15:25 --> [CSRF] token name=csrf_test_name hash=d8d8be2c6bfc0dc9998022372b8c0752
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [REQUEST][END]
INFO - 2026-03-12 02:15:25 --> [REQ_ID=d2248271ab1a] [PERF] Execution time=0.016564
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=98232ad53e74] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:15:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=98232ad53e74] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=98232ad53e74] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=98232ad53e74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:15:25 --> [CSRF] token name=csrf_test_name hash=f7e4b02ce2f4472b350a7f7015160e2d
DEBUG - 2026-03-12 02:15:25 --> [REQ_ID=e64e4537048b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:15:25 --> [REQ_ID=e64e4537048b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:15:26 --> [REQ_ID=98232ad53e74] [FILTER_AFTER]
DEBUG - 2026-03-12 02:15:26 --> [REQ_ID=98232ad53e74] [LIFECYCLE][END] status=200 duration_ms=126.18 memory_delta=0
INFO - 2026-03-12 02:15:26 --> [REQ_ID=e64e4537048b] [PERF] Execution time=0.124752
DEBUG - 2026-03-12 02:15:26 --> [REQ_ID=98232ad53e74] [REQUEST][END]
INFO - 2026-03-12 02:15:26 --> [REQ_ID=98232ad53e74] [PERF] Execution time=0.138570
DEBUG - 2026-03-12 02:16:22 --> [REQ_ID=9db72d261756] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [REQUEST][START] GET /
DEBUG - 2026-03-12 02:18:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [FILTER_BEFORE] /
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 02:18:25 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 02:18:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:18:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 02:18:25 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 02:18:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [FILTER_AFTER]
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [LIFECYCLE][END] status=200 duration_ms=664.97 memory_delta=4194304
INFO - 2026-03-12 02:18:25 --> [REQ_ID=5a76f9d1ae4f] [PERF] Execution time=0.662693
DEBUG - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [REQUEST][END]
INFO - 2026-03-12 02:18:25 --> [REQ_ID=733dcf0e6ddd] [PERF] Execution time=0.704901
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=f318f87a045c] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 02:18:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=f318f87a045c] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=f318f87a045c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=f318f87a045c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 02:18:26 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=bb783e05a644] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 02:18:26 --> [REQ_ID=bb783e05a644] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 02:18:26 --> [REQ_ID=bb783e05a644] [METHOD_ENTRY] show
DEBUG - 2026-03-12 02:18:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:18:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:18:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:18:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:18:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:18:26 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 02:18:26 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 02:18:26 --> [REQ_ID=bb783e05a644] [PERF] Execution time=0.055448
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-12 02:18:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-12 02:18:27 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [REQUEST][END]
INFO - 2026-03-12 02:18:27 --> [REQ_ID=750fbc9b5248] [PERF] Execution time=0.014486
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:18:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:18:27 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=883392e21574] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:18:27 --> [REQ_ID=883392e21574] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [FILTER_AFTER]
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [LIFECYCLE][END] status=200 duration_ms=18.64 memory_delta=0
INFO - 2026-03-12 02:18:27 --> [REQ_ID=883392e21574] [PERF] Execution time=0.018289
DEBUG - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [REQUEST][END]
INFO - 2026-03-12 02:18:27 --> [REQ_ID=c009b0c5e6d0] [PERF] Execution time=0.029877
DEBUG - 2026-03-12 02:18:28 --> [REQ_ID=1e715919ee9c] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 02:18:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:28 --> [REQ_ID=1e715919ee9c] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 02:18:28 --> [REQ_ID=1e715919ee9c] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 02:18:28 --> [REQ_ID=1e715919ee9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 02:18:28 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:28 --> [REQ_ID=75e90e840adf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:18:28 --> [REQ_ID=75e90e840adf] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 02:18:28 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 02:18:28 --> [REQ_ID=75e90e840adf] [PERF] Execution time=0.019904
DEBUG - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 02:18:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 02:18:29 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [REQUEST][END]
INFO - 2026-03-12 02:18:29 --> [REQ_ID=a9b57b7d8331] [PERF] Execution time=0.009019
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:18:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:18:30 --> [CSRF] token name=csrf_test_name hash=3997852a95b1e64f8a26dee9a19b1c6c
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=e1f0894a9869] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:18:30 --> [REQ_ID=e1f0894a9869] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [FILTER_AFTER]
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [LIFECYCLE][END] status=200 duration_ms=16.45 memory_delta=0
INFO - 2026-03-12 02:18:30 --> [REQ_ID=e1f0894a9869] [PERF] Execution time=0.016294
DEBUG - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [REQUEST][END]
INFO - 2026-03-12 02:18:30 --> [REQ_ID=50159596bcdf] [PERF] Execution time=0.026355
DEBUG - 2026-03-12 02:21:22 --> [REQ_ID=92db6fc2fbf4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:26:22 --> [REQ_ID=4d09edfe6b7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:31:22 --> [REQ_ID=d43d2b7537e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:36:22 --> [REQ_ID=89613dfd55a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:41:22 --> [REQ_ID=70e47839e087] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:44:52 --> [REQ_ID=0d610b380f04] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-12 02:44:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:44:52 --> [REQ_ID=0d610b380f04] [REQUEST][END]
INFO - 2026-03-12 02:44:52 --> [REQ_ID=0d610b380f04] [PERF] Execution time=0.043936
DEBUG - 2026-03-12 02:45:58 --> [REQ_ID=4e4fe776658a] [REQUEST][START] GET /
DEBUG - 2026-03-12 02:45:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:45:58 --> [REQ_ID=4e4fe776658a] [FILTER_BEFORE] /
DEBUG - 2026-03-12 02:45:58 --> [REQ_ID=4e4fe776658a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 02:45:58 --> [REQ_ID=4e4fe776658a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 02:45:58 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:45:58 --> [REQ_ID=c39d5f7052e8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 02:45:58 --> [REQ_ID=c39d5f7052e8] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 02:45:58 --> [REQ_ID=c39d5f7052e8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 02:45:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:45:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 02:45:59 --> [REQ_ID=c39d5f7052e8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 02:45:59 --> [REQ_ID=c39d5f7052e8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 02:45:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 02:45:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 02:45:59 --> [REQ_ID=4e4fe776658a] [FILTER_AFTER]
DEBUG - 2026-03-12 02:45:59 --> [REQ_ID=4e4fe776658a] [LIFECYCLE][END] status=200 duration_ms=616.31 memory_delta=4194304
INFO - 2026-03-12 02:45:59 --> [REQ_ID=c39d5f7052e8] [PERF] Execution time=0.614377
DEBUG - 2026-03-12 02:45:59 --> [REQ_ID=4e4fe776658a] [REQUEST][END]
INFO - 2026-03-12 02:45:59 --> [REQ_ID=4e4fe776658a] [PERF] Execution time=0.654733
DEBUG - 2026-03-12 02:46:03 --> [REQ_ID=e5695bbc895a] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 02:46:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:03 --> [REQ_ID=e5695bbc895a] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 02:46:03 --> [REQ_ID=e5695bbc895a] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 02:46:03 --> [REQ_ID=e5695bbc895a] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 02:46:03 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
INFO - 2026-03-12 02:46:03 --> CSRF token verified.
DEBUG - 2026-03-12 02:46:03 --> [REQ_ID=bf9a0ac1ed87] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 02:46:03 --> [REQ_ID=bf9a0ac1ed87] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 02:46:03 --> [REGISTRATION] Submission received
INFO - 2026-03-12 02:46:03 --> MailService queued email
INFO - 2026-03-12 02:46:03 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 02:46:03 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 02:46:03 --> Registration created user_id=11715, email=hammondcourtney@hotmail.com, username=AHOaEtUitKhgbqrjdvVaYEY, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 02:46:03 --> [REGISTRATION] User record created
INFO - 2026-03-12 02:46:03 --> OnboardingProgressService: created onboarding record for user_id=11715
INFO - 2026-03-12 02:46:04 --> Registration succeeded for hammondcourtney@hotmail.com (event 2ca2cdb5f5500aac)
INFO - 2026-03-12 02:46:04 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 02:46:04 --> Registration redirecting to success guide for user_id=11715
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=e5695bbc895a] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=e5695bbc895a] [LIFECYCLE][END] status=303 duration_ms=1,116.85 memory_delta=0
INFO - 2026-03-12 02:46:04 --> [REQ_ID=bf9a0ac1ed87] [PERF] Execution time=1.116392
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=e5695bbc895a] [REQUEST][END]
INFO - 2026-03-12 02:46:04 --> [REQ_ID=e5695bbc895a] [PERF] Execution time=1.130115
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=49934c3a93c8] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 02:46:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=49934c3a93c8] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=49934c3a93c8] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=49934c3a93c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 02:46:04 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:04 --> [REQ_ID=adc7908d5754] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:46:04 --> [REQ_ID=adc7908d5754] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 02:46:05 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 02:46:05 --> [REQ_ID=adc7908d5754] [PERF] Execution time=0.012104
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=d423aa13b25d] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 02:46:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=d423aa13b25d] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=d423aa13b25d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=d423aa13b25d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 02:46:18 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=13315de58c6b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 02:46:18 --> [REQ_ID=13315de58c6b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:18 --> [REQ_ID=13315de58c6b] [METHOD_ENTRY] show
DEBUG - 2026-03-12 02:46:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:46:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:46:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:46:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:46:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:46:18 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 02:46:18 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 02:46:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:46:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:46:18 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 02:46:18 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 02:46:18 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 02:46:18 --> [REQ_ID=13315de58c6b] [PERF] Execution time=0.059984
DEBUG - 2026-03-12 02:46:22 --> [REQ_ID=234bdf9e9226] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=259391eabb6d] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 02:46:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=259391eabb6d] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=259391eabb6d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=259391eabb6d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 02:46:23 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=4f8cc197041d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 02:46:23 --> [REQ_ID=4f8cc197041d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:23 --> [REQ_ID=4f8cc197041d] [METHOD_ENTRY] show
DEBUG - 2026-03-12 02:46:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:46:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:46:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:46:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:46:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:46:23 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 02:46:23 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 02:46:23 --> [REQ_ID=4f8cc197041d] [PERF] Execution time=0.017239
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:46:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:46:28 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=0ebaa092b6c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:46:28 --> [REQ_ID=0ebaa092b6c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [LIFECYCLE][END] status=200 duration_ms=20.25 memory_delta=0
INFO - 2026-03-12 02:46:28 --> [REQ_ID=0ebaa092b6c5] [PERF] Execution time=0.020119
DEBUG - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [REQUEST][END]
INFO - 2026-03-12 02:46:28 --> [REQ_ID=ab2b88028450] [PERF] Execution time=0.029389
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 02:46:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:46:40 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
INFO - 2026-03-12 02:46:40 --> CSRF token verified.
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=d12b12a82781] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 02:46:40 --> [REQ_ID=d12b12a82781] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 02:46:40 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 02:46:40 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 02:46:40 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.241.208.136, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 02:46:40 --> Auth attemptLogin() called with login identifier: hammondcourtney@hotmail.com, remember: true
DEBUG - 2026-03-12 02:46:40 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-12 02:46:40 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 02:46:40 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 02:46:40 --> Auth attempt failed for identifier hammondcourtney@hotmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 02:46:40 --> [AUTH] Login failure
WARNING - 2026-03-12 02:46:40 --> [AUTH] Login failed
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [LIFECYCLE][END] status=303 duration_ms=171.76 memory_delta=0
INFO - 2026-03-12 02:46:40 --> [REQ_ID=d12b12a82781] [PERF] Execution time=0.171504
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [REQUEST][END]
INFO - 2026-03-12 02:46:40 --> [REQ_ID=5a68352748c7] [PERF] Execution time=0.181458
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:46:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:46:40 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=75e3e56e93d7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:46:40 --> [REQ_ID=75e3e56e93d7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [LIFECYCLE][END] status=200 duration_ms=14.95 memory_delta=0
INFO - 2026-03-12 02:46:40 --> [REQ_ID=75e3e56e93d7] [PERF] Execution time=0.014807
DEBUG - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [REQUEST][END]
INFO - 2026-03-12 02:46:40 --> [REQ_ID=fe4515ea7105] [PERF] Execution time=0.024195
DEBUG - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 02:46:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 02:46:53 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [REQUEST][END]
INFO - 2026-03-12 02:46:53 --> [REQ_ID=f968868ddb80] [PERF] Execution time=0.009891
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:46:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:46:54 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=54db16892043] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:46:54 --> [REQ_ID=54db16892043] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [LIFECYCLE][END] status=200 duration_ms=24.71 memory_delta=0
INFO - 2026-03-12 02:46:54 --> [REQ_ID=54db16892043] [PERF] Execution time=0.024608
DEBUG - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [REQUEST][END]
INFO - 2026-03-12 02:46:54 --> [REQ_ID=935c69630681] [PERF] Execution time=0.034102
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 02:46:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 02:46:59 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [METHOD_ENTRY] index
DEBUG - 2026-03-12 02:46:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:46:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:46:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:46:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:46:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:46:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 02:46:59 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [FILTER_AFTER]
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [LIFECYCLE][END] status=200 duration_ms=25.36 memory_delta=0
INFO - 2026-03-12 02:46:59 --> [REQ_ID=b407a822a77f] [PERF] Execution time=0.025095
DEBUG - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [REQUEST][END]
INFO - 2026-03-12 02:46:59 --> [REQ_ID=7d423fccd189] [PERF] Execution time=0.035419
DEBUG - 2026-03-12 02:47:04 --> [REQ_ID=a656c2d18d90] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-12 02:47:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:04 --> [REQ_ID=a656c2d18d90] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-12 02:47:04 --> [REQ_ID=a656c2d18d90] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-12 02:47:04 --> [REQ_ID=a656c2d18d90] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-12 02:47:04 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
INFO - 2026-03-12 02:47:04 --> CSRF token verified.
DEBUG - 2026-03-12 02:47:04 --> [REQ_ID=0e90244b7ba7] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-12 02:47:04 --> [REQ_ID=0e90244b7ba7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:05 --> [REQ_ID=0e90244b7ba7] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-12 02:47:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:47:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:47:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:47:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:47:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:47:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 02:47:05 --> [SUPPORT] Account help requested
INFO - 2026-03-12 02:47:06 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=a656c2d18d90] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=a656c2d18d90] [LIFECYCLE][END] status=303 duration_ms=1,197.72 memory_delta=0
INFO - 2026-03-12 02:47:06 --> [REQ_ID=0e90244b7ba7] [PERF] Execution time=1.197576
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=a656c2d18d90] [REQUEST][END]
INFO - 2026-03-12 02:47:06 --> [REQ_ID=a656c2d18d90] [PERF] Execution time=1.208367
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 02:47:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 02:47:06 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [METHOD_ENTRY] index
DEBUG - 2026-03-12 02:47:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:47:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 02:47:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 02:47:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 02:47:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 02:47:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 02:47:06 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [LIFECYCLE][END] status=200 duration_ms=25.15 memory_delta=0
INFO - 2026-03-12 02:47:06 --> [REQ_ID=66783f99a703] [PERF] Execution time=0.024928
DEBUG - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [REQUEST][END]
INFO - 2026-03-12 02:47:06 --> [REQ_ID=88a7fab741d4] [PERF] Execution time=0.035679
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 02:47:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 02:47:19 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [LIFECYCLE][END] status=200 duration_ms=3.19 memory_delta=0
DEBUG - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [REQUEST][END]
INFO - 2026-03-12 02:47:19 --> [REQ_ID=ace5b2a3865f] [PERF] Execution time=0.013878
DEBUG - 2026-03-12 02:47:23 --> [REQ_ID=be3d97136377] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 02:47:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:23 --> [REQ_ID=be3d97136377] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 02:47:23 --> [REQ_ID=be3d97136377] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 02:47:23 --> [REQ_ID=be3d97136377] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 02:47:23 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:23 --> [REQ_ID=930661792c1d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:47:23 --> [REQ_ID=930661792c1d] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 02:47:23 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 02:47:24 --> [REQ_ID=930661792c1d] [PERF] Execution time=0.018986
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-12 02:47:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-12 02:47:29 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [REQUEST][END]
INFO - 2026-03-12 02:47:29 --> [REQ_ID=25546685de42] [PERF] Execution time=0.009893
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:47:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:47:29 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=c29452a2c7d8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:47:29 --> [REQ_ID=c29452a2c7d8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [LIFECYCLE][END] status=200 duration_ms=136.92 memory_delta=0
INFO - 2026-03-12 02:47:29 --> [REQ_ID=c29452a2c7d8] [PERF] Execution time=0.136874
DEBUG - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [REQUEST][END]
INFO - 2026-03-12 02:47:29 --> [REQ_ID=43c29f74560f] [PERF] Execution time=0.145748
DEBUG - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-12 02:47:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-12 02:47:39 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [REQUEST][END]
INFO - 2026-03-12 02:47:39 --> [REQ_ID=47618c5a035b] [PERF] Execution time=0.010908
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:47:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:47:40 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=095913ad560a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:47:40 --> [REQ_ID=095913ad560a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [LIFECYCLE][END] status=200 duration_ms=134.63 memory_delta=0
INFO - 2026-03-12 02:47:40 --> [REQ_ID=095913ad560a] [PERF] Execution time=0.134575
DEBUG - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [REQUEST][END]
INFO - 2026-03-12 02:47:40 --> [REQ_ID=fbef35fa2d84] [PERF] Execution time=0.143628
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-12 02:47:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-12 02:47:48 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [REQUEST][END]
INFO - 2026-03-12 02:47:48 --> [REQ_ID=23b522e2f30f] [PERF] Execution time=0.011012
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:47:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:47:48 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=86cd7777e0ce] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:47:48 --> [REQ_ID=86cd7777e0ce] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [LIFECYCLE][END] status=200 duration_ms=200.23 memory_delta=0
INFO - 2026-03-12 02:47:48 --> [REQ_ID=86cd7777e0ce] [PERF] Execution time=0.200040
DEBUG - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [REQUEST][END]
INFO - 2026-03-12 02:47:48 --> [REQ_ID=2728544d8f04] [PERF] Execution time=0.209640
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 02:47:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 02:47:56 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [REQUEST][END]
INFO - 2026-03-12 02:47:56 --> [REQ_ID=32ddf6869745] [PERF] Execution time=0.016624
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:47:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:47:56 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=da8ab67c77c8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:47:56 --> [REQ_ID=da8ab67c77c8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [FILTER_AFTER]
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [LIFECYCLE][END] status=200 duration_ms=34.84 memory_delta=0
INFO - 2026-03-12 02:47:56 --> [REQ_ID=da8ab67c77c8] [PERF] Execution time=0.034625
DEBUG - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [REQUEST][END]
INFO - 2026-03-12 02:47:56 --> [REQ_ID=c78bf3883f8f] [PERF] Execution time=0.043386
DEBUG - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-12 02:48:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-12 02:48:08 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [REQUEST][END]
INFO - 2026-03-12 02:48:08 --> [REQ_ID=d4a99d8e12dd] [PERF] Execution time=0.010594
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:09 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=b2b04ac712e9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:09 --> [REQ_ID=b2b04ac712e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [LIFECYCLE][END] status=200 duration_ms=72.97 memory_delta=0
INFO - 2026-03-12 02:48:09 --> [REQ_ID=b2b04ac712e9] [PERF] Execution time=0.072730
DEBUG - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [REQUEST][END]
INFO - 2026-03-12 02:48:09 --> [REQ_ID=2cf7de8020f4] [PERF] Execution time=0.083891
DEBUG - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 02:48:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 02:48:14 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [REQUEST][END]
INFO - 2026-03-12 02:48:14 --> [REQ_ID=8e58df151a60] [PERF] Execution time=0.010299
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:15 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=ac35548ba020] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:15 --> [REQ_ID=ac35548ba020] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [LIFECYCLE][END] status=200 duration_ms=136.87 memory_delta=0
INFO - 2026-03-12 02:48:15 --> [REQ_ID=ac35548ba020] [PERF] Execution time=0.136690
DEBUG - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [REQUEST][END]
INFO - 2026-03-12 02:48:15 --> [REQ_ID=c466d09464de] [PERF] Execution time=0.145330
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-12 02:48:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-12 02:48:22 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [REQUEST][END]
INFO - 2026-03-12 02:48:22 --> [REQ_ID=e94f4204e3b1] [PERF] Execution time=0.010097
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:22 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=d8653c2cb46a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:22 --> [REQ_ID=d8653c2cb46a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [LIFECYCLE][END] status=200 duration_ms=12.97 memory_delta=0
INFO - 2026-03-12 02:48:22 --> [REQ_ID=d8653c2cb46a] [PERF] Execution time=0.012734
DEBUG - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [REQUEST][END]
INFO - 2026-03-12 02:48:22 --> [REQ_ID=edda66955759] [PERF] Execution time=0.021683
DEBUG - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 02:48:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 02:48:30 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [REQUEST][END]
INFO - 2026-03-12 02:48:30 --> [REQ_ID=2538865bf07e] [PERF] Execution time=0.010760
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:31 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=3f02e332289c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:31 --> [REQ_ID=3f02e332289c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [LIFECYCLE][END] status=200 duration_ms=25.16 memory_delta=0
INFO - 2026-03-12 02:48:31 --> [REQ_ID=3f02e332289c] [PERF] Execution time=0.024952
DEBUG - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [REQUEST][END]
INFO - 2026-03-12 02:48:31 --> [REQ_ID=7013eea68018] [PERF] Execution time=0.033880
DEBUG - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-12 02:48:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-12 02:48:41 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [REQUEST][END]
INFO - 2026-03-12 02:48:41 --> [REQ_ID=9d863465c74f] [PERF] Execution time=0.009862
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:42 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=3c8f74e2b5e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:42 --> [REQ_ID=3c8f74e2b5e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [LIFECYCLE][END] status=200 duration_ms=29.10 memory_delta=0
INFO - 2026-03-12 02:48:42 --> [REQ_ID=3c8f74e2b5e0] [PERF] Execution time=0.028992
DEBUG - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [REQUEST][END]
INFO - 2026-03-12 02:48:42 --> [REQ_ID=8659a2f9242a] [PERF] Execution time=0.038385
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 02:48:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-12 02:48:49 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [REQUEST][END]
INFO - 2026-03-12 02:48:49 --> [REQ_ID=665a9bfbf347] [PERF] Execution time=0.010175
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:49 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=be03538ccee3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:49 --> [REQ_ID=be03538ccee3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [LIFECYCLE][END] status=200 duration_ms=76.22 memory_delta=0
INFO - 2026-03-12 02:48:49 --> [REQ_ID=be03538ccee3] [PERF] Execution time=0.076104
DEBUG - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [REQUEST][END]
INFO - 2026-03-12 02:48:49 --> [REQ_ID=bd6f7c090928] [PERF] Execution time=0.084916
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 02:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-12 02:48:58 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [REQUEST][END]
INFO - 2026-03-12 02:48:58 --> [REQ_ID=727471d27810] [PERF] Execution time=0.010944
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 02:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 02:48:58 --> [CSRF] token name=csrf_test_name hash=980c8b102fd342a1cf0482fedd8153e3
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=0963c54fa84e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 02:48:58 --> [REQ_ID=0963c54fa84e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [FILTER_AFTER]
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [LIFECYCLE][END] status=200 duration_ms=20.97 memory_delta=0
INFO - 2026-03-12 02:48:58 --> [REQ_ID=0963c54fa84e] [PERF] Execution time=0.020850
DEBUG - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [REQUEST][END]
INFO - 2026-03-12 02:48:58 --> [REQ_ID=680e6cc7805e] [PERF] Execution time=0.030428
DEBUG - 2026-03-12 02:51:22 --> [REQ_ID=cf9006e79298] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 02:54:50 --> [REQ_ID=02d400e91f57] [REQUEST][START] GET /
DEBUG - 2026-03-12 02:54:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:54:50 --> [REQ_ID=02d400e91f57] [FILTER_BEFORE] /
DEBUG - 2026-03-12 02:54:50 --> [REQ_ID=02d400e91f57] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 02:54:50 --> [REQ_ID=02d400e91f57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 02:54:50 --> [CSRF] token name=csrf_test_name hash=7f7582068df7745e0b641ebf71c6f0da
DEBUG - 2026-03-12 02:54:50 --> [REQ_ID=d1b09179e972] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 02:54:50 --> [REQ_ID=d1b09179e972] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 02:54:50 --> [REQ_ID=d1b09179e972] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 02:54:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 02:54:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 02:54:51 --> [REQ_ID=d1b09179e972] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 02:54:51 --> [REQ_ID=d1b09179e972] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 02:54:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 02:54:51 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 02:54:51 --> [REQ_ID=02d400e91f57] [FILTER_AFTER]
DEBUG - 2026-03-12 02:54:51 --> [REQ_ID=02d400e91f57] [LIFECYCLE][END] status=200 duration_ms=622.76 memory_delta=4194304
INFO - 2026-03-12 02:54:51 --> [REQ_ID=d1b09179e972] [PERF] Execution time=0.619754
DEBUG - 2026-03-12 02:54:51 --> [REQ_ID=02d400e91f57] [REQUEST][END]
INFO - 2026-03-12 02:54:51 --> [REQ_ID=02d400e91f57] [PERF] Execution time=0.672355
DEBUG - 2026-03-12 02:56:22 --> [REQ_ID=534efdfc913c] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-12 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 02:56:22 --> [REQ_ID=534efdfc913c] [REQUEST][END]
INFO - 2026-03-12 02:56:22 --> [REQ_ID=534efdfc913c] [PERF] Execution time=0.043435
DEBUG - 2026-03-12 02:56:22 --> [REQ_ID=5d945512acee] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [REQUEST][END]
INFO - 2026-03-12 03:00:01 --> [REQ_ID=c17f7368eb65] [PERF] Execution time=0.047093
DEBUG - 2026-03-12 03:01:22 --> [REQ_ID=3a98e1d8bd57] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 03:04:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 03:04:19 --> [CSRF] token name=csrf_test_name hash=92440524711c1a6303f12258874c73fb
DEBUG - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [REQUEST][END]
INFO - 2026-03-12 03:04:19 --> [REQ_ID=535341f6e63c] [PERF] Execution time=0.052551
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 03:04:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 03:04:21 --> [CSRF] token name=csrf_test_name hash=29dcd9e700d780c9832c31f82ec1a3d5
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=f02306683820] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 03:04:21 --> [REQ_ID=f02306683820] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [FILTER_AFTER]
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [LIFECYCLE][END] status=200 duration_ms=66.25 memory_delta=0
INFO - 2026-03-12 03:04:21 --> [REQ_ID=f02306683820] [PERF] Execution time=0.065988
DEBUG - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [REQUEST][END]
INFO - 2026-03-12 03:04:21 --> [REQ_ID=722488af5fd3] [PERF] Execution time=0.075117
DEBUG - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-12 03:04:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [FILTER_BEFORE] /index.php/Knowledgebase/Assets
DEBUG - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=assets
DEBUG - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Assets
DEBUG - 2026-03-12 03:04:23 --> [CSRF] token name=csrf_test_name hash=d0ee9a0655f772e053bfb87f121d2acc
DEBUG - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [REQUEST][END]
INFO - 2026-03-12 03:04:23 --> [REQ_ID=4c4d4748c449] [PERF] Execution time=0.014122
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 03:04:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 03:04:25 --> [CSRF] token name=csrf_test_name hash=b56a402042369aae741062bdae9d8cf4
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=af0fad4f96e0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 03:04:25 --> [REQ_ID=af0fad4f96e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [FILTER_AFTER]
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [LIFECYCLE][END] status=200 duration_ms=14.83 memory_delta=0
INFO - 2026-03-12 03:04:25 --> [REQ_ID=af0fad4f96e0] [PERF] Execution time=0.014668
DEBUG - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [REQUEST][END]
INFO - 2026-03-12 03:04:25 --> [REQ_ID=f630043d9737] [PERF] Execution time=0.024242
DEBUG - 2026-03-12 03:06:22 --> [REQ_ID=a564ef42b367] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:11:22 --> [REQ_ID=0b0e09ee9387] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [REQUEST][END]
INFO - 2026-03-12 03:15:01 --> [REQ_ID=1106533c91fd] [PERF] Execution time=0.047618
DEBUG - 2026-03-12 03:16:22 --> [REQ_ID=d157cd987e25] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:21:22 --> [REQ_ID=e8f027777006] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:26:22 --> [REQ_ID=b6c492fbc802] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:31:22 --> [REQ_ID=84f94b237666] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-12 03:35:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-12 03:35:01 --> [CSRF] token name=csrf_test_name hash=44700b1d1eb66ee9b586958715fce924
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [REQUEST][END]
INFO - 2026-03-12 03:35:01 --> [REQ_ID=715dd84f7cdc] [PERF] Execution time=0.058916
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 03:35:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 03:35:01 --> [CSRF] token name=csrf_test_name hash=5a0ed618a45d3471ce7c9ec02e769e93
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=c3442ec5d76d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 03:35:01 --> [REQ_ID=c3442ec5d76d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [FILTER_AFTER]
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [LIFECYCLE][END] status=200 duration_ms=120.55 memory_delta=0
INFO - 2026-03-12 03:35:01 --> [REQ_ID=c3442ec5d76d] [PERF] Execution time=0.120292
DEBUG - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [REQUEST][END]
INFO - 2026-03-12 03:35:01 --> [REQ_ID=2033aa4e2760] [PERF] Execution time=0.132090
DEBUG - 2026-03-12 03:36:22 --> [REQ_ID=fd428e611c45] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:41:22 --> [REQ_ID=f3682b834705] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:46:22 --> [REQ_ID=0b86ad3f0beb] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:51:22 --> [REQ_ID=6a6d4d30b05a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 03:56:22 --> [REQ_ID=92ddbc5801c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [REQUEST][END]
INFO - 2026-03-12 04:00:01 --> [REQ_ID=b4274c57e011] [PERF] Execution time=0.052385
DEBUG - 2026-03-12 04:01:22 --> [REQ_ID=7260ff0d5e02] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:02:29 --> [REQ_ID=501e014025fd] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 04:02:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:02:29 --> [REQ_ID=501e014025fd] [REQUEST][END]
INFO - 2026-03-12 04:02:29 --> [REQ_ID=501e014025fd] [PERF] Execution time=0.043158
DEBUG - 2026-03-12 04:06:22 --> [REQ_ID=e0ace30d367a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:11:22 --> [REQ_ID=b1edc56cd6a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [REQUEST][END]
INFO - 2026-03-12 04:15:01 --> [REQ_ID=ff12d1f4b8b4] [PERF] Execution time=0.045836
DEBUG - 2026-03-12 04:16:22 --> [REQ_ID=1e095627bc97] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:21:22 --> [REQ_ID=5b54207f22b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:22:08 --> [REQ_ID=71bcf11c0c26] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-12 04:22:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:22:08 --> [REQ_ID=71bcf11c0c26] [REQUEST][END]
INFO - 2026-03-12 04:22:08 --> [REQ_ID=71bcf11c0c26] [PERF] Execution time=0.022192
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [REQUEST][START] GET /
DEBUG - 2026-03-12 04:23:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [FILTER_BEFORE] /
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 04:23:03 --> [CSRF] token name=csrf_test_name hash=2ec35077541ecc6f361db3cbe13413b2
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 04:23:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 04:23:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 04:23:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 04:23:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [FILTER_AFTER]
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [LIFECYCLE][END] status=200 duration_ms=645.61 memory_delta=4194304
INFO - 2026-03-12 04:23:03 --> [REQ_ID=926edf05eaa2] [PERF] Execution time=0.643648
DEBUG - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [REQUEST][END]
INFO - 2026-03-12 04:23:03 --> [REQ_ID=e08ed589e786] [PERF] Execution time=0.657967
DEBUG - 2026-03-12 04:26:22 --> [REQ_ID=d329db9573a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:30:28 --> [REQ_ID=5fbc5707da67] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 04:30:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:30:28 --> [REQ_ID=5fbc5707da67] [REQUEST][END]
INFO - 2026-03-12 04:30:28 --> [REQ_ID=5fbc5707da67] [PERF] Execution time=0.043056
DEBUG - 2026-03-12 04:31:22 --> [REQ_ID=99384912d60c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:36:22 --> [REQ_ID=a6597b6fd90e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [REQUEST][START] GET /
DEBUG - 2026-03-12 04:37:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [FILTER_BEFORE] /
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 04:37:12 --> [CSRF] token name=csrf_test_name hash=3d568094e02ee12be891593405fcd731
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 04:37:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 04:37:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 04:37:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 04:37:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [FILTER_AFTER]
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [LIFECYCLE][END] status=200 duration_ms=637.15 memory_delta=4194304
INFO - 2026-03-12 04:37:12 --> [REQ_ID=4dc040660c9e] [PERF] Execution time=0.635074
DEBUG - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [REQUEST][END]
INFO - 2026-03-12 04:37:12 --> [REQ_ID=c81e80ebff72] [PERF] Execution time=0.659925
DEBUG - 2026-03-12 04:41:22 --> [REQ_ID=faff46cfc5b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:46:22 --> [REQ_ID=fe8b1e6dcc1c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:51:22 --> [REQ_ID=93d3d23890f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 04:56:22 --> [REQ_ID=93e09314e7ba] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:00:01 --> [REQ_ID=5c1dce2c92ac] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:00:02 --> [REQ_ID=5c1dce2c92ac] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 05:00:02 --> [REQ_ID=5c1dce2c92ac] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 05:00:02 --> [REQ_ID=5c1dce2c92ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 05:00:02 --> [REQ_ID=5c1dce2c92ac] [REQUEST][END]
INFO - 2026-03-12 05:00:02 --> [REQ_ID=5c1dce2c92ac] [PERF] Execution time=0.048221
DEBUG - 2026-03-12 05:01:22 --> [REQ_ID=fc9c50d67215] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:06:22 --> [REQ_ID=bca034588b98] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:11:22 --> [REQ_ID=d472a8796821] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:14:44 --> [REQ_ID=481f7be1cc5c] [REQUEST][START] GET /
DEBUG - 2026-03-12 05:14:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:14:44 --> [REQ_ID=481f7be1cc5c] [FILTER_BEFORE] /
DEBUG - 2026-03-12 05:14:44 --> [REQ_ID=481f7be1cc5c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 05:14:44 --> [REQ_ID=481f7be1cc5c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 05:14:44 --> [CSRF] token name=csrf_test_name hash=093fb0a056868e14c8b047a19f293889
DEBUG - 2026-03-12 05:14:44 --> [REQ_ID=9ece96e9a83c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:14:44 --> [REQ_ID=9ece96e9a83c] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 05:14:44 --> [REQ_ID=9ece96e9a83c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 05:14:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:14:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 05:14:45 --> [REQ_ID=9ece96e9a83c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 05:14:45 --> [REQ_ID=9ece96e9a83c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 05:14:45 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 05:14:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:14:45 --> [REQ_ID=481f7be1cc5c] [FILTER_AFTER]
DEBUG - 2026-03-12 05:14:45 --> [REQ_ID=481f7be1cc5c] [LIFECYCLE][END] status=200 duration_ms=709.64 memory_delta=4194304
INFO - 2026-03-12 05:14:45 --> [REQ_ID=9ece96e9a83c] [PERF] Execution time=0.707628
DEBUG - 2026-03-12 05:14:45 --> [REQ_ID=481f7be1cc5c] [REQUEST][END]
INFO - 2026-03-12 05:14:45 --> [REQ_ID=481f7be1cc5c] [PERF] Execution time=0.748073
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [REQUEST][START] GET /
DEBUG - 2026-03-12 05:14:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [FILTER_BEFORE] /
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 05:14:59 --> [CSRF] token name=csrf_test_name hash=980f737d939d07b2bf4defa66e2f19b1
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 05:14:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:14:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 05:14:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:14:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [FILTER_AFTER]
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [LIFECYCLE][END] status=200 duration_ms=593.89 memory_delta=2097152
INFO - 2026-03-12 05:14:59 --> [REQ_ID=b36551193d31] [PERF] Execution time=0.593522
DEBUG - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [REQUEST][END]
INFO - 2026-03-12 05:14:59 --> [REQ_ID=eb2422c28102] [PERF] Execution time=0.603691
DEBUG - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 05:15:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:00 --> [CSRF] token name=csrf_test_name hash=c0a4ca8b4d66b9d446fd1b5fae66cffd
DEBUG - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [REQUEST][END]
INFO - 2026-03-12 05:15:00 --> [REQ_ID=9e1450cf1891] [PERF] Execution time=0.014452
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=b7017790cef4] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=b7017790cef4] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=b7017790cef4] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=b7017790cef4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:01 --> [CSRF] token name=csrf_test_name hash=bdf7cf9b045673c300c0ecfc56a237e0
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=c9bd388954ce] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:01 --> [REQ_ID=c9bd388954ce] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:01 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 05:15:01 --> [REQ_ID=c9bd388954ce] [PERF] Execution time=0.038103
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [REQUEST][END]
INFO - 2026-03-12 05:15:01 --> [REQ_ID=9d9e6522ffc4] [PERF] Execution time=0.017126
DEBUG - 2026-03-12 05:15:02 --> [REQ_ID=b85ed6734124] [REQUEST][START] GET /index.php
DEBUG - 2026-03-12 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:02 --> [REQ_ID=b85ed6734124] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-12 05:15:02 --> [REQ_ID=b85ed6734124] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 05:15:02 --> [REQ_ID=b85ed6734124] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 05:15:02 --> [CSRF] token name=csrf_test_name hash=55da4e6a9be09542e5e82ebfe4eff097
DEBUG - 2026-03-12 05:15:02 --> [REQ_ID=54e9e47a8356] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:15:02 --> [REQ_ID=54e9e47a8356] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:02 --> [REQ_ID=54e9e47a8356] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 05:15:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:15:03 --> [REQ_ID=54e9e47a8356] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 05:15:03 --> [REQ_ID=54e9e47a8356] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 05:15:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:15:03 --> [REQ_ID=b85ed6734124] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:03 --> [REQ_ID=b85ed6734124] [LIFECYCLE][END] status=200 duration_ms=678.10 memory_delta=4194304
INFO - 2026-03-12 05:15:03 --> [REQ_ID=54e9e47a8356] [PERF] Execution time=0.677834
DEBUG - 2026-03-12 05:15:03 --> [REQ_ID=b85ed6734124] [REQUEST][END]
INFO - 2026-03-12 05:15:03 --> [REQ_ID=b85ed6734124] [PERF] Execution time=0.687929
DEBUG - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 05:15:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:04 --> [CSRF] token name=csrf_test_name hash=86bcf1bcba5e2866c329495a3b6f08f2
DEBUG - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [REQUEST][END]
INFO - 2026-03-12 05:15:04 --> [REQ_ID=a273691458aa] [PERF] Execution time=0.008946
DEBUG - 2026-03-12 05:15:05 --> [REQ_ID=40d8c4bc6e75] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 05:15:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:05 --> [REQ_ID=40d8c4bc6e75] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:05 --> [REQ_ID=40d8c4bc6e75] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:05 --> [REQ_ID=40d8c4bc6e75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:05 --> [CSRF] token name=csrf_test_name hash=313e831c840467933dfb62f7a08330eb
DEBUG - 2026-03-12 05:15:05 --> [REQ_ID=4425b31e2125] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:05 --> [REQ_ID=4425b31e2125] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:05 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 05:15:05 --> [REQ_ID=4425b31e2125] [PERF] Execution time=0.019297
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=106d37454a88] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-12 05:15:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=106d37454a88] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=106d37454a88] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=106d37454a88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-12 05:15:06 --> [CSRF] token name=csrf_test_name hash=f75320aa37ab8213cbfee2e64d8e9a8e
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=065d770a9467] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-12 05:15:06 --> [REQ_ID=065d770a9467] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:06 --> [REQ_ID=065d770a9467] [METHOD_ENTRY] index
DEBUG - 2026-03-12 05:15:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:07 --> [REQ_ID=065d770a9467] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 05:15:07 --> [REQ_ID=065d770a9467] [PERF] Execution time=0.052102
DEBUG - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-12 05:15:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-12 05:15:07 --> [CSRF] token name=csrf_test_name hash=a2268ccbd85e278ec101de58a25644c8
DEBUG - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [REQUEST][END]
INFO - 2026-03-12 05:15:07 --> [REQ_ID=66eadcdf9fa7] [PERF] Execution time=0.014091
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:08 --> [CSRF] token name=csrf_test_name hash=248573b13e2c240e020d8c105e9f3b60
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=bb0fdbdb901a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:08 --> [REQ_ID=bb0fdbdb901a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [LIFECYCLE][END] status=200 duration_ms=22.35 memory_delta=0
INFO - 2026-03-12 05:15:08 --> [REQ_ID=bb0fdbdb901a] [PERF] Execution time=0.022244
DEBUG - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [REQUEST][END]
INFO - 2026-03-12 05:15:08 --> [REQ_ID=17e611d3f3e6] [PERF] Execution time=0.032149
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 05:15:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 05:15:09 --> [CSRF] token name=csrf_test_name hash=7fb94638a744177d2b8dc0a41a8c304e
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [REQUEST][END]
INFO - 2026-03-12 05:15:09 --> [REQ_ID=4e35b7f0728a] [PERF] Execution time=0.009327
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:09 --> [CSRF] token name=csrf_test_name hash=6def4bb0e9c145e646e3188b3b41a9a1
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=0cdfb567e58c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:09 --> [REQ_ID=0cdfb567e58c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [LIFECYCLE][END] status=200 duration_ms=17.56 memory_delta=0
INFO - 2026-03-12 05:15:09 --> [REQ_ID=0cdfb567e58c] [PERF] Execution time=0.017417
DEBUG - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [REQUEST][END]
INFO - 2026-03-12 05:15:09 --> [REQ_ID=e86226e8d67e] [PERF] Execution time=0.027000
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=8bc1937c2460] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-12 05:15:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=8bc1937c2460] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=8bc1937c2460] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=8bc1937c2460] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-12 05:15:10 --> [CSRF] token name=csrf_test_name hash=59750da82f9271de97260a1c49c03e3f
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=abdf0158265f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:10 --> [REQ_ID=abdf0158265f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:10 --> [REQ_ID=abdf0158265f] [METHOD_ENTRY] index
DEBUG - 2026-03-12 05:15:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:10 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:10 --> HowItWorksController failure: overview
CRITICAL - 2026-03-12 05:15:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:15:10 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:15:10 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-12 05:15:10 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://www.mymiwallet.com/index.php/How-It-Works
INFO - 2026-03-12 05:15:10 --> [REQ_ID=abdf0158265f] [PERF] Execution time=0.031874
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=a75a01655e46] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 05:15:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=a75a01655e46] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=a75a01655e46] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=a75a01655e46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 05:15:11 --> [CSRF] token name=csrf_test_name hash=7bd2116c318a384b80fc49d244058c98
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=e96716785ccc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:11 --> [REQ_ID=e96716785ccc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:11 --> [REQ_ID=e96716785ccc] [METHOD_ENTRY] show
DEBUG - 2026-03-12 05:15:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:11 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:11 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-12 05:15:11 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:15:11 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:15:11 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-12 05:15:11 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
INFO - 2026-03-12 05:15:11 --> [REQ_ID=e96716785ccc] [PERF] Execution time=0.043712
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 05:15:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 05:15:12 --> [CSRF] token name=csrf_test_name hash=364e1074495df93839f048a12b379799
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=db081bf82446] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:12 --> [REQ_ID=db081bf82446] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=db081bf82446] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-12 05:15:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:12 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:12 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:12 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:12 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:12 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:12 --> [REQ_ID=db081bf82446] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 05:15:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:12 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [LIFECYCLE][END] status=200 duration_ms=624.77 memory_delta=4194304
INFO - 2026-03-12 05:15:12 --> [REQ_ID=db081bf82446] [PERF] Execution time=0.624471
DEBUG - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [REQUEST][END]
INFO - 2026-03-12 05:15:12 --> [REQ_ID=896b89219ef2] [PERF] Execution time=0.636117
DEBUG - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 05:15:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:13 --> [CSRF] token name=csrf_test_name hash=2d1ec15f92bf06d91625183799dd925a
DEBUG - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [REQUEST][END]
INFO - 2026-03-12 05:15:13 --> [REQ_ID=afceb6a2207b] [PERF] Execution time=0.011207
DEBUG - 2026-03-12 05:15:14 --> [REQ_ID=0ef20be4d519] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 05:15:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:14 --> [REQ_ID=0ef20be4d519] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:14 --> [REQ_ID=0ef20be4d519] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:14 --> [REQ_ID=0ef20be4d519] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:14 --> [CSRF] token name=csrf_test_name hash=d5237554a4d8641174bf6de77979bf40
DEBUG - 2026-03-12 05:15:14 --> [REQ_ID=a9b1e95c5f0f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:14 --> [REQ_ID=a9b1e95c5f0f] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:14 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 05:15:14 --> [REQ_ID=a9b1e95c5f0f] [PERF] Execution time=0.018066
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=b8d29ba9c3b5] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 05:15:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=b8d29ba9c3b5] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=b8d29ba9c3b5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=b8d29ba9c3b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 05:15:15 --> [CSRF] token name=csrf_test_name hash=34a86ce9da0d124dbe7d806d9c82aab4
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=cd05e65509b2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:15 --> [REQ_ID=cd05e65509b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:15 --> [REQ_ID=cd05e65509b2] [METHOD_ENTRY] show
DEBUG - 2026-03-12 05:15:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:15 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:15 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 05:15:15 --> [REQ_ID=cd05e65509b2] [PERF] Execution time=0.021267
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 05:15:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 05:15:16 --> [CSRF] token name=csrf_test_name hash=ec54731c586409b6435592f10ab20f9e
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=99aad174e95f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:16 --> [REQ_ID=99aad174e95f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=99aad174e95f] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-12 05:15:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:16 --> [REQ_ID=99aad174e95f] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 05:15:16 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:16 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [LIFECYCLE][END] status=200 duration_ms=577.98 memory_delta=4194304
INFO - 2026-03-12 05:15:16 --> [REQ_ID=99aad174e95f] [PERF] Execution time=0.577763
DEBUG - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [REQUEST][END]
INFO - 2026-03-12 05:15:16 --> [REQ_ID=f40573485b33] [PERF] Execution time=0.587963
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 05:15:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:17 --> [CSRF] token name=csrf_test_name hash=e6a09fbf1c2c5bd72574f70713cdafea
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [REQUEST][END]
INFO - 2026-03-12 05:15:17 --> [REQ_ID=3479f0a6d12d] [PERF] Execution time=0.011278
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=d562b2d3428d] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 05:15:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=d562b2d3428d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=d562b2d3428d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=d562b2d3428d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:17 --> [CSRF] token name=csrf_test_name hash=3ff870ccbdb0c7bebf58c9f0e3ba4cf8
DEBUG - 2026-03-12 05:15:17 --> [REQ_ID=eead0c45395c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:17 --> [REQ_ID=eead0c45395c] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:17 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 05:15:17 --> [REQ_ID=eead0c45395c] [PERF] Execution time=0.016572
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=e8749960cf8e] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 05:15:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=e8749960cf8e] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=e8749960cf8e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=e8749960cf8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 05:15:19 --> [CSRF] token name=csrf_test_name hash=1504df85be6a2d1997f24f67792e500f
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=7ddbafc5c156] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:19 --> [REQ_ID=7ddbafc5c156] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:19 --> [REQ_ID=7ddbafc5c156] [METHOD_ENTRY] show
DEBUG - 2026-03-12 05:15:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:19 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:19 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 05:15:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:15:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:15:19 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 05:15:19 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
INFO - 2026-03-12 05:15:19 --> [REQ_ID=7ddbafc5c156] [PERF] Execution time=0.032727
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=2bd905b432bf] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 05:15:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=2bd905b432bf] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=2bd905b432bf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=2bd905b432bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 05:15:20 --> [CSRF] token name=csrf_test_name hash=6a100991a92f08c98d4ed64238fe0f06
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=afb93e4cd1fa] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:20 --> [REQ_ID=afb93e4cd1fa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:20 --> [REQ_ID=afb93e4cd1fa] [METHOD_ENTRY] show
DEBUG - 2026-03-12 05:15:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:20 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:20 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 05:15:20 --> [REQ_ID=afb93e4cd1fa] [PERF] Execution time=0.019199
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=ed5cacb6f5ab] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 05:15:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=ed5cacb6f5ab] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=ed5cacb6f5ab] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=ed5cacb6f5ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 05:15:21 --> [CSRF] token name=csrf_test_name hash=d5631db9da4b215d7636e3510245cea1
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=b7cbd22e208e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:21 --> [REQ_ID=b7cbd22e208e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:21 --> [REQ_ID=b7cbd22e208e] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-12 05:15:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:21 --> [REQ_ID=b7cbd22e208e] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 05:15:22 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:22 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:22 --> [REQ_ID=ed5cacb6f5ab] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:22 --> [REQ_ID=ed5cacb6f5ab] [LIFECYCLE][END] status=200 duration_ms=631.02 memory_delta=4194304
INFO - 2026-03-12 05:15:22 --> [REQ_ID=b7cbd22e208e] [PERF] Execution time=0.630786
DEBUG - 2026-03-12 05:15:22 --> [REQ_ID=ed5cacb6f5ab] [REQUEST][END]
INFO - 2026-03-12 05:15:22 --> [REQ_ID=ed5cacb6f5ab] [PERF] Execution time=0.642067
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 05:15:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 05:15:24 --> [CSRF] token name=csrf_test_name hash=13bf90326241fc238b878cc177c745c0
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=6db86d5f0015] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:24 --> [REQ_ID=6db86d5f0015] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=6db86d5f0015] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-12 05:15:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:24 --> [REQ_ID=6db86d5f0015] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 05:15:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:24 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [LIFECYCLE][END] status=200 duration_ms=587.15 memory_delta=2097152
INFO - 2026-03-12 05:15:24 --> [REQ_ID=6db86d5f0015] [PERF] Execution time=0.586916
DEBUG - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [REQUEST][END]
INFO - 2026-03-12 05:15:24 --> [REQ_ID=71bd11dd2d99] [PERF] Execution time=0.598228
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 05:15:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:25 --> [CSRF] token name=csrf_test_name hash=065720a6cf36cc96c65312601c7a22b6
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [REQUEST][END]
INFO - 2026-03-12 05:15:25 --> [REQ_ID=f851fb474bc0] [PERF] Execution time=0.009650
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=a3bc4866bc2a] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 05:15:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=a3bc4866bc2a] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=a3bc4866bc2a] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 05:15:25 --> [REQ_ID=a3bc4866bc2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 05:15:26 --> [CSRF] token name=csrf_test_name hash=fc300f8e63e4e00fe873b66fcb1b441c
DEBUG - 2026-03-12 05:15:26 --> [REQ_ID=d9c59d296043] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:26 --> [REQ_ID=d9c59d296043] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:26 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 05:15:26 --> [REQ_ID=d9c59d296043] [PERF] Execution time=0.272655
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=8acf4f08083c] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 05:15:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=8acf4f08083c] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=8acf4f08083c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=8acf4f08083c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 05:15:27 --> [CSRF] token name=csrf_test_name hash=6343567c0fe2f1ab715d67f45119d005
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=01af475c0a3f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:27 --> [REQ_ID=01af475c0a3f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:27 --> [REQ_ID=01af475c0a3f] [METHOD_ENTRY] show
DEBUG - 2026-03-12 05:15:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:27 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 05:15:27 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 05:15:27 --> [REQ_ID=01af475c0a3f] [PERF] Execution time=0.023586
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 05:15:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 05:15:28 --> [CSRF] token name=csrf_test_name hash=a58ba9214739dccbccf79168f43d9181
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=54edcf8a2940] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 05:15:28 --> [REQ_ID=54edcf8a2940] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=54edcf8a2940] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-12 05:15:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:28 --> [REQ_ID=54edcf8a2940] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 05:15:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:28 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [LIFECYCLE][END] status=200 duration_ms=574.34 memory_delta=4194304
INFO - 2026-03-12 05:15:28 --> [REQ_ID=54edcf8a2940] [PERF] Execution time=0.574179
DEBUG - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [REQUEST][END]
INFO - 2026-03-12 05:15:28 --> [REQ_ID=584b92d6b35d] [PERF] Execution time=0.584048
DEBUG - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-12 05:15:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-12 05:15:29 --> [CSRF] token name=csrf_test_name hash=525754fb6b488b90c51ffb69fdf9073f
DEBUG - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [REQUEST][END]
INFO - 2026-03-12 05:15:29 --> [REQ_ID=4d5e0c1880c1] [PERF] Execution time=0.011909
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:30 --> [CSRF] token name=csrf_test_name hash=442e1b94101d6f1fc892d78761b0bfe3
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=6b64247b8bad] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:30 --> [REQ_ID=6b64247b8bad] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [LIFECYCLE][END] status=200 duration_ms=31.51 memory_delta=0
INFO - 2026-03-12 05:15:30 --> [REQ_ID=6b64247b8bad] [PERF] Execution time=0.031290
DEBUG - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [REQUEST][END]
INFO - 2026-03-12 05:15:30 --> [REQ_ID=f8bbafab15e7] [PERF] Execution time=0.042637
DEBUG - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 05:15:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 05:15:31 --> [CSRF] token name=csrf_test_name hash=e479a66b4c2c42d052b941c1116002fe
DEBUG - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [REQUEST][END]
INFO - 2026-03-12 05:15:31 --> [REQ_ID=31c5584b472a] [PERF] Execution time=0.015364
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:32 --> [CSRF] token name=csrf_test_name hash=3603cced78a21a300af2d3edebc3b4e7
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=d31ec096aed0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:32 --> [REQ_ID=d31ec096aed0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [LIFECYCLE][END] status=200 duration_ms=18.69 memory_delta=0
INFO - 2026-03-12 05:15:32 --> [REQ_ID=d31ec096aed0] [PERF] Execution time=0.018098
DEBUG - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [REQUEST][END]
INFO - 2026-03-12 05:15:32 --> [REQ_ID=387cbfe73cb0] [PERF] Execution time=0.032431
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 05:15:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 05:15:33 --> [CSRF] token name=csrf_test_name hash=ae4562a25f61261f95d1c411ad600570
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [REQUEST][END]
INFO - 2026-03-12 05:15:33 --> [REQ_ID=0182dff94b42] [PERF] Execution time=0.010001
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:33 --> [CSRF] token name=csrf_test_name hash=b89c7d1736166416cbaf984f868a3c94
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=124e66c52d03] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:33 --> [REQ_ID=124e66c52d03] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [LIFECYCLE][END] status=200 duration_ms=17.58 memory_delta=0
INFO - 2026-03-12 05:15:33 --> [REQ_ID=124e66c52d03] [PERF] Execution time=0.016793
DEBUG - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [REQUEST][END]
INFO - 2026-03-12 05:15:33 --> [REQ_ID=c09e9a35a09f] [PERF] Execution time=0.028632
DEBUG - 2026-03-12 05:15:34 --> [REQ_ID=fb585ccec4bb] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-12 05:15:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:34 --> [REQ_ID=fb585ccec4bb] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-12 05:15:34 --> [REQ_ID=fb585ccec4bb] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-12 05:15:34 --> [REQ_ID=fb585ccec4bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-12 05:15:34 --> [CSRF] token name=csrf_test_name hash=01de47a07142f5862e53530efc5e7e3c
DEBUG - 2026-03-12 05:15:34 --> [REQ_ID=d285c1d52c69] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:15:34 --> [REQ_ID=d285c1d52c69] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:34 --> [REQ_ID=d285c1d52c69] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 05:15:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:35 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:35 --> [REQ_ID=d285c1d52c69] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-12 05:15:35 --> [REQ_ID=d285c1d52c69] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 05:15:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:35 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-12 05:15:35 --> [REQ_ID=fb585ccec4bb] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:35 --> [REQ_ID=fb585ccec4bb] [LIFECYCLE][END] status=200 duration_ms=626.46 memory_delta=4194304
INFO - 2026-03-12 05:15:35 --> [REQ_ID=d285c1d52c69] [PERF] Execution time=0.626322
DEBUG - 2026-03-12 05:15:35 --> [REQ_ID=fb585ccec4bb] [REQUEST][END]
INFO - 2026-03-12 05:15:35 --> [REQ_ID=fb585ccec4bb] [PERF] Execution time=0.636221
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-12 05:15:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-12 05:15:36 --> [CSRF] token name=csrf_test_name hash=d52f6f5248bcb424781729ce08be0e93
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [METHOD_ENTRY] index
DEBUG - 2026-03-12 05:15:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 05:15:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 05:15:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 05:15:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 05:15:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 05:15:36 --> themesMemory usage: 6291456
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [LIFECYCLE][END] status=200 duration_ms=39.34 memory_delta=0
INFO - 2026-03-12 05:15:36 --> [REQ_ID=f9529989e526] [PERF] Execution time=0.039011
DEBUG - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [REQUEST][END]
INFO - 2026-03-12 05:15:36 --> [REQ_ID=a1e024fcb95c] [PERF] Execution time=0.049754
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-12 05:15:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-12 05:15:38 --> [CSRF] token name=csrf_test_name hash=5514027e17d5acb73d57032ffa5f878c
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 05:15:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:15:38 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 05:15:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:15:38 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [LIFECYCLE][END] status=200 duration_ms=666.25 memory_delta=4194304
INFO - 2026-03-12 05:15:38 --> [REQ_ID=889688ce3c29] [PERF] Execution time=0.666023
DEBUG - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [REQUEST][END]
INFO - 2026-03-12 05:15:38 --> [REQ_ID=3c62a09954ba] [PERF] Execution time=0.675499
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 05:15:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 05:15:40 --> [CSRF] token name=csrf_test_name hash=82f3b32d599b6c560aac4047e5c0ba78
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=35798cff55cc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 05:15:40 --> [REQ_ID=35798cff55cc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [FILTER_AFTER]
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [LIFECYCLE][END] status=200 duration_ms=27.65 memory_delta=0
INFO - 2026-03-12 05:15:40 --> [REQ_ID=35798cff55cc] [PERF] Execution time=0.027387
DEBUG - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [REQUEST][END]
INFO - 2026-03-12 05:15:40 --> [REQ_ID=a81cb3c483b7] [PERF] Execution time=0.038052
DEBUG - 2026-03-12 05:16:22 --> [REQ_ID=017bd4af8b21] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:21:22 --> [REQ_ID=8967c52ceef7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:26:22 --> [REQ_ID=232c2436032a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:31:22 --> [REQ_ID=5e5ce394ed8d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:31:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:31:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:31:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:36:22 --> [REQ_ID=89bb9579523a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:40:18 --> [REQ_ID=841d92f85a9c] [REQUEST][START] GET /
DEBUG - 2026-03-12 05:40:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:40:18 --> [REQ_ID=841d92f85a9c] [FILTER_BEFORE] /
DEBUG - 2026-03-12 05:40:18 --> [REQ_ID=841d92f85a9c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 05:40:18 --> [REQ_ID=841d92f85a9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 05:40:18 --> [CSRF] token name=csrf_test_name hash=d7ab9b790052af8ad57c3be7732ea9f8
DEBUG - 2026-03-12 05:40:18 --> [REQ_ID=03ca26d424be] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:40:18 --> [REQ_ID=03ca26d424be] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 05:40:18 --> [REQ_ID=03ca26d424be] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 05:40:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:40:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 05:40:19 --> [REQ_ID=03ca26d424be] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 05:40:19 --> [REQ_ID=03ca26d424be] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 05:40:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 05:40:19 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 05:40:19 --> [REQ_ID=841d92f85a9c] [FILTER_AFTER]
DEBUG - 2026-03-12 05:40:19 --> [REQ_ID=841d92f85a9c] [LIFECYCLE][END] status=200 duration_ms=751.30 memory_delta=4194304
INFO - 2026-03-12 05:40:19 --> [REQ_ID=03ca26d424be] [PERF] Execution time=0.749186
DEBUG - 2026-03-12 05:40:19 --> [REQ_ID=841d92f85a9c] [REQUEST][END]
INFO - 2026-03-12 05:40:19 --> [REQ_ID=841d92f85a9c] [PERF] Execution time=0.791805
DEBUG - 2026-03-12 05:41:22 --> [REQ_ID=75e69f25341e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:46:22 --> [REQ_ID=f9106b31a5f6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:50:45 --> [REQ_ID=00dcc6acb0a4] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 05:50:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:50:45 --> [REQ_ID=00dcc6acb0a4] [REQUEST][END]
INFO - 2026-03-12 05:50:45 --> [REQ_ID=00dcc6acb0a4] [PERF] Execution time=0.036657
DEBUG - 2026-03-12 05:51:22 --> [REQ_ID=eac50b2df2d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:56:22 --> [REQ_ID=c7213a3a35d8] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 05:57:24 --> [REQ_ID=4d2aaa4ae6c8] [REQUEST][START] GET /
DEBUG - 2026-03-12 05:57:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 05:57:24 --> [REQ_ID=4d2aaa4ae6c8] [FILTER_BEFORE] /
DEBUG - 2026-03-12 05:57:24 --> [REQ_ID=4d2aaa4ae6c8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 05:57:24 --> [REQ_ID=4d2aaa4ae6c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 05:57:24 --> [CSRF] token name=csrf_test_name hash=c0998384e8ce3d3dfc92226b1fb0c3e0
DEBUG - 2026-03-12 05:57:24 --> [REQ_ID=864cb9981c7e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 05:57:24 --> [REQ_ID=864cb9981c7e] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 05:57:24 --> [REQ_ID=864cb9981c7e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 05:57:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 05:57:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 05:57:25 --> [REQ_ID=864cb9981c7e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 05:57:25 --> [REQ_ID=864cb9981c7e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 05:57:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 05:57:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 05:57:25 --> [REQ_ID=4d2aaa4ae6c8] [FILTER_AFTER]
DEBUG - 2026-03-12 05:57:25 --> [REQ_ID=4d2aaa4ae6c8] [LIFECYCLE][END] status=200 duration_ms=601.36 memory_delta=4194304
INFO - 2026-03-12 05:57:25 --> [REQ_ID=864cb9981c7e] [PERF] Execution time=0.599226
DEBUG - 2026-03-12 05:57:25 --> [REQ_ID=4d2aaa4ae6c8] [REQUEST][END]
INFO - 2026-03-12 05:57:25 --> [REQ_ID=4d2aaa4ae6c8] [PERF] Execution time=0.621371
DEBUG - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [REQUEST][END]
INFO - 2026-03-12 06:00:02 --> [REQ_ID=dc9e742c67ea] [PERF] Execution time=0.051165
DEBUG - 2026-03-12 06:01:22 --> [REQ_ID=8d2beffed6f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:06:22 --> [REQ_ID=b6bdb505d916] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:11:22 --> [REQ_ID=53e5c96041f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [REQUEST][END]
INFO - 2026-03-12 06:15:01 --> [REQ_ID=2ae4768d7ec7] [PERF] Execution time=0.047327
DEBUG - 2026-03-12 06:16:22 --> [REQ_ID=114ec98b7961] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:21:22 --> [REQ_ID=491c6117befd] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:26:22 --> [REQ_ID=e672672284dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=d0d5744797de] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 06:31:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=d0d5744797de] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=d0d5744797de] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=d0d5744797de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 06:31:12 --> [CSRF] token name=csrf_test_name hash=75783e3de2bc5b275ffaa9f550d8779b
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=91deaad96b2d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 06:31:12 --> [REQ_ID=91deaad96b2d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 06:31:12 --> [REQ_ID=91deaad96b2d] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-12 06:31:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 06:31:12 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 06:31:12 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 06:31:12 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 06:31:12 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 06:31:12 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 06:31:12 --> [REQ_ID=91deaad96b2d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 06:31:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 06:31:13 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-12 06:31:13 --> [REQ_ID=d0d5744797de] [FILTER_AFTER]
DEBUG - 2026-03-12 06:31:13 --> [REQ_ID=d0d5744797de] [LIFECYCLE][END] status=200 duration_ms=860.62 memory_delta=4194304
INFO - 2026-03-12 06:31:13 --> [REQ_ID=91deaad96b2d] [PERF] Execution time=0.858612
DEBUG - 2026-03-12 06:31:13 --> [REQ_ID=d0d5744797de] [REQUEST][END]
INFO - 2026-03-12 06:31:13 --> [REQ_ID=d0d5744797de] [PERF] Execution time=0.905748
DEBUG - 2026-03-12 06:31:22 --> [REQ_ID=81e7237d1197] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:36:22 --> [REQ_ID=b381ce7c0a31] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:41:22 --> [REQ_ID=417b1ba35906] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [REQUEST][START] GET /index.php/Knowledgebase/KYC-Verification
DEBUG - 2026-03-12 06:42:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [FILTER_BEFORE] /index.php/Knowledgebase/KYC-Verification
DEBUG - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=KYCVerification
DEBUG - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/KYC-Verification
DEBUG - 2026-03-12 06:42:16 --> [CSRF] token name=csrf_test_name hash=3660b2b1fb7573ff364c2713e94532be
DEBUG - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [REQUEST][END]
INFO - 2026-03-12 06:42:16 --> [REQ_ID=c86bf8404988] [PERF] Execution time=0.031859
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 06:42:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 06:42:20 --> [CSRF] token name=csrf_test_name hash=f9010f4ea789208c0b6d713cb92dfd67
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=c4b38f09f480] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 06:42:20 --> [REQ_ID=c4b38f09f480] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [FILTER_AFTER]
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [LIFECYCLE][END] status=200 duration_ms=33.13 memory_delta=0
INFO - 2026-03-12 06:42:20 --> [REQ_ID=c4b38f09f480] [PERF] Execution time=0.032803
DEBUG - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [REQUEST][END]
INFO - 2026-03-12 06:42:20 --> [REQ_ID=4bec2bb0c030] [PERF] Execution time=0.046949
DEBUG - 2026-03-12 06:46:22 --> [REQ_ID=1476f076ee00] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:51:22 --> [REQ_ID=084c17168cbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:56:22 --> [REQ_ID=a3160b1084a5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 06:57:06 --> [REQ_ID=20174f5b4f13] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 06:57:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 06:57:06 --> [REQ_ID=20174f5b4f13] [REQUEST][END]
INFO - 2026-03-12 06:57:06 --> [REQ_ID=20174f5b4f13] [PERF] Execution time=0.022624
INFO - 2026-03-12 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-12 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-12 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-12 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-12 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034175
INFO - 2026-03-12 07:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-12 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-12 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [REQUEST][END]
INFO - 2026-03-12 07:00:01 --> [REQ_ID=66f49144c0c3] [PERF] Execution time=0.100935
INFO - 2026-03-12 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-12 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-12 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-12 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-12 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009533
INFO - 2026-03-12 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-12 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-12 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-12 07:00:03 --> LOG_HEALTHCHECK debug marker=1b5d5d97a7ce
INFO - 2026-03-12 07:00:03 --> LOG_HEALTHCHECK info marker=1b5d5d97a7ce
NOTICE - 2026-03-12 07:00:03 --> LOG_HEALTHCHECK probe marker=1b5d5d97a7ce
INFO - 2026-03-12 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-12 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.110946
INFO - 2026-03-12 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-12 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.153882
INFO - 2026-03-12 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-12 07:01:22 --> [REQ_ID=afb3ac3022c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:06:22 --> [REQ_ID=87bdd7827e47] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:11:22 --> [REQ_ID=e36057e1e87c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [REQUEST][END]
INFO - 2026-03-12 07:15:01 --> [REQ_ID=d58bbe1a5b85] [PERF] Execution time=0.047435
DEBUG - 2026-03-12 07:16:22 --> [REQ_ID=9df4a33a6fcd] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:17:04 --> [REQ_ID=fe11b1c64c6b] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-12 07:17:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:17:04 --> [REQ_ID=fe11b1c64c6b] [REQUEST][END]
INFO - 2026-03-12 07:17:04 --> [REQ_ID=fe11b1c64c6b] [PERF] Execution time=0.028402
DEBUG - 2026-03-12 07:20:06 --> [REQ_ID=80d8b50daa6e] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-12 07:20:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:20:06 --> [REQ_ID=80d8b50daa6e] [REQUEST][END]
INFO - 2026-03-12 07:20:06 --> [REQ_ID=80d8b50daa6e] [PERF] Execution time=0.042562
DEBUG - 2026-03-12 07:21:22 --> [REQ_ID=004b146b1ed4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:23:59 --> [REQ_ID=d3a19214070f] [REQUEST][START] GET /
DEBUG - 2026-03-12 07:23:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:23:59 --> [REQ_ID=d3a19214070f] [FILTER_BEFORE] /
DEBUG - 2026-03-12 07:23:59 --> [REQ_ID=d3a19214070f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 07:23:59 --> [REQ_ID=d3a19214070f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 07:23:59 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:23:59 --> [REQ_ID=b7c431d15d84] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 07:23:59 --> [REQ_ID=b7c431d15d84] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 07:23:59 --> [REQ_ID=b7c431d15d84] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 07:23:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 07:24:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 07:24:00 --> [REQ_ID=b7c431d15d84] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 07:24:00 --> [REQ_ID=b7c431d15d84] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 07:24:00 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 07:24:00 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 07:24:00 --> [REQ_ID=d3a19214070f] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:00 --> [REQ_ID=d3a19214070f] [LIFECYCLE][END] status=200 duration_ms=677.80 memory_delta=4194304
INFO - 2026-03-12 07:24:00 --> [REQ_ID=b7c431d15d84] [PERF] Execution time=0.675930
DEBUG - 2026-03-12 07:24:00 --> [REQ_ID=d3a19214070f] [REQUEST][END]
INFO - 2026-03-12 07:24:00 --> [REQ_ID=d3a19214070f] [PERF] Execution time=0.718730
DEBUG - 2026-03-12 07:24:04 --> [REQ_ID=7601ceccb78d] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 07:24:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:04 --> [REQ_ID=7601ceccb78d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 07:24:04 --> [REQ_ID=7601ceccb78d] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 07:24:04 --> [REQ_ID=7601ceccb78d] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 07:24:04 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
INFO - 2026-03-12 07:24:04 --> CSRF token verified.
DEBUG - 2026-03-12 07:24:04 --> [REQ_ID=30a36dc561c4] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 07:24:04 --> [REQ_ID=30a36dc561c4] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 07:24:04 --> [REGISTRATION] Submission received
INFO - 2026-03-12 07:24:05 --> MailService queued email
INFO - 2026-03-12 07:24:05 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 07:24:05 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 07:24:05 --> Registration created user_id=11716, email=sf.moo.rma.n@gmail.com, username=OSSEBPHBeVHkzNylRDFYhOvy, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 07:24:05 --> [REGISTRATION] User record created
INFO - 2026-03-12 07:24:05 --> OnboardingProgressService: created onboarding record for user_id=11716
INFO - 2026-03-12 07:24:06 --> Registration succeeded for sf.moo.rma.n@gmail.com (event 0d31f9813c3840eb)
INFO - 2026-03-12 07:24:06 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 07:24:06 --> Registration redirecting to success guide for user_id=11716
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=7601ceccb78d] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=7601ceccb78d] [LIFECYCLE][END] status=303 duration_ms=1,314.47 memory_delta=0
INFO - 2026-03-12 07:24:06 --> [REQ_ID=30a36dc561c4] [PERF] Execution time=1.313988
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=7601ceccb78d] [REQUEST][END]
INFO - 2026-03-12 07:24:06 --> [REQ_ID=7601ceccb78d] [PERF] Execution time=1.327705
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=2fe35c70b02e] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 07:24:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=2fe35c70b02e] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=2fe35c70b02e] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=2fe35c70b02e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 07:24:06 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:06 --> [REQ_ID=73837265473b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:24:06 --> [REQ_ID=73837265473b] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 07:24:06 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 07:24:06 --> [REQ_ID=73837265473b] [PERF] Execution time=0.013531
DEBUG - 2026-03-12 07:24:19 --> [REQ_ID=f53da303893d] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 07:24:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:19 --> [REQ_ID=f53da303893d] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 07:24:19 --> [REQ_ID=f53da303893d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 07:24:19 --> [REQ_ID=f53da303893d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 07:24:19 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:19 --> [REQ_ID=b5c56d765d16] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 07:24:19 --> [REQ_ID=b5c56d765d16] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:24:20 --> [REQ_ID=b5c56d765d16] [METHOD_ENTRY] show
DEBUG - 2026-03-12 07:24:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 07:24:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 07:24:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 07:24:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 07:24:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 07:24:20 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 07:24:20 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 07:24:20 --> [REQ_ID=b5c56d765d16] [PERF] Execution time=0.148622
DEBUG - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 07:24:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 07:24:24 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [REQUEST][END]
INFO - 2026-03-12 07:24:24 --> [REQ_ID=8063703f2a90] [PERF] Execution time=0.011635
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:24:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:24:25 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=6ef860b376fb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:24:25 --> [REQ_ID=6ef860b376fb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [LIFECYCLE][END] status=200 duration_ms=19.10 memory_delta=0
INFO - 2026-03-12 07:24:25 --> [REQ_ID=6ef860b376fb] [PERF] Execution time=0.018915
DEBUG - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [REQUEST][END]
INFO - 2026-03-12 07:24:25 --> [REQ_ID=a327622a85e9] [PERF] Execution time=0.027602
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 07:24:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:24:36 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
INFO - 2026-03-12 07:24:36 --> CSRF token verified.
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=bcdbeebc0d03] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 07:24:36 --> [REQ_ID=bcdbeebc0d03] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 07:24:36 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 07:24:36 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 07:24:36 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 45.84.107.97, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 07:24:36 --> Auth attemptLogin() called with login identifier: sf.moo.rma.n@gmail.com, remember: true
DEBUG - 2026-03-12 07:24:36 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 07:24:36 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 07:24:36 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 07:24:36 --> Auth attempt failed for identifier sf.moo.rma.n@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 07:24:36 --> [AUTH] Login failure
WARNING - 2026-03-12 07:24:36 --> [AUTH] Login failed
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [LIFECYCLE][END] status=303 duration_ms=161.86 memory_delta=0
INFO - 2026-03-12 07:24:36 --> [REQ_ID=bcdbeebc0d03] [PERF] Execution time=0.161583
DEBUG - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [REQUEST][END]
INFO - 2026-03-12 07:24:36 --> [REQ_ID=88a06bc927aa] [PERF] Execution time=0.171451
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:24:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:24:37 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=1cb7f6a14b03] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:24:37 --> [REQ_ID=1cb7f6a14b03] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [LIFECYCLE][END] status=200 duration_ms=29.22 memory_delta=0
INFO - 2026-03-12 07:24:37 --> [REQ_ID=1cb7f6a14b03] [PERF] Execution time=0.029143
DEBUG - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [REQUEST][END]
INFO - 2026-03-12 07:24:37 --> [REQ_ID=74389caa12b9] [PERF] Execution time=0.038321
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:24:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:24:50 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=6f0e08497324] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:24:50 --> [REQ_ID=6f0e08497324] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [FILTER_AFTER]
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [LIFECYCLE][END] status=200 duration_ms=76.74 memory_delta=0
INFO - 2026-03-12 07:24:50 --> [REQ_ID=6f0e08497324] [PERF] Execution time=0.076771
DEBUG - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [REQUEST][END]
INFO - 2026-03-12 07:24:50 --> [REQ_ID=9fa8033ebb24] [PERF] Execution time=0.086178
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=62dea9bccd21] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 07:24:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=62dea9bccd21] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=62dea9bccd21] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=62dea9bccd21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 07:24:55 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=1c5433544de4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 07:24:55 --> [REQ_ID=1c5433544de4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:24:55 --> [REQ_ID=1c5433544de4] [METHOD_ENTRY] show
DEBUG - 2026-03-12 07:24:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 07:24:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 07:24:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 07:24:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 07:24:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 07:24:55 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 07:24:55 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 07:24:55 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:24:55 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:24:55 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 07:24:55 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 07:24:55 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 07:24:55 --> [REQ_ID=1c5433544de4] [PERF] Execution time=0.028009
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 07:25:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 07:25:00 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [LIFECYCLE][END] status=200 duration_ms=3.27 memory_delta=0
DEBUG - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [REQUEST][END]
INFO - 2026-03-12 07:25:00 --> [REQ_ID=b62ded2fb3e2] [PERF] Execution time=0.014055
DEBUG - 2026-03-12 07:25:05 --> [REQ_ID=279a8d83fea7] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-12 07:25:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:05 --> [REQ_ID=279a8d83fea7] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 07:25:05 --> [REQ_ID=279a8d83fea7] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-12 07:25:05 --> [REQ_ID=279a8d83fea7] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 07:25:05 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
INFO - 2026-03-12 07:25:05 --> CSRF token verified.
DEBUG - 2026-03-12 07:25:05 --> [REQ_ID=d65a27c43153] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 07:25:05 --> [REQ_ID=d65a27c43153] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 07:25:05 --> [AUTH] Password reset requested
ERROR - 2026-03-12 07:25:06 --> Email: Unable to send email using SMTP. Your server might not be configured to send mail using this method.
ERROR - 2026-03-12 07:25:06 --> The following SMTP error was encountered: 0 
ERROR - 2026-03-12 07:25:06 --> [AUTH] Password reset email failed
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=279a8d83fea7] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=279a8d83fea7] [LIFECYCLE][END] status=303 duration_ms=455.25 memory_delta=0
INFO - 2026-03-12 07:25:06 --> [REQ_ID=d65a27c43153] [PERF] Execution time=0.454954
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=279a8d83fea7] [REQUEST][END]
INFO - 2026-03-12 07:25:06 --> [REQ_ID=279a8d83fea7] [PERF] Execution time=0.464639
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 07:25:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 07:25:06 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [LIFECYCLE][END] status=200 duration_ms=3.34 memory_delta=0
DEBUG - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [REQUEST][END]
INFO - 2026-03-12 07:25:06 --> [REQ_ID=7461a89bbbe4] [PERF] Execution time=0.015775
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 07:25:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 07:25:21 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [METHOD_ENTRY] index
DEBUG - 2026-03-12 07:25:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 07:25:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 07:25:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 07:25:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 07:25:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 07:25:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 07:25:21 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [LIFECYCLE][END] status=200 duration_ms=46.76 memory_delta=0
INFO - 2026-03-12 07:25:21 --> [REQ_ID=f8f656739c7a] [PERF] Execution time=0.046419
DEBUG - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [REQUEST][END]
INFO - 2026-03-12 07:25:21 --> [REQ_ID=cafbe7944aad] [PERF] Execution time=0.057187
DEBUG - 2026-03-12 07:25:25 --> [REQ_ID=c3ec624d30d6] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 07:25:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:25 --> [REQ_ID=c3ec624d30d6] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 07:25:25 --> [REQ_ID=c3ec624d30d6] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 07:25:25 --> [REQ_ID=c3ec624d30d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 07:25:25 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:25 --> [REQ_ID=2e52b432daed] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:25:25 --> [REQ_ID=2e52b432daed] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 07:25:25 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 07:25:25 --> [REQ_ID=2e52b432daed] [PERF] Execution time=0.023732
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 07:25:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 07:25:30 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [REQUEST][END]
INFO - 2026-03-12 07:25:30 --> [REQ_ID=f8537f9aec2f] [PERF] Execution time=0.010563
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:25:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:25:30 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=36c81131537a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:25:30 --> [REQ_ID=36c81131537a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [LIFECYCLE][END] status=200 duration_ms=23.57 memory_delta=0
INFO - 2026-03-12 07:25:30 --> [REQ_ID=36c81131537a] [PERF] Execution time=0.023467
DEBUG - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [REQUEST][END]
INFO - 2026-03-12 07:25:30 --> [REQ_ID=f2f4c2336724] [PERF] Execution time=0.033451
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-12 07:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-12 07:25:41 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [REQUEST][END]
INFO - 2026-03-12 07:25:41 --> [REQ_ID=1f5f6886eff8] [PERF] Execution time=0.009999
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:25:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:25:41 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=efa72efcc1ea] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:25:41 --> [REQ_ID=efa72efcc1ea] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [LIFECYCLE][END] status=200 duration_ms=19.44 memory_delta=0
INFO - 2026-03-12 07:25:41 --> [REQ_ID=efa72efcc1ea] [PERF] Execution time=0.019211
DEBUG - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [REQUEST][END]
INFO - 2026-03-12 07:25:41 --> [REQ_ID=1e5ecd5af129] [PERF] Execution time=0.029456
DEBUG - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-12 07:25:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-12 07:25:48 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [REQUEST][END]
INFO - 2026-03-12 07:25:48 --> [REQ_ID=bdef75eda84a] [PERF] Execution time=0.015318
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:25:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:25:49 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=43c969c8512a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:25:49 --> [REQ_ID=43c969c8512a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [LIFECYCLE][END] status=200 duration_ms=87.35 memory_delta=0
INFO - 2026-03-12 07:25:49 --> [REQ_ID=43c969c8512a] [PERF] Execution time=0.087318
DEBUG - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [REQUEST][END]
INFO - 2026-03-12 07:25:49 --> [REQ_ID=cc84b9a154a0] [PERF] Execution time=0.096120
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-12 07:25:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-12 07:25:57 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [REQUEST][END]
INFO - 2026-03-12 07:25:57 --> [REQ_ID=0246582f859a] [PERF] Execution time=0.011513
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:25:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:25:57 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=c3dcd9d7b49b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:25:57 --> [REQ_ID=c3dcd9d7b49b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [FILTER_AFTER]
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [LIFECYCLE][END] status=200 duration_ms=101.63 memory_delta=0
INFO - 2026-03-12 07:25:57 --> [REQ_ID=c3dcd9d7b49b] [PERF] Execution time=0.101574
DEBUG - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [REQUEST][END]
INFO - 2026-03-12 07:25:57 --> [REQ_ID=84c61f16d400] [PERF] Execution time=0.111722
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-12 07:26:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-12 07:26:08 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [REQUEST][END]
INFO - 2026-03-12 07:26:08 --> [REQ_ID=0ef1faa4e826] [PERF] Execution time=0.010595
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:08 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=9ea859451f59] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:08 --> [REQ_ID=9ea859451f59] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [LIFECYCLE][END] status=200 duration_ms=24.11 memory_delta=0
INFO - 2026-03-12 07:26:08 --> [REQ_ID=9ea859451f59] [PERF] Execution time=0.024066
DEBUG - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [REQUEST][END]
INFO - 2026-03-12 07:26:08 --> [REQ_ID=288a2f3e7286] [PERF] Execution time=0.033071
DEBUG - 2026-03-12 07:26:18 --> [REQ_ID=c30e553657f6] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-12 07:26:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:18 --> [REQ_ID=c30e553657f6] [FILTER_BEFORE] /index.php/Getting-Started
DEBUG - 2026-03-12 07:26:18 --> [REQ_ID=c30e553657f6] [ROUTE] Controller=\App\Controllers\Home Method=gettingStarted
DEBUG - 2026-03-12 07:26:18 --> [REQ_ID=c30e553657f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Getting-Started
DEBUG - 2026-03-12 07:26:18 --> [CSRF] token name=csrf_test_name hash=77f0a8b14dbdf5b19f822a8b7706e7bb
DEBUG - 2026-03-12 07:26:18 --> [REQ_ID=2b0d72244e87] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 07:26:18 --> [REQ_ID=2b0d72244e87] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 07:26:18 --> [REQ_ID=2b0d72244e87] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 07:26:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 07:26:19 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
DEBUG - 2026-03-12 07:26:19 --> [REQ_ID=2b0d72244e87] [VIEW_RENDER] themes/public/gettingStarted
INFO - 2026-03-12 07:26:19 --> [REQ_ID=2b0d72244e87] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 07:26:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 07:26:19 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
DEBUG - 2026-03-12 07:26:19 --> [REQ_ID=c30e553657f6] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:19 --> [REQ_ID=c30e553657f6] [LIFECYCLE][END] status=200 duration_ms=581.96 memory_delta=4194304
INFO - 2026-03-12 07:26:19 --> [REQ_ID=2b0d72244e87] [PERF] Execution time=0.581567
DEBUG - 2026-03-12 07:26:19 --> [REQ_ID=c30e553657f6] [REQUEST][END]
INFO - 2026-03-12 07:26:19 --> [REQ_ID=c30e553657f6] [PERF] Execution time=0.592156
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-12 07:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-12 07:26:20 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [REQUEST][END]
INFO - 2026-03-12 07:26:20 --> [REQ_ID=55d8c939773b] [PERF] Execution time=0.009627
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:20 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=9bb71ea65e0f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:20 --> [REQ_ID=9bb71ea65e0f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [LIFECYCLE][END] status=200 duration_ms=26.99 memory_delta=0
INFO - 2026-03-12 07:26:20 --> [REQ_ID=9bb71ea65e0f] [PERF] Execution time=0.026780
DEBUG - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [REQUEST][END]
INFO - 2026-03-12 07:26:20 --> [REQ_ID=8d06741db8c8] [PERF] Execution time=0.035424
DEBUG - 2026-03-12 07:26:22 --> [REQ_ID=2ef7f647bae7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 07:26:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 07:26:26 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [REQUEST][END]
INFO - 2026-03-12 07:26:26 --> [REQ_ID=f44fe283296b] [PERF] Execution time=0.011164
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:27 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=86458ccd2220] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:27 --> [REQ_ID=86458ccd2220] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [LIFECYCLE][END] status=200 duration_ms=18.71 memory_delta=0
INFO - 2026-03-12 07:26:27 --> [REQ_ID=86458ccd2220] [PERF] Execution time=0.018593
DEBUG - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [REQUEST][END]
INFO - 2026-03-12 07:26:27 --> [REQ_ID=8f3b4820b7d1] [PERF] Execution time=0.027977
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-12 07:26:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-12 07:26:36 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [REQUEST][END]
INFO - 2026-03-12 07:26:36 --> [REQ_ID=50cebd3d867b] [PERF] Execution time=0.009972
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:36 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=7a68c48381f5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:36 --> [REQ_ID=7a68c48381f5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [LIFECYCLE][END] status=200 duration_ms=16.54 memory_delta=0
INFO - 2026-03-12 07:26:36 --> [REQ_ID=7a68c48381f5] [PERF] Execution time=0.016422
DEBUG - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [REQUEST][END]
INFO - 2026-03-12 07:26:36 --> [REQ_ID=0cc485194eb1] [PERF] Execution time=0.029542
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 07:26:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 07:26:48 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [REQUEST][END]
INFO - 2026-03-12 07:26:48 --> [REQ_ID=1f1d886b4c0f] [PERF] Execution time=0.075619
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:48 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=3891454b7fa5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:48 --> [REQ_ID=3891454b7fa5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [LIFECYCLE][END] status=200 duration_ms=60.16 memory_delta=0
INFO - 2026-03-12 07:26:48 --> [REQ_ID=3891454b7fa5] [PERF] Execution time=0.059898
DEBUG - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [REQUEST][END]
INFO - 2026-03-12 07:26:48 --> [REQ_ID=d67edda15b18] [PERF] Execution time=0.077119
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 07:26:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-12 07:26:56 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [REQUEST][END]
INFO - 2026-03-12 07:26:56 --> [REQ_ID=7275dcb31464] [PERF] Execution time=0.011679
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:26:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:26:56 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=303825330f03] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:26:56 --> [REQ_ID=303825330f03] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [FILTER_AFTER]
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [LIFECYCLE][END] status=200 duration_ms=27.58 memory_delta=0
INFO - 2026-03-12 07:26:56 --> [REQ_ID=303825330f03] [PERF] Execution time=0.027378
DEBUG - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [REQUEST][END]
INFO - 2026-03-12 07:26:56 --> [REQ_ID=1699cbc38ab5] [PERF] Execution time=0.038232
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 07:27:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-12 07:27:02 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [REQUEST][END]
INFO - 2026-03-12 07:27:02 --> [REQ_ID=a34c8d1c8e9a] [PERF] Execution time=0.009880
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:27:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:27:02 --> [CSRF] token name=csrf_test_name hash=38db18535876534d8d25a09de037c1df
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=18f780ca7c0a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:27:02 --> [REQ_ID=18f780ca7c0a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [FILTER_AFTER]
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [LIFECYCLE][END] status=200 duration_ms=16.76 memory_delta=0
INFO - 2026-03-12 07:27:02 --> [REQ_ID=18f780ca7c0a] [PERF] Execution time=0.016784
DEBUG - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [REQUEST][END]
INFO - 2026-03-12 07:27:02 --> [REQ_ID=6a2a203e1033] [PERF] Execution time=0.026596
DEBUG - 2026-03-12 07:31:22 --> [REQ_ID=416cfecb3168] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:36:22 --> [REQ_ID=92026579c7ba] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:41:22 --> [REQ_ID=8dd9be1228e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:46:22 --> [REQ_ID=c7d93cfd8a45] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:51:22 --> [REQ_ID=92060a5aa5a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 07:53:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 07:53:22 --> [CSRF] token name=csrf_test_name hash=15d5f0ee4628f76d2d67995b704e5443
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=eb8739331738] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 07:53:22 --> [REQ_ID=eb8739331738] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [FILTER_AFTER]
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [LIFECYCLE][END] status=200 duration_ms=53.39 memory_delta=0
INFO - 2026-03-12 07:53:22 --> [REQ_ID=eb8739331738] [PERF] Execution time=0.051382
DEBUG - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [REQUEST][END]
INFO - 2026-03-12 07:53:22 --> [REQ_ID=a995d761d623] [PERF] Execution time=0.093505
DEBUG - 2026-03-12 07:56:22 --> [REQ_ID=b870ef533fe2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [REQUEST][END]
INFO - 2026-03-12 08:00:01 --> [REQ_ID=eef7063ba65a] [PERF] Execution time=0.048715
DEBUG - 2026-03-12 08:01:22 --> [REQ_ID=a24e2f06880f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:06:22 --> [REQ_ID=14f73f495835] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:11:22 --> [REQ_ID=2d74576fce8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [REQUEST][END]
INFO - 2026-03-12 08:15:01 --> [REQ_ID=f09043da8e55] [PERF] Execution time=0.046176
DEBUG - 2026-03-12 08:16:22 --> [REQ_ID=45ce2854c452] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:21:22 --> [REQ_ID=a47e52c68f88] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:26:22 --> [REQ_ID=11c391749c51] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:31:22 --> [REQ_ID=414276b5ec60] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [REQUEST][START] GET /
DEBUG - 2026-03-12 08:32:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [FILTER_BEFORE] /
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 08:32:47 --> [CSRF] token name=csrf_test_name hash=725cd959b1e031bfb999c4735621a608
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 08:32:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 08:32:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 08:32:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 08:32:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [FILTER_AFTER]
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [LIFECYCLE][END] status=200 duration_ms=673.20 memory_delta=4194304
INFO - 2026-03-12 08:32:47 --> [REQ_ID=898c8ccdb4e0] [PERF] Execution time=0.671444
DEBUG - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [REQUEST][END]
INFO - 2026-03-12 08:32:47 --> [REQ_ID=f4c813a1a4b9] [PERF] Execution time=0.711875
DEBUG - 2026-03-12 08:36:22 --> [REQ_ID=e459e3114b8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:41:22 --> [REQ_ID=b4a3d07e0fb0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:46:22 --> [REQ_ID=108124a0d65e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:51:22 --> [REQ_ID=5384ea3aa743] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 08:52:26 --> [REQ_ID=0ce438f942ce] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-12 08:52:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 08:52:26 --> [REQ_ID=0ce438f942ce] [REQUEST][END]
INFO - 2026-03-12 08:52:26 --> [REQ_ID=0ce438f942ce] [PERF] Execution time=0.021442
DEBUG - 2026-03-12 08:56:22 --> [REQ_ID=cc66e8312f24] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [REQUEST][END]
INFO - 2026-03-12 09:00:02 --> [REQ_ID=7ae008ab8970] [PERF] Execution time=0.047481
DEBUG - 2026-03-12 09:01:22 --> [REQ_ID=01a40828bf28] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 09:06:22 --> [REQ_ID=7d81c9e793db] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 09:11:22 --> [REQ_ID=79a16169523f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 09:15:01 --> [REQ_ID=2e1674ec9cda] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 09:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:15:02 --> [REQ_ID=2e1674ec9cda] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 09:15:02 --> [REQ_ID=2e1674ec9cda] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 09:15:02 --> [REQ_ID=2e1674ec9cda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 09:15:02 --> [REQ_ID=2e1674ec9cda] [REQUEST][END]
INFO - 2026-03-12 09:15:02 --> [REQ_ID=2e1674ec9cda] [PERF] Execution time=0.048201
DEBUG - 2026-03-12 09:16:22 --> [REQ_ID=bfe9cd1887ce] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 09:18:09 --> [REQ_ID=bfdaf08d89b1] [REQUEST][START] GET /
DEBUG - 2026-03-12 09:18:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:18:09 --> [REQ_ID=bfdaf08d89b1] [FILTER_BEFORE] /
DEBUG - 2026-03-12 09:18:09 --> [REQ_ID=bfdaf08d89b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 09:18:09 --> [REQ_ID=bfdaf08d89b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 09:18:09 --> [CSRF] token name=csrf_test_name hash=53d87daa7fd16aa28d963871fb13417a
DEBUG - 2026-03-12 09:18:09 --> [REQ_ID=4c8d099941d6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 09:18:09 --> [REQ_ID=4c8d099941d6] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 09:18:09 --> [REQ_ID=4c8d099941d6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 09:18:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:18:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 09:18:10 --> [REQ_ID=4c8d099941d6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 09:18:10 --> [REQ_ID=4c8d099941d6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 09:18:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 09:18:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 09:18:10 --> [REQ_ID=bfdaf08d89b1] [FILTER_AFTER]
DEBUG - 2026-03-12 09:18:10 --> [REQ_ID=bfdaf08d89b1] [LIFECYCLE][END] status=200 duration_ms=707.86 memory_delta=4194304
INFO - 2026-03-12 09:18:10 --> [REQ_ID=4c8d099941d6] [PERF] Execution time=0.705725
DEBUG - 2026-03-12 09:18:10 --> [REQ_ID=bfdaf08d89b1] [REQUEST][END]
INFO - 2026-03-12 09:18:10 --> [REQ_ID=bfdaf08d89b1] [PERF] Execution time=0.749157
DEBUG - 2026-03-12 09:46:11 --> [REQ_ID=e056c0c84280] [REQUEST][START] GET /
DEBUG - 2026-03-12 09:46:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:11 --> [REQ_ID=e056c0c84280] [FILTER_BEFORE] /
DEBUG - 2026-03-12 09:46:11 --> [REQ_ID=e056c0c84280] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 09:46:11 --> [REQ_ID=e056c0c84280] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 09:46:11 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:11 --> [REQ_ID=6f4c1d6b786d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 09:46:11 --> [REQ_ID=6f4c1d6b786d] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 09:46:12 --> [REQ_ID=6f4c1d6b786d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 09:46:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:46:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 09:46:12 --> [REQ_ID=6f4c1d6b786d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 09:46:12 --> [REQ_ID=6f4c1d6b786d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 09:46:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 09:46:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 09:46:12 --> [REQ_ID=e056c0c84280] [FILTER_AFTER]
DEBUG - 2026-03-12 09:46:12 --> [REQ_ID=e056c0c84280] [LIFECYCLE][END] status=200 duration_ms=704.44 memory_delta=4194304
INFO - 2026-03-12 09:46:12 --> [REQ_ID=6f4c1d6b786d] [PERF] Execution time=0.702381
DEBUG - 2026-03-12 09:46:12 --> [REQ_ID=e056c0c84280] [REQUEST][END]
INFO - 2026-03-12 09:46:12 --> [REQ_ID=e056c0c84280] [PERF] Execution time=0.743588
DEBUG - 2026-03-12 09:46:17 --> [REQ_ID=1adc9f1436a2] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 09:46:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:17 --> [REQ_ID=1adc9f1436a2] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 09:46:17 --> [REQ_ID=1adc9f1436a2] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 09:46:17 --> [REQ_ID=1adc9f1436a2] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 09:46:17 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
INFO - 2026-03-12 09:46:17 --> CSRF token verified.
DEBUG - 2026-03-12 09:46:17 --> [REQ_ID=12fb4464b49d] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 09:46:17 --> [REQ_ID=12fb4464b49d] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 09:46:17 --> [REGISTRATION] Submission received
INFO - 2026-03-12 09:46:17 --> MailService queued email
INFO - 2026-03-12 09:46:17 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 09:46:17 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 09:46:17 --> Registration created user_id=11717, email=fanks1221@ymail.ne.jp, username=CJxJfEorCKotmRlKFVD, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 09:46:17 --> [REGISTRATION] User record created
INFO - 2026-03-12 09:46:17 --> OnboardingProgressService: created onboarding record for user_id=11717
INFO - 2026-03-12 09:46:18 --> Registration succeeded for fanks1221@ymail.ne.jp (event 5d692cf5fae70779)
INFO - 2026-03-12 09:46:18 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 09:46:18 --> Registration redirecting to success guide for user_id=11717
DEBUG - 2026-03-12 09:46:18 --> [REQ_ID=1adc9f1436a2] [FILTER_AFTER]
DEBUG - 2026-03-12 09:46:18 --> [REQ_ID=1adc9f1436a2] [LIFECYCLE][END] status=303 duration_ms=1,396.58 memory_delta=0
INFO - 2026-03-12 09:46:18 --> [REQ_ID=12fb4464b49d] [PERF] Execution time=1.396123
DEBUG - 2026-03-12 09:46:18 --> [REQ_ID=1adc9f1436a2] [REQUEST][END]
INFO - 2026-03-12 09:46:18 --> [REQ_ID=1adc9f1436a2] [PERF] Execution time=1.409627
DEBUG - 2026-03-12 09:46:19 --> [REQ_ID=f9f587c45c53] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 09:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:19 --> [REQ_ID=f9f587c45c53] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 09:46:19 --> [REQ_ID=f9f587c45c53] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 09:46:19 --> [REQ_ID=f9f587c45c53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 09:46:19 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:19 --> [REQ_ID=06ccf2dd92fc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:46:19 --> [REQ_ID=06ccf2dd92fc] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 09:46:19 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 09:46:19 --> [REQ_ID=06ccf2dd92fc] [PERF] Execution time=0.010650
DEBUG - 2026-03-12 09:46:32 --> [REQ_ID=77a5188f0257] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 09:46:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:32 --> [REQ_ID=77a5188f0257] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 09:46:32 --> [REQ_ID=77a5188f0257] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 09:46:32 --> [REQ_ID=77a5188f0257] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 09:46:32 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:32 --> [REQ_ID=a6c70c9e6d81] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 09:46:32 --> [REQ_ID=a6c70c9e6d81] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:46:33 --> [REQ_ID=a6c70c9e6d81] [METHOD_ENTRY] show
DEBUG - 2026-03-12 09:46:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:46:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 09:46:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 09:46:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 09:46:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 09:46:33 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 09:46:33 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 09:46:33 --> [REQ_ID=a6c70c9e6d81] [PERF] Execution time=0.135073
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 09:46:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 09:46:38 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [REQUEST][END]
INFO - 2026-03-12 09:46:38 --> [REQ_ID=8ea0a7801874] [PERF] Execution time=0.010470
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:46:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:46:38 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=5803ee513ed0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:46:38 --> [REQ_ID=5803ee513ed0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [FILTER_AFTER]
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [LIFECYCLE][END] status=200 duration_ms=21.06 memory_delta=0
INFO - 2026-03-12 09:46:38 --> [REQ_ID=5803ee513ed0] [PERF] Execution time=0.020980
DEBUG - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [REQUEST][END]
INFO - 2026-03-12 09:46:38 --> [REQ_ID=d78050db9a86] [PERF] Execution time=0.030572
DEBUG - 2026-03-12 09:46:48 --> [REQ_ID=aad53e36334e] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 09:46:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:48 --> [REQ_ID=aad53e36334e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:46:48 --> [REQ_ID=aad53e36334e] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 09:46:48 --> [REQ_ID=aad53e36334e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:46:48 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
INFO - 2026-03-12 09:46:48 --> CSRF token verified.
DEBUG - 2026-03-12 09:46:48 --> [REQ_ID=34d7dbd7501e] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 09:46:48 --> [REQ_ID=34d7dbd7501e] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 09:46:48 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 09:46:48 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 09:46:48 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 171.25.193.35, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 09:46:48 --> Auth attemptLogin() called with login identifier: fanks1221@ymail.ne.jp, remember: true
DEBUG - 2026-03-12 09:46:48 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 09:46:48 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 09:46:49 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 09:46:49 --> Auth attempt failed for identifier fanks1221@ymail.ne.jp. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 09:46:49 --> [AUTH] Login failure
WARNING - 2026-03-12 09:46:49 --> [AUTH] Login failed
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=aad53e36334e] [FILTER_AFTER]
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=aad53e36334e] [LIFECYCLE][END] status=303 duration_ms=342.59 memory_delta=0
INFO - 2026-03-12 09:46:49 --> [REQ_ID=34d7dbd7501e] [PERF] Execution time=0.342539
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=aad53e36334e] [REQUEST][END]
INFO - 2026-03-12 09:46:49 --> [REQ_ID=aad53e36334e] [PERF] Execution time=0.352555
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:46:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:46:49 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=f5f9514c0d65] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:46:49 --> [REQ_ID=f5f9514c0d65] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [FILTER_AFTER]
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [LIFECYCLE][END] status=200 duration_ms=16.90 memory_delta=0
INFO - 2026-03-12 09:46:49 --> [REQ_ID=f5f9514c0d65] [PERF] Execution time=0.016819
DEBUG - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [REQUEST][END]
INFO - 2026-03-12 09:46:49 --> [REQ_ID=71ceb23a83b3] [PERF] Execution time=0.026730
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:47:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:47:02 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=97d7d3256bb3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:47:02 --> [REQ_ID=97d7d3256bb3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [LIFECYCLE][END] status=200 duration_ms=29.85 memory_delta=0
INFO - 2026-03-12 09:47:02 --> [REQ_ID=97d7d3256bb3] [PERF] Execution time=0.029571
DEBUG - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [REQUEST][END]
INFO - 2026-03-12 09:47:02 --> [REQ_ID=19a17b549a9c] [PERF] Execution time=0.039004
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=ecea74edad30] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 09:47:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=ecea74edad30] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=ecea74edad30] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=ecea74edad30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 09:47:09 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=be21bb99efd2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 09:47:09 --> [REQ_ID=be21bb99efd2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:09 --> [REQ_ID=be21bb99efd2] [METHOD_ENTRY] show
DEBUG - 2026-03-12 09:47:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:47:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 09:47:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 09:47:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 09:47:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 09:47:09 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 09:47:09 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 09:47:09 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 09:47:09 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 09:47:09 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 09:47:09 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 09:47:09 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 09:47:09 --> [REQ_ID=be21bb99efd2] [PERF] Execution time=0.039494
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 09:47:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 09:47:12 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [METHOD_ENTRY] index
DEBUG - 2026-03-12 09:47:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:47:12 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 09:47:12 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 09:47:12 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 09:47:12 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 09:47:12 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 09:47:12 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [LIFECYCLE][END] status=200 duration_ms=28.33 memory_delta=0
INFO - 2026-03-12 09:47:12 --> [REQ_ID=d701547d02a3] [PERF] Execution time=0.028082
DEBUG - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [REQUEST][END]
INFO - 2026-03-12 09:47:12 --> [REQ_ID=297ad8347423] [PERF] Execution time=0.038289
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=194a9185626e] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-12 09:47:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=194a9185626e] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=194a9185626e] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=194a9185626e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-12 09:47:18 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
INFO - 2026-03-12 09:47:18 --> CSRF token verified.
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=a367472872ad] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-12 09:47:18 --> [REQ_ID=a367472872ad] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:18 --> [REQ_ID=a367472872ad] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-12 09:47:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:47:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 09:47:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 09:47:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 09:47:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 09:47:18 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 09:47:18 --> [SUPPORT] Account help requested
INFO - 2026-03-12 09:47:19 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=194a9185626e] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=194a9185626e] [LIFECYCLE][END] status=303 duration_ms=1,055.33 memory_delta=0
INFO - 2026-03-12 09:47:19 --> [REQ_ID=a367472872ad] [PERF] Execution time=1.055177
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=194a9185626e] [REQUEST][END]
INFO - 2026-03-12 09:47:19 --> [REQ_ID=194a9185626e] [PERF] Execution time=1.065735
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 09:47:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 09:47:19 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [METHOD_ENTRY] index
DEBUG - 2026-03-12 09:47:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 09:47:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 09:47:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 09:47:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 09:47:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 09:47:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 09:47:19 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [LIFECYCLE][END] status=200 duration_ms=31.16 memory_delta=0
INFO - 2026-03-12 09:47:19 --> [REQ_ID=109c1ca5944d] [PERF] Execution time=0.030960
DEBUG - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [REQUEST][END]
INFO - 2026-03-12 09:47:19 --> [REQ_ID=11fc0b65ab83] [PERF] Execution time=0.040404
DEBUG - 2026-03-12 09:47:33 --> [REQ_ID=95b735487142] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 09:47:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:33 --> [REQ_ID=95b735487142] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 09:47:33 --> [REQ_ID=95b735487142] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 09:47:33 --> [REQ_ID=95b735487142] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 09:47:33 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:33 --> [REQ_ID=0c2644fc6393] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:47:33 --> [REQ_ID=0c2644fc6393] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 09:47:33 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 09:47:33 --> [REQ_ID=0c2644fc6393] [PERF] Execution time=0.188081
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 09:47:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 09:47:37 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [LIFECYCLE][END] status=200 duration_ms=3.17 memory_delta=0
DEBUG - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [REQUEST][END]
INFO - 2026-03-12 09:47:37 --> [REQ_ID=805644099c8b] [PERF] Execution time=0.014704
DEBUG - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 09:47:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 09:47:42 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [REQUEST][END]
INFO - 2026-03-12 09:47:42 --> [REQ_ID=011f787b59a7] [PERF] Execution time=0.014794
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:47:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:47:43 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=b0e85f47760c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:47:43 --> [REQ_ID=b0e85f47760c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [LIFECYCLE][END] status=200 duration_ms=29.46 memory_delta=0
INFO - 2026-03-12 09:47:43 --> [REQ_ID=b0e85f47760c] [PERF] Execution time=0.029431
DEBUG - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [REQUEST][END]
INFO - 2026-03-12 09:47:43 --> [REQ_ID=34cfdfcd5623] [PERF] Execution time=0.038511
DEBUG - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-12 09:47:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-12 09:47:54 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [REQUEST][END]
INFO - 2026-03-12 09:47:54 --> [REQ_ID=1222d53c3d0a] [PERF] Execution time=0.010110
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:47:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:47:55 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=759a7cce9a12] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:47:55 --> [REQ_ID=759a7cce9a12] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [FILTER_AFTER]
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [LIFECYCLE][END] status=200 duration_ms=94.60 memory_delta=0
INFO - 2026-03-12 09:47:55 --> [REQ_ID=759a7cce9a12] [PERF] Execution time=0.094484
DEBUG - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [REQUEST][END]
INFO - 2026-03-12 09:47:55 --> [REQ_ID=cc1639ad1074] [PERF] Execution time=0.103658
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 09:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 09:48:01 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [REQUEST][END]
INFO - 2026-03-12 09:48:01 --> [REQ_ID=6c4fcfb8ddda] [PERF] Execution time=0.010030
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 09:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 09:48:01 --> [CSRF] token name=csrf_test_name hash=31904fd1b6808bdd1b916376bdf233ee
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=72b0dcca6d8e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 09:48:01 --> [REQ_ID=72b0dcca6d8e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [FILTER_AFTER]
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [LIFECYCLE][END] status=200 duration_ms=16.19 memory_delta=0
INFO - 2026-03-12 09:48:01 --> [REQ_ID=72b0dcca6d8e] [PERF] Execution time=0.015961
DEBUG - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [REQUEST][END]
INFO - 2026-03-12 09:48:01 --> [REQ_ID=e79aecb8d28e] [PERF] Execution time=0.025289
DEBUG - 2026-03-12 09:49:25 --> [REQ_ID=e314d41071b9] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-12 09:49:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:49:25 --> [REQ_ID=e314d41071b9] [REQUEST][END]
INFO - 2026-03-12 09:49:25 --> [REQ_ID=e314d41071b9] [PERF] Execution time=0.041642
DEBUG - 2026-03-12 09:59:46 --> [REQ_ID=d7709407713e] [REQUEST][START] GET /
DEBUG - 2026-03-12 09:59:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 09:59:46 --> [REQ_ID=d7709407713e] [REQUEST][END]
INFO - 2026-03-12 09:59:46 --> [REQ_ID=d7709407713e] [PERF] Execution time=0.038602
DEBUG - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [REQUEST][END]
INFO - 2026-03-12 10:00:01 --> [REQ_ID=4ff01c59eb9b] [PERF] Execution time=0.019573
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=4c853688ab3d] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:01:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=4c853688ab3d] [FILTER_BEFORE] /
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=4c853688ab3d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=4c853688ab3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 10:01:05 --> [CSRF] token name=csrf_test_name hash=3dde5eb734a3bfc403fcf189df3473d4
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=a54ebb103c56] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 10:01:05 --> [REQ_ID=a54ebb103c56] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 10:01:05 --> [REQ_ID=a54ebb103c56] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 10:01:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 10:01:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:01:05 --> [REQ_ID=a54ebb103c56] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 10:01:05 --> [REQ_ID=a54ebb103c56] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 10:01:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 10:01:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:01:06 --> [REQ_ID=4c853688ab3d] [FILTER_AFTER]
DEBUG - 2026-03-12 10:01:06 --> [REQ_ID=4c853688ab3d] [LIFECYCLE][END] status=200 duration_ms=608.97 memory_delta=4194304
INFO - 2026-03-12 10:01:06 --> [REQ_ID=a54ebb103c56] [PERF] Execution time=0.607391
DEBUG - 2026-03-12 10:01:06 --> [REQ_ID=4c853688ab3d] [REQUEST][END]
INFO - 2026-03-12 10:01:06 --> [REQ_ID=4c853688ab3d] [PERF] Execution time=0.618246
DEBUG - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-12 10:09:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-12 10:09:01 --> [CSRF] token name=csrf_test_name hash=506dc3f356484a25531936ab0599a460
DEBUG - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [REQUEST][END]
INFO - 2026-03-12 10:09:01 --> [REQ_ID=fd0d8c6cebad] [PERF] Execution time=0.064033
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 10:09:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 10:09:02 --> [CSRF] token name=csrf_test_name hash=5e08311ff39fadcb7faf6eaa21ea8046
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=b3a617e11d58] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 10:09:02 --> [REQ_ID=b3a617e11d58] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [FILTER_AFTER]
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [LIFECYCLE][END] status=200 duration_ms=193.73 memory_delta=0
INFO - 2026-03-12 10:09:02 --> [REQ_ID=b3a617e11d58] [PERF] Execution time=0.193426
DEBUG - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [REQUEST][END]
INFO - 2026-03-12 10:09:02 --> [REQ_ID=278257319b89] [PERF] Execution time=0.207456
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:12:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [FILTER_BEFORE] /
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 10:12:22 --> [CSRF] token name=csrf_test_name hash=66888c91940b86e7f3835a7aca3ab0e7
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 10:12:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 10:12:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 10:12:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 10:12:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [FILTER_AFTER]
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [LIFECYCLE][END] status=200 duration_ms=644.53 memory_delta=4194304
INFO - 2026-03-12 10:12:22 --> [REQ_ID=616a86ebc687] [PERF] Execution time=0.642476
DEBUG - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [REQUEST][END]
INFO - 2026-03-12 10:12:22 --> [REQ_ID=8dfe1b2ecdd2] [PERF] Execution time=0.684407
DEBUG - 2026-03-12 10:13:19 --> [REQ_ID=a62de326641b] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:13:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:13:19 --> [REQ_ID=a62de326641b] [FILTER_BEFORE] /
DEBUG - 2026-03-12 10:13:19 --> [REQ_ID=a62de326641b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 10:13:19 --> [REQ_ID=a62de326641b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 10:13:19 --> [CSRF] token name=csrf_test_name hash=160e209fc68c623fc46e05807fdb14b3
DEBUG - 2026-03-12 10:13:19 --> [REQ_ID=01413ccf42d6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 10:13:19 --> [REQ_ID=01413ccf42d6] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 10:13:19 --> [REQ_ID=01413ccf42d6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 10:13:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 10:13:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:13:20 --> [REQ_ID=01413ccf42d6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 10:13:20 --> [REQ_ID=01413ccf42d6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 10:13:20 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 10:13:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:13:20 --> [REQ_ID=a62de326641b] [FILTER_AFTER]
DEBUG - 2026-03-12 10:13:20 --> [REQ_ID=a62de326641b] [LIFECYCLE][END] status=200 duration_ms=778.38 memory_delta=2097152
INFO - 2026-03-12 10:13:20 --> [REQ_ID=01413ccf42d6] [PERF] Execution time=0.778043
DEBUG - 2026-03-12 10:13:20 --> [REQ_ID=a62de326641b] [REQUEST][END]
INFO - 2026-03-12 10:13:20 --> [REQ_ID=a62de326641b] [PERF] Execution time=0.788308
DEBUG - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [REQUEST][END]
INFO - 2026-03-12 10:15:02 --> [REQ_ID=872b60c1cf7f] [PERF] Execution time=0.045444
DEBUG - 2026-03-12 10:17:50 --> [REQ_ID=488cee74e281] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-12 10:17:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:17:50 --> [REQ_ID=488cee74e281] [REQUEST][END]
INFO - 2026-03-12 10:17:50 --> [REQ_ID=488cee74e281] [PERF] Execution time=0.036272
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:18:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [FILTER_BEFORE] /
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 10:18:03 --> [CSRF] token name=csrf_test_name hash=5e971343be7df549305ad1742129c1cf
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 10:18:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 10:18:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 10:18:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 10:18:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [FILTER_AFTER]
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [LIFECYCLE][END] status=200 duration_ms=659.26 memory_delta=4194304
INFO - 2026-03-12 10:18:03 --> [REQ_ID=72059068b4b3] [PERF] Execution time=0.657202
DEBUG - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [REQUEST][END]
INFO - 2026-03-12 10:18:03 --> [REQ_ID=db2762570c43] [PERF] Execution time=0.673493
DEBUG - 2026-03-12 10:18:17 --> [REQ_ID=748dd91598d9] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:18:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:18:17 --> [REQ_ID=748dd91598d9] [FILTER_BEFORE] /
DEBUG - 2026-03-12 10:18:17 --> [REQ_ID=748dd91598d9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 10:18:17 --> [REQ_ID=748dd91598d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 10:18:17 --> [CSRF] token name=csrf_test_name hash=bd767ba7cf6c383b89494c2f388a69c7
DEBUG - 2026-03-12 10:18:17 --> [REQ_ID=632809171155] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 10:18:17 --> [REQ_ID=632809171155] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 10:18:17 --> [REQ_ID=632809171155] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 10:18:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 10:18:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:18:18 --> [REQ_ID=632809171155] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 10:18:18 --> [REQ_ID=632809171155] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 10:18:18 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 10:18:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 10:18:18 --> [REQ_ID=748dd91598d9] [FILTER_AFTER]
DEBUG - 2026-03-12 10:18:18 --> [REQ_ID=748dd91598d9] [LIFECYCLE][END] status=200 duration_ms=686.61 memory_delta=2097152
INFO - 2026-03-12 10:18:18 --> [REQ_ID=632809171155] [PERF] Execution time=0.686353
DEBUG - 2026-03-12 10:18:18 --> [REQ_ID=748dd91598d9] [REQUEST][END]
INFO - 2026-03-12 10:18:18 --> [REQ_ID=748dd91598d9] [PERF] Execution time=0.696943
DEBUG - 2026-03-12 10:21:22 --> [REQ_ID=7bef0081c6fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:24:27 --> [REQ_ID=378bc1694aeb] [REQUEST][START] GET /
DEBUG - 2026-03-12 10:24:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:24:27 --> [REQ_ID=378bc1694aeb] [REQUEST][END]
INFO - 2026-03-12 10:24:27 --> [REQ_ID=378bc1694aeb] [PERF] Execution time=0.038383
DEBUG - 2026-03-12 10:26:22 --> [REQ_ID=cf2174fe5796] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:31:22 --> [REQ_ID=af2df810cf32] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:32:19 --> [REQ_ID=7bd6963e3627] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 10:32:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 10:32:19 --> [REQ_ID=7bd6963e3627] [REQUEST][END]
INFO - 2026-03-12 10:32:19 --> [REQ_ID=7bd6963e3627] [PERF] Execution time=0.023025
DEBUG - 2026-03-12 10:36:22 --> [REQ_ID=ec08262500e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:41:22 --> [REQ_ID=9ed90891adb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:46:22 --> [REQ_ID=c51a9ec5433f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:51:22 --> [REQ_ID=c2c04892fc60] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 10:56:22 --> [REQ_ID=18bc3e96ff6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [REQUEST][END]
INFO - 2026-03-12 11:00:01 --> [REQ_ID=72513b070c92] [PERF] Execution time=0.041602
DEBUG - 2026-03-12 11:01:22 --> [REQ_ID=ad4f5441c99b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:06:22 --> [REQ_ID=0f3ad233ab62] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:11:22 --> [REQ_ID=9cb83f1f197f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:12:23 --> [REQ_ID=3fbda922b729] [REQUEST][START] GET /
DEBUG - 2026-03-12 11:12:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 11:12:23 --> [REQ_ID=3fbda922b729] [REQUEST][END]
INFO - 2026-03-12 11:12:23 --> [REQ_ID=3fbda922b729] [PERF] Execution time=0.017538
DEBUG - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [REQUEST][END]
INFO - 2026-03-12 11:15:01 --> [REQ_ID=7da092d0fe76] [PERF] Execution time=0.053372
DEBUG - 2026-03-12 11:16:22 --> [REQ_ID=699daa141d9e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:21:22 --> [REQ_ID=bcb00262ff19] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:26:22 --> [REQ_ID=cb56fec843c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:31:22 --> [REQ_ID=d76b656bf5a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:36:22 --> [REQ_ID=f27045e45d35] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:41:22 --> [REQ_ID=d8ea1c036f65] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:43:58 --> [REQ_ID=ff29a39e0f9e] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 11:43:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 11:43:58 --> [REQ_ID=ff29a39e0f9e] [REQUEST][END]
INFO - 2026-03-12 11:43:58 --> [REQ_ID=ff29a39e0f9e] [PERF] Execution time=0.042328
DEBUG - 2026-03-12 11:44:58 --> [REQ_ID=04563c345c1c] [REQUEST][START] HEAD /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 11:44:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:44:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: How-It-Works/Registering-An-Account]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:44:58 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:44:58 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
WARNING - 2026-03-12 11:44:58 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account | referrer: none
DEBUG - 2026-03-12 11:46:22 --> [REQ_ID=884f7d3073ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:51:22 --> [REQ_ID=6039b13fa893] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 11:56:22 --> [REQ_ID=176a42b5e922] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [REQUEST][END]
INFO - 2026-03-12 12:00:01 --> [REQ_ID=fab38cc59c3c] [PERF] Execution time=0.048001
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=8b6d451af3e8] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-12 12:00:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=8b6d451af3e8] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=8b6d451af3e8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=8b6d451af3e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-03-12 12:00:57 --> [CSRF] token name=csrf_test_name hash=9272e682e357fb84e871789ef7373a8b
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=299d372bd977] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:00:57 --> [REQ_ID=299d372bd977] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:00:57 --> [REQ_ID=299d372bd977] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:00:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:00:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:00:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:00:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:00:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:00:57 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:00:57 --> HowItWorksController failure: earnings
CRITICAL - 2026-03-12 12:00:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/earnings]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:00:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:00:57 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/earnings
WARNING - 2026-03-12 12:00:57 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/earnings | referrer: none
INFO - 2026-03-12 12:00:57 --> [REQ_ID=299d372bd977] [PERF] Execution time=0.216235
DEBUG - 2026-03-12 12:01:22 --> [REQ_ID=cc186c561d34] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:06:22 --> [REQ_ID=94736180517c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:09:36 --> [REQ_ID=63d4e61e5233] [REQUEST][START] GET /
DEBUG - 2026-03-12 12:09:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:09:36 --> [REQ_ID=63d4e61e5233] [FILTER_BEFORE] /
DEBUG - 2026-03-12 12:09:36 --> [REQ_ID=63d4e61e5233] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:09:36 --> [REQ_ID=63d4e61e5233] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:09:36 --> [CSRF] token name=csrf_test_name hash=2bb8a14da9baa99162127549fe711c02
DEBUG - 2026-03-12 12:09:36 --> [REQ_ID=916154ce9b13] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:09:36 --> [REQ_ID=916154ce9b13] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 12:09:36 --> [REQ_ID=916154ce9b13] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:09:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:09:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 12:09:37 --> [REQ_ID=916154ce9b13] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:09:37 --> [REQ_ID=916154ce9b13] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 12:09:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 12:09:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 12:09:37 --> [REQ_ID=63d4e61e5233] [FILTER_AFTER]
DEBUG - 2026-03-12 12:09:37 --> [REQ_ID=63d4e61e5233] [LIFECYCLE][END] status=200 duration_ms=687.65 memory_delta=4194304
INFO - 2026-03-12 12:09:37 --> [REQ_ID=916154ce9b13] [PERF] Execution time=0.685652
DEBUG - 2026-03-12 12:09:37 --> [REQ_ID=63d4e61e5233] [REQUEST][END]
INFO - 2026-03-12 12:09:37 --> [REQ_ID=63d4e61e5233] [PERF] Execution time=0.726934
DEBUG - 2026-03-12 12:11:22 --> [REQ_ID=cf950cc6749e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:12:48 --> [REQ_ID=4a5e18ad2190] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-12 12:12:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:12:48 --> [REQ_ID=4a5e18ad2190] [REQUEST][END]
INFO - 2026-03-12 12:12:48 --> [REQ_ID=4a5e18ad2190] [PERF] Execution time=0.045990
DEBUG - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [REQUEST][END]
INFO - 2026-03-12 12:15:01 --> [REQ_ID=34f3648d6c5b] [PERF] Execution time=0.044904
DEBUG - 2026-03-12 12:16:22 --> [REQ_ID=084494376860] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:21:22 --> [REQ_ID=6b21a01e064f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:24:24 --> [REQ_ID=a9bfe31f6188] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-12 12:24:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:24:24 --> [REQ_ID=a9bfe31f6188] [REQUEST][END]
INFO - 2026-03-12 12:24:24 --> [REQ_ID=a9bfe31f6188] [PERF] Execution time=0.038603
DEBUG - 2026-03-12 12:26:22 --> [REQ_ID=8d6d79cf67fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:31:22 --> [REQ_ID=f8fd9dd3c991] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [REQUEST][START] GET /
DEBUG - 2026-03-12 12:31:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [FILTER_BEFORE] /
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:31:31 --> [CSRF] token name=csrf_test_name hash=21094a161ebb803f7a9497e8628ac20c
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:31:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:31 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:31:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [LIFECYCLE][END] status=200 duration_ms=814.50 memory_delta=4194304
INFO - 2026-03-12 12:31:31 --> [REQ_ID=c8fde3d7c23e] [PERF] Execution time=0.812426
DEBUG - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [REQUEST][END]
INFO - 2026-03-12 12:31:31 --> [REQ_ID=95abc48863b0] [PERF] Execution time=0.833317
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-12 12:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-12 12:31:43 --> [CSRF] token name=csrf_test_name hash=82d5fe7df9c7d4e00172b7840005e36e
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [METHOD_ENTRY] index
DEBUG - 2026-03-12 12:31:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 12:31:43 --> themesMemory usage: 6291456
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [LIFECYCLE][END] status=200 duration_ms=160.71 memory_delta=0
INFO - 2026-03-12 12:31:43 --> [REQ_ID=5886eafcbda2] [PERF] Execution time=0.160377
DEBUG - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [REQUEST][END]
INFO - 2026-03-12 12:31:43 --> [REQ_ID=f3e515fe568a] [PERF] Execution time=0.175739
DEBUG - 2026-03-12 12:31:44 --> [REQ_ID=89be92ba2327] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-12 12:31:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:44 --> [REQ_ID=89be92ba2327] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-12 12:31:44 --> [REQ_ID=89be92ba2327] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-12 12:31:44 --> [REQ_ID=89be92ba2327] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-12 12:31:44 --> [CSRF] token name=csrf_test_name hash=22113bffdabba7c9a74d1c595db2bde9
DEBUG - 2026-03-12 12:31:44 --> [REQ_ID=e8f035a12776] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:31:44 --> [REQ_ID=e8f035a12776] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 12:31:44 --> [REQ_ID=e8f035a12776] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:31:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:45 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:31:45 --> [REQ_ID=e8f035a12776] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-12 12:31:45 --> [REQ_ID=e8f035a12776] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:31:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:45 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-12 12:31:45 --> [REQ_ID=89be92ba2327] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:45 --> [REQ_ID=89be92ba2327] [LIFECYCLE][END] status=200 duration_ms=667.56 memory_delta=2097152
INFO - 2026-03-12 12:31:45 --> [REQ_ID=e8f035a12776] [PERF] Execution time=0.667247
DEBUG - 2026-03-12 12:31:45 --> [REQ_ID=89be92ba2327] [REQUEST][END]
INFO - 2026-03-12 12:31:45 --> [REQ_ID=89be92ba2327] [PERF] Execution time=0.677965
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-12 12:31:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-12 12:31:46 --> [CSRF] token name=csrf_test_name hash=b3b2abf3a2036074748a8cc9d47de1d0
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:31:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:46 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:31:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:46 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [LIFECYCLE][END] status=200 duration_ms=647.18 memory_delta=2097152
INFO - 2026-03-12 12:31:46 --> [REQ_ID=4b326759f687] [PERF] Execution time=0.646863
DEBUG - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [REQUEST][END]
INFO - 2026-03-12 12:31:46 --> [REQ_ID=7723de82ad4c] [PERF] Execution time=0.656908
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-12 12:31:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-03-12 12:31:48 --> [CSRF] token name=csrf_test_name hash=59df807a0101db54cc394ea1d8048f06
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [REQUEST][END]
INFO - 2026-03-12 12:31:48 --> [REQ_ID=7a10b101272d] [PERF] Execution time=0.013691
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:31:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:31:48 --> [CSRF] token name=csrf_test_name hash=565cb7c7509b6a99a61ac84369e623c5
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=73b351de7a72] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:31:48 --> [REQ_ID=73b351de7a72] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [LIFECYCLE][END] status=200 duration_ms=23.51 memory_delta=0
INFO - 2026-03-12 12:31:48 --> [REQ_ID=73b351de7a72] [PERF] Execution time=0.023361
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [REQUEST][END]
INFO - 2026-03-12 12:31:48 --> [REQ_ID=2ff2e3d28f35] [PERF] Execution time=0.037182
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=4d092bb8d7de] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-12 12:31:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=4d092bb8d7de] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=4d092bb8d7de] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=4d092bb8d7de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:31:48 --> [CSRF] token name=csrf_test_name hash=8b1252b09c03845190d9344a231d69a2
DEBUG - 2026-03-12 12:31:48 --> [REQ_ID=742ea23e2bb2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:31:48 --> [REQ_ID=742ea23e2bb2] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 12:31:48 --> [REQ_ID=742ea23e2bb2] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 12:31:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:31:49 --> [REQ_ID=742ea23e2bb2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:31:49 --> [REQ_ID=742ea23e2bb2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:31:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:31:49 --> [REQ_ID=4d092bb8d7de] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:49 --> [REQ_ID=4d092bb8d7de] [LIFECYCLE][END] status=200 duration_ms=606.26 memory_delta=4194304
INFO - 2026-03-12 12:31:49 --> [REQ_ID=742ea23e2bb2] [PERF] Execution time=0.606025
DEBUG - 2026-03-12 12:31:49 --> [REQ_ID=4d092bb8d7de] [REQUEST][END]
INFO - 2026-03-12 12:31:49 --> [REQ_ID=4d092bb8d7de] [PERF] Execution time=0.615033
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=e6f79967dc28] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 12:31:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=e6f79967dc28] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=e6f79967dc28] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=e6f79967dc28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 12:31:51 --> [CSRF] token name=csrf_test_name hash=3237db4a36c6401f173d03d136cc18c2
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=483aeb524d2f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:51 --> [REQ_ID=483aeb524d2f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:31:51 --> [REQ_ID=483aeb524d2f] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:31:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:51 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:51 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:51 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:51 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:51 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:31:51 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 12:31:51 --> [REQ_ID=483aeb524d2f] [PERF] Execution time=0.032920
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=4117e3763983] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 12:31:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=4117e3763983] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=4117e3763983] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=4117e3763983] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-12 12:31:52 --> [CSRF] token name=csrf_test_name hash=1e3b5751e1bb7f736e3390f006174135
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=a02b1ff3b801] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:52 --> [REQ_ID=a02b1ff3b801] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:52 --> [REQ_ID=a02b1ff3b801] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-12 12:31:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:31:52 --> [REQ_ID=a02b1ff3b801] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 12:31:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:53 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=4117e3763983] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=4117e3763983] [LIFECYCLE][END] status=200 duration_ms=669.51 memory_delta=4194304
INFO - 2026-03-12 12:31:53 --> [REQ_ID=a02b1ff3b801] [PERF] Execution time=0.669020
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=4117e3763983] [REQUEST][END]
INFO - 2026-03-12 12:31:53 --> [REQ_ID=4117e3763983] [PERF] Execution time=0.679731
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=24d0c37cd3ef] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 12:31:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=24d0c37cd3ef] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=24d0c37cd3ef] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=24d0c37cd3ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-12 12:31:53 --> [CSRF] token name=csrf_test_name hash=86ab450f66fccc927233769747c1b09e
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=9e76c8b2bc81] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:53 --> [REQ_ID=9e76c8b2bc81] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:31:53 --> [REQ_ID=9e76c8b2bc81] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-12 12:31:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:31:53 --> [REQ_ID=9e76c8b2bc81] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 12:31:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:31:54 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=24d0c37cd3ef] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=24d0c37cd3ef] [LIFECYCLE][END] status=200 duration_ms=676.35 memory_delta=2097152
INFO - 2026-03-12 12:31:54 --> [REQ_ID=9e76c8b2bc81] [PERF] Execution time=0.676146
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=24d0c37cd3ef] [REQUEST][END]
INFO - 2026-03-12 12:31:54 --> [REQ_ID=24d0c37cd3ef] [PERF] Execution time=0.685075
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=18eb2276904b] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 12:31:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=18eb2276904b] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=18eb2276904b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=18eb2276904b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 12:31:54 --> [CSRF] token name=csrf_test_name hash=f8e0b0d9598e50706d11923f2ff7fd20
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=3b91672475e0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:54 --> [REQ_ID=3b91672475e0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:31:54 --> [REQ_ID=3b91672475e0] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:31:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:54 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:31:54 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 12:31:54 --> [REQ_ID=3b91672475e0] [PERF] Execution time=0.023509
DEBUG - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-12 12:31:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-12 12:31:55 --> [CSRF] token name=csrf_test_name hash=ac335a5eca3f5dc4074fc13b7e188682
DEBUG - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [REQUEST][END]
INFO - 2026-03-12 12:31:55 --> [REQ_ID=777228e4ee0d] [PERF] Execution time=0.013684
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:31:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:31:56 --> [CSRF] token name=csrf_test_name hash=c7cf04de09b3f98475a412e95a7f000d
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=d8d98664153e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:31:56 --> [REQ_ID=d8d98664153e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [FILTER_AFTER]
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [LIFECYCLE][END] status=200 duration_ms=18.89 memory_delta=0
INFO - 2026-03-12 12:31:56 --> [REQ_ID=d8d98664153e] [PERF] Execution time=0.018630
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [REQUEST][END]
INFO - 2026-03-12 12:31:56 --> [REQ_ID=39b513448be3] [PERF] Execution time=0.031603
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=a922ad5e2d53] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 12:31:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=a922ad5e2d53] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=a922ad5e2d53] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=a922ad5e2d53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-12 12:31:56 --> [CSRF] token name=csrf_test_name hash=8f774b8dad0cc6a2ebc5508e5dd7da5a
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=2411cc0bbff0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:56 --> [REQ_ID=2411cc0bbff0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:56 --> [REQ_ID=2411cc0bbff0] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:31:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:56 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:31:56 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-12 12:31:56 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:31:56 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:31:56 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-12 12:31:56 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
INFO - 2026-03-12 12:31:56 --> [REQ_ID=2411cc0bbff0] [PERF] Execution time=0.042884
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=f1a2725798e3] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 12:31:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=f1a2725798e3] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=f1a2725798e3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=f1a2725798e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-12 12:31:57 --> [CSRF] token name=csrf_test_name hash=23f00e11b12855ab666f8644be998b48
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=ab6b92aceda3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:57 --> [REQ_ID=ab6b92aceda3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:57 --> [REQ_ID=ab6b92aceda3] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:31:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:57 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:31:57 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 12:31:57 --> [REQ_ID=ab6b92aceda3] [PERF] Execution time=0.022041
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=fb6b9e00294f] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 12:31:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=fb6b9e00294f] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=fb6b9e00294f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=fb6b9e00294f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 12:31:58 --> [CSRF] token name=csrf_test_name hash=b1d21a57467b03e8c9a887947ed7f2e9
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=1862dfbdbe74] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:58 --> [REQ_ID=1862dfbdbe74] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:58 --> [REQ_ID=1862dfbdbe74] [METHOD_ENTRY] show
DEBUG - 2026-03-12 12:31:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:58 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:31:58 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 12:31:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:31:58 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:31:58 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 12:31:58 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
INFO - 2026-03-12 12:31:58 --> [REQ_ID=1862dfbdbe74] [PERF] Execution time=0.033028
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=78bfed0efde6] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 12:31:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=78bfed0efde6] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=78bfed0efde6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=78bfed0efde6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-12 12:31:59 --> [CSRF] token name=csrf_test_name hash=bdad7f1367f866833c82b83c7e30cfda
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=2558f33332a5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:31:59 --> [REQ_ID=2558f33332a5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:31:59 --> [REQ_ID=2558f33332a5] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-12 12:31:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:31:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:31:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:31:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:31:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:31:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:31:59 --> [REQ_ID=2558f33332a5] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 12:32:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:00 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=78bfed0efde6] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=78bfed0efde6] [LIFECYCLE][END] status=200 duration_ms=643.46 memory_delta=4194304
INFO - 2026-03-12 12:32:00 --> [REQ_ID=2558f33332a5] [PERF] Execution time=0.643243
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=78bfed0efde6] [REQUEST][END]
INFO - 2026-03-12 12:32:00 --> [REQ_ID=78bfed0efde6] [PERF] Execution time=0.653920
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=1cb125cac4be] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 12:32:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=1cb125cac4be] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=1cb125cac4be] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=1cb125cac4be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 12:32:00 --> [CSRF] token name=csrf_test_name hash=afc213c5fe982caef8b9c08248850f7e
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=0eb1cdeb3192] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:32:00 --> [REQ_ID=0eb1cdeb3192] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:32:00 --> [REQ_ID=0eb1cdeb3192] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-12 12:32:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:32:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:32:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:32:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:32:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:32:00 --> [REQ_ID=0eb1cdeb3192] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 12:32:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:01 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=1cb125cac4be] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=1cb125cac4be] [LIFECYCLE][END] status=200 duration_ms=693.10 memory_delta=2097152
INFO - 2026-03-12 12:32:01 --> [REQ_ID=0eb1cdeb3192] [PERF] Execution time=0.692737
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=1cb125cac4be] [REQUEST][END]
INFO - 2026-03-12 12:32:01 --> [REQ_ID=1cb125cac4be] [PERF] Execution time=0.702872
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 12:32:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-12 12:32:01 --> [CSRF] token name=csrf_test_name hash=864a1d6f7899d27c887275882dfefb7c
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=7d9045d8b652] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:32:01 --> [REQ_ID=7d9045d8b652] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=7d9045d8b652] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-12 12:32:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:32:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:32:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:32:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:32:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 12:32:01 --> [REQ_ID=7d9045d8b652] [MEMORY][commonData:start] 6291456
INFO - 2026-03-12 12:32:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:01 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [LIFECYCLE][END] status=200 duration_ms=644.90 memory_delta=2097152
INFO - 2026-03-12 12:32:01 --> [REQ_ID=7d9045d8b652] [PERF] Execution time=0.644770
DEBUG - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [REQUEST][END]
INFO - 2026-03-12 12:32:01 --> [REQ_ID=0cf7b9246d5e] [PERF] Execution time=0.654339
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 12:32:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-12 12:32:02 --> [CSRF] token name=csrf_test_name hash=117d6d1f8848c3e6ce99c3afe552b196
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [REQUEST][END]
INFO - 2026-03-12 12:32:02 --> [REQ_ID=56fb6f1cfc97] [PERF] Execution time=0.010775
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:32:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:32:02 --> [CSRF] token name=csrf_test_name hash=8ab34e10a2be12828e4d7c4ad1f40c52
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=78ef046c0fb6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:32:02 --> [REQ_ID=78ef046c0fb6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [LIFECYCLE][END] status=200 duration_ms=26.30 memory_delta=0
INFO - 2026-03-12 12:32:02 --> [REQ_ID=78ef046c0fb6] [PERF] Execution time=0.026143
DEBUG - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [REQUEST][END]
INFO - 2026-03-12 12:32:02 --> [REQ_ID=9fadd3d9380e] [PERF] Execution time=0.034833
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 12:32:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 12:32:03 --> [CSRF] token name=csrf_test_name hash=f96f0b1ec8e1b8b2db5553b1786b511e
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [REQUEST][END]
INFO - 2026-03-12 12:32:03 --> [REQ_ID=c79b0ecfbd0a] [PERF] Execution time=0.010330
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:32:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:32:03 --> [CSRF] token name=csrf_test_name hash=79b9fb75d3273b4fe99ba49da29e1e19
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=ed5f39a99882] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:32:03 --> [REQ_ID=ed5f39a99882] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [LIFECYCLE][END] status=200 duration_ms=18.90 memory_delta=0
INFO - 2026-03-12 12:32:03 --> [REQ_ID=ed5f39a99882] [PERF] Execution time=0.018759
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [REQUEST][END]
INFO - 2026-03-12 12:32:03 --> [REQ_ID=de0ed7e01a82] [PERF] Execution time=0.028365
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=d76b45b21e0a] [REQUEST][START] GET /
DEBUG - 2026-03-12 12:32:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=d76b45b21e0a] [FILTER_BEFORE] /
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=d76b45b21e0a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=d76b45b21e0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:32:03 --> [CSRF] token name=csrf_test_name hash=d9a5d54d17e3eb4ab9dab990156fe370
DEBUG - 2026-03-12 12:32:03 --> [REQ_ID=72370ff1e2b9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:32:03 --> [REQ_ID=72370ff1e2b9] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 12:32:03 --> [REQ_ID=72370ff1e2b9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 12:32:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:04 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:04 --> [REQ_ID=72370ff1e2b9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:32:04 --> [REQ_ID=72370ff1e2b9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:32:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:04 --> [REQ_ID=d76b45b21e0a] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:04 --> [REQ_ID=d76b45b21e0a] [LIFECYCLE][END] status=200 duration_ms=634.65 memory_delta=4194304
INFO - 2026-03-12 12:32:04 --> [REQ_ID=72370ff1e2b9] [PERF] Execution time=0.634389
DEBUG - 2026-03-12 12:32:04 --> [REQ_ID=d76b45b21e0a] [REQUEST][END]
INFO - 2026-03-12 12:32:04 --> [REQ_ID=d76b45b21e0a] [PERF] Execution time=0.643166
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 12:32:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 12:32:05 --> [CSRF] token name=csrf_test_name hash=30f843583b0c485b02d9ab8315a8dfdf
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [REQUEST][END]
INFO - 2026-03-12 12:32:05 --> [REQ_ID=4610f641e457] [PERF] Execution time=0.011013
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:32:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:32:05 --> [CSRF] token name=csrf_test_name hash=f7b1fe7926f875b78768b3ccf51f91b9
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=e9dceab22382] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:32:05 --> [REQ_ID=e9dceab22382] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [LIFECYCLE][END] status=200 duration_ms=18.07 memory_delta=0
INFO - 2026-03-12 12:32:05 --> [REQ_ID=e9dceab22382] [PERF] Execution time=0.018027
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [REQUEST][END]
INFO - 2026-03-12 12:32:05 --> [REQ_ID=61f70aebf2b4] [PERF] Execution time=0.026970
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 12:32:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 12:32:05 --> [CSRF] token name=csrf_test_name hash=4d30d2a43b5578e31d564920143675c9
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=f5aa9067a20d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 12:32:05 --> [REQ_ID=f5aa9067a20d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [LIFECYCLE][END] status=200 duration_ms=17.74 memory_delta=0
INFO - 2026-03-12 12:32:05 --> [REQ_ID=f5aa9067a20d] [PERF] Execution time=0.017207
DEBUG - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [REQUEST][END]
INFO - 2026-03-12 12:32:05 --> [REQ_ID=a31564b63fd2] [PERF] Execution time=0.034118
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=873652d927c5] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-12 12:32:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=873652d927c5] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=873652d927c5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=873652d927c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-12 12:32:06 --> [CSRF] token name=csrf_test_name hash=e419a747be4b9074476004fd05bfbdc9
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=04b6bc052b84] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 12:32:06 --> [REQ_ID=04b6bc052b84] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 12:32:06 --> [REQ_ID=04b6bc052b84] [METHOD_ENTRY] index
DEBUG - 2026-03-12 12:32:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 12:32:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 12:32:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 12:32:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 12:32:06 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 12:32:06 --> HowItWorksController failure: overview
CRITICAL - 2026-03-12 12:32:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:32:06 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:32:06 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-12 12:32:06 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-12 12:32:06 --> [REQ_ID=04b6bc052b84] [PERF] Execution time=0.033828
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [REQUEST][START] GET /index.php
DEBUG - 2026-03-12 12:32:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:32:07 --> [CSRF] token name=csrf_test_name hash=e42de095115cc4a1adc5d43b511556a7
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 12:32:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:32:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [LIFECYCLE][END] status=200 duration_ms=560.26 memory_delta=4194304
INFO - 2026-03-12 12:32:07 --> [REQ_ID=c0bfd910d984] [PERF] Execution time=0.560048
DEBUG - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [REQUEST][END]
INFO - 2026-03-12 12:32:07 --> [REQ_ID=e03ccdd88d38] [PERF] Execution time=0.570095
DEBUG - 2026-03-12 12:32:08 --> [REQ_ID=a6bca4f9fae9] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-12 12:32:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:32:08 --> [REQ_ID=a6bca4f9fae9] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-12 12:32:08 --> [REQ_ID=a6bca4f9fae9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 12:32:08 --> [REQ_ID=a6bca4f9fae9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 12:32:08 --> [CSRF] token name=csrf_test_name hash=b7d016d92cf88589a195d57f6d0ae705
DEBUG - 2026-03-12 12:32:08 --> [REQ_ID=cd5d31335546] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 12:32:08 --> [REQ_ID=cd5d31335546] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 12:32:08 --> [REQ_ID=cd5d31335546] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 12:32:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 12:32:09 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:09 --> [REQ_ID=cd5d31335546] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 12:32:09 --> [REQ_ID=cd5d31335546] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 12:32:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 12:32:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 12:32:09 --> [REQ_ID=a6bca4f9fae9] [FILTER_AFTER]
DEBUG - 2026-03-12 12:32:09 --> [REQ_ID=a6bca4f9fae9] [LIFECYCLE][END] status=200 duration_ms=594.18 memory_delta=2097152
INFO - 2026-03-12 12:32:09 --> [REQ_ID=cd5d31335546] [PERF] Execution time=0.593981
DEBUG - 2026-03-12 12:32:09 --> [REQ_ID=a6bca4f9fae9] [REQUEST][END]
INFO - 2026-03-12 12:32:09 --> [REQ_ID=a6bca4f9fae9] [PERF] Execution time=0.604118
DEBUG - 2026-03-12 12:35:53 --> [REQ_ID=69f4d0cb6be3] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-12 12:35:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:35:53 --> [REQ_ID=69f4d0cb6be3] [REQUEST][END]
INFO - 2026-03-12 12:35:53 --> [REQ_ID=69f4d0cb6be3] [PERF] Execution time=0.041307
DEBUG - 2026-03-12 12:36:22 --> [REQ_ID=a8402710c7b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:39:14 --> [REQ_ID=bfd5a6ffe7fe] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-12 12:39:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:39:14 --> [REQ_ID=bfd5a6ffe7fe] [REQUEST][END]
INFO - 2026-03-12 12:39:14 --> [REQ_ID=bfd5a6ffe7fe] [PERF] Execution time=0.046275
DEBUG - 2026-03-12 12:40:09 --> [REQ_ID=16aa057df8be] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 12:40:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:40:09 --> [REQ_ID=16aa057df8be] [REQUEST][END]
INFO - 2026-03-12 12:40:09 --> [REQ_ID=16aa057df8be] [PERF] Execution time=0.011891
DEBUG - 2026-03-12 12:40:10 --> [REQ_ID=e2c2d6bc0388] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 12:40:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 12:40:10 --> [REQ_ID=e2c2d6bc0388] [REQUEST][END]
INFO - 2026-03-12 12:40:10 --> [REQ_ID=e2c2d6bc0388] [PERF] Execution time=0.008640
DEBUG - 2026-03-12 12:41:22 --> [REQ_ID=557e74e5861d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:46:22 --> [REQ_ID=bf15e7ad4165] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:51:22 --> [REQ_ID=2a59a2c971db] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 12:56:22 --> [REQ_ID=54eb94580497] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:00:01 --> [REQ_ID=9d107a554ee0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:00:02 --> [REQ_ID=9d107a554ee0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 13:00:02 --> [REQ_ID=9d107a554ee0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 13:00:02 --> [REQ_ID=9d107a554ee0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 13:00:02 --> [REQ_ID=9d107a554ee0] [REQUEST][END]
INFO - 2026-03-12 13:00:02 --> [REQ_ID=9d107a554ee0] [PERF] Execution time=0.052313
DEBUG - 2026-03-12 13:01:22 --> [REQ_ID=5c174f6abc84] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:06:22 --> [REQ_ID=8af91b0697b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:11:22 --> [REQ_ID=0962fcfbe5d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:12:57 --> [REQ_ID=ddbc36bc181e] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Starter
DEBUG - 2026-03-12 13:12:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:12:57 --> [REQ_ID=ddbc36bc181e] [REQUEST][END]
INFO - 2026-03-12 13:12:57 --> [REQ_ID=ddbc36bc181e] [PERF] Execution time=0.044229
DEBUG - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [REQUEST][END]
INFO - 2026-03-12 13:15:01 --> [REQ_ID=ab867ef6b6b8] [PERF] Execution time=0.047382
DEBUG - 2026-03-12 13:16:22 --> [REQ_ID=04d6ce9437c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:21:22 --> [REQ_ID=fa0c1f2959a2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:26:22 --> [REQ_ID=9268cf7200cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [REQUEST][START] GET /index.php/Knowledgebase/Types-Of-Accounts
DEBUG - 2026-03-12 13:27:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [FILTER_BEFORE] /index.php/Knowledgebase/Types-Of-Accounts
DEBUG - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=typesOfAccounts
DEBUG - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Types-Of-Accounts
DEBUG - 2026-03-12 13:27:30 --> [CSRF] token name=csrf_test_name hash=6fe339db62a10099e119198ea5e27667
DEBUG - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [REQUEST][END]
INFO - 2026-03-12 13:27:30 --> [REQ_ID=447c9998b616] [PERF] Execution time=0.031223
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 13:27:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 13:27:31 --> [CSRF] token name=csrf_test_name hash=3610eff0e223039adbb90ae51a377a37
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=9e751629b126] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 13:27:31 --> [REQ_ID=9e751629b126] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [FILTER_AFTER]
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [LIFECYCLE][END] status=200 duration_ms=51.05 memory_delta=0
INFO - 2026-03-12 13:27:31 --> [REQ_ID=9e751629b126] [PERF] Execution time=0.049441
DEBUG - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [REQUEST][END]
INFO - 2026-03-12 13:27:31 --> [REQ_ID=e1769c12504e] [PERF] Execution time=0.062665
DEBUG - 2026-03-12 13:31:22 --> [REQ_ID=c3926979ddaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:36:22 --> [REQ_ID=cb0590fb1b9a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:40:04 --> [REQ_ID=cb55b299fe6f] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 13:40:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:40:04 --> [REQ_ID=cb55b299fe6f] [REQUEST][END]
INFO - 2026-03-12 13:40:04 --> [REQ_ID=cb55b299fe6f] [PERF] Execution time=0.042178
DEBUG - 2026-03-12 13:41:22 --> [REQ_ID=7e7b9b3b6ddf] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:41:53 --> [REQ_ID=840fc0a9e9f1] [REQUEST][START] HEAD /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-12 13:41:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:41:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: How-It-Works/MyMI-Exchange]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:41:53 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:41:53 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
WARNING - 2026-03-12 13:41:53 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange | referrer: none
DEBUG - 2026-03-12 13:46:22 --> [REQ_ID=8bea96c1928d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:51:22 --> [REQ_ID=84f16c4324bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 13:54:25 --> [REQ_ID=3b923d0a6307] [REQUEST][START] GET /
DEBUG - 2026-03-12 13:54:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 13:54:25 --> [REQ_ID=3b923d0a6307] [FILTER_BEFORE] /
DEBUG - 2026-03-12 13:54:25 --> [REQ_ID=3b923d0a6307] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 13:54:25 --> [REQ_ID=3b923d0a6307] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 13:54:25 --> [CSRF] token name=csrf_test_name hash=c5b07c0ad692131a43965d63e526876c
DEBUG - 2026-03-12 13:54:25 --> [REQ_ID=7ca50373a0a8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 13:54:25 --> [REQ_ID=7ca50373a0a8] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 13:54:25 --> [REQ_ID=7ca50373a0a8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 13:54:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 13:54:26 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 13:54:26 --> [REQ_ID=7ca50373a0a8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 13:54:26 --> [REQ_ID=7ca50373a0a8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 13:54:26 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 13:54:26 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 13:54:26 --> [REQ_ID=3b923d0a6307] [FILTER_AFTER]
DEBUG - 2026-03-12 13:54:26 --> [REQ_ID=3b923d0a6307] [LIFECYCLE][END] status=200 duration_ms=757.80 memory_delta=4194304
INFO - 2026-03-12 13:54:26 --> [REQ_ID=7ca50373a0a8] [PERF] Execution time=0.755897
DEBUG - 2026-03-12 13:54:26 --> [REQ_ID=3b923d0a6307] [REQUEST][END]
INFO - 2026-03-12 13:54:26 --> [REQ_ID=3b923d0a6307] [PERF] Execution time=0.797155
DEBUG - 2026-03-12 13:56:22 --> [REQ_ID=049c7c6d436b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [REQUEST][END]
INFO - 2026-03-12 14:00:02 --> [REQ_ID=65c1601d5c96] [PERF] Execution time=0.050805
DEBUG - 2026-03-12 14:01:22 --> [REQ_ID=c5b7ec689ba0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:06:22 --> [REQ_ID=47ef44806a7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:08:23 --> [REQ_ID=443082a7f96b] [REQUEST][START] GET /
DEBUG - 2026-03-12 14:08:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:23 --> [REQ_ID=443082a7f96b] [FILTER_BEFORE] /
DEBUG - 2026-03-12 14:08:23 --> [REQ_ID=443082a7f96b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 14:08:23 --> [REQ_ID=443082a7f96b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 14:08:23 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:23 --> [REQ_ID=b18d4ba006b3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 14:08:23 --> [REQ_ID=b18d4ba006b3] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 14:08:23 --> [REQ_ID=b18d4ba006b3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 14:08:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:08:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 14:08:24 --> [REQ_ID=b18d4ba006b3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 14:08:24 --> [REQ_ID=b18d4ba006b3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 14:08:24 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 14:08:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 14:08:24 --> [REQ_ID=443082a7f96b] [FILTER_AFTER]
DEBUG - 2026-03-12 14:08:24 --> [REQ_ID=443082a7f96b] [LIFECYCLE][END] status=200 duration_ms=918.57 memory_delta=4194304
INFO - 2026-03-12 14:08:24 --> [REQ_ID=b18d4ba006b3] [PERF] Execution time=0.916689
DEBUG - 2026-03-12 14:08:24 --> [REQ_ID=443082a7f96b] [REQUEST][END]
INFO - 2026-03-12 14:08:24 --> [REQ_ID=443082a7f96b] [PERF] Execution time=0.957764
DEBUG - 2026-03-12 14:08:28 --> [REQ_ID=d5e6a4d722e2] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 14:08:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:28 --> [REQ_ID=d5e6a4d722e2] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 14:08:28 --> [REQ_ID=d5e6a4d722e2] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 14:08:28 --> [REQ_ID=d5e6a4d722e2] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 14:08:28 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
INFO - 2026-03-12 14:08:28 --> CSRF token verified.
DEBUG - 2026-03-12 14:08:28 --> [REQ_ID=ab28efabe77d] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 14:08:28 --> [REQ_ID=ab28efabe77d] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 14:08:28 --> [REGISTRATION] Submission received
INFO - 2026-03-12 14:08:28 --> MailService queued email
INFO - 2026-03-12 14:08:28 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 14:08:28 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 14:08:28 --> Registration created user_id=11718, email=info@safeplaceauto.com, username=GXuSYZAhiRKamTpbHq, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 14:08:28 --> [REGISTRATION] User record created
INFO - 2026-03-12 14:08:28 --> OnboardingProgressService: created onboarding record for user_id=11718
INFO - 2026-03-12 14:08:29 --> Registration succeeded for info@safeplaceauto.com (event c532c7a5e0ad1205)
INFO - 2026-03-12 14:08:29 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 14:08:29 --> Registration redirecting to success guide for user_id=11718
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=d5e6a4d722e2] [FILTER_AFTER]
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=d5e6a4d722e2] [LIFECYCLE][END] status=303 duration_ms=1,253.18 memory_delta=0
INFO - 2026-03-12 14:08:29 --> [REQ_ID=ab28efabe77d] [PERF] Execution time=1.252792
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=d5e6a4d722e2] [REQUEST][END]
INFO - 2026-03-12 14:08:29 --> [REQ_ID=d5e6a4d722e2] [PERF] Execution time=1.265739
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=b08254fc524e] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 14:08:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=b08254fc524e] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=b08254fc524e] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=b08254fc524e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 14:08:29 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:29 --> [REQ_ID=638be9a2835d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:08:29 --> [REQ_ID=638be9a2835d] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 14:08:29 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 14:08:29 --> [REQ_ID=638be9a2835d] [PERF] Execution time=0.022897
DEBUG - 2026-03-12 14:08:42 --> [REQ_ID=af272e0936f1] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 14:08:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:43 --> [REQ_ID=af272e0936f1] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 14:08:43 --> [REQ_ID=af272e0936f1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 14:08:43 --> [REQ_ID=af272e0936f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 14:08:43 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:43 --> [REQ_ID=9c317c9cdc4b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 14:08:43 --> [REQ_ID=9c317c9cdc4b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:08:43 --> [REQ_ID=9c317c9cdc4b] [METHOD_ENTRY] show
DEBUG - 2026-03-12 14:08:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:08:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 14:08:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 14:08:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 14:08:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 14:08:43 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 14:08:43 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 14:08:43 --> [REQ_ID=9c317c9cdc4b] [PERF] Execution time=0.124915
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 14:08:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 14:08:47 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [REQUEST][END]
INFO - 2026-03-12 14:08:47 --> [REQ_ID=2dcad40a1182] [PERF] Execution time=0.011524
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 14:08:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 14:08:47 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=af948893dfc1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:08:47 --> [REQ_ID=af948893dfc1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [FILTER_AFTER]
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [LIFECYCLE][END] status=200 duration_ms=21.34 memory_delta=0
INFO - 2026-03-12 14:08:47 --> [REQ_ID=af948893dfc1] [PERF] Execution time=0.021125
DEBUG - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [REQUEST][END]
INFO - 2026-03-12 14:08:47 --> [REQ_ID=9a988ac517b5] [PERF] Execution time=0.029557
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 14:08:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 14:08:56 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
INFO - 2026-03-12 14:08:56 --> CSRF token verified.
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=19c158adb536] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 14:08:56 --> [REQ_ID=19c158adb536] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 14:08:56 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 14:08:56 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 14:08:56 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 23.191.200.17, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 14:08:56 --> Auth attemptLogin() called with login identifier: info@safeplaceauto.com, remember: true
DEBUG - 2026-03-12 14:08:56 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 14:08:56 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 14:08:56 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 14:08:56 --> Auth attempt failed for identifier info@safeplaceauto.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 14:08:56 --> [AUTH] Login failure
WARNING - 2026-03-12 14:08:56 --> [AUTH] Login failed
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [FILTER_AFTER]
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [LIFECYCLE][END] status=303 duration_ms=262.26 memory_delta=0
INFO - 2026-03-12 14:08:56 --> [REQ_ID=19c158adb536] [PERF] Execution time=0.261899
DEBUG - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [REQUEST][END]
INFO - 2026-03-12 14:08:56 --> [REQ_ID=8755f565ef0e] [PERF] Execution time=0.271239
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 14:08:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 14:08:57 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=9ca6dc275b65] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:08:57 --> [REQ_ID=9ca6dc275b65] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [FILTER_AFTER]
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [LIFECYCLE][END] status=200 duration_ms=15.14 memory_delta=0
INFO - 2026-03-12 14:08:57 --> [REQ_ID=9ca6dc275b65] [PERF] Execution time=0.014827
DEBUG - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [REQUEST][END]
INFO - 2026-03-12 14:08:57 --> [REQ_ID=2ddc75f307cb] [PERF] Execution time=0.025729
DEBUG - 2026-03-12 14:09:10 --> [REQ_ID=26cf3646e6ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:09:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:09:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:09:10 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:09:10 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:09:10 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=87c39822e156] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 14:09:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=87c39822e156] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=87c39822e156] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=87c39822e156] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 14:09:11 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=03c842f88672] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 14:09:11 --> [REQ_ID=03c842f88672] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:09:11 --> [REQ_ID=03c842f88672] [METHOD_ENTRY] show
DEBUG - 2026-03-12 14:09:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:09:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 14:09:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 14:09:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 14:09:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 14:09:11 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 14:09:11 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 14:09:11 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:09:11 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:09:11 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 14:09:11 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 14:09:11 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 14:09:11 --> [REQ_ID=03c842f88672] [PERF] Execution time=0.046727
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 14:09:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 14:09:15 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=d6677a0a49d3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:09:15 --> [REQ_ID=d6677a0a49d3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [FILTER_AFTER]
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [LIFECYCLE][END] status=200 duration_ms=18.15 memory_delta=0
INFO - 2026-03-12 14:09:15 --> [REQ_ID=d6677a0a49d3] [PERF] Execution time=0.018006
DEBUG - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [REQUEST][END]
INFO - 2026-03-12 14:09:15 --> [REQ_ID=24000b77ef8f] [PERF] Execution time=0.027754
DEBUG - 2026-03-12 14:09:21 --> [REQ_ID=aab88a1034da] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 14:09:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:21 --> [REQ_ID=aab88a1034da] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 14:09:21 --> [REQ_ID=aab88a1034da] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 14:09:21 --> [REQ_ID=aab88a1034da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 14:09:21 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:09:21 --> [REQ_ID=ab7ce4da0f2c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:09:21 --> [REQ_ID=ab7ce4da0f2c] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 14:09:21 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 14:09:21 --> [REQ_ID=ab7ce4da0f2c] [PERF] Execution time=0.032129
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 14:09:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 14:09:26 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [METHOD_ENTRY] index
DEBUG - 2026-03-12 14:09:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:09:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 14:09:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 14:09:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 14:09:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 14:09:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 14:09:26 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [FILTER_AFTER]
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [LIFECYCLE][END] status=200 duration_ms=31.68 memory_delta=0
INFO - 2026-03-12 14:09:26 --> [REQ_ID=365d4749b691] [PERF] Execution time=0.031482
DEBUG - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [REQUEST][END]
INFO - 2026-03-12 14:09:26 --> [REQ_ID=472c39a11dd2] [PERF] Execution time=0.042800
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=6c6077c5827c] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-12 14:09:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=6c6077c5827c] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=6c6077c5827c] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=6c6077c5827c] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-12 14:09:32 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
INFO - 2026-03-12 14:09:32 --> CSRF token verified.
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=cea473d5d58e] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-12 14:09:32 --> [REQ_ID=cea473d5d58e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:09:32 --> [REQ_ID=cea473d5d58e] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-12 14:09:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:09:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 14:09:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 14:09:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 14:09:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 14:09:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 14:09:32 --> [SUPPORT] Account help requested
INFO - 2026-03-12 14:09:33 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=6c6077c5827c] [FILTER_AFTER]
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=6c6077c5827c] [LIFECYCLE][END] status=303 duration_ms=1,174.47 memory_delta=0
INFO - 2026-03-12 14:09:33 --> [REQ_ID=cea473d5d58e] [PERF] Execution time=1.173740
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=6c6077c5827c] [REQUEST][END]
INFO - 2026-03-12 14:09:33 --> [REQ_ID=6c6077c5827c] [PERF] Execution time=1.189383
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 14:09:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 14:09:33 --> [CSRF] token name=csrf_test_name hash=18bebcbe2195da5362bd51d04d1d400b
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [METHOD_ENTRY] index
DEBUG - 2026-03-12 14:09:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:09:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 14:09:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 14:09:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 14:09:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 14:09:33 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 14:09:33 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [FILTER_AFTER]
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [LIFECYCLE][END] status=200 duration_ms=27.76 memory_delta=0
INFO - 2026-03-12 14:09:33 --> [REQ_ID=285c4d07c8a3] [PERF] Execution time=0.027523
DEBUG - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [REQUEST][END]
INFO - 2026-03-12 14:09:33 --> [REQ_ID=39b81c0e703b] [PERF] Execution time=0.036798
DEBUG - 2026-03-12 14:11:22 --> [REQ_ID=cfb7fe251fb6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [REQUEST][END]
INFO - 2026-03-12 14:15:02 --> [REQ_ID=0a8bd8d20942] [PERF] Execution time=0.047348
DEBUG - 2026-03-12 14:16:22 --> [REQ_ID=fcbd5553a665] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:21:22 --> [REQ_ID=93ff995890aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:26:22 --> [REQ_ID=84b55817543e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:31:22 --> [REQ_ID=442dc1b128a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [REQUEST][START] GET /
DEBUG - 2026-03-12 14:35:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [FILTER_BEFORE] /
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 14:35:24 --> [CSRF] token name=csrf_test_name hash=0db1b4270f5ed3a1fb4b4d8dc5f8690e
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 14:35:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:35:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 14:35:24 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 14:35:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [FILTER_AFTER]
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [LIFECYCLE][END] status=200 duration_ms=708.68 memory_delta=4194304
INFO - 2026-03-12 14:35:24 --> [REQ_ID=dfb0dc90ab94] [PERF] Execution time=0.706895
DEBUG - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [REQUEST][END]
INFO - 2026-03-12 14:35:24 --> [REQ_ID=df1c7ed17aa3] [PERF] Execution time=0.751316
DEBUG - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 14:35:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-12 14:35:25 --> [CSRF] token name=csrf_test_name hash=0db1b4270f5ed3a1fb4b4d8dc5f8690e
DEBUG - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [REQUEST][END]
INFO - 2026-03-12 14:35:25 --> [REQ_ID=1ce502f12788] [PERF] Execution time=0.009905
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 14:35:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 14:35:26 --> [CSRF] token name=csrf_test_name hash=0db1b4270f5ed3a1fb4b4d8dc5f8690e
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=6e582ad5d1cf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 14:35:26 --> [REQ_ID=6e582ad5d1cf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [FILTER_AFTER]
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [LIFECYCLE][END] status=200 duration_ms=26.54 memory_delta=0
INFO - 2026-03-12 14:35:26 --> [REQ_ID=6e582ad5d1cf] [PERF] Execution time=0.026194
DEBUG - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [REQUEST][END]
INFO - 2026-03-12 14:35:26 --> [REQ_ID=263bb8c0a5a6] [PERF] Execution time=0.037847
DEBUG - 2026-03-12 14:36:22 --> [REQ_ID=86329f996cb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:41:22 --> [REQ_ID=7795bed29bf6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:46:22 --> [REQ_ID=e9274201c7ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:51:19 --> [REQ_ID=f8c80d9750c5] [REQUEST][START] GET /
DEBUG - 2026-03-12 14:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 14:51:19 --> [REQ_ID=f8c80d9750c5] [FILTER_BEFORE] /
DEBUG - 2026-03-12 14:51:19 --> [REQ_ID=f8c80d9750c5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 14:51:19 --> [REQ_ID=f8c80d9750c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 14:51:19 --> [CSRF] token name=csrf_test_name hash=c575c339f5595bc61fa0f0e092827a3f
DEBUG - 2026-03-12 14:51:19 --> [REQ_ID=c7bd7b6ec362] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 14:51:19 --> [REQ_ID=c7bd7b6ec362] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 14:51:19 --> [REQ_ID=c7bd7b6ec362] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 14:51:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 14:51:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 14:51:20 --> [REQ_ID=c7bd7b6ec362] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 14:51:20 --> [REQ_ID=c7bd7b6ec362] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 14:51:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 14:51:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 14:51:20 --> [REQ_ID=f8c80d9750c5] [FILTER_AFTER]
DEBUG - 2026-03-12 14:51:20 --> [REQ_ID=f8c80d9750c5] [LIFECYCLE][END] status=200 duration_ms=788.98 memory_delta=4194304
INFO - 2026-03-12 14:51:20 --> [REQ_ID=c7bd7b6ec362] [PERF] Execution time=0.786968
DEBUG - 2026-03-12 14:51:20 --> [REQ_ID=f8c80d9750c5] [REQUEST][END]
INFO - 2026-03-12 14:51:20 --> [REQ_ID=f8c80d9750c5] [PERF] Execution time=0.827933
DEBUG - 2026-03-12 14:51:22 --> [REQ_ID=0b3d173139e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 14:56:22 --> [REQ_ID=b0001e18e927] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [REQUEST][END]
INFO - 2026-03-12 15:00:01 --> [REQ_ID=4fe4f5d6a661] [PERF] Execution time=0.038378
DEBUG - 2026-03-12 15:01:22 --> [REQ_ID=a293ddde034a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:06:22 --> [REQ_ID=3acee19822d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:11:22 --> [REQ_ID=bc70739bcb6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [REQUEST][END]
INFO - 2026-03-12 15:15:01 --> [REQ_ID=7f10944ac173] [PERF] Execution time=0.046033
DEBUG - 2026-03-12 15:16:22 --> [REQ_ID=67edbb81e733] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:17:11 --> [REQ_ID=3eea2cf95ea4] [REQUEST][START] GET /
DEBUG - 2026-03-12 15:17:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:17:11 --> [REQ_ID=3eea2cf95ea4] [REQUEST][END]
INFO - 2026-03-12 15:17:11 --> [REQ_ID=3eea2cf95ea4] [PERF] Execution time=0.010381
DEBUG - 2026-03-12 15:21:22 --> [REQ_ID=709d5bf2a1fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:26:22 --> [REQ_ID=d0242f03b279] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:30:43 --> [REQ_ID=42b2976772a9] [REQUEST][START] GET /
DEBUG - 2026-03-12 15:30:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:30:43 --> [REQ_ID=42b2976772a9] [FILTER_BEFORE] /
DEBUG - 2026-03-12 15:30:43 --> [REQ_ID=42b2976772a9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 15:30:43 --> [REQ_ID=42b2976772a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 15:30:43 --> [CSRF] token name=csrf_test_name hash=3bd98511590bb2e857017a7cd144256f
DEBUG - 2026-03-12 15:30:43 --> [REQ_ID=192c43efd312] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 15:30:43 --> [REQ_ID=192c43efd312] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 15:30:44 --> [REQ_ID=192c43efd312] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 15:30:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 15:30:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 15:30:44 --> [REQ_ID=192c43efd312] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 15:30:44 --> [REQ_ID=192c43efd312] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 15:30:44 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 15:30:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 15:30:44 --> [REQ_ID=42b2976772a9] [FILTER_AFTER]
DEBUG - 2026-03-12 15:30:44 --> [REQ_ID=42b2976772a9] [LIFECYCLE][END] status=200 duration_ms=695.83 memory_delta=4194304
INFO - 2026-03-12 15:30:44 --> [REQ_ID=192c43efd312] [PERF] Execution time=0.693860
DEBUG - 2026-03-12 15:30:44 --> [REQ_ID=42b2976772a9] [REQUEST][END]
INFO - 2026-03-12 15:30:44 --> [REQ_ID=42b2976772a9] [PERF] Execution time=0.734944
DEBUG - 2026-03-12 15:31:22 --> [REQ_ID=6a1d0c03eca2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:33:09 --> [REQ_ID=0c97791f19be] [REQUEST][START] GET /
DEBUG - 2026-03-12 15:33:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:33:09 --> [REQ_ID=0c97791f19be] [FILTER_BEFORE] /
DEBUG - 2026-03-12 15:33:09 --> [REQ_ID=0c97791f19be] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 15:33:09 --> [REQ_ID=0c97791f19be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 15:33:09 --> [CSRF] token name=csrf_test_name hash=dd7f820d81f7b7c6534b113110c974fd
DEBUG - 2026-03-12 15:33:09 --> [REQ_ID=5b6c2ba8edb3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 15:33:09 --> [REQ_ID=5b6c2ba8edb3] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 15:33:10 --> [REQ_ID=5b6c2ba8edb3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 15:33:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 15:33:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 15:33:10 --> [REQ_ID=5b6c2ba8edb3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 15:33:10 --> [REQ_ID=5b6c2ba8edb3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 15:33:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 15:33:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 15:33:10 --> [REQ_ID=0c97791f19be] [FILTER_AFTER]
DEBUG - 2026-03-12 15:33:10 --> [REQ_ID=0c97791f19be] [LIFECYCLE][END] status=200 duration_ms=765.10 memory_delta=4194304
INFO - 2026-03-12 15:33:10 --> [REQ_ID=5b6c2ba8edb3] [PERF] Execution time=0.762325
DEBUG - 2026-03-12 15:33:10 --> [REQ_ID=0c97791f19be] [REQUEST][END]
INFO - 2026-03-12 15:33:10 --> [REQ_ID=0c97791f19be] [PERF] Execution time=0.804181
DEBUG - 2026-03-12 15:35:31 --> [REQ_ID=aa56a4c3f6b2] [REQUEST][START] POST /
DEBUG - 2026-03-12 15:35:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:35:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:35:31 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:35:31 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:35:31 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-12 15:36:22 --> [REQ_ID=f2dbbdec4320] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [REQUEST][START] GET /
DEBUG - 2026-03-12 15:38:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [FILTER_BEFORE] /
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 15:38:48 --> [CSRF] token name=csrf_test_name hash=b68e87636d914fafe4fcaa169a8edf20
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 15:38:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 15:38:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 15:38:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 15:38:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [FILTER_AFTER]
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [LIFECYCLE][END] status=200 duration_ms=646.74 memory_delta=4194304
INFO - 2026-03-12 15:38:48 --> [REQ_ID=79ca0d95fc07] [PERF] Execution time=0.644849
DEBUG - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [REQUEST][END]
INFO - 2026-03-12 15:38:48 --> [REQ_ID=5095ec209623] [PERF] Execution time=0.685021
DEBUG - 2026-03-12 15:41:22 --> [REQ_ID=3b8e3fc0ed2e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:46:22 --> [REQ_ID=2953b5684370] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:51:22 --> [REQ_ID=7453e1029e6b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:56:22 --> [REQ_ID=cdae0366cc12] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 15:56:51 --> [REQ_ID=c3f32951a4d6] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-12 15:56:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:56:51 --> [REQ_ID=c3f32951a4d6] [REQUEST][END]
INFO - 2026-03-12 15:56:51 --> [REQ_ID=c3f32951a4d6] [PERF] Execution time=0.030236
DEBUG - 2026-03-12 15:58:45 --> [REQ_ID=9215e7e4f29a] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 15:58:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 15:58:45 --> [REQ_ID=9215e7e4f29a] [REQUEST][END]
INFO - 2026-03-12 15:58:45 --> [REQ_ID=9215e7e4f29a] [PERF] Execution time=0.042133
DEBUG - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [REQUEST][END]
INFO - 2026-03-12 16:00:01 --> [REQ_ID=a24e6f1fdf02] [PERF] Execution time=0.041867
DEBUG - 2026-03-12 16:01:22 --> [REQ_ID=b96cd1f93453] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:06:22 --> [REQ_ID=92501edf3d8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:11:22 --> [REQ_ID=9ea23ea2273f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [REQUEST][END]
INFO - 2026-03-12 16:15:01 --> [REQ_ID=b4cd52808e63] [PERF] Execution time=0.046876
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=f94b504d2136] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=46d944db6139] [REQUEST][START] GET /
DEBUG - 2026-03-12 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=46d944db6139] [FILTER_BEFORE] /
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=46d944db6139] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=46d944db6139] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 16:16:22 --> [CSRF] token name=csrf_test_name hash=d6c3821eb847cc0ee1f708639934d0ce
DEBUG - 2026-03-12 16:16:22 --> [REQ_ID=ccac1e0c0277] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 16:16:22 --> [REQ_ID=ccac1e0c0277] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:16:22 --> [REQ_ID=ccac1e0c0277] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 16:16:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:16:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 16:16:23 --> [REQ_ID=ccac1e0c0277] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 16:16:23 --> [REQ_ID=ccac1e0c0277] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 16:16:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 16:16:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 16:16:23 --> [REQ_ID=46d944db6139] [FILTER_AFTER]
DEBUG - 2026-03-12 16:16:23 --> [REQ_ID=46d944db6139] [LIFECYCLE][END] status=200 duration_ms=647.95 memory_delta=4194304
INFO - 2026-03-12 16:16:23 --> [REQ_ID=ccac1e0c0277] [PERF] Execution time=0.645983
DEBUG - 2026-03-12 16:16:23 --> [REQ_ID=46d944db6139] [REQUEST][END]
INFO - 2026-03-12 16:16:23 --> [REQ_ID=46d944db6139] [PERF] Execution time=0.667366
DEBUG - 2026-03-12 16:21:22 --> [REQ_ID=57f5adeb84f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:22:48 --> [REQ_ID=8e21660a94fe] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Basic
DEBUG - 2026-03-12 16:22:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:22:48 --> [REQ_ID=8e21660a94fe] [REQUEST][END]
INFO - 2026-03-12 16:22:48 --> [REQ_ID=8e21660a94fe] [PERF] Execution time=0.046970
DEBUG - 2026-03-12 16:26:22 --> [REQ_ID=efb4c09106a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:31:22 --> [REQ_ID=dfccbc0fc681] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:32:41 --> [REQ_ID=6353aabd484e] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-12 16:32:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:32:41 --> [REQ_ID=6353aabd484e] [REQUEST][END]
INFO - 2026-03-12 16:32:41 --> [REQ_ID=6353aabd484e] [PERF] Execution time=0.041592
DEBUG - 2026-03-12 16:33:22 --> [REQ_ID=e4b815f55899] [REQUEST][START] GET /
DEBUG - 2026-03-12 16:33:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:22 --> [REQ_ID=e4b815f55899] [FILTER_BEFORE] /
DEBUG - 2026-03-12 16:33:22 --> [REQ_ID=e4b815f55899] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 16:33:22 --> [REQ_ID=e4b815f55899] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 16:33:22 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:33:22 --> [REQ_ID=02a713c66091] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 16:33:22 --> [REQ_ID=02a713c66091] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:33:22 --> [REQ_ID=02a713c66091] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 16:33:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:33:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 16:33:23 --> [REQ_ID=02a713c66091] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 16:33:23 --> [REQ_ID=02a713c66091] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 16:33:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 16:33:23 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 16:33:23 --> [REQ_ID=e4b815f55899] [FILTER_AFTER]
DEBUG - 2026-03-12 16:33:23 --> [REQ_ID=e4b815f55899] [LIFECYCLE][END] status=200 duration_ms=1,240.48 memory_delta=4194304
INFO - 2026-03-12 16:33:23 --> [REQ_ID=02a713c66091] [PERF] Execution time=1.238528
DEBUG - 2026-03-12 16:33:23 --> [REQ_ID=e4b815f55899] [REQUEST][END]
INFO - 2026-03-12 16:33:23 --> [REQ_ID=e4b815f55899] [PERF] Execution time=1.251051
DEBUG - 2026-03-12 16:33:30 --> [REQ_ID=98956e1c62e8] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 16:33:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:30 --> [REQ_ID=98956e1c62e8] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 16:33:30 --> [REQ_ID=98956e1c62e8] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 16:33:30 --> [REQ_ID=98956e1c62e8] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 16:33:30 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
INFO - 2026-03-12 16:33:30 --> CSRF token verified.
DEBUG - 2026-03-12 16:33:30 --> [REQ_ID=b7fbb047b373] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 16:33:30 --> [REQ_ID=b7fbb047b373] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 16:33:30 --> [REGISTRATION] Submission received
INFO - 2026-03-12 16:33:30 --> MailService queued email
INFO - 2026-03-12 16:33:30 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 16:33:30 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 16:33:30 --> Registration created user_id=11719, email=jeff@2jsandsons.com, username=RJRXwMzDaRtIgMGNTfLQKiH, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 16:33:30 --> [REGISTRATION] User record created
INFO - 2026-03-12 16:33:30 --> OnboardingProgressService: created onboarding record for user_id=11719
INFO - 2026-03-12 16:33:32 --> Registration succeeded for jeff@2jsandsons.com (event 5e5dbcd69a7ac995)
INFO - 2026-03-12 16:33:32 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 16:33:32 --> Registration redirecting to success guide for user_id=11719
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=98956e1c62e8] [FILTER_AFTER]
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=98956e1c62e8] [LIFECYCLE][END] status=303 duration_ms=1,393.12 memory_delta=0
INFO - 2026-03-12 16:33:32 --> [REQ_ID=b7fbb047b373] [PERF] Execution time=1.392722
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=98956e1c62e8] [REQUEST][END]
INFO - 2026-03-12 16:33:32 --> [REQ_ID=98956e1c62e8] [PERF] Execution time=1.406620
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=025ec8cca7b3] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 16:33:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=025ec8cca7b3] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=025ec8cca7b3] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=025ec8cca7b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 16:33:32 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:33:32 --> [REQ_ID=9169a687f8cd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:33:32 --> [REQ_ID=9169a687f8cd] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:33:32 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 16:33:32 --> [REQ_ID=9169a687f8cd] [PERF] Execution time=0.031794
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=8ae64cae13f8] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 16:33:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=8ae64cae13f8] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=8ae64cae13f8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=8ae64cae13f8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 16:33:44 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=e3784d054027] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 16:33:44 --> [REQ_ID=e3784d054027] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:33:44 --> [REQ_ID=e3784d054027] [METHOD_ENTRY] show
DEBUG - 2026-03-12 16:33:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:33:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 16:33:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 16:33:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 16:33:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 16:33:45 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 16:33:45 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 16:33:45 --> [REQ_ID=e3784d054027] [PERF] Execution time=0.076334
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:33:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:33:49 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=a2daa451d273] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:33:49 --> [REQ_ID=a2daa451d273] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [FILTER_AFTER]
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [LIFECYCLE][END] status=200 duration_ms=33.82 memory_delta=0
INFO - 2026-03-12 16:33:49 --> [REQ_ID=a2daa451d273] [PERF] Execution time=0.033781
DEBUG - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [REQUEST][END]
INFO - 2026-03-12 16:33:49 --> [REQ_ID=c1af51653a80] [PERF] Execution time=0.043412
DEBUG - 2026-03-12 16:33:59 --> [REQ_ID=d02336aeb60f] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 16:33:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:33:59 --> [REQ_ID=d02336aeb60f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:33:59 --> [REQ_ID=d02336aeb60f] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 16:33:59 --> [REQ_ID=d02336aeb60f] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:33:59 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
INFO - 2026-03-12 16:33:59 --> CSRF token verified.
DEBUG - 2026-03-12 16:33:59 --> [REQ_ID=4b0456c3ba67] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 16:33:59 --> [REQ_ID=4b0456c3ba67] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:33:59 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 16:33:59 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 16:33:59 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 45.9.168.106, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 16:33:59 --> Auth attemptLogin() called with login identifier: jeff@2jsandsons.com, remember: true
DEBUG - 2026-03-12 16:33:59 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-12 16:33:59 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 16:34:00 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 16:34:00 --> Auth attempt failed for identifier jeff@2jsandsons.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 16:34:00 --> [AUTH] Login failure
WARNING - 2026-03-12 16:34:00 --> [AUTH] Login failed
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=d02336aeb60f] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=d02336aeb60f] [LIFECYCLE][END] status=303 duration_ms=425.40 memory_delta=0
INFO - 2026-03-12 16:34:00 --> [REQ_ID=4b0456c3ba67] [PERF] Execution time=0.425252
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=d02336aeb60f] [REQUEST][END]
INFO - 2026-03-12 16:34:00 --> [REQ_ID=d02336aeb60f] [PERF] Execution time=0.436010
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:34:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:34:00 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a8af85135f39] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:34:00 --> [REQ_ID=a8af85135f39] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [LIFECYCLE][END] status=200 duration_ms=35.94 memory_delta=0
INFO - 2026-03-12 16:34:00 --> [REQ_ID=a8af85135f39] [PERF] Execution time=0.035841
DEBUG - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [REQUEST][END]
INFO - 2026-03-12 16:34:00 --> [REQ_ID=a1fcf1460921] [PERF] Execution time=0.045295
DEBUG - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 16:34:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 16:34:13 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [REQUEST][END]
INFO - 2026-03-12 16:34:13 --> [REQ_ID=241f5a736ea6] [PERF] Execution time=0.010073
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:34:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:34:14 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=d0753c2684d1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:34:14 --> [REQ_ID=d0753c2684d1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [LIFECYCLE][END] status=200 duration_ms=91.84 memory_delta=0
INFO - 2026-03-12 16:34:14 --> [REQ_ID=d0753c2684d1] [PERF] Execution time=0.091539
DEBUG - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [REQUEST][END]
INFO - 2026-03-12 16:34:14 --> [REQ_ID=7458ce3be597] [PERF] Execution time=0.101022
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=da35017ca67b] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 16:34:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=da35017ca67b] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=da35017ca67b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=da35017ca67b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 16:34:18 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=92bee82ca665] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 16:34:18 --> [REQ_ID=92bee82ca665] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:18 --> [REQ_ID=92bee82ca665] [METHOD_ENTRY] show
DEBUG - 2026-03-12 16:34:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:34:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 16:34:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 16:34:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 16:34:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 16:34:18 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 16:34:18 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 16:34:18 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:34:18 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:34:18 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 16:34:18 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 16:34:18 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 16:34:18 --> [REQ_ID=92bee82ca665] [PERF] Execution time=0.069102
DEBUG - 2026-03-12 16:34:23 --> [REQ_ID=907158533bdb] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 16:34:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:23 --> [REQ_ID=907158533bdb] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 16:34:23 --> [REQ_ID=907158533bdb] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 16:34:23 --> [REQ_ID=907158533bdb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 16:34:23 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:23 --> [REQ_ID=6b49e6c7df62] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:34:23 --> [REQ_ID=6b49e6c7df62] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:34:23 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 16:34:23 --> [REQ_ID=6b49e6c7df62] [PERF] Execution time=0.018661
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 16:34:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 16:34:28 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [METHOD_ENTRY] index
DEBUG - 2026-03-12 16:34:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:34:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 16:34:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 16:34:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 16:34:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 16:34:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 16:34:28 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [LIFECYCLE][END] status=200 duration_ms=34.63 memory_delta=0
INFO - 2026-03-12 16:34:28 --> [REQ_ID=f5c5ee39ec77] [PERF] Execution time=0.034147
DEBUG - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [REQUEST][END]
INFO - 2026-03-12 16:34:28 --> [REQ_ID=1c96dacc7edb] [PERF] Execution time=0.044931
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=c9ef62c6501e] [REQUEST][START] POST /index.php/Support/resendActivation
DEBUG - 2026-03-12 16:34:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=c9ef62c6501e] [FILTER_BEFORE] /index.php/Support/resendActivation
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=c9ef62c6501e] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=resendActivation
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=c9ef62c6501e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Support/resendActivation
DEBUG - 2026-03-12 16:34:36 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
INFO - 2026-03-12 16:34:36 --> CSRF token verified.
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=0ea395b541c2] [INIT] App\Modules\Support\Controllers\AccountSupportController::POST
INFO - 2026-03-12 16:34:36 --> [REQ_ID=0ea395b541c2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:36 --> [REQ_ID=0ea395b541c2] [METHOD_ENTRY] resendActivation
DEBUG - 2026-03-12 16:34:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:34:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 16:34:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 16:34:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 16:34:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 16:34:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 16:34:36 --> [SUPPORT] Account help requested
INFO - 2026-03-12 16:34:38 --> [SUPPORT] Account help outcome
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=c9ef62c6501e] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=c9ef62c6501e] [LIFECYCLE][END] status=303 duration_ms=1,289.53 memory_delta=0
INFO - 2026-03-12 16:34:38 --> [REQ_ID=0ea395b541c2] [PERF] Execution time=1.289456
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=c9ef62c6501e] [REQUEST][END]
INFO - 2026-03-12 16:34:38 --> [REQ_ID=c9ef62c6501e] [PERF] Execution time=1.300753
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 16:34:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 16:34:38 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [METHOD_ENTRY] index
DEBUG - 2026-03-12 16:34:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:34:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 16:34:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 16:34:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 16:34:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 16:34:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 16:34:38 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [LIFECYCLE][END] status=200 duration_ms=36.66 memory_delta=0
INFO - 2026-03-12 16:34:38 --> [REQ_ID=e27a85239060] [PERF] Execution time=0.036484
DEBUG - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [REQUEST][END]
INFO - 2026-03-12 16:34:38 --> [REQ_ID=a7b884c29e0f] [PERF] Execution time=0.045910
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 16:34:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 16:34:52 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [LIFECYCLE][END] status=200 duration_ms=3.16 memory_delta=0
DEBUG - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [REQUEST][END]
INFO - 2026-03-12 16:34:52 --> [REQ_ID=f3692a1ad906] [PERF] Execution time=0.013361
DEBUG - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-12 16:34:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-12 16:34:56 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [REQUEST][END]
INFO - 2026-03-12 16:34:56 --> [REQ_ID=a474344a89b6] [PERF] Execution time=0.010062
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:34:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:34:57 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=a1342d27dca0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:34:57 --> [REQ_ID=a1342d27dca0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [FILTER_AFTER]
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [LIFECYCLE][END] status=200 duration_ms=148.62 memory_delta=0
INFO - 2026-03-12 16:34:57 --> [REQ_ID=a1342d27dca0] [PERF] Execution time=0.148419
DEBUG - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [REQUEST][END]
INFO - 2026-03-12 16:34:57 --> [REQ_ID=4f442d110460] [PERF] Execution time=0.157708
DEBUG - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-12 16:35:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-12 16:35:08 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [REQUEST][END]
INFO - 2026-03-12 16:35:08 --> [REQ_ID=6f812aee9066] [PERF] Execution time=0.016472
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:09 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=6b3afade24e7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:09 --> [REQ_ID=6b3afade24e7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [LIFECYCLE][END] status=200 duration_ms=47.79 memory_delta=0
INFO - 2026-03-12 16:35:09 --> [REQ_ID=6b3afade24e7] [PERF] Execution time=0.047756
DEBUG - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [REQUEST][END]
INFO - 2026-03-12 16:35:09 --> [REQ_ID=7ba0b9d55af1] [PERF] Execution time=0.056714
DEBUG - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-12 16:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-12 16:35:17 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [REQUEST][END]
INFO - 2026-03-12 16:35:17 --> [REQ_ID=de975e6d6bef] [PERF] Execution time=0.009608
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:18 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0ddc81b5aa78] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:18 --> [REQ_ID=0ddc81b5aa78] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [LIFECYCLE][END] status=200 duration_ms=42.19 memory_delta=0
INFO - 2026-03-12 16:35:18 --> [REQ_ID=0ddc81b5aa78] [PERF] Execution time=0.042136
DEBUG - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [REQUEST][END]
INFO - 2026-03-12 16:35:18 --> [REQ_ID=0954879b88d8] [PERF] Execution time=0.050898
DEBUG - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-12 16:35:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-12 16:35:25 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [REQUEST][END]
INFO - 2026-03-12 16:35:25 --> [REQ_ID=2a0097c6fa5f] [PERF] Execution time=0.009637
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:26 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=cfc9b7c828f1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:26 --> [REQ_ID=cfc9b7c828f1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [LIFECYCLE][END] status=200 duration_ms=39.78 memory_delta=0
INFO - 2026-03-12 16:35:26 --> [REQ_ID=cfc9b7c828f1] [PERF] Execution time=0.039703
DEBUG - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [REQUEST][END]
INFO - 2026-03-12 16:35:26 --> [REQ_ID=52f56b734806] [PERF] Execution time=0.050408
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-12 16:35:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-12 16:35:34 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [REQUEST][END]
INFO - 2026-03-12 16:35:34 --> [REQ_ID=dcd47e74205f] [PERF] Execution time=0.009750
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:34 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=f50713abc9aa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:34 --> [REQ_ID=f50713abc9aa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [LIFECYCLE][END] status=200 duration_ms=46.26 memory_delta=0
INFO - 2026-03-12 16:35:34 --> [REQ_ID=f50713abc9aa] [PERF] Execution time=0.046199
DEBUG - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [REQUEST][END]
INFO - 2026-03-12 16:35:34 --> [REQ_ID=e60edfe236a4] [PERF] Execution time=0.055740
DEBUG - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-12 16:35:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-12 16:35:45 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [REQUEST][END]
INFO - 2026-03-12 16:35:45 --> [REQ_ID=679730c780e5] [PERF] Execution time=0.009480
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:46 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=1451953ea540] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:46 --> [REQ_ID=1451953ea540] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [LIFECYCLE][END] status=200 duration_ms=91.27 memory_delta=0
INFO - 2026-03-12 16:35:46 --> [REQ_ID=1451953ea540] [PERF] Execution time=0.091159
DEBUG - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [REQUEST][END]
INFO - 2026-03-12 16:35:46 --> [REQ_ID=09eeaaee9446] [PERF] Execution time=0.100053
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 16:35:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 16:35:56 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [REQUEST][END]
INFO - 2026-03-12 16:35:56 --> [REQ_ID=d990022bb4c7] [PERF] Execution time=0.009687
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:35:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:35:56 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=ecc6c56405f9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:35:56 --> [REQ_ID=ecc6c56405f9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [FILTER_AFTER]
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [LIFECYCLE][END] status=200 duration_ms=28.31 memory_delta=0
INFO - 2026-03-12 16:35:56 --> [REQ_ID=ecc6c56405f9] [PERF] Execution time=0.028062
DEBUG - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [REQUEST][END]
INFO - 2026-03-12 16:35:56 --> [REQ_ID=54e7ee5ed6cd] [PERF] Execution time=0.038110
DEBUG - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 16:36:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 16:36:04 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [REQUEST][END]
INFO - 2026-03-12 16:36:04 --> [REQ_ID=8f529d29659d] [PERF] Execution time=0.009825
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:36:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:36:05 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=3ff1dc9ed3dd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:36:05 --> [REQ_ID=3ff1dc9ed3dd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [LIFECYCLE][END] status=200 duration_ms=36.71 memory_delta=0
INFO - 2026-03-12 16:36:05 --> [REQ_ID=3ff1dc9ed3dd] [PERF] Execution time=0.036685
DEBUG - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [REQUEST][END]
INFO - 2026-03-12 16:36:05 --> [REQ_ID=52d222ab647b] [PERF] Execution time=0.046195
DEBUG - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 16:36:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-12 16:36:15 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [REQUEST][END]
INFO - 2026-03-12 16:36:15 --> [REQ_ID=08e0d1a67056] [PERF] Execution time=0.010433
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:36:16 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=6c7f00eb809c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:36:16 --> [REQ_ID=6c7f00eb809c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [LIFECYCLE][END] status=200 duration_ms=100.92 memory_delta=0
INFO - 2026-03-12 16:36:16 --> [REQ_ID=6c7f00eb809c] [PERF] Execution time=0.100753
DEBUG - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [REQUEST][END]
INFO - 2026-03-12 16:36:16 --> [REQ_ID=30b3059c636f] [PERF] Execution time=0.109323
DEBUG - 2026-03-12 16:36:22 --> [REQ_ID=edf6d1d4f36a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-12 16:36:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-12 16:36:24 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [REQUEST][END]
INFO - 2026-03-12 16:36:24 --> [REQ_ID=b6c6d38d795c] [PERF] Execution time=0.013197
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:36:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:36:25 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=01c50019eacd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:36:25 --> [REQ_ID=01c50019eacd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [LIFECYCLE][END] status=200 duration_ms=26.97 memory_delta=0
INFO - 2026-03-12 16:36:25 --> [REQ_ID=01c50019eacd] [PERF] Execution time=0.026745
DEBUG - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [REQUEST][END]
INFO - 2026-03-12 16:36:25 --> [REQ_ID=ea3a32931a0a] [PERF] Execution time=0.037411
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 16:36:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-12 16:36:32 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [REQUEST][END]
INFO - 2026-03-12 16:36:32 --> [REQ_ID=ddbf4b7cfc4b] [PERF] Execution time=0.009833
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:36:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:36:32 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=bb97c906eb0d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:36:32 --> [REQ_ID=bb97c906eb0d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [LIFECYCLE][END] status=200 duration_ms=85.18 memory_delta=0
INFO - 2026-03-12 16:36:32 --> [REQ_ID=bb97c906eb0d] [PERF] Execution time=0.085132
DEBUG - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [REQUEST][END]
INFO - 2026-03-12 16:36:32 --> [REQ_ID=2a15d37427d7] [PERF] Execution time=0.093899
DEBUG - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 16:36:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 16:36:41 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [REQUEST][END]
INFO - 2026-03-12 16:36:41 --> [REQ_ID=c947ca146851] [PERF] Execution time=0.010222
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 16:36:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 16:36:42 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=d38965818f8e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 16:36:42 --> [REQ_ID=d38965818f8e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [LIFECYCLE][END] status=200 duration_ms=31.69 memory_delta=0
INFO - 2026-03-12 16:36:42 --> [REQ_ID=d38965818f8e] [PERF] Execution time=0.031048
DEBUG - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [REQUEST][END]
INFO - 2026-03-12 16:36:42 --> [REQ_ID=3ef6b7b74221] [PERF] Execution time=0.043581
DEBUG - 2026-03-12 16:36:51 --> [REQ_ID=5420cce8507a] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-12 16:36:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:36:51 --> [REQ_ID=5420cce8507a] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-12 16:36:51 --> [REQ_ID=5420cce8507a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 16:36:51 --> [REQ_ID=5420cce8507a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 16:36:51 --> [CSRF] token name=csrf_test_name hash=6676cd11ce9e11d94c7cffb4bddb0aed
DEBUG - 2026-03-12 16:36:51 --> [REQ_ID=30b93b8e9422] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 16:36:51 --> [REQ_ID=30b93b8e9422] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 16:36:51 --> [REQ_ID=30b93b8e9422] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 16:36:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 16:36:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 16:36:52 --> [REQ_ID=30b93b8e9422] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 16:36:52 --> [REQ_ID=30b93b8e9422] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 16:36:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 16:36:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 16:36:52 --> [REQ_ID=5420cce8507a] [FILTER_AFTER]
DEBUG - 2026-03-12 16:36:52 --> [REQ_ID=5420cce8507a] [LIFECYCLE][END] status=200 duration_ms=582.79 memory_delta=4194304
INFO - 2026-03-12 16:36:52 --> [REQ_ID=30b93b8e9422] [PERF] Execution time=0.582541
DEBUG - 2026-03-12 16:36:52 --> [REQ_ID=5420cce8507a] [REQUEST][END]
INFO - 2026-03-12 16:36:52 --> [REQ_ID=5420cce8507a] [PERF] Execution time=0.591733
DEBUG - 2026-03-12 16:41:10 --> [REQ_ID=7b496f15eb1e] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-12 16:41:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 16:41:10 --> [REQ_ID=7b496f15eb1e] [REQUEST][END]
INFO - 2026-03-12 16:41:10 --> [REQ_ID=7b496f15eb1e] [PERF] Execution time=0.042518
DEBUG - 2026-03-12 16:41:22 --> [REQ_ID=f8da94c23f93] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:46:22 --> [REQ_ID=0ef4e37baae9] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:51:22 --> [REQ_ID=c4a4d40c627b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 16:56:22 --> [REQ_ID=d26605d0fcc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [REQUEST][END]
INFO - 2026-03-12 17:00:02 --> [REQ_ID=a67e43ac0e3f] [PERF] Execution time=0.045981
DEBUG - 2026-03-12 17:01:22 --> [REQ_ID=d6e1292b3fbe] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:06:22 --> [REQ_ID=e9bb32d258c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:11:22 --> [REQ_ID=d69ffa908899] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [REQUEST][END]
INFO - 2026-03-12 17:15:01 --> [REQ_ID=cb402350584c] [PERF] Execution time=0.045405
DEBUG - 2026-03-12 17:15:07 --> [REQ_ID=756706ee3880] [REQUEST][START] GET /
DEBUG - 2026-03-12 17:15:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:07 --> [REQ_ID=756706ee3880] [FILTER_BEFORE] /
DEBUG - 2026-03-12 17:15:07 --> [REQ_ID=756706ee3880] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 17:15:07 --> [REQ_ID=756706ee3880] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 17:15:07 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:07 --> [REQ_ID=5b278d702813] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 17:15:07 --> [REQ_ID=5b278d702813] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:15:07 --> [REQ_ID=5b278d702813] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 17:15:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 17:15:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 17:15:08 --> [REQ_ID=5b278d702813] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 17:15:08 --> [REQ_ID=5b278d702813] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 17:15:08 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 17:15:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 17:15:08 --> [REQ_ID=756706ee3880] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:08 --> [REQ_ID=756706ee3880] [LIFECYCLE][END] status=200 duration_ms=987.96 memory_delta=4194304
INFO - 2026-03-12 17:15:08 --> [REQ_ID=5b278d702813] [PERF] Execution time=0.986580
DEBUG - 2026-03-12 17:15:08 --> [REQ_ID=756706ee3880] [REQUEST][END]
INFO - 2026-03-12 17:15:08 --> [REQ_ID=756706ee3880] [PERF] Execution time=0.998731
DEBUG - 2026-03-12 17:15:13 --> [REQ_ID=b2b22755d1df] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 17:15:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:13 --> [REQ_ID=b2b22755d1df] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 17:15:13 --> [REQ_ID=b2b22755d1df] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 17:15:13 --> [REQ_ID=b2b22755d1df] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 17:15:13 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
INFO - 2026-03-12 17:15:13 --> CSRF token verified.
DEBUG - 2026-03-12 17:15:13 --> [REQ_ID=0789e49c6283] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 17:15:13 --> [REQ_ID=0789e49c6283] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 17:15:13 --> [REGISTRATION] Submission received
INFO - 2026-03-12 17:15:13 --> MailService queued email
INFO - 2026-03-12 17:15:13 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 17:15:13 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 17:15:13 --> Registration created user_id=11720, email=el.i.y.a.hus.a.p.o@gmail.com, username=fKFVCxgjFzIxIJtltaqwrjY, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 17:15:13 --> [REGISTRATION] User record created
INFO - 2026-03-12 17:15:13 --> OnboardingProgressService: created onboarding record for user_id=11720
INFO - 2026-03-12 17:15:15 --> Registration succeeded for el.i.y.a.hus.a.p.o@gmail.com (event 280a69bf0be581be)
INFO - 2026-03-12 17:15:15 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 17:15:15 --> Registration redirecting to success guide for user_id=11720
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=b2b22755d1df] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=b2b22755d1df] [LIFECYCLE][END] status=303 duration_ms=1,499.89 memory_delta=0
INFO - 2026-03-12 17:15:15 --> [REQ_ID=0789e49c6283] [PERF] Execution time=1.499500
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=b2b22755d1df] [REQUEST][END]
INFO - 2026-03-12 17:15:15 --> [REQ_ID=b2b22755d1df] [PERF] Execution time=1.512240
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=98d575e9e1e1] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 17:15:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=98d575e9e1e1] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=98d575e9e1e1] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=98d575e9e1e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 17:15:15 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:15 --> [REQ_ID=946ffa2d84e1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:15:15 --> [REQ_ID=946ffa2d84e1] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:15:15 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 17:15:15 --> [REQ_ID=946ffa2d84e1] [PERF] Execution time=0.150143
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 17:15:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 17:15:28 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [REQUEST][END]
INFO - 2026-03-12 17:15:28 --> [REQ_ID=d6fffa9f4aa4] [PERF] Execution time=0.010144
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:15:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:15:28 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=1bba8e999582] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:15:28 --> [REQ_ID=1bba8e999582] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [LIFECYCLE][END] status=200 duration_ms=163.35 memory_delta=0
INFO - 2026-03-12 17:15:28 --> [REQ_ID=1bba8e999582] [PERF] Execution time=0.163316
DEBUG - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [REQUEST][END]
INFO - 2026-03-12 17:15:28 --> [REQ_ID=18208235fdf4] [PERF] Execution time=0.172515
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 17:15:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:15:40 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
INFO - 2026-03-12 17:15:40 --> CSRF token verified.
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=882e63485a48] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 17:15:40 --> [REQ_ID=882e63485a48] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:15:40 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 17:15:40 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 17:15:40 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.181.61.203, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 17:15:40 --> Auth attemptLogin() called with login identifier: el.i.y.a.hus.a.p.o@gmail.com, remember: true
DEBUG - 2026-03-12 17:15:40 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 17:15:40 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 17:15:40 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 17:15:40 --> Auth attempt failed for identifier el.i.y.a.hus.a.p.o@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 17:15:40 --> [AUTH] Login failure
WARNING - 2026-03-12 17:15:40 --> [AUTH] Login failed
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [LIFECYCLE][END] status=303 duration_ms=266.51 memory_delta=0
INFO - 2026-03-12 17:15:40 --> [REQ_ID=882e63485a48] [PERF] Execution time=0.266581
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [REQUEST][END]
INFO - 2026-03-12 17:15:40 --> [REQ_ID=49e42231564c] [PERF] Execution time=0.276913
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:15:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:15:40 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=874632069c99] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:15:40 --> [REQ_ID=874632069c99] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [LIFECYCLE][END] status=200 duration_ms=40.18 memory_delta=0
INFO - 2026-03-12 17:15:40 --> [REQ_ID=874632069c99] [PERF] Execution time=0.039853
DEBUG - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [REQUEST][END]
INFO - 2026-03-12 17:15:40 --> [REQ_ID=58751c3af86c] [PERF] Execution time=0.050738
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:15:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:15:54 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=cbfd73798dce] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:15:54 --> [REQ_ID=cbfd73798dce] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [FILTER_AFTER]
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [LIFECYCLE][END] status=200 duration_ms=62.90 memory_delta=0
INFO - 2026-03-12 17:15:54 --> [REQ_ID=cbfd73798dce] [PERF] Execution time=0.062773
DEBUG - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [REQUEST][END]
INFO - 2026-03-12 17:15:54 --> [REQ_ID=d78d3062489c] [PERF] Execution time=0.072217
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=6b5753a4b02e] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 17:15:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=6b5753a4b02e] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=6b5753a4b02e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=6b5753a4b02e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 17:15:59 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=36f5579cc06f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 17:15:59 --> [REQ_ID=36f5579cc06f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:15:59 --> [REQ_ID=36f5579cc06f] [METHOD_ENTRY] show
DEBUG - 2026-03-12 17:15:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 17:15:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 17:15:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 17:15:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 17:15:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 17:15:59 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 17:15:59 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 17:15:59 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:15:59 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:15:59 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 17:15:59 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 17:15:59 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 17:15:59 --> [REQ_ID=36f5579cc06f] [PERF] Execution time=0.234118
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=84f9129e5754] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 17:16:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=84f9129e5754] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=84f9129e5754] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=84f9129e5754] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 17:16:04 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=a9160f2c54a4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 17:16:04 --> [REQ_ID=a9160f2c54a4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:16:04 --> [REQ_ID=a9160f2c54a4] [METHOD_ENTRY] show
DEBUG - 2026-03-12 17:16:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 17:16:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 17:16:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 17:16:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 17:16:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 17:16:04 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 17:16:04 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 17:16:04 --> [REQ_ID=a9160f2c54a4] [PERF] Execution time=0.134438
DEBUG - 2026-03-12 17:16:09 --> [REQ_ID=0184d58c71a6] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 17:16:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 17:16:10 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [LIFECYCLE][END] status=200 duration_ms=3.37 memory_delta=0
DEBUG - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [REQUEST][END]
INFO - 2026-03-12 17:16:10 --> [REQ_ID=0184d58c71a6] [PERF] Execution time=0.015758
DEBUG - 2026-03-12 17:16:15 --> [REQ_ID=228e8bcda0aa] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-12 17:16:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:15 --> [REQ_ID=228e8bcda0aa] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 17:16:15 --> [REQ_ID=228e8bcda0aa] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-12 17:16:15 --> [REQ_ID=228e8bcda0aa] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 17:16:15 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
INFO - 2026-03-12 17:16:15 --> CSRF token verified.
DEBUG - 2026-03-12 17:16:15 --> [REQ_ID=c046df64f0f9] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 17:16:15 --> [REQ_ID=c046df64f0f9] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:16:15 --> [AUTH] Password reset requested
INFO - 2026-03-12 17:16:16 --> [AUTH] Password reset email sent
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=228e8bcda0aa] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=228e8bcda0aa] [LIFECYCLE][END] status=303 duration_ms=1,182.76 memory_delta=0
INFO - 2026-03-12 17:16:16 --> [REQ_ID=c046df64f0f9] [PERF] Execution time=1.182617
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=228e8bcda0aa] [REQUEST][END]
INFO - 2026-03-12 17:16:16 --> [REQ_ID=228e8bcda0aa] [PERF] Execution time=1.192625
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [REQUEST][START] GET /index.php/reset-password
DEBUG - 2026-03-12 17:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [FILTER_BEFORE] /index.php/reset-password
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [ROUTE] Controller=\App\Controllers\AuthController Method=resetPassword
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/reset-password
DEBUG - 2026-03-12 17:16:16 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=5bf1ec342426] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:16:16 --> [REQ_ID=5bf1ec342426] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [LIFECYCLE][END] status=200 duration_ms=17.09 memory_delta=0
INFO - 2026-03-12 17:16:16 --> [REQ_ID=5bf1ec342426] [PERF] Execution time=0.016894
DEBUG - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [REQUEST][END]
INFO - 2026-03-12 17:16:16 --> [REQ_ID=b0944ab17fc5] [PERF] Execution time=0.026817
DEBUG - 2026-03-12 17:16:22 --> [REQ_ID=59be3cc48f66] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:16:30 --> [REQ_ID=f7793e84e783] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 17:16:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:30 --> [REQ_ID=f7793e84e783] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 17:16:30 --> [REQ_ID=f7793e84e783] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 17:16:30 --> [REQ_ID=f7793e84e783] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 17:16:30 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:30 --> [REQ_ID=a41c18748b23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:16:30 --> [REQ_ID=a41c18748b23] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:16:30 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 17:16:30 --> [REQ_ID=a41c18748b23] [PERF] Execution time=0.029651
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 17:16:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 17:16:35 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [METHOD_ENTRY] index
DEBUG - 2026-03-12 17:16:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 17:16:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 17:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 17:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 17:16:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 17:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 17:16:35 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [LIFECYCLE][END] status=200 duration_ms=114.23 memory_delta=0
INFO - 2026-03-12 17:16:35 --> [REQ_ID=10b455af1038] [PERF] Execution time=0.114008
DEBUG - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [REQUEST][END]
INFO - 2026-03-12 17:16:35 --> [REQ_ID=da40f839712b] [PERF] Execution time=0.124158
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-12 17:16:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-12 17:16:40 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [REQUEST][END]
INFO - 2026-03-12 17:16:40 --> [REQ_ID=c0d424db4d29] [PERF] Execution time=0.013585
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:16:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:16:40 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=f6ced0a41f25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:16:40 --> [REQ_ID=f6ced0a41f25] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [LIFECYCLE][END] status=200 duration_ms=53.18 memory_delta=0
INFO - 2026-03-12 17:16:40 --> [REQ_ID=f6ced0a41f25] [PERF] Execution time=0.053137
DEBUG - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [REQUEST][END]
INFO - 2026-03-12 17:16:40 --> [REQ_ID=3bcd39a44966] [PERF] Execution time=0.062654
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 17:16:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 17:16:48 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [REQUEST][END]
INFO - 2026-03-12 17:16:48 --> [REQ_ID=5ed69847ee3f] [PERF] Execution time=0.010760
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:16:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:16:48 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=d6934d06655b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:16:48 --> [REQ_ID=d6934d06655b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [FILTER_AFTER]
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [LIFECYCLE][END] status=200 duration_ms=44.14 memory_delta=0
INFO - 2026-03-12 17:16:48 --> [REQ_ID=d6934d06655b] [PERF] Execution time=0.043951
DEBUG - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [REQUEST][END]
INFO - 2026-03-12 17:16:48 --> [REQ_ID=b771d6e8fdc2] [PERF] Execution time=0.053908
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-12 17:17:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-12 17:17:00 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [REQUEST][END]
INFO - 2026-03-12 17:17:00 --> [REQ_ID=ade153d69d1c] [PERF] Execution time=0.009681
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:00 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=90865082f53d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:00 --> [REQ_ID=90865082f53d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [LIFECYCLE][END] status=200 duration_ms=20.67 memory_delta=0
INFO - 2026-03-12 17:17:00 --> [REQ_ID=90865082f53d] [PERF] Execution time=0.020443
DEBUG - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [REQUEST][END]
INFO - 2026-03-12 17:17:00 --> [REQ_ID=eb02b0c41760] [PERF] Execution time=0.029029
DEBUG - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-12 17:17:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-12 17:17:07 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [REQUEST][END]
INFO - 2026-03-12 17:17:07 --> [REQ_ID=ef895603210c] [PERF] Execution time=0.010007
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:08 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=4f821f25bf4d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:08 --> [REQ_ID=4f821f25bf4d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [LIFECYCLE][END] status=200 duration_ms=17.33 memory_delta=0
INFO - 2026-03-12 17:17:08 --> [REQ_ID=4f821f25bf4d] [PERF] Execution time=0.017113
DEBUG - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [REQUEST][END]
INFO - 2026-03-12 17:17:08 --> [REQ_ID=5ec5f123dd86] [PERF] Execution time=0.026404
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-12 17:17:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-12 17:17:19 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [REQUEST][END]
INFO - 2026-03-12 17:17:19 --> [REQ_ID=2482c8dd6312] [PERF] Execution time=0.009701
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:19 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=a0fb39e3340a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:19 --> [REQ_ID=a0fb39e3340a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [LIFECYCLE][END] status=200 duration_ms=63.53 memory_delta=0
INFO - 2026-03-12 17:17:19 --> [REQ_ID=a0fb39e3340a] [PERF] Execution time=0.063553
DEBUG - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [REQUEST][END]
INFO - 2026-03-12 17:17:19 --> [REQ_ID=b2dc8ade50d8] [PERF] Execution time=0.072501
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 17:17:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-12 17:17:27 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [REQUEST][END]
INFO - 2026-03-12 17:17:27 --> [REQ_ID=1feb0a590a30] [PERF] Execution time=0.009855
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:27 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=530301abcd5d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:27 --> [REQ_ID=530301abcd5d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [LIFECYCLE][END] status=200 duration_ms=23.30 memory_delta=0
INFO - 2026-03-12 17:17:27 --> [REQ_ID=530301abcd5d] [PERF] Execution time=0.023223
DEBUG - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [REQUEST][END]
INFO - 2026-03-12 17:17:27 --> [REQ_ID=e9a7899fd520] [PERF] Execution time=0.032194
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 17:17:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 17:17:38 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [REQUEST][END]
INFO - 2026-03-12 17:17:38 --> [REQ_ID=529b9773a32f] [PERF] Execution time=0.009808
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:38 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=175fe9872ab7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:38 --> [REQ_ID=175fe9872ab7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [LIFECYCLE][END] status=200 duration_ms=60.86 memory_delta=0
INFO - 2026-03-12 17:17:38 --> [REQ_ID=175fe9872ab7] [PERF] Execution time=0.060790
DEBUG - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [REQUEST][END]
INFO - 2026-03-12 17:17:38 --> [REQ_ID=93184d3fe9ea] [PERF] Execution time=0.070240
DEBUG - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 17:17:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 17:17:46 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [REQUEST][END]
INFO - 2026-03-12 17:17:46 --> [REQ_ID=c5cc1660442a] [PERF] Execution time=0.010149
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:47 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=5dec74eb6a76] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:47 --> [REQ_ID=5dec74eb6a76] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [LIFECYCLE][END] status=200 duration_ms=98.47 memory_delta=0
INFO - 2026-03-12 17:17:47 --> [REQ_ID=5dec74eb6a76] [PERF] Execution time=0.098383
DEBUG - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [REQUEST][END]
INFO - 2026-03-12 17:17:47 --> [REQ_ID=dd66fea851a2] [PERF] Execution time=0.107190
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-12 17:17:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-12 17:17:57 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [REQUEST][END]
INFO - 2026-03-12 17:17:57 --> [REQ_ID=c014def15902] [PERF] Execution time=0.011398
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:17:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:17:57 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=5a25fff73ec4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:17:57 --> [REQ_ID=5a25fff73ec4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [FILTER_AFTER]
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [LIFECYCLE][END] status=200 duration_ms=54.41 memory_delta=0
INFO - 2026-03-12 17:17:57 --> [REQ_ID=5a25fff73ec4] [PERF] Execution time=0.054337
DEBUG - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [REQUEST][END]
INFO - 2026-03-12 17:17:57 --> [REQ_ID=97398282e830] [PERF] Execution time=0.063055
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 17:18:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-12 17:18:05 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [REQUEST][END]
INFO - 2026-03-12 17:18:05 --> [REQ_ID=a1b0f08abeea] [PERF] Execution time=0.010455
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:18:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:18:05 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=43a96ea006a5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:18:05 --> [REQ_ID=43a96ea006a5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [FILTER_AFTER]
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [LIFECYCLE][END] status=200 duration_ms=51.31 memory_delta=0
INFO - 2026-03-12 17:18:05 --> [REQ_ID=43a96ea006a5] [PERF] Execution time=0.051312
DEBUG - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [REQUEST][END]
INFO - 2026-03-12 17:18:05 --> [REQ_ID=e50dc964894e] [PERF] Execution time=0.062004
DEBUG - 2026-03-12 17:18:06 --> [REQ_ID=0b8ed66beda0] [REQUEST][START] GET /
DEBUG - 2026-03-12 17:18:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:06 --> [REQ_ID=0b8ed66beda0] [REQUEST][END]
INFO - 2026-03-12 17:18:06 --> [REQ_ID=0b8ed66beda0] [PERF] Execution time=0.008254
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-12 17:18:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-12 17:18:16 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [REQUEST][END]
INFO - 2026-03-12 17:18:16 --> [REQ_ID=9326de573ba5] [PERF] Execution time=0.009761
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:18:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:18:16 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=30ae31d621f9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:18:16 --> [REQ_ID=30ae31d621f9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [FILTER_AFTER]
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [LIFECYCLE][END] status=200 duration_ms=146.82 memory_delta=0
INFO - 2026-03-12 17:18:16 --> [REQ_ID=30ae31d621f9] [PERF] Execution time=0.146805
DEBUG - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [REQUEST][END]
INFO - 2026-03-12 17:18:16 --> [REQ_ID=f79ecee56be7] [PERF] Execution time=0.156154
DEBUG - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-12 17:18:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-12 17:18:24 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [REQUEST][END]
INFO - 2026-03-12 17:18:24 --> [REQ_ID=bffa8b549d9d] [PERF] Execution time=0.009880
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 17:18:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 17:18:25 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=1579cb97d4d3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 17:18:25 --> [REQ_ID=1579cb97d4d3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [FILTER_AFTER]
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [LIFECYCLE][END] status=200 duration_ms=20.06 memory_delta=0
INFO - 2026-03-12 17:18:25 --> [REQ_ID=1579cb97d4d3] [PERF] Execution time=0.019468
DEBUG - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [REQUEST][END]
INFO - 2026-03-12 17:18:25 --> [REQ_ID=51145ff4640f] [PERF] Execution time=0.036081
DEBUG - 2026-03-12 17:18:35 --> [REQ_ID=381c27580e00] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-12 17:18:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 17:18:35 --> [REQ_ID=381c27580e00] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-12 17:18:35 --> [REQ_ID=381c27580e00] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 17:18:35 --> [REQ_ID=381c27580e00] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 17:18:35 --> [CSRF] token name=csrf_test_name hash=cf2471f0e35d10778197ae0ef6f1b869
DEBUG - 2026-03-12 17:18:35 --> [REQ_ID=2af41ba9027e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 17:18:35 --> [REQ_ID=2af41ba9027e] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 17:18:35 --> [REQ_ID=2af41ba9027e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 17:18:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 17:18:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 17:18:36 --> [REQ_ID=2af41ba9027e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 17:18:36 --> [REQ_ID=2af41ba9027e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 17:18:36 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 17:18:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 17:18:36 --> [REQ_ID=381c27580e00] [FILTER_AFTER]
DEBUG - 2026-03-12 17:18:36 --> [REQ_ID=381c27580e00] [LIFECYCLE][END] status=200 duration_ms=957.11 memory_delta=4194304
INFO - 2026-03-12 17:18:36 --> [REQ_ID=2af41ba9027e] [PERF] Execution time=0.956822
DEBUG - 2026-03-12 17:18:36 --> [REQ_ID=381c27580e00] [REQUEST][END]
INFO - 2026-03-12 17:18:36 --> [REQ_ID=381c27580e00] [PERF] Execution time=0.967833
DEBUG - 2026-03-12 17:21:22 --> [REQ_ID=0a8975414b66] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:26:22 --> [REQ_ID=3080efd15e22] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:31:22 --> [REQ_ID=f7d08553eb2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:36:22 --> [REQ_ID=0f3b0820aaaa] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:41:22 --> [REQ_ID=12ae3b57a0e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:46:22 --> [REQ_ID=2567c88f85a5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:51:22 --> [REQ_ID=157c0197a31d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 17:56:22 --> [REQ_ID=926db6c52a76] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [REQUEST][END]
INFO - 2026-03-12 18:00:02 --> [REQ_ID=83538c8a6fbd] [PERF] Execution time=0.047491
DEBUG - 2026-03-12 18:01:22 --> [REQ_ID=c77d20150dff] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:06:22 --> [REQ_ID=119b64ec29d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:06:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:06:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:06:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:07:51 --> [REQ_ID=c9e82b407e34] [REQUEST][START] GET /
DEBUG - 2026-03-12 18:07:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:07:51 --> [REQ_ID=c9e82b407e34] [FILTER_BEFORE] /
DEBUG - 2026-03-12 18:07:51 --> [REQ_ID=c9e82b407e34] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 18:07:51 --> [REQ_ID=c9e82b407e34] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 18:07:51 --> [CSRF] token name=csrf_test_name hash=e22064fa5ca1134bbc0920a01768c786
DEBUG - 2026-03-12 18:07:51 --> [REQ_ID=7ea0d22c3cb6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 18:07:51 --> [REQ_ID=7ea0d22c3cb6] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 18:07:52 --> [REQ_ID=7ea0d22c3cb6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 18:07:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:07:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 18:07:52 --> [REQ_ID=7ea0d22c3cb6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 18:07:52 --> [REQ_ID=7ea0d22c3cb6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 18:07:52 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 18:07:52 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 18:07:52 --> [REQ_ID=c9e82b407e34] [FILTER_AFTER]
DEBUG - 2026-03-12 18:07:52 --> [REQ_ID=c9e82b407e34] [LIFECYCLE][END] status=200 duration_ms=824.06 memory_delta=4194304
INFO - 2026-03-12 18:07:52 --> [REQ_ID=7ea0d22c3cb6] [PERF] Execution time=0.821923
DEBUG - 2026-03-12 18:07:52 --> [REQ_ID=c9e82b407e34] [REQUEST][END]
INFO - 2026-03-12 18:07:52 --> [REQ_ID=c9e82b407e34] [PERF] Execution time=0.864145
DEBUG - 2026-03-12 18:11:22 --> [REQ_ID=baabbe67468d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:15:01 --> [REQ_ID=b6a4400c7d43] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:15:02 --> [REQ_ID=b6a4400c7d43] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 18:15:02 --> [REQ_ID=b6a4400c7d43] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 18:15:02 --> [REQ_ID=b6a4400c7d43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 18:15:02 --> [REQ_ID=b6a4400c7d43] [REQUEST][END]
INFO - 2026-03-12 18:15:02 --> [REQ_ID=b6a4400c7d43] [PERF] Execution time=0.044955
DEBUG - 2026-03-12 18:16:22 --> [REQ_ID=f37f2118889d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:21:22 --> [REQ_ID=e082c50a1ba4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:23:12 --> [REQ_ID=74105aea76b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:23:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:23:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:23:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:23:13 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:23:13 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-12 18:26:22 --> [REQ_ID=cac7b225f13d] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:31:22 --> [REQ_ID=8a0d9130797e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:33:29 --> [REQ_ID=7e8819cbf7b9] [REQUEST][START] GET /
DEBUG - 2026-03-12 18:33:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:33:29 --> [REQ_ID=7e8819cbf7b9] [FILTER_BEFORE] /
DEBUG - 2026-03-12 18:33:29 --> [REQ_ID=7e8819cbf7b9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 18:33:29 --> [REQ_ID=7e8819cbf7b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 18:33:29 --> [CSRF] token name=csrf_test_name hash=20642cb2e3181f67489113a8084f665e
DEBUG - 2026-03-12 18:33:29 --> [REQ_ID=7e9cde26fda2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 18:33:29 --> [REQ_ID=7e9cde26fda2] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 18:33:29 --> [REQ_ID=7e9cde26fda2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 18:33:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:33:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 18:33:30 --> [REQ_ID=7e9cde26fda2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 18:33:30 --> [REQ_ID=7e9cde26fda2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 18:33:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 18:33:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 18:33:30 --> [REQ_ID=7e8819cbf7b9] [FILTER_AFTER]
DEBUG - 2026-03-12 18:33:30 --> [REQ_ID=7e8819cbf7b9] [LIFECYCLE][END] status=200 duration_ms=753.31 memory_delta=4194304
INFO - 2026-03-12 18:33:30 --> [REQ_ID=7e9cde26fda2] [PERF] Execution time=0.751435
DEBUG - 2026-03-12 18:33:30 --> [REQ_ID=7e8819cbf7b9] [REQUEST][END]
INFO - 2026-03-12 18:33:30 --> [REQ_ID=7e8819cbf7b9] [PERF] Execution time=0.792572
DEBUG - 2026-03-12 18:36:22 --> [REQ_ID=51add2f4de51] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:41:22 --> [REQ_ID=34ff5daed60f] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:42:13 --> [REQ_ID=914fed1f3353] [REQUEST][START] GET /
DEBUG - 2026-03-12 18:42:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:42:13 --> [REQ_ID=914fed1f3353] [REQUEST][END]
INFO - 2026-03-12 18:42:13 --> [REQ_ID=914fed1f3353] [PERF] Execution time=0.017789
DEBUG - 2026-03-12 18:46:22 --> [REQ_ID=7d1db31cfc08] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [REQUEST][START] GET /
DEBUG - 2026-03-12 18:48:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [FILTER_BEFORE] /
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 18:48:20 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 18:48:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:48:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 18:48:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 18:48:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [FILTER_AFTER]
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [LIFECYCLE][END] status=200 duration_ms=569.82 memory_delta=4194304
INFO - 2026-03-12 18:48:20 --> [REQ_ID=ebed4304df2f] [PERF] Execution time=0.567701
DEBUG - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [REQUEST][END]
INFO - 2026-03-12 18:48:20 --> [REQ_ID=5bd0aaa46a56] [PERF] Execution time=0.607762
DEBUG - 2026-03-12 18:48:25 --> [REQ_ID=6d8a66bff55f] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-12 18:48:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:25 --> [REQ_ID=6d8a66bff55f] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 18:48:25 --> [REQ_ID=6d8a66bff55f] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-12 18:48:25 --> [REQ_ID=6d8a66bff55f] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 18:48:25 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
INFO - 2026-03-12 18:48:25 --> CSRF token verified.
DEBUG - 2026-03-12 18:48:25 --> [REQ_ID=20b7451f5c50] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 18:48:25 --> [REQ_ID=20b7451f5c50] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 18:48:25 --> [REGISTRATION] Submission received
INFO - 2026-03-12 18:48:25 --> MailService queued email
INFO - 2026-03-12 18:48:25 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-12 18:48:25 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-12 18:48:26 --> Registration created user_id=11721, email=fu.j.e.n.n.y@gmail.com, username=xUHIvdxayIuFgWIRhwYwBRiz, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-12 18:48:26 --> [REGISTRATION] User record created
INFO - 2026-03-12 18:48:26 --> OnboardingProgressService: created onboarding record for user_id=11721
INFO - 2026-03-12 18:48:27 --> Registration succeeded for fu.j.e.n.n.y@gmail.com (event b86aa1c2c438806f)
INFO - 2026-03-12 18:48:27 --> [REGISTRATION] Activation email queued
INFO - 2026-03-12 18:48:27 --> Registration redirecting to success guide for user_id=11721
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=6d8a66bff55f] [FILTER_AFTER]
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=6d8a66bff55f] [LIFECYCLE][END] status=303 duration_ms=1,272.20 memory_delta=0
INFO - 2026-03-12 18:48:27 --> [REQ_ID=20b7451f5c50] [PERF] Execution time=1.271886
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=6d8a66bff55f] [REQUEST][END]
INFO - 2026-03-12 18:48:27 --> [REQ_ID=6d8a66bff55f] [PERF] Execution time=1.285741
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=0cb58a1b3aad] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-12 18:48:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=0cb58a1b3aad] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=0cb58a1b3aad] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=0cb58a1b3aad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-12 18:48:27 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:27 --> [REQ_ID=43ae3a41b60a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:48:27 --> [REQ_ID=43ae3a41b60a] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 18:48:27 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-12 18:48:27 --> [REQ_ID=43ae3a41b60a] [PERF] Execution time=0.016253
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=4f6aa37c8f36] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 18:48:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=4f6aa37c8f36] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=4f6aa37c8f36] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=4f6aa37c8f36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-12 18:48:40 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=b25bdef48335] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 18:48:40 --> [REQ_ID=b25bdef48335] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:48:40 --> [REQ_ID=b25bdef48335] [METHOD_ENTRY] show
DEBUG - 2026-03-12 18:48:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:48:40 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 18:48:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 18:48:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 18:48:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 18:48:40 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 18:48:40 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-12 18:48:40 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:48:40 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:48:40 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-12 18:48:40 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-12 18:48:40 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 18:48:40 --> [REQ_ID=b25bdef48335] [PERF] Execution time=0.082867
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=e3d7528991a6] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 18:48:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=e3d7528991a6] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=e3d7528991a6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=e3d7528991a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-12 18:48:44 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=32ec2f760514] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 18:48:44 --> [REQ_ID=32ec2f760514] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:48:44 --> [REQ_ID=32ec2f760514] [METHOD_ENTRY] show
DEBUG - 2026-03-12 18:48:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:48:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 18:48:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 18:48:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 18:48:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 18:48:44 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 18:48:44 --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
INFO - 2026-03-12 18:48:44 --> [REQ_ID=32ec2f760514] [PERF] Execution time=0.018909
DEBUG - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-12 18:48:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 18:48:49 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [REQUEST][END]
INFO - 2026-03-12 18:48:49 --> [REQ_ID=0baf399c1321] [PERF] Execution time=0.010666
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:48:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:48:50 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=76ea05ae8ddd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:48:50 --> [REQ_ID=76ea05ae8ddd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [FILTER_AFTER]
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [LIFECYCLE][END] status=200 duration_ms=30.78 memory_delta=0
INFO - 2026-03-12 18:48:50 --> [REQ_ID=76ea05ae8ddd] [PERF] Execution time=0.030671
DEBUG - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [REQUEST][END]
INFO - 2026-03-12 18:48:50 --> [REQ_ID=eb0697732909] [PERF] Execution time=0.042184
DEBUG - 2026-03-12 18:48:58 --> [REQ_ID=e0642a45d641] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-12 18:48:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:58 --> [REQ_ID=e0642a45d641] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:48:58 --> [REQ_ID=e0642a45d641] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-12 18:48:58 --> [REQ_ID=e0642a45d641] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:48:58 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
INFO - 2026-03-12 18:48:58 --> CSRF token verified.
DEBUG - 2026-03-12 18:48:58 --> [REQ_ID=19e4acf49336] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 18:48:58 --> [REQ_ID=19e4acf49336] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 18:48:58 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-12 18:48:58 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-12 18:48:58 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 23.134.90.60, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-03-12 18:48:58 --> Auth attemptLogin() called with login identifier: fu.j.e.n.n.y@gmail.com, remember: false
DEBUG - 2026-03-12 18:48:58 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-12 18:48:58 --> Auth credentials normalised for attempt using key "email"
WARNING - 2026-03-12 18:48:59 --> [AUTH_FAILURE] 
DEBUG - 2026-03-12 18:48:59 --> Auth attempt failed for identifier fu.j.e.n.n.y@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-03-12 18:48:59 --> [AUTH] Login failure
WARNING - 2026-03-12 18:48:59 --> [AUTH] Login failed
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=e0642a45d641] [FILTER_AFTER]
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=e0642a45d641] [LIFECYCLE][END] status=303 duration_ms=183.67 memory_delta=0
INFO - 2026-03-12 18:48:59 --> [REQ_ID=19e4acf49336] [PERF] Execution time=0.183423
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=e0642a45d641] [REQUEST][END]
INFO - 2026-03-12 18:48:59 --> [REQ_ID=e0642a45d641] [PERF] Execution time=0.194485
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:48:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:48:59 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=8b9df7c23050] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:48:59 --> [REQ_ID=8b9df7c23050] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [FILTER_AFTER]
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [LIFECYCLE][END] status=200 duration_ms=93.75 memory_delta=0
INFO - 2026-03-12 18:48:59 --> [REQ_ID=8b9df7c23050] [PERF] Execution time=0.093663
DEBUG - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [REQUEST][END]
INFO - 2026-03-12 18:48:59 --> [REQ_ID=639201c2627f] [PERF] Execution time=0.102525
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:49:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:49:13 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=f7535f111695] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:49:13 --> [REQ_ID=f7535f111695] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [LIFECYCLE][END] status=200 duration_ms=14.61 memory_delta=0
INFO - 2026-03-12 18:49:13 --> [REQ_ID=f7535f111695] [PERF] Execution time=0.014462
DEBUG - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [REQUEST][END]
INFO - 2026-03-12 18:49:13 --> [REQ_ID=db292824045f] [PERF] Execution time=0.023799
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-12 18:49:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 18:49:22 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [LIFECYCLE][END] status=200 duration_ms=3.12 memory_delta=0
DEBUG - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [REQUEST][END]
INFO - 2026-03-12 18:49:22 --> [REQ_ID=b02095d398de] [PERF] Execution time=0.013909
DEBUG - 2026-03-12 18:49:26 --> [REQ_ID=5263bd1ada93] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-12 18:49:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:26 --> [REQ_ID=5263bd1ada93] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-12 18:49:26 --> [REQ_ID=5263bd1ada93] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-12 18:49:26 --> [REQ_ID=5263bd1ada93] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-12 18:49:26 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
INFO - 2026-03-12 18:49:26 --> CSRF token verified.
DEBUG - 2026-03-12 18:49:26 --> [REQ_ID=e1c26c00dce5] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-12 18:49:26 --> [REQ_ID=e1c26c00dce5] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 18:49:26 --> [AUTH] Password reset requested
INFO - 2026-03-12 18:49:27 --> [AUTH] Password reset email sent
DEBUG - 2026-03-12 18:49:27 --> [REQ_ID=5263bd1ada93] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:27 --> [REQ_ID=5263bd1ada93] [LIFECYCLE][END] status=303 duration_ms=1,112.69 memory_delta=0
INFO - 2026-03-12 18:49:27 --> [REQ_ID=e1c26c00dce5] [PERF] Execution time=1.112520
DEBUG - 2026-03-12 18:49:27 --> [REQ_ID=5263bd1ada93] [REQUEST][END]
INFO - 2026-03-12 18:49:27 --> [REQ_ID=5263bd1ada93] [PERF] Execution time=1.122533
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [REQUEST][START] GET /index.php/reset-password
DEBUG - 2026-03-12 18:49:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [FILTER_BEFORE] /index.php/reset-password
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [ROUTE] Controller=\App\Controllers\AuthController Method=resetPassword
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/reset-password
DEBUG - 2026-03-12 18:49:28 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=8669ef26f9a3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:49:28 --> [REQ_ID=8669ef26f9a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [LIFECYCLE][END] status=200 duration_ms=13.39 memory_delta=0
INFO - 2026-03-12 18:49:28 --> [REQ_ID=8669ef26f9a3] [PERF] Execution time=0.013300
DEBUG - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [REQUEST][END]
INFO - 2026-03-12 18:49:28 --> [REQ_ID=aae3a1e0c15a] [PERF] Execution time=0.022947
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 18:49:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-12 18:49:41 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [METHOD_ENTRY] index
DEBUG - 2026-03-12 18:49:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:49:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 18:49:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 18:49:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 18:49:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 18:49:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [MEMORY][commonData:start] 4194304
INFO - 2026-03-12 18:49:41 --> themesMemory usage: 4194304
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [LIFECYCLE][END] status=200 duration_ms=113.58 memory_delta=0
INFO - 2026-03-12 18:49:41 --> [REQ_ID=31a6d2fd266f] [PERF] Execution time=0.113289
DEBUG - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [REQUEST][END]
INFO - 2026-03-12 18:49:41 --> [REQ_ID=67133506861c] [PERF] Execution time=0.123456
DEBUG - 2026-03-12 18:49:46 --> [REQ_ID=d31ae6a222b2] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-12 18:49:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:46 --> [REQ_ID=d31ae6a222b2] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-12 18:49:46 --> [REQ_ID=d31ae6a222b2] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-12 18:49:46 --> [REQ_ID=d31ae6a222b2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-12 18:49:46 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:46 --> [REQ_ID=13424dd88cc8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:49:46 --> [REQ_ID=13424dd88cc8] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 18:49:46 --> [REGISTRATION] Form loaded
INFO - 2026-03-12 18:49:46 --> [REQ_ID=13424dd88cc8] [PERF] Execution time=0.019305
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-12 18:49:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-12 18:49:52 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [REQUEST][END]
INFO - 2026-03-12 18:49:52 --> [REQ_ID=025e19f3a5e0] [PERF] Execution time=0.009845
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:49:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:49:52 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=f06fa50baca1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:49:52 --> [REQ_ID=f06fa50baca1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [FILTER_AFTER]
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [LIFECYCLE][END] status=200 duration_ms=52.10 memory_delta=0
INFO - 2026-03-12 18:49:52 --> [REQ_ID=f06fa50baca1] [PERF] Execution time=0.051922
DEBUG - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [REQUEST][END]
INFO - 2026-03-12 18:49:52 --> [REQ_ID=df1356dbc52f] [PERF] Execution time=0.061244
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-12 18:50:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-12 18:50:02 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [REQUEST][END]
INFO - 2026-03-12 18:50:02 --> [REQ_ID=eff2104b622e] [PERF] Execution time=0.013574
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:02 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=65b9bf268167] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:02 --> [REQ_ID=65b9bf268167] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [LIFECYCLE][END] status=200 duration_ms=15.60 memory_delta=0
INFO - 2026-03-12 18:50:02 --> [REQ_ID=65b9bf268167] [PERF] Execution time=0.015491
DEBUG - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [REQUEST][END]
INFO - 2026-03-12 18:50:02 --> [REQ_ID=f7e9028f6eca] [PERF] Execution time=0.024294
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-12 18:50:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-12 18:50:10 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [REQUEST][END]
INFO - 2026-03-12 18:50:10 --> [REQ_ID=71ac84ee60af] [PERF] Execution time=0.009628
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:10 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=3e62a57cc5fd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:10 --> [REQ_ID=3e62a57cc5fd] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [LIFECYCLE][END] status=200 duration_ms=53.77 memory_delta=0
INFO - 2026-03-12 18:50:10 --> [REQ_ID=3e62a57cc5fd] [PERF] Execution time=0.053811
DEBUG - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [REQUEST][END]
INFO - 2026-03-12 18:50:10 --> [REQ_ID=b9d2fa7d4c66] [PERF] Execution time=0.062868
DEBUG - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-12 18:50:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-12 18:50:18 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [REQUEST][END]
INFO - 2026-03-12 18:50:18 --> [REQ_ID=74dbdfd6b24d] [PERF] Execution time=0.009739
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:19 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=67cae826ccff] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:19 --> [REQ_ID=67cae826ccff] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [LIFECYCLE][END] status=200 duration_ms=15.65 memory_delta=0
INFO - 2026-03-12 18:50:19 --> [REQ_ID=67cae826ccff] [PERF] Execution time=0.015461
DEBUG - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [REQUEST][END]
INFO - 2026-03-12 18:50:19 --> [REQ_ID=7fc05ec4fb56] [PERF] Execution time=0.024176
DEBUG - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-12 18:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-12 18:50:26 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [REQUEST][END]
INFO - 2026-03-12 18:50:26 --> [REQ_ID=7cb09830783e] [PERF] Execution time=0.009901
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:27 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=08411c0e3291] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:27 --> [REQ_ID=08411c0e3291] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [LIFECYCLE][END] status=200 duration_ms=16.26 memory_delta=0
INFO - 2026-03-12 18:50:27 --> [REQ_ID=08411c0e3291] [PERF] Execution time=0.016098
DEBUG - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [REQUEST][END]
INFO - 2026-03-12 18:50:27 --> [REQ_ID=d6b6918b2fef] [PERF] Execution time=0.027281
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-12 18:50:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-12 18:50:37 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [REQUEST][END]
INFO - 2026-03-12 18:50:37 --> [REQ_ID=1079f3d7d17a] [PERF] Execution time=0.010048
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:37 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=810d48cd5fd3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:37 --> [REQ_ID=810d48cd5fd3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [LIFECYCLE][END] status=200 duration_ms=113.06 memory_delta=0
INFO - 2026-03-12 18:50:37 --> [REQ_ID=810d48cd5fd3] [PERF] Execution time=0.112915
DEBUG - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [REQUEST][END]
INFO - 2026-03-12 18:50:37 --> [REQ_ID=fb1c68c1715e] [PERF] Execution time=0.121713
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-12 18:50:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-12 18:50:45 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [REQUEST][END]
INFO - 2026-03-12 18:50:45 --> [REQ_ID=d9526ef8d039] [PERF] Execution time=0.009879
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:45 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=e11a6c386dcc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:45 --> [REQ_ID=e11a6c386dcc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [LIFECYCLE][END] status=200 duration_ms=34.79 memory_delta=0
INFO - 2026-03-12 18:50:45 --> [REQ_ID=e11a6c386dcc] [PERF] Execution time=0.034798
DEBUG - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [REQUEST][END]
INFO - 2026-03-12 18:50:45 --> [REQ_ID=13a57507dd18] [PERF] Execution time=0.043556
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-12 18:50:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-12 18:50:53 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [REQUEST][END]
INFO - 2026-03-12 18:50:53 --> [REQ_ID=693cc5c49d4b] [PERF] Execution time=0.009702
DEBUG - 2026-03-12 18:50:53 --> [REQ_ID=4e0facd8ded6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:50:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:50:54 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=3b05c1d6d1ae] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:50:54 --> [REQ_ID=3b05c1d6d1ae] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [FILTER_AFTER]
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [LIFECYCLE][END] status=200 duration_ms=25.61 memory_delta=0
INFO - 2026-03-12 18:50:54 --> [REQ_ID=3b05c1d6d1ae] [PERF] Execution time=0.025574
DEBUG - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [REQUEST][END]
INFO - 2026-03-12 18:50:54 --> [REQ_ID=4e0facd8ded6] [PERF] Execution time=0.034195
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-12 18:51:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-12 18:51:03 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [REQUEST][END]
INFO - 2026-03-12 18:51:03 --> [REQ_ID=5f3f78294028] [PERF] Execution time=0.009828
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:51:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:51:03 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=c5e724250176] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:51:03 --> [REQ_ID=c5e724250176] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [FILTER_AFTER]
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [LIFECYCLE][END] status=200 duration_ms=31.50 memory_delta=0
INFO - 2026-03-12 18:51:03 --> [REQ_ID=c5e724250176] [PERF] Execution time=0.031348
DEBUG - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [REQUEST][END]
INFO - 2026-03-12 18:51:03 --> [REQ_ID=14f0c4bdb66a] [PERF] Execution time=0.039858
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 18:51:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-12 18:51:11 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [REQUEST][END]
INFO - 2026-03-12 18:51:11 --> [REQ_ID=0fc59ef6ed09] [PERF] Execution time=0.009728
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:51:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:51:11 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=09588a3957ab] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:51:11 --> [REQ_ID=09588a3957ab] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [FILTER_AFTER]
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [LIFECYCLE][END] status=200 duration_ms=27.04 memory_delta=0
INFO - 2026-03-12 18:51:11 --> [REQ_ID=09588a3957ab] [PERF] Execution time=0.027208
DEBUG - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [REQUEST][END]
INFO - 2026-03-12 18:51:11 --> [REQ_ID=17f059e52ba7] [PERF] Execution time=0.036154
DEBUG - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-12 18:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-12 18:51:19 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [REQUEST][END]
INFO - 2026-03-12 18:51:19 --> [REQ_ID=077f162cde52] [PERF] Execution time=0.009848
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:51:20 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=0c0b71b063be] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:51:20 --> [REQ_ID=0c0b71b063be] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [FILTER_AFTER]
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [LIFECYCLE][END] status=200 duration_ms=26.58 memory_delta=0
INFO - 2026-03-12 18:51:20 --> [REQ_ID=0c0b71b063be] [PERF] Execution time=0.026483
DEBUG - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [REQUEST][END]
INFO - 2026-03-12 18:51:20 --> [REQ_ID=f9bb7de362b1] [PERF] Execution time=0.035693
DEBUG - 2026-03-12 18:51:22 --> [REQ_ID=e7bbd46f1bf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-12 18:51:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-12 18:51:30 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [REQUEST][END]
INFO - 2026-03-12 18:51:30 --> [REQ_ID=47fca5a876ff] [PERF] Execution time=0.009791
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-12 18:51:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-12 18:51:30 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=1b4753d9297c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-12 18:51:30 --> [REQ_ID=1b4753d9297c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [FILTER_AFTER]
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [LIFECYCLE][END] status=200 duration_ms=148.29 memory_delta=0
INFO - 2026-03-12 18:51:30 --> [REQ_ID=1b4753d9297c] [PERF] Execution time=0.148257
DEBUG - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [REQUEST][END]
INFO - 2026-03-12 18:51:30 --> [REQ_ID=a0d7018976c5] [PERF] Execution time=0.157159
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=811e6d2afe30] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-12 18:51:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=811e6d2afe30] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=811e6d2afe30] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=811e6d2afe30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-12 18:51:38 --> [CSRF] token name=csrf_test_name hash=e56ad50ed76e435d43b80254aa6b5fdc
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=5611d3740547] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-12 18:51:38 --> [REQ_ID=5611d3740547] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 18:51:38 --> [REQ_ID=5611d3740547] [METHOD_ENTRY] index
DEBUG - 2026-03-12 18:51:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 18:51:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 18:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-12 18:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-12 18:51:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-12 18:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-12 18:51:38 --> HowItWorksController failure: overview
CRITICAL - 2026-03-12 18:51:38 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:51:38 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:51:38 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-12 18:51:38 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-12 18:51:38 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-12 18:51:38 --> [REQ_ID=5611d3740547] [PERF] Execution time=0.052110
DEBUG - 2026-03-12 18:56:22 --> [REQ_ID=0a04e78ad4dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [REQUEST][END]
INFO - 2026-03-12 19:00:01 --> [REQ_ID=895b6f231f72] [PERF] Execution time=0.049869
DEBUG - 2026-03-12 19:01:22 --> [REQ_ID=e27b295683e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:06:22 --> [REQ_ID=616b167b702c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:11:22 --> [REQ_ID=8c1fb455a2c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [REQUEST][END]
INFO - 2026-03-12 19:15:02 --> [REQ_ID=3c29f4b33106] [PERF] Execution time=0.060864
DEBUG - 2026-03-12 19:16:22 --> [REQ_ID=f92a27ebce98] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:21:22 --> [REQ_ID=51676fd85f26] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:26:22 --> [REQ_ID=9998f08ec3c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:31:22 --> [REQ_ID=890210d2213c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:36:22 --> [REQ_ID=142665ad74f2] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:41:22 --> [REQ_ID=2235dff3276a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:44:43 --> [REQ_ID=ed9ed4946fb2] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-12 19:44:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 19:44:43 --> [REQ_ID=ed9ed4946fb2] [REQUEST][END]
INFO - 2026-03-12 19:44:43 --> [REQ_ID=ed9ed4946fb2] [PERF] Execution time=0.041045
DEBUG - 2026-03-12 19:46:19 --> [REQ_ID=7849196b1712] [REQUEST][START] HEAD /index.php/Support/Account
DEBUG - 2026-03-12 19:46:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:46:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: Support/Account]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/Support/Account
WARNING - 2026-03-12 19:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/Support/Account | referrer: none
DEBUG - 2026-03-12 19:46:22 --> [REQ_ID=1d40c3beb4c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:51:22 --> [REQ_ID=7af09c24f1fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [REQUEST][START] GET /
DEBUG - 2026-03-12 19:51:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [FILTER_BEFORE] /
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 19:51:48 --> [CSRF] token name=csrf_test_name hash=a7f71dc2bb5745766c043149a676547e
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 19:51:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 19:51:48 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 19:51:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 19:51:48 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [FILTER_AFTER]
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [LIFECYCLE][END] status=200 duration_ms=761.26 memory_delta=4194304
INFO - 2026-03-12 19:51:48 --> [REQ_ID=429d808237cb] [PERF] Execution time=0.759389
DEBUG - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [REQUEST][END]
INFO - 2026-03-12 19:51:48 --> [REQ_ID=f2ad1d51a6f2] [PERF] Execution time=0.785007
DEBUG - 2026-03-12 19:56:22 --> [REQ_ID=8d4e2e615f44] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [REQUEST][END]
INFO - 2026-03-12 20:00:01 --> [REQ_ID=8dbe7784506a] [PERF] Execution time=0.037766
DEBUG - 2026-03-12 20:01:22 --> [REQ_ID=53be34f440dd] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:06:22 --> [REQ_ID=ed4d1e05cfe3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:06:37 --> [REQ_ID=f674d05ce3df] [REQUEST][START] GET /
DEBUG - 2026-03-12 20:06:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 20:06:37 --> [REQ_ID=f674d05ce3df] [FILTER_BEFORE] /
DEBUG - 2026-03-12 20:06:37 --> [REQ_ID=f674d05ce3df] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 20:06:37 --> [REQ_ID=f674d05ce3df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 20:06:37 --> [CSRF] token name=csrf_test_name hash=6dab2d54efa1e0aba03a87fe34fc9ed1
DEBUG - 2026-03-12 20:06:37 --> [REQ_ID=40b651f0c5fa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 20:06:37 --> [REQ_ID=40b651f0c5fa] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 20:06:37 --> [REQ_ID=40b651f0c5fa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 20:06:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 20:06:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 20:06:38 --> [REQ_ID=40b651f0c5fa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 20:06:38 --> [REQ_ID=40b651f0c5fa] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 20:06:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 20:06:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 20:06:38 --> [REQ_ID=f674d05ce3df] [FILTER_AFTER]
DEBUG - 2026-03-12 20:06:38 --> [REQ_ID=f674d05ce3df] [LIFECYCLE][END] status=200 duration_ms=646.99 memory_delta=4194304
INFO - 2026-03-12 20:06:38 --> [REQ_ID=40b651f0c5fa] [PERF] Execution time=0.645059
DEBUG - 2026-03-12 20:06:38 --> [REQ_ID=f674d05ce3df] [REQUEST][END]
INFO - 2026-03-12 20:06:38 --> [REQ_ID=f674d05ce3df] [PERF] Execution time=0.665519
DEBUG - 2026-03-12 20:11:22 --> [REQ_ID=65581ed27918] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [REQUEST][END]
INFO - 2026-03-12 20:15:01 --> [REQ_ID=6e4713a39377] [PERF] Execution time=0.046432
DEBUG - 2026-03-12 20:16:22 --> [REQ_ID=8ba0f875e666] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:21:22 --> [REQ_ID=b6e407aa0612] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:26:22 --> [REQ_ID=9231951ac9c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:31:22 --> [REQ_ID=4564c03e2731] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:36:22 --> [REQ_ID=2801a3d382ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:41:22 --> [REQ_ID=a948d07bc326] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:46:22 --> [REQ_ID=aea821dc5706] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:51:22 --> [REQ_ID=7583e37b9be1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 20:56:22 --> [REQ_ID=f8d6fc1057ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [REQUEST][END]
INFO - 2026-03-12 21:00:01 --> [REQ_ID=ce5683bd6794] [PERF] Execution time=0.047796
DEBUG - 2026-03-12 21:01:22 --> [REQ_ID=2764204b9b56] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:06:22 --> [REQ_ID=92f7c8df1ad0] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:11:22 --> [REQ_ID=3bd3d76ae16a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [REQUEST][END]
INFO - 2026-03-12 21:15:01 --> [REQ_ID=cc94e97c7272] [PERF] Execution time=0.048040
DEBUG - 2026-03-12 21:16:22 --> [REQ_ID=af536f927bd3] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:21:22 --> [REQ_ID=7662fb63d320] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [REQUEST][START] GET /
DEBUG - 2026-03-12 21:23:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [FILTER_BEFORE] /
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 21:23:37 --> [CSRF] token name=csrf_test_name hash=709330b12862f54a07298ef408d46ee4
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 21:23:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 21:23:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 21:23:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 21:23:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [FILTER_AFTER]
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [LIFECYCLE][END] status=200 duration_ms=849.85 memory_delta=4194304
INFO - 2026-03-12 21:23:37 --> [REQ_ID=b205a5009102] [PERF] Execution time=0.847875
DEBUG - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [REQUEST][END]
INFO - 2026-03-12 21:23:37 --> [REQ_ID=53358bca5f09] [PERF] Execution time=0.888953
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [REQUEST][START] GET /
DEBUG - 2026-03-12 21:23:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [FILTER_BEFORE] /
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 21:23:39 --> [CSRF] token name=csrf_test_name hash=709330b12862f54a07298ef408d46ee4
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 21:23:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 21:23:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 21:23:39 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 21:23:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [FILTER_AFTER]
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [LIFECYCLE][END] status=200 duration_ms=537.07 memory_delta=2097152
INFO - 2026-03-12 21:23:39 --> [REQ_ID=dc3c7d09e00f] [PERF] Execution time=0.536784
DEBUG - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [REQUEST][END]
INFO - 2026-03-12 21:23:39 --> [REQ_ID=84d85520ee82] [PERF] Execution time=0.546566
DEBUG - 2026-03-12 21:26:22 --> [REQ_ID=97a070ef5f5c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:31:22 --> [REQ_ID=eab186ce4af8] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:33:47 --> [REQ_ID=fbb1a9597d44] [REQUEST][START] GET /
DEBUG - 2026-03-12 21:33:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:33:47 --> [REQ_ID=fbb1a9597d44] [FILTER_BEFORE] /
DEBUG - 2026-03-12 21:33:47 --> [REQ_ID=fbb1a9597d44] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 21:33:47 --> [REQ_ID=fbb1a9597d44] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 21:33:47 --> [CSRF] token name=csrf_test_name hash=69a8d7e1816c78a5797cdc8b37e90ae0
DEBUG - 2026-03-12 21:33:47 --> [REQ_ID=7816c5043740] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 21:33:47 --> [REQ_ID=7816c5043740] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 21:33:48 --> [REQ_ID=7816c5043740] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 21:33:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 21:33:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 21:33:48 --> [REQ_ID=7816c5043740] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 21:33:48 --> [REQ_ID=7816c5043740] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 21:33:48 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 21:33:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 21:33:48 --> [REQ_ID=fbb1a9597d44] [FILTER_AFTER]
DEBUG - 2026-03-12 21:33:48 --> [REQ_ID=fbb1a9597d44] [LIFECYCLE][END] status=200 duration_ms=695.86 memory_delta=4194304
INFO - 2026-03-12 21:33:48 --> [REQ_ID=7816c5043740] [PERF] Execution time=0.693834
DEBUG - 2026-03-12 21:33:48 --> [REQ_ID=fbb1a9597d44] [REQUEST][END]
INFO - 2026-03-12 21:33:48 --> [REQ_ID=fbb1a9597d44] [PERF] Execution time=0.736584
DEBUG - 2026-03-12 21:36:22 --> [REQ_ID=bbdf7fc3bf08] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=0360761ddf20] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-12 21:36:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=0360761ddf20] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=0360761ddf20] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=0360761ddf20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-12 21:36:37 --> [CSRF] token name=csrf_test_name hash=996672a65296a9904c6e1ee7ffd985d5
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=7a40ea487cba] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-12 21:36:37 --> [REQ_ID=7a40ea487cba] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-12 21:36:37 --> [REQ_ID=7a40ea487cba] [METHOD_ENTRY] index
DEBUG - 2026-03-12 21:36:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:37 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-12 21:36:37 --> [DASHBOARD] Enter
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:37 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:37 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-12 21:36:37 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-12 21:36:38 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-12 21:36:38 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-12 21:36:38 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-11 21:36:38\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-11 21:36:38\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-11 21:36:38\'')
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
DEBUG - 2026-03-12 21:36:38 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-12 21:36:38 --> 📰 Daily dashboard news window 2026-03-12 00:00:00 -> 2026-03-12 23:59:59 returned 0 rows
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SETUP] Status computed
DEBUG - 2026-03-12 21:36:38 --> [REQ_ID=7a40ea487cba] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-12 21:36:38 --> [REQ_ID=7a40ea487cba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-12 21:36:38 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-12 21:36:38 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-12 21:36:38 --> getSolanaData: invalid address param
INFO - 2026-03-12 21:36:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 21:36:38 --> [REQ_ID=0360761ddf20] [FILTER_AFTER]
DEBUG - 2026-03-12 21:36:38 --> [REQ_ID=0360761ddf20] [LIFECYCLE][END] status=200 duration_ms=1,394.01 memory_delta=4194304
INFO - 2026-03-12 21:36:38 --> [REQ_ID=7a40ea487cba] [PERF] Execution time=1.331991
DEBUG - 2026-03-12 21:36:38 --> [REQ_ID=0360761ddf20] [REQUEST][END]
INFO - 2026-03-12 21:36:38 --> [REQ_ID=0360761ddf20] [PERF] Execution time=1.418410
DEBUG - 2026-03-12 21:41:01 --> [REQ_ID=ae507cbd767a] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-12 21:41:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 21:41:01 --> [REQ_ID=ae507cbd767a] [REQUEST][END]
INFO - 2026-03-12 21:41:01 --> [REQ_ID=ae507cbd767a] [PERF] Execution time=0.040197
DEBUG - 2026-03-12 21:41:22 --> [REQ_ID=35ee6997bd22] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:43:02 --> [REQ_ID=6ee53ae8cb52] [REQUEST][START] HEAD /index.php/activate
DEBUG - 2026-03-12 21:43:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:43:02 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: activate]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:43:02 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:43:02 --> [404] URI=https://www.mymiwallet.com/index.php/activate
WARNING - 2026-03-12 21:43:02 --> 404 route miss: https://www.mymiwallet.com/index.php/activate | referrer: none
DEBUG - 2026-03-12 21:46:22 --> [REQ_ID=6e50fc8c27c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:51:22 --> [REQ_ID=862f33561aa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 21:56:22 --> [REQ_ID=be653f642751] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [REQUEST][END]
INFO - 2026-03-12 22:00:02 --> [REQ_ID=595d317633f0] [PERF] Execution time=0.061352
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:00:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:00:49 --> [CSRF] token name=csrf_test_name hash=e9fc54ba27344213fa7e3f844e032add
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:00:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:00:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 22:00:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 22:00:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [FILTER_AFTER]
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [LIFECYCLE][END] status=200 duration_ms=698.57 memory_delta=4194304
INFO - 2026-03-12 22:00:49 --> [REQ_ID=610a542e1467] [PERF] Execution time=0.697141
DEBUG - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [REQUEST][END]
INFO - 2026-03-12 22:00:49 --> [REQ_ID=6169ef8aebd1] [PERF] Execution time=0.712953
DEBUG - 2026-03-12 22:01:22 --> [REQ_ID=4ef3724a4108] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:06:22 --> [REQ_ID=266ae349c848] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:11:22 --> [REQ_ID=6c0bc2150961] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:15:01 --> [REQ_ID=1ee756caf870] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:15:02 --> [REQ_ID=1ee756caf870] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 22:15:02 --> [REQ_ID=1ee756caf870] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 22:15:02 --> [REQ_ID=1ee756caf870] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 22:15:02 --> [REQ_ID=1ee756caf870] [REQUEST][END]
INFO - 2026-03-12 22:15:02 --> [REQ_ID=1ee756caf870] [PERF] Execution time=0.051983
DEBUG - 2026-03-12 22:16:22 --> [REQ_ID=126d0c74e13a] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:16:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:16:56 --> [CSRF] token name=csrf_test_name hash=6e8b64dc3a9d5d170478f021ff2fde7a
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [MEMORY][controller-start] 4194304
INFO - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:16:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:16:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 22:16:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 22:16:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [FILTER_AFTER]
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [LIFECYCLE][END] status=200 duration_ms=682.15 memory_delta=4194304
INFO - 2026-03-12 22:16:56 --> [REQ_ID=42bf6eb99202] [PERF] Execution time=0.680692
DEBUG - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [REQUEST][END]
INFO - 2026-03-12 22:16:56 --> [REQ_ID=49d390bc519a] [PERF] Execution time=0.692807
DEBUG - 2026-03-12 22:21:22 --> [REQ_ID=369209f73b2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:22:52 --> [REQ_ID=4c8bf1ad0476] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:22:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:22:52 --> [REQ_ID=4c8bf1ad0476] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:22:52 --> [REQ_ID=4c8bf1ad0476] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:22:52 --> [REQ_ID=4c8bf1ad0476] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:22:52 --> [CSRF] token name=csrf_test_name hash=840f77308805687da64d16572faf9de7
DEBUG - 2026-03-12 22:22:52 --> [REQ_ID=157c86c8f1cd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:22:52 --> [REQ_ID=157c86c8f1cd] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 22:22:52 --> [REQ_ID=157c86c8f1cd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:22:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:22:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:22:53 --> [REQ_ID=157c86c8f1cd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:22:53 --> [REQ_ID=157c86c8f1cd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 22:22:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 22:22:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:22:53 --> [REQ_ID=4c8bf1ad0476] [FILTER_AFTER]
DEBUG - 2026-03-12 22:22:53 --> [REQ_ID=4c8bf1ad0476] [LIFECYCLE][END] status=200 duration_ms=908.00 memory_delta=4194304
INFO - 2026-03-12 22:22:53 --> [REQ_ID=157c86c8f1cd] [PERF] Execution time=0.905962
DEBUG - 2026-03-12 22:22:53 --> [REQ_ID=4c8bf1ad0476] [REQUEST][END]
INFO - 2026-03-12 22:22:53 --> [REQ_ID=4c8bf1ad0476] [PERF] Execution time=0.946615
DEBUG - 2026-03-12 22:26:22 --> [REQ_ID=76b73136b193] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:31:22 --> [REQ_ID=4c46a6530564] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:36:22 --> [REQ_ID=2baf28e812ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:38:37 --> [REQ_ID=2a2c75a19d21] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-12 22:38:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:38:38 --> [REQ_ID=2a2c75a19d21] [REQUEST][END]
INFO - 2026-03-12 22:38:38 --> [REQ_ID=2a2c75a19d21] [PERF] Execution time=0.042787
DEBUG - 2026-03-12 22:41:22 --> [REQ_ID=9c0c4e3a87ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:43:46 --> [REQ_ID=bd8c2307d890] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:43:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:46 --> [REQ_ID=bd8c2307d890] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:43:46 --> [REQ_ID=bd8c2307d890] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:43:46 --> [REQ_ID=bd8c2307d890] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:43:46 --> [CSRF] token name=csrf_test_name hash=a64eadf5f5d629bfffbbc52bb28d742f
DEBUG - 2026-03-12 22:43:46 --> [REQ_ID=7849486884e8] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:43:46 --> [REQ_ID=7849486884e8] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 22:43:46 --> [REQ_ID=7849486884e8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:43:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:43:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-12 22:43:47 --> [REQ_ID=7849486884e8] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:43:47 --> [REQ_ID=7849486884e8] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 22:43:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 22:43:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-12 22:43:47 --> [REQ_ID=bd8c2307d890] [FILTER_AFTER]
DEBUG - 2026-03-12 22:43:47 --> [REQ_ID=bd8c2307d890] [LIFECYCLE][END] status=200 duration_ms=776.25 memory_delta=4194304
INFO - 2026-03-12 22:43:47 --> [REQ_ID=7849486884e8] [PERF] Execution time=0.774316
DEBUG - 2026-03-12 22:43:47 --> [REQ_ID=bd8c2307d890] [REQUEST][END]
INFO - 2026-03-12 22:43:47 --> [REQ_ID=bd8c2307d890] [PERF] Execution time=0.815664
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:43:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:43:52 --> [CSRF] token name=csrf_test_name hash=db95c85d9446dade9d5982d5d8794275
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:43:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:43:52 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [MEMORY][commonData:start] 8388608
INFO - 2026-03-12 22:43:52 --> themesMemory usage: 8388608
DEBUG - 2026-03-12 22:43:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [FILTER_AFTER]
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [LIFECYCLE][END] status=200 duration_ms=675.08 memory_delta=2097152
INFO - 2026-03-12 22:43:52 --> [REQ_ID=d828df6a4340] [PERF] Execution time=0.674766
DEBUG - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [REQUEST][END]
INFO - 2026-03-12 22:43:52 --> [REQ_ID=e9a658664c7f] [PERF] Execution time=0.684629
DEBUG - 2026-03-12 22:43:56 --> [REQ_ID=42505eccedc3] [REQUEST][START] GET /index.php/Solana/register/Miku
DEBUG - 2026-03-12 22:43:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:56 --> [REQ_ID=42505eccedc3] [REQUEST][END]
INFO - 2026-03-12 22:43:56 --> [REQ_ID=42505eccedc3] [PERF] Execution time=0.012523
DEBUG - 2026-03-12 22:43:56 --> [REQ_ID=62bb043de775] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:43:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:56 --> [REQ_ID=62bb043de775] [REQUEST][END]
INFO - 2026-03-12 22:43:56 --> [REQ_ID=62bb043de775] [PERF] Execution time=0.009868
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=f32f95970d77] [REQUEST][START] GET /index.php/Solana/register/GOAT
DEBUG - 2026-03-12 22:43:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=f32f95970d77] [REQUEST][END]
INFO - 2026-03-12 22:43:57 --> [REQ_ID=f32f95970d77] [PERF] Execution time=0.008527
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=1b98024dd9b2] [REQUEST][START] GET /index.php/Twitter/register
DEBUG - 2026-03-12 22:43:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=1b98024dd9b2] [REQUEST][END]
INFO - 2026-03-12 22:43:57 --> [REQ_ID=1b98024dd9b2] [PERF] Execution time=0.008811
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=3d9f8b68d198] [REQUEST][START] GET /index.php/Twitter/register/PEPU
DEBUG - 2026-03-12 22:43:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=3d9f8b68d198] [REQUEST][END]
INFO - 2026-03-12 22:43:57 --> [REQ_ID=3d9f8b68d198] [PERF] Execution time=0.007962
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=9f30fb57e874] [REQUEST][START] GET /index.php/Twitter/register/PULSR
DEBUG - 2026-03-12 22:43:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:43:57 --> [REQ_ID=9f30fb57e874] [REQUEST][END]
INFO - 2026-03-12 22:43:57 --> [REQ_ID=9f30fb57e874] [PERF] Execution time=0.008247
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:45:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:45:35 --> [CSRF] token name=csrf_test_name hash=17ea6f42f677519adba618b2d0a24ad6
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:45:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:45:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 22:45:35 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 22:45:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [FILTER_AFTER]
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [LIFECYCLE][END] status=200 duration_ms=606.34 memory_delta=4194304
INFO - 2026-03-12 22:45:35 --> [REQ_ID=a4254071ac5b] [PERF] Execution time=0.604431
DEBUG - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [REQUEST][END]
INFO - 2026-03-12 22:45:35 --> [REQ_ID=647b91a484e7] [PERF] Execution time=0.645112
DEBUG - 2026-03-12 22:46:22 --> [REQ_ID=8b450a7a7e98] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:47:49 --> [REQ_ID=a8c5f7812aba] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:47:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:47:49 --> [REQ_ID=a8c5f7812aba] [FILTER_BEFORE] /
DEBUG - 2026-03-12 22:47:49 --> [REQ_ID=a8c5f7812aba] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-12 22:47:49 --> [REQ_ID=a8c5f7812aba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-12 22:47:49 --> [CSRF] token name=csrf_test_name hash=29f3e1f1bc38774e3c0f125472a34da4
DEBUG - 2026-03-12 22:47:49 --> [REQ_ID=785c488cbad0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-12 22:47:49 --> [REQ_ID=785c488cbad0] [MEMORY][controller-start] 6291456
INFO - 2026-03-12 22:47:49 --> [REQ_ID=785c488cbad0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-12 22:47:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-12 22:47:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:47:50 --> [REQ_ID=785c488cbad0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-12 22:47:50 --> [REQ_ID=785c488cbad0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-12 22:47:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-12 22:47:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-12 22:47:50 --> [REQ_ID=a8c5f7812aba] [FILTER_AFTER]
DEBUG - 2026-03-12 22:47:50 --> [REQ_ID=a8c5f7812aba] [LIFECYCLE][END] status=200 duration_ms=647.22 memory_delta=4194304
INFO - 2026-03-12 22:47:50 --> [REQ_ID=785c488cbad0] [PERF] Execution time=0.645086
DEBUG - 2026-03-12 22:47:50 --> [REQ_ID=a8c5f7812aba] [REQUEST][END]
INFO - 2026-03-12 22:47:50 --> [REQ_ID=a8c5f7812aba] [PERF] Execution time=0.686310
DEBUG - 2026-03-12 22:48:41 --> [REQ_ID=e2e5f2f87840] [REQUEST][START] GET /
DEBUG - 2026-03-12 22:48:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 22:48:41 --> [REQ_ID=e2e5f2f87840] [REQUEST][END]
INFO - 2026-03-12 22:48:41 --> [REQ_ID=e2e5f2f87840] [PERF] Execution time=0.008928
DEBUG - 2026-03-12 22:51:05 --> [REQ_ID=19db9a15a3d1] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:51:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:51:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:51:05 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:51:05 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:51:05 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-12 22:51:22 --> [REQ_ID=c2db8641678e] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 22:56:22 --> [REQ_ID=fd1b3c7d4e4b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [REQUEST][END]
INFO - 2026-03-12 23:00:01 --> [REQ_ID=2ffa971b0672] [PERF] Execution time=0.049783
DEBUG - 2026-03-12 23:01:22 --> [REQ_ID=b01e0b5d1aba] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:06:22 --> [REQ_ID=2364b8fbc518] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:11:54 --> [REQ_ID=66ea6be82278] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:11:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:11:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:11:54 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:11:54 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:11:54 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [REQUEST][END]
INFO - 2026-03-12 23:15:02 --> [REQ_ID=e58e34ba13b4] [PERF] Execution time=0.045948
DEBUG - 2026-03-12 23:16:22 --> [REQ_ID=68fcc7c71193] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:21:22 --> [REQ_ID=3a17dbd4d309] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:26:22 --> [REQ_ID=998d85cbbc80] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:31:22 --> [REQ_ID=60471739a9a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:36:22 --> [REQ_ID=ef035570497b] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:41:22 --> [REQ_ID=38465548e514] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:44:57 --> [REQ_ID=70a2d82817da] [REQUEST][START] GET /index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-03-12 23:44:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 23:44:57 --> [REQ_ID=70a2d82817da] [REQUEST][END]
INFO - 2026-03-12 23:44:57 --> [REQ_ID=70a2d82817da] [PERF] Execution time=0.040140
DEBUG - 2026-03-12 23:46:22 --> [REQ_ID=d705410fba90] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:47:23 --> [REQ_ID=5f5d3560466f] [REQUEST][START] GET /index.php/Knowledgebase/Partner-Service-Agreement
DEBUG - 2026-03-12 23:47:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-12 23:47:23 --> [REQ_ID=5f5d3560466f] [REQUEST][END]
INFO - 2026-03-12 23:47:23 --> [REQ_ID=5f5d3560466f] [PERF] Execution time=0.021929
DEBUG - 2026-03-12 23:51:22 --> [REQ_ID=0d2700760afc] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-12 23:56:22 --> [REQ_ID=60613e682602] [REQUEST][START] HEAD /
DEBUG - 2026-03-12 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-12 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-12 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-12 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-12 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
