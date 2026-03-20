<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-21 00:54:07 --> [REQ_ID=e69accfa036c] [REQUEST][START] GET /index.php/Management/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-21 00:54:07 --> [REQ_ID=c0a6a830e8ae] [REQUEST][START] GET /index.php/API/Alerts/getLatestPrices
CRITICAL - 2026-03-21 00:54:07 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API/Alerts/getLatestPrices]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-21 00:54:07 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-21 00:54:07 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API/Alerts/getLatestPrices
WARNING - 2026-03-21 00:54:07 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API/Alerts/getLatestPrices | referrer: https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-21 00:54:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=c0a6a830e8ae] [FILTER_BEFORE] /index.php/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=c0a6a830e8ae] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=c0a6a830e8ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=1585924045ff] [INIT] App\Modules\APIs\Controllers\AlertsAPIController::GET
INFO - 2026-03-21 00:54:08 --> [REQ_ID=1585924045ff] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-21 00:54:08 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-21 00:54:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=1585924045ff] [AJAX_HEADERS] {"Connection":{},"Host":{},"Priority":{},"Cookie":{},"Accept-Language":{},"Accept-Encoding":{},"Referer":{},"Sec-Fetch-Dest":{},"Sec-Fetch-Mode":{},"Sec-Fetch-Site":{},"Sec-Ch-Ua-Mobile":{},"Sec-Ch-Ua":{},"Accept":{},"User-Agent":{},"X-Requested-With":{},"Sec-Ch-Ua-Platform":{}}
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=1585924045ff] [AJAX_POST] []
DEBUG - 2026-03-21 00:54:08 --> getLatestPrices - Starting price refresh
INFO - 2026-03-21 00:54:08 --> [REQ_ID=1585924045ff] [PERF] Execution time=0.039039
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=7b9bcc50290a] [REQUEST][START] GET /index.php/Management/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-03-21 00:54:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API/Alerts/getLatestPrices]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-03-21 00:54:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-03-21 00:54:08 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API/Alerts/getLatestPrices
WARNING - 2026-03-21 00:54:08 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API/Alerts/getLatestPrices | referrer: https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=5e36e95f3441] [REQUEST][START] GET /index.php/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=5e36e95f3441] [FILTER_BEFORE] /index.php/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=5e36e95f3441] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=5e36e95f3441] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/getLatestPrices
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=e9b9be6b3313] [INIT] App\Modules\APIs\Controllers\AlertsAPIController::GET
INFO - 2026-03-21 00:54:08 --> [REQ_ID=e9b9be6b3313] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-21 00:54:08 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-21 00:54:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=e9b9be6b3313] [AJAX_HEADERS] {"Connection":{},"Host":{},"Priority":{},"Cookie":{},"Accept-Language":{},"Accept-Encoding":{},"Referer":{},"Sec-Fetch-Dest":{},"Sec-Fetch-Mode":{},"Sec-Fetch-Site":{},"Sec-Ch-Ua-Mobile":{},"Sec-Ch-Ua":{},"Accept":{},"User-Agent":{},"X-Requested-With":{},"Sec-Ch-Ua-Platform":{}}
DEBUG - 2026-03-21 00:54:08 --> [REQ_ID=e9b9be6b3313] [AJAX_POST] []
DEBUG - 2026-03-21 00:54:08 --> getLatestPrices - Starting price refresh
INFO - 2026-03-21 00:54:08 --> [REQ_ID=e9b9be6b3313] [PERF] Execution time=0.031267
