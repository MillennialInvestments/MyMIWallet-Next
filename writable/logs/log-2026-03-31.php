<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [REQUEST][END]
INFO - 2026-03-31 00:00:01 --> [REQ_ID=1283cbdc075c] [PERF] Execution time=0.043497
ERROR - 2026-03-31 00:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 00:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:01:22 --> [REQ_ID=b7f91979b63a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:01:22 --> [REQ_ID=b7f91979b63a] [REQUEST][END]
INFO - 2026-03-31 00:01:22 --> [REQ_ID=b7f91979b63a] [PERF] Execution time=0.122418
ERROR - 2026-03-31 00:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:06:22 --> [REQ_ID=dcf83fcbd1bc] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:06:22 --> [REQ_ID=dcf83fcbd1bc] [REQUEST][END]
INFO - 2026-03-31 00:06:22 --> [REQ_ID=dcf83fcbd1bc] [PERF] Execution time=0.057844
ERROR - 2026-03-31 00:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:11:22 --> [REQ_ID=b93cdd3df58d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:11:22 --> [REQ_ID=b93cdd3df58d] [REQUEST][END]
INFO - 2026-03-31 00:11:22 --> [REQ_ID=b93cdd3df58d] [PERF] Execution time=0.135217
ERROR - 2026-03-31 00:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [REQUEST][END]
INFO - 2026-03-31 00:15:01 --> [REQ_ID=5ff2f4e8fe36] [PERF] Execution time=0.043445
ERROR - 2026-03-31 00:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 00:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:16:22 --> [REQ_ID=2418053813ab] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:16:22 --> [REQ_ID=2418053813ab] [REQUEST][END]
INFO - 2026-03-31 00:16:22 --> [REQ_ID=2418053813ab] [PERF] Execution time=0.054666
ERROR - 2026-03-31 00:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-03-31 00:18:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [FILTER_BEFORE] /index.php/Investments/News
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [ROUTE] Controller=closure_route Method=index
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/News
DEBUG - 2026-03-31 00:18:16 --> [CSRF] token name=csrf_test_name hash=001fa61f25098f9ed3ac77eab9927972
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [REQUEST][END]
INFO - 2026-03-31 00:18:16 --> [REQ_ID=48d8bb98de68] [PERF] Execution time=0.045209
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=aa1ea4e8f939] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 00:18:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=aa1ea4e8f939] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=aa1ea4e8f939] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=aa1ea4e8f939] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 00:18:16 --> [CSRF] token name=csrf_test_name hash=597526c1a5fe91c5ef54ae81063231e2
DEBUG - 2026-03-31 00:18:16 --> [REQ_ID=d905de25c86d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 00:18:16 --> [REQ_ID=d905de25c86d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 00:18:16 --> [TRACE]
DEBUG - 2026-03-31 00:18:17 --> [REQ_ID=aa1ea4e8f939] [FILTER_AFTER]
DEBUG - 2026-03-31 00:18:17 --> [REQ_ID=aa1ea4e8f939] [LIFECYCLE][END] status=200 duration_ms=67.52 memory_delta=0
INFO - 2026-03-31 00:18:17 --> [REQ_ID=d905de25c86d] [PERF] Execution time=0.072821
DEBUG - 2026-03-31 00:18:17 --> [REQ_ID=aa1ea4e8f939] [REQUEST][END]
INFO - 2026-03-31 00:18:17 --> [REQ_ID=aa1ea4e8f939] [PERF] Execution time=0.088251
DEBUG - 2026-03-31 00:19:41 --> [REQ_ID=b3c95ea31bfc] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:19:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:19:41 --> [REQ_ID=b3c95ea31bfc] [FILTER_BEFORE] /
DEBUG - 2026-03-31 00:19:41 --> [REQ_ID=b3c95ea31bfc] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 00:19:41 --> [REQ_ID=b3c95ea31bfc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 00:19:41 --> [CSRF] token name=csrf_test_name hash=6353ef750cca3e73c182b8ece61dc6e5
DEBUG - 2026-03-31 00:19:41 --> [REQ_ID=d5f847db18b3] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 00:19:41 --> [REQ_ID=d5f847db18b3] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 00:19:41 --> [TRACE]
INFO - 2026-03-31 00:19:41 --> [REQ_ID=d5f847db18b3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 00:19:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 00:19:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 00:19:42 --> [REQ_ID=d5f847db18b3] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 00:19:42 --> [REQ_ID=d5f847db18b3] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 00:19:42 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 00:19:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 00:19:42 --> [REQ_ID=b3c95ea31bfc] [FILTER_AFTER]
DEBUG - 2026-03-31 00:19:42 --> [REQ_ID=b3c95ea31bfc] [LIFECYCLE][END] status=200 duration_ms=761.77 memory_delta=4194304
INFO - 2026-03-31 00:19:42 --> [REQ_ID=d5f847db18b3] [PERF] Execution time=0.763532
DEBUG - 2026-03-31 00:19:42 --> [REQ_ID=b3c95ea31bfc] [REQUEST][END]
INFO - 2026-03-31 00:19:42 --> [REQ_ID=b3c95ea31bfc] [PERF] Execution time=0.800175
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:20:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [FILTER_BEFORE] /
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 00:20:05 --> [CSRF] token name=csrf_test_name hash=762fa9553578f0752b248fe3d61c1045
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 00:20:05 --> [TRACE]
INFO - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 00:20:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 00:20:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 00:20:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 00:20:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [FILTER_AFTER]
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [LIFECYCLE][END] status=200 duration_ms=609.63 memory_delta=2097152
INFO - 2026-03-31 00:20:05 --> [REQ_ID=48435438bb8c] [PERF] Execution time=0.609662
DEBUG - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [REQUEST][END]
INFO - 2026-03-31 00:20:05 --> [REQ_ID=8a7635de32fd] [PERF] Execution time=0.619687
DEBUG - 2026-03-31 00:21:22 --> [REQ_ID=212adb962406] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:21:22 --> [REQ_ID=212adb962406] [REQUEST][END]
INFO - 2026-03-31 00:21:22 --> [REQ_ID=212adb962406] [PERF] Execution time=0.138375
ERROR - 2026-03-31 00:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:24:54 --> [REQ_ID=62c7fcb6cb19] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:24:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:24:54 --> [REQ_ID=62c7fcb6cb19] [FILTER_BEFORE] /
DEBUG - 2026-03-31 00:24:54 --> [REQ_ID=62c7fcb6cb19] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 00:24:54 --> [REQ_ID=62c7fcb6cb19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 00:24:54 --> [CSRF] token name=csrf_test_name hash=795b1aeca170d089bcdaf5a6d128d43e
DEBUG - 2026-03-31 00:24:54 --> [REQ_ID=68a2dbf54ef1] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 00:24:54 --> [REQ_ID=68a2dbf54ef1] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 00:24:54 --> [TRACE]
INFO - 2026-03-31 00:24:54 --> [REQ_ID=68a2dbf54ef1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 00:24:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 00:24:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:24:55 --> [REQ_ID=68a2dbf54ef1] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 00:24:55 --> [REQ_ID=68a2dbf54ef1] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 00:24:55 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 00:24:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:24:55 --> [REQ_ID=62c7fcb6cb19] [FILTER_AFTER]
DEBUG - 2026-03-31 00:24:55 --> [REQ_ID=62c7fcb6cb19] [LIFECYCLE][END] status=200 duration_ms=667.74 memory_delta=4194304
INFO - 2026-03-31 00:24:55 --> [REQ_ID=68a2dbf54ef1] [PERF] Execution time=0.668480
DEBUG - 2026-03-31 00:24:55 --> [REQ_ID=62c7fcb6cb19] [REQUEST][END]
INFO - 2026-03-31 00:24:55 --> [REQ_ID=62c7fcb6cb19] [PERF] Execution time=0.714423
DEBUG - 2026-03-31 00:25:13 --> [REQ_ID=2b1f2dd9e804] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:25:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:25:13 --> [REQ_ID=2b1f2dd9e804] [FILTER_BEFORE] /
DEBUG - 2026-03-31 00:25:13 --> [REQ_ID=2b1f2dd9e804] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 00:25:13 --> [REQ_ID=2b1f2dd9e804] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 00:25:13 --> [CSRF] token name=csrf_test_name hash=d977630f23e1472c602a01b03501530a
DEBUG - 2026-03-31 00:25:13 --> [REQ_ID=2aa1adc1e7a4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 00:25:13 --> [REQ_ID=2aa1adc1e7a4] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 00:25:13 --> [TRACE]
INFO - 2026-03-31 00:25:13 --> [REQ_ID=2aa1adc1e7a4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 00:25:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 00:25:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:25:14 --> [REQ_ID=2aa1adc1e7a4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 00:25:14 --> [REQ_ID=2aa1adc1e7a4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 00:25:14 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 00:25:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:25:14 --> [REQ_ID=2b1f2dd9e804] [FILTER_AFTER]
DEBUG - 2026-03-31 00:25:14 --> [REQ_ID=2b1f2dd9e804] [LIFECYCLE][END] status=200 duration_ms=665.93 memory_delta=2097152
INFO - 2026-03-31 00:25:14 --> [REQ_ID=2aa1adc1e7a4] [PERF] Execution time=0.666106
DEBUG - 2026-03-31 00:25:14 --> [REQ_ID=2b1f2dd9e804] [REQUEST][END]
INFO - 2026-03-31 00:25:14 --> [REQ_ID=2b1f2dd9e804] [PERF] Execution time=0.676417
DEBUG - 2026-03-31 00:26:22 --> [REQ_ID=084a1da19a4b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:26:22 --> [REQ_ID=084a1da19a4b] [REQUEST][END]
INFO - 2026-03-31 00:26:22 --> [REQ_ID=084a1da19a4b] [PERF] Execution time=0.041448
ERROR - 2026-03-31 00:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-03-31 00:27:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-03-31 00:27:10 --> [CSRF] token name=csrf_test_name hash=1a6c938b8de1a26b7e451c9e07c842a0
DEBUG - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [REQUEST][END]
INFO - 2026-03-31 00:27:10 --> [REQ_ID=34b69dad7139] [PERF] Execution time=0.013827
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 00:27:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 00:27:11 --> [CSRF] token name=csrf_test_name hash=4d85839477eccf4559c96aa517f68ec1
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2c2ea1980fb1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 00:27:11 --> [REQ_ID=2c2ea1980fb1] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 00:27:11 --> [TRACE]
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [FILTER_AFTER]
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [LIFECYCLE][END] status=200 duration_ms=226.37 memory_delta=0
INFO - 2026-03-31 00:27:11 --> [REQ_ID=2c2ea1980fb1] [PERF] Execution time=0.226307
DEBUG - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [REQUEST][END]
INFO - 2026-03-31 00:27:11 --> [REQ_ID=2a9094017b64] [PERF] Execution time=0.238557
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-31 00:29:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-03-31 00:29:21 --> [CSRF] token name=csrf_test_name hash=83639ca35201fddad3ef6db76e7a64d0
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [REQUEST][END]
INFO - 2026-03-31 00:29:21 --> [REQ_ID=40cea8dcf791] [PERF] Execution time=0.055412
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=9380ec152a42] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 00:29:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=9380ec152a42] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=9380ec152a42] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=9380ec152a42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 00:29:21 --> [CSRF] token name=csrf_test_name hash=7d3fea3e824aa52118270af759c98f3a
DEBUG - 2026-03-31 00:29:21 --> [REQ_ID=27c2cff4a498] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 00:29:21 --> [REQ_ID=27c2cff4a498] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 00:29:21 --> [TRACE]
DEBUG - 2026-03-31 00:29:22 --> [REQ_ID=9380ec152a42] [FILTER_AFTER]
DEBUG - 2026-03-31 00:29:22 --> [REQ_ID=9380ec152a42] [LIFECYCLE][END] status=200 duration_ms=202.01 memory_delta=0
INFO - 2026-03-31 00:29:22 --> [REQ_ID=27c2cff4a498] [PERF] Execution time=0.206143
DEBUG - 2026-03-31 00:29:22 --> [REQ_ID=9380ec152a42] [REQUEST][END]
INFO - 2026-03-31 00:29:22 --> [REQ_ID=9380ec152a42] [PERF] Execution time=0.218536
DEBUG - 2026-03-31 00:31:22 --> [REQ_ID=9cd3cfe6b251] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:31:22 --> [REQ_ID=9cd3cfe6b251] [REQUEST][END]
INFO - 2026-03-31 00:31:22 --> [REQ_ID=9cd3cfe6b251] [PERF] Execution time=0.049976
ERROR - 2026-03-31 00:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:36:22 --> [REQ_ID=3681de35ebac] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:36:22 --> [REQ_ID=3681de35ebac] [REQUEST][END]
INFO - 2026-03-31 00:36:22 --> [REQ_ID=3681de35ebac] [PERF] Execution time=0.085566
ERROR - 2026-03-31 00:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:40:27 --> [REQ_ID=1263ceb378ff] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:40:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:40:27 --> [REQ_ID=1263ceb378ff] [FILTER_BEFORE] /
DEBUG - 2026-03-31 00:40:27 --> [REQ_ID=1263ceb378ff] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 00:40:27 --> [REQ_ID=1263ceb378ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 00:40:27 --> [CSRF] token name=csrf_test_name hash=18982eea6c605593dd1810802fe1f13e
DEBUG - 2026-03-31 00:40:27 --> [REQ_ID=9f3f87f8e541] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 00:40:27 --> [REQ_ID=9f3f87f8e541] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 00:40:27 --> [TRACE]
INFO - 2026-03-31 00:40:28 --> [REQ_ID=9f3f87f8e541] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 00:40:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 00:40:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 00:40:28 --> [REQ_ID=9f3f87f8e541] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 00:40:28 --> [REQ_ID=9f3f87f8e541] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 00:40:28 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 00:40:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 00:40:28 --> [REQ_ID=1263ceb378ff] [FILTER_AFTER]
DEBUG - 2026-03-31 00:40:28 --> [REQ_ID=1263ceb378ff] [LIFECYCLE][END] status=200 duration_ms=612.74 memory_delta=4194304
INFO - 2026-03-31 00:40:28 --> [REQ_ID=9f3f87f8e541] [PERF] Execution time=0.615345
DEBUG - 2026-03-31 00:40:28 --> [REQ_ID=1263ceb378ff] [REQUEST][END]
INFO - 2026-03-31 00:40:28 --> [REQ_ID=1263ceb378ff] [PERF] Execution time=0.652965
DEBUG - 2026-03-31 00:41:22 --> [REQ_ID=e0e08181854a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:41:22 --> [REQ_ID=e0e08181854a] [REQUEST][END]
INFO - 2026-03-31 00:41:22 --> [REQ_ID=e0e08181854a] [PERF] Execution time=0.094125
ERROR - 2026-03-31 00:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:46:22 --> [REQ_ID=35a0b6372879] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:46:22 --> [REQ_ID=35a0b6372879] [REQUEST][END]
INFO - 2026-03-31 00:46:22 --> [REQ_ID=35a0b6372879] [PERF] Execution time=0.085254
ERROR - 2026-03-31 00:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:51:22 --> [REQ_ID=677c0cd8ec85] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:51:22 --> [REQ_ID=677c0cd8ec85] [REQUEST][END]
INFO - 2026-03-31 00:51:22 --> [REQ_ID=677c0cd8ec85] [PERF] Execution time=0.135459
ERROR - 2026-03-31 00:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-31 00:55:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-03-31 00:55:25 --> [CSRF] token name=csrf_test_name hash=7a69d9a8b3844f34474d1d129156747c
DEBUG - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [REQUEST][END]
INFO - 2026-03-31 00:55:25 --> [REQ_ID=b4bef27a62bd] [PERF] Execution time=0.055496
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 00:55:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 00:55:26 --> [CSRF] token name=csrf_test_name hash=3088c22eea35f61bf61df9958bef88e3
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=c3768302d577] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 00:55:26 --> [REQ_ID=c3768302d577] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 00:55:26 --> [TRACE]
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [FILTER_AFTER]
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [LIFECYCLE][END] status=200 duration_ms=61.58 memory_delta=0
INFO - 2026-03-31 00:55:26 --> [REQ_ID=c3768302d577] [PERF] Execution time=0.065307
DEBUG - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [REQUEST][END]
INFO - 2026-03-31 00:55:26 --> [REQ_ID=5578f0329589] [PERF] Execution time=0.078127
DEBUG - 2026-03-31 00:56:22 --> [REQ_ID=4327b70f866b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 00:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 00:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 00:56:22 --> [REQ_ID=4327b70f866b] [REQUEST][END]
INFO - 2026-03-31 00:56:22 --> [REQ_ID=4327b70f866b] [PERF] Execution time=0.045367
ERROR - 2026-03-31 00:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 00:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 00:59:13 --> [REQ_ID=11e75be8901c] [REQUEST][START] GET /
DEBUG - 2026-03-31 00:59:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 00:59:13 --> [REQ_ID=11e75be8901c] [REQUEST][END]
INFO - 2026-03-31 00:59:13 --> [REQ_ID=11e75be8901c] [PERF] Execution time=0.033312
ERROR - 2026-03-31 00:59:13 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 00:59:13 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [REQUEST][END]
INFO - 2026-03-31 01:00:01 --> [REQ_ID=ff8148881b22] [PERF] Execution time=0.031455
ERROR - 2026-03-31 01:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:01:22 --> [REQ_ID=d329daf420e6] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:01:22 --> [REQ_ID=d329daf420e6] [REQUEST][END]
INFO - 2026-03-31 01:01:22 --> [REQ_ID=d329daf420e6] [PERF] Execution time=0.134691
ERROR - 2026-03-31 01:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:06:22 --> [REQ_ID=c6b0316452ff] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:06:22 --> [REQ_ID=c6b0316452ff] [REQUEST][END]
INFO - 2026-03-31 01:06:22 --> [REQ_ID=c6b0316452ff] [PERF] Execution time=0.052900
ERROR - 2026-03-31 01:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:07:07 --> [REQ_ID=e7175682dd6a] [REQUEST][START] GET /
DEBUG - 2026-03-31 01:07:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:07:07 --> [REQ_ID=e7175682dd6a] [REQUEST][END]
INFO - 2026-03-31 01:07:07 --> [REQ_ID=e7175682dd6a] [PERF] Execution time=0.013493
ERROR - 2026-03-31 01:07:07 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:07:07 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:11:22 --> [REQ_ID=cfecbb3c3c4f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:11:22 --> [REQ_ID=cfecbb3c3c4f] [REQUEST][END]
INFO - 2026-03-31 01:11:22 --> [REQ_ID=cfecbb3c3c4f] [PERF] Execution time=0.083305
ERROR - 2026-03-31 01:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:14:37 --> [REQ_ID=22f1b83bfc17] [REQUEST][START] GET /
DEBUG - 2026-03-31 01:14:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:14:37 --> [REQ_ID=22f1b83bfc17] [REQUEST][END]
INFO - 2026-03-31 01:14:37 --> [REQ_ID=22f1b83bfc17] [PERF] Execution time=0.034491
ERROR - 2026-03-31 01:14:37 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:14:37 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [REQUEST][END]
INFO - 2026-03-31 01:15:01 --> [REQ_ID=eaac7c9fd87d] [PERF] Execution time=0.017733
ERROR - 2026-03-31 01:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:16:22 --> [REQ_ID=7c7de05263bd] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:16:22 --> [REQ_ID=7c7de05263bd] [REQUEST][END]
INFO - 2026-03-31 01:16:22 --> [REQ_ID=7c7de05263bd] [PERF] Execution time=0.136956
ERROR - 2026-03-31 01:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:19:49 --> [REQ_ID=b0e5d1019e36] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-03-31 01:19:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:19:49 --> [REQ_ID=b0e5d1019e36] [REQUEST][END]
INFO - 2026-03-31 01:19:49 --> [REQ_ID=b0e5d1019e36] [PERF] Execution time=0.036679
ERROR - 2026-03-31 01:19:49 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Determining-Your-Financial-Goals\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Determining-Your-Financial-Goals\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Determining-Your-Financial-Goals\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/How-It-Works/Determining-Your-Financial-Goals', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:19:49 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:21:22 --> [REQ_ID=c94774d41799] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:21:22 --> [REQ_ID=c94774d41799] [REQUEST][END]
INFO - 2026-03-31 01:21:22 --> [REQ_ID=c94774d41799] [PERF] Execution time=0.234570
ERROR - 2026-03-31 01:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:22:39 --> [REQ_ID=02d9358e4faa] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-03-31 01:22:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:22:39 --> [REQ_ID=02d9358e4faa] [REQUEST][END]
INFO - 2026-03-31 01:22:39 --> [REQ_ID=02d9358e4faa] [PERF] Execution time=0.016804
ERROR - 2026-03-31 01:22:39 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Investment-Dashboard\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Investment-Dashboard\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Investment-Dashboard\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/How-It-Works/Investment-Dashboard', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:22:39 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:26:22 --> [REQ_ID=cac4f176354e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:26:22 --> [REQ_ID=cac4f176354e] [REQUEST][END]
INFO - 2026-03-31 01:26:22 --> [REQ_ID=cac4f176354e] [PERF] Execution time=0.069601
ERROR - 2026-03-31 01:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-03-31 01:28:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-03-31 01:28:57 --> [CSRF] token name=csrf_test_name hash=ca9b2afcbf38b8d83da7848098361e9f
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [REQUEST][END]
INFO - 2026-03-31 01:28:57 --> [REQ_ID=5d93521ec8a6] [PERF] Execution time=0.052018
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 01:28:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 01:28:57 --> [CSRF] token name=csrf_test_name hash=299112a7291d7892459fe1ddf555d161
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=c31914a9bec0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 01:28:57 --> [REQ_ID=c31914a9bec0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 01:28:57 --> [TRACE]
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [FILTER_AFTER]
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [LIFECYCLE][END] status=200 duration_ms=68.42 memory_delta=0
INFO - 2026-03-31 01:28:57 --> [REQ_ID=c31914a9bec0] [PERF] Execution time=0.072036
DEBUG - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [REQUEST][END]
INFO - 2026-03-31 01:28:57 --> [REQ_ID=8af1c3bb226c] [PERF] Execution time=0.083832
DEBUG - 2026-03-31 01:30:09 --> [REQ_ID=359757d2e391] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-03-31 01:30:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:30:09 --> [REQ_ID=359757d2e391] [REQUEST][END]
INFO - 2026-03-31 01:30:09 --> [REQ_ID=359757d2e391] [PERF] Execution time=0.010786
ERROR - 2026-03-31 01:30:09 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Personal-Budgeting\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Personal-Budgeting\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Personal-Budgeting\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/How-It-Works/Personal-Budgeting', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:30:09 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:31:22 --> [REQ_ID=8d6936e0a1ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:31:22 --> [REQ_ID=8d6936e0a1ee] [REQUEST][END]
INFO - 2026-03-31 01:31:22 --> [REQ_ID=8d6936e0a1ee] [PERF] Execution time=0.246714
ERROR - 2026-03-31 01:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:36:22 --> [REQ_ID=3217c5ed72d0] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:36:22 --> [REQ_ID=3217c5ed72d0] [REQUEST][END]
INFO - 2026-03-31 01:36:22 --> [REQ_ID=3217c5ed72d0] [PERF] Execution time=0.132203
ERROR - 2026-03-31 01:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:37:50 --> [REQ_ID=19303c58d6ee] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-03-31 01:37:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:37:50 --> [REQ_ID=19303c58d6ee] [REQUEST][END]
INFO - 2026-03-31 01:37:50 --> [REQ_ID=19303c58d6ee] [PERF] Execution time=0.040743
ERROR - 2026-03-31 01:37:50 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Account/Social-Media', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:37:50 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:38:06 --> [REQ_ID=89d4b921cac5] [REQUEST][START] GET /
DEBUG - 2026-03-31 01:38:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:38:06 --> [REQ_ID=89d4b921cac5] [REQUEST][END]
INFO - 2026-03-31 01:38:06 --> [REQ_ID=89d4b921cac5] [PERF] Execution time=0.009833
ERROR - 2026-03-31 01:38:07 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 01:38:07 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=41c9ca541bf9] [REQUEST][START] GET /index.php/
DEBUG - 2026-03-31 01:40:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=41c9ca541bf9] [FILTER_BEFORE] /index.php/
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=41c9ca541bf9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=41c9ca541bf9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 01:40:03 --> [CSRF] token name=csrf_test_name hash=3e98d9b557f4d37087b76a395472c6cc
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=25c68aaec881] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 01:40:03 --> [REQ_ID=25c68aaec881] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 01:40:03 --> [TRACE]
INFO - 2026-03-31 01:40:03 --> [REQ_ID=25c68aaec881] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 01:40:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 01:40:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 01:40:03 --> [REQ_ID=25c68aaec881] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 01:40:03 --> [REQ_ID=25c68aaec881] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 01:40:03 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 01:40:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 01:40:04 --> [REQ_ID=41c9ca541bf9] [FILTER_AFTER]
DEBUG - 2026-03-31 01:40:04 --> [REQ_ID=41c9ca541bf9] [LIFECYCLE][END] status=200 duration_ms=705.42 memory_delta=4194304
INFO - 2026-03-31 01:40:04 --> [REQ_ID=25c68aaec881] [PERF] Execution time=0.707213
DEBUG - 2026-03-31 01:40:04 --> [REQ_ID=41c9ca541bf9] [REQUEST][END]
INFO - 2026-03-31 01:40:04 --> [REQ_ID=41c9ca541bf9] [PERF] Execution time=0.743547
DEBUG - 2026-03-31 01:41:22 --> [REQ_ID=eb5632965278] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:41:22 --> [REQ_ID=eb5632965278] [REQUEST][END]
INFO - 2026-03-31 01:41:22 --> [REQ_ID=eb5632965278] [PERF] Execution time=0.017637
ERROR - 2026-03-31 01:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-31 01:45:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-03-31 01:45:27 --> [CSRF] token name=csrf_test_name hash=c2c4c3762b37cbe365a1029f0c801a32
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [REQUEST][END]
INFO - 2026-03-31 01:45:27 --> [REQ_ID=ee0f675e6924] [PERF] Execution time=0.046658
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 01:45:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 01:45:27 --> [CSRF] token name=csrf_test_name hash=d550b718c853fa08237c9be7786d9467
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=e0631c7b8133] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 01:45:27 --> [REQ_ID=e0631c7b8133] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 01:45:27 --> [TRACE]
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [FILTER_AFTER]
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [LIFECYCLE][END] status=200 duration_ms=146.75 memory_delta=0
INFO - 2026-03-31 01:45:27 --> [REQ_ID=e0631c7b8133] [PERF] Execution time=0.150716
DEBUG - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [REQUEST][END]
INFO - 2026-03-31 01:45:27 --> [REQ_ID=5faedb4f0074] [PERF] Execution time=0.166706
DEBUG - 2026-03-31 01:46:22 --> [REQ_ID=72e8d959c348] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:46:22 --> [REQ_ID=72e8d959c348] [REQUEST][END]
INFO - 2026-03-31 01:46:22 --> [REQ_ID=72e8d959c348] [PERF] Execution time=0.289462
ERROR - 2026-03-31 01:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:51:22 --> [REQ_ID=8174a57708fb] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:51:22 --> [REQ_ID=8174a57708fb] [REQUEST][END]
INFO - 2026-03-31 01:51:22 --> [REQ_ID=8174a57708fb] [PERF] Execution time=0.131638
ERROR - 2026-03-31 01:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 01:56:22 --> [REQ_ID=a35a8117b92e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 01:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 01:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 01:56:22 --> [REQ_ID=a35a8117b92e] [REQUEST][END]
INFO - 2026-03-31 01:56:22 --> [REQ_ID=a35a8117b92e] [PERF] Execution time=0.130350
ERROR - 2026-03-31 01:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 01:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [REQUEST][END]
INFO - 2026-03-31 02:00:01 --> [REQ_ID=372c9d65eeb8] [PERF] Execution time=0.045354
ERROR - 2026-03-31 02:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 02:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:01:22 --> [REQ_ID=f493b51571c6] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:01:22 --> [REQ_ID=f493b51571c6] [REQUEST][END]
INFO - 2026-03-31 02:01:22 --> [REQ_ID=f493b51571c6] [PERF] Execution time=0.361422
ERROR - 2026-03-31 02:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [REQUEST][START] GET /
DEBUG - 2026-03-31 02:03:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [FILTER_BEFORE] /
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 02:03:42 --> [CSRF] token name=csrf_test_name hash=45beb2dbc1c91ec0ab382709f94dbc9a
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 02:03:42 --> [TRACE]
INFO - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-31 02:03:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 02:03:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 02:03:42 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 02:03:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [FILTER_AFTER]
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [LIFECYCLE][END] status=200 duration_ms=859.39 memory_delta=4194304
INFO - 2026-03-31 02:03:42 --> [REQ_ID=7d149a66bb91] [PERF] Execution time=0.858328
DEBUG - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [REQUEST][END]
INFO - 2026-03-31 02:03:42 --> [REQ_ID=5d7b7a3a5da3] [PERF] Execution time=0.875384
DEBUG - 2026-03-31 02:06:22 --> [REQ_ID=98ce583ec66a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:06:22 --> [REQ_ID=98ce583ec66a] [REQUEST][END]
INFO - 2026-03-31 02:06:22 --> [REQ_ID=98ce583ec66a] [PERF] Execution time=0.259266
ERROR - 2026-03-31 02:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:11:22 --> [REQ_ID=4b726157e0ef] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:11:22 --> [REQ_ID=4b726157e0ef] [REQUEST][END]
INFO - 2026-03-31 02:11:22 --> [REQ_ID=4b726157e0ef] [PERF] Execution time=0.082056
ERROR - 2026-03-31 02:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [REQUEST][END]
INFO - 2026-03-31 02:15:01 --> [REQ_ID=5d6b1cb8e718] [PERF] Execution time=0.041070
ERROR - 2026-03-31 02:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 02:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:16:22 --> [REQ_ID=a1708c0acfc8] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:16:22 --> [REQ_ID=a1708c0acfc8] [REQUEST][END]
INFO - 2026-03-31 02:16:22 --> [REQ_ID=a1708c0acfc8] [PERF] Execution time=0.308072
ERROR - 2026-03-31 02:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-31 02:17:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-03-31 02:17:10 --> [CSRF] token name=csrf_test_name hash=de291a23512a04067176072c3d590f7c
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 02:17:10 --> [TRACE]
INFO - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-31 02:17:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 02:17:10 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 02:17:10 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 02:17:10 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [FILTER_AFTER]
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [LIFECYCLE][END] status=200 duration_ms=604.71 memory_delta=4194304
INFO - 2026-03-31 02:17:10 --> [REQ_ID=21048747217d] [PERF] Execution time=0.603613
DEBUG - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [REQUEST][END]
INFO - 2026-03-31 02:17:10 --> [REQ_ID=55d703f8b4a4] [PERF] Execution time=0.616976
DEBUG - 2026-03-31 02:18:00 --> [REQ_ID=c0f1fbcbabfa] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-31 02:18:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:18:00 --> [REQ_ID=c0f1fbcbabfa] [REQUEST][END]
INFO - 2026-03-31 02:18:00 --> [REQ_ID=c0f1fbcbabfa] [PERF] Execution time=0.012999
ERROR - 2026-03-31 02:18:00 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/How-It-Works', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 02:18:00 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:21:22 --> [REQ_ID=f7d4cb30a3a5] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:21:22 --> [REQ_ID=f7d4cb30a3a5] [REQUEST][END]
INFO - 2026-03-31 02:21:22 --> [REQ_ID=f7d4cb30a3a5] [PERF] Execution time=0.104971
ERROR - 2026-03-31 02:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:26:22 --> [REQ_ID=330094f4597a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:26:22 --> [REQ_ID=330094f4597a] [REQUEST][END]
INFO - 2026-03-31 02:26:22 --> [REQ_ID=330094f4597a] [PERF] Execution time=0.131882
ERROR - 2026-03-31 02:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:31:22 --> [REQ_ID=32574490509f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:31:22 --> [REQ_ID=32574490509f] [REQUEST][END]
INFO - 2026-03-31 02:31:22 --> [REQ_ID=32574490509f] [PERF] Execution time=0.170580
ERROR - 2026-03-31 02:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:36:22 --> [REQ_ID=54f070d59911] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:36:22 --> [REQ_ID=54f070d59911] [REQUEST][END]
INFO - 2026-03-31 02:36:22 --> [REQ_ID=54f070d59911] [PERF] Execution time=0.052905
ERROR - 2026-03-31 02:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:41:22 --> [REQ_ID=2fc5e39649b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:41:22 --> [REQ_ID=2fc5e39649b3] [REQUEST][END]
INFO - 2026-03-31 02:41:22 --> [REQ_ID=2fc5e39649b3] [PERF] Execution time=0.125815
ERROR - 2026-03-31 02:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:46:22 --> [REQ_ID=b07455664f0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:46:22 --> [REQ_ID=b07455664f0f] [REQUEST][END]
INFO - 2026-03-31 02:46:22 --> [REQ_ID=b07455664f0f] [PERF] Execution time=0.051705
ERROR - 2026-03-31 02:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=9017211f08e8] [REQUEST][START] GET /
DEBUG - 2026-03-31 02:50:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=9017211f08e8] [FILTER_BEFORE] /
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=9017211f08e8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=9017211f08e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 02:50:04 --> [CSRF] token name=csrf_test_name hash=de9846060673abfe011b328020b9a7d1
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=e02052b08319] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 02:50:04 --> [REQ_ID=e02052b08319] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 02:50:04 --> [TRACE]
INFO - 2026-03-31 02:50:04 --> [REQ_ID=e02052b08319] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 02:50:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 02:50:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 02:50:04 --> [REQ_ID=e02052b08319] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 02:50:04 --> [REQ_ID=e02052b08319] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 02:50:04 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 02:50:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 02:50:05 --> [REQ_ID=9017211f08e8] [FILTER_AFTER]
DEBUG - 2026-03-31 02:50:05 --> [REQ_ID=9017211f08e8] [LIFECYCLE][END] status=200 duration_ms=679.99 memory_delta=4194304
INFO - 2026-03-31 02:50:05 --> [REQ_ID=e02052b08319] [PERF] Execution time=0.681757
DEBUG - 2026-03-31 02:50:05 --> [REQ_ID=9017211f08e8] [REQUEST][END]
INFO - 2026-03-31 02:50:05 --> [REQ_ID=9017211f08e8] [PERF] Execution time=0.723852
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-31 02:50:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-03-31 02:50:36 --> [CSRF] token name=csrf_test_name hash=b42eedceb0536a699f99bfce819971de
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [REQUEST][END]
INFO - 2026-03-31 02:50:36 --> [REQ_ID=2ac5cf75ac07] [PERF] Execution time=0.011093
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 02:50:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 02:50:36 --> [CSRF] token name=csrf_test_name hash=f42f5099437bf9946e96d9b28d779c53
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=50241f5d4b5d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 02:50:36 --> [REQ_ID=50241f5d4b5d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 02:50:36 --> [TRACE]
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [FILTER_AFTER]
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [LIFECYCLE][END] status=200 duration_ms=43.32 memory_delta=0
INFO - 2026-03-31 02:50:36 --> [REQ_ID=50241f5d4b5d] [PERF] Execution time=0.043557
DEBUG - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [REQUEST][END]
INFO - 2026-03-31 02:50:36 --> [REQ_ID=d677aa7b8946] [PERF] Execution time=0.055586
DEBUG - 2026-03-31 02:51:22 --> [REQ_ID=c3318c551b35] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:51:22 --> [REQ_ID=c3318c551b35] [REQUEST][END]
INFO - 2026-03-31 02:51:22 --> [REQ_ID=c3318c551b35] [PERF] Execution time=0.014096
ERROR - 2026-03-31 02:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 02:56:22 --> [REQ_ID=18887a23c2c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 02:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 02:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 02:56:22 --> [REQ_ID=18887a23c2c3] [REQUEST][END]
INFO - 2026-03-31 02:56:22 --> [REQ_ID=18887a23c2c3] [PERF] Execution time=0.077073
ERROR - 2026-03-31 02:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 02:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [REQUEST][END]
INFO - 2026-03-31 03:00:01 --> [REQ_ID=ae4d5e0f7bd8] [PERF] Execution time=0.042697
ERROR - 2026-03-31 03:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 03:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:01:22 --> [REQ_ID=e634f1387df4] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:01:22 --> [REQ_ID=e634f1387df4] [REQUEST][END]
INFO - 2026-03-31 03:01:22 --> [REQ_ID=e634f1387df4] [PERF] Execution time=0.077763
ERROR - 2026-03-31 03:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:06:05 --> [REQ_ID=8a4c4071db9c] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-03-31 03:06:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-31 03:06:05 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Investments/Trade-Tracker
DEBUG - 2026-03-31 03:06:05 --> [REQ_ID=8a4c4071db9c] [REQUEST][END]
INFO - 2026-03-31 03:06:05 --> [REQ_ID=8a4c4071db9c] [PERF] Execution time=0.039951
DEBUG - 2026-03-31 03:06:22 --> [REQ_ID=eac4bc82354e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:06:22 --> [REQ_ID=eac4bc82354e] [REQUEST][END]
INFO - 2026-03-31 03:06:22 --> [REQ_ID=eac4bc82354e] [PERF] Execution time=0.028018
ERROR - 2026-03-31 03:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:07:20 --> [REQ_ID=a25c73409f45] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-03-31 03:07:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-31 03:07:20 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-31 03:07:20 --> [REQ_ID=a25c73409f45] [REQUEST][END]
INFO - 2026-03-31 03:07:20 --> [REQ_ID=a25c73409f45] [PERF] Execution time=0.009751
DEBUG - 2026-03-31 03:11:22 --> [REQ_ID=be0ff97c6cb3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:11:22 --> [REQ_ID=be0ff97c6cb3] [REQUEST][END]
INFO - 2026-03-31 03:11:22 --> [REQ_ID=be0ff97c6cb3] [PERF] Execution time=0.155151
ERROR - 2026-03-31 03:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=e6e7d6d0b8b7] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-03-31 03:13:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=e6e7d6d0b8b7] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=e6e7d6d0b8b7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=e6e7d6d0b8b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-03-31 03:13:54 --> [CSRF] token name=csrf_test_name hash=5b833e413021ed046fc666b16d6f9f93
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=9fd1790cb217] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-31 03:13:54 --> [REQ_ID=9fd1790cb217] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 03:13:54 --> [TRACE]
DEBUG - 2026-03-31 03:13:54 --> [REQ_ID=9fd1790cb217] [METHOD_ENTRY] index
DEBUG - 2026-03-31 03:13:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 03:13:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 03:13:54 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 03:13:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 03:13:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 03:13:54 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-31 03:13:54 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-31 03:13:54 --> [REQ_ID=9fd1790cb217] [PERF] Execution time=0.110395
DEBUG - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [REQUEST][END]
INFO - 2026-03-31 03:15:01 --> [REQ_ID=0e181578d8ea] [PERF] Execution time=0.016341
ERROR - 2026-03-31 03:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 03:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:15:17 --> [REQ_ID=1e2a9caa720b] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-03-31 03:15:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-31 03:15:17 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Knowledgebase/Tutorials
DEBUG - 2026-03-31 03:15:17 --> [REQ_ID=1e2a9caa720b] [REQUEST][END]
INFO - 2026-03-31 03:15:17 --> [REQ_ID=1e2a9caa720b] [PERF] Execution time=0.014601
DEBUG - 2026-03-31 03:16:22 --> [REQ_ID=c50abfeaa0c2] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:16:22 --> [REQ_ID=c50abfeaa0c2] [REQUEST][END]
INFO - 2026-03-31 03:16:22 --> [REQ_ID=c50abfeaa0c2] [PERF] Execution time=0.014641
ERROR - 2026-03-31 03:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:21:22 --> [REQ_ID=7beceb3a6d7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:21:22 --> [REQ_ID=7beceb3a6d7e] [REQUEST][END]
INFO - 2026-03-31 03:21:22 --> [REQ_ID=7beceb3a6d7e] [PERF] Execution time=0.077377
ERROR - 2026-03-31 03:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:26:22 --> [REQ_ID=ecced548c783] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:26:22 --> [REQ_ID=ecced548c783] [REQUEST][END]
INFO - 2026-03-31 03:26:22 --> [REQ_ID=ecced548c783] [PERF] Execution time=0.123139
ERROR - 2026-03-31 03:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:28:42 --> [REQ_ID=010b69f1de61] [REQUEST][START] GET /
DEBUG - 2026-03-31 03:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:28:42 --> [REQ_ID=010b69f1de61] [REQUEST][END]
INFO - 2026-03-31 03:28:42 --> [REQ_ID=010b69f1de61] [PERF] Execution time=0.034415
ERROR - 2026-03-31 03:28:42 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 03:28:42 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:31:22 --> [REQ_ID=edb9fd997347] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:31:22 --> [REQ_ID=edb9fd997347] [REQUEST][END]
INFO - 2026-03-31 03:31:22 --> [REQ_ID=edb9fd997347] [PERF] Execution time=0.341745
ERROR - 2026-03-31 03:31:23 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:31:23 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:36:22 --> [REQ_ID=03adda9379b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:36:22 --> [REQ_ID=03adda9379b3] [REQUEST][END]
INFO - 2026-03-31 03:36:22 --> [REQ_ID=03adda9379b3] [PERF] Execution time=0.177202
ERROR - 2026-03-31 03:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-31 03:39:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-03-31 03:39:21 --> [CSRF] token name=csrf_test_name hash=384c9ba63b93e86df4025bced8d90d83
DEBUG - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [REQUEST][END]
INFO - 2026-03-31 03:39:21 --> [REQ_ID=250bffbf14b0] [PERF] Execution time=0.053606
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 03:39:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 03:39:22 --> [CSRF] token name=csrf_test_name hash=745e3cb938cff429a8ad55f5d490de54
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=3e97b4e4d413] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 03:39:22 --> [REQ_ID=3e97b4e4d413] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 03:39:22 --> [TRACE]
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [FILTER_AFTER]
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [LIFECYCLE][END] status=200 duration_ms=183.10 memory_delta=0
INFO - 2026-03-31 03:39:22 --> [REQ_ID=3e97b4e4d413] [PERF] Execution time=0.186731
DEBUG - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [REQUEST][END]
INFO - 2026-03-31 03:39:22 --> [REQ_ID=be6692893e8a] [PERF] Execution time=0.200236
DEBUG - 2026-03-31 03:41:22 --> [REQ_ID=130c4b955e6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:41:22 --> [REQ_ID=130c4b955e6d] [REQUEST][END]
INFO - 2026-03-31 03:41:22 --> [REQ_ID=130c4b955e6d] [PERF] Execution time=0.311821
ERROR - 2026-03-31 03:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=58aa44279b0a] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-31 03:45:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=58aa44279b0a] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=58aa44279b0a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=58aa44279b0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-03-31 03:45:45 --> [CSRF] token name=csrf_test_name hash=36ea1239f18ce82b4786444b8e681dd1
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=2c8f3a1a5b35] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-31 03:45:45 --> [REQ_ID=2c8f3a1a5b35] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 03:45:45 --> [TRACE]
DEBUG - 2026-03-31 03:45:45 --> [REQ_ID=2c8f3a1a5b35] [METHOD_ENTRY] show
DEBUG - 2026-03-31 03:45:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 03:45:45 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 03:45:45 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 03:45:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 03:45:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 03:45:45 --> MyMIWallets skipped (no user context)
ERROR - 2026-03-31 03:45:45 --> HowItWorksController failure: Cannot access protected property CodeIgniter\HTTP\IncomingRequest::$uri
INFO - 2026-03-31 03:45:45 --> [REQ_ID=2c8f3a1a5b35] [PERF] Execution time=0.162677
DEBUG - 2026-03-31 03:46:22 --> [REQ_ID=5257ab2f0a09] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:46:22 --> [REQ_ID=5257ab2f0a09] [REQUEST][END]
INFO - 2026-03-31 03:46:22 --> [REQ_ID=5257ab2f0a09] [PERF] Execution time=0.044406
ERROR - 2026-03-31 03:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:49:05 --> [REQ_ID=0bcce4488a1e] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-03-31 03:49:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 03:49:05 --> [REQ_ID=0bcce4488a1e] [REQUEST][END]
INFO - 2026-03-31 03:49:05 --> [REQ_ID=0bcce4488a1e] [PERF] Execution time=0.038801
ERROR - 2026-03-31 03:49:06 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Assets\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Assets\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Assets\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Knowledgebase/Assets', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 03:49:06 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:51:22 --> [REQ_ID=1b9c9564ee3b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:51:22 --> [REQ_ID=1b9c9564ee3b] [REQUEST][END]
INFO - 2026-03-31 03:51:22 --> [REQ_ID=1b9c9564ee3b] [PERF] Execution time=0.076142
ERROR - 2026-03-31 03:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 03:56:22 --> [REQ_ID=daf08ddf56ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 03:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 03:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 03:56:22 --> [REQ_ID=daf08ddf56ca] [REQUEST][END]
INFO - 2026-03-31 03:56:22 --> [REQ_ID=daf08ddf56ca] [PERF] Execution time=0.308620
ERROR - 2026-03-31 03:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 03:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [REQUEST][END]
INFO - 2026-03-31 04:00:02 --> [REQ_ID=747e74f25c63] [PERF] Execution time=0.043896
ERROR - 2026-03-31 04:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 04:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:01:22 --> [REQ_ID=148550e4b85d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:01:22 --> [REQ_ID=148550e4b85d] [REQUEST][END]
INFO - 2026-03-31 04:01:22 --> [REQ_ID=148550e4b85d] [PERF] Execution time=0.148635
ERROR - 2026-03-31 04:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:02:38 --> [REQ_ID=8c64da479720] [REQUEST][START] GET /
DEBUG - 2026-03-31 04:02:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:02:38 --> [REQ_ID=8c64da479720] [FILTER_BEFORE] /
DEBUG - 2026-03-31 04:02:38 --> [REQ_ID=8c64da479720] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 04:02:38 --> [REQ_ID=8c64da479720] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 04:02:38 --> [CSRF] token name=csrf_test_name hash=66d831c68dc4f92bdee1c7bd8d5b5702
DEBUG - 2026-03-31 04:02:38 --> [REQ_ID=0a285c6db156] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 04:02:38 --> [REQ_ID=0a285c6db156] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 04:02:38 --> [TRACE]
INFO - 2026-03-31 04:02:38 --> [REQ_ID=0a285c6db156] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 04:02:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 04:02:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 04:02:39 --> [REQ_ID=0a285c6db156] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 04:02:39 --> [REQ_ID=0a285c6db156] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 04:02:39 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 04:02:39 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 04:02:39 --> [REQ_ID=8c64da479720] [FILTER_AFTER]
DEBUG - 2026-03-31 04:02:39 --> [REQ_ID=8c64da479720] [LIFECYCLE][END] status=200 duration_ms=736.33 memory_delta=4194304
INFO - 2026-03-31 04:02:39 --> [REQ_ID=0a285c6db156] [PERF] Execution time=0.739058
DEBUG - 2026-03-31 04:02:39 --> [REQ_ID=8c64da479720] [REQUEST][END]
INFO - 2026-03-31 04:02:39 --> [REQ_ID=8c64da479720] [PERF] Execution time=0.775644
DEBUG - 2026-03-31 04:06:22 --> [REQ_ID=dc3dbb4d72b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:06:22 --> [REQ_ID=dc3dbb4d72b1] [REQUEST][END]
INFO - 2026-03-31 04:06:22 --> [REQ_ID=dc3dbb4d72b1] [PERF] Execution time=0.128800
ERROR - 2026-03-31 04:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:11:22 --> [REQ_ID=9a4c5d613107] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:11:22 --> [REQ_ID=9a4c5d613107] [REQUEST][END]
INFO - 2026-03-31 04:11:22 --> [REQ_ID=9a4c5d613107] [PERF] Execution time=0.089361
ERROR - 2026-03-31 04:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [REQUEST][END]
INFO - 2026-03-31 04:15:01 --> [REQ_ID=b974bffdb46c] [PERF] Execution time=0.046690
ERROR - 2026-03-31 04:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 04:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:16:22 --> [REQ_ID=dc115deeba05] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:16:22 --> [REQ_ID=dc115deeba05] [REQUEST][END]
INFO - 2026-03-31 04:16:22 --> [REQ_ID=dc115deeba05] [PERF] Execution time=0.099045
ERROR - 2026-03-31 04:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:17:33 --> [REQ_ID=eaed13db8e53] [REQUEST][START] GET /
DEBUG - 2026-03-31 04:17:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:17:33 --> [REQ_ID=eaed13db8e53] [FILTER_BEFORE] /
DEBUG - 2026-03-31 04:17:33 --> [REQ_ID=eaed13db8e53] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 04:17:33 --> [REQ_ID=eaed13db8e53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 04:17:33 --> [CSRF] token name=csrf_test_name hash=6e8af8391a234d770c4f1ae4fbdfd14f
DEBUG - 2026-03-31 04:17:33 --> [REQ_ID=52b3d3c11b51] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 04:17:33 --> [REQ_ID=52b3d3c11b51] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 04:17:33 --> [TRACE]
INFO - 2026-03-31 04:17:33 --> [REQ_ID=52b3d3c11b51] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 04:17:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 04:17:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 04:17:34 --> [REQ_ID=52b3d3c11b51] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 04:17:34 --> [REQ_ID=52b3d3c11b51] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 04:17:34 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 04:17:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 04:17:34 --> [REQ_ID=eaed13db8e53] [FILTER_AFTER]
DEBUG - 2026-03-31 04:17:34 --> [REQ_ID=eaed13db8e53] [LIFECYCLE][END] status=200 duration_ms=623.95 memory_delta=4194304
INFO - 2026-03-31 04:17:34 --> [REQ_ID=52b3d3c11b51] [PERF] Execution time=0.621951
DEBUG - 2026-03-31 04:17:34 --> [REQ_ID=eaed13db8e53] [REQUEST][END]
INFO - 2026-03-31 04:17:34 --> [REQ_ID=eaed13db8e53] [PERF] Execution time=0.638900
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-03-31 04:17:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-03-31 04:17:58 --> [CSRF] token name=csrf_test_name hash=f2598146002dd094ffc3213209c3deb9
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [REQUEST][END]
INFO - 2026-03-31 04:17:58 --> [REQ_ID=10d5c486940c] [PERF] Execution time=0.014273
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 04:17:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 04:17:58 --> [CSRF] token name=csrf_test_name hash=20c0e37f8337c025361cd70374929a50
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=073da63a6dde] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 04:17:58 --> [REQ_ID=073da63a6dde] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 04:17:58 --> [TRACE]
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [FILTER_AFTER]
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [LIFECYCLE][END] status=200 duration_ms=51.44 memory_delta=0
INFO - 2026-03-31 04:17:58 --> [REQ_ID=073da63a6dde] [PERF] Execution time=0.051499
DEBUG - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [REQUEST][END]
INFO - 2026-03-31 04:17:58 --> [REQ_ID=78f3e0b1e75e] [PERF] Execution time=0.064037
DEBUG - 2026-03-31 04:20:11 --> [REQ_ID=1233bb6d08da] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-03-31 04:20:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-31 04:20:11 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Features/Brokerage-Integrations
DEBUG - 2026-03-31 04:20:11 --> [REQ_ID=1233bb6d08da] [REQUEST][END]
INFO - 2026-03-31 04:20:11 --> [REQ_ID=1233bb6d08da] [PERF] Execution time=0.039119
DEBUG - 2026-03-31 04:21:22 --> [REQ_ID=989dcbad8681] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:21:22 --> [REQ_ID=989dcbad8681] [REQUEST][END]
INFO - 2026-03-31 04:21:22 --> [REQ_ID=989dcbad8681] [PERF] Execution time=0.277451
ERROR - 2026-03-31 04:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:26:22 --> [REQ_ID=e137de633e07] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:26:22 --> [REQ_ID=e137de633e07] [REQUEST][END]
INFO - 2026-03-31 04:26:22 --> [REQ_ID=e137de633e07] [PERF] Execution time=0.260798
ERROR - 2026-03-31 04:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-03-31 04:26:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-03-31 04:26:40 --> [CSRF] token name=csrf_test_name hash=e3c09724fbedb9546f9f1e7168bd50f0
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [REQUEST][END]
INFO - 2026-03-31 04:26:40 --> [REQ_ID=0231952653e3] [PERF] Execution time=0.022789
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 04:26:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 04:26:40 --> [CSRF] token name=csrf_test_name hash=d9feaffffab061b9d87decc06f8f250c
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=14babbe26c70] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 04:26:40 --> [REQ_ID=14babbe26c70] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 04:26:40 --> [TRACE]
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [FILTER_AFTER]
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [LIFECYCLE][END] status=200 duration_ms=34.28 memory_delta=0
INFO - 2026-03-31 04:26:40 --> [REQ_ID=14babbe26c70] [PERF] Execution time=0.034351
DEBUG - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [REQUEST][END]
INFO - 2026-03-31 04:26:40 --> [REQ_ID=0e87723fc176] [PERF] Execution time=0.046194
DEBUG - 2026-03-31 04:31:22 --> [REQ_ID=d432ad4cbd40] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:31:22 --> [REQ_ID=d432ad4cbd40] [REQUEST][END]
INFO - 2026-03-31 04:31:22 --> [REQ_ID=d432ad4cbd40] [PERF] Execution time=0.225853
ERROR - 2026-03-31 04:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:36:22 --> [REQ_ID=4cef0172954a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:36:22 --> [REQ_ID=4cef0172954a] [REQUEST][END]
INFO - 2026-03-31 04:36:22 --> [REQ_ID=4cef0172954a] [PERF] Execution time=0.076228
ERROR - 2026-03-31 04:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:41:22 --> [REQ_ID=f435686d4f9b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:41:22 --> [REQ_ID=f435686d4f9b] [REQUEST][END]
INFO - 2026-03-31 04:41:22 --> [REQ_ID=f435686d4f9b] [PERF] Execution time=0.181349
ERROR - 2026-03-31 04:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:46:22 --> [REQ_ID=5c047fdc7a0f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:46:22 --> [REQ_ID=5c047fdc7a0f] [REQUEST][END]
INFO - 2026-03-31 04:46:22 --> [REQ_ID=5c047fdc7a0f] [PERF] Execution time=0.233050
ERROR - 2026-03-31 04:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-31 04:48:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-03-31 04:48:07 --> [CSRF] token name=csrf_test_name hash=b53f11bb63561a4e766f57256466dc59
DEBUG - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [REQUEST][END]
INFO - 2026-03-31 04:48:07 --> [REQ_ID=fc43fffb3fb8] [PERF] Execution time=0.054857
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 04:48:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 04:48:08 --> [CSRF] token name=csrf_test_name hash=9c5e77459d3f12b73af7d38dddc226a4
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=fd0d916d9260] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 04:48:08 --> [REQ_ID=fd0d916d9260] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 04:48:08 --> [TRACE]
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [FILTER_AFTER]
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [LIFECYCLE][END] status=200 duration_ms=120.90 memory_delta=0
INFO - 2026-03-31 04:48:08 --> [REQ_ID=fd0d916d9260] [PERF] Execution time=0.124312
DEBUG - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [REQUEST][END]
INFO - 2026-03-31 04:48:08 --> [REQ_ID=bfd9360b563f] [PERF] Execution time=0.136950
DEBUG - 2026-03-31 04:51:22 --> [REQ_ID=777c791934a0] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:51:22 --> [REQ_ID=777c791934a0] [REQUEST][END]
INFO - 2026-03-31 04:51:22 --> [REQ_ID=777c791934a0] [PERF] Execution time=0.073703
ERROR - 2026-03-31 04:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 04:53:26 --> [REQ_ID=f73ed139b770] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-03-31 04:53:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-03-31 04:53:26 --> REDIRECTED ROUTE at https://www.mymiwallet.com/Advisor
DEBUG - 2026-03-31 04:53:26 --> [REQ_ID=f73ed139b770] [REQUEST][END]
INFO - 2026-03-31 04:53:26 --> [REQ_ID=f73ed139b770] [PERF] Execution time=0.040443
DEBUG - 2026-03-31 04:56:22 --> [REQ_ID=fd5a115e5f59] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 04:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 04:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 04:56:22 --> [REQ_ID=fd5a115e5f59] [REQUEST][END]
INFO - 2026-03-31 04:56:22 --> [REQ_ID=fd5a115e5f59] [PERF] Execution time=0.248854
ERROR - 2026-03-31 04:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 04:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [REQUEST][END]
INFO - 2026-03-31 05:00:01 --> [REQ_ID=4b16194ac206] [PERF] Execution time=0.044508
ERROR - 2026-03-31 05:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 05:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:01:22 --> [REQ_ID=1607f84a7cea] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:01:22 --> [REQ_ID=1607f84a7cea] [REQUEST][END]
INFO - 2026-03-31 05:01:22 --> [REQ_ID=1607f84a7cea] [PERF] Execution time=0.151130
ERROR - 2026-03-31 05:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:06:22 --> [REQ_ID=a12f936adf49] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:06:22 --> [REQ_ID=a12f936adf49] [REQUEST][END]
INFO - 2026-03-31 05:06:22 --> [REQ_ID=a12f936adf49] [PERF] Execution time=0.053172
ERROR - 2026-03-31 05:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:11:22 --> [REQ_ID=2dbfd42c2f12] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:11:22 --> [REQ_ID=2dbfd42c2f12] [REQUEST][END]
INFO - 2026-03-31 05:11:22 --> [REQ_ID=2dbfd42c2f12] [PERF] Execution time=0.332294
ERROR - 2026-03-31 05:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [REQUEST][END]
INFO - 2026-03-31 05:15:01 --> [REQ_ID=114c63865510] [PERF] Execution time=0.044719
ERROR - 2026-03-31 05:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 05:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:16:22 --> [REQ_ID=b961c08d522f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:16:22 --> [REQ_ID=b961c08d522f] [REQUEST][END]
INFO - 2026-03-31 05:16:22 --> [REQ_ID=b961c08d522f] [PERF] Execution time=0.076135
ERROR - 2026-03-31 05:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:21:22 --> [REQ_ID=d2a4cedaeedb] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:21:22 --> [REQ_ID=d2a4cedaeedb] [REQUEST][END]
INFO - 2026-03-31 05:21:22 --> [REQ_ID=d2a4cedaeedb] [PERF] Execution time=0.049685
ERROR - 2026-03-31 05:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [REQUEST][START] GET /index.php/Management/Wallets
DEBUG - 2026-03-31 05:21:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [FILTER_BEFORE] /index.php/Management/Wallets
DEBUG - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [ROUTE] Controller=\App\Modules\Management\Controllers\WalletsController Method=index
DEBUG - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Wallets
DEBUG - 2026-03-31 05:21:30 --> [CSRF] token name=csrf_test_name hash=74c1b047e189f3eaf7777358e09d00cd
DEBUG - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [REQUEST][END]
INFO - 2026-03-31 05:21:30 --> [REQ_ID=e3bef83be5a3] [PERF] Execution time=0.019273
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 05:21:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 05:21:31 --> [CSRF] token name=csrf_test_name hash=5a3d2970283f6d42ceb579149bca49da
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=022350723335] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 05:21:31 --> [REQ_ID=022350723335] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 05:21:31 --> [TRACE]
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [FILTER_AFTER]
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [LIFECYCLE][END] status=200 duration_ms=95.48 memory_delta=0
INFO - 2026-03-31 05:21:31 --> [REQ_ID=022350723335] [PERF] Execution time=0.095561
DEBUG - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [REQUEST][END]
INFO - 2026-03-31 05:21:31 --> [REQ_ID=52a70f42cd22] [PERF] Execution time=0.112155
DEBUG - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-03-31 05:24:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-03-31 05:24:26 --> [CSRF] token name=csrf_test_name hash=c22fcee351b55d30e23463afdce58ba8
DEBUG - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [REQUEST][END]
INFO - 2026-03-31 05:24:26 --> [REQ_ID=c63a19d7ed2c] [PERF] Execution time=0.052259
DEBUG - 2026-03-31 05:24:32 --> [REQ_ID=869defcba9a5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 05:24:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:24:32 --> [REQ_ID=869defcba9a5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 05:24:32 --> [REQ_ID=869defcba9a5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 05:24:32 --> [REQ_ID=869defcba9a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 05:24:32 --> [CSRF] token name=csrf_test_name hash=a4967a78c8b742ca2f51ccb618801a1e
DEBUG - 2026-03-31 05:24:32 --> [REQ_ID=d0237b8e56b0] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 05:24:32 --> [REQ_ID=d0237b8e56b0] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 05:24:32 --> [TRACE]
DEBUG - 2026-03-31 05:24:33 --> [REQ_ID=869defcba9a5] [FILTER_AFTER]
DEBUG - 2026-03-31 05:24:33 --> [REQ_ID=869defcba9a5] [LIFECYCLE][END] status=200 duration_ms=396.92 memory_delta=0
INFO - 2026-03-31 05:24:33 --> [REQ_ID=d0237b8e56b0] [PERF] Execution time=0.401190
DEBUG - 2026-03-31 05:24:33 --> [REQ_ID=869defcba9a5] [REQUEST][END]
INFO - 2026-03-31 05:24:33 --> [REQ_ID=869defcba9a5] [PERF] Execution time=0.417699
DEBUG - 2026-03-31 05:26:22 --> [REQ_ID=4113ed3d3840] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:26:22 --> [REQ_ID=4113ed3d3840] [REQUEST][END]
INFO - 2026-03-31 05:26:22 --> [REQ_ID=4113ed3d3840] [PERF] Execution time=0.154837
ERROR - 2026-03-31 05:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:31:22 --> [REQ_ID=457fa673c44f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:31:22 --> [REQ_ID=457fa673c44f] [REQUEST][END]
INFO - 2026-03-31 05:31:22 --> [REQ_ID=457fa673c44f] [PERF] Execution time=0.181727
ERROR - 2026-03-31 05:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:36:22 --> [REQ_ID=b0f0f744a1d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:36:22 --> [REQ_ID=b0f0f744a1d9] [REQUEST][END]
INFO - 2026-03-31 05:36:22 --> [REQ_ID=b0f0f744a1d9] [PERF] Execution time=0.151296
ERROR - 2026-03-31 05:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:41:22 --> [REQ_ID=6cae20a32638] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:41:22 --> [REQ_ID=6cae20a32638] [REQUEST][END]
INFO - 2026-03-31 05:41:22 --> [REQ_ID=6cae20a32638] [PERF] Execution time=0.082080
ERROR - 2026-03-31 05:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-03-31 05:44:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-03-31 05:44:09 --> [CSRF] token name=csrf_test_name hash=2df307c9a2eefe84e2770f9d30fb8cfb
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [REQUEST][END]
INFO - 2026-03-31 05:44:09 --> [REQ_ID=6807bba345fb] [PERF] Execution time=0.051442
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 05:44:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 05:44:09 --> [CSRF] token name=csrf_test_name hash=0a911aa1eb1c811be2105ec4cd6fb8f4
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=1d01e0df94d9] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 05:44:09 --> [REQ_ID=1d01e0df94d9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 05:44:09 --> [TRACE]
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [FILTER_AFTER]
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [LIFECYCLE][END] status=200 duration_ms=109.17 memory_delta=0
INFO - 2026-03-31 05:44:09 --> [REQ_ID=1d01e0df94d9] [PERF] Execution time=0.113002
DEBUG - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [REQUEST][END]
INFO - 2026-03-31 05:44:09 --> [REQ_ID=c4ea48d90aef] [PERF] Execution time=0.129934
DEBUG - 2026-03-31 05:46:22 --> [REQ_ID=24abaaece322] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:46:22 --> [REQ_ID=24abaaece322] [REQUEST][END]
INFO - 2026-03-31 05:46:22 --> [REQ_ID=24abaaece322] [PERF] Execution time=0.076752
ERROR - 2026-03-31 05:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:51:22 --> [REQ_ID=3ea2b147fd49] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:51:22 --> [REQ_ID=3ea2b147fd49] [REQUEST][END]
INFO - 2026-03-31 05:51:22 --> [REQ_ID=3ea2b147fd49] [PERF] Execution time=0.132738
ERROR - 2026-03-31 05:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:56:22 --> [REQ_ID=ba559664d491] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 05:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 05:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 05:56:22 --> [REQ_ID=ba559664d491] [REQUEST][END]
INFO - 2026-03-31 05:56:22 --> [REQ_ID=ba559664d491] [PERF] Execution time=0.126170
ERROR - 2026-03-31 05:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 05:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=cd23ef4448aa] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-31 05:58:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=cd23ef4448aa] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=cd23ef4448aa] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=SettingFinancialGoals
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=cd23ef4448aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-03-31 05:58:04 --> [CSRF] token name=csrf_test_name hash=01fbad1acda3ca5103f2271f1223f791
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=e5a752d12917] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-31 05:58:04 --> [REQ_ID=e5a752d12917] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 05:58:04 --> [TRACE]
DEBUG - 2026-03-31 05:58:04 --> [REQ_ID=e5a752d12917] [METHOD_ENTRY] SettingFinancialGoals
DEBUG - 2026-03-31 05:58:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 05:58:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 05:58:04 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 05:58:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 05:58:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 05:58:04 --> MyMIWallets skipped (no user context)
INFO - 2026-03-31 05:58:04 --> [REQ_ID=e5a752d12917] [MEMORY][commonData:start] 6291456
INFO - 2026-03-31 05:58:05 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 05:58:05 --> [MetaService] slug=how-it-works/setting-financial-goals pageName= cacheHit= path=DB
DEBUG - 2026-03-31 05:58:05 --> [REQ_ID=cd23ef4448aa] [FILTER_AFTER]
DEBUG - 2026-03-31 05:58:05 --> [REQ_ID=cd23ef4448aa] [LIFECYCLE][END] status=200 duration_ms=779.23 memory_delta=4194304
INFO - 2026-03-31 05:58:05 --> [REQ_ID=e5a752d12917] [PERF] Execution time=0.781099
DEBUG - 2026-03-31 05:58:05 --> [REQ_ID=cd23ef4448aa] [REQUEST][END]
INFO - 2026-03-31 05:58:05 --> [REQ_ID=cd23ef4448aa] [PERF] Execution time=0.822677
DEBUG - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [REQUEST][END]
INFO - 2026-03-31 06:00:01 --> [REQ_ID=660040304201] [PERF] Execution time=0.048399
ERROR - 2026-03-31 06:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 06:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:00:12 --> [REQ_ID=4c88ff9e9587] [REQUEST][START] GET /
DEBUG - 2026-03-31 06:00:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 06:00:12 --> [REQ_ID=4c88ff9e9587] [FILTER_BEFORE] /
DEBUG - 2026-03-31 06:00:12 --> [REQ_ID=4c88ff9e9587] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 06:00:12 --> [REQ_ID=4c88ff9e9587] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 06:00:12 --> [CSRF] token name=csrf_test_name hash=decac85d73f584febab9a4f3e50d3df0
DEBUG - 2026-03-31 06:00:12 --> [REQ_ID=d869bea4e813] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 06:00:12 --> [REQ_ID=d869bea4e813] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 06:00:12 --> [TRACE]
INFO - 2026-03-31 06:00:12 --> [REQ_ID=d869bea4e813] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 06:00:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 06:00:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 06:00:13 --> [REQ_ID=d869bea4e813] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 06:00:13 --> [REQ_ID=d869bea4e813] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 06:00:13 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 06:00:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 06:00:13 --> [REQ_ID=4c88ff9e9587] [FILTER_AFTER]
DEBUG - 2026-03-31 06:00:13 --> [REQ_ID=4c88ff9e9587] [LIFECYCLE][END] status=200 duration_ms=693.74 memory_delta=4194304
INFO - 2026-03-31 06:00:13 --> [REQ_ID=d869bea4e813] [PERF] Execution time=0.696779
DEBUG - 2026-03-31 06:00:13 --> [REQ_ID=4c88ff9e9587] [REQUEST][END]
INFO - 2026-03-31 06:00:13 --> [REQ_ID=4c88ff9e9587] [PERF] Execution time=0.716776
DEBUG - 2026-03-31 06:01:22 --> [REQ_ID=e8fe48c10a7c] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:01:22 --> [REQ_ID=e8fe48c10a7c] [REQUEST][END]
INFO - 2026-03-31 06:01:22 --> [REQ_ID=e8fe48c10a7c] [PERF] Execution time=0.044825
ERROR - 2026-03-31 06:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:06:22 --> [REQ_ID=50d1cefd5ad9] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:06:22 --> [REQ_ID=50d1cefd5ad9] [REQUEST][END]
INFO - 2026-03-31 06:06:22 --> [REQ_ID=50d1cefd5ad9] [PERF] Execution time=0.052145
ERROR - 2026-03-31 06:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:09:30 --> [REQ_ID=a335bc79abe7] [REQUEST][START] GET /index.php/News/Pre-Market-Movers/November-16th-2021
DEBUG - 2026-03-31 06:09:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:09:30 --> [404_ROUTE]
DEBUG - 2026-03-31 06:09:30 --> [REQ_ID=a335bc79abe7] [REQUEST][END]
INFO - 2026-03-31 06:09:30 --> [REQ_ID=a335bc79abe7] [PERF] Execution time=0.127491
ERROR - 2026-03-31 06:09:30 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Pre-Market-Movers/November-16th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Pre-Market-Movers/November-16th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Pre-Market-Movers/November-16th-2021\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/News/Pre-Market-Movers/November-16th-2021', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 06:09:30 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:11:22 --> [REQ_ID=87bf5df2e8fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:11:22 --> [REQ_ID=87bf5df2e8fe] [REQUEST][END]
INFO - 2026-03-31 06:11:22 --> [REQ_ID=87bf5df2e8fe] [PERF] Execution time=0.055242
ERROR - 2026-03-31 06:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [REQUEST][END]
INFO - 2026-03-31 06:15:01 --> [REQ_ID=37a6cc558fcf] [PERF] Execution time=0.041861
ERROR - 2026-03-31 06:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 06:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:16:22 --> [REQ_ID=5e84411b7748] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:16:22 --> [REQ_ID=5e84411b7748] [REQUEST][END]
INFO - 2026-03-31 06:16:22 --> [REQ_ID=5e84411b7748] [PERF] Execution time=0.078920
ERROR - 2026-03-31 06:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:21:22 --> [REQ_ID=ea9845bdd910] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:21:22 --> [REQ_ID=ea9845bdd910] [REQUEST][END]
INFO - 2026-03-31 06:21:22 --> [REQ_ID=ea9845bdd910] [PERF] Execution time=0.234236
ERROR - 2026-03-31 06:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:26:22 --> [REQ_ID=9cc7d1a9cd1a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:26:22 --> [REQ_ID=9cc7d1a9cd1a] [REQUEST][END]
INFO - 2026-03-31 06:26:22 --> [REQ_ID=9cc7d1a9cd1a] [PERF] Execution time=0.123206
ERROR - 2026-03-31 06:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:29:41 --> [REQ_ID=781d09bc3568] [REQUEST][START] GET /index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting
DEBUG - 2026-03-31 06:29:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 06:29:41 --> [REQ_ID=781d09bc3568] [REQUEST][END]
INFO - 2026-03-31 06:29:41 --> [REQ_ID=781d09bc3568] [PERF] Execution time=0.036099
ERROR - 2026-03-31 06:29:41 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 06:29:41 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:31:22 --> [REQ_ID=cfeff46a7d45] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:31:22 --> [REQ_ID=cfeff46a7d45] [REQUEST][END]
INFO - 2026-03-31 06:31:22 --> [REQ_ID=cfeff46a7d45] [PERF] Execution time=0.153650
ERROR - 2026-03-31 06:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:36:22 --> [REQ_ID=2067d9ab0e1e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:36:22 --> [REQ_ID=2067d9ab0e1e] [REQUEST][END]
INFO - 2026-03-31 06:36:22 --> [REQ_ID=2067d9ab0e1e] [PERF] Execution time=0.052707
ERROR - 2026-03-31 06:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:41:22 --> [REQ_ID=ff371b49a169] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:41:22 --> [REQ_ID=ff371b49a169] [REQUEST][END]
INFO - 2026-03-31 06:41:22 --> [REQ_ID=ff371b49a169] [PERF] Execution time=0.194162
ERROR - 2026-03-31 06:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:46:22 --> [REQ_ID=3bae85a3ae4f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:46:22 --> [REQ_ID=3bae85a3ae4f] [REQUEST][END]
INFO - 2026-03-31 06:46:22 --> [REQ_ID=3bae85a3ae4f] [PERF] Execution time=0.276521
ERROR - 2026-03-31 06:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:51:22 --> [REQ_ID=b897137fc55e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:51:22 --> [REQ_ID=b897137fc55e] [REQUEST][END]
INFO - 2026-03-31 06:51:22 --> [REQ_ID=b897137fc55e] [PERF] Execution time=0.129559
ERROR - 2026-03-31 06:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:56:22 --> [REQ_ID=bf4dbf43f1ca] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 06:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 06:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 06:56:22 --> [REQ_ID=bf4dbf43f1ca] [REQUEST][END]
INFO - 2026-03-31 06:56:22 --> [REQ_ID=bf4dbf43f1ca] [PERF] Execution time=0.219973
ERROR - 2026-03-31 06:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 06:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 06:57:05 --> [REQ_ID=87fc4edd0d70] [REQUEST][START] GET /
DEBUG - 2026-03-31 06:57:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 06:57:06 --> [REQ_ID=87fc4edd0d70] [REQUEST][END]
INFO - 2026-03-31 06:57:06 --> [REQ_ID=87fc4edd0d70] [PERF] Execution time=0.013232
ERROR - 2026-03-31 06:57:06 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 06:57:06 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
INFO - 2026-03-31 07:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-03-31 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:02 --> [spark:aiops:run] Intent
INFO - 2026-03-31 07:00:02 --> [spark:ops:work] Started
INFO - 2026-03-31 07:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-03-31 07:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 07:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [REQUEST][END]
INFO - 2026-03-31 07:00:02 --> [REQ_ID=783c612187a0] [PERF] Execution time=0.093650
INFO - 2026-03-31 07:00:02 --> [spark:ops:work] Completed
INFO - 2026-03-31 07:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.343745
INFO - 2026-03-31 07:00:02 --> [SPARK_MEMORY] 20971520
ERROR - 2026-03-31 07:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 07:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
INFO - 2026-03-31 07:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-31 07:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-31 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-03-31 07:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-31 07:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.008615
INFO - 2026-03-31 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-03-31 07:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-03-31 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-03-31 07:00:04 --> LOG_HEALTHCHECK debug marker=d97ddb35f270
INFO - 2026-03-31 07:00:04 --> LOG_HEALTHCHECK info marker=d97ddb35f270
NOTICE - 2026-03-31 07:00:04 --> LOG_HEALTHCHECK probe marker=d97ddb35f270
INFO - 2026-03-31 07:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-03-31 07:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.031992
INFO - 2026-03-31 07:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 07:00:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=2.749644
INFO - 2026-03-31 07:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-03-31 07:01:22 --> [REQ_ID=2334820be481] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:01:22 --> [REQ_ID=2334820be481] [REQUEST][END]
INFO - 2026-03-31 07:01:22 --> [REQ_ID=2334820be481] [PERF] Execution time=0.143789
ERROR - 2026-03-31 07:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:06:22 --> [REQ_ID=a4ce8ae3feba] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:06:22 --> [REQ_ID=a4ce8ae3feba] [REQUEST][END]
INFO - 2026-03-31 07:06:22 --> [REQ_ID=a4ce8ae3feba] [PERF] Execution time=0.277690
ERROR - 2026-03-31 07:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:11:22 --> [REQ_ID=260dc1ffb262] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:11:22 --> [REQ_ID=260dc1ffb262] [REQUEST][END]
INFO - 2026-03-31 07:11:22 --> [REQ_ID=260dc1ffb262] [PERF] Execution time=0.324604
ERROR - 2026-03-31 07:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [REQUEST][END]
INFO - 2026-03-31 07:15:01 --> [REQ_ID=6c8d09578770] [PERF] Execution time=0.052346
ERROR - 2026-03-31 07:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 07:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:16:22 --> [REQ_ID=c577164d983e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:16:22 --> [REQ_ID=c577164d983e] [REQUEST][END]
INFO - 2026-03-31 07:16:22 --> [REQ_ID=c577164d983e] [PERF] Execution time=0.179222
ERROR - 2026-03-31 07:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-03-31 07:19:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-03-31 07:19:04 --> [CSRF] token name=csrf_test_name hash=9d495dfee454a15eb83a12273ac14183
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [REQUEST][END]
INFO - 2026-03-31 07:19:04 --> [REQ_ID=4c84c9c852a9] [PERF] Execution time=0.050104
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=08b84a0e6db3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 07:19:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=08b84a0e6db3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=08b84a0e6db3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=08b84a0e6db3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 07:19:04 --> [CSRF] token name=csrf_test_name hash=ec9a2fc562c92651c0db5d6bfc9830b2
DEBUG - 2026-03-31 07:19:04 --> [REQ_ID=fe44df200fa3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 07:19:04 --> [REQ_ID=fe44df200fa3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 07:19:04 --> [TRACE]
DEBUG - 2026-03-31 07:19:05 --> [REQ_ID=08b84a0e6db3] [FILTER_AFTER]
DEBUG - 2026-03-31 07:19:05 --> [REQ_ID=08b84a0e6db3] [LIFECYCLE][END] status=200 duration_ms=277.51 memory_delta=0
INFO - 2026-03-31 07:19:05 --> [REQ_ID=fe44df200fa3] [PERF] Execution time=0.281156
DEBUG - 2026-03-31 07:19:05 --> [REQ_ID=08b84a0e6db3] [REQUEST][END]
INFO - 2026-03-31 07:19:05 --> [REQ_ID=08b84a0e6db3] [PERF] Execution time=0.293477
DEBUG - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [REQUEST][START] GET /index.php/Profile/
DEBUG - 2026-03-31 07:20:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [FILTER_BEFORE] /index.php/Profile/
DEBUG - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile/
DEBUG - 2026-03-31 07:20:01 --> [CSRF] token name=csrf_test_name hash=fd12e4a1504c011a1cd8af6f7f5a424b
DEBUG - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [REQUEST][END]
INFO - 2026-03-31 07:20:01 --> [REQ_ID=e71bec82b55d] [PERF] Execution time=0.010370
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 07:20:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 07:20:02 --> [CSRF] token name=csrf_test_name hash=0a10102a2a4abbd6b6436aaa7ffff275
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=ca7cd9775a2b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 07:20:02 --> [REQ_ID=ca7cd9775a2b] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 07:20:02 --> [TRACE]
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [FILTER_AFTER]
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [LIFECYCLE][END] status=200 duration_ms=16.25 memory_delta=0
INFO - 2026-03-31 07:20:02 --> [REQ_ID=ca7cd9775a2b] [PERF] Execution time=0.016323
DEBUG - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [REQUEST][END]
INFO - 2026-03-31 07:20:02 --> [REQ_ID=2cac15a19c37] [PERF] Execution time=0.027118
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-03-31 07:20:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-03-31 07:20:26 --> [CSRF] token name=csrf_test_name hash=8fed05f6e5167f863a9906ac05525220
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [REQUEST][END]
INFO - 2026-03-31 07:20:26 --> [REQ_ID=953c932a8f18] [PERF] Execution time=0.011605
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 07:20:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 07:20:26 --> [CSRF] token name=csrf_test_name hash=f92ab3dd96fdae4571dc42c27614cc4e
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d259c503b249] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 07:20:26 --> [REQ_ID=d259c503b249] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 07:20:26 --> [TRACE]
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [FILTER_AFTER]
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [LIFECYCLE][END] status=200 duration_ms=138.35 memory_delta=0
INFO - 2026-03-31 07:20:26 --> [REQ_ID=d259c503b249] [PERF] Execution time=0.138787
DEBUG - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [REQUEST][END]
INFO - 2026-03-31 07:20:26 --> [REQ_ID=d5f896f898a8] [PERF] Execution time=0.147267
DEBUG - 2026-03-31 07:21:22 --> [REQ_ID=3305b9b4fd71] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:21:22 --> [REQ_ID=3305b9b4fd71] [REQUEST][END]
INFO - 2026-03-31 07:21:22 --> [REQ_ID=3305b9b4fd71] [PERF] Execution time=0.015690
ERROR - 2026-03-31 07:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:26:22 --> [REQ_ID=df9998fee00d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:26:22 --> [REQ_ID=df9998fee00d] [REQUEST][END]
INFO - 2026-03-31 07:26:22 --> [REQ_ID=df9998fee00d] [PERF] Execution time=0.126293
ERROR - 2026-03-31 07:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-03-31 07:30:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-03-31 07:30:05 --> [CSRF] token name=csrf_test_name hash=8bdd20da0088e8245797a1565d9b3029
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [REQUEST][END]
INFO - 2026-03-31 07:30:05 --> [REQ_ID=512ae9c3e293] [PERF] Execution time=0.044709
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 07:30:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 07:30:05 --> [CSRF] token name=csrf_test_name hash=17abf8f5378280dd5971b866afcd973e
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=a02c46ba1bcf] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 07:30:05 --> [REQ_ID=a02c46ba1bcf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 07:30:05 --> [TRACE]
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [FILTER_AFTER]
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [LIFECYCLE][END] status=200 duration_ms=232.71 memory_delta=0
INFO - 2026-03-31 07:30:05 --> [REQ_ID=a02c46ba1bcf] [PERF] Execution time=0.236906
DEBUG - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [REQUEST][END]
INFO - 2026-03-31 07:30:05 --> [REQ_ID=d9b3d5c77d7f] [PERF] Execution time=0.252930
DEBUG - 2026-03-31 07:31:22 --> [REQ_ID=5255eb6be4d3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:31:22 --> [REQ_ID=5255eb6be4d3] [REQUEST][END]
INFO - 2026-03-31 07:31:22 --> [REQ_ID=5255eb6be4d3] [PERF] Execution time=0.234788
ERROR - 2026-03-31 07:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:33:14 --> [REQ_ID=402f880e363e] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-31 07:33:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:33:14 --> [REQ_ID=402f880e363e] [REQUEST][END]
INFO - 2026-03-31 07:33:14 --> [REQ_ID=402f880e363e] [PERF] Execution time=0.034152
ERROR - 2026-03-31 07:33:14 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Terms-Of-Service', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 07:33:14 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:36:22 --> [REQ_ID=77a5eae9bf53] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:36:22 --> [REQ_ID=77a5eae9bf53] [REQUEST][END]
INFO - 2026-03-31 07:36:22 --> [REQ_ID=77a5eae9bf53] [PERF] Execution time=0.074267
ERROR - 2026-03-31 07:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:41:22 --> [REQ_ID=f0900841939e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:41:22 --> [REQ_ID=f0900841939e] [REQUEST][END]
INFO - 2026-03-31 07:41:22 --> [REQ_ID=f0900841939e] [PERF] Execution time=0.074236
ERROR - 2026-03-31 07:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:46:22 --> [REQ_ID=da4da4368784] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:46:22 --> [REQ_ID=da4da4368784] [REQUEST][END]
INFO - 2026-03-31 07:46:22 --> [REQ_ID=da4da4368784] [PERF] Execution time=0.077454
ERROR - 2026-03-31 07:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:51:22 --> [REQ_ID=f000610b30b1] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:51:22 --> [REQ_ID=f000610b30b1] [REQUEST][END]
INFO - 2026-03-31 07:51:22 --> [REQ_ID=f000610b30b1] [PERF] Execution time=0.137156
ERROR - 2026-03-31 07:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:56:22 --> [REQ_ID=36e0713a40af] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 07:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 07:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 07:56:22 --> [REQ_ID=36e0713a40af] [REQUEST][END]
INFO - 2026-03-31 07:56:22 --> [REQ_ID=36e0713a40af] [PERF] Execution time=0.128204
ERROR - 2026-03-31 07:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 07:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-03-31 07:56:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-03-31 07:56:58 --> [CSRF] token name=csrf_test_name hash=64ff0343d42fe71530562316ce09e3a0
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [REQUEST][END]
INFO - 2026-03-31 07:56:58 --> [REQ_ID=c9c99ce442c7] [PERF] Execution time=0.023838
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 07:56:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 07:56:58 --> [CSRF] token name=csrf_test_name hash=e3aedba3e8d10ac9e67b871e96bf12a6
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=323305171558] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 07:56:58 --> [REQ_ID=323305171558] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 07:56:58 --> [TRACE]
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [FILTER_AFTER]
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [LIFECYCLE][END] status=200 duration_ms=46.02 memory_delta=0
INFO - 2026-03-31 07:56:58 --> [REQ_ID=323305171558] [PERF] Execution time=0.046405
DEBUG - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [REQUEST][END]
INFO - 2026-03-31 07:56:58 --> [REQ_ID=db39e938ddff] [PERF] Execution time=0.058550
DEBUG - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [REQUEST][END]
INFO - 2026-03-31 08:00:02 --> [REQ_ID=cb308051bcaa] [PERF] Execution time=0.044081
ERROR - 2026-03-31 08:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-31 08:00:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-03-31 08:00:48 --> [CSRF] token name=csrf_test_name hash=99e472958a60bb1c4e8be376c299ac8f
DEBUG - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [REQUEST][END]
INFO - 2026-03-31 08:00:48 --> [REQ_ID=9c4fb88b2f64] [PERF] Execution time=0.025349
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 08:00:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 08:00:51 --> [CSRF] token name=csrf_test_name hash=18752f44cb005c54371e4a04a51510ae
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=377cf1e52067] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 08:00:51 --> [REQ_ID=377cf1e52067] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 08:00:51 --> [TRACE]
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [FILTER_AFTER]
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [LIFECYCLE][END] status=200 duration_ms=21.58 memory_delta=0
INFO - 2026-03-31 08:00:51 --> [REQ_ID=377cf1e52067] [PERF] Execution time=0.026110
DEBUG - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [REQUEST][END]
INFO - 2026-03-31 08:00:51 --> [REQ_ID=180b44a3e898] [PERF] Execution time=0.038911
DEBUG - 2026-03-31 08:01:22 --> [REQ_ID=eda139366a6d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:01:22 --> [REQ_ID=eda139366a6d] [REQUEST][END]
INFO - 2026-03-31 08:01:22 --> [REQ_ID=eda139366a6d] [PERF] Execution time=0.020013
ERROR - 2026-03-31 08:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:06:22 --> [REQ_ID=0201bf20dc1b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:06:22 --> [REQ_ID=0201bf20dc1b] [REQUEST][END]
INFO - 2026-03-31 08:06:22 --> [REQ_ID=0201bf20dc1b] [PERF] Execution time=0.129620
ERROR - 2026-03-31 08:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:08:50 --> [REQ_ID=b8887b1b9a98] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-03-31 08:08:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:08:50 --> [REQ_ID=b8887b1b9a98] [REQUEST][END]
INFO - 2026-03-31 08:08:50 --> [REQ_ID=b8887b1b9a98] [PERF] Execution time=0.033968
ERROR - 2026-03-31 08:08:50 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Terms-Of-Service', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:08:50 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:10:21 --> [REQ_ID=f5010693eb28] [REQUEST][START] GET /
DEBUG - 2026-03-31 08:10:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:10:21 --> [REQ_ID=f5010693eb28] [FILTER_BEFORE] /
DEBUG - 2026-03-31 08:10:21 --> [REQ_ID=f5010693eb28] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 08:10:21 --> [REQ_ID=f5010693eb28] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 08:10:21 --> [CSRF] token name=csrf_test_name hash=dd786f1924703ecc66b88b3cf8ff6f95
DEBUG - 2026-03-31 08:10:21 --> [REQ_ID=a859a953712e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 08:10:21 --> [REQ_ID=a859a953712e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 08:10:21 --> [TRACE]
INFO - 2026-03-31 08:10:21 --> [REQ_ID=a859a953712e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 08:10:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 08:10:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 08:10:22 --> [REQ_ID=a859a953712e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 08:10:22 --> [REQ_ID=a859a953712e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 08:10:22 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 08:10:22 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 08:10:22 --> [REQ_ID=f5010693eb28] [FILTER_AFTER]
DEBUG - 2026-03-31 08:10:22 --> [REQ_ID=f5010693eb28] [LIFECYCLE][END] status=200 duration_ms=730.45 memory_delta=4194304
INFO - 2026-03-31 08:10:22 --> [REQ_ID=a859a953712e] [PERF] Execution time=0.732108
DEBUG - 2026-03-31 08:10:22 --> [REQ_ID=f5010693eb28] [REQUEST][END]
INFO - 2026-03-31 08:10:22 --> [REQ_ID=f5010693eb28] [PERF] Execution time=0.768831
DEBUG - 2026-03-31 08:11:22 --> [REQ_ID=17173d8170e9] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:11:22 --> [REQ_ID=17173d8170e9] [REQUEST][END]
INFO - 2026-03-31 08:11:22 --> [REQ_ID=17173d8170e9] [PERF] Execution time=0.015717
ERROR - 2026-03-31 08:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [REQUEST][END]
INFO - 2026-03-31 08:15:01 --> [REQ_ID=45508591c5df] [PERF] Execution time=0.042245
ERROR - 2026-03-31 08:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:16:22 --> [REQ_ID=62f736ac2efc] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:16:22 --> [REQ_ID=62f736ac2efc] [REQUEST][END]
INFO - 2026-03-31 08:16:22 --> [REQ_ID=62f736ac2efc] [PERF] Execution time=0.121115
ERROR - 2026-03-31 08:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:21:22 --> [REQ_ID=1ecd0f1b31f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:21:22 --> [REQ_ID=1ecd0f1b31f7] [REQUEST][END]
INFO - 2026-03-31 08:21:22 --> [REQ_ID=1ecd0f1b31f7] [PERF] Execution time=0.075708
ERROR - 2026-03-31 08:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [REQUEST][START] GET /
DEBUG - 2026-03-31 08:21:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [FILTER_BEFORE] /
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 08:21:27 --> [CSRF] token name=csrf_test_name hash=9773548c51dfbdd024020487cb4d6497
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 08:21:27 --> [TRACE]
INFO - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 08:21:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 08:21:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 08:21:27 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 08:21:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [FILTER_AFTER]
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [LIFECYCLE][END] status=200 duration_ms=628.25 memory_delta=4194304
INFO - 2026-03-31 08:21:27 --> [REQ_ID=869c6cc22139] [PERF] Execution time=0.626676
DEBUG - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [REQUEST][END]
INFO - 2026-03-31 08:21:27 --> [REQ_ID=89a3c0d20ce3] [PERF] Execution time=0.642569
DEBUG - 2026-03-31 08:26:22 --> [REQ_ID=e9dbd576745a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:26:22 --> [REQ_ID=e9dbd576745a] [REQUEST][END]
INFO - 2026-03-31 08:26:22 --> [REQ_ID=e9dbd576745a] [PERF] Execution time=0.263340
ERROR - 2026-03-31 08:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:26:57 --> [REQ_ID=97a01d6639ac] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-03-31 08:26:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:26:57 --> [REQ_ID=97a01d6639ac] [REQUEST][END]
INFO - 2026-03-31 08:26:57 --> [REQ_ID=97a01d6639ac] [PERF] Execution time=0.016477
ERROR - 2026-03-31 08:26:57 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Free/register', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:26:57 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:29:33 --> [REQ_ID=939f141a5d96] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-03-31 08:29:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:29:33 --> [REQ_ID=939f141a5d96] [REQUEST][END]
INFO - 2026-03-31 08:29:33 --> [REQ_ID=939f141a5d96] [PERF] Execution time=0.036202
ERROR - 2026-03-31 08:29:33 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Registering-An-Account\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Registering-An-Account\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/How-It-Works/Registering-An-Account\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/How-It-Works/Registering-An-Account', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:29:33 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-03-31 08:31:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-03-31 08:31:03 --> [CSRF] token name=csrf_test_name hash=a005ec94fbf7d3370bed27b0c10eea60
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 08:31:03 --> [TRACE]
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [METHOD_ENTRY] index
DEBUG - 2026-03-31 08:31:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 08:31:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 08:31:03 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 08:31:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 08:31:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 08:31:03 --> MyMIWallets skipped (no user context)
INFO - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [MEMORY][commonData:start] 6291456
INFO - 2026-03-31 08:31:03 --> themesMemory usage: 6291456
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [FILTER_AFTER]
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [LIFECYCLE][END] status=200 duration_ms=301.82 memory_delta=0
INFO - 2026-03-31 08:31:03 --> [REQ_ID=87ac370fe5d5] [PERF] Execution time=0.303544
DEBUG - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [REQUEST][END]
INFO - 2026-03-31 08:31:03 --> [REQ_ID=960f74566e0e] [PERF] Execution time=0.342673
DEBUG - 2026-03-31 08:31:22 --> [REQ_ID=84457d506514] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:31:22 --> [REQ_ID=84457d506514] [REQUEST][END]
INFO - 2026-03-31 08:31:22 --> [REQ_ID=84457d506514] [PERF] Execution time=0.040293
ERROR - 2026-03-31 08:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:33:26 --> [REQ_ID=16eea0a2cca8] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-31 08:33:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:33:26 --> [REQ_ID=16eea0a2cca8] [REQUEST][END]
INFO - 2026-03-31 08:33:26 --> [REQ_ID=16eea0a2cca8] [PERF] Execution time=0.037442
ERROR - 2026-03-31 08:33:26 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Projects\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Projects\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Projects\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Projects', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:33:26 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:36:22 --> [REQ_ID=87cc295ce1c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:36:22 --> [REQ_ID=87cc295ce1c4] [REQUEST][END]
INFO - 2026-03-31 08:36:22 --> [REQ_ID=87cc295ce1c4] [PERF] Execution time=0.128026
ERROR - 2026-03-31 08:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:41:22 --> [REQ_ID=6daa3a686782] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:41:22 --> [REQ_ID=6daa3a686782] [REQUEST][END]
INFO - 2026-03-31 08:41:22 --> [REQ_ID=6daa3a686782] [PERF] Execution time=0.081283
ERROR - 2026-03-31 08:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:41:40 --> [REQ_ID=1d6e959b0006] [REQUEST][START] GET /index.php/forgot-password
DEBUG - 2026-03-31 08:41:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:41:40 --> [REQ_ID=1d6e959b0006] [REQUEST][END]
INFO - 2026-03-31 08:41:40 --> [REQ_ID=1d6e959b0006] [PERF] Execution time=0.016492
ERROR - 2026-03-31 08:41:41 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/forgot-password\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/forgot-password\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/forgot-password\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/forgot-password', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:41:41 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:46:22 --> [REQ_ID=0794fc13f47f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:46:22 --> [REQ_ID=0794fc13f47f] [REQUEST][END]
INFO - 2026-03-31 08:46:22 --> [REQ_ID=0794fc13f47f] [PERF] Execution time=0.052930
ERROR - 2026-03-31 08:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-03-31 08:50:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-03-31 08:50:28 --> [CSRF] token name=csrf_test_name hash=90c4501c195ca643bd964ed4b0460bd7
DEBUG - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [REQUEST][END]
INFO - 2026-03-31 08:50:28 --> [REQ_ID=217171a78359] [PERF] Execution time=0.049846
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 08:50:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 08:50:29 --> [CSRF] token name=csrf_test_name hash=bfc24b0af5a7dacaadf50c35284587dd
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=6d2b86963d07] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 08:50:29 --> [REQ_ID=6d2b86963d07] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 08:50:29 --> [TRACE]
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [FILTER_AFTER]
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [LIFECYCLE][END] status=200 duration_ms=129.48 memory_delta=0
INFO - 2026-03-31 08:50:29 --> [REQ_ID=6d2b86963d07] [PERF] Execution time=0.133066
DEBUG - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [REQUEST][END]
INFO - 2026-03-31 08:50:29 --> [REQ_ID=dbe21e1f4559] [PERF] Execution time=0.146187
DEBUG - 2026-03-31 08:51:22 --> [REQ_ID=12dba83df929] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:51:22 --> [REQ_ID=12dba83df929] [REQUEST][END]
INFO - 2026-03-31 08:51:22 --> [REQ_ID=12dba83df929] [PERF] Execution time=0.137028
ERROR - 2026-03-31 08:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:51:40 --> [REQ_ID=189ec4b2c55c] [REQUEST][START] GET /
DEBUG - 2026-03-31 08:51:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:51:40 --> [REQ_ID=189ec4b2c55c] [REQUEST][END]
INFO - 2026-03-31 08:51:40 --> [REQ_ID=189ec4b2c55c] [PERF] Execution time=0.013656
ERROR - 2026-03-31 08:51:40 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 08:51:40 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-31 08:53:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-03-31 08:53:18 --> [CSRF] token name=csrf_test_name hash=3e170513f94bfb8deb82c5b9e2d87f7b
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [REQUEST][END]
INFO - 2026-03-31 08:53:18 --> [REQ_ID=b12f8f4712d7] [PERF] Execution time=0.059074
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 08:53:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 08:53:18 --> [CSRF] token name=csrf_test_name hash=1754b0aee753bab3335ecba92dc4f24c
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=06decca405a8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 08:53:18 --> [REQ_ID=06decca405a8] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 08:53:18 --> [TRACE]
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [FILTER_AFTER]
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [LIFECYCLE][END] status=200 duration_ms=114.12 memory_delta=0
INFO - 2026-03-31 08:53:18 --> [REQ_ID=06decca405a8] [PERF] Execution time=0.118270
DEBUG - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [REQUEST][END]
INFO - 2026-03-31 08:53:18 --> [REQ_ID=cc34ee21d965] [PERF] Execution time=0.134555
DEBUG - 2026-03-31 08:56:22 --> [REQ_ID=1ecab9174635] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 08:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 08:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 08:56:22 --> [REQ_ID=1ecab9174635] [REQUEST][END]
INFO - 2026-03-31 08:56:22 --> [REQ_ID=1ecab9174635] [PERF] Execution time=0.187515
ERROR - 2026-03-31 08:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 08:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [REQUEST][END]
INFO - 2026-03-31 09:00:01 --> [REQ_ID=1e8037915869] [PERF] Execution time=0.046439
ERROR - 2026-03-31 09:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 09:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:01:22 --> [REQ_ID=90d3965302bf] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:01:22 --> [REQ_ID=90d3965302bf] [REQUEST][END]
INFO - 2026-03-31 09:01:22 --> [REQ_ID=90d3965302bf] [PERF] Execution time=0.151454
ERROR - 2026-03-31 09:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:03:24 --> [REQ_ID=ebf8fd0f2fa5] [REQUEST][START] GET /index.php/Free/register/MyMI-Budgeting-Tool
DEBUG - 2026-03-31 09:03:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:03:24 --> [REQ_ID=ebf8fd0f2fa5] [REQUEST][END]
INFO - 2026-03-31 09:03:24 --> [REQ_ID=ebf8fd0f2fa5] [PERF] Execution time=0.036822
ERROR - 2026-03-31 09:03:24 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register/MyMI-Budgeting-Tool\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register/MyMI-Budgeting-Tool\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Free/register/MyMI-Budgeting-Tool\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Free/register/MyMI-Budgeting-Tool', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 09:03:24 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:06:22 --> [REQ_ID=7456c25ac132] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:06:22 --> [REQ_ID=7456c25ac132] [REQUEST][END]
INFO - 2026-03-31 09:06:22 --> [REQ_ID=7456c25ac132] [PERF] Execution time=0.054466
ERROR - 2026-03-31 09:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:11:22 --> [REQ_ID=6e21f438f57c] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:11:22 --> [REQ_ID=6e21f438f57c] [REQUEST][END]
INFO - 2026-03-31 09:11:22 --> [REQ_ID=6e21f438f57c] [PERF] Execution time=0.147125
ERROR - 2026-03-31 09:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [REQUEST][END]
INFO - 2026-03-31 09:15:01 --> [REQ_ID=41d80bc42850] [PERF] Execution time=0.041884
ERROR - 2026-03-31 09:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 09:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-03-31 09:15:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-03-31 09:15:56 --> [CSRF] token name=csrf_test_name hash=0baa3dd104e6c9c6a2a7c5cc653273fd
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [REQUEST][END]
INFO - 2026-03-31 09:15:56 --> [REQ_ID=fd945d44ca3d] [PERF] Execution time=0.020249
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=afc3e74133ee] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 09:15:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=afc3e74133ee] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=afc3e74133ee] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=afc3e74133ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 09:15:56 --> [CSRF] token name=csrf_test_name hash=74faed7ade9759085b09734828f19b08
DEBUG - 2026-03-31 09:15:56 --> [REQ_ID=41a77a11a92d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 09:15:56 --> [REQ_ID=41a77a11a92d] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 09:15:56 --> [TRACE]
DEBUG - 2026-03-31 09:15:57 --> [REQ_ID=afc3e74133ee] [FILTER_AFTER]
DEBUG - 2026-03-31 09:15:57 --> [REQ_ID=afc3e74133ee] [LIFECYCLE][END] status=200 duration_ms=231.29 memory_delta=0
INFO - 2026-03-31 09:15:57 --> [REQ_ID=41a77a11a92d] [PERF] Execution time=0.234884
DEBUG - 2026-03-31 09:15:57 --> [REQ_ID=afc3e74133ee] [REQUEST][END]
INFO - 2026-03-31 09:15:57 --> [REQ_ID=afc3e74133ee] [PERF] Execution time=0.246774
DEBUG - 2026-03-31 09:16:22 --> [REQ_ID=c74e0c6fe8a7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:16:22 --> [REQ_ID=c74e0c6fe8a7] [REQUEST][END]
INFO - 2026-03-31 09:16:22 --> [REQ_ID=c74e0c6fe8a7] [PERF] Execution time=0.099687
ERROR - 2026-03-31 09:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:21:22 --> [REQ_ID=90850a5499d9] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:21:22 --> [REQ_ID=90850a5499d9] [REQUEST][END]
INFO - 2026-03-31 09:21:22 --> [REQ_ID=90850a5499d9] [PERF] Execution time=0.145432
ERROR - 2026-03-31 09:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:21:56 --> [REQ_ID=b2cb91ed0fda] [REQUEST][START] GET /index.php/Knowledgebase/Account-And-Billing
DEBUG - 2026-03-31 09:21:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:21:56 --> [REQ_ID=b2cb91ed0fda] [REQUEST][END]
INFO - 2026-03-31 09:21:56 --> [REQ_ID=b2cb91ed0fda] [PERF] Execution time=0.016906
ERROR - 2026-03-31 09:21:56 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Account-And-Billing\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Account-And-Billing\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase/Account-And-Billing\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Knowledgebase/Account-And-Billing', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 09:21:56 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:26:22 --> [REQ_ID=9586bc7c58f7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:26:22 --> [REQ_ID=9586bc7c58f7] [REQUEST][END]
INFO - 2026-03-31 09:26:22 --> [REQ_ID=9586bc7c58f7] [PERF] Execution time=0.342250
ERROR - 2026-03-31 09:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:31:22 --> [REQ_ID=dfb235e3dde7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:31:22 --> [REQ_ID=dfb235e3dde7] [REQUEST][END]
INFO - 2026-03-31 09:31:22 --> [REQ_ID=dfb235e3dde7] [PERF] Execution time=0.151924
ERROR - 2026-03-31 09:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:36:22 --> [REQ_ID=b1e28969b601] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:36:22 --> [REQ_ID=b1e28969b601] [REQUEST][END]
INFO - 2026-03-31 09:36:22 --> [REQ_ID=b1e28969b601] [PERF] Execution time=0.139791
ERROR - 2026-03-31 09:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:41:22 --> [REQ_ID=586b9d222fec] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:41:22 --> [REQ_ID=586b9d222fec] [REQUEST][END]
INFO - 2026-03-31 09:41:22 --> [REQ_ID=586b9d222fec] [PERF] Execution time=0.153214
ERROR - 2026-03-31 09:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:46:22 --> [REQ_ID=cb331edf6594] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:46:22 --> [REQ_ID=cb331edf6594] [REQUEST][END]
INFO - 2026-03-31 09:46:22 --> [REQ_ID=cb331edf6594] [PERF] Execution time=0.151805
ERROR - 2026-03-31 09:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [REQUEST][START] GET /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-31 09:47:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [FILTER_BEFORE] /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-03-31 09:47:21 --> [CSRF] token name=csrf_test_name hash=02a0cc9e60e412adbb129a76b0c3845d
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 09:47:21 --> [TRACE]
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [METHOD_ENTRY] preview
DEBUG - 2026-03-31 09:47:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 09:47:21 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 09:47:21 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 09:47:21 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 09:47:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 09:47:21 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-31 09:47:21 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-31 09:47:21 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-03-31 09:47:21 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-03-31 09:47:21 --> [SERVICE] App\Services\BudgetService ::setUserId
WARNING - 2026-03-31 09:47:21 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 09:47:21 --> MyMIWallets skipped (no user context)
DEBUG - 2026-03-31 09:47:21 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 09:47:21 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-03-31 09:47:21 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-03-31 09:47:21 --> Premium entitlement guest: user_id= route=/index.php/Preview/Alert/NASDAQ-GUTS feature= tier=free status=free allowed=yes reason=Guest access allowed for this feature.
DEBUG - 2026-03-31 09:47:21 --> TwelveData batch response error: **symbol** or **figi** parameter is missing or invalid. Please provide a valid symbol according to API documentation: https://twelvedata.com/docs#reference-data
DEBUG - 2026-03-31 09:47:21 --> Marketstack fallback failed: 22 : The requested URL returned error: 403
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [MEMORY][commonData:start] 6291456
INFO - 2026-03-31 09:47:21 --> themesMemory usage: 6291456
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [FILTER_AFTER]
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [LIFECYCLE][END] status=200 duration_ms=580.67 memory_delta=2097152
INFO - 2026-03-31 09:47:21 --> [REQ_ID=b84a81f8cbbc] [PERF] Execution time=0.578911
DEBUG - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [REQUEST][END]
INFO - 2026-03-31 09:47:21 --> [REQ_ID=354247654ca0] [PERF] Execution time=0.596167
DEBUG - 2026-03-31 09:50:12 --> [REQ_ID=1b2e9f2d887d] [REQUEST][START] GET /
DEBUG - 2026-03-31 09:50:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 09:50:12 --> [REQ_ID=1b2e9f2d887d] [FILTER_BEFORE] /
DEBUG - 2026-03-31 09:50:12 --> [REQ_ID=1b2e9f2d887d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 09:50:12 --> [REQ_ID=1b2e9f2d887d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 09:50:12 --> [CSRF] token name=csrf_test_name hash=6a21ed364682e90a54935d2890c9c313
DEBUG - 2026-03-31 09:50:12 --> [REQ_ID=52cf0dec078c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 09:50:12 --> [REQ_ID=52cf0dec078c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 09:50:13 --> [TRACE]
INFO - 2026-03-31 09:50:13 --> [REQ_ID=52cf0dec078c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 09:50:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 09:50:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 09:50:13 --> [REQ_ID=52cf0dec078c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 09:50:13 --> [REQ_ID=52cf0dec078c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 09:50:13 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 09:50:13 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 09:50:13 --> [REQ_ID=1b2e9f2d887d] [FILTER_AFTER]
DEBUG - 2026-03-31 09:50:13 --> [REQ_ID=1b2e9f2d887d] [LIFECYCLE][END] status=200 duration_ms=656.89 memory_delta=4194304
INFO - 2026-03-31 09:50:13 --> [REQ_ID=52cf0dec078c] [PERF] Execution time=0.658653
DEBUG - 2026-03-31 09:50:13 --> [REQ_ID=1b2e9f2d887d] [REQUEST][END]
INFO - 2026-03-31 09:50:13 --> [REQ_ID=1b2e9f2d887d] [PERF] Execution time=0.695252
DEBUG - 2026-03-31 09:51:22 --> [REQ_ID=868026cd8f9d] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:51:22 --> [REQ_ID=868026cd8f9d] [REQUEST][END]
INFO - 2026-03-31 09:51:22 --> [REQ_ID=868026cd8f9d] [PERF] Execution time=0.130236
ERROR - 2026-03-31 09:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 09:56:22 --> [REQ_ID=3039e748132a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 09:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 09:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 09:56:22 --> [REQ_ID=3039e748132a] [REQUEST][END]
INFO - 2026-03-31 09:56:22 --> [REQ_ID=3039e748132a] [PERF] Execution time=0.079994
ERROR - 2026-03-31 09:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 09:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [REQUEST][END]
INFO - 2026-03-31 10:00:01 --> [REQ_ID=91cf086d3007] [PERF] Execution time=0.041678
ERROR - 2026-03-31 10:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 10:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:01:22 --> [REQ_ID=241173862ee3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:01:22 --> [REQ_ID=241173862ee3] [REQUEST][END]
INFO - 2026-03-31 10:01:22 --> [REQ_ID=241173862ee3] [PERF] Execution time=0.040468
ERROR - 2026-03-31 10:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:06:22 --> [REQ_ID=8b669a59dd19] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:06:22 --> [REQ_ID=8b669a59dd19] [REQUEST][END]
INFO - 2026-03-31 10:06:22 --> [REQ_ID=8b669a59dd19] [PERF] Execution time=0.084108
ERROR - 2026-03-31 10:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:11:22 --> [REQ_ID=a56bfd3b74ee] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:11:22 --> [REQ_ID=a56bfd3b74ee] [REQUEST][END]
INFO - 2026-03-31 10:11:22 --> [REQ_ID=a56bfd3b74ee] [PERF] Execution time=0.223318
ERROR - 2026-03-31 10:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [REQUEST][END]
INFO - 2026-03-31 10:15:01 --> [REQ_ID=11d1f923fba4] [PERF] Execution time=0.041019
ERROR - 2026-03-31 10:15:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 10:15:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:16:22 --> [REQ_ID=84f05d718f75] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:16:22 --> [REQ_ID=84f05d718f75] [REQUEST][END]
INFO - 2026-03-31 10:16:22 --> [REQ_ID=84f05d718f75] [PERF] Execution time=0.224255
ERROR - 2026-03-31 10:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-03-31 10:17:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-03-31 10:17:48 --> [CSRF] token name=csrf_test_name hash=afe814e6d4fdf9fc1156ef96f9e296a8
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [REQUEST][END]
INFO - 2026-03-31 10:17:48 --> [REQ_ID=9195e683aa0a] [PERF] Execution time=0.052257
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 10:17:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 10:17:48 --> [CSRF] token name=csrf_test_name hash=64175eafa075433a31f866536defa133
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=1b897b16861a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 10:17:48 --> [REQ_ID=1b897b16861a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 10:17:48 --> [TRACE]
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [FILTER_AFTER]
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [LIFECYCLE][END] status=200 duration_ms=36.76 memory_delta=0
INFO - 2026-03-31 10:17:48 --> [REQ_ID=1b897b16861a] [PERF] Execution time=0.040424
DEBUG - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [REQUEST][END]
INFO - 2026-03-31 10:17:48 --> [REQ_ID=fd6195dae47b] [PERF] Execution time=0.053171
DEBUG - 2026-03-31 10:21:22 --> [REQ_ID=a9618e9e5293] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:21:22 --> [REQ_ID=a9618e9e5293] [REQUEST][END]
INFO - 2026-03-31 10:21:22 --> [REQ_ID=a9618e9e5293] [PERF] Execution time=0.051654
ERROR - 2026-03-31 10:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:26:22 --> [REQ_ID=896315a5d55e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:26:22 --> [REQ_ID=896315a5d55e] [REQUEST][END]
INFO - 2026-03-31 10:26:22 --> [REQ_ID=896315a5d55e] [PERF] Execution time=0.152717
ERROR - 2026-03-31 10:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:31:22 --> [REQ_ID=451bfa0966c4] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:31:22 --> [REQ_ID=451bfa0966c4] [REQUEST][END]
INFO - 2026-03-31 10:31:22 --> [REQ_ID=451bfa0966c4] [PERF] Execution time=0.147845
ERROR - 2026-03-31 10:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:36:22 --> [REQ_ID=670d2b76da80] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:36:22 --> [REQ_ID=670d2b76da80] [REQUEST][END]
INFO - 2026-03-31 10:36:22 --> [REQ_ID=670d2b76da80] [PERF] Execution time=0.074758
ERROR - 2026-03-31 10:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:41:22 --> [REQ_ID=8fe53f5b8323] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:41:22 --> [REQ_ID=8fe53f5b8323] [REQUEST][END]
INFO - 2026-03-31 10:41:22 --> [REQ_ID=8fe53f5b8323] [PERF] Execution time=0.156107
ERROR - 2026-03-31 10:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:42:58 --> [REQ_ID=aa23853d11b7] [REQUEST][START] GET /
DEBUG - 2026-03-31 10:42:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:42:58 --> [REQ_ID=aa23853d11b7] [FILTER_BEFORE] /
DEBUG - 2026-03-31 10:42:58 --> [REQ_ID=aa23853d11b7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 10:42:58 --> [REQ_ID=aa23853d11b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 10:42:58 --> [CSRF] token name=csrf_test_name hash=b441e8bea587987b5411fdb2826aed15
DEBUG - 2026-03-31 10:42:58 --> [REQ_ID=6ff652f00880] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 10:42:58 --> [REQ_ID=6ff652f00880] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 10:42:58 --> [TRACE]
INFO - 2026-03-31 10:42:59 --> [REQ_ID=6ff652f00880] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 10:42:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 10:42:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 10:42:59 --> [REQ_ID=6ff652f00880] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 10:42:59 --> [REQ_ID=6ff652f00880] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 10:42:59 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 10:42:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 10:42:59 --> [REQ_ID=aa23853d11b7] [FILTER_AFTER]
DEBUG - 2026-03-31 10:42:59 --> [REQ_ID=aa23853d11b7] [LIFECYCLE][END] status=200 duration_ms=918.34 memory_delta=4194304
INFO - 2026-03-31 10:42:59 --> [REQ_ID=6ff652f00880] [PERF] Execution time=0.920197
DEBUG - 2026-03-31 10:42:59 --> [REQ_ID=aa23853d11b7] [REQUEST][END]
INFO - 2026-03-31 10:42:59 --> [REQ_ID=aa23853d11b7] [PERF] Execution time=0.957322
DEBUG - 2026-03-31 10:43:08 --> [REQ_ID=79dddc8a92ef] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-03-31 10:43:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:43:08 --> [REQ_ID=79dddc8a92ef] [REQUEST][END]
INFO - 2026-03-31 10:43:08 --> [REQ_ID=79dddc8a92ef] [PERF] Execution time=0.013956
ERROR - 2026-03-31 10:43:08 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Knowledgebase\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Knowledgebase', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 10:43:08 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:46:22 --> [REQ_ID=e795b5fb2f63] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:46:22 --> [REQ_ID=e795b5fb2f63] [REQUEST][END]
INFO - 2026-03-31 10:46:22 --> [REQ_ID=e795b5fb2f63] [PERF] Execution time=0.305645
ERROR - 2026-03-31 10:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:51:22 --> [REQ_ID=d1ec1d6107eb] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:51:22 --> [REQ_ID=d1ec1d6107eb] [REQUEST][END]
INFO - 2026-03-31 10:51:22 --> [REQ_ID=d1ec1d6107eb] [PERF] Execution time=0.160285
ERROR - 2026-03-31 10:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:56:22 --> [REQ_ID=14292eed8222] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 10:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 10:56:22 --> [REQ_ID=14292eed8222] [REQUEST][END]
INFO - 2026-03-31 10:56:22 --> [REQ_ID=14292eed8222] [PERF] Execution time=0.335501
ERROR - 2026-03-31 10:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 10:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:58:13 --> [REQ_ID=958640e04d88] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-03-31 10:58:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 10:58:13 --> [REQ_ID=958640e04d88] [REQUEST][END]
INFO - 2026-03-31 10:58:13 --> [REQ_ID=958640e04d88] [PERF] Execution time=0.038793
ERROR - 2026-03-31 10:58:13 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Users\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Users\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Management/Users\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Management/Users', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 10:58:13 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 10:59:51 --> [REQ_ID=0c7280740c22] [REQUEST][START] GET /index.php/News/Market-Movers/November-15th-2021
DEBUG - 2026-03-31 10:59:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 10:59:51 --> [404_ROUTE]
DEBUG - 2026-03-31 10:59:51 --> [REQ_ID=0c7280740c22] [REQUEST][END]
INFO - 2026-03-31 10:59:51 --> [REQ_ID=0c7280740c22] [PERF] Execution time=0.350756
ERROR - 2026-03-31 10:59:51 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-15th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-15th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-15th-2021\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/News/Market-Movers/November-15th-2021', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 10:59:51 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [REQUEST][END]
INFO - 2026-03-31 11:00:02 --> [REQ_ID=243c951c9209] [PERF] Execution time=0.012227
ERROR - 2026-03-31 11:00:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 11:00:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:01:22 --> [REQ_ID=6bb4bfdd676c] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:01:22 --> [REQ_ID=6bb4bfdd676c] [REQUEST][END]
INFO - 2026-03-31 11:01:22 --> [REQ_ID=6bb4bfdd676c] [PERF] Execution time=0.159919
ERROR - 2026-03-31 11:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:06:04 --> [REQ_ID=a1e582777847] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-31 11:06:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:06:04 --> [REQ_ID=a1e582777847] [REQUEST][END]
INFO - 2026-03-31 11:06:04 --> [REQ_ID=a1e582777847] [PERF] Execution time=0.039542
ERROR - 2026-03-31 11:06:04 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Budget/Financial-Analysis\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Budget/Financial-Analysis\'
AND `error_type` = \'http_403\'
AND `status_code` = 403
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/Budget/Financial-Analysis\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/Budget/Financial-Analysis', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 11:06:04 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:06:22 --> [REQ_ID=ec1045bd6a2f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:06:22 --> [REQ_ID=ec1045bd6a2f] [REQUEST][END]
INFO - 2026-03-31 11:06:22 --> [REQ_ID=ec1045bd6a2f] [PERF] Execution time=0.111788
ERROR - 2026-03-31 11:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:11:22 --> [REQ_ID=c1a7f03cb8ac] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:11:22 --> [REQ_ID=c1a7f03cb8ac] [REQUEST][END]
INFO - 2026-03-31 11:11:22 --> [REQ_ID=c1a7f03cb8ac] [PERF] Execution time=0.268828
ERROR - 2026-03-31 11:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [REQUEST][END]
INFO - 2026-03-31 11:15:01 --> [REQ_ID=756cd0893740] [PERF] Execution time=0.050307
ERROR - 2026-03-31 11:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 11:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:16:22 --> [REQ_ID=398f3a19e8b3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:16:22 --> [REQ_ID=398f3a19e8b3] [REQUEST][END]
INFO - 2026-03-31 11:16:22 --> [REQ_ID=398f3a19e8b3] [PERF] Execution time=0.120896
ERROR - 2026-03-31 11:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:21:22 --> [REQ_ID=c035b80a3dd6] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:21:22 --> [REQ_ID=c035b80a3dd6] [REQUEST][END]
INFO - 2026-03-31 11:21:22 --> [REQ_ID=c035b80a3dd6] [PERF] Execution time=0.122707
ERROR - 2026-03-31 11:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:26:22 --> [REQ_ID=3b9176b2c8a6] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:26:22 --> [REQ_ID=3b9176b2c8a6] [REQUEST][END]
INFO - 2026-03-31 11:26:22 --> [REQ_ID=3b9176b2c8a6] [PERF] Execution time=0.138170
ERROR - 2026-03-31 11:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:31:22 --> [REQ_ID=beb730bfdb47] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:31:22 --> [REQ_ID=beb730bfdb47] [REQUEST][END]
INFO - 2026-03-31 11:31:22 --> [REQ_ID=beb730bfdb47] [PERF] Execution time=0.075186
ERROR - 2026-03-31 11:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:32:31 --> [REQ_ID=b014bbc485c1] [REQUEST][START] GET /
DEBUG - 2026-03-31 11:32:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:32:31 --> [REQ_ID=b014bbc485c1] [FILTER_BEFORE] /
DEBUG - 2026-03-31 11:32:31 --> [REQ_ID=b014bbc485c1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 11:32:31 --> [REQ_ID=b014bbc485c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 11:32:31 --> [CSRF] token name=csrf_test_name hash=8c3f59df48add14f47a9882c33bd0999
DEBUG - 2026-03-31 11:32:31 --> [REQ_ID=c474d3e1cbde] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 11:32:31 --> [REQ_ID=c474d3e1cbde] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 11:32:31 --> [TRACE]
INFO - 2026-03-31 11:32:31 --> [REQ_ID=c474d3e1cbde] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 11:32:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 11:32:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 11:32:32 --> [REQ_ID=c474d3e1cbde] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 11:32:32 --> [REQ_ID=c474d3e1cbde] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 11:32:32 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 11:32:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 11:32:32 --> [REQ_ID=b014bbc485c1] [FILTER_AFTER]
DEBUG - 2026-03-31 11:32:32 --> [REQ_ID=b014bbc485c1] [LIFECYCLE][END] status=200 duration_ms=626.12 memory_delta=4194304
INFO - 2026-03-31 11:32:32 --> [REQ_ID=c474d3e1cbde] [PERF] Execution time=0.624585
DEBUG - 2026-03-31 11:32:32 --> [REQ_ID=b014bbc485c1] [REQUEST][END]
INFO - 2026-03-31 11:32:32 --> [REQ_ID=b014bbc485c1] [PERF] Execution time=0.640731
DEBUG - 2026-03-31 11:36:22 --> [REQ_ID=39761ba3ae04] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:36:22 --> [REQ_ID=39761ba3ae04] [REQUEST][END]
INFO - 2026-03-31 11:36:22 --> [REQ_ID=39761ba3ae04] [PERF] Execution time=0.149804
ERROR - 2026-03-31 11:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [REQUEST][START] GET /index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:36:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [FILTER_BEFORE] /index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=add
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:36:51 --> [CSRF] token name=csrf_test_name hash=a0002278995ccd2f5e09510f4d3868d5
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [REQUEST][END]
INFO - 2026-03-31 11:36:51 --> [REQ_ID=921ceb29e3da] [PERF] Execution time=0.053886
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 11:36:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 11:36:51 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=c8c1ddbabd4a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 11:36:51 --> [REQ_ID=c8c1ddbabd4a] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 11:36:51 --> [TRACE]
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [FILTER_AFTER]
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [LIFECYCLE][END] status=200 duration_ms=23.53 memory_delta=0
INFO - 2026-03-31 11:36:51 --> [REQ_ID=c8c1ddbabd4a] [PERF] Execution time=0.023598
DEBUG - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [REQUEST][END]
INFO - 2026-03-31 11:36:51 --> [REQ_ID=a2df733b8dd4] [PERF] Execution time=0.035521
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [REQUEST][START] POST /index.php/login
DEBUG - 2026-03-31 11:37:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 11:37:00 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
INFO - 2026-03-31 11:37:00 --> CSRF token verified.
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=4d41d5772856] [INIT] App\Controllers\AuthController::POST
INFO - 2026-03-31 11:37:00 --> [REQ_ID=4d41d5772856] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 11:37:00 --> [TRACE]
INFO - 2026-03-31 11:37:00 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-03-31 11:37:00 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-03-31 11:37:00 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36
DEBUG - 2026-03-31 11:37:00 --> Auth attemptLogin() called with login identifier: tburks239223, remember: false
DEBUG - 2026-03-31 11:37:00 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-03-31 11:37:00 --> Auth attempt succeeded for identifier tburks239223. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-31 11:37:00 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11761
DEBUG - 2026-03-31 11:37:00 --> Auth attemptLogin() - session user_id set to: 11761
ERROR - 2026-03-31 11:37:00 --> Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11761, \'tburks2392@gmail.com\', \'76.234.126.68\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\', \'2026-03-31 11:37:00\')')
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
ERROR - 2026-03-31 11:37:00 --> UserIpHistoryModel::record failed: Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
INFO - 2026-03-31 11:37:00 --> [AUTH] Login success
DEBUG - 2026-03-31 11:37:00 --> [REDIRECT_FINAL] https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [FILTER_AFTER]
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [LIFECYCLE][END] status=303 duration_ms=140.26 memory_delta=0
INFO - 2026-03-31 11:37:00 --> [REQ_ID=4d41d5772856] [PERF] Execution time=0.140570
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [REQUEST][END]
INFO - 2026-03-31 11:37:00 --> [REQ_ID=73c8ec0083f1] [PERF] Execution time=0.149699
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [REQUEST][START] GET /index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [FILTER_BEFORE] /index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=add
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Add/Expense
DEBUG - 2026-03-31 11:37:00 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
DEBUG - 2026-03-31 11:37:00 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 11:37:00 --> [TRACE]
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [METHOD_ENTRY] add
DEBUG - 2026-03-31 11:37:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 11:37:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 11:37:00 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 11:37:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 11:37:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 11:37:00 --> BudgetController L53 Initialized with cuID: 11761
DEBUG - 2026-03-31 11:37:00 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-03-31 11:37:00 --> [BudgetController::METHOD_ENTRY] add
INFO - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-31 11:37:00 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"10e41484f02cf94fa8db626e18026afd\"","style":"nonce=\"10e41484f02cf94fa8db626e18026afd\""}}
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [VIEW_RENDER] App\Modules\User\Views\Budget\Add
INFO - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-31 11:37:00 --> BudgetController::commonData snapshot: {"cuID":11761,"cuEmail":"tburks2392@gmail.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"10e41484f02cf94fa8db626e18026afd\"","style":"nonce=\"10e41484f02cf94fa8db626e18026afd\""}}
DEBUG - 2026-03-31 11:37:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 11:37:00 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-03-31 11:37:00 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Expense
INFO - 2026-03-31 11:37:00 --> $formMode: Add
INFO - 2026-03-31 11:37:00 --> themesMemory usage: 4194304
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [FILTER_AFTER]
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [LIFECYCLE][END] status=200 duration_ms=87.19 memory_delta=0
INFO - 2026-03-31 11:37:00 --> [REQ_ID=6a4de1fe8912] [PERF] Execution time=0.079615
DEBUG - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [REQUEST][END]
INFO - 2026-03-31 11:37:00 --> [REQ_ID=758ac84d5c05] [PERF] Execution time=0.096391
DEBUG - 2026-03-31 11:41:22 --> [REQ_ID=f6ddfe8fb050] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:41:22 --> [REQ_ID=f6ddfe8fb050] [REQUEST][END]
INFO - 2026-03-31 11:41:22 --> [REQ_ID=f6ddfe8fb050] [PERF] Execution time=0.080631
ERROR - 2026-03-31 11:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:46:22 --> [REQ_ID=9daf97af315f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:46:22 --> [REQ_ID=9daf97af315f] [REQUEST][END]
INFO - 2026-03-31 11:46:22 --> [REQ_ID=9daf97af315f] [PERF] Execution time=0.257124
ERROR - 2026-03-31 11:46:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:46:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:51:22 --> [REQ_ID=e41bdb65ad0a] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:51:22 --> [REQ_ID=e41bdb65ad0a] [REQUEST][END]
INFO - 2026-03-31 11:51:22 --> [REQ_ID=e41bdb65ad0a] [PERF] Execution time=0.088753
ERROR - 2026-03-31 11:51:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:51:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 11:56:22 --> [REQ_ID=1bd645eff563] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 11:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 11:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 11:56:22 --> [REQ_ID=1bd645eff563] [REQUEST][END]
INFO - 2026-03-31 11:56:22 --> [REQ_ID=1bd645eff563] [PERF] Execution time=0.053286
ERROR - 2026-03-31 11:56:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 11:56:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [REQUEST][END]
INFO - 2026-03-31 12:00:01 --> [REQ_ID=74e52b9b99d4] [PERF] Execution time=0.041984
ERROR - 2026-03-31 12:00:01 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Management/Run-CRON-Tasks', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 12:00:01 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:01:22 --> [REQ_ID=678ebf926308] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:01:22 --> [REQ_ID=678ebf926308] [REQUEST][END]
INFO - 2026-03-31 12:01:22 --> [REQ_ID=678ebf926308] [PERF] Execution time=0.045767
ERROR - 2026-03-31 12:01:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:01:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-03-31 12:02:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-03-31 12:02:44 --> [CSRF] token name=csrf_test_name hash=cc6880f6004f491d613ba96e56d9d6c1
DEBUG - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [REQUEST][END]
INFO - 2026-03-31 12:02:44 --> [REQ_ID=45d7103b5571] [PERF] Execution time=0.024676
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 12:02:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 12:02:45 --> [CSRF] token name=csrf_test_name hash=d57fdae146db6bd32d8eea0194291e8b
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=c8299b045bb3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 12:02:45 --> [REQ_ID=c8299b045bb3] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 12:02:45 --> [TRACE]
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [FILTER_AFTER]
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [LIFECYCLE][END] status=200 duration_ms=60.38 memory_delta=0
INFO - 2026-03-31 12:02:45 --> [REQ_ID=c8299b045bb3] [PERF] Execution time=0.060412
DEBUG - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [REQUEST][END]
INFO - 2026-03-31 12:02:45 --> [REQ_ID=b56efdd899e0] [PERF] Execution time=0.072827
DEBUG - 2026-03-31 12:05:26 --> [REQ_ID=daad142d7ec0] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-31 12:05:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=DailyFinancialNews
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-03-31 12:05:27 --> [CSRF] token name=csrf_test_name hash=4776e13d07c320f5984c0593b22c6c20
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=61a18090cd97] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-03-31 12:05:27 --> [REQ_ID=61a18090cd97] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 12:05:27 --> [TRACE]
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=61a18090cd97] [METHOD_ENTRY] DailyFinancialNews
DEBUG - 2026-03-31 12:05:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:05:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-03-31 12:05:27 --> MyMICoin initialized ONCE
DEBUG - 2026-03-31 12:05:27 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-03-31 12:05:27 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-03-31 12:05:27 --> MyMIWallets skipped (no user context)
INFO - 2026-03-31 12:05:27 --> [REQ_ID=61a18090cd97] [MEMORY][commonData:start] 6291456
INFO - 2026-03-31 12:05:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 12:05:27 --> [MetaService] slug=how-it-works/daily-financial-news pageName= cacheHit= path=DB
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [FILTER_AFTER]
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [LIFECYCLE][END] status=200 duration_ms=935.35 memory_delta=4194304
INFO - 2026-03-31 12:05:27 --> [REQ_ID=61a18090cd97] [PERF] Execution time=0.937331
DEBUG - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [REQUEST][END]
INFO - 2026-03-31 12:05:27 --> [REQ_ID=daad142d7ec0] [PERF] Execution time=0.976695
DEBUG - 2026-03-31 12:06:22 --> [REQ_ID=586fd2bee8e8] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:06:22 --> [REQ_ID=586fd2bee8e8] [REQUEST][END]
INFO - 2026-03-31 12:06:22 --> [REQ_ID=586fd2bee8e8] [PERF] Execution time=0.039080
ERROR - 2026-03-31 12:06:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:06:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:11:22 --> [REQ_ID=5b2540855747] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:11:22 --> [REQ_ID=5b2540855747] [REQUEST][END]
INFO - 2026-03-31 12:11:22 --> [REQ_ID=5b2540855747] [PERF] Execution time=0.082637
ERROR - 2026-03-31 12:11:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:11:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:12:14 --> [REQ_ID=7ff5674930ec] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:12:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:12:14 --> [404_ROUTE]
DEBUG - 2026-03-31 12:12:14 --> [REQ_ID=7ff5674930ec] [REQUEST][END]
INFO - 2026-03-31 12:12:14 --> [REQ_ID=7ff5674930ec] [PERF] Execution time=0.041564
ERROR - 2026-03-31 12:12:14 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:12:14 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:12:14 --> [REQ_ID=fc21dfe6721b] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:12:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:12:14 --> [404_ROUTE]
DEBUG - 2026-03-31 12:12:14 --> [REQ_ID=fc21dfe6721b] [REQUEST][END]
INFO - 2026-03-31 12:12:14 --> [REQ_ID=fc21dfe6721b] [PERF] Execution time=0.015970
ERROR - 2026-03-31 12:12:14 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:12:14 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [REQUEST][END]
INFO - 2026-03-31 12:15:02 --> [REQ_ID=4e47e59dbb58] [PERF] Execution time=0.043610
ERROR - 2026-03-31 12:15:02 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/API/Alerts/fetchEmailAlerts', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 12:15:02 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-03-31 12:16:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-03-31 12:16:05 --> [CSRF] token name=csrf_test_name hash=4d57e26dfd7b296e464c6e5e457de301
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 12:16:05 --> [TRACE]
INFO - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 12:16:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:16:05 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 12:16:05 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 12:16:05 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [FILTER_AFTER]
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [LIFECYCLE][END] status=200 duration_ms=720.63 memory_delta=4194304
INFO - 2026-03-31 12:16:05 --> [REQ_ID=6678ef76a7cf] [PERF] Execution time=0.723202
DEBUG - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [REQUEST][END]
INFO - 2026-03-31 12:16:05 --> [REQ_ID=7cae99ec759a] [PERF] Execution time=0.735211
DEBUG - 2026-03-31 12:16:22 --> [REQ_ID=ce2e2c537d73] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:16:22 --> [REQ_ID=ce2e2c537d73] [REQUEST][END]
INFO - 2026-03-31 12:16:22 --> [REQ_ID=ce2e2c537d73] [PERF] Execution time=0.088682
ERROR - 2026-03-31 12:16:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:16:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:17:20 --> [REQ_ID=615d8be586f0] [REQUEST][START] GET /index.php
DEBUG - 2026-03-31 12:17:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:17:20 --> [REQ_ID=615d8be586f0] [REQUEST][END]
INFO - 2026-03-31 12:17:20 --> [REQ_ID=615d8be586f0] [PERF] Execution time=0.008707
ERROR - 2026-03-31 12:17:20 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/', 'http_403', 403)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 12:17:20 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-31 12:18:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-03-31 12:18:01 --> [CSRF] token name=csrf_test_name hash=1cbfa4ac4c39b4b30c82546aaf27c943
DEBUG - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [REQUEST][END]
INFO - 2026-03-31 12:18:01 --> [REQ_ID=bec1942ddce3] [PERF] Execution time=0.019216
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 12:18:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 12:18:02 --> [CSRF] token name=csrf_test_name hash=b9ac064369b7886df308add6e7d0c85b
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=6ca258ad3b5f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 12:18:02 --> [REQ_ID=6ca258ad3b5f] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 12:18:02 --> [TRACE]
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [FILTER_AFTER]
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [LIFECYCLE][END] status=200 duration_ms=212.41 memory_delta=0
INFO - 2026-03-31 12:18:02 --> [REQ_ID=6ca258ad3b5f] [PERF] Execution time=0.212725
DEBUG - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [REQUEST][END]
INFO - 2026-03-31 12:18:02 --> [REQ_ID=7444b83f0fff] [PERF] Execution time=0.225571
DEBUG - 2026-03-31 12:18:11 --> [REQ_ID=749d434f1b0b] [REQUEST][START] GET /index.php/News/Market-Movers/November-17th-2021
DEBUG - 2026-03-31 12:18:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:18:11 --> [404_ROUTE]
DEBUG - 2026-03-31 12:18:11 --> [REQ_ID=749d434f1b0b] [REQUEST][END]
INFO - 2026-03-31 12:18:11 --> [REQ_ID=749d434f1b0b] [PERF] Execution time=0.034554
ERROR - 2026-03-31 12:18:11 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-17th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-17th-2021\'
AND `error_type` = \'missing_route\'
AND `status_code` = 404
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_route_error_heatmap`
WHERE `route` = \'/index.php/News/Market-Movers/November-17th-2021\'
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
 8 APPPATH/Config/Events.php(66): App\Services\AIOps\RouteErrorHeatmapService->record('/index.php/News/Market-Movers/November-17th-2021', 'missing_route', 404)
 9 SYSTEMPATH/Events/Events.php(152): CodeIgniter\Events\Events::Config\{closure}()
10 SYSTEMPATH/CodeIgniter.php(357): CodeIgniter\Events\Events::trigger('post_system')
11 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
12 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
13 FCPATH/index.php(121): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-03-31 12:18:11 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:21:22 --> [REQ_ID=fdd286569991] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:21:22 --> [REQ_ID=fdd286569991] [REQUEST][END]
INFO - 2026-03-31 12:21:22 --> [REQ_ID=fdd286569991] [PERF] Execution time=0.077908
ERROR - 2026-03-31 12:21:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:21:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:26:22 --> [REQ_ID=02be721d5a3f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:26:22 --> [REQ_ID=02be721d5a3f] [REQUEST][END]
INFO - 2026-03-31 12:26:22 --> [REQ_ID=02be721d5a3f] [PERF] Execution time=0.211858
ERROR - 2026-03-31 12:26:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:26:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:31:22 --> [REQ_ID=31437fc48b63] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:31:22 --> [REQ_ID=31437fc48b63] [REQUEST][END]
INFO - 2026-03-31 12:31:22 --> [REQ_ID=31437fc48b63] [PERF] Execution time=0.152849
ERROR - 2026-03-31 12:31:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:31:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [REQUEST][START] GET /index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-31 12:34:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [FILTER_BEFORE] /index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=partnerships
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/MyMI-Partnerships
DEBUG - 2026-03-31 12:34:55 --> [CSRF] token name=csrf_test_name hash=01e52faff15fbf7c16af2421d27cfa9c
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [REQUEST][END]
INFO - 2026-03-31 12:34:55 --> [REQ_ID=6ef5c304de57] [PERF] Execution time=0.050417
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 12:34:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 12:34:55 --> [CSRF] token name=csrf_test_name hash=b67843cc564031384b53215bf1b68de0
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=9c500f9832d4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 12:34:55 --> [REQ_ID=9c500f9832d4] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 12:34:55 --> [TRACE]
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [FILTER_AFTER]
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [LIFECYCLE][END] status=200 duration_ms=119.07 memory_delta=0
INFO - 2026-03-31 12:34:55 --> [REQ_ID=9c500f9832d4] [PERF] Execution time=0.117900
DEBUG - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [REQUEST][END]
INFO - 2026-03-31 12:34:55 --> [REQ_ID=2d7e2f30dd06] [PERF] Execution time=0.134332
DEBUG - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-03-31 12:34:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-03-31 12:34:58 --> [CSRF] token name=csrf_test_name hash=48cd5f5f90ff947518570816c304dda6
DEBUG - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [REQUEST][END]
INFO - 2026-03-31 12:34:58 --> [REQ_ID=f6f8d30c71f8] [PERF] Execution time=0.010427
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 12:34:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 12:34:59 --> [CSRF] token name=csrf_test_name hash=93cf3ec7bc9aaf2e5b4c0487f8bd4d1c
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=480b4ccb2d18] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 12:34:59 --> [REQ_ID=480b4ccb2d18] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 12:34:59 --> [TRACE]
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [FILTER_AFTER]
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [LIFECYCLE][END] status=200 duration_ms=20.22 memory_delta=0
INFO - 2026-03-31 12:34:59 --> [REQ_ID=480b4ccb2d18] [PERF] Execution time=0.020548
DEBUG - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [REQUEST][END]
INFO - 2026-03-31 12:34:59 --> [REQ_ID=f4cd22da08aa] [PERF] Execution time=0.029672
DEBUG - 2026-03-31 12:36:22 --> [REQ_ID=575aa36a6198] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:36:22 --> [REQ_ID=575aa36a6198] [REQUEST][END]
INFO - 2026-03-31 12:36:22 --> [REQ_ID=575aa36a6198] [PERF] Execution time=0.197254
ERROR - 2026-03-31 12:36:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:36:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:40:26 --> [REQ_ID=a87f28dd0737] [REQUEST][START] GET /index.php?debugbar
DEBUG - 2026-03-31 12:40:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:40:26 --> [REQ_ID=a87f28dd0737] [FILTER_BEFORE] /index.php?debugbar
DEBUG - 2026-03-31 12:40:26 --> [REQ_ID=a87f28dd0737] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 12:40:26 --> [REQ_ID=a87f28dd0737] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-03-31 12:40:26 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
DEBUG - 2026-03-31 12:40:26 --> [REQ_ID=1b28c48de67c] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 12:40:26 --> [REQ_ID=1b28c48de67c] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 12:40:26 --> [TRACE]
INFO - 2026-03-31 12:40:26 --> [REQ_ID=1b28c48de67c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 12:40:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:40:27 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 12:40:27 --> [REQ_ID=1b28c48de67c] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 12:40:27 --> [REQ_ID=1b28c48de67c] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 12:40:27 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 12:40:27 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 12:40:27 --> [REQ_ID=a87f28dd0737] [FILTER_AFTER]
DEBUG - 2026-03-31 12:40:27 --> [REQ_ID=a87f28dd0737] [LIFECYCLE][END] status=200 duration_ms=625.43 memory_delta=4194304
INFO - 2026-03-31 12:40:27 --> [REQ_ID=1b28c48de67c] [PERF] Execution time=0.627197
DEBUG - 2026-03-31 12:40:27 --> [REQ_ID=a87f28dd0737] [REQUEST][END]
INFO - 2026-03-31 12:40:27 --> [REQ_ID=a87f28dd0737] [PERF] Execution time=0.672317
DEBUG - 2026-03-31 12:41:22 --> [REQ_ID=4eabf3cd1475] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:41:22 --> [REQ_ID=4eabf3cd1475] [REQUEST][END]
INFO - 2026-03-31 12:41:22 --> [REQ_ID=4eabf3cd1475] [PERF] Execution time=0.093574
ERROR - 2026-03-31 12:41:22 --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
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
DEBUG - 2026-03-31 12:41:22 --> Route heatmap post_system hook skipped: Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
DEBUG - 2026-03-31 12:41:31 --> [REQ_ID=04affe783ff8] [REQUEST][START] POST /index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:41:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:41:31 --> [REQ_ID=04affe783ff8] [FILTER_BEFORE] /index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:41:31 --> [REQ_ID=04affe783ff8] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=accountManager
DEBUG - 2026-03-31 12:41:31 --> [REQ_ID=04affe783ff8] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:41:31 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
CRITICAL - 2026-03-31 12:41:31 --> [CSRF][EXCEPTION] The action you requested is not allowed.
DEBUG - 2026-03-31 12:42:17 --> [REQ_ID=50a3e1d5f361] [REQUEST][START] POST /index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:42:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:42:17 --> [REQ_ID=50a3e1d5f361] [FILTER_BEFORE] /index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:42:17 --> [REQ_ID=50a3e1d5f361] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=accountManager
DEBUG - 2026-03-31 12:42:17 --> [REQ_ID=50a3e1d5f361] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Budget/Account-Manager
DEBUG - 2026-03-31 12:42:17 --> [CSRF] token name=csrf_test_name hash=1c9c59e0c8ba08078b48eceef5834bd6
CRITICAL - 2026-03-31 12:42:17 --> [CSRF][EXCEPTION] The action you requested is not allowed.
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [REQUEST][START] GET /
DEBUG - 2026-03-31 12:46:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [FILTER_BEFORE] /
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 12:46:08 --> [CSRF] token name=csrf_test_name hash=12c1e65af21bcf4a3c0e15ba443f447c
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 12:46:08 --> [TRACE]
INFO - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 12:46:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:46:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 12:46:08 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 12:46:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [FILTER_AFTER]
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [LIFECYCLE][END] status=200 duration_ms=588.16 memory_delta=4194304
INFO - 2026-03-31 12:46:08 --> [REQ_ID=dbdf13d2d88e] [PERF] Execution time=0.589953
DEBUG - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [REQUEST][END]
INFO - 2026-03-31 12:46:08 --> [REQ_ID=3edd46cd8cb6] [PERF] Execution time=0.627442
DEBUG - 2026-03-31 12:46:22 --> [REQ_ID=bee04ffabbcc] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:46:22 --> [REQ_ID=bee04ffabbcc] [REQUEST][END]
INFO - 2026-03-31 12:46:22 --> [REQ_ID=bee04ffabbcc] [PERF] Execution time=0.014246
DEBUG - 2026-03-31 12:51:22 --> [REQ_ID=f1a309178112] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:51:22 --> [REQ_ID=f1a309178112] [REQUEST][END]
INFO - 2026-03-31 12:51:22 --> [REQ_ID=f1a309178112] [PERF] Execution time=0.080369
INFO - 2026-03-31 12:54:57 --> [SPARK_START] App\Commands\AIOps\CspAudit
INFO - 2026-03-31 12:54:57 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 12:54:57 --> [spark:aiops:csp:audit] Intent
INFO - 2026-03-31 12:55:27 --> [SPARK_COMPLETE] App\Commands\AIOps\CspAudit duration=30.351072
INFO - 2026-03-31 12:55:27 --> [SPARK_MEMORY] 39845888
DEBUG - 2026-03-31 12:56:22 --> [REQ_ID=14e3584a07e7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 12:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 12:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 12:56:22 --> [REQ_ID=14e3584a07e7] [REQUEST][END]
INFO - 2026-03-31 12:56:22 --> [REQ_ID=14e3584a07e7] [PERF] Execution time=0.055038
DEBUG - 2026-03-31 12:58:56 --> [REQ_ID=9df9f163d86d] [REQUEST][START] GET /
DEBUG - 2026-03-31 12:58:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:58:56 --> [REQ_ID=9df9f163d86d] [FILTER_BEFORE] /
DEBUG - 2026-03-31 12:58:56 --> [REQ_ID=9df9f163d86d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 12:58:56 --> [REQ_ID=9df9f163d86d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 12:58:56 --> [CSRF] token name=csrf_test_name hash=75adda8393eb9529417192af540c1630
DEBUG - 2026-03-31 12:58:56 --> [REQ_ID=7d5e53c41010] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 12:58:56 --> [REQ_ID=7d5e53c41010] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 12:58:56 --> [TRACE]
INFO - 2026-03-31 12:58:56 --> [REQ_ID=7d5e53c41010] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 12:58:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:58:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 12:58:57 --> [REQ_ID=7d5e53c41010] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 12:58:57 --> [REQ_ID=7d5e53c41010] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 12:58:57 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 12:58:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 12:58:57 --> [REQ_ID=9df9f163d86d] [FILTER_AFTER]
DEBUG - 2026-03-31 12:58:57 --> [REQ_ID=9df9f163d86d] [LIFECYCLE][END] status=200 duration_ms=706.95 memory_delta=4194304
INFO - 2026-03-31 12:58:57 --> [REQ_ID=7d5e53c41010] [PERF] Execution time=0.708948
DEBUG - 2026-03-31 12:58:57 --> [REQ_ID=9df9f163d86d] [REQUEST][END]
INFO - 2026-03-31 12:58:57 --> [REQ_ID=9df9f163d86d] [PERF] Execution time=0.744965
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [REQUEST][START] GET /
DEBUG - 2026-03-31 12:58:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [FILTER_BEFORE] /
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 12:58:59 --> [CSRF] token name=csrf_test_name hash=75adda8393eb9529417192af540c1630
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 12:58:59 --> [TRACE]
INFO - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 12:58:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 12:58:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 12:58:59 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 12:58:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [FILTER_AFTER]
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [LIFECYCLE][END] status=200 duration_ms=490.53 memory_delta=2097152
INFO - 2026-03-31 12:58:59 --> [REQ_ID=fcf0126aaad4] [PERF] Execution time=0.490613
DEBUG - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [REQUEST][END]
INFO - 2026-03-31 12:58:59 --> [REQ_ID=bcf1f042338c] [PERF] Execution time=0.501025
DEBUG - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [REQUEST][END]
INFO - 2026-03-31 13:00:01 --> [REQ_ID=cdc016f78fea] [PERF] Execution time=0.029374
DEBUG - 2026-03-31 13:00:25 --> [REQ_ID=a8328719360b] [REQUEST][START] GET /
DEBUG - 2026-03-31 13:00:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:00:25 --> [REQ_ID=a8328719360b] [FILTER_BEFORE] /
DEBUG - 2026-03-31 13:00:25 --> [REQ_ID=a8328719360b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 13:00:25 --> [REQ_ID=a8328719360b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 13:00:25 --> [CSRF] token name=csrf_test_name hash=60c90be2a6887b798f76a49d866992f3
DEBUG - 2026-03-31 13:00:25 --> [REQ_ID=f9c3973bcaa9] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 13:00:25 --> [REQ_ID=f9c3973bcaa9] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 13:00:25 --> [TRACE]
INFO - 2026-03-31 13:00:26 --> [REQ_ID=f9c3973bcaa9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-03-31 13:00:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 13:00:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-03-31 13:00:26 --> [REQ_ID=f9c3973bcaa9] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 13:00:26 --> [REQ_ID=f9c3973bcaa9] [MEMORY][commonData:start] 8388608
INFO - 2026-03-31 13:00:26 --> themesMemory usage: 8388608
DEBUG - 2026-03-31 13:00:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-03-31 13:00:26 --> [REQ_ID=a8328719360b] [FILTER_AFTER]
DEBUG - 2026-03-31 13:00:26 --> [REQ_ID=a8328719360b] [LIFECYCLE][END] status=200 duration_ms=749.12 memory_delta=4194304
INFO - 2026-03-31 13:00:26 --> [REQ_ID=f9c3973bcaa9] [PERF] Execution time=0.749143
DEBUG - 2026-03-31 13:00:26 --> [REQ_ID=a8328719360b] [REQUEST][END]
INFO - 2026-03-31 13:00:26 --> [REQ_ID=a8328719360b] [PERF] Execution time=0.758588
DEBUG - 2026-03-31 13:01:22 --> [REQ_ID=592d82677fc7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:01:22 --> [REQ_ID=592d82677fc7] [REQUEST][END]
INFO - 2026-03-31 13:01:22 --> [REQ_ID=592d82677fc7] [PERF] Execution time=0.122352
DEBUG - 2026-03-31 13:06:22 --> [REQ_ID=67d6a27f3348] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:06:22 --> [REQ_ID=67d6a27f3348] [REQUEST][END]
INFO - 2026-03-31 13:06:22 --> [REQ_ID=67d6a27f3348] [PERF] Execution time=0.051751
DEBUG - 2026-03-31 13:11:22 --> [REQ_ID=d528f9a2ffe7] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:11:22 --> [REQ_ID=d528f9a2ffe7] [REQUEST][END]
INFO - 2026-03-31 13:11:22 --> [REQ_ID=d528f9a2ffe7] [PERF] Execution time=0.145312
DEBUG - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [REQUEST][END]
INFO - 2026-03-31 13:15:01 --> [REQ_ID=2150e4614447] [PERF] Execution time=0.042134
DEBUG - 2026-03-31 13:16:22 --> [REQ_ID=65da2077ae11] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:16:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:16:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:16:22 --> [REQ_ID=65da2077ae11] [REQUEST][END]
INFO - 2026-03-31 13:16:22 --> [REQ_ID=65da2077ae11] [PERF] Execution time=0.052010
DEBUG - 2026-03-31 13:21:22 --> [REQ_ID=96e1fb1b9bdd] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:21:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:21:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:21:22 --> [REQ_ID=96e1fb1b9bdd] [REQUEST][END]
INFO - 2026-03-31 13:21:22 --> [REQ_ID=96e1fb1b9bdd] [PERF] Execution time=0.060719
DEBUG - 2026-03-31 13:26:21 --> [REQ_ID=e736c5464167] [REQUEST][START] GET /index.php/News/Market-Movers/November-23rd-2021
DEBUG - 2026-03-31 13:26:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:26:21 --> [404_ROUTE]
DEBUG - 2026-03-31 13:26:21 --> [REQ_ID=e736c5464167] [REQUEST][END]
INFO - 2026-03-31 13:26:21 --> [REQ_ID=e736c5464167] [PERF] Execution time=0.153757
DEBUG - 2026-03-31 13:26:22 --> [REQ_ID=c9514bacf970] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:26:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:26:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:26:22 --> [REQ_ID=c9514bacf970] [REQUEST][END]
INFO - 2026-03-31 13:26:22 --> [REQ_ID=c9514bacf970] [PERF] Execution time=0.138935
DEBUG - 2026-03-31 13:29:31 --> [REQ_ID=ee4a656b9332] [REQUEST][START] GET /
DEBUG - 2026-03-31 13:29:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:29:31 --> [REQ_ID=ee4a656b9332] [FILTER_BEFORE] /
DEBUG - 2026-03-31 13:29:31 --> [REQ_ID=ee4a656b9332] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-03-31 13:29:31 --> [REQ_ID=ee4a656b9332] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-03-31 13:29:31 --> [CSRF] token name=csrf_test_name hash=706a87a62112dc2a50320d4ab76c90bb
DEBUG - 2026-03-31 13:29:31 --> [REQ_ID=e70d5073254f] [INIT] App\Controllers\Home::GET
INFO - 2026-03-31 13:29:31 --> [REQ_ID=e70d5073254f] [MEMORY][controller-start] 6291456
DEBUG - 2026-03-31 13:29:31 --> [TRACE]
INFO - 2026-03-31 13:29:31 --> [REQ_ID=e70d5073254f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-03-31 13:29:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-03-31 13:29:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-03-31 13:29:32 --> [REQ_ID=e70d5073254f] [VIEW_RENDER] themes/public/home
INFO - 2026-03-31 13:29:32 --> [REQ_ID=e70d5073254f] [MEMORY][commonData:start] 10485760
INFO - 2026-03-31 13:29:32 --> themesMemory usage: 10485760
DEBUG - 2026-03-31 13:29:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-03-31 13:29:32 --> [REQ_ID=ee4a656b9332] [FILTER_AFTER]
DEBUG - 2026-03-31 13:29:32 --> [REQ_ID=ee4a656b9332] [LIFECYCLE][END] status=200 duration_ms=667.75 memory_delta=4194304
INFO - 2026-03-31 13:29:32 --> [REQ_ID=e70d5073254f] [PERF] Execution time=0.675012
DEBUG - 2026-03-31 13:29:32 --> [REQ_ID=ee4a656b9332] [REQUEST][END]
INFO - 2026-03-31 13:29:32 --> [REQ_ID=ee4a656b9332] [PERF] Execution time=0.716303
DEBUG - 2026-03-31 13:31:22 --> [REQ_ID=b352cadeca39] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:31:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:31:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:31:22 --> [REQ_ID=b352cadeca39] [REQUEST][END]
INFO - 2026-03-31 13:31:22 --> [REQ_ID=b352cadeca39] [PERF] Execution time=0.153399
DEBUG - 2026-03-31 13:36:22 --> [REQ_ID=974a5c073349] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:36:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:36:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:36:22 --> [REQ_ID=974a5c073349] [REQUEST][END]
INFO - 2026-03-31 13:36:22 --> [REQ_ID=974a5c073349] [PERF] Execution time=0.190986
DEBUG - 2026-03-31 13:41:22 --> [REQ_ID=e3beaae4b960] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:41:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:41:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:41:22 --> [REQ_ID=e3beaae4b960] [REQUEST][END]
INFO - 2026-03-31 13:41:22 --> [REQ_ID=e3beaae4b960] [PERF] Execution time=0.287127
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-03-31 13:42:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-03-31 13:42:38 --> [CSRF] token name=csrf_test_name hash=3defcf3d58f37122a13a0c6c87c9899d
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [REQUEST][END]
INFO - 2026-03-31 13:42:38 --> [REQ_ID=c5a5329112c3] [PERF] Execution time=0.023057
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-03-31 13:42:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-03-31 13:42:38 --> [CSRF] token name=csrf_test_name hash=6b5c7ad909f357dab49f0e56dc5c46e6
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=4e7af5d9f923] [INIT] App\Controllers\AuthController::GET
INFO - 2026-03-31 13:42:38 --> [REQ_ID=4e7af5d9f923] [MEMORY][controller-start] 4194304
DEBUG - 2026-03-31 13:42:38 --> [TRACE]
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [FILTER_AFTER]
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [LIFECYCLE][END] status=200 duration_ms=24.20 memory_delta=0
INFO - 2026-03-31 13:42:38 --> [REQ_ID=4e7af5d9f923] [PERF] Execution time=0.024243
DEBUG - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [REQUEST][END]
INFO - 2026-03-31 13:42:38 --> [REQ_ID=195a97f28e2c] [PERF] Execution time=0.036947
DEBUG - 2026-03-31 13:46:22 --> [REQ_ID=4303038ab574] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:46:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:46:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:46:22 --> [REQ_ID=4303038ab574] [REQUEST][END]
INFO - 2026-03-31 13:46:22 --> [REQ_ID=4303038ab574] [PERF] Execution time=0.237895
DEBUG - 2026-03-31 13:51:22 --> [REQ_ID=3554116b60fe] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:51:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:51:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:51:22 --> [REQ_ID=3554116b60fe] [REQUEST][END]
INFO - 2026-03-31 13:51:22 --> [REQ_ID=3554116b60fe] [PERF] Execution time=0.208044
DEBUG - 2026-03-31 13:56:22 --> [REQ_ID=158d23681290] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 13:56:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 13:56:22 --> [404_ROUTE]
DEBUG - 2026-03-31 13:56:22 --> [REQ_ID=158d23681290] [REQUEST][END]
INFO - 2026-03-31 13:56:22 --> [REQ_ID=158d23681290] [PERF] Execution time=0.051934
DEBUG - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 14:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [REQUEST][END]
INFO - 2026-03-31 14:00:01 --> [REQ_ID=29f2945cb342] [PERF] Execution time=0.050323
INFO - 2026-03-31 14:00:51 --> [SPARK_START] App\Commands\AIOps\ExecuteDocs
INFO - 2026-03-31 14:00:51 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 14:00:51 --> [spark:aiops:execute-docs] Intent
INFO - 2026-03-31 14:00:51 --> [SPARK_COMPLETE] App\Commands\AIOps\ExecuteDocs duration=0.310860
INFO - 2026-03-31 14:00:51 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-31 14:01:22 --> [REQ_ID=3fd7aa1f4b7e] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 14:01:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 14:01:22 --> [404_ROUTE]
DEBUG - 2026-03-31 14:01:22 --> [REQ_ID=3fd7aa1f4b7e] [REQUEST][END]
INFO - 2026-03-31 14:01:22 --> [REQ_ID=3fd7aa1f4b7e] [PERF] Execution time=0.056731
INFO - 2026-03-31 14:06:01 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-03-31 14:06:01 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-03-31 14:06:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-03-31 14:06:01 --> [spark:logs:summarize] Intent
INFO - 2026-03-31 14:06:01 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-03-31 14:06:01 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.016016
INFO - 2026-03-31 14:06:01 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-03-31 14:06:22 --> [REQ_ID=e1595cd0823f] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 14:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 14:06:22 --> [404_ROUTE]
DEBUG - 2026-03-31 14:06:22 --> [REQ_ID=e1595cd0823f] [REQUEST][END]
INFO - 2026-03-31 14:06:22 --> [REQ_ID=e1595cd0823f] [PERF] Execution time=0.230323
DEBUG - 2026-03-31 14:11:22 --> [REQ_ID=5b947fed91c3] [REQUEST][START] HEAD /
DEBUG - 2026-03-31 14:11:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-03-31 14:11:22 --> [404_ROUTE]
DEBUG - 2026-03-31 14:11:22 --> [REQ_ID=5b947fed91c3] [REQUEST][END]
INFO - 2026-03-31 14:11:22 --> [REQ_ID=5b947fed91c3] [PERF] Execution time=0.158662
