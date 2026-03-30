<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-29 00:00:01 --> [REQ_ID=0df0620c4047] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:00:02 --> [REQ_ID=0df0620c4047] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 00:00:02 --> [REQ_ID=0df0620c4047] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 00:00:02 --> [REQ_ID=0df0620c4047] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 00:00:02 --> [REQ_ID=0df0620c4047] [REQUEST][END]
INFO - 2026-03-29 00:00:02 --> [REQ_ID=0df0620c4047] [PERF] Execution time=0.049851
DEBUG - 2026-03-29 00:01:22 --> [REQ_ID=d6b4618608f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:06:22 --> [REQ_ID=c87c8edc3945] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:11:22 --> [REQ_ID=04a6160404fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:13:31 --> [REQ_ID=ffc9ea284da7] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-29 00:13:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:13:31 --> [REQ_ID=ffc9ea284da7] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-29 00:13:31 --> [REQ_ID=ffc9ea284da7] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-29 00:13:31 --> [REQ_ID=ffc9ea284da7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-29 00:13:31 --> [CSRF] token name=csrf_test_name hash=df9fadf6dbbf5a709de872650e77f5e8
DEBUG - 2026-03-29 00:13:31 --> [REQ_ID=1c7040be4991] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 00:13:31 --> [REQ_ID=1c7040be4991] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 00:13:31 --> [REQ_ID=1c7040be4991] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 00:13:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 00:13:32 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-29 00:13:32 --> [REQ_ID=1c7040be4991] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-29 00:13:32 --> [REQ_ID=1c7040be4991] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 00:13:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 00:13:32 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-29 00:13:32 --> [REQ_ID=ffc9ea284da7] [FILTER_AFTER]
DEBUG - 2026-03-29 00:13:32 --> [REQ_ID=ffc9ea284da7] [LIFECYCLE][END] status=200 duration_ms=693.13 memory_delta=4194304
INFO - 2026-03-29 00:13:32 --> [REQ_ID=1c7040be4991] [PERF] Execution time=0.691300
DEBUG - 2026-03-29 00:13:32 --> [REQ_ID=ffc9ea284da7] [REQUEST][END]
INFO - 2026-03-29 00:13:32 --> [REQ_ID=ffc9ea284da7] [PERF] Execution time=0.732938
DEBUG - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [REQUEST][END]
INFO - 2026-03-29 00:15:01 --> [REQ_ID=19e305df4db1] [PERF] Execution time=0.045439
DEBUG - 2026-03-29 00:16:22 --> [REQ_ID=122e91ded89f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:21:22 --> [REQ_ID=76a3b7fcca63] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:26:22 --> [REQ_ID=fdd46c3c5a24] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:27:42 --> [REQ_ID=ad1ad8c525af] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:27:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:27:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:27:43 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:27:43 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:27:43 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-29 00:31:22 --> [REQ_ID=607cb55f1351] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:36:22 --> [REQ_ID=68429cb3bea4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-29 00:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-29 00:40:32 --> [CSRF] token name=csrf_test_name hash=dbb954d55e0b34edb6c2526ee0142d30
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [REQUEST][END]
INFO - 2026-03-29 00:40:32 --> [REQ_ID=e9f3f695ddab] [PERF] Execution time=0.076159
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 00:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 00:40:32 --> [CSRF] token name=csrf_test_name hash=642c1f8f8f96e5e2dd67453b965266cb
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=40bbaff70409] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 00:40:32 --> [REQ_ID=40bbaff70409] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [FILTER_AFTER]
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [LIFECYCLE][END] status=200 duration_ms=63.51 memory_delta=0
INFO - 2026-03-29 00:40:32 --> [REQ_ID=40bbaff70409] [PERF] Execution time=0.063231
DEBUG - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [REQUEST][END]
INFO - 2026-03-29 00:40:32 --> [REQ_ID=11b12fdfbea6] [PERF] Execution time=0.079528
DEBUG - 2026-03-29 00:40:50 --> [REQ_ID=0856a1de249f] [REQUEST][START] GET /
DEBUG - 2026-03-29 00:40:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:40:50 --> [REQ_ID=0856a1de249f] [REQUEST][END]
INFO - 2026-03-29 00:40:50 --> [REQ_ID=0856a1de249f] [PERF] Execution time=0.010708
DEBUG - 2026-03-29 00:41:22 --> [REQ_ID=d1aa79d629e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:46:22 --> [REQ_ID=49d3e30c0c22] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:51:22 --> [REQ_ID=d60e070ba76d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:56:22 --> [REQ_ID=e9ebcc9343d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 00:56:47 --> [REQ_ID=4329a6cc8a85] [REQUEST][START] GET /
DEBUG - 2026-03-29 00:56:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 00:56:47 --> [REQ_ID=4329a6cc8a85] [REQUEST][END]
INFO - 2026-03-29 00:56:47 --> [REQ_ID=4329a6cc8a85] [PERF] Execution time=0.017897
DEBUG - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [REQUEST][END]
INFO - 2026-03-29 01:00:02 --> [REQ_ID=3c4aa3fc39e3] [PERF] Execution time=0.048385
DEBUG - 2026-03-29 01:01:22 --> [REQ_ID=e1296fb6432f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:06:22 --> [REQ_ID=f28e71f6e2db] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:10:30 --> [REQ_ID=427fc8d8df9f] [REQUEST][START] GET /
DEBUG - 2026-03-29 01:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 01:10:30 --> [REQ_ID=427fc8d8df9f] [REQUEST][END]
INFO - 2026-03-29 01:10:30 --> [REQ_ID=427fc8d8df9f] [PERF] Execution time=0.039401
DEBUG - 2026-03-29 01:11:22 --> [REQ_ID=76f2c51acad3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:15:01 --> [REQ_ID=f62694e999c8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 01:15:02 --> [REQ_ID=f62694e999c8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 01:15:02 --> [REQ_ID=f62694e999c8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 01:15:02 --> [REQ_ID=f62694e999c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 01:15:02 --> [REQ_ID=f62694e999c8] [REQUEST][END]
INFO - 2026-03-29 01:15:02 --> [REQ_ID=f62694e999c8] [PERF] Execution time=0.046401
DEBUG - 2026-03-29 01:16:22 --> [REQ_ID=950fb198267a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:21:22 --> [REQ_ID=ffcef62f7770] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:26:22 --> [REQ_ID=d5d635529f90] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:31:22 --> [REQ_ID=1b38daf5aff9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:36:22 --> [REQ_ID=96c4b9514548] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:37:25 --> [REQ_ID=3873446b7061] [REQUEST][START] GET /
DEBUG - 2026-03-29 01:37:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 01:37:25 --> [REQ_ID=3873446b7061] [FILTER_BEFORE] /
DEBUG - 2026-03-29 01:37:25 --> [REQ_ID=3873446b7061] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 01:37:25 --> [REQ_ID=3873446b7061] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 01:37:25 --> [CSRF] token name=csrf_test_name hash=0e03171f29daa79716cb7cd335bbe88b
DEBUG - 2026-03-29 01:37:25 --> [REQ_ID=7b958b5850da] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 01:37:25 --> [REQ_ID=7b958b5850da] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 01:37:25 --> [REQ_ID=7b958b5850da] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 01:37:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 01:37:26 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 01:37:26 --> [REQ_ID=7b958b5850da] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 01:37:26 --> [REQ_ID=7b958b5850da] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 01:37:26 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 01:37:26 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 01:37:26 --> [REQ_ID=3873446b7061] [FILTER_AFTER]
DEBUG - 2026-03-29 01:37:26 --> [REQ_ID=3873446b7061] [LIFECYCLE][END] status=200 duration_ms=611.27 memory_delta=4194304
INFO - 2026-03-29 01:37:26 --> [REQ_ID=7b958b5850da] [PERF] Execution time=0.609350
DEBUG - 2026-03-29 01:37:26 --> [REQ_ID=3873446b7061] [REQUEST][END]
INFO - 2026-03-29 01:37:26 --> [REQ_ID=3873446b7061] [PERF] Execution time=0.650350
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=80011a1fd65c] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 01:37:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=80011a1fd65c] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=80011a1fd65c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=80011a1fd65c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 01:37:27 --> [CSRF] token name=csrf_test_name hash=0e03171f29daa79716cb7cd335bbe88b
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=6beb97800d23] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 01:37:27 --> [REQ_ID=6beb97800d23] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 01:37:27 --> [REQ_ID=6beb97800d23] [METHOD_ENTRY] show
DEBUG - 2026-03-29 01:37:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 01:37:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 01:37:27 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 01:37:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 01:37:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 01:37:27 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 01:37:27 --> [REQ_ID=6beb97800d23] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 01:37:28 --> [REQ_ID=80011a1fd65c] [FILTER_AFTER]
DEBUG - 2026-03-29 01:37:28 --> [REQ_ID=80011a1fd65c] [LIFECYCLE][END] status=200 duration_ms=502.55 memory_delta=2097152
INFO - 2026-03-29 01:37:28 --> [REQ_ID=6beb97800d23] [PERF] Execution time=0.502466
DEBUG - 2026-03-29 01:37:28 --> [REQ_ID=80011a1fd65c] [REQUEST][END]
INFO - 2026-03-29 01:37:28 --> [REQ_ID=80011a1fd65c] [PERF] Execution time=0.516440
DEBUG - 2026-03-29 01:41:22 --> [REQ_ID=9860276865bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:46:22 --> [REQ_ID=553a65e22277] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:51:22 --> [REQ_ID=4660d735dfe1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 01:56:22 --> [REQ_ID=c99a0cc5f43b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [REQUEST][END]
INFO - 2026-03-29 02:00:01 --> [REQ_ID=0017f07deb0f] [PERF] Execution time=0.047168
DEBUG - 2026-03-29 02:01:22 --> [REQ_ID=3c641bbe1df0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:06:22 --> [REQ_ID=9da017c5d029] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:11:22 --> [REQ_ID=f9666cee996d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 02:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [REQUEST][END]
INFO - 2026-03-29 02:15:02 --> [REQ_ID=033540ff40a9] [PERF] Execution time=0.046409
DEBUG - 2026-03-29 02:16:22 --> [REQ_ID=8b183a06632b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:21:22 --> [REQ_ID=b026d1e0f9c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:26:22 --> [REQ_ID=cc65d39eedf1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:29:21 --> [REQ_ID=b2dcf7d6a6cd] [REQUEST][START] GET /
DEBUG - 2026-03-29 02:29:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 02:29:21 --> [REQ_ID=b2dcf7d6a6cd] [FILTER_BEFORE] /
DEBUG - 2026-03-29 02:29:21 --> [REQ_ID=b2dcf7d6a6cd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 02:29:21 --> [REQ_ID=b2dcf7d6a6cd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 02:29:21 --> [CSRF] token name=csrf_test_name hash=3906024e41ec60929289dd7671d0cfd6
DEBUG - 2026-03-29 02:29:21 --> [REQ_ID=f06b6759b88e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 02:29:21 --> [REQ_ID=f06b6759b88e] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 02:29:22 --> [REQ_ID=f06b6759b88e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 02:29:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 02:29:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 02:29:22 --> [REQ_ID=f06b6759b88e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 02:29:22 --> [REQ_ID=f06b6759b88e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 02:29:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 02:29:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 02:29:22 --> [REQ_ID=b2dcf7d6a6cd] [FILTER_AFTER]
DEBUG - 2026-03-29 02:29:22 --> [REQ_ID=b2dcf7d6a6cd] [LIFECYCLE][END] status=200 duration_ms=721.47 memory_delta=4194304
INFO - 2026-03-29 02:29:22 --> [REQ_ID=f06b6759b88e] [PERF] Execution time=0.719417
DEBUG - 2026-03-29 02:29:22 --> [REQ_ID=b2dcf7d6a6cd] [REQUEST][END]
INFO - 2026-03-29 02:29:22 --> [REQ_ID=b2dcf7d6a6cd] [PERF] Execution time=0.759285
DEBUG - 2026-03-29 02:31:22 --> [REQ_ID=3ec3d6f32c01] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:36:22 --> [REQ_ID=a2738b8d730f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:41:22 --> [REQ_ID=ab2a1a01c49c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:46:22 --> [REQ_ID=60841053edf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:51:22 --> [REQ_ID=5001ed1bea6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 02:56:22 --> [REQ_ID=eee5a7b5176d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 02:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 02:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 02:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 02:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [REQUEST][END]
INFO - 2026-03-29 03:00:01 --> [REQ_ID=2432f28b77d6] [PERF] Execution time=0.049565
DEBUG - 2026-03-29 03:01:22 --> [REQ_ID=35168a77774d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:06:22 --> [REQ_ID=869484f97cbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:11:22 --> [REQ_ID=e7a337b4e65c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [REQUEST][END]
INFO - 2026-03-29 03:15:01 --> [REQ_ID=564dcac15c8c] [PERF] Execution time=0.045403
DEBUG - 2026-03-29 03:16:22 --> [REQ_ID=e84d4a8991ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:21:22 --> [REQ_ID=34f2c5eb17e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:26:22 --> [REQ_ID=d7f518f8e215] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:31:22 --> [REQ_ID=8b00bec323c9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [REQUEST][START] GET /
DEBUG - 2026-03-29 03:35:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [FILTER_BEFORE] /
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 03:35:28 --> [CSRF] token name=csrf_test_name hash=f040d3cf0fec48e332eeaa7a76cf73d4
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 03:35:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 03:35:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 03:35:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 03:35:28 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [FILTER_AFTER]
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [LIFECYCLE][END] status=200 duration_ms=709.59 memory_delta=4194304
INFO - 2026-03-29 03:35:28 --> [REQ_ID=7a8d771c2848] [PERF] Execution time=0.707763
DEBUG - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [REQUEST][END]
INFO - 2026-03-29 03:35:28 --> [REQ_ID=88ba249d6aa6] [PERF] Execution time=0.749180
DEBUG - 2026-03-29 03:36:22 --> [REQ_ID=a7ed54617d9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-03-29 03:39:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [FILTER_BEFORE] /index.php/Management/Security
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [ROUTE] Controller=\App\Modules\Management\Controllers\SecurityController Method=index
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Security
DEBUG - 2026-03-29 03:39:44 --> [CSRF] token name=csrf_test_name hash=5cccdfa8961acb9c4c15c2782243a698
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [REQUEST][END]
INFO - 2026-03-29 03:39:44 --> [REQ_ID=e18c8e6df454] [PERF] Execution time=0.048637
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 03:39:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 03:39:44 --> [CSRF] token name=csrf_test_name hash=467141f5105804c2a44e1129f3c72ac4
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=49ae4f85b657] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 03:39:44 --> [REQ_ID=49ae4f85b657] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [FILTER_AFTER]
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [LIFECYCLE][END] status=200 duration_ms=148.72 memory_delta=0
INFO - 2026-03-29 03:39:44 --> [REQ_ID=49ae4f85b657] [PERF] Execution time=0.148551
DEBUG - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [REQUEST][END]
INFO - 2026-03-29 03:39:44 --> [REQ_ID=d45b795b41d0] [PERF] Execution time=0.163349
DEBUG - 2026-03-29 03:41:22 --> [REQ_ID=48d5e6b83961] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:46:22 --> [REQ_ID=76343cb352cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:51:22 --> [REQ_ID=05d0add3e71f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 03:56:22 --> [REQ_ID=461e005e9441] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [REQUEST][END]
INFO - 2026-03-29 04:00:01 --> [REQ_ID=5ce888b4fcc0] [PERF] Execution time=0.048119
DEBUG - 2026-03-29 04:01:22 --> [REQ_ID=bbaa6163a79b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:06:22 --> [REQ_ID=74ec45934879] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:11:22 --> [REQ_ID=6e726eb909dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [REQUEST][END]
INFO - 2026-03-29 04:15:01 --> [REQ_ID=83a08aebf575] [PERF] Execution time=0.046426
DEBUG - 2026-03-29 04:16:22 --> [REQ_ID=82b153030ba4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [REQUEST][START] GET /
DEBUG - 2026-03-29 04:21:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [FILTER_BEFORE] /
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 04:21:12 --> [CSRF] token name=csrf_test_name hash=8be4eff23cb6fd60d53ebf8005836d4f
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 04:21:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 04:21:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 04:21:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 04:21:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [FILTER_AFTER]
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [LIFECYCLE][END] status=200 duration_ms=690.43 memory_delta=4194304
INFO - 2026-03-29 04:21:12 --> [REQ_ID=ecbd5bc03b99] [PERF] Execution time=0.688461
DEBUG - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [REQUEST][END]
INFO - 2026-03-29 04:21:12 --> [REQ_ID=c3380abcef81] [PERF] Execution time=0.728562
DEBUG - 2026-03-29 04:21:22 --> [REQ_ID=a2828826a973] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:26:22 --> [REQ_ID=3e1ff4b99a12] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:31:22 --> [REQ_ID=73ce6fa6c628] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:34:56 --> [REQ_ID=2edd51ebe86a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 04:34:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 04:34:56 --> [REQ_ID=2edd51ebe86a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 04:34:56 --> [REQ_ID=2edd51ebe86a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 04:34:56 --> [REQ_ID=2edd51ebe86a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 04:34:56 --> [CSRF] token name=csrf_test_name hash=b491e5a2340fefdb29546d32cba7766a
DEBUG - 2026-03-29 04:34:56 --> [REQ_ID=e14277fffafc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 04:34:56 --> [REQ_ID=e14277fffafc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 04:34:57 --> [REQ_ID=2edd51ebe86a] [FILTER_AFTER]
DEBUG - 2026-03-29 04:34:57 --> [REQ_ID=2edd51ebe86a] [LIFECYCLE][END] status=200 duration_ms=120.12 memory_delta=0
INFO - 2026-03-29 04:34:57 --> [REQ_ID=e14277fffafc] [PERF] Execution time=0.118127
DEBUG - 2026-03-29 04:34:57 --> [REQ_ID=2edd51ebe86a] [REQUEST][END]
INFO - 2026-03-29 04:34:57 --> [REQ_ID=2edd51ebe86a] [PERF] Execution time=0.161786
DEBUG - 2026-03-29 04:36:22 --> [REQ_ID=a6e2a9161831] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:41:22 --> [REQ_ID=d464c1051b01] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:46:22 --> [REQ_ID=e4906f481e64] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:51:22 --> [REQ_ID=19b84313826a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 04:56:22 --> [REQ_ID=6f38d4311a18] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [REQUEST][END]
INFO - 2026-03-29 05:00:02 --> [REQ_ID=f3a4bae14e26] [PERF] Execution time=0.045766
DEBUG - 2026-03-29 05:01:22 --> [REQ_ID=97451b42d3d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:06:22 --> [REQ_ID=5b8350f2ee59] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:11:22 --> [REQ_ID=07fc564e877d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [REQUEST][END]
INFO - 2026-03-29 05:15:01 --> [REQ_ID=8ae84e39fdd0] [PERF] Execution time=0.050938
DEBUG - 2026-03-29 05:16:22 --> [REQ_ID=9393f5e8439a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:21:22 --> [REQ_ID=7a29319a2aa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:24:41 --> [REQ_ID=67442fd890b6] [REQUEST][START] GET /
DEBUG - 2026-03-29 05:24:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 05:24:41 --> [REQ_ID=67442fd890b6] [FILTER_BEFORE] /
DEBUG - 2026-03-29 05:24:41 --> [REQ_ID=67442fd890b6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 05:24:41 --> [REQ_ID=67442fd890b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 05:24:41 --> [CSRF] token name=csrf_test_name hash=9bbe573f694f5c92785f34d8175abb1f
DEBUG - 2026-03-29 05:24:41 --> [REQ_ID=d82d2ff4b76b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 05:24:41 --> [REQ_ID=d82d2ff4b76b] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 05:24:41 --> [REQ_ID=d82d2ff4b76b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 05:24:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 05:24:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 05:24:42 --> [REQ_ID=d82d2ff4b76b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 05:24:42 --> [REQ_ID=d82d2ff4b76b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 05:24:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 05:24:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 05:24:42 --> [REQ_ID=67442fd890b6] [FILTER_AFTER]
DEBUG - 2026-03-29 05:24:42 --> [REQ_ID=67442fd890b6] [LIFECYCLE][END] status=200 duration_ms=728.80 memory_delta=4194304
INFO - 2026-03-29 05:24:42 --> [REQ_ID=d82d2ff4b76b] [PERF] Execution time=0.726860
DEBUG - 2026-03-29 05:24:42 --> [REQ_ID=67442fd890b6] [REQUEST][END]
INFO - 2026-03-29 05:24:42 --> [REQ_ID=67442fd890b6] [PERF] Execution time=0.767598
DEBUG - 2026-03-29 05:26:22 --> [REQ_ID=b533f993e126] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:31:22 --> [REQ_ID=a1809f350611] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:36:22 --> [REQ_ID=e563420b8733] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:41:22 --> [REQ_ID=aa01fcc57a75] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:46:22 --> [REQ_ID=268399650ded] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:51:22 --> [REQ_ID=79b1f14647d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 05:52:50 --> [REQ_ID=b1bdea73383a] [REQUEST][START] GET /
DEBUG - 2026-03-29 05:52:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 05:52:50 --> [REQ_ID=b1bdea73383a] [FILTER_BEFORE] /
DEBUG - 2026-03-29 05:52:50 --> [REQ_ID=b1bdea73383a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 05:52:50 --> [REQ_ID=b1bdea73383a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 05:52:50 --> [CSRF] token name=csrf_test_name hash=dfd9f1d5d2cb231d51f554888f0f9a3c
DEBUG - 2026-03-29 05:52:50 --> [REQ_ID=727872bfdd9f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 05:52:50 --> [REQ_ID=727872bfdd9f] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 05:52:50 --> [REQ_ID=727872bfdd9f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 05:52:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 05:52:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 05:52:51 --> [REQ_ID=727872bfdd9f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 05:52:51 --> [REQ_ID=727872bfdd9f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 05:52:51 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 05:52:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 05:52:51 --> [REQ_ID=b1bdea73383a] [FILTER_AFTER]
DEBUG - 2026-03-29 05:52:51 --> [REQ_ID=b1bdea73383a] [LIFECYCLE][END] status=200 duration_ms=722.58 memory_delta=4194304
INFO - 2026-03-29 05:52:51 --> [REQ_ID=727872bfdd9f] [PERF] Execution time=0.720650
DEBUG - 2026-03-29 05:52:51 --> [REQ_ID=b1bdea73383a] [REQUEST][END]
INFO - 2026-03-29 05:52:51 --> [REQ_ID=b1bdea73383a] [PERF] Execution time=0.760977
DEBUG - 2026-03-29 05:56:22 --> [REQ_ID=ab040946a59b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [REQUEST][END]
INFO - 2026-03-29 06:00:02 --> [REQ_ID=46fc35482cf6] [PERF] Execution time=0.046788
DEBUG - 2026-03-29 06:01:22 --> [REQ_ID=b58e4367416b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:06:22 --> [REQ_ID=266f66cb5da1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:11:22 --> [REQ_ID=c373d2fe7e4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [REQUEST][END]
INFO - 2026-03-29 06:15:02 --> [REQ_ID=45b0554384c8] [PERF] Execution time=0.045139
DEBUG - 2026-03-29 06:16:22 --> [REQ_ID=38924f47252e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:21:22 --> [REQ_ID=eb01c0127595] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [REQUEST][START] GET /
DEBUG - 2026-03-29 06:25:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [FILTER_BEFORE] /
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 06:25:03 --> [CSRF] token name=csrf_test_name hash=8f8bc9af651e91513c2fc7b054948ad1
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 06:25:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:25:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 06:25:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 06:25:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [FILTER_AFTER]
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [LIFECYCLE][END] status=200 duration_ms=694.86 memory_delta=4194304
INFO - 2026-03-29 06:25:03 --> [REQ_ID=6efde564449f] [PERF] Execution time=0.692917
DEBUG - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [REQUEST][END]
INFO - 2026-03-29 06:25:03 --> [REQ_ID=a0f908bc8668] [PERF] Execution time=0.732217
DEBUG - 2026-03-29 06:25:18 --> [REQ_ID=cccde4492745] [REQUEST][START] GET /
DEBUG - 2026-03-29 06:25:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:25:18 --> [REQ_ID=cccde4492745] [FILTER_BEFORE] /
DEBUG - 2026-03-29 06:25:18 --> [REQ_ID=cccde4492745] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 06:25:18 --> [REQ_ID=cccde4492745] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 06:25:18 --> [CSRF] token name=csrf_test_name hash=7e248bd1eb391bd8f7b4ec34c73e556a
DEBUG - 2026-03-29 06:25:18 --> [REQ_ID=9cf533518b7c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:25:18 --> [REQ_ID=9cf533518b7c] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:25:18 --> [REQ_ID=9cf533518b7c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 06:25:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:25:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:25:19 --> [REQ_ID=9cf533518b7c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 06:25:19 --> [REQ_ID=9cf533518b7c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 06:25:19 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 06:25:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:25:19 --> [REQ_ID=cccde4492745] [FILTER_AFTER]
DEBUG - 2026-03-29 06:25:19 --> [REQ_ID=cccde4492745] [LIFECYCLE][END] status=200 duration_ms=509.25 memory_delta=4194304
INFO - 2026-03-29 06:25:19 --> [REQ_ID=9cf533518b7c] [PERF] Execution time=0.508989
DEBUG - 2026-03-29 06:25:19 --> [REQ_ID=cccde4492745] [REQUEST][END]
INFO - 2026-03-29 06:25:19 --> [REQ_ID=cccde4492745] [PERF] Execution time=0.518724
DEBUG - 2026-03-29 06:26:22 --> [REQ_ID=953d882810b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:31:22 --> [REQ_ID=091b588d3b1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:36:22 --> [REQ_ID=0b2883e82a1d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:41:22 --> [REQ_ID=206b2bf1f497] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:46:22 --> [REQ_ID=3e72718ba6d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [REQUEST][START] GET /
DEBUG - 2026-03-29 06:49:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [FILTER_BEFORE] /
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 06:49:49 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 06:49:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:49:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 06:49:49 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 06:49:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [FILTER_AFTER]
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [LIFECYCLE][END] status=200 duration_ms=699.03 memory_delta=4194304
INFO - 2026-03-29 06:49:49 --> [REQ_ID=767142e02cc3] [PERF] Execution time=0.696917
DEBUG - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [REQUEST][END]
INFO - 2026-03-29 06:49:49 --> [REQ_ID=e82a2c44f469] [PERF] Execution time=0.737655
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 06:50:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 06:50:02 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=e4729d97448b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:50:02 --> [REQ_ID=e4729d97448b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [FILTER_AFTER]
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [LIFECYCLE][END] status=200 duration_ms=32.42 memory_delta=0
INFO - 2026-03-29 06:50:02 --> [REQ_ID=e4729d97448b] [PERF] Execution time=0.031936
DEBUG - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [REQUEST][END]
INFO - 2026-03-29 06:50:02 --> [REQ_ID=4621743bdb18] [PERF] Execution time=0.044931
DEBUG - 2026-03-29 06:50:09 --> [REQ_ID=c79a73f5ae98] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-29 06:50:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:09 --> [REQ_ID=c79a73f5ae98] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-29 06:50:09 --> [REQ_ID=c79a73f5ae98] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-29 06:50:09 --> [REQ_ID=c79a73f5ae98] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-29 06:50:09 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:09 --> [REQ_ID=f04bb719c080] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:50:09 --> [REQ_ID=f04bb719c080] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:50:09 --> [REGISTRATION] Form loaded
INFO - 2026-03-29 06:50:09 --> [REQ_ID=f04bb719c080] [PERF] Execution time=0.025930
DEBUG - 2026-03-29 06:50:26 --> [REQ_ID=b7d7e6da38bc] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-29 06:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:26 --> [REQ_ID=b7d7e6da38bc] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-29 06:50:26 --> [REQ_ID=b7d7e6da38bc] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-29 06:50:26 --> [REQ_ID=b7d7e6da38bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-29 06:50:26 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:26 --> [REQ_ID=75a81f5bec9f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:50:26 --> [REQ_ID=75a81f5bec9f] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:50:26 --> [REGISTRATION] Form loaded
INFO - 2026-03-29 06:50:26 --> [REQ_ID=75a81f5bec9f] [PERF] Execution time=0.013291
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=99d14fdd8760] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 06:50:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=99d14fdd8760] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=99d14fdd8760] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=99d14fdd8760] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 06:50:29 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=ccbf28155633] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 06:50:29 --> [REQ_ID=ccbf28155633] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 06:50:29 --> [REQ_ID=ccbf28155633] [METHOD_ENTRY] show
DEBUG - 2026-03-29 06:50:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:50:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 06:50:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 06:50:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 06:50:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 06:50:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 06:50:29 --> [REQ_ID=ccbf28155633] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 06:50:30 --> [REQ_ID=99d14fdd8760] [FILTER_AFTER]
DEBUG - 2026-03-29 06:50:30 --> [REQ_ID=99d14fdd8760] [LIFECYCLE][END] status=200 duration_ms=892.23 memory_delta=4194304
INFO - 2026-03-29 06:50:30 --> [REQ_ID=ccbf28155633] [PERF] Execution time=0.892185
DEBUG - 2026-03-29 06:50:30 --> [REQ_ID=99d14fdd8760] [REQUEST][END]
INFO - 2026-03-29 06:50:30 --> [REQ_ID=99d14fdd8760] [PERF] Execution time=0.907154
DEBUG - 2026-03-29 06:50:31 --> [REQ_ID=8426140bd732] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-29 06:50:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:31 --> [REQ_ID=8426140bd732] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-29 06:50:31 --> [REQ_ID=8426140bd732] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-29 06:50:31 --> [REQ_ID=8426140bd732] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-29 06:50:31 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:31 --> [REQ_ID=403f1b7242f9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:50:31 --> [REQ_ID=403f1b7242f9] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 06:50:31 --> [REQ_ID=403f1b7242f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 06:50:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:50:32 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-29 06:50:32 --> [REQ_ID=403f1b7242f9] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-29 06:50:32 --> [REQ_ID=403f1b7242f9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 06:50:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 06:50:32 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-29 06:50:32 --> [REQ_ID=8426140bd732] [FILTER_AFTER]
DEBUG - 2026-03-29 06:50:32 --> [REQ_ID=8426140bd732] [LIFECYCLE][END] status=200 duration_ms=489.52 memory_delta=2097152
INFO - 2026-03-29 06:50:32 --> [REQ_ID=403f1b7242f9] [PERF] Execution time=0.489323
DEBUG - 2026-03-29 06:50:32 --> [REQ_ID=8426140bd732] [REQUEST][END]
INFO - 2026-03-29 06:50:32 --> [REQ_ID=8426140bd732] [PERF] Execution time=0.502640
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 06:50:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 06:50:44 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [METHOD_ENTRY] index
DEBUG - 2026-03-29 06:50:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:50:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 06:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 06:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 06:50:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 06:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 06:50:44 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [FILTER_AFTER]
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [LIFECYCLE][END] status=200 duration_ms=36.15 memory_delta=0
INFO - 2026-03-29 06:50:44 --> [REQ_ID=29143df2bff0] [PERF] Execution time=0.035892
DEBUG - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [REQUEST][END]
INFO - 2026-03-29 06:50:44 --> [REQ_ID=e202efb9edec] [PERF] Execution time=0.047340
DEBUG - 2026-03-29 06:50:47 --> [REQ_ID=36f2ce5121e8] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-29 06:50:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:50:47 --> [REQ_ID=36f2ce5121e8] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-29 06:50:47 --> [REQ_ID=36f2ce5121e8] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-29 06:50:47 --> [REQ_ID=36f2ce5121e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-29 06:50:47 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:50:47 --> [REQ_ID=e009383e2cdd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:50:47 --> [REQ_ID=e009383e2cdd] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:50:47 --> [REGISTRATION] Form loaded
INFO - 2026-03-29 06:50:47 --> [REQ_ID=e009383e2cdd] [PERF] Execution time=0.012607
DEBUG - 2026-03-29 06:51:01 --> [REQ_ID=26e96ab1d547] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-29 06:51:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:01 --> [REQ_ID=26e96ab1d547] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-29 06:51:01 --> [REQ_ID=26e96ab1d547] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-29 06:51:01 --> [REQ_ID=26e96ab1d547] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-29 06:51:01 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:51:01 --> [REQ_ID=7ef9ee832b91] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:51:01 --> [REQ_ID=7ef9ee832b91] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:51:01 --> [REGISTRATION] Form loaded
INFO - 2026-03-29 06:51:01 --> [REQ_ID=7ef9ee832b91] [PERF] Execution time=0.082888
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-29 06:51:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-29 06:51:02 --> [CSRF] token name=csrf_test_name hash=9d7ca0753df69caddc49897e220c3e3e
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [LIFECYCLE][END] status=200 duration_ms=3.77 memory_delta=0
DEBUG - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [REQUEST][END]
INFO - 2026-03-29 06:51:02 --> [REQ_ID=a3093bcb58f9] [PERF] Execution time=0.015044
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-29 06:51:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-29 06:51:12 --> [CSRF] token name=csrf_test_name hash=98b3da14e1cd06fab143b86ec52cc997
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [LIFECYCLE][END] status=200 duration_ms=2.95 memory_delta=0
DEBUG - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [REQUEST][END]
INFO - 2026-03-29 06:51:12 --> [REQ_ID=be5bfac76526] [PERF] Execution time=0.012217
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [REQUEST][START] POST /index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptForgot
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> [CSRF] token name=csrf_test_name hash=98b3da14e1cd06fab143b86ec52cc997
INFO - 2026-03-29 06:51:18 --> CSRF token verified.
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=4c589d942e1d] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-29 06:51:18 --> [REQ_ID=4c589d942e1d] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:51:18 --> [AUTH] Password reset requested
WARNING - 2026-03-29 06:51:18 --> [AUTH] Password reset request: user not found
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [LIFECYCLE][END] status=303 duration_ms=136.11 memory_delta=0
INFO - 2026-03-29 06:51:18 --> [REQ_ID=4c589d942e1d] [PERF] Execution time=0.135859
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [REQUEST][END]
INFO - 2026-03-29 06:51:18 --> [REQ_ID=a33948f43f19] [PERF] Execution time=0.144991
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-03-29 06:51:18 --> [CSRF] token name=csrf_test_name hash=c55e30e9fcba4c2d87d1445605474c05
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [LIFECYCLE][END] status=200 duration_ms=2.63 memory_delta=0
DEBUG - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [REQUEST][END]
INFO - 2026-03-29 06:51:18 --> [REQ_ID=c962b4b8538a] [PERF] Execution time=0.011825
DEBUG - 2026-03-29 06:51:22 --> [REQ_ID=3aee2f4794b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 06:51:32 --> [REQ_ID=2d6c8b34b325] [REQUEST][START] GET /
DEBUG - 2026-03-29 06:51:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:32 --> [REQ_ID=2d6c8b34b325] [FILTER_BEFORE] /
DEBUG - 2026-03-29 06:51:32 --> [REQ_ID=2d6c8b34b325] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 06:51:32 --> [REQ_ID=2d6c8b34b325] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 06:51:32 --> [CSRF] token name=csrf_test_name hash=c2ff858e7a1c82e6da504d26ba4c2574
DEBUG - 2026-03-29 06:51:32 --> [REQ_ID=d84e121a8add] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:51:32 --> [REQ_ID=d84e121a8add] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:51:32 --> [REQ_ID=d84e121a8add] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 06:51:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:51:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:51:33 --> [REQ_ID=d84e121a8add] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 06:51:33 --> [REQ_ID=d84e121a8add] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 06:51:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 06:51:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:51:33 --> [REQ_ID=2d6c8b34b325] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:33 --> [REQ_ID=2d6c8b34b325] [LIFECYCLE][END] status=200 duration_ms=638.66 memory_delta=4194304
INFO - 2026-03-29 06:51:33 --> [REQ_ID=d84e121a8add] [PERF] Execution time=0.638419
DEBUG - 2026-03-29 06:51:33 --> [REQ_ID=2d6c8b34b325] [REQUEST][END]
INFO - 2026-03-29 06:51:33 --> [REQ_ID=2d6c8b34b325] [PERF] Execution time=0.648009
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 06:51:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 06:51:35 --> [CSRF] token name=csrf_test_name hash=68617d8245ce1c0db5d23a180eb4a994
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=1b8264a38752] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 06:51:35 --> [REQ_ID=1b8264a38752] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [FILTER_AFTER]
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [LIFECYCLE][END] status=200 duration_ms=19.64 memory_delta=0
INFO - 2026-03-29 06:51:35 --> [REQ_ID=1b8264a38752] [PERF] Execution time=0.019413
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [REQUEST][END]
INFO - 2026-03-29 06:51:35 --> [REQ_ID=ad9fce2d5506] [PERF] Execution time=0.028599
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [REQUEST][START] POST /index.php/auth/resend-activation
DEBUG - 2026-03-29 06:51:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [FILTER_BEFORE] /index.php/auth/resend-activation
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [ROUTE] Controller=\App\Controllers\AuthController Method=resendActivationCode
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/auth/resend-activation
DEBUG - 2026-03-29 06:51:35 --> [CSRF] token name=csrf_test_name hash=68617d8245ce1c0db5d23a180eb4a994
INFO - 2026-03-29 06:51:35 --> CSRF token verified.
DEBUG - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [REQUEST][END]
INFO - 2026-03-29 06:51:35 --> [REQ_ID=3c1cca9ee778] [PERF] Execution time=0.009525
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-29 06:52:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-29 06:52:40 --> [CSRF] token name=csrf_test_name hash=c2ff858e7a1c82e6da504d26ba4c2574
INFO - 2026-03-29 06:52:40 --> CSRF token verified.
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=0c7172043739] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-29 06:52:40 --> [REQ_ID=0c7172043739] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:52:40 --> [REGISTRATION] Submission received
INFO - 2026-03-29 06:52:40 --> MailService queued email
INFO - 2026-03-29 06:52:40 --> [REGISTRATION] Validation passed (basic fields)
ERROR - 2026-03-29 06:52:40 --> Registration failed: {"password":"Validation.strong_password"}
INFO - 2026-03-29 06:52:40 --> MailService queued email
WARNING - 2026-03-29 06:52:40 --> [REGISTRATION] Validation failed (password fields)
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [FILTER_AFTER]
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [LIFECYCLE][END] status=303 duration_ms=99.38 memory_delta=0
INFO - 2026-03-29 06:52:40 --> [REQ_ID=0c7172043739] [PERF] Execution time=0.099205
DEBUG - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [REQUEST][END]
INFO - 2026-03-29 06:52:40 --> [REQ_ID=935f4796d9ac] [PERF] Execution time=0.108530
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-29 06:52:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 06:52:45 --> [CSRF] token name=csrf_test_name hash=3f866ac795723d525c0923d035aae8b4
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 06:52:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 06:52:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 06:52:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 06:52:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [FILTER_AFTER]
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [LIFECYCLE][END] status=200 duration_ms=487.53 memory_delta=4194304
INFO - 2026-03-29 06:52:45 --> [REQ_ID=7de3ad55ed4e] [PERF] Execution time=0.487302
DEBUG - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [REQUEST][END]
INFO - 2026-03-29 06:52:45 --> [REQ_ID=ec71e9e78702] [PERF] Execution time=0.498119
DEBUG - 2026-03-29 06:56:22 --> [REQ_ID=e52fd626fe52] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-29 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-29 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-29 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-29 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-29 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-29 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-29 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-29 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.076911
INFO - 2026-03-29 07:00:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [REQUEST][END]
INFO - 2026-03-29 07:00:01 --> [REQ_ID=958182bb0ec1] [PERF] Execution time=0.098996
INFO - 2026-03-29 07:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-29 07:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-29 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-29 07:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-29 07:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.004647
INFO - 2026-03-29 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-29 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-29 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-29 07:00:03 --> LOG_HEALTHCHECK debug marker=9d460f6f7649
INFO - 2026-03-29 07:00:03 --> LOG_HEALTHCHECK info marker=9d460f6f7649
NOTICE - 2026-03-29 07:00:03 --> LOG_HEALTHCHECK probe marker=9d460f6f7649
INFO - 2026-03-29 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-29 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.032421
INFO - 2026-03-29 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-29 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=1.896605
INFO - 2026-03-29 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-29 07:01:22 --> [REQ_ID=26b01305d2de] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:06:22 --> [REQ_ID=aec3d55dfc3a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [REQUEST][START] GET /
DEBUG - 2026-03-29 07:10:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [FILTER_BEFORE] /
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 07:10:11 --> [CSRF] token name=csrf_test_name hash=c60b7869fc2638d3e6b7eed033a6974d
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 07:10:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 07:10:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 07:10:11 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 07:10:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [FILTER_AFTER]
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [LIFECYCLE][END] status=200 duration_ms=748.91 memory_delta=4194304
INFO - 2026-03-29 07:10:11 --> [REQ_ID=60edbcf0aec4] [PERF] Execution time=0.747057
DEBUG - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [REQUEST][END]
INFO - 2026-03-29 07:10:11 --> [REQ_ID=483382bf1e5e] [PERF] Execution time=0.802209
DEBUG - 2026-03-29 07:11:22 --> [REQ_ID=3d80d1336f61] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [REQUEST][END]
INFO - 2026-03-29 07:15:02 --> [REQ_ID=f95ff55300f0] [PERF] Execution time=0.046168
DEBUG - 2026-03-29 07:16:22 --> [REQ_ID=499dbba72dd8] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:21:22 --> [REQ_ID=b9ae89baefa1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:26:22 --> [REQ_ID=b4cc89043143] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:31:22 --> [REQ_ID=1930e06e95bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:36:22 --> [REQ_ID=132554c4c47d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:41:22 --> [REQ_ID=661d91a245fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:46:22 --> [REQ_ID=f3ccd3f3d191] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:51:22 --> [REQ_ID=46986cf26f27] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 07:56:22 --> [REQ_ID=1fe857e63f1f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [REQUEST][END]
INFO - 2026-03-29 08:00:01 --> [REQ_ID=eb11f0d5f7dc] [PERF] Execution time=0.048448
DEBUG - 2026-03-29 08:01:22 --> [REQ_ID=b700022d2395] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:06:22 --> [REQ_ID=abe3ef66c01a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:11:22 --> [REQ_ID=ef0bb9176807] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [REQUEST][END]
INFO - 2026-03-29 08:15:01 --> [REQ_ID=308e13cb8cfe] [PERF] Execution time=0.046496
DEBUG - 2026-03-29 08:16:22 --> [REQ_ID=0645c6891140] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:21:22 --> [REQ_ID=ef0b9c93e928] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:26:22 --> [REQ_ID=cee31bc2e855] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:31:22 --> [REQ_ID=d9eaf17d3764] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:36:22 --> [REQ_ID=1f42ddd1e573] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:41:22 --> [REQ_ID=142f31ae5f9f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:46:22 --> [REQ_ID=336daef695a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:51:22 --> [REQ_ID=5ea2408a48a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 08:56:22 --> [REQ_ID=97621942a2b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [REQUEST][END]
INFO - 2026-03-29 09:00:01 --> [REQ_ID=1c5fb64846de] [PERF] Execution time=0.050379
DEBUG - 2026-03-29 09:01:22 --> [REQ_ID=45ce21555615] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:04:03 --> [REQ_ID=3e40780989a8] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-29 09:04:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:04:03 --> [REQ_ID=3e40780989a8] [REQUEST][END]
INFO - 2026-03-29 09:04:03 --> [REQ_ID=3e40780989a8] [PERF] Execution time=0.040028
DEBUG - 2026-03-29 09:06:22 --> [REQ_ID=065b1e956a22] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:11:03 --> [REQ_ID=a0b68744ecf7] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Pro
DEBUG - 2026-03-29 09:11:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:11:03 --> [REQ_ID=a0b68744ecf7] [REQUEST][END]
INFO - 2026-03-29 09:11:03 --> [REQ_ID=a0b68744ecf7] [PERF] Execution time=0.047215
DEBUG - 2026-03-29 09:11:22 --> [REQ_ID=c4190f13bd0e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [REQUEST][END]
INFO - 2026-03-29 09:15:01 --> [REQ_ID=003fd7edf286] [PERF] Execution time=0.052315
DEBUG - 2026-03-29 09:15:06 --> [REQ_ID=7c333a50-29d5-4015-9504-85c9248aa661] [REQUEST][START] GET /
DEBUG - 2026-03-29 09:15:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:15:06 --> [REQ_ID=7c333a50-29d5-4015-9504-85c9248aa661] [REQUEST][END]
INFO - 2026-03-29 09:15:06 --> [REQ_ID=7c333a50-29d5-4015-9504-85c9248aa661] [PERF] Execution time=0.009970
DEBUG - 2026-03-29 09:16:22 --> [REQ_ID=b8ad1bd5cb68] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:21:22 --> [REQ_ID=1954c5dd236f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:24:39 --> [REQ_ID=cec5a7b8fd17] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-29 09:24:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:24:39 --> [REQ_ID=cec5a7b8fd17] [REQUEST][END]
INFO - 2026-03-29 09:24:39 --> [REQ_ID=cec5a7b8fd17] [PERF] Execution time=0.041057
DEBUG - 2026-03-29 09:26:22 --> [REQ_ID=c53f63e84211] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:31:22 --> [REQ_ID=1b9ae4be3404] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:36:22 --> [REQ_ID=b65aa82fed15] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:41:22 --> [REQ_ID=8854ade21b54] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:46:22 --> [REQ_ID=e6bba234cecb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:51:22 --> [REQ_ID=24aa799814a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 09:54:27 --> [REQ_ID=2bacc78aee0f] [REQUEST][START] GET /
DEBUG - 2026-03-29 09:54:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 09:54:27 --> [REQ_ID=2bacc78aee0f] [FILTER_BEFORE] /
DEBUG - 2026-03-29 09:54:27 --> [REQ_ID=2bacc78aee0f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 09:54:27 --> [REQ_ID=2bacc78aee0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 09:54:27 --> [CSRF] token name=csrf_test_name hash=09fa47daceafc1377d6c3eb233fa63ac
DEBUG - 2026-03-29 09:54:27 --> [REQ_ID=0ce17749ed5e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 09:54:27 --> [REQ_ID=0ce17749ed5e] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 09:54:27 --> [REQ_ID=0ce17749ed5e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 09:54:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 09:54:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 09:54:28 --> [REQ_ID=0ce17749ed5e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 09:54:28 --> [REQ_ID=0ce17749ed5e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 09:54:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 09:54:28 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 09:54:28 --> [REQ_ID=2bacc78aee0f] [FILTER_AFTER]
DEBUG - 2026-03-29 09:54:28 --> [REQ_ID=2bacc78aee0f] [LIFECYCLE][END] status=200 duration_ms=790.78 memory_delta=4194304
INFO - 2026-03-29 09:54:28 --> [REQ_ID=0ce17749ed5e] [PERF] Execution time=0.788960
DEBUG - 2026-03-29 09:54:28 --> [REQ_ID=2bacc78aee0f] [REQUEST][END]
INFO - 2026-03-29 09:54:28 --> [REQ_ID=2bacc78aee0f] [PERF] Execution time=0.830074
DEBUG - 2026-03-29 09:56:22 --> [REQ_ID=8331098d87cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [REQUEST][END]
INFO - 2026-03-29 10:00:01 --> [REQ_ID=c19c1129a7cc] [PERF] Execution time=0.048131
DEBUG - 2026-03-29 10:01:22 --> [REQ_ID=4458ca8f9963] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:06:22 --> [REQ_ID=9544df033681] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [REQUEST][START] GET /
DEBUG - 2026-03-29 10:06:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [FILTER_BEFORE] /
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 10:06:47 --> [CSRF] token name=csrf_test_name hash=186aeecd8bdb48f3db7b3131d98f1b6e
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 10:06:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 10:06:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 10:06:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 10:06:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [FILTER_AFTER]
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [LIFECYCLE][END] status=200 duration_ms=621.35 memory_delta=4194304
INFO - 2026-03-29 10:06:47 --> [REQ_ID=def5f555f355] [PERF] Execution time=0.619011
DEBUG - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [REQUEST][END]
INFO - 2026-03-29 10:06:47 --> [REQ_ID=d88c14a13eaf] [PERF] Execution time=0.639845
DEBUG - 2026-03-29 10:11:22 --> [REQ_ID=75530428f930] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [REQUEST][END]
INFO - 2026-03-29 10:15:01 --> [REQ_ID=e04313a86c78] [PERF] Execution time=0.046991
DEBUG - 2026-03-29 10:16:22 --> [REQ_ID=2bd6cf75a7d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:19:55 --> [REQ_ID=f8ea5cfc60d0] [REQUEST][START] GET /
DEBUG - 2026-03-29 10:19:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:19:55 --> [REQ_ID=f8ea5cfc60d0] [FILTER_BEFORE] /
DEBUG - 2026-03-29 10:19:55 --> [REQ_ID=f8ea5cfc60d0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 10:19:55 --> [REQ_ID=f8ea5cfc60d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 10:19:55 --> [CSRF] token name=csrf_test_name hash=858a0a9b94beed86a5a1474195f54872
DEBUG - 2026-03-29 10:19:55 --> [REQ_ID=350bbf68045d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 10:19:55 --> [REQ_ID=350bbf68045d] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 10:19:56 --> [REQ_ID=350bbf68045d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 10:19:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 10:19:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 10:19:56 --> [REQ_ID=350bbf68045d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 10:19:56 --> [REQ_ID=350bbf68045d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 10:19:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 10:19:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 10:19:56 --> [REQ_ID=f8ea5cfc60d0] [FILTER_AFTER]
DEBUG - 2026-03-29 10:19:56 --> [REQ_ID=f8ea5cfc60d0] [LIFECYCLE][END] status=200 duration_ms=925.60 memory_delta=4194304
INFO - 2026-03-29 10:19:56 --> [REQ_ID=350bbf68045d] [PERF] Execution time=0.923688
DEBUG - 2026-03-29 10:19:56 --> [REQ_ID=f8ea5cfc60d0] [REQUEST][END]
INFO - 2026-03-29 10:19:56 --> [REQ_ID=f8ea5cfc60d0] [PERF] Execution time=0.964077
DEBUG - 2026-03-29 10:21:22 --> [REQ_ID=68a101bc4ef4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:26:22 --> [REQ_ID=b0b2173eaf5f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:27:30 --> [REQ_ID=18be9b003623] [REQUEST][START] GET /
DEBUG - 2026-03-29 10:27:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:27:30 --> [REQ_ID=18be9b003623] [FILTER_BEFORE] /
DEBUG - 2026-03-29 10:27:30 --> [REQ_ID=18be9b003623] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 10:27:30 --> [REQ_ID=18be9b003623] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 10:27:30 --> [CSRF] token name=csrf_test_name hash=e36dd24ef2d649961af9e8b0d2766186
DEBUG - 2026-03-29 10:27:30 --> [REQ_ID=666b8e179e5c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 10:27:30 --> [REQ_ID=666b8e179e5c] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 10:27:30 --> [REQ_ID=666b8e179e5c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 10:27:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 10:27:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 10:27:31 --> [REQ_ID=666b8e179e5c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 10:27:31 --> [REQ_ID=666b8e179e5c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 10:27:31 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 10:27:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 10:27:31 --> [REQ_ID=18be9b003623] [FILTER_AFTER]
DEBUG - 2026-03-29 10:27:31 --> [REQ_ID=18be9b003623] [LIFECYCLE][END] status=200 duration_ms=640.52 memory_delta=4194304
INFO - 2026-03-29 10:27:31 --> [REQ_ID=666b8e179e5c] [PERF] Execution time=0.638622
DEBUG - 2026-03-29 10:27:31 --> [REQ_ID=18be9b003623] [REQUEST][END]
INFO - 2026-03-29 10:27:31 --> [REQ_ID=18be9b003623] [PERF] Execution time=0.658968
DEBUG - 2026-03-29 10:31:22 --> [REQ_ID=f524b5bc3586] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:36:22 --> [REQ_ID=184726dadd50] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:41:22 --> [REQ_ID=c3f22520f9b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:44:48 --> [REQ_ID=9caae311461a] [REQUEST][START] GET /index.php
DEBUG - 2026-03-29 10:44:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 10:44:48 --> [REQ_ID=9caae311461a] [REQUEST][END]
INFO - 2026-03-29 10:44:48 --> [REQ_ID=9caae311461a] [PERF] Execution time=0.040455
DEBUG - 2026-03-29 10:46:22 --> [REQ_ID=4882eaace9f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:51:22 --> [REQ_ID=d51cdd739c72] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 10:56:22 --> [REQ_ID=386a02bacd6a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [REQUEST][END]
INFO - 2026-03-29 11:00:01 --> [REQ_ID=124b8bb0b259] [PERF] Execution time=0.050158
DEBUG - 2026-03-29 11:01:22 --> [REQ_ID=d5e208688f92] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:06:22 --> [REQ_ID=53f04e8d38d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:07:12 --> [REQ_ID=d24bf57c6544] [REQUEST][START] GET /
DEBUG - 2026-03-29 11:07:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:07:12 --> [REQ_ID=d24bf57c6544] [FILTER_BEFORE] /
DEBUG - 2026-03-29 11:07:12 --> [REQ_ID=d24bf57c6544] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 11:07:12 --> [REQ_ID=d24bf57c6544] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 11:07:12 --> [CSRF] token name=csrf_test_name hash=997834eb8fedd0e584575fb4fe7497e6
DEBUG - 2026-03-29 11:07:12 --> [REQ_ID=ce8d513e9666] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 11:07:12 --> [REQ_ID=ce8d513e9666] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 11:07:12 --> [REQ_ID=ce8d513e9666] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 11:07:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 11:07:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=ce8d513e9666] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 11:07:13 --> [REQ_ID=ce8d513e9666] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 11:07:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 11:07:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=d24bf57c6544] [FILTER_AFTER]
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=d24bf57c6544] [LIFECYCLE][END] status=200 duration_ms=839.06 memory_delta=4194304
INFO - 2026-03-29 11:07:13 --> [REQ_ID=ce8d513e9666] [PERF] Execution time=0.837188
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=d24bf57c6544] [REQUEST][END]
INFO - 2026-03-29 11:07:13 --> [REQ_ID=d24bf57c6544] [PERF] Execution time=0.859299
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=3b87b98f1aea] [REQUEST][START] GET /
DEBUG - 2026-03-29 11:07:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=3b87b98f1aea] [FILTER_BEFORE] /
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=3b87b98f1aea] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=3b87b98f1aea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 11:07:13 --> [CSRF] token name=csrf_test_name hash=997834eb8fedd0e584575fb4fe7497e6
DEBUG - 2026-03-29 11:07:13 --> [REQ_ID=f575a18f8532] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 11:07:13 --> [REQ_ID=f575a18f8532] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 11:07:13 --> [REQ_ID=f575a18f8532] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 11:07:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 11:07:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 11:07:14 --> [REQ_ID=f575a18f8532] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 11:07:14 --> [REQ_ID=f575a18f8532] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 11:07:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 11:07:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 11:07:14 --> [REQ_ID=3b87b98f1aea] [FILTER_AFTER]
DEBUG - 2026-03-29 11:07:14 --> [REQ_ID=3b87b98f1aea] [LIFECYCLE][END] status=200 duration_ms=607.62 memory_delta=4194304
INFO - 2026-03-29 11:07:14 --> [REQ_ID=f575a18f8532] [PERF] Execution time=0.607474
DEBUG - 2026-03-29 11:07:14 --> [REQ_ID=3b87b98f1aea] [REQUEST][END]
INFO - 2026-03-29 11:07:14 --> [REQ_ID=3b87b98f1aea] [PERF] Execution time=0.616095
DEBUG - 2026-03-29 11:11:22 --> [REQ_ID=335365f9067e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:12:41 --> [REQ_ID=48b13230e6e7] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 11:12:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:12:41 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 11:12:41 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 11:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [REQUEST][END]
INFO - 2026-03-29 11:15:02 --> [REQ_ID=9070494bac17] [PERF] Execution time=0.044764
DEBUG - 2026-03-29 11:16:22 --> [REQ_ID=f70a136cb3cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:21:22 --> [REQ_ID=69471053945e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:26:22 --> [REQ_ID=9fa317a807d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:31:22 --> [REQ_ID=b218abf8c3b7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:36:22 --> [REQ_ID=ab7acc2d9cc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:39:29 --> [REQ_ID=0130b5c070fd] [REQUEST][START] GET /
DEBUG - 2026-03-29 11:39:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:39:29 --> [REQ_ID=0130b5c070fd] [FILTER_BEFORE] /
DEBUG - 2026-03-29 11:39:29 --> [REQ_ID=0130b5c070fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 11:39:29 --> [REQ_ID=0130b5c070fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 11:39:29 --> [CSRF] token name=csrf_test_name hash=5a7ec9603cccd63d944c5af1c7eaecc6
DEBUG - 2026-03-29 11:39:29 --> [REQ_ID=ceb4a7137f3d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 11:39:29 --> [REQ_ID=ceb4a7137f3d] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 11:39:29 --> [REQ_ID=ceb4a7137f3d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 11:39:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 11:39:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 11:39:30 --> [REQ_ID=ceb4a7137f3d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 11:39:30 --> [REQ_ID=ceb4a7137f3d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 11:39:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 11:39:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 11:39:30 --> [REQ_ID=0130b5c070fd] [FILTER_AFTER]
DEBUG - 2026-03-29 11:39:30 --> [REQ_ID=0130b5c070fd] [LIFECYCLE][END] status=200 duration_ms=620.67 memory_delta=4194304
INFO - 2026-03-29 11:39:30 --> [REQ_ID=ceb4a7137f3d] [PERF] Execution time=0.618707
DEBUG - 2026-03-29 11:39:30 --> [REQ_ID=0130b5c070fd] [REQUEST][END]
INFO - 2026-03-29 11:39:30 --> [REQ_ID=0130b5c070fd] [PERF] Execution time=0.658942
DEBUG - 2026-03-29 11:41:22 --> [REQ_ID=0f08cf85c03d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:46:22 --> [REQ_ID=fb098b245e2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:51:22 --> [REQ_ID=b324ac67d28a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:56:22 --> [REQ_ID=a98ca200a256] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 11:59:48 --> [REQ_ID=da2739ada0ef] [REQUEST][START] GET /index.php/Accounts/createLinkToken
DEBUG - 2026-03-29 11:59:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 11:59:48 --> [REQ_ID=da2739ada0ef] [REQUEST][END]
INFO - 2026-03-29 11:59:48 --> [REQ_ID=da2739ada0ef] [PERF] Execution time=0.038606
DEBUG - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [REQUEST][END]
INFO - 2026-03-29 12:00:01 --> [REQ_ID=e6dd2f6c25e4] [PERF] Execution time=0.014860
DEBUG - 2026-03-29 12:01:22 --> [REQ_ID=707c7e7215fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:05:09 --> [REQ_ID=ca4b914ccde6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 12:05:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 12:05:09 --> [REQ_ID=ca4b914ccde6] [REQUEST][END]
INFO - 2026-03-29 12:05:09 --> [REQ_ID=ca4b914ccde6] [PERF] Execution time=0.042656
DEBUG - 2026-03-29 12:06:22 --> [REQ_ID=1e8d8ce6ddea] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:11:22 --> [REQ_ID=3392f850fa8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [REQUEST][END]
INFO - 2026-03-29 12:15:02 --> [REQ_ID=d3c0114c85d3] [PERF] Execution time=0.046088
DEBUG - 2026-03-29 12:16:22 --> [REQ_ID=f83d44826d6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:16:56 --> [REQ_ID=1cd56d313eb7] [REQUEST][START] GET /index.php
DEBUG - 2026-03-29 12:16:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 12:16:56 --> [REQ_ID=1cd56d313eb7] [REQUEST][END]
INFO - 2026-03-29 12:16:56 --> [REQ_ID=1cd56d313eb7] [PERF] Execution time=0.011475
DEBUG - 2026-03-29 12:21:22 --> [REQ_ID=4d6ebeb17d15] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:21:35 --> [REQ_ID=95d3fdeada09] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 12:21:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 12:21:35 --> [REQ_ID=95d3fdeada09] [REQUEST][END]
INFO - 2026-03-29 12:21:35 --> [REQ_ID=95d3fdeada09] [PERF] Execution time=0.020810
DEBUG - 2026-03-29 12:26:22 --> [REQ_ID=cfc8bb8e8396] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:31:22 --> [REQ_ID=9650097a9d4d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:36:22 --> [REQ_ID=3c4cd15dcd50] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:41:22 --> [REQ_ID=822ae7bcbd7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:46:22 --> [REQ_ID=2b41e64745d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:51:22 --> [REQ_ID=d86e851d941f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 12:56:22 --> [REQ_ID=45b85a3aabd2] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 12:56:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 12:56:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 12:56:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [REQUEST][END]
INFO - 2026-03-29 13:00:01 --> [REQ_ID=39cbcb8e9067] [PERF] Execution time=0.050369
DEBUG - 2026-03-29 13:00:42 --> [REQ_ID=2186407760e9] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-29 13:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 13:00:43 --> [REQ_ID=2186407760e9] [REQUEST][END]
INFO - 2026-03-29 13:00:43 --> [REQ_ID=2186407760e9] [PERF] Execution time=0.015772
DEBUG - 2026-03-29 13:01:22 --> [REQ_ID=c68365944ea5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:06:22 --> [REQ_ID=775240cd4345] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:11:22 --> [REQ_ID=eff2312d1267] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [REQUEST][END]
INFO - 2026-03-29 13:15:01 --> [REQ_ID=6fd467217154] [PERF] Execution time=0.047437
DEBUG - 2026-03-29 13:16:22 --> [REQ_ID=6a2654985900] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:21:22 --> [REQ_ID=cdaf558ee09f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:26:22 --> [REQ_ID=0ed9ee62972e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:31:22 --> [REQ_ID=2948fd4a461b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:34:35 --> [REQ_ID=ae649f9b09bd] [REQUEST][START] GET /
DEBUG - 2026-03-29 13:34:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 13:34:35 --> [REQ_ID=ae649f9b09bd] [FILTER_BEFORE] /
DEBUG - 2026-03-29 13:34:35 --> [REQ_ID=ae649f9b09bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 13:34:35 --> [REQ_ID=ae649f9b09bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 13:34:35 --> [CSRF] token name=csrf_test_name hash=9fd3a8982ee703fb8cc353180fe82efc
DEBUG - 2026-03-29 13:34:35 --> [REQ_ID=e459d318cd74] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 13:34:35 --> [REQ_ID=e459d318cd74] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 13:34:35 --> [REQ_ID=e459d318cd74] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 13:34:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 13:34:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 13:34:36 --> [REQ_ID=e459d318cd74] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 13:34:36 --> [REQ_ID=e459d318cd74] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 13:34:36 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 13:34:36 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 13:34:36 --> [REQ_ID=ae649f9b09bd] [FILTER_AFTER]
DEBUG - 2026-03-29 13:34:36 --> [REQ_ID=ae649f9b09bd] [LIFECYCLE][END] status=200 duration_ms=649.36 memory_delta=4194304
INFO - 2026-03-29 13:34:36 --> [REQ_ID=e459d318cd74] [PERF] Execution time=0.647629
DEBUG - 2026-03-29 13:34:36 --> [REQ_ID=ae649f9b09bd] [REQUEST][END]
INFO - 2026-03-29 13:34:36 --> [REQ_ID=ae649f9b09bd] [PERF] Execution time=0.688664
DEBUG - 2026-03-29 13:36:22 --> [REQ_ID=a7c6138d5721] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:39:48 --> [REQ_ID=e42b289c7a5c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 13:39:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 13:39:48 --> [REQ_ID=e42b289c7a5c] [REQUEST][END]
INFO - 2026-03-29 13:39:48 --> [REQ_ID=e42b289c7a5c] [PERF] Execution time=0.042932
DEBUG - 2026-03-29 13:41:22 --> [REQ_ID=e45b408c1668] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:44:46 --> [REQ_ID=5c368c237b3b] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 13:44:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:44:46 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 13:44:46 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-29 13:44:46 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-29 13:46:22 --> [REQ_ID=4756f9228cd4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:51:22 --> [REQ_ID=ceea569116b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 13:56:22 --> [REQ_ID=9c14b1817f19] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [REQUEST][END]
INFO - 2026-03-29 14:00:01 --> [REQ_ID=76e286c1334d] [PERF] Execution time=0.046619
DEBUG - 2026-03-29 14:01:22 --> [REQ_ID=3b086f4fd1b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:06:22 --> [REQ_ID=0187e84fbb8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:11:22 --> [REQ_ID=12e80bf925fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [REQUEST][END]
INFO - 2026-03-29 14:15:01 --> [REQ_ID=37bba8666756] [PERF] Execution time=0.047120
DEBUG - 2026-03-29 14:16:22 --> [REQ_ID=3834dd5294e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:21:22 --> [REQ_ID=8eb2f8603a29] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:26:22 --> [REQ_ID=a5b7fdee078b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [REQUEST][START] GET /
DEBUG - 2026-03-29 14:26:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [FILTER_BEFORE] /
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 14:26:30 --> [CSRF] token name=csrf_test_name hash=861d6a73b2051519b57d70883713d872
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 14:26:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 14:26:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 14:26:30 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 14:26:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [FILTER_AFTER]
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [LIFECYCLE][END] status=200 duration_ms=671.22 memory_delta=4194304
INFO - 2026-03-29 14:26:30 --> [REQ_ID=88869bf194bc] [PERF] Execution time=0.669309
DEBUG - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [REQUEST][END]
INFO - 2026-03-29 14:26:30 --> [REQ_ID=d79090f6a58d] [PERF] Execution time=0.689511
DEBUG - 2026-03-29 14:26:39 --> [REQ_ID=26db5d8017bb] [REQUEST][START] GET /
DEBUG - 2026-03-29 14:26:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:26:39 --> [REQ_ID=26db5d8017bb] [FILTER_BEFORE] /
DEBUG - 2026-03-29 14:26:39 --> [REQ_ID=26db5d8017bb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 14:26:39 --> [REQ_ID=26db5d8017bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 14:26:39 --> [CSRF] token name=csrf_test_name hash=861d6a73b2051519b57d70883713d872
DEBUG - 2026-03-29 14:26:39 --> [REQ_ID=ac144c8ed722] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 14:26:39 --> [REQ_ID=ac144c8ed722] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 14:26:39 --> [REQ_ID=ac144c8ed722] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 14:26:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 14:26:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:26:40 --> [REQ_ID=ac144c8ed722] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 14:26:40 --> [REQ_ID=ac144c8ed722] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 14:26:40 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 14:26:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:26:40 --> [REQ_ID=26db5d8017bb] [FILTER_AFTER]
DEBUG - 2026-03-29 14:26:40 --> [REQ_ID=26db5d8017bb] [LIFECYCLE][END] status=200 duration_ms=547.61 memory_delta=2097152
INFO - 2026-03-29 14:26:40 --> [REQ_ID=ac144c8ed722] [PERF] Execution time=0.547343
DEBUG - 2026-03-29 14:26:40 --> [REQ_ID=26db5d8017bb] [REQUEST][END]
INFO - 2026-03-29 14:26:40 --> [REQ_ID=26db5d8017bb] [PERF] Execution time=0.557168
DEBUG - 2026-03-29 14:27:45 --> [REQ_ID=269507c063cf] [REQUEST][START] GET /
DEBUG - 2026-03-29 14:27:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:27:45 --> [REQ_ID=269507c063cf] [FILTER_BEFORE] /
DEBUG - 2026-03-29 14:27:45 --> [REQ_ID=269507c063cf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 14:27:45 --> [REQ_ID=269507c063cf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 14:27:45 --> [CSRF] token name=csrf_test_name hash=99d2178615987a23b9d502c2c7bd352c
DEBUG - 2026-03-29 14:27:45 --> [REQ_ID=8c62125eaa1e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 14:27:45 --> [REQ_ID=8c62125eaa1e] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 14:27:45 --> [REQ_ID=8c62125eaa1e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 14:27:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 14:27:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:27:46 --> [REQ_ID=8c62125eaa1e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 14:27:46 --> [REQ_ID=8c62125eaa1e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 14:27:46 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 14:27:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:27:46 --> [REQ_ID=269507c063cf] [FILTER_AFTER]
DEBUG - 2026-03-29 14:27:46 --> [REQ_ID=269507c063cf] [LIFECYCLE][END] status=200 duration_ms=656.94 memory_delta=4194304
INFO - 2026-03-29 14:27:46 --> [REQ_ID=8c62125eaa1e] [PERF] Execution time=0.654917
DEBUG - 2026-03-29 14:27:46 --> [REQ_ID=269507c063cf] [REQUEST][END]
INFO - 2026-03-29 14:27:46 --> [REQ_ID=269507c063cf] [PERF] Execution time=0.695949
DEBUG - 2026-03-29 14:31:22 --> [REQ_ID=4087e447783b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:36:22 --> [REQ_ID=218b1182841c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:38:40 --> [REQ_ID=2b29fb43c88f] [REQUEST][START] GET /
DEBUG - 2026-03-29 14:38:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 14:38:40 --> [REQ_ID=2b29fb43c88f] [FILTER_BEFORE] /
DEBUG - 2026-03-29 14:38:40 --> [REQ_ID=2b29fb43c88f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 14:38:40 --> [REQ_ID=2b29fb43c88f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 14:38:40 --> [CSRF] token name=csrf_test_name hash=8f0ad877be68ff417074b75073e1478c
DEBUG - 2026-03-29 14:38:40 --> [REQ_ID=0e102ffee90d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 14:38:40 --> [REQ_ID=0e102ffee90d] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 14:38:40 --> [REQ_ID=0e102ffee90d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 14:38:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 14:38:41 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 14:38:41 --> [REQ_ID=0e102ffee90d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 14:38:41 --> [REQ_ID=0e102ffee90d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 14:38:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 14:38:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 14:38:41 --> [REQ_ID=2b29fb43c88f] [FILTER_AFTER]
DEBUG - 2026-03-29 14:38:41 --> [REQ_ID=2b29fb43c88f] [LIFECYCLE][END] status=200 duration_ms=592.94 memory_delta=4194304
INFO - 2026-03-29 14:38:41 --> [REQ_ID=0e102ffee90d] [PERF] Execution time=0.591199
DEBUG - 2026-03-29 14:38:41 --> [REQ_ID=2b29fb43c88f] [REQUEST][END]
INFO - 2026-03-29 14:38:41 --> [REQ_ID=2b29fb43c88f] [PERF] Execution time=0.631782
DEBUG - 2026-03-29 14:41:22 --> [REQ_ID=89e3a332b3fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:46:22 --> [REQ_ID=8102e82a3fe3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:51:22 --> [REQ_ID=3016df7b7672] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 14:56:22 --> [REQ_ID=473a441ed5ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [REQUEST][END]
INFO - 2026-03-29 15:00:01 --> [REQ_ID=2dfd30bbb6c1] [PERF] Execution time=0.048908
DEBUG - 2026-03-29 15:01:22 --> [REQ_ID=be1a89366c28] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:06:22 --> [REQ_ID=48a065f62cb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:11:22 --> [REQ_ID=94acaf9ebf4c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 15:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [REQUEST][END]
INFO - 2026-03-29 15:15:02 --> [REQ_ID=f56b83f64be9] [PERF] Execution time=0.044950
DEBUG - 2026-03-29 15:16:22 --> [REQ_ID=33de693cfb3c] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [REQUEST][START] GET /
DEBUG - 2026-03-29 15:20:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [FILTER_BEFORE] /
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 15:20:41 --> [CSRF] token name=csrf_test_name hash=050f827511ab18e20719a85b36fcaf44
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 15:20:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 15:20:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 15:20:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 15:20:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [FILTER_AFTER]
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [LIFECYCLE][END] status=200 duration_ms=766.35 memory_delta=4194304
INFO - 2026-03-29 15:20:41 --> [REQ_ID=a51e68ee8f4a] [PERF] Execution time=0.764540
DEBUG - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [REQUEST][END]
INFO - 2026-03-29 15:20:41 --> [REQ_ID=c1cb861628bf] [PERF] Execution time=0.804815
DEBUG - 2026-03-29 15:21:22 --> [REQ_ID=0a1359cbf2bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:26:22 --> [REQ_ID=ea3cd08dbc15] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [REQUEST][START] GET /
DEBUG - 2026-03-29 15:30:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [FILTER_BEFORE] /
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 15:30:50 --> [CSRF] token name=csrf_test_name hash=ca1292840553039a8060d1edb584c7de
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 15:30:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 15:30:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 15:30:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 15:30:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [FILTER_AFTER]
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [LIFECYCLE][END] status=200 duration_ms=664.85 memory_delta=4194304
INFO - 2026-03-29 15:30:50 --> [REQ_ID=f83ee7d5efb2] [PERF] Execution time=0.662817
DEBUG - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [REQUEST][END]
INFO - 2026-03-29 15:30:50 --> [REQ_ID=6fb7afcfb89e] [PERF] Execution time=0.705948
DEBUG - 2026-03-29 15:31:22 --> [REQ_ID=78c510a37e27] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:36:22 --> [REQ_ID=8fe731dd7711] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:41:22 --> [REQ_ID=e479124a97f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:46:22 --> [REQ_ID=c32d85bbf9de] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:51:22 --> [REQ_ID=d66fbc19183e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 15:55:01 --> [REQ_ID=c3fb2192cc13] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-29 15:55:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 15:55:01 --> [REQ_ID=c3fb2192cc13] [REQUEST][END]
INFO - 2026-03-29 15:55:01 --> [REQ_ID=c3fb2192cc13] [PERF] Execution time=0.048297
DEBUG - 2026-03-29 15:56:22 --> [REQ_ID=2c2db1fcba61] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [REQUEST][END]
INFO - 2026-03-29 16:00:01 --> [REQ_ID=f08909284a61] [PERF] Execution time=0.046112
DEBUG - 2026-03-29 16:01:22 --> [REQ_ID=a19424f247a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:04:44 --> [REQ_ID=b8965b0eebfa] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-29 16:04:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:04:44 --> [REQ_ID=b8965b0eebfa] [REQUEST][END]
INFO - 2026-03-29 16:04:44 --> [REQ_ID=b8965b0eebfa] [PERF] Execution time=0.037711
DEBUG - 2026-03-29 16:06:22 --> [REQ_ID=2ab8aa3c6ed5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:11:22 --> [REQ_ID=aba0ac237e4d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [REQUEST][END]
INFO - 2026-03-29 16:15:01 --> [REQ_ID=758167284474] [PERF] Execution time=0.048436
DEBUG - 2026-03-29 16:16:22 --> [REQ_ID=4c71f6e72ca6] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:21:22 --> [REQ_ID=723e73252a23] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:26:22 --> [REQ_ID=89c7579595c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:31:22 --> [REQ_ID=e4a1540827d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:36:22 --> [REQ_ID=4124de3bf7cc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:41:22 --> [REQ_ID=5b4013f3b259] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-29 16:41:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-29 16:41:40 --> [CSRF] token name=csrf_test_name hash=e9f8cc93672bb148593c4c517d9c13e6
DEBUG - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [REQUEST][END]
INFO - 2026-03-29 16:41:40 --> [REQ_ID=5650c544c857] [PERF] Execution time=0.030883
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 16:41:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 16:41:41 --> [CSRF] token name=csrf_test_name hash=dde96136bdd29d1ee91810d5c4848fff
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=69fcfef77d67] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 16:41:41 --> [REQ_ID=69fcfef77d67] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [FILTER_AFTER]
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [LIFECYCLE][END] status=200 duration_ms=108.49 memory_delta=0
INFO - 2026-03-29 16:41:41 --> [REQ_ID=69fcfef77d67] [PERF] Execution time=0.108507
DEBUG - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [REQUEST][END]
INFO - 2026-03-29 16:41:41 --> [REQ_ID=c2da7b9b5836] [PERF] Execution time=0.120619
DEBUG - 2026-03-29 16:46:22 --> [REQ_ID=9229f9333388] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:46:40 --> [REQ_ID=b9c5a53b26cc] [REQUEST][START] GET /
DEBUG - 2026-03-29 16:46:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:46:40 --> [REQ_ID=b9c5a53b26cc] [FILTER_BEFORE] /
DEBUG - 2026-03-29 16:46:40 --> [REQ_ID=b9c5a53b26cc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 16:46:40 --> [REQ_ID=b9c5a53b26cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 16:46:40 --> [CSRF] token name=csrf_test_name hash=a8535db7a5af47d4c7e03f6b740e8aab
DEBUG - 2026-03-29 16:46:40 --> [REQ_ID=5965a9510d70] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 16:46:40 --> [REQ_ID=5965a9510d70] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 16:46:40 --> [REQ_ID=5965a9510d70] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 16:46:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 16:46:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 16:46:41 --> [REQ_ID=5965a9510d70] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 16:46:41 --> [REQ_ID=5965a9510d70] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 16:46:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 16:46:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 16:46:41 --> [REQ_ID=b9c5a53b26cc] [FILTER_AFTER]
DEBUG - 2026-03-29 16:46:41 --> [REQ_ID=b9c5a53b26cc] [LIFECYCLE][END] status=200 duration_ms=732.76 memory_delta=4194304
INFO - 2026-03-29 16:46:41 --> [REQ_ID=5965a9510d70] [PERF] Execution time=0.731136
DEBUG - 2026-03-29 16:46:41 --> [REQ_ID=b9c5a53b26cc] [REQUEST][END]
INFO - 2026-03-29 16:46:41 --> [REQ_ID=b9c5a53b26cc] [PERF] Execution time=0.751870
DEBUG - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 16:51:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 16:51:01 --> [CSRF] token name=csrf_test_name hash=1376084d072d2b753ee4c9815ef9b80a
DEBUG - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [REQUEST][END]
INFO - 2026-03-29 16:51:01 --> [REQ_ID=e8bd612b3794] [PERF] Execution time=0.058578
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 16:51:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 16:51:02 --> [CSRF] token name=csrf_test_name hash=c979aced0a0b04709cb64eef707c0f1c
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=39ba674f21b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 16:51:02 --> [REQ_ID=39ba674f21b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [FILTER_AFTER]
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [LIFECYCLE][END] status=200 duration_ms=164.41 memory_delta=0
INFO - 2026-03-29 16:51:02 --> [REQ_ID=39ba674f21b2] [PERF] Execution time=0.164224
DEBUG - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [REQUEST][END]
INFO - 2026-03-29 16:51:02 --> [REQ_ID=259b30a3241a] [PERF] Execution time=0.176236
DEBUG - 2026-03-29 16:51:22 --> [REQ_ID=e8a40034d764] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 16:56:22 --> [REQ_ID=e3a53fb2fd7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [REQUEST][END]
INFO - 2026-03-29 17:00:01 --> [REQ_ID=dcf03b1c18c2] [PERF] Execution time=0.040688
DEBUG - 2026-03-29 17:01:22 --> [REQ_ID=166123f577c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 17:03:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 17:03:20 --> [CSRF] token name=csrf_test_name hash=1353d0775cf352d5ff228eca25b8cf01
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [REQUEST][END]
INFO - 2026-03-29 17:03:20 --> [REQ_ID=6c52f53a7f21] [PERF] Execution time=0.060101
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=5e7102898b43] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 17:03:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=5e7102898b43] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=5e7102898b43] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=5e7102898b43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 17:03:20 --> [CSRF] token name=csrf_test_name hash=a6e1360a56bf625bb7eec728d53f43d6
DEBUG - 2026-03-29 17:03:20 --> [REQ_ID=f378863356c8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 17:03:20 --> [REQ_ID=f378863356c8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 17:03:21 --> [REQ_ID=5e7102898b43] [FILTER_AFTER]
DEBUG - 2026-03-29 17:03:21 --> [REQ_ID=5e7102898b43] [LIFECYCLE][END] status=200 duration_ms=184.79 memory_delta=0
INFO - 2026-03-29 17:03:21 --> [REQ_ID=f378863356c8] [PERF] Execution time=0.184733
DEBUG - 2026-03-29 17:03:21 --> [REQ_ID=5e7102898b43] [REQUEST][END]
INFO - 2026-03-29 17:03:21 --> [REQ_ID=5e7102898b43] [PERF] Execution time=0.197016
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-29 17:03:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-29 17:03:28 --> [CSRF] token name=csrf_test_name hash=b25bf05a2ce86bc8bd65bdfe83680bf9
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [METHOD_ENTRY] index
DEBUG - 2026-03-29 17:03:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 17:03:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 17:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 17:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 17:03:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 17:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 17:03:28 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [FILTER_AFTER]
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [LIFECYCLE][END] status=200 duration_ms=313.02 memory_delta=2097152
INFO - 2026-03-29 17:03:28 --> [REQ_ID=75d81f09f5a0] [PERF] Execution time=0.312821
DEBUG - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [REQUEST][END]
INFO - 2026-03-29 17:03:28 --> [REQ_ID=e7144816c5ec] [PERF] Execution time=0.323390
DEBUG - 2026-03-29 17:06:22 --> [REQ_ID=3bff423b21b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:10:32 --> [REQ_ID=1c4a7b84cf4e] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 17:10:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:10:32 --> [REQ_ID=1c4a7b84cf4e] [REQUEST][END]
INFO - 2026-03-29 17:10:32 --> [REQ_ID=1c4a7b84cf4e] [PERF] Execution time=0.057235
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [REQUEST][START] GET /
DEBUG - 2026-03-29 17:10:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [FILTER_BEFORE] /
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 17:10:38 --> [CSRF] token name=csrf_test_name hash=1dc4109a3a0b4ab02230c115e6b3ba1c
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 17:10:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 17:10:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 17:10:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 17:10:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [FILTER_AFTER]
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [LIFECYCLE][END] status=200 duration_ms=735.00 memory_delta=4194304
INFO - 2026-03-29 17:10:38 --> [REQ_ID=303266b61ffa] [PERF] Execution time=0.733023
DEBUG - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [REQUEST][END]
INFO - 2026-03-29 17:10:38 --> [REQ_ID=a5f8253c4e8b] [PERF] Execution time=0.745881
DEBUG - 2026-03-29 17:11:22 --> [REQ_ID=710ac6ccead0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [REQUEST][END]
INFO - 2026-03-29 17:15:01 --> [REQ_ID=6379104ef466] [PERF] Execution time=0.048601
DEBUG - 2026-03-29 17:16:22 --> [REQ_ID=e9654952a7c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:21:22 --> [REQ_ID=e963c7224f2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:26:22 --> [REQ_ID=5ce9ecf402aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:31:22 --> [REQ_ID=6d81ef70fafa] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:36:22 --> [REQ_ID=2f40e761c8ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-29 17:40:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-29 17:40:41 --> [CSRF] token name=csrf_test_name hash=8adebe79ae2e5352fea538e950e19059
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [REQUEST][END]
INFO - 2026-03-29 17:40:41 --> [REQ_ID=ecd9cb076c09] [PERF] Execution time=0.047551
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 17:40:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 17:40:41 --> [CSRF] token name=csrf_test_name hash=45d14bc52aff56d597007e8f108c0f1c
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=3773da1ed2bc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 17:40:41 --> [REQ_ID=3773da1ed2bc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [FILTER_AFTER]
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [LIFECYCLE][END] status=200 duration_ms=112.16 memory_delta=0
INFO - 2026-03-29 17:40:41 --> [REQ_ID=3773da1ed2bc] [PERF] Execution time=0.111949
DEBUG - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [REQUEST][END]
INFO - 2026-03-29 17:40:41 --> [REQ_ID=206b7a9f0025] [PERF] Execution time=0.127091
DEBUG - 2026-03-29 17:41:22 --> [REQ_ID=4a812a7c3b25] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 17:45:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 17:45:01 --> [CSRF] token name=csrf_test_name hash=5b7a81788f62997a446f136881d40620
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=c352fd3118d7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 17:45:01 --> [REQ_ID=c352fd3118d7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=c352fd3118d7] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-29 17:45:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 17:45:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 17:45:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 17:45:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 17:45:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 17:45:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 17:45:01 --> [REQ_ID=c352fd3118d7] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 17:45:01 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 17:45:01 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [FILTER_AFTER]
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [LIFECYCLE][END] status=200 duration_ms=724.13 memory_delta=4194304
INFO - 2026-03-29 17:45:01 --> [REQ_ID=c352fd3118d7] [PERF] Execution time=0.722252
DEBUG - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [REQUEST][END]
INFO - 2026-03-29 17:45:01 --> [REQ_ID=9f161a77589b] [PERF] Execution time=0.766205
DEBUG - 2026-03-29 17:46:22 --> [REQ_ID=b596c7a7ca9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:51:22 --> [REQ_ID=63785b8bde61] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-29 17:54:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-29 17:54:00 --> [CSRF] token name=csrf_test_name hash=422bdd573b043f727d4a7c60648ace01
DEBUG - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [REQUEST][END]
INFO - 2026-03-29 17:54:00 --> [REQ_ID=ac6f62fc11c8] [PERF] Execution time=0.056041
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 17:54:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 17:54:03 --> [CSRF] token name=csrf_test_name hash=58b10832f6d211398d546e72adff0bd6
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=a1f773046d23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 17:54:03 --> [REQ_ID=a1f773046d23] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [FILTER_AFTER]
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [LIFECYCLE][END] status=200 duration_ms=111.81 memory_delta=0
INFO - 2026-03-29 17:54:03 --> [REQ_ID=a1f773046d23] [PERF] Execution time=0.111570
DEBUG - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [REQUEST][END]
INFO - 2026-03-29 17:54:03 --> [REQ_ID=115c083effc5] [PERF] Execution time=0.123686
DEBUG - 2026-03-29 17:56:22 --> [REQ_ID=a2e1c0089618] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [REQUEST][END]
INFO - 2026-03-29 18:00:02 --> [REQ_ID=647ac11de00d] [PERF] Execution time=0.057353
DEBUG - 2026-03-29 18:01:22 --> [REQ_ID=3674780a4ee1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=0c191023eb5f] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-29 18:03:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=0c191023eb5f] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=0c191023eb5f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=0c191023eb5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-29 18:03:05 --> [CSRF] token name=csrf_test_name hash=0981bd81eacea42d898230817a2d9ea3
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=63ea7bad9c76] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 18:03:05 --> [REQ_ID=63ea7bad9c76] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 18:03:05 --> [REQ_ID=63ea7bad9c76] [METHOD_ENTRY] index
DEBUG - 2026-03-29 18:03:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 18:03:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 18:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 18:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 18:03:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 18:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 18:03:05 --> HowItWorksController failure: overview
CRITICAL - 2026-03-29 18:03:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:03:05 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:03:05 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-29 18:03:05 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
ERROR - 2026-03-29 18:03:05 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-29 18:03:05 --> [REQ_ID=63ea7bad9c76] [PERF] Execution time=0.107875
DEBUG - 2026-03-29 18:06:22 --> [REQ_ID=4ba8ecf2bee4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:11:22 --> [REQ_ID=6657299b2463] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:13:22 --> [REQ_ID=00913fc9d3ab] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 18:13:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:13:22 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 18:13:22 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-29 18:13:22 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [REQUEST][END]
INFO - 2026-03-29 18:15:01 --> [REQ_ID=209fe0a0fdd1] [PERF] Execution time=0.045852
DEBUG - 2026-03-29 18:16:22 --> [REQ_ID=d1af471503c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:21:22 --> [REQ_ID=f770820a1589] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:26:22 --> [REQ_ID=1e06431f6bdb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:31:22 --> [REQ_ID=179b4b06d128] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 18:34:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 18:34:05 --> [CSRF] token name=csrf_test_name hash=5802e71a7fe507fcef3fad151ff7c210
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [METHOD_ENTRY] index
DEBUG - 2026-03-29 18:34:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 18:34:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 18:34:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 18:34:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 18:34:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 18:34:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 18:34:05 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [FILTER_AFTER]
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [LIFECYCLE][END] status=200 duration_ms=247.12 memory_delta=0
INFO - 2026-03-29 18:34:05 --> [REQ_ID=d12cea8dbfdb] [PERF] Execution time=0.245207
DEBUG - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [REQUEST][END]
INFO - 2026-03-29 18:34:05 --> [REQ_ID=d52cb0c68409] [PERF] Execution time=0.288094
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-29 18:35:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-29 18:35:20 --> [CSRF] token name=csrf_test_name hash=a72d0c0e7382f75add8a0e20d430eb8e
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [REQUEST][END]
INFO - 2026-03-29 18:35:20 --> [REQ_ID=2b07f2cf0990] [PERF] Execution time=0.016224
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 18:35:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 18:35:20 --> [CSRF] token name=csrf_test_name hash=e63ffda533a29a4a9664a112654a1b60
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=2896642d25a8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 18:35:20 --> [REQ_ID=2896642d25a8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [FILTER_AFTER]
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [LIFECYCLE][END] status=200 duration_ms=41.78 memory_delta=0
INFO - 2026-03-29 18:35:20 --> [REQ_ID=2896642d25a8] [PERF] Execution time=0.041483
DEBUG - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [REQUEST][END]
INFO - 2026-03-29 18:35:20 --> [REQ_ID=156ec9d26fe4] [PERF] Execution time=0.053319
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=ea4e102d968d] [REQUEST][START] GET /
DEBUG - 2026-03-29 18:35:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=ea4e102d968d] [REQUEST][END]
INFO - 2026-03-29 18:35:41 --> [REQ_ID=ea4e102d968d] [PERF] Execution time=0.009586
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=c9a0242d5200] [REQUEST][START] GET /
DEBUG - 2026-03-29 18:35:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=c9a0242d5200] [FILTER_BEFORE] /
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=c9a0242d5200] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=c9a0242d5200] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 18:35:41 --> [CSRF] token name=csrf_test_name hash=2a704215c9942346f175e1bc2ba3aa93
DEBUG - 2026-03-29 18:35:41 --> [REQ_ID=2a3680946a7c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 18:35:41 --> [REQ_ID=2a3680946a7c] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 18:35:41 --> [REQ_ID=2a3680946a7c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 18:35:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 18:35:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 18:35:42 --> [REQ_ID=2a3680946a7c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 18:35:42 --> [REQ_ID=2a3680946a7c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 18:35:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 18:35:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 18:35:42 --> [REQ_ID=c9a0242d5200] [FILTER_AFTER]
DEBUG - 2026-03-29 18:35:42 --> [REQ_ID=c9a0242d5200] [LIFECYCLE][END] status=200 duration_ms=701.24 memory_delta=4194304
INFO - 2026-03-29 18:35:42 --> [REQ_ID=2a3680946a7c] [PERF] Execution time=0.701073
DEBUG - 2026-03-29 18:35:42 --> [REQ_ID=c9a0242d5200] [REQUEST][END]
INFO - 2026-03-29 18:35:42 --> [REQ_ID=c9a0242d5200] [PERF] Execution time=0.710027
DEBUG - 2026-03-29 18:35:54 --> [REQ_ID=57264be93a4b] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 18:35:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:35:54 --> [REQ_ID=57264be93a4b] [REQUEST][END]
INFO - 2026-03-29 18:35:54 --> [REQ_ID=57264be93a4b] [PERF] Execution time=0.010423
DEBUG - 2026-03-29 18:36:22 --> [REQ_ID=1092b1b5f9fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:41:22 --> [REQ_ID=959bf667f606] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-29 18:44:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-29 18:44:46 --> [CSRF] token name=csrf_test_name hash=3ef35d7101027b83533c2f9e19db78f7
DEBUG - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [REQUEST][END]
INFO - 2026-03-29 18:44:46 --> [REQ_ID=3b93e67252bb] [PERF] Execution time=0.047393
DEBUG - 2026-03-29 18:44:49 --> [REQ_ID=1fb7c07b76d9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 18:44:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:44:49 --> [REQ_ID=1fb7c07b76d9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 18:44:49 --> [REQ_ID=1fb7c07b76d9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 18:44:49 --> [REQ_ID=1fb7c07b76d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 18:44:49 --> [CSRF] token name=csrf_test_name hash=aaab5996f9286ce965484931fd36087d
DEBUG - 2026-03-29 18:44:49 --> [REQ_ID=6f865e045d95] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 18:44:49 --> [REQ_ID=6f865e045d95] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 18:44:50 --> [REQ_ID=1fb7c07b76d9] [FILTER_AFTER]
DEBUG - 2026-03-29 18:44:50 --> [REQ_ID=1fb7c07b76d9] [LIFECYCLE][END] status=200 duration_ms=113.36 memory_delta=0
INFO - 2026-03-29 18:44:50 --> [REQ_ID=6f865e045d95] [PERF] Execution time=0.113161
DEBUG - 2026-03-29 18:44:50 --> [REQ_ID=1fb7c07b76d9] [REQUEST][END]
INFO - 2026-03-29 18:44:50 --> [REQ_ID=1fb7c07b76d9] [PERF] Execution time=0.128269
DEBUG - 2026-03-29 18:46:22 --> [REQ_ID=ca3c21473290] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:51:22 --> [REQ_ID=2a4bb478f297] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-29 18:53:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 18:53:57 --> [CSRF] token name=csrf_test_name hash=b7d1b47a0352930625e2c6dcd15028c3
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 18:53:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 18:53:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 18:53:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 18:53:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [FILTER_AFTER]
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [LIFECYCLE][END] status=200 duration_ms=641.36 memory_delta=4194304
INFO - 2026-03-29 18:53:57 --> [REQ_ID=f75d927f67af] [PERF] Execution time=0.639414
DEBUG - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [REQUEST][END]
INFO - 2026-03-29 18:53:57 --> [REQ_ID=d87477778da5] [PERF] Execution time=0.682035
DEBUG - 2026-03-29 18:56:22 --> [REQ_ID=ccbb4fa7d1e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-29 18:59:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-29 18:59:51 --> [CSRF] token name=csrf_test_name hash=67805bf7db0611148ab267f1a462773c
DEBUG - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [REQUEST][END]
INFO - 2026-03-29 18:59:51 --> [REQ_ID=10df10ce5b01] [PERF] Execution time=0.052968
DEBUG - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [REQUEST][END]
INFO - 2026-03-29 19:00:01 --> [REQ_ID=250d4e97d32c] [PERF] Execution time=0.015470
DEBUG - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-29 19:00:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-29 19:00:03 --> [CSRF] token name=csrf_test_name hash=30dfb66247e6aa9936feabc6d2f6458f
DEBUG - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [REQUEST][END]
INFO - 2026-03-29 19:00:03 --> [REQ_ID=d5891d324512] [PERF] Execution time=0.010214
DEBUG - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-29 19:00:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-29 19:00:16 --> [CSRF] token name=csrf_test_name hash=9888ec344bdebfa656aaad42d3072c02
DEBUG - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [REQUEST][END]
INFO - 2026-03-29 19:00:16 --> [REQ_ID=947cf693ab9a] [PERF] Execution time=0.012860
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=472002c98386] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 19:00:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=472002c98386] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=472002c98386] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=472002c98386] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 19:00:28 --> [CSRF] token name=csrf_test_name hash=494f1646a8b2d460ccef90dce5701fbe
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=662779c22e14] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:00:28 --> [REQ_ID=662779c22e14] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:00:28 --> [REQ_ID=662779c22e14] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-29 19:00:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:00:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:00:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:00:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:00:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:00:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:00:28 --> [REQ_ID=662779c22e14] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:00:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:00:29 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-29 19:00:29 --> [REQ_ID=472002c98386] [FILTER_AFTER]
DEBUG - 2026-03-29 19:00:29 --> [REQ_ID=472002c98386] [LIFECYCLE][END] status=200 duration_ms=701.06 memory_delta=4194304
INFO - 2026-03-29 19:00:29 --> [REQ_ID=662779c22e14] [PERF] Execution time=0.700279
DEBUG - 2026-03-29 19:00:29 --> [REQ_ID=472002c98386] [REQUEST][END]
INFO - 2026-03-29 19:00:29 --> [REQ_ID=472002c98386] [PERF] Execution time=0.712208
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=7b274b67b135] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 19:00:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=7b274b67b135] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=7b274b67b135] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=7b274b67b135] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 19:00:41 --> [CSRF] token name=csrf_test_name hash=04867e76b3cbd43e607602b4fab2f3c3
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=d8e51218baa6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:00:41 --> [REQ_ID=d8e51218baa6] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:00:41 --> [REQ_ID=d8e51218baa6] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-29 19:00:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:00:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:00:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:00:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:00:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:00:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:00:41 --> [REQ_ID=d8e51218baa6] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:00:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:00:42 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-29 19:00:42 --> [REQ_ID=7b274b67b135] [FILTER_AFTER]
DEBUG - 2026-03-29 19:00:42 --> [REQ_ID=7b274b67b135] [LIFECYCLE][END] status=200 duration_ms=584.78 memory_delta=2097152
INFO - 2026-03-29 19:00:42 --> [REQ_ID=d8e51218baa6] [PERF] Execution time=0.583237
DEBUG - 2026-03-29 19:00:42 --> [REQ_ID=7b274b67b135] [REQUEST][END]
INFO - 2026-03-29 19:00:42 --> [REQ_ID=7b274b67b135] [PERF] Execution time=0.595297
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=98569f3856d6] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 19:00:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=98569f3856d6] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=98569f3856d6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=98569f3856d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 19:00:54 --> [CSRF] token name=csrf_test_name hash=bfbf21bc53f708c3f4f97efbdf4b09da
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=21bfb040f009] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:00:54 --> [REQ_ID=21bfb040f009] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:00:54 --> [REQ_ID=21bfb040f009] [METHOD_ENTRY] show
DEBUG - 2026-03-29 19:00:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:00:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:00:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:00:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:00:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:00:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:00:54 --> [REQ_ID=21bfb040f009] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:00:55 --> [REQ_ID=98569f3856d6] [FILTER_AFTER]
DEBUG - 2026-03-29 19:00:55 --> [REQ_ID=98569f3856d6] [LIFECYCLE][END] status=200 duration_ms=554.84 memory_delta=2097152
INFO - 2026-03-29 19:00:55 --> [REQ_ID=21bfb040f009] [PERF] Execution time=0.554603
DEBUG - 2026-03-29 19:00:55 --> [REQ_ID=98569f3856d6] [REQUEST][END]
INFO - 2026-03-29 19:00:55 --> [REQ_ID=98569f3856d6] [PERF] Execution time=0.565385
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=ddf9a60a25bb] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 19:01:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=ddf9a60a25bb] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=ddf9a60a25bb] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=ddf9a60a25bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 19:01:07 --> [CSRF] token name=csrf_test_name hash=22170cb0225547a3ad692d2f5882204c
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=be5f214bfd46] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:01:07 --> [REQ_ID=be5f214bfd46] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:01:07 --> [REQ_ID=be5f214bfd46] [METHOD_ENTRY] show
DEBUG - 2026-03-29 19:01:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:01:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:01:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:01:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:01:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:01:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:01:07 --> [REQ_ID=be5f214bfd46] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:01:08 --> [REQ_ID=ddf9a60a25bb] [FILTER_AFTER]
DEBUG - 2026-03-29 19:01:08 --> [REQ_ID=ddf9a60a25bb] [LIFECYCLE][END] status=200 duration_ms=549.94 memory_delta=2097152
INFO - 2026-03-29 19:01:08 --> [REQ_ID=be5f214bfd46] [PERF] Execution time=0.549539
DEBUG - 2026-03-29 19:01:08 --> [REQ_ID=ddf9a60a25bb] [REQUEST][END]
INFO - 2026-03-29 19:01:08 --> [REQ_ID=ddf9a60a25bb] [PERF] Execution time=0.559906
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=23d482d447ea] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 19:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=23d482d447ea] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=23d482d447ea] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=23d482d447ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 19:01:20 --> [CSRF] token name=csrf_test_name hash=88d0e320e697c8e10645907e61cf1eff
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=e3fd4ac26d61] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:01:20 --> [REQ_ID=e3fd4ac26d61] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:01:20 --> [REQ_ID=e3fd4ac26d61] [METHOD_ENTRY] show
DEBUG - 2026-03-29 19:01:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:01:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:01:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:01:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:01:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:01:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:01:20 --> [REQ_ID=e3fd4ac26d61] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:01:21 --> [REQ_ID=23d482d447ea] [FILTER_AFTER]
DEBUG - 2026-03-29 19:01:21 --> [REQ_ID=23d482d447ea] [LIFECYCLE][END] status=200 duration_ms=575.77 memory_delta=2097152
INFO - 2026-03-29 19:01:21 --> [REQ_ID=e3fd4ac26d61] [PERF] Execution time=0.575033
DEBUG - 2026-03-29 19:01:21 --> [REQ_ID=23d482d447ea] [REQUEST][END]
INFO - 2026-03-29 19:01:21 --> [REQ_ID=23d482d447ea] [PERF] Execution time=0.585886
DEBUG - 2026-03-29 19:01:22 --> [REQ_ID=868543a76043] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=59f6dfa93e72] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 19:01:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=59f6dfa93e72] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=59f6dfa93e72] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=59f6dfa93e72] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 19:01:33 --> [CSRF] token name=csrf_test_name hash=f762b544ccebbf0fec8ec76f9bc411c5
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=57b7de70a04e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:01:33 --> [REQ_ID=57b7de70a04e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:01:33 --> [REQ_ID=57b7de70a04e] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-29 19:01:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:01:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:01:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:01:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:01:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:01:33 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:01:33 --> [REQ_ID=57b7de70a04e] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:01:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:01:34 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-29 19:01:34 --> [REQ_ID=59f6dfa93e72] [FILTER_AFTER]
DEBUG - 2026-03-29 19:01:34 --> [REQ_ID=59f6dfa93e72] [LIFECYCLE][END] status=200 duration_ms=669.40 memory_delta=2097152
INFO - 2026-03-29 19:01:34 --> [REQ_ID=57b7de70a04e] [PERF] Execution time=0.669009
DEBUG - 2026-03-29 19:01:34 --> [REQ_ID=59f6dfa93e72] [REQUEST][END]
INFO - 2026-03-29 19:01:34 --> [REQ_ID=59f6dfa93e72] [PERF] Execution time=0.680146
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=98041127f755] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 19:01:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=98041127f755] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=98041127f755] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=98041127f755] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 19:01:46 --> [CSRF] token name=csrf_test_name hash=21ada048222fe8a18e49bcf7c3d83494
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=a63ae3b5586c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:01:46 --> [REQ_ID=a63ae3b5586c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:01:46 --> [REQ_ID=a63ae3b5586c] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-29 19:01:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:01:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:01:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:01:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:01:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:01:46 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:01:46 --> [REQ_ID=a63ae3b5586c] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:01:47 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:01:47 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-29 19:01:47 --> [REQ_ID=98041127f755] [FILTER_AFTER]
DEBUG - 2026-03-29 19:01:47 --> [REQ_ID=98041127f755] [LIFECYCLE][END] status=200 duration_ms=581.26 memory_delta=2097152
INFO - 2026-03-29 19:01:47 --> [REQ_ID=a63ae3b5586c] [PERF] Execution time=0.580846
DEBUG - 2026-03-29 19:01:47 --> [REQ_ID=98041127f755] [REQUEST][END]
INFO - 2026-03-29 19:01:47 --> [REQ_ID=98041127f755] [PERF] Execution time=0.591429
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=8dafc40e0e7a] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 19:01:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=8dafc40e0e7a] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=8dafc40e0e7a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=8dafc40e0e7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 19:01:59 --> [CSRF] token name=csrf_test_name hash=03f9fc7f0cbf3d33cf5ca15979417e6a
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=ef6017d448df] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:01:59 --> [REQ_ID=ef6017d448df] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:01:59 --> [REQ_ID=ef6017d448df] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-29 19:01:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:01:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:01:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:01:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:01:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:01:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:01:59 --> [REQ_ID=ef6017d448df] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:02:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:02:00 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-29 19:02:00 --> [REQ_ID=8dafc40e0e7a] [FILTER_AFTER]
DEBUG - 2026-03-29 19:02:00 --> [REQ_ID=8dafc40e0e7a] [LIFECYCLE][END] status=200 duration_ms=580.06 memory_delta=2097152
INFO - 2026-03-29 19:02:00 --> [REQ_ID=ef6017d448df] [PERF] Execution time=0.579495
DEBUG - 2026-03-29 19:02:00 --> [REQ_ID=8dafc40e0e7a] [REQUEST][END]
INFO - 2026-03-29 19:02:00 --> [REQ_ID=8dafc40e0e7a] [PERF] Execution time=0.590811
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=1e76b80e0417] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 19:02:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=1e76b80e0417] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=1e76b80e0417] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=1e76b80e0417] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 19:02:12 --> [CSRF] token name=csrf_test_name hash=edf4344db358d21aa0a1b4065f1498a6
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=855e9185798b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 19:02:12 --> [REQ_ID=855e9185798b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:02:12 --> [REQ_ID=855e9185798b] [METHOD_ENTRY] show
DEBUG - 2026-03-29 19:02:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:02:12 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:02:12 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:02:12 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:02:12 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:02:12 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 19:02:12 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-29 19:02:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:02:12 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:02:12 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-29 19:02:12 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-29 19:02:12 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-29 19:02:12 --> [REQ_ID=855e9185798b] [PERF] Execution time=0.183683
DEBUG - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-29 19:05:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-29 19:05:25 --> [CSRF] token name=csrf_test_name hash=96db95a43d998d5f20fa1510572addc4
DEBUG - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [REQUEST][END]
INFO - 2026-03-29 19:05:25 --> [REQ_ID=453468ff1c8c] [PERF] Execution time=0.054757
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:05:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:05:26 --> [CSRF] token name=csrf_test_name hash=36a65dd8e5e8e9155d922ded4210d257
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=e9f067f9eb73] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:05:26 --> [REQ_ID=e9f067f9eb73] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [FILTER_AFTER]
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [LIFECYCLE][END] status=200 duration_ms=58.19 memory_delta=0
INFO - 2026-03-29 19:05:26 --> [REQ_ID=e9f067f9eb73] [PERF] Execution time=0.057968
DEBUG - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [REQUEST][END]
INFO - 2026-03-29 19:05:26 --> [REQ_ID=101696fb7602] [PERF] Execution time=0.067955
DEBUG - 2026-03-29 19:06:22 --> [REQ_ID=1774e2f39383] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:11:22 --> [REQ_ID=7255a9e2fc26] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-29 19:12:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-29 19:12:58 --> [CSRF] token name=csrf_test_name hash=70be58e5804939e4de201de7199ce585
DEBUG - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [REQUEST][END]
INFO - 2026-03-29 19:12:58 --> [REQ_ID=a40390801c37] [PERF] Execution time=0.054573
DEBUG - 2026-03-29 19:12:59 --> [REQ_ID=dc7d5dfe8bfb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:12:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:12:59 --> [REQ_ID=dc7d5dfe8bfb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:12:59 --> [REQ_ID=dc7d5dfe8bfb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:12:59 --> [REQ_ID=dc7d5dfe8bfb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:12:59 --> [CSRF] token name=csrf_test_name hash=0ca2b33cc62099dd8009335f662f7414
DEBUG - 2026-03-29 19:12:59 --> [REQ_ID=f27f91e5c332] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:12:59 --> [REQ_ID=f27f91e5c332] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:13:00 --> [REQ_ID=dc7d5dfe8bfb] [FILTER_AFTER]
DEBUG - 2026-03-29 19:13:00 --> [REQ_ID=dc7d5dfe8bfb] [LIFECYCLE][END] status=200 duration_ms=106.60 memory_delta=0
INFO - 2026-03-29 19:13:00 --> [REQ_ID=f27f91e5c332] [PERF] Execution time=0.106370
DEBUG - 2026-03-29 19:13:00 --> [REQ_ID=dc7d5dfe8bfb] [REQUEST][END]
INFO - 2026-03-29 19:13:00 --> [REQ_ID=dc7d5dfe8bfb] [PERF] Execution time=0.118403
DEBUG - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [REQUEST][END]
INFO - 2026-03-29 19:15:02 --> [REQ_ID=14005711a117] [PERF] Execution time=0.045205
DEBUG - 2026-03-29 19:16:22 --> [REQ_ID=5ca8a7168460] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:21:22 --> [REQ_ID=b0c7416e15f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:23:01 --> [REQ_ID=393996f27ee7] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 19:23:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:23:01 --> [REQ_ID=393996f27ee7] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 19:23:01 --> [REQ_ID=393996f27ee7] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-29 19:23:01 --> [REQ_ID=393996f27ee7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 19:23:01 --> [CSRF] token name=csrf_test_name hash=d885521b557d6d68fa30838c03a8f448
DEBUG - 2026-03-29 19:23:02 --> [REQ_ID=393996f27ee7] [REQUEST][END]
INFO - 2026-03-29 19:23:02 --> [REQ_ID=393996f27ee7] [PERF] Execution time=0.064054
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:23:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:23:04 --> [CSRF] token name=csrf_test_name hash=630a2a7d5780894c23e114b69df65136
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=ba469c1dcc5f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:23:04 --> [REQ_ID=ba469c1dcc5f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [FILTER_AFTER]
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [LIFECYCLE][END] status=200 duration_ms=134.35 memory_delta=0
INFO - 2026-03-29 19:23:04 --> [REQ_ID=ba469c1dcc5f] [PERF] Execution time=0.134290
DEBUG - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [REQUEST][END]
INFO - 2026-03-29 19:23:04 --> [REQ_ID=e0b8a0f637f0] [PERF] Execution time=0.148202
DEBUG - 2026-03-29 19:26:22 --> [REQ_ID=86606d8fbc03] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:28:36 --> [REQ_ID=85385cd046a8] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:28:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:28:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:28:36 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:28:36 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:28:36 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-29 19:31:22 --> [REQ_ID=f3f9e1ee4bff] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-29 19:32:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-29 19:32:56 --> [CSRF] token name=csrf_test_name hash=168581808781c19fe18c84c1cef8a3e0
DEBUG - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [REQUEST][END]
INFO - 2026-03-29 19:32:56 --> [REQ_ID=0f9d04b266a2] [PERF] Execution time=0.051917
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:33:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:33:01 --> [CSRF] token name=csrf_test_name hash=f6cfc833cd7e30b41c299b917903253d
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=efb8de83a788] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:33:01 --> [REQ_ID=efb8de83a788] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [FILTER_AFTER]
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [LIFECYCLE][END] status=200 duration_ms=39.83 memory_delta=0
INFO - 2026-03-29 19:33:01 --> [REQ_ID=efb8de83a788] [PERF] Execution time=0.039556
DEBUG - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [REQUEST][END]
INFO - 2026-03-29 19:33:01 --> [REQ_ID=1f349750e088] [PERF] Execution time=0.056099
DEBUG - 2026-03-29 19:36:22 --> [REQ_ID=a94f1f1a882f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:41:22 --> [REQ_ID=8553150aed00] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:45:49 --> [REQ_ID=d419e73c862a] [REQUEST][START] GET /index.php
DEBUG - 2026-03-29 19:45:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:45:49 --> [REQ_ID=d419e73c862a] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-29 19:45:49 --> [REQ_ID=d419e73c862a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 19:45:49 --> [REQ_ID=d419e73c862a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 19:45:49 --> [CSRF] token name=csrf_test_name hash=9c55825746bea1cb6066541894d58cca
DEBUG - 2026-03-29 19:45:49 --> [REQ_ID=4da0cc1a03a4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 19:45:49 --> [REQ_ID=4da0cc1a03a4] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 19:45:50 --> [REQ_ID=4da0cc1a03a4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:45:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:45:50 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 19:45:50 --> [REQ_ID=4da0cc1a03a4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 19:45:50 --> [REQ_ID=4da0cc1a03a4] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 19:45:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 19:45:50 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 19:45:50 --> [REQ_ID=d419e73c862a] [FILTER_AFTER]
DEBUG - 2026-03-29 19:45:50 --> [REQ_ID=d419e73c862a] [LIFECYCLE][END] status=200 duration_ms=716.51 memory_delta=4194304
INFO - 2026-03-29 19:45:50 --> [REQ_ID=4da0cc1a03a4] [PERF] Execution time=0.714551
DEBUG - 2026-03-29 19:45:50 --> [REQ_ID=d419e73c862a] [REQUEST][END]
INFO - 2026-03-29 19:45:50 --> [REQ_ID=d419e73c862a] [PERF] Execution time=0.755609
DEBUG - 2026-03-29 19:46:22 --> [REQ_ID=a8cd7580f857] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 19:46:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 19:46:46 --> [CSRF] token name=csrf_test_name hash=201b91e6178483cfea7dc26b86ac7419
DEBUG - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [REQUEST][END]
INFO - 2026-03-29 19:46:46 --> [REQ_ID=fb6beb164b65] [PERF] Execution time=0.019081
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:46:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:46:47 --> [CSRF] token name=csrf_test_name hash=a1028322e17017839b8250a5813f05cb
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=71521d3bcfcb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:46:47 --> [REQ_ID=71521d3bcfcb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [FILTER_AFTER]
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [LIFECYCLE][END] status=200 duration_ms=20.53 memory_delta=0
INFO - 2026-03-29 19:46:47 --> [REQ_ID=71521d3bcfcb] [PERF] Execution time=0.020227
DEBUG - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [REQUEST][END]
INFO - 2026-03-29 19:46:47 --> [REQ_ID=18070c2a98f5] [PERF] Execution time=0.033525
DEBUG - 2026-03-29 19:51:22 --> [REQ_ID=8a76469907fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 19:54:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 19:54:47 --> [CSRF] token name=csrf_test_name hash=e31fdc47f71dc0f8527f61521277efe1
DEBUG - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [REQUEST][END]
INFO - 2026-03-29 19:54:47 --> [REQ_ID=dae0e93f6d1a] [PERF] Execution time=0.049602
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 19:54:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 19:54:51 --> [CSRF] token name=csrf_test_name hash=415243d6d521dc0434df238244e4cb8f
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=faf6fec675b3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 19:54:51 --> [REQ_ID=faf6fec675b3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [FILTER_AFTER]
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [LIFECYCLE][END] status=200 duration_ms=168.07 memory_delta=0
INFO - 2026-03-29 19:54:51 --> [REQ_ID=faf6fec675b3] [PERF] Execution time=0.167717
DEBUG - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [REQUEST][END]
INFO - 2026-03-29 19:54:51 --> [REQ_ID=6e83b65b905c] [PERF] Execution time=0.180372
DEBUG - 2026-03-29 19:55:24 --> [REQ_ID=3e1f4017084a] [REQUEST][START] GET /
DEBUG - 2026-03-29 19:55:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:55:24 --> [REQ_ID=3e1f4017084a] [FILTER_BEFORE] /
DEBUG - 2026-03-29 19:55:24 --> [REQ_ID=3e1f4017084a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 19:55:24 --> [REQ_ID=3e1f4017084a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 19:55:24 --> [CSRF] token name=csrf_test_name hash=e1c9cb9faaecd17655b5407c45684fa7
DEBUG - 2026-03-29 19:55:24 --> [REQ_ID=a24cd6ff30b2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 19:55:24 --> [REQ_ID=a24cd6ff30b2] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 19:55:24 --> [REQ_ID=a24cd6ff30b2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:55:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:55:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 19:55:25 --> [REQ_ID=a24cd6ff30b2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 19:55:25 --> [REQ_ID=a24cd6ff30b2] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 19:55:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 19:55:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 19:55:25 --> [REQ_ID=3e1f4017084a] [FILTER_AFTER]
DEBUG - 2026-03-29 19:55:25 --> [REQ_ID=3e1f4017084a] [LIFECYCLE][END] status=200 duration_ms=675.94 memory_delta=4194304
INFO - 2026-03-29 19:55:25 --> [REQ_ID=a24cd6ff30b2] [PERF] Execution time=0.675722
DEBUG - 2026-03-29 19:55:25 --> [REQ_ID=3e1f4017084a] [REQUEST][END]
INFO - 2026-03-29 19:55:25 --> [REQ_ID=3e1f4017084a] [PERF] Execution time=0.685752
DEBUG - 2026-03-29 19:56:22 --> [REQ_ID=f7b544db3af3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 19:58:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 19:58:08 --> [CSRF] token name=csrf_test_name hash=f3203093a6d298822af82cf93821e1fb
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [METHOD_ENTRY] index
DEBUG - 2026-03-29 19:58:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 19:58:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 19:58:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 19:58:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 19:58:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 19:58:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 19:58:08 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [FILTER_AFTER]
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [LIFECYCLE][END] status=200 duration_ms=200.07 memory_delta=0
INFO - 2026-03-29 19:58:08 --> [REQ_ID=d2fb53d5bf8d] [PERF] Execution time=0.198177
DEBUG - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [REQUEST][END]
INFO - 2026-03-29 19:58:08 --> [REQ_ID=9af3540f785d] [PERF] Execution time=0.240648
DEBUG - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [REQUEST][END]
INFO - 2026-03-29 20:00:01 --> [REQ_ID=af01f52c20f2] [PERF] Execution time=0.048331
DEBUG - 2026-03-29 20:01:22 --> [REQ_ID=9ab578ead1dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:02:04 --> [REQ_ID=fa40491de3d7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:02:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:02:04 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:02:04 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:02:04 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:02:04 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-29 20:06:22 --> [REQ_ID=c5abafe60971] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-29 20:07:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-29 20:07:50 --> [CSRF] token name=csrf_test_name hash=a882864ce181212bb16f795de2e3e6e7
DEBUG - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [REQUEST][END]
INFO - 2026-03-29 20:07:50 --> [REQ_ID=f3ef24a0716a] [PERF] Execution time=0.054906
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:07:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:07:51 --> [CSRF] token name=csrf_test_name hash=47a09dbbc737c122e2f78364c402ed79
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=6dbe5c561fe7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:07:51 --> [REQ_ID=6dbe5c561fe7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [FILTER_AFTER]
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [LIFECYCLE][END] status=200 duration_ms=55.38 memory_delta=0
INFO - 2026-03-29 20:07:51 --> [REQ_ID=6dbe5c561fe7] [PERF] Execution time=0.055242
DEBUG - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [REQUEST][END]
INFO - 2026-03-29 20:07:51 --> [REQ_ID=c8d4e331de21] [PERF] Execution time=0.067168
DEBUG - 2026-03-29 20:09:42 --> [REQ_ID=f18479142578] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:09:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:42 --> [REQ_ID=f18479142578] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:09:42 --> [REQ_ID=f18479142578] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:09:42 --> [REQ_ID=f18479142578] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:09:42 --> [CSRF] token name=csrf_test_name hash=05fc5f1805e5a8a780cf24ebc4e5b083
DEBUG - 2026-03-29 20:09:42 --> [REQ_ID=142a052a9886] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:09:42 --> [REQ_ID=142a052a9886] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:09:42 --> [REQ_ID=142a052a9886] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 20:09:43 --> [REQ_ID=142a052a9886] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:09:43 --> [REQ_ID=142a052a9886] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 20:09:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 20:09:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:09:43 --> [REQ_ID=f18479142578] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:43 --> [REQ_ID=f18479142578] [LIFECYCLE][END] status=200 duration_ms=699.63 memory_delta=4194304
INFO - 2026-03-29 20:09:43 --> [REQ_ID=142a052a9886] [PERF] Execution time=0.697626
DEBUG - 2026-03-29 20:09:43 --> [REQ_ID=f18479142578] [REQUEST][END]
INFO - 2026-03-29 20:09:43 --> [REQ_ID=f18479142578] [PERF] Execution time=0.739389
DEBUG - 2026-03-29 20:09:49 --> [REQ_ID=b34e74b236ee] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:09:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:49 --> [REQ_ID=b34e74b236ee] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:09:49 --> [REQ_ID=b34e74b236ee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:09:49 --> [REQ_ID=b34e74b236ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:09:49 --> [CSRF] token name=csrf_test_name hash=af0aa9b7ce34cc0e166c8e4df6437db1
DEBUG - 2026-03-29 20:09:49 --> [REQ_ID=c647ab9ce54e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:09:49 --> [REQ_ID=c647ab9ce54e] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:09:50 --> [REQ_ID=c647ab9ce54e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:09:50 --> [REQ_ID=c647ab9ce54e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:09:50 --> [REQ_ID=c647ab9ce54e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:09:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:09:50 --> [REQ_ID=b34e74b236ee] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:50 --> [REQ_ID=b34e74b236ee] [LIFECYCLE][END] status=200 duration_ms=630.71 memory_delta=2097152
INFO - 2026-03-29 20:09:50 --> [REQ_ID=c647ab9ce54e] [PERF] Execution time=0.630483
DEBUG - 2026-03-29 20:09:50 --> [REQ_ID=b34e74b236ee] [REQUEST][END]
INFO - 2026-03-29 20:09:50 --> [REQ_ID=b34e74b236ee] [PERF] Execution time=0.640514
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 20:09:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 20:09:52 --> [CSRF] token name=csrf_test_name hash=fa2463fb9b415d0b7808fad6285f501e
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [METHOD_ENTRY] index
DEBUG - 2026-03-29 20:09:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:09:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:09:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:09:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:09:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:09:52 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [LIFECYCLE][END] status=200 duration_ms=64.54 memory_delta=0
INFO - 2026-03-29 20:09:52 --> [REQ_ID=5da9fc7c60ff] [PERF] Execution time=0.064351
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [REQUEST][END]
INFO - 2026-03-29 20:09:52 --> [REQ_ID=48cbc51410f3] [PERF] Execution time=0.077171
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=c6672747515d] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-29 20:09:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=c6672747515d] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=c6672747515d] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=c6672747515d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-29 20:09:52 --> [CSRF] token name=csrf_test_name hash=029131fd53c9e36de3e396e6d5c578e1
DEBUG - 2026-03-29 20:09:52 --> [REQ_ID=209086a92714] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:09:52 --> [REQ_ID=209086a92714] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:09:52 --> [REQ_ID=209086a92714] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:53 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=209086a92714] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-29 20:09:53 --> [REQ_ID=209086a92714] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:09:53 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:53 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=c6672747515d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=c6672747515d] [LIFECYCLE][END] status=200 duration_ms=505.73 memory_delta=2097152
INFO - 2026-03-29 20:09:53 --> [REQ_ID=209086a92714] [PERF] Execution time=0.505690
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=c6672747515d] [REQUEST][END]
INFO - 2026-03-29 20:09:53 --> [REQ_ID=c6672747515d] [PERF] Execution time=0.514603
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=e198e4ae4231] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-29 20:09:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=e198e4ae4231] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=e198e4ae4231] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=e198e4ae4231] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-29 20:09:53 --> [CSRF] token name=csrf_test_name hash=34716241dc1100de8234a3dccaeb43e4
DEBUG - 2026-03-29 20:09:53 --> [REQ_ID=a3632c22e440] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:09:53 --> [REQ_ID=a3632c22e440] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:09:53 --> [REQ_ID=a3632c22e440] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:54 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:09:54 --> [REQ_ID=a3632c22e440] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-29 20:09:54 --> [REQ_ID=a3632c22e440] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:09:54 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:54 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-29 20:09:54 --> [REQ_ID=e198e4ae4231] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:54 --> [REQ_ID=e198e4ae4231] [LIFECYCLE][END] status=200 duration_ms=513.26 memory_delta=2097152
INFO - 2026-03-29 20:09:54 --> [REQ_ID=a3632c22e440] [PERF] Execution time=0.513105
DEBUG - 2026-03-29 20:09:54 --> [REQ_ID=e198e4ae4231] [REQUEST][END]
INFO - 2026-03-29 20:09:54 --> [REQ_ID=e198e4ae4231] [PERF] Execution time=0.521996
DEBUG - 2026-03-29 20:09:54 --> [REQ_ID=ee7cf3b575ff] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 20:09:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:09:54 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 20:09:54 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-29 20:09:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:09:55 --> [CSRF] token name=csrf_test_name hash=b3674f267eabd11712208b90d292bad8
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:09:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [LIFECYCLE][END] status=200 duration_ms=492.88 memory_delta=2097152
INFO - 2026-03-29 20:09:55 --> [REQ_ID=f66441adfab6] [PERF] Execution time=0.492549
DEBUG - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [REQUEST][END]
INFO - 2026-03-29 20:09:55 --> [REQ_ID=ae02d5d22b5e] [PERF] Execution time=0.502840
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 20:09:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-29 20:09:56 --> [CSRF] token name=csrf_test_name hash=29a8cb9764e47a0446beeb848908ec99
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=5fc0b0ba5d5a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:09:56 --> [REQ_ID=5fc0b0ba5d5a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=5fc0b0ba5d5a] [METHOD_ENTRY] show
DEBUG - 2026-03-29 20:09:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:09:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:09:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:09:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:09:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:09:56 --> [REQ_ID=5fc0b0ba5d5a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [LIFECYCLE][END] status=200 duration_ms=548.55 memory_delta=2097152
INFO - 2026-03-29 20:09:56 --> [REQ_ID=5fc0b0ba5d5a] [PERF] Execution time=0.548349
DEBUG - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [REQUEST][END]
INFO - 2026-03-29 20:09:56 --> [REQ_ID=0a1016b1c33d] [PERF] Execution time=0.559855
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 20:09:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=MyMIGold
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-29 20:09:57 --> [CSRF] token name=csrf_test_name hash=2a02198d3e4791d12e44d572996d1325
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=ec862e94a837] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:09:57 --> [REQ_ID=ec862e94a837] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=ec862e94a837] [METHOD_ENTRY] MyMIGold
DEBUG - 2026-03-29 20:09:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:09:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:09:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:09:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:09:57 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:09:57 --> [REQ_ID=ec862e94a837] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:09:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:57 --> [MetaService] slug=how-it-works/mymi-gold pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [LIFECYCLE][END] status=200 duration_ms=556.59 memory_delta=2097152
INFO - 2026-03-29 20:09:57 --> [REQ_ID=ec862e94a837] [PERF] Execution time=0.556390
DEBUG - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [REQUEST][END]
INFO - 2026-03-29 20:09:57 --> [REQ_ID=7c7f683e507e] [PERF] Execution time=0.565543
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 20:09:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-29 20:09:58 --> [CSRF] token name=csrf_test_name hash=98a03c0b03dcdb56b8ca8f70685fd44e
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=4cf1ae8c3241] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:09:58 --> [REQ_ID=4cf1ae8c3241] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=4cf1ae8c3241] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-29 20:09:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:09:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:09:58 --> [REQ_ID=4cf1ae8c3241] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:09:58 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:09:58 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [LIFECYCLE][END] status=200 duration_ms=562.93 memory_delta=2097152
INFO - 2026-03-29 20:09:58 --> [REQ_ID=4cf1ae8c3241] [PERF] Execution time=0.562580
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [REQUEST][END]
INFO - 2026-03-29 20:09:58 --> [REQ_ID=1bef44233488] [PERF] Execution time=0.572768
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=5b0557559160] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 20:09:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=5b0557559160] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=5b0557559160] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=5b0557559160] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-29 20:09:58 --> [CSRF] token name=csrf_test_name hash=b207a43401549481b56a15c0a8186453
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=492c1367f802] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:09:58 --> [REQ_ID=492c1367f802] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-29 20:09:58 --> [REQ_ID=492c1367f802] [METHOD_ENTRY] show
DEBUG - 2026-03-29 20:09:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:09:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:09:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:09:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:09:58 --> [REQ_ID=492c1367f802] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=5b0557559160] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=5b0557559160] [LIFECYCLE][END] status=200 duration_ms=535.08 memory_delta=0
INFO - 2026-03-29 20:09:59 --> [REQ_ID=492c1367f802] [PERF] Execution time=0.535092
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=5b0557559160] [REQUEST][END]
INFO - 2026-03-29 20:09:59 --> [REQ_ID=5b0557559160] [PERF] Execution time=0.544626
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-29 20:09:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-29 20:09:59 --> [CSRF] token name=csrf_test_name hash=322281a45bebbf621ccfde32a40713f4
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [REQUEST][END]
INFO - 2026-03-29 20:09:59 --> [REQ_ID=35f70fe936a5] [PERF] Execution time=0.014506
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:09:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:09:59 --> [CSRF] token name=csrf_test_name hash=500a873fcb39a25c09b5dbf1c8762ab4
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=339134540106] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:09:59 --> [REQ_ID=339134540106] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [LIFECYCLE][END] status=200 duration_ms=18.57 memory_delta=0
INFO - 2026-03-29 20:09:59 --> [REQ_ID=339134540106] [PERF] Execution time=0.018345
DEBUG - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [REQUEST][END]
INFO - 2026-03-29 20:09:59 --> [REQ_ID=22d8fe46523b] [PERF] Execution time=0.030586
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=a673ab9a99f7] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 20:10:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=a673ab9a99f7] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=a673ab9a99f7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=a673ab9a99f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-29 20:10:00 --> [CSRF] token name=csrf_test_name hash=53868e18bd7c94b88a91fb6dcc041f82
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=ebbd39311071] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:00 --> [REQ_ID=ebbd39311071] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:00 --> [REQ_ID=ebbd39311071] [METHOD_ENTRY] show
DEBUG - 2026-03-29 20:10:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:00 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 20:10:00 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-29 20:10:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:10:00 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:10:00 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-29 20:10:00 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
INFO - 2026-03-29 20:10:00 --> [REQ_ID=ebbd39311071] [PERF] Execution time=0.029902
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 20:10:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-29 20:10:01 --> [CSRF] token name=csrf_test_name hash=a1cc81764013cd6c53f405daec666590
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=ffe3ba28082b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:01 --> [REQ_ID=ffe3ba28082b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=ffe3ba28082b] [METHOD_ENTRY] show
DEBUG - 2026-03-29 20:10:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:01 --> [REQ_ID=ffe3ba28082b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [LIFECYCLE][END] status=200 duration_ms=493.60 memory_delta=4194304
INFO - 2026-03-29 20:10:01 --> [REQ_ID=ffe3ba28082b] [PERF] Execution time=0.493502
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [REQUEST][END]
INFO - 2026-03-29 20:10:01 --> [REQ_ID=eaa6dd445316] [PERF] Execution time=0.504547
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=b3a124d8892e] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 20:10:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=b3a124d8892e] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=b3a124d8892e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=b3a124d8892e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 20:10:01 --> [CSRF] token name=csrf_test_name hash=b803bb1b0271de4b8da2417d926997de
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=cc9bf8038d20] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:01 --> [REQ_ID=cc9bf8038d20] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:10:01 --> [REQ_ID=cc9bf8038d20] [METHOD_ENTRY] show
DEBUG - 2026-03-29 20:10:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:01 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 20:10:01 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-29 20:10:01 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:10:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:10:01 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-29 20:10:01 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
INFO - 2026-03-29 20:10:01 --> [REQ_ID=cc9bf8038d20] [PERF] Execution time=0.050657
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=803cc6a2225c] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 20:10:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=803cc6a2225c] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=803cc6a2225c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=803cc6a2225c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-29 20:10:02 --> [CSRF] token name=csrf_test_name hash=e85e1f0623848807d38cf09727ebde59
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=a707a9017485] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:02 --> [REQ_ID=a707a9017485] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:02 --> [REQ_ID=a707a9017485] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-29 20:10:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:02 --> [REQ_ID=a707a9017485] [MEMORY][commonData:start] 4194304
INFO - 2026-03-29 20:10:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:03 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=803cc6a2225c] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=803cc6a2225c] [LIFECYCLE][END] status=200 duration_ms=615.42 memory_delta=4194304
INFO - 2026-03-29 20:10:03 --> [REQ_ID=a707a9017485] [PERF] Execution time=0.615294
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=803cc6a2225c] [REQUEST][END]
INFO - 2026-03-29 20:10:03 --> [REQ_ID=803cc6a2225c] [PERF] Execution time=0.624781
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=ecf8bfad2f1f] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 20:10:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=ecf8bfad2f1f] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=ecf8bfad2f1f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=ecf8bfad2f1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-29 20:10:03 --> [CSRF] token name=csrf_test_name hash=db7db41e5aa425b93b2a6dd865a90336
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=d4b7410cbb88] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:03 --> [REQ_ID=d4b7410cbb88] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:10:03 --> [REQ_ID=d4b7410cbb88] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-29 20:10:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:03 --> [REQ_ID=d4b7410cbb88] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:10:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:04 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=ecf8bfad2f1f] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=ecf8bfad2f1f] [LIFECYCLE][END] status=200 duration_ms=563.52 memory_delta=2097152
INFO - 2026-03-29 20:10:04 --> [REQ_ID=d4b7410cbb88] [PERF] Execution time=0.563379
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=ecf8bfad2f1f] [REQUEST][END]
INFO - 2026-03-29 20:10:04 --> [REQ_ID=ecf8bfad2f1f] [PERF] Execution time=0.572890
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=32ec0edefe10] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 20:10:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=32ec0edefe10] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=32ec0edefe10] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=PersonalBudgeting
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=32ec0edefe10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-29 20:10:04 --> [CSRF] token name=csrf_test_name hash=21c33087fcd2d24e7d4883954eeba8b9
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=a4d8c98cebc7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:04 --> [REQ_ID=a4d8c98cebc7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:10:04 --> [REQ_ID=a4d8c98cebc7] [METHOD_ENTRY] PersonalBudgeting
DEBUG - 2026-03-29 20:10:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:04 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:04 --> [REQ_ID=a4d8c98cebc7] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:10:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:05 --> [MetaService] slug=how-it-works/personal-budgeting pageName= cacheHit= path=DB
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=32ec0edefe10] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=32ec0edefe10] [LIFECYCLE][END] status=200 duration_ms=569.69 memory_delta=2097152
INFO - 2026-03-29 20:10:05 --> [REQ_ID=a4d8c98cebc7] [PERF] Execution time=0.569628
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=32ec0edefe10] [REQUEST][END]
INFO - 2026-03-29 20:10:05 --> [REQ_ID=32ec0edefe10] [PERF] Execution time=0.580149
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:10:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:10:05 --> [CSRF] token name=csrf_test_name hash=509fb2eb39b873fd88a36f0bfe5fdc8e
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [REQUEST][END]
INFO - 2026-03-29 20:10:05 --> [REQ_ID=46bb2cb7e6b9] [PERF] Execution time=0.010044
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:05 --> [CSRF] token name=csrf_test_name hash=1e209a763ff5f7e23ce760d29388ccd5
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=dd6118fa30aa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:05 --> [REQ_ID=dd6118fa30aa] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [LIFECYCLE][END] status=200 duration_ms=18.63 memory_delta=0
INFO - 2026-03-29 20:10:05 --> [REQ_ID=dd6118fa30aa] [PERF] Execution time=0.018443
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [REQUEST][END]
INFO - 2026-03-29 20:10:05 --> [REQ_ID=21cacda33097] [PERF] Execution time=0.028893
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-29 20:10:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-29 20:10:05 --> [CSRF] token name=csrf_test_name hash=70187b830ebd06939a179bb8f1ada824
DEBUG - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [REQUEST][END]
INFO - 2026-03-29 20:10:05 --> [REQ_ID=c4105d40f919] [PERF] Execution time=0.008943
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:06 --> [CSRF] token name=csrf_test_name hash=6c897077e95838a35b39125f7f925905
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=ea29bd2108aa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:06 --> [REQ_ID=ea29bd2108aa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [LIFECYCLE][END] status=200 duration_ms=15.78 memory_delta=0
INFO - 2026-03-29 20:10:06 --> [REQ_ID=ea29bd2108aa] [PERF] Execution time=0.015752
DEBUG - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [REQUEST][END]
INFO - 2026-03-29 20:10:06 --> [REQ_ID=3110dd0b1e98] [PERF] Execution time=0.024781
DEBUG - 2026-03-29 20:10:07 --> [REQ_ID=022c4f62282c] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:10:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:07 --> [REQ_ID=022c4f62282c] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:10:07 --> [REQ_ID=022c4f62282c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:10:07 --> [REQ_ID=022c4f62282c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:10:07 --> [CSRF] token name=csrf_test_name hash=05be73f2b81785c794101c55703ab6f9
DEBUG - 2026-03-29 20:10:07 --> [REQ_ID=9c42ccc03243] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:10:07 --> [REQ_ID=9c42ccc03243] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 20:10:07 --> [REQ_ID=9c42ccc03243] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 20:10:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=9c42ccc03243] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:10:08 --> [REQ_ID=9c42ccc03243] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:10:08 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=022c4f62282c] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=022c4f62282c] [LIFECYCLE][END] status=200 duration_ms=501.88 memory_delta=4194304
INFO - 2026-03-29 20:10:08 --> [REQ_ID=9c42ccc03243] [PERF] Execution time=0.501717
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=022c4f62282c] [REQUEST][END]
INFO - 2026-03-29 20:10:08 --> [REQ_ID=022c4f62282c] [PERF] Execution time=0.511855
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=b5d051778447] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-29 20:10:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=b5d051778447] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=b5d051778447] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=b5d051778447] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-29 20:10:08 --> [CSRF] token name=csrf_test_name hash=3a5ef2bd6f88898cdba2007658bccf57
DEBUG - 2026-03-29 20:10:08 --> [REQ_ID=e3e8f74d594b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:08 --> [REQ_ID=e3e8f74d594b] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:10:08 --> [REGISTRATION] Form loaded
INFO - 2026-03-29 20:10:08 --> [REQ_ID=e3e8f74d594b] [PERF] Execution time=0.015094
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:09 --> [CSRF] token name=csrf_test_name hash=c4585a329abc306b12a4fece96bb3926
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=963b2ca7638c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:09 --> [REQ_ID=963b2ca7638c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [LIFECYCLE][END] status=200 duration_ms=15.21 memory_delta=0
INFO - 2026-03-29 20:10:09 --> [REQ_ID=963b2ca7638c] [PERF] Execution time=0.015060
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [REQUEST][END]
INFO - 2026-03-29 20:10:09 --> [REQ_ID=650cbf657ffe] [PERF] Execution time=0.024802
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=0e85a03cb017] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-29 20:10:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=0e85a03cb017] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=0e85a03cb017] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=0e85a03cb017] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-29 20:10:09 --> [CSRF] token name=csrf_test_name hash=bf7e9cf8eec282d7ecc1c40b5a8ab6af
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=99770680c85c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 20:10:09 --> [REQ_ID=99770680c85c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:09 --> [REQ_ID=99770680c85c] [METHOD_ENTRY] index
DEBUG - 2026-03-29 20:10:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:09 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 20:10:09 --> HowItWorksController failure: overview
CRITICAL - 2026-03-29 20:10:09 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:10:09 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:10:09 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-29 20:10:09 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-29 20:10:09 --> [REQ_ID=99770680c85c] [PERF] Execution time=0.030845
DEBUG - 2026-03-29 20:10:10 --> [REQ_ID=86a57cfe69f3] [REQUEST][START] GET /index.php
DEBUG - 2026-03-29 20:10:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:10 --> [REQ_ID=86a57cfe69f3] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-29 20:10:10 --> [REQ_ID=86a57cfe69f3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:10:10 --> [REQ_ID=86a57cfe69f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:10:10 --> [CSRF] token name=csrf_test_name hash=435d9460e58b4f0a5e0be9c40325938b
DEBUG - 2026-03-29 20:10:10 --> [REQ_ID=eca46b390c62] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:10:10 --> [REQ_ID=eca46b390c62] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 20:10:10 --> [REQ_ID=eca46b390c62] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 20:10:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:11 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=eca46b390c62] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:10:11 --> [REQ_ID=eca46b390c62] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:10:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:11 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=86a57cfe69f3] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=86a57cfe69f3] [LIFECYCLE][END] status=200 duration_ms=551.35 memory_delta=4194304
INFO - 2026-03-29 20:10:11 --> [REQ_ID=eca46b390c62] [PERF] Execution time=0.551147
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=86a57cfe69f3] [REQUEST][END]
INFO - 2026-03-29 20:10:11 --> [REQ_ID=86a57cfe69f3] [PERF] Execution time=0.560756
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=e1c2df146af9] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-29 20:10:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=e1c2df146af9] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=e1c2df146af9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=e1c2df146af9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:10:11 --> [CSRF] token name=csrf_test_name hash=1dae7445a072f2ee39ccba470fd27c43
DEBUG - 2026-03-29 20:10:11 --> [REQ_ID=c5bc7c19a5cc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:10:11 --> [REQ_ID=c5bc7c19a5cc] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:10:11 --> [REQ_ID=c5bc7c19a5cc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:10:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:12 --> [REQ_ID=c5bc7c19a5cc] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:10:12 --> [REQ_ID=c5bc7c19a5cc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:10:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:12 --> [REQ_ID=e1c2df146af9] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:12 --> [REQ_ID=e1c2df146af9] [LIFECYCLE][END] status=200 duration_ms=566.02 memory_delta=2097152
INFO - 2026-03-29 20:10:12 --> [REQ_ID=c5bc7c19a5cc] [PERF] Execution time=0.565793
DEBUG - 2026-03-29 20:10:12 --> [REQ_ID=e1c2df146af9] [REQUEST][END]
INFO - 2026-03-29 20:10:12 --> [REQ_ID=e1c2df146af9] [PERF] Execution time=0.576455
DEBUG - 2026-03-29 20:10:13 --> [REQ_ID=801cf6600743] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:10:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:13 --> [REQ_ID=801cf6600743] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:10:13 --> [REQ_ID=801cf6600743] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:10:13 --> [REQ_ID=801cf6600743] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:10:13 --> [CSRF] token name=csrf_test_name hash=de5c3a5042d8ead5f76f74252795a2ad
DEBUG - 2026-03-29 20:10:13 --> [REQ_ID=4c2a9299e8d7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:10:13 --> [REQ_ID=4c2a9299e8d7] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:10:13 --> [REQ_ID=4c2a9299e8d7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:10:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=4c2a9299e8d7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:10:14 --> [REQ_ID=4c2a9299e8d7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:10:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:10:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=801cf6600743] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=801cf6600743] [LIFECYCLE][END] status=200 duration_ms=570.93 memory_delta=2097152
INFO - 2026-03-29 20:10:14 --> [REQ_ID=4c2a9299e8d7] [PERF] Execution time=0.570670
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=801cf6600743] [REQUEST][END]
INFO - 2026-03-29 20:10:14 --> [REQ_ID=801cf6600743] [PERF] Execution time=0.580119
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-29 20:10:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-29 20:10:14 --> [CSRF] token name=csrf_test_name hash=365481ef69a95ec453acaca7ae490dbe
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [REQUEST][END]
INFO - 2026-03-29 20:10:14 --> [REQ_ID=69d2d5daf5f9] [PERF] Execution time=0.009283
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:14 --> [CSRF] token name=csrf_test_name hash=dcb3f1ee9de3573a1fb7b03f00a6f0eb
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=09b17f31e8c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:14 --> [REQ_ID=09b17f31e8c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [LIFECYCLE][END] status=200 duration_ms=20.02 memory_delta=0
INFO - 2026-03-29 20:10:14 --> [REQ_ID=09b17f31e8c7] [PERF] Execution time=0.019954
DEBUG - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [REQUEST][END]
INFO - 2026-03-29 20:10:14 --> [REQ_ID=36457d2115ea] [PERF] Execution time=0.030116
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-29 20:10:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-29 20:10:15 --> [CSRF] token name=csrf_test_name hash=fafa12dc3bc5da78521c768fa8c60727
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [REQUEST][END]
INFO - 2026-03-29 20:10:15 --> [REQ_ID=1b47d36a2c61] [PERF] Execution time=0.018472
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:15 --> [CSRF] token name=csrf_test_name hash=0a849ecf63c6aae6bedf02bf3b07b722
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=90463840e0a1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:15 --> [REQ_ID=90463840e0a1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [LIFECYCLE][END] status=200 duration_ms=45.47 memory_delta=0
INFO - 2026-03-29 20:10:15 --> [REQ_ID=90463840e0a1] [PERF] Execution time=0.043190
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [REQUEST][END]
INFO - 2026-03-29 20:10:15 --> [REQ_ID=005c54298f92] [PERF] Execution time=0.087647
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 20:10:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 20:10:15 --> [CSRF] token name=csrf_test_name hash=d89bc8bf9fc691fa09a5b8669b621ea3
DEBUG - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [REQUEST][END]
INFO - 2026-03-29 20:10:15 --> [REQ_ID=e77488c740de] [PERF] Execution time=0.018520
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:16 --> [CSRF] token name=csrf_test_name hash=35b149c23ee25ccfb81147ec70a0b33c
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=01f7ad26434e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:16 --> [REQ_ID=01f7ad26434e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [LIFECYCLE][END] status=200 duration_ms=14.94 memory_delta=0
INFO - 2026-03-29 20:10:16 --> [REQ_ID=01f7ad26434e] [PERF] Execution time=0.014776
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [REQUEST][END]
INFO - 2026-03-29 20:10:16 --> [REQ_ID=b40f0449217d] [PERF] Execution time=0.023594
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 20:10:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-29 20:10:16 --> [CSRF] token name=csrf_test_name hash=984ed0213922b860fd9033893a8aebf6
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [REQUEST][END]
INFO - 2026-03-29 20:10:16 --> [REQ_ID=9301bf44f73e] [PERF] Execution time=0.009663
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:16 --> [CSRF] token name=csrf_test_name hash=1f09733e9b51e7fe52a4cbf987572fa5
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=e495032af2ee] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:16 --> [REQ_ID=e495032af2ee] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [LIFECYCLE][END] status=200 duration_ms=16.01 memory_delta=0
INFO - 2026-03-29 20:10:16 --> [REQ_ID=e495032af2ee] [PERF] Execution time=0.015870
DEBUG - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [REQUEST][END]
INFO - 2026-03-29 20:10:16 --> [REQ_ID=457065c0a86e] [PERF] Execution time=0.024533
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 20:10:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-29 20:10:17 --> [CSRF] token name=csrf_test_name hash=048ce32ed064cc6f8a2382fb7a869064
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [REQUEST][END]
INFO - 2026-03-29 20:10:17 --> [REQ_ID=a3b816da3ec4] [PERF] Execution time=0.009171
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:17 --> [CSRF] token name=csrf_test_name hash=a9a58a988d171542a8da0652dea3f3b7
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=495f0514e37c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:17 --> [REQ_ID=495f0514e37c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [LIFECYCLE][END] status=200 duration_ms=16.40 memory_delta=0
INFO - 2026-03-29 20:10:17 --> [REQ_ID=495f0514e37c] [PERF] Execution time=0.016299
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [REQUEST][END]
INFO - 2026-03-29 20:10:17 --> [REQ_ID=921e5cfb63ba] [PERF] Execution time=0.025992
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 20:10:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-29 20:10:17 --> [CSRF] token name=csrf_test_name hash=d06925a47fac2e7665f73185ec38577e
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [REQUEST][END]
INFO - 2026-03-29 20:10:17 --> [REQ_ID=52eac4135ca4] [PERF] Execution time=0.009132
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=0a73ad99d252] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=0a73ad99d252] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=0a73ad99d252] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=0a73ad99d252] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:17 --> [CSRF] token name=csrf_test_name hash=dd1416b20467f2885632213957589e2f
DEBUG - 2026-03-29 20:10:17 --> [REQ_ID=2a55cf094f17] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:17 --> [REQ_ID=2a55cf094f17] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=0a73ad99d252] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=0a73ad99d252] [LIFECYCLE][END] status=200 duration_ms=17.34 memory_delta=0
INFO - 2026-03-29 20:10:18 --> [REQ_ID=2a55cf094f17] [PERF] Execution time=0.017139
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=0a73ad99d252] [REQUEST][END]
INFO - 2026-03-29 20:10:18 --> [REQ_ID=0a73ad99d252] [PERF] Execution time=0.028109
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-29 20:10:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-29 20:10:18 --> [CSRF] token name=csrf_test_name hash=b16e93a651f9c916b3ec60594120bd0f
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [REQUEST][END]
INFO - 2026-03-29 20:10:18 --> [REQ_ID=d6450786d517] [PERF] Execution time=0.009997
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:18 --> [CSRF] token name=csrf_test_name hash=4b9d1e321d60dcbeedd19d7634f1664b
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=bfa423aca29b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:18 --> [REQ_ID=bfa423aca29b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [LIFECYCLE][END] status=200 duration_ms=22.41 memory_delta=0
INFO - 2026-03-29 20:10:18 --> [REQ_ID=bfa423aca29b] [PERF] Execution time=0.022428
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [REQUEST][END]
INFO - 2026-03-29 20:10:18 --> [REQ_ID=a262d8fa9eac] [PERF] Execution time=0.031289
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-29 20:10:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [FILTER_BEFORE] /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=schedule
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Schedule
DEBUG - 2026-03-29 20:10:18 --> [CSRF] token name=csrf_test_name hash=e339e64ae8c62fdbbdffb2ea37b4caf4
DEBUG - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [REQUEST][END]
INFO - 2026-03-29 20:10:18 --> [REQ_ID=5c0af79a08a8] [PERF] Execution time=0.009177
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:19 --> [CSRF] token name=csrf_test_name hash=1c7a645cdb9b0ec4fdd246af978f0510
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=074d70e5df3e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:19 --> [REQ_ID=074d70e5df3e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [LIFECYCLE][END] status=200 duration_ms=14.94 memory_delta=0
INFO - 2026-03-29 20:10:19 --> [REQ_ID=074d70e5df3e] [PERF] Execution time=0.014836
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [REQUEST][END]
INFO - 2026-03-29 20:10:19 --> [REQ_ID=d8c23676e72a] [PERF] Execution time=0.024626
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-29 20:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-29 20:10:19 --> [CSRF] token name=csrf_test_name hash=dd384fcb4d0d84a1379c8c0e0656d7e4
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [REQUEST][END]
INFO - 2026-03-29 20:10:19 --> [REQ_ID=d20821be8065] [PERF] Execution time=0.009482
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:19 --> [CSRF] token name=csrf_test_name hash=eb3d1584198e1e3e93732811084c3795
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=98fd1b44ec64] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:19 --> [REQ_ID=98fd1b44ec64] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [LIFECYCLE][END] status=200 duration_ms=14.65 memory_delta=0
INFO - 2026-03-29 20:10:19 --> [REQ_ID=98fd1b44ec64] [PERF] Execution time=0.014568
DEBUG - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [REQUEST][END]
INFO - 2026-03-29 20:10:19 --> [REQ_ID=76043f1ad71a] [PERF] Execution time=0.024634
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-29 20:10:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-29 20:10:20 --> [CSRF] token name=csrf_test_name hash=dacc7fdc9e6bbc93f9026fc66abf65fa
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [REQUEST][END]
INFO - 2026-03-29 20:10:20 --> [REQ_ID=0b8c108fd6ce] [PERF] Execution time=0.009571
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:20 --> [CSRF] token name=csrf_test_name hash=7ad416ed64ce469151726a8a40918915
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=19a83c9798ae] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:20 --> [REQ_ID=19a83c9798ae] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [LIFECYCLE][END] status=200 duration_ms=16.59 memory_delta=0
INFO - 2026-03-29 20:10:20 --> [REQ_ID=19a83c9798ae] [PERF] Execution time=0.016519
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [REQUEST][END]
INFO - 2026-03-29 20:10:20 --> [REQ_ID=29830d8f6975] [PERF] Execution time=0.025305
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [REQUEST][START] GET /index.php/Management/Marketing
DEBUG - 2026-03-29 20:10:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [FILTER_BEFORE] /index.php/Management/Marketing
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=index
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing
DEBUG - 2026-03-29 20:10:20 --> [CSRF] token name=csrf_test_name hash=0c225a07ee3eb54141be793c169aad86
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [REQUEST][END]
INFO - 2026-03-29 20:10:20 --> [REQ_ID=118d7fb26010] [PERF] Execution time=0.009151
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:20 --> [CSRF] token name=csrf_test_name hash=25604d2eed52fe20d5e341e43e3fdb4f
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=9d5840011a40] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:20 --> [REQ_ID=9d5840011a40] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [LIFECYCLE][END] status=200 duration_ms=17.99 memory_delta=0
INFO - 2026-03-29 20:10:20 --> [REQ_ID=9d5840011a40] [PERF] Execution time=0.017801
DEBUG - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [REQUEST][END]
INFO - 2026-03-29 20:10:20 --> [REQ_ID=11d70ba07f47] [PERF] Execution time=0.028460
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-29 20:10:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [FILTER_BEFORE] /index.php/Management/Docs
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [ROUTE] Controller=\App\Modules\Management\Controllers\DocsAdminController Method=index
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Docs
DEBUG - 2026-03-29 20:10:21 --> [CSRF] token name=csrf_test_name hash=8abe694a8ef908665ab6cbc8810174e2
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [REQUEST][END]
INFO - 2026-03-29 20:10:21 --> [REQ_ID=3f82e9a10a11] [PERF] Execution time=0.012017
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:21 --> [CSRF] token name=csrf_test_name hash=de6b55b6d461cbac5ee90ecddc7a28c9
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=fe99c60642ee] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:21 --> [REQ_ID=fe99c60642ee] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [LIFECYCLE][END] status=200 duration_ms=14.36 memory_delta=0
INFO - 2026-03-29 20:10:21 --> [REQ_ID=fe99c60642ee] [PERF] Execution time=0.014196
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [REQUEST][END]
INFO - 2026-03-29 20:10:21 --> [REQ_ID=6417a3fbc9ef] [PERF] Execution time=0.022716
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-29 20:10:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-29 20:10:21 --> [CSRF] token name=csrf_test_name hash=9fa92aedaea1d716211760c7e78b95a2
DEBUG - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [REQUEST][END]
INFO - 2026-03-29 20:10:21 --> [REQ_ID=59fa4ccf4610] [PERF] Execution time=0.010292
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:22 --> [CSRF] token name=csrf_test_name hash=607ca915dcd31aced3aebea8e4152cb7
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=5d7958850981] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:22 --> [REQ_ID=5d7958850981] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [LIFECYCLE][END] status=200 duration_ms=14.53 memory_delta=0
INFO - 2026-03-29 20:10:22 --> [REQ_ID=5d7958850981] [PERF] Execution time=0.014404
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [REQUEST][END]
INFO - 2026-03-29 20:10:22 --> [REQ_ID=047683ab484b] [PERF] Execution time=0.023219
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-03-29 20:10:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-03-29 20:10:22 --> [CSRF] token name=csrf_test_name hash=b9e026e433b7885d0f72f704e6f26b03
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [REQUEST][END]
INFO - 2026-03-29 20:10:22 --> [REQ_ID=250a22553b3e] [PERF] Execution time=0.010504
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:22 --> [CSRF] token name=csrf_test_name hash=d7e5f67f887a44a173697e2547f7c7b6
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=71f8d4af9ebc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:22 --> [REQ_ID=71f8d4af9ebc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [LIFECYCLE][END] status=200 duration_ms=14.35 memory_delta=0
INFO - 2026-03-29 20:10:22 --> [REQ_ID=71f8d4af9ebc] [PERF] Execution time=0.014218
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [REQUEST][END]
INFO - 2026-03-29 20:10:22 --> [REQ_ID=7d59e79e0bf0] [PERF] Execution time=0.023286
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-29 20:10:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-29 20:10:22 --> [CSRF] token name=csrf_test_name hash=59668143bc194f05ca3b0c514a7f9fdf
DEBUG - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [REQUEST][END]
INFO - 2026-03-29 20:10:22 --> [REQ_ID=bca7fc43691b] [PERF] Execution time=0.010683
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:23 --> [CSRF] token name=csrf_test_name hash=f89868d26e11b37233cb54edf28cf5ae
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=2be11939407e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:23 --> [REQ_ID=2be11939407e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [LIFECYCLE][END] status=200 duration_ms=15.42 memory_delta=0
INFO - 2026-03-29 20:10:23 --> [REQ_ID=2be11939407e] [PERF] Execution time=0.015140
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [REQUEST][END]
INFO - 2026-03-29 20:10:23 --> [REQ_ID=bc8c24c3138d] [PERF] Execution time=0.024648
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-29 20:10:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-29 20:10:23 --> [CSRF] token name=csrf_test_name hash=dc828dd1f6c8f83cb9f3369e6e12661d
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [REQUEST][END]
INFO - 2026-03-29 20:10:23 --> [REQ_ID=85fada88f379] [PERF] Execution time=0.010568
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:23 --> [CSRF] token name=csrf_test_name hash=b27edfff7762d205c59b8817624f201a
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=0d27436bafda] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:23 --> [REQ_ID=0d27436bafda] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [LIFECYCLE][END] status=200 duration_ms=15.57 memory_delta=0
INFO - 2026-03-29 20:10:23 --> [REQ_ID=0d27436bafda] [PERF] Execution time=0.015590
DEBUG - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [REQUEST][END]
INFO - 2026-03-29 20:10:23 --> [REQ_ID=27841cca3380] [PERF] Execution time=0.024782
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-29 20:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [FILTER_BEFORE] /index.php/Management/API
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [ROUTE] Controller=\App\Modules\Management\Controllers\APIAdminController Method=index
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/API
DEBUG - 2026-03-29 20:10:24 --> [CSRF] token name=csrf_test_name hash=c51bdaccef23215dee0ad05eb5e90357
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [REQUEST][END]
INFO - 2026-03-29 20:10:24 --> [REQ_ID=b3b4acdad5da] [PERF] Execution time=0.011838
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:24 --> [CSRF] token name=csrf_test_name hash=8578738c58002c529c85911bbe1e24c2
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=cd2b743cd395] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:24 --> [REQ_ID=cd2b743cd395] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [LIFECYCLE][END] status=200 duration_ms=15.72 memory_delta=0
INFO - 2026-03-29 20:10:24 --> [REQ_ID=cd2b743cd395] [PERF] Execution time=0.015657
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [REQUEST][END]
INFO - 2026-03-29 20:10:24 --> [REQ_ID=1fe6b7bf89e2] [PERF] Execution time=0.024337
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-29 20:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-29 20:10:24 --> [CSRF] token name=csrf_test_name hash=b342cd6bcad987989d3df8389814a347
DEBUG - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [REQUEST][END]
INFO - 2026-03-29 20:10:24 --> [REQ_ID=567929ff6cf2] [PERF] Execution time=0.015148
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:25 --> [CSRF] token name=csrf_test_name hash=632d8eba6ec712f8c055b67d67219959
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=b271c8a6fa7e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:25 --> [REQ_ID=b271c8a6fa7e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [LIFECYCLE][END] status=200 duration_ms=34.99 memory_delta=0
INFO - 2026-03-29 20:10:25 --> [REQ_ID=b271c8a6fa7e] [PERF] Execution time=0.034876
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [REQUEST][END]
INFO - 2026-03-29 20:10:25 --> [REQ_ID=a89e33e52d2b] [PERF] Execution time=0.044716
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-29 20:10:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-29 20:10:25 --> [CSRF] token name=csrf_test_name hash=efa147d65f5dcb7597cf86c396abd463
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [REQUEST][END]
INFO - 2026-03-29 20:10:25 --> [REQ_ID=f51c96065161] [PERF] Execution time=0.011354
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:25 --> [CSRF] token name=csrf_test_name hash=f86ba0b5dfc4f484499deb47037a696b
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=90e84229d453] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:25 --> [REQ_ID=90e84229d453] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [LIFECYCLE][END] status=200 duration_ms=15.48 memory_delta=0
INFO - 2026-03-29 20:10:25 --> [REQ_ID=90e84229d453] [PERF] Execution time=0.015381
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [REQUEST][END]
INFO - 2026-03-29 20:10:25 --> [REQ_ID=0f0e46cb824f] [PERF] Execution time=0.024685
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-29 20:10:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-29 20:10:25 --> [CSRF] token name=csrf_test_name hash=f8e1f9fa8905c7437f0a5960da8cb16c
DEBUG - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [REQUEST][END]
INFO - 2026-03-29 20:10:25 --> [REQ_ID=c3eedeaaec9a] [PERF] Execution time=0.011056
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:26 --> [CSRF] token name=csrf_test_name hash=e39794c89f8f3c9872787d4070c6c78d
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=823b9e4f55b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:26 --> [REQ_ID=823b9e4f55b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [LIFECYCLE][END] status=200 duration_ms=16.74 memory_delta=0
INFO - 2026-03-29 20:10:26 --> [REQ_ID=823b9e4f55b2] [PERF] Execution time=0.016636
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [REQUEST][END]
INFO - 2026-03-29 20:10:26 --> [REQ_ID=0e01e63959cb] [PERF] Execution time=0.025714
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-29 20:10:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-29 20:10:26 --> [CSRF] token name=csrf_test_name hash=6b49064b6d4042ffc624ce0f3f64ac6d
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [REQUEST][END]
INFO - 2026-03-29 20:10:26 --> [REQ_ID=179e16a37a05] [PERF] Execution time=0.010634
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:26 --> [CSRF] token name=csrf_test_name hash=b4f7374b8f7d2233e9d8c36a8478efe3
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=97aa871009c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:26 --> [REQ_ID=97aa871009c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [LIFECYCLE][END] status=200 duration_ms=17.50 memory_delta=0
INFO - 2026-03-29 20:10:26 --> [REQ_ID=97aa871009c7] [PERF] Execution time=0.017453
DEBUG - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [REQUEST][END]
INFO - 2026-03-29 20:10:26 --> [REQ_ID=da73d5497e19] [PERF] Execution time=0.026499
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-29 20:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-29 20:10:27 --> [CSRF] token name=csrf_test_name hash=24045d805b7fe435aca59a2d4823c3c7
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [REQUEST][END]
INFO - 2026-03-29 20:10:27 --> [REQ_ID=4607c1fbbbb3] [PERF] Execution time=0.010608
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:27 --> [CSRF] token name=csrf_test_name hash=de4657229789d388efb9914000d145e9
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d99c57de7ce0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:27 --> [REQ_ID=d99c57de7ce0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [LIFECYCLE][END] status=200 duration_ms=15.06 memory_delta=0
INFO - 2026-03-29 20:10:27 --> [REQ_ID=d99c57de7ce0] [PERF] Execution time=0.014870
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [REQUEST][END]
INFO - 2026-03-29 20:10:27 --> [REQ_ID=bacf1d58c66b] [PERF] Execution time=0.025334
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-29 20:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-29 20:10:27 --> [CSRF] token name=csrf_test_name hash=abf73549ef63549f7f2cdc97ba32241b
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [REQUEST][END]
INFO - 2026-03-29 20:10:27 --> [REQ_ID=d33f1faf6519] [PERF] Execution time=0.012908
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:27 --> [CSRF] token name=csrf_test_name hash=a043e8abca9b1b79d136ff3919988ff8
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=5cd7539b3626] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:27 --> [REQ_ID=5cd7539b3626] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [LIFECYCLE][END] status=200 duration_ms=18.06 memory_delta=0
INFO - 2026-03-29 20:10:27 --> [REQ_ID=5cd7539b3626] [PERF] Execution time=0.018096
DEBUG - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [REQUEST][END]
INFO - 2026-03-29 20:10:27 --> [REQ_ID=ec1721e3db20] [PERF] Execution time=0.026932
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-29 20:10:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-29 20:10:28 --> [CSRF] token name=csrf_test_name hash=54b2398acd0f7bbaf73280386372adcb
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [REQUEST][END]
INFO - 2026-03-29 20:10:28 --> [REQ_ID=14937d2def48] [PERF] Execution time=0.010788
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:28 --> [CSRF] token name=csrf_test_name hash=9e2f17e963a1d293f5508906a65487e2
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=03b59c0ae99d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:28 --> [REQ_ID=03b59c0ae99d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [LIFECYCLE][END] status=200 duration_ms=16.00 memory_delta=0
INFO - 2026-03-29 20:10:28 --> [REQ_ID=03b59c0ae99d] [PERF] Execution time=0.016024
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [REQUEST][END]
INFO - 2026-03-29 20:10:28 --> [REQ_ID=aab3698dfa0d] [PERF] Execution time=0.024677
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-29 20:10:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-29 20:10:28 --> [CSRF] token name=csrf_test_name hash=a85511fbbb0bfddff6b5b222ebeac68f
DEBUG - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [REQUEST][END]
INFO - 2026-03-29 20:10:28 --> [REQ_ID=219847830762] [PERF] Execution time=0.010337
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:29 --> [CSRF] token name=csrf_test_name hash=a5962e56aedd33bdd061b654c8896e4e
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=4a0a5b370eb6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:29 --> [REQ_ID=4a0a5b370eb6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [LIFECYCLE][END] status=200 duration_ms=17.75 memory_delta=0
INFO - 2026-03-29 20:10:29 --> [REQ_ID=4a0a5b370eb6] [PERF] Execution time=0.017678
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [REQUEST][END]
INFO - 2026-03-29 20:10:29 --> [REQ_ID=53cd1bbcbf18] [PERF] Execution time=0.026837
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-29 20:10:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-29 20:10:29 --> [CSRF] token name=csrf_test_name hash=e7628ce8d900b1dc506cf125698b64a4
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [REQUEST][END]
INFO - 2026-03-29 20:10:29 --> [REQ_ID=ca6c196c44c9] [PERF] Execution time=0.014440
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:29 --> [CSRF] token name=csrf_test_name hash=34876bf8e60546e9a5bef14cdf3cf25e
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=41487c57e53b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:29 --> [REQ_ID=41487c57e53b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [LIFECYCLE][END] status=200 duration_ms=15.53 memory_delta=0
INFO - 2026-03-29 20:10:29 --> [REQ_ID=41487c57e53b] [PERF] Execution time=0.015432
DEBUG - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [REQUEST][END]
INFO - 2026-03-29 20:10:29 --> [REQ_ID=02497e95d384] [PERF] Execution time=0.024290
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-29 20:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-29 20:10:30 --> [CSRF] token name=csrf_test_name hash=8778f398cad24c96671c16d5aa4de5da
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [REQUEST][END]
INFO - 2026-03-29 20:10:30 --> [REQ_ID=e756ac88fb20] [PERF] Execution time=0.013598
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:30 --> [CSRF] token name=csrf_test_name hash=1013b1ff415a307ef7821b087774e11a
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=6c72c746e15b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:30 --> [REQ_ID=6c72c746e15b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [LIFECYCLE][END] status=200 duration_ms=13.99 memory_delta=0
INFO - 2026-03-29 20:10:30 --> [REQ_ID=6c72c746e15b] [PERF] Execution time=0.013823
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [REQUEST][END]
INFO - 2026-03-29 20:10:30 --> [REQ_ID=ffb7d33c956b] [PERF] Execution time=0.022514
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-03-29 20:10:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-03-29 20:10:30 --> [CSRF] token name=csrf_test_name hash=53c429a5e8243aa2fba9381b08a5f164
DEBUG - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [REQUEST][END]
INFO - 2026-03-29 20:10:30 --> [REQ_ID=bb443f4e29fd] [PERF] Execution time=0.201512
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:31 --> [CSRF] token name=csrf_test_name hash=fb2c6a736a2d09aa8154d0d88ad8d5c9
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=465affbbef52] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:31 --> [REQ_ID=465affbbef52] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [LIFECYCLE][END] status=200 duration_ms=17.54 memory_delta=0
INFO - 2026-03-29 20:10:31 --> [REQ_ID=465affbbef52] [PERF] Execution time=0.017421
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [REQUEST][END]
INFO - 2026-03-29 20:10:31 --> [REQ_ID=a20ced00c721] [PERF] Execution time=0.026071
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-29 20:10:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-29 20:10:31 --> [CSRF] token name=csrf_test_name hash=cbc8bf8cf5674245058cdde81e7462ee
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [REQUEST][END]
INFO - 2026-03-29 20:10:31 --> [REQ_ID=5d0c52475a0d] [PERF] Execution time=0.010905
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:31 --> [CSRF] token name=csrf_test_name hash=579e6bd27c47430327c19254d79afc51
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=95d10553d51d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:31 --> [REQ_ID=95d10553d51d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [LIFECYCLE][END] status=200 duration_ms=16.49 memory_delta=0
INFO - 2026-03-29 20:10:31 --> [REQ_ID=95d10553d51d] [PERF] Execution time=0.015443
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [REQUEST][END]
INFO - 2026-03-29 20:10:31 --> [REQ_ID=2aed3c47733d] [PERF] Execution time=0.028450
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-03-29 20:10:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-03-29 20:10:31 --> [CSRF] token name=csrf_test_name hash=d5002e4d05ac3a1ba5fcc619a6951af6
DEBUG - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [REQUEST][END]
INFO - 2026-03-29 20:10:31 --> [REQ_ID=d4e34d4c78f0] [PERF] Execution time=0.012888
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:32 --> [CSRF] token name=csrf_test_name hash=a3c8ba862ad71fc9cf746bd545d18ec7
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=7d52d8dc772d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:32 --> [REQ_ID=7d52d8dc772d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [LIFECYCLE][END] status=200 duration_ms=16.09 memory_delta=0
INFO - 2026-03-29 20:10:32 --> [REQ_ID=7d52d8dc772d] [PERF] Execution time=0.015858
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [REQUEST][END]
INFO - 2026-03-29 20:10:32 --> [REQ_ID=b99ffe35fed3] [PERF] Execution time=0.028129
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-29 20:10:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-29 20:10:32 --> [CSRF] token name=csrf_test_name hash=d03c4efabf89dfe8920d3a271632d57d
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [REQUEST][END]
INFO - 2026-03-29 20:10:32 --> [REQ_ID=1ce4b2a9073e] [PERF] Execution time=0.013053
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:32 --> [CSRF] token name=csrf_test_name hash=0b898a9badfa0ffc495b82bae61c9817
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=070c4482fd4b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:32 --> [REQ_ID=070c4482fd4b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [LIFECYCLE][END] status=200 duration_ms=20.25 memory_delta=0
INFO - 2026-03-29 20:10:32 --> [REQ_ID=070c4482fd4b] [PERF] Execution time=0.020166
DEBUG - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [REQUEST][END]
INFO - 2026-03-29 20:10:32 --> [REQ_ID=8bb5fb562c63] [PERF] Execution time=0.029216
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-29 20:10:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-29 20:10:33 --> [CSRF] token name=csrf_test_name hash=8683caf59b30c167014d752243f55938
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [REQUEST][END]
INFO - 2026-03-29 20:10:33 --> [REQ_ID=fc885216c2c0] [PERF] Execution time=0.011904
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:33 --> [CSRF] token name=csrf_test_name hash=92640c480cfcac5c0f761a5b800688a8
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=b49d4ac67637] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:33 --> [REQ_ID=b49d4ac67637] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [LIFECYCLE][END] status=200 duration_ms=17.70 memory_delta=0
INFO - 2026-03-29 20:10:33 --> [REQ_ID=b49d4ac67637] [PERF] Execution time=0.017605
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [REQUEST][END]
INFO - 2026-03-29 20:10:33 --> [REQ_ID=5231a2956423] [PERF] Execution time=0.026292
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-29 20:10:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-29 20:10:33 --> [CSRF] token name=csrf_test_name hash=fc27ad9d41df20b6be5d56dc946edc26
DEBUG - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [REQUEST][END]
INFO - 2026-03-29 20:10:33 --> [REQ_ID=f1f4c03ff369] [PERF] Execution time=0.011171
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:34 --> [CSRF] token name=csrf_test_name hash=ccef23c5a767ec3e08b9c2d9edc89b7f
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=d1cabe10e739] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:34 --> [REQ_ID=d1cabe10e739] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [LIFECYCLE][END] status=200 duration_ms=15.24 memory_delta=0
INFO - 2026-03-29 20:10:34 --> [REQ_ID=d1cabe10e739] [PERF] Execution time=0.015138
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [REQUEST][END]
INFO - 2026-03-29 20:10:34 --> [REQ_ID=a3d013ec253b] [PERF] Execution time=0.023879
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-29 20:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-29 20:10:34 --> [CSRF] token name=csrf_test_name hash=566c0ea39890bb7f4c1af4d37af7f767
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [REQUEST][END]
INFO - 2026-03-29 20:10:34 --> [REQ_ID=b69c9157cfa3] [PERF] Execution time=0.019152
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:34 --> [CSRF] token name=csrf_test_name hash=8277c63c97ac6cbdccb21b8aeeddb42d
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=a34acda50038] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:34 --> [REQ_ID=a34acda50038] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [LIFECYCLE][END] status=200 duration_ms=16.79 memory_delta=0
INFO - 2026-03-29 20:10:34 --> [REQ_ID=a34acda50038] [PERF] Execution time=0.016668
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [REQUEST][END]
INFO - 2026-03-29 20:10:34 --> [REQ_ID=4555b12c0719] [PERF] Execution time=0.025377
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-29 20:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-29 20:10:34 --> [CSRF] token name=csrf_test_name hash=e04da5b94fb349c878e759807a04877b
DEBUG - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [REQUEST][END]
INFO - 2026-03-29 20:10:34 --> [REQ_ID=34968489843e] [PERF] Execution time=0.009061
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:35 --> [CSRF] token name=csrf_test_name hash=6ecd73e31ee1946fad178af52c3a29f4
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=59f933ba27c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:35 --> [REQ_ID=59f933ba27c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [LIFECYCLE][END] status=200 duration_ms=15.52 memory_delta=0
INFO - 2026-03-29 20:10:35 --> [REQ_ID=59f933ba27c5] [PERF] Execution time=0.015401
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [REQUEST][END]
INFO - 2026-03-29 20:10:35 --> [REQ_ID=18387259e643] [PERF] Execution time=0.025497
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-29 20:10:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-29 20:10:35 --> [CSRF] token name=csrf_test_name hash=55d26d86e1b49da2bf72777164f62c3b
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [REQUEST][END]
INFO - 2026-03-29 20:10:35 --> [REQ_ID=e8e8f1e40a8e] [PERF] Execution time=0.009586
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:35 --> [CSRF] token name=csrf_test_name hash=b3208ce26adf524e86fb61e92d6179a1
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=4bf3dd9a8c62] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:35 --> [REQ_ID=4bf3dd9a8c62] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [LIFECYCLE][END] status=200 duration_ms=16.28 memory_delta=0
INFO - 2026-03-29 20:10:35 --> [REQ_ID=4bf3dd9a8c62] [PERF] Execution time=0.016153
DEBUG - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [REQUEST][END]
INFO - 2026-03-29 20:10:35 --> [REQ_ID=91c2a868e83e] [PERF] Execution time=0.024891
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:10:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:10:36 --> [CSRF] token name=csrf_test_name hash=5fb9a314228701a70df32f4ce201472c
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [REQUEST][END]
INFO - 2026-03-29 20:10:36 --> [REQ_ID=ed0dde826b01] [PERF] Execution time=0.009939
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:36 --> [CSRF] token name=csrf_test_name hash=accc129018957cf8631880c776c7593a
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=5f309b86d96e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:36 --> [REQ_ID=5f309b86d96e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [LIFECYCLE][END] status=200 duration_ms=14.92 memory_delta=0
INFO - 2026-03-29 20:10:36 --> [REQ_ID=5f309b86d96e] [PERF] Execution time=0.014742
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [REQUEST][END]
INFO - 2026-03-29 20:10:36 --> [REQ_ID=ad4db653f732] [PERF] Execution time=0.023237
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-29 20:10:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-29 20:10:36 --> [CSRF] token name=csrf_test_name hash=20f9ad8fdcd6ac640db4e35929776ad4
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [REQUEST][END]
INFO - 2026-03-29 20:10:36 --> [REQ_ID=ccae7e8793ce] [PERF] Execution time=0.011516
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=6b584ca94134] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=6b584ca94134] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=6b584ca94134] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=6b584ca94134] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:36 --> [CSRF] token name=csrf_test_name hash=f7eb310d38ad9ffdd9a92d7041368e20
DEBUG - 2026-03-29 20:10:36 --> [REQ_ID=a41a078437d7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:36 --> [REQ_ID=a41a078437d7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=6b584ca94134] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=6b584ca94134] [LIFECYCLE][END] status=200 duration_ms=23.85 memory_delta=0
INFO - 2026-03-29 20:10:37 --> [REQ_ID=a41a078437d7] [PERF] Execution time=0.023804
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=6b584ca94134] [REQUEST][END]
INFO - 2026-03-29 20:10:37 --> [REQ_ID=6b584ca94134] [PERF] Execution time=0.032706
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-29 20:10:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-29 20:10:37 --> [CSRF] token name=csrf_test_name hash=b01a9e3986f13b2e7f227d3e9f727dfb
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [REQUEST][END]
INFO - 2026-03-29 20:10:37 --> [REQ_ID=2698d2db638c] [PERF] Execution time=0.010816
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:10:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:10:37 --> [CSRF] token name=csrf_test_name hash=2e89c192e5e12a47912a7ec63ec6cd04
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=db805f832338] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:10:37 --> [REQ_ID=db805f832338] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [LIFECYCLE][END] status=200 duration_ms=16.81 memory_delta=0
INFO - 2026-03-29 20:10:37 --> [REQ_ID=db805f832338] [PERF] Execution time=0.016606
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [REQUEST][END]
INFO - 2026-03-29 20:10:37 --> [REQ_ID=d090287e215b] [PERF] Execution time=0.026775
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 20:10:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 20:10:37 --> [CSRF] token name=csrf_test_name hash=5eb5b2bfe3c6fdb2e59648f4a0488c61
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [METHOD_ENTRY] index
DEBUG - 2026-03-29 20:10:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:37 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:37 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:37 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:37 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [MEMORY][commonData:start] 6291456
INFO - 2026-03-29 20:10:37 --> themesMemory usage: 6291456
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [LIFECYCLE][END] status=200 duration_ms=75.45 memory_delta=2097152
INFO - 2026-03-29 20:10:37 --> [REQ_ID=1119fb202129] [PERF] Execution time=0.075243
DEBUG - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [REQUEST][END]
INFO - 2026-03-29 20:10:37 --> [REQ_ID=5839dc478fec] [PERF] Execution time=0.084708
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-29 20:10:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-29 20:10:38 --> [CSRF] token name=csrf_test_name hash=8d1ed5768615e8259fab25091aa8f7ca
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [METHOD_ENTRY] index
DEBUG - 2026-03-29 20:10:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:10:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 20:10:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 20:10:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 20:10:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 20:10:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [MEMORY][commonData:start] 4194304
INFO - 2026-03-29 20:10:38 --> themesMemory usage: 4194304
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [FILTER_AFTER]
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [LIFECYCLE][END] status=200 duration_ms=34.00 memory_delta=0
INFO - 2026-03-29 20:10:38 --> [REQ_ID=1e69267b0700] [PERF] Execution time=0.033832
DEBUG - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [REQUEST][END]
INFO - 2026-03-29 20:10:38 --> [REQ_ID=90bb923c274d] [PERF] Execution time=0.042916
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-29 20:11:22 --> [CSRF] token name=csrf_test_name hash=284bf9ef45ade8495b3713831c07c571
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [REQUEST][END]
INFO - 2026-03-29 20:11:22 --> [REQ_ID=974d0bda05ad] [PERF] Execution time=0.009722
DEBUG - 2026-03-29 20:11:22 --> [REQ_ID=a47b29f47f67] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:11:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:11:24 --> [CSRF] token name=csrf_test_name hash=35e85c89aa89be9bea522fcc724497b7
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=497caf433045] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:11:24 --> [REQ_ID=497caf433045] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [FILTER_AFTER]
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [LIFECYCLE][END] status=200 duration_ms=15.25 memory_delta=0
INFO - 2026-03-29 20:11:24 --> [REQ_ID=497caf433045] [PERF] Execution time=0.014892
DEBUG - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [REQUEST][END]
INFO - 2026-03-29 20:11:24 --> [REQ_ID=95db4ee34ede] [PERF] Execution time=0.028407
DEBUG - 2026-03-29 20:14:28 --> [REQ_ID=467bfd60a631] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:14:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:14:28 --> [REQ_ID=467bfd60a631] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:14:28 --> [REQ_ID=467bfd60a631] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:14:28 --> [REQ_ID=467bfd60a631] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:14:28 --> [CSRF] token name=csrf_test_name hash=70d51e5ee6f12fbc4f286d8e09a7537d
DEBUG - 2026-03-29 20:14:28 --> [REQ_ID=71632f409654] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:14:28 --> [REQ_ID=71632f409654] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 20:14:28 --> [REQ_ID=71632f409654] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:14:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:14:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:14:29 --> [REQ_ID=71632f409654] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:14:29 --> [REQ_ID=71632f409654] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 20:14:29 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 20:14:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:14:29 --> [REQ_ID=467bfd60a631] [FILTER_AFTER]
DEBUG - 2026-03-29 20:14:29 --> [REQ_ID=467bfd60a631] [LIFECYCLE][END] status=200 duration_ms=667.48 memory_delta=4194304
INFO - 2026-03-29 20:14:29 --> [REQ_ID=71632f409654] [PERF] Execution time=0.665529
DEBUG - 2026-03-29 20:14:29 --> [REQ_ID=467bfd60a631] [REQUEST][END]
INFO - 2026-03-29 20:14:29 --> [REQ_ID=467bfd60a631] [PERF] Execution time=0.707016
DEBUG - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [REQUEST][END]
INFO - 2026-03-29 20:15:02 --> [REQ_ID=8b8ccaa46c09] [PERF] Execution time=0.017248
DEBUG - 2026-03-29 20:16:22 --> [REQ_ID=d0b1e89c19f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:21:22 --> [REQ_ID=40ec3cdb36c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-29 20:23:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-03-29 20:23:20 --> [CSRF] token name=csrf_test_name hash=8c8f118f33c7c80da0e5b6348e4aeef0
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [REQUEST][END]
INFO - 2026-03-29 20:23:20 --> [REQ_ID=82cf632505c2] [PERF] Execution time=0.048182
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:23:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:23:20 --> [CSRF] token name=csrf_test_name hash=f4e38d894c79ef810f779d7cb3526422
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c2c3c7bc3a31] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:23:20 --> [REQ_ID=c2c3c7bc3a31] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [FILTER_AFTER]
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [LIFECYCLE][END] status=200 duration_ms=104.95 memory_delta=0
INFO - 2026-03-29 20:23:20 --> [REQ_ID=c2c3c7bc3a31] [PERF] Execution time=0.104882
DEBUG - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [REQUEST][END]
INFO - 2026-03-29 20:23:20 --> [REQ_ID=c98c0da54013] [PERF] Execution time=0.120887
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [REQUEST][START] GET /
DEBUG - 2026-03-29 20:24:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [FILTER_BEFORE] /
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 20:24:28 --> [CSRF] token name=csrf_test_name hash=53362f090a7bf80d7c0f388216489885
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 20:24:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 20:24:28 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 20:24:28 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 20:24:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [FILTER_AFTER]
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [LIFECYCLE][END] status=200 duration_ms=721.74 memory_delta=4194304
INFO - 2026-03-29 20:24:28 --> [REQ_ID=6693f89cca24] [PERF] Execution time=0.721496
DEBUG - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [REQUEST][END]
INFO - 2026-03-29 20:24:28 --> [REQ_ID=7eaaaba20e49] [PERF] Execution time=0.732178
DEBUG - 2026-03-29 20:26:22 --> [REQ_ID=bce6fe1540da] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:31:22 --> [REQ_ID=911b3f31c0a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:36:22 --> [REQ_ID=c9f69a923a81] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:37:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-29 20:37:14 --> [CSRF] token name=csrf_test_name hash=0f8e7388e005f10a292195c23a21dbb2
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [REQUEST][END]
INFO - 2026-03-29 20:37:14 --> [REQ_ID=3168d5938da8] [PERF] Execution time=0.026097
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 20:37:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 20:37:14 --> [CSRF] token name=csrf_test_name hash=fca98a389428511660fb2047d4033c14
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=5d476f8a30d0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 20:37:14 --> [REQ_ID=5d476f8a30d0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [FILTER_AFTER]
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [LIFECYCLE][END] status=200 duration_ms=53.35 memory_delta=0
INFO - 2026-03-29 20:37:14 --> [REQ_ID=5d476f8a30d0] [PERF] Execution time=0.053190
DEBUG - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [REQUEST][END]
INFO - 2026-03-29 20:37:14 --> [REQ_ID=c049ec35b769] [PERF] Execution time=0.065074
DEBUG - 2026-03-29 20:41:22 --> [REQ_ID=0da7e99f41a3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:46:22 --> [REQ_ID=2ff892c3c3c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:51:22 --> [REQ_ID=71dccd82ed78] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 20:56:22 --> [REQ_ID=4172f6a0dfc3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [REQUEST][END]
INFO - 2026-03-29 21:00:01 --> [REQ_ID=615cd9f27767] [PERF] Execution time=0.047545
DEBUG - 2026-03-29 21:01:22 --> [REQ_ID=04342cf8717e] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-29 21:01:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-29 21:01:37 --> [CSRF] token name=csrf_test_name hash=3bd7cc2d16be1e1575d6221c8c81b08c
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [REQUEST][END]
INFO - 2026-03-29 21:01:37 --> [REQ_ID=edfe87868201] [PERF] Execution time=0.032856
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=09e2e7f4daeb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 21:01:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=09e2e7f4daeb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=09e2e7f4daeb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=09e2e7f4daeb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 21:01:37 --> [CSRF] token name=csrf_test_name hash=188f0ab45cd37972b704344c2090a92c
DEBUG - 2026-03-29 21:01:37 --> [REQ_ID=07c61356ec94] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 21:01:37 --> [REQ_ID=07c61356ec94] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 21:01:38 --> [REQ_ID=09e2e7f4daeb] [FILTER_AFTER]
DEBUG - 2026-03-29 21:01:38 --> [REQ_ID=09e2e7f4daeb] [LIFECYCLE][END] status=200 duration_ms=95.98 memory_delta=0
INFO - 2026-03-29 21:01:38 --> [REQ_ID=07c61356ec94] [PERF] Execution time=0.095682
DEBUG - 2026-03-29 21:01:38 --> [REQ_ID=09e2e7f4daeb] [REQUEST][END]
INFO - 2026-03-29 21:01:38 --> [REQ_ID=09e2e7f4daeb] [PERF] Execution time=0.109069
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=87e7758b3652] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 21:03:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=87e7758b3652] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=87e7758b3652] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=87e7758b3652] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-29 21:03:41 --> [CSRF] token name=csrf_test_name hash=f956aaf4635694b55db113dcfc269d4e
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=a5eb474f45d0] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 21:03:41 --> [REQ_ID=a5eb474f45d0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 21:03:41 --> [REQ_ID=a5eb474f45d0] [METHOD_ENTRY] show
DEBUG - 2026-03-29 21:03:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 21:03:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 21:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 21:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 21:03:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 21:03:41 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 21:03:41 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-29 21:03:41 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:03:41 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:03:41 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-29 21:03:41 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
INFO - 2026-03-29 21:03:41 --> [REQ_ID=a5eb474f45d0] [PERF] Execution time=0.099304
DEBUG - 2026-03-29 21:06:22 --> [REQ_ID=0920f936a498] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:11:22 --> [REQ_ID=d71f697cf7fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:11:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:11:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:11:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 21:11:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-29 21:11:43 --> [CSRF] token name=csrf_test_name hash=28d9e68fbd05e26e95b2a3a34316394f
DEBUG - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [REQUEST][END]
INFO - 2026-03-29 21:11:43 --> [REQ_ID=701f604a7f1f] [PERF] Execution time=0.034128
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 21:11:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 21:11:44 --> [CSRF] token name=csrf_test_name hash=fc8ca45d3b1ad47df08efebff9cc7aea
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=66e0ab71727a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 21:11:44 --> [REQ_ID=66e0ab71727a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [FILTER_AFTER]
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [LIFECYCLE][END] status=200 duration_ms=61.53 memory_delta=0
INFO - 2026-03-29 21:11:44 --> [REQ_ID=66e0ab71727a] [PERF] Execution time=0.061220
DEBUG - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [REQUEST][END]
INFO - 2026-03-29 21:11:44 --> [REQ_ID=1cb0ba903a55] [PERF] Execution time=0.074486
DEBUG - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [REQUEST][END]
INFO - 2026-03-29 21:15:01 --> [REQ_ID=139435f390ac] [PERF] Execution time=0.047115
DEBUG - 2026-03-29 21:16:22 --> [REQ_ID=fafcaf69b558] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:21:22 --> [REQ_ID=7aacfbf265e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:24:45 --> [REQ_ID=45b54d36a4f8] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 21:24:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:24:45 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 21:24:45 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-29 21:24:45 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-29 21:26:22 --> [REQ_ID=49c3c9c435f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:31:22 --> [REQ_ID=a2e024a245b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:36:22 --> [REQ_ID=edf5dac41e96] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:41:22 --> [REQ_ID=5b366b5e23d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-29 21:42:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-29 21:42:21 --> [CSRF] token name=csrf_test_name hash=d13b69e189c0d8c5d1df55c961b3dc35
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [REQUEST][END]
INFO - 2026-03-29 21:42:21 --> [REQ_ID=d2f7dc39bbd7] [PERF] Execution time=0.030956
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 21:42:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 21:42:21 --> [CSRF] token name=csrf_test_name hash=453eee0f294f46db0ccf41c85245a471
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=57ec68e18ad2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 21:42:21 --> [REQ_ID=57ec68e18ad2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [FILTER_AFTER]
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [LIFECYCLE][END] status=200 duration_ms=28.88 memory_delta=0
INFO - 2026-03-29 21:42:21 --> [REQ_ID=57ec68e18ad2] [PERF] Execution time=0.028583
DEBUG - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [REQUEST][END]
INFO - 2026-03-29 21:42:21 --> [REQ_ID=9755cdb148d2] [PERF] Execution time=0.041282
DEBUG - 2026-03-29 21:46:22 --> [REQ_ID=c045e71ec52a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:49:33 --> [REQ_ID=41130b48ca9f] [REQUEST][START] GET /
DEBUG - 2026-03-29 21:49:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:49:33 --> [REQ_ID=41130b48ca9f] [FILTER_BEFORE] /
DEBUG - 2026-03-29 21:49:33 --> [REQ_ID=41130b48ca9f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 21:49:33 --> [REQ_ID=41130b48ca9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 21:49:33 --> [CSRF] token name=csrf_test_name hash=02cb381bc447b39dd94cd730512c6eb1
DEBUG - 2026-03-29 21:49:33 --> [REQ_ID=5ba6cd6371b9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 21:49:33 --> [REQ_ID=5ba6cd6371b9] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 21:49:33 --> [REQ_ID=5ba6cd6371b9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 21:49:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 21:49:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 21:49:34 --> [REQ_ID=5ba6cd6371b9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 21:49:34 --> [REQ_ID=5ba6cd6371b9] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 21:49:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 21:49:34 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 21:49:34 --> [REQ_ID=41130b48ca9f] [FILTER_AFTER]
DEBUG - 2026-03-29 21:49:34 --> [REQ_ID=41130b48ca9f] [LIFECYCLE][END] status=200 duration_ms=597.25 memory_delta=4194304
INFO - 2026-03-29 21:49:34 --> [REQ_ID=5ba6cd6371b9] [PERF] Execution time=0.595334
DEBUG - 2026-03-29 21:49:34 --> [REQ_ID=41130b48ca9f] [REQUEST][END]
INFO - 2026-03-29 21:49:34 --> [REQ_ID=41130b48ca9f] [PERF] Execution time=0.635522
DEBUG - 2026-03-29 21:51:22 --> [REQ_ID=e394c56e0ca3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 21:54:42 --> [REQ_ID=c590a76da0ff] [REQUEST][START] GET /
DEBUG - 2026-03-29 21:54:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [FILTER_BEFORE] /
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 21:54:43 --> [CSRF] token name=csrf_test_name hash=8fef4ef213c2597414cb483a95214505
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 21:54:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 21:54:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 21:54:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 21:54:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [FILTER_AFTER]
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [LIFECYCLE][END] status=200 duration_ms=690.26 memory_delta=4194304
INFO - 2026-03-29 21:54:43 --> [REQ_ID=6897f1eec8f6] [PERF] Execution time=0.688225
DEBUG - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [REQUEST][END]
INFO - 2026-03-29 21:54:43 --> [REQ_ID=c590a76da0ff] [PERF] Execution time=0.730600
DEBUG - 2026-03-29 21:56:22 --> [REQ_ID=de7a356e93b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [REQUEST][END]
INFO - 2026-03-29 22:00:01 --> [REQ_ID=cd084581ae9d] [PERF] Execution time=0.037962
DEBUG - 2026-03-29 22:01:22 --> [REQ_ID=5257bbbbfe53] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-29 22:02:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-29 22:02:16 --> [CSRF] token name=csrf_test_name hash=622b1c4434f26716329941b3b9088d2c
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [REQUEST][END]
INFO - 2026-03-29 22:02:16 --> [REQ_ID=7d90a8218f85] [PERF] Execution time=0.030340
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 22:02:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 22:02:16 --> [CSRF] token name=csrf_test_name hash=b7eb6c438d89dd9be40f93f31c62354c
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=fc0a2c63102b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 22:02:16 --> [REQ_ID=fc0a2c63102b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [FILTER_AFTER]
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [LIFECYCLE][END] status=200 duration_ms=48.60 memory_delta=0
INFO - 2026-03-29 22:02:16 --> [REQ_ID=fc0a2c63102b] [PERF] Execution time=0.048320
DEBUG - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [REQUEST][END]
INFO - 2026-03-29 22:02:16 --> [REQ_ID=6a4bbab5eb30] [PERF] Execution time=0.060792
DEBUG - 2026-03-29 22:02:17 --> [REQ_ID=335dda8d82c4] [REQUEST][START] GET /
DEBUG - 2026-03-29 22:02:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:02:17 --> [REQ_ID=335dda8d82c4] [REQUEST][END]
INFO - 2026-03-29 22:02:17 --> [REQ_ID=335dda8d82c4] [PERF] Execution time=0.010572
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [REQUEST][START] GET /
DEBUG - 2026-03-29 22:03:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [FILTER_BEFORE] /
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 22:03:56 --> [CSRF] token name=csrf_test_name hash=0a60fcb173eae50f85ff69012f89436b
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 22:03:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 22:03:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 22:03:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 22:03:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [FILTER_AFTER]
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [LIFECYCLE][END] status=200 duration_ms=619.42 memory_delta=4194304
INFO - 2026-03-29 22:03:56 --> [REQ_ID=3cbd590a3d56] [PERF] Execution time=0.617532
DEBUG - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [REQUEST][END]
INFO - 2026-03-29 22:03:56 --> [REQ_ID=e462464f0dd3] [PERF] Execution time=0.657868
DEBUG - 2026-03-29 22:06:22 --> [REQ_ID=39552b5bfea4] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-29 22:10:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-29 22:10:56 --> [CSRF] token name=csrf_test_name hash=e238136911c568f8bf273dc8d22b37b7
DEBUG - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [REQUEST][END]
INFO - 2026-03-29 22:10:56 --> [REQ_ID=1e201348a0f0] [PERF] Execution time=0.053652
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 22:10:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 22:10:57 --> [CSRF] token name=csrf_test_name hash=d86e6759fcbb4e79b35784ea37fa1d8d
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=b5158b71fb79] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 22:10:57 --> [REQ_ID=b5158b71fb79] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [FILTER_AFTER]
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [LIFECYCLE][END] status=200 duration_ms=142.98 memory_delta=0
INFO - 2026-03-29 22:10:57 --> [REQ_ID=b5158b71fb79] [PERF] Execution time=0.142771
DEBUG - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [REQUEST][END]
INFO - 2026-03-29 22:10:57 --> [REQ_ID=9f125ceed69f] [PERF] Execution time=0.156157
DEBUG - 2026-03-29 22:11:22 --> [REQ_ID=ba6c4e6fbf0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-29 22:15:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-29 22:15:00 --> [CSRF] token name=csrf_test_name hash=b98ff0f27391abd91ce83a189a990285
DEBUG - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [REQUEST][END]
INFO - 2026-03-29 22:15:00 --> [REQ_ID=092a2806aeb6] [PERF] Execution time=0.053122
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [REQUEST][END]
INFO - 2026-03-29 22:15:01 --> [REQ_ID=a93d5d4cab1d] [PERF] Execution time=0.015552
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 22:15:01 --> [CSRF] token name=csrf_test_name hash=cf8c7d8fb3377664a89f08c493b0b8bf
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=e2cfa8fc026b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 22:15:01 --> [REQ_ID=e2cfa8fc026b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [FILTER_AFTER]
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [LIFECYCLE][END] status=200 duration_ms=152.07 memory_delta=0
INFO - 2026-03-29 22:15:01 --> [REQ_ID=e2cfa8fc026b] [PERF] Execution time=0.151898
DEBUG - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [REQUEST][END]
INFO - 2026-03-29 22:15:01 --> [REQ_ID=2d66542b9086] [PERF] Execution time=0.163983
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [REQUEST][START] GET /
DEBUG - 2026-03-29 22:15:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [FILTER_BEFORE] /
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 22:15:15 --> [CSRF] token name=csrf_test_name hash=70ec341730d797acff5b9bbf6dcb3e5d
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 22:15:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 22:15:15 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 22:15:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 22:15:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [FILTER_AFTER]
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [LIFECYCLE][END] status=200 duration_ms=632.60 memory_delta=4194304
INFO - 2026-03-29 22:15:15 --> [REQ_ID=3ca21be3b006] [PERF] Execution time=0.632396
DEBUG - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [REQUEST][END]
INFO - 2026-03-29 22:15:15 --> [REQ_ID=3fe173245710] [PERF] Execution time=0.642757
DEBUG - 2026-03-29 22:16:22 --> [REQ_ID=67cfcb68180f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:21:22 --> [REQ_ID=c9ceb30f4dcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:26:22 --> [REQ_ID=e3250096138f] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:31:22 --> [REQ_ID=d39f24dabdf0] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 22:32:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 22:32:34 --> [CSRF] token name=csrf_test_name hash=0500855c64450d929a585e78519a1f01
DEBUG - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [REQUEST][END]
INFO - 2026-03-29 22:32:34 --> [REQ_ID=1ae2c495f2e2] [PERF] Execution time=0.034209
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 22:32:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 22:32:35 --> [CSRF] token name=csrf_test_name hash=ae3599b19a7afa245fe158717957ffd8
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=73a77092af95] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 22:32:35 --> [REQ_ID=73a77092af95] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [FILTER_AFTER]
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [LIFECYCLE][END] status=200 duration_ms=47.53 memory_delta=0
INFO - 2026-03-29 22:32:35 --> [REQ_ID=73a77092af95] [PERF] Execution time=0.047356
DEBUG - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [REQUEST][END]
INFO - 2026-03-29 22:32:35 --> [REQ_ID=ccf12e31c8f5] [PERF] Execution time=0.059093
DEBUG - 2026-03-29 22:36:22 --> [REQ_ID=0db48e5b3b4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:41:22 --> [REQ_ID=7f63e860c1aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:45:36 --> [REQ_ID=fa7d4b32a8da] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-29 22:45:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:45:36 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-29 22:45:36 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
DEBUG - 2026-03-29 22:46:22 --> [REQ_ID=647d47076514] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:51:22 --> [REQ_ID=b051e74d440d] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:56:22 --> [REQ_ID=c0d23f21ee7a] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 22:58:49 --> [REQ_ID=750c2ea5b0e8] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-29 22:58:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 22:58:49 --> [REQ_ID=750c2ea5b0e8] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-29 22:58:49 --> [REQ_ID=750c2ea5b0e8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-29 22:58:49 --> [REQ_ID=750c2ea5b0e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-29 22:58:49 --> [CSRF] token name=csrf_test_name hash=a5ec4a8b9fdc7085a32a45768f583fe7
DEBUG - 2026-03-29 22:58:49 --> [REQ_ID=4936fd82068e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-29 22:58:49 --> [REQ_ID=4936fd82068e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-29 22:58:50 --> [REQ_ID=4936fd82068e] [METHOD_ENTRY] index
DEBUG - 2026-03-29 22:58:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 22:58:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-29 22:58:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-29 22:58:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-29 22:58:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-29 22:58:50 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-29 22:58:50 --> HowItWorksController failure: overview
CRITICAL - 2026-03-29 22:58:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 22:58:50 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 22:58:50 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-29 22:58:50 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: none
INFO - 2026-03-29 22:58:50 --> [REQ_ID=4936fd82068e] [PERF] Execution time=0.152156
DEBUG - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [REQUEST][END]
INFO - 2026-03-29 23:00:01 --> [REQ_ID=7940270afa80] [PERF] Execution time=0.054140
DEBUG - 2026-03-29 23:01:22 --> [REQ_ID=27d1efb04b0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-29 23:03:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-29 23:03:39 --> [CSRF] token name=csrf_test_name hash=391b9c6d91ec6b7a3e66a41cc7a0cd85
DEBUG - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [REQUEST][END]
INFO - 2026-03-29 23:03:39 --> [REQ_ID=555c0837fab6] [PERF] Execution time=0.054225
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:03:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:03:40 --> [CSRF] token name=csrf_test_name hash=7ad0a1e1e321ea682d146651e9f674e6
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=c4f9eac85e99] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:03:40 --> [REQ_ID=c4f9eac85e99] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [FILTER_AFTER]
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [LIFECYCLE][END] status=200 duration_ms=158.63 memory_delta=0
INFO - 2026-03-29 23:03:40 --> [REQ_ID=c4f9eac85e99] [PERF] Execution time=0.158461
DEBUG - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [REQUEST][END]
INFO - 2026-03-29 23:03:40 --> [REQ_ID=bdb7b8c1a93d] [PERF] Execution time=0.170774
DEBUG - 2026-03-29 23:06:22 --> [REQ_ID=be24cc6df060] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:11:22 --> [REQ_ID=88ce9090b0ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [REQUEST][END]
INFO - 2026-03-29 23:15:01 --> [REQ_ID=2f4af08c8d4e] [PERF] Execution time=0.046406
DEBUG - 2026-03-29 23:16:22 --> [REQ_ID=a82977716393] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:21:22 --> [REQ_ID=694bdba08504] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:26:22 --> [REQ_ID=ecaff59dc97b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:27:56 --> [REQ_ID=0ae58d21bc14] [REQUEST][START] GET /
DEBUG - 2026-03-29 23:27:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:27:56 --> [REQ_ID=0ae58d21bc14] [FILTER_BEFORE] /
DEBUG - 2026-03-29 23:27:56 --> [REQ_ID=0ae58d21bc14] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 23:27:56 --> [REQ_ID=0ae58d21bc14] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 23:27:56 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
DEBUG - 2026-03-29 23:27:56 --> [REQ_ID=1362dedfdac3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 23:27:56 --> [REQ_ID=1362dedfdac3] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 23:27:57 --> [REQ_ID=1362dedfdac3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 23:27:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 23:27:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 23:27:57 --> [REQ_ID=1362dedfdac3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 23:27:57 --> [REQ_ID=1362dedfdac3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 23:27:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 23:27:57 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-29 23:27:57 --> [REQ_ID=0ae58d21bc14] [FILTER_AFTER]
DEBUG - 2026-03-29 23:27:57 --> [REQ_ID=0ae58d21bc14] [LIFECYCLE][END] status=200 duration_ms=661.34 memory_delta=4194304
INFO - 2026-03-29 23:27:57 --> [REQ_ID=1362dedfdac3] [PERF] Execution time=0.659342
DEBUG - 2026-03-29 23:27:57 --> [REQ_ID=0ae58d21bc14] [REQUEST][END]
INFO - 2026-03-29 23:27:57 --> [REQ_ID=0ae58d21bc14] [PERF] Execution time=0.702971
DEBUG - 2026-03-29 23:27:58 --> [REQ_ID=e029537fe026] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-29 23:27:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:27:58 --> [REQ_ID=e029537fe026] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-29 23:27:58 --> [REQ_ID=e029537fe026] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-29 23:27:58 --> [REQ_ID=e029537fe026] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-29 23:27:58 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
INFO - 2026-03-29 23:27:58 --> CSRF token verified.
DEBUG - 2026-03-29 23:27:58 --> [REQ_ID=89a5e880deb2] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-29 23:27:58 --> [REQ_ID=89a5e880deb2] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 23:27:58 --> [REGISTRATION] Submission received
INFO - 2026-03-29 23:27:58 --> MailService queued email
INFO - 2026-03-29 23:27:58 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-29 23:27:58 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-29 23:27:58 --> Registration created user_id=11760, email=hexashield@pm.me, username=Edwardser, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-29 23:27:58 --> [REGISTRATION] User record created
INFO - 2026-03-29 23:27:58 --> OnboardingProgressService: created onboarding record for user_id=11760
INFO - 2026-03-29 23:27:59 --> Registration succeeded for hexashield@pm.me (event e30ec47d50e8b9c0)
INFO - 2026-03-29 23:27:59 --> [REGISTRATION] Activation email queued
INFO - 2026-03-29 23:27:59 --> Registration redirecting to success guide for user_id=11760
DEBUG - 2026-03-29 23:27:59 --> [REQ_ID=e029537fe026] [FILTER_AFTER]
DEBUG - 2026-03-29 23:27:59 --> [REQ_ID=e029537fe026] [LIFECYCLE][END] status=302 duration_ms=1,218.52 memory_delta=0
INFO - 2026-03-29 23:27:59 --> [REQ_ID=89a5e880deb2] [PERF] Execution time=1.218168
DEBUG - 2026-03-29 23:27:59 --> [REQ_ID=e029537fe026] [REQUEST][END]
INFO - 2026-03-29 23:27:59 --> [REQ_ID=e029537fe026] [PERF] Execution time=1.230741
DEBUG - 2026-03-29 23:28:00 --> [REQ_ID=9aecaa2d4139] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-29 23:28:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:28:00 --> [REQ_ID=9aecaa2d4139] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-29 23:28:00 --> [REQ_ID=9aecaa2d4139] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-29 23:28:00 --> [REQ_ID=9aecaa2d4139] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-29 23:28:00 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
DEBUG - 2026-03-29 23:28:00 --> [REQ_ID=6791d3d44ef9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:28:00 --> [REQ_ID=6791d3d44ef9] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 23:28:00 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-29 23:28:00 --> [REQ_ID=6791d3d44ef9] [PERF] Execution time=0.010761
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:28:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:28:01 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=7671f576db09] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:28:01 --> [REQ_ID=7671f576db09] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [FILTER_AFTER]
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [LIFECYCLE][END] status=200 duration_ms=22.77 memory_delta=0
INFO - 2026-03-29 23:28:01 --> [REQ_ID=7671f576db09] [PERF] Execution time=0.022623
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [REQUEST][END]
INFO - 2026-03-29 23:28:01 --> [REQ_ID=65e55bd34a95] [PERF] Execution time=0.031744
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-29 23:28:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:28:01 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
INFO - 2026-03-29 23:28:01 --> CSRF token verified.
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=f7e078489f23] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-29 23:28:01 --> [REQ_ID=f7e078489f23] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 23:28:01 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-29 23:28:01 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-29 23:28:01 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 91.186.214.153, ua: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36
DEBUG - 2026-03-29 23:28:01 --> Auth attemptLogin() called with login identifier: Edwardser, remember: false
DEBUG - 2026-03-29 23:28:01 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-29 23:28:01 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-29 23:28:01 --> [AUTH_FAILURE] 
DEBUG - 2026-03-29 23:28:01 --> Auth attempt failed for identifier Edwardser. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Edwardser">Resend activation message one more time.</a>
WARNING - 2026-03-29 23:28:01 --> [AUTH] Login failure
WARNING - 2026-03-29 23:28:01 --> [AUTH] Login failed
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [FILTER_AFTER]
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [LIFECYCLE][END] status=302 duration_ms=99.42 memory_delta=0
INFO - 2026-03-29 23:28:01 --> [REQ_ID=f7e078489f23] [PERF] Execution time=0.099274
DEBUG - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [REQUEST][END]
INFO - 2026-03-29 23:28:01 --> [REQ_ID=cc8bdf038d15] [PERF] Execution time=0.108242
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:28:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:28:02 --> [CSRF] token name=csrf_test_name hash=f157bade979078398966ee4f18a28f8d
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=a2f07f1621cf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:28:02 --> [REQ_ID=a2f07f1621cf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [FILTER_AFTER]
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [LIFECYCLE][END] status=200 duration_ms=18.53 memory_delta=0
INFO - 2026-03-29 23:28:02 --> [REQ_ID=a2f07f1621cf] [PERF] Execution time=0.018378
DEBUG - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [REQUEST][END]
INFO - 2026-03-29 23:28:02 --> [REQ_ID=994c23a544a2] [PERF] Execution time=0.030317
DEBUG - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-29 23:29:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-29 23:29:43 --> [CSRF] token name=csrf_test_name hash=2bc5f81ee695d1dad5be749321e24db0
DEBUG - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [REQUEST][END]
INFO - 2026-03-29 23:29:43 --> [REQ_ID=2a6dcf99cd73] [PERF] Execution time=0.047309
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:29:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:29:44 --> [CSRF] token name=csrf_test_name hash=31080b9d615556c1d3858a8aa6277a9a
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=7bda6f0f6bb3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:29:44 --> [REQ_ID=7bda6f0f6bb3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [FILTER_AFTER]
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [LIFECYCLE][END] status=200 duration_ms=125.72 memory_delta=0
INFO - 2026-03-29 23:29:44 --> [REQ_ID=7bda6f0f6bb3] [PERF] Execution time=0.125578
DEBUG - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [REQUEST][END]
INFO - 2026-03-29 23:29:44 --> [REQ_ID=9ff417634a9a] [PERF] Execution time=0.140172
DEBUG - 2026-03-29 23:30:49 --> [REQ_ID=80002031f538] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-29 23:30:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:30:49 --> [REQ_ID=80002031f538] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-29 23:30:49 --> [REQ_ID=80002031f538] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-29 23:30:49 --> [REQ_ID=80002031f538] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-29 23:30:49 --> [CSRF] token name=csrf_test_name hash=8c04f7a03fdf88310b3e07233090ca3f
DEBUG - 2026-03-29 23:30:49 --> [REQ_ID=7b473cef8a07] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 23:30:49 --> [REQ_ID=7b473cef8a07] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 23:30:50 --> [REQ_ID=7b473cef8a07] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 23:30:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 23:30:50 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-29 23:30:50 --> [REQ_ID=7b473cef8a07] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-29 23:30:50 --> [REQ_ID=7b473cef8a07] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 23:30:50 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 23:30:50 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-29 23:30:50 --> [REQ_ID=80002031f538] [FILTER_AFTER]
DEBUG - 2026-03-29 23:30:50 --> [REQ_ID=80002031f538] [LIFECYCLE][END] status=200 duration_ms=558.80 memory_delta=4194304
INFO - 2026-03-29 23:30:50 --> [REQ_ID=7b473cef8a07] [PERF] Execution time=0.558610
DEBUG - 2026-03-29 23:30:50 --> [REQ_ID=80002031f538] [REQUEST][END]
INFO - 2026-03-29 23:30:50 --> [REQ_ID=80002031f538] [PERF] Execution time=0.570406
DEBUG - 2026-03-29 23:31:22 --> [REQ_ID=d725aba3b14b] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:36:22 --> [REQ_ID=9f328a4a7209] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-29 23:36:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-29 23:36:56 --> [CSRF] token name=csrf_test_name hash=b964d584d2fa9541ef9c7f74a86e9a9a
DEBUG - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [REQUEST][END]
INFO - 2026-03-29 23:36:56 --> [REQ_ID=2505d69e4331] [PERF] Execution time=0.028854
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:36:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:36:57 --> [CSRF] token name=csrf_test_name hash=7ce53fb39a86e383a165f299c8bb1f12
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=0e99a163e67e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:36:57 --> [REQ_ID=0e99a163e67e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [FILTER_AFTER]
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [LIFECYCLE][END] status=200 duration_ms=23.64 memory_delta=0
INFO - 2026-03-29 23:36:57 --> [REQ_ID=0e99a163e67e] [PERF] Execution time=0.022740
DEBUG - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [REQUEST][END]
INFO - 2026-03-29 23:36:57 --> [REQ_ID=a1a9c5e0bad6] [PERF] Execution time=0.035914
DEBUG - 2026-03-29 23:41:22 --> [REQ_ID=47b0bbe239a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [REQUEST][START] GET /
DEBUG - 2026-03-29 23:42:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [FILTER_BEFORE] /
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 23:42:05 --> [CSRF] token name=csrf_test_name hash=65e80a3a43945da5eb588d809199d1cf
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [MEMORY][controller-start] 4194304
INFO - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 23:42:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 23:42:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [MEMORY][commonData:start] 8388608
INFO - 2026-03-29 23:42:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-29 23:42:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [FILTER_AFTER]
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [LIFECYCLE][END] status=200 duration_ms=605.01 memory_delta=4194304
INFO - 2026-03-29 23:42:05 --> [REQ_ID=a38d38d59936] [PERF] Execution time=0.603030
DEBUG - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [REQUEST][END]
INFO - 2026-03-29 23:42:05 --> [REQ_ID=27c172768755] [PERF] Execution time=0.623466
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 23:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-29 23:42:15 --> [CSRF] token name=csrf_test_name hash=d92d0b650f5ea06b1c113e47d0cee16c
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [REQUEST][END]
INFO - 2026-03-29 23:42:15 --> [REQ_ID=a71262325a2a] [PERF] Execution time=0.018150
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:42:15 --> [CSRF] token name=csrf_test_name hash=bda38f62f9c1e87430281beae9891842
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=ebc96382fe2f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:42:15 --> [REQ_ID=ebc96382fe2f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [FILTER_AFTER]
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [LIFECYCLE][END] status=200 duration_ms=191.83 memory_delta=0
INFO - 2026-03-29 23:42:15 --> [REQ_ID=ebc96382fe2f] [PERF] Execution time=0.190082
DEBUG - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [REQUEST][END]
INFO - 2026-03-29 23:42:15 --> [REQ_ID=2f8e92bc6073] [PERF] Execution time=0.205142
DEBUG - 2026-03-29 23:44:19 --> [REQ_ID=638b0f0bd5c9] [REQUEST][START] GET /
DEBUG - 2026-03-29 23:44:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:44:19 --> [REQ_ID=638b0f0bd5c9] [FILTER_BEFORE] /
DEBUG - 2026-03-29 23:44:19 --> [REQ_ID=638b0f0bd5c9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-29 23:44:19 --> [REQ_ID=638b0f0bd5c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-29 23:44:19 --> [CSRF] token name=csrf_test_name hash=b94721b2d2da6c6aad14c6f58cba8336
DEBUG - 2026-03-29 23:44:19 --> [REQ_ID=683e6a947629] [INIT] App\Controllers\Home::GET
INFO - 2026-03-29 23:44:19 --> [REQ_ID=683e6a947629] [MEMORY][controller-start] 6291456
INFO - 2026-03-29 23:44:20 --> [REQ_ID=683e6a947629] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-29 23:44:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-29 23:44:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-29 23:44:20 --> [REQ_ID=683e6a947629] [VIEW_RENDER] themes/public/home
INFO - 2026-03-29 23:44:20 --> [REQ_ID=683e6a947629] [MEMORY][commonData:start] 10485760
INFO - 2026-03-29 23:44:20 --> themesMemory usage: 10485760
DEBUG - 2026-03-29 23:44:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-29 23:44:20 --> [REQ_ID=638b0f0bd5c9] [FILTER_AFTER]
DEBUG - 2026-03-29 23:44:20 --> [REQ_ID=638b0f0bd5c9] [LIFECYCLE][END] status=200 duration_ms=561.25 memory_delta=4194304
INFO - 2026-03-29 23:44:20 --> [REQ_ID=683e6a947629] [PERF] Execution time=0.559382
DEBUG - 2026-03-29 23:44:20 --> [REQ_ID=638b0f0bd5c9] [REQUEST][END]
INFO - 2026-03-29 23:44:20 --> [REQ_ID=638b0f0bd5c9] [PERF] Execution time=0.599417
DEBUG - 2026-03-29 23:46:22 --> [REQ_ID=7ff064a818fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:51:22 --> [REQ_ID=69ff6ffa0beb] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-29 23:54:17 --> [REQ_ID=b3399d70d810] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-29 23:54:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=b3399d70d810] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=b3399d70d810] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=b3399d70d810] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-29 23:54:18 --> [CSRF] token name=csrf_test_name hash=21fd9a6f0f8c518b0f5760a8315bacfa
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=b3399d70d810] [REQUEST][END]
INFO - 2026-03-29 23:54:18 --> [REQ_ID=b3399d70d810] [PERF] Execution time=0.070869
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-29 23:54:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-29 23:54:18 --> [CSRF] token name=csrf_test_name hash=a1d45a2d1be0d622963900d77b134174
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=24adbb4a9331] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-29 23:54:18 --> [REQ_ID=24adbb4a9331] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [FILTER_AFTER]
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [LIFECYCLE][END] status=200 duration_ms=62.84 memory_delta=0
INFO - 2026-03-29 23:54:18 --> [REQ_ID=24adbb4a9331] [PERF] Execution time=0.062641
DEBUG - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [REQUEST][END]
INFO - 2026-03-29 23:54:18 --> [REQ_ID=a6a723d5606c] [PERF] Execution time=0.074671
DEBUG - 2026-03-29 23:56:22 --> [REQ_ID=8ba87b12ebc6] [REQUEST][START] HEAD /
DEBUG - 2026-03-29 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-29 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-29 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-29 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-29 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
