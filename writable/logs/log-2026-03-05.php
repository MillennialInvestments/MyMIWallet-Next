<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [REQUEST][START] GET /
DEBUG - 2026-03-05 04:05:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [FILTER_BEFORE] /
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 04:05:53 --> [CSRF] token name=csrf_test_name hash=97c35df941bc49ddd96abe42031ed350
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 04:05:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 04:05:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 04:05:53 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 04:05:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [FILTER_AFTER]
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [LIFECYCLE][END] status=200 duration_ms=718.48 memory_delta=4194304
INFO - 2026-03-05 04:05:53 --> [REQ_ID=96827b346abe] [PERF] Execution time=0.716372
DEBUG - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [REQUEST][END]
INFO - 2026-03-05 04:05:53 --> [REQ_ID=adda812d448b] [PERF] Execution time=0.803566
DEBUG - 2026-03-05 04:06:20 --> [REQ_ID=c939e20ed4b9] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:11:20 --> [REQ_ID=55e0d4b20419] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-05 04:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 04:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 04:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 04:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [REQUEST][END]
INFO - 2026-03-05 04:15:01 --> [REQ_ID=ec4f9a77ac38] [PERF] Execution time=0.066307
INFO - 2026-03-05 04:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 04:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.216291
INFO - 2026-03-05 04:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 04:16:20 --> [REQ_ID=35719f3c9059] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [REQUEST][START] GET /
DEBUG - 2026-03-05 04:18:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [FILTER_BEFORE] /
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 04:18:19 --> [CSRF] token name=csrf_test_name hash=5e272d6b8e3e7cccbb7bf5afdbaaba82
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 04:18:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 04:18:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 04:18:19 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 04:18:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [FILTER_AFTER]
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [LIFECYCLE][END] status=200 duration_ms=680.58 memory_delta=4194304
INFO - 2026-03-05 04:18:19 --> [REQ_ID=853bd6458ded] [PERF] Execution time=0.678434
DEBUG - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [REQUEST][END]
INFO - 2026-03-05 04:18:19 --> [REQ_ID=c075be0354cb] [PERF] Execution time=0.718543
DEBUG - 2026-03-05 04:18:55 --> [REQ_ID=08161a6ad392] [REQUEST][START] GET /
DEBUG - 2026-03-05 04:18:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:18:55 --> [REQ_ID=08161a6ad392] [FILTER_BEFORE] /
DEBUG - 2026-03-05 04:18:55 --> [REQ_ID=08161a6ad392] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 04:18:55 --> [REQ_ID=08161a6ad392] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 04:18:55 --> [CSRF] token name=csrf_test_name hash=9083c76ec214ce2677a224df7bb0d948
DEBUG - 2026-03-05 04:18:55 --> [REQ_ID=d26645188466] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 04:18:55 --> [REQ_ID=d26645188466] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 04:18:55 --> [REQ_ID=d26645188466] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 04:18:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 04:18:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 04:18:56 --> [REQ_ID=d26645188466] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 04:18:56 --> [REQ_ID=d26645188466] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 04:18:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 04:18:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 04:18:56 --> [REQ_ID=08161a6ad392] [FILTER_AFTER]
DEBUG - 2026-03-05 04:18:56 --> [REQ_ID=08161a6ad392] [LIFECYCLE][END] status=200 duration_ms=527.44 memory_delta=2097152
INFO - 2026-03-05 04:18:56 --> [REQ_ID=d26645188466] [PERF] Execution time=0.527149
DEBUG - 2026-03-05 04:18:56 --> [REQ_ID=08161a6ad392] [REQUEST][END]
INFO - 2026-03-05 04:18:56 --> [REQ_ID=08161a6ad392] [PERF] Execution time=0.537056
DEBUG - 2026-03-05 04:21:20 --> [REQ_ID=1344a9b303e1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [REQUEST][START] GET /
DEBUG - 2026-03-05 04:24:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [FILTER_BEFORE] /
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 04:24:12 --> [CSRF] token name=csrf_test_name hash=af0fd1bb85a6f2afa8fb9911b1670ef1
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 04:24:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 04:24:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 04:24:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 04:24:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [FILTER_AFTER]
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [LIFECYCLE][END] status=200 duration_ms=647.05 memory_delta=4194304
INFO - 2026-03-05 04:24:12 --> [REQ_ID=85764ae08286] [PERF] Execution time=0.644552
DEBUG - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [REQUEST][END]
INFO - 2026-03-05 04:24:12 --> [REQ_ID=b7639d6fe08a] [PERF] Execution time=0.685725
DEBUG - 2026-03-05 04:26:20 --> [REQ_ID=dbf217923fea] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:26:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:26:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:26:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Pro
DEBUG - 2026-03-05 04:28:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Pro
DEBUG - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Pro
DEBUG - 2026-03-05 04:28:59 --> [CSRF] token name=csrf_test_name hash=3da532d61055ef57991a399fb31602d4
DEBUG - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [REQUEST][END]
INFO - 2026-03-05 04:28:59 --> [REQ_ID=013e3ebc2d87] [PERF] Execution time=0.060427
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 04:29:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 04:29:00 --> [CSRF] token name=csrf_test_name hash=9fa992b5639f6ac638ce63bca336416e
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=bdbf99167177] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 04:29:00 --> [REQ_ID=bdbf99167177] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [FILTER_AFTER]
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [LIFECYCLE][END] status=200 duration_ms=105.79 memory_delta=0
INFO - 2026-03-05 04:29:00 --> [REQ_ID=bdbf99167177] [PERF] Execution time=0.104685
DEBUG - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [REQUEST][END]
INFO - 2026-03-05 04:29:00 --> [REQ_ID=23f7f687a7cc] [PERF] Execution time=0.117910
DEBUG - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 04:29:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 04:29:13 --> [CSRF] token name=csrf_test_name hash=9c09b6342afa2a6ca745a8229aa76266
DEBUG - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [REQUEST][END]
INFO - 2026-03-05 04:29:13 --> [REQ_ID=acaad60e5f40] [PERF] Execution time=0.016188
DEBUG - 2026-03-05 04:29:50 --> [REQ_ID=7808175e3a9a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 04:29:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:29:50 --> [REQ_ID=7808175e3a9a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 04:29:50 --> [REQ_ID=7808175e3a9a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 04:29:50 --> [REQ_ID=7808175e3a9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 04:29:50 --> [CSRF] token name=csrf_test_name hash=64fd35477529534676bb530c22ae03ac
DEBUG - 2026-03-05 04:29:50 --> [REQ_ID=c95e7054eec0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 04:29:50 --> [REQ_ID=c95e7054eec0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 04:29:51 --> [REQ_ID=7808175e3a9a] [FILTER_AFTER]
DEBUG - 2026-03-05 04:29:51 --> [REQ_ID=7808175e3a9a] [LIFECYCLE][END] status=200 duration_ms=285.20 memory_delta=0
INFO - 2026-03-05 04:29:51 --> [REQ_ID=c95e7054eec0] [PERF] Execution time=0.285074
DEBUG - 2026-03-05 04:29:51 --> [REQ_ID=7808175e3a9a] [REQUEST][END]
INFO - 2026-03-05 04:29:51 --> [REQ_ID=7808175e3a9a] [PERF] Execution time=0.294838
INFO - 2026-03-05 04:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 04:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 04:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 04:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 04:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 04:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100800
INFO - 2026-03-05 04:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-05 04:30:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-05 04:30:59 --> [CSRF] token name=csrf_test_name hash=035201936db98c22dc541e65e17c2cd5
DEBUG - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [REQUEST][END]
INFO - 2026-03-05 04:30:59 --> [REQ_ID=53bffc3ea2b6] [PERF] Execution time=0.055765
DEBUG - 2026-03-05 04:31:00 --> [REQ_ID=166fcabe8f96] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 04:31:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 04:31:00 --> [REQ_ID=166fcabe8f96] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 04:31:00 --> [REQ_ID=166fcabe8f96] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 04:31:00 --> [REQ_ID=166fcabe8f96] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 04:31:00 --> [CSRF] token name=csrf_test_name hash=78ef0d0f273d11de329bf803301f9716
DEBUG - 2026-03-05 04:31:00 --> [REQ_ID=86928b3b1bec] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 04:31:00 --> [REQ_ID=86928b3b1bec] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 04:31:01 --> [REQ_ID=166fcabe8f96] [FILTER_AFTER]
DEBUG - 2026-03-05 04:31:01 --> [REQ_ID=166fcabe8f96] [LIFECYCLE][END] status=200 duration_ms=306.21 memory_delta=0
INFO - 2026-03-05 04:31:01 --> [REQ_ID=86928b3b1bec] [PERF] Execution time=0.304972
DEBUG - 2026-03-05 04:31:01 --> [REQ_ID=166fcabe8f96] [REQUEST][END]
INFO - 2026-03-05 04:31:01 --> [REQ_ID=166fcabe8f96] [PERF] Execution time=0.319498
DEBUG - 2026-03-05 04:31:20 --> [REQ_ID=368257bc1df0] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:36:20 --> [REQ_ID=e51d8572248d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:41:20 --> [REQ_ID=18f42fb39b50] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 04:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 04:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 04:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 04:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 04:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 04:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.215456
INFO - 2026-03-05 04:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 04:46:20 --> [REQ_ID=ce10c37f1f7b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 04:51:20 --> [REQ_ID=8ee861486205] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 12:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 12:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 12:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 12:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.093567
INFO - 2026-03-05 12:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 12:46:20 --> [REQ_ID=c744a4a6c176] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=801a3024fbee] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-03-05 12:46:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=801a3024fbee] [FILTER_BEFORE] /index.php/How-It-Works/account-settings
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=801a3024fbee] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=801a3024fbee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/account-settings
DEBUG - 2026-03-05 12:46:55 --> [CSRF] token name=csrf_test_name hash=f3d6b082fdb35f13a10b9319910af6b2
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=0b971e623571] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 12:46:55 --> [REQ_ID=0b971e623571] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 12:46:55 --> [REQ_ID=0b971e623571] [METHOD_ENTRY] show
DEBUG - 2026-03-05 12:46:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 12:46:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 12:46:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 12:46:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 12:46:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 12:46:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 12:46:56 --> [REQ_ID=0b971e623571] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-05 12:46:56 --> [REQ_ID=0b971e623571] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 12:46:56 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit= path=DB
INFO - 2026-03-05 12:46:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 12:46:56 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 12:46:56 --> [REQ_ID=801a3024fbee] [FILTER_AFTER]
DEBUG - 2026-03-05 12:46:56 --> [REQ_ID=801a3024fbee] [LIFECYCLE][END] status=200 duration_ms=811.91 memory_delta=4194304
INFO - 2026-03-05 12:46:56 --> [REQ_ID=0b971e623571] [PERF] Execution time=0.809848
DEBUG - 2026-03-05 12:46:56 --> [REQ_ID=801a3024fbee] [REQUEST][END]
INFO - 2026-03-05 12:46:56 --> [REQ_ID=801a3024fbee] [PERF] Execution time=0.837026
DEBUG - 2026-03-05 12:51:20 --> [REQ_ID=27ce40fdd035] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:56:20 --> [REQ_ID=ff272c37497e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 13:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 13:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 13:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 13:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 13:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [REQUEST][END]
INFO - 2026-03-05 13:00:02 --> [REQ_ID=2882cb00ad41] [PERF] Execution time=0.066722
INFO - 2026-03-05 13:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 13:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053882
INFO - 2026-03-05 13:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 13:01:20 --> [REQ_ID=6f00b1225574] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 13:01:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 13:01:40 --> [CSRF] token name=csrf_test_name hash=9bf02ab45e2071fe97bbcd6689ffae4a
DEBUG - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [REQUEST][END]
INFO - 2026-03-05 13:01:40 --> [REQ_ID=05e79b2a12d6] [PERF] Execution time=0.030122
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 13:01:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 13:01:46 --> [CSRF] token name=csrf_test_name hash=d509c172d1eab527df8a0d4dd74b1e2e
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=19c34d160d87] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 13:01:46 --> [REQ_ID=19c34d160d87] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [FILTER_AFTER]
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [LIFECYCLE][END] status=200 duration_ms=108.90 memory_delta=0
INFO - 2026-03-05 13:01:46 --> [REQ_ID=19c34d160d87] [PERF] Execution time=0.108397
DEBUG - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [REQUEST][END]
INFO - 2026-03-05 13:01:46 --> [REQ_ID=0cdb03c6ff3b] [PERF] Execution time=0.121966
DEBUG - 2026-03-05 13:06:20 --> [REQ_ID=c62c368c8d2d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:11:20 --> [REQ_ID=05c4e8cc0bb7] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:11:40 --> [REQ_ID=d8adaa6e0d4c] [REQUEST][START] GET /
DEBUG - 2026-03-05 13:11:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 13:11:40 --> [REQ_ID=d8adaa6e0d4c] [FILTER_BEFORE] /
DEBUG - 2026-03-05 13:11:40 --> [REQ_ID=d8adaa6e0d4c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 13:11:40 --> [REQ_ID=d8adaa6e0d4c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 13:11:40 --> [CSRF] token name=csrf_test_name hash=732740d8eafc9c7d35a95cfbfbf5af93
DEBUG - 2026-03-05 13:11:40 --> [REQ_ID=9e567cdfcb34] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 13:11:40 --> [REQ_ID=9e567cdfcb34] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 13:11:40 --> [REQ_ID=9e567cdfcb34] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 13:11:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 13:11:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 13:11:41 --> [REQ_ID=9e567cdfcb34] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 13:11:41 --> [REQ_ID=9e567cdfcb34] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 13:11:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 13:11:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 13:11:41 --> [REQ_ID=d8adaa6e0d4c] [FILTER_AFTER]
DEBUG - 2026-03-05 13:11:41 --> [REQ_ID=d8adaa6e0d4c] [LIFECYCLE][END] status=200 duration_ms=620.35 memory_delta=4194304
INFO - 2026-03-05 13:11:41 --> [REQ_ID=9e567cdfcb34] [PERF] Execution time=0.618351
DEBUG - 2026-03-05 13:11:41 --> [REQ_ID=d8adaa6e0d4c] [REQUEST][END]
INFO - 2026-03-05 13:11:41 --> [REQ_ID=d8adaa6e0d4c] [PERF] Execution time=0.638982
INFO - 2026-03-05 13:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 13:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 13:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 13:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 13:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 13:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.120572
INFO - 2026-03-05 13:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [REQUEST][END]
INFO - 2026-03-05 13:15:02 --> [REQ_ID=a36bbcbfb1f4] [PERF] Execution time=0.053829
DEBUG - 2026-03-05 13:16:20 --> [REQ_ID=75739c4dec83] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:21:20 --> [REQ_ID=c43f81e6bf07] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:26:20 --> [REQ_ID=46e30645ac6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 13:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 13:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 13:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 13:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 13:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 13:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.221463
INFO - 2026-03-05 13:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 13:31:20 --> [REQ_ID=361016759a32] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:36:20 --> [REQ_ID=0cf8f9ccfc84] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:41:20 --> [REQ_ID=4ce82301506a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 13:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 13:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 13:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 13:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 13:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 13:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050704
INFO - 2026-03-05 13:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=f4d3c65ab059] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-05 13:45:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=f4d3c65ab059] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=f4d3c65ab059] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=f4d3c65ab059] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-03-05 13:45:22 --> [CSRF] token name=csrf_test_name hash=6781a5e6bbacd849df647356d91a52a4
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=22c02d0cdad3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 13:45:22 --> [REQ_ID=22c02d0cdad3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 13:45:22 --> [REQ_ID=22c02d0cdad3] [METHOD_ENTRY] show
DEBUG - 2026-03-05 13:45:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 13:45:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 13:45:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 13:45:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 13:45:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 13:45:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 13:45:22 --> [REQ_ID=22c02d0cdad3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 13:45:23 --> [REQ_ID=22c02d0cdad3] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-03-05 13:45:23 --> [REQ_ID=22c02d0cdad3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 13:45:23 --> themesMemory usage: 14680064
DEBUG - 2026-03-05 13:45:23 --> [REQ_ID=f4d3c65ab059] [FILTER_AFTER]
DEBUG - 2026-03-05 13:45:23 --> [REQ_ID=f4d3c65ab059] [LIFECYCLE][END] status=200 duration_ms=1,401.71 memory_delta=8388608
INFO - 2026-03-05 13:45:23 --> [REQ_ID=22c02d0cdad3] [PERF] Execution time=1.398885
DEBUG - 2026-03-05 13:45:23 --> [REQ_ID=f4d3c65ab059] [REQUEST][END]
INFO - 2026-03-05 13:45:23 --> [REQ_ID=f4d3c65ab059] [PERF] Execution time=1.459769
DEBUG - 2026-03-05 13:46:20 --> [REQ_ID=910dfa5c0b83] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:51:20 --> [REQ_ID=e30d48f350fa] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 13:56:20 --> [REQ_ID=52440155c47c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 13:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 13:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 13:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 13:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 13:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 14:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-05 14:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 14:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 14:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [REQUEST][END]
INFO - 2026-03-05 14:00:01 --> [REQ_ID=64b3d68680c1] [PERF] Execution time=0.121771
INFO - 2026-03-05 14:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 14:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.064866
INFO - 2026-03-05 14:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 14:00:02 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:00:02 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 14:00:02 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 14:00:02 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006063
INFO - 2026-03-05 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 14:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 14:00:03 --> LOG_HEALTHCHECK debug marker=549c6652616d
INFO - 2026-03-05 14:00:03 --> LOG_HEALTHCHECK info marker=549c6652616d
NOTICE - 2026-03-05 14:00:03 --> LOG_HEALTHCHECK probe marker=549c6652616d
INFO - 2026-03-05 14:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 14:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.027502
INFO - 2026-03-05 14:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 14:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 14:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.012456
INFO - 2026-03-05 14:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 14:01:20 --> [REQ_ID=ade229ae6538] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:06:20 --> [REQ_ID=2ccdfde46530] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-03-05 14:08:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-03-05 14:08:33 --> [CSRF] token name=csrf_test_name hash=97de5f07b698743c88ac6c74a8b2900f
DEBUG - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [REQUEST][END]
INFO - 2026-03-05 14:08:33 --> [REQ_ID=0588109c088e] [PERF] Execution time=0.051701
DEBUG - 2026-03-05 14:08:36 --> [REQ_ID=6702c20a7218] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 14:08:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 14:08:37 --> [CSRF] token name=csrf_test_name hash=0c5c5ac1959fa5d0cc9cebafb5993367
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=776e7aaac7b3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 14:08:37 --> [REQ_ID=776e7aaac7b3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [FILTER_AFTER]
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [LIFECYCLE][END] status=200 duration_ms=114.38 memory_delta=0
INFO - 2026-03-05 14:08:37 --> [REQ_ID=776e7aaac7b3] [PERF] Execution time=0.114234
DEBUG - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [REQUEST][END]
INFO - 2026-03-05 14:08:37 --> [REQ_ID=6702c20a7218] [PERF] Execution time=0.127251
DEBUG - 2026-03-05 14:11:20 --> [REQ_ID=2ed68f43cc8a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 14:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 14:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 14:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [REQUEST][END]
INFO - 2026-03-05 14:15:01 --> [REQ_ID=d72c71764298] [PERF] Execution time=0.061288
INFO - 2026-03-05 14:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 14:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.185293
INFO - 2026-03-05 14:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 14:16:20 --> [REQ_ID=f66c0e147122] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:17:31 --> [REQ_ID=7180fcb12574] [REQUEST][START] GET /
DEBUG - 2026-03-05 14:17:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 14:17:31 --> [REQ_ID=7180fcb12574] [FILTER_BEFORE] /
DEBUG - 2026-03-05 14:17:31 --> [REQ_ID=7180fcb12574] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 14:17:31 --> [REQ_ID=7180fcb12574] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 14:17:31 --> [CSRF] token name=csrf_test_name hash=97599a02798ea1e9de8f99ab3084d6fc
DEBUG - 2026-03-05 14:17:31 --> [REQ_ID=a8d25bf5883b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 14:17:31 --> [REQ_ID=a8d25bf5883b] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 14:17:31 --> [REQ_ID=a8d25bf5883b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 14:17:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 14:17:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 14:17:32 --> [REQ_ID=a8d25bf5883b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 14:17:32 --> [REQ_ID=a8d25bf5883b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 14:17:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 14:17:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 14:17:32 --> [REQ_ID=7180fcb12574] [FILTER_AFTER]
DEBUG - 2026-03-05 14:17:32 --> [REQ_ID=7180fcb12574] [LIFECYCLE][END] status=200 duration_ms=649.52 memory_delta=4194304
INFO - 2026-03-05 14:17:32 --> [REQ_ID=a8d25bf5883b] [PERF] Execution time=0.631371
DEBUG - 2026-03-05 14:17:32 --> [REQ_ID=7180fcb12574] [REQUEST][END]
INFO - 2026-03-05 14:17:32 --> [REQ_ID=7180fcb12574] [PERF] Execution time=0.808959
DEBUG - 2026-03-05 14:21:20 --> [REQ_ID=4791f2d00309] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:26:20 --> [REQ_ID=72c62f8c679c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 14:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 14:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 14:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 14:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 14:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.119181
INFO - 2026-03-05 14:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 14:31:20 --> [REQ_ID=076b2ddccb76] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:36:20 --> [REQ_ID=3136a44b55ed] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:41:20 --> [REQ_ID=b1f10710541c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 14:45:02 --> [spark:ops:work] Started
INFO - 2026-03-05 14:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 14:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 14:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 14:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 14:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051096
INFO - 2026-03-05 14:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 14:46:20 --> [REQ_ID=711a186d999d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:51:20 --> [REQ_ID=4a7c89c64cb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 14:56:20 --> [REQ_ID=75169be9d9cd] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 14:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 14:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 14:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 14:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 14:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 15:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 15:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 15:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 15:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [REQUEST][END]
INFO - 2026-03-05 15:00:01 --> [REQ_ID=c4c404ef2031] [PERF] Execution time=0.051440
INFO - 2026-03-05 15:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 15:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.198160
INFO - 2026-03-05 15:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 15:01:20 --> [REQ_ID=c0449c7245e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:06:20 --> [REQ_ID=f909bc2f688d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:10:29 --> [REQ_ID=7b657ff951b1] [REQUEST][START] GET /
DEBUG - 2026-03-05 15:10:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 15:10:29 --> [REQ_ID=7b657ff951b1] [FILTER_BEFORE] /
DEBUG - 2026-03-05 15:10:29 --> [REQ_ID=7b657ff951b1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 15:10:29 --> [REQ_ID=7b657ff951b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 15:10:29 --> [CSRF] token name=csrf_test_name hash=27f04200f85eb8c1730b3ca13a70185d
DEBUG - 2026-03-05 15:10:29 --> [REQ_ID=55a154ed3e19] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 15:10:29 --> [REQ_ID=55a154ed3e19] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 15:10:29 --> [REQ_ID=55a154ed3e19] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 15:10:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 15:10:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 15:10:30 --> [REQ_ID=55a154ed3e19] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 15:10:30 --> [REQ_ID=55a154ed3e19] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 15:10:30 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 15:10:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 15:10:30 --> [REQ_ID=7b657ff951b1] [FILTER_AFTER]
DEBUG - 2026-03-05 15:10:30 --> [REQ_ID=7b657ff951b1] [LIFECYCLE][END] status=200 duration_ms=748.98 memory_delta=4194304
INFO - 2026-03-05 15:10:30 --> [REQ_ID=55a154ed3e19] [PERF] Execution time=0.746242
DEBUG - 2026-03-05 15:10:30 --> [REQ_ID=7b657ff951b1] [REQUEST][END]
INFO - 2026-03-05 15:10:30 --> [REQ_ID=7b657ff951b1] [PERF] Execution time=0.799444
DEBUG - 2026-03-05 15:11:20 --> [REQ_ID=350f580d5833] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 15:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 15:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 15:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 15:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 15:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 15:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033301
INFO - 2026-03-05 15:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [REQUEST][END]
INFO - 2026-03-05 15:15:01 --> [REQ_ID=b2c5f512f9db] [PERF] Execution time=0.056791
DEBUG - 2026-03-05 15:16:20 --> [REQ_ID=3b47ace755f0] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:17:01 --> [REQ_ID=642ef673993a] [REQUEST][START] GET /
DEBUG - 2026-03-05 15:17:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 15:17:01 --> [REQ_ID=642ef673993a] [FILTER_BEFORE] /
DEBUG - 2026-03-05 15:17:01 --> [REQ_ID=642ef673993a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 15:17:01 --> [REQ_ID=642ef673993a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 15:17:01 --> [CSRF] token name=csrf_test_name hash=d45dde83a90940adaa310d0b37244156
DEBUG - 2026-03-05 15:17:01 --> [REQ_ID=a8a30ba254f6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 15:17:01 --> [REQ_ID=a8a30ba254f6] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 15:17:02 --> [REQ_ID=a8a30ba254f6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 15:17:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 15:17:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 15:17:02 --> [REQ_ID=a8a30ba254f6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 15:17:02 --> [REQ_ID=a8a30ba254f6] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 15:17:02 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 15:17:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 15:17:02 --> [REQ_ID=642ef673993a] [FILTER_AFTER]
DEBUG - 2026-03-05 15:17:02 --> [REQ_ID=642ef673993a] [LIFECYCLE][END] status=200 duration_ms=592.20 memory_delta=4194304
INFO - 2026-03-05 15:17:02 --> [REQ_ID=a8a30ba254f6] [PERF] Execution time=0.590719
DEBUG - 2026-03-05 15:17:02 --> [REQ_ID=642ef673993a] [REQUEST][END]
INFO - 2026-03-05 15:17:02 --> [REQ_ID=642ef673993a] [PERF] Execution time=0.605624
DEBUG - 2026-03-05 15:17:40 --> [REQ_ID=1e1b6837a88a] [REQUEST][START] GET /
DEBUG - 2026-03-05 15:17:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 15:17:40 --> [REQ_ID=1e1b6837a88a] [FILTER_BEFORE] /
DEBUG - 2026-03-05 15:17:40 --> [REQ_ID=1e1b6837a88a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 15:17:40 --> [REQ_ID=1e1b6837a88a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 15:17:40 --> [CSRF] token name=csrf_test_name hash=d8ea52aa4661659972a835e79c630a8c
DEBUG - 2026-03-05 15:17:40 --> [REQ_ID=943e20cb42ee] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 15:17:40 --> [REQ_ID=943e20cb42ee] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 15:17:40 --> [REQ_ID=943e20cb42ee] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 15:17:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 15:17:41 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 15:17:41 --> [REQ_ID=943e20cb42ee] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 15:17:41 --> [REQ_ID=943e20cb42ee] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 15:17:41 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 15:17:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 15:17:41 --> [REQ_ID=1e1b6837a88a] [FILTER_AFTER]
DEBUG - 2026-03-05 15:17:41 --> [REQ_ID=1e1b6837a88a] [LIFECYCLE][END] status=200 duration_ms=536.16 memory_delta=2097152
INFO - 2026-03-05 15:17:41 --> [REQ_ID=943e20cb42ee] [PERF] Execution time=0.535652
DEBUG - 2026-03-05 15:17:41 --> [REQ_ID=1e1b6837a88a] [REQUEST][END]
INFO - 2026-03-05 15:17:41 --> [REQ_ID=1e1b6837a88a] [PERF] Execution time=0.545870
DEBUG - 2026-03-05 15:21:20 --> [REQ_ID=1d0a89697a08] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:26:20 --> [REQ_ID=26a14856320e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 15:30:02 --> [spark:ops:work] Started
INFO - 2026-03-05 15:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 15:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 15:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 15:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 15:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.293582
INFO - 2026-03-05 15:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 15:31:20 --> [REQ_ID=463bc9ac7c63] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:36:20 --> [REQ_ID=7a4ca41e94dc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:41:20 --> [REQ_ID=dba609145a32] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 15:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 15:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 15:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 15:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 15:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 15:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051939
INFO - 2026-03-05 15:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 15:46:20 --> [REQ_ID=862d05535bfd] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:51:20 --> [REQ_ID=5fcacb610818] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 15:56:20 --> [REQ_ID=2c0c6a602ed6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 15:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 15:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 15:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 15:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 15:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:00:01 --> [REQ_ID=f0570afcf9ea] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 16:00:02 --> [spark:ops:work] Started
DEBUG - 2026-03-05 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 16:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 16:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 16:00:02 --> [REQ_ID=f0570afcf9ea] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 16:00:02 --> [REQ_ID=f0570afcf9ea] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 16:00:02 --> [REQ_ID=f0570afcf9ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 16:00:02 --> [REQ_ID=f0570afcf9ea] [REQUEST][END]
INFO - 2026-03-05 16:00:02 --> [REQ_ID=f0570afcf9ea] [PERF] Execution time=0.078733
INFO - 2026-03-05 16:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 16:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.062196
INFO - 2026-03-05 16:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 16:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 16:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005812
INFO - 2026-03-05 16:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 16:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 16:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 16:00:03 --> LOG_HEALTHCHECK debug marker=b0cd7803d094
INFO - 2026-03-05 16:00:03 --> LOG_HEALTHCHECK info marker=b0cd7803d094
NOTICE - 2026-03-05 16:00:03 --> LOG_HEALTHCHECK probe marker=b0cd7803d094
INFO - 2026-03-05 16:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 16:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025523
INFO - 2026-03-05 16:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 16:00:06 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 16:00:06 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 16:00:07 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 16:00:07 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 16:00:07 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 16:00:07 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=5.299759
INFO - 2026-03-05 16:00:07 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 16:01:20 --> [REQ_ID=30e66a89f924] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-05 16:02:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-05 16:02:05 --> [CSRF] token name=csrf_test_name hash=b57a983d1376b41c48a84992e3f300dd
DEBUG - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [REQUEST][END]
INFO - 2026-03-05 16:02:05 --> [REQ_ID=d2d1e15fecb1] [PERF] Execution time=0.031350
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 16:02:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 16:02:09 --> [CSRF] token name=csrf_test_name hash=6e6f88b0b1faedf2da8e094dd4d369b8
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=06204448b2bf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 16:02:09 --> [REQ_ID=06204448b2bf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [FILTER_AFTER]
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [LIFECYCLE][END] status=200 duration_ms=113.55 memory_delta=0
INFO - 2026-03-05 16:02:09 --> [REQ_ID=06204448b2bf] [PERF] Execution time=0.111831
DEBUG - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [REQUEST][END]
INFO - 2026-03-05 16:02:09 --> [REQ_ID=d6ea2544b73f] [PERF] Execution time=0.125571
DEBUG - 2026-03-05 16:06:20 --> [REQ_ID=28a529fd2f84] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:11:20 --> [REQ_ID=4c4128dad56d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:11:54 --> [REQ_ID=c18ac1f43c5e] [REQUEST][START] GET /
DEBUG - 2026-03-05 16:11:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:11:54 --> [REQ_ID=c18ac1f43c5e] [FILTER_BEFORE] /
DEBUG - 2026-03-05 16:11:54 --> [REQ_ID=c18ac1f43c5e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 16:11:54 --> [REQ_ID=c18ac1f43c5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 16:11:54 --> [CSRF] token name=csrf_test_name hash=f7f438063b7db142fd6a8953905cf8c8
DEBUG - 2026-03-05 16:11:54 --> [REQ_ID=2c09181e309e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 16:11:54 --> [REQ_ID=2c09181e309e] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 16:11:55 --> [REQ_ID=2c09181e309e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 16:11:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:11:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 16:11:55 --> [REQ_ID=2c09181e309e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 16:11:55 --> [REQ_ID=2c09181e309e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 16:11:55 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 16:11:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 16:11:55 --> [REQ_ID=c18ac1f43c5e] [FILTER_AFTER]
DEBUG - 2026-03-05 16:11:55 --> [REQ_ID=c18ac1f43c5e] [LIFECYCLE][END] status=200 duration_ms=642.85 memory_delta=4194304
INFO - 2026-03-05 16:11:55 --> [REQ_ID=2c09181e309e] [PERF] Execution time=0.640905
DEBUG - 2026-03-05 16:11:55 --> [REQ_ID=c18ac1f43c5e] [REQUEST][END]
INFO - 2026-03-05 16:11:55 --> [REQ_ID=c18ac1f43c5e] [PERF] Execution time=0.662229
INFO - 2026-03-05 16:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 16:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 16:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-05 16:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 16:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.131588
INFO - 2026-03-05 16:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [REQUEST][END]
INFO - 2026-03-05 16:15:02 --> [REQ_ID=136985743af7] [PERF] Execution time=0.080734
DEBUG - 2026-03-05 16:16:20 --> [REQ_ID=987adeecca6e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [REQUEST][START] GET /
DEBUG - 2026-03-05 16:16:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [FILTER_BEFORE] /
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 16:16:33 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-05 16:16:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:16:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 16:16:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 16:16:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [LIFECYCLE][END] status=200 duration_ms=536.29 memory_delta=4194304
INFO - 2026-03-05 16:16:33 --> [REQ_ID=8a6f494b4421] [PERF] Execution time=0.534895
DEBUG - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [REQUEST][END]
INFO - 2026-03-05 16:16:33 --> [REQ_ID=ed500d9f0794] [PERF] Execution time=0.549937
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=da6957649777] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=da6957649777] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=da6957649777] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=da6957649777] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:34 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [METHOD_ENTRY] show
DEBUG - 2026-03-05 16:16:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:16:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 16:16:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 16:16:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 16:16:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 16:16:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-05 16:16:34 --> [REQ_ID=7821ec278885] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 16:16:35 --> themesMemory usage: 12582912
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=da6957649777] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=da6957649777] [LIFECYCLE][END] status=200 duration_ms=1,023.85 memory_delta=8388608
INFO - 2026-03-05 16:16:35 --> [REQ_ID=7821ec278885] [PERF] Execution time=1.023663
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=da6957649777] [REQUEST][END]
INFO - 2026-03-05 16:16:35 --> [REQ_ID=da6957649777] [PERF] Execution time=1.036413
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-05 16:16:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-05 16:16:35 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
INFO - 2026-03-05 16:16:35 --> CSRF token verified.
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=ebce87da9a60] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-05 16:16:35 --> [REQ_ID=ebce87da9a60] [MEMORY][controller-start] 8388608
INFO - 2026-03-05 16:16:35 --> [REGISTRATION] Submission received
INFO - 2026-03-05 16:16:35 --> MailService queued email
ERROR - 2026-03-05 16:16:35 --> Registration failed: {"username":"The username field is not in the correct format.","email":"The email field must contain a unique value."}
INFO - 2026-03-05 16:16:35 --> MailService queued email
WARNING - 2026-03-05 16:16:35 --> [REGISTRATION] Validation failed (basic fields)
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [LIFECYCLE][END] status=302 duration_ms=92.64 memory_delta=0
INFO - 2026-03-05 16:16:35 --> [REQ_ID=ebce87da9a60] [PERF] Execution time=0.092247
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [REQUEST][END]
INFO - 2026-03-05 16:16:35 --> [REQ_ID=de278f4f313f] [PERF] Execution time=0.105838
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=0873f095a4f1] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=0873f095a4f1] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=0873f095a4f1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=0873f095a4f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:35 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=4c9a1f2b72ee] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 16:16:35 --> [REQ_ID=4c9a1f2b72ee] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 16:16:35 --> [REQ_ID=4c9a1f2b72ee] [METHOD_ENTRY] show
DEBUG - 2026-03-05 16:16:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:16:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 16:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 16:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 16:16:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 16:16:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 16:16:35 --> [REQ_ID=4c9a1f2b72ee] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 16:16:36 --> [REQ_ID=4c9a1f2b72ee] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-05 16:16:36 --> [REQ_ID=4c9a1f2b72ee] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 16:16:37 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0873f095a4f1] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0873f095a4f1] [LIFECYCLE][END] status=200 duration_ms=1,090.27 memory_delta=6291456
INFO - 2026-03-05 16:16:37 --> [REQ_ID=4c9a1f2b72ee] [PERF] Execution time=1.090201
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0873f095a4f1] [REQUEST][END]
INFO - 2026-03-05 16:16:37 --> [REQ_ID=0873f095a4f1] [PERF] Execution time=1.102844
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 16:16:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 16:16:37 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=caf277954ab2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 16:16:37 --> [REQ_ID=caf277954ab2] [MEMORY][controller-start] 8388608
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [LIFECYCLE][END] status=200 duration_ms=14.79 memory_delta=0
INFO - 2026-03-05 16:16:37 --> [REQ_ID=caf277954ab2] [PERF] Execution time=0.014463
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [REQUEST][END]
INFO - 2026-03-05 16:16:37 --> [REQ_ID=0a1ed47c1a32] [PERF] Execution time=0.024399
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-05 16:16:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 16:16:37 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
INFO - 2026-03-05 16:16:37 --> CSRF token verified.
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=33d7f201815b] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-05 16:16:37 --> [REQ_ID=33d7f201815b] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 16:16:37 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-05 16:16:37 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-05 16:16:37 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 77.93.154.236, ua: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.53 Safari/537.36
DEBUG - 2026-03-05 16:16:37 --> Auth attemptLogin() called with login identifier: #gsduerisrnz, remember: false
DEBUG - 2026-03-05 16:16:37 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 16:16:37 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-05 16:16:37 --> [AUTH_FAILURE] 
DEBUG - 2026-03-05 16:16:37 --> Auth attempt failed for identifier #gsduerisrnz. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-03-05 16:16:37 --> [AUTH] Login failure
WARNING - 2026-03-05 16:16:37 --> [AUTH] Login failed
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [LIFECYCLE][END] status=302 duration_ms=38.31 memory_delta=0
INFO - 2026-03-05 16:16:37 --> [REQ_ID=33d7f201815b] [PERF] Execution time=0.038080
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [REQUEST][END]
INFO - 2026-03-05 16:16:37 --> [REQ_ID=c28b979ddb51] [PERF] Execution time=0.047505
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 16:16:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 16:16:37 --> [CSRF] token name=csrf_test_name hash=a0ce8d609dbfd5136bb74b71a5eb424e
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=28a58bd5ba05] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 16:16:37 --> [REQ_ID=28a58bd5ba05] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [FILTER_AFTER]
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [LIFECYCLE][END] status=200 duration_ms=16.12 memory_delta=0
INFO - 2026-03-05 16:16:37 --> [REQ_ID=28a58bd5ba05] [PERF] Execution time=0.015956
DEBUG - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [REQUEST][END]
INFO - 2026-03-05 16:16:37 --> [REQ_ID=13963c4cd0a9] [PERF] Execution time=0.025173
DEBUG - 2026-03-05 16:21:20 --> [REQ_ID=830b68af1c01] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-03-05 16:21:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-03-05 16:21:54 --> [CSRF] token name=csrf_test_name hash=2a7ec5750d9747af00c443d9cabe0523
DEBUG - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [REQUEST][END]
INFO - 2026-03-05 16:21:54 --> [REQ_ID=c17c46a26044] [PERF] Execution time=0.029442
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 16:22:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 16:22:18 --> [CSRF] token name=csrf_test_name hash=5a5b4effd8bb06f856b1c5180e273df5
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=b95b374a61c5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 16:22:18 --> [REQ_ID=b95b374a61c5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [FILTER_AFTER]
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [LIFECYCLE][END] status=200 duration_ms=25.76 memory_delta=0
INFO - 2026-03-05 16:22:18 --> [REQ_ID=b95b374a61c5] [PERF] Execution time=0.025425
DEBUG - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [REQUEST][END]
INFO - 2026-03-05 16:22:18 --> [REQ_ID=6afedfed0525] [PERF] Execution time=0.038370
DEBUG - 2026-03-05 16:26:20 --> [REQ_ID=ba38b30b18c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:29:06 --> [REQ_ID=aea67a444fc1] [REQUEST][START] GET /
DEBUG - 2026-03-05 16:29:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:29:06 --> [REQ_ID=aea67a444fc1] [FILTER_BEFORE] /
DEBUG - 2026-03-05 16:29:06 --> [REQ_ID=aea67a444fc1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 16:29:06 --> [REQ_ID=aea67a444fc1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 16:29:06 --> [CSRF] token name=csrf_test_name hash=3d77dd5d68b11d4c7c7880dc0634b03a
DEBUG - 2026-03-05 16:29:06 --> [REQ_ID=771d3b5a4333] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 16:29:06 --> [REQ_ID=771d3b5a4333] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 16:29:06 --> [REQ_ID=771d3b5a4333] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 16:29:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:29:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 16:29:07 --> [REQ_ID=771d3b5a4333] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 16:29:07 --> [REQ_ID=771d3b5a4333] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 16:29:07 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 16:29:07 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 16:29:07 --> [REQ_ID=aea67a444fc1] [FILTER_AFTER]
DEBUG - 2026-03-05 16:29:07 --> [REQ_ID=aea67a444fc1] [LIFECYCLE][END] status=200 duration_ms=715.93 memory_delta=4194304
INFO - 2026-03-05 16:29:07 --> [REQ_ID=771d3b5a4333] [PERF] Execution time=0.713877
DEBUG - 2026-03-05 16:29:07 --> [REQ_ID=aea67a444fc1] [REQUEST][END]
INFO - 2026-03-05 16:29:07 --> [REQ_ID=aea67a444fc1] [PERF] Execution time=0.754611
INFO - 2026-03-05 16:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 16:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 16:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 16:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.017606
INFO - 2026-03-05 16:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 16:31:20 --> [REQ_ID=e6951759e8fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:36:20 --> [REQ_ID=fd08e33189ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:41:20 --> [REQ_ID=b32b053df968] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 16:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 16:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 16:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 16:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 16:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 16:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050605
INFO - 2026-03-05 16:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 16:46:20 --> [REQ_ID=b814d5342211] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:51:20 --> [REQ_ID=eb2b2c3da1ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 16:55:16 --> [REQ_ID=aa74e45600d4] [REQUEST][START] GET /
DEBUG - 2026-03-05 16:55:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 16:55:16 --> [REQ_ID=aa74e45600d4] [FILTER_BEFORE] /
DEBUG - 2026-03-05 16:55:16 --> [REQ_ID=aa74e45600d4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 16:55:16 --> [REQ_ID=aa74e45600d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 16:55:16 --> [CSRF] token name=csrf_test_name hash=0a5550ce4104084d71a36a1623178915
DEBUG - 2026-03-05 16:55:16 --> [REQ_ID=98ca4234e4e6] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 16:55:16 --> [REQ_ID=98ca4234e4e6] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 16:55:16 --> [REQ_ID=98ca4234e4e6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 16:55:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 16:55:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 16:55:17 --> [REQ_ID=98ca4234e4e6] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 16:55:17 --> [REQ_ID=98ca4234e4e6] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 16:55:17 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 16:55:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 16:55:17 --> [REQ_ID=aa74e45600d4] [FILTER_AFTER]
DEBUG - 2026-03-05 16:55:17 --> [REQ_ID=aa74e45600d4] [LIFECYCLE][END] status=200 duration_ms=707.31 memory_delta=4194304
INFO - 2026-03-05 16:55:17 --> [REQ_ID=98ca4234e4e6] [PERF] Execution time=0.705568
DEBUG - 2026-03-05 16:55:17 --> [REQ_ID=aa74e45600d4] [REQUEST][END]
INFO - 2026-03-05 16:55:17 --> [REQ_ID=aa74e45600d4] [PERF] Execution time=0.746040
DEBUG - 2026-03-05 16:56:20 --> [REQ_ID=798813899fc2] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 16:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 16:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 16:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 16:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 16:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 17:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 17:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 17:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 17:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [REQUEST][END]
INFO - 2026-03-05 17:00:02 --> [REQ_ID=0eaf59702002] [PERF] Execution time=0.047605
INFO - 2026-03-05 17:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 17:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.199744
INFO - 2026-03-05 17:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 17:01:20 --> [REQ_ID=7475e0c35b24] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:06:08 --> [REQ_ID=54eff9584c06] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:06:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:06:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:06:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:06:08 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:06:08 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-03-05 17:06:20 --> [REQ_ID=f23cde441814] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:11:20 --> [REQ_ID=5eda2b2ad274] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-03-05 17:11:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-03-05 17:11:40 --> [CSRF] token name=csrf_test_name hash=4739aefd24e500a81a2f5b2dcd04679e
DEBUG - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [REQUEST][END]
INFO - 2026-03-05 17:11:40 --> [REQ_ID=4bc2464014a3] [PERF] Execution time=0.028781
DEBUG - 2026-03-05 17:11:47 --> [REQ_ID=1ff78d095935] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 17:11:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 17:11:48 --> [CSRF] token name=csrf_test_name hash=baf8f093cfde1f30451fb72e9b8de690
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=0d8c2ba7dac8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 17:11:48 --> [REQ_ID=0d8c2ba7dac8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [FILTER_AFTER]
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [LIFECYCLE][END] status=200 duration_ms=106.18 memory_delta=0
INFO - 2026-03-05 17:11:48 --> [REQ_ID=0d8c2ba7dac8] [PERF] Execution time=0.105800
DEBUG - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [REQUEST][END]
INFO - 2026-03-05 17:11:48 --> [REQ_ID=1ff78d095935] [PERF] Execution time=0.120046
INFO - 2026-03-05 17:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 17:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 17:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 17:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-05 17:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 17:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.057828
INFO - 2026-03-05 17:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 17:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [REQUEST][END]
INFO - 2026-03-05 17:15:02 --> [REQ_ID=b3d1218aa520] [PERF] Execution time=0.079009
DEBUG - 2026-03-05 17:16:20 --> [REQ_ID=cce3f81519ea] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:21:20 --> [REQ_ID=a63d54132fce] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:26:20 --> [REQ_ID=889d64effafd] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 17:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 17:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 17:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 17:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 17:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 17:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.135777
INFO - 2026-03-05 17:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 17:31:20 --> [REQ_ID=0ca88de35ffe] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:36:20 --> [REQ_ID=7a4d9e840029] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:41:20 --> [REQ_ID=b8a059be48f9] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-05 17:42:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-05 17:42:10 --> [CSRF] token name=csrf_test_name hash=c334ecb11bda8333aaf88253ee4516c8
DEBUG - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [REQUEST][END]
INFO - 2026-03-05 17:42:10 --> [REQ_ID=5dd034d7a2af] [PERF] Execution time=0.025432
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 17:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 17:42:15 --> [CSRF] token name=csrf_test_name hash=76ac59856565ec8de7a83e645a7f2a48
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=14996c4c86ac] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 17:42:15 --> [REQ_ID=14996c4c86ac] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [FILTER_AFTER]
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [LIFECYCLE][END] status=200 duration_ms=23.82 memory_delta=0
INFO - 2026-03-05 17:42:15 --> [REQ_ID=14996c4c86ac] [PERF] Execution time=0.023461
DEBUG - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [REQUEST][END]
INFO - 2026-03-05 17:42:15 --> [REQ_ID=c36f03db5533] [PERF] Execution time=0.040017
INFO - 2026-03-05 17:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 17:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 17:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 17:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 17:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 17:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.158584
INFO - 2026-03-05 17:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 17:46:20 --> [REQ_ID=9bbec6c14913] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:48:46 --> [REQ_ID=6b5ef5cedc97] [REQUEST][START] GET /index.php
DEBUG - 2026-03-05 17:48:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:48:46 --> [REQ_ID=6b5ef5cedc97] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-05 17:48:46 --> [REQ_ID=6b5ef5cedc97] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 17:48:46 --> [REQ_ID=6b5ef5cedc97] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 17:48:46 --> [CSRF] token name=csrf_test_name hash=78cc0e43d51ee5b02195d443cf82c31d
DEBUG - 2026-03-05 17:48:46 --> [REQ_ID=cec5f8110318] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 17:48:46 --> [REQ_ID=cec5f8110318] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 17:48:47 --> [REQ_ID=cec5f8110318] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 17:48:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 17:48:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 17:48:47 --> [REQ_ID=cec5f8110318] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 17:48:47 --> [REQ_ID=cec5f8110318] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 17:48:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 17:48:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 17:48:47 --> [REQ_ID=6b5ef5cedc97] [FILTER_AFTER]
DEBUG - 2026-03-05 17:48:47 --> [REQ_ID=6b5ef5cedc97] [LIFECYCLE][END] status=200 duration_ms=890.15 memory_delta=4194304
INFO - 2026-03-05 17:48:47 --> [REQ_ID=cec5f8110318] [PERF] Execution time=0.887946
DEBUG - 2026-03-05 17:48:47 --> [REQ_ID=6b5ef5cedc97] [REQUEST][END]
INFO - 2026-03-05 17:48:47 --> [REQ_ID=6b5ef5cedc97] [PERF] Execution time=0.929081
DEBUG - 2026-03-05 17:51:20 --> [REQ_ID=afce5873d520] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 17:52:38 --> [REQ_ID=ffaeec70042f] [REQUEST][START] GET /
DEBUG - 2026-03-05 17:52:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:52:38 --> [REQ_ID=ffaeec70042f] [FILTER_BEFORE] /
DEBUG - 2026-03-05 17:52:38 --> [REQ_ID=ffaeec70042f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 17:52:38 --> [REQ_ID=ffaeec70042f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 17:52:38 --> [CSRF] token name=csrf_test_name hash=43446a1edb32691aa2606db44350ab52
DEBUG - 2026-03-05 17:52:38 --> [REQ_ID=095ec35040bd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 17:52:38 --> [REQ_ID=095ec35040bd] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 17:52:38 --> [REQ_ID=095ec35040bd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 17:52:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 17:52:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 17:52:39 --> [REQ_ID=095ec35040bd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 17:52:39 --> [REQ_ID=095ec35040bd] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 17:52:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 17:52:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 17:52:39 --> [REQ_ID=ffaeec70042f] [FILTER_AFTER]
DEBUG - 2026-03-05 17:52:39 --> [REQ_ID=ffaeec70042f] [LIFECYCLE][END] status=200 duration_ms=576.45 memory_delta=4194304
INFO - 2026-03-05 17:52:39 --> [REQ_ID=095ec35040bd] [PERF] Execution time=0.574419
DEBUG - 2026-03-05 17:52:39 --> [REQ_ID=ffaeec70042f] [REQUEST][END]
INFO - 2026-03-05 17:52:39 --> [REQ_ID=ffaeec70042f] [PERF] Execution time=0.614519
DEBUG - 2026-03-05 17:53:37 --> [REQ_ID=9b85d1a89ce4] [REQUEST][START] GET /
DEBUG - 2026-03-05 17:53:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 17:53:37 --> [REQ_ID=9b85d1a89ce4] [FILTER_BEFORE] /
DEBUG - 2026-03-05 17:53:37 --> [REQ_ID=9b85d1a89ce4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 17:53:37 --> [REQ_ID=9b85d1a89ce4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 17:53:37 --> [CSRF] token name=csrf_test_name hash=ee07ab8815a47dd28df6a37b43255a7d
DEBUG - 2026-03-05 17:53:37 --> [REQ_ID=a1287d796a33] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 17:53:37 --> [REQ_ID=a1287d796a33] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 17:53:37 --> [REQ_ID=a1287d796a33] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 17:53:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 17:53:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 17:53:38 --> [REQ_ID=a1287d796a33] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 17:53:38 --> [REQ_ID=a1287d796a33] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 17:53:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 17:53:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 17:53:38 --> [REQ_ID=9b85d1a89ce4] [FILTER_AFTER]
DEBUG - 2026-03-05 17:53:38 --> [REQ_ID=9b85d1a89ce4] [LIFECYCLE][END] status=200 duration_ms=629.93 memory_delta=2097152
INFO - 2026-03-05 17:53:38 --> [REQ_ID=a1287d796a33] [PERF] Execution time=0.628888
DEBUG - 2026-03-05 17:53:38 --> [REQ_ID=9b85d1a89ce4] [REQUEST][END]
INFO - 2026-03-05 17:53:38 --> [REQ_ID=9b85d1a89ce4] [PERF] Execution time=0.639329
DEBUG - 2026-03-05 17:56:20 --> [REQ_ID=2652cb343c48] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 17:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 17:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 17:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 17:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 17:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 18:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [REQUEST][END]
INFO - 2026-03-05 18:00:01 --> [REQ_ID=8b77e1ccf3c3] [PERF] Execution time=0.074897
INFO - 2026-03-05 18:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 18:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 18:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 18:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.114728
INFO - 2026-03-05 18:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 18:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 18:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009965
INFO - 2026-03-05 18:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 18:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 18:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 18:00:03 --> LOG_HEALTHCHECK debug marker=0ce554860db1
INFO - 2026-03-05 18:00:03 --> LOG_HEALTHCHECK info marker=0ce554860db1
NOTICE - 2026-03-05 18:00:03 --> LOG_HEALTHCHECK probe marker=0ce554860db1
INFO - 2026-03-05 18:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 18:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.029093
INFO - 2026-03-05 18:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 18:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 18:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 18:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 18:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 18:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 18:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.429926
INFO - 2026-03-05 18:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 18:01:20 --> [REQ_ID=f43e2186142d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:05:37 --> [REQ_ID=2346d9682b71] [REQUEST][START] GET /index.php
DEBUG - 2026-03-05 18:05:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 18:05:37 --> [REQ_ID=2346d9682b71] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-05 18:05:37 --> [REQ_ID=2346d9682b71] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 18:05:37 --> [REQ_ID=2346d9682b71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 18:05:37 --> [CSRF] token name=csrf_test_name hash=7714c6db5d42922f94b3ff34858ae67d
DEBUG - 2026-03-05 18:05:37 --> [REQ_ID=6e1328b2d8c7] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 18:05:37 --> [REQ_ID=6e1328b2d8c7] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 18:05:37 --> [REQ_ID=6e1328b2d8c7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 18:05:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 18:05:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 18:05:38 --> [REQ_ID=6e1328b2d8c7] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 18:05:38 --> [REQ_ID=6e1328b2d8c7] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 18:05:38 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 18:05:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 18:05:38 --> [REQ_ID=2346d9682b71] [FILTER_AFTER]
DEBUG - 2026-03-05 18:05:38 --> [REQ_ID=2346d9682b71] [LIFECYCLE][END] status=200 duration_ms=647.50 memory_delta=4194304
INFO - 2026-03-05 18:05:38 --> [REQ_ID=6e1328b2d8c7] [PERF] Execution time=0.645252
DEBUG - 2026-03-05 18:05:38 --> [REQ_ID=2346d9682b71] [REQUEST][END]
INFO - 2026-03-05 18:05:38 --> [REQ_ID=2346d9682b71] [PERF] Execution time=0.686816
DEBUG - 2026-03-05 18:06:20 --> [REQ_ID=fb81de4a47d6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:11:20 --> [REQ_ID=ed3d7aece1a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 18:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 18:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 18:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [REQUEST][END]
INFO - 2026-03-05 18:15:01 --> [REQ_ID=415f32a1ea9d] [PERF] Execution time=0.053193
INFO - 2026-03-05 18:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 18:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.249323
INFO - 2026-03-05 18:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 18:16:20 --> [REQ_ID=97ff7584473a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-05 18:16:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-05 18:16:33 --> [CSRF] token name=csrf_test_name hash=d63dd8114aa2d16b633f42cfc991878b
DEBUG - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [REQUEST][END]
INFO - 2026-03-05 18:16:33 --> [REQ_ID=f3f94183753e] [PERF] Execution time=0.025618
DEBUG - 2026-03-05 18:21:20 --> [REQ_ID=eb1ff5c5f0b8] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:26:20 --> [REQ_ID=03bd06fbdc18] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 18:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 18:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 18:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 18:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 18:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.054707
INFO - 2026-03-05 18:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 18:31:20 --> [REQ_ID=4e98f9ec063d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:36:20 --> [REQ_ID=fdced5c7240f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:41:20 --> [REQ_ID=8168821ed32d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 18:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 18:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 18:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 18:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 18:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 18:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.134429
INFO - 2026-03-05 18:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 18:46:20 --> [REQ_ID=98b78410ec77] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:51:20 --> [REQ_ID=a44efc335916] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 18:56:20 --> [REQ_ID=2583e3cdbc7d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 18:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 18:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 18:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 18:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 18:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 19:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 19:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 19:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 19:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 19:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 19:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 19:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.110979
INFO - 2026-03-05 19:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [REQUEST][END]
INFO - 2026-03-05 19:00:02 --> [REQ_ID=6d860d34fc77] [PERF] Execution time=0.052988
DEBUG - 2026-03-05 19:01:20 --> [REQ_ID=ca278147f86a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:06:20 --> [REQ_ID=bce0982aacea] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-05 19:10:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-05 19:10:09 --> [CSRF] token name=csrf_test_name hash=b9a6472e506cc4ca82e91d45abe2a690
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [REQUEST][END]
INFO - 2026-03-05 19:10:09 --> [REQ_ID=58b9b49ee2f6] [PERF] Execution time=0.054972
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 19:10:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 19:10:09 --> [CSRF] token name=csrf_test_name hash=803b180ed58089da9b746e7c89b07969
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=0edb08c991c0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 19:10:09 --> [REQ_ID=0edb08c991c0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [FILTER_AFTER]
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [LIFECYCLE][END] status=200 duration_ms=168.20 memory_delta=0
INFO - 2026-03-05 19:10:09 --> [REQ_ID=0edb08c991c0] [PERF] Execution time=0.163201
DEBUG - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [REQUEST][END]
INFO - 2026-03-05 19:10:09 --> [REQ_ID=f48e2b070f11] [PERF] Execution time=0.182403
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-05 19:10:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-05 19:10:34 --> [CSRF] token name=csrf_test_name hash=a02cfc68cfa73150be0c506334721697
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [METHOD_ENTRY] index
DEBUG - 2026-03-05 19:10:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 19:10:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 19:10:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 19:10:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 19:10:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 19:10:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [MEMORY][commonData:start] 6291456
INFO - 2026-03-05 19:10:34 --> themesMemory usage: 6291456
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [FILTER_AFTER]
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [LIFECYCLE][END] status=200 duration_ms=101.92 memory_delta=2097152
INFO - 2026-03-05 19:10:34 --> [REQ_ID=f78c32bb475b] [PERF] Execution time=0.100966
DEBUG - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [REQUEST][END]
INFO - 2026-03-05 19:10:34 --> [REQ_ID=8624b3a52022] [PERF] Execution time=0.120308
DEBUG - 2026-03-05 19:11:20 --> [REQ_ID=f816cadfb57b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:11:55 --> [REQ_ID=de7211caac0c] [REQUEST][START] GET /
DEBUG - 2026-03-05 19:11:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:11:55 --> [REQ_ID=de7211caac0c] [FILTER_BEFORE] /
DEBUG - 2026-03-05 19:11:55 --> [REQ_ID=de7211caac0c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 19:11:55 --> [REQ_ID=de7211caac0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 19:11:55 --> [CSRF] token name=csrf_test_name hash=c67bd04c367a762ba696874dd75ad9b4
DEBUG - 2026-03-05 19:11:55 --> [REQ_ID=f17da6f6308d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 19:11:55 --> [REQ_ID=f17da6f6308d] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 19:11:55 --> [REQ_ID=f17da6f6308d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 19:11:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 19:11:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 19:11:56 --> [REQ_ID=f17da6f6308d] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 19:11:56 --> [REQ_ID=f17da6f6308d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 19:11:56 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 19:11:56 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 19:11:56 --> [REQ_ID=de7211caac0c] [FILTER_AFTER]
DEBUG - 2026-03-05 19:11:56 --> [REQ_ID=de7211caac0c] [LIFECYCLE][END] status=200 duration_ms=697.87 memory_delta=4194304
INFO - 2026-03-05 19:11:56 --> [REQ_ID=f17da6f6308d] [PERF] Execution time=0.697577
DEBUG - 2026-03-05 19:11:56 --> [REQ_ID=de7211caac0c] [REQUEST][END]
INFO - 2026-03-05 19:11:56 --> [REQ_ID=de7211caac0c] [PERF] Execution time=0.708315
INFO - 2026-03-05 19:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 19:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 19:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 19:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [REQUEST][END]
INFO - 2026-03-05 19:15:02 --> [REQ_ID=d07e1a3573f0] [PERF] Execution time=0.055389
INFO - 2026-03-05 19:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 19:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.178817
INFO - 2026-03-05 19:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 19:16:20 --> [REQ_ID=70a9e13e9e73] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:21:20 --> [REQ_ID=6d4295a244c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:26:20 --> [REQ_ID=431f869517a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 19:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 19:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 19:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 19:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 19:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 19:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052623
INFO - 2026-03-05 19:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 19:31:20 --> [REQ_ID=123c9ba79d98] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:36:20 --> [REQ_ID=0d602f41c3da] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:41:20 --> [REQ_ID=a84d656f778a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 19:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 19:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 19:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 19:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 19:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 19:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.133487
INFO - 2026-03-05 19:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 19:46:20 --> [REQ_ID=645494e2212b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-05 19:49:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-05 19:49:53 --> [CSRF] token name=csrf_test_name hash=317bf4c308ae3e3b7b98f32a3094c5c7
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [METHOD_ENTRY] index
DEBUG - 2026-03-05 19:49:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 19:49:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 19:49:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 19:49:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 19:49:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 19:49:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [MEMORY][commonData:start] 6291456
INFO - 2026-03-05 19:49:53 --> themesMemory usage: 6291456
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [FILTER_AFTER]
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [LIFECYCLE][END] status=200 duration_ms=230.01 memory_delta=0
INFO - 2026-03-05 19:49:53 --> [REQ_ID=694e58d74afe] [PERF] Execution time=0.227634
DEBUG - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [REQUEST][END]
INFO - 2026-03-05 19:49:53 --> [REQ_ID=859899aeea5e] [PERF] Execution time=0.275992
DEBUG - 2026-03-05 19:51:20 --> [REQ_ID=a59f04671924] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 19:56:20 --> [REQ_ID=be56f387fdc8] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 19:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 19:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 19:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 19:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 19:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 20:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 20:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 20:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 20:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 20:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 20:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 20:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028392
INFO - 2026-03-05 20:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [REQUEST][END]
INFO - 2026-03-05 20:00:02 --> [REQ_ID=9ffe7e1000bc] [PERF] Execution time=0.066334
INFO - 2026-03-05 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 20:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 20:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009265
INFO - 2026-03-05 20:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 20:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 20:00:03 --> LOG_HEALTHCHECK debug marker=63a23c4ab202
INFO - 2026-03-05 20:00:03 --> LOG_HEALTHCHECK info marker=63a23c4ab202
NOTICE - 2026-03-05 20:00:03 --> LOG_HEALTHCHECK probe marker=63a23c4ab202
INFO - 2026-03-05 20:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 20:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.183603
INFO - 2026-03-05 20:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 20:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 20:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 20:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 20:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 20:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.687473
INFO - 2026-03-05 20:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:01:20 --> [REQ_ID=3cd7b3602d87] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:06:20 --> [REQ_ID=8121c3ed6727] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:11:20 --> [REQ_ID=8c369b33dc4b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 20:11:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 20:11:33 --> [CSRF] token name=csrf_test_name hash=3bbd209aecdead75b7db15c739f3e60b
DEBUG - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [REQUEST][END]
INFO - 2026-03-05 20:11:33 --> [REQ_ID=39ad64b8b6f1] [PERF] Execution time=0.033734
DEBUG - 2026-03-05 20:11:41 --> [REQ_ID=a2f3af9485d5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 20:11:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 20:11:41 --> [REQ_ID=a2f3af9485d5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 20:11:41 --> [REQ_ID=a2f3af9485d5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 20:11:41 --> [REQ_ID=a2f3af9485d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 20:11:41 --> [CSRF] token name=csrf_test_name hash=20b32a6f072d3e23d0fa01ce84c65202
DEBUG - 2026-03-05 20:11:41 --> [REQ_ID=79fbcfbdddc5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 20:11:41 --> [REQ_ID=79fbcfbdddc5] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 20:11:42 --> [REQ_ID=a2f3af9485d5] [FILTER_AFTER]
DEBUG - 2026-03-05 20:11:42 --> [REQ_ID=a2f3af9485d5] [LIFECYCLE][END] status=200 duration_ms=102.52 memory_delta=0
INFO - 2026-03-05 20:11:42 --> [REQ_ID=79fbcfbdddc5] [PERF] Execution time=0.102218
DEBUG - 2026-03-05 20:11:42 --> [REQ_ID=a2f3af9485d5] [REQUEST][END]
INFO - 2026-03-05 20:11:42 --> [REQ_ID=a2f3af9485d5] [PERF] Execution time=0.114611
INFO - 2026-03-05 20:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 20:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 20:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-05 20:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 20:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.175155
INFO - 2026-03-05 20:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [REQUEST][END]
INFO - 2026-03-05 20:15:01 --> [REQ_ID=f702369cb997] [PERF] Execution time=0.075986
DEBUG - 2026-03-05 20:16:20 --> [REQ_ID=65be0af3b4f3] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:21:20 --> [REQ_ID=3c9b9a25c6a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:22:05 --> [REQ_ID=830bbe271724] [REQUEST][START] GET /index.php/Getting-Started
DEBUG - 2026-03-05 20:22:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 20:22:05 --> [REQ_ID=830bbe271724] [FILTER_BEFORE] /index.php/Getting-Started
DEBUG - 2026-03-05 20:22:05 --> [REQ_ID=830bbe271724] [ROUTE] Controller=\App\Controllers\Home Method=gettingStarted
DEBUG - 2026-03-05 20:22:05 --> [REQ_ID=830bbe271724] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Getting-Started
DEBUG - 2026-03-05 20:22:05 --> [CSRF] token name=csrf_test_name hash=d81b3bc7708affb9fdf1e1a8df1e339f
DEBUG - 2026-03-05 20:22:05 --> [REQ_ID=492220c7dd38] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 20:22:05 --> [REQ_ID=492220c7dd38] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 20:22:05 --> [REQ_ID=492220c7dd38] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 20:22:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 20:22:06 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
DEBUG - 2026-03-05 20:22:06 --> [REQ_ID=492220c7dd38] [VIEW_RENDER] themes/public/gettingStarted
INFO - 2026-03-05 20:22:06 --> [REQ_ID=492220c7dd38] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 20:22:06 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 20:22:06 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
DEBUG - 2026-03-05 20:22:06 --> [REQ_ID=830bbe271724] [FILTER_AFTER]
DEBUG - 2026-03-05 20:22:06 --> [REQ_ID=830bbe271724] [LIFECYCLE][END] status=200 duration_ms=737.88 memory_delta=4194304
INFO - 2026-03-05 20:22:06 --> [REQ_ID=492220c7dd38] [PERF] Execution time=0.735651
DEBUG - 2026-03-05 20:22:06 --> [REQ_ID=830bbe271724] [REQUEST][END]
INFO - 2026-03-05 20:22:06 --> [REQ_ID=830bbe271724] [PERF] Execution time=0.756318
DEBUG - 2026-03-05 20:26:20 --> [REQ_ID=a7a3b10295a1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 20:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 20:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 20:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 20:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 20:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.215764
INFO - 2026-03-05 20:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:31:20 --> [REQ_ID=fbaacfb5fcb8] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:36:20 --> [REQ_ID=6bda2517aa22] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:41:20 --> [REQ_ID=df136385f71a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 20:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 20:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 20:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 20:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 20:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 20:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049987
INFO - 2026-03-05 20:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 20:46:20 --> [REQ_ID=244285b04336] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:51:20 --> [REQ_ID=7703d55dbeca] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 20:52:37 --> [REQ_ID=04ba2f7f2849] [REQUEST][START] GET /
DEBUG - 2026-03-05 20:52:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 20:52:37 --> [REQ_ID=04ba2f7f2849] [FILTER_BEFORE] /
DEBUG - 2026-03-05 20:52:37 --> [REQ_ID=04ba2f7f2849] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 20:52:37 --> [REQ_ID=04ba2f7f2849] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 20:52:37 --> [CSRF] token name=csrf_test_name hash=b296681abad57a2c3dabb2b8f15e7c25
DEBUG - 2026-03-05 20:52:37 --> [REQ_ID=ce65dbdb7230] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 20:52:37 --> [REQ_ID=ce65dbdb7230] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 20:52:37 --> [REQ_ID=ce65dbdb7230] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 20:52:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 20:52:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 20:52:38 --> [REQ_ID=ce65dbdb7230] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 20:52:38 --> [REQ_ID=ce65dbdb7230] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 20:52:38 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 20:52:38 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 20:52:38 --> [REQ_ID=04ba2f7f2849] [FILTER_AFTER]
DEBUG - 2026-03-05 20:52:38 --> [REQ_ID=04ba2f7f2849] [LIFECYCLE][END] status=200 duration_ms=623.62 memory_delta=4194304
INFO - 2026-03-05 20:52:38 --> [REQ_ID=ce65dbdb7230] [PERF] Execution time=0.621257
DEBUG - 2026-03-05 20:52:38 --> [REQ_ID=04ba2f7f2849] [REQUEST][END]
INFO - 2026-03-05 20:52:38 --> [REQ_ID=04ba2f7f2849] [PERF] Execution time=0.641880
DEBUG - 2026-03-05 20:56:20 --> [REQ_ID=973a4cbe90ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 20:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 20:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 20:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 20:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 20:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 21:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 21:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 21:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 21:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [REQUEST][END]
INFO - 2026-03-05 21:00:01 --> [REQ_ID=6176079993cb] [PERF] Execution time=0.059408
INFO - 2026-03-05 21:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 21:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.227939
INFO - 2026-03-05 21:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [REQUEST][START] GET /
DEBUG - 2026-03-05 21:01:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [FILTER_BEFORE] /
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 21:01:10 --> [CSRF] token name=csrf_test_name hash=ed40fc3e0c2ed0dcaf6f8a1d93506fa2
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 21:01:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 21:01:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 21:01:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 21:01:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [FILTER_AFTER]
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [LIFECYCLE][END] status=200 duration_ms=619.23 memory_delta=4194304
INFO - 2026-03-05 21:01:10 --> [REQ_ID=6663c88f1001] [PERF] Execution time=0.617531
DEBUG - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [REQUEST][END]
INFO - 2026-03-05 21:01:10 --> [REQ_ID=c901f589bf2a] [PERF] Execution time=0.632728
DEBUG - 2026-03-05 21:01:20 --> [REQ_ID=04d003677bc7] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:06:20 --> [REQ_ID=d34c3855ccde] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 21:10:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [FILTER_BEFORE] /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=schedule
DEBUG - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 21:10:24 --> [CSRF] token name=csrf_test_name hash=a93c6526a40357b54f828abaa618b709
DEBUG - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [REQUEST][END]
INFO - 2026-03-05 21:10:24 --> [REQ_ID=317a16e0aee8] [PERF] Execution time=0.057269
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 21:10:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 21:10:28 --> [CSRF] token name=csrf_test_name hash=50102eb1433a0e748ef8451591b8ce24
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=ff0b52a0bd58] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 21:10:28 --> [REQ_ID=ff0b52a0bd58] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [FILTER_AFTER]
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [LIFECYCLE][END] status=200 duration_ms=56.71 memory_delta=0
INFO - 2026-03-05 21:10:28 --> [REQ_ID=ff0b52a0bd58] [PERF] Execution time=0.056452
DEBUG - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [REQUEST][END]
INFO - 2026-03-05 21:10:28 --> [REQ_ID=bc38e7669162] [PERF] Execution time=0.068805
DEBUG - 2026-03-05 21:11:20 --> [REQ_ID=4bc880658f06] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 21:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 21:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 21:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 21:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 21:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 21:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.142782
INFO - 2026-03-05 21:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [REQUEST][END]
INFO - 2026-03-05 21:15:01 --> [REQ_ID=85a7578652af] [PERF] Execution time=0.045909
DEBUG - 2026-03-05 21:16:00 --> [REQ_ID=b6eff1ca4516] [REQUEST][START] GET /
DEBUG - 2026-03-05 21:16:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:16:00 --> [REQ_ID=b6eff1ca4516] [FILTER_BEFORE] /
DEBUG - 2026-03-05 21:16:00 --> [REQ_ID=b6eff1ca4516] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 21:16:00 --> [REQ_ID=b6eff1ca4516] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 21:16:00 --> [CSRF] token name=csrf_test_name hash=9b4f47341e3860b28b8c7993783906f0
DEBUG - 2026-03-05 21:16:00 --> [REQ_ID=59d6fe05909e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 21:16:00 --> [REQ_ID=59d6fe05909e] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 21:16:00 --> [REQ_ID=59d6fe05909e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 21:16:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 21:16:01 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 21:16:01 --> [REQ_ID=59d6fe05909e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 21:16:01 --> [REQ_ID=59d6fe05909e] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 21:16:01 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 21:16:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 21:16:01 --> [REQ_ID=b6eff1ca4516] [FILTER_AFTER]
DEBUG - 2026-03-05 21:16:01 --> [REQ_ID=b6eff1ca4516] [LIFECYCLE][END] status=200 duration_ms=624.45 memory_delta=4194304
INFO - 2026-03-05 21:16:01 --> [REQ_ID=59d6fe05909e] [PERF] Execution time=0.622377
DEBUG - 2026-03-05 21:16:01 --> [REQ_ID=b6eff1ca4516] [REQUEST][END]
INFO - 2026-03-05 21:16:01 --> [REQ_ID=b6eff1ca4516] [PERF] Execution time=0.639258
DEBUG - 2026-03-05 21:16:19 --> [REQ_ID=450632ce6546] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:21:20 --> [REQ_ID=fd485841dc68] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:22:28 --> [REQ_ID=8304d72ebdb5] [REQUEST][START] GET /
DEBUG - 2026-03-05 21:22:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [FILTER_BEFORE] /
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 21:22:29 --> [CSRF] token name=csrf_test_name hash=cabacf20ebe4602c801bd6422f7932a6
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-05 21:22:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 21:22:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 21:22:29 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 21:22:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [FILTER_AFTER]
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [LIFECYCLE][END] status=200 duration_ms=719.72 memory_delta=4194304
INFO - 2026-03-05 21:22:29 --> [REQ_ID=aea7bf2f9378] [PERF] Execution time=0.717697
DEBUG - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [REQUEST][END]
INFO - 2026-03-05 21:22:29 --> [REQ_ID=8304d72ebdb5] [PERF] Execution time=0.738580
DEBUG - 2026-03-05 21:26:20 --> [REQ_ID=272cecbb9551] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 21:30:02 --> [spark:ops:work] Started
INFO - 2026-03-05 21:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 21:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 21:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 21:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 21:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052828
INFO - 2026-03-05 21:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 21:31:20 --> [REQ_ID=2d2b746da63e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:36:20 --> [REQ_ID=7ee37cd5eaf2] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:41:20 --> [REQ_ID=9567b4dec56f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 21:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 21:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 21:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 21:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 21:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 21:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.201724
INFO - 2026-03-05 21:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 21:46:20 --> [REQ_ID=faa95f753ac1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-03-05 21:46:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-03-05 21:46:21 --> [CSRF] token name=csrf_test_name hash=fa4169bd56be4d8ddc84b4294516e67f
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=a6cefe6afb0f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 21:46:21 --> [REQ_ID=a6cefe6afb0f] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 21:46:21 --> [ACTIVATION] Activation link hit
WARNING - 2026-03-05 21:46:21 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [FILTER_AFTER]
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [LIFECYCLE][END] status=302 duration_ms=38.73 memory_delta=0
INFO - 2026-03-05 21:46:21 --> [REQ_ID=a6cefe6afb0f] [PERF] Execution time=0.036346
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [REQUEST][END]
INFO - 2026-03-05 21:46:21 --> [REQ_ID=c59072277e2d] [PERF] Execution time=0.059400
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-03-05 21:46:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-03-05 21:46:21 --> [CSRF] token name=csrf_test_name hash=fe1fe5449f1efc9cf295f3e42d0d9f42
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [METHOD_ENTRY] index
DEBUG - 2026-03-05 21:46:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 21:46:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 21:46:21 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 21:46:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 21:46:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 21:46:21 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [MEMORY][commonData:start] 6291456
INFO - 2026-03-05 21:46:21 --> themesMemory usage: 6291456
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [FILTER_AFTER]
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [LIFECYCLE][END] status=200 duration_ms=74.74 memory_delta=2097152
INFO - 2026-03-05 21:46:21 --> [REQ_ID=2b973e966702] [PERF] Execution time=0.074262
DEBUG - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [REQUEST][END]
INFO - 2026-03-05 21:46:21 --> [REQ_ID=5fb3f63c2a67] [PERF] Execution time=0.087071
DEBUG - 2026-03-05 21:51:20 --> [REQ_ID=58f12673cc72] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 21:56:20 --> [REQ_ID=0c62f719905f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 21:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 21:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 21:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 21:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 21:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:00:01 --> [REQ_ID=8c2a0d4179ef] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:00:02 --> [REQ_ID=8c2a0d4179ef] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 22:00:02 --> [REQ_ID=8c2a0d4179ef] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 22:00:02 --> [REQ_ID=8c2a0d4179ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 22:00:02 --> [REQ_ID=8c2a0d4179ef] [REQUEST][END]
INFO - 2026-03-05 22:00:02 --> [REQ_ID=8c2a0d4179ef] [PERF] Execution time=0.096904
INFO - 2026-03-05 22:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 22:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-05 22:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 22:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 22:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 22:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 22:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.166546
INFO - 2026-03-05 22:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 22:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 22:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 22:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.010656
INFO - 2026-03-05 22:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 22:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 22:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 22:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 22:00:03 --> LOG_HEALTHCHECK debug marker=d32320cc32fe
INFO - 2026-03-05 22:00:03 --> LOG_HEALTHCHECK info marker=d32320cc32fe
NOTICE - 2026-03-05 22:00:03 --> LOG_HEALTHCHECK probe marker=d32320cc32fe
INFO - 2026-03-05 22:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 22:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024664
INFO - 2026-03-05 22:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 22:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 22:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 22:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 22:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 22:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 22:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.288106
INFO - 2026-03-05 22:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 22:01:19 --> [REQ_ID=c7f5dfa723a4] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 22:02:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 22:02:04 --> [CSRF] token name=csrf_test_name hash=1c26432e3ace7879dce168d45e0699ef
DEBUG - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [REQUEST][END]
INFO - 2026-03-05 22:02:04 --> [REQ_ID=ad5fe46934a0] [PERF] Execution time=0.028500
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 22:02:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 22:02:09 --> [CSRF] token name=csrf_test_name hash=f0956074dda9a29168763cb0efda06df
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=ba7aab11c7ac] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 22:02:09 --> [REQ_ID=ba7aab11c7ac] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [FILTER_AFTER]
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [LIFECYCLE][END] status=200 duration_ms=59.94 memory_delta=0
INFO - 2026-03-05 22:02:09 --> [REQ_ID=ba7aab11c7ac] [PERF] Execution time=0.059115
DEBUG - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [REQUEST][END]
INFO - 2026-03-05 22:02:09 --> [REQ_ID=c3e06c984c43] [PERF] Execution time=0.077970
DEBUG - 2026-03-05 22:06:20 --> [REQ_ID=768c24cf417d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:10:08 --> [REQ_ID=97e23ade932c] [REQUEST][START] GET /
DEBUG - 2026-03-05 22:10:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:10:08 --> [REQ_ID=97e23ade932c] [FILTER_BEFORE] /
DEBUG - 2026-03-05 22:10:08 --> [REQ_ID=97e23ade932c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 22:10:08 --> [REQ_ID=97e23ade932c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 22:10:08 --> [CSRF] token name=csrf_test_name hash=b388b092e7c72218864f1b03e6d5b9b7
DEBUG - 2026-03-05 22:10:08 --> [REQ_ID=42f8c2bfd6ba] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 22:10:08 --> [REQ_ID=42f8c2bfd6ba] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 22:10:08 --> [REQ_ID=42f8c2bfd6ba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 22:10:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 22:10:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 22:10:09 --> [REQ_ID=42f8c2bfd6ba] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 22:10:09 --> [REQ_ID=42f8c2bfd6ba] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 22:10:09 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 22:10:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 22:10:09 --> [REQ_ID=97e23ade932c] [FILTER_AFTER]
DEBUG - 2026-03-05 22:10:09 --> [REQ_ID=97e23ade932c] [LIFECYCLE][END] status=200 duration_ms=744.17 memory_delta=4194304
INFO - 2026-03-05 22:10:09 --> [REQ_ID=42f8c2bfd6ba] [PERF] Execution time=0.742526
DEBUG - 2026-03-05 22:10:09 --> [REQ_ID=97e23ade932c] [REQUEST][END]
INFO - 2026-03-05 22:10:09 --> [REQ_ID=97e23ade932c] [PERF] Execution time=0.784968
DEBUG - 2026-03-05 22:11:20 --> [REQ_ID=718f15759ada] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 22:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 22:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 22:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:15:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 22:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 22:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028848
INFO - 2026-03-05 22:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [REQUEST][END]
INFO - 2026-03-05 22:15:02 --> [REQ_ID=242f5001c0bf] [PERF] Execution time=0.062727
DEBUG - 2026-03-05 22:16:20 --> [REQ_ID=04f971b372af] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:21:20 --> [REQ_ID=60c875e84859] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:26:20 --> [REQ_ID=4e7ad73da677] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:27:08 --> [REQ_ID=88cdc19f9af8] [REQUEST][START] GET /
DEBUG - 2026-03-05 22:27:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:27:08 --> [REQ_ID=88cdc19f9af8] [FILTER_BEFORE] /
DEBUG - 2026-03-05 22:27:08 --> [REQ_ID=88cdc19f9af8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 22:27:08 --> [REQ_ID=88cdc19f9af8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 22:27:08 --> [CSRF] token name=csrf_test_name hash=3f04169992021c44fbefd74921a2f471
DEBUG - 2026-03-05 22:27:08 --> [REQ_ID=769ec7ba1d23] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 22:27:08 --> [REQ_ID=769ec7ba1d23] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 22:27:08 --> [REQ_ID=769ec7ba1d23] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 22:27:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 22:27:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 22:27:09 --> [REQ_ID=769ec7ba1d23] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 22:27:09 --> [REQ_ID=769ec7ba1d23] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 22:27:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 22:27:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 22:27:09 --> [REQ_ID=88cdc19f9af8] [FILTER_AFTER]
DEBUG - 2026-03-05 22:27:09 --> [REQ_ID=88cdc19f9af8] [LIFECYCLE][END] status=200 duration_ms=808.26 memory_delta=4194304
INFO - 2026-03-05 22:27:09 --> [REQ_ID=769ec7ba1d23] [PERF] Execution time=0.806247
DEBUG - 2026-03-05 22:27:09 --> [REQ_ID=88cdc19f9af8] [REQUEST][END]
INFO - 2026-03-05 22:27:09 --> [REQ_ID=88cdc19f9af8] [PERF] Execution time=0.829570
INFO - 2026-03-05 22:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 22:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 22:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 22:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 22:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.156116
INFO - 2026-03-05 22:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 22:31:20 --> [REQ_ID=1de58b2fe108] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:36:20 --> [REQ_ID=e4e302f2c92c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 22:36:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 22:36:21 --> [CSRF] token name=csrf_test_name hash=1b25b9f2b1b8ca45a80dd3d77139f963
DEBUG - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [REQUEST][END]
INFO - 2026-03-05 22:36:21 --> [REQ_ID=18d53e03ee11] [PERF] Execution time=0.029378
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 22:36:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 22:36:28 --> [CSRF] token name=csrf_test_name hash=e17b91a39010b0bdbfeac1efb1edb67b
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=323b9a9af0fb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 22:36:28 --> [REQ_ID=323b9a9af0fb] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [FILTER_AFTER]
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [LIFECYCLE][END] status=200 duration_ms=45.34 memory_delta=0
INFO - 2026-03-05 22:36:28 --> [REQ_ID=323b9a9af0fb] [PERF] Execution time=0.045093
DEBUG - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [REQUEST][END]
INFO - 2026-03-05 22:36:28 --> [REQ_ID=da7435a24978] [PERF] Execution time=0.057547
DEBUG - 2026-03-05 22:41:20 --> [REQ_ID=0a388920d329] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 22:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 22:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 22:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 22:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 22:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 22:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.019123
INFO - 2026-03-05 22:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 22:46:20 --> [REQ_ID=508f117d4761] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:47:33 --> [REQ_ID=2c98489b2f9a] [REQUEST][START] GET /
DEBUG - 2026-03-05 22:47:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 22:47:33 --> [REQ_ID=2c98489b2f9a] [FILTER_BEFORE] /
DEBUG - 2026-03-05 22:47:33 --> [REQ_ID=2c98489b2f9a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 22:47:33 --> [REQ_ID=2c98489b2f9a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 22:47:33 --> [CSRF] token name=csrf_test_name hash=2012cd9c74ec468a624af7ef804c23d7
DEBUG - 2026-03-05 22:47:33 --> [REQ_ID=050a8fedc2ff] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 22:47:33 --> [REQ_ID=050a8fedc2ff] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 22:47:34 --> [REQ_ID=050a8fedc2ff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 22:47:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 22:47:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 22:47:34 --> [REQ_ID=050a8fedc2ff] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 22:47:34 --> [REQ_ID=050a8fedc2ff] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 22:47:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 22:47:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 22:47:34 --> [REQ_ID=2c98489b2f9a] [FILTER_AFTER]
DEBUG - 2026-03-05 22:47:34 --> [REQ_ID=2c98489b2f9a] [LIFECYCLE][END] status=200 duration_ms=656.44 memory_delta=4194304
INFO - 2026-03-05 22:47:34 --> [REQ_ID=050a8fedc2ff] [PERF] Execution time=0.654452
DEBUG - 2026-03-05 22:47:34 --> [REQ_ID=2c98489b2f9a] [REQUEST][END]
INFO - 2026-03-05 22:47:34 --> [REQ_ID=2c98489b2f9a] [PERF] Execution time=0.674599
DEBUG - 2026-03-05 22:51:20 --> [REQ_ID=28907d89a4a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 22:56:20 --> [REQ_ID=9e0acde26f29] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 22:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 22:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 22:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 22:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 22:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 23:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 23:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 23:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 23:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 23:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 23:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.029285
INFO - 2026-03-05 23:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [REQUEST][END]
INFO - 2026-03-05 23:00:02 --> [REQ_ID=0a8dc8867831] [PERF] Execution time=0.054327
DEBUG - 2026-03-05 23:01:19 --> [REQ_ID=34b5df4b0023] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:01:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:01:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:03:09 --> [REQ_ID=4cd39b4da387] [REQUEST][START] GET /
DEBUG - 2026-03-05 23:03:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:03:09 --> [REQ_ID=4cd39b4da387] [FILTER_BEFORE] /
DEBUG - 2026-03-05 23:03:09 --> [REQ_ID=4cd39b4da387] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 23:03:09 --> [REQ_ID=4cd39b4da387] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 23:03:09 --> [CSRF] token name=csrf_test_name hash=fc7642961e56f2d71f175f38f382e093
DEBUG - 2026-03-05 23:03:09 --> [REQ_ID=243aeb1c5043] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 23:03:09 --> [REQ_ID=243aeb1c5043] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 23:03:09 --> [REQ_ID=243aeb1c5043] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 23:03:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 23:03:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 23:03:10 --> [REQ_ID=243aeb1c5043] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 23:03:10 --> [REQ_ID=243aeb1c5043] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 23:03:10 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 23:03:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 23:03:10 --> [REQ_ID=4cd39b4da387] [FILTER_AFTER]
DEBUG - 2026-03-05 23:03:10 --> [REQ_ID=4cd39b4da387] [LIFECYCLE][END] status=200 duration_ms=967.64 memory_delta=4194304
INFO - 2026-03-05 23:03:10 --> [REQ_ID=243aeb1c5043] [PERF] Execution time=0.965127
DEBUG - 2026-03-05 23:03:10 --> [REQ_ID=4cd39b4da387] [REQUEST][END]
INFO - 2026-03-05 23:03:10 --> [REQ_ID=4cd39b4da387] [PERF] Execution time=1.006404
DEBUG - 2026-03-05 23:06:20 --> [REQ_ID=7d907d5a990d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 23:08:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 23:08:52 --> [CSRF] token name=csrf_test_name hash=a344d475041a82539ad4375f35d6e9f9
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=a40ab4eb4c67] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 23:08:52 --> [REQ_ID=a40ab4eb4c67] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [FILTER_AFTER]
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [LIFECYCLE][END] status=200 duration_ms=146.08 memory_delta=0
INFO - 2026-03-05 23:08:52 --> [REQ_ID=a40ab4eb4c67] [PERF] Execution time=0.144071
DEBUG - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [REQUEST][END]
INFO - 2026-03-05 23:08:52 --> [REQ_ID=7a5689ef43f7] [PERF] Execution time=0.186429
DEBUG - 2026-03-05 23:11:20 --> [REQ_ID=251e079ab217] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 23:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 23:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 23:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 23:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-03-05 23:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 23:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108776
INFO - 2026-03-05 23:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [REQUEST][END]
INFO - 2026-03-05 23:15:02 --> [REQ_ID=4cbac2b6de79] [PERF] Execution time=0.049786
DEBUG - 2026-03-05 23:16:19 --> [REQ_ID=51128afc68c1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:16:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:16:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:16:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:16:19 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:16:19 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:16:31 --> [REQ_ID=96f5ceb1670c] [REQUEST][START] GET /
DEBUG - 2026-03-05 23:16:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:16:31 --> [REQ_ID=96f5ceb1670c] [FILTER_BEFORE] /
DEBUG - 2026-03-05 23:16:31 --> [REQ_ID=96f5ceb1670c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 23:16:31 --> [REQ_ID=96f5ceb1670c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 23:16:31 --> [CSRF] token name=csrf_test_name hash=5c06f7600dc1a5ec16b21508cbaba118
DEBUG - 2026-03-05 23:16:31 --> [REQ_ID=b690cde3497a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 23:16:31 --> [REQ_ID=b690cde3497a] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 23:16:31 --> [REQ_ID=b690cde3497a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 23:16:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 23:16:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 23:16:32 --> [REQ_ID=b690cde3497a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 23:16:32 --> [REQ_ID=b690cde3497a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 23:16:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 23:16:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 23:16:32 --> [REQ_ID=96f5ceb1670c] [FILTER_AFTER]
DEBUG - 2026-03-05 23:16:32 --> [REQ_ID=96f5ceb1670c] [LIFECYCLE][END] status=200 duration_ms=729.86 memory_delta=4194304
INFO - 2026-03-05 23:16:32 --> [REQ_ID=b690cde3497a] [PERF] Execution time=0.728431
DEBUG - 2026-03-05 23:16:32 --> [REQ_ID=96f5ceb1670c] [REQUEST][END]
INFO - 2026-03-05 23:16:32 --> [REQ_ID=96f5ceb1670c] [PERF] Execution time=0.743379
DEBUG - 2026-03-05 23:21:19 --> [REQ_ID=ac7751086b13] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:21:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:26:20 --> [REQ_ID=897fcd309189] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 23:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 23:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 23:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 23:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 23:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 23:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051085
INFO - 2026-03-05 23:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 23:31:20 --> [REQ_ID=712acbb8d11b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-05 23:32:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-05 23:32:22 --> [CSRF] token name=csrf_test_name hash=285df175a78dc421fdb52c0e779e606f
DEBUG - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [REQUEST][END]
INFO - 2026-03-05 23:32:22 --> [REQ_ID=18c8092a6544] [PERF] Execution time=0.048487
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 23:32:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 23:32:29 --> [CSRF] token name=csrf_test_name hash=df57ff690c7d85b17a373c68f16deda5
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=df154d0c1566] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 23:32:29 --> [REQ_ID=df154d0c1566] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [FILTER_AFTER]
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [LIFECYCLE][END] status=200 duration_ms=128.79 memory_delta=0
INFO - 2026-03-05 23:32:29 --> [REQ_ID=df154d0c1566] [PERF] Execution time=0.128550
DEBUG - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [REQUEST][END]
INFO - 2026-03-05 23:32:29 --> [REQ_ID=4dc45c258fe8] [PERF] Execution time=0.144363
DEBUG - 2026-03-05 23:36:20 --> [REQ_ID=7d583a7bdcfe] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:41:20 --> [REQ_ID=5c9b5b95dcad] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 23:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 23:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 23:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 23:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 23:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 23:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.018166
INFO - 2026-03-05 23:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 23:46:19 --> [REQ_ID=0baf397a8bbb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:51:20 --> [REQ_ID=ac7eb111303e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 23:56:19 --> [REQ_ID=2ec846482deb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 23:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 23:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 23:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 23:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 23:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
