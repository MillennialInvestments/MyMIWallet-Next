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
<<<<<<< Updated upstream
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
||||||| constructed merge base
=======
DEBUG - 2026-03-05 04:56:20 --> [REQ_ID=4981d562ce0d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 04:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 04:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 04:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 04:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 04:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 05:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 05:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 05:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 05:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 05:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 05:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027158
INFO - 2026-03-05 05:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [REQUEST][END]
INFO - 2026-03-05 05:00:01 --> [REQ_ID=f2a34afb62ad] [PERF] Execution time=0.050863
DEBUG - 2026-03-05 05:01:20 --> [REQ_ID=44c4b5b84eb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:03:00 --> [REQ_ID=c70a931297fa] [REQUEST][START] POST /
DEBUG - 2026-03-05 05:03:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:03:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:03:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:03:01 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:03:01 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-05 05:06:20 --> [REQ_ID=4a4f7a52029d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=23f74ced3947] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-05 05:09:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=23f74ced3947] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=23f74ced3947] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=23f74ced3947] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-03-05 05:09:13 --> [CSRF] token name=csrf_test_name hash=8cab2277b4c8e7ae89e80e486c32784d
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=ecef3bc0e26f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 05:09:13 --> [REQ_ID=ecef3bc0e26f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 05:09:13 --> [REQ_ID=ecef3bc0e26f] [METHOD_ENTRY] show
DEBUG - 2026-03-05 05:09:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 05:09:13 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 05:09:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 05:09:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 05:09:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 05:09:13 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 05:09:13 --> [REQ_ID=ecef3bc0e26f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 05:09:14 --> [REQ_ID=ecef3bc0e26f] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-03-05 05:09:14 --> [REQ_ID=ecef3bc0e26f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 05:09:14 --> themesMemory usage: 14680064
DEBUG - 2026-03-05 05:09:14 --> [REQ_ID=23f74ced3947] [FILTER_AFTER]
DEBUG - 2026-03-05 05:09:14 --> [REQ_ID=23f74ced3947] [LIFECYCLE][END] status=200 duration_ms=1,117.47 memory_delta=8388608
INFO - 2026-03-05 05:09:14 --> [REQ_ID=ecef3bc0e26f] [PERF] Execution time=1.114842
DEBUG - 2026-03-05 05:09:14 --> [REQ_ID=23f74ced3947] [REQUEST][END]
INFO - 2026-03-05 05:09:14 --> [REQ_ID=23f74ced3947] [PERF] Execution time=1.159637
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [REQUEST][START] GET /
DEBUG - 2026-03-05 05:10:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [FILTER_BEFORE] /
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 05:10:25 --> [CSRF] token name=csrf_test_name hash=341c3c60be674790ee06f2b68e07826b
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [MEMORY][controller-start] 8388608
INFO - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [MEMORY][commonData:start] 8388608
DEBUG - 2026-03-05 05:10:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 05:10:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 05:10:25 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 05:10:25 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [FILTER_AFTER]
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [LIFECYCLE][END] status=200 duration_ms=526.80 memory_delta=0
INFO - 2026-03-05 05:10:25 --> [REQ_ID=215be4564fbe] [PERF] Execution time=0.526270
DEBUG - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [REQUEST][END]
INFO - 2026-03-05 05:10:25 --> [REQ_ID=18fd1251dcd3] [PERF] Execution time=0.537561
DEBUG - 2026-03-05 05:11:20 --> [REQ_ID=38171e3c3a61] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:14:27 --> [REQ_ID=1fb4bdc90fe8] [REQUEST][START] GET /index.php/Memberships/Customize
DEBUG - 2026-03-05 05:14:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:14:27 --> [REQ_ID=1fb4bdc90fe8] [FILTER_BEFORE] /index.php/Memberships/Customize
DEBUG - 2026-03-05 05:14:27 --> [REQ_ID=1fb4bdc90fe8] [ROUTE] Controller=\App\Controllers\Home Method=memberships
DEBUG - 2026-03-05 05:14:27 --> [REQ_ID=1fb4bdc90fe8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Memberships/Customize
DEBUG - 2026-03-05 05:14:27 --> [CSRF] token name=csrf_test_name hash=44d35b28a14b4398a40c5cd4130a967c
DEBUG - 2026-03-05 05:14:27 --> [REQ_ID=8d4c05f098ae] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 05:14:27 --> [REQ_ID=8d4c05f098ae] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 05:14:27 --> [REQ_ID=8d4c05f098ae] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 05:14:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 05:14:28 --> [MetaService] slug=memberships/customize pageName= cacheHit= path=DB
DEBUG - 2026-03-05 05:14:28 --> [REQ_ID=8d4c05f098ae] [VIEW_RENDER] themes/public/memberships
INFO - 2026-03-05 05:14:28 --> [REQ_ID=8d4c05f098ae] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 05:14:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 05:14:28 --> [MetaService] slug=memberships/customize pageName=Memberships cacheHit= path=DB
DEBUG - 2026-03-05 05:14:28 --> [REQ_ID=1fb4bdc90fe8] [FILTER_AFTER]
DEBUG - 2026-03-05 05:14:28 --> [REQ_ID=1fb4bdc90fe8] [LIFECYCLE][END] status=200 duration_ms=626.03 memory_delta=4194304
INFO - 2026-03-05 05:14:28 --> [REQ_ID=8d4c05f098ae] [PERF] Execution time=0.623211
DEBUG - 2026-03-05 05:14:28 --> [REQ_ID=1fb4bdc90fe8] [REQUEST][END]
INFO - 2026-03-05 05:14:28 --> [REQ_ID=1fb4bdc90fe8] [PERF] Execution time=0.666132
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-05 05:14:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-05 05:14:55 --> [CSRF] token name=csrf_test_name hash=de4c1da968c04f5e08e21c80b3e95339
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [METHOD_ENTRY] index
DEBUG - 2026-03-05 05:14:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 05:14:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 05:14:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 05:14:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 05:14:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 05:14:55 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [MEMORY][commonData:start] 6291456
INFO - 2026-03-05 05:14:55 --> themesMemory usage: 6291456
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [FILTER_AFTER]
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [LIFECYCLE][END] status=200 duration_ms=62.09 memory_delta=0
INFO - 2026-03-05 05:14:55 --> [REQ_ID=2216d509d62b] [PERF] Execution time=0.061458
DEBUG - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [REQUEST][END]
INFO - 2026-03-05 05:14:55 --> [REQ_ID=1b0fa70bafa1] [PERF] Execution time=0.075013
DEBUG - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [REQUEST][END]
INFO - 2026-03-05 05:15:01 --> [REQ_ID=12a33c8f7742] [PERF] Execution time=0.052765
INFO - 2026-03-05 05:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 05:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 05:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 05:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 05:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 05:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.224095
INFO - 2026-03-05 05:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 05:16:20 --> [REQ_ID=92c7ee3c2327] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:16:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:16:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:16:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:21:20 --> [REQ_ID=3bce9c29159b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:26:20 --> [REQ_ID=0286db1100eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 05:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 05:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 05:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 05:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 05:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.143403
INFO - 2026-03-05 05:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 05:31:20 --> [REQ_ID=9e9400b6197f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:36:20 --> [REQ_ID=18e54bf24991] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:36:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:36:25 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:36:25 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:41:20 --> [REQ_ID=e48311a6a29c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 05:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 05:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 05:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 05:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 05:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 05:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.091721
INFO - 2026-03-05 05:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 05:46:20 --> [REQ_ID=f7e09cdbca6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 05:49:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 05:49:48 --> [CSRF] token name=csrf_test_name hash=9927262af35c501b03cdc5b3cb5717ce
DEBUG - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [REQUEST][END]
INFO - 2026-03-05 05:49:48 --> [REQ_ID=9063889b4a75] [PERF] Execution time=0.055448
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 05:49:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 05:49:51 --> [CSRF] token name=csrf_test_name hash=57207046bc15f83b0278f9ffa04e3c4a
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=9ce04610dcb7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 05:49:51 --> [REQ_ID=9ce04610dcb7] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [FILTER_AFTER]
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [LIFECYCLE][END] status=200 duration_ms=58.92 memory_delta=0
INFO - 2026-03-05 05:49:51 --> [REQ_ID=9ce04610dcb7] [PERF] Execution time=0.048112
DEBUG - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [REQUEST][END]
INFO - 2026-03-05 05:49:51 --> [REQ_ID=8d4b7d7f1583] [PERF] Execution time=0.071459
DEBUG - 2026-03-05 05:51:20 --> [REQ_ID=47169ff1c8fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 05:56:20 --> [REQ_ID=a0a2256d1bfa] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 05:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 05:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 05:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 05:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 05:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 06:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 06:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 06:00:02 --> [SPARK_START] App\Commands\Ops\Work
DEBUG - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [REQUEST][END]
INFO - 2026-03-05 06:00:02 --> [REQ_ID=668a4c97c9f1] [PERF] Execution time=0.050630
INFO - 2026-03-05 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 06:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 06:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.161104
INFO - 2026-03-05 06:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 06:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 06:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.002930
INFO - 2026-03-05 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 06:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 06:00:03 --> LOG_HEALTHCHECK debug marker=2c3f543e9336
INFO - 2026-03-05 06:00:03 --> LOG_HEALTHCHECK info marker=2c3f543e9336
NOTICE - 2026-03-05 06:00:03 --> LOG_HEALTHCHECK probe marker=2c3f543e9336
INFO - 2026-03-05 06:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 06:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028938
INFO - 2026-03-05 06:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 06:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 06:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 06:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 06:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.498085
INFO - 2026-03-05 06:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 06:00:14 --> [REQ_ID=69ed7e7ff0ef] [REQUEST][START] GET /
DEBUG - 2026-03-05 06:00:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 06:00:14 --> [REQ_ID=69ed7e7ff0ef] [FILTER_BEFORE] /
DEBUG - 2026-03-05 06:00:14 --> [REQ_ID=69ed7e7ff0ef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 06:00:14 --> [REQ_ID=69ed7e7ff0ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 06:00:14 --> [CSRF] token name=csrf_test_name hash=9483fece96688e65f522e85d915c1ed5
DEBUG - 2026-03-05 06:00:14 --> [REQ_ID=ff1b98136989] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 06:00:14 --> [REQ_ID=ff1b98136989] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 06:00:15 --> [REQ_ID=ff1b98136989] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 06:00:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 06:00:15 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 06:00:15 --> [REQ_ID=ff1b98136989] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 06:00:15 --> [REQ_ID=ff1b98136989] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 06:00:15 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 06:00:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 06:00:15 --> [REQ_ID=69ed7e7ff0ef] [FILTER_AFTER]
DEBUG - 2026-03-05 06:00:15 --> [REQ_ID=69ed7e7ff0ef] [LIFECYCLE][END] status=200 duration_ms=554.28 memory_delta=4194304
INFO - 2026-03-05 06:00:15 --> [REQ_ID=ff1b98136989] [PERF] Execution time=0.553747
DEBUG - 2026-03-05 06:00:15 --> [REQ_ID=69ed7e7ff0ef] [REQUEST][END]
INFO - 2026-03-05 06:00:15 --> [REQ_ID=69ed7e7ff0ef] [PERF] Execution time=0.569255
DEBUG - 2026-03-05 06:01:20 --> [REQ_ID=416d7ad3bbec] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:06:20 --> [REQ_ID=0724064f9409] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:11:20 --> [REQ_ID=a34eccfccf16] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 06:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 06:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 06:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [REQUEST][END]
INFO - 2026-03-05 06:15:01 --> [REQ_ID=6f842ad26e4b] [PERF] Execution time=0.050043
INFO - 2026-03-05 06:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 06:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.152646
INFO - 2026-03-05 06:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 06:16:20 --> [REQ_ID=0fb8e43b6501] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:21:20 --> [REQ_ID=fe22c6b650bb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:26:20 --> [REQ_ID=dd8ea31188fc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 06:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.154784
INFO - 2026-03-05 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 06:31:20 --> [REQ_ID=7d7f97951037] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:31:21 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:31:21 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:31:21 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:36:20 --> [REQ_ID=3a20ddadccf1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:41:20 --> [REQ_ID=dd1e9a8080b6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 06:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 06:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 06:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.091860
INFO - 2026-03-05 06:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 06:46:20 --> [REQ_ID=b4fbe8d0c35d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:51:20 --> [REQ_ID=3728a8e9374c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 06:55:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 06:55:40 --> [CSRF] token name=csrf_test_name hash=74e932e55a4df4d0b756167ff5b1f6b5
DEBUG - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [REQUEST][END]
INFO - 2026-03-05 06:55:40 --> [REQ_ID=0839b40f83c2] [PERF] Execution time=0.058943
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 06:55:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 06:55:44 --> [CSRF] token name=csrf_test_name hash=abb44620d8b40bf82f08a69b107290e3
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=4cd713cf2bfa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 06:55:44 --> [REQ_ID=4cd713cf2bfa] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [FILTER_AFTER]
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [LIFECYCLE][END] status=200 duration_ms=259.11 memory_delta=0
INFO - 2026-03-05 06:55:44 --> [REQ_ID=4cd713cf2bfa] [PERF] Execution time=0.258794
DEBUG - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [REQUEST][END]
INFO - 2026-03-05 06:55:44 --> [REQ_ID=c46ffd6aafdb] [PERF] Execution time=0.272975
DEBUG - 2026-03-05 06:56:20 --> [REQ_ID=b593dfdd2273] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 06:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 06:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 06:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 06:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 06:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 07:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 07:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [REQUEST][END]
INFO - 2026-03-05 07:00:01 --> [REQ_ID=688473f70c24] [PERF] Execution time=0.035591
INFO - 2026-03-05 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.188984
INFO - 2026-03-05 07:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 07:01:20 --> [REQ_ID=389990fc9344] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [REQUEST][START] GET /index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-05 07:02:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [FILTER_BEFORE] /index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=technicalSupport
DEBUG - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Technical-Support
DEBUG - 2026-03-05 07:02:57 --> [CSRF] token name=csrf_test_name hash=a73e62ef4902533428c61714d77edd2d
DEBUG - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [REQUEST][END]
INFO - 2026-03-05 07:02:57 --> [REQ_ID=682c80920c35] [PERF] Execution time=0.053314
DEBUG - 2026-03-05 07:06:20 --> [REQ_ID=51abe010696a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:11:20 --> [REQ_ID=e7085e883a7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 07:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 07:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 07:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 07:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 07:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 07:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.046695
INFO - 2026-03-05 07:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [REQUEST][END]
INFO - 2026-03-05 07:15:01 --> [REQ_ID=9ea8e9e09269] [PERF] Execution time=0.044189
DEBUG - 2026-03-05 07:16:20 --> [REQ_ID=14002aba0543] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:21:20 --> [REQ_ID=476bdff9f080] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:24:12 --> [REQ_ID=6aadb1742224] [REQUEST][START] GET /
DEBUG - 2026-03-05 07:24:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:24:12 --> [REQ_ID=6aadb1742224] [FILTER_BEFORE] /
DEBUG - 2026-03-05 07:24:12 --> [REQ_ID=6aadb1742224] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 07:24:12 --> [REQ_ID=6aadb1742224] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 07:24:12 --> [CSRF] token name=csrf_test_name hash=b74c13a79dc718213461eac3ab98a3f7
DEBUG - 2026-03-05 07:24:12 --> [REQ_ID=f00ba7b4e08b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 07:24:12 --> [REQ_ID=f00ba7b4e08b] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 07:24:12 --> [REQ_ID=f00ba7b4e08b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 07:24:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 07:24:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 07:24:13 --> [REQ_ID=f00ba7b4e08b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 07:24:13 --> [REQ_ID=f00ba7b4e08b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 07:24:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 07:24:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 07:24:13 --> [REQ_ID=6aadb1742224] [FILTER_AFTER]
DEBUG - 2026-03-05 07:24:13 --> [REQ_ID=6aadb1742224] [LIFECYCLE][END] status=200 duration_ms=746.27 memory_delta=4194304
INFO - 2026-03-05 07:24:13 --> [REQ_ID=f00ba7b4e08b] [PERF] Execution time=0.743840
DEBUG - 2026-03-05 07:24:13 --> [REQ_ID=6aadb1742224] [REQUEST][END]
INFO - 2026-03-05 07:24:13 --> [REQ_ID=6aadb1742224] [PERF] Execution time=0.784669
DEBUG - 2026-03-05 07:26:20 --> [REQ_ID=7272787afab9] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 07:30:02 --> [spark:ops:work] Started
INFO - 2026-03-05 07:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 07:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 07:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 07:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 07:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.266398
INFO - 2026-03-05 07:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 07:31:20 --> [REQ_ID=eb07c545f2df] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:36:20 --> [REQ_ID=e781c206d1a5] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:41:20 --> [REQ_ID=77909a29ba2a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 07:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 07:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 07:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 07:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 07:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 07:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.203119
INFO - 2026-03-05 07:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 07:46:20 --> [REQ_ID=94da82d858af] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:51:20 --> [REQ_ID=4dd700f1ce6b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [REQUEST][START] GET /
DEBUG - 2026-03-05 07:54:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [FILTER_BEFORE] /
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 07:54:33 --> [CSRF] token name=csrf_test_name hash=c1d9bac12868f6dae7e50a613e653360
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 07:54:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 07:54:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 07:54:33 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 07:54:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [FILTER_AFTER]
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [LIFECYCLE][END] status=200 duration_ms=648.36 memory_delta=4194304
INFO - 2026-03-05 07:54:33 --> [REQ_ID=7c48af8fd78e] [PERF] Execution time=0.646403
DEBUG - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [REQUEST][END]
INFO - 2026-03-05 07:54:33 --> [REQ_ID=7e4a2c50b698] [PERF] Execution time=0.686891
DEBUG - 2026-03-05 07:54:34 --> [REQ_ID=10a6d35c63f9] [REQUEST][START] POST /
DEBUG - 2026-03-05 07:54:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:54:34 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:54:34 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:54:34 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:54:34 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-05 07:54:34 --> [REQ_ID=9dd5531cb4b4] [REQUEST][START] POST /
DEBUG - 2026-03-05 07:54:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:54:34 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:54:34 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:54:34 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:54:34 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-05 07:54:34 --> [REQ_ID=62435f761d2b] [REQUEST][START] POST /
DEBUG - 2026-03-05 07:54:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:54:34 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: POST, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:54:34 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:54:34 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:54:34 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-03-05 07:56:20 --> [REQ_ID=bc4583c0df00] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 07:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 07:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 07:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 07:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 07:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-05 07:58:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-05 07:58:53 --> [CSRF] token name=csrf_test_name hash=3e042519d99d4f13c794374b0c80f350
DEBUG - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [REQUEST][END]
INFO - 2026-03-05 07:58:53 --> [REQ_ID=51da2d858cc2] [PERF] Execution time=0.054788
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 07:58:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 07:58:56 --> [CSRF] token name=csrf_test_name hash=0d273a482a043d98c470065250530bce
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=d1829df30097] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 07:58:56 --> [REQ_ID=d1829df30097] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [FILTER_AFTER]
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [LIFECYCLE][END] status=200 duration_ms=226.81 memory_delta=0
INFO - 2026-03-05 07:58:56 --> [REQ_ID=d1829df30097] [PERF] Execution time=0.226444
DEBUG - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [REQUEST][END]
INFO - 2026-03-05 07:58:56 --> [REQ_ID=4c906a2f950d] [PERF] Execution time=0.240539
INFO - 2026-03-05 08:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 08:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 08:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [REQUEST][END]
INFO - 2026-03-05 08:00:02 --> [REQ_ID=cc14c33d9062] [PERF] Execution time=0.048409
INFO - 2026-03-05 08:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 08:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.162955
INFO - 2026-03-05 08:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 08:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 08:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006080
INFO - 2026-03-05 08:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 08:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 08:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 08:00:03 --> LOG_HEALTHCHECK debug marker=f0f40b198bc9
INFO - 2026-03-05 08:00:03 --> LOG_HEALTHCHECK info marker=f0f40b198bc9
NOTICE - 2026-03-05 08:00:03 --> LOG_HEALTHCHECK probe marker=f0f40b198bc9
INFO - 2026-03-05 08:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 08:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026922
INFO - 2026-03-05 08:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 08:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 08:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 08:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.379180
INFO - 2026-03-05 08:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 08:01:20 --> [REQ_ID=596ed4f7cefc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:06:20 --> [REQ_ID=a91eb6324e1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:11:20 --> [REQ_ID=1d3915ea86aa] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 08:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [REQUEST][END]
INFO - 2026-03-05 08:15:01 --> [REQ_ID=416af91dd2be] [PERF] Execution time=0.057815
INFO - 2026-03-05 08:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 08:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.391270
INFO - 2026-03-05 08:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 08:16:20 --> [REQ_ID=b57e6f32aa29] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:21:20 --> [REQ_ID=3a9276a0292d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:26:20 --> [REQ_ID=bb8c2c80ac63] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 08:30:02 --> [spark:ops:work] Started
INFO - 2026-03-05 08:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 08:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:30:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 08:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 08:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.224055
INFO - 2026-03-05 08:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 08:31:20 --> [REQ_ID=99834aa0685e] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:36:20 --> [REQ_ID=9c7f30549c3f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [REQUEST][START] GET /
DEBUG - 2026-03-05 08:38:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [FILTER_BEFORE] /
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 08:38:54 --> [CSRF] token name=csrf_test_name hash=3159e6be173cae8dd6828b2e08fa00c0
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 08:38:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 08:38:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 08:38:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 08:38:54 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [FILTER_AFTER]
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [LIFECYCLE][END] status=200 duration_ms=660.41 memory_delta=4194304
INFO - 2026-03-05 08:38:54 --> [REQ_ID=0365bb3fdc61] [PERF] Execution time=0.658095
DEBUG - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [REQUEST][END]
INFO - 2026-03-05 08:38:54 --> [REQ_ID=07bf4a504a6c] [PERF] Execution time=0.699040
DEBUG - 2026-03-05 08:41:20 --> [REQ_ID=5e5738a77508] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=93ed10c1ef87] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-03-05 08:42:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=93ed10c1ef87] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=93ed10c1ef87] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=93ed10c1ef87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-03-05 08:42:24 --> [CSRF] token name=csrf_test_name hash=6648b0976f27084409eabfbd0effb9e5
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=7139a6abfc9b] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-03-05 08:42:24 --> [REQ_ID=7139a6abfc9b] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 08:42:24 --> [REQ_ID=7139a6abfc9b] [METHOD_ENTRY] index
DEBUG - 2026-03-05 08:42:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 08:42:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 08:42:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 08:42:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 08:42:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 08:42:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 08:42:24 --> [REQ_ID=7139a6abfc9b] [MEMORY][commonData:start] 6291456
INFO - 2026-03-05 08:42:24 --> [REQ_ID=7139a6abfc9b] [PERF] Execution time=0.082691
INFO - 2026-03-05 08:45:02 --> [spark:ops:work] Started
INFO - 2026-03-05 08:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 08:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 08:45:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 08:45:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 08:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108561
INFO - 2026-03-05 08:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [REQUEST][START] GET /
DEBUG - 2026-03-05 08:45:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [FILTER_BEFORE] /
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 08:45:47 --> [CSRF] token name=csrf_test_name hash=43b829fb313263c9306bdb684181c30b
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 08:45:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 08:45:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 08:45:47 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 08:45:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [FILTER_AFTER]
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [LIFECYCLE][END] status=200 duration_ms=610.41 memory_delta=4194304
INFO - 2026-03-05 08:45:47 --> [REQ_ID=e4002b932262] [PERF] Execution time=0.608298
DEBUG - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [REQUEST][END]
INFO - 2026-03-05 08:45:47 --> [REQ_ID=12427e4f2a29] [PERF] Execution time=0.648643
DEBUG - 2026-03-05 08:46:20 --> [REQ_ID=24846a0914d5] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:51:20 --> [REQ_ID=f7cc474f710c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 08:53:33 --> [REQ_ID=95974567da13] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-05 08:53:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:53:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Advisors]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:53:33 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:53:33 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Advisors
WARNING - 2026-03-05 08:53:33 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Advisors | referrer: none
ERROR - 2026-03-05 08:53:33 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 08:56:20 --> [REQ_ID=4803818d52ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 08:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 08:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 08:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 08:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 08:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 09:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 09:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 09:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 09:00:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 09:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 09:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.026800
INFO - 2026-03-05 09:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [REQUEST][END]
INFO - 2026-03-05 09:00:01 --> [REQ_ID=ef331a1838f8] [PERF] Execution time=0.049191
DEBUG - 2026-03-05 09:01:20 --> [REQ_ID=21fbee99057c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:06:20 --> [REQ_ID=d58d9220edeb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 09:08:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 09:08:45 --> [CSRF] token name=csrf_test_name hash=67fbdc9d8cdeeadb0ff787a932479301
DEBUG - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [REQUEST][END]
INFO - 2026-03-05 09:08:45 --> [REQ_ID=ad59fb518e7c] [PERF] Execution time=0.058081
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 09:09:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 09:09:15 --> [CSRF] token name=csrf_test_name hash=1daa4389811dd59f491f487ed7a81be2
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=ae73014d2dc4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 09:09:15 --> [REQ_ID=ae73014d2dc4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [FILTER_AFTER]
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [LIFECYCLE][END] status=200 duration_ms=205.01 memory_delta=0
INFO - 2026-03-05 09:09:15 --> [REQ_ID=ae73014d2dc4] [PERF] Execution time=0.204924
DEBUG - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [REQUEST][END]
INFO - 2026-03-05 09:09:15 --> [REQ_ID=60ce37b4afa3] [PERF] Execution time=0.218032
DEBUG - 2026-03-05 09:09:32 --> [REQ_ID=0b4a7da53830] [REQUEST][START] GET /
DEBUG - 2026-03-05 09:09:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:09:32 --> [REQ_ID=0b4a7da53830] [FILTER_BEFORE] /
DEBUG - 2026-03-05 09:09:32 --> [REQ_ID=0b4a7da53830] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 09:09:32 --> [REQ_ID=0b4a7da53830] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 09:09:32 --> [CSRF] token name=csrf_test_name hash=59c4ef202d5b3dff16c7ce8f369b8053
DEBUG - 2026-03-05 09:09:32 --> [REQ_ID=20bf1d0be26a] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 09:09:32 --> [REQ_ID=20bf1d0be26a] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 09:09:32 --> [REQ_ID=20bf1d0be26a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 09:09:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 09:09:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 09:09:33 --> [REQ_ID=20bf1d0be26a] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 09:09:33 --> [REQ_ID=20bf1d0be26a] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 09:09:33 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 09:09:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 09:09:33 --> [REQ_ID=0b4a7da53830] [FILTER_AFTER]
DEBUG - 2026-03-05 09:09:33 --> [REQ_ID=0b4a7da53830] [LIFECYCLE][END] status=200 duration_ms=586.38 memory_delta=4194304
INFO - 2026-03-05 09:09:33 --> [REQ_ID=20bf1d0be26a] [PERF] Execution time=0.586101
DEBUG - 2026-03-05 09:09:33 --> [REQ_ID=0b4a7da53830] [REQUEST][END]
INFO - 2026-03-05 09:09:33 --> [REQ_ID=0b4a7da53830] [PERF] Execution time=0.596596
DEBUG - 2026-03-05 09:11:20 --> [REQ_ID=000ad8d72ed1] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 09:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 09:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 09:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 09:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 09:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 09:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023799
INFO - 2026-03-05 09:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [REQUEST][END]
INFO - 2026-03-05 09:15:01 --> [REQ_ID=bf239cf04e6c] [PERF] Execution time=0.057111
DEBUG - 2026-03-05 09:16:20 --> [REQ_ID=905d4b53af54] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:21:20 --> [REQ_ID=876e909dbd3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:26:20 --> [REQ_ID=e762e0f34359] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 09:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 09:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 09:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 09:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 09:30:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 09:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.303578
INFO - 2026-03-05 09:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 09:31:20 --> [REQ_ID=f7dd2ca3ea47] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:36:20 --> [REQ_ID=85d3064ff8e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:41:20 --> [REQ_ID=7ed17e13e5e5] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 09:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 09:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 09:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 09:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 09:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 09:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.109511
INFO - 2026-03-05 09:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 09:46:20 --> [REQ_ID=fac7ca0ae04d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [REQUEST][START] GET /
DEBUG - 2026-03-05 09:46:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [FILTER_BEFORE] /
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 09:46:42 --> [CSRF] token name=csrf_test_name hash=a8ca44a954d6c434776ccd2ad04fa5c3
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 09:46:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 09:46:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 09:46:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 09:46:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [FILTER_AFTER]
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [LIFECYCLE][END] status=200 duration_ms=575.15 memory_delta=4194304
INFO - 2026-03-05 09:46:42 --> [REQ_ID=4bde82aa38bd] [PERF] Execution time=0.573109
DEBUG - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [REQUEST][END]
INFO - 2026-03-05 09:46:42 --> [REQ_ID=fb200cda84ad] [PERF] Execution time=0.593670
DEBUG - 2026-03-05 09:51:20 --> [REQ_ID=f00d81feedca] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 09:56:20 --> [REQ_ID=8128d1dca38a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 09:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 09:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 09:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 09:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 09:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 10:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:00:01 --> [spark:aiops:run] Intent
INFO - 2026-03-05 10:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 10:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 10:00:01 --> [REQ_ID=e3517e1a6236] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-03-05 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 10:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051417
INFO - 2026-03-05 10:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 10:00:02 --> [REQ_ID=e3517e1a6236] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 10:00:02 --> [REQ_ID=e3517e1a6236] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 10:00:02 --> [REQ_ID=e3517e1a6236] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 10:00:02 --> [REQ_ID=e3517e1a6236] [REQUEST][END]
INFO - 2026-03-05 10:00:02 --> [REQ_ID=e3517e1a6236] [PERF] Execution time=0.087752
INFO - 2026-03-05 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 10:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 10:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.006956
INFO - 2026-03-05 10:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 10:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 10:00:03 --> LOG_HEALTHCHECK debug marker=bfb35ef6a828
INFO - 2026-03-05 10:00:03 --> LOG_HEALTHCHECK info marker=bfb35ef6a828
NOTICE - 2026-03-05 10:00:03 --> LOG_HEALTHCHECK probe marker=bfb35ef6a828
INFO - 2026-03-05 10:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 10:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024222
INFO - 2026-03-05 10:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 10:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 10:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 10:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 10:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 10:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.505803
INFO - 2026-03-05 10:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:01:20 --> [REQ_ID=ce76c046ffc5] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:06:20 --> [REQ_ID=466ac8d390c0] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:11:20 --> [REQ_ID=7581dd239f54] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 10:15:02 --> [spark:ops:work] Started
INFO - 2026-03-05 10:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 10:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 10:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [REQUEST][END]
INFO - 2026-03-05 10:15:02 --> [REQ_ID=613b07af9cdc] [PERF] Execution time=0.057436
INFO - 2026-03-05 10:15:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 10:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.157009
INFO - 2026-03-05 10:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:15:08 --> [REQ_ID=9f7ee75b547f] [REQUEST][START] GET /
DEBUG - 2026-03-05 10:15:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 10:15:08 --> [REQ_ID=9f7ee75b547f] [FILTER_BEFORE] /
DEBUG - 2026-03-05 10:15:08 --> [REQ_ID=9f7ee75b547f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 10:15:08 --> [REQ_ID=9f7ee75b547f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 10:15:08 --> [CSRF] token name=csrf_test_name hash=230620bdf2a4da32468e45b477cb8409
DEBUG - 2026-03-05 10:15:08 --> [REQ_ID=b2d8507c6da3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 10:15:08 --> [REQ_ID=b2d8507c6da3] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 10:15:08 --> [REQ_ID=b2d8507c6da3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 10:15:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 10:15:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 10:15:09 --> [REQ_ID=b2d8507c6da3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 10:15:09 --> [REQ_ID=b2d8507c6da3] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 10:15:09 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 10:15:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 10:15:09 --> [REQ_ID=9f7ee75b547f] [FILTER_AFTER]
DEBUG - 2026-03-05 10:15:09 --> [REQ_ID=9f7ee75b547f] [LIFECYCLE][END] status=200 duration_ms=613.79 memory_delta=4194304
INFO - 2026-03-05 10:15:09 --> [REQ_ID=b2d8507c6da3] [PERF] Execution time=0.611086
DEBUG - 2026-03-05 10:15:09 --> [REQ_ID=9f7ee75b547f] [REQUEST][END]
INFO - 2026-03-05 10:15:09 --> [REQ_ID=9f7ee75b547f] [PERF] Execution time=0.632871
DEBUG - 2026-03-05 10:16:20 --> [REQ_ID=3b02378c9f0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:21:20 --> [REQ_ID=34f6783e20e4] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:26:20 --> [REQ_ID=5c3c9057fa2c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 10:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 10:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 10:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 10:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 10:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.048304
INFO - 2026-03-05 10:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:31:20 --> [REQ_ID=fbab1bab8952] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:36:20 --> [REQ_ID=b5f4ef68ffbc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:41:20 --> [REQ_ID=a2ca98d71acc] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 10:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 10:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 10:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 10:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 10:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 10:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.048450
INFO - 2026-03-05 10:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 10:46:20 --> [REQ_ID=fe7eafd98c53] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:51:20 --> [REQ_ID=8083d845b83d] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:51:44 --> [REQ_ID=f465a9fe0052] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-03-05 10:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:51:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Institute]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:51:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:51:44 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Institute
WARNING - 2026-03-05 10:51:44 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Institute | referrer: none
ERROR - 2026-03-05 10:51:44 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 10:56:20 --> [REQ_ID=9781d0b403b4] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 10:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 10:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 10:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 10:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 10:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 10:57:53 --> [REQ_ID=ea38d4d31f5d] [REQUEST][START] GET /
DEBUG - 2026-03-05 10:57:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 10:57:53 --> [REQ_ID=ea38d4d31f5d] [FILTER_BEFORE] /
DEBUG - 2026-03-05 10:57:53 --> [REQ_ID=ea38d4d31f5d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 10:57:53 --> [REQ_ID=ea38d4d31f5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 10:57:53 --> [CSRF] token name=csrf_test_name hash=81ae2c0a911dfba29e77699b00241d40
DEBUG - 2026-03-05 10:57:53 --> [REQ_ID=c5970950e09b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 10:57:53 --> [REQ_ID=c5970950e09b] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 10:57:54 --> [REQ_ID=c5970950e09b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 10:57:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 10:57:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 10:57:54 --> [REQ_ID=c5970950e09b] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 10:57:54 --> [REQ_ID=c5970950e09b] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 10:57:54 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 10:57:54 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 10:57:54 --> [REQ_ID=ea38d4d31f5d] [FILTER_AFTER]
DEBUG - 2026-03-05 10:57:54 --> [REQ_ID=ea38d4d31f5d] [LIFECYCLE][END] status=200 duration_ms=644.28 memory_delta=4194304
INFO - 2026-03-05 10:57:54 --> [REQ_ID=c5970950e09b] [PERF] Execution time=0.642319
DEBUG - 2026-03-05 10:57:54 --> [REQ_ID=ea38d4d31f5d] [REQUEST][END]
INFO - 2026-03-05 10:57:54 --> [REQ_ID=ea38d4d31f5d] [PERF] Execution time=0.682792
INFO - 2026-03-05 11:00:01 --> [spark:ops:work] Started
INFO - 2026-03-05 11:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 11:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 11:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 11:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 11:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.101306
INFO - 2026-03-05 11:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [REQUEST][END]
INFO - 2026-03-05 11:00:02 --> [REQ_ID=c2bc46165042] [PERF] Execution time=0.058285
DEBUG - 2026-03-05 11:01:20 --> [REQ_ID=24b2d418bed3] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:05:14 --> [REQ_ID=ebb5b601d2af] [REQUEST][START] GET /
DEBUG - 2026-03-05 11:05:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:14 --> [REQ_ID=ebb5b601d2af] [FILTER_BEFORE] /
DEBUG - 2026-03-05 11:05:14 --> [REQ_ID=ebb5b601d2af] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 11:05:14 --> [REQ_ID=ebb5b601d2af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 11:05:14 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
DEBUG - 2026-03-05 11:05:14 --> [REQ_ID=d16d681f1d83] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:05:14 --> [REQ_ID=d16d681f1d83] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 11:05:15 --> [REQ_ID=d16d681f1d83] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:05:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:05:15 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:05:15 --> [REQ_ID=d16d681f1d83] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 11:05:15 --> [REQ_ID=d16d681f1d83] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 11:05:15 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 11:05:15 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:05:15 --> [REQ_ID=ebb5b601d2af] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:15 --> [REQ_ID=ebb5b601d2af] [LIFECYCLE][END] status=200 duration_ms=955.11 memory_delta=4194304
INFO - 2026-03-05 11:05:15 --> [REQ_ID=d16d681f1d83] [PERF] Execution time=0.952853
DEBUG - 2026-03-05 11:05:15 --> [REQ_ID=ebb5b601d2af] [REQUEST][END]
INFO - 2026-03-05 11:05:15 --> [REQ_ID=ebb5b601d2af] [PERF] Execution time=0.994356
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=7054394d5007] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 11:05:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=7054394d5007] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=7054394d5007] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=7054394d5007] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 11:05:17 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [METHOD_ENTRY] show
DEBUG - 2026-03-05 11:05:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:05:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 11:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 11:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 11:05:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 11:05:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-03-05 11:05:17 --> [REQ_ID=5bd00188a629] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 11:05:18 --> themesMemory usage: 12582912
DEBUG - 2026-03-05 11:05:18 --> [REQ_ID=7054394d5007] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:18 --> [REQ_ID=7054394d5007] [LIFECYCLE][END] status=200 duration_ms=1,000.67 memory_delta=6291456
INFO - 2026-03-05 11:05:18 --> [REQ_ID=5bd00188a629] [PERF] Execution time=1.000430
DEBUG - 2026-03-05 11:05:18 --> [REQ_ID=7054394d5007] [REQUEST][END]
INFO - 2026-03-05 11:05:18 --> [REQ_ID=7054394d5007] [PERF] Execution time=1.014403
DEBUG - 2026-03-05 11:05:20 --> [REQ_ID=5edab44383ea] [REQUEST][START] POST /index.php/register
DEBUG - 2026-03-05 11:05:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:20 --> [REQ_ID=5edab44383ea] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-03-05 11:05:20 --> [REQ_ID=5edab44383ea] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-03-05 11:05:20 --> [REQ_ID=5edab44383ea] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-03-05 11:05:20 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
INFO - 2026-03-05 11:05:20 --> CSRF token verified.
DEBUG - 2026-03-05 11:05:20 --> [REQ_ID=8cd8f2a6edb1] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-05 11:05:20 --> [REQ_ID=8cd8f2a6edb1] [MEMORY][controller-start] 8388608
INFO - 2026-03-05 11:05:20 --> [REGISTRATION] Submission received
INFO - 2026-03-05 11:05:20 --> MailService queued email
INFO - 2026-03-05 11:05:20 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-03-05 11:05:20 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-03-05 11:05:20 --> Registration created user_id=11699, email=davidkahn1933@salpingomyu.ru, username=Glenndox, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-03-05 11:05:20 --> [REGISTRATION] User record created
INFO - 2026-03-05 11:05:20 --> OnboardingProgressService: created onboarding record for user_id=11699
INFO - 2026-03-05 11:05:21 --> Registration succeeded for davidkahn1933@salpingomyu.ru (event ef18c8d9613e022e)
INFO - 2026-03-05 11:05:21 --> [REGISTRATION] Activation email queued
INFO - 2026-03-05 11:05:21 --> Registration redirecting to success guide for user_id=11699
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=5edab44383ea] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=5edab44383ea] [LIFECYCLE][END] status=302 duration_ms=1,070.99 memory_delta=0
INFO - 2026-03-05 11:05:21 --> [REQ_ID=8cd8f2a6edb1] [PERF] Execution time=1.070554
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=5edab44383ea] [REQUEST][END]
INFO - 2026-03-05 11:05:21 --> [REQ_ID=5edab44383ea] [PERF] Execution time=1.083206
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=0b1d8a3f466b] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-03-05 11:05:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=0b1d8a3f466b] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=0b1d8a3f466b] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=0b1d8a3f466b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-03-05 11:05:21 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
DEBUG - 2026-03-05 11:05:21 --> [REQ_ID=7cca2b58269f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 11:05:21 --> [REQ_ID=7cca2b58269f] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 11:05:21 --> AuthController::registerSuccess view rendered.
INFO - 2026-03-05 11:05:21 --> [REQ_ID=7cca2b58269f] [PERF] Execution time=0.012566
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 11:05:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 11:05:22 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=511236f9b1bc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 11:05:22 --> [REQ_ID=511236f9b1bc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [LIFECYCLE][END] status=200 duration_ms=17.02 memory_delta=0
INFO - 2026-03-05 11:05:22 --> [REQ_ID=511236f9b1bc] [PERF] Execution time=0.016909
DEBUG - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [REQUEST][END]
INFO - 2026-03-05 11:05:22 --> [REQ_ID=8bbf636a523b] [PERF] Execution time=0.026382
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-05 11:05:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 11:05:23 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
INFO - 2026-03-05 11:05:23 --> CSRF token verified.
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ea96e46e8933] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-05 11:05:23 --> [REQ_ID=ea96e46e8933] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 11:05:23 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-05 11:05:23 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-05 11:05:23 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 64.31.20.25, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0
DEBUG - 2026-03-05 11:05:23 --> Auth attemptLogin() called with login identifier: Glenndox, remember: false
DEBUG - 2026-03-05 11:05:23 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-05 11:05:23 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-03-05 11:05:23 --> [AUTH_FAILURE] 
DEBUG - 2026-03-05 11:05:23 --> Auth attempt failed for identifier Glenndox. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Glenndox">Resend activation message one more time.</a>
WARNING - 2026-03-05 11:05:23 --> [AUTH] Login failure
WARNING - 2026-03-05 11:05:23 --> [AUTH] Login failed
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [LIFECYCLE][END] status=302 duration_ms=104.46 memory_delta=0
INFO - 2026-03-05 11:05:23 --> [REQ_ID=ea96e46e8933] [PERF] Execution time=0.104142
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [REQUEST][END]
INFO - 2026-03-05 11:05:23 --> [REQ_ID=ed4d55d0fc43] [PERF] Execution time=0.113981
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 11:05:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 11:05:23 --> [CSRF] token name=csrf_test_name hash=d4be0b5ac5fe2fbc04568f83e620b712
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=2541b06c7dad] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 11:05:23 --> [REQ_ID=2541b06c7dad] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [FILTER_AFTER]
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [LIFECYCLE][END] status=200 duration_ms=18.88 memory_delta=0
INFO - 2026-03-05 11:05:23 --> [REQ_ID=2541b06c7dad] [PERF] Execution time=0.018896
DEBUG - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [REQUEST][END]
INFO - 2026-03-05 11:05:23 --> [REQ_ID=beee73d22bb0] [PERF] Execution time=0.029022
DEBUG - 2026-03-05 11:06:20 --> [REQ_ID=bad82f0fc4f2] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:11:20 --> [REQ_ID=0e1ce353172f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 11:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 11:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 11:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 11:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-03-05 11:15:01 --> [REQ_ID=0ca9aefbffe5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-05 11:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 11:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.123409
INFO - 2026-03-05 11:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 11:15:02 --> [REQ_ID=0ca9aefbffe5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 11:15:02 --> [REQ_ID=0ca9aefbffe5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 11:15:02 --> [REQ_ID=0ca9aefbffe5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 11:15:02 --> [REQ_ID=0ca9aefbffe5] [REQUEST][END]
INFO - 2026-03-05 11:15:02 --> [REQ_ID=0ca9aefbffe5] [PERF] Execution time=0.081039
DEBUG - 2026-03-05 11:16:20 --> [REQ_ID=a2a97699c13a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:21:20 --> [REQ_ID=fc28f5481d39] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:26:20 --> [REQ_ID=ca12b3f1ef9c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 11:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 11:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 11:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 11:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 11:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.115386
INFO - 2026-03-05 11:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 11:30:11 --> [REQ_ID=24f683e79090] [REQUEST][START] GET /
DEBUG - 2026-03-05 11:30:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:30:11 --> [REQ_ID=24f683e79090] [FILTER_BEFORE] /
DEBUG - 2026-03-05 11:30:11 --> [REQ_ID=24f683e79090] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 11:30:11 --> [REQ_ID=24f683e79090] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 11:30:11 --> [CSRF] token name=csrf_test_name hash=1ca2e743f49a57ffedcbe888dbd083c5
DEBUG - 2026-03-05 11:30:11 --> [REQ_ID=ab2e83dfd188] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:30:11 --> [REQ_ID=ab2e83dfd188] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 11:30:11 --> [REQ_ID=ab2e83dfd188] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:30:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:30:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 11:30:12 --> [REQ_ID=ab2e83dfd188] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 11:30:12 --> [REQ_ID=ab2e83dfd188] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 11:30:12 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 11:30:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:30:12 --> [REQ_ID=24f683e79090] [FILTER_AFTER]
DEBUG - 2026-03-05 11:30:12 --> [REQ_ID=24f683e79090] [LIFECYCLE][END] status=200 duration_ms=635.02 memory_delta=4194304
INFO - 2026-03-05 11:30:12 --> [REQ_ID=ab2e83dfd188] [PERF] Execution time=0.632425
DEBUG - 2026-03-05 11:30:12 --> [REQ_ID=24f683e79090] [REQUEST][END]
INFO - 2026-03-05 11:30:12 --> [REQ_ID=24f683e79090] [PERF] Execution time=0.674200
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [REQUEST][START] GET /
DEBUG - 2026-03-05 11:30:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [FILTER_BEFORE] /
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 11:30:48 --> [CSRF] token name=csrf_test_name hash=456a9eb544647f4c2585d7ae48121246
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:30:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:30:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 11:30:48 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 11:30:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [FILTER_AFTER]
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [LIFECYCLE][END] status=200 duration_ms=535.23 memory_delta=2097152
INFO - 2026-03-05 11:30:48 --> [REQ_ID=cabaed746e47] [PERF] Execution time=0.534925
DEBUG - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [REQUEST][END]
INFO - 2026-03-05 11:30:48 --> [REQ_ID=76c598a9e572] [PERF] Execution time=0.544636
DEBUG - 2026-03-05 11:31:20 --> [REQ_ID=187d59f2935f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:36:20 --> [REQ_ID=1454b234412f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:41:20 --> [REQ_ID=2cfbddd2534c] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 11:45:01 --> [spark:ops:work] Started
INFO - 2026-03-05 11:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 11:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 11:45:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 11:45:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 11:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.180425
INFO - 2026-03-05 11:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=208855036016] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-05 11:45:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=208855036016] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=208855036016] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=208855036016] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-05 11:45:10 --> [CSRF] token name=csrf_test_name hash=ef4d630c383c4b37b1a786bf2ccbbada
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=2065d9515abe] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 11:45:10 --> [REQ_ID=2065d9515abe] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 11:45:10 --> [REQ_ID=2065d9515abe] [METHOD_ENTRY] show
DEBUG - 2026-03-05 11:45:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:45:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 11:45:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 11:45:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 11:45:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 11:45:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 11:45:10 --> [REQ_ID=2065d9515abe] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:45:11 --> [REQ_ID=2065d9515abe] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-03-05 11:45:11 --> [REQ_ID=2065d9515abe] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 11:45:11 --> themesMemory usage: 14680064
DEBUG - 2026-03-05 11:45:11 --> [REQ_ID=208855036016] [FILTER_AFTER]
DEBUG - 2026-03-05 11:45:11 --> [REQ_ID=208855036016] [LIFECYCLE][END] status=200 duration_ms=1,299.23 memory_delta=8388608
INFO - 2026-03-05 11:45:11 --> [REQ_ID=2065d9515abe] [PERF] Execution time=1.296348
DEBUG - 2026-03-05 11:45:11 --> [REQ_ID=208855036016] [REQUEST][END]
INFO - 2026-03-05 11:45:11 --> [REQ_ID=208855036016] [PERF] Execution time=1.354458
DEBUG - 2026-03-05 11:46:20 --> [REQ_ID=29ddb939f263] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:46:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:46:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:46:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:46:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:46:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:47:22 --> [REQ_ID=6b231aab89bd] [REQUEST][START] GET /index.php
DEBUG - 2026-03-05 11:47:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:47:22 --> [REQ_ID=6b231aab89bd] [FILTER_BEFORE] /index.php
DEBUG - 2026-03-05 11:47:22 --> [REQ_ID=6b231aab89bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 11:47:22 --> [REQ_ID=6b231aab89bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 11:47:22 --> [CSRF] token name=csrf_test_name hash=e54f581c79bea0e437823e3817a0bf7a
DEBUG - 2026-03-05 11:47:22 --> [REQ_ID=f64d47636b93] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:47:22 --> [REQ_ID=f64d47636b93] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 11:47:23 --> [REQ_ID=f64d47636b93] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:47:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:47:23 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 11:47:23 --> [REQ_ID=f64d47636b93] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 11:47:23 --> [REQ_ID=f64d47636b93] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 11:47:23 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 11:47:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:47:23 --> [REQ_ID=6b231aab89bd] [FILTER_AFTER]
DEBUG - 2026-03-05 11:47:23 --> [REQ_ID=6b231aab89bd] [LIFECYCLE][END] status=200 duration_ms=495.14 memory_delta=4194304
INFO - 2026-03-05 11:47:23 --> [REQ_ID=f64d47636b93] [PERF] Execution time=0.494647
DEBUG - 2026-03-05 11:47:23 --> [REQ_ID=6b231aab89bd] [REQUEST][END]
INFO - 2026-03-05 11:47:23 --> [REQ_ID=6b231aab89bd] [PERF] Execution time=0.507106
DEBUG - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-05 11:47:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-05 11:47:35 --> [CSRF] token name=csrf_test_name hash=c30030c8be18a8095181a7fcb55b71e4
DEBUG - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [REQUEST][END]
INFO - 2026-03-05 11:47:35 --> [REQ_ID=76b8792c8c17] [PERF] Execution time=0.013953
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-05 11:47:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-05 11:47:48 --> [CSRF] token name=csrf_test_name hash=cc37cd358a3a2900f0861779d5f0a9e0
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [METHOD_ENTRY] index
DEBUG - 2026-03-05 11:47:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:47:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 11:47:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 11:47:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 11:47:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 11:47:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [MEMORY][commonData:start] 4194304
INFO - 2026-03-05 11:47:48 --> themesMemory usage: 4194304
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [FILTER_AFTER]
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [LIFECYCLE][END] status=200 duration_ms=145.86 memory_delta=0
INFO - 2026-03-05 11:47:48 --> [REQ_ID=274750b3127d] [PERF] Execution time=0.145101
DEBUG - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [REQUEST][END]
INFO - 2026-03-05 11:47:48 --> [REQ_ID=219fc13f40d9] [PERF] Execution time=0.155969
DEBUG - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [REQUEST][START] GET /index.php/Profile
DEBUG - 2026-03-05 11:48:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [FILTER_BEFORE] /index.php/Profile
DEBUG - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile
DEBUG - 2026-03-05 11:48:01 --> [CSRF] token name=csrf_test_name hash=2397c9985025e638e3f73ea8abd1ee4f
DEBUG - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [REQUEST][END]
INFO - 2026-03-05 11:48:01 --> [REQ_ID=f3ad9f8c2cab] [PERF] Execution time=0.010485
DEBUG - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-03-05 11:48:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-03-05 11:48:13 --> [CSRF] token name=csrf_test_name hash=5790263a1b806eae953950090ab00dfe
DEBUG - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [REQUEST][END]
INFO - 2026-03-05 11:48:13 --> [REQ_ID=a52a84d71166] [PERF] Execution time=0.011828
DEBUG - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-05 11:48:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-05 11:48:25 --> [CSRF] token name=csrf_test_name hash=ab1ab09ba030016aca11e4923edbbfeb
DEBUG - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [REQUEST][END]
INFO - 2026-03-05 11:48:25 --> [REQ_ID=b475e522a64b] [PERF] Execution time=0.012664
DEBUG - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-05 11:48:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-05 11:48:38 --> [CSRF] token name=csrf_test_name hash=c847d1b17868ebd4e103edbdfba679c8
DEBUG - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [REQUEST][END]
INFO - 2026-03-05 11:48:38 --> [REQ_ID=cc1805f420bf] [PERF] Execution time=0.014687
DEBUG - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-03-05 11:48:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-03-05 11:48:50 --> [CSRF] token name=csrf_test_name hash=09f4bd70de44312cd37ecb549b9a7611
DEBUG - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [REQUEST][END]
INFO - 2026-03-05 11:48:50 --> [REQ_ID=71e8bf87d771] [PERF] Execution time=0.015188
DEBUG - 2026-03-05 11:49:02 --> [REQ_ID=e5bf72223371] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-05 11:49:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:49:02 --> [REQ_ID=e5bf72223371] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-05 11:49:02 --> [REQ_ID=e5bf72223371] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-05 11:49:02 --> [REQ_ID=e5bf72223371] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-05 11:49:02 --> [CSRF] token name=csrf_test_name hash=684df19936b4d5a1cef784592ca1fab2
DEBUG - 2026-03-05 11:49:02 --> [REQ_ID=bc6bb3297a1b] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:49:02 --> [REQ_ID=bc6bb3297a1b] [MEMORY][controller-start] 4194304
INFO - 2026-03-05 11:49:02 --> [REQ_ID=bc6bb3297a1b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-05 11:49:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:49:03 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-05 11:49:03 --> [REQ_ID=bc6bb3297a1b] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-05 11:49:03 --> [REQ_ID=bc6bb3297a1b] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 11:49:03 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 11:49:03 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-05 11:49:03 --> [REQ_ID=e5bf72223371] [FILTER_AFTER]
DEBUG - 2026-03-05 11:49:03 --> [REQ_ID=e5bf72223371] [LIFECYCLE][END] status=200 duration_ms=503.82 memory_delta=4194304
INFO - 2026-03-05 11:49:03 --> [REQ_ID=bc6bb3297a1b] [PERF] Execution time=0.503378
DEBUG - 2026-03-05 11:49:03 --> [REQ_ID=e5bf72223371] [REQUEST][END]
INFO - 2026-03-05 11:49:03 --> [REQ_ID=e5bf72223371] [PERF] Execution time=0.514898
DEBUG - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-03-05 11:49:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-03-05 11:49:15 --> [CSRF] token name=csrf_test_name hash=a837cfaf0cf7ee4a19d91fba611633c0
DEBUG - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [REQUEST][END]
INFO - 2026-03-05 11:49:15 --> [REQ_ID=678e91a7989b] [PERF] Execution time=0.010690
DEBUG - 2026-03-05 11:49:28 --> [REQ_ID=c76c7d204580] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-03-05 11:49:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:49:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:49:28 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:49:28 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API
WARNING - 2026-03-05 11:49:28 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API | referrer: none
ERROR - 2026-03-05 11:49:28 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-05 11:49:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-05 11:49:40 --> [CSRF] token name=csrf_test_name hash=82311c1afc2bc765bc28643bcae7f86b
DEBUG - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [REQUEST][END]
INFO - 2026-03-05 11:49:40 --> [REQ_ID=dcbcb956d6de] [PERF] Execution time=0.015045
DEBUG - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-03-05 11:49:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-03-05 11:49:52 --> [CSRF] token name=csrf_test_name hash=a25b5d2385e59828016a528debd816c7
DEBUG - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [REQUEST][END]
INFO - 2026-03-05 11:49:52 --> [REQ_ID=441a3b2513bd] [PERF] Execution time=0.010593
DEBUG - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-05 11:50:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-05 11:50:05 --> [CSRF] token name=csrf_test_name hash=d7467a4da154277b5e8307362282ad8d
DEBUG - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [REQUEST][END]
INFO - 2026-03-05 11:50:05 --> [REQ_ID=52f46aaf5793] [PERF] Execution time=0.010296
DEBUG - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-05 11:50:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-05 11:50:17 --> [CSRF] token name=csrf_test_name hash=35d602f7ee11ce16fc6ac1c72c45854e
DEBUG - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [REQUEST][END]
INFO - 2026-03-05 11:50:17 --> [REQ_ID=64d5958ee869] [PERF] Execution time=0.010443
DEBUG - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-05 11:50:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-03-05 11:50:29 --> [CSRF] token name=csrf_test_name hash=8b967885c7404408b54fd2905600d84d
DEBUG - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [REQUEST][END]
INFO - 2026-03-05 11:50:29 --> [REQ_ID=ab19cd346d7b] [PERF] Execution time=0.016409
DEBUG - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-03-05 11:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-03-05 11:50:42 --> [CSRF] token name=csrf_test_name hash=ef498f6a01f557b7424be0cfc00cc79a
DEBUG - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [REQUEST][END]
INFO - 2026-03-05 11:50:42 --> [REQ_ID=aa647f515b8b] [PERF] Execution time=0.011787
DEBUG - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-03-05 11:50:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [FILTER_BEFORE] /index.php/Management/Security
DEBUG - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [ROUTE] Controller=\App\Modules\Management\Controllers\SecurityController Method=index
DEBUG - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Security
DEBUG - 2026-03-05 11:50:54 --> [CSRF] token name=csrf_test_name hash=7954c048c71f9ac63f80f2db3403fdcd
DEBUG - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [REQUEST][END]
INFO - 2026-03-05 11:50:54 --> [REQ_ID=334df4ff12ec] [PERF] Execution time=0.012693
DEBUG - 2026-03-05 11:51:06 --> [REQ_ID=731bf853d0fa] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-03-05 11:51:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:51:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:51:07 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:51:07 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-03-05 11:51:07 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
ERROR - 2026-03-05 11:51:07 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 11:51:19 --> [REQ_ID=6da6fc704316] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-03-05 11:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:51:19 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/Reports]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:51:19 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:51:19 --> [404] URI=https://www.mymiwallet.com/index.php/Investments/Reports
WARNING - 2026-03-05 11:51:19 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/Reports | referrer: none
ERROR - 2026-03-05 11:51:19 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 11:51:20 --> [REQ_ID=1f26f4309a8f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:51:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:51:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:51:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:51:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:51:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-05 11:51:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-05 11:51:31 --> [CSRF] token name=csrf_test_name hash=adc9ac6dea443677e99fb30fcc95839a
DEBUG - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [REQUEST][END]
INFO - 2026-03-05 11:51:31 --> [REQ_ID=fba3161ec6a5] [PERF] Execution time=0.010788
DEBUG - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-03-05 11:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-03-05 11:51:44 --> [CSRF] token name=csrf_test_name hash=255e72f1ceb346d9410b91274f8a2495
DEBUG - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [REQUEST][END]
INFO - 2026-03-05 11:51:44 --> [REQ_ID=55bb8f0c274b] [PERF] Execution time=0.015249
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=88a2b43f7898] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-05 11:51:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=88a2b43f7898] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=88a2b43f7898] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=88a2b43f7898] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-05 11:51:56 --> [CSRF] token name=csrf_test_name hash=678b9d1f8180898c43d349aaf22ca8e8
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=0d429797bbfe] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 11:51:56 --> [REQ_ID=0d429797bbfe] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=0d429797bbfe] [METHOD_ENTRY] index
DEBUG - 2026-03-05 11:51:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:51:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 11:51:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 11:51:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 11:51:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 11:51:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 11:51:56 --> [REQ_ID=0d429797bbfe] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-03-05 11:51:56 --> [REQ_ID=0d429797bbfe] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-05 11:51:57 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-03-05 11:51:57 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 11:51:57 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-05 11:51:57 --> [REQ_ID=88a2b43f7898] [FILTER_AFTER]
DEBUG - 2026-03-05 11:51:57 --> [REQ_ID=88a2b43f7898] [LIFECYCLE][END] status=200 duration_ms=548.37 memory_delta=4194304
INFO - 2026-03-05 11:51:57 --> [REQ_ID=0d429797bbfe] [PERF] Execution time=0.547537
DEBUG - 2026-03-05 11:51:57 --> [REQ_ID=88a2b43f7898] [REQUEST][END]
INFO - 2026-03-05 11:51:57 --> [REQ_ID=88a2b43f7898] [PERF] Execution time=0.558810
DEBUG - 2026-03-05 11:52:09 --> [REQ_ID=23a8405ed3ed] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-05 11:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:52:09 --> [REQ_ID=23a8405ed3ed] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-05 11:52:09 --> [REQ_ID=23a8405ed3ed] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-05 11:52:09 --> [REQ_ID=23a8405ed3ed] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-05 11:52:09 --> [CSRF] token name=csrf_test_name hash=c600d145e896de87886a057061dea17f
DEBUG - 2026-03-05 11:52:09 --> [REQ_ID=25dc49bb1bdb] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 11:52:09 --> [REQ_ID=25dc49bb1bdb] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 11:52:09 --> [REQ_ID=25dc49bb1bdb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 11:52:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 11:52:10 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-05 11:52:10 --> [REQ_ID=25dc49bb1bdb] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-05 11:52:10 --> [REQ_ID=25dc49bb1bdb] [MEMORY][commonData:start] 8388608
INFO - 2026-03-05 11:52:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-05 11:52:10 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-05 11:52:10 --> [REQ_ID=23a8405ed3ed] [FILTER_AFTER]
DEBUG - 2026-03-05 11:52:10 --> [REQ_ID=23a8405ed3ed] [LIFECYCLE][END] status=200 duration_ms=659.71 memory_delta=2097152
INFO - 2026-03-05 11:52:10 --> [REQ_ID=25dc49bb1bdb] [PERF] Execution time=0.659134
DEBUG - 2026-03-05 11:52:10 --> [REQ_ID=23a8405ed3ed] [REQUEST][END]
INFO - 2026-03-05 11:52:10 --> [REQ_ID=23a8405ed3ed] [PERF] Execution time=0.670429
DEBUG - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-05 11:52:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-03-05 11:52:22 --> [CSRF] token name=csrf_test_name hash=04deba152455930af9708aedf6114cb3
DEBUG - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [REQUEST][END]
INFO - 2026-03-05 11:52:22 --> [REQ_ID=9f0424c7b9fb] [PERF] Execution time=0.010836
DEBUG - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-03-05 11:52:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-05 11:52:34 --> [CSRF] token name=csrf_test_name hash=e80cf158fa89c1f572571ed7ebe04ccf
DEBUG - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [REQUEST][END]
INFO - 2026-03-05 11:52:34 --> [REQ_ID=15f7d4c99179] [PERF] Execution time=0.014461
DEBUG - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [REQUEST][START] GET /index.php/Management/Marketing
DEBUG - 2026-03-05 11:52:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [FILTER_BEFORE] /index.php/Management/Marketing
DEBUG - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=index
DEBUG - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing
DEBUG - 2026-03-05 11:52:47 --> [CSRF] token name=csrf_test_name hash=4b8cd1e47b5cdfc6d2abe4c90aabedf0
DEBUG - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [REQUEST][END]
INFO - 2026-03-05 11:52:47 --> [REQ_ID=0843013dba3d] [PERF] Execution time=0.017683
DEBUG - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-03-05 11:52:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-03-05 11:52:59 --> [CSRF] token name=csrf_test_name hash=ec868d7918b448a0ac3fef6da61042f1
DEBUG - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [REQUEST][END]
INFO - 2026-03-05 11:52:59 --> [REQ_ID=ceeef160d242] [PERF] Execution time=0.010917
DEBUG - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-05 11:53:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-05 11:53:12 --> [CSRF] token name=csrf_test_name hash=7b74685df6fc5215d7afac8f1849df25
DEBUG - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [REQUEST][END]
INFO - 2026-03-05 11:53:12 --> [REQ_ID=d3c1cdce6a43] [PERF] Execution time=0.012843
DEBUG - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 11:53:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-05 11:53:24 --> [CSRF] token name=csrf_test_name hash=8d8f0d452771f424cccd41d7c634f49f
DEBUG - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [REQUEST][END]
INFO - 2026-03-05 11:53:24 --> [REQ_ID=0f4dd0c532f4] [PERF] Execution time=0.019004
DEBUG - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 11:53:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-05 11:53:36 --> [CSRF] token name=csrf_test_name hash=4fcc0c41fffd02cd371eb8c2ff8c58e0
DEBUG - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [REQUEST][END]
INFO - 2026-03-05 11:53:36 --> [REQ_ID=4b35e6fd8a0c] [PERF] Execution time=0.011660
DEBUG - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [REQUEST][START] GET /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 11:53:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [FILTER_BEFORE] /index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=schedule
DEBUG - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Schedule
DEBUG - 2026-03-05 11:53:49 --> [CSRF] token name=csrf_test_name hash=240cb061f2f6dd169b04b6c581b6bea7
DEBUG - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [REQUEST][END]
INFO - 2026-03-05 11:53:49 --> [REQ_ID=335e84bc2285] [PERF] Execution time=0.011349
DEBUG - 2026-03-05 11:54:01 --> [REQ_ID=b43b5385170e] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-03-05 11:54:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:54:01 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Institute]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:54:01 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:54:01 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Institute
WARNING - 2026-03-05 11:54:01 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Institute | referrer: none
ERROR - 2026-03-05 11:54:01 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-03-05 11:54:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [FILTER_BEFORE] /index.php/Purchase/MyMIGold
DEBUG - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Purchase/MyMIGold
DEBUG - 2026-03-05 11:54:13 --> [CSRF] token name=csrf_test_name hash=67fa322e4112b945e70491da219a9c65
DEBUG - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [REQUEST][END]
INFO - 2026-03-05 11:54:13 --> [REQ_ID=c386f5b62d77] [PERF] Execution time=0.010207
DEBUG - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 11:54:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-05 11:54:26 --> [CSRF] token name=csrf_test_name hash=91c24ca95407952f6b20dc9718ee24fb
DEBUG - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [REQUEST][END]
INFO - 2026-03-05 11:54:26 --> [REQ_ID=07abacef6592] [PERF] Execution time=0.010253
DEBUG - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 11:54:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-05 11:54:38 --> [CSRF] token name=csrf_test_name hash=0a121f0b4ab82a1bd0921f04c3a7e7c9
DEBUG - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [REQUEST][END]
INFO - 2026-03-05 11:54:38 --> [REQ_ID=d3ba607aa6cb] [PERF] Execution time=0.011623
DEBUG - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:54:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:54:49 --> [CSRF] token name=csrf_test_name hash=5ec6383d184acaac9146ff7742366882
DEBUG - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [REQUEST][END]
INFO - 2026-03-05 11:54:49 --> [REQ_ID=bf24fc877d7d] [PERF] Execution time=0.017401
DEBUG - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-05 11:54:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-03-05 11:54:50 --> [CSRF] token name=csrf_test_name hash=b9425842a71b3846974a0996e0e2a168
DEBUG - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [REQUEST][END]
INFO - 2026-03-05 11:54:50 --> [REQ_ID=655cf359af04] [PERF] Execution time=0.013838
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 11:54:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 11:54:51 --> [CSRF] token name=csrf_test_name hash=8f9218f5d121deb807381e6c4e9caf2a
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=401d55777578] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 11:54:51 --> [REQ_ID=401d55777578] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [FILTER_AFTER]
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [LIFECYCLE][END] status=200 duration_ms=200.63 memory_delta=0
INFO - 2026-03-05 11:54:51 --> [REQ_ID=401d55777578] [PERF] Execution time=0.199974
DEBUG - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [REQUEST][END]
INFO - 2026-03-05 11:54:51 --> [REQ_ID=2e0684d72c8c] [PERF] Execution time=0.212235
DEBUG - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-05 11:55:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-03-05 11:55:03 --> [CSRF] token name=csrf_test_name hash=1c1fcb5147fa987b7d3f8df800ab0acd
DEBUG - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [REQUEST][END]
INFO - 2026-03-05 11:55:03 --> [REQ_ID=78d295e12b30] [PERF] Execution time=0.012338
DEBUG - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-05 11:55:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-05 11:55:15 --> [CSRF] token name=csrf_test_name hash=a1ea21a2da1f8096a260c8144ced2f70
DEBUG - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [REQUEST][END]
INFO - 2026-03-05 11:55:15 --> [REQ_ID=64bdf5e54f58] [PERF] Execution time=0.012124
DEBUG - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-05 11:55:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-05 11:55:28 --> [CSRF] token name=csrf_test_name hash=dbc95146ea34605ad3601711e70ffa8e
DEBUG - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [REQUEST][END]
INFO - 2026-03-05 11:55:28 --> [REQ_ID=b478de43e761] [PERF] Execution time=0.011869
DEBUG - 2026-03-05 11:55:40 --> [REQ_ID=0ddfd0ff44af] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-05 11:55:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:55:40 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Advisors]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:55:40 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:55:40 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Advisors
WARNING - 2026-03-05 11:55:40 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Advisors | referrer: none
ERROR - 2026-03-05 11:55:40 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-05 11:55:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-03-05 11:55:52 --> [CSRF] token name=csrf_test_name hash=ec38e15990574a730777700a59963ae4
DEBUG - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [REQUEST][END]
INFO - 2026-03-05 11:55:52 --> [REQ_ID=e82278c1664b] [PERF] Execution time=0.010623
DEBUG - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 11:56:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-05 11:56:05 --> [CSRF] token name=csrf_test_name hash=33c93f32cf6e15e33abe997e07ddc573
DEBUG - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [REQUEST][END]
INFO - 2026-03-05 11:56:05 --> [REQ_ID=ff3ec0160b1c] [PERF] Execution time=0.012981
DEBUG - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 11:56:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-05 11:56:17 --> [CSRF] token name=csrf_test_name hash=03d34f25d3a1e6f42b429189370235e2
DEBUG - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [REQUEST][END]
INFO - 2026-03-05 11:56:17 --> [REQ_ID=f46b6bf35615] [PERF] Execution time=0.010817
DEBUG - 2026-03-05 11:56:20 --> [REQ_ID=472ed94ff8e2] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 11:56:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 11:56:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 11:56:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 11:56:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 11:56:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 11:56:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-03-05 11:56:29 --> [CSRF] token name=csrf_test_name hash=464953ab2151250d6e2157a4879e443a
DEBUG - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [REQUEST][END]
INFO - 2026-03-05 11:56:29 --> [REQ_ID=d1f27aa8bdf4] [PERF] Execution time=0.010818
DEBUG - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:56:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-03-05 11:56:42 --> [CSRF] token name=csrf_test_name hash=058f6fd5172ac10936fd8303d1248a63
DEBUG - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [REQUEST][END]
INFO - 2026-03-05 11:56:42 --> [REQ_ID=abe4eb3d2a45] [PERF] Execution time=0.011418
INFO - 2026-03-05 12:00:02 --> [spark:ops:work] Started
INFO - 2026-03-05 12:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-05 12:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 12:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:00:02 --> [spark:ops:work] Intent
INFO - 2026-03-05 12:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 12:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [REQUEST][END]
INFO - 2026-03-05 12:00:02 --> [REQ_ID=ca09e2ae8580] [PERF] Execution time=0.069667
INFO - 2026-03-05 12:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-05 12:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.122272
INFO - 2026-03-05 12:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-05 12:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-05 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-03-05 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-05 12:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.011640
INFO - 2026-03-05 12:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-05 12:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-03-05 12:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-05 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-05 12:00:03 --> LOG_HEALTHCHECK debug marker=3c7eb0af07a0
INFO - 2026-03-05 12:00:03 --> LOG_HEALTHCHECK info marker=3c7eb0af07a0
NOTICE - 2026-03-05 12:00:03 --> LOG_HEALTHCHECK probe marker=3c7eb0af07a0
INFO - 2026-03-05 12:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-03-05 12:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025518
INFO - 2026-03-05 12:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 12:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-03-05 12:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-03-05 12:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-03-05 12:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-03-05 12:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-03-05 12:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.540758
INFO - 2026-03-05 12:00:05 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 12:01:20 --> [REQ_ID=0145940ca50a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:01:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:01:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:01:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:01:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:01:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-05 12:05:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-05 12:05:53 --> [CSRF] token name=csrf_test_name hash=91b136e8c04e0ebcb4c10b7f4ded2af3
DEBUG - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [REQUEST][END]
INFO - 2026-03-05 12:05:53 --> [REQ_ID=6bbb941deddb] [PERF] Execution time=0.052997
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-05 12:05:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-05 12:05:56 --> [CSRF] token name=csrf_test_name hash=c58ca7c2f537faae7773afad5e9f6be8
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=1613f21e9183] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 12:05:56 --> [REQ_ID=1613f21e9183] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [FILTER_AFTER]
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [LIFECYCLE][END] status=200 duration_ms=128.09 memory_delta=0
INFO - 2026-03-05 12:05:56 --> [REQ_ID=1613f21e9183] [PERF] Execution time=0.127809
DEBUG - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [REQUEST][END]
INFO - 2026-03-05 12:05:56 --> [REQ_ID=22e79832d92b] [PERF] Execution time=0.140028
DEBUG - 2026-03-05 12:06:20 --> [REQ_ID=38935d79e61a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:06:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:06:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:06:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:06:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:11:20 --> [REQ_ID=21219a232373] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:11:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:11:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:11:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:11:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:11:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
INFO - 2026-03-05 12:15:01 --> [spark:ops:work] Started
INFO - 2026-03-05 12:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 12:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:15:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 12:15:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 12:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053766
INFO - 2026-03-05 12:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [REQUEST][END]
INFO - 2026-03-05 12:15:01 --> [REQ_ID=c051214609f7] [PERF] Execution time=0.056109
DEBUG - 2026-03-05 12:16:20 --> [REQ_ID=d2a299c08d23] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:16:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:16:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:16:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:16:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:21:20 --> [REQ_ID=9c815294eedb] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:21:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:21:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:21:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:21:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-05 12:23:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [FILTER_BEFORE] /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-05 12:23:38 --> [CSRF] token name=csrf_test_name hash=e8c604598c49d53d94e8eb9cd1db43d3
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=96fa0a2016a7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-05 12:23:38 --> [REQ_ID=96fa0a2016a7] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=96fa0a2016a7] [METHOD_ENTRY] show
DEBUG - 2026-03-05 12:23:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 12:23:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-05 12:23:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-03-05 12:23:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-05 12:23:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-05 12:23:38 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-03-05 12:23:38 --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [FILTER_AFTER]
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [LIFECYCLE][END] status=404 duration_ms=165.54 memory_delta=0
INFO - 2026-03-05 12:23:38 --> [REQ_ID=96fa0a2016a7] [PERF] Execution time=0.163212
DEBUG - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [REQUEST][END]
INFO - 2026-03-05 12:23:38 --> [REQ_ID=4d6b8696d6c3] [PERF] Execution time=0.207805
DEBUG - 2026-03-05 12:26:20 --> [REQ_ID=e0a45daa605f] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:26:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:26:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:26:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:26:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:26:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:28:42 --> [REQ_ID=537135523d61] [REQUEST][START] GET /
DEBUG - 2026-03-05 12:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:28:42 --> [REQ_ID=537135523d61] [FILTER_BEFORE] /
DEBUG - 2026-03-05 12:28:42 --> [REQ_ID=537135523d61] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-05 12:28:42 --> [REQ_ID=537135523d61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-05 12:28:42 --> [CSRF] token name=csrf_test_name hash=43f08418f0dbfb5f01db8441ab3c7040
DEBUG - 2026-03-05 12:28:42 --> [REQ_ID=d9cb887ed656] [INIT] App\Controllers\Home::GET
INFO - 2026-03-05 12:28:42 --> [REQ_ID=d9cb887ed656] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 12:28:43 --> [REQ_ID=d9cb887ed656] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-05 12:28:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-05 12:28:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-05 12:28:43 --> [REQ_ID=d9cb887ed656] [VIEW_RENDER] themes/public/home
INFO - 2026-03-05 12:28:43 --> [REQ_ID=d9cb887ed656] [MEMORY][commonData:start] 10485760
INFO - 2026-03-05 12:28:43 --> themesMemory usage: 10485760
DEBUG - 2026-03-05 12:28:43 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-05 12:28:43 --> [REQ_ID=537135523d61] [FILTER_AFTER]
DEBUG - 2026-03-05 12:28:43 --> [REQ_ID=537135523d61] [LIFECYCLE][END] status=200 duration_ms=755.23 memory_delta=4194304
INFO - 2026-03-05 12:28:43 --> [REQ_ID=d9cb887ed656] [PERF] Execution time=0.753327
DEBUG - 2026-03-05 12:28:43 --> [REQ_ID=537135523d61] [REQUEST][END]
INFO - 2026-03-05 12:28:43 --> [REQ_ID=537135523d61] [PERF] Execution time=0.796202
INFO - 2026-03-05 12:30:01 --> [spark:ops:work] Started
INFO - 2026-03-05 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-05 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-03-05 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-03-05 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-03-05 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.098507
INFO - 2026-03-05 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-05 12:31:20 --> [REQ_ID=375dd15e60ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:31:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:31:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:31:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:31:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:31:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:33:06 --> [REQ_ID=f505a81937f4] [REQUEST][START] GET /index.php/activate-account?token=6cf656bf9bde805a3fc3e8946ec4e445
DEBUG - 2026-03-05 12:33:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-05 12:33:06 --> [REQ_ID=f505a81937f4] [FILTER_BEFORE] /index.php/activate-account?token=6cf656bf9bde805a3fc3e8946ec4e445
DEBUG - 2026-03-05 12:33:06 --> [REQ_ID=f505a81937f4] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-03-05 12:33:06 --> [REQ_ID=f505a81937f4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=6cf656bf9bde805a3fc3e8946ec4e445
DEBUG - 2026-03-05 12:33:06 --> [CSRF] token name=csrf_test_name hash=24d727c2113a6e3ff357b19fbbbe1489
DEBUG - 2026-03-05 12:33:06 --> [REQ_ID=a55c63a95282] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-05 12:33:06 --> [REQ_ID=a55c63a95282] [MEMORY][controller-start] 6291456
INFO - 2026-03-05 12:33:07 --> [ACTIVATION] Activation link hit
DEBUG - 2026-03-05 12:33:07 --> [ACTIVATION] Token validated for user
INFO - 2026-03-05 12:33:07 --> [ACTIVATION] Account activated
INFO - 2026-03-05 12:33:07 --> [ACTIVATION] Redirect issued
DEBUG - 2026-03-05 12:33:07 --> [REQ_ID=f505a81937f4] [FILTER_AFTER]
DEBUG - 2026-03-05 12:33:07 --> [REQ_ID=f505a81937f4] [LIFECYCLE][END] status=302 duration_ms=214.03 memory_delta=0
INFO - 2026-03-05 12:33:07 --> [REQ_ID=a55c63a95282] [PERF] Execution time=0.211858
DEBUG - 2026-03-05 12:33:07 --> [REQ_ID=f505a81937f4] [REQUEST][END]
INFO - 2026-03-05 12:33:07 --> [REQ_ID=f505a81937f4] [PERF] Execution time=0.255878
DEBUG - 2026-03-05 12:36:20 --> [REQ_ID=b63ff227c6a9] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:36:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:36:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:36:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:36:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:36:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
DEBUG - 2026-03-05 12:41:20 --> [REQ_ID=75d83ca7e99a] [REQUEST][START] HEAD /
DEBUG - 2026-03-05 12:41:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-05 12:41:20 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-05 12:41:20 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-05 12:41:20 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-03-05 12:41:20 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://67.205.42.220
>>>>>>> Stashed changes
