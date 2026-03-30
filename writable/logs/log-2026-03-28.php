<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [REQUEST][END]
INFO - 2026-03-28 00:00:01 --> [REQ_ID=e0313934a0ae] [PERF] Execution time=0.047923
DEBUG - 2026-03-28 00:01:22 --> [REQ_ID=3bdf3f448407] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:06:22 --> [REQ_ID=f88da6b1fb31] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:11:22 --> [REQ_ID=eeb9f9cb8678] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [REQUEST][END]
INFO - 2026-03-28 00:15:01 --> [REQ_ID=e7df0ef86ed5] [PERF] Execution time=0.048638
DEBUG - 2026-03-28 00:16:22 --> [REQ_ID=d933ca8e6aa2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:21:22 --> [REQ_ID=265e2123a163] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:26:22 --> [REQ_ID=f9993a836d57] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:31:22 --> [REQ_ID=d2be6fcf0739] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:36:22 --> [REQ_ID=67b5b96ad10e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:36:59 --> [REQ_ID=6d87e3c7dadb] [REQUEST][START] GET /
DEBUG - 2026-03-28 00:36:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 00:36:59 --> [REQ_ID=6d87e3c7dadb] [REQUEST][END]
INFO - 2026-03-28 00:36:59 --> [REQ_ID=6d87e3c7dadb] [PERF] Execution time=0.018125
DEBUG - 2026-03-28 00:37:00 --> [REQ_ID=2826f0cf6bde] [REQUEST][START] GET /
DEBUG - 2026-03-28 00:37:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 00:37:00 --> [REQ_ID=2826f0cf6bde] [REQUEST][END]
INFO - 2026-03-28 00:37:00 --> [REQ_ID=2826f0cf6bde] [PERF] Execution time=0.008933
DEBUG - 2026-03-28 00:41:22 --> [REQ_ID=123a35a42b76] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:46:22 --> [REQ_ID=8f978f0abf83] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:51:22 --> [REQ_ID=faab3afe3710] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 00:56:22 --> [REQ_ID=df807f3dfaaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 00:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 00:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 00:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 00:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [REQUEST][END]
INFO - 2026-03-28 01:00:01 --> [REQ_ID=d00cb7ef6418] [PERF] Execution time=0.052007
DEBUG - 2026-03-28 01:01:22 --> [REQ_ID=77f353fca60d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:06:22 --> [REQ_ID=f9548319a779] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:11:22 --> [REQ_ID=16f4d0b2ae30] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:12:42 --> [REQ_ID=17435a85c38f] [REQUEST][START] GET /
DEBUG - 2026-03-28 01:12:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:12:42 --> [REQ_ID=17435a85c38f] [REQUEST][END]
INFO - 2026-03-28 01:12:42 --> [REQ_ID=17435a85c38f] [PERF] Execution time=0.039221
DEBUG - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [REQUEST][END]
INFO - 2026-03-28 01:15:01 --> [REQ_ID=aa2d194e9a01] [PERF] Execution time=0.046152
DEBUG - 2026-03-28 01:16:22 --> [REQ_ID=ae548671a417] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:19:27 --> [REQ_ID=06cb2d12aa51] [REQUEST][START] GET /
DEBUG - 2026-03-28 01:19:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:19:27 --> [REQ_ID=06cb2d12aa51] [REQUEST][END]
INFO - 2026-03-28 01:19:27 --> [REQ_ID=06cb2d12aa51] [PERF] Execution time=0.038685
DEBUG - 2026-03-28 01:21:22 --> [REQ_ID=d7e0126d5374] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:26:22 --> [REQ_ID=f042f2f30ab9] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:31:22 --> [REQ_ID=67092f0add28] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:31:52 --> [REQ_ID=8a6dcf76c133] [REQUEST][START] GET /
DEBUG - 2026-03-28 01:31:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:31:52 --> [REQ_ID=8a6dcf76c133] [REQUEST][END]
INFO - 2026-03-28 01:31:52 --> [REQ_ID=8a6dcf76c133] [PERF] Execution time=0.017595
DEBUG - 2026-03-28 01:36:22 --> [REQ_ID=ac336faf1279] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:41:22 --> [REQ_ID=fe31c8963f22] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:46:22 --> [REQ_ID=10ab0a6d4e8b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:49:52 --> [REQ_ID=ae3aa581f1b4] [REQUEST][START] GET /
DEBUG - 2026-03-28 01:49:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:49:52 --> [REQ_ID=ae3aa581f1b4] [FILTER_BEFORE] /
DEBUG - 2026-03-28 01:49:52 --> [REQ_ID=ae3aa581f1b4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 01:49:52 --> [REQ_ID=ae3aa581f1b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 01:49:52 --> [CSRF] token name=csrf_test_name hash=cc5987dce669e5dd16c805f6b58515ce
DEBUG - 2026-03-28 01:49:52 --> [REQ_ID=110d3cf368d1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 01:49:52 --> [REQ_ID=110d3cf368d1] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 01:49:52 --> [REQ_ID=110d3cf368d1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 01:49:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 01:49:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 01:49:53 --> [REQ_ID=110d3cf368d1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 01:49:53 --> [REQ_ID=110d3cf368d1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 01:49:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 01:49:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 01:49:53 --> [REQ_ID=ae3aa581f1b4] [FILTER_AFTER]
DEBUG - 2026-03-28 01:49:53 --> [REQ_ID=ae3aa581f1b4] [LIFECYCLE][END] status=200 duration_ms=625.32 memory_delta=4194304
INFO - 2026-03-28 01:49:53 --> [REQ_ID=110d3cf368d1] [PERF] Execution time=0.623434
DEBUG - 2026-03-28 01:49:53 --> [REQ_ID=ae3aa581f1b4] [REQUEST][END]
INFO - 2026-03-28 01:49:53 --> [REQ_ID=ae3aa581f1b4] [PERF] Execution time=0.667603
DEBUG - 2026-03-28 01:51:22 --> [REQ_ID=7e540c838d0b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 01:52:16 --> [REQ_ID=c8a8bec6ef8a] [REQUEST][START] GET /
DEBUG - 2026-03-28 01:52:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 01:52:16 --> [REQ_ID=c8a8bec6ef8a] [FILTER_BEFORE] /
DEBUG - 2026-03-28 01:52:16 --> [REQ_ID=c8a8bec6ef8a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 01:52:16 --> [REQ_ID=c8a8bec6ef8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 01:52:16 --> [CSRF] token name=csrf_test_name hash=b6f8933dec16be118ecbcdc79af832d6
DEBUG - 2026-03-28 01:52:16 --> [REQ_ID=228f45d10ffd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 01:52:16 --> [REQ_ID=228f45d10ffd] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 01:52:16 --> [REQ_ID=228f45d10ffd] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 01:52:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 01:52:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 01:52:17 --> [REQ_ID=228f45d10ffd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 01:52:17 --> [REQ_ID=228f45d10ffd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 01:52:17 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 01:52:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 01:52:17 --> [REQ_ID=c8a8bec6ef8a] [FILTER_AFTER]
DEBUG - 2026-03-28 01:52:17 --> [REQ_ID=c8a8bec6ef8a] [LIFECYCLE][END] status=200 duration_ms=483.21 memory_delta=4194304
INFO - 2026-03-28 01:52:17 --> [REQ_ID=228f45d10ffd] [PERF] Execution time=0.482942
DEBUG - 2026-03-28 01:52:17 --> [REQ_ID=c8a8bec6ef8a] [REQUEST][END]
INFO - 2026-03-28 01:52:17 --> [REQ_ID=c8a8bec6ef8a] [PERF] Execution time=0.492662
DEBUG - 2026-03-28 01:56:22 --> [REQ_ID=789f6641a50c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 01:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 01:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 01:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 01:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [REQUEST][END]
INFO - 2026-03-28 02:00:02 --> [REQ_ID=975df66dd869] [PERF] Execution time=0.047074
DEBUG - 2026-03-28 02:01:22 --> [REQ_ID=a98e0ac8456b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:06:22 --> [REQ_ID=97975f4f8097] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:07:24 --> [REQ_ID=463d278c995d] [REQUEST][START] GET /
DEBUG - 2026-03-28 02:07:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 02:07:24 --> [REQ_ID=463d278c995d] [FILTER_BEFORE] /
DEBUG - 2026-03-28 02:07:24 --> [REQ_ID=463d278c995d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 02:07:24 --> [REQ_ID=463d278c995d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 02:07:24 --> [CSRF] token name=csrf_test_name hash=957ca550513d843a965fb108f83cb0ac
DEBUG - 2026-03-28 02:07:24 --> [REQ_ID=f333aa07e95b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 02:07:24 --> [REQ_ID=f333aa07e95b] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 02:07:24 --> [REQ_ID=f333aa07e95b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 02:07:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 02:07:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 02:07:25 --> [REQ_ID=f333aa07e95b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 02:07:25 --> [REQ_ID=f333aa07e95b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 02:07:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 02:07:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 02:07:25 --> [REQ_ID=463d278c995d] [FILTER_AFTER]
DEBUG - 2026-03-28 02:07:25 --> [REQ_ID=463d278c995d] [LIFECYCLE][END] status=200 duration_ms=599.56 memory_delta=4194304
INFO - 2026-03-28 02:07:25 --> [REQ_ID=f333aa07e95b] [PERF] Execution time=0.597472
DEBUG - 2026-03-28 02:07:25 --> [REQ_ID=463d278c995d] [REQUEST][END]
INFO - 2026-03-28 02:07:25 --> [REQ_ID=463d278c995d] [PERF] Execution time=0.618236
DEBUG - 2026-03-28 02:11:22 --> [REQ_ID=7c19a615c446] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [REQUEST][END]
INFO - 2026-03-28 02:15:01 --> [REQ_ID=249520faf455] [PERF] Execution time=0.045503
DEBUG - 2026-03-28 02:16:22 --> [REQ_ID=6f4d72c1ded5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:21:22 --> [REQ_ID=25463004afc6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:25:22 --> [REQ_ID=e60547103a8e] [REQUEST][START] GET /
DEBUG - 2026-03-28 02:25:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 02:25:22 --> [REQ_ID=e60547103a8e] [FILTER_BEFORE] /
DEBUG - 2026-03-28 02:25:22 --> [REQ_ID=e60547103a8e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 02:25:22 --> [REQ_ID=e60547103a8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 02:25:22 --> [CSRF] token name=csrf_test_name hash=a17232f6d199e238b29c2936e3a6af99
DEBUG - 2026-03-28 02:25:22 --> [REQ_ID=45b0f8781b1c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 02:25:22 --> [REQ_ID=45b0f8781b1c] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 02:25:22 --> [REQ_ID=45b0f8781b1c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 02:25:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 02:25:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 02:25:23 --> [REQ_ID=45b0f8781b1c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 02:25:23 --> [REQ_ID=45b0f8781b1c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 02:25:23 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 02:25:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 02:25:23 --> [REQ_ID=e60547103a8e] [FILTER_AFTER]
DEBUG - 2026-03-28 02:25:23 --> [REQ_ID=e60547103a8e] [LIFECYCLE][END] status=200 duration_ms=652.60 memory_delta=4194304
INFO - 2026-03-28 02:25:23 --> [REQ_ID=45b0f8781b1c] [PERF] Execution time=0.650674
DEBUG - 2026-03-28 02:25:23 --> [REQ_ID=e60547103a8e] [REQUEST][END]
INFO - 2026-03-28 02:25:23 --> [REQ_ID=e60547103a8e] [PERF] Execution time=0.691228
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [REQUEST][START] GET /
DEBUG - 2026-03-28 02:25:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [FILTER_BEFORE] /
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 02:25:24 --> [CSRF] token name=csrf_test_name hash=a17232f6d199e238b29c2936e3a6af99
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 02:25:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 02:25:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 02:25:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 02:25:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [FILTER_AFTER]
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [LIFECYCLE][END] status=200 duration_ms=562.88 memory_delta=4194304
INFO - 2026-03-28 02:25:24 --> [REQ_ID=be8c166fe14f] [PERF] Execution time=0.562706
DEBUG - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [REQUEST][END]
INFO - 2026-03-28 02:25:24 --> [REQ_ID=d8b59b7b7c86] [PERF] Execution time=0.572352
DEBUG - 2026-03-28 02:26:22 --> [REQ_ID=2cd929b3722e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:31:22 --> [REQ_ID=93c4d936537c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:36:22 --> [REQ_ID=7bd7b600bb08] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:41:22 --> [REQ_ID=a29dbed2d7ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:46:22 --> [REQ_ID=205f3d73a9e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:51:22 --> [REQ_ID=5815fbd06eef] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 02:56:27 --> [REQ_ID=76089a14ebfb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 02:56:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 02:56:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 02:56:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 02:56:27 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 02:56:27 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [REQUEST][END]
INFO - 2026-03-28 03:00:01 --> [REQ_ID=874fb7801b4b] [PERF] Execution time=0.047212
DEBUG - 2026-03-28 03:01:22 --> [REQ_ID=6c3249b744d2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:06:22 --> [REQ_ID=66daa4890217] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:11:22 --> [REQ_ID=31cd8f72fe53] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 03:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [REQUEST][END]
INFO - 2026-03-28 03:15:02 --> [REQ_ID=711ea2929283] [PERF] Execution time=0.045592
DEBUG - 2026-03-28 03:16:22 --> [REQ_ID=18832402bd2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:21:22 --> [REQ_ID=a4680051fdda] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:26:22 --> [REQ_ID=e6a5bf6353e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:31:22 --> [REQ_ID=98ce577c82f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 03:35:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:51 --> [CSRF] token name=csrf_test_name hash=7b52b70d3757e470330eb456de71271d
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [REQUEST][END]
INFO - 2026-03-28 03:35:51 --> [REQ_ID=0001cc5244ca] [PERF] Execution time=0.043501
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 03:35:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:51 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=b8a93fc5a76a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 03:35:51 --> [REQ_ID=b8a93fc5a76a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [FILTER_AFTER]
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [LIFECYCLE][END] status=200 duration_ms=121.71 memory_delta=0
INFO - 2026-03-28 03:35:51 --> [REQ_ID=b8a93fc5a76a] [PERF] Execution time=0.121598
DEBUG - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [REQUEST][END]
INFO - 2026-03-28 03:35:51 --> [REQ_ID=327aaa0d10ab] [PERF] Execution time=0.130797
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 03:35:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:53 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [REQUEST][END]
INFO - 2026-03-28 03:35:53 --> [REQ_ID=054be394f8fd] [PERF] Execution time=0.008998
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 03:35:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:53 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=d87ef34d0904] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 03:35:53 --> [REQ_ID=d87ef34d0904] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [FILTER_AFTER]
DEBUG - 2026-03-28 03:35:53 --> [REQ_ID=605d3a04d72d] [LIFECYCLE][END] status=200 duration_ms=19.43 memory_delta=0
INFO - 2026-03-28 03:35:54 --> [REQ_ID=d87ef34d0904] [PERF] Execution time=0.019402
DEBUG - 2026-03-28 03:35:54 --> [REQ_ID=605d3a04d72d] [REQUEST][END]
INFO - 2026-03-28 03:35:54 --> [REQ_ID=605d3a04d72d] [PERF] Execution time=0.029660
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 03:35:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:56 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=17a338c5db5d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 03:35:56 --> [REQ_ID=17a338c5db5d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [FILTER_AFTER]
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [LIFECYCLE][END] status=200 duration_ms=25.19 memory_delta=0
INFO - 2026-03-28 03:35:56 --> [REQ_ID=17a338c5db5d] [PERF] Execution time=0.025075
DEBUG - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [REQUEST][END]
INFO - 2026-03-28 03:35:56 --> [REQ_ID=a6be3f4110cb] [PERF] Execution time=0.034341
DEBUG - 2026-03-28 03:35:58 --> [REQ_ID=50a80aa7e4ea] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 03:35:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:58 --> [REQ_ID=50a80aa7e4ea] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 03:35:58 --> [REQ_ID=50a80aa7e4ea] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 03:35:58 --> [REQ_ID=50a80aa7e4ea] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 03:35:58 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
INFO - 2026-03-28 03:35:58 --> CSRF token verified.
DEBUG - 2026-03-28 03:35:58 --> [REQ_ID=562c2791c419] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 03:35:58 --> [REQ_ID=562c2791c419] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 03:35:58 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-28 03:35:58 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-28 03:35:58 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36
DEBUG - 2026-03-28 03:35:58 --> Auth attemptLogin() called with login identifier: tburks2392, remember: false
DEBUG - 2026-03-28 03:35:58 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-28 03:35:58 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-28 03:35:59 --> Auth attempt succeeded for identifier tburks2392. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-28 03:35:59 --> Auth attempt succeeded. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-28 03:35:59 --> Auth attemptLogin() - session user_id set to: 2
INFO - 2026-03-28 03:35:59 --> [AUTH] Login success
DEBUG - 2026-03-28 03:35:59 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=50a80aa7e4ea] [FILTER_AFTER]
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=50a80aa7e4ea] [LIFECYCLE][END] status=303 duration_ms=122.14 memory_delta=0
INFO - 2026-03-28 03:35:59 --> [REQ_ID=562c2791c419] [PERF] Execution time=0.121976
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=50a80aa7e4ea] [REQUEST][END]
INFO - 2026-03-28 03:35:59 --> [REQ_ID=50a80aa7e4ea] [PERF] Execution time=0.131563
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-28 03:35:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 03:35:59 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [METHOD_ENTRY] index
DEBUG - 2026-03-28 03:35:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:35:59 --> [DASHBOARD] Enter
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-28 03:35:59 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-28 03:35:59 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-28 03:35:59 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 03:35:59\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 03:35:59\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 03:35:59\'')
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
DEBUG - 2026-03-28 03:35:59 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-28 03:35:59 --> 📰 Daily dashboard news window 2026-03-28 00:00:00 -> 2026-03-28 23:59:59 returned 0 rows
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SETUP] Status computed
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-28 03:35:59 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 03:35:59 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-28 03:35:59 --> getSolanaData: invalid address param
INFO - 2026-03-28 03:35:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [FILTER_AFTER]
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [LIFECYCLE][END] status=200 duration_ms=733.78 memory_delta=4194304
INFO - 2026-03-28 03:35:59 --> [REQ_ID=48f488b7cd4c] [PERF] Execution time=0.727909
DEBUG - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [REQUEST][END]
INFO - 2026-03-28 03:35:59 --> [REQ_ID=b56fc6e0fc03] [PERF] Execution time=0.750668
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=ec44db01996d] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 03:36:00 --> [REQ_ID=ec44db01996d] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:00 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:36:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e6ad143c0c5c] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [LIFECYCLE][END] status=200 duration_ms=288.15 memory_delta=0
INFO - 2026-03-28 03:36:00 --> [REQ_ID=ec44db01996d] [PERF] Execution time=0.288101
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [REQUEST][END]
INFO - 2026-03-28 03:36:00 --> [REQ_ID=715fddc50577] [PERF] Execution time=0.301199
DEBUG - 2026-03-28 03:36:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=27ef5adc2687] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=ef61dbc76dfc] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 03:36:00 --> [REQ_ID=ef61dbc76dfc] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:00 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:36:00 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 03:36:00 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 03:36:00 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=2 tier=free status=free
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [LIFECYCLE][END] status=302 duration_ms=131.15 memory_delta=2097152
INFO - 2026-03-28 03:36:00 --> [REQ_ID=ef61dbc76dfc] [PERF] Execution time=0.130436
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [REQUEST][END]
INFO - 2026-03-28 03:36:00 --> [REQ_ID=644a57f0e081] [PERF] Execution time=0.291266
DEBUG - 2026-03-28 03:36:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=3ed89dadd6c0] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 03:36:00 --> [REQ_ID=3ed89dadd6c0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=be8352752599] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=14882d3a5a38] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:00 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:36:00 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 03:36:00 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 03:36:00 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [LIFECYCLE][END] status=302 duration_ms=132.19 memory_delta=2097152
INFO - 2026-03-28 03:36:00 --> [REQ_ID=3ed89dadd6c0] [PERF] Execution time=0.131418
DEBUG - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [REQUEST][END]
INFO - 2026-03-28 03:36:00 --> [REQ_ID=e4383dcf405e] [PERF] Execution time=0.438165
DEBUG - 2026-03-28 03:36:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=c7bf0a025277] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 03:36:01 --> [REQ_ID=c7bf0a025277] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:01 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:36:01 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 03:36:01 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 03:36:01 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [LIFECYCLE][END] status=302 duration_ms=134.87 memory_delta=2097152
INFO - 2026-03-28 03:36:01 --> [REQ_ID=c7bf0a025277] [PERF] Execution time=0.134125
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [REQUEST][END]
INFO - 2026-03-28 03:36:01 --> [REQ_ID=e6ad143c0c5c] [PERF] Execution time=0.582317
DEBUG - 2026-03-28 03:36:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-28 03:36:01 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=08b9ea2395c8] [INIT] App\Controllers\OpsHealthController::GET
INFO - 2026-03-28 03:36:01 --> [REQ_ID=08b9ea2395c8] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=08b9ea2395c8] [METHOD_ENTRY] index
DEBUG - 2026-03-28 03:36:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [LIFECYCLE][END] status=404 duration_ms=86.51 memory_delta=0
INFO - 2026-03-28 03:36:01 --> [REQ_ID=08b9ea2395c8] [PERF] Execution time=0.059941
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [REQUEST][END]
INFO - 2026-03-28 03:36:01 --> [REQ_ID=27ef5adc2687] [PERF] Execution time=0.614331
DEBUG - 2026-03-28 03:36:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 03:36:01 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 03:36:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:01 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 03:36:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 03:36:01 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [LIFECYCLE][END] status=200 duration_ms=589.54 memory_delta=4194304
INFO - 2026-03-28 03:36:01 --> [REQ_ID=e86a50b8018a] [PERF] Execution time=0.589206
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [REQUEST][END]
INFO - 2026-03-28 03:36:01 --> [REQ_ID=be8352752599] [PERF] Execution time=0.983873
DEBUG - 2026-03-28 03:36:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=b00082020de0] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 03:36:01 --> [REQ_ID=b00082020de0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:01 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 03:36:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [LIFECYCLE][END] status=200 duration_ms=17.73 memory_delta=0
INFO - 2026-03-28 03:36:01 --> [REQ_ID=b00082020de0] [PERF] Execution time=0.017679
DEBUG - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [REQUEST][END]
INFO - 2026-03-28 03:36:01 --> [REQ_ID=14882d3a5a38] [PERF] Execution time=1.010060
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 03:36:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:02 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 03:36:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 03:36:02 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [LIFECYCLE][END] status=200 duration_ms=538.00 memory_delta=4194304
INFO - 2026-03-28 03:36:02 --> [REQ_ID=e4b2242bdf8b] [PERF] Execution time=0.536625
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [REQUEST][END]
INFO - 2026-03-28 03:36:02 --> [REQ_ID=48cb793fbf2a] [PERF] Execution time=0.547766
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e200841b2d81] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e200841b2d81] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e200841b2d81] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=e200841b2d81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 03:36:02 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:02 --> [REQ_ID=44e6e74a2481] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 03:36:02 --> [REQ_ID=44e6e74a2481] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 03:36:02 --> [REQ_ID=44e6e74a2481] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 03:36:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:03 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 03:36:03 --> [REQ_ID=44e6e74a2481] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 03:36:03 --> [REQ_ID=44e6e74a2481] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 03:36:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 03:36:03 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-28 03:36:03 --> [REQ_ID=e200841b2d81] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:03 --> [REQ_ID=e200841b2d81] [LIFECYCLE][END] status=200 duration_ms=544.64 memory_delta=2097152
INFO - 2026-03-28 03:36:03 --> [REQ_ID=44e6e74a2481] [PERF] Execution time=0.544585
DEBUG - 2026-03-28 03:36:03 --> [REQ_ID=e200841b2d81] [REQUEST][END]
INFO - 2026-03-28 03:36:03 --> [REQ_ID=e200841b2d81] [PERF] Execution time=0.553972
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-28 03:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-28 03:36:16 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [METHOD_ENTRY] index
DEBUG - 2026-03-28 03:36:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [VIEW_RENDER] App\Modules\User\Views\Projects\view
INFO - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [MEMORY][commonData:start] 6291456
WARNING - 2026-03-28 03:36:16 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 52.
 1 APPPATH/Modules/User/Views/Projects/view.php(52): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-03-28 03:36:16 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 53.
 1 APPPATH/Modules/User/Views/Projects/view.php(53): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-28 03:36:16 --> themesMemory usage: 6291456
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [LIFECYCLE][END] status=200 duration_ms=133.85 memory_delta=0
INFO - 2026-03-28 03:36:16 --> [REQ_ID=12708be52cf1] [PERF] Execution time=0.062194
DEBUG - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [REQUEST][END]
INFO - 2026-03-28 03:36:16 --> [REQ_ID=8db9c43e2378] [PERF] Execution time=0.146419
DEBUG - 2026-03-28 03:36:22 --> [REQ_ID=318a8113561e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=8a623c864c6e] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=8a623c864c6e] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=8a623c864c6e] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=8a623c864c6e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:31 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=caad47de62d6] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-28 03:36:31 --> [REQ_ID=caad47de62d6] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:36:31 --> [REQ_ID=caad47de62d6] [METHOD_ENTRY] fund
DEBUG - 2026-03-28 03:36:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:31 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-28 03:36:31 --> [REQ_ID=caad47de62d6] [PERF] Execution time=0.039890
DEBUG - 2026-03-28 03:36:35 --> [REQ_ID=73c07fe4ac0c] [REQUEST][START] GET /index.php/Projects/fund
DEBUG - 2026-03-28 03:36:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:36:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Projects/fund]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:36:35 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:36:35 --> [404] URI=https://www.mymiwallet.com/index.php/Projects/fund
WARNING - 2026-03-28 03:36:35 --> 404 route miss: https://www.mymiwallet.com/index.php/Projects/fund | referrer: none
ERROR - 2026-03-28 03:36:35 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=f0d254cd2ed0] [REQUEST][START] GET /index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=f0d254cd2ed0] [FILTER_BEFORE] /index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=f0d254cd2ed0] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=fund
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=f0d254cd2ed0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects/Fund
DEBUG - 2026-03-28 03:36:39 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=87056689b44d] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-28 03:36:39 --> [REQ_ID=87056689b44d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:36:39 --> [REQ_ID=87056689b44d] [METHOD_ENTRY] fund
DEBUG - 2026-03-28 03:36:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:39 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-28 03:36:39 --> [REQ_ID=87056689b44d] [PERF] Execution time=0.017077
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-28 03:36:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-28 03:36:44 --> [CSRF] token name=csrf_test_name hash=deb8ca3af669e0aed51c9b9184b2130d
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [METHOD_ENTRY] index
DEBUG - 2026-03-28 03:36:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 03:36:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [VIEW_RENDER] App\Modules\User\Views\Projects\view
INFO - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [MEMORY][commonData:start] 4194304
WARNING - 2026-03-28 03:36:44 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 52.
 1 APPPATH/Modules/User/Views/Projects/view.php(52): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-03-28 03:36:44 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 53.
 1 APPPATH/Modules/User/Views/Projects/view.php(53): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-28 03:36:44 --> themesMemory usage: 4194304
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [FILTER_AFTER]
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [LIFECYCLE][END] status=200 duration_ms=293.33 memory_delta=0
INFO - 2026-03-28 03:36:44 --> [REQ_ID=0357e3cc3998] [PERF] Execution time=0.042286
DEBUG - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [REQUEST][END]
INFO - 2026-03-28 03:36:44 --> [REQ_ID=de87c0975919] [PERF] Execution time=0.302662
DEBUG - 2026-03-28 03:41:22 --> [REQ_ID=9c3b362501c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:46:22 --> [REQ_ID=38c295bc1bf3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:46:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:46:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:46:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:48:59 --> [REQ_ID=c6a7394a1035] [REQUEST][START] GET /
DEBUG - 2026-03-28 03:48:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 03:48:59 --> [REQ_ID=c6a7394a1035] [REQUEST][END]
INFO - 2026-03-28 03:48:59 --> [REQ_ID=c6a7394a1035] [PERF] Execution time=0.040064
DEBUG - 2026-03-28 03:51:22 --> [REQ_ID=612c5f024c42] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 03:56:22 --> [REQ_ID=b530c218e07c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 03:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 03:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 03:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 03:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [REQUEST][END]
INFO - 2026-03-28 04:00:01 --> [REQ_ID=3da1278af08a] [PERF] Execution time=0.118064
DEBUG - 2026-03-28 04:01:22 --> [REQ_ID=e19a53ca406f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:06:22 --> [REQ_ID=4279a0feb973] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:11:22 --> [REQ_ID=856f29ce5969] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [REQUEST][END]
INFO - 2026-03-28 04:15:01 --> [REQ_ID=fee007a12925] [PERF] Execution time=0.046940
DEBUG - 2026-03-28 04:16:22 --> [REQ_ID=e84d3d23f60f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:21:22 --> [REQ_ID=76052ff64134] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:26:22 --> [REQ_ID=48c09f9c5d84] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:31:22 --> [REQ_ID=83a7f732085e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:31:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:31:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:31:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:36:22 --> [REQ_ID=37fdc5f816be] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:41:22 --> [REQ_ID=83c0cdadaf5a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:46:22 --> [REQ_ID=321e5c63fe41] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:51:22 --> [REQ_ID=4f572056c023] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 04:56:22 --> [REQ_ID=6db21589f658] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 04:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 04:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 04:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 04:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [REQUEST][END]
INFO - 2026-03-28 05:00:02 --> [REQ_ID=b7cc35aeaed8] [PERF] Execution time=0.049284
DEBUG - 2026-03-28 05:01:22 --> [REQ_ID=6c89583be636] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [REQUEST][START] GET /
DEBUG - 2026-03-28 05:01:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [FILTER_BEFORE] /
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 05:01:42 --> [CSRF] token name=csrf_test_name hash=41f70c57d6c9c218a9a84e9d124feb72
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 05:01:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 05:01:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 05:01:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 05:01:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [FILTER_AFTER]
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [LIFECYCLE][END] status=200 duration_ms=712.43 memory_delta=4194304
INFO - 2026-03-28 05:01:42 --> [REQ_ID=642d098b1b72] [PERF] Execution time=0.710495
DEBUG - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [REQUEST][END]
INFO - 2026-03-28 05:01:42 --> [REQ_ID=5acb7dc5009e] [PERF] Execution time=0.730937
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [REQUEST][START] GET /
DEBUG - 2026-03-28 05:01:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [FILTER_BEFORE] /
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 05:01:56 --> [CSRF] token name=csrf_test_name hash=70f09f5ae6c3363c78b28e79240a02b8
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 05:01:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 05:01:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 05:01:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 05:01:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [FILTER_AFTER]
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [LIFECYCLE][END] status=200 duration_ms=533.71 memory_delta=2097152
INFO - 2026-03-28 05:01:56 --> [REQ_ID=5f295f5aac12] [PERF] Execution time=0.533395
DEBUG - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [REQUEST][END]
INFO - 2026-03-28 05:01:56 --> [REQ_ID=994c3f0ada4a] [PERF] Execution time=0.543382
DEBUG - 2026-03-28 05:06:22 --> [REQ_ID=28f1e2c6b461] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:11:22 --> [REQ_ID=8af8a1b48d8e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [REQUEST][END]
INFO - 2026-03-28 05:15:01 --> [REQ_ID=437b5358537b] [PERF] Execution time=0.045441
DEBUG - 2026-03-28 05:16:22 --> [REQ_ID=95905c95e2d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:21:22 --> [REQ_ID=7314fa3c48c7] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:26:22 --> [REQ_ID=0c56327a6725] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:31:22 --> [REQ_ID=1d116c65758b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:36:22 --> [REQ_ID=18d3d93008b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:41:22 --> [REQ_ID=aebed0dd83c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:43:01 --> [REQ_ID=b4812111fbc8] [REQUEST][START] GET /
DEBUG - 2026-03-28 05:43:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:43:01 --> [REQ_ID=b4812111fbc8] [FILTER_BEFORE] /
DEBUG - 2026-03-28 05:43:01 --> [REQ_ID=b4812111fbc8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 05:43:01 --> [REQ_ID=b4812111fbc8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 05:43:01 --> [CSRF] token name=csrf_test_name hash=810df6e05a84adc014b55f2ce7c47d17
DEBUG - 2026-03-28 05:43:01 --> [REQ_ID=cb7b70cae8e7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 05:43:01 --> [REQ_ID=cb7b70cae8e7] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 05:43:01 --> [REQ_ID=cb7b70cae8e7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 05:43:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 05:43:02 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 05:43:02 --> [REQ_ID=cb7b70cae8e7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 05:43:02 --> [REQ_ID=cb7b70cae8e7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 05:43:02 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 05:43:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:43:02 --> [REQ_ID=b4812111fbc8] [FILTER_AFTER]
DEBUG - 2026-03-28 05:43:02 --> [REQ_ID=b4812111fbc8] [LIFECYCLE][END] status=200 duration_ms=656.66 memory_delta=4194304
INFO - 2026-03-28 05:43:02 --> [REQ_ID=cb7b70cae8e7] [PERF] Execution time=0.654633
DEBUG - 2026-03-28 05:43:02 --> [REQ_ID=b4812111fbc8] [REQUEST][END]
INFO - 2026-03-28 05:43:02 --> [REQ_ID=b4812111fbc8] [PERF] Execution time=0.695777
DEBUG - 2026-03-28 05:46:22 --> [REQ_ID=9eaf0f01c4bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:51:22 --> [REQ_ID=d37dbc902024] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 05:52:05 --> [REQ_ID=ed1bcc6da287] [REQUEST][START] GET /
DEBUG - 2026-03-28 05:52:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:52:05 --> [REQ_ID=ed1bcc6da287] [FILTER_BEFORE] /
DEBUG - 2026-03-28 05:52:05 --> [REQ_ID=ed1bcc6da287] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 05:52:05 --> [REQ_ID=ed1bcc6da287] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 05:52:05 --> [CSRF] token name=csrf_test_name hash=27704434f7f63400dc4f30a83c3d9a98
DEBUG - 2026-03-28 05:52:05 --> [REQ_ID=9011fb4a8d68] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 05:52:05 --> [REQ_ID=9011fb4a8d68] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 05:52:05 --> [REQ_ID=9011fb4a8d68] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 05:52:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 05:52:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=9011fb4a8d68] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 05:52:06 --> [REQ_ID=9011fb4a8d68] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 05:52:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 05:52:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=ed1bcc6da287] [FILTER_AFTER]
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=ed1bcc6da287] [LIFECYCLE][END] status=200 duration_ms=647.82 memory_delta=4194304
INFO - 2026-03-28 05:52:06 --> [REQ_ID=9011fb4a8d68] [PERF] Execution time=0.645816
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=ed1bcc6da287] [REQUEST][END]
INFO - 2026-03-28 05:52:06 --> [REQ_ID=ed1bcc6da287] [PERF] Execution time=0.667701
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=afc07d757546] [REQUEST][START] GET /
DEBUG - 2026-03-28 05:52:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=afc07d757546] [FILTER_BEFORE] /
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=afc07d757546] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=afc07d757546] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 05:52:06 --> [CSRF] token name=csrf_test_name hash=27704434f7f63400dc4f30a83c3d9a98
DEBUG - 2026-03-28 05:52:06 --> [REQ_ID=6ec7e8d24c58] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 05:52:06 --> [REQ_ID=6ec7e8d24c58] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 05:52:06 --> [REQ_ID=6ec7e8d24c58] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 05:52:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 05:52:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:52:07 --> [REQ_ID=6ec7e8d24c58] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 05:52:07 --> [REQ_ID=6ec7e8d24c58] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 05:52:07 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 05:52:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 05:52:07 --> [REQ_ID=afc07d757546] [FILTER_AFTER]
DEBUG - 2026-03-28 05:52:07 --> [REQ_ID=afc07d757546] [LIFECYCLE][END] status=200 duration_ms=503.52 memory_delta=4194304
INFO - 2026-03-28 05:52:07 --> [REQ_ID=6ec7e8d24c58] [PERF] Execution time=0.503310
DEBUG - 2026-03-28 05:52:07 --> [REQ_ID=afc07d757546] [REQUEST][END]
INFO - 2026-03-28 05:52:07 --> [REQ_ID=afc07d757546] [PERF] Execution time=0.512867
DEBUG - 2026-03-28 05:56:22 --> [REQ_ID=b9cf0ed60a4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 05:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 05:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 05:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 05:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [REQUEST][END]
INFO - 2026-03-28 06:00:01 --> [REQ_ID=a18b1182e9bc] [PERF] Execution time=0.050913
DEBUG - 2026-03-28 06:01:22 --> [REQ_ID=56285e481f23] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:06:22 --> [REQ_ID=4138f1844cd8] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:11:22 --> [REQ_ID=7738f18e36e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [REQUEST][END]
INFO - 2026-03-28 06:15:02 --> [REQ_ID=06047834187d] [PERF] Execution time=0.048916
DEBUG - 2026-03-28 06:16:22 --> [REQ_ID=098aa8c68dd1] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:21:22 --> [REQ_ID=1f2a8d2a60af] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:26:22 --> [REQ_ID=af8117cde5f2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:31:22 --> [REQ_ID=8f02596d1cec] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:34:55 --> [REQ_ID=22889ba561ee] [REQUEST][START] GET /
DEBUG - 2026-03-28 06:34:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 06:34:55 --> [REQ_ID=22889ba561ee] [FILTER_BEFORE] /
DEBUG - 2026-03-28 06:34:55 --> [REQ_ID=22889ba561ee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 06:34:55 --> [REQ_ID=22889ba561ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 06:34:55 --> [CSRF] token name=csrf_test_name hash=467fcc474ba335f76e737a89a353afcd
DEBUG - 2026-03-28 06:34:55 --> [REQ_ID=5cd4abda8ca1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 06:34:55 --> [REQ_ID=5cd4abda8ca1] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 06:34:55 --> [REQ_ID=5cd4abda8ca1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 06:34:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 06:34:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 06:34:56 --> [REQ_ID=5cd4abda8ca1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 06:34:56 --> [REQ_ID=5cd4abda8ca1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 06:34:56 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 06:34:56 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 06:34:56 --> [REQ_ID=22889ba561ee] [FILTER_AFTER]
DEBUG - 2026-03-28 06:34:56 --> [REQ_ID=22889ba561ee] [LIFECYCLE][END] status=200 duration_ms=858.55 memory_delta=4194304
INFO - 2026-03-28 06:34:56 --> [REQ_ID=5cd4abda8ca1] [PERF] Execution time=0.856543
DEBUG - 2026-03-28 06:34:56 --> [REQ_ID=22889ba561ee] [REQUEST][END]
INFO - 2026-03-28 06:34:56 --> [REQ_ID=22889ba561ee] [PERF] Execution time=0.900155
DEBUG - 2026-03-28 06:36:22 --> [REQ_ID=38fe02552fe2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:41:22 --> [REQ_ID=d21ac71dc967] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:46:22 --> [REQ_ID=1a43fdd72cbb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:51:22 --> [REQ_ID=dd496be998f4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 06:53:53 --> [REQ_ID=50c80e0cbb4d] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-28 06:53:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 06:53:53 --> [REQ_ID=50c80e0cbb4d] [REQUEST][END]
INFO - 2026-03-28 06:53:53 --> [REQ_ID=50c80e0cbb4d] [PERF] Execution time=0.047531
DEBUG - 2026-03-28 06:56:22 --> [REQ_ID=77b107bf81a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 06:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 06:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 06:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 06:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-28 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-28 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-28 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-28 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-28 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.111735
INFO - 2026-03-28 07:00:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-28 07:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-28 07:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-28 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [REQUEST][END]
INFO - 2026-03-28 07:00:01 --> [REQ_ID=322b3d86f903] [PERF] Execution time=0.098730
INFO - 2026-03-28 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-28 07:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-28 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-28 07:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-28 07:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005311
INFO - 2026-03-28 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-28 07:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-28 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-28 07:00:03 --> LOG_HEALTHCHECK debug marker=a75a0e5efc21
INFO - 2026-03-28 07:00:03 --> LOG_HEALTHCHECK info marker=a75a0e5efc21
NOTICE - 2026-03-28 07:00:03 --> LOG_HEALTHCHECK probe marker=a75a0e5efc21
INFO - 2026-03-28 07:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-28 07:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.034560
INFO - 2026-03-28 07:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-28 07:00:03 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=1.802286
INFO - 2026-03-28 07:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-28 07:01:22 --> [REQ_ID=a6e7785dfea4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:06:22 --> [REQ_ID=00b0e738e97c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:06:26 --> [REQ_ID=139b46274ef1] [REQUEST][START] GET /
DEBUG - 2026-03-28 07:06:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 07:06:26 --> [REQ_ID=139b46274ef1] [FILTER_BEFORE] /
DEBUG - 2026-03-28 07:06:26 --> [REQ_ID=139b46274ef1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 07:06:26 --> [REQ_ID=139b46274ef1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 07:06:26 --> [CSRF] token name=csrf_test_name hash=d4b5d946d7d3e43350f9f4d1527c55b4
DEBUG - 2026-03-28 07:06:26 --> [REQ_ID=372eae7aec54] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 07:06:26 --> [REQ_ID=372eae7aec54] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 07:06:26 --> [REQ_ID=372eae7aec54] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 07:06:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 07:06:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 07:06:27 --> [REQ_ID=372eae7aec54] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 07:06:27 --> [REQ_ID=372eae7aec54] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 07:06:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 07:06:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 07:06:27 --> [REQ_ID=139b46274ef1] [FILTER_AFTER]
DEBUG - 2026-03-28 07:06:27 --> [REQ_ID=139b46274ef1] [LIFECYCLE][END] status=200 duration_ms=569.05 memory_delta=4194304
INFO - 2026-03-28 07:06:27 --> [REQ_ID=372eae7aec54] [PERF] Execution time=0.567152
DEBUG - 2026-03-28 07:06:27 --> [REQ_ID=139b46274ef1] [REQUEST][END]
INFO - 2026-03-28 07:06:27 --> [REQ_ID=139b46274ef1] [PERF] Execution time=0.587542
DEBUG - 2026-03-28 07:11:22 --> [REQ_ID=985da145d506] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [REQUEST][END]
INFO - 2026-03-28 07:15:01 --> [REQ_ID=7053632cfac3] [PERF] Execution time=0.046890
DEBUG - 2026-03-28 07:16:22 --> [REQ_ID=4eb9e8c263b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:21:22 --> [REQ_ID=812e8fbaa9b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=2ba011611fd4] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-28 07:26:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=2ba011611fd4] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=2ba011611fd4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=2ba011611fd4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-28 07:26:15 --> [CSRF] token name=csrf_test_name hash=cdab1170ed5d14503928b31e7bd61e26
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=85b963afe672] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 07:26:15 --> [REQ_ID=85b963afe672] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 07:26:15 --> [REQ_ID=85b963afe672] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-28 07:26:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 07:26:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 07:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 07:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 07:26:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 07:26:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 07:26:15 --> [REQ_ID=85b963afe672] [MEMORY][commonData:start] 6291456
INFO - 2026-03-28 07:26:16 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 07:26:16 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-28 07:26:16 --> [REQ_ID=2ba011611fd4] [FILTER_AFTER]
DEBUG - 2026-03-28 07:26:16 --> [REQ_ID=2ba011611fd4] [LIFECYCLE][END] status=200 duration_ms=778.37 memory_delta=4194304
INFO - 2026-03-28 07:26:16 --> [REQ_ID=85b963afe672] [PERF] Execution time=0.776138
DEBUG - 2026-03-28 07:26:16 --> [REQ_ID=2ba011611fd4] [REQUEST][END]
INFO - 2026-03-28 07:26:16 --> [REQ_ID=2ba011611fd4] [PERF] Execution time=0.819724
DEBUG - 2026-03-28 07:26:22 --> [REQ_ID=3aa6ac2deeb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:27:56 --> [REQ_ID=12454a3f4b53] [REQUEST][START] GET /index.php/News/Market-Movers/December-3rd-2021
DEBUG - 2026-03-28 07:27:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:27:56 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/Market-Movers/December-3rd-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:27:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:27:57 --> [404] URI=https://www.mymiwallet.com/index.php/News/Market-Movers/December-3rd-2021
WARNING - 2026-03-28 07:27:57 --> 404 route miss: https://www.mymiwallet.com/index.php/News/Market-Movers/December-3rd-2021 | referrer: none
ERROR - 2026-03-28 07:27:57 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 07:31:22 --> [REQ_ID=2d753a67ffcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:36:22 --> [REQ_ID=ce692960b59d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:41:22 --> [REQ_ID=282854dadce2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:46:22 --> [REQ_ID=9dafec05084c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:51:22 --> [REQ_ID=eef193b6c8bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 07:56:22 --> [REQ_ID=81f0152fae36] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 07:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 07:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 07:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 07:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [REQUEST][END]
INFO - 2026-03-28 08:00:01 --> [REQ_ID=1fc285843874] [PERF] Execution time=0.048332
DEBUG - 2026-03-28 08:01:22 --> [REQ_ID=36fd2407ec27] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:06:22 --> [REQ_ID=e2318b238d7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:11:22 --> [REQ_ID=7a9598a5692e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [REQUEST][END]
INFO - 2026-03-28 08:15:01 --> [REQ_ID=0769fa3c03f0] [PERF] Execution time=0.046985
DEBUG - 2026-03-28 08:15:23 --> [REQ_ID=4513d395dbb8] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-28 08:15:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 08:15:23 --> [REQ_ID=4513d395dbb8] [REQUEST][END]
INFO - 2026-03-28 08:15:23 --> [REQ_ID=4513d395dbb8] [PERF] Execution time=0.015010
DEBUG - 2026-03-28 08:16:22 --> [REQ_ID=5df89a51bf5b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:21:22 --> [REQ_ID=7a87bd69e829] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:26:22 --> [REQ_ID=35e34b1eca14] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:31:22 --> [REQ_ID=c71a28c452f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:36:22 --> [REQ_ID=8bb31405b512] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:41:22 --> [REQ_ID=86d7edbf88ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:46:22 --> [REQ_ID=ed421da65801] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:51:22 --> [REQ_ID=0768ec6ab7d4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 08:56:22 --> [REQ_ID=515245dce813] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 08:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 08:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 08:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 08:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [REQUEST][END]
INFO - 2026-03-28 09:00:01 --> [REQ_ID=4865f9d754a2] [PERF] Execution time=0.048634
DEBUG - 2026-03-28 09:01:22 --> [REQ_ID=9c9f878b584f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:06:22 --> [REQ_ID=5320248094c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:11:22 --> [REQ_ID=6a84a5467a2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [REQUEST][END]
INFO - 2026-03-28 09:15:01 --> [REQ_ID=b63c05e36845] [PERF] Execution time=0.046344
DEBUG - 2026-03-28 09:16:07 --> [REQ_ID=9b7981d907ef] [REQUEST][START] GET /
DEBUG - 2026-03-28 09:16:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:16:07 --> [REQ_ID=9b7981d907ef] [FILTER_BEFORE] /
DEBUG - 2026-03-28 09:16:07 --> [REQ_ID=9b7981d907ef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 09:16:07 --> [REQ_ID=9b7981d907ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 09:16:07 --> [CSRF] token name=csrf_test_name hash=7378ff1c17ee3eaa8d55b851ccb49438
DEBUG - 2026-03-28 09:16:07 --> [REQ_ID=55756b0cc64e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 09:16:07 --> [REQ_ID=55756b0cc64e] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 09:16:07 --> [REQ_ID=55756b0cc64e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 09:16:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 09:16:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 09:16:08 --> [REQ_ID=55756b0cc64e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 09:16:08 --> [REQ_ID=55756b0cc64e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 09:16:08 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 09:16:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 09:16:08 --> [REQ_ID=9b7981d907ef] [FILTER_AFTER]
DEBUG - 2026-03-28 09:16:08 --> [REQ_ID=9b7981d907ef] [LIFECYCLE][END] status=200 duration_ms=708.02 memory_delta=4194304
INFO - 2026-03-28 09:16:08 --> [REQ_ID=55756b0cc64e] [PERF] Execution time=0.706705
DEBUG - 2026-03-28 09:16:08 --> [REQ_ID=9b7981d907ef] [REQUEST][END]
INFO - 2026-03-28 09:16:08 --> [REQ_ID=9b7981d907ef] [PERF] Execution time=0.719148
DEBUG - 2026-03-28 09:16:22 --> [REQ_ID=2f77589fcbc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [REQUEST][START] GET /
DEBUG - 2026-03-28 09:20:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [FILTER_BEFORE] /
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 09:20:13 --> [CSRF] token name=csrf_test_name hash=1f4d6a65569b3677e50ec3fb74f0a95b
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 09:20:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 09:20:13 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 09:20:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 09:20:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [FILTER_AFTER]
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [LIFECYCLE][END] status=200 duration_ms=491.20 memory_delta=4194304
INFO - 2026-03-28 09:20:13 --> [REQ_ID=a09965c620c1] [PERF] Execution time=0.489246
DEBUG - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [REQUEST][END]
INFO - 2026-03-28 09:20:13 --> [REQ_ID=a0e2de1b4393] [PERF] Execution time=0.530583
DEBUG - 2026-03-28 09:21:22 --> [REQ_ID=e919a4f4f154] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:26:22 --> [REQ_ID=89e573966380] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:31:22 --> [REQ_ID=b5001b9b4f52] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:34:12 --> [REQ_ID=46b5135317d2] [REQUEST][START] GET /index.php
DEBUG - 2026-03-28 09:34:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:34:12 --> [REQ_ID=46b5135317d2] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-28 09:34:12 --> [REQ_ID=46b5135317d2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 09:34:12 --> [REQ_ID=46b5135317d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 09:34:12 --> [CSRF] token name=csrf_test_name hash=09d01fdb876bbc376e70f439b403506e
DEBUG - 2026-03-28 09:34:12 --> [REQ_ID=fe905aae6a87] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 09:34:12 --> [REQ_ID=fe905aae6a87] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 09:34:12 --> [REQ_ID=fe905aae6a87] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 09:34:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 09:34:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 09:34:13 --> [REQ_ID=fe905aae6a87] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 09:34:13 --> [REQ_ID=fe905aae6a87] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 09:34:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 09:34:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 09:34:13 --> [REQ_ID=46b5135317d2] [FILTER_AFTER]
DEBUG - 2026-03-28 09:34:13 --> [REQ_ID=46b5135317d2] [LIFECYCLE][END] status=200 duration_ms=878.70 memory_delta=4194304
INFO - 2026-03-28 09:34:13 --> [REQ_ID=fe905aae6a87] [PERF] Execution time=0.876558
DEBUG - 2026-03-28 09:34:13 --> [REQ_ID=46b5135317d2] [REQUEST][END]
INFO - 2026-03-28 09:34:13 --> [REQ_ID=46b5135317d2] [PERF] Execution time=0.918113
DEBUG - 2026-03-28 09:36:22 --> [REQ_ID=5ac641ffd7f8] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-28 09:36:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-28 09:36:40 --> [CSRF] token name=csrf_test_name hash=5af2555b7c9a0f0464db3cb654bd5004
DEBUG - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [REQUEST][END]
INFO - 2026-03-28 09:36:40 --> [REQ_ID=bcfb056a2552] [PERF] Execution time=0.030191
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 09:36:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 09:36:41 --> [CSRF] token name=csrf_test_name hash=720fd8ca4e70e7fa17a2c37c71801067
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=5075c248c873] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 09:36:41 --> [REQ_ID=5075c248c873] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [FILTER_AFTER]
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [LIFECYCLE][END] status=200 duration_ms=147.50 memory_delta=0
INFO - 2026-03-28 09:36:41 --> [REQ_ID=5075c248c873] [PERF] Execution time=0.147348
DEBUG - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [REQUEST][END]
INFO - 2026-03-28 09:36:41 --> [REQ_ID=24b583ecf703] [PERF] Execution time=0.158942
DEBUG - 2026-03-28 09:41:22 --> [REQ_ID=5838f771d102] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:41:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:41:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:41:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:46:22 --> [REQ_ID=69e8d40cbce0] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:51:22 --> [REQ_ID=dfa79222f960] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 09:56:22 --> [REQ_ID=946b72502efb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 09:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 09:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 09:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 09:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:00:01 --> [REQ_ID=aa7cb70d17a9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:00:02 --> [REQ_ID=aa7cb70d17a9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 10:00:02 --> [REQ_ID=aa7cb70d17a9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 10:00:02 --> [REQ_ID=aa7cb70d17a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 10:00:02 --> [REQ_ID=aa7cb70d17a9] [REQUEST][END]
INFO - 2026-03-28 10:00:02 --> [REQ_ID=aa7cb70d17a9] [PERF] Execution time=0.050663
DEBUG - 2026-03-28 10:01:18 --> [REQ_ID=2e1b1cc52e83] [REQUEST][START] GET /
DEBUG - 2026-03-28 10:01:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:18 --> [REQ_ID=2e1b1cc52e83] [FILTER_BEFORE] /
DEBUG - 2026-03-28 10:01:18 --> [REQ_ID=2e1b1cc52e83] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:01:18 --> [REQ_ID=2e1b1cc52e83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:01:18 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
DEBUG - 2026-03-28 10:01:18 --> [REQ_ID=f00b25fbd81e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:01:18 --> [REQ_ID=f00b25fbd81e] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 10:01:19 --> [REQ_ID=f00b25fbd81e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:01:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:01:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 10:01:19 --> [REQ_ID=f00b25fbd81e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:01:19 --> [REQ_ID=f00b25fbd81e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 10:01:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 10:01:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:01:19 --> [REQ_ID=2e1b1cc52e83] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:19 --> [REQ_ID=2e1b1cc52e83] [LIFECYCLE][END] status=200 duration_ms=641.14 memory_delta=4194304
INFO - 2026-03-28 10:01:19 --> [REQ_ID=f00b25fbd81e] [PERF] Execution time=0.639242
DEBUG - 2026-03-28 10:01:19 --> [REQ_ID=2e1b1cc52e83] [REQUEST][END]
INFO - 2026-03-28 10:01:19 --> [REQ_ID=2e1b1cc52e83] [PERF] Execution time=0.680199
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-28 10:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-28 10:01:20 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
INFO - 2026-03-28 10:01:20 --> CSRF token verified.
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=9687a61ebbb6] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 10:01:20 --> [REQ_ID=9687a61ebbb6] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 10:01:20 --> [REGISTRATION] Submission received
INFO - 2026-03-28 10:01:20 --> MailService queued email
INFO - 2026-03-28 10:01:20 --> [REGISTRATION] Validation passed (basic fields)
ERROR - 2026-03-28 10:01:20 --> Registration failed: {"password":"Validation.strong_password"}
INFO - 2026-03-28 10:01:20 --> MailService queued email
WARNING - 2026-03-28 10:01:20 --> [REGISTRATION] Validation failed (password fields)
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [LIFECYCLE][END] status=302 duration_ms=94.82 memory_delta=0
INFO - 2026-03-28 10:01:20 --> [REQ_ID=9687a61ebbb6] [PERF] Execution time=0.094415
DEBUG - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [REQUEST][END]
INFO - 2026-03-28 10:01:20 --> [REQ_ID=f89672bcf5bd] [PERF] Execution time=0.107886
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-28 10:01:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:01:21 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 10:01:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:01:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:01:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:01:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [LIFECYCLE][END] status=200 duration_ms=547.07 memory_delta=4194304
INFO - 2026-03-28 10:01:21 --> [REQ_ID=76e5b11d9340] [PERF] Execution time=0.546648
DEBUG - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [REQUEST][END]
INFO - 2026-03-28 10:01:21 --> [REQ_ID=c9e4e1da9cd9] [PERF] Execution time=0.559050
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=09588413c345] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:01:22 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=3a61f4810270] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 10:01:22 --> [REQ_ID=3a61f4810270] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [LIFECYCLE][END] status=200 duration_ms=15.62 memory_delta=0
INFO - 2026-03-28 10:01:22 --> [REQ_ID=3a61f4810270] [PERF] Execution time=0.015586
DEBUG - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [REQUEST][END]
INFO - 2026-03-28 10:01:22 --> [REQ_ID=be655c1b3f54] [PERF] Execution time=0.024368
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 10:01:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:01:23 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
INFO - 2026-03-28 10:01:23 --> CSRF token verified.
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=71a7d451a27c] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 10:01:23 --> [REQ_ID=71a7d451a27c] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:01:23 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-28 10:01:23 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-28 10:01:23 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 5.227.46.144, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5042.0 Safari/537.36
DEBUG - 2026-03-28 10:01:23 --> Auth attemptLogin() called with login identifier: videoKib, remember: false
DEBUG - 2026-03-28 10:01:23 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-28 10:01:23 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-28 10:01:23 --> [AUTH_FAILURE] 
DEBUG - 2026-03-28 10:01:23 --> Auth attempt failed for identifier videoKib. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-03-28 10:01:23 --> [AUTH] Login failure
WARNING - 2026-03-28 10:01:23 --> [AUTH] Login failed
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [LIFECYCLE][END] status=302 duration_ms=30.46 memory_delta=0
INFO - 2026-03-28 10:01:23 --> [REQ_ID=71a7d451a27c] [PERF] Execution time=0.030283
DEBUG - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [REQUEST][END]
INFO - 2026-03-28 10:01:23 --> [REQ_ID=168c9a7384d2] [PERF] Execution time=0.039707
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 10:01:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:01:24 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=131c73ace992] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 10:01:24 --> [REQ_ID=131c73ace992] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [LIFECYCLE][END] status=200 duration_ms=15.38 memory_delta=0
INFO - 2026-03-28 10:01:24 --> [REQ_ID=131c73ace992] [PERF] Execution time=0.015184
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [REQUEST][END]
INFO - 2026-03-28 10:01:24 --> [REQ_ID=bcf947cfb241] [PERF] Execution time=0.024556
DEBUG - 2026-03-28 10:01:24 --> [REQ_ID=9fd346437808] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-28 10:01:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:01:25 --> [CSRF] token name=csrf_test_name hash=2eed221b587472e40c2577beaee895a2
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 10:01:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:01:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:01:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:01:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [FILTER_AFTER]
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [LIFECYCLE][END] status=200 duration_ms=532.28 memory_delta=4194304
INFO - 2026-03-28 10:01:25 --> [REQ_ID=7830f36f7c72] [PERF] Execution time=0.532093
DEBUG - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [REQUEST][END]
INFO - 2026-03-28 10:01:25 --> [REQ_ID=9fd346437808] [PERF] Execution time=0.540930
DEBUG - 2026-03-28 10:06:22 --> [REQ_ID=e053b2cd2a59] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:08:46 --> [REQ_ID=2a3975ea22f4] [REQUEST][START] GET /
DEBUG - 2026-03-28 10:08:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:08:46 --> [REQ_ID=2a3975ea22f4] [FILTER_BEFORE] /
DEBUG - 2026-03-28 10:08:46 --> [REQ_ID=2a3975ea22f4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:08:46 --> [REQ_ID=2a3975ea22f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:08:46 --> [CSRF] token name=csrf_test_name hash=2d07cdb81bf6aceedcb239a112a33c8b
DEBUG - 2026-03-28 10:08:46 --> [REQ_ID=1e8e199c8311] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:08:46 --> [REQ_ID=1e8e199c8311] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 10:08:46 --> [REQ_ID=1e8e199c8311] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:08:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:08:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=1e8e199c8311] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:08:47 --> [REQ_ID=1e8e199c8311] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 10:08:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 10:08:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=2a3975ea22f4] [FILTER_AFTER]
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=2a3975ea22f4] [LIFECYCLE][END] status=200 duration_ms=790.39 memory_delta=4194304
INFO - 2026-03-28 10:08:47 --> [REQ_ID=1e8e199c8311] [PERF] Execution time=0.788548
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=2a3975ea22f4] [REQUEST][END]
INFO - 2026-03-28 10:08:47 --> [REQ_ID=2a3975ea22f4] [PERF] Execution time=0.827640
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=6410235a2a19] [REQUEST][START] GET /
DEBUG - 2026-03-28 10:08:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=6410235a2a19] [FILTER_BEFORE] /
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=6410235a2a19] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=6410235a2a19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:08:47 --> [CSRF] token name=csrf_test_name hash=2d07cdb81bf6aceedcb239a112a33c8b
DEBUG - 2026-03-28 10:08:47 --> [REQ_ID=c71199b943fe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:08:47 --> [REQ_ID=c71199b943fe] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:08:47 --> [REQ_ID=c71199b943fe] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 10:08:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:08:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:08:48 --> [REQ_ID=c71199b943fe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:08:48 --> [REQ_ID=c71199b943fe] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:08:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:08:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:08:48 --> [REQ_ID=6410235a2a19] [FILTER_AFTER]
DEBUG - 2026-03-28 10:08:48 --> [REQ_ID=6410235a2a19] [LIFECYCLE][END] status=200 duration_ms=484.00 memory_delta=4194304
INFO - 2026-03-28 10:08:48 --> [REQ_ID=c71199b943fe] [PERF] Execution time=0.483809
DEBUG - 2026-03-28 10:08:48 --> [REQ_ID=6410235a2a19] [REQUEST][END]
INFO - 2026-03-28 10:08:48 --> [REQ_ID=6410235a2a19] [PERF] Execution time=0.492488
DEBUG - 2026-03-28 10:09:59 --> [REQ_ID=96a0bf61dae9] [REQUEST][START] GET /
DEBUG - 2026-03-28 10:09:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:09:59 --> [REQ_ID=96a0bf61dae9] [FILTER_BEFORE] /
DEBUG - 2026-03-28 10:09:59 --> [REQ_ID=96a0bf61dae9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:09:59 --> [REQ_ID=96a0bf61dae9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:09:59 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:09:59 --> [REQ_ID=2a435294d29c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:09:59 --> [REQ_ID=2a435294d29c] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:09:59 --> [REQ_ID=2a435294d29c] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 10:09:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:10:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:10:00 --> [REQ_ID=2a435294d29c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:10:00 --> [REQ_ID=2a435294d29c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:10:00 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:10:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:10:00 --> [REQ_ID=96a0bf61dae9] [FILTER_AFTER]
DEBUG - 2026-03-28 10:10:00 --> [REQ_ID=96a0bf61dae9] [LIFECYCLE][END] status=200 duration_ms=501.18 memory_delta=4194304
INFO - 2026-03-28 10:10:00 --> [REQ_ID=2a435294d29c] [PERF] Execution time=0.500951
DEBUG - 2026-03-28 10:10:00 --> [REQ_ID=96a0bf61dae9] [REQUEST][END]
INFO - 2026-03-28 10:10:00 --> [REQ_ID=96a0bf61dae9] [PERF] Execution time=0.510342
DEBUG - 2026-03-28 10:11:22 --> [REQ_ID=4132e10a2c4a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [REQUEST][END]
INFO - 2026-03-28 10:15:01 --> [REQ_ID=ed093a66f619] [PERF] Execution time=0.045835
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [REQUEST][START] GET /
DEBUG - 2026-03-28 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [FILTER_BEFORE] /
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 10:15:02 --> [CSRF] token name=csrf_test_name hash=fcfee60057f10c7301a0cb19b4f54500
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:15:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:15:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:15:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:15:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [FILTER_AFTER]
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [LIFECYCLE][END] status=200 duration_ms=869.22 memory_delta=4194304
INFO - 2026-03-28 10:15:02 --> [REQ_ID=d000eb929bad] [PERF] Execution time=0.867828
DEBUG - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [REQUEST][END]
INFO - 2026-03-28 10:15:02 --> [REQ_ID=e009b2068866] [PERF] Execution time=0.879109
DEBUG - 2026-03-28 10:16:22 --> [REQ_ID=0ae6ab9f0ebd] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:21:22 --> [REQ_ID=f3d7ffebc450] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:26:22 --> [REQ_ID=1b5aeb5ac4f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:31:22 --> [REQ_ID=8221da19bdb2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 10:31:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:31:36 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=277117d9c616] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 10:31:36 --> [REQ_ID=277117d9c616] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [LIFECYCLE][END] status=200 duration_ms=55.63 memory_delta=0
INFO - 2026-03-28 10:31:36 --> [REQ_ID=277117d9c616] [PERF] Execution time=0.052589
DEBUG - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [REQUEST][END]
INFO - 2026-03-28 10:31:36 --> [REQ_ID=9e89ae0c2c1e] [PERF] Execution time=0.084030
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 10:31:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:31:39 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [REQUEST][END]
INFO - 2026-03-28 10:31:39 --> [REQ_ID=eecb60579156] [PERF] Execution time=0.011604
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 10:31:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:31:39 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=49716e5fa542] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 10:31:39 --> [REQ_ID=49716e5fa542] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [LIFECYCLE][END] status=200 duration_ms=17.11 memory_delta=0
INFO - 2026-03-28 10:31:39 --> [REQ_ID=49716e5fa542] [PERF] Execution time=0.016986
DEBUG - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [REQUEST][END]
INFO - 2026-03-28 10:31:39 --> [REQ_ID=be4c24622f8b] [PERF] Execution time=0.025844
DEBUG - 2026-03-28 10:31:41 --> [REQ_ID=7037586dd953] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 10:31:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:41 --> [REQ_ID=7037586dd953] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 10:31:41 --> [REQ_ID=7037586dd953] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 10:31:41 --> [REQ_ID=7037586dd953] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 10:31:41 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
INFO - 2026-03-28 10:31:41 --> CSRF token verified.
DEBUG - 2026-03-28 10:31:41 --> [REQ_ID=d80860f835d5] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 10:31:41 --> [REQ_ID=d80860f835d5] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:31:41 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-28 10:31:41 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-28 10:31:41 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36
DEBUG - 2026-03-28 10:31:41 --> Auth attemptLogin() called with login identifier: tburks2392, remember: true
DEBUG - 2026-03-28 10:31:41 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-28 10:31:41 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-28 10:31:42 --> Auth attempt succeeded for identifier tburks2392. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-28 10:31:42 --> Auth attempt succeeded. logged_in(): yes, user_id(): 2
DEBUG - 2026-03-28 10:31:42 --> Auth attemptLogin() - session user_id set to: 2
INFO - 2026-03-28 10:31:42 --> [AUTH] Login success
DEBUG - 2026-03-28 10:31:42 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=7037586dd953] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=7037586dd953] [LIFECYCLE][END] status=303 duration_ms=117.26 memory_delta=0
INFO - 2026-03-28 10:31:42 --> [REQ_ID=d80860f835d5] [PERF] Execution time=0.116952
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=7037586dd953] [REQUEST][END]
INFO - 2026-03-28 10:31:42 --> [REQ_ID=7037586dd953] [PERF] Execution time=0.126367
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-28 10:31:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 10:31:42 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [METHOD_ENTRY] index
DEBUG - 2026-03-28 10:31:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:42 --> [DASHBOARD] Enter
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> Skipping placeholder symbol for row 46402
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
ERROR - 2026-03-28 10:31:42 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-28 10:31:42 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-28 10:31:42 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 10:31:42\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 10:31:42\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 10:31:42\'')
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
DEBUG - 2026-03-28 10:31:42 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-28 10:31:42 --> 📰 Daily dashboard news window 2026-03-28 00:00:00 -> 2026-03-28 23:59:59 returned 0 rows
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SETUP] Status computed
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-28 10:31:42 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-03-28 10:31:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-03-28 10:31:42 --> getSolanaData: invalid address param
INFO - 2026-03-28 10:31:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [LIFECYCLE][END] status=200 duration_ms=802.48 memory_delta=4194304
INFO - 2026-03-28 10:31:42 --> [REQ_ID=9b7343ca683e] [PERF] Execution time=0.795076
DEBUG - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [REQUEST][END]
INFO - 2026-03-28 10:31:42 --> [REQ_ID=92514696f121] [PERF] Execution time=0.818860
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 10:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=3070682aff22] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 10:31:43 --> [REQ_ID=3070682aff22] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:43 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:43 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 10:31:43 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 10:31:43 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [LIFECYCLE][END] status=302 duration_ms=27.57 memory_delta=0
INFO - 2026-03-28 10:31:43 --> [REQ_ID=3070682aff22] [PERF] Execution time=0.027528
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [REQUEST][END]
INFO - 2026-03-28 10:31:43 --> [REQ_ID=4cc2cc7500e6] [PERF] Execution time=0.037977
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 10:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=7f9b08ca9204] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 10:31:43 --> [REQ_ID=7f9b08ca9204] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 10:31:43 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:43 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 10:31:43 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getConfidenceHeatmap feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 10:31:43 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getConfidenceHeatmap user_id=2 tier=free status=free
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [LIFECYCLE][END] status=302 duration_ms=34.44 memory_delta=0
INFO - 2026-03-28 10:31:43 --> [REQ_ID=7f9b08ca9204] [PERF] Execution time=0.033995
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [REQUEST][END]
INFO - 2026-03-28 10:31:43 --> [REQ_ID=6cc6cb4a8dc9] [PERF] Execution time=0.054248
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 10:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=8f035dbe5f2c] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 10:31:43 --> [REQ_ID=8f035dbe5f2c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=20ed8bd2c3e9] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=835aed9e9169] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-03-28 10:31:43 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:43 --> MyMIUser L52 - initialized (first log).
INFO - 2026-03-28 10:31:43 --> Premium entitlement resolved: user_id=2 route=/index.php/API/Investments/getForecastAccuracySummary feature=investments.analytics tier=free status=free allowed=no reason=Feature requires tier1 or higher. Current tier: free (free).
WARNING - 2026-03-28 10:31:43 --> Premium access denied: feature=investments.analytics route=/index.php/API/Investments/getForecastAccuracySummary user_id=2 tier=free status=free
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [LIFECYCLE][END] status=302 duration_ms=136.74 memory_delta=2097152
INFO - 2026-03-28 10:31:43 --> [REQ_ID=8f035dbe5f2c] [PERF] Execution time=0.135150
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [REQUEST][END]
INFO - 2026-03-28 10:31:43 --> [REQ_ID=0689a7f5009b] [PERF] Execution time=0.190195
DEBUG - 2026-03-28 10:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=20ed8bd2c3e9] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=20ed8bd2c3e9] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=20ed8bd2c3e9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:43 --> [REQ_ID=58fa1d9af73e] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 10:31:43 --> [REQ_ID=58fa1d9af73e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:43 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=20ed8bd2c3e9] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=20ed8bd2c3e9] [LIFECYCLE][END] status=200 duration_ms=402.57 memory_delta=2097152
INFO - 2026-03-28 10:31:44 --> [REQ_ID=58fa1d9af73e] [PERF] Execution time=0.401442
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=20ed8bd2c3e9] [REQUEST][END]
INFO - 2026-03-28 10:31:44 --> [REQ_ID=20ed8bd2c3e9] [PERF] Execution time=0.579705
DEBUG - 2026-03-28 10:31:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [ROUTE] Controller=\App\Controllers\OpsHealthController Method=index
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-03-28 10:31:44 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=df150bf27fcf] [INIT] App\Controllers\OpsHealthController::GET
INFO - 2026-03-28 10:31:44 --> [REQ_ID=df150bf27fcf] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=df150bf27fcf] [METHOD_ENTRY] index
DEBUG - 2026-03-28 10:31:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [LIFECYCLE][END] status=404 duration_ms=90.89 memory_delta=0
INFO - 2026-03-28 10:31:44 --> [REQ_ID=df150bf27fcf] [PERF] Execution time=0.064318
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [REQUEST][END]
INFO - 2026-03-28 10:31:44 --> [REQ_ID=835aed9e9169] [PERF] Execution time=0.669654
DEBUG - 2026-03-28 10:31:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=37a73ff435c5] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-03-28 10:31:44 --> [REQ_ID=37a73ff435c5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:44 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 10:31:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [LIFECYCLE][END] status=200 duration_ms=15.38 memory_delta=0
INFO - 2026-03-28 10:31:44 --> [REQ_ID=37a73ff435c5] [PERF] Execution time=0.015305
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [REQUEST][END]
INFO - 2026-03-28 10:31:44 --> [REQ_ID=f19834565aed] [PERF] Execution time=0.086974
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=172d69a92359] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 10:31:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=172d69a92359] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=172d69a92359] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=172d69a92359] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 10:31:44 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:44 --> [REQ_ID=5fac0636eab6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:31:44 --> [REQ_ID=5fac0636eab6] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 10:31:44 --> [REQ_ID=5fac0636eab6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 10:31:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:45 --> [MetaService] slug=memberships pageName= cacheHit= path=DB
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=5fac0636eab6] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 10:31:45 --> [REQ_ID=5fac0636eab6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:31:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:31:45 --> [MetaService] slug=memberships pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=172d69a92359] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=172d69a92359] [LIFECYCLE][END] status=200 duration_ms=524.48 memory_delta=4194304
INFO - 2026-03-28 10:31:45 --> [REQ_ID=5fac0636eab6] [PERF] Execution time=0.523047
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=172d69a92359] [REQUEST][END]
INFO - 2026-03-28 10:31:45 --> [REQ_ID=172d69a92359] [PERF] Execution time=0.534058
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:31:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:45 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:31:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:31:45 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [LIFECYCLE][END] status=200 duration_ms=501.72 memory_delta=2097152
INFO - 2026-03-28 10:31:45 --> [REQ_ID=b5a5089b41bc] [PERF] Execution time=0.501625
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [REQUEST][END]
INFO - 2026-03-28 10:31:45 --> [REQ_ID=6fe011de17be] [PERF] Execution time=0.510414
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=513e34cfdfce] [REQUEST][START] GET /index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=513e34cfdfce] [FILTER_BEFORE] /index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=513e34cfdfce] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=513e34cfdfce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships
DEBUG - 2026-03-28 10:31:45 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:45 --> [REQ_ID=7b9335dfc386] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 10:31:45 --> [REQ_ID=7b9335dfc386] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 10:31:45 --> [REQ_ID=7b9335dfc386] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 10:31:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:46 --> [MetaService] slug=memberships pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:31:46 --> [REQ_ID=7b9335dfc386] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-28 10:31:46 --> [REQ_ID=7b9335dfc386] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 10:31:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 10:31:46 --> [MetaService] slug=memberships pageName=Memberships cacheHit=1 path=CACHE
DEBUG - 2026-03-28 10:31:46 --> [REQ_ID=513e34cfdfce] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:46 --> [REQ_ID=513e34cfdfce] [LIFECYCLE][END] status=200 duration_ms=494.01 memory_delta=2097152
INFO - 2026-03-28 10:31:46 --> [REQ_ID=7b9335dfc386] [PERF] Execution time=0.493831
DEBUG - 2026-03-28 10:31:46 --> [REQ_ID=513e34cfdfce] [REQUEST][END]
INFO - 2026-03-28 10:31:46 --> [REQ_ID=513e34cfdfce] [PERF] Execution time=0.502569
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-28 10:31:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-28 10:31:50 --> [CSRF] token name=csrf_test_name hash=9bd9b679b7de128b5845de391d21fadc
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [INIT] App\Modules\User\Controllers\ProjectsController::GET
INFO - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [METHOD_ENTRY] index
DEBUG - 2026-03-28 10:31:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 10:31:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [VIEW_RENDER] App\Modules\User\Views\Projects\view
INFO - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [MEMORY][commonData:start] 6291456
WARNING - 2026-03-28 10:31:50 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 52.
 1 APPPATH/Modules/User/Views/Projects/view.php(52): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-03-28 10:31:50 --> [DEPRECATED] number_format(): Passing null to parameter #1 ($num) of type float is deprecated in APPPATH/Modules/User/Views/Projects/view.php on line 53.
 1 APPPATH/Modules/User/Views/Projects/view.php(53): number_format(null, 2)
 2 SYSTEMPATH/View/View.php(238): include('/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Projects/view.php')
 3 SYSTEMPATH/View/View.php(241): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH/Common.php(1250): CodeIgniter\View\View->render('App\\Modules\\User\\Views\\Projects\\view', [], true)
 5 APPPATH/Controllers/BaseController.php(623): view('App\\Modules\\User\\Views\\Projects\\view', [...])
 6 APPPATH/Controllers/UserController.php(124): App\Controllers\BaseController->tryView('App\\Modules\\User\\Views\\Projects\\view', [...])
 7 APPPATH/Modules/User/Controllers/ProjectsController.php(50): App\Controllers\UserController->renderTheme('App\\Modules\\User\\Views\\Projects\\view', [...])
 8 SYSTEMPATH/CodeIgniter.php(951): App\Modules\User\Controllers\ProjectsController->index()
 9 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Modules\User\Controllers\ProjectsController))
10 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-03-28 10:31:50 --> themesMemory usage: 6291456
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [FILTER_AFTER]
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [LIFECYCLE][END] status=200 duration_ms=74.45 memory_delta=0
INFO - 2026-03-28 10:31:50 --> [REQ_ID=7c53b178a38c] [PERF] Execution time=0.067125
DEBUG - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [REQUEST][END]
INFO - 2026-03-28 10:31:50 --> [REQ_ID=4484345d6f0f] [PERF] Execution time=0.087576
DEBUG - 2026-03-28 10:35:25 --> [REQ_ID=4c8712910735] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 10:35:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 10:35:25 --> [REQ_ID=4c8712910735] [REQUEST][END]
INFO - 2026-03-28 10:35:25 --> [REQ_ID=4c8712910735] [PERF] Execution time=0.040321
DEBUG - 2026-03-28 10:36:22 --> [REQ_ID=d00e14b28f91] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:41:22 --> [REQ_ID=8b40b570e605] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:46:22 --> [REQ_ID=a36dea4667eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:51:22 --> [REQ_ID=b27ead5106fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 10:56:22 --> [REQ_ID=3555800bedaf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 10:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 10:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 10:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 10:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [REQUEST][END]
INFO - 2026-03-28 11:00:02 --> [REQ_ID=6f66276c7c75] [PERF] Execution time=0.048042
DEBUG - 2026-03-28 11:01:22 --> [REQ_ID=abd947224310] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:06:22 --> [REQ_ID=2b0cba03026c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:11:22 --> [REQ_ID=936dd6b2a16e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:15:01 --> [REQ_ID=b11eb15e2a4e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:15:02 --> [REQ_ID=b11eb15e2a4e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 11:15:02 --> [REQ_ID=b11eb15e2a4e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 11:15:02 --> [REQ_ID=b11eb15e2a4e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 11:15:02 --> [REQ_ID=b11eb15e2a4e] [REQUEST][END]
INFO - 2026-03-28 11:15:02 --> [REQ_ID=b11eb15e2a4e] [PERF] Execution time=0.050159
DEBUG - 2026-03-28 11:16:22 --> [REQ_ID=00913f387b29] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:21:22 --> [REQ_ID=e0c7dca3aa6b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:26:22 --> [REQ_ID=5b9ad2551fad] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:26:42 --> [REQ_ID=587b807be56c] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:26:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:26:42 --> [REQ_ID=587b807be56c] [REQUEST][END]
INFO - 2026-03-28 11:26:42 --> [REQ_ID=587b807be56c] [PERF] Execution time=0.017943
DEBUG - 2026-03-28 11:26:43 --> [REQ_ID=ea79f557d3d1] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:26:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:26:43 --> [REQ_ID=ea79f557d3d1] [FILTER_BEFORE] /
DEBUG - 2026-03-28 11:26:43 --> [REQ_ID=ea79f557d3d1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 11:26:43 --> [REQ_ID=ea79f557d3d1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 11:26:43 --> [CSRF] token name=csrf_test_name hash=fc4dc524d7ff35a53536660a53e41875
DEBUG - 2026-03-28 11:26:43 --> [REQ_ID=9a84d3ae4ae3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 11:26:43 --> [REQ_ID=9a84d3ae4ae3] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:26:43 --> [REQ_ID=9a84d3ae4ae3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 11:26:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:26:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 11:26:44 --> [REQ_ID=9a84d3ae4ae3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 11:26:44 --> [REQ_ID=9a84d3ae4ae3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 11:26:44 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 11:26:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 11:26:44 --> [REQ_ID=ea79f557d3d1] [FILTER_AFTER]
DEBUG - 2026-03-28 11:26:44 --> [REQ_ID=ea79f557d3d1] [LIFECYCLE][END] status=200 duration_ms=783.05 memory_delta=4194304
INFO - 2026-03-28 11:26:44 --> [REQ_ID=9a84d3ae4ae3] [PERF] Execution time=0.781117
DEBUG - 2026-03-28 11:26:44 --> [REQ_ID=ea79f557d3d1] [REQUEST][END]
INFO - 2026-03-28 11:26:44 --> [REQ_ID=ea79f557d3d1] [PERF] Execution time=0.792959
DEBUG - 2026-03-28 11:31:22 --> [REQ_ID=8f7d2fe6fac7] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:35:14 --> [REQ_ID=588295cbe662] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:35:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:14 --> [REQ_ID=588295cbe662] [FILTER_BEFORE] /
DEBUG - 2026-03-28 11:35:14 --> [REQ_ID=588295cbe662] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 11:35:14 --> [REQ_ID=588295cbe662] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 11:35:14 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
DEBUG - 2026-03-28 11:35:14 --> [REQ_ID=23d88b777630] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 11:35:14 --> [REQ_ID=23d88b777630] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 11:35:14 --> [REQ_ID=23d88b777630] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 11:35:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:35:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 11:35:15 --> [REQ_ID=23d88b777630] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 11:35:15 --> [REQ_ID=23d88b777630] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 11:35:15 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 11:35:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 11:35:15 --> [REQ_ID=588295cbe662] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:15 --> [REQ_ID=588295cbe662] [LIFECYCLE][END] status=200 duration_ms=703.87 memory_delta=4194304
INFO - 2026-03-28 11:35:15 --> [REQ_ID=23d88b777630] [PERF] Execution time=0.701745
DEBUG - 2026-03-28 11:35:15 --> [REQ_ID=588295cbe662] [REQUEST][END]
INFO - 2026-03-28 11:35:15 --> [REQ_ID=588295cbe662] [PERF] Execution time=0.743761
DEBUG - 2026-03-28 11:35:16 --> [REQ_ID=53f5d52442d6] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-28 11:35:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:16 --> [REQ_ID=53f5d52442d6] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-28 11:35:16 --> [REQ_ID=53f5d52442d6] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-28 11:35:16 --> [REQ_ID=53f5d52442d6] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-28 11:35:16 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
INFO - 2026-03-28 11:35:16 --> CSRF token verified.
DEBUG - 2026-03-28 11:35:16 --> [REQ_ID=eae3e1d8bc1c] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 11:35:16 --> [REQ_ID=eae3e1d8bc1c] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 11:35:16 --> [REGISTRATION] Submission received
INFO - 2026-03-28 11:35:16 --> MailService queued email
INFO - 2026-03-28 11:35:16 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-28 11:35:16 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-28 11:35:16 --> Registration created user_id=11759, email=stepha.n.iebur.tol.om.ew@gmail.com, username=Michaelaeron, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-28 11:35:16 --> [REGISTRATION] User record created
INFO - 2026-03-28 11:35:16 --> OnboardingProgressService: created onboarding record for user_id=11759
INFO - 2026-03-28 11:35:17 --> Registration succeeded for stepha.n.iebur.tol.om.ew@gmail.com (event c89095bf4506231e)
INFO - 2026-03-28 11:35:18 --> [REGISTRATION] Activation email queued
INFO - 2026-03-28 11:35:18 --> Registration redirecting to success guide for user_id=11759
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=53f5d52442d6] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=53f5d52442d6] [LIFECYCLE][END] status=302 duration_ms=1,219.85 memory_delta=0
INFO - 2026-03-28 11:35:18 --> [REQ_ID=eae3e1d8bc1c] [PERF] Execution time=1.219648
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=53f5d52442d6] [REQUEST][END]
INFO - 2026-03-28 11:35:18 --> [REQ_ID=53f5d52442d6] [PERF] Execution time=1.232711
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=15f90c369664] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-28 11:35:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=15f90c369664] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=15f90c369664] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=15f90c369664] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-28 11:35:18 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
DEBUG - 2026-03-28 11:35:18 --> [REQ_ID=4975a52b22a3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 11:35:18 --> [REQ_ID=4975a52b22a3] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:35:18 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-28 11:35:18 --> [REQ_ID=4975a52b22a3] [PERF] Execution time=0.011831
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 11:35:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 11:35:20 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=ad8ed4109aaa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 11:35:20 --> [REQ_ID=ad8ed4109aaa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [LIFECYCLE][END] status=200 duration_ms=22.18 memory_delta=0
INFO - 2026-03-28 11:35:20 --> [REQ_ID=ad8ed4109aaa] [PERF] Execution time=0.022093
DEBUG - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [REQUEST][END]
INFO - 2026-03-28 11:35:20 --> [REQ_ID=96448000b179] [PERF] Execution time=0.032071
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 11:35:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 11:35:21 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
INFO - 2026-03-28 11:35:21 --> CSRF token verified.
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=b16eed158cc1] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 11:35:21 --> [REQ_ID=b16eed158cc1] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:35:21 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-28 11:35:21 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-28 11:35:21 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 193.19.109.39, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36
DEBUG - 2026-03-28 11:35:21 --> Auth attemptLogin() called with login identifier: Michaelaeron, remember: false
DEBUG - 2026-03-28 11:35:21 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-28 11:35:21 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-28 11:35:21 --> [AUTH_FAILURE] 
DEBUG - 2026-03-28 11:35:21 --> Auth attempt failed for identifier Michaelaeron. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Michaelaeron">Resend activation message one more time.</a>
WARNING - 2026-03-28 11:35:21 --> [AUTH] Login failure
WARNING - 2026-03-28 11:35:21 --> [AUTH] Login failed
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [LIFECYCLE][END] status=302 duration_ms=108.03 memory_delta=0
INFO - 2026-03-28 11:35:21 --> [REQ_ID=b16eed158cc1] [PERF] Execution time=0.107889
DEBUG - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [REQUEST][END]
INFO - 2026-03-28 11:35:21 --> [REQ_ID=e7fac9cc3bcd] [PERF] Execution time=0.117361
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 11:35:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 11:35:22 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=e52838a58a66] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 11:35:22 --> [REQ_ID=e52838a58a66] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [LIFECYCLE][END] status=200 duration_ms=15.18 memory_delta=0
INFO - 2026-03-28 11:35:22 --> [REQ_ID=e52838a58a66] [PERF] Execution time=0.015073
DEBUG - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [REQUEST][END]
INFO - 2026-03-28 11:35:22 --> [REQ_ID=c30d2a39a714] [PERF] Execution time=0.024907
DEBUG - 2026-03-28 11:35:23 --> [REQ_ID=28f5b8e08b55] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-28 11:35:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:35:23 --> [REQ_ID=28f5b8e08b55] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-28 11:35:23 --> [REQ_ID=28f5b8e08b55] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 11:35:23 --> [REQ_ID=28f5b8e08b55] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 11:35:23 --> [CSRF] token name=csrf_test_name hash=1114599838aefadba1e81d157d82d34e
DEBUG - 2026-03-28 11:35:23 --> [REQ_ID=dbbd2188de44] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 11:35:23 --> [REQ_ID=dbbd2188de44] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:35:23 --> [REQ_ID=dbbd2188de44] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 11:35:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:35:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 11:35:24 --> [REQ_ID=dbbd2188de44] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 11:35:24 --> [REQ_ID=dbbd2188de44] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 11:35:24 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 11:35:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 11:35:24 --> [REQ_ID=28f5b8e08b55] [FILTER_AFTER]
DEBUG - 2026-03-28 11:35:24 --> [REQ_ID=28f5b8e08b55] [LIFECYCLE][END] status=200 duration_ms=559.58 memory_delta=4194304
INFO - 2026-03-28 11:35:24 --> [REQ_ID=dbbd2188de44] [PERF] Execution time=0.559360
DEBUG - 2026-03-28 11:35:24 --> [REQ_ID=28f5b8e08b55] [REQUEST][END]
INFO - 2026-03-28 11:35:24 --> [REQ_ID=28f5b8e08b55] [PERF] Execution time=0.569358
DEBUG - 2026-03-28 11:36:22 --> [REQ_ID=a6aa6a3d8385] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:40:53 --> [REQ_ID=d4d709399410] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:40:53 --> [REQ_ID=d4d709399410] [REQUEST][END]
INFO - 2026-03-28 11:40:53 --> [REQ_ID=d4d709399410] [PERF] Execution time=0.038900
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [REQUEST][START] GET /index.php/activate-account?token=7a463a0c905b969f31e87c1aeeea4d6c
DEBUG - 2026-03-28 11:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [FILTER_BEFORE] /index.php/activate-account?token=7a463a0c905b969f31e87c1aeeea4d6c
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=7a463a0c905b969f31e87c1aeeea4d6c
DEBUG - 2026-03-28 11:41:15 --> [CSRF] token name=csrf_test_name hash=b65dfa2831db95e0e7155aab8124bbeb
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=8d7a1aecaf13] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 11:41:15 --> [REQ_ID=8d7a1aecaf13] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:41:15 --> [ACTIVATION] Activation link hit
DEBUG - 2026-03-28 11:41:15 --> [ACTIVATION] Token validated for user
INFO - 2026-03-28 11:41:15 --> [ACTIVATION] Account activated
INFO - 2026-03-28 11:41:15 --> [ACTIVATION] Redirect issued
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [FILTER_AFTER]
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [LIFECYCLE][END] status=302 duration_ms=302.64 memory_delta=0
INFO - 2026-03-28 11:41:15 --> [REQ_ID=8d7a1aecaf13] [PERF] Execution time=0.300510
DEBUG - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [REQUEST][END]
INFO - 2026-03-28 11:41:15 --> [REQ_ID=fac2f9f834cc] [PERF] Execution time=0.318402
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 11:41:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 11:41:17 --> [CSRF] token name=csrf_test_name hash=ea74a0bb24194ff1e6252dedc35a1ad2
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=18d029bd51b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 11:41:17 --> [REQ_ID=18d029bd51b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [FILTER_AFTER]
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [LIFECYCLE][END] status=200 duration_ms=19.00 memory_delta=0
INFO - 2026-03-28 11:41:17 --> [REQ_ID=18d029bd51b2] [PERF] Execution time=0.018887
DEBUG - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [REQUEST][END]
INFO - 2026-03-28 11:41:17 --> [REQ_ID=06116476d75d] [PERF] Execution time=0.029227
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-28 11:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 11:41:18 --> [CSRF] token name=csrf_test_name hash=ea74a0bb24194ff1e6252dedc35a1ad2
INFO - 2026-03-28 11:41:18 --> CSRF token verified.
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=e4aec0962ddb] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-28 11:41:18 --> [REQ_ID=e4aec0962ddb] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 11:41:18 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-28 11:41:18 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-28 11:41:18 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 173.239.254.179, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36
DEBUG - 2026-03-28 11:41:18 --> Auth attemptLogin() called with login identifier: Michaelaeron, remember: false
DEBUG - 2026-03-28 11:41:18 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-03-28 11:41:18 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-28 11:41:18 --> Auth attempt succeeded for identifier Michaelaeron. logged_in(): yes, user_id(): 11759
DEBUG - 2026-03-28 11:41:18 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11759
DEBUG - 2026-03-28 11:41:18 --> Auth attemptLogin() - session user_id set to: 11759
INFO - 2026-03-28 11:41:18 --> [AUTH] Login success
INFO - 2026-03-28 11:41:18 --> OnboardingProgressService: first verified login recorded for user_id=11759
INFO - 2026-03-28 11:41:18 --> OnboardingProgressService: walkthrough started for user_id=11759
INFO - 2026-03-28 11:41:18 --> Auth attemptLogin() onboarding walkthrough queued for user_id=11759
DEBUG - 2026-03-28 11:41:18 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [FILTER_AFTER]
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [LIFECYCLE][END] status=302 duration_ms=131.16 memory_delta=0
INFO - 2026-03-28 11:41:18 --> [REQ_ID=e4aec0962ddb] [PERF] Execution time=0.130849
DEBUG - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [REQUEST][END]
INFO - 2026-03-28 11:41:18 --> [REQ_ID=eec1a09c246e] [PERF] Execution time=0.141128
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=a2212205a876] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-28 11:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=a2212205a876] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=a2212205a876] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=a2212205a876] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-28 11:41:19 --> [CSRF] token name=csrf_test_name hash=ea74a0bb24194ff1e6252dedc35a1ad2
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=ca63503ee27a] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-28 11:41:19 --> [REQ_ID=ca63503ee27a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=ca63503ee27a] [METHOD_ENTRY] index
DEBUG - 2026-03-28 11:41:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 11:41:19 --> [DASHBOARD] Enter
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
ERROR - 2026-03-28 11:41:19 --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
DEBUG - 2026-03-28 11:41:19 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-03-28 11:41:19 --> Unknown column 'score_total' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 11:41:19\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 11:41:19\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-03-27 11:41:19\'')
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
DEBUG - 2026-03-28 11:41:19 --> MyMIInvestments::getSqueezeHighRiskCount failed: Unknown column 'score_total' in 'where clause'
DEBUG - 2026-03-28 11:41:19 --> 📰 Daily dashboard news window 2026-03-28 00:00:00 -> 2026-03-28 23:59:59 returned 0 rows
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SETUP] Status computed
DEBUG - 2026-03-28 11:41:19 --> [REQ_ID=ca63503ee27a] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-03-28 11:41:19 --> [REQ_ID=ca63503ee27a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","status":1}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-28 11:41:19 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:19 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
INFO - 2026-03-28 11:41:19 --> DashboardController: onboarding walkthrough modal triggered for user_id=11759
INFO - 2026-03-28 11:41:19 --> getSolanaData: invalid address param
INFO - 2026-03-28 11:41:20 --> themesMemory usage: 6291456
DEBUG - 2026-03-28 11:41:20 --> [REQ_ID=a2212205a876] [FILTER_AFTER]
DEBUG - 2026-03-28 11:41:20 --> [REQ_ID=a2212205a876] [LIFECYCLE][END] status=200 duration_ms=742.37 memory_delta=2097152
INFO - 2026-03-28 11:41:20 --> [REQ_ID=ca63503ee27a] [PERF] Execution time=0.736063
DEBUG - 2026-03-28 11:41:20 --> [REQ_ID=a2212205a876] [REQUEST][END]
INFO - 2026-03-28 11:41:20 --> [REQ_ID=a2212205a876] [PERF] Execution time=0.757758
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=1819dbba02aa] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-28 11:41:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=1819dbba02aa] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=1819dbba02aa] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=1819dbba02aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-28 11:41:21 --> [CSRF] token name=csrf_test_name hash=ea74a0bb24194ff1e6252dedc35a1ad2
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=643762baca3c] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-28 11:41:21 --> [REQ_ID=643762baca3c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 11:41:21 --> [REQ_ID=643762baca3c] [METHOD_ENTRY] billing
DEBUG - 2026-03-28 11:41:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:41:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:21 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 11:41:21 --> No default Solana wallet for user 11759; provisioning...
INFO - 2026-03-28 11:41:21 --> [REQ_ID=643762baca3c] [PERF] Execution time=0.016081
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=ff8982a76dc0] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=4a828243c468] [REQUEST][START] GET /index.php/Profile/Michaelaeron
DEBUG - 2026-03-28 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=4a828243c468] [FILTER_BEFORE] /index.php/Profile/Michaelaeron
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=4a828243c468] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=4a828243c468] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/Michaelaeron
DEBUG - 2026-03-28 11:41:22 --> [CSRF] token name=csrf_test_name hash=ea74a0bb24194ff1e6252dedc35a1ad2
DEBUG - 2026-03-28 11:41:22 --> [REQ_ID=30a5242a5253] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-03-28 11:41:22 --> [REQ_ID=30a5242a5253] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 11:41:23 --> [REQ_ID=30a5242a5253] [METHOD_ENTRY] profile
DEBUG - 2026-03-28 11:41:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-28 11:41:23 --> DashboardController L344 - $totalActiveUsers: 20
DEBUG - 2026-03-28 11:41:23 --> DashboardController L331 - Profile Method: Username = Michaelaeron
INFO - 2026-03-28 11:41:23 --> [REQ_ID=30a5242a5253] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-28 11:41:23 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
INFO - 2026-03-28 11:41:23 --> getSolanaData: invalid address param
DEBUG - 2026-03-28 11:41:23 --> [REQ_ID=30a5242a5253] [VIEW_RENDER] App\Modules\User\Views\Dashboard\Profile
INFO - 2026-03-28 11:41:23 --> [REQ_ID=30a5242a5253] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"02"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","status":1,"month":"04"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","month":"04","year":"2026","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Investment","status":1}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-03-28 11:41:23 --> DashboardController L72 - $checkingSummary: 0
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"03","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":11759,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":11759,"deleted":0}
DEBUG - 2026-03-28 11:41:23 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":11759,"deleted":0}
INFO - 2026-03-28 11:41:23 --> getSolanaData: invalid address param
DEBUG - 2026-03-28 11:41:23 --> Dashboard\Profile L2 - $userInfo array: Array
(
    [id] => 11759
    [role_id] => 4
    [email] => stepha.n.iebur.tol.om.ew@gmail.com
    [username] => Michaelaeron
    [phone] => 
    [status] => 
    [status_message] => 
    [active] => 1
    [activate_hash] => 
    [last_active] => 
    [password] => 
    [password_hash] => $2y$10$kE1Lom9XFAHu4QWFv4uX/uXh7y52KE7sNEhpBTpP/E89wVDLGsQ9u
    [reset_at] => 
    [reset_hash] => 
    [reset_expires] => 
    [created_at] => 2026-03-28 11:35:16
    [updated_at] => 2026-03-28 11:41:15
    [deleted_at] => 
    [reset_by] => 
    [account_type] => 
    [signup_date] => 
    [force_password_reset] => 0
    [referred] => 
    [referral_code] => 
    [referred_by_user_id] => 
    [reactivate] => 
    [display_name] => 
    [display_name_changed] => 
    [first_name] => 
    [middle_name] => 
    [last_name] => 
    [name_suffix] => 
    [dob] => N/A
    [ssn] => XXX-XX-XXXX
    [address] => N/A
    [city] => N/A
    [state] => N/A
    [country] => US
    [zipcode] => N/A
    [mailing_address] => N/A
    [employment] => N/A
    [occupation] => N/A
    [salary] => N/A
    [proof_identity] => 
    [proof_address] => 
    [timezone] => UTC
    [language] => english
    [type] => 
    [admin] => No
    [partner] => 0
    [investor] => 0
    [beta_wallet] => 
    [private_key] => 
    [wallet_id] => 
    [default_wallet] => 
    [tt_columns] => No
    [organization] => 
    [picture] => 
    [link] => 
    [ref_signup_date] => 
    [referral] => 
    [referrer] => No
    [referral_link] => 
    [referrer_code] => 
    [promo_code] => 
    [last_login] => 0000-00-00 00:00:00
    [last_ip] => 
    [created_on] => 0000-00-00 00:00:00
    [deleted] => 0
    [banned] => 0
    [ban_message] => 
    [account_information] => No
    [kyc] => No
    [kyc_verified] => No
    [features_activated] => No
    [financial_assessment] => No
    [investment_assessment] => No
    [banking_accounts] => No
    [banking_wallets] => No
    [last_banking_update] => No
    [banking_integration] => No
    [credit_summary] => No
    [credit_wallets] => No
    [last_credit_update] => No
    [credit_integration] => No
    [debt_summary] => No
    [debt_wallets] => No
    [last_debt_update] => No
    [debt_integration] => No
    [budgeting_complete] => No
    [investment_wallets] => No
    [last_investment_update] => No
    [brokerage_integration] => No
    [risk_assessment] => No
    [financial_goals] => No
    [time_horizon] => No
    [financial_rating] => No
    [investment_experience] => No
    [investment_knowledge] => No
    [market_sentiment] => No
    [investment_availability] => No
    [personal_budgeting] => No
    [portfolio_manager] => No
    [automated_integration] => No
    [asset_creator] => No
    [notification_preference] => 
    [trade_alerts] => 
    [account_review] => 0
    [marketing_review] => 0
    [request_ban] => 0
    [force_pass_reset] => 0
    [kyc_verification] => 0
    [kyc_status] => 
    [kyc_date] => 
    [kyc_time] => 
    [kyc_documentation] => 
    [kyc_rejection_date] => 
    [kyc_rejection_details] => 
    [drip_campaign_type] => none
    [drip_step_number] => 0
    [drip_last_sent_at] => 
    [drip_completed] => 0
    [activate_email_resend] => 
    [facebook] => 
    [linkedin] => 
    [discord_username] => 
    [discord_id] => 
    [discord_verified] => 0
    [twitter] => 
    [email_verified_at] => 
    [email_bounced_at] => 
    [email_verification_token_hash] => 
)

INFO - 2026-03-28 11:41:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 11:41:23 --> [REQ_ID=4a828243c468] [FILTER_AFTER]
DEBUG - 2026-03-28 11:41:23 --> [REQ_ID=4a828243c468] [LIFECYCLE][END] status=200 duration_ms=927.20 memory_delta=6291456
INFO - 2026-03-28 11:41:23 --> [REQ_ID=30a5242a5253] [PERF] Execution time=0.921949
DEBUG - 2026-03-28 11:41:23 --> [REQ_ID=4a828243c468] [REQUEST][END]
INFO - 2026-03-28 11:41:23 --> [REQ_ID=4a828243c468] [PERF] Execution time=0.937759
DEBUG - 2026-03-28 11:41:25 --> [REQ_ID=cc86316d586b] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:41:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:41:25 --> [REQ_ID=cc86316d586b] [REQUEST][END]
INFO - 2026-03-28 11:41:25 --> [REQ_ID=cc86316d586b] [PERF] Execution time=0.009707
DEBUG - 2026-03-28 11:46:22 --> [REQ_ID=a99a6d5b9c7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:48:29 --> [REQ_ID=2252a3f7efa8] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:48:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:48:29 --> [REQ_ID=2252a3f7efa8] [FILTER_BEFORE] /
DEBUG - 2026-03-28 11:48:29 --> [REQ_ID=2252a3f7efa8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 11:48:29 --> [REQ_ID=2252a3f7efa8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 11:48:29 --> [CSRF] token name=csrf_test_name hash=d155345a658a52b8e0f6b3114d3371eb
DEBUG - 2026-03-28 11:48:29 --> [REQ_ID=42d7b84af16d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 11:48:29 --> [REQ_ID=42d7b84af16d] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 11:48:29 --> [REQ_ID=42d7b84af16d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 11:48:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 11:48:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 11:48:30 --> [REQ_ID=42d7b84af16d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 11:48:30 --> [REQ_ID=42d7b84af16d] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 11:48:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 11:48:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 11:48:30 --> [REQ_ID=2252a3f7efa8] [FILTER_AFTER]
DEBUG - 2026-03-28 11:48:30 --> [REQ_ID=2252a3f7efa8] [LIFECYCLE][END] status=200 duration_ms=818.55 memory_delta=4194304
INFO - 2026-03-28 11:48:30 --> [REQ_ID=42d7b84af16d] [PERF] Execution time=0.816615
DEBUG - 2026-03-28 11:48:30 --> [REQ_ID=2252a3f7efa8] [REQUEST][END]
INFO - 2026-03-28 11:48:30 --> [REQ_ID=2252a3f7efa8] [PERF] Execution time=0.856650
DEBUG - 2026-03-28 11:50:25 --> [REQ_ID=98d48129af62] [REQUEST][START] GET /
DEBUG - 2026-03-28 11:50:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 11:50:25 --> [REQ_ID=98d48129af62] [REQUEST][END]
INFO - 2026-03-28 11:50:25 --> [REQ_ID=98d48129af62] [PERF] Execution time=0.037895
DEBUG - 2026-03-28 11:51:22 --> [REQ_ID=0009226b52fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 11:56:22 --> [REQ_ID=d59e30c315bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 11:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 11:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 11:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 11:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [REQUEST][END]
INFO - 2026-03-28 12:00:01 --> [REQ_ID=9c9569726749] [PERF] Execution time=0.075220
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=8631b2014685] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-28 12:00:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=8631b2014685] [FILTER_BEFORE] /index.php/Getting-Started
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=8631b2014685] [ROUTE] Controller=\App\Controllers\Home Method=gettingStarted
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=8631b2014685] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Getting-Started
DEBUG - 2026-03-28 12:00:46 --> [CSRF] token name=csrf_test_name hash=21433a9ce1c4c866b3734460c5577e0f
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=37432fb5aeff] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:00:46 --> [REQ_ID=37432fb5aeff] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 12:00:46 --> [REQ_ID=37432fb5aeff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 12:00:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:00:46 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
DEBUG - 2026-03-28 12:00:46 --> [REQ_ID=37432fb5aeff] [VIEW_RENDER] themes/public/gettingStarted
INFO - 2026-03-28 12:00:46 --> [REQ_ID=37432fb5aeff] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:00:46 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:00:46 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
DEBUG - 2026-03-28 12:00:47 --> [REQ_ID=8631b2014685] [FILTER_AFTER]
DEBUG - 2026-03-28 12:00:47 --> [REQ_ID=8631b2014685] [LIFECYCLE][END] status=200 duration_ms=711.13 memory_delta=4194304
INFO - 2026-03-28 12:00:47 --> [REQ_ID=37432fb5aeff] [PERF] Execution time=0.709950
DEBUG - 2026-03-28 12:00:47 --> [REQ_ID=8631b2014685] [REQUEST][END]
INFO - 2026-03-28 12:00:47 --> [REQ_ID=8631b2014685] [PERF] Execution time=0.725312
DEBUG - 2026-03-28 12:00:48 --> [REQ_ID=f94b5bb45218] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-28 12:00:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:00:48 --> [REQ_ID=f94b5bb45218] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-28 12:00:48 --> [REQ_ID=f94b5bb45218] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-28 12:00:48 --> [REQ_ID=f94b5bb45218] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-28 12:00:48 --> [CSRF] token name=csrf_test_name hash=72d0e51f5317a32fec6cc63b52b45847
DEBUG - 2026-03-28 12:00:48 --> [REQ_ID=28f846ddbcda] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:00:48 --> [REQ_ID=28f846ddbcda] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 12:00:48 --> [REQ_ID=28f846ddbcda] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 12:00:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:00:49 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-28 12:00:49 --> [REQ_ID=28f846ddbcda] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-28 12:00:49 --> [REQ_ID=28f846ddbcda] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:00:49 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:00:49 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-28 12:00:49 --> [REQ_ID=f94b5bb45218] [FILTER_AFTER]
DEBUG - 2026-03-28 12:00:49 --> [REQ_ID=f94b5bb45218] [LIFECYCLE][END] status=200 duration_ms=541.36 memory_delta=2097152
INFO - 2026-03-28 12:00:49 --> [REQ_ID=28f846ddbcda] [PERF] Execution time=0.541294
DEBUG - 2026-03-28 12:00:49 --> [REQ_ID=f94b5bb45218] [REQUEST][END]
INFO - 2026-03-28 12:00:49 --> [REQ_ID=f94b5bb45218] [PERF] Execution time=0.553708
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 12:00:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 12:00:50 --> [CSRF] token name=csrf_test_name hash=9aa6118778af697c7efb391ed7fe133c
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=747b5a7a5cc0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 12:00:50 --> [REQ_ID=747b5a7a5cc0] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [FILTER_AFTER]
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [LIFECYCLE][END] status=200 duration_ms=23.79 memory_delta=0
INFO - 2026-03-28 12:00:50 --> [REQ_ID=747b5a7a5cc0] [PERF] Execution time=0.023513
DEBUG - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [REQUEST][END]
INFO - 2026-03-28 12:00:50 --> [REQ_ID=c7cc2b89a504] [PERF] Execution time=0.037353
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=099947726ae7] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-28 12:00:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=099947726ae7] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=099947726ae7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=099947726ae7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-28 12:00:59 --> [CSRF] token name=csrf_test_name hash=8a914f21d80c5eb8203c702f1c608a43
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=c801fd8cddfe] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 12:00:59 --> [REQ_ID=c801fd8cddfe] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 12:00:59 --> [REQ_ID=c801fd8cddfe] [METHOD_ENTRY] index
DEBUG - 2026-03-28 12:00:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:00:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 12:00:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 12:00:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 12:00:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 12:00:59 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-28 12:00:59 --> HowItWorksController failure: overview
CRITICAL - 2026-03-28 12:00:59 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:00:59 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:00:59 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works
WARNING - 2026-03-28 12:00:59 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works | referrer: https://www.mymiwallet.com/index.php/Getting-Started
INFO - 2026-03-28 12:00:59 --> [REQ_ID=c801fd8cddfe] [PERF] Execution time=0.069907
DEBUG - 2026-03-28 12:01:09 --> [REQ_ID=2678fddfb855] [REQUEST][START] GET /index.php
DEBUG - 2026-03-28 12:01:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:01:09 --> [REQ_ID=2678fddfb855] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-28 12:01:09 --> [REQ_ID=2678fddfb855] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 12:01:09 --> [REQ_ID=2678fddfb855] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 12:01:09 --> [CSRF] token name=csrf_test_name hash=5b244b8724be9713c51c1dc017f8d803
DEBUG - 2026-03-28 12:01:09 --> [REQ_ID=f866e5091dc7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:01:09 --> [REQ_ID=f866e5091dc7] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 12:01:10 --> [REQ_ID=f866e5091dc7] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 12:01:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:01:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=f866e5091dc7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 12:01:10 --> [REQ_ID=f866e5091dc7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:01:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:01:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=2678fddfb855] [FILTER_AFTER]
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=2678fddfb855] [LIFECYCLE][END] status=200 duration_ms=715.13 memory_delta=4194304
INFO - 2026-03-28 12:01:10 --> [REQ_ID=f866e5091dc7] [PERF] Execution time=0.714882
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=2678fddfb855] [REQUEST][END]
INFO - 2026-03-28 12:01:10 --> [REQ_ID=2678fddfb855] [PERF] Execution time=0.724460
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=d34e4037b7bc] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-28 12:01:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=d34e4037b7bc] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=d34e4037b7bc] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=d34e4037b7bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-28 12:01:10 --> [CSRF] token name=csrf_test_name hash=3eb6f4baa561ee564cd964770c51a448
DEBUG - 2026-03-28 12:01:10 --> [REQ_ID=d5796c53ad29] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:01:10 --> [REQ_ID=d5796c53ad29] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 12:01:10 --> [REQ_ID=d5796c53ad29] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 12:01:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:01:11 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-28 12:01:11 --> [REQ_ID=d5796c53ad29] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-28 12:01:11 --> [REQ_ID=d5796c53ad29] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:01:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:01:11 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-28 12:01:11 --> [REQ_ID=d34e4037b7bc] [FILTER_AFTER]
DEBUG - 2026-03-28 12:01:11 --> [REQ_ID=d34e4037b7bc] [LIFECYCLE][END] status=200 duration_ms=511.48 memory_delta=2097152
INFO - 2026-03-28 12:01:11 --> [REQ_ID=d5796c53ad29] [PERF] Execution time=0.511256
DEBUG - 2026-03-28 12:01:11 --> [REQ_ID=d34e4037b7bc] [REQUEST][END]
INFO - 2026-03-28 12:01:11 --> [REQ_ID=d34e4037b7bc] [PERF] Execution time=0.521007
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-28 12:01:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 12:01:12 --> [CSRF] token name=csrf_test_name hash=40422b5c4c2235935a662c4e2189b84c
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 12:01:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:01:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:01:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:01:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [FILTER_AFTER]
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [LIFECYCLE][END] status=200 duration_ms=566.45 memory_delta=2097152
INFO - 2026-03-28 12:01:12 --> [REQ_ID=be207c967ac0] [PERF] Execution time=0.566112
DEBUG - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [REQUEST][END]
INFO - 2026-03-28 12:01:12 --> [REQ_ID=91c18b92b297] [PERF] Execution time=0.577122
DEBUG - 2026-03-28 12:01:22 --> [REQ_ID=1da0c5ceb4cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:06:22 --> [REQ_ID=ff3f6ca8c2f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:11:22 --> [REQ_ID=9f07190928dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:12:03 --> [REQ_ID=6695f36b294d] [REQUEST][START] GET /
DEBUG - 2026-03-28 12:12:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:12:03 --> [REQ_ID=6695f36b294d] [FILTER_BEFORE] /
DEBUG - 2026-03-28 12:12:03 --> [REQ_ID=6695f36b294d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 12:12:03 --> [REQ_ID=6695f36b294d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 12:12:03 --> [CSRF] token name=csrf_test_name hash=1a42b14aafab351febfe180a54b50ae2
DEBUG - 2026-03-28 12:12:03 --> [REQ_ID=6fd6d9d96806] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:12:03 --> [REQ_ID=6fd6d9d96806] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 12:12:03 --> [REQ_ID=6fd6d9d96806] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 12:12:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:12:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=6fd6d9d96806] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 12:12:04 --> [REQ_ID=6fd6d9d96806] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:12:04 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:12:04 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=6695f36b294d] [FILTER_AFTER]
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=6695f36b294d] [LIFECYCLE][END] status=200 duration_ms=737.38 memory_delta=4194304
INFO - 2026-03-28 12:12:04 --> [REQ_ID=6fd6d9d96806] [PERF] Execution time=0.735296
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=6695f36b294d] [REQUEST][END]
INFO - 2026-03-28 12:12:04 --> [REQ_ID=6695f36b294d] [PERF] Execution time=0.756057
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=013a7bfb74c4] [REQUEST][START] GET /
DEBUG - 2026-03-28 12:12:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=013a7bfb74c4] [FILTER_BEFORE] /
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=013a7bfb74c4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=013a7bfb74c4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 12:12:04 --> [CSRF] token name=csrf_test_name hash=1a42b14aafab351febfe180a54b50ae2
DEBUG - 2026-03-28 12:12:04 --> [REQ_ID=9b798059acc7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 12:12:04 --> [REQ_ID=9b798059acc7] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 12:12:04 --> [REQ_ID=9b798059acc7] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 12:12:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 12:12:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:12:05 --> [REQ_ID=9b798059acc7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 12:12:05 --> [REQ_ID=9b798059acc7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 12:12:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 12:12:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 12:12:05 --> [REQ_ID=013a7bfb74c4] [FILTER_AFTER]
DEBUG - 2026-03-28 12:12:05 --> [REQ_ID=013a7bfb74c4] [LIFECYCLE][END] status=200 duration_ms=521.82 memory_delta=4194304
INFO - 2026-03-28 12:12:05 --> [REQ_ID=9b798059acc7] [PERF] Execution time=0.521641
DEBUG - 2026-03-28 12:12:05 --> [REQ_ID=013a7bfb74c4] [REQUEST][END]
INFO - 2026-03-28 12:12:05 --> [REQ_ID=013a7bfb74c4] [PERF] Execution time=0.530540
DEBUG - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [REQUEST][END]
INFO - 2026-03-28 12:15:02 --> [REQ_ID=a11a8177cceb] [PERF] Execution time=0.046213
DEBUG - 2026-03-28 12:16:22 --> [REQ_ID=6f0e76be011f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:21:22 --> [REQ_ID=124123a53c26] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:23:23 --> [REQ_ID=a795fe68e47d] [REQUEST][START] GET /index.php/Knowledgebase/Types-Of-Accounts
DEBUG - 2026-03-28 12:23:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:23:23 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Types-Of-Accounts]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 12:23:23 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 12:23:23 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 12:26:22 --> [REQ_ID=9e99266d1ebe] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:30:13 --> [REQ_ID=721ecaeb9b73] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-28 12:30:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:30:13 --> [REQ_ID=721ecaeb9b73] [REQUEST][END]
INFO - 2026-03-28 12:30:13 --> [REQ_ID=721ecaeb9b73] [PERF] Execution time=0.048689
DEBUG - 2026-03-28 12:31:22 --> [REQ_ID=52aab8f6e673] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:36:22 --> [REQ_ID=86fe1612aca4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:37:32 --> [REQ_ID=917e60683a01] [REQUEST][START] GET /index.php/Announcements
DEBUG - 2026-03-28 12:37:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:37:32 --> [REQ_ID=917e60683a01] [REQUEST][END]
INFO - 2026-03-28 12:37:32 --> [REQ_ID=917e60683a01] [PERF] Execution time=0.017480
DEBUG - 2026-03-28 12:41:22 --> [REQ_ID=e5b0a8c2d455] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:46:22 --> [REQ_ID=8a63641503fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:51:22 --> [REQ_ID=00b55be73329] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 12:51:38 --> [REQ_ID=3bb9d9873902] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-03-28 12:51:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 12:51:38 --> [REQ_ID=3bb9d9873902] [REQUEST][END]
INFO - 2026-03-28 12:51:38 --> [REQ_ID=3bb9d9873902] [PERF] Execution time=0.023872
DEBUG - 2026-03-28 12:56:22 --> [REQ_ID=0fb4495bc4e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 12:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 12:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 12:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 12:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [REQUEST][END]
INFO - 2026-03-28 13:00:01 --> [REQ_ID=f7617ce45f66] [PERF] Execution time=0.055661
DEBUG - 2026-03-28 13:01:22 --> [REQ_ID=4093dd5c52f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:06:22 --> [REQ_ID=dea418103429] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:07:46 --> [REQ_ID=95935f46a968] [REQUEST][START] GET /
DEBUG - 2026-03-28 13:07:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 13:07:46 --> [REQ_ID=95935f46a968] [FILTER_BEFORE] /
DEBUG - 2026-03-28 13:07:46 --> [REQ_ID=95935f46a968] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 13:07:46 --> [REQ_ID=95935f46a968] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 13:07:46 --> [CSRF] token name=csrf_test_name hash=3703ba291db1063ffb4fe4087eb75bcb
DEBUG - 2026-03-28 13:07:46 --> [REQ_ID=5781c0b3150c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 13:07:46 --> [REQ_ID=5781c0b3150c] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 13:07:47 --> [REQ_ID=5781c0b3150c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 13:07:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 13:07:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 13:07:47 --> [REQ_ID=5781c0b3150c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 13:07:47 --> [REQ_ID=5781c0b3150c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 13:07:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 13:07:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 13:07:47 --> [REQ_ID=95935f46a968] [FILTER_AFTER]
DEBUG - 2026-03-28 13:07:47 --> [REQ_ID=95935f46a968] [LIFECYCLE][END] status=200 duration_ms=688.97 memory_delta=4194304
INFO - 2026-03-28 13:07:47 --> [REQ_ID=5781c0b3150c] [PERF] Execution time=0.687040
DEBUG - 2026-03-28 13:07:47 --> [REQ_ID=95935f46a968] [REQUEST][END]
INFO - 2026-03-28 13:07:47 --> [REQ_ID=95935f46a968] [PERF] Execution time=0.730107
DEBUG - 2026-03-28 13:11:22 --> [REQ_ID=55cd7e51e7ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [REQUEST][END]
INFO - 2026-03-28 13:15:01 --> [REQ_ID=c8d1fb60194c] [PERF] Execution time=0.047431
DEBUG - 2026-03-28 13:16:22 --> [REQ_ID=336e321ab799] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:21:22 --> [REQ_ID=b69f80b22704] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:26:22 --> [REQ_ID=5b97da239b80] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:31:22 --> [REQ_ID=da8d09d45821] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:36:22 --> [REQ_ID=08fb43c79da8] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:41:22 --> [REQ_ID=9cabc627f817] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:46:22 --> [REQ_ID=f936c2f61f03] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [REQUEST][START] GET /
DEBUG - 2026-03-28 13:46:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [FILTER_BEFORE] /
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 13:46:51 --> [CSRF] token name=csrf_test_name hash=23091f8d0699209bf28f64665bd1d4af
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 13:46:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 13:46:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 13:46:51 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 13:46:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [FILTER_AFTER]
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [LIFECYCLE][END] status=200 duration_ms=584.71 memory_delta=4194304
INFO - 2026-03-28 13:46:51 --> [REQ_ID=5196b7cbf9ac] [PERF] Execution time=0.582650
DEBUG - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [REQUEST][END]
INFO - 2026-03-28 13:46:51 --> [REQ_ID=4730c4abf6f7] [PERF] Execution time=0.603925
DEBUG - 2026-03-28 13:51:22 --> [REQ_ID=951364b5e429] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 13:56:22 --> [REQ_ID=7c515a1e5bd7] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 13:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 13:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 13:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 13:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [REQUEST][END]
INFO - 2026-03-28 14:00:01 --> [REQ_ID=72a1bdb2cfc4] [PERF] Execution time=0.051613
DEBUG - 2026-03-28 14:01:22 --> [REQ_ID=ba7b3a74e283] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:06:22 --> [REQ_ID=043b63eb64b2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:11:22 --> [REQ_ID=72d71756af87] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [REQUEST][END]
INFO - 2026-03-28 14:15:01 --> [REQ_ID=c596af88269b] [PERF] Execution time=0.045575
DEBUG - 2026-03-28 14:16:22 --> [REQ_ID=bc74a48f5801] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:21:22 --> [REQ_ID=cb3607ca0e73] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:26:22 --> [REQ_ID=fcc9d9391970] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:27:28 --> [REQ_ID=9a31e12b4256] [REQUEST][START] GET /
DEBUG - 2026-03-28 14:27:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:27:28 --> [REQ_ID=9a31e12b4256] [FILTER_BEFORE] /
DEBUG - 2026-03-28 14:27:28 --> [REQ_ID=9a31e12b4256] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 14:27:28 --> [REQ_ID=9a31e12b4256] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 14:27:28 --> [CSRF] token name=csrf_test_name hash=442e42e6ab4296ad5f889c24568e0a27
DEBUG - 2026-03-28 14:27:28 --> [REQ_ID=74cb73b656f5] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 14:27:28 --> [REQ_ID=74cb73b656f5] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 14:27:28 --> [REQ_ID=74cb73b656f5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 14:27:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 14:27:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 14:27:29 --> [REQ_ID=74cb73b656f5] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 14:27:29 --> [REQ_ID=74cb73b656f5] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 14:27:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 14:27:29 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 14:27:29 --> [REQ_ID=9a31e12b4256] [FILTER_AFTER]
DEBUG - 2026-03-28 14:27:29 --> [REQ_ID=9a31e12b4256] [LIFECYCLE][END] status=200 duration_ms=719.72 memory_delta=4194304
INFO - 2026-03-28 14:27:29 --> [REQ_ID=74cb73b656f5] [PERF] Execution time=0.717659
DEBUG - 2026-03-28 14:27:29 --> [REQ_ID=9a31e12b4256] [REQUEST][END]
INFO - 2026-03-28 14:27:29 --> [REQ_ID=9a31e12b4256] [PERF] Execution time=0.739453
DEBUG - 2026-03-28 14:31:22 --> [REQ_ID=5e6f964d54f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:33:56 --> [REQ_ID=6f7cff203b8e] [REQUEST][START] GET /index.php/News/Pre-Market-Movers/November-23rd-2021
DEBUG - 2026-03-28 14:33:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:33:56 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/Pre-Market-Movers/November-23rd-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:33:56 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:33:56 --> [404] URI=https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-23rd-2021
WARNING - 2026-03-28 14:33:56 --> 404 route miss: https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-23rd-2021 | referrer: none
ERROR - 2026-03-28 14:33:56 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 14:36:22 --> [REQ_ID=bb7966a076c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:40:02 --> [REQ_ID=79356eee5525] [REQUEST][START] GET /
DEBUG - 2026-03-28 14:40:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:40:02 --> [REQ_ID=79356eee5525] [FILTER_BEFORE] /
DEBUG - 2026-03-28 14:40:02 --> [REQ_ID=79356eee5525] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 14:40:02 --> [REQ_ID=79356eee5525] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 14:40:02 --> [CSRF] token name=csrf_test_name hash=af908367f01192007d1d597e126b0bb4
DEBUG - 2026-03-28 14:40:02 --> [REQ_ID=e3045fe5c3e2] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 14:40:02 --> [REQ_ID=e3045fe5c3e2] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 14:40:02 --> [REQ_ID=e3045fe5c3e2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 14:40:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 14:40:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 14:40:03 --> [REQ_ID=e3045fe5c3e2] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 14:40:03 --> [REQ_ID=e3045fe5c3e2] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 14:40:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 14:40:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 14:40:03 --> [REQ_ID=79356eee5525] [FILTER_AFTER]
DEBUG - 2026-03-28 14:40:03 --> [REQ_ID=79356eee5525] [LIFECYCLE][END] status=200 duration_ms=855.49 memory_delta=4194304
INFO - 2026-03-28 14:40:03 --> [REQ_ID=e3045fe5c3e2] [PERF] Execution time=0.853492
DEBUG - 2026-03-28 14:40:03 --> [REQ_ID=79356eee5525] [REQUEST][END]
INFO - 2026-03-28 14:40:03 --> [REQ_ID=79356eee5525] [PERF] Execution time=0.895140
DEBUG - 2026-03-28 14:41:22 --> [REQ_ID=b8f7e3562a3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:42:46 --> [REQ_ID=2ee2a5a31ebe] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-28 14:42:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:42:46 --> [REQ_ID=2ee2a5a31ebe] [REQUEST][END]
INFO - 2026-03-28 14:42:46 --> [REQ_ID=2ee2a5a31ebe] [PERF] Execution time=0.040002
DEBUG - 2026-03-28 14:46:22 --> [REQ_ID=34c8b49447c5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:51:22 --> [REQ_ID=e6b406039576] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 14:53:27 --> [REQ_ID=e1841f85af81] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:53:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:53:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:53:27 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:53:27 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:53:27 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-28 14:55:54 --> [REQ_ID=f2de267ccf8e] [REQUEST][START] GET /
DEBUG - 2026-03-28 14:55:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 14:55:54 --> [REQ_ID=f2de267ccf8e] [FILTER_BEFORE] /
DEBUG - 2026-03-28 14:55:54 --> [REQ_ID=f2de267ccf8e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 14:55:54 --> [REQ_ID=f2de267ccf8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 14:55:54 --> [CSRF] token name=csrf_test_name hash=75de8571c689f6cc69e0ec794da6a40e
DEBUG - 2026-03-28 14:55:54 --> [REQ_ID=6d87874f4361] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 14:55:54 --> [REQ_ID=6d87874f4361] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 14:55:54 --> [REQ_ID=6d87874f4361] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 14:55:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 14:55:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 14:55:55 --> [REQ_ID=6d87874f4361] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 14:55:55 --> [REQ_ID=6d87874f4361] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 14:55:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 14:55:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 14:55:55 --> [REQ_ID=f2de267ccf8e] [FILTER_AFTER]
DEBUG - 2026-03-28 14:55:55 --> [REQ_ID=f2de267ccf8e] [LIFECYCLE][END] status=200 duration_ms=645.72 memory_delta=4194304
INFO - 2026-03-28 14:55:55 --> [REQ_ID=6d87874f4361] [PERF] Execution time=0.643754
DEBUG - 2026-03-28 14:55:55 --> [REQ_ID=f2de267ccf8e] [REQUEST][END]
INFO - 2026-03-28 14:55:55 --> [REQ_ID=f2de267ccf8e] [PERF] Execution time=0.684212
DEBUG - 2026-03-28 14:56:22 --> [REQ_ID=4d9fe91c822d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 14:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 14:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 14:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 14:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 14:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [REQUEST][END]
INFO - 2026-03-28 15:00:01 --> [REQ_ID=730a01bacee7] [PERF] Execution time=0.048108
DEBUG - 2026-03-28 15:01:22 --> [REQ_ID=9b0b2a56c98f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:06:22 --> [REQ_ID=1d38b0afe803] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:11:22 --> [REQ_ID=84b8f8462b7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 15:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [REQUEST][END]
INFO - 2026-03-28 15:15:02 --> [REQ_ID=25c5de72c94d] [PERF] Execution time=0.046263
DEBUG - 2026-03-28 15:16:22 --> [REQ_ID=93904dbb6997] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:21:22 --> [REQ_ID=42cfb652e4fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:26:22 --> [REQ_ID=62aaf6899867] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:31:22 --> [REQ_ID=c234fe00f854] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:36:22 --> [REQ_ID=5466dafbff6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:41:22 --> [REQ_ID=cac68a0e2d14] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:46:22 --> [REQ_ID=bd0e6b53ad2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:51:22 --> [REQ_ID=4cc20eaf5952] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 15:56:22 --> [REQ_ID=12305602702c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 15:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 15:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 15:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 15:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 15:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [REQUEST][END]
INFO - 2026-03-28 16:00:01 --> [REQ_ID=e31d5c16c1a6] [PERF] Execution time=0.045598
DEBUG - 2026-03-28 16:01:22 --> [REQ_ID=be72909990ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:06:22 --> [REQ_ID=d37dbf16c0ae] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:11:22 --> [REQ_ID=dc0f2b3e4ea6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [REQUEST][END]
INFO - 2026-03-28 16:15:01 --> [REQ_ID=ace4cf61577d] [PERF] Execution time=0.056518
DEBUG - 2026-03-28 16:16:22 --> [REQ_ID=731ac841d518] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:21:22 --> [REQ_ID=3026180dd71a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:22:10 --> [REQ_ID=4003fee1379b] [REQUEST][START] GET /
DEBUG - 2026-03-28 16:22:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:22:10 --> [REQ_ID=4003fee1379b] [FILTER_BEFORE] /
DEBUG - 2026-03-28 16:22:10 --> [REQ_ID=4003fee1379b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 16:22:10 --> [REQ_ID=4003fee1379b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 16:22:10 --> [CSRF] token name=csrf_test_name hash=fcbd364b6b7ec3d5c0d16df61e202dd5
DEBUG - 2026-03-28 16:22:10 --> [REQ_ID=cc81aedac9ae] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 16:22:10 --> [REQ_ID=cc81aedac9ae] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 16:22:10 --> [REQ_ID=cc81aedac9ae] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 16:22:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 16:22:11 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 16:22:11 --> [REQ_ID=cc81aedac9ae] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 16:22:11 --> [REQ_ID=cc81aedac9ae] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 16:22:11 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 16:22:11 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 16:22:11 --> [REQ_ID=4003fee1379b] [FILTER_AFTER]
DEBUG - 2026-03-28 16:22:11 --> [REQ_ID=4003fee1379b] [LIFECYCLE][END] status=200 duration_ms=651.01 memory_delta=4194304
INFO - 2026-03-28 16:22:11 --> [REQ_ID=cc81aedac9ae] [PERF] Execution time=0.649233
DEBUG - 2026-03-28 16:22:11 --> [REQ_ID=4003fee1379b] [REQUEST][END]
INFO - 2026-03-28 16:22:11 --> [REQ_ID=4003fee1379b] [PERF] Execution time=0.671007
DEBUG - 2026-03-28 16:22:13 --> [REQ_ID=6b99d2714126] [REQUEST][START] GET /
DEBUG - 2026-03-28 16:22:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [FILTER_BEFORE] /
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 16:22:14 --> [CSRF] token name=csrf_test_name hash=fcbd364b6b7ec3d5c0d16df61e202dd5
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 16:22:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 16:22:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 16:22:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 16:22:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [FILTER_AFTER]
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [LIFECYCLE][END] status=200 duration_ms=514.53 memory_delta=2097152
INFO - 2026-03-28 16:22:14 --> [REQ_ID=9dddcc106ca1] [PERF] Execution time=0.514196
DEBUG - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [REQUEST][END]
INFO - 2026-03-28 16:22:14 --> [REQ_ID=6b99d2714126] [PERF] Execution time=0.528645
DEBUG - 2026-03-28 16:22:24 --> [REQ_ID=427695a465e0] [REQUEST][START] GET /index.php/_ignition/execute-solution
DEBUG - 2026-03-28 16:22:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:22:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: _ignition/execute-solution]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:22:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:22:25 --> [404] URI=https://www.mymiwallet.com/index.php/_ignition/execute-solution
WARNING - 2026-03-28 16:22:25 --> 404 route miss: https://www.mymiwallet.com/index.php/_ignition/execute-solution | referrer: none
ERROR - 2026-03-28 16:22:25 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [REQUEST][START] GET /
DEBUG - 2026-03-28 16:22:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [FILTER_BEFORE] /
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 16:22:25 --> [CSRF] token name=csrf_test_name hash=fcbd364b6b7ec3d5c0d16df61e202dd5
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [AJAX_HEADERS] {"Content-Type":{},"Connection":{},"Host":{},"X-Requested-With":{},"Accept-Language":{},"Accept-Encoding":{},"Sec-Fetch-Dest":{},"Sec-Fetch-User":{},"Sec-Fetch-Mode":{},"Sec-Fetch-Site":{},"Accept":{},"User-Agent":{},"Upgrade-Insecure-Requests":{},"Sec-Ch-Ua-Platform":{},"Sec-Ch-Ua-Mobile":{},"Sec-Ch-Ua":{},"Cookie":{}}
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [AJAX_POST] []
INFO - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [FILTER_AFTER]
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [LIFECYCLE][END] status=401 duration_ms=51.54 memory_delta=0
INFO - 2026-03-28 16:22:25 --> [REQ_ID=4cf93bb0aede] [PERF] Execution time=0.049161
DEBUG - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [REQUEST][END]
INFO - 2026-03-28 16:22:25 --> [REQ_ID=78caf72e215b] [PERF] Execution time=0.070317
DEBUG - 2026-03-28 16:22:26 --> [REQ_ID=31a34eba671e] [REQUEST][START] GET /index.php/_ignition/execute-solution
DEBUG - 2026-03-28 16:22:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:22:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: _ignition/execute-solution]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:22:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:22:26 --> [404] URI=https://www.mymiwallet.com/index.php/_ignition/execute-solution
WARNING - 2026-03-28 16:22:26 --> 404 route miss: https://www.mymiwallet.com/index.php/_ignition/execute-solution | referrer: none
ERROR - 2026-03-28 16:22:26 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [REQUEST][START] GET /
DEBUG - 2026-03-28 16:25:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [FILTER_BEFORE] /
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 16:25:58 --> [CSRF] token name=csrf_test_name hash=c73d2535b0a2ced9ae2c39b7b348cf8d
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 16:25:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 16:25:58 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 16:25:58 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 16:25:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [FILTER_AFTER]
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [LIFECYCLE][END] status=200 duration_ms=646.34 memory_delta=4194304
INFO - 2026-03-28 16:25:58 --> [REQ_ID=1928fb7e9cc0] [PERF] Execution time=0.644336
DEBUG - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [REQUEST][END]
INFO - 2026-03-28 16:25:58 --> [REQ_ID=ff6d67f6ec75] [PERF] Execution time=0.687078
DEBUG - 2026-03-28 16:26:22 --> [REQ_ID=b2f6b9c00b36] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:31:22 --> [REQ_ID=dcb59bf16b95] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:36:22 --> [REQ_ID=28950de6ea29] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:41:22 --> [REQ_ID=27662852d70e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:46:22 --> [REQ_ID=319f51c70268] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:51:22 --> [REQ_ID=63536b43ee93] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 16:56:22 --> [REQ_ID=a117a97015c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 16:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 16:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 16:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 16:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 16:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:00:01 --> [REQ_ID=4200a6712c25] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 17:00:02 --> [REQ_ID=4200a6712c25] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 17:00:02 --> [REQ_ID=4200a6712c25] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 17:00:02 --> [REQ_ID=4200a6712c25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 17:00:02 --> [REQ_ID=4200a6712c25] [REQUEST][END]
INFO - 2026-03-28 17:00:02 --> [REQ_ID=4200a6712c25] [PERF] Execution time=0.048399
DEBUG - 2026-03-28 17:01:22 --> [REQ_ID=c5a96accdc89] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:06:22 --> [REQ_ID=3cc3e0a3d3c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:09:16 --> [REQ_ID=d028e2102184] [REQUEST][START] GET /
DEBUG - 2026-03-28 17:09:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 17:09:16 --> [REQ_ID=d028e2102184] [FILTER_BEFORE] /
DEBUG - 2026-03-28 17:09:16 --> [REQ_ID=d028e2102184] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 17:09:16 --> [REQ_ID=d028e2102184] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 17:09:16 --> [CSRF] token name=csrf_test_name hash=130ba993600c07ce22d6edb38a1d3b69
DEBUG - 2026-03-28 17:09:16 --> [REQ_ID=94a11973a8cb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 17:09:16 --> [REQ_ID=94a11973a8cb] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 17:09:17 --> [REQ_ID=94a11973a8cb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 17:09:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 17:09:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 17:09:17 --> [REQ_ID=94a11973a8cb] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 17:09:17 --> [REQ_ID=94a11973a8cb] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 17:09:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 17:09:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 17:09:17 --> [REQ_ID=d028e2102184] [FILTER_AFTER]
DEBUG - 2026-03-28 17:09:17 --> [REQ_ID=d028e2102184] [LIFECYCLE][END] status=200 duration_ms=798.59 memory_delta=4194304
INFO - 2026-03-28 17:09:17 --> [REQ_ID=94a11973a8cb] [PERF] Execution time=0.796741
DEBUG - 2026-03-28 17:09:17 --> [REQ_ID=d028e2102184] [REQUEST][END]
INFO - 2026-03-28 17:09:17 --> [REQ_ID=d028e2102184] [PERF] Execution time=0.838691
DEBUG - 2026-03-28 17:09:34 --> [REQ_ID=f813c564cddc] [REQUEST][START] GET /
DEBUG - 2026-03-28 17:09:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 17:09:34 --> [REQ_ID=f813c564cddc] [FILTER_BEFORE] /
DEBUG - 2026-03-28 17:09:34 --> [REQ_ID=f813c564cddc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 17:09:34 --> [REQ_ID=f813c564cddc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 17:09:34 --> [CSRF] token name=csrf_test_name hash=b6653db3fb823efe2b6a0dbbf9e11d57
DEBUG - 2026-03-28 17:09:34 --> [REQ_ID=00cdd88294a7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 17:09:34 --> [REQ_ID=00cdd88294a7] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 17:09:34 --> [REQ_ID=00cdd88294a7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 17:09:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 17:09:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 17:09:35 --> [REQ_ID=00cdd88294a7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 17:09:35 --> [REQ_ID=00cdd88294a7] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 17:09:35 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 17:09:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 17:09:35 --> [REQ_ID=f813c564cddc] [FILTER_AFTER]
DEBUG - 2026-03-28 17:09:35 --> [REQ_ID=f813c564cddc] [LIFECYCLE][END] status=200 duration_ms=545.91 memory_delta=2097152
INFO - 2026-03-28 17:09:35 --> [REQ_ID=00cdd88294a7] [PERF] Execution time=0.545786
DEBUG - 2026-03-28 17:09:35 --> [REQ_ID=f813c564cddc] [REQUEST][END]
INFO - 2026-03-28 17:09:35 --> [REQ_ID=f813c564cddc] [PERF] Execution time=0.555990
DEBUG - 2026-03-28 17:11:22 --> [REQ_ID=9c04ed1e7a37] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [REQUEST][END]
INFO - 2026-03-28 17:15:01 --> [REQ_ID=f66c646d4727] [PERF] Execution time=0.047821
DEBUG - 2026-03-28 17:16:22 --> [REQ_ID=4ab37bd9939b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:21:22 --> [REQ_ID=e01cf73ceb8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:26:22 --> [REQ_ID=17b57d7564ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:31:22 --> [REQ_ID=718bf31b5582] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:36:22 --> [REQ_ID=650cb98512b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:41:22 --> [REQ_ID=002bee8db65e] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:41:48 --> [REQ_ID=d6ce1cf1d875] [REQUEST][START] GET /
DEBUG - 2026-03-28 17:41:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 17:41:48 --> [REQ_ID=d6ce1cf1d875] [REQUEST][END]
INFO - 2026-03-28 17:41:48 --> [REQ_ID=d6ce1cf1d875] [PERF] Execution time=0.018388
DEBUG - 2026-03-28 17:46:22 --> [REQ_ID=f67f6f18c3b5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:51:22 --> [REQ_ID=08b1ff14d85f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 17:56:22 --> [REQ_ID=2a1f368fe6d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 17:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 17:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 17:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 17:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 17:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [REQUEST][END]
INFO - 2026-03-28 18:00:02 --> [REQ_ID=9253ed435e30] [PERF] Execution time=0.069652
DEBUG - 2026-03-28 18:01:22 --> [REQ_ID=861be86b3a0c] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:06:22 --> [REQ_ID=41f12402958d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:11:22 --> [REQ_ID=27b06e7ab57a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [REQUEST][END]
INFO - 2026-03-28 18:15:01 --> [REQ_ID=51ed66ec12da] [PERF] Execution time=0.075338
DEBUG - 2026-03-28 18:16:22 --> [REQ_ID=692e3a50d9e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:21:22 --> [REQ_ID=79a997005ddd] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:26:22 --> [REQ_ID=8d1699305381] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:31:22 --> [REQ_ID=920b7ea35aa4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:36:22 --> [REQ_ID=699dfdb03875] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:38:06 --> [REQ_ID=e3a1d91f2dc6] [REQUEST][START] GET /
DEBUG - 2026-03-28 18:38:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 18:38:06 --> [REQ_ID=e3a1d91f2dc6] [REQUEST][END]
INFO - 2026-03-28 18:38:06 --> [REQ_ID=e3a1d91f2dc6] [PERF] Execution time=0.037567
DEBUG - 2026-03-28 18:41:22 --> [REQ_ID=b12b8dc1fa57] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:46:22 --> [REQ_ID=8af2ebed7ccf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:49:16 --> [REQ_ID=36a8b3db3fbb] [REQUEST][START] GET /
DEBUG - 2026-03-28 18:49:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 18:49:16 --> [REQ_ID=36a8b3db3fbb] [REQUEST][END]
INFO - 2026-03-28 18:49:16 --> [REQ_ID=36a8b3db3fbb] [PERF] Execution time=0.038104
DEBUG - 2026-03-28 18:51:22 --> [REQ_ID=93056fc29306] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:56:22 --> [REQ_ID=30b684d91bb4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 18:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 18:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 18:57:07 --> [REQ_ID=5ecbeb8c38e6] [REQUEST][START] GET /index.php/News/Pre-Market-Movers/November-14th-2021
DEBUG - 2026-03-28 18:57:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 18:57:07 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: News/Pre-Market-Movers/November-14th-2021]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 18:57:07 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 18:57:07 --> [404] URI=https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-14th-2021
WARNING - 2026-03-28 18:57:08 --> 404 route miss: https://www.mymiwallet.com/index.php/News/Pre-Market-Movers/November-14th-2021 | referrer: none
ERROR - 2026-03-28 18:57:08 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [REQUEST][END]
INFO - 2026-03-28 19:00:01 --> [REQ_ID=beb55622f565] [PERF] Execution time=0.047991
DEBUG - 2026-03-28 19:01:22 --> [REQ_ID=089dab46f652] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:06:22 --> [REQ_ID=99674426f15a] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:11:22 --> [REQ_ID=115de1c09808] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:12:20 --> [REQ_ID=781ce73a4903] [REQUEST][START] GET /index.php/Knowledgebase/Integrating-Wallets
DEBUG - 2026-03-28 19:12:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:12:20 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Integrating-Wallets]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 19:12:20 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 19:12:20 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 19:12:24 --> [REQ_ID=5bc21376fe31] [REQUEST][START] GET /index.php/Knowledgebase/Integrating-Wallets
DEBUG - 2026-03-28 19:12:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:12:24 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Integrating-Wallets]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 19:12:24 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 19:12:24 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [REQUEST][END]
INFO - 2026-03-28 19:15:01 --> [REQ_ID=e687e7982e5f] [PERF] Execution time=0.045514
DEBUG - 2026-03-28 19:16:22 --> [REQ_ID=68d442890df0] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:21:22 --> [REQ_ID=29949c9127b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:26:22 --> [REQ_ID=b77fd81df218] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:31:22 --> [REQ_ID=1ffc65d8ea2b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:36:22 --> [REQ_ID=2da1de7e4d30] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:41:22 --> [REQ_ID=ec24a8741763] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:46:22 --> [REQ_ID=e014e873efc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:51:22 --> [REQ_ID=7cfba949f938] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:51:59 --> [REQ_ID=68ff44ad13d4] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-03-28 19:51:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:51:59 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Investor-Profile]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 19:51:59 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 19:51:59 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 19:56:22 --> [REQ_ID=abb359277767] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 19:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 19:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 19:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 19:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 19:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 19:58:32 --> [REQ_ID=1b1917a5f593] [REQUEST][START] GET /
DEBUG - 2026-03-28 19:58:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 19:58:32 --> [REQ_ID=1b1917a5f593] [FILTER_BEFORE] /
DEBUG - 2026-03-28 19:58:32 --> [REQ_ID=1b1917a5f593] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 19:58:32 --> [REQ_ID=1b1917a5f593] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 19:58:32 --> [CSRF] token name=csrf_test_name hash=c843ae87715cbab3d3510b271fdf3027
DEBUG - 2026-03-28 19:58:32 --> [REQ_ID=3d1cfe475dda] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 19:58:32 --> [REQ_ID=3d1cfe475dda] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 19:58:32 --> [REQ_ID=3d1cfe475dda] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 19:58:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 19:58:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 19:58:33 --> [REQ_ID=3d1cfe475dda] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 19:58:33 --> [REQ_ID=3d1cfe475dda] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 19:58:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 19:58:33 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 19:58:33 --> [REQ_ID=1b1917a5f593] [FILTER_AFTER]
DEBUG - 2026-03-28 19:58:33 --> [REQ_ID=1b1917a5f593] [LIFECYCLE][END] status=200 duration_ms=735.89 memory_delta=4194304
INFO - 2026-03-28 19:58:33 --> [REQ_ID=3d1cfe475dda] [PERF] Execution time=0.733872
DEBUG - 2026-03-28 19:58:33 --> [REQ_ID=1b1917a5f593] [REQUEST][END]
INFO - 2026-03-28 19:58:33 --> [REQ_ID=1b1917a5f593] [PERF] Execution time=0.775525
DEBUG - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 20:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [REQUEST][END]
INFO - 2026-03-28 20:00:02 --> [REQ_ID=2f378fb29d9f] [PERF] Execution time=0.047831
DEBUG - 2026-03-28 20:01:22 --> [REQ_ID=51d3fe2c81bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:06:22 --> [REQ_ID=51abb32da846] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:11:22 --> [REQ_ID=1743f2a411f1] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [REQUEST][END]
INFO - 2026-03-28 20:15:01 --> [REQ_ID=dd6c242d43e0] [PERF] Execution time=0.047511
DEBUG - 2026-03-28 20:16:22 --> [REQ_ID=d525b2cddede] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:21:22 --> [REQ_ID=db66c21f376d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:26:22 --> [REQ_ID=e781bcba8c18] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:31:22 --> [REQ_ID=6e544a0f51fd] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:33:46 --> [REQ_ID=c859a6c9579b] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-28 20:33:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:33:46 --> [REQ_ID=c859a6c9579b] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-28 20:33:46 --> [REQ_ID=c859a6c9579b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-28 20:33:46 --> [REQ_ID=c859a6c9579b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-03-28 20:33:46 --> [CSRF] token name=csrf_test_name hash=ed457063ccd4cdc249af729001db9ef2
DEBUG - 2026-03-28 20:33:46 --> [REQ_ID=7b135f3d8458] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 20:33:46 --> [REQ_ID=7b135f3d8458] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 20:33:47 --> [REQ_ID=7b135f3d8458] [METHOD_ENTRY] show
DEBUG - 2026-03-28 20:33:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 20:33:47 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 20:33:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 20:33:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 20:33:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 20:33:47 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-28 20:33:47 --> HowItWorksController failure: automated-financial-insights
CRITICAL - 2026-03-28 20:33:47 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Automated-Financial-Insights]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:33:47 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:33:47 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
WARNING - 2026-03-28 20:33:47 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights | referrer: none
ERROR - 2026-03-28 20:33:47 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-28 20:33:47 --> [REQ_ID=7b135f3d8458] [PERF] Execution time=0.165297
DEBUG - 2026-03-28 20:36:22 --> [REQ_ID=91aabfbb647f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:41:22 --> [REQ_ID=0a2a90682f1f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:42:12 --> [REQ_ID=5053b310f934] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-28 20:42:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:42:12 --> [REQ_ID=5053b310f934] [REQUEST][END]
INFO - 2026-03-28 20:42:12 --> [REQ_ID=5053b310f934] [PERF] Execution time=0.015632
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=95074b00b808] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 20:42:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=95074b00b808] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=95074b00b808] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=95074b00b808] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 20:42:45 --> [CSRF] token name=csrf_test_name hash=a2be7e12fc0cd06adf879ef43f43db46
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=d878ccc3b869] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 20:42:45 --> [REQ_ID=d878ccc3b869] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 20:42:45 --> [REQ_ID=d878ccc3b869] [METHOD_ENTRY] show
DEBUG - 2026-03-28 20:42:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 20:42:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 20:42:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 20:42:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 20:42:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 20:42:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 20:42:45 --> [REQ_ID=d878ccc3b869] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 20:42:46 --> [REQ_ID=95074b00b808] [FILTER_AFTER]
DEBUG - 2026-03-28 20:42:46 --> [REQ_ID=95074b00b808] [LIFECYCLE][END] status=200 duration_ms=794.90 memory_delta=4194304
INFO - 2026-03-28 20:42:46 --> [REQ_ID=d878ccc3b869] [PERF] Execution time=0.792961
DEBUG - 2026-03-28 20:42:46 --> [REQ_ID=95074b00b808] [REQUEST][END]
INFO - 2026-03-28 20:42:46 --> [REQ_ID=95074b00b808] [PERF] Execution time=0.811416
DEBUG - 2026-03-28 20:46:22 --> [REQ_ID=880ce72193ad] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=5dc960430dcf] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-28 20:49:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=5dc960430dcf] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=5dc960430dcf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=5dc960430dcf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-28 20:49:30 --> [CSRF] token name=csrf_test_name hash=be868900ba4b2ad619c51567f914e763
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=2c3aa67ae642] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 20:49:30 --> [REQ_ID=2c3aa67ae642] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 20:49:30 --> [REQ_ID=2c3aa67ae642] [METHOD_ENTRY] show
DEBUG - 2026-03-28 20:49:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 20:49:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 20:49:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 20:49:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 20:49:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 20:49:30 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-28 20:49:30 --> HowItWorksController failure: investor-profile
CRITICAL - 2026-03-28 20:49:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/Investor-Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:49:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:49:30 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
WARNING - 2026-03-28 20:49:30 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile | referrer: none
ERROR - 2026-03-28 20:49:30 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
INFO - 2026-03-28 20:49:30 --> [REQ_ID=2c3aa67ae642] [PERF] Execution time=0.169978
DEBUG - 2026-03-28 20:51:22 --> [REQ_ID=08e53ed3d0cf] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:51:23 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:51:23 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:51:23 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 20:53:40 --> [REQ_ID=317d6c855b6d] [REQUEST][START] GET /
DEBUG - 2026-03-28 20:53:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 20:53:40 --> [REQ_ID=317d6c855b6d] [FILTER_BEFORE] /
DEBUG - 2026-03-28 20:53:40 --> [REQ_ID=317d6c855b6d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 20:53:40 --> [REQ_ID=317d6c855b6d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 20:53:40 --> [CSRF] token name=csrf_test_name hash=e28b82c84640ffe0e7060a8d6d14dc0a
DEBUG - 2026-03-28 20:53:40 --> [REQ_ID=82b668506715] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 20:53:40 --> [REQ_ID=82b668506715] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 20:53:40 --> [REQ_ID=82b668506715] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 20:53:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 20:53:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 20:53:41 --> [REQ_ID=82b668506715] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 20:53:41 --> [REQ_ID=82b668506715] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 20:53:41 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 20:53:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 20:53:41 --> [REQ_ID=317d6c855b6d] [FILTER_AFTER]
DEBUG - 2026-03-28 20:53:41 --> [REQ_ID=317d6c855b6d] [LIFECYCLE][END] status=200 duration_ms=650.87 memory_delta=4194304
INFO - 2026-03-28 20:53:41 --> [REQ_ID=82b668506715] [PERF] Execution time=0.648938
DEBUG - 2026-03-28 20:53:41 --> [REQ_ID=317d6c855b6d] [REQUEST][END]
INFO - 2026-03-28 20:53:41 --> [REQ_ID=317d6c855b6d] [PERF] Execution time=0.691827
DEBUG - 2026-03-28 20:56:22 --> [REQ_ID=1b6b159d3df6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 20:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 20:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 20:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 20:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 20:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 21:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [REQUEST][END]
INFO - 2026-03-28 21:00:02 --> [REQ_ID=0d65d2232549] [PERF] Execution time=0.045775
DEBUG - 2026-03-28 21:01:22 --> [REQ_ID=91d68a76f610] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=e616f04b6e05] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-28 21:02:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=e616f04b6e05] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=e616f04b6e05] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=e616f04b6e05] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-28 21:02:23 --> [CSRF] token name=csrf_test_name hash=29ec84f769c7bb1e406025cb7f8ee747
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=13f2242881a3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 21:02:23 --> [REQ_ID=13f2242881a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 21:02:23 --> [REQ_ID=13f2242881a3] [METHOD_ENTRY] show
DEBUG - 2026-03-28 21:02:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 21:02:23 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 21:02:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 21:02:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 21:02:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 21:02:23 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 21:02:23 --> [REQ_ID=13f2242881a3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 21:02:24 --> [REQ_ID=e616f04b6e05] [FILTER_AFTER]
DEBUG - 2026-03-28 21:02:24 --> [REQ_ID=e616f04b6e05] [LIFECYCLE][END] status=200 duration_ms=605.13 memory_delta=4194304
INFO - 2026-03-28 21:02:24 --> [REQ_ID=13f2242881a3] [PERF] Execution time=0.603580
DEBUG - 2026-03-28 21:02:24 --> [REQ_ID=e616f04b6e05] [REQUEST][END]
INFO - 2026-03-28 21:02:24 --> [REQ_ID=e616f04b6e05] [PERF] Execution time=0.622691
DEBUG - 2026-03-28 21:02:27 --> [REQ_ID=ea8b9a4fa93c] [REQUEST][START] GET /index.php/Management/Wallets
DEBUG - 2026-03-28 21:02:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:02:27 --> [REQ_ID=ea8b9a4fa93c] [REQUEST][END]
INFO - 2026-03-28 21:02:27 --> [REQ_ID=ea8b9a4fa93c] [PERF] Execution time=0.009420
DEBUG - 2026-03-28 21:06:22 --> [REQ_ID=187e9fc1c4e3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:11:10 --> [REQ_ID=a7fd4c5ceb90] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 21:11:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:11:10 --> [REQ_ID=a7fd4c5ceb90] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 21:11:10 --> [REQ_ID=a7fd4c5ceb90] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-28 21:11:10 --> [REQ_ID=a7fd4c5ceb90] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-28 21:11:10 --> [CSRF] token name=csrf_test_name hash=94d3d5f42f68caf85a931aaf0dadd055
DEBUG - 2026-03-28 21:11:10 --> [REQ_ID=cf90b9d8c54a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 21:11:10 --> [REQ_ID=cf90b9d8c54a] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 21:11:11 --> [REQ_ID=cf90b9d8c54a] [METHOD_ENTRY] show
DEBUG - 2026-03-28 21:11:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 21:11:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 21:11:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 21:11:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 21:11:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 21:11:11 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 21:11:11 --> [REQ_ID=cf90b9d8c54a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 21:11:11 --> [REQ_ID=a7fd4c5ceb90] [FILTER_AFTER]
DEBUG - 2026-03-28 21:11:11 --> [REQ_ID=a7fd4c5ceb90] [LIFECYCLE][END] status=200 duration_ms=1,041.97 memory_delta=4194304
INFO - 2026-03-28 21:11:11 --> [REQ_ID=cf90b9d8c54a] [PERF] Execution time=1.040372
DEBUG - 2026-03-28 21:11:11 --> [REQ_ID=a7fd4c5ceb90] [REQUEST][END]
INFO - 2026-03-28 21:11:11 --> [REQ_ID=a7fd4c5ceb90] [PERF] Execution time=1.083950
DEBUG - 2026-03-28 21:11:22 --> [REQ_ID=02a39a7d78df] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [REQUEST][END]
INFO - 2026-03-28 21:15:01 --> [REQ_ID=0a42ba03b02a] [PERF] Execution time=0.048306
DEBUG - 2026-03-28 21:16:22 --> [REQ_ID=435a675a7084] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:21:22 --> [REQ_ID=c7163b04c5df] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:26:22 --> [REQ_ID=5b7aec82aa9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:31:22 --> [REQ_ID=387f598fab49] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-28 21:33:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-03-28 21:33:54 --> [CSRF] token name=csrf_test_name hash=14c6481187d342b96f07e60689a2c992
DEBUG - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [REQUEST][END]
INFO - 2026-03-28 21:33:54 --> [REQ_ID=244189408d56] [PERF] Execution time=0.051371
DEBUG - 2026-03-28 21:33:56 --> [REQ_ID=3547492533b8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-28 21:33:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:33:56 --> [REQ_ID=3547492533b8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-28 21:33:56 --> [REQ_ID=3547492533b8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-28 21:33:56 --> [REQ_ID=3547492533b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-28 21:33:56 --> [CSRF] token name=csrf_test_name hash=2e091c0aa177292050f0a71dbabefae8
DEBUG - 2026-03-28 21:33:56 --> [REQ_ID=b4950baf4909] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 21:33:56 --> [REQ_ID=b4950baf4909] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 21:33:57 --> [REQ_ID=3547492533b8] [FILTER_AFTER]
DEBUG - 2026-03-28 21:33:57 --> [REQ_ID=3547492533b8] [LIFECYCLE][END] status=200 duration_ms=201.19 memory_delta=0
INFO - 2026-03-28 21:33:57 --> [REQ_ID=b4950baf4909] [PERF] Execution time=0.200968
DEBUG - 2026-03-28 21:33:57 --> [REQ_ID=3547492533b8] [REQUEST][END]
INFO - 2026-03-28 21:33:57 --> [REQ_ID=3547492533b8] [PERF] Execution time=0.213151
DEBUG - 2026-03-28 21:36:22 --> [REQ_ID=6e2237437b68] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:41:22 --> [REQ_ID=4beabc96caf4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:42:00 --> [REQ_ID=83fe0ce0810f] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-28 21:42:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:42:00 --> [REQ_ID=83fe0ce0810f] [REQUEST][END]
INFO - 2026-03-28 21:42:00 --> [REQ_ID=83fe0ce0810f] [PERF] Execution time=0.018431
DEBUG - 2026-03-28 21:42:01 --> [REQ_ID=7c4dd19c8670] [REQUEST][START] GET /index.php/register
DEBUG - 2026-03-28 21:42:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 21:42:01 --> [REQ_ID=7c4dd19c8670] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-28 21:42:01 --> [REQ_ID=7c4dd19c8670] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-28 21:42:01 --> [REQ_ID=7c4dd19c8670] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-28 21:42:01 --> [CSRF] token name=csrf_test_name hash=c89d52ae1a74af4aa96e9c97c553c5b9
DEBUG - 2026-03-28 21:42:01 --> [REQ_ID=a73e37c67340] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 21:42:01 --> [REQ_ID=a73e37c67340] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 21:42:01 --> [REGISTRATION] Form loaded
INFO - 2026-03-28 21:42:01 --> [REQ_ID=a73e37c67340] [PERF] Execution time=0.156287
DEBUG - 2026-03-28 21:46:22 --> [REQ_ID=e87b57367260] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:51:22 --> [REQ_ID=7f2bb0028d05] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 21:56:22 --> [REQ_ID=60b0c4d20f3f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 21:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 21:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 21:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 21:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 21:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [REQUEST][END]
INFO - 2026-03-28 22:00:01 --> [REQ_ID=6b47a9335eda] [PERF] Execution time=0.058061
DEBUG - 2026-03-28 22:01:22 --> [REQ_ID=868dc110edf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:02:00 --> [REQ_ID=1aff22a03ba6] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-28 22:02:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:02:00 --> [REQ_ID=1aff22a03ba6] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-03-28 22:02:00 --> [REQ_ID=1aff22a03ba6] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-03-28 22:02:00 --> [REQ_ID=1aff22a03ba6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-03-28 22:02:00 --> [CSRF] token name=csrf_test_name hash=b634edf73b0878dcd55f22c2a62dfbb5
DEBUG - 2026-03-28 22:02:00 --> [REQ_ID=4eaed8d594be] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 22:02:00 --> [REQ_ID=4eaed8d594be] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 22:02:01 --> [REGISTRATION] Form loaded
INFO - 2026-03-28 22:02:01 --> [REQ_ID=4eaed8d594be] [PERF] Execution time=0.298691
DEBUG - 2026-03-28 22:06:22 --> [REQ_ID=7d6d473c664f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:11:22 --> [REQ_ID=750add6d73eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:12:11 --> [REQ_ID=1c84ed8f6640] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-28 22:12:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:12:11 --> [REQ_ID=1c84ed8f6640] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-28 22:12:11 --> [REQ_ID=1c84ed8f6640] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 22:12:11 --> [REQ_ID=1c84ed8f6640] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 22:12:11 --> [CSRF] token name=csrf_test_name hash=64691cab4c7dceb2cbde4abe500c7d57
DEBUG - 2026-03-28 22:12:11 --> [REQ_ID=ae909f426fe9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 22:12:11 --> [REQ_ID=ae909f426fe9] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 22:12:12 --> [REQ_ID=ae909f426fe9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 22:12:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:12:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 22:12:12 --> [REQ_ID=ae909f426fe9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 22:12:12 --> [REQ_ID=ae909f426fe9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 22:12:12 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 22:12:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 22:12:12 --> [REQ_ID=1c84ed8f6640] [FILTER_AFTER]
DEBUG - 2026-03-28 22:12:12 --> [REQ_ID=1c84ed8f6640] [LIFECYCLE][END] status=200 duration_ms=847.13 memory_delta=4194304
INFO - 2026-03-28 22:12:12 --> [REQ_ID=ae909f426fe9] [PERF] Execution time=0.845170
DEBUG - 2026-03-28 22:12:12 --> [REQ_ID=1c84ed8f6640] [REQUEST][END]
INFO - 2026-03-28 22:12:12 --> [REQ_ID=1c84ed8f6640] [PERF] Execution time=0.867042
DEBUG - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 22:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [REQUEST][END]
INFO - 2026-03-28 22:15:01 --> [REQ_ID=ceda690fa968] [PERF] Execution time=0.045509
DEBUG - 2026-03-28 22:15:44 --> [REQ_ID=ac01666ffbea] [REQUEST][START] GET /
DEBUG - 2026-03-28 22:15:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:15:44 --> [REQ_ID=ac01666ffbea] [FILTER_BEFORE] /
DEBUG - 2026-03-28 22:15:44 --> [REQ_ID=ac01666ffbea] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 22:15:44 --> [REQ_ID=ac01666ffbea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 22:15:44 --> [CSRF] token name=csrf_test_name hash=5b016efda11a97b362b66fa83bc77745
DEBUG - 2026-03-28 22:15:44 --> [REQ_ID=8994d52a1cfe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 22:15:44 --> [REQ_ID=8994d52a1cfe] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 22:15:44 --> [REQ_ID=8994d52a1cfe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 22:15:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:15:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-28 22:15:45 --> [REQ_ID=8994d52a1cfe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 22:15:45 --> [REQ_ID=8994d52a1cfe] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 22:15:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 22:15:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 22:15:45 --> [REQ_ID=ac01666ffbea] [FILTER_AFTER]
DEBUG - 2026-03-28 22:15:45 --> [REQ_ID=ac01666ffbea] [LIFECYCLE][END] status=200 duration_ms=701.99 memory_delta=4194304
INFO - 2026-03-28 22:15:45 --> [REQ_ID=8994d52a1cfe] [PERF] Execution time=0.700639
DEBUG - 2026-03-28 22:15:45 --> [REQ_ID=ac01666ffbea] [REQUEST][END]
INFO - 2026-03-28 22:15:45 --> [REQ_ID=ac01666ffbea] [PERF] Execution time=0.712608
DEBUG - 2026-03-28 22:16:22 --> [REQ_ID=ada01532d283] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-28 22:20:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-28 22:20:58 --> [CSRF] token name=csrf_test_name hash=dd8a0bc07cac905cffa67664cc34f8b6
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=887c1536a779] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-28 22:20:58 --> [REQ_ID=887c1536a779] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 22:20:58 --> [ACTIVATION] Activation link hit
WARNING - 2026-03-28 22:20:58 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [FILTER_AFTER]
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [LIFECYCLE][END] status=302 duration_ms=122.34 memory_delta=0
INFO - 2026-03-28 22:20:58 --> [REQ_ID=887c1536a779] [PERF] Execution time=0.120528
DEBUG - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [REQUEST][END]
INFO - 2026-03-28 22:20:58 --> [REQ_ID=a11a6563d59b] [PERF] Execution time=0.163294
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-28 22:21:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-28 22:21:00 --> [CSRF] token name=csrf_test_name hash=9e80117b262904ee5f57f2cbbca07bb4
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [METHOD_ENTRY] index
DEBUG - 2026-03-28 22:21:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:21:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 22:21:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 22:21:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 22:21:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 22:21:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [MEMORY][commonData:start] 6291456
INFO - 2026-03-28 22:21:00 --> themesMemory usage: 6291456
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [FILTER_AFTER]
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [LIFECYCLE][END] status=200 duration_ms=71.34 memory_delta=2097152
INFO - 2026-03-28 22:21:00 --> [REQ_ID=aad9ebbe8fbb] [PERF] Execution time=0.071147
DEBUG - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [REQUEST][END]
INFO - 2026-03-28 22:21:00 --> [REQ_ID=d8a41d459fbc] [PERF] Execution time=0.084610
DEBUG - 2026-03-28 22:21:22 --> [REQ_ID=db36d95dbc51] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:26:22 --> [REQ_ID=8e1a0c7587c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:30:07 --> [REQ_ID=78364fd7c765] [REQUEST][START] GET /
DEBUG - 2026-03-28 22:30:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:30:07 --> [REQ_ID=78364fd7c765] [FILTER_BEFORE] /
DEBUG - 2026-03-28 22:30:07 --> [REQ_ID=78364fd7c765] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 22:30:07 --> [REQ_ID=78364fd7c765] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 22:30:07 --> [CSRF] token name=csrf_test_name hash=5f5ec0dc2c26d0bd183576871746c72e
DEBUG - 2026-03-28 22:30:07 --> [REQ_ID=61b7a93877b6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 22:30:07 --> [REQ_ID=61b7a93877b6] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 22:30:07 --> [REQ_ID=61b7a93877b6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 22:30:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:30:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 22:30:08 --> [REQ_ID=61b7a93877b6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 22:30:08 --> [REQ_ID=61b7a93877b6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 22:30:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 22:30:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 22:30:08 --> [REQ_ID=78364fd7c765] [FILTER_AFTER]
DEBUG - 2026-03-28 22:30:08 --> [REQ_ID=78364fd7c765] [LIFECYCLE][END] status=200 duration_ms=718.01 memory_delta=4194304
INFO - 2026-03-28 22:30:08 --> [REQ_ID=61b7a93877b6] [PERF] Execution time=0.716052
DEBUG - 2026-03-28 22:30:08 --> [REQ_ID=78364fd7c765] [REQUEST][END]
INFO - 2026-03-28 22:30:08 --> [REQ_ID=78364fd7c765] [PERF] Execution time=0.756973
DEBUG - 2026-03-28 22:31:22 --> [REQ_ID=e8b307585917] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:33:33 --> [REQ_ID=784aed1ce5e0] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-28 22:33:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-28 22:33:34 --> [CSRF] token name=csrf_test_name hash=ad34b9538e2b002e8bb913bf6056c18a
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [MEMORY][controller-start] 6291456
INFO - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 22:33:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:33:34 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [MEMORY][commonData:start] 10485760
INFO - 2026-03-28 22:33:34 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 22:33:34 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [FILTER_AFTER]
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [LIFECYCLE][END] status=200 duration_ms=664.19 memory_delta=4194304
INFO - 2026-03-28 22:33:34 --> [REQ_ID=344db20f4b90] [PERF] Execution time=0.662315
DEBUG - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [REQUEST][END]
INFO - 2026-03-28 22:33:34 --> [REQ_ID=784aed1ce5e0] [PERF] Execution time=0.703199
DEBUG - 2026-03-28 22:36:04 --> [REQ_ID=c680cd9c998d] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-28 22:36:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:36:04 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/Assets]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 22:36:04 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 22:36:04 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 22:36:22 --> [REQ_ID=6f4a09115c1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:41:22 --> [REQ_ID=a75ecd1aeb32] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:46:22 --> [REQ_ID=3e7f892d81c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:51:22 --> [REQ_ID=1e03a57ca2af] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 22:52:49 --> [REQ_ID=b6eb715c5a46] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-28 22:52:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 22:52:49 --> [REQ_ID=b6eb715c5a46] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-28 22:52:49 --> [REQ_ID=b6eb715c5a46] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-28 22:52:49 --> [REQ_ID=b6eb715c5a46] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-28 22:52:49 --> [CSRF] token name=csrf_test_name hash=da391fca6fa3fa64faa2457bdf205f7e
DEBUG - 2026-03-28 22:52:49 --> [REQ_ID=154d62eb2eba] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 22:52:49 --> [REQ_ID=154d62eb2eba] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 22:52:50 --> [REQ_ID=154d62eb2eba] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-28 22:52:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 22:52:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 22:52:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 22:52:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 22:52:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 22:52:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 22:52:50 --> [REQ_ID=154d62eb2eba] [MEMORY][commonData:start] 6291456
INFO - 2026-03-28 22:52:50 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 22:52:50 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-28 22:52:50 --> [REQ_ID=b6eb715c5a46] [FILTER_AFTER]
DEBUG - 2026-03-28 22:52:50 --> [REQ_ID=b6eb715c5a46] [LIFECYCLE][END] status=200 duration_ms=744.90 memory_delta=4194304
INFO - 2026-03-28 22:52:50 --> [REQ_ID=154d62eb2eba] [PERF] Execution time=0.743100
DEBUG - 2026-03-28 22:52:50 --> [REQ_ID=b6eb715c5a46] [REQUEST][END]
INFO - 2026-03-28 22:52:50 --> [REQ_ID=b6eb715c5a46] [PERF] Execution time=0.787930
DEBUG - 2026-03-28 22:54:59 --> [REQ_ID=f5a6a84e3856] [REQUEST][START] GET /index.php/Portfolio/Add/GRAB
DEBUG - 2026-03-28 22:54:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:54:59 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Portfolio/Add/GRAB]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:54:59 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:54:59 --> [404] URI=https://www.mymiwallet.com/index.php/Portfolio/Add/GRAB
WARNING - 2026-03-28 22:54:59 --> 404 route miss: https://www.mymiwallet.com/index.php/Portfolio/Add/GRAB | referrer: none
DEBUG - 2026-03-28 22:56:22 --> [REQ_ID=f026799328a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 22:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 22:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 22:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 22:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 22:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [REQUEST][END]
INFO - 2026-03-28 23:00:01 --> [REQ_ID=a5102180eadd] [PERF] Execution time=0.049638
DEBUG - 2026-03-28 23:01:22 --> [REQ_ID=cfd8db5466ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:01:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:01:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:01:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:01:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:06:22 --> [REQ_ID=9ffd593fab8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:06:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:06:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:06:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:06:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:06:44 --> [REQ_ID=5d65d248cf3e] [REQUEST][START] GET /index.php
DEBUG - 2026-03-28 23:06:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:06:44 --> [REQ_ID=5d65d248cf3e] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-28 23:06:44 --> [REQ_ID=5d65d248cf3e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 23:06:44 --> [REQ_ID=5d65d248cf3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 23:06:44 --> [CSRF] token name=csrf_test_name hash=0ebc4e3a14cdb3664fc91fa5553ada0d
DEBUG - 2026-03-28 23:06:44 --> [REQ_ID=20616c7b4405] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 23:06:44 --> [REQ_ID=20616c7b4405] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 23:06:44 --> [REQ_ID=20616c7b4405] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 23:06:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 23:06:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 23:06:45 --> [REQ_ID=20616c7b4405] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 23:06:45 --> [REQ_ID=20616c7b4405] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 23:06:45 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 23:06:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-28 23:06:45 --> [REQ_ID=5d65d248cf3e] [FILTER_AFTER]
DEBUG - 2026-03-28 23:06:45 --> [REQ_ID=5d65d248cf3e] [LIFECYCLE][END] status=200 duration_ms=564.99 memory_delta=4194304
INFO - 2026-03-28 23:06:45 --> [REQ_ID=20616c7b4405] [PERF] Execution time=0.562997
DEBUG - 2026-03-28 23:06:45 --> [REQ_ID=5d65d248cf3e] [REQUEST][END]
INFO - 2026-03-28 23:06:45 --> [REQ_ID=5d65d248cf3e] [PERF] Execution time=0.584077
DEBUG - 2026-03-28 23:11:22 --> [REQ_ID=1cdcb7d2bcbe] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:11:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:11:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:11:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:11:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [REQUEST][END]
INFO - 2026-03-28 23:15:01 --> [REQ_ID=87e31be7e757] [PERF] Execution time=0.045606
DEBUG - 2026-03-28 23:16:22 --> [REQ_ID=78c44e4fc68d] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:16:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:16:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:16:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:16:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:21:22 --> [REQ_ID=6c80f6999520] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:21:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:21:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:21:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:21:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=62f41047a24d] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-28 23:24:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=62f41047a24d] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=62f41047a24d] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=62f41047a24d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-28 23:24:21 --> [CSRF] token name=csrf_test_name hash=ca09d1532170f7807d59258e3c01ec35
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=4c47fe9d7a18] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-28 23:24:21 --> [REQ_ID=4c47fe9d7a18] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 23:24:21 --> [REQ_ID=4c47fe9d7a18] [METHOD_ENTRY] index
DEBUG - 2026-03-28 23:24:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 23:24:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 23:24:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 23:24:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 23:24:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 23:24:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 23:24:21 --> [REQ_ID=4c47fe9d7a18] [MEMORY][commonData:start] 6291456
INFO - 2026-03-28 23:24:21 --> [REQ_ID=4c47fe9d7a18] [PERF] Execution time=0.090981
DEBUG - 2026-03-28 23:25:50 --> [REQ_ID=bd821bb56a4e] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-03-28 23:25:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:25:50 --> [REQ_ID=bd821bb56a4e] [REQUEST][END]
INFO - 2026-03-28 23:25:50 --> [REQ_ID=bd821bb56a4e] [PERF] Execution time=0.041538
DEBUG - 2026-03-28 23:26:22 --> [REQ_ID=e4af0a97d079] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:26:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:26:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:26:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:26:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:31:22 --> [REQ_ID=70f511f866ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:31:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:31:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:31:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:31:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:35:04 --> [REQ_ID=34f5669728ce] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-28 23:35:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:35:04 --> [REQ_ID=34f5669728ce] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-28 23:35:04 --> [REQ_ID=34f5669728ce] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=InvestmentPortfolioManagement
DEBUG - 2026-03-28 23:35:04 --> [REQ_ID=34f5669728ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-03-28 23:35:04 --> [CSRF] token name=csrf_test_name hash=b1a77617160c625ead7e22585e9f493a
DEBUG - 2026-03-28 23:35:04 --> [REQ_ID=d7cc75ad5895] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-28 23:35:04 --> [REQ_ID=d7cc75ad5895] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-28 23:35:05 --> [REQ_ID=d7cc75ad5895] [METHOD_ENTRY] InvestmentPortfolioManagement
DEBUG - 2026-03-28 23:35:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 23:35:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-28 23:35:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-28 23:35:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-28 23:35:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-28 23:35:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-28 23:35:05 --> [REQ_ID=d7cc75ad5895] [MEMORY][commonData:start] 6291456
INFO - 2026-03-28 23:35:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-28 23:35:05 --> [MetaService] slug=how-it-works/investment-portfolio-management pageName= cacheHit= path=DB
DEBUG - 2026-03-28 23:35:05 --> [REQ_ID=34f5669728ce] [FILTER_AFTER]
DEBUG - 2026-03-28 23:35:05 --> [REQ_ID=34f5669728ce] [LIFECYCLE][END] status=200 duration_ms=645.63 memory_delta=4194304
INFO - 2026-03-28 23:35:05 --> [REQ_ID=d7cc75ad5895] [PERF] Execution time=0.643898
DEBUG - 2026-03-28 23:35:05 --> [REQ_ID=34f5669728ce] [REQUEST][END]
INFO - 2026-03-28 23:35:05 --> [REQ_ID=34f5669728ce] [PERF] Execution time=0.687572
DEBUG - 2026-03-28 23:36:22 --> [REQ_ID=49ae25480cc4] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:36:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:36:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:36:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:36:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:41:22 --> [REQ_ID=1904236c3dcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:41:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:41:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:41:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:41:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:43:01 --> [REQ_ID=793e75132f2c] [REQUEST][START] GET /index.php/Knowledgebase/KYC-Verification
DEBUG - 2026-03-28 23:43:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:43:01 --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
[Method: GET, Route: Knowledgebase/KYC-Verification]
in APPPATH/Modules/User/Controllers/KnowledgebaseController.php on line 535.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-03-28 23:43:01 --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
ERROR - 2026-03-28 23:43:01 --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
DEBUG - 2026-03-28 23:43:20 --> [REQ_ID=0d43c0563ec4] [REQUEST][START] GET /
DEBUG - 2026-03-28 23:43:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-28 23:43:20 --> [REQ_ID=0d43c0563ec4] [FILTER_BEFORE] /
DEBUG - 2026-03-28 23:43:20 --> [REQ_ID=0d43c0563ec4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-28 23:43:20 --> [REQ_ID=0d43c0563ec4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-28 23:43:20 --> [CSRF] token name=csrf_test_name hash=ad1c93cf551a286def3e64b1fc645452
DEBUG - 2026-03-28 23:43:20 --> [REQ_ID=0c26f355d978] [INIT] App\Controllers\Home::GET
INFO - 2026-03-28 23:43:20 --> [REQ_ID=0c26f355d978] [MEMORY][controller-start] 4194304
INFO - 2026-03-28 23:43:20 --> [REQ_ID=0c26f355d978] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-28 23:43:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-28 23:43:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-28 23:43:21 --> [REQ_ID=0c26f355d978] [VIEW_RENDER] themes/public/home
INFO - 2026-03-28 23:43:21 --> [REQ_ID=0c26f355d978] [MEMORY][commonData:start] 8388608
INFO - 2026-03-28 23:43:21 --> themesMemory usage: 8388608
DEBUG - 2026-03-28 23:43:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-28 23:43:21 --> [REQ_ID=0d43c0563ec4] [FILTER_AFTER]
DEBUG - 2026-03-28 23:43:21 --> [REQ_ID=0d43c0563ec4] [LIFECYCLE][END] status=200 duration_ms=663.90 memory_delta=4194304
INFO - 2026-03-28 23:43:21 --> [REQ_ID=0c26f355d978] [PERF] Execution time=0.661872
DEBUG - 2026-03-28 23:43:21 --> [REQ_ID=0d43c0563ec4] [REQUEST][END]
INFO - 2026-03-28 23:43:21 --> [REQ_ID=0d43c0563ec4] [PERF] Execution time=0.680218
DEBUG - 2026-03-28 23:46:22 --> [REQ_ID=8d12fd11b39b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:46:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:46:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:46:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:46:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:51:22 --> [REQ_ID=2ebd0bcdaf97] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:51:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:51:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:51:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:51:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-28 23:56:22 --> [REQ_ID=d92db00e376b] [REQUEST][START] HEAD /
DEBUG - 2026-03-28 23:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-28 23:56:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-28 23:56:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-28 23:56:22 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-28 23:56:22 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
