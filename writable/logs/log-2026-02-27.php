<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

INFO - 2026-02-27 00:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-27 00:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 00:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 00:00:01 --> [REQ_ID=1b05c9e9ce5d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 00:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 00:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041135
INFO - 2026-02-27 00:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:00:01 --> [REQ_ID=1b05c9e9ce5d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 00:00:01 --> [REQ_ID=1b05c9e9ce5d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 00:00:01 --> [REQ_ID=1b05c9e9ce5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 00:00:02 --> [REQ_ID=1b05c9e9ce5d] [REQUEST][END]
INFO - 2026-02-27 00:00:02 --> [REQ_ID=1b05c9e9ce5d] [PERF] Execution time=0.097231
INFO - 2026-02-27 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 00:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 00:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.002586
INFO - 2026-02-27 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 00:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 00:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 00:00:04 --> LOG_HEALTHCHECK debug marker=0aef70f4983d
INFO - 2026-02-27 00:00:04 --> LOG_HEALTHCHECK info marker=0aef70f4983d
NOTICE - 2026-02-27 00:00:04 --> LOG_HEALTHCHECK probe marker=0aef70f4983d
INFO - 2026-02-27 00:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 00:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025399
INFO - 2026-02-27 00:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 00:04:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=242.377899
INFO - 2026-02-27 00:04:04 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [REQUEST][START] GET /index.php/Knowledgebase/Getting-Started
DEBUG - 2026-02-27 00:06:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [FILTER_BEFORE] /index.php/Knowledgebase/Getting-Started
DEBUG - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=show
DEBUG - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Getting-Started
DEBUG - 2026-02-27 00:06:39 --> [CSRF] token name=csrf_test_name hash=54d5a1280c246f628682477a3106205f
DEBUG - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [REQUEST][END]
INFO - 2026-02-27 00:06:39 --> [REQ_ID=66505687bf31] [PERF] Execution time=0.053434
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 00:06:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 00:06:43 --> [CSRF] token name=csrf_test_name hash=7d0470ced9319fa4fe941679f127374f
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=00e81f3dd57e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 00:06:43 --> [REQ_ID=00e81f3dd57e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [FILTER_AFTER]
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [LIFECYCLE][END] status=200 duration_ms=40.97 memory_delta=0
INFO - 2026-02-27 00:06:43 --> [REQ_ID=00e81f3dd57e] [PERF] Execution time=0.040339
DEBUG - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [REQUEST][END]
INFO - 2026-02-27 00:06:43 --> [REQ_ID=faba179a17a1] [PERF] Execution time=0.054665
DEBUG - 2026-02-27 00:14:48 --> [REQ_ID=afb02f7583ab] [REQUEST][START] GET /
DEBUG - 2026-02-27 00:14:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:48 --> [REQ_ID=afb02f7583ab] [FILTER_BEFORE] /
DEBUG - 2026-02-27 00:14:48 --> [REQ_ID=afb02f7583ab] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 00:14:48 --> [REQ_ID=afb02f7583ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 00:14:48 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:14:48 --> [REQ_ID=79aee161a554] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 00:14:48 --> [REQ_ID=79aee161a554] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 00:14:48 --> [REQ_ID=79aee161a554] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 00:14:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 00:14:49 --> [REQ_ID=79aee161a554] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 00:14:49 --> [REQ_ID=79aee161a554] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 00:14:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 00:14:49 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 00:14:49 --> [REQ_ID=afb02f7583ab] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:49 --> [REQ_ID=afb02f7583ab] [LIFECYCLE][END] status=200 duration_ms=732.90 memory_delta=4194304
INFO - 2026-02-27 00:14:49 --> [REQ_ID=79aee161a554] [PERF] Execution time=0.730779
DEBUG - 2026-02-27 00:14:49 --> [REQ_ID=afb02f7583ab] [REQUEST][END]
INFO - 2026-02-27 00:14:49 --> [REQ_ID=afb02f7583ab] [PERF] Execution time=0.773363
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-27 00:14:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 00:14:54 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [METHOD_ENTRY] index
DEBUG - 2026-02-27 00:14:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 00:14:54 --> [DASHBOARD] Enter
ERROR - 2026-02-27 00:14:54 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-27 00:14:54 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-02-27 00:14:54 --> Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 00:14:54\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 00:14:54\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 00:14:54\'')
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
12 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-02-27 00:14:54 --> MyMIInvestments::getSqueezeHighRiskCount failed: Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
DEBUG - 2026-02-27 00:14:54 --> 📰 Daily dashboard news window 2026-02-27 00:00:00 -> 2026-02-27 23:59:59 returned 0 rows
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SETUP] Status computed
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"01"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"01"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"01","year":"2026","status":1}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-02-27 00:14:54 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:14:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 00:14:54 --> getSolanaData: invalid address param
INFO - 2026-02-27 00:14:54 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [LIFECYCLE][END] status=200 duration_ms=760.62 memory_delta=2097152
INFO - 2026-02-27 00:14:54 --> [REQ_ID=c24f890b7206] [PERF] Execution time=0.754102
DEBUG - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [REQUEST][END]
INFO - 2026-02-27 00:14:54 --> [REQ_ID=09a8297dcc37] [PERF] Execution time=0.777098
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 00:14:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=e7ce01f4fe4a] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 00:14:55 --> [REQ_ID=e7ce01f4fe4a] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=e7ce01f4fe4a] [METHOD_ENTRY] getConfidenceHeatmap
DEBUG - 2026-02-27 00:14:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:55 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=177a567970ac] [REQUEST][START] GET /
DEBUG - 2026-02-27 00:14:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=177a567970ac] [FILTER_BEFORE] /
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=177a567970ac] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=177a567970ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 00:14:55 --> [CSRF] token name=csrf_test_name hash=d6ef99cbe71c8b7df195bf6d6a0a0198
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=d0f786661f1f] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 00:14:55 --> [REQ_ID=d0f786661f1f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [LIFECYCLE][END] status=200 duration_ms=114.90 memory_delta=0
INFO - 2026-02-27 00:14:55 --> [REQ_ID=e7ce01f4fe4a] [PERF] Execution time=0.115198
DEBUG - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [REQUEST][END]
INFO - 2026-02-27 00:14:55 --> [REQ_ID=ad8a37950c8a] [PERF] Execution time=0.414135
INFO - 2026-02-27 00:14:56 --> [REQ_ID=d0f786661f1f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 00:14:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=d0f786661f1f] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 00:14:56 --> [REQ_ID=d0f786661f1f] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 00:14:56 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 00:14:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=177a567970ac] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=177a567970ac] [LIFECYCLE][END] status=200 duration_ms=569.31 memory_delta=4194304
INFO - 2026-02-27 00:14:56 --> [REQ_ID=d0f786661f1f] [PERF] Execution time=0.567507
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=177a567970ac] [REQUEST][END]
INFO - 2026-02-27 00:14:56 --> [REQ_ID=177a567970ac] [PERF] Execution time=0.611625
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=6d999b132e0b] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=2c9d6d17209a] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=6d999b132e0b] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=6d999b132e0b] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=6d999b132e0b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=75599cf261a7] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 00:14:56 --> [REQ_ID=75599cf261a7] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=75599cf261a7] [METHOD_ENTRY] getForecastHighlights
DEBUG - 2026-02-27 00:14:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=c51c589ec78c] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 00:14:56 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 00:14:56 --> [REQ_ID=ce29a4112dc3] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=6d999b132e0b] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=6d999b132e0b] [LIFECYCLE][END] status=200 duration_ms=443.66 memory_delta=2097152
INFO - 2026-02-27 00:14:57 --> [REQ_ID=75599cf261a7] [PERF] Execution time=0.442607
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=6d999b132e0b] [REQUEST][END]
INFO - 2026-02-27 00:14:57 --> [REQ_ID=6d999b132e0b] [PERF] Execution time=0.462495
DEBUG - 2026-02-27 00:14:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=b6a37f0b0f79] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 00:14:57 --> [REQ_ID=b6a37f0b0f79] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=b6a37f0b0f79] [METHOD_ENTRY] getForecastAccuracySummary
DEBUG - 2026-02-27 00:14:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:57 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
ERROR - 2026-02-27 00:14:57 --> API getForecastAccuracySummary failed: Call to undefined method App\Services\ForecastAccuracyEvaluator::getAccuracyDashboardData()
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [LIFECYCLE][END] status=500 duration_ms=21.57 memory_delta=0
INFO - 2026-02-27 00:14:57 --> [REQ_ID=b6a37f0b0f79] [PERF] Execution time=0.021547
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [REQUEST][END]
INFO - 2026-02-27 00:14:57 --> [REQ_ID=2c9d6d17209a] [PERF] Execution time=0.490964
DEBUG - 2026-02-27 00:14:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=0977e4f5196c] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 00:14:57 --> [REQ_ID=0977e4f5196c] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=0977e4f5196c] [METHOD_ENTRY] getConfidenceHeatmap
DEBUG - 2026-02-27 00:14:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:57 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
ERROR - 2026-02-27 00:14:57 --> API getConfidenceHeatmap failed: App\Services\ForecastAggregationService::getConfidenceHeatmap(): Argument #2 ($windowMinutes) must be of type int, string given, called in /home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/InvestmentsAPIController.php on line 301
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [LIFECYCLE][END] status=500 duration_ms=138.80 memory_delta=2097152
INFO - 2026-02-27 00:14:57 --> [REQ_ID=0977e4f5196c] [PERF] Execution time=0.138089
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [REQUEST][END]
INFO - 2026-02-27 00:14:57 --> [REQ_ID=c51c589ec78c] [PERF] Execution time=0.544547
DEBUG - 2026-02-27 00:14:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=ce29a4112dc3] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=ce29a4112dc3] [ROUTE] Controller=\App\Controllers\OpsController Method=health
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=ce29a4112dc3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-02-27 00:14:57 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
CRITICAL - 2026-02-27 00:14:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: ops/health]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 00:14:57 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 00:14:57 --> [404] URI=https://www.mymiwallet.com/index.php/ops/health
WARNING - 2026-02-27 00:14:57 --> 404 route miss: https://www.mymiwallet.com/index.php/ops/health | referrer: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 00:14:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=1893f607b35b] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 00:14:57 --> [REQ_ID=1893f607b35b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=1893f607b35b] [METHOD_ENTRY] getForecastHighlights
DEBUG - 2026-02-27 00:14:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:14:57 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:14:57 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [FILTER_AFTER]
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [LIFECYCLE][END] status=200 duration_ms=17.26 memory_delta=0
INFO - 2026-02-27 00:14:57 --> [REQ_ID=1893f607b35b] [PERF] Execution time=0.017121
DEBUG - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [REQUEST][END]
INFO - 2026-02-27 00:14:57 --> [REQ_ID=7f63b37acd8e] [PERF] Execution time=0.226621
DEBUG - 2026-02-27 00:14:59 --> [REQ_ID=c6dc02c11486] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-27 00:14:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:14:59 --> [REQ_ID=c6dc02c11486] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-27 00:14:59 --> [REQ_ID=c6dc02c11486] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-27 00:14:59 --> [REQ_ID=c6dc02c11486] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-27 00:14:59 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:14:59 --> [REQ_ID=2224258d347e] [INIT] App\Modules\Management\Controllers\AdminController::GET
INFO - 2026-02-27 00:14:59 --> [REQ_ID=2224258d347e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:15:00 --> [REQ_ID=2224258d347e] [METHOD_ENTRY] index
DEBUG - 2026-02-27 00:15:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:15:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:00 --> AdminController initialized. Memory: 4194304
DEBUG - 2026-02-27 00:15:00 --> [REQ_ID=2224258d347e] [VIEW_RENDER] ManagementModule\Views\index
INFO - 2026-02-27 00:15:00 --> [REQ_ID=2224258d347e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 00:15:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:00 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:00 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:00 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:00 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:00 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:00 --> MyMIWallets::getUserWallets user=2 type=checking rows=20
DEBUG - 2026-02-27 00:15:00 --> MyMIWallets::getUserWallets user=2 type=credit rows=1
DEBUG - 2026-02-27 00:15:00 --> MyMIWallets::getUserWallets user=2 type=debt rows=3
DEBUG - 2026-02-27 00:15:00 --> MyMIWallets::getUserWallets user=2 type=investment rows=3
DEBUG - 2026-02-27 00:15:00 --> MyMIWallets::getUserWallets user=2 type=savings rows=0
INFO - 2026-02-27 00:15:00 --> [REQ_ID=2224258d347e] [PERF] Execution time=0.056312
DEBUG - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [REQUEST][END]
INFO - 2026-02-27 00:15:01 --> [REQ_ID=b3b12c521c37] [PERF] Execution time=0.051114
INFO - 2026-02-27 00:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 00:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 00:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 00:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 00:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.022943
INFO - 2026-02-27 00:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=34862e09bf7c] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-27 00:15:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=34862e09bf7c] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=34862e09bf7c] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=34862e09bf7c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-27 00:15:18 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [INIT] App\Modules\Management\Controllers\AdminController::GET
INFO - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [METHOD_ENTRY] index
DEBUG - 2026-02-27 00:15:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:15:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:18 --> AdminController initialized. Memory: 4194304
DEBUG - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [VIEW_RENDER] ManagementModule\Views\index
INFO - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 00:15:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:18 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:18 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:18 --> MyMIWallets::getUserWallets user=2 type=checking rows=20
DEBUG - 2026-02-27 00:15:18 --> MyMIWallets::getUserWallets user=2 type=credit rows=1
DEBUG - 2026-02-27 00:15:18 --> MyMIWallets::getUserWallets user=2 type=debt rows=3
DEBUG - 2026-02-27 00:15:18 --> MyMIWallets::getUserWallets user=2 type=investment rows=3
DEBUG - 2026-02-27 00:15:18 --> MyMIWallets::getUserWallets user=2 type=savings rows=0
INFO - 2026-02-27 00:15:18 --> [REQ_ID=f11b0166a238] [PERF] Execution time=0.045437
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=56e5d24310c6] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-27 00:15:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=56e5d24310c6] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=56e5d24310c6] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=56e5d24310c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-27 00:15:27 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [INIT] App\Modules\Management\Controllers\AdminController::GET
INFO - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [METHOD_ENTRY] index
DEBUG - 2026-02-27 00:15:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:15:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:27 --> AdminController initialized. Memory: 6291456
DEBUG - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [VIEW_RENDER] ManagementModule\Views\index
INFO - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 00:15:27 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:27 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:27 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:27 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:27 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:27 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:27 --> MyMIWallets::getUserWallets user=2 type=checking rows=20
DEBUG - 2026-02-27 00:15:27 --> MyMIWallets::getUserWallets user=2 type=credit rows=1
DEBUG - 2026-02-27 00:15:27 --> MyMIWallets::getUserWallets user=2 type=debt rows=3
DEBUG - 2026-02-27 00:15:27 --> MyMIWallets::getUserWallets user=2 type=investment rows=3
DEBUG - 2026-02-27 00:15:27 --> MyMIWallets::getUserWallets user=2 type=savings rows=0
INFO - 2026-02-27 00:15:27 --> [REQ_ID=9315b5332101] [PERF] Execution time=0.036532
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=01ec1eb7cbd9] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 00:15:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=01ec1eb7cbd9] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=01ec1eb7cbd9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=01ec1eb7cbd9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 00:15:34 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 00:15:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [METHOD_ENTRY] index
DEBUG - 2026-02-27 00:15:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:34 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 00:15:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 00:15:34 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [VIEW_RENDER] App\Modules\Management\Views\Projects\index
INFO - 2026-02-27 00:15:34 --> [REQ_ID=91465b7069e0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:34 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 00:15:35 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 00:15:35 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 00:15:35 --> Projects\index L4 - $projects Array: Array
(
    [allProjects] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [name] => Green Energy Initiative (TEST)
                    [slug] => 
                    [visibility] => public
                    [description] => A project aimed at funding green energy solutions to reduce carbon emissions.
                    [target_amount] => 500000.00
                    [current_amount] => 150000.00
                    [status] => active
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-10 04:47:51
                    [updated_at] => 2024-11-23 05:54:39
                    [investment_goal] => 500000.00
                    [funds_raised] => 150000.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 15
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 30
                    [average_investment] => 10000.00
                    [top_investor_id] => 3
                    [revenue_generated] => 0.00
                    [project_stage] => fundraising
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => Exciting project to improve global sustainability
                    [promotional_links] => ["https://greenproject.com", "https://investinenergy.org"]
                )

            [1] => Array
                (
                    [id] => 2
                    [name] => Tech Startup Fund (TEST)
                    [slug] => 
                    [visibility] => public
                    [description] => Fund a technology startup with a unique approach to AI-driven financial tools.
                    [target_amount] => 1000000.00
                    [current_amount] => 250000.00
                    [status] => active
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-10 04:47:51
                    [updated_at] => 2024-11-23 05:54:39
                    [investment_goal] => 1000000.00
                    [funds_raised] => 250000.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 25
                    [minimum_investment] => 500.00
                    [maximum_investment] => 
                    [progress_percentage] => 25
                    [average_investment] => 10000.00
                    [top_investor_id] => 5
                    [revenue_generated] => 0.00
                    [project_stage] => fundraising
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => Targeting early adopters and angel investors
                    [promotional_links] => ["https://techfund.com", "https://investintechstartups.com"]
                )

            [2] => Array
                (
                    [id] => 3
                    [name] => Community Development Project (TEST)
                    [slug] => 
                    [visibility] => public
                    [description] => Revitalize and support community infrastructure and services.
                    [target_amount] => 300000.00
                    [current_amount] => 300000.00
                    [status] => active
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-10 04:47:51
                    [updated_at] => 2024-11-23 05:54:39
                    [investment_goal] => 300000.00
                    [funds_raised] => 300000.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 50
                    [minimum_investment] => 50.00
                    [maximum_investment] => 10000.00
                    [progress_percentage] => 100
                    [average_investment] => 6000.00
                    [top_investor_id] => 7
                    [revenue_generated] => 111223.21
                    [project_stage] => complete
                    [completion_date] => 2024-09-15
                    [last_investment_date] => 
                    [remarks] => Successfully funded and completed
                    [promotional_links] => ["https://communityproject.org"]
                )

            [3] => Array
                (
                    [id] => 4
                    [name] => Education for All (TEST)
                    [slug] => 
                    [visibility] => public
                    [description] => Provide access to quality education in underserved regions.
                    [target_amount] => 750000.00
                    [current_amount] => 500000.00
                    [status] => active
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-10 04:47:51
                    [updated_at] => 2024-11-23 05:54:39
                    [investment_goal] => 750000.00
                    [funds_raised] => 500000.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 40
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 66.7
                    [average_investment] => 12500.00
                    [top_investor_id] => 6
                    [revenue_generated] => 0.00
                    [project_stage] => development
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => Focus on digital education tools and scholarships
                    [promotional_links] => ["https://educationforall.com", "https://investineducation.org"]
                )

            [4] => Array
                (
                    [id] => 5
                    [name] => Test
                    [slug] => 
                    [visibility] => public
                    [description] => Test
                    [target_amount] => 1000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 04:53:30
                    [updated_at] => 2024-11-25 20:53:30
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [5] => Array
                (
                    [id] => 6
                    [name] => Test
                    [slug] => 
                    [visibility] => public
                    [description] => Test
                    [target_amount] => 1000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 05:30:51
                    [updated_at] => 2024-11-25 21:30:51
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [6] => Array
                (
                    [id] => 7
                    [name] => Test
                    [slug] => 
                    [visibility] => public
                    [description] => Test
                    [target_amount] => 1000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:46:22
                    [updated_at] => 2024-11-26 15:46:22
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [7] => Array
                (
                    [id] => 8
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:48:30
                    [updated_at] => 2024-11-26 15:48:30
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [8] => Array
                (
                    [id] => 9
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:50:44
                    [updated_at] => 2024-11-26 15:50:44
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [9] => Array
                (
                    [id] => 10
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:55:10
                    [updated_at] => 2024-11-26 15:55:10
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [10] => Array
                (
                    [id] => 11
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:57:26
                    [updated_at] => 2024-11-26 15:57:26
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [11] => Array
                (
                    [id] => 12
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-26 23:58:49
                    [updated_at] => 2024-11-26 15:58:49
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [12] => Array
                (
                    [id] => 13
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:08:57
                    [updated_at] => 2024-11-26 16:08:57
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [13] => Array
                (
                    [id] => 14
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:12:16
                    [updated_at] => 2024-11-26 16:12:16
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [14] => Array
                (
                    [id] => 15
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:13:18
                    [updated_at] => 2024-11-26 16:13:18
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [15] => Array
                (
                    [id] => 16
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 20000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:15:23
                    [updated_at] => 2024-11-26 16:15:23
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [16] => Array
                (
                    [id] => 17
                    [name] => Test Project 1
                    [slug] => 
                    [visibility] => public
                    [description] => Test Description
                    [target_amount] => 23000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:17:17
                    [updated_at] => 2024-11-26 16:17:17
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [17] => Array
                (
                    [id] => 18
                    [name] => Test Project 2
                    [slug] => 
                    [visibility] => public
                    [description] => Test description to see how well this works
                    [target_amount] => 23000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 00:27:44
                    [updated_at] => 2024-11-26 16:27:44
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [18] => Array
                (
                    [id] => 19
                    [name] => Test Project 3
                    [slug] => 
                    [visibility] => public
                    [description] => This is a test description to ensure this is working appropriately
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 02:52:41
                    [updated_at] => 2024-11-26 18:52:41
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

            [19] => Array
                (
                    [id] => 20
                    [name] => Test Project 4
                    [slug] => 
                    [visibility] => public
                    [description] => This is a test description to ensure this makes it to the email
                    [target_amount] => 10000000.00
                    [current_amount] => 0.00
                    [status] => pending
                    [category] => other
                    [created_by] => 2
                    [created_at] => 2024-11-27 13:08:55
                    [updated_at] => 2024-11-27 05:08:55
                    [investment_goal] => 0.00
                    [funds_raised] => 0.00
                    [valuation] => 
                    [offering_type] => revshare
                    [investor_count] => 0
                    [minimum_investment] => 100.00
                    [maximum_investment] => 
                    [progress_percentage] => 0
                    [average_investment] => 0.00
                    [top_investor_id] => 
                    [revenue_generated] => 0.00
                    [project_stage] => planning
                    [completion_date] => 
                    [last_investment_date] => 
                    [remarks] => 
                    [promotional_links] => 
                )

        )

    [list] => Array
        (
            [0] => Array
                (
                    [project] => Array
                        (
                            [id] => 1
                            [name] => Green Energy Initiative (TEST)
                            [slug] => 
                            [visibility] => public
                            [description] => A project aimed at funding green energy solutions to reduce carbon emissions.
                            [target_amount] => 500000.00
                            [current_amount] => 150000.00
                            [status] => active
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-10 04:47:51
                            [updated_at] => 2024-11-23 05:54:39
                            [investment_goal] => 500000.00
                            [funds_raised] => 150000.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 15
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 30
                            [average_investment] => 10000.00
                            [top_investor_id] => 3
                            [revenue_generated] => 0.00
                            [project_stage] => fundraising
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => Exciting project to improve global sustainability
                            [promotional_links] => ["https://greenproject.com", "https://investinenergy.org"]
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [1] => Array
                (
                    [project] => Array
                        (
                            [id] => 2
                            [name] => Tech Startup Fund (TEST)
                            [slug] => 
                            [visibility] => public
                            [description] => Fund a technology startup with a unique approach to AI-driven financial tools.
                            [target_amount] => 1000000.00
                            [current_amount] => 250000.00
                            [status] => active
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-10 04:47:51
                            [updated_at] => 2024-11-23 05:54:39
                            [investment_goal] => 1000000.00
                            [funds_raised] => 250000.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 25
                            [minimum_investment] => 500.00
                            [maximum_investment] => 
                            [progress_percentage] => 25
                            [average_investment] => 10000.00
                            [top_investor_id] => 5
                            [revenue_generated] => 0.00
                            [project_stage] => fundraising
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => Targeting early adopters and angel investors
                            [promotional_links] => ["https://techfund.com", "https://investintechstartups.com"]
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [2] => Array
                (
                    [project] => Array
                        (
                            [id] => 3
                            [name] => Community Development Project (TEST)
                            [slug] => 
                            [visibility] => public
                            [description] => Revitalize and support community infrastructure and services.
                            [target_amount] => 300000.00
                            [current_amount] => 300000.00
                            [status] => active
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-10 04:47:51
                            [updated_at] => 2024-11-23 05:54:39
                            [investment_goal] => 300000.00
                            [funds_raised] => 300000.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 50
                            [minimum_investment] => 50.00
                            [maximum_investment] => 10000.00
                            [progress_percentage] => 100
                            [average_investment] => 6000.00
                            [top_investor_id] => 7
                            [revenue_generated] => 111223.21
                            [project_stage] => complete
                            [completion_date] => 2024-09-15
                            [last_investment_date] => 
                            [remarks] => Successfully funded and completed
                            [promotional_links] => ["https://communityproject.org"]
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [3] => Array
                (
                    [project] => Array
                        (
                            [id] => 4
                            [name] => Education for All (TEST)
                            [slug] => 
                            [visibility] => public
                            [description] => Provide access to quality education in underserved regions.
                            [target_amount] => 750000.00
                            [current_amount] => 500000.00
                            [status] => active
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-10 04:47:51
                            [updated_at] => 2024-11-23 05:54:39
                            [investment_goal] => 750000.00
                            [funds_raised] => 500000.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 40
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 66.7
                            [average_investment] => 12500.00
                            [top_investor_id] => 6
                            [revenue_generated] => 0.00
                            [project_stage] => development
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => Focus on digital education tools and scholarships
                            [promotional_links] => ["https://educationforall.com", "https://investineducation.org"]
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [4] => Array
                (
                    [project] => Array
                        (
                            [id] => 5
                            [name] => Test
                            [slug] => 
                            [visibility] => public
                            [description] => Test
                            [target_amount] => 1000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 04:53:30
                            [updated_at] => 2024-11-25 20:53:30
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [5] => Array
                (
                    [project] => Array
                        (
                            [id] => 6
                            [name] => Test
                            [slug] => 
                            [visibility] => public
                            [description] => Test
                            [target_amount] => 1000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 05:30:51
                            [updated_at] => 2024-11-25 21:30:51
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [6] => Array
                (
                    [project] => Array
                        (
                            [id] => 7
                            [name] => Test
                            [slug] => 
                            [visibility] => public
                            [description] => Test
                            [target_amount] => 1000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:46:22
                            [updated_at] => 2024-11-26 15:46:22
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [7] => Array
                (
                    [project] => Array
                        (
                            [id] => 8
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:48:30
                            [updated_at] => 2024-11-26 15:48:30
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [8] => Array
                (
                    [project] => Array
                        (
                            [id] => 9
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:50:44
                            [updated_at] => 2024-11-26 15:50:44
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [9] => Array
                (
                    [project] => Array
                        (
                            [id] => 10
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:55:10
                            [updated_at] => 2024-11-26 15:55:10
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [10] => Array
                (
                    [project] => Array
                        (
                            [id] => 11
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:57:26
                            [updated_at] => 2024-11-26 15:57:26
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [11] => Array
                (
                    [project] => Array
                        (
                            [id] => 12
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-26 23:58:49
                            [updated_at] => 2024-11-26 15:58:49
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [12] => Array
                (
                    [project] => Array
                        (
                            [id] => 13
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:08:57
                            [updated_at] => 2024-11-26 16:08:57
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [13] => Array
                (
                    [project] => Array
                        (
                            [id] => 14
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:12:16
                            [updated_at] => 2024-11-26 16:12:16
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [14] => Array
                (
                    [project] => Array
                        (
                            [id] => 15
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:13:18
                            [updated_at] => 2024-11-26 16:13:18
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [15] => Array
                (
                    [project] => Array
                        (
                            [id] => 16
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 20000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:15:23
                            [updated_at] => 2024-11-26 16:15:23
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [16] => Array
                (
                    [project] => Array
                        (
                            [id] => 17
                            [name] => Test Project 1
                            [slug] => 
                            [visibility] => public
                            [description] => Test Description
                            [target_amount] => 23000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:17:17
                            [updated_at] => 2024-11-26 16:17:17
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [17] => Array
                (
                    [project] => Array
                        (
                            [id] => 18
                            [name] => Test Project 2
                            [slug] => 
                            [visibility] => public
                            [description] => Test description to see how well this works
                            [target_amount] => 23000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 00:27:44
                            [updated_at] => 2024-11-26 16:27:44
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [18] => Array
                (
                    [project] => Array
                        (
                            [id] => 19
                            [name] => Test Project 3
                            [slug] => 
                            [visibility] => public
                            [description] => This is a test description to ensure this is working appropriately
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 02:52:41
                            [updated_at] => 2024-11-26 18:52:41
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

            [19] => Array
                (
                    [project] => Array
                        (
                            [id] => 20
                            [name] => Test Project 4
                            [slug] => 
                            [visibility] => public
                            [description] => This is a test description to ensure this makes it to the email
                            [target_amount] => 10000000.00
                            [current_amount] => 0.00
                            [status] => pending
                            [category] => other
                            [created_by] => 2
                            [created_at] => 2024-11-27 13:08:55
                            [updated_at] => 2024-11-27 05:08:55
                            [investment_goal] => 0.00
                            [funds_raised] => 0.00
                            [valuation] => 
                            [offering_type] => revshare
                            [investor_count] => 0
                            [minimum_investment] => 100.00
                            [maximum_investment] => 
                            [progress_percentage] => 0
                            [average_investment] => 0.00
                            [top_investor_id] => 
                            [revenue_generated] => 0.00
                            [project_stage] => planning
                            [completion_date] => 
                            [last_investment_date] => 
                            [remarks] => 
                            [promotional_links] => 
                        )

                    [committed] => 0
                    [target] => 0
                    [progress_ratio] => 0
                )

        )

    [commitments] => Array
        (
        )

    [totalCommitments] => 0
    [distributions] => Array
        (
        )

    [totalDistributions] => 0
    [userBalance] => 0
    [investments] => Array
        (
        )

)

INFO - 2026-02-27 00:15:35 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 00:15:35 --> [REQ_ID=01ec1eb7cbd9] [FILTER_AFTER]
DEBUG - 2026-02-27 00:15:35 --> [REQ_ID=01ec1eb7cbd9] [LIFECYCLE][END] status=200 duration_ms=504.54 memory_delta=2097152
INFO - 2026-02-27 00:15:35 --> [REQ_ID=91465b7069e0] [PERF] Execution time=0.495036
DEBUG - 2026-02-27 00:15:35 --> [REQ_ID=01ec1eb7cbd9] [REQUEST][END]
INFO - 2026-02-27 00:15:35 --> [REQ_ID=01ec1eb7cbd9] [PERF] Execution time=0.516561
INFO - 2026-02-27 00:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 00:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 00:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 00:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 00:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020619
INFO - 2026-02-27 00:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 00:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 00:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 00:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 00:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 00:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 00:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049452
INFO - 2026-02-27 00:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-02-27 00:56:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-02-27 00:56:24 --> [CSRF] token name=csrf_test_name hash=2c0f5554c19f4c61e84419df7f3584b1
DEBUG - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [REQUEST][END]
INFO - 2026-02-27 00:56:24 --> [REQ_ID=7a83e25decc4] [PERF] Execution time=0.057753
INFO - 2026-02-27 01:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 01:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 01:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 01:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 01:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.101753
INFO - 2026-02-27 01:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [REQUEST][END]
INFO - 2026-02-27 01:00:01 --> [REQ_ID=4e1357bd116f] [PERF] Execution time=0.066677
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [REQUEST][START] GET /
DEBUG - 2026-02-27 01:07:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [FILTER_BEFORE] /
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 01:07:46 --> [CSRF] token name=csrf_test_name hash=fa06f1b2559123bcc12584ef98891578
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 01:07:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:07:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 01:07:46 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 01:07:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [FILTER_AFTER]
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [LIFECYCLE][END] status=200 duration_ms=691.50 memory_delta=4194304
INFO - 2026-02-27 01:07:46 --> [REQ_ID=72053bad1da7] [PERF] Execution time=0.689439
DEBUG - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [REQUEST][END]
INFO - 2026-02-27 01:07:46 --> [REQ_ID=bdf58a529fbd] [PERF] Execution time=0.730066
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=28afa574212e] [REQUEST][START] GET /
DEBUG - 2026-02-27 01:13:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=28afa574212e] [FILTER_BEFORE] /
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=28afa574212e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=28afa574212e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 01:13:56 --> [CSRF] token name=csrf_test_name hash=5c085ee42cc8e3595af2fd32d277db87
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=12486ae224d4] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 01:13:56 --> [REQ_ID=12486ae224d4] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 01:13:56 --> [REQ_ID=12486ae224d4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 01:13:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:13:56 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 01:13:56 --> [REQ_ID=12486ae224d4] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 01:13:56 --> [REQ_ID=12486ae224d4] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 01:13:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 01:13:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 01:13:57 --> [REQ_ID=28afa574212e] [FILTER_AFTER]
DEBUG - 2026-02-27 01:13:57 --> [REQ_ID=28afa574212e] [LIFECYCLE][END] status=200 duration_ms=619.24 memory_delta=4194304
INFO - 2026-02-27 01:13:57 --> [REQ_ID=12486ae224d4] [PERF] Execution time=0.616810
DEBUG - 2026-02-27 01:13:57 --> [REQ_ID=28afa574212e] [REQUEST][END]
INFO - 2026-02-27 01:13:57 --> [REQ_ID=28afa574212e] [PERF] Execution time=0.657810
DEBUG - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 01:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 01:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 01:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [REQUEST][END]
INFO - 2026-02-27 01:15:02 --> [REQ_ID=a4a26c124145] [PERF] Execution time=0.050286
INFO - 2026-02-27 01:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 01:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.105236
INFO - 2026-02-27 01:15:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 01:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 01:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 01:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 01:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 01:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052018
INFO - 2026-02-27 01:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 01:35:48 --> [REQ_ID=5fa858eb475d] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:35:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:35:48 --> [REQ_ID=5fa858eb475d] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:35:48 --> [REQ_ID=5fa858eb475d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:35:48 --> [REQ_ID=5fa858eb475d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:35:48 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 01:35:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:35:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:35:49 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 01:35:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:35:49 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:35:49 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:35:49 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:35:49 --> [REQ_ID=1b2112b2ca93] [PERF] Execution time=0.799056
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=fb90e94c65b8] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:36:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=fb90e94c65b8] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=fb90e94c65b8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=fb90e94c65b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:36:02 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:36:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:36:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:02 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:02 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:02 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:02 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:36:02 --> [REQ_ID=43247824b55e] [PERF] Execution time=0.726668
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=a79144db9c6b] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:36:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=a79144db9c6b] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=a79144db9c6b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=a79144db9c6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:36:09 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=d4dcfb035bb8] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:36:09 --> [REQ_ID=d4dcfb035bb8] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:36:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:36:09 --> [REQ_ID=d4dcfb035bb8] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:36:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:09 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:36:09 --> [REQ_ID=d4dcfb035bb8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:09 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:09 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:09 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:09 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:09 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:10 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:36:10 --> [REQ_ID=d4dcfb035bb8] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:36:10 --> [REQ_ID=d4dcfb035bb8] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:10 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:10 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:36:10 --> [REQ_ID=d4dcfb035bb8] [PERF] Execution time=0.453104
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=edbaf0ea93ef] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:36:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=edbaf0ea93ef] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=edbaf0ea93ef] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=edbaf0ea93ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:36:14 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:36:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:36:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:14 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:14 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:14 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:14 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:36:14 --> [REQ_ID=65e354e8ee12] [PERF] Execution time=0.365748
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=a2a1008bd191] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:36:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=a2a1008bd191] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=a2a1008bd191] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=a2a1008bd191] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:36:25 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:36:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:36:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:25 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:25 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:36:25 --> [REQ_ID=c1828afc608a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:25 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:26 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:26 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:36:26 --> [REQ_ID=c1828afc608a] [PERF] Execution time=0.537647
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=59639d3a4859] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-27 01:36:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=59639d3a4859] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=59639d3a4859] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=59639d3a4859] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-27 01:36:33 --> [CSRF] token name=csrf_test_name hash=454b758ca1f3f3d135f7fffc6e0e1a34
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:36:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [METHOD_ENTRY] index
DEBUG - 2026-02-27 01:36:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:33 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:33 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 01:36:33 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 01:36:33 --> getSolanaData: invalid address param
INFO - 2026-02-27 01:36:33 --> [REQ_ID=1e775edc743d] [PERF] Execution time=0.492730
INFO - 2026-02-27 01:36:46 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 01:36:46 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 01:36:46 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:36:46 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 01:36:46 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 01:36:46 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.007831
INFO - 2026-02-27 01:36:46 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:38:38 --> [spark:alerts:audit] Started
INFO - 2026-02-27 01:38:38 --> [SPARK_START] App\Commands\Alerts\Audit
INFO - 2026-02-27 01:38:38 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:38:38 --> [spark:alerts:audit] Intent
INFO - 2026-02-27 01:38:38 --> alerts:audit started
INFO - 2026-02-27 01:38:38 --> alerts:audit completed
INFO - 2026-02-27 01:38:39 --> [spark:alerts:audit] Completed
INFO - 2026-02-27 01:38:39 --> [SPARK_COMPLETE] App\Commands\Alerts\Audit duration=0.711170
INFO - 2026-02-27 01:38:39 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 01:38:56 --> [SPARK_START] App\Commands\Alerts\Ingest
INFO - 2026-02-27 01:38:56 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:38:56 --> [spark:alerts:ingest] Intent
INFO - 2026-02-27 01:38:59 --> [SPARK_COMPLETE] App\Commands\Alerts\Ingest duration=2.675393
INFO - 2026-02-27 01:38:59 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 01:39:09 --> [SPARK_START] App\Commands\Alerts\Ingest
INFO - 2026-02-27 01:39:09 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:39:09 --> [spark:alerts:ingest] Intent
INFO - 2026-02-27 01:39:09 --> [SPARK_COMPLETE] App\Commands\Alerts\Ingest duration=0.001291
INFO - 2026-02-27 01:39:09 --> [SPARK_MEMORY] 16777216
CRITICAL - 2026-02-27 01:39:09 --> TypeError: str_starts_with(): Argument #1 ($haystack) must be of type string, null given
[Method: CLI, Route: alerts:ingest]
in APPPATH/Commands/Alerts/Ingest.php on line 216.
 1 APPPATH/Commands/Alerts/Ingest.php(216): str_starts_with(null, '--since=')
 2 APPPATH/Commands/Alerts/Ingest.php(32): App\Commands\Alerts\Ingest->resolveOption([...], 'since', '15m')
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Alerts\Ingest->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('alerts:ingest', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-27 01:39:09 --> [EXCEPTION] str_starts_with(): Argument #1 ($haystack) must be of type string, null given File=/home/mymiteam/mymiwallet/site/current/app/Commands/Alerts/Ingest.php Line=216
DEBUG - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-02-27 01:42:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-02-27 01:42:50 --> [CSRF] token name=csrf_test_name hash=9f39626be7ea19b0b0a0e1dfcd4391aa
DEBUG - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [REQUEST][END]
INFO - 2026-02-27 01:42:50 --> [REQ_ID=b49cd6262876] [PERF] Execution time=0.055224
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 01:42:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 01:42:52 --> [CSRF] token name=csrf_test_name hash=041618629be65e364e9d1071b37b6013
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=c386d823a40c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 01:42:52 --> [REQ_ID=c386d823a40c] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [FILTER_AFTER]
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [LIFECYCLE][END] status=200 duration_ms=183.89 memory_delta=0
INFO - 2026-02-27 01:42:52 --> [REQ_ID=c386d823a40c] [PERF] Execution time=0.183740
DEBUG - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [REQUEST][END]
INFO - 2026-02-27 01:42:52 --> [REQ_ID=621eaa0cf0bc] [PERF] Execution time=0.196385
INFO - 2026-02-27 01:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 01:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 01:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 01:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 01:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 01:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.104768
INFO - 2026-02-27 01:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=3e52c922a811] [REQUEST][START] GET /index.php/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits
DEBUG - 2026-02-27 01:56:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=3e52c922a811] [FILTER_BEFORE] /index.php/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=3e52c922a811] [ROUTE] Controller=\App\Modules\Blog\Controllers\IRSController Method=IRSExpandedHomeEnergyTaxCredits
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=3e52c922a811] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits
DEBUG - 2026-02-27 01:56:50 --> [CSRF] token name=csrf_test_name hash=1fc4a5c0733fc6375b43914dbdc09c85
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=9b434e8b4ba4] [INIT] App\Modules\Blog\Controllers\IRSController::GET
INFO - 2026-02-27 01:56:50 --> [REQ_ID=9b434e8b4ba4] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 01:56:50 --> [REQ_ID=9b434e8b4ba4] [METHOD_ENTRY] IRSExpandedHomeEnergyTaxCredits
DEBUG - 2026-02-27 01:56:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 01:56:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 01:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 01:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 01:56:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 01:56:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 01:56:50 --> [REQ_ID=9b434e8b4ba4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 01:56:51 --> [REQ_ID=9b434e8b4ba4] [VIEW_RENDER] App\Modules\Blog\Views\IRS\IRS_Expanded_Home_Energy_Tax_Credits
INFO - 2026-02-27 01:56:51 --> [REQ_ID=9b434e8b4ba4] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 01:56:51 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 01:56:51 --> [REQ_ID=3e52c922a811] [FILTER_AFTER]
DEBUG - 2026-02-27 01:56:51 --> [REQ_ID=3e52c922a811] [LIFECYCLE][END] status=200 duration_ms=1,267.83 memory_delta=8388608
INFO - 2026-02-27 01:56:51 --> [REQ_ID=9b434e8b4ba4] [PERF] Execution time=1.265277
DEBUG - 2026-02-27 01:56:51 --> [REQ_ID=3e52c922a811] [REQUEST][END]
INFO - 2026-02-27 01:56:51 --> [REQ_ID=3e52c922a811] [PERF] Execution time=1.308974
INFO - 2026-02-27 02:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 02:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 02:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-02-27 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 02:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.047592
INFO - 2026-02-27 02:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [REQUEST][END]
INFO - 2026-02-27 02:00:02 --> [REQ_ID=e4e1435bbcf3] [PERF] Execution time=0.079483
INFO - 2026-02-27 02:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 02:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 02:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 02:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009246
INFO - 2026-02-27 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:00:05 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 02:00:05 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 02:00:05 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:00:05 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 02:00:05 --> LOG_HEALTHCHECK debug marker=9e9a458c7502
INFO - 2026-02-27 02:00:05 --> LOG_HEALTHCHECK info marker=9e9a458c7502
NOTICE - 2026-02-27 02:00:05 --> LOG_HEALTHCHECK probe marker=9e9a458c7502
INFO - 2026-02-27 02:00:05 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 02:00:05 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024206
INFO - 2026-02-27 02:00:05 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 02:00:06 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=4.192167
INFO - 2026-02-27 02:00:06 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 02:05:04 --> [REQ_ID=d851f79dfac4] [REQUEST][START] GET /index.php?debugbar=
DEBUG - 2026-02-27 02:05:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:05:04 --> [REQ_ID=d851f79dfac4] [FILTER_BEFORE] /index.php?debugbar=
DEBUG - 2026-02-27 02:05:04 --> [REQ_ID=d851f79dfac4] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 02:05:04 --> [REQ_ID=d851f79dfac4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php?debugbar=
DEBUG - 2026-02-27 02:05:04 --> [CSRF] token name=csrf_test_name hash=a19581908dde3adc3c4faa80caa2a907
DEBUG - 2026-02-27 02:05:04 --> [REQ_ID=1be82d3323db] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 02:05:04 --> [REQ_ID=1be82d3323db] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 02:05:04 --> [REQ_ID=1be82d3323db] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 02:05:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:05:05 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 02:05:05 --> [REQ_ID=1be82d3323db] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 02:05:05 --> [REQ_ID=1be82d3323db] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 02:05:05 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:05:05 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 02:05:05 --> [REQ_ID=d851f79dfac4] [FILTER_AFTER]
DEBUG - 2026-02-27 02:05:05 --> [REQ_ID=d851f79dfac4] [LIFECYCLE][END] status=200 duration_ms=679.95 memory_delta=4194304
INFO - 2026-02-27 02:05:05 --> [REQ_ID=1be82d3323db] [PERF] Execution time=0.675655
DEBUG - 2026-02-27 02:05:05 --> [REQ_ID=d851f79dfac4] [REQUEST][END]
INFO - 2026-02-27 02:05:05 --> [REQ_ID=d851f79dfac4] [PERF] Execution time=0.731832
DEBUG - 2026-02-27 02:13:04 --> [REQ_ID=cbf2f12aa913] [REQUEST][START] GET /
DEBUG - 2026-02-27 02:13:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:13:04 --> [REQ_ID=cbf2f12aa913] [FILTER_BEFORE] /
DEBUG - 2026-02-27 02:13:04 --> [REQ_ID=cbf2f12aa913] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 02:13:04 --> [REQ_ID=cbf2f12aa913] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 02:13:04 --> [CSRF] token name=csrf_test_name hash=de211cbd543943eb30228b9c51d2fff0
DEBUG - 2026-02-27 02:13:04 --> [REQ_ID=b46a7193775b] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 02:13:04 --> [REQ_ID=b46a7193775b] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 02:13:04 --> [REQ_ID=b46a7193775b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 02:13:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:13:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 02:13:05 --> [REQ_ID=b46a7193775b] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 02:13:05 --> [REQ_ID=b46a7193775b] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 02:13:05 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:13:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 02:13:05 --> [REQ_ID=cbf2f12aa913] [FILTER_AFTER]
DEBUG - 2026-02-27 02:13:05 --> [REQ_ID=cbf2f12aa913] [LIFECYCLE][END] status=200 duration_ms=588.41 memory_delta=4194304
INFO - 2026-02-27 02:13:05 --> [REQ_ID=b46a7193775b] [PERF] Execution time=0.586418
DEBUG - 2026-02-27 02:13:05 --> [REQ_ID=cbf2f12aa913] [REQUEST][END]
INFO - 2026-02-27 02:13:05 --> [REQ_ID=cbf2f12aa913] [PERF] Execution time=0.626151
DEBUG - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-02-27 02:14:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-02-27 02:14:22 --> [CSRF] token name=csrf_test_name hash=8a09ad62554658b5d78207ce8bfab1ba
DEBUG - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [REQUEST][END]
INFO - 2026-02-27 02:14:22 --> [REQ_ID=cff6786d790f] [PERF] Execution time=0.048572
DEBUG - 2026-02-27 02:14:26 --> [REQ_ID=55741bdb26eb] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-02-27 02:14:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 02:14:26 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/Reports]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 02:14:26 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 02:14:26 --> [404] URI=https://www.mymiwallet.com/index.php/Investments/Reports
WARNING - 2026-02-27 02:14:26 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/Reports | referrer: none
DEBUG - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-02-27 02:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 02:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 02:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 02:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 02:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042085
INFO - 2026-02-27 02:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [REQUEST][END]
INFO - 2026-02-27 02:15:01 --> [REQ_ID=48cc37202bd6] [PERF] Execution time=0.080020
INFO - 2026-02-27 02:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 02:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 02:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 02:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.926080
INFO - 2026-02-27 02:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 02:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 02:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 02:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 02:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 02:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 02:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.058387
INFO - 2026-02-27 02:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 02:45:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 02:45:47 --> [CSRF] token name=csrf_test_name hash=a063a6a94bbdb52b1e7947d56e8ba779
DEBUG - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [REQUEST][END]
INFO - 2026-02-27 02:45:47 --> [REQ_ID=ad0aa19ce1c0] [PERF] Execution time=0.054562
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 02:45:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 02:45:48 --> [CSRF] token name=csrf_test_name hash=ba57667356e8f8ac1ccd1d78be87a2f6
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=a71a862e0702] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 02:45:48 --> [REQ_ID=a71a862e0702] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [FILTER_AFTER]
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [LIFECYCLE][END] status=200 duration_ms=61.21 memory_delta=0
INFO - 2026-02-27 02:45:48 --> [REQ_ID=a71a862e0702] [PERF] Execution time=0.060265
DEBUG - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [REQUEST][END]
INFO - 2026-02-27 02:45:48 --> [REQ_ID=dfa6c80b7473] [PERF] Execution time=0.074194
DEBUG - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-02-27 02:50:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-02-27 02:50:47 --> [CSRF] token name=csrf_test_name hash=b575e983cbd73af98bc90fcdb558ef7b
DEBUG - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [REQUEST][END]
INFO - 2026-02-27 02:50:47 --> [REQ_ID=da7d28aa3adf] [PERF] Execution time=0.054563
DEBUG - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-02-27 02:50:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-02-27 02:50:52 --> [CSRF] token name=csrf_test_name hash=a952df6e7a5869ce5d35d5c4e7d0aea2
DEBUG - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [REQUEST][END]
INFO - 2026-02-27 02:50:52 --> [REQ_ID=85632c81e043] [PERF] Execution time=0.014209
DEBUG - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-02-27 02:56:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-02-27 02:56:34 --> [CSRF] token name=csrf_test_name hash=39ca139ed5ee5e793355133f64d04a8c
DEBUG - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [REQUEST][END]
INFO - 2026-02-27 02:56:34 --> [REQ_ID=aa0ceec0b6dd] [PERF] Execution time=0.047962
DEBUG - 2026-02-27 02:56:38 --> [REQ_ID=56882582fcfb] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-02-27 02:56:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 02:56:38 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/Reports]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 02:56:38 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 02:56:38 --> [404] URI=https://www.mymiwallet.com/index.php/Investments/Reports
WARNING - 2026-02-27 02:56:38 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/Reports | referrer: none
DEBUG - 2026-02-27 02:57:50 --> [REQ_ID=608467d6fc8c] [REQUEST][START] GET /
DEBUG - 2026-02-27 02:57:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:57:50 --> [REQ_ID=608467d6fc8c] [FILTER_BEFORE] /
DEBUG - 2026-02-27 02:57:50 --> [REQ_ID=608467d6fc8c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 02:57:50 --> [REQ_ID=608467d6fc8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 02:57:50 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:57:50 --> [REQ_ID=ac49af4ef8cb] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 02:57:50 --> [REQ_ID=ac49af4ef8cb] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 02:57:50 --> [REQ_ID=ac49af4ef8cb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 02:57:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:57:51 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 02:57:51 --> [REQ_ID=ac49af4ef8cb] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 02:57:51 --> [REQ_ID=ac49af4ef8cb] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:57:51 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 02:57:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 02:57:51 --> [REQ_ID=608467d6fc8c] [FILTER_AFTER]
DEBUG - 2026-02-27 02:57:51 --> [REQ_ID=608467d6fc8c] [LIFECYCLE][END] status=200 duration_ms=611.98 memory_delta=4194304
INFO - 2026-02-27 02:57:51 --> [REQ_ID=ac49af4ef8cb] [PERF] Execution time=0.611565
DEBUG - 2026-02-27 02:57:51 --> [REQ_ID=608467d6fc8c] [REQUEST][END]
INFO - 2026-02-27 02:57:51 --> [REQ_ID=608467d6fc8c] [PERF] Execution time=0.625207
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=6d776c1ca55f] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 02:57:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=6d776c1ca55f] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=6d776c1ca55f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=6d776c1ca55f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 02:57:53 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=509adb122d7e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:57:53 --> [REQ_ID=509adb122d7e] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 02:57:53 --> [REQ_ID=509adb122d7e] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:57:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:57:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:57:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:57:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:57:53 --> [REQ_ID=509adb122d7e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 02:57:54 --> [REQ_ID=509adb122d7e] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-27 02:57:54 --> [REQ_ID=509adb122d7e] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:57:54 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 02:57:54 --> [REQ_ID=6d776c1ca55f] [FILTER_AFTER]
DEBUG - 2026-02-27 02:57:54 --> [REQ_ID=6d776c1ca55f] [LIFECYCLE][END] status=200 duration_ms=1,173.36 memory_delta=6291456
INFO - 2026-02-27 02:57:54 --> [REQ_ID=509adb122d7e] [PERF] Execution time=1.172693
DEBUG - 2026-02-27 02:57:54 --> [REQ_ID=6d776c1ca55f] [REQUEST][END]
INFO - 2026-02-27 02:57:54 --> [REQ_ID=6d776c1ca55f] [PERF] Execution time=1.185365
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=a0baab48177f] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 02:57:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=a0baab48177f] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=a0baab48177f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=a0baab48177f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 02:57:56 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:57:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:57:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:57:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:57:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:57:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:57:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 02:57:56 --> [REQ_ID=3ef70045e2e9] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:57:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:57:57 --> [REQ_ID=a0baab48177f] [FILTER_AFTER]
DEBUG - 2026-02-27 02:57:57 --> [REQ_ID=a0baab48177f] [LIFECYCLE][END] status=200 duration_ms=1,013.87 memory_delta=4194304
INFO - 2026-02-27 02:57:57 --> [REQ_ID=3ef70045e2e9] [PERF] Execution time=1.013343
DEBUG - 2026-02-27 02:57:57 --> [REQ_ID=a0baab48177f] [REQUEST][END]
INFO - 2026-02-27 02:57:57 --> [REQ_ID=a0baab48177f] [PERF] Execution time=1.023927
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=225b7502f2a2] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 02:58:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=225b7502f2a2] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=225b7502f2a2] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=225b7502f2a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 02:58:01 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [MEMORY][controller-start] 10485760
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:58:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:58:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:58:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:58:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:58:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:58:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [MEMORY][commonData:start] 10485760
DEBUG - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 02:58:01 --> [REQ_ID=652ebba457a3] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 02:58:02 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:58:02 --> [REQ_ID=225b7502f2a2] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:02 --> [REQ_ID=225b7502f2a2] [LIFECYCLE][END] status=200 duration_ms=1,017.02 memory_delta=2097152
INFO - 2026-02-27 02:58:02 --> [REQ_ID=652ebba457a3] [PERF] Execution time=1.016267
DEBUG - 2026-02-27 02:58:02 --> [REQ_ID=225b7502f2a2] [REQUEST][END]
INFO - 2026-02-27 02:58:02 --> [REQ_ID=225b7502f2a2] [PERF] Execution time=1.027324
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-27 02:58:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-27 02:58:03 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [REQUEST][END]
INFO - 2026-02-27 02:58:03 --> [REQ_ID=550de8ccb2ee] [PERF] Execution time=0.013566
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 02:58:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 02:58:03 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=7102e0d6ae46] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 02:58:03 --> [REQ_ID=7102e0d6ae46] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [LIFECYCLE][END] status=200 duration_ms=24.70 memory_delta=0
INFO - 2026-02-27 02:58:03 --> [REQ_ID=7102e0d6ae46] [PERF] Execution time=0.024112
DEBUG - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [REQUEST][END]
INFO - 2026-02-27 02:58:03 --> [REQ_ID=f746135da974] [PERF] Execution time=0.034586
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=b17751a46c10] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 02:58:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=b17751a46c10] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=b17751a46c10] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=b17751a46c10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 02:58:05 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:58:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:58:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:58:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:58:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:58:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:58:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 02:58:05 --> [REQ_ID=6aa88692e107] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:58:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=b17751a46c10] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=b17751a46c10] [LIFECYCLE][END] status=200 duration_ms=1,026.14 memory_delta=6291456
INFO - 2026-02-27 02:58:06 --> [REQ_ID=6aa88692e107] [PERF] Execution time=1.025508
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=b17751a46c10] [REQUEST][END]
INFO - 2026-02-27 02:58:06 --> [REQ_ID=b17751a46c10] [PERF] Execution time=1.036420
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=8dec102af225] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 02:58:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=8dec102af225] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=8dec102af225] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=8dec102af225] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 02:58:06 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=33d8ddc56d8c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:58:06 --> [REQ_ID=33d8ddc56d8c] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 02:58:06 --> [REQ_ID=33d8ddc56d8c] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:58:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:58:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:58:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:58:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:58:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:58:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:58:06 --> [REQ_ID=33d8ddc56d8c] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 02:58:07 --> [REQ_ID=33d8ddc56d8c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-02-27 02:58:07 --> [REQ_ID=33d8ddc56d8c] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:58:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:58:07 --> [REQ_ID=8dec102af225] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:07 --> [REQ_ID=8dec102af225] [LIFECYCLE][END] status=200 duration_ms=1,021.82 memory_delta=2097152
INFO - 2026-02-27 02:58:07 --> [REQ_ID=33d8ddc56d8c] [PERF] Execution time=1.021306
DEBUG - 2026-02-27 02:58:07 --> [REQ_ID=8dec102af225] [REQUEST][END]
INFO - 2026-02-27 02:58:07 --> [REQ_ID=8dec102af225] [PERF] Execution time=1.031983
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-27 02:58:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 02:58:08 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [REQUEST][END]
INFO - 2026-02-27 02:58:08 --> [REQ_ID=bf1b19790d9f] [PERF] Execution time=0.015587
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 02:58:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 02:58:08 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=7b7032661961] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 02:58:08 --> [REQ_ID=7b7032661961] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [LIFECYCLE][END] status=200 duration_ms=20.08 memory_delta=0
INFO - 2026-02-27 02:58:08 --> [REQ_ID=7b7032661961] [PERF] Execution time=0.019703
DEBUG - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [REQUEST][END]
INFO - 2026-02-27 02:58:08 --> [REQ_ID=9eada5a1dcf3] [PERF] Execution time=0.028841
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=d8c3bc5e8e63] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 02:58:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=d8c3bc5e8e63] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=d8c3bc5e8e63] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=d8c3bc5e8e63] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 02:58:09 --> [CSRF] token name=csrf_test_name hash=02aedd82ccaeca950eeb0059cc7b4f10
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=80f3e7490751] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 02:58:09 --> [REQ_ID=80f3e7490751] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 02:58:09 --> [REQ_ID=80f3e7490751] [METHOD_ENTRY] show
DEBUG - 2026-02-27 02:58:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 02:58:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 02:58:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 02:58:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 02:58:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 02:58:09 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 02:58:09 --> [REQ_ID=80f3e7490751] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 02:58:10 --> [REQ_ID=80f3e7490751] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-02-27 02:58:10 --> [REQ_ID=80f3e7490751] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 02:58:10 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 02:58:10 --> [REQ_ID=d8c3bc5e8e63] [FILTER_AFTER]
DEBUG - 2026-02-27 02:58:10 --> [REQ_ID=d8c3bc5e8e63] [LIFECYCLE][END] status=200 duration_ms=1,066.98 memory_delta=8388608
INFO - 2026-02-27 02:58:10 --> [REQ_ID=80f3e7490751] [PERF] Execution time=1.066454
DEBUG - 2026-02-27 02:58:10 --> [REQ_ID=d8c3bc5e8e63] [REQUEST][END]
INFO - 2026-02-27 02:58:10 --> [REQ_ID=d8c3bc5e8e63] [PERF] Execution time=1.075928
DEBUG - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 03:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 03:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 03:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.026565
INFO - 2026-02-27 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [REQUEST][END]
INFO - 2026-02-27 03:00:01 --> [REQ_ID=65d5bf21f753] [PERF] Execution time=0.064554
INFO - 2026-02-27 03:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 03:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 03:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.046149
INFO - 2026-02-27 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [REQUEST][END]
INFO - 2026-02-27 03:15:01 --> [REQ_ID=8cb85c55027a] [PERF] Execution time=0.051040
DEBUG - 2026-02-27 03:15:30 --> [REQ_ID=b31fc41bdaba] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-02-27 03:15:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 03:15:30 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium_Features/Brokerage-Integrations]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 03:15:30 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 03:15:30 --> [404] URI=https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations
WARNING - 2026-02-27 03:15:30 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations | referrer: none
INFO - 2026-02-27 03:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 03:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 03:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 03:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 03:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 03:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.024767
INFO - 2026-02-27 03:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-27 03:33:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-27 03:33:35 --> [CSRF] token name=csrf_test_name hash=081af2dad234a0d8476f7fd3a7628899
DEBUG - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [REQUEST][END]
INFO - 2026-02-27 03:33:35 --> [REQ_ID=4c5e7b2693a5] [PERF] Execution time=0.061649
INFO - 2026-02-27 03:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 03:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 03:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 03:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 03:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 03:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.220473
INFO - 2026-02-27 03:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 04:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 04:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-27 04:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 04:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 04:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 04:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 04:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.024585
INFO - 2026-02-27 04:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 04:00:01 --> [REQ_ID=5ffc66e3fd25] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 04:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:00:02 --> [REQ_ID=5ffc66e3fd25] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 04:00:02 --> [REQ_ID=5ffc66e3fd25] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 04:00:02 --> [REQ_ID=5ffc66e3fd25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 04:00:02 --> [REQ_ID=5ffc66e3fd25] [REQUEST][END]
INFO - 2026-02-27 04:00:02 --> [REQ_ID=5ffc66e3fd25] [PERF] Execution time=0.098786
INFO - 2026-02-27 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.011602
INFO - 2026-02-27 04:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 04:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 04:00:03 --> LOG_HEALTHCHECK debug marker=f835a984d124
INFO - 2026-02-27 04:00:03 --> LOG_HEALTHCHECK info marker=f835a984d124
NOTICE - 2026-02-27 04:00:03 --> LOG_HEALTHCHECK probe marker=f835a984d124
INFO - 2026-02-27 04:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 04:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.106496
INFO - 2026-02-27 04:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 04:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.354078
INFO - 2026-02-27 04:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-02-27 04:00:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-02-27 04:00:27 --> [CSRF] token name=csrf_test_name hash=62814bd830b3334aa35c30e9acf6338e
DEBUG - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [REQUEST][END]
INFO - 2026-02-27 04:00:27 --> [REQ_ID=480b1f8722ae] [PERF] Execution time=0.021395
DEBUG - 2026-02-27 04:05:22 --> [REQ_ID=4700875c2677] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-02-27 04:05:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 04:05:22 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Institute]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 04:05:22 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 04:05:22 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Institute
WARNING - 2026-02-27 04:05:22 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Institute | referrer: none
DEBUG - 2026-02-27 04:14:46 --> [REQ_ID=dfbecd1ccc08] [REQUEST][START] GET /
DEBUG - 2026-02-27 04:14:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:14:46 --> [REQ_ID=dfbecd1ccc08] [FILTER_BEFORE] /
DEBUG - 2026-02-27 04:14:46 --> [REQ_ID=dfbecd1ccc08] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 04:14:46 --> [REQ_ID=dfbecd1ccc08] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 04:14:46 --> [CSRF] token name=csrf_test_name hash=61c5dd561eb0e31d46ecf86e97e24c64
DEBUG - 2026-02-27 04:14:46 --> [REQ_ID=02d62be0d727] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 04:14:46 --> [REQ_ID=02d62be0d727] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 04:14:47 --> [REQ_ID=02d62be0d727] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 04:14:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 04:14:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 04:14:47 --> [REQ_ID=02d62be0d727] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 04:14:47 --> [REQ_ID=02d62be0d727] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 04:14:47 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 04:14:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 04:14:47 --> [REQ_ID=dfbecd1ccc08] [FILTER_AFTER]
DEBUG - 2026-02-27 04:14:47 --> [REQ_ID=dfbecd1ccc08] [LIFECYCLE][END] status=200 duration_ms=745.62 memory_delta=4194304
INFO - 2026-02-27 04:14:47 --> [REQ_ID=02d62be0d727] [PERF] Execution time=0.743794
DEBUG - 2026-02-27 04:14:47 --> [REQ_ID=dfbecd1ccc08] [REQUEST][END]
INFO - 2026-02-27 04:14:47 --> [REQ_ID=dfbecd1ccc08] [PERF] Execution time=0.783908
DEBUG - 2026-02-27 04:15:01 --> [REQ_ID=74af859fcab2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 04:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 04:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 04:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 04:15:02 --> [REQ_ID=74af859fcab2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 04:15:02 --> [REQ_ID=74af859fcab2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 04:15:02 --> [REQ_ID=74af859fcab2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 04:15:02 --> [REQ_ID=74af859fcab2] [REQUEST][END]
INFO - 2026-02-27 04:15:02 --> [REQ_ID=74af859fcab2] [PERF] Execution time=0.047664
INFO - 2026-02-27 04:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 04:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.113746
INFO - 2026-02-27 04:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-27 04:22:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-27 04:22:22 --> [CSRF] token name=csrf_test_name hash=2d3b2c97e7d1ce7cb8e4daecbd6ddf2e
DEBUG - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [REQUEST][END]
INFO - 2026-02-27 04:22:22 --> [REQ_ID=a29ad5b6271e] [PERF] Execution time=0.057181
DEBUG - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-02-27 04:22:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-02-27 04:22:26 --> [CSRF] token name=csrf_test_name hash=09ccb55a2fe9b497e84466ddf779ee9f
DEBUG - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [REQUEST][END]
INFO - 2026-02-27 04:22:26 --> [REQ_ID=25583c385f3c] [PERF] Execution time=0.018992
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [REQUEST][START] GET /
DEBUG - 2026-02-27 04:26:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [FILTER_BEFORE] /
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 04:26:38 --> [CSRF] token name=csrf_test_name hash=fb13cb987fd906481f7a20a8e5d5ef57
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 04:26:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 04:26:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 04:26:38 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 04:26:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [FILTER_AFTER]
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [LIFECYCLE][END] status=200 duration_ms=649.87 memory_delta=4194304
INFO - 2026-02-27 04:26:38 --> [REQ_ID=40e70d0d8f18] [PERF] Execution time=0.647856
DEBUG - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [REQUEST][END]
INFO - 2026-02-27 04:26:38 --> [REQ_ID=c46edbc05560] [PERF] Execution time=0.687649
INFO - 2026-02-27 04:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 04:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 04:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 04:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 04:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038170
INFO - 2026-02-27 04:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 04:33:34 --> [REQ_ID=3d3c261211a9] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-27 04:33:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:33:34 --> [REQ_ID=3d3c261211a9] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-27 04:33:34 --> [REQ_ID=3d3c261211a9] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-27 04:33:34 --> [REQ_ID=3d3c261211a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-27 04:33:34 --> [CSRF] token name=csrf_test_name hash=a630391f5ddee9e7da28f38993b3d47a
DEBUG - 2026-02-27 04:33:34 --> [REQ_ID=c5b038704a90] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-27 04:33:34 --> [REQ_ID=c5b038704a90] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 04:33:35 --> [REQ_ID=c5b038704a90] [METHOD_ENTRY] index
DEBUG - 2026-02-27 04:33:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 04:33:35 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 04:33:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 04:33:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 04:33:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 04:33:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 04:33:35 --> [REQ_ID=c5b038704a90] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 04:33:35 --> [REQ_ID=c5b038704a90] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-27 04:33:35 --> [REQ_ID=c5b038704a90] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 04:33:35 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 04:33:35 --> [REQ_ID=3d3c261211a9] [FILTER_AFTER]
DEBUG - 2026-02-27 04:33:35 --> [REQ_ID=3d3c261211a9] [LIFECYCLE][END] status=200 duration_ms=123.04 memory_delta=0
INFO - 2026-02-27 04:33:35 --> [REQ_ID=c5b038704a90] [PERF] Execution time=0.120455
DEBUG - 2026-02-27 04:33:35 --> [REQ_ID=3d3c261211a9] [REQUEST][END]
INFO - 2026-02-27 04:33:35 --> [REQ_ID=3d3c261211a9] [PERF] Execution time=0.164029
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [REQUEST][START] GET /
DEBUG - 2026-02-27 04:37:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [FILTER_BEFORE] /
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 04:37:57 --> [CSRF] token name=csrf_test_name hash=b1bc69de189768cbcc3173778908b15e
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 04:37:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 04:37:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 04:37:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 04:37:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [FILTER_AFTER]
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [LIFECYCLE][END] status=200 duration_ms=616.75 memory_delta=4194304
INFO - 2026-02-27 04:37:57 --> [REQ_ID=12b0626a5bf7] [PERF] Execution time=0.614513
DEBUG - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [REQUEST][END]
INFO - 2026-02-27 04:37:57 --> [REQ_ID=666f54193de6] [PERF] Execution time=0.654754
DEBUG - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-27 04:42:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-27 04:42:01 --> [CSRF] token name=csrf_test_name hash=93fba8dc03716565bafd9c40d8f8967f
DEBUG - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [REQUEST][END]
INFO - 2026-02-27 04:42:01 --> [REQ_ID=ca1313ee3270] [PERF] Execution time=0.057168
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 04:42:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 04:42:02 --> [CSRF] token name=csrf_test_name hash=56a6e9ed3c92ab424bb532cb481c0bcd
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=2c58e283ed0f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 04:42:02 --> [REQ_ID=2c58e283ed0f] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [FILTER_AFTER]
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [LIFECYCLE][END] status=200 duration_ms=160.81 memory_delta=0
INFO - 2026-02-27 04:42:02 --> [REQ_ID=2c58e283ed0f] [PERF] Execution time=0.160588
DEBUG - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [REQUEST][END]
INFO - 2026-02-27 04:42:02 --> [REQ_ID=bc19952de74e] [PERF] Execution time=0.172321
INFO - 2026-02-27 04:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 04:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 04:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 04:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 04:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 04:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.095462
INFO - 2026-02-27 04:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-02-27 04:59:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [FILTER_BEFORE] /index.php/Management/Security
DEBUG - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [ROUTE] Controller=\App\Modules\Management\Controllers\SecurityController Method=index
DEBUG - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Security
DEBUG - 2026-02-27 04:59:55 --> [CSRF] token name=csrf_test_name hash=dbb6fa673123a3ed266ae5809ed8fdc7
DEBUG - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [REQUEST][END]
INFO - 2026-02-27 04:59:55 --> [REQ_ID=7e86ccc00b87] [PERF] Execution time=0.048155
DEBUG - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [REQUEST][END]
INFO - 2026-02-27 05:00:01 --> [REQ_ID=c90d8c821504] [PERF] Execution time=0.036897
INFO - 2026-02-27 05:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 05:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 05:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 05:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 05:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 05:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.118180
INFO - 2026-02-27 05:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [REQUEST][START] GET /
DEBUG - 2026-02-27 05:10:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [FILTER_BEFORE] /
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 05:10:08 --> [CSRF] token name=csrf_test_name hash=91054f0ed5b3dd1fa028a52898dc51d0
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 05:10:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 05:10:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 05:10:08 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 05:10:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [FILTER_AFTER]
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [LIFECYCLE][END] status=200 duration_ms=736.11 memory_delta=4194304
INFO - 2026-02-27 05:10:08 --> [REQ_ID=c4b9808bea5c] [PERF] Execution time=0.734001
DEBUG - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [REQUEST][END]
INFO - 2026-02-27 05:10:08 --> [REQ_ID=e0c48effc178] [PERF] Execution time=0.775585
INFO - 2026-02-27 05:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 05:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 05:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 05:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 05:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 05:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042623
INFO - 2026-02-27 05:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [REQUEST][END]
INFO - 2026-02-27 05:15:02 --> [REQ_ID=5d08bb084913] [PERF] Execution time=0.072332
DEBUG - 2026-02-27 05:15:37 --> [REQ_ID=8ad1e9907606] [REQUEST][START] GET /
DEBUG - 2026-02-27 05:15:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:15:37 --> [REQ_ID=8ad1e9907606] [FILTER_BEFORE] /
DEBUG - 2026-02-27 05:15:37 --> [REQ_ID=8ad1e9907606] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 05:15:37 --> [REQ_ID=8ad1e9907606] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 05:15:37 --> [CSRF] token name=csrf_test_name hash=484f11133bb3aaebbaf27556c9a28968
DEBUG - 2026-02-27 05:15:37 --> [REQ_ID=1c9691c917a7] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 05:15:37 --> [REQ_ID=1c9691c917a7] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 05:15:38 --> [REQ_ID=1c9691c917a7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 05:15:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 05:15:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 05:15:38 --> [REQ_ID=1c9691c917a7] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 05:15:38 --> [REQ_ID=1c9691c917a7] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 05:15:38 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 05:15:38 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 05:15:38 --> [REQ_ID=8ad1e9907606] [FILTER_AFTER]
DEBUG - 2026-02-27 05:15:38 --> [REQ_ID=8ad1e9907606] [LIFECYCLE][END] status=200 duration_ms=610.38 memory_delta=4194304
INFO - 2026-02-27 05:15:38 --> [REQ_ID=1c9691c917a7] [PERF] Execution time=0.609247
DEBUG - 2026-02-27 05:15:38 --> [REQ_ID=8ad1e9907606] [REQUEST][END]
INFO - 2026-02-27 05:15:38 --> [REQ_ID=8ad1e9907606] [PERF] Execution time=0.624416
DEBUG - 2026-02-27 05:20:36 --> [REQ_ID=2f64d94321ad] [REQUEST][START] GET /
DEBUG - 2026-02-27 05:20:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:20:36 --> [REQ_ID=2f64d94321ad] [FILTER_BEFORE] /
DEBUG - 2026-02-27 05:20:36 --> [REQ_ID=2f64d94321ad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 05:20:36 --> [REQ_ID=2f64d94321ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 05:20:36 --> [CSRF] token name=csrf_test_name hash=dc9a586eab58f4a792276c653574f291
DEBUG - 2026-02-27 05:20:36 --> [REQ_ID=687e1d8e802b] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 05:20:36 --> [REQ_ID=687e1d8e802b] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 05:20:36 --> [REQ_ID=687e1d8e802b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 05:20:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 05:20:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 05:20:37 --> [REQ_ID=687e1d8e802b] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 05:20:37 --> [REQ_ID=687e1d8e802b] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 05:20:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 05:20:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 05:20:37 --> [REQ_ID=2f64d94321ad] [FILTER_AFTER]
DEBUG - 2026-02-27 05:20:37 --> [REQ_ID=2f64d94321ad] [LIFECYCLE][END] status=200 duration_ms=624.39 memory_delta=4194304
INFO - 2026-02-27 05:20:37 --> [REQ_ID=687e1d8e802b] [PERF] Execution time=0.621836
DEBUG - 2026-02-27 05:20:37 --> [REQ_ID=2f64d94321ad] [REQUEST][END]
INFO - 2026-02-27 05:20:37 --> [REQ_ID=2f64d94321ad] [PERF] Execution time=0.663072
DEBUG - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-02-27 05:27:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
DEBUG - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-02-27 05:27:46 --> [CSRF] token name=csrf_test_name hash=74927923f9b9e4475f02b3b47e4b209e
DEBUG - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [REQUEST][END]
INFO - 2026-02-27 05:27:46 --> [REQ_ID=b4e7502a543a] [PERF] Execution time=0.055908
DEBUG - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 05:27:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 05:27:50 --> [CSRF] token name=csrf_test_name hash=f760b3049ea39544dc2adf8018992c36
DEBUG - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [REQUEST][END]
INFO - 2026-02-27 05:27:50 --> [REQ_ID=8cd9695737e4] [PERF] Execution time=0.017728
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=d21a8c7c9448] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 05:28:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=d21a8c7c9448] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=d21a8c7c9448] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=d21a8c7c9448] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 05:28:20 --> [CSRF] token name=csrf_test_name hash=0ad927dee754fb00f0ddebba11de1b4c
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=63850ea20422] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 05:28:20 --> [REQ_ID=63850ea20422] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 05:28:20 --> [REQ_ID=63850ea20422] [METHOD_ENTRY] show
DEBUG - 2026-02-27 05:28:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 05:28:20 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 05:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 05:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 05:28:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 05:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 05:28:20 --> [REQ_ID=63850ea20422] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 05:28:21 --> [REQ_ID=63850ea20422] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 05:28:21 --> [REQ_ID=63850ea20422] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 05:28:21 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 05:28:21 --> [REQ_ID=d21a8c7c9448] [FILTER_AFTER]
DEBUG - 2026-02-27 05:28:21 --> [REQ_ID=d21a8c7c9448] [LIFECYCLE][END] status=200 duration_ms=1,080.16 memory_delta=8388608
INFO - 2026-02-27 05:28:21 --> [REQ_ID=63850ea20422] [PERF] Execution time=1.079980
DEBUG - 2026-02-27 05:28:21 --> [REQ_ID=d21a8c7c9448] [REQUEST][END]
INFO - 2026-02-27 05:28:21 --> [REQ_ID=d21a8c7c9448] [PERF] Execution time=1.091460
INFO - 2026-02-27 05:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 05:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 05:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 05:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 05:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033038
INFO - 2026-02-27 05:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 05:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 05:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 05:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 05:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 05:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 05:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.021944
INFO - 2026-02-27 05:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 05:53:08 --> [REQ_ID=151cea5bd9ad] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-02-27 05:53:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 05:53:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 05:53:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 05:53:08 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
WARNING - 2026-02-27 05:53:08 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: none
DEBUG - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-02-27 05:54:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-02-27 05:54:39 --> [CSRF] token name=csrf_test_name hash=6b7783b08df315cc89019d6924f53bc3
DEBUG - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [REQUEST][END]
INFO - 2026-02-27 05:54:39 --> [REQ_ID=a8e2b4a92988] [PERF] Execution time=0.047856
INFO - 2026-02-27 06:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-27 06:00:01 --> [REQ_ID=448f78d2a8e5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:00:02 --> [REQ_ID=448f78d2a8e5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 06:00:02 --> [REQ_ID=448f78d2a8e5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 06:00:02 --> [REQ_ID=448f78d2a8e5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 06:00:02 --> [REQ_ID=448f78d2a8e5] [REQUEST][END]
INFO - 2026-02-27 06:00:02 --> [REQ_ID=448f78d2a8e5] [PERF] Execution time=0.118004
INFO - 2026-02-27 06:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 06:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 06:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 06:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038102
INFO - 2026-02-27 06:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 06:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 06:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.015556
INFO - 2026-02-27 06:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 06:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 06:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 06:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 06:00:04 --> LOG_HEALTHCHECK debug marker=0aef7b3c9924
INFO - 2026-02-27 06:00:04 --> LOG_HEALTHCHECK info marker=0aef7b3c9924
NOTICE - 2026-02-27 06:00:04 --> LOG_HEALTHCHECK probe marker=0aef7b3c9924
INFO - 2026-02-27 06:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 06:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025534
INFO - 2026-02-27 06:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 06:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.550297
INFO - 2026-02-27 06:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-02-27 06:10:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-02-27 06:10:33 --> [CSRF] token name=csrf_test_name hash=a8c20336e1cbe5322ec95e014e5d16a0
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [FILTER_AFTER]
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [LIFECYCLE][END] status=200 duration_ms=18.71 memory_delta=0
DEBUG - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [REQUEST][END]
INFO - 2026-02-27 06:10:33 --> [REQ_ID=3a7b80302c49] [PERF] Execution time=0.057862
DEBUG - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [REQUEST][END]
INFO - 2026-02-27 06:15:02 --> [REQ_ID=36490d3f119c] [PERF] Execution time=0.068095
INFO - 2026-02-27 06:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 06:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 06:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 06:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 06:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.021769
INFO - 2026-02-27 06:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-02-27 06:22:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-02-27 06:22:30 --> [CSRF] token name=csrf_test_name hash=c5552d118bd006f374a2e822c73565fe
DEBUG - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [REQUEST][END]
INFO - 2026-02-27 06:22:30 --> [REQ_ID=2bbc7b4fd614] [PERF] Execution time=0.053471
DEBUG - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-02-27 06:28:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-02-27 06:28:12 --> [CSRF] token name=csrf_test_name hash=c73d556920901461d76a0b88a0216f4e
DEBUG - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [REQUEST][END]
INFO - 2026-02-27 06:28:12 --> [REQ_ID=b41e0953c919] [PERF] Execution time=0.071225
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 06:28:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 06:28:14 --> [CSRF] token name=csrf_test_name hash=2b48b803b07267381c1975316fdbbaf8
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=489440ecfe21] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 06:28:14 --> [REQ_ID=489440ecfe21] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [FILTER_AFTER]
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [LIFECYCLE][END] status=200 duration_ms=154.48 memory_delta=0
INFO - 2026-02-27 06:28:14 --> [REQ_ID=489440ecfe21] [PERF] Execution time=0.154010
DEBUG - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [REQUEST][END]
INFO - 2026-02-27 06:28:14 --> [REQ_ID=f8205ffc8db2] [PERF] Execution time=0.166566
INFO - 2026-02-27 06:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.021580
INFO - 2026-02-27 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 06:39:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 06:39:31 --> [CSRF] token name=csrf_test_name hash=f6cfd4d0c7997222d6400cbdbabc29cf
DEBUG - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [REQUEST][END]
INFO - 2026-02-27 06:39:31 --> [REQ_ID=efa8c7d0a3b9] [PERF] Execution time=0.057003
INFO - 2026-02-27 06:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 06:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 06:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.138352
INFO - 2026-02-27 06:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 07:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 07:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 07:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 07:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 07:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 07:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055534
INFO - 2026-02-27 07:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [REQUEST][END]
INFO - 2026-02-27 07:00:01 --> [REQ_ID=40adc9156692] [PERF] Execution time=0.059888
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [REQUEST][START] GET /
DEBUG - 2026-02-27 07:00:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [FILTER_BEFORE] /
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 07:00:30 --> [CSRF] token name=csrf_test_name hash=d1ebf41e16526cec6521714f253aebdf
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 07:00:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 07:00:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 07:00:30 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 07:00:30 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [FILTER_AFTER]
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [LIFECYCLE][END] status=200 duration_ms=679.45 memory_delta=4194304
INFO - 2026-02-27 07:00:30 --> [REQ_ID=3ae5f142f7ed] [PERF] Execution time=0.678069
DEBUG - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [REQUEST][END]
INFO - 2026-02-27 07:00:30 --> [REQ_ID=9e7ece05cf78] [PERF] Execution time=0.693430
INFO - 2026-02-27 07:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 07:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 07:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 07:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 07:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 07:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045195
INFO - 2026-02-27 07:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 07:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [REQUEST][END]
INFO - 2026-02-27 07:15:01 --> [REQ_ID=6b68dbccc238] [PERF] Execution time=0.044379
DEBUG - 2026-02-27 07:16:50 --> [REQ_ID=1c405fa4c173] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 07:16:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:16:50 --> [REQ_ID=1c405fa4c173] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 07:16:50 --> [REQ_ID=1c405fa4c173] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 07:16:50 --> [REQ_ID=1c405fa4c173] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 07:16:50 --> [CSRF] token name=csrf_test_name hash=9d6103c9ad96dc2300708eaeb2c3aa63
DEBUG - 2026-02-27 07:16:50 --> [REQ_ID=44c3f1469c5e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 07:16:50 --> [REQ_ID=44c3f1469c5e] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 07:16:50 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 07:16:50 --> [REQ_ID=44c3f1469c5e] [PERF] Execution time=0.164756
DEBUG - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [REQUEST][START] GET /index.php/Profile
DEBUG - 2026-02-27 07:25:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [FILTER_BEFORE] /index.php/Profile
DEBUG - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile
DEBUG - 2026-02-27 07:25:19 --> [CSRF] token name=csrf_test_name hash=79de09d3ec7ff18e72b4b580de9d761e
DEBUG - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [REQUEST][END]
INFO - 2026-02-27 07:25:19 --> [REQ_ID=73a644c5ddae] [PERF] Execution time=0.046748
DEBUG - 2026-02-27 07:25:59 --> [REQ_ID=7882dcd8171a] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-02-27 07:25:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 07:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 07:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 07:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 07:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 07:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 07:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041350
INFO - 2026-02-27 07:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 07:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 07:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 07:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 07:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 07:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 07:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.044578
INFO - 2026-02-27 07:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 07:53:04 --> [REQ_ID=3144add75d0b] [REQUEST][START] GET /index.php/Free/register/MyMI-Budgeting-Tool
DEBUG - 2026-02-27 07:53:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:53:05 --> [REQ_ID=3144add75d0b] [FILTER_BEFORE] /index.php/Free/register/MyMI-Budgeting-Tool
DEBUG - 2026-02-27 07:53:05 --> [REQ_ID=3144add75d0b] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 07:53:05 --> [REQ_ID=3144add75d0b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register/MyMI-Budgeting-Tool
DEBUG - 2026-02-27 07:53:05 --> [CSRF] token name=csrf_test_name hash=10a7a519c8f4a8e82839b5a05f8da829
DEBUG - 2026-02-27 07:53:05 --> [REQ_ID=3144add75d0b] [REQUEST][END]
INFO - 2026-02-27 07:53:05 --> [REQ_ID=3144add75d0b] [PERF] Execution time=0.052024
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 07:53:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 07:53:07 --> [CSRF] token name=csrf_test_name hash=e8b462ad0b1e6735313519c321240932
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=880cc0686b7d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 07:53:07 --> [REQ_ID=880cc0686b7d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [FILTER_AFTER]
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [LIFECYCLE][END] status=200 duration_ms=158.01 memory_delta=0
INFO - 2026-02-27 07:53:07 --> [REQ_ID=880cc0686b7d] [PERF] Execution time=0.155947
DEBUG - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [REQUEST][END]
INFO - 2026-02-27 07:53:07 --> [REQ_ID=ea1ef7f24396] [PERF] Execution time=0.168489
DEBUG - 2026-02-27 07:59:39 --> [REQ_ID=2d9656fc9aee] [REQUEST][START] GET /
DEBUG - 2026-02-27 07:59:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 07:59:39 --> [REQ_ID=2d9656fc9aee] [FILTER_BEFORE] /
DEBUG - 2026-02-27 07:59:39 --> [REQ_ID=2d9656fc9aee] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 07:59:39 --> [REQ_ID=2d9656fc9aee] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 07:59:39 --> [CSRF] token name=csrf_test_name hash=1ecb5baec2cde9adcede96f473c31099
DEBUG - 2026-02-27 07:59:39 --> [REQ_ID=4941628bc331] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 07:59:39 --> [REQ_ID=4941628bc331] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 07:59:39 --> [REQ_ID=4941628bc331] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 07:59:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 07:59:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 07:59:40 --> [REQ_ID=4941628bc331] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 07:59:40 --> [REQ_ID=4941628bc331] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 07:59:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 07:59:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 07:59:40 --> [REQ_ID=2d9656fc9aee] [FILTER_AFTER]
DEBUG - 2026-02-27 07:59:40 --> [REQ_ID=2d9656fc9aee] [LIFECYCLE][END] status=200 duration_ms=689.50 memory_delta=4194304
INFO - 2026-02-27 07:59:40 --> [REQ_ID=4941628bc331] [PERF] Execution time=0.687510
DEBUG - 2026-02-27 07:59:40 --> [REQ_ID=2d9656fc9aee] [REQUEST][END]
INFO - 2026-02-27 07:59:40 --> [REQ_ID=2d9656fc9aee] [PERF] Execution time=0.727170
DEBUG - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [REQUEST][END]
INFO - 2026-02-27 08:00:01 --> [REQ_ID=36339866bc21] [PERF] Execution time=0.015263
INFO - 2026-02-27 08:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-27 08:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 08:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 08:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 08:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035404
INFO - 2026-02-27 08:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 08:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 08:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.015122
INFO - 2026-02-27 08:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 08:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 08:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 08:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 08:00:04 --> LOG_HEALTHCHECK debug marker=1698d285c06d
INFO - 2026-02-27 08:00:04 --> LOG_HEALTHCHECK info marker=1698d285c06d
NOTICE - 2026-02-27 08:00:04 --> LOG_HEALTHCHECK probe marker=1698d285c06d
INFO - 2026-02-27 08:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 08:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.031255
INFO - 2026-02-27 08:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.272140
INFO - 2026-02-27 08:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-02-27 08:08:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-02-27 08:08:53 --> [CSRF] token name=csrf_test_name hash=3f4adc4b9a0844a55ceda86e9fc2b3b7
DEBUG - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [REQUEST][END]
INFO - 2026-02-27 08:08:53 --> [REQ_ID=aab628344384] [PERF] Execution time=0.052720
DEBUG - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 08:08:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 08:08:54 --> [CSRF] token name=csrf_test_name hash=bca52f7651e9a7dc4fb38331780e32a8
DEBUG - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [REQUEST][END]
INFO - 2026-02-27 08:08:54 --> [REQ_ID=d563d26a7ac4] [PERF] Execution time=0.016833
DEBUG - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-02-27 08:11:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-02-27 08:11:19 --> [CSRF] token name=csrf_test_name hash=0dffdec408666f8f7abdbb592f362383
DEBUG - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [REQUEST][END]
INFO - 2026-02-27 08:11:19 --> [REQ_ID=ec77fceadfd6] [PERF] Execution time=0.052701
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 08:11:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 08:11:21 --> [CSRF] token name=csrf_test_name hash=707e7959dab19e4857e6e1a8e1cfe946
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=9e7086e74498] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 08:11:21 --> [REQ_ID=9e7086e74498] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [FILTER_AFTER]
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [LIFECYCLE][END] status=200 duration_ms=107.51 memory_delta=0
INFO - 2026-02-27 08:11:21 --> [REQ_ID=9e7086e74498] [PERF] Execution time=0.105665
DEBUG - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [REQUEST][END]
INFO - 2026-02-27 08:11:21 --> [REQ_ID=823aeb7c70ca] [PERF] Execution time=0.118788
DEBUG - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-02-27 08:12:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-02-27 08:12:40 --> [CSRF] token name=csrf_test_name hash=67f027a5c88fbb697219a490959b6362
DEBUG - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [REQUEST][END]
INFO - 2026-02-27 08:12:40 --> [REQ_ID=3f2aa6753517] [PERF] Execution time=0.014645
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 08:12:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 08:12:43 --> [CSRF] token name=csrf_test_name hash=12a2fd468a4e6ee7912ecac73bd7f487
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=3fae549837ca] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 08:12:43 --> [REQ_ID=3fae549837ca] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [FILTER_AFTER]
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [LIFECYCLE][END] status=200 duration_ms=49.36 memory_delta=0
INFO - 2026-02-27 08:12:43 --> [REQ_ID=3fae549837ca] [PERF] Execution time=0.047412
DEBUG - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [REQUEST][END]
INFO - 2026-02-27 08:12:43 --> [REQ_ID=fc320b4f364f] [PERF] Execution time=0.058525
INFO - 2026-02-27 08:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [REQUEST][END]
INFO - 2026-02-27 08:15:01 --> [REQ_ID=b67196a893be] [PERF] Execution time=0.054186
INFO - 2026-02-27 08:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 08:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.296168
INFO - 2026-02-27 08:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 08:15:53 --> [REQ_ID=47ea18a20d77] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 08:15:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:15:53 --> [REQ_ID=47ea18a20d77] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 08:15:53 --> [REQ_ID=47ea18a20d77] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 08:15:53 --> [REQ_ID=47ea18a20d77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 08:15:53 --> [CSRF] token name=csrf_test_name hash=32d5d412e1be45ffa178edc5a185111e
DEBUG - 2026-02-27 08:15:53 --> [REQ_ID=9a075c9ae382] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 08:15:53 --> [REQ_ID=9a075c9ae382] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 08:15:54 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 08:15:54 --> [REQ_ID=9a075c9ae382] [PERF] Execution time=0.198227
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=62de92cd63ab] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=62de92cd63ab] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=62de92cd63ab] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=62de92cd63ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:08 --> [CSRF] token name=csrf_test_name hash=08772b6de0bbe1d0e91fc460d00d0fbc
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=9aeedd6effe9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 08:16:08 --> [REQ_ID=9aeedd6effe9] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 08:16:08 --> [REQ_ID=9aeedd6effe9] [METHOD_ENTRY] show
DEBUG - 2026-02-27 08:16:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:16:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 08:16:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 08:16:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 08:16:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 08:16:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 08:16:08 --> [REQ_ID=9aeedd6effe9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=9aeedd6effe9] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 08:16:09 --> [REQ_ID=9aeedd6effe9] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=98aa41e9c892] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=98aa41e9c892] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=98aa41e9c892] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=98aa41e9c892] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 08:16:09 --> [CSRF] token name=csrf_test_name hash=9a1eb1ccce2a061647a01cfc88ff06a6
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=bedcc06974ec] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 08:16:09 --> [REQ_ID=bedcc06974ec] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=bedcc06974ec] [METHOD_ENTRY] show
DEBUG - 2026-02-27 08:16:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:16:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 08:16:09 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 08:16:09 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 08:16:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 08:16:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=62de92cd63ab] [FILTER_AFTER]
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=62de92cd63ab] [LIFECYCLE][END] status=200 duration_ms=1,256.45 memory_delta=8388608
INFO - 2026-02-27 08:16:09 --> [REQ_ID=9aeedd6effe9] [PERF] Execution time=1.256337
DEBUG - 2026-02-27 08:16:09 --> [REQ_ID=62de92cd63ab] [REQUEST][END]
INFO - 2026-02-27 08:16:09 --> [REQ_ID=62de92cd63ab] [PERF] Execution time=1.269693
DEBUG - 2026-02-27 08:16:09 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 08:16:09 --> [REQ_ID=bedcc06974ec] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 08:16:10 --> [REQ_ID=bedcc06974ec] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 08:16:10 --> [REQ_ID=bedcc06974ec] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 08:16:11 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 08:16:11 --> [REQ_ID=98aa41e9c892] [FILTER_AFTER]
DEBUG - 2026-02-27 08:16:11 --> [REQ_ID=98aa41e9c892] [LIFECYCLE][END] status=200 duration_ms=1,191.01 memory_delta=8388608
INFO - 2026-02-27 08:16:11 --> [REQ_ID=bedcc06974ec] [PERF] Execution time=1.188821
DEBUG - 2026-02-27 08:16:11 --> [REQ_ID=98aa41e9c892] [REQUEST][END]
INFO - 2026-02-27 08:16:11 --> [REQ_ID=98aa41e9c892] [PERF] Execution time=1.233233
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 08:19:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 08:19:03 --> [CSRF] token name=csrf_test_name hash=f541583749fe859b161f940c0bb5f771
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=c950eb66a08f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 08:19:03 --> [REQ_ID=c950eb66a08f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=c950eb66a08f] [METHOD_ENTRY] show
DEBUG - 2026-02-27 08:19:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:19:03 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 08:19:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 08:19:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 08:19:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 08:19:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [FILTER_AFTER]
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [LIFECYCLE][END] status=404 duration_ms=103.04 memory_delta=0
INFO - 2026-02-27 08:19:03 --> [REQ_ID=c950eb66a08f] [PERF] Execution time=0.100659
DEBUG - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [REQUEST][END]
INFO - 2026-02-27 08:19:03 --> [REQ_ID=32fc40481a5f] [PERF] Execution time=0.143814
DEBUG - 2026-02-27 08:24:03 --> [REQ_ID=e24e7d3b652e] [REQUEST][START] GET /
DEBUG - 2026-02-27 08:24:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:24:03 --> [REQ_ID=e24e7d3b652e] [FILTER_BEFORE] /
DEBUG - 2026-02-27 08:24:03 --> [REQ_ID=e24e7d3b652e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 08:24:03 --> [REQ_ID=e24e7d3b652e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 08:24:03 --> [CSRF] token name=csrf_test_name hash=58ec514e54303a557a487cf80c0e271e
DEBUG - 2026-02-27 08:24:03 --> [REQ_ID=db3f34080456] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 08:24:03 --> [REQ_ID=db3f34080456] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 08:24:03 --> [REQ_ID=db3f34080456] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 08:24:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:24:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 08:24:04 --> [REQ_ID=db3f34080456] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 08:24:04 --> [REQ_ID=db3f34080456] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 08:24:04 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 08:24:04 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 08:24:04 --> [REQ_ID=e24e7d3b652e] [FILTER_AFTER]
DEBUG - 2026-02-27 08:24:04 --> [REQ_ID=e24e7d3b652e] [LIFECYCLE][END] status=200 duration_ms=645.30 memory_delta=4194304
INFO - 2026-02-27 08:24:04 --> [REQ_ID=db3f34080456] [PERF] Execution time=0.642871
DEBUG - 2026-02-27 08:24:04 --> [REQ_ID=e24e7d3b652e] [REQUEST][END]
INFO - 2026-02-27 08:24:04 --> [REQ_ID=e24e7d3b652e] [PERF] Execution time=0.684039
INFO - 2026-02-27 08:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 08:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 08:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 08:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 08:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.115041
INFO - 2026-02-27 08:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 08:40:55 --> [REQ_ID=2087437e96a4] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-02-27 08:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 08:40:55 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 08:40:55 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 08:40:55 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting
WARNING - 2026-02-27 08:40:55 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: none
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=b9e46430733c] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 08:42:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=b9e46430733c] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=b9e46430733c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=b9e46430733c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 08:42:38 --> [CSRF] token name=csrf_test_name hash=b39aecd68dc4c5fc904b17d6914170a9
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=87f54a607712] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 08:42:38 --> [REQ_ID=87f54a607712] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 08:42:38 --> [REQ_ID=87f54a607712] [METHOD_ENTRY] show
DEBUG - 2026-02-27 08:42:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:42:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 08:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 08:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 08:42:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 08:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 08:42:38 --> [REQ_ID=87f54a607712] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 08:42:39 --> [REQ_ID=87f54a607712] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 08:42:39 --> [REQ_ID=87f54a607712] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 08:42:40 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 08:42:40 --> [REQ_ID=b9e46430733c] [FILTER_AFTER]
DEBUG - 2026-02-27 08:42:40 --> [REQ_ID=b9e46430733c] [LIFECYCLE][END] status=200 duration_ms=1,330.23 memory_delta=8388608
INFO - 2026-02-27 08:42:40 --> [REQ_ID=87f54a607712] [PERF] Execution time=1.328066
DEBUG - 2026-02-27 08:42:40 --> [REQ_ID=b9e46430733c] [REQUEST][END]
INFO - 2026-02-27 08:42:40 --> [REQ_ID=b9e46430733c] [PERF] Execution time=1.372955
INFO - 2026-02-27 08:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 08:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 08:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 08:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 08:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 08:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.156714
INFO - 2026-02-27 08:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [REQUEST][START] GET /index.php/resend-activation
DEBUG - 2026-02-27 08:46:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [FILTER_BEFORE] /index.php/resend-activation
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [ROUTE] Controller=\App\Controllers\AuthController Method=resendActivation
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/resend-activation
DEBUG - 2026-02-27 08:46:58 --> [CSRF] token name=csrf_test_name hash=c78af8e24650683dd0547967babedc37
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=f4621595bc06] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 08:46:58 --> [REQ_ID=f4621595bc06] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [FILTER_AFTER]
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [LIFECYCLE][END] status=200 duration_ms=55.87 memory_delta=0
INFO - 2026-02-27 08:46:58 --> [REQ_ID=f4621595bc06] [PERF] Execution time=0.053227
DEBUG - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [REQUEST][END]
INFO - 2026-02-27 08:46:58 --> [REQ_ID=08d93f95b480] [PERF] Execution time=0.097300
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [REQUEST][START] GET /
DEBUG - 2026-02-27 08:55:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [FILTER_BEFORE] /
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 08:55:21 --> [CSRF] token name=csrf_test_name hash=fb21e42df3d3eaae138433b45ff06b43
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 08:55:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 08:55:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 08:55:21 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 08:55:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [FILTER_AFTER]
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [LIFECYCLE][END] status=200 duration_ms=614.49 memory_delta=4194304
INFO - 2026-02-27 08:55:21 --> [REQ_ID=098ddb964ba6] [PERF] Execution time=0.612493
DEBUG - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [REQUEST][END]
INFO - 2026-02-27 08:55:21 --> [REQ_ID=5a3fb339a216] [PERF] Execution time=0.652640
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 08:58:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 08:58:26 --> [CSRF] token name=csrf_test_name hash=a0a9d2cda5b5d0cab55a51dc16d9fd3a
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=51fa0cbbe503] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 08:58:26 --> [REQ_ID=51fa0cbbe503] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [FILTER_AFTER]
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [LIFECYCLE][END] status=200 duration_ms=67.23 memory_delta=0
INFO - 2026-02-27 08:58:26 --> [REQ_ID=51fa0cbbe503] [PERF] Execution time=0.064898
DEBUG - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [REQUEST][END]
INFO - 2026-02-27 08:58:26 --> [REQ_ID=ce553b1814b1] [PERF] Execution time=0.106959
INFO - 2026-02-27 09:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 09:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 09:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 09:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [REQUEST][END]
INFO - 2026-02-27 09:00:01 --> [REQ_ID=d3c6635dac2f] [PERF] Execution time=0.053557
INFO - 2026-02-27 09:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 09:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.093648
INFO - 2026-02-27 09:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-02-27 09:04:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-02-27 09:04:41 --> [CSRF] token name=csrf_test_name hash=4d12980dfb1b040d99c2390004ffb411
DEBUG - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [REQUEST][END]
INFO - 2026-02-27 09:04:41 --> [REQ_ID=64d891b50a38] [PERF] Execution time=0.055308
DEBUG - 2026-02-27 09:07:39 --> [REQ_ID=00322fe2335a] [REQUEST][START] GET /
DEBUG - 2026-02-27 09:07:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:07:39 --> [REQ_ID=00322fe2335a] [FILTER_BEFORE] /
DEBUG - 2026-02-27 09:07:39 --> [REQ_ID=00322fe2335a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 09:07:39 --> [REQ_ID=00322fe2335a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 09:07:39 --> [CSRF] token name=csrf_test_name hash=845453b1af49f620a7a8638b2c2c0583
DEBUG - 2026-02-27 09:07:39 --> [REQ_ID=138a6462778c] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 09:07:39 --> [REQ_ID=138a6462778c] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 09:07:39 --> [REQ_ID=138a6462778c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 09:07:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:07:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 09:07:40 --> [REQ_ID=138a6462778c] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 09:07:40 --> [REQ_ID=138a6462778c] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 09:07:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 09:07:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 09:07:40 --> [REQ_ID=00322fe2335a] [FILTER_AFTER]
DEBUG - 2026-02-27 09:07:40 --> [REQ_ID=00322fe2335a] [LIFECYCLE][END] status=200 duration_ms=665.24 memory_delta=4194304
INFO - 2026-02-27 09:07:40 --> [REQ_ID=138a6462778c] [PERF] Execution time=0.663218
DEBUG - 2026-02-27 09:07:40 --> [REQ_ID=00322fe2335a] [REQUEST][END]
INFO - 2026-02-27 09:07:40 --> [REQ_ID=00322fe2335a] [PERF] Execution time=0.703889
INFO - 2026-02-27 09:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 09:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 09:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 09:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [REQUEST][END]
INFO - 2026-02-27 09:15:01 --> [REQ_ID=ba0361975329] [PERF] Execution time=0.067921
INFO - 2026-02-27 09:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 09:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.119351
INFO - 2026-02-27 09:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [REQUEST][START] GET /
DEBUG - 2026-02-27 09:26:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [FILTER_BEFORE] /
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 09:26:37 --> [CSRF] token name=csrf_test_name hash=293564bc3e1f598b58133cc618b2ee50
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 09:26:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:26:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 09:26:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 09:26:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [FILTER_AFTER]
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [LIFECYCLE][END] status=200 duration_ms=579.74 memory_delta=4194304
INFO - 2026-02-27 09:26:37 --> [REQ_ID=7dde320f68d1] [PERF] Execution time=0.578021
DEBUG - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [REQUEST][END]
INFO - 2026-02-27 09:26:37 --> [REQ_ID=d9eb98ca7462] [PERF] Execution time=0.620079
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-02-27 09:29:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-02-27 09:29:29 --> [CSRF] token name=csrf_test_name hash=4d76396814e4c7eb5ec27dbaef287215
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:29:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:29:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:29:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:29:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:29:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 09:29:29 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit= path=DB
INFO - 2026-02-27 09:29:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 09:29:29 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [FILTER_AFTER]
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [LIFECYCLE][END] status=200 duration_ms=732.37 memory_delta=4194304
INFO - 2026-02-27 09:29:29 --> [REQ_ID=6e3c80df9091] [PERF] Execution time=0.730110
DEBUG - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [REQUEST][END]
INFO - 2026-02-27 09:29:29 --> [REQ_ID=47bcb5e9b2b6] [PERF] Execution time=0.774968
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-02-27 09:29:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-02-27 09:29:30 --> [CSRF] token name=csrf_test_name hash=52c20559ad3e1a6b4ae452584ff2087e
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:29:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:29:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:29:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-02-27 09:29:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:29:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-27 09:29:30 --> [CSRF] token name=csrf_test_name hash=5f06c40a2ca5d85da474f13bd477c6fc
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:29:30 --> [CSRF] token name=csrf_test_name hash=d5a88fe0961b52de205f4e135d942bca
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=8ef19eec0cb3] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:29:30 --> [REQ_ID=8ef19eec0cb3] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=8ef19eec0cb3] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:29:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:29:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:29:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:29:30 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:29:30 --> MyMIWallets initialized without numeric user context.
WARNING - 2026-02-27 09:29:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [FILTER_AFTER]
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [LIFECYCLE][END] status=404 duration_ms=113.07 memory_delta=0
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 09:29:30 --> [REQ_ID=8ef19eec0cb3] [PERF] Execution time=0.110589
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [REQUEST][END]
INFO - 2026-02-27 09:29:30 --> [REQ_ID=94e6f442dd34] [PERF] Execution time=0.176524
DEBUG - 2026-02-27 09:29:30 --> [MetaService] slug=how-it-works/overview pageName= cacheHit= path=DB
INFO - 2026-02-27 09:29:30 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 09:29:30 --> [MetaService] slug=how-it-works/overview pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [FILTER_AFTER]
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [LIFECYCLE][END] status=200 duration_ms=443.75 memory_delta=2097152
INFO - 2026-02-27 09:29:30 --> [REQ_ID=0f94cd1e9810] [PERF] Execution time=0.443574
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [REQUEST][END]
INFO - 2026-02-27 09:29:30 --> [REQ_ID=9e4d3eb3cf12] [PERF] Execution time=0.452660
DEBUG - 2026-02-27 09:29:30 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit= path=DB
INFO - 2026-02-27 09:29:30 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 09:29:30 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [FILTER_AFTER]
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [LIFECYCLE][END] status=200 duration_ms=738.88 memory_delta=4194304
INFO - 2026-02-27 09:29:30 --> [REQ_ID=1e823a74f487] [PERF] Execution time=0.735309
DEBUG - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [REQUEST][END]
INFO - 2026-02-27 09:29:30 --> [REQ_ID=1050a717c5b0] [PERF] Execution time=0.797407
INFO - 2026-02-27 09:30:02 --> [spark:ops:work] Started
INFO - 2026-02-27 09:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 09:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 09:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 09:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 09:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.113850
INFO - 2026-02-27 09:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 09:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 09:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 09:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 09:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 09:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 09:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.133616
INFO - 2026-02-27 09:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=056093869a9e] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 09:46:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=056093869a9e] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=056093869a9e] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=056093869a9e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 09:46:36 --> [CSRF] token name=csrf_test_name hash=de22dd0825c1bb64551d5b77e6afcc63
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=4f9d2f461529] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 09:46:36 --> [REQ_ID=4f9d2f461529] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:46:36 --> [REQ_ID=4f9d2f461529] [METHOD_ENTRY] index
DEBUG - 2026-02-27 09:46:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:46:36 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:46:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:46:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:46:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:46:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 09:46:36 --> [REQ_ID=4f9d2f461529] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 09:46:36 --> [REQ_ID=4f9d2f461529] [PERF] Execution time=0.151124
DEBUG - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-27 09:49:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-27 09:49:25 --> [CSRF] token name=csrf_test_name hash=1309a926a86c61c740d8b00f264d952a
DEBUG - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [REQUEST][END]
INFO - 2026-02-27 09:49:25 --> [REQ_ID=e4d76abae984] [PERF] Execution time=0.052546
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=3ceaa8ac3575] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 09:54:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:54:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=3ceaa8ac3575] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=3ceaa8ac3575] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=3ceaa8ac3575] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [FILTER_BEFORE] /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 09:54:28 --> [CSRF] token name=csrf_test_name hash=45333e2c1c9fb527c16e7c3b9523f735
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=22550e195f8f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:54:28 --> [REQ_ID=22550e195f8f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:54:28 --> [CSRF] token name=csrf_test_name hash=c7573980bb4fc8ecab6cf999b783cb84
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=10fa018dc228] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 09:54:28 --> [REQ_ID=10fa018dc228] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=10fa018dc228] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:54:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:54:28 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:54:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:54:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:54:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:54:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [FILTER_AFTER]
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [LIFECYCLE][END] status=404 duration_ms=110.41 memory_delta=0
INFO - 2026-02-27 09:54:28 --> [REQ_ID=10fa018dc228] [PERF] Execution time=0.106724
DEBUG - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [REQUEST][END]
INFO - 2026-02-27 09:54:28 --> [REQ_ID=9d816441ad1b] [PERF] Execution time=0.172542
DEBUG - 2026-02-27 09:54:29 --> [REQ_ID=22550e195f8f] [METHOD_ENTRY] show
DEBUG - 2026-02-27 09:54:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 09:54:29 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 09:54:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:54:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 09:54:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 09:54:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 09:54:29 --> [REQ_ID=3ceaa8ac3575] [FILTER_AFTER]
DEBUG - 2026-02-27 09:54:29 --> [REQ_ID=3ceaa8ac3575] [LIFECYCLE][END] status=404 duration_ms=195.22 memory_delta=0
INFO - 2026-02-27 09:54:29 --> [REQ_ID=22550e195f8f] [PERF] Execution time=0.192736
DEBUG - 2026-02-27 09:54:29 --> [REQ_ID=3ceaa8ac3575] [REQUEST][END]
INFO - 2026-02-27 09:54:29 --> [REQ_ID=3ceaa8ac3575] [PERF] Execution time=0.256287
DEBUG - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 10:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [REQUEST][END]
INFO - 2026-02-27 10:00:02 --> [REQ_ID=cd432f2897ab] [PERF] Execution time=0.064574
INFO - 2026-02-27 10:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 10:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 10:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 10:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-27 10:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 10:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.099968
INFO - 2026-02-27 10:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 10:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 10:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.017617
INFO - 2026-02-27 10:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 10:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 10:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 10:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 10:00:04 --> LOG_HEALTHCHECK debug marker=02ae69f98f7c
INFO - 2026-02-27 10:00:04 --> LOG_HEALTHCHECK info marker=02ae69f98f7c
NOTICE - 2026-02-27 10:00:04 --> LOG_HEALTHCHECK probe marker=02ae69f98f7c
INFO - 2026-02-27 10:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 10:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.023407
INFO - 2026-02-27 10:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 10:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.192415
INFO - 2026-02-27 10:00:05 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 10:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 10:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 10:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 10:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.051406
INFO - 2026-02-27 10:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [REQUEST][END]
INFO - 2026-02-27 10:15:01 --> [REQ_ID=f8cd9b4a6acd] [PERF] Execution time=0.052908
DEBUG - 2026-02-27 10:16:20 --> [REQ_ID=c85ca3e8e98e] [REQUEST][START] GET /
DEBUG - 2026-02-27 10:16:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:16:20 --> [REQ_ID=c85ca3e8e98e] [FILTER_BEFORE] /
DEBUG - 2026-02-27 10:16:20 --> [REQ_ID=c85ca3e8e98e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 10:16:20 --> [REQ_ID=c85ca3e8e98e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 10:16:20 --> [CSRF] token name=csrf_test_name hash=342235008f01e5ab393edb0fa5aa7ef7
DEBUG - 2026-02-27 10:16:20 --> [REQ_ID=96e7349cd2af] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 10:16:20 --> [REQ_ID=96e7349cd2af] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 10:16:20 --> [REQ_ID=96e7349cd2af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 10:16:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:16:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 10:16:21 --> [REQ_ID=96e7349cd2af] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 10:16:21 --> [REQ_ID=96e7349cd2af] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 10:16:21 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 10:16:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 10:16:21 --> [REQ_ID=c85ca3e8e98e] [FILTER_AFTER]
DEBUG - 2026-02-27 10:16:21 --> [REQ_ID=c85ca3e8e98e] [LIFECYCLE][END] status=200 duration_ms=567.82 memory_delta=4194304
INFO - 2026-02-27 10:16:21 --> [REQ_ID=96e7349cd2af] [PERF] Execution time=0.565657
DEBUG - 2026-02-27 10:16:21 --> [REQ_ID=c85ca3e8e98e] [REQUEST][END]
INFO - 2026-02-27 10:16:21 --> [REQ_ID=c85ca3e8e98e] [PERF] Execution time=0.605301
INFO - 2026-02-27 10:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 10:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 10:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 10:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 10:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030931
INFO - 2026-02-27 10:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-02-27 10:31:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-02-27 10:31:34 --> [CSRF] token name=csrf_test_name hash=6fb704f7565206ac851a1de44cf8b68c
DEBUG - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [REQUEST][END]
INFO - 2026-02-27 10:31:34 --> [REQ_ID=dcc84c004e60] [PERF] Execution time=0.056103
DEBUG - 2026-02-27 10:37:31 --> [REQ_ID=993f170ea2bd] [REQUEST][START] GET /
DEBUG - 2026-02-27 10:37:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:37:31 --> [REQ_ID=993f170ea2bd] [FILTER_BEFORE] /
DEBUG - 2026-02-27 10:37:31 --> [REQ_ID=993f170ea2bd] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 10:37:31 --> [REQ_ID=993f170ea2bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 10:37:31 --> [CSRF] token name=csrf_test_name hash=60f1b3a5f446d4b024be58423dcc0e3a
DEBUG - 2026-02-27 10:37:31 --> [REQ_ID=445c6c33a959] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 10:37:31 --> [REQ_ID=445c6c33a959] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 10:37:31 --> [REQ_ID=445c6c33a959] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 10:37:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:37:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 10:37:32 --> [REQ_ID=445c6c33a959] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 10:37:32 --> [REQ_ID=445c6c33a959] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 10:37:32 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 10:37:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 10:37:32 --> [REQ_ID=993f170ea2bd] [FILTER_AFTER]
DEBUG - 2026-02-27 10:37:32 --> [REQ_ID=993f170ea2bd] [LIFECYCLE][END] status=200 duration_ms=742.65 memory_delta=4194304
INFO - 2026-02-27 10:37:32 --> [REQ_ID=445c6c33a959] [PERF] Execution time=0.740756
DEBUG - 2026-02-27 10:37:32 --> [REQ_ID=993f170ea2bd] [REQUEST][END]
INFO - 2026-02-27 10:37:32 --> [REQ_ID=993f170ea2bd] [PERF] Execution time=0.781815
INFO - 2026-02-27 10:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 10:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 10:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 10:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 10:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 10:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108260
INFO - 2026-02-27 10:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 10:45:38 --> [REQ_ID=327eb5680694] [REQUEST][START] GET /
DEBUG - 2026-02-27 10:45:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:45:38 --> [REQ_ID=327eb5680694] [FILTER_BEFORE] /
DEBUG - 2026-02-27 10:45:38 --> [REQ_ID=327eb5680694] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 10:45:38 --> [REQ_ID=327eb5680694] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 10:45:38 --> [CSRF] token name=csrf_test_name hash=b888554e441b78cbacee8e7f60d575c0
DEBUG - 2026-02-27 10:45:38 --> [REQ_ID=ce6c08f40d51] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 10:45:38 --> [REQ_ID=ce6c08f40d51] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 10:45:39 --> [REQ_ID=ce6c08f40d51] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 10:45:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:45:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 10:45:39 --> [REQ_ID=ce6c08f40d51] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 10:45:39 --> [REQ_ID=ce6c08f40d51] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 10:45:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 10:45:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 10:45:39 --> [REQ_ID=327eb5680694] [FILTER_AFTER]
DEBUG - 2026-02-27 10:45:39 --> [REQ_ID=327eb5680694] [LIFECYCLE][END] status=200 duration_ms=632.53 memory_delta=4194304
INFO - 2026-02-27 10:45:39 --> [REQ_ID=ce6c08f40d51] [PERF] Execution time=0.630551
DEBUG - 2026-02-27 10:45:39 --> [REQ_ID=327eb5680694] [REQUEST][END]
INFO - 2026-02-27 10:45:39 --> [REQ_ID=327eb5680694] [PERF] Execution time=0.669886
DEBUG - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [REQUEST][START] GET /index.php/Management/Security
DEBUG - 2026-02-27 10:50:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [FILTER_BEFORE] /index.php/Management/Security
DEBUG - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [ROUTE] Controller=\App\Modules\Management\Controllers\SecurityController Method=index
DEBUG - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Security
DEBUG - 2026-02-27 10:50:01 --> [CSRF] token name=csrf_test_name hash=8a53f675bc6fe0f19b628d0b66e32859
DEBUG - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [REQUEST][END]
INFO - 2026-02-27 10:50:01 --> [REQ_ID=d1ae07811240] [PERF] Execution time=0.060621
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:02 --> [CSRF] token name=csrf_test_name hash=ea5a604017eac825a85d4c72333cc785
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=6affbf877b6a] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:02 --> [REQ_ID=6affbf877b6a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [LIFECYCLE][END] status=200 duration_ms=42.41 memory_delta=0
INFO - 2026-02-27 10:50:02 --> [REQ_ID=6affbf877b6a] [PERF] Execution time=0.039987
DEBUG - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [REQUEST][END]
INFO - 2026-02-27 10:50:02 --> [REQ_ID=cf40ff926021] [PERF] Execution time=0.063219
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-27 10:50:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-27 10:50:20 --> [CSRF] token name=csrf_test_name hash=43cc75ca0cf7a08b71ff99057d27afa4
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [REQUEST][END]
INFO - 2026-02-27 10:50:20 --> [REQ_ID=eafa14deb3d8] [PERF] Execution time=0.013244
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:20 --> [CSRF] token name=csrf_test_name hash=70fd5043d1e13e531b7ded6e723631ee
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=ffac19001639] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:20 --> [REQ_ID=ffac19001639] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [LIFECYCLE][END] status=200 duration_ms=21.98 memory_delta=0
INFO - 2026-02-27 10:50:20 --> [REQ_ID=ffac19001639] [PERF] Execution time=0.021804
DEBUG - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [REQUEST][END]
INFO - 2026-02-27 10:50:20 --> [REQ_ID=9417f0e022f7] [PERF] Execution time=0.030225
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-02-27 10:50:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-02-27 10:50:21 --> [CSRF] token name=csrf_test_name hash=0b00fe7b59082cba285f26b51e7972c2
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [REQUEST][END]
INFO - 2026-02-27 10:50:21 --> [REQ_ID=ebdc2496ff65] [PERF] Execution time=0.015172
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:21 --> [CSRF] token name=csrf_test_name hash=ed8f0a0821c8fb64fb5c0880e0b03603
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5aa08e522bd3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:21 --> [REQ_ID=5aa08e522bd3] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-02-27 10:50:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [LIFECYCLE][END] status=200 duration_ms=89.43 memory_delta=0
INFO - 2026-02-27 10:50:21 --> [REQ_ID=5aa08e522bd3] [PERF] Execution time=0.085317
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [REQUEST][END]
INFO - 2026-02-27 10:50:21 --> [REQ_ID=5492f44dc054] [PERF] Execution time=0.101629
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-02-27 10:50:21 --> [CSRF] token name=csrf_test_name hash=ab5646c5f1f1a7f31bafb4ff651ef87c
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [REQUEST][END]
INFO - 2026-02-27 10:50:21 --> [REQ_ID=4d55e92b6fb4] [PERF] Execution time=0.056378
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:21 --> [CSRF] token name=csrf_test_name hash=853302565d75e8f71b275a1c374cbb4d
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=5e0137f42ba7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:21 --> [REQ_ID=5e0137f42ba7] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [LIFECYCLE][END] status=200 duration_ms=31.40 memory_delta=0
INFO - 2026-02-27 10:50:21 --> [REQ_ID=5e0137f42ba7] [PERF] Execution time=0.031187
DEBUG - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [REQUEST][END]
INFO - 2026-02-27 10:50:21 --> [REQ_ID=91166d89189e] [PERF] Execution time=0.042784
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [REQUEST][START] GET /index.php/logout
DEBUG - 2026-02-27 10:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-02-27 10:50:26 --> [CSRF] token name=csrf_test_name hash=6773dec685b40abd621dd4826b16cd65
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [FILTER_BEFORE] /index.php/logout
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [REQUEST][END]
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [ROUTE] Controller=\App\Controllers\AuthController Method=logout
INFO - 2026-02-27 10:50:26 --> [REQ_ID=3b19a4b032a6] [PERF] Execution time=0.016323
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/logout
DEBUG - 2026-02-27 10:50:26 --> [CSRF] token name=csrf_test_name hash=8c80fba09f4c0110ace691c366f4f221
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [REQUEST][END]
INFO - 2026-02-27 10:50:26 --> [REQ_ID=c1a07c657e7a] [PERF] Execution time=0.019001
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:26 --> [CSRF] token name=csrf_test_name hash=9b1d2fc846c4696011ea3e9dbb49e2f2
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=94c9b54b7a25] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:26 --> [REQ_ID=94c9b54b7a25] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:26 --> [CSRF] token name=csrf_test_name hash=19d5e58cd962c496e28147c4f5bb4f5e
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=74c6479564fa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:26 --> [REQ_ID=74c6479564fa] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [LIFECYCLE][END] status=200 duration_ms=33.06 memory_delta=0
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [LIFECYCLE][END] status=200 duration_ms=32.55 memory_delta=0
INFO - 2026-02-27 10:50:26 --> [REQ_ID=94c9b54b7a25] [PERF] Execution time=0.032229
INFO - 2026-02-27 10:50:26 --> [REQ_ID=74c6479564fa] [PERF] Execution time=0.031589
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [REQUEST][END]
INFO - 2026-02-27 10:50:26 --> [REQ_ID=a0f54c02b48f] [PERF] Execution time=0.048439
DEBUG - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [REQUEST][END]
INFO - 2026-02-27 10:50:26 --> [REQ_ID=c75d09c77328] [PERF] Execution time=0.047233
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=f9d557d9f87f] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-02-27 10:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-02-27 10:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-02-27 10:50:27 --> [CSRF] token name=csrf_test_name hash=2e813250f4a193f6ebac9d192c0c4b3d
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [REQUEST][END]
INFO - 2026-02-27 10:50:27 --> [REQ_ID=47e3518c6b6c] [PERF] Execution time=0.019137
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:27 --> [CSRF] token name=csrf_test_name hash=fd9889c5e97a8477ffa30ec602b6e1e6
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=67097d69c646] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:27 --> [REQ_ID=67097d69c646] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [LIFECYCLE][END] status=200 duration_ms=20.58 memory_delta=0
INFO - 2026-02-27 10:50:27 --> [REQ_ID=67097d69c646] [PERF] Execution time=0.019691
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [REQUEST][END]
INFO - 2026-02-27 10:50:27 --> [REQ_ID=fecad403f04a] [PERF] Execution time=0.032779
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [REQUEST][START] GET /index.php/Account/Notifications
DEBUG - 2026-02-27 10:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [FILTER_BEFORE] /index.php/Account/Notifications
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=notifications
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Notifications
DEBUG - 2026-02-27 10:50:27 --> [CSRF] token name=csrf_test_name hash=61fa11b4305f9df3dc3abf0da82d3d8e
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [REQUEST][END]
INFO - 2026-02-27 10:50:27 --> [REQ_ID=7bcdb44ef558] [PERF] Execution time=0.054747
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:27 --> [CSRF] token name=csrf_test_name hash=0aeedb1672b6930ece86c1103ee7fe85
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=8a7a73130a4c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:27 --> [REQ_ID=8a7a73130a4c] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [LIFECYCLE][END] status=200 duration_ms=34.86 memory_delta=0
INFO - 2026-02-27 10:50:27 --> [REQ_ID=8a7a73130a4c] [PERF] Execution time=0.034604
DEBUG - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [REQUEST][END]
INFO - 2026-02-27 10:50:27 --> [REQ_ID=6ffa427fa35f] [PERF] Execution time=0.045961
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-02-27 10:50:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-02-27 10:50:32 --> [CSRF] token name=csrf_test_name hash=f484d06955b3d1dafb16279d99b59c56
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [REQUEST][END]
INFO - 2026-02-27 10:50:32 --> [REQ_ID=a66f5eaa76aa] [PERF] Execution time=0.013504
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 10:50:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 10:50:32 --> [CSRF] token name=csrf_test_name hash=8df2268da4db0e8a724cad47843a1fa7
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=4c93ae9f224d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 10:50:32 --> [REQ_ID=4c93ae9f224d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [FILTER_AFTER]
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [LIFECYCLE][END] status=200 duration_ms=13.84 memory_delta=0
INFO - 2026-02-27 10:50:32 --> [REQ_ID=4c93ae9f224d] [PERF] Execution time=0.013669
DEBUG - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [REQUEST][END]
INFO - 2026-02-27 10:50:32 --> [REQ_ID=11170c2e6709] [PERF] Execution time=0.022189
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-02-27 10:53:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-02-27 10:53:32 --> [CSRF] token name=csrf_test_name hash=46cc89f90aef6042fcb7890900c622d5
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [METHOD_ENTRY] index
DEBUG - 2026-02-27 10:53:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:53:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 10:53:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 10:53:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 10:53:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 10:53:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 10:53:32 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [FILTER_AFTER]
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [LIFECYCLE][END] status=200 duration_ms=120.78 memory_delta=2097152
INFO - 2026-02-27 10:53:32 --> [REQ_ID=522cb2088a8b] [PERF] Execution time=0.118573
DEBUG - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [REQUEST][END]
INFO - 2026-02-27 10:53:32 --> [REQ_ID=a4f3f50c70ec] [PERF] Execution time=0.161695
DEBUG - 2026-02-27 10:53:33 --> [REQ_ID=120bf771c338] [REQUEST][START] GET /index.php
DEBUG - 2026-02-27 10:53:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:53:33 --> [REQ_ID=120bf771c338] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-27 10:53:33 --> [REQ_ID=120bf771c338] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 10:53:33 --> [REQ_ID=120bf771c338] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 10:53:33 --> [CSRF] token name=csrf_test_name hash=b1d320f2aa22a4439b867887dae77a5a
DEBUG - 2026-02-27 10:53:33 --> [REQ_ID=ea428ef0a8a3] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 10:53:33 --> [REQ_ID=ea428ef0a8a3] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 10:53:33 --> [REQ_ID=ea428ef0a8a3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 10:53:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:53:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=ea428ef0a8a3] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 10:53:34 --> [REQ_ID=ea428ef0a8a3] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 10:53:34 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 10:53:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=120bf771c338] [FILTER_AFTER]
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=120bf771c338] [LIFECYCLE][END] status=200 duration_ms=638.28 memory_delta=4194304
INFO - 2026-02-27 10:53:34 --> [REQ_ID=ea428ef0a8a3] [PERF] Execution time=0.637989
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=120bf771c338] [REQUEST][END]
INFO - 2026-02-27 10:53:34 --> [REQ_ID=120bf771c338] [PERF] Execution time=0.649546
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 10:53:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 10:53:34 --> [CSRF] token name=csrf_test_name hash=0c43b552b944edb1cee3b0f632700bc3
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=e42f63fd0a06] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 10:53:34 --> [REQ_ID=e42f63fd0a06] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=e42f63fd0a06] [METHOD_ENTRY] show
DEBUG - 2026-02-27 10:53:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 10:53:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 10:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 10:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 10:53:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 10:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [FILTER_AFTER]
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [LIFECYCLE][END] status=404 duration_ms=18.22 memory_delta=0
INFO - 2026-02-27 10:53:34 --> [REQ_ID=e42f63fd0a06] [PERF] Execution time=0.017879
DEBUG - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [REQUEST][END]
INFO - 2026-02-27 10:53:34 --> [REQ_ID=bb58d94f1008] [PERF] Execution time=0.029934
INFO - 2026-02-27 11:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 11:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 11:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 11:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 11:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 11:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034009
INFO - 2026-02-27 11:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [REQUEST][END]
INFO - 2026-02-27 11:00:01 --> [REQ_ID=277103247bd1] [PERF] Execution time=0.047718
INFO - 2026-02-27 11:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 11:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 11:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 11:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 11:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 11:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.063808
INFO - 2026-02-27 11:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [REQUEST][END]
INFO - 2026-02-27 11:15:01 --> [REQ_ID=8f81eee7447d] [PERF] Execution time=0.055552
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 11:16:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 11:16:48 --> [CSRF] token name=csrf_test_name hash=a4c1d50732f9352e90e103a290cf5cba
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=a047ea563923] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 11:16:48 --> [REQ_ID=a047ea563923] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=a047ea563923] [METHOD_ENTRY] show
DEBUG - 2026-02-27 11:16:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 11:16:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 11:16:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 11:16:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 11:16:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 11:16:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [FILTER_AFTER]
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [LIFECYCLE][END] status=404 duration_ms=97.47 memory_delta=0
INFO - 2026-02-27 11:16:48 --> [REQ_ID=a047ea563923] [PERF] Execution time=0.095512
DEBUG - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [REQUEST][END]
INFO - 2026-02-27 11:16:48 --> [REQ_ID=27855831dbe9] [PERF] Execution time=0.143400
DEBUG - 2026-02-27 11:27:50 --> [REQ_ID=a78c85bd30a7] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-27 11:27:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:27:51 --> [REQ_ID=a78c85bd30a7] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-27 11:27:51 --> [REQ_ID=a78c85bd30a7] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-27 11:27:51 --> [REQ_ID=a78c85bd30a7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-27 11:27:51 --> [CSRF] token name=csrf_test_name hash=9526a9368263abadb7a03ec89a619cc2
DEBUG - 2026-02-27 11:27:51 --> [REQ_ID=a78c85bd30a7] [REQUEST][END]
INFO - 2026-02-27 11:27:51 --> [REQ_ID=a78c85bd30a7] [PERF] Execution time=0.053906
DEBUG - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-02-27 11:27:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-02-27 11:27:58 --> [CSRF] token name=csrf_test_name hash=55e2c20e67f2f764c8dfbee93ac223ca
DEBUG - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [REQUEST][END]
INFO - 2026-02-27 11:27:58 --> [REQ_ID=527deed2f4e4] [PERF] Execution time=0.015260
INFO - 2026-02-27 11:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 11:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 11:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 11:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 11:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045794
INFO - 2026-02-27 11:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 11:33:24 --> [REQ_ID=0d1a6eab8c15] [REQUEST][START] GET /
DEBUG - 2026-02-27 11:33:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 11:33:24 --> [REQ_ID=0d1a6eab8c15] [FILTER_BEFORE] /
DEBUG - 2026-02-27 11:33:24 --> [REQ_ID=0d1a6eab8c15] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 11:33:24 --> [REQ_ID=0d1a6eab8c15] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 11:33:24 --> [CSRF] token name=csrf_test_name hash=b31e8c0c91c98b8af6d49e94b20de6bb
DEBUG - 2026-02-27 11:33:24 --> [REQ_ID=47b51b14f243] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 11:33:24 --> [REQ_ID=47b51b14f243] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 11:33:24 --> [REQ_ID=47b51b14f243] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 11:33:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 11:33:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 11:33:25 --> [REQ_ID=47b51b14f243] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 11:33:25 --> [REQ_ID=47b51b14f243] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 11:33:25 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 11:33:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 11:33:25 --> [REQ_ID=0d1a6eab8c15] [FILTER_AFTER]
DEBUG - 2026-02-27 11:33:25 --> [REQ_ID=0d1a6eab8c15] [LIFECYCLE][END] status=200 duration_ms=788.45 memory_delta=4194304
INFO - 2026-02-27 11:33:25 --> [REQ_ID=47b51b14f243] [PERF] Execution time=0.786246
DEBUG - 2026-02-27 11:33:25 --> [REQ_ID=0d1a6eab8c15] [REQUEST][END]
INFO - 2026-02-27 11:33:25 --> [REQ_ID=0d1a6eab8c15] [PERF] Execution time=0.828939
INFO - 2026-02-27 11:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 11:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 11:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 11:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 11:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 11:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034816
INFO - 2026-02-27 11:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 12:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-27 12:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 12:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 12:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 12:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053319
INFO - 2026-02-27 12:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [REQUEST][END]
INFO - 2026-02-27 12:00:01 --> [REQ_ID=7e7ef36769a4] [PERF] Execution time=0.059180
INFO - 2026-02-27 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 12:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 12:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.020820
INFO - 2026-02-27 12:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 12:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 12:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 12:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 12:00:04 --> LOG_HEALTHCHECK debug marker=17e02cb3b1fd
INFO - 2026-02-27 12:00:04 --> LOG_HEALTHCHECK info marker=17e02cb3b1fd
NOTICE - 2026-02-27 12:00:04 --> LOG_HEALTHCHECK probe marker=17e02cb3b1fd
INFO - 2026-02-27 12:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 12:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.027068
INFO - 2026-02-27 12:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 12:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.607032
INFO - 2026-02-27 12:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 12:03:53 --> [REQ_ID=4a2f00c48c6c] [REQUEST][START] GET /index.php/activate
DEBUG - 2026-02-27 12:03:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:03:53 --> [REQ_ID=4a2f00c48c6c] [FILTER_BEFORE] /index.php/activate
DEBUG - 2026-02-27 12:03:53 --> [REQ_ID=4a2f00c48c6c] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-02-27 12:03:53 --> [REQ_ID=4a2f00c48c6c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate
DEBUG - 2026-02-27 12:03:53 --> [CSRF] token name=csrf_test_name hash=0b35ff9982a2cb440214a7d7674b5283
DEBUG - 2026-02-27 12:03:53 --> [REQ_ID=eb29414f9e86] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:03:53 --> [REQ_ID=eb29414f9e86] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 12:03:53 --> [ACTIVATION] Activation link hit
WARNING - 2026-02-27 12:03:53 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=4a2f00c48c6c] [FILTER_AFTER]
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=4a2f00c48c6c] [LIFECYCLE][END] status=302 duration_ms=68.34 memory_delta=0
INFO - 2026-02-27 12:03:54 --> [REQ_ID=eb29414f9e86] [PERF] Execution time=0.066256
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=4a2f00c48c6c] [REQUEST][END]
INFO - 2026-02-27 12:03:54 --> [REQ_ID=4a2f00c48c6c] [PERF] Execution time=0.110328
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> [CSRF] token name=csrf_test_name hash=c9755999c009dce06c191b92dc0090b7
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [METHOD_ENTRY] index
DEBUG - 2026-02-27 12:03:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:03:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:03:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 12:03:54 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [FILTER_AFTER]
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [LIFECYCLE][END] status=200 duration_ms=76.59 memory_delta=2097152
INFO - 2026-02-27 12:03:54 --> [REQ_ID=6739b64eef00] [PERF] Execution time=0.076093
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [REQUEST][END]
INFO - 2026-02-27 12:03:54 --> [REQ_ID=76d80fb30707] [PERF] Execution time=0.089158
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-27 12:03:54 --> [CSRF] token name=csrf_test_name hash=905e279dfe6db50ee4088ec89411ff03
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [METHOD_ENTRY] index
DEBUG - 2026-02-27 12:03:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:03:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:03:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [MEMORY][commonData:start] 4194304
INFO - 2026-02-27 12:03:54 --> themesMemory usage: 4194304
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [FILTER_AFTER]
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [LIFECYCLE][END] status=200 duration_ms=20.89 memory_delta=0
INFO - 2026-02-27 12:03:54 --> [REQ_ID=96d738721a00] [PERF] Execution time=0.020648
DEBUG - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [REQUEST][END]
INFO - 2026-02-27 12:03:54 --> [REQ_ID=6da3022e903a] [PERF] Execution time=0.029577
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=4c3b9bb56583] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:03:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=4c3b9bb56583] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=4c3b9bb56583] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=4c3b9bb56583] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:03:59 --> [CSRF] token name=csrf_test_name hash=2adefc40dc06cb15950e0b956ca7d4cf
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=bb0673bbe39b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:03:59 --> [REQ_ID=bb0673bbe39b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:03:59 --> [REQ_ID=bb0673bbe39b] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:03:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:03:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:03:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:03:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:03:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:03:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:03:59 --> [REQ_ID=bb0673bbe39b] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=bb0673bbe39b] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-02-27 12:04:00 --> [REQ_ID=bb0673bbe39b] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:04:00 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=4c3b9bb56583] [FILTER_AFTER]
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=4c3b9bb56583] [LIFECYCLE][END] status=200 duration_ms=1,087.93 memory_delta=6291456
INFO - 2026-02-27 12:04:00 --> [REQ_ID=bb0673bbe39b] [PERF] Execution time=1.088034
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=4c3b9bb56583] [REQUEST][END]
INFO - 2026-02-27 12:04:00 --> [REQ_ID=4c3b9bb56583] [PERF] Execution time=1.099909
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=9b10aea332d4] [REQUEST][START] GET /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:04:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=9b10aea332d4] [FILTER_BEFORE] /index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=9b10aea332d4] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=9b10aea332d4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-27 12:04:00 --> [CSRF] token name=csrf_test_name hash=3d8235e923b80b7d835ec825669dd44e
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=ece849ac4c46] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:04:00 --> [REQ_ID=ece849ac4c46] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:04:00 --> [REQ_ID=ece849ac4c46] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:04:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:04:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:04:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:04:00 --> [REQ_ID=ece849ac4c46] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:04:01 --> [REQ_ID=ece849ac4c46] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Registering_An_Account
INFO - 2026-02-27 12:04:01 --> [REQ_ID=ece849ac4c46] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 12:04:01 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 12:04:01 --> [REQ_ID=9b10aea332d4] [FILTER_AFTER]
DEBUG - 2026-02-27 12:04:01 --> [REQ_ID=9b10aea332d4] [LIFECYCLE][END] status=200 duration_ms=1,083.78 memory_delta=8388608
INFO - 2026-02-27 12:04:01 --> [REQ_ID=ece849ac4c46] [PERF] Execution time=1.081782
DEBUG - 2026-02-27 12:04:01 --> [REQ_ID=9b10aea332d4] [REQUEST][END]
INFO - 2026-02-27 12:04:01 --> [REQ_ID=9b10aea332d4] [PERF] Execution time=1.127136
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=6efaa5d7aa29] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=53523f3c44cd] [REQUEST][START] GET /index.php/How-It-Works/alerts
DEBUG - 2026-02-27 12:07:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:07:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=53523f3c44cd] [FILTER_BEFORE] /index.php/How-It-Works/alerts
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=53523f3c44cd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=alerts
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=53523f3c44cd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/alerts
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=6efaa5d7aa29] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=6efaa5d7aa29] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=6efaa5d7aa29] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-02-27 12:07:08 --> [CSRF] token name=csrf_test_name hash=485657701167569aa60e5ef33ea0a391
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=897fd27447c7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:07:08 --> [REQ_ID=897fd27447c7] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:07:08 --> [CSRF] token name=csrf_test_name hash=9f90771fc56dd4f108821d5015a96649
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=aa5dadbe3ccd] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:07:08 --> [REQ_ID=aa5dadbe3ccd] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=aa5dadbe3ccd] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=897fd27447c7] [METHOD_ENTRY] alerts
DEBUG - 2026-02-27 12:07:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:07:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:07:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:07:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:07:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:07:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:07:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:08 --> [REQ_ID=aa5dadbe3ccd] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 12:07:08 --> [REQ_ID=aa5dadbe3ccd] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 12:07:08 --> [REQ_ID=897fd27447c7] [PERF] Execution time=0.131272
CRITICAL - 2026-02-27 12:07:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/alerts]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 12:07:08 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 12:07:08 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/alerts
WARNING - 2026-02-27 12:07:08 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/alerts | referrer: none
DEBUG - 2026-02-27 12:07:09 --> [MetaService] slug=how-it-works/investments pageName= cacheHit= path=DB
INFO - 2026-02-27 12:07:09 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:07:09 --> [MetaService] slug=how-it-works/investments pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=6efaa5d7aa29] [FILTER_AFTER]
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=6efaa5d7aa29] [LIFECYCLE][END] status=200 duration_ms=697.29 memory_delta=4194304
INFO - 2026-02-27 12:07:09 --> [REQ_ID=aa5dadbe3ccd] [PERF] Execution time=0.693654
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=6efaa5d7aa29] [REQUEST][END]
INFO - 2026-02-27 12:07:09 --> [REQ_ID=6efaa5d7aa29] [PERF] Execution time=0.758126
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=a4eee4a27a87] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-02-27 12:07:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=a4eee4a27a87] [FILTER_BEFORE] /index.php/How-It-Works/account-settings
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=a4eee4a27a87] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=a4eee4a27a87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/account-settings
DEBUG - 2026-02-27 12:07:09 --> [CSRF] token name=csrf_test_name hash=35dd112a5876fb853da6cf65e05c9713
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=25d292509c04] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:07:09 --> [REQ_ID=25d292509c04] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=25d292509c04] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:07:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:07:09 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:07:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:07:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:07:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:09 --> [REQ_ID=25d292509c04] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 12:07:09 --> [REQ_ID=25d292509c04] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:07:10 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit= path=DB
INFO - 2026-02-27 12:07:10 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 12:07:10 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 12:07:10 --> [REQ_ID=a4eee4a27a87] [FILTER_AFTER]
DEBUG - 2026-02-27 12:07:10 --> [REQ_ID=a4eee4a27a87] [LIFECYCLE][END] status=200 duration_ms=576.70 memory_delta=2097152
INFO - 2026-02-27 12:07:10 --> [REQ_ID=25d292509c04] [PERF] Execution time=0.576393
DEBUG - 2026-02-27 12:07:10 --> [REQ_ID=a4eee4a27a87] [REQUEST][END]
INFO - 2026-02-27 12:07:10 --> [REQ_ID=a4eee4a27a87] [PERF] Execution time=0.585413
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=acb851da806d] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:07:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=acb851da806d] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=acb851da806d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=acb851da806d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:07:15 --> [CSRF] token name=csrf_test_name hash=cd42ee829df2eb24678636b2d0605855
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:07:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:07:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:07:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:07:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:07:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-27 12:07:15 --> [REQ_ID=9f09241f6dca] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:07:16 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:07:16 --> [REQ_ID=acb851da806d] [FILTER_AFTER]
DEBUG - 2026-02-27 12:07:16 --> [REQ_ID=acb851da806d] [LIFECYCLE][END] status=200 duration_ms=1,158.64 memory_delta=8388608
INFO - 2026-02-27 12:07:16 --> [REQ_ID=9f09241f6dca] [PERF] Execution time=1.158406
DEBUG - 2026-02-27 12:07:16 --> [REQ_ID=acb851da806d] [REQUEST][END]
INFO - 2026-02-27 12:07:16 --> [REQ_ID=acb851da806d] [PERF] Execution time=1.285030
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 12:07:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 12:07:19 --> [CSRF] token name=csrf_test_name hash=07e10f5e0e9bf6175110f7fdf10c3902
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=9a07c1007b70] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:07:19 --> [REQ_ID=9a07c1007b70] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=9a07c1007b70] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:07:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:07:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:07:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:07:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:07:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [FILTER_AFTER]
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [LIFECYCLE][END] status=404 duration_ms=24.21 memory_delta=0
INFO - 2026-02-27 12:07:19 --> [REQ_ID=9a07c1007b70] [PERF] Execution time=0.023888
DEBUG - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [REQUEST][END]
INFO - 2026-02-27 12:07:19 --> [REQ_ID=2903cdd617e1] [PERF] Execution time=0.033583
INFO - 2026-02-27 12:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 12:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 12:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 12:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 12:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100323
INFO - 2026-02-27 12:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [REQUEST][END]
INFO - 2026-02-27 12:15:02 --> [REQ_ID=79ad4f00d241] [PERF] Execution time=0.069935
DEBUG - 2026-02-27 12:21:41 --> [REQ_ID=e462df83a980] [REQUEST][START] GET /
DEBUG - 2026-02-27 12:21:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:41 --> [REQ_ID=e462df83a980] [FILTER_BEFORE] /
DEBUG - 2026-02-27 12:21:41 --> [REQ_ID=e462df83a980] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 12:21:41 --> [REQ_ID=e462df83a980] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 12:21:41 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
DEBUG - 2026-02-27 12:21:41 --> [REQ_ID=927c348bb952] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 12:21:41 --> [REQ_ID=927c348bb952] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 12:21:41 --> [REQ_ID=927c348bb952] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:21:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:21:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 12:21:42 --> [REQ_ID=927c348bb952] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 12:21:42 --> [REQ_ID=927c348bb952] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 12:21:42 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:21:42 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 12:21:42 --> [REQ_ID=e462df83a980] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:42 --> [REQ_ID=e462df83a980] [LIFECYCLE][END] status=200 duration_ms=708.55 memory_delta=4194304
INFO - 2026-02-27 12:21:42 --> [REQ_ID=927c348bb952] [PERF] Execution time=0.706513
DEBUG - 2026-02-27 12:21:42 --> [REQ_ID=e462df83a980] [REQUEST][END]
INFO - 2026-02-27 12:21:42 --> [REQ_ID=e462df83a980] [PERF] Execution time=0.748519
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=b1d9f92e5ca8] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=b1d9f92e5ca8] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=b1d9f92e5ca8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=b1d9f92e5ca8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:43 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=623e55ce05cb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:21:43 --> [REQ_ID=623e55ce05cb] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:21:43 --> [REQ_ID=623e55ce05cb] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:21:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:21:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:21:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:21:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:21:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:21:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:21:43 --> [REQ_ID=623e55ce05cb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:21:44 --> [REQ_ID=623e55ce05cb] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 12:21:44 --> [REQ_ID=623e55ce05cb] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:21:44 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 12:21:44 --> [REQ_ID=b1d9f92e5ca8] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:44 --> [REQ_ID=b1d9f92e5ca8] [LIFECYCLE][END] status=200 duration_ms=1,022.03 memory_delta=6291456
INFO - 2026-02-27 12:21:44 --> [REQ_ID=623e55ce05cb] [PERF] Execution time=1.021822
DEBUG - 2026-02-27 12:21:44 --> [REQ_ID=b1d9f92e5ca8] [REQUEST][END]
INFO - 2026-02-27 12:21:44 --> [REQ_ID=b1d9f92e5ca8] [PERF] Execution time=1.034980
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [REQUEST][START] POST /index.php/register
DEBUG - 2026-02-27 12:21:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 12:21:45 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
INFO - 2026-02-27 12:21:45 --> CSRF token verified.
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=e38d669ae016] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-27 12:21:45 --> [REQ_ID=e38d669ae016] [MEMORY][controller-start] 8388608
INFO - 2026-02-27 12:21:45 --> [REGISTRATION] Submission received
INFO - 2026-02-27 12:21:45 --> MailService queued email
ERROR - 2026-02-27 12:21:45 --> Registration failed: {"username":"The username field is not in the correct format."}
INFO - 2026-02-27 12:21:45 --> MailService queued email
WARNING - 2026-02-27 12:21:45 --> [REGISTRATION] Validation failed (basic fields)
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [LIFECYCLE][END] status=302 duration_ms=101.37 memory_delta=0
INFO - 2026-02-27 12:21:45 --> [REQ_ID=e38d669ae016] [PERF] Execution time=0.100827
DEBUG - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [REQUEST][END]
INFO - 2026-02-27 12:21:45 --> [REQ_ID=f826aadef85d] [PERF] Execution time=0.117406
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=03947ea1a7dd] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=03947ea1a7dd] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=03947ea1a7dd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=03947ea1a7dd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:46 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:21:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:21:46 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:21:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:21:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:21:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:21:46 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 12:21:46 --> [REQ_ID=69e336feb292] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:21:47 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:21:47 --> [REQ_ID=03947ea1a7dd] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:47 --> [REQ_ID=03947ea1a7dd] [LIFECYCLE][END] status=200 duration_ms=1,102.53 memory_delta=6291456
INFO - 2026-02-27 12:21:47 --> [REQ_ID=69e336feb292] [PERF] Execution time=1.102273
DEBUG - 2026-02-27 12:21:47 --> [REQ_ID=03947ea1a7dd] [REQUEST][END]
INFO - 2026-02-27 12:21:47 --> [REQ_ID=03947ea1a7dd] [PERF] Execution time=1.113012
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:21:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:21:48 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=8046f2a2f023] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:21:48 --> [REQ_ID=8046f2a2f023] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [LIFECYCLE][END] status=200 duration_ms=21.31 memory_delta=0
INFO - 2026-02-27 12:21:48 --> [REQ_ID=8046f2a2f023] [PERF] Execution time=0.020985
DEBUG - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [REQUEST][END]
INFO - 2026-02-27 12:21:48 --> [REQ_ID=dd3971ee644f] [PERF] Execution time=0.030512
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [REQUEST][START] POST /index.php/login
DEBUG - 2026-02-27 12:21:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:21:49 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
INFO - 2026-02-27 12:21:49 --> CSRF token verified.
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=01c9e9c44218] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-27 12:21:49 --> [REQ_ID=01c9e9c44218] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 12:21:49 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-27 12:21:49 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-27 12:21:49 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 5.142.220.154, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36
DEBUG - 2026-02-27 12:21:49 --> Auth attemptLogin() called with login identifier: kupit-dzhenerik-sialis-40mg.ru, remember: false
DEBUG - 2026-02-27 12:21:49 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 12:21:49 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-02-27 12:21:49 --> [AUTH_FAILURE] 
DEBUG - 2026-02-27 12:21:49 --> Auth attempt failed for identifier kupit-dzhenerik-sialis-40mg.ru. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-02-27 12:21:49 --> [AUTH] Login failure
WARNING - 2026-02-27 12:21:49 --> [AUTH] Login failed
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [LIFECYCLE][END] status=302 duration_ms=45.04 memory_delta=0
INFO - 2026-02-27 12:21:49 --> [REQ_ID=01c9e9c44218] [PERF] Execution time=0.044841
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [REQUEST][END]
INFO - 2026-02-27 12:21:49 --> [REQ_ID=0f5fe45a66ba] [PERF] Execution time=0.053640
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:21:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:21:49 --> [CSRF] token name=csrf_test_name hash=5e9a83175679fe3ccaa03f9fcf478366
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=35a5c7f0d202] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:21:49 --> [REQ_ID=35a5c7f0d202] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [FILTER_AFTER]
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [LIFECYCLE][END] status=200 duration_ms=14.86 memory_delta=0
INFO - 2026-02-27 12:21:49 --> [REQ_ID=35a5c7f0d202] [PERF] Execution time=0.014817
DEBUG - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [REQUEST][END]
INFO - 2026-02-27 12:21:49 --> [REQ_ID=7e19cc44d11b] [PERF] Execution time=0.025151
INFO - 2026-02-27 12:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.203086
INFO - 2026-02-27 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 12:30:38 --> [REQ_ID=6389ece6c242] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 12:30:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=6389ece6c242] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=6389ece6c242] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=6389ece6c242] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 12:30:39 --> [CSRF] token name=csrf_test_name hash=5a77b24b32535d817a2be622f73bbcfd
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:30:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:30:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:30:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:30:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:30:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:30:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 12:30:39 --> [REQ_ID=0650b04a0cc7] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 12:30:40 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 12:30:40 --> [REQ_ID=6389ece6c242] [FILTER_AFTER]
DEBUG - 2026-02-27 12:30:40 --> [REQ_ID=6389ece6c242] [LIFECYCLE][END] status=200 duration_ms=1,284.47 memory_delta=8388608
INFO - 2026-02-27 12:30:40 --> [REQ_ID=0650b04a0cc7] [PERF] Execution time=1.282437
DEBUG - 2026-02-27 12:30:40 --> [REQ_ID=6389ece6c242] [REQUEST][END]
INFO - 2026-02-27 12:30:40 --> [REQ_ID=6389ece6c242] [PERF] Execution time=1.327854
INFO - 2026-02-27 12:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 12:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 12:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 12:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 12:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055042
INFO - 2026-02-27 12:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [REQUEST][START] GET /
DEBUG - 2026-02-27 12:46:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [FILTER_BEFORE] /
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 12:46:40 --> [CSRF] token name=csrf_test_name hash=7ef6e38eddb5e44d656b1bf73c5803fc
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:46:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:46:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 12:46:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 12:46:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [FILTER_AFTER]
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [LIFECYCLE][END] status=200 duration_ms=641.87 memory_delta=4194304
INFO - 2026-02-27 12:46:40 --> [REQ_ID=e5f666ad78e6] [PERF] Execution time=0.639674
DEBUG - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [REQUEST][END]
INFO - 2026-02-27 12:46:40 --> [REQ_ID=59f45e3eca3d] [PERF] Execution time=0.680574
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:51:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:51:59 --> [CSRF] token name=csrf_test_name hash=9899d326f1b4603cbecf9c48f53a2ac7
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=2a1aa2b2d746] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:51:59 --> [REQ_ID=2a1aa2b2d746] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [FILTER_AFTER]
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [LIFECYCLE][END] status=200 duration_ms=71.53 memory_delta=0
INFO - 2026-02-27 12:51:59 --> [REQ_ID=2a1aa2b2d746] [PERF] Execution time=0.068516
DEBUG - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [REQUEST][END]
INFO - 2026-02-27 12:51:59 --> [REQ_ID=ae959e8aa592] [PERF] Execution time=0.112181
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-27 12:52:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-27 12:52:08 --> [CSRF] token name=csrf_test_name hash=cb5a05ffbaf109c8b5deb64e4bd1ae18
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [REQUEST][END]
INFO - 2026-02-27 12:52:08 --> [REQ_ID=e254b87837d6] [PERF] Execution time=0.019753
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:08 --> [CSRF] token name=csrf_test_name hash=82837ead52bdeea1634082cbcd3c0e21
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=80b0272f322b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:08 --> [REQ_ID=80b0272f322b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [LIFECYCLE][END] status=200 duration_ms=108.09 memory_delta=0
INFO - 2026-02-27 12:52:08 --> [REQ_ID=80b0272f322b] [PERF] Execution time=0.107910
DEBUG - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [REQUEST][END]
INFO - 2026-02-27 12:52:08 --> [REQ_ID=4c516b0c1888] [PERF] Execution time=0.117152
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=811a2cc19a0da9e2799d31eb8e72cb4c
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [REQUEST][END]
INFO - 2026-02-27 12:52:09 --> [REQ_ID=abbc70d78f18] [PERF] Execution time=0.015320
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=fcb661ec2350069c6a68a1b6a30a5fe7
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=402723706bdb] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:09 --> [REQ_ID=402723706bdb] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [LIFECYCLE][END] status=200 duration_ms=17.94 memory_delta=0
INFO - 2026-02-27 12:52:09 --> [REQ_ID=402723706bdb] [PERF] Execution time=0.017670
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [REQUEST][END]
INFO - 2026-02-27 12:52:09 --> [REQ_ID=75d63991a34d] [PERF] Execution time=0.032002
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [REQUEST][START] GET /index.php/Exchange/Solana
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [FILTER_BEFORE] /index.php/Exchange/Solana
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=index
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=b3777a2c7ddd79134cd8f0125770e948
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=9bf3f31fcef36996ca4457208d72b958
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=14e19d7b80eaf8b7c6cc97a3d405f48c
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [REQUEST][END]
INFO - 2026-02-27 12:52:09 --> [REQ_ID=5b36f62d77fb] [PERF] Execution time=0.087528
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [REQUEST][END]
INFO - 2026-02-27 12:52:09 --> [REQ_ID=e22e52dcc6ba] [PERF] Execution time=0.148673
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=8dd7471e5b87] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [REQUEST][END]
INFO - 2026-02-27 12:52:09 --> [REQ_ID=51484e8b1e19] [PERF] Execution time=0.149338
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=8dd7471e5b87] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=8dd7471e5b87] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=8dd7471e5b87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:09 --> [CSRF] token name=csrf_test_name hash=e228c1b26902f066e77b629984aa954c
DEBUG - 2026-02-27 12:52:09 --> [REQ_ID=189b806833ef] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:09 --> [REQ_ID=189b806833ef] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=8dd7471e5b87] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=8dd7471e5b87] [LIFECYCLE][END] status=200 duration_ms=35.75 memory_delta=0
INFO - 2026-02-27 12:52:10 --> [REQ_ID=189b806833ef] [PERF] Execution time=0.035476
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=8dd7471e5b87] [REQUEST][END]
INFO - 2026-02-27 12:52:10 --> [REQ_ID=8dd7471e5b87] [PERF] Execution time=0.048267
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:10 --> [CSRF] token name=csrf_test_name hash=f3b86e5ffa8ed8abda379a931b64b83a
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=29d6967f89b2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:10 --> [REQ_ID=29d6967f89b2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:10 --> [CSRF] token name=csrf_test_name hash=aa31c4f4bee4c60202ca1e67a0c8aa41
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=367534b39857] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:10 --> [REQ_ID=367534b39857] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [LIFECYCLE][END] status=200 duration_ms=15.72 memory_delta=0
INFO - 2026-02-27 12:52:10 --> [REQ_ID=29d6967f89b2] [PERF] Execution time=0.015459
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [REQUEST][END]
INFO - 2026-02-27 12:52:10 --> [REQ_ID=9e9848dc88e4] [PERF] Execution time=0.031202
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [LIFECYCLE][END] status=200 duration_ms=31.93 memory_delta=0
INFO - 2026-02-27 12:52:10 --> [REQ_ID=367534b39857] [PERF] Execution time=0.031395
DEBUG - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [REQUEST][END]
INFO - 2026-02-27 12:52:10 --> [REQ_ID=352d76423ece] [PERF] Execution time=0.051459
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=801506f52a76] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [REQUEST][START] GET /index.php/Account/Security
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=74d4aadd04ca4e5959444324a211a504
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=cfc8d3bcc555] [PERF] Execution time=0.021815
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=801506f52a76] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=801506f52a76] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=801506f52a76] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=87d22dc387ec0bdc7eef7574d662bfd2
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [FILTER_BEFORE] /index.php/Account/Security
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=Security
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Security
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=17f282e877970c7478dd61bc91cfa0af
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=d888feaa9644] [PERF] Execution time=0.035382
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=98b1a29f03aa818b471eeb4aa3fb5746
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=b8533ad5c876] [PERF] Execution time=0.044273
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:52:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=206e12f141d0422d483ce9a0e835062b
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=1e1984421851] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:15 --> [REQ_ID=1e1984421851] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=df36182b8e7f2f6c7bf455c67323ec05
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=dd06743f091b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:15 --> [REQ_ID=dd06743f091b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:52:15 --> [CSRF] token name=csrf_test_name hash=9fec5cc70f41416357cda870c583a7f1
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=3a0458252897] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:52:15 --> [REQ_ID=3a0458252897] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [LIFECYCLE][END] status=200 duration_ms=24.28 memory_delta=0
INFO - 2026-02-27 12:52:15 --> [REQ_ID=dd06743f091b] [PERF] Execution time=0.019996
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=0d2a8fd65cb0] [PERF] Execution time=0.042558
DEBUG - 2026-02-27 12:52:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:52:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [LIFECYCLE][END] status=200 duration_ms=29.97 memory_delta=0
INFO - 2026-02-27 12:52:15 --> [REQ_ID=3a0458252897] [PERF] Execution time=0.029286
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=e353264f04ae] [PERF] Execution time=0.047681
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [LIFECYCLE][END] status=200 duration_ms=64.26 memory_delta=0
INFO - 2026-02-27 12:52:15 --> [REQ_ID=1e1984421851] [PERF] Execution time=0.061364
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [REQUEST][END]
INFO - 2026-02-27 12:52:15 --> [REQ_ID=de6cb353c54e] [PERF] Execution time=0.095977
DEBUG - 2026-02-27 12:52:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:52:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:52:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-02-27 12:52:15 --> [REQ_ID=841f22c0fb54] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=0066e480dc47] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=0066e480dc47] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=0066e480dc47] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=0066e480dc47] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-27 12:52:16 --> [CSRF] token name=csrf_test_name hash=d0c47e4ded08a557dac943c46c5fc9ee
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:52:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:52:16 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:52:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:52:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:52:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:52:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 12:52:16 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=801506f52a76] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=801506f52a76] [LIFECYCLE][END] status=200 duration_ms=1,267.98 memory_delta=8388608
INFO - 2026-02-27 12:52:16 --> [REQ_ID=841f22c0fb54] [PERF] Execution time=1.264253
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=801506f52a76] [REQUEST][END]
INFO - 2026-02-27 12:52:16 --> [REQ_ID=801506f52a76] [PERF] Execution time=1.297328
DEBUG - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-02-27 12:52:16 --> [REQ_ID=04c202f45151] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:52:17 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 12:52:17 --> [REQ_ID=0066e480dc47] [FILTER_AFTER]
DEBUG - 2026-02-27 12:52:17 --> [REQ_ID=0066e480dc47] [LIFECYCLE][END] status=200 duration_ms=1,071.84 memory_delta=8388608
INFO - 2026-02-27 12:52:17 --> [REQ_ID=04c202f45151] [PERF] Execution time=1.071614
DEBUG - 2026-02-27 12:52:17 --> [REQ_ID=0066e480dc47] [REQUEST][END]
INFO - 2026-02-27 12:52:17 --> [REQ_ID=0066e480dc47] [PERF] Execution time=1.083754
DEBUG - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [REQUEST][START] GET /index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-02-27 12:53:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [FILTER_BEFORE] /index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [ROUTE] Controller=\App\Modules\Exchange\Controllers\SolanaController Method=importWallet
DEBUG - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange/Solana/Import/Wallet
DEBUG - 2026-02-27 12:53:26 --> [CSRF] token name=csrf_test_name hash=895a54b8e23307f6478ee172b147fa67
DEBUG - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [REQUEST][END]
INFO - 2026-02-27 12:53:26 --> [REQ_ID=da1ba1f500e1] [PERF] Execution time=0.011304
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 12:53:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 12:53:27 --> [CSRF] token name=csrf_test_name hash=1d6271d5b108e2d8274d81915977c783
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=140b93976774] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 12:53:27 --> [REQ_ID=140b93976774] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [FILTER_AFTER]
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [LIFECYCLE][END] status=200 duration_ms=138.61 memory_delta=0
INFO - 2026-02-27 12:53:27 --> [REQ_ID=140b93976774] [PERF] Execution time=0.137679
DEBUG - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [REQUEST][END]
INFO - 2026-02-27 12:53:27 --> [REQ_ID=7aa3d4c222db] [PERF] Execution time=0.147712
INFO - 2026-02-27 12:53:57 --> [SPARK_START] App\Commands\AIOps\AutoRun
INFO - 2026-02-27 12:53:57 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:53:57 --> [spark:aiops:auto:run] Intent
INFO - 2026-02-27 12:53:58 --> [SPARK_COMPLETE] App\Commands\AIOps\AutoRun duration=1.256244
INFO - 2026-02-27 12:53:58 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=703d653a8156] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:55:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=703d653a8156] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=703d653a8156] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=703d653a8156] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 12:55:38 --> [CSRF] token name=csrf_test_name hash=58427b41d073f53c827f45813c72bdc3
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=9e781aff579f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 12:55:38 --> [REQ_ID=9e781aff579f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 12:55:38 --> [REQ_ID=9e781aff579f] [METHOD_ENTRY] show
DEBUG - 2026-02-27 12:55:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:55:39 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:55:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:55:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:55:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:55:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:55:39 --> [REQ_ID=9e781aff579f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 12:55:39 --> [REQ_ID=9e781aff579f] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-27 12:55:39 --> [REQ_ID=9e781aff579f] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 12:55:40 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 12:55:40 --> [REQ_ID=703d653a8156] [FILTER_AFTER]
DEBUG - 2026-02-27 12:55:40 --> [REQ_ID=703d653a8156] [LIFECYCLE][END] status=200 duration_ms=1,109.68 memory_delta=8388608
INFO - 2026-02-27 12:55:40 --> [REQ_ID=9e781aff579f] [PERF] Execution time=1.107673
DEBUG - 2026-02-27 12:55:40 --> [REQ_ID=703d653a8156] [REQUEST][END]
INFO - 2026-02-27 12:55:40 --> [REQ_ID=703d653a8156] [PERF] Execution time=1.151499
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-02-27 12:55:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-02-27 12:55:49 --> [CSRF] token name=csrf_test_name hash=7fbdfef326fdad39fcd4015d8fd7b20d
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [METHOD_ENTRY] index
DEBUG - 2026-02-27 12:55:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 12:55:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 12:55:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 12:55:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 12:55:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 12:55:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 12:55:49 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [FILTER_AFTER]
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [LIFECYCLE][END] status=200 duration_ms=87.19 memory_delta=0
INFO - 2026-02-27 12:55:49 --> [REQ_ID=7fb88dda8683] [PERF] Execution time=0.086906
DEBUG - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [REQUEST][END]
INFO - 2026-02-27 12:55:49 --> [REQ_ID=54011f482161] [PERF] Execution time=0.097114
INFO - 2026-02-27 12:59:03 --> [SPARK_START] App\Commands\AIOps\AutoRun
INFO - 2026-02-27 12:59:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 12:59:03 --> [spark:aiops:auto:run] Intent
DEBUG - 2026-02-27 12:59:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 12:59:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 12:59:04 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 12:59:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 12:59:04 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 12:59:04 --> [SPARK_COMPLETE] App\Commands\AIOps\AutoRun duration=1.184540
INFO - 2026-02-27 12:59:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 13:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 13:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 13:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 13:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.159065
INFO - 2026-02-27 13:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [REQUEST][END]
INFO - 2026-02-27 13:00:01 --> [REQ_ID=d8ab6ddddb8b] [PERF] Execution time=0.074060
INFO - 2026-02-27 13:01:00 --> [SPARK_START] App\Commands\AIOps\AutoRun
INFO - 2026-02-27 13:01:00 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:01:00 --> [spark:aiops:auto:run] Intent
DEBUG - 2026-02-27 13:01:01 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 13:01:01 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 13:01:02 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 13:01:02 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 13:01:02 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 13:01:02 --> [SPARK_COMPLETE] App\Commands\AIOps\AutoRun duration=1.408737
INFO - 2026-02-27 13:01:02 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-02-27 13:05:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-02-27 13:05:48 --> [CSRF] token name=csrf_test_name hash=4da2082a6f9deb4a711215480fc20abd
DEBUG - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [REQUEST][END]
INFO - 2026-02-27 13:05:48 --> [REQ_ID=7216a7898426] [PERF] Execution time=0.054619
DEBUG - 2026-02-27 13:05:51 --> [REQ_ID=e5daf42bf5c4] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-02-27 13:05:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 13:05:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 13:05:51 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 13:05:51 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-02-27 13:05:51 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
DEBUG - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-02-27 13:05:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-02-27 13:05:54 --> [CSRF] token name=csrf_test_name hash=1e2cd9199a917c502f95a2470364759b
DEBUG - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [REQUEST][END]
INFO - 2026-02-27 13:05:54 --> [REQ_ID=2bb8109c5187] [PERF] Execution time=0.014855
INFO - 2026-02-27 13:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 13:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 13:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 13:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 13:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.044224
INFO - 2026-02-27 13:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 13:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [REQUEST][END]
INFO - 2026-02-27 13:15:01 --> [REQ_ID=e38c185e976a] [PERF] Execution time=0.062762
DEBUG - 2026-02-27 13:23:48 --> [REQ_ID=fb6d8b7eae76] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 13:23:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:23:48 --> [REQ_ID=fb6d8b7eae76] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 13:23:48 --> [REQ_ID=fb6d8b7eae76] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 13:23:48 --> [REQ_ID=fb6d8b7eae76] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 13:23:48 --> [CSRF] token name=csrf_test_name hash=28a3e12f12f8ba4e9c6a8f28ba2a2c3c
DEBUG - 2026-02-27 13:23:48 --> [REQ_ID=65529e3882f7] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 13:23:48 --> [REQ_ID=65529e3882f7] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 13:23:49 --> [REQ_ID=65529e3882f7] [METHOD_ENTRY] show
DEBUG - 2026-02-27 13:23:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 13:23:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 13:23:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 13:23:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 13:23:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 13:23:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 13:23:49 --> [REQ_ID=65529e3882f7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 13:23:49 --> [REQ_ID=65529e3882f7] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 13:23:49 --> [REQ_ID=65529e3882f7] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 13:23:50 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 13:23:50 --> [REQ_ID=fb6d8b7eae76] [FILTER_AFTER]
DEBUG - 2026-02-27 13:23:50 --> [REQ_ID=fb6d8b7eae76] [LIFECYCLE][END] status=200 duration_ms=1,592.60 memory_delta=8388608
INFO - 2026-02-27 13:23:50 --> [REQ_ID=65529e3882f7] [PERF] Execution time=1.590603
DEBUG - 2026-02-27 13:23:50 --> [REQ_ID=fb6d8b7eae76] [REQUEST][END]
INFO - 2026-02-27 13:23:50 --> [REQ_ID=fb6d8b7eae76] [PERF] Execution time=1.634283
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=8700b8d9cfa5] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 13:23:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=8700b8d9cfa5] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=8700b8d9cfa5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=8700b8d9cfa5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-27 13:23:59 --> [CSRF] token name=csrf_test_name hash=b937ed75d77725ca069829e9931b94d2
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=3d439bda4813] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 13:23:59 --> [REQ_ID=3d439bda4813] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 13:23:59 --> [REQ_ID=3d439bda4813] [METHOD_ENTRY] show
DEBUG - 2026-02-27 13:23:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 13:23:59 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 13:23:59 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 13:23:59 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 13:23:59 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 13:23:59 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 13:23:59 --> [REQ_ID=3d439bda4813] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 13:24:00 --> [REQ_ID=3d439bda4813] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-27 13:24:00 --> [REQ_ID=3d439bda4813] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 13:24:00 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 13:24:00 --> [REQ_ID=8700b8d9cfa5] [FILTER_AFTER]
DEBUG - 2026-02-27 13:24:00 --> [REQ_ID=8700b8d9cfa5] [LIFECYCLE][END] status=200 duration_ms=1,048.69 memory_delta=4194304
INFO - 2026-02-27 13:24:00 --> [REQ_ID=3d439bda4813] [PERF] Execution time=1.048358
DEBUG - 2026-02-27 13:24:00 --> [REQ_ID=8700b8d9cfa5] [REQUEST][END]
INFO - 2026-02-27 13:24:00 --> [REQ_ID=8700b8d9cfa5] [PERF] Execution time=1.058355
INFO - 2026-02-27 13:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 13:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 13:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 13:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 13:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.102016
INFO - 2026-02-27 13:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [REQUEST][START] GET /
DEBUG - 2026-02-27 13:30:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [FILTER_BEFORE] /
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 13:30:03 --> [CSRF] token name=csrf_test_name hash=de750b26e8891dd4a2f29ed84fe2cb4c
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 13:30:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 13:30:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 13:30:03 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 13:30:03 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [FILTER_AFTER]
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [LIFECYCLE][END] status=200 duration_ms=592.70 memory_delta=4194304
INFO - 2026-02-27 13:30:03 --> [REQ_ID=efdda3836880] [PERF] Execution time=0.589288
DEBUG - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [REQUEST][END]
INFO - 2026-02-27 13:30:03 --> [REQ_ID=816276c6-21a5-44a9-afb9-7ae4b2b3fb88] [PERF] Execution time=0.642976
INFO - 2026-02-27 13:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 13:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 13:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 13:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 13:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 13:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028168
INFO - 2026-02-27 13:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 14:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 14:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 14:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 14:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 14:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.059939
INFO - 2026-02-27 14:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [REQUEST][END]
INFO - 2026-02-27 14:00:02 --> [REQ_ID=0df92d0798ba] [PERF] Execution time=0.126989
INFO - 2026-02-27 14:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 14:00:04 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 14:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:00:04 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 14:00:04 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 14:00:04 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.028702
INFO - 2026-02-27 14:00:04 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 14:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 14:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 14:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 14:00:04 --> LOG_HEALTHCHECK debug marker=3e96b8522610
INFO - 2026-02-27 14:00:04 --> LOG_HEALTHCHECK info marker=3e96b8522610
NOTICE - 2026-02-27 14:00:04 --> LOG_HEALTHCHECK probe marker=3e96b8522610
INFO - 2026-02-27 14:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 14:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.030593
INFO - 2026-02-27 14:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 14:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.416458
INFO - 2026-02-27 14:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 14:05:28 --> [REQ_ID=748832d22ed6] [REQUEST][START] GET /
DEBUG - 2026-02-27 14:05:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [FILTER_BEFORE] /
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 14:05:29 --> [CSRF] token name=csrf_test_name hash=e0922ec318d5ae138f934be6755061a3
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 14:05:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 14:05:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 14:05:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 14:05:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [FILTER_AFTER]
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [LIFECYCLE][END] status=200 duration_ms=615.08 memory_delta=4194304
INFO - 2026-02-27 14:05:29 --> [REQ_ID=29c8ce02adb6] [PERF] Execution time=0.613118
DEBUG - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [REQUEST][END]
INFO - 2026-02-27 14:05:29 --> [REQ_ID=748832d22ed6] [PERF] Execution time=0.653676
INFO - 2026-02-27 14:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 14:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 14:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 14:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 14:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050429
INFO - 2026-02-27 14:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [REQUEST][END]
INFO - 2026-02-27 14:15:01 --> [REQ_ID=c068b081e3c5] [PERF] Execution time=0.061055
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [REQUEST][START] GET /
DEBUG - 2026-02-27 14:16:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [FILTER_BEFORE] /
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 14:16:02 --> [CSRF] token name=csrf_test_name hash=52db995b10b45218ef5fc922037f41d5
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 14:16:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 14:16:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 14:16:02 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 14:16:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [FILTER_AFTER]
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [LIFECYCLE][END] status=200 duration_ms=614.22 memory_delta=4194304
INFO - 2026-02-27 14:16:02 --> [REQ_ID=3f48bf797246] [PERF] Execution time=0.612360
DEBUG - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [REQUEST][END]
INFO - 2026-02-27 14:16:02 --> [REQ_ID=d212c5c2-ca9f-45f5-9165-badbf36e542a] [PERF] Execution time=0.627691
DEBUG - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-02-27 14:26:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-02-27 14:26:34 --> [CSRF] token name=csrf_test_name hash=5dedaba8afda7b13f804f2c2ec1e75d2
DEBUG - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [REQUEST][END]
INFO - 2026-02-27 14:26:34 --> [REQ_ID=5e6a8ee09ceb] [PERF] Execution time=0.053995
DEBUG - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-02-27 14:26:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-02-27 14:26:38 --> [CSRF] token name=csrf_test_name hash=52d07ebb131743c472dc5383d532f040
DEBUG - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [REQUEST][END]
INFO - 2026-02-27 14:26:38 --> [REQ_ID=9fb33b866c90] [PERF] Execution time=0.011050
INFO - 2026-02-27 14:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 14:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 14:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 14:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 14:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.049228
INFO - 2026-02-27 14:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 14:35:40 --> [REQ_ID=498e9a5080c3] [REQUEST][START] GET /
DEBUG - 2026-02-27 14:35:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:35:40 --> [REQ_ID=498e9a5080c3] [FILTER_BEFORE] /
DEBUG - 2026-02-27 14:35:40 --> [REQ_ID=498e9a5080c3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 14:35:40 --> [REQ_ID=498e9a5080c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 14:35:40 --> [CSRF] token name=csrf_test_name hash=eed35797ffbde1a6be01d5d7dc1b197f
DEBUG - 2026-02-27 14:35:40 --> [REQ_ID=32de1ddfbf1a] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 14:35:40 --> [REQ_ID=32de1ddfbf1a] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 14:35:40 --> [REQ_ID=32de1ddfbf1a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 14:35:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 14:35:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 14:35:41 --> [REQ_ID=32de1ddfbf1a] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 14:35:41 --> [REQ_ID=32de1ddfbf1a] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 14:35:41 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 14:35:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 14:35:41 --> [REQ_ID=498e9a5080c3] [FILTER_AFTER]
DEBUG - 2026-02-27 14:35:41 --> [REQ_ID=498e9a5080c3] [LIFECYCLE][END] status=200 duration_ms=859.17 memory_delta=4194304
INFO - 2026-02-27 14:35:41 --> [REQ_ID=32de1ddfbf1a] [PERF] Execution time=0.856772
DEBUG - 2026-02-27 14:35:41 --> [REQ_ID=498e9a5080c3] [REQUEST][END]
INFO - 2026-02-27 14:35:41 --> [REQ_ID=498e9a5080c3] [PERF] Execution time=0.896610
DEBUG - 2026-02-27 14:43:13 --> [REQ_ID=1cabeeab13e2] [REQUEST][START] GET /
DEBUG - 2026-02-27 14:43:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:43:13 --> [REQ_ID=1cabeeab13e2] [FILTER_BEFORE] /
DEBUG - 2026-02-27 14:43:13 --> [REQ_ID=1cabeeab13e2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 14:43:13 --> [REQ_ID=1cabeeab13e2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 14:43:13 --> [CSRF] token name=csrf_test_name hash=8c36766ec2ff7604aed53162def03097
DEBUG - 2026-02-27 14:43:13 --> [REQ_ID=ee2255415d45] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 14:43:13 --> [REQ_ID=ee2255415d45] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 14:43:13 --> [REQ_ID=ee2255415d45] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 14:43:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 14:43:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 14:43:14 --> [REQ_ID=ee2255415d45] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 14:43:14 --> [REQ_ID=ee2255415d45] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 14:43:14 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 14:43:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 14:43:14 --> [REQ_ID=1cabeeab13e2] [FILTER_AFTER]
DEBUG - 2026-02-27 14:43:14 --> [REQ_ID=1cabeeab13e2] [LIFECYCLE][END] status=200 duration_ms=878.96 memory_delta=4194304
INFO - 2026-02-27 14:43:14 --> [REQ_ID=ee2255415d45] [PERF] Execution time=0.877071
DEBUG - 2026-02-27 14:43:14 --> [REQ_ID=1cabeeab13e2] [REQUEST][END]
INFO - 2026-02-27 14:43:14 --> [REQ_ID=1cabeeab13e2] [PERF] Execution time=0.918598
INFO - 2026-02-27 14:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 14:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 14:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 14:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 14:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 14:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037947
INFO - 2026-02-27 14:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=c2c2e419d531] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 14:56:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=c2c2e419d531] [FILTER_BEFORE] /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=c2c2e419d531] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=c2c2e419d531] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-27 14:56:23 --> [CSRF] token name=csrf_test_name hash=c8c60c0d7670b971217867133e76c77b
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=f98bd4861ee6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 14:56:23 --> [REQ_ID=f98bd4861ee6] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 14:56:23 --> [REQ_ID=f98bd4861ee6] [METHOD_ENTRY] show
DEBUG - 2026-02-27 14:56:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 14:56:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 14:56:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 14:56:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 14:56:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 14:56:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 14:56:24 --> [REQ_ID=c2c2e419d531] [FILTER_AFTER]
DEBUG - 2026-02-27 14:56:24 --> [REQ_ID=c2c2e419d531] [LIFECYCLE][END] status=404 duration_ms=218.57 memory_delta=0
INFO - 2026-02-27 14:56:24 --> [REQ_ID=f98bd4861ee6] [PERF] Execution time=0.216005
DEBUG - 2026-02-27 14:56:24 --> [REQ_ID=c2c2e419d531] [REQUEST][END]
INFO - 2026-02-27 14:56:24 --> [REQ_ID=c2c2e419d531] [PERF] Execution time=0.260806
INFO - 2026-02-27 15:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 15:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 15:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 15:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 15:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 15:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027263
INFO - 2026-02-27 15:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 15:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [REQUEST][END]
INFO - 2026-02-27 15:00:02 --> [REQ_ID=63e16ed56a9b] [PERF] Execution time=0.049361
INFO - 2026-02-27 15:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 15:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 15:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 15:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 15:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 15:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.063710
INFO - 2026-02-27 15:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [REQUEST][END]
INFO - 2026-02-27 15:15:01 --> [REQ_ID=94bc7c2a8e09] [PERF] Execution time=0.068835
DEBUG - 2026-02-27 15:23:24 --> [REQ_ID=c87066a3afce] [REQUEST][START] GET /
DEBUG - 2026-02-27 15:23:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:23:24 --> [REQ_ID=c87066a3afce] [FILTER_BEFORE] /
DEBUG - 2026-02-27 15:23:24 --> [REQ_ID=c87066a3afce] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:23:24 --> [REQ_ID=c87066a3afce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:23:24 --> [CSRF] token name=csrf_test_name hash=875bd83d3d904ee9ff948e28de249e5e
DEBUG - 2026-02-27 15:23:24 --> [REQ_ID=f88311ad8189] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:23:24 --> [REQ_ID=f88311ad8189] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 15:23:24 --> [REQ_ID=f88311ad8189] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:23:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:23:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 15:23:25 --> [REQ_ID=f88311ad8189] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:23:25 --> [REQ_ID=f88311ad8189] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 15:23:25 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 15:23:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:23:25 --> [REQ_ID=c87066a3afce] [FILTER_AFTER]
DEBUG - 2026-02-27 15:23:25 --> [REQ_ID=c87066a3afce] [LIFECYCLE][END] status=200 duration_ms=731.70 memory_delta=4194304
INFO - 2026-02-27 15:23:25 --> [REQ_ID=f88311ad8189] [PERF] Execution time=0.729562
DEBUG - 2026-02-27 15:23:25 --> [REQ_ID=c87066a3afce] [REQUEST][END]
INFO - 2026-02-27 15:23:25 --> [REQ_ID=c87066a3afce] [PERF] Execution time=0.770022
INFO - 2026-02-27 15:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 15:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 15:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 15:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 15:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 15:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020070
INFO - 2026-02-27 15:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-02-27 15:34:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-02-27 15:34:25 --> [CSRF] token name=csrf_test_name hash=e154c65e4662eb236d928e0909810510
DEBUG - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [REQUEST][END]
INFO - 2026-02-27 15:34:25 --> [REQ_ID=4b1d0d2da660] [PERF] Execution time=0.049976
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:34:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:34:26 --> [CSRF] token name=csrf_test_name hash=f0a36639593f8878c8d1f3bf292d0fc9
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=f62f940c0c44] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:34:26 --> [REQ_ID=f62f940c0c44] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [FILTER_AFTER]
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [LIFECYCLE][END] status=200 duration_ms=117.56 memory_delta=0
INFO - 2026-02-27 15:34:26 --> [REQ_ID=f62f940c0c44] [PERF] Execution time=0.116042
DEBUG - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [REQUEST][END]
INFO - 2026-02-27 15:34:26 --> [REQ_ID=86465bd1142a] [PERF] Execution time=0.132926
INFO - 2026-02-27 15:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 15:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 15:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 15:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 15:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 15:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040296
INFO - 2026-02-27 15:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 15:49:36 --> [REQ_ID=4edaaadcaaef] [REQUEST][START] GET /
DEBUG - 2026-02-27 15:49:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:49:36 --> [REQ_ID=4edaaadcaaef] [FILTER_BEFORE] /
DEBUG - 2026-02-27 15:49:36 --> [REQ_ID=4edaaadcaaef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:49:36 --> [REQ_ID=4edaaadcaaef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:49:36 --> [CSRF] token name=csrf_test_name hash=862d9212d6246ce17776e76e63afc009
DEBUG - 2026-02-27 15:49:36 --> [REQ_ID=7e13fe1c9717] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:49:36 --> [REQ_ID=7e13fe1c9717] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 15:49:36 --> [REQ_ID=7e13fe1c9717] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:49:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:49:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 15:49:37 --> [REQ_ID=7e13fe1c9717] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:49:37 --> [REQ_ID=7e13fe1c9717] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 15:49:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 15:49:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 15:49:37 --> [REQ_ID=4edaaadcaaef] [FILTER_AFTER]
DEBUG - 2026-02-27 15:49:37 --> [REQ_ID=4edaaadcaaef] [LIFECYCLE][END] status=200 duration_ms=734.58 memory_delta=4194304
INFO - 2026-02-27 15:49:37 --> [REQ_ID=7e13fe1c9717] [PERF] Execution time=0.732674
DEBUG - 2026-02-27 15:49:37 --> [REQ_ID=4edaaadcaaef] [REQUEST][END]
INFO - 2026-02-27 15:49:37 --> [REQ_ID=4edaaadcaaef] [PERF] Execution time=0.772981
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [REQUEST][START] GET /index.php
DEBUG - 2026-02-27 15:50:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:50:08 --> [CSRF] token name=csrf_test_name hash=f9ea76c74e5b17443e091808949fbed3
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:50:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:50:08 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:50:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [FILTER_AFTER]
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [LIFECYCLE][END] status=200 duration_ms=524.90 memory_delta=2097152
INFO - 2026-02-27 15:50:08 --> [REQ_ID=1e0a7197854c] [PERF] Execution time=0.524270
DEBUG - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [REQUEST][END]
INFO - 2026-02-27 15:50:08 --> [REQ_ID=b2bdfeed7427] [PERF] Execution time=0.549360
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [REQUEST][START] GET /index.php
DEBUG - 2026-02-27 15:50:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:50:12 --> [CSRF] token name=csrf_test_name hash=8325269a8df759102838031d17b5d6a5
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:50:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:50:12 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:50:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [FILTER_AFTER]
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [LIFECYCLE][END] status=200 duration_ms=526.34 memory_delta=2097152
INFO - 2026-02-27 15:50:12 --> [REQ_ID=fd0a412c7a92] [PERF] Execution time=0.525811
DEBUG - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [REQUEST][END]
INFO - 2026-02-27 15:50:12 --> [REQ_ID=26c1a5a21f9f] [PERF] Execution time=0.537262
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-02-27 15:50:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-02-27 15:50:22 --> [CSRF] token name=csrf_test_name hash=6ea0dfe02f87a2217b1844b35f5ac686
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:50:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:50:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:50:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:50:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:50:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:50:22 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-27 15:50:22 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:50:22 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [FILTER_AFTER]
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [LIFECYCLE][END] status=200 duration_ms=611.86 memory_delta=2097152
INFO - 2026-02-27 15:50:22 --> [REQ_ID=dd754dd116c9] [PERF] Execution time=0.611432
DEBUG - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [REQUEST][END]
INFO - 2026-02-27 15:50:22 --> [REQ_ID=a7f191c6c3af] [PERF] Execution time=0.626272
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=af2fe62a0047] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=af2fe62a0047] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=af2fe62a0047] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=af2fe62a0047] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:50:26 --> [CSRF] token name=csrf_test_name hash=7bd0ef4fe7678db91eb8edbbd59455da
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=ab36f3f5eac3] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:50:26 --> [REQ_ID=ab36f3f5eac3] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:50:26 --> [REQ_ID=ab36f3f5eac3] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:50:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:50:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:50:26 --> [REQ_ID=ab36f3f5eac3] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 15:50:26 --> [REQ_ID=ab36f3f5eac3] [PERF] Execution time=0.015664
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=97e629f1ad54] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:50:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=97e629f1ad54] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=97e629f1ad54] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=97e629f1ad54] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:50:32 --> [CSRF] token name=csrf_test_name hash=eb4a39545f3495f04a5d2254570425cf
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=f18c84790b71] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:50:32 --> [REQ_ID=f18c84790b71] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:50:32 --> [REQ_ID=f18c84790b71] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:50:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:50:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:50:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:50:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:50:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:50:32 --> [REQ_ID=f18c84790b71] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 15:50:32 --> [REQ_ID=f18c84790b71] [PERF] Execution time=0.015898
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=106d16702f0f] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:50:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=106d16702f0f] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=106d16702f0f] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=106d16702f0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:50:44 --> [CSRF] token name=csrf_test_name hash=3adcb02e1e89a9d6a005c2052d378199
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=8bcc57f79617] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:50:44 --> [REQ_ID=8bcc57f79617] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:50:44 --> [REQ_ID=8bcc57f79617] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:50:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:50:44 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:50:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:50:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:50:44 --> [REQ_ID=8bcc57f79617] [MEMORY][commonData:start] 4194304
INFO - 2026-02-27 15:50:44 --> [REQ_ID=8bcc57f79617] [PERF] Execution time=0.083958
DEBUG - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-02-27 15:50:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-02-27 15:50:50 --> [CSRF] token name=csrf_test_name hash=e23b80beb7b259febd435318ea925684
DEBUG - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [REQUEST][END]
INFO - 2026-02-27 15:50:50 --> [REQ_ID=4c167705ff1f] [PERF] Execution time=0.014051
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:50:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:50:51 --> [CSRF] token name=csrf_test_name hash=83d8752afac26cdf79a4237796be4ad0
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=7adf87d863a3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:50:51 --> [REQ_ID=7adf87d863a3] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [FILTER_AFTER]
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [LIFECYCLE][END] status=200 duration_ms=36.18 memory_delta=0
INFO - 2026-02-27 15:50:51 --> [REQ_ID=7adf87d863a3] [PERF] Execution time=0.034992
DEBUG - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [REQUEST][END]
INFO - 2026-02-27 15:50:51 --> [REQ_ID=f0f09af219b3] [PERF] Execution time=0.048107
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:50:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:50:56 --> [CSRF] token name=csrf_test_name hash=3c0bfb9583b35d9e954b257adfba38f4
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=3f6f6bb994fe] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:50:56 --> [REQ_ID=3f6f6bb994fe] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [FILTER_AFTER]
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [LIFECYCLE][END] status=200 duration_ms=27.58 memory_delta=0
INFO - 2026-02-27 15:50:56 --> [REQ_ID=3f6f6bb994fe] [PERF] Execution time=0.027082
DEBUG - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [REQUEST][END]
INFO - 2026-02-27 15:50:56 --> [REQ_ID=d010eb12d947] [PERF] Execution time=0.036987
DEBUG - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-27 15:51:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-27 15:51:04 --> [CSRF] token name=csrf_test_name hash=3c19f40f5ea0740294ca4b778adcaf64
DEBUG - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [REQUEST][END]
INFO - 2026-02-27 15:51:04 --> [REQ_ID=389a0e42f086] [PERF] Execution time=0.010379
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:51:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:51:05 --> [CSRF] token name=csrf_test_name hash=d413564c083ed8eab31616be9a86c550
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=4a9175c0f315] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:51:05 --> [REQ_ID=4a9175c0f315] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [LIFECYCLE][END] status=200 duration_ms=21.43 memory_delta=0
INFO - 2026-02-27 15:51:05 --> [REQ_ID=4a9175c0f315] [PERF] Execution time=0.020331
DEBUG - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [REQUEST][END]
INFO - 2026-02-27 15:51:05 --> [REQ_ID=d3978f492392] [PERF] Execution time=0.030510
DEBUG - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-27 15:51:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-27 15:51:40 --> [CSRF] token name=csrf_test_name hash=747d9736d54e9045f977797f9c4fff3a
DEBUG - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [REQUEST][END]
INFO - 2026-02-27 15:51:40 --> [REQ_ID=370f8b5374ea] [PERF] Execution time=0.015583
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:51:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:51:41 --> [CSRF] token name=csrf_test_name hash=295b5c7270eb749a85748d797596a5f4
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=7c18caa71c27] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:51:41 --> [REQ_ID=7c18caa71c27] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [LIFECYCLE][END] status=200 duration_ms=17.26 memory_delta=0
INFO - 2026-02-27 15:51:41 --> [REQ_ID=7c18caa71c27] [PERF] Execution time=0.015863
DEBUG - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [REQUEST][END]
INFO - 2026-02-27 15:51:41 --> [REQ_ID=5bfd47159309] [PERF] Execution time=0.026483
DEBUG - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-02-27 15:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-02-27 15:51:44 --> [CSRF] token name=csrf_test_name hash=a620b4225bde686f128c404cd5af0d4d
DEBUG - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [REQUEST][END]
INFO - 2026-02-27 15:51:44 --> [REQ_ID=39e147331ea0] [PERF] Execution time=0.010675
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:51:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:51:45 --> [CSRF] token name=csrf_test_name hash=46ee43a1542032615b8ab83f4f8df89a
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=9b7926310412] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:51:45 --> [REQ_ID=9b7926310412] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [LIFECYCLE][END] status=200 duration_ms=163.36 memory_delta=0
INFO - 2026-02-27 15:51:45 --> [REQ_ID=9b7926310412] [PERF] Execution time=0.162482
DEBUG - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [REQUEST][END]
INFO - 2026-02-27 15:51:45 --> [REQ_ID=b33d9fe1f561] [PERF] Execution time=0.172698
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=241284bb20ad] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:51:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=241284bb20ad] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=241284bb20ad] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=241284bb20ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:51:49 --> [CSRF] token name=csrf_test_name hash=b1e954e4486660c20a1b0596aadc5331
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=7aab1024ceb5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:51:49 --> [REQ_ID=7aab1024ceb5] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:51:49 --> [REQ_ID=7aab1024ceb5] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:51:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:51:49 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:51:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:51:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:51:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:51:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:51:49 --> [REQ_ID=7aab1024ceb5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 15:51:50 --> [REQ_ID=7aab1024ceb5] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 15:51:50 --> [REQ_ID=7aab1024ceb5] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:51:50 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 15:51:50 --> [REQ_ID=241284bb20ad] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:50 --> [REQ_ID=241284bb20ad] [LIFECYCLE][END] status=200 duration_ms=1,043.18 memory_delta=6291456
INFO - 2026-02-27 15:51:50 --> [REQ_ID=7aab1024ceb5] [PERF] Execution time=1.042711
DEBUG - 2026-02-27 15:51:50 --> [REQ_ID=241284bb20ad] [REQUEST][END]
INFO - 2026-02-27 15:51:50 --> [REQ_ID=241284bb20ad] [PERF] Execution time=1.052847
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:54 --> [CSRF] token name=csrf_test_name hash=4a350fcafa2c01416e18c63c01383dbf
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=dba2ba1ad1c5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:51:54 --> [REQ_ID=dba2ba1ad1c5] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=dba2ba1ad1c5] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:51:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:51:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:51:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:51:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:51:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:51:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [LIFECYCLE][END] status=404 duration_ms=15.19 memory_delta=0
INFO - 2026-02-27 15:51:54 --> [REQ_ID=dba2ba1ad1c5] [PERF] Execution time=0.014660
DEBUG - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [REQUEST][END]
INFO - 2026-02-27 15:51:54 --> [REQ_ID=3b1152c3b42b] [PERF] Execution time=0.024459
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:51:58 --> [CSRF] token name=csrf_test_name hash=d11d4a5b3d20d5c120757bc99ac2c941
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=845c992584a4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:51:58 --> [REQ_ID=845c992584a4] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=845c992584a4] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:51:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:51:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:51:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:51:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:51:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:51:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [FILTER_AFTER]
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [LIFECYCLE][END] status=404 duration_ms=18.05 memory_delta=0
INFO - 2026-02-27 15:51:58 --> [REQ_ID=845c992584a4] [PERF] Execution time=0.017481
DEBUG - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [REQUEST][END]
INFO - 2026-02-27 15:51:58 --> [REQ_ID=2dbe75f936f6] [PERF] Execution time=0.028472
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:52:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:52:02 --> [CSRF] token name=csrf_test_name hash=1fdfc8f6bc3526455a62e536995748c1
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=5e422e83abea] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:52:02 --> [REQ_ID=5e422e83abea] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=5e422e83abea] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:52:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:02 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [LIFECYCLE][END] status=404 duration_ms=32.41 memory_delta=0
INFO - 2026-02-27 15:52:02 --> [REQ_ID=5e422e83abea] [PERF] Execution time=0.031906
DEBUG - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [REQUEST][END]
INFO - 2026-02-27 15:52:02 --> [REQ_ID=670dc540a18f] [PERF] Execution time=0.042541
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:06 --> [CSRF] token name=csrf_test_name hash=1e3b8927bc52c0054aa8018bc1c83c09
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=831c0090cec5] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:52:06 --> [REQ_ID=831c0090cec5] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=831c0090cec5] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:52:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [LIFECYCLE][END] status=404 duration_ms=19.72 memory_delta=0
INFO - 2026-02-27 15:52:06 --> [REQ_ID=831c0090cec5] [PERF] Execution time=0.019165
DEBUG - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [REQUEST][END]
INFO - 2026-02-27 15:52:06 --> [REQ_ID=c73587a9a4fc] [PERF] Execution time=0.030374
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:11 --> [CSRF] token name=csrf_test_name hash=6f61c933e231015efefcf67599fece9b
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=cceb674f7024] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:52:11 --> [REQ_ID=cceb674f7024] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=cceb674f7024] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:52:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [LIFECYCLE][END] status=404 duration_ms=23.93 memory_delta=0
INFO - 2026-02-27 15:52:11 --> [REQ_ID=cceb674f7024] [PERF] Execution time=0.023446
DEBUG - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [REQUEST][END]
INFO - 2026-02-27 15:52:11 --> [REQ_ID=11e58918dc67] [PERF] Execution time=0.033516
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:52:17 --> [CSRF] token name=csrf_test_name hash=baacba99e25f4b78f2cec57cded52dd5
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=c33ccf013e5a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:52:17 --> [REQ_ID=c33ccf013e5a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=c33ccf013e5a] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:52:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [LIFECYCLE][END] status=404 duration_ms=27.55 memory_delta=0
INFO - 2026-02-27 15:52:17 --> [REQ_ID=c33ccf013e5a] [PERF] Execution time=0.027035
DEBUG - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [REQUEST][END]
INFO - 2026-02-27 15:52:17 --> [REQ_ID=b9e9072baf88] [PERF] Execution time=0.037007
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [REQUEST][START] GET /index.php
DEBUG - 2026-02-27 15:52:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:52:32 --> [CSRF] token name=csrf_test_name hash=7d1e8855696224bc67f3186749b310ad
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 15:52:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:52:32 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:52:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [LIFECYCLE][END] status=200 duration_ms=513.26 memory_delta=4194304
INFO - 2026-02-27 15:52:32 --> [REQ_ID=f609ff57e920] [PERF] Execution time=0.512970
DEBUG - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [REQUEST][END]
INFO - 2026-02-27 15:52:32 --> [REQ_ID=26cb6107256c] [PERF] Execution time=0.522558
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [REQUEST][START] GET /index.php
DEBUG - 2026-02-27 15:52:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 15:52:37 --> [CSRF] token name=csrf_test_name hash=1d833c5b3617532be4e735ef41d5395e
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:52:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:52:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:52:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [LIFECYCLE][END] status=200 duration_ms=554.37 memory_delta=2097152
INFO - 2026-02-27 15:52:37 --> [REQ_ID=c21f1ae32dfc] [PERF] Execution time=0.554078
DEBUG - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [REQUEST][END]
INFO - 2026-02-27 15:52:37 --> [REQ_ID=734f764818c7] [PERF] Execution time=0.563497
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-02-27 15:52:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-02-27 15:52:48 --> [CSRF] token name=csrf_test_name hash=c1523cfffe5a35da32838bbf19ca543d
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:52:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:52:48 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
INFO - 2026-02-27 15:52:48 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 15:52:48 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [FILTER_AFTER]
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [LIFECYCLE][END] status=200 duration_ms=566.74 memory_delta=2097152
INFO - 2026-02-27 15:52:48 --> [REQ_ID=9625f85d664c] [PERF] Execution time=0.567052
DEBUG - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [REQUEST][END]
INFO - 2026-02-27 15:52:48 --> [REQ_ID=e6ac0f159de8] [PERF] Execution time=0.578424
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=a426760f2a40] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:52:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=a426760f2a40] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=a426760f2a40] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=a426760f2a40] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:52:58 --> [CSRF] token name=csrf_test_name hash=00fe62496f9c7f1fb7af36608418c5c5
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=cac516aa8dae] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:52:58 --> [REQ_ID=cac516aa8dae] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:52:58 --> [REQ_ID=cac516aa8dae] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:52:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:52:58 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:52:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:52:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:52:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:52:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:52:58 --> [REQ_ID=cac516aa8dae] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 15:52:58 --> [REQ_ID=cac516aa8dae] [PERF] Execution time=0.170428
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=6bcf128b423c] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:53:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=6bcf128b423c] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=6bcf128b423c] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=6bcf128b423c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:53:01 --> [CSRF] token name=csrf_test_name hash=a80cb2845444bde087967efb2abec62c
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=b6a4dc4e369d] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:53:01 --> [REQ_ID=b6a4dc4e369d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:53:01 --> [REQ_ID=b6a4dc4e369d] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:53:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:53:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:53:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:53:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:53:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:53:01 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:53:01 --> [REQ_ID=b6a4dc4e369d] [MEMORY][commonData:start] 4194304
INFO - 2026-02-27 15:53:01 --> [REQ_ID=b6a4dc4e369d] [PERF] Execution time=0.026372
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f49a118f0c24] [REQUEST][START] GET /index.php/Blog
DEBUG - 2026-02-27 15:53:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f49a118f0c24] [FILTER_BEFORE] /index.php/Blog
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f49a118f0c24] [ROUTE] Controller=\App\Modules\Blog\Controllers\BlogController Method=index
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f49a118f0c24] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Blog
DEBUG - 2026-02-27 15:53:04 --> [CSRF] token name=csrf_test_name hash=b2ebd29d009529c422865e2c0693a4bd
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f9a1d436da2e] [INIT] App\Modules\Blog\Controllers\BlogController::GET
INFO - 2026-02-27 15:53:04 --> [REQ_ID=f9a1d436da2e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:53:04 --> [REQ_ID=f9a1d436da2e] [METHOD_ENTRY] index
DEBUG - 2026-02-27 15:53:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:53:04 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:53:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:53:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:53:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:53:04 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:53:04 --> [REQ_ID=f9a1d436da2e] [MEMORY][commonData:start] 4194304
INFO - 2026-02-27 15:53:04 --> [REQ_ID=f9a1d436da2e] [PERF] Execution time=0.031799
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:53:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:53:08 --> [CSRF] token name=csrf_test_name hash=20f04840519f4bff1d90fce32e967a1e
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=7ad09ae2f8e6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:53:08 --> [REQ_ID=7ad09ae2f8e6] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [FILTER_AFTER]
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [LIFECYCLE][END] status=200 duration_ms=21.14 memory_delta=0
INFO - 2026-02-27 15:53:08 --> [REQ_ID=7ad09ae2f8e6] [PERF] Execution time=0.020844
DEBUG - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [REQUEST][END]
INFO - 2026-02-27 15:53:08 --> [REQ_ID=b9a5d9989415] [PERF] Execution time=0.030484
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=e6e3035d3e8b] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:53:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=e6e3035d3e8b] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=e6e3035d3e8b] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=e6e3035d3e8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:53:34 --> [CSRF] token name=csrf_test_name hash=fcf3b8bc99c13f6ef687b3e2230935cd
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=ccb062e3a286] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:53:34 --> [REQ_ID=ccb062e3a286] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:53:34 --> [REQ_ID=ccb062e3a286] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:53:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:53:34 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:53:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:53:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:53:34 --> [REQ_ID=ccb062e3a286] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 15:53:35 --> [REQ_ID=ccb062e3a286] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 15:53:35 --> [REQ_ID=ccb062e3a286] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 15:53:35 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 15:53:35 --> [REQ_ID=e6e3035d3e8b] [FILTER_AFTER]
DEBUG - 2026-02-27 15:53:35 --> [REQ_ID=e6e3035d3e8b] [LIFECYCLE][END] status=200 duration_ms=1,130.05 memory_delta=6291456
INFO - 2026-02-27 15:53:35 --> [REQ_ID=ccb062e3a286] [PERF] Execution time=1.129763
DEBUG - 2026-02-27 15:53:35 --> [REQ_ID=e6e3035d3e8b] [REQUEST][END]
INFO - 2026-02-27 15:53:35 --> [REQ_ID=e6e3035d3e8b] [PERF] Execution time=1.141221
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=7e66764a0298] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:54:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=7e66764a0298] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=7e66764a0298] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=7e66764a0298] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-27 15:54:00 --> [CSRF] token name=csrf_test_name hash=9e988cc3be9b1f4800d82c9b5ec04fe0
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=4caeffe640cc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:00 --> [REQ_ID=4caeffe640cc] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:54:00 --> [REQ_ID=4caeffe640cc] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:00 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:00 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 15:54:00 --> [REQ_ID=4caeffe640cc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:54:01 --> [REQ_ID=4caeffe640cc] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-27 15:54:01 --> [REQ_ID=4caeffe640cc] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 15:54:01 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 15:54:01 --> [REQ_ID=7e66764a0298] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:01 --> [REQ_ID=7e66764a0298] [LIFECYCLE][END] status=200 duration_ms=1,115.89 memory_delta=8388608
INFO - 2026-02-27 15:54:01 --> [REQ_ID=4caeffe640cc] [PERF] Execution time=1.113790
DEBUG - 2026-02-27 15:54:01 --> [REQ_ID=7e66764a0298] [REQUEST][END]
INFO - 2026-02-27 15:54:01 --> [REQ_ID=7e66764a0298] [PERF] Execution time=1.159640
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:05 --> [CSRF] token name=csrf_test_name hash=ddbbd0aa8effe0373c6a2a35be687369
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=765dc781ba06] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:05 --> [REQ_ID=765dc781ba06] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=765dc781ba06] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [LIFECYCLE][END] status=404 duration_ms=40.90 memory_delta=0
INFO - 2026-02-27 15:54:05 --> [REQ_ID=765dc781ba06] [PERF] Execution time=0.040597
DEBUG - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [REQUEST][END]
INFO - 2026-02-27 15:54:05 --> [REQ_ID=5c83689b56ca] [PERF] Execution time=0.051278
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:10 --> [CSRF] token name=csrf_test_name hash=7a76210a5c91062c36faac7f4a3eba7c
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=60dbe62d5ac6] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:10 --> [REQ_ID=60dbe62d5ac6] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=60dbe62d5ac6] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:10 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [LIFECYCLE][END] status=404 duration_ms=15.88 memory_delta=0
INFO - 2026-02-27 15:54:10 --> [REQ_ID=60dbe62d5ac6] [PERF] Execution time=0.015730
DEBUG - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [REQUEST][END]
INFO - 2026-02-27 15:54:10 --> [REQ_ID=2ce651ce0165] [PERF] Execution time=0.026218
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 15:54:14 --> [CSRF] token name=csrf_test_name hash=5973b7fe2a7c4352e6d0739274bc3ee5
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=47bf6f66cdf2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:14 --> [REQ_ID=47bf6f66cdf2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=47bf6f66cdf2] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:14 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [LIFECYCLE][END] status=404 duration_ms=177.06 memory_delta=0
INFO - 2026-02-27 15:54:14 --> [REQ_ID=47bf6f66cdf2] [PERF] Execution time=0.176759
DEBUG - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [REQUEST][END]
INFO - 2026-02-27 15:54:14 --> [REQ_ID=32fc8f659f8c] [PERF] Execution time=0.186763
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:18 --> [CSRF] token name=csrf_test_name hash=290cf21581e3caa72abc8311fe2632f8
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=5613632d3659] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:18 --> [REQ_ID=5613632d3659] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=5613632d3659] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [LIFECYCLE][END] status=404 duration_ms=14.79 memory_delta=0
INFO - 2026-02-27 15:54:18 --> [REQ_ID=5613632d3659] [PERF] Execution time=0.014596
DEBUG - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [REQUEST][END]
INFO - 2026-02-27 15:54:18 --> [REQ_ID=e6bc797d3bc0] [PERF] Execution time=0.024489
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:22 --> [CSRF] token name=csrf_test_name hash=7fbeb6fb9a1d1f191856568e17d76565
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=faa64db479ce] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:22 --> [REQ_ID=faa64db479ce] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=faa64db479ce] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [LIFECYCLE][END] status=404 duration_ms=35.17 memory_delta=0
INFO - 2026-02-27 15:54:22 --> [REQ_ID=faa64db479ce] [PERF] Execution time=0.034794
DEBUG - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [REQUEST][END]
INFO - 2026-02-27 15:54:22 --> [REQ_ID=98bcabb68104] [PERF] Execution time=0.046179
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [REQUEST][START] GET /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [FILTER_BEFORE] /index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Daily-Financial-News
DEBUG - 2026-02-27 15:54:26 --> [CSRF] token name=csrf_test_name hash=7b4b088b0bf4204a664bac41508804a4
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=71f0b299c75a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:54:26 --> [REQ_ID=71f0b299c75a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=71f0b299c75a] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:54:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:54:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:54:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:54:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:54:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [FILTER_AFTER]
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [LIFECYCLE][END] status=404 duration_ms=20.70 memory_delta=0
INFO - 2026-02-27 15:54:26 --> [REQ_ID=71f0b299c75a] [PERF] Execution time=0.020386
DEBUG - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [REQUEST][END]
INFO - 2026-02-27 15:54:26 --> [REQ_ID=37820f9b8362] [PERF] Execution time=0.030084
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-02-27 15:55:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-02-27 15:55:10 --> [CSRF] token name=csrf_test_name hash=413b95379985a0e1afdf1b08abc53c7e
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [FILTER_AFTER]
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [LIFECYCLE][END] status=200 duration_ms=5.04 memory_delta=0
DEBUG - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [REQUEST][END]
INFO - 2026-02-27 15:55:10 --> [REQ_ID=fc36cfaff053] [PERF] Execution time=0.039426
DEBUG - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 15:56:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 15:56:32 --> [CSRF] token name=csrf_test_name hash=e4b77594ca508f725a064e75c409ee17
DEBUG - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [REQUEST][END]
INFO - 2026-02-27 15:56:32 --> [REQ_ID=b0fde6f61e1d] [PERF] Execution time=0.018208
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 15:56:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 15:56:33 --> [CSRF] token name=csrf_test_name hash=b59799a1c6def0c0c58aab89d016ab02
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=1823d35f2d29] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 15:56:33 --> [REQ_ID=1823d35f2d29] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [FILTER_AFTER]
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [LIFECYCLE][END] status=200 duration_ms=19.50 memory_delta=0
INFO - 2026-02-27 15:56:33 --> [REQ_ID=1823d35f2d29] [PERF] Execution time=0.017821
DEBUG - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [REQUEST][END]
INFO - 2026-02-27 15:56:33 --> [REQ_ID=692afdca5792] [PERF] Execution time=0.028919
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=d765e795fa40] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-02-27 15:57:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=d765e795fa40] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=d765e795fa40] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=d765e795fa40] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-02-27 15:57:55 --> [CSRF] token name=csrf_test_name hash=b1cfb99ca7b4a0e41d2e43bfaf7c3813
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=25db652ac59a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 15:57:55 --> [REQ_ID=25db652ac59a] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=25db652ac59a] [METHOD_ENTRY] show
DEBUG - 2026-02-27 15:57:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 15:57:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 15:57:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:57:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 15:57:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 15:57:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 15:57:55 --> [REQ_ID=25db652ac59a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 15:57:55 --> [REQ_ID=25db652ac59a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 15:57:56 --> [MetaService] slug=how-it-works/overview pageName= cacheHit= path=DB
INFO - 2026-02-27 15:57:56 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 15:57:56 --> [MetaService] slug=how-it-works/overview pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 15:57:56 --> [REQ_ID=d765e795fa40] [FILTER_AFTER]
DEBUG - 2026-02-27 15:57:56 --> [REQ_ID=d765e795fa40] [LIFECYCLE][END] status=200 duration_ms=826.40 memory_delta=4194304
INFO - 2026-02-27 15:57:56 --> [REQ_ID=25db652ac59a] [PERF] Execution time=0.823431
DEBUG - 2026-02-27 15:57:56 --> [REQ_ID=d765e795fa40] [REQUEST][END]
INFO - 2026-02-27 15:57:56 --> [REQ_ID=d765e795fa40] [PERF] Execution time=0.867554
INFO - 2026-02-27 16:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 16:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 16:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 16:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 16:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 16:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 16:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037340
INFO - 2026-02-27 16:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [REQUEST][END]
INFO - 2026-02-27 16:00:01 --> [REQ_ID=f95f7a15fa13] [PERF] Execution time=0.107883
INFO - 2026-02-27 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 16:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 16:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.033670
INFO - 2026-02-27 16:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-02-27 16:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 16:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 16:00:03 --> LOG_HEALTHCHECK debug marker=d93b268a51f1
INFO - 2026-02-27 16:00:03 --> LOG_HEALTHCHECK info marker=d93b268a51f1
NOTICE - 2026-02-27 16:00:03 --> LOG_HEALTHCHECK probe marker=d93b268a51f1
INFO - 2026-02-27 16:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 16:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025805
INFO - 2026-02-27 16:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 16:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 16:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 16:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 16:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 16:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 16:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.453874
INFO - 2026-02-27 16:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-27 16:09:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-27 16:09:10 --> [CSRF] token name=csrf_test_name hash=de9cdd9a4ce4714b80189c205127293b
DEBUG - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [REQUEST][END]
INFO - 2026-02-27 16:09:10 --> [REQ_ID=7617fbb37eca] [PERF] Execution time=0.053611
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 16:09:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 16:09:15 --> [CSRF] token name=csrf_test_name hash=9a673670e4037edeb5078bcea5c54fa8
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0c5061a90427] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 16:09:15 --> [REQ_ID=0c5061a90427] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [FILTER_AFTER]
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [LIFECYCLE][END] status=200 duration_ms=61.18 memory_delta=0
INFO - 2026-02-27 16:09:15 --> [REQ_ID=0c5061a90427] [PERF] Execution time=0.060827
DEBUG - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [REQUEST][END]
INFO - 2026-02-27 16:09:15 --> [REQ_ID=0a5b9c0988ff] [PERF] Execution time=0.070091
DEBUG - 2026-02-27 16:09:20 --> [REQ_ID=60458a9e501d] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 16:09:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:09:20 --> [REQ_ID=60458a9e501d] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 16:09:20 --> [REQ_ID=60458a9e501d] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 16:09:20 --> [REQ_ID=60458a9e501d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 16:09:20 --> [CSRF] token name=csrf_test_name hash=9a673670e4037edeb5078bcea5c54fa8
DEBUG - 2026-02-27 16:09:20 --> [REQ_ID=be52926ff124] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 16:09:20 --> [REQ_ID=be52926ff124] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 16:09:20 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 16:09:20 --> [REQ_ID=be52926ff124] [PERF] Execution time=0.022123
DEBUG - 2026-02-27 16:09:25 --> [REQ_ID=9ba4451394b3] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 16:09:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:09:25 --> [REQ_ID=9ba4451394b3] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 16:09:25 --> [REQ_ID=9ba4451394b3] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 16:09:25 --> [REQ_ID=9ba4451394b3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 16:09:25 --> [CSRF] token name=csrf_test_name hash=9a673670e4037edeb5078bcea5c54fa8
DEBUG - 2026-02-27 16:09:25 --> [REQ_ID=a7afed317c68] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 16:09:25 --> [REQ_ID=a7afed317c68] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 16:09:25 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 16:09:25 --> [REQ_ID=a7afed317c68] [PERF] Execution time=0.012459
DEBUG - 2026-02-27 16:09:30 --> [REQ_ID=6325ac676479] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 16:09:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:09:30 --> [REQ_ID=6325ac676479] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 16:09:30 --> [REQ_ID=6325ac676479] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 16:09:30 --> [REQ_ID=6325ac676479] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 16:09:30 --> [CSRF] token name=csrf_test_name hash=9a673670e4037edeb5078bcea5c54fa8
DEBUG - 2026-02-27 16:09:30 --> [REQ_ID=3362c8a2ec21] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 16:09:30 --> [REQ_ID=3362c8a2ec21] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 16:09:30 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 16:09:30 --> [REQ_ID=3362c8a2ec21] [PERF] Execution time=0.015033
INFO - 2026-02-27 16:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 16:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 16:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 16:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 16:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.134739
INFO - 2026-02-27 16:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [REQUEST][END]
INFO - 2026-02-27 16:15:02 --> [REQ_ID=11959b40ae87] [PERF] Execution time=0.061947
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [REQUEST][START] GET /
DEBUG - 2026-02-27 16:15:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [FILTER_BEFORE] /
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 16:15:32 --> [CSRF] token name=csrf_test_name hash=b5df716a14a9376769b5fc5581efcf4a
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 16:15:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:15:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 16:15:32 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 16:15:32 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [FILTER_AFTER]
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [LIFECYCLE][END] status=200 duration_ms=713.43 memory_delta=4194304
INFO - 2026-02-27 16:15:32 --> [REQ_ID=fcf17664eef8] [PERF] Execution time=0.711973
DEBUG - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [REQUEST][END]
INFO - 2026-02-27 16:15:32 --> [REQ_ID=b632c62459a8] [PERF] Execution time=0.727200
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-02-27 16:26:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-02-27 16:26:58 --> [CSRF] token name=csrf_test_name hash=25b89f31014516dbc56bc9a62cbdec02
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [REQUEST][END]
INFO - 2026-02-27 16:26:58 --> [REQ_ID=5f72a98d5238] [PERF] Execution time=0.051764
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 16:26:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 16:26:58 --> [CSRF] token name=csrf_test_name hash=67eba0c250b26b2a11429dd6644f4a56
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=9391ec148450] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 16:26:58 --> [REQ_ID=9391ec148450] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [FILTER_AFTER]
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [LIFECYCLE][END] status=200 duration_ms=135.27 memory_delta=0
INFO - 2026-02-27 16:26:58 --> [REQ_ID=9391ec148450] [PERF] Execution time=0.135129
DEBUG - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [REQUEST][END]
INFO - 2026-02-27 16:26:58 --> [REQ_ID=d54c88aa0898] [PERF] Execution time=0.146861
INFO - 2026-02-27 16:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 16:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 16:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 16:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.108829
INFO - 2026-02-27 16:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 16:33:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 16:33:07 --> [CSRF] token name=csrf_test_name hash=823a3c3973d4fa0f0b5bb40204c1ee11
DEBUG - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [REQUEST][END]
INFO - 2026-02-27 16:33:07 --> [REQ_ID=b39e632d6840] [PERF] Execution time=0.060166
DEBUG - 2026-02-27 16:35:35 --> [REQ_ID=854bff7a7580] [REQUEST][START] GET /
DEBUG - 2026-02-27 16:35:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:35:35 --> [REQ_ID=854bff7a7580] [FILTER_BEFORE] /
DEBUG - 2026-02-27 16:35:35 --> [REQ_ID=854bff7a7580] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 16:35:35 --> [REQ_ID=854bff7a7580] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 16:35:35 --> [CSRF] token name=csrf_test_name hash=4aa44652879cab1f8ebf0df8db34db23
DEBUG - 2026-02-27 16:35:35 --> [REQ_ID=936665310189] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 16:35:35 --> [REQ_ID=936665310189] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 16:35:36 --> [REQ_ID=936665310189] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 16:35:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:35:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 16:35:36 --> [REQ_ID=936665310189] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 16:35:36 --> [REQ_ID=936665310189] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 16:35:36 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 16:35:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:35:36 --> [REQ_ID=854bff7a7580] [FILTER_AFTER]
DEBUG - 2026-02-27 16:35:36 --> [REQ_ID=854bff7a7580] [LIFECYCLE][END] status=200 duration_ms=630.77 memory_delta=4194304
INFO - 2026-02-27 16:35:36 --> [REQ_ID=936665310189] [PERF] Execution time=0.628708
DEBUG - 2026-02-27 16:35:36 --> [REQ_ID=854bff7a7580] [REQUEST][END]
INFO - 2026-02-27 16:35:36 --> [REQ_ID=854bff7a7580] [PERF] Execution time=0.669422
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [REQUEST][START] GET /
DEBUG - 2026-02-27 16:35:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [FILTER_BEFORE] /
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 16:35:42 --> [CSRF] token name=csrf_test_name hash=7171c95a109f6f26a8beb46883604e75
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 16:35:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:35:42 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 16:35:42 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 16:35:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [FILTER_AFTER]
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [LIFECYCLE][END] status=200 duration_ms=518.84 memory_delta=2097152
INFO - 2026-02-27 16:35:42 --> [REQ_ID=043456880337] [PERF] Execution time=0.518526
DEBUG - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [REQUEST][END]
INFO - 2026-02-27 16:35:42 --> [REQ_ID=8b05c2d8ff6d] [PERF] Execution time=0.528316
INFO - 2026-02-27 16:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 16:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 16:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 16:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 16:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 16:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.088716
INFO - 2026-02-27 16:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [REQUEST][START] GET /
DEBUG - 2026-02-27 16:45:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [FILTER_BEFORE] /
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 16:45:30 --> [CSRF] token name=csrf_test_name hash=ca98037b4556e6a45e9cdb8c279c2030
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 16:45:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:45:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 16:45:30 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 16:45:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [FILTER_AFTER]
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [LIFECYCLE][END] status=200 duration_ms=733.17 memory_delta=4194304
INFO - 2026-02-27 16:45:30 --> [REQ_ID=4b3e6ec279aa] [PERF] Execution time=0.731011
DEBUG - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [REQUEST][END]
INFO - 2026-02-27 16:45:30 --> [REQ_ID=9d9b855f36b7] [PERF] Execution time=0.776625
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 16:45:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 16:45:31 --> [CSRF] token name=csrf_test_name hash=97c788ec30e1906dbb76117f1f65b232
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=b50c0618d81e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 16:45:31 --> [REQ_ID=b50c0618d81e] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=b50c0618d81e] [METHOD_ENTRY] show
DEBUG - 2026-02-27 16:45:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:45:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 16:45:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [FILTER_AFTER]
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [LIFECYCLE][END] status=404 duration_ms=63.66 memory_delta=0
INFO - 2026-02-27 16:45:31 --> [REQ_ID=b50c0618d81e] [PERF] Execution time=0.062603
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [REQUEST][END]
INFO - 2026-02-27 16:45:31 --> [REQ_ID=e32a7d56a4a6] [PERF] Execution time=0.081279
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 16:45:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 16:45:31 --> [CSRF] token name=csrf_test_name hash=5773d390e8c11ce9d38d2efc2cacf52f
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=080477813047] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 16:45:31 --> [REQ_ID=080477813047] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=080477813047] [METHOD_ENTRY] show
DEBUG - 2026-02-27 16:45:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:45:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 16:45:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 16:45:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [FILTER_AFTER]
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [LIFECYCLE][END] status=404 duration_ms=16.66 memory_delta=0
INFO - 2026-02-27 16:45:31 --> [REQ_ID=080477813047] [PERF] Execution time=0.016373
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [REQUEST][END]
INFO - 2026-02-27 16:45:31 --> [REQ_ID=721a40869abd] [PERF] Execution time=0.028029
DEBUG - 2026-02-27 16:45:31 --> [REQ_ID=abe4a6d68b50] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 16:45:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=abe4a6d68b50] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=abe4a6d68b50] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=abe4a6d68b50] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 16:45:32 --> [CSRF] token name=csrf_test_name hash=3be35bb1555b2d5cf2b7fe0504d62ff8
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [METHOD_ENTRY] show
DEBUG - 2026-02-27 16:45:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:45:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 16:45:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 16:45:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 16:45:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 16:45:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 16:45:32 --> [REQ_ID=046365619043] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 16:45:33 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 16:45:33 --> [REQ_ID=abe4a6d68b50] [FILTER_AFTER]
DEBUG - 2026-02-27 16:45:33 --> [REQ_ID=abe4a6d68b50] [LIFECYCLE][END] status=200 duration_ms=1,055.51 memory_delta=8388608
INFO - 2026-02-27 16:45:33 --> [REQ_ID=046365619043] [PERF] Execution time=1.055125
DEBUG - 2026-02-27 16:45:33 --> [REQ_ID=abe4a6d68b50] [REQUEST][END]
INFO - 2026-02-27 16:45:33 --> [REQ_ID=abe4a6d68b50] [PERF] Execution time=1.067525
DEBUG - 2026-02-27 16:55:52 --> [REQ_ID=4c017a515c16] [REQUEST][START] GET /
DEBUG - 2026-02-27 16:55:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 16:55:52 --> [REQ_ID=4c017a515c16] [FILTER_BEFORE] /
DEBUG - 2026-02-27 16:55:52 --> [REQ_ID=4c017a515c16] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 16:55:52 --> [REQ_ID=4c017a515c16] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 16:55:52 --> [CSRF] token name=csrf_test_name hash=5a7289ee1e857ed74b4b0f57bab59312
DEBUG - 2026-02-27 16:55:52 --> [REQ_ID=6114b1c87172] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 16:55:52 --> [REQ_ID=6114b1c87172] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 16:55:52 --> [REQ_ID=6114b1c87172] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 16:55:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 16:55:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 16:55:53 --> [REQ_ID=6114b1c87172] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 16:55:53 --> [REQ_ID=6114b1c87172] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 16:55:53 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 16:55:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 16:55:53 --> [REQ_ID=4c017a515c16] [FILTER_AFTER]
DEBUG - 2026-02-27 16:55:53 --> [REQ_ID=4c017a515c16] [LIFECYCLE][END] status=200 duration_ms=669.65 memory_delta=4194304
INFO - 2026-02-27 16:55:53 --> [REQ_ID=6114b1c87172] [PERF] Execution time=0.667320
DEBUG - 2026-02-27 16:55:53 --> [REQ_ID=4c017a515c16] [REQUEST][END]
INFO - 2026-02-27 16:55:53 --> [REQ_ID=4c017a515c16] [PERF] Execution time=0.710703
INFO - 2026-02-27 17:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 17:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 17:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 17:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 17:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 17:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034688
INFO - 2026-02-27 17:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [REQUEST][END]
INFO - 2026-02-27 17:00:01 --> [REQ_ID=6e86fd4cf05b] [PERF] Execution time=0.073366
INFO - 2026-02-27 17:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 17:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 17:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 17:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 17:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 17:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.024300
INFO - 2026-02-27 17:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 17:15:01 --> [REQ_ID=9193760a47fc] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:15:02 --> [REQ_ID=9193760a47fc] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 17:15:02 --> [REQ_ID=9193760a47fc] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 17:15:02 --> [REQ_ID=9193760a47fc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 17:15:02 --> [REQ_ID=9193760a47fc] [REQUEST][END]
INFO - 2026-02-27 17:15:02 --> [REQ_ID=9193760a47fc] [PERF] Execution time=0.060819
DEBUG - 2026-02-27 17:15:10 --> [REQ_ID=16d41cb31987] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 17:15:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:15:10 --> [REQ_ID=16d41cb31987] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 17:15:10 --> [REQ_ID=16d41cb31987] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-02-27 17:15:10 --> [REQ_ID=16d41cb31987] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-02-27 17:15:10 --> [CSRF] token name=csrf_test_name hash=e30c941b2e18ac67257e1733f0b0fb8b
DEBUG - 2026-02-27 17:15:11 --> [REQ_ID=16d41cb31987] [REQUEST][END]
INFO - 2026-02-27 17:15:11 --> [REQ_ID=16d41cb31987] [PERF] Execution time=0.030931
DEBUG - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-02-27 17:23:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-02-27 17:23:08 --> [CSRF] token name=csrf_test_name hash=0482de1a74fdb1570ad24f48e8b521f3
DEBUG - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [REQUEST][END]
INFO - 2026-02-27 17:23:08 --> [REQ_ID=c1f397164e7e] [PERF] Execution time=0.074884
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 17:23:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 17:23:09 --> [CSRF] token name=csrf_test_name hash=36425089ede85c01961e813a35903b78
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=56b39006092f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 17:23:09 --> [REQ_ID=56b39006092f] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [FILTER_AFTER]
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [LIFECYCLE][END] status=200 duration_ms=69.92 memory_delta=0
INFO - 2026-02-27 17:23:09 --> [REQ_ID=56b39006092f] [PERF] Execution time=0.069102
DEBUG - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [REQUEST][END]
INFO - 2026-02-27 17:23:09 --> [REQ_ID=2f080fe3cee3] [PERF] Execution time=0.087376
DEBUG - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [REQUEST][START] GET /index.php/Knowledgebase
DEBUG - 2026-02-27 17:24:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [FILTER_BEFORE] /index.php/Knowledgebase
DEBUG - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=index
DEBUG - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase
DEBUG - 2026-02-27 17:24:17 --> [CSRF] token name=csrf_test_name hash=348b28dd85854d4b9adf6b711bb0f42b
DEBUG - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [REQUEST][END]
INFO - 2026-02-27 17:24:17 --> [REQ_ID=48ad3f1f3093] [PERF] Execution time=0.011400
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 17:24:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 17:24:18 --> [CSRF] token name=csrf_test_name hash=10240146d23bb60a9c07749e45bdf69a
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=1627cfa32d23] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 17:24:18 --> [REQ_ID=1627cfa32d23] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [FILTER_AFTER]
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [LIFECYCLE][END] status=200 duration_ms=187.54 memory_delta=0
INFO - 2026-02-27 17:24:18 --> [REQ_ID=1627cfa32d23] [PERF] Execution time=0.187348
DEBUG - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [REQUEST][END]
INFO - 2026-02-27 17:24:18 --> [REQ_ID=60af4b48805b] [PERF] Execution time=0.197293
INFO - 2026-02-27 17:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 17:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 17:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 17:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 17:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 17:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.047418
INFO - 2026-02-27 17:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [REQUEST][START] GET /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-02-27 17:40:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [FILTER_BEFORE] /index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=blogCreator
DEBUG - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Blog-Creator
DEBUG - 2026-02-27 17:40:43 --> [CSRF] token name=csrf_test_name hash=65089593474b5612a8dc2fcb06201b68
DEBUG - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [REQUEST][END]
INFO - 2026-02-27 17:40:43 --> [REQ_ID=3d74ed009f84] [PERF] Execution time=0.058230
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 17:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 17:40:44 --> [CSRF] token name=csrf_test_name hash=f3cd3441c1e37ffa2fd5e9c19f1ee50f
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=7bfe3b95aa01] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 17:40:44 --> [REQ_ID=7bfe3b95aa01] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [FILTER_AFTER]
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [LIFECYCLE][END] status=200 duration_ms=40.63 memory_delta=0
INFO - 2026-02-27 17:40:44 --> [REQ_ID=7bfe3b95aa01] [PERF] Execution time=0.040405
DEBUG - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [REQUEST][END]
INFO - 2026-02-27 17:40:44 --> [REQ_ID=75f57e2a0663] [PERF] Execution time=0.052367
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-02-27 17:42:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-02-27 17:42:55 --> [CSRF] token name=csrf_test_name hash=585dfca7c385bf89930d0ef048d9b4e7
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [REQUEST][END]
INFO - 2026-02-27 17:42:55 --> [REQ_ID=7f16af68d7bb] [PERF] Execution time=0.051716
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 17:42:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 17:42:55 --> [CSRF] token name=csrf_test_name hash=c6bbe2beb330a63a90d3bc7e4af4c622
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=4ae334e11929] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 17:42:55 --> [REQ_ID=4ae334e11929] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [FILTER_AFTER]
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [LIFECYCLE][END] status=200 duration_ms=49.32 memory_delta=0
INFO - 2026-02-27 17:42:55 --> [REQ_ID=4ae334e11929] [PERF] Execution time=0.048275
DEBUG - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [REQUEST][END]
INFO - 2026-02-27 17:42:55 --> [REQ_ID=275a1b1e937d] [PERF] Execution time=0.061504
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-02-27 17:44:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-02-27 17:44:09 --> [CSRF] token name=csrf_test_name hash=88ae6eb31d20d9ab428482b8cdd14f07
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [REQUEST][END]
INFO - 2026-02-27 17:44:09 --> [REQ_ID=45f8b41c2104] [PERF] Execution time=0.048996
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=f66e7435ba3d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 17:44:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=f66e7435ba3d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=f66e7435ba3d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=f66e7435ba3d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 17:44:09 --> [CSRF] token name=csrf_test_name hash=dceec3e826e8671a4e57d5fb6387c636
DEBUG - 2026-02-27 17:44:09 --> [REQ_ID=5f25e9073445] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 17:44:09 --> [REQ_ID=5f25e9073445] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 17:44:10 --> [REQ_ID=f66e7435ba3d] [FILTER_AFTER]
DEBUG - 2026-02-27 17:44:10 --> [REQ_ID=f66e7435ba3d] [LIFECYCLE][END] status=200 duration_ms=261.49 memory_delta=0
INFO - 2026-02-27 17:44:10 --> [REQ_ID=5f25e9073445] [PERF] Execution time=0.261320
DEBUG - 2026-02-27 17:44:10 --> [REQ_ID=f66e7435ba3d] [REQUEST][END]
INFO - 2026-02-27 17:44:10 --> [REQ_ID=f66e7435ba3d] [PERF] Execution time=0.276013
INFO - 2026-02-27 17:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 17:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 17:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 17:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 17:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 17:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037465
INFO - 2026-02-27 17:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [REQUEST][START] GET /
DEBUG - 2026-02-27 17:51:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [FILTER_BEFORE] /
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 17:51:19 --> [CSRF] token name=csrf_test_name hash=622a5931327a2687959308daab116962
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 17:51:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 17:51:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 17:51:19 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 17:51:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [FILTER_AFTER]
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [LIFECYCLE][END] status=200 duration_ms=700.10 memory_delta=4194304
INFO - 2026-02-27 17:51:19 --> [REQ_ID=f93b49057a18] [PERF] Execution time=0.697855
DEBUG - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [REQUEST][END]
INFO - 2026-02-27 17:51:19 --> [REQ_ID=bf926f3435a0] [PERF] Execution time=0.739072
INFO - 2026-02-27 18:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-27 18:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 18:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 18:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 18:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 18:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037495
INFO - 2026-02-27 18:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [REQUEST][END]
INFO - 2026-02-27 18:00:02 --> [REQ_ID=558c8c73c9a3] [PERF] Execution time=0.096433
INFO - 2026-02-27 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 18:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 18:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.034370
INFO - 2026-02-27 18:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-02-27 18:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 18:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 18:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 18:00:04 --> LOG_HEALTHCHECK debug marker=2c71d5178503
INFO - 2026-02-27 18:00:04 --> LOG_HEALTHCHECK info marker=2c71d5178503
NOTICE - 2026-02-27 18:00:04 --> LOG_HEALTHCHECK probe marker=2c71d5178503
INFO - 2026-02-27 18:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 18:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.066496
INFO - 2026-02-27 18:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 18:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 18:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 18:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 18:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 18:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 18:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.541530
INFO - 2026-02-27 18:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 18:02:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-27 18:02:33 --> [CSRF] token name=csrf_test_name hash=86a753d4c94cac0b1703394c241bcf3e
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=d1a543f1a15b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 18:02:33 --> [REQ_ID=d1a543f1a15b] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=d1a543f1a15b] [METHOD_ENTRY] show
DEBUG - 2026-02-27 18:02:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 18:02:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 18:02:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 18:02:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 18:02:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 18:02:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [FILTER_AFTER]
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [LIFECYCLE][END] status=404 duration_ms=116.08 memory_delta=0
INFO - 2026-02-27 18:02:33 --> [REQ_ID=d1a543f1a15b] [PERF] Execution time=0.114208
DEBUG - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [REQUEST][END]
INFO - 2026-02-27 18:02:33 --> [REQ_ID=92dda69c6c5a] [PERF] Execution time=0.157656
DEBUG - 2026-02-27 18:03:09 --> [REQ_ID=b6e998a6aa9b] [REQUEST][START] GET /
DEBUG - 2026-02-27 18:03:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:03:09 --> [REQ_ID=b6e998a6aa9b] [FILTER_BEFORE] /
DEBUG - 2026-02-27 18:03:09 --> [REQ_ID=b6e998a6aa9b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 18:03:09 --> [REQ_ID=b6e998a6aa9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 18:03:09 --> [CSRF] token name=csrf_test_name hash=0e5ae2c9c06ad0554df21d5035bb025e
DEBUG - 2026-02-27 18:03:09 --> [REQ_ID=2d13f6441dad] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 18:03:09 --> [REQ_ID=2d13f6441dad] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 18:03:09 --> [REQ_ID=2d13f6441dad] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 18:03:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 18:03:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 18:03:10 --> [REQ_ID=2d13f6441dad] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 18:03:10 --> [REQ_ID=2d13f6441dad] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 18:03:10 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 18:03:10 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 18:03:10 --> [REQ_ID=b6e998a6aa9b] [FILTER_AFTER]
DEBUG - 2026-02-27 18:03:10 --> [REQ_ID=b6e998a6aa9b] [LIFECYCLE][END] status=200 duration_ms=839.15 memory_delta=4194304
INFO - 2026-02-27 18:03:10 --> [REQ_ID=2d13f6441dad] [PERF] Execution time=0.839117
DEBUG - 2026-02-27 18:03:10 --> [REQ_ID=b6e998a6aa9b] [REQUEST][END]
INFO - 2026-02-27 18:03:10 --> [REQ_ID=b6e998a6aa9b] [PERF] Execution time=0.850084
DEBUG - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-27 18:03:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-27 18:03:55 --> [CSRF] token name=csrf_test_name hash=c8ac40103ad592f42fb266b9252f3f84
DEBUG - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [REQUEST][END]
INFO - 2026-02-27 18:03:55 --> [REQ_ID=90641af2002e] [PERF] Execution time=0.013232
INFO - 2026-02-27 18:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 18:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 18:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [REQUEST][END]
INFO - 2026-02-27 18:15:01 --> [REQ_ID=457888b1b410] [PERF] Execution time=0.068737
INFO - 2026-02-27 18:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 18:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.122102
INFO - 2026-02-27 18:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 18:20:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-02-27 18:20:38 --> [CSRF] token name=csrf_test_name hash=d4f067c6b0f2133a4e5b010b0f6ff712
DEBUG - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [REQUEST][END]
INFO - 2026-02-27 18:20:38 --> [REQ_ID=e85516125367] [PERF] Execution time=0.059939
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 18:20:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 18:20:39 --> [CSRF] token name=csrf_test_name hash=b15044519cab631b45b4ade2ee01fe73
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=17be413032fa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 18:20:39 --> [REQ_ID=17be413032fa] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [FILTER_AFTER]
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [LIFECYCLE][END] status=200 duration_ms=65.29 memory_delta=0
INFO - 2026-02-27 18:20:39 --> [REQ_ID=17be413032fa] [PERF] Execution time=0.060126
DEBUG - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [REQUEST][END]
INFO - 2026-02-27 18:20:39 --> [REQ_ID=eeb5af4bca38] [PERF] Execution time=0.077886
DEBUG - 2026-02-27 18:24:59 --> [REQ_ID=1258f670c41c] [REQUEST][START] GET /index.php/Premium_Features/Brokerage-Integrations
DEBUG - 2026-02-27 18:24:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 18:24:59 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium_Features/Brokerage-Integrations]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 18:24:59 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 18:24:59 --> [404] URI=https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations
WARNING - 2026-02-27 18:24:59 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations | referrer: none
DEBUG - 2026-02-27 18:28:15 --> [REQ_ID=aa0a46fdbb64] [REQUEST][START] GET /index.php/Budget/Financial-Advisors
DEBUG - 2026-02-27 18:28:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 18:28:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Advisors]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 18:28:15 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 18:28:15 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Advisors
WARNING - 2026-02-27 18:28:15 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Advisors | referrer: none
INFO - 2026-02-27 18:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 18:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 18:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 18:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 18:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035985
INFO - 2026-02-27 18:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 18:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 18:40:55 --> [CSRF] token name=csrf_test_name hash=9ae8afe812ffc6b10acf60f6488dba04
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [REQUEST][END]
INFO - 2026-02-27 18:40:55 --> [REQ_ID=251a4153e83d] [PERF] Execution time=0.059952
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 18:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 18:40:55 --> [CSRF] token name=csrf_test_name hash=e3cadfbd1748f9cc3ba91e48d9de59e8
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=918eab9f07a2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 18:40:55 --> [REQ_ID=918eab9f07a2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [FILTER_AFTER]
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [LIFECYCLE][END] status=200 duration_ms=120.38 memory_delta=0
INFO - 2026-02-27 18:40:55 --> [REQ_ID=918eab9f07a2] [PERF] Execution time=0.120094
DEBUG - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [REQUEST][END]
INFO - 2026-02-27 18:40:55 --> [REQ_ID=b858ab8d9ab4] [PERF] Execution time=0.131754
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [REQUEST][START] GET /index.php/Management/Budgeting
DEBUG - 2026-02-27 18:42:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [FILTER_BEFORE] /index.php/Management/Budgeting
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetingAdminController Method=index
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgeting
DEBUG - 2026-02-27 18:42:28 --> [CSRF] token name=csrf_test_name hash=d22d3c4899d92dbcaf4f5df83a6c5fb1
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [REQUEST][END]
INFO - 2026-02-27 18:42:28 --> [REQ_ID=abc123002ca5] [PERF] Execution time=0.067880
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 18:42:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 18:42:28 --> [CSRF] token name=csrf_test_name hash=c026fed9b20599c1d3b87409f3ad1ca8
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=553d6cbe3a9b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 18:42:28 --> [REQ_ID=553d6cbe3a9b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [FILTER_AFTER]
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [LIFECYCLE][END] status=200 duration_ms=36.16 memory_delta=0
INFO - 2026-02-27 18:42:28 --> [REQ_ID=553d6cbe3a9b] [PERF] Execution time=0.036048
DEBUG - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [REQUEST][END]
INFO - 2026-02-27 18:42:28 --> [REQ_ID=2c68afb48f7e] [PERF] Execution time=0.047897
INFO - 2026-02-27 18:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 18:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 18:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 18:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 18:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 18:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.143782
INFO - 2026-02-27 18:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-02-27 18:45:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-02-27 18:45:40 --> [CSRF] token name=csrf_test_name hash=68de22c35d31d0a3cb548be4e4d6262d
DEBUG - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [REQUEST][END]
INFO - 2026-02-27 18:45:40 --> [REQ_ID=8fb13d669c0f] [PERF] Execution time=0.051880
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 18:45:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 18:45:41 --> [CSRF] token name=csrf_test_name hash=d539437897f3c880ade07d460ea3bb98
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=d962ff5fae2c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 18:45:41 --> [REQ_ID=d962ff5fae2c] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [FILTER_AFTER]
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [LIFECYCLE][END] status=200 duration_ms=109.32 memory_delta=0
INFO - 2026-02-27 18:45:41 --> [REQ_ID=d962ff5fae2c] [PERF] Execution time=0.108865
DEBUG - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [REQUEST][END]
INFO - 2026-02-27 18:45:41 --> [REQ_ID=62707f1eb50a] [PERF] Execution time=0.124615
DEBUG - 2026-02-27 18:45:44 --> [REQ_ID=985b8fc04703] [REQUEST][START] GET /index.php/Premium-Features/Wallets
DEBUG - 2026-02-27 18:45:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 18:45:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 18:45:44 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 18:45:44 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Wallets
WARNING - 2026-02-27 18:45:44 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: none
DEBUG - 2026-02-27 18:46:10 --> [REQ_ID=7de199161078] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-02-27 18:46:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 18:46:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 18:46:10 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 18:46:10 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-02-27 18:46:10 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
DEBUG - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [REQUEST][END]
INFO - 2026-02-27 19:00:01 --> [REQ_ID=43782f2d99ce] [PERF] Execution time=0.054566
INFO - 2026-02-27 19:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 19:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 19:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 19:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 19:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 19:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045059
INFO - 2026-02-27 19:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 19:02:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Wallets
DEBUG - 2026-02-27 19:02:26 --> [CSRF] token name=csrf_test_name hash=c75ac953d5d8e9fee68f4666b5316801
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=e433399b6157] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 19:02:26 --> [REQ_ID=e433399b6157] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=e433399b6157] [METHOD_ENTRY] show
DEBUG - 2026-02-27 19:02:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:02:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:02:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:02:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 19:02:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 19:02:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [FILTER_AFTER]
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [LIFECYCLE][END] status=404 duration_ms=107.50 memory_delta=0
INFO - 2026-02-27 19:02:26 --> [REQ_ID=e433399b6157] [PERF] Execution time=0.105135
DEBUG - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [REQUEST][END]
INFO - 2026-02-27 19:02:26 --> [REQ_ID=fd664b21abc5] [PERF] Execution time=0.150331
DEBUG - 2026-02-27 19:02:30 --> [REQ_ID=01dc8569d647] [REQUEST][START] GET /index.php/register
DEBUG - 2026-02-27 19:02:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:02:30 --> [REQ_ID=01dc8569d647] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-27 19:02:30 --> [REQ_ID=01dc8569d647] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 19:02:30 --> [REQ_ID=01dc8569d647] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-27 19:02:30 --> [CSRF] token name=csrf_test_name hash=f3505fc5132ee6902e6ce4e6ea80de20
DEBUG - 2026-02-27 19:02:30 --> [REQ_ID=1dd6a7eb9985] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:02:30 --> [REQ_ID=1dd6a7eb9985] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 19:02:30 --> [REGISTRATION] Form loaded
INFO - 2026-02-27 19:02:30 --> [REQ_ID=1dd6a7eb9985] [PERF] Execution time=0.016556
DEBUG - 2026-02-27 19:10:36 --> [REQ_ID=ccce9c3721ac] [REQUEST][START] GET /index.php/images/ci4-dashboard.png
DEBUG - 2026-02-27 19:10:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 19:10:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: images/ci4-dashboard.png]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 19:10:36 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 19:10:36 --> [404] URI=https://www.mymiwallet.com/index.php/images/ci4-dashboard.png
WARNING - 2026-02-27 19:10:36 --> 404 route miss: https://www.mymiwallet.com/index.php/images/ci4-dashboard.png | referrer: https://www.mymiwallet.com/index.php/How-It-Works/overview
INFO - 2026-02-27 19:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 19:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 19:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 19:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 19:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 19:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.112122
INFO - 2026-02-27 19:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [REQUEST][END]
INFO - 2026-02-27 19:15:01 --> [REQ_ID=90d710705509] [PERF] Execution time=0.064848
DEBUG - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [REQUEST][START] GET /index.php/Management/Projects
DEBUG - 2026-02-27 19:24:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [FILTER_BEFORE] /index.php/Management/Projects
DEBUG - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [ROUTE] Controller=\App\Modules\Management\Controllers\ProjectsController Method=index
DEBUG - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Projects
DEBUG - 2026-02-27 19:24:52 --> [CSRF] token name=csrf_test_name hash=380a8eed4a77b85e26ba23f8b181a475
DEBUG - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [REQUEST][END]
INFO - 2026-02-27 19:24:52 --> [REQ_ID=8951fbe7d3a1] [PERF] Execution time=0.049039
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 19:24:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:24:53 --> [CSRF] token name=csrf_test_name hash=e0ead24cd46f7af94be0e6db3d3c6db4
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=b2c176d4c536] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:24:53 --> [REQ_ID=b2c176d4c536] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [FILTER_AFTER]
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [LIFECYCLE][END] status=200 duration_ms=38.88 memory_delta=0
INFO - 2026-02-27 19:24:53 --> [REQ_ID=b2c176d4c536] [PERF] Execution time=0.038637
DEBUG - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [REQUEST][END]
INFO - 2026-02-27 19:24:53 --> [REQ_ID=ae8815021256] [PERF] Execution time=0.053868
DEBUG - 2026-02-27 19:27:44 --> [REQ_ID=d13f9e1132ce] [REQUEST][START] GET /
DEBUG - 2026-02-27 19:27:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:27:44 --> [REQ_ID=d13f9e1132ce] [FILTER_BEFORE] /
DEBUG - 2026-02-27 19:27:44 --> [REQ_ID=d13f9e1132ce] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 19:27:44 --> [REQ_ID=d13f9e1132ce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 19:27:44 --> [CSRF] token name=csrf_test_name hash=161cdb1534b02e253c8faa3cc310c7d4
DEBUG - 2026-02-27 19:27:44 --> [REQ_ID=86f805e12856] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 19:27:44 --> [REQ_ID=86f805e12856] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 19:27:44 --> [REQ_ID=86f805e12856] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 19:27:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:27:45 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 19:27:45 --> [REQ_ID=86f805e12856] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 19:27:45 --> [REQ_ID=86f805e12856] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 19:27:45 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 19:27:45 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 19:27:45 --> [REQ_ID=d13f9e1132ce] [FILTER_AFTER]
DEBUG - 2026-02-27 19:27:45 --> [REQ_ID=d13f9e1132ce] [LIFECYCLE][END] status=200 duration_ms=667.22 memory_delta=4194304
INFO - 2026-02-27 19:27:45 --> [REQ_ID=86f805e12856] [PERF] Execution time=0.665171
DEBUG - 2026-02-27 19:27:45 --> [REQ_ID=d13f9e1132ce] [REQUEST][END]
INFO - 2026-02-27 19:27:45 --> [REQ_ID=d13f9e1132ce] [PERF] Execution time=0.706583
INFO - 2026-02-27 19:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 19:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 19:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 19:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 19:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 19:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053404
INFO - 2026-02-27 19:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [REQUEST][START] GET /index.php/Investments/Watchlist
DEBUG - 2026-02-27 19:34:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [FILTER_BEFORE] /index.php/Investments/Watchlist
DEBUG - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=watchlist
DEBUG - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments/Watchlist
DEBUG - 2026-02-27 19:34:35 --> [CSRF] token name=csrf_test_name hash=cb7d260eca97ede76a918a820b0ae2f1
DEBUG - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [REQUEST][END]
INFO - 2026-02-27 19:34:35 --> [REQ_ID=a0f1b7b1fad8] [PERF] Execution time=0.056548
DEBUG - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [REQUEST][START] GET /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 19:34:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentGenerator
DEBUG - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Generator
DEBUG - 2026-02-27 19:34:39 --> [CSRF] token name=csrf_test_name hash=b98c255a974b37859df4463349f6fcde
DEBUG - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [REQUEST][END]
INFO - 2026-02-27 19:34:39 --> [REQ_ID=e63a5fef3413] [PERF] Execution time=0.018334
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=3758612b8908] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 19:37:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=3758612b8908] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=3758612b8908] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=3758612b8908] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 19:37:17 --> [CSRF] token name=csrf_test_name hash=166b21a9d3084788646ed835b22357e2
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=599fa1ebd6fc] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 19:37:17 --> [REQ_ID=599fa1ebd6fc] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:37:17 --> [REQ_ID=599fa1ebd6fc] [METHOD_ENTRY] show
DEBUG - 2026-02-27 19:37:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 19:37:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 19:37:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 19:37:17 --> [REQ_ID=599fa1ebd6fc] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 19:37:18 --> [REQ_ID=599fa1ebd6fc] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 19:37:18 --> [REQ_ID=599fa1ebd6fc] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 19:37:18 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 19:37:18 --> [REQ_ID=3758612b8908] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:18 --> [REQ_ID=3758612b8908] [LIFECYCLE][END] status=200 duration_ms=1,110.79 memory_delta=8388608
INFO - 2026-02-27 19:37:18 --> [REQ_ID=599fa1ebd6fc] [PERF] Execution time=1.108738
DEBUG - 2026-02-27 19:37:18 --> [REQ_ID=3758612b8908] [REQUEST][END]
INFO - 2026-02-27 19:37:18 --> [REQ_ID=3758612b8908] [PERF] Execution time=1.152536
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [REQUEST][START] GET /
DEBUG - 2026-02-27 19:37:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [FILTER_BEFORE] /
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 19:37:30 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [MEMORY][controller-start] 8388608
INFO - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 19:37:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 19:37:30 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 19:37:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [LIFECYCLE][END] status=200 duration_ms=497.75 memory_delta=0
INFO - 2026-02-27 19:37:30 --> [REQ_ID=565c6c0242e1] [PERF] Execution time=0.497479
DEBUG - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [REQUEST][END]
INFO - 2026-02-27 19:37:30 --> [REQ_ID=93d23c164760] [PERF] Execution time=0.508527
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 19:37:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:37:32 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=e7d14f00e131] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:37:32 --> [REQ_ID=e7d14f00e131] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [LIFECYCLE][END] status=200 duration_ms=21.64 memory_delta=0
INFO - 2026-02-27 19:37:32 --> [REQ_ID=e7d14f00e131] [PERF] Execution time=0.021314
DEBUG - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [REQUEST][END]
INFO - 2026-02-27 19:37:32 --> [REQ_ID=da4ec4876057] [PERF] Execution time=0.033224
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [REQUEST][START] POST /index.php/login
DEBUG - 2026-02-27 19:37:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:37:35 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [REQUEST][END]
INFO - 2026-02-27 19:37:35 --> [REQ_ID=5ef6f61cd9b7] [PERF] Execution time=0.010543
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 19:37:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:37:35 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=218c9a7440de] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:37:35 --> [REQ_ID=218c9a7440de] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [LIFECYCLE][END] status=200 duration_ms=18.70 memory_delta=0
INFO - 2026-02-27 19:37:35 --> [REQ_ID=218c9a7440de] [PERF] Execution time=0.018506
DEBUG - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [REQUEST][END]
INFO - 2026-02-27 19:37:35 --> [REQ_ID=d74ed19da724] [PERF] Execution time=0.026869
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 19:37:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:37:39 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=59d81d272954] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:37:39 --> [REQ_ID=59d81d272954] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [LIFECYCLE][END] status=200 duration_ms=19.34 memory_delta=0
INFO - 2026-02-27 19:37:39 --> [REQ_ID=59d81d272954] [PERF] Execution time=0.018994
DEBUG - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [REQUEST][END]
INFO - 2026-02-27 19:37:39 --> [REQ_ID=ad5e4fecd1ad] [PERF] Execution time=0.032646
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [REQUEST][START] POST /index.php/login
DEBUG - 2026-02-27 19:37:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:37:41 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
INFO - 2026-02-27 19:37:41 --> CSRF token verified.
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=82d9eccc3b6a] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-27 19:37:41 --> [REQ_ID=82d9eccc3b6a] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 19:37:41 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-27 19:37:41 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-27 19:37:41 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36
DEBUG - 2026-02-27 19:37:41 --> Auth attemptLogin() called with login identifier: tburks2392, remember: false
DEBUG - 2026-02-27 19:37:41 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-02-27 19:37:41 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-27 19:37:41 --> Auth attempt succeeded for identifier tburks2392. logged_in(): yes, user_id(): 2
DEBUG - 2026-02-27 19:37:41 --> Auth attempt succeeded. logged_in(): yes, user_id(): 2
DEBUG - 2026-02-27 19:37:41 --> Auth attemptLogin() - session user_id set to: 2
INFO - 2026-02-27 19:37:41 --> [AUTH] Login success
DEBUG - 2026-02-27 19:37:41 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [LIFECYCLE][END] status=303 duration_ms=114.70 memory_delta=0
INFO - 2026-02-27 19:37:41 --> [REQ_ID=82d9eccc3b6a] [PERF] Execution time=0.114388
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [REQUEST][END]
INFO - 2026-02-27 19:37:41 --> [REQ_ID=ee5ab6359a90] [PERF] Execution time=0.123827
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=d4232b275f22] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-27 19:37:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=d4232b275f22] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=d4232b275f22] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=d4232b275f22] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 19:37:41 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=75a7f548da4a] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-02-27 19:37:41 --> [REQ_ID=75a7f548da4a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:41 --> [REQ_ID=75a7f548da4a] [METHOD_ENTRY] index
DEBUG - 2026-02-27 19:37:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:42 --> [DASHBOARD] Enter
ERROR - 2026-02-27 19:37:42 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-27 19:37:42 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-02-27 19:37:42 --> Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:42\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:42\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:42\'')
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
12 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-02-27 19:37:42 --> MyMIInvestments::getSqueezeHighRiskCount failed: Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
DEBUG - 2026-02-27 19:37:42 --> 📰 Daily dashboard news window 2026-02-27 00:00:00 -> 2026-02-27 23:59:59 returned 0 rows
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SETUP] Status computed
DEBUG - 2026-02-27 19:37:42 --> [REQ_ID=75a7f548da4a] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-02-27 19:37:42 --> [REQ_ID=75a7f548da4a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"01"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"01"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"01","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-02-27 19:37:42 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:42 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 19:37:42 --> getSolanaData: invalid address param
INFO - 2026-02-27 19:37:42 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 19:37:42 --> [REQ_ID=d4232b275f22] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:42 --> [REQ_ID=d4232b275f22] [LIFECYCLE][END] status=200 duration_ms=885.87 memory_delta=2097152
INFO - 2026-02-27 19:37:42 --> [REQ_ID=75a7f548da4a] [PERF] Execution time=0.880106
DEBUG - 2026-02-27 19:37:42 --> [REQ_ID=d4232b275f22] [REQUEST][END]
INFO - 2026-02-27 19:37:42 --> [REQ_ID=d4232b275f22] [PERF] Execution time=0.898773
DEBUG - 2026-02-27 19:37:43 --> [REQ_ID=631119423a4f] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-02-27 19:37:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:43 --> [REQ_ID=631119423a4f] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-02-27 19:37:43 --> [REQ_ID=631119423a4f] [ROUTE] Controller=\App\Controllers\OpsController Method=health
DEBUG - 2026-02-27 19:37:43 --> [REQ_ID=631119423a4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-02-27 19:37:43 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
CRITICAL - 2026-02-27 19:37:43 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: ops/health]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 19:37:43 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 19:37:43 --> [404] URI=https://www.mymiwallet.com/index.php/ops/health
WARNING - 2026-02-27 19:37:43 --> 404 route miss: https://www.mymiwallet.com/index.php/ops/health | referrer: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 19:37:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=all&window=6h
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=22711c3728bf] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 19:37:52 --> [REQ_ID=22711c3728bf] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=22711c3728bf] [METHOD_ENTRY] getConfidenceHeatmap
DEBUG - 2026-02-27 19:37:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:52 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:52 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-02-27 19:37:52 --> API getConfidenceHeatmap failed: App\Services\ForecastAggregationService::getConfidenceHeatmap(): Argument #2 ($windowMinutes) must be of type int, string given, called in /home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/InvestmentsAPIController.php on line 301
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [LIFECYCLE][END] status=500 duration_ms=36.30 memory_delta=0
INFO - 2026-02-27 19:37:52 --> [REQ_ID=22711c3728bf] [PERF] Execution time=0.036208
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [REQUEST][END]
INFO - 2026-02-27 19:37:52 --> [REQ_ID=d91c98feb1b8] [PERF] Execution time=0.050126
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=a5270099f8d0] [REQUEST][START] GET /index.php/ops/health
DEBUG - 2026-02-27 19:37:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=a5270099f8d0] [FILTER_BEFORE] /index.php/ops/health
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=a5270099f8d0] [ROUTE] Controller=\App\Controllers\OpsController Method=health
DEBUG - 2026-02-27 19:37:52 --> [REQ_ID=a5270099f8d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/ops/health
DEBUG - 2026-02-27 19:37:52 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
CRITICAL - 2026-02-27 19:37:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: ops/health]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 19:37:52 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 19:37:52 --> [404] URI=https://www.mymiwallet.com/index.php/ops/health
WARNING - 2026-02-27 19:37:52 --> 404 route miss: https://www.mymiwallet.com/index.php/ops/health | referrer: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-27 19:37:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-27 19:37:53 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [INIT] App\Modules\User\Controllers\DashboardController::GET
INFO - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [METHOD_ENTRY] index
DEBUG - 2026-02-27 19:37:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:53 --> [DASHBOARD] Enter
ERROR - 2026-02-27 19:37:53 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-27 19:37:53 --> [CACHE_MISS] mymiwallet_development_squeeze_high-risk_global_global_1f86633dd
ERROR - 2026-02-27 19:37:53 --> Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:53\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:53\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-26 19:37:53\'')
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
12 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
DEBUG - 2026-02-27 19:37:53 --> MyMIInvestments::getSqueezeHighRiskCount failed: Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
DEBUG - 2026-02-27 19:37:53 --> 📰 Daily dashboard news window 2026-02-27 00:00:00 -> 2026-02-27 23:59:59 returned 0 rows
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SETUP] Status computed
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [VIEW_RENDER] User/Dashboard/index
INFO - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [REQUEST][START] GET /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=87c07e870236] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=ec7da4cd75ac] [REQUEST][START] GET /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"02","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"01"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"01"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"01","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"03"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"03"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","month":"03","year":"2026","status":1}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Investment","status":1}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="status"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
INFO - 2026-02-27 19:37:53 --> DashboardController L72 - $checkingSummary: 8784.01
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:53 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 19:37:53 --> getSolanaData: invalid address param
INFO - 2026-02-27 19:37:53 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [LIFECYCLE][END] status=200 duration_ms=394.25 memory_delta=2097152
INFO - 2026-02-27 19:37:53 --> [REQ_ID=f1588126a18d] [PERF] Execution time=0.387556
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [REQUEST][END]
INFO - 2026-02-27 19:37:53 --> [REQ_ID=3bdb7d33155d] [PERF] Execution time=0.428594
DEBUG - 2026-02-27 19:37:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [FILTER_BEFORE] /index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastAccuracySummary
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastAccuracySummary?window=7d
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=cc5279869b40] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 19:37:53 --> [REQ_ID=cc5279869b40] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=cc5279869b40] [METHOD_ENTRY] getForecastAccuracySummary
DEBUG - 2026-02-27 19:37:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-02-27 19:37:53 --> API getForecastAccuracySummary failed: Call to undefined method App\Services\ForecastAccuracyEvaluator::getAccuracyDashboardData()
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [LIFECYCLE][END] status=500 duration_ms=132.33 memory_delta=2097152
INFO - 2026-02-27 19:37:53 --> [REQ_ID=cc5279869b40] [PERF] Execution time=0.131160
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [REQUEST][END]
INFO - 2026-02-27 19:37:53 --> [REQ_ID=9683aa5e6ea4] [PERF] Execution time=0.410193
DEBUG - 2026-02-27 19:37:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=87c07e870236] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=87c07e870236] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=87c07e870236] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=00bf4e737541] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 19:37:53 --> [REQ_ID=00bf4e737541] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:37:53 --> [REQ_ID=00bf4e737541] [METHOD_ENTRY] getForecastHighlights
DEBUG - 2026-02-27 19:37:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=87c07e870236] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=87c07e870236] [LIFECYCLE][END] status=200 duration_ms=466.68 memory_delta=2097152
INFO - 2026-02-27 19:37:54 --> [REQ_ID=00bf4e737541] [PERF] Execution time=0.466252
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=87c07e870236] [REQUEST][END]
INFO - 2026-02-27 19:37:54 --> [REQ_ID=87c07e870236] [PERF] Execution time=0.883259
DEBUG - 2026-02-27 19:37:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [FILTER_BEFORE] /index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getConfidenceHeatmap
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getConfidenceHeatmap?timeframe=5m&window=60
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=03dbdb68dcfb] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 19:37:54 --> [REQ_ID=03dbdb68dcfb] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=03dbdb68dcfb] [METHOD_ENTRY] getConfidenceHeatmap
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [REQUEST][START] GET /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [LIFECYCLE][END] status=200 duration_ms=164.88 memory_delta=2097152
INFO - 2026-02-27 19:37:54 --> [REQ_ID=03dbdb68dcfb] [PERF] Execution time=0.164295
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [REQUEST][END]
INFO - 2026-02-27 19:37:54 --> [REQ_ID=ec7da4cd75ac] [PERF] Execution time=1.064850
DEBUG - 2026-02-27 19:37:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [FILTER_BEFORE] /index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [ROUTE] Controller=\App\Modules\APIs\Controllers\InvestmentsAPIController Method=getForecastHighlights
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Investments/getForecastHighlights
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=7cec57f2278a] [INIT] App\Modules\APIs\Controllers\InvestmentsAPIController::GET
INFO - 2026-02-27 19:37:54 --> [REQ_ID=7cec57f2278a] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=7cec57f2278a] [METHOD_ENTRY] getForecastHighlights
DEBUG - 2026-02-27 19:37:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [LIFECYCLE][END] status=200 duration_ms=14.75 memory_delta=0
INFO - 2026-02-27 19:37:54 --> [REQ_ID=7cec57f2278a] [PERF] Execution time=0.014454
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [REQUEST][END]
INFO - 2026-02-27 19:37:54 --> [REQ_ID=2c43ccd551ae] [PERF] Execution time=0.153534
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=a5e2bb9234c7] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-27 19:37:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=a5e2bb9234c7] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=a5e2bb9234c7] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=a5e2bb9234c7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-27 19:37:54 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=55b93f9000c6] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-02-27 19:37:54 --> [REQ_ID=55b93f9000c6] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:37:54 --> [REQ_ID=55b93f9000c6] [METHOD_ENTRY] index
DEBUG - 2026-02-27 19:37:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 19:37:54 --> [REQ_ID=55b93f9000c6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:54 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:54 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 19:37:54 --> getSolanaData: invalid address param
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:37:55 --> MyMIAdvisor::generateAdvisorNotes called for userId: 2
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","status":1,"month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> MyMIAdvisor::generateAdvisorNotes - Avg momentum for user 2: 0
DEBUG - 2026-02-27 19:37:55 --> [REQ_ID=55b93f9000c6] [VIEW_RENDER] App\Modules\User\Views\Alerts\index
INFO - 2026-02-27 19:37:55 --> [REQ_ID=55b93f9000c6] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-27 19:37:55 --> [SERVICE] App\Services\BudgetService ::getUserBudget
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:37:55 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-27 19:37:55 --> getSolanaData: invalid address param
INFO - 2026-02-27 19:37:55 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 19:37:55 --> [REQ_ID=a5e2bb9234c7] [FILTER_AFTER]
DEBUG - 2026-02-27 19:37:55 --> [REQ_ID=a5e2bb9234c7] [LIFECYCLE][END] status=200 duration_ms=531.18 memory_delta=4194304
INFO - 2026-02-27 19:37:55 --> [REQ_ID=55b93f9000c6] [PERF] Execution time=0.519611
DEBUG - 2026-02-27 19:37:55 --> [REQ_ID=a5e2bb9234c7] [REQUEST][END]
INFO - 2026-02-27 19:37:55 --> [REQ_ID=a5e2bb9234c7] [PERF] Execution time=0.542921
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-27 19:38:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-27 19:38:15 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:38:15 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [METHOD_ENTRY] index
DEBUG - 2026-02-27 19:38:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:15 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:15 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:15 --> [BudgetController::METHOD_ENTRY] index
DEBUG - 2026-02-27 19:38:15 --> Dashboard::index() reached in BudgetController. User ID: 2
INFO - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:15 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"1caa0b6daf1dab6d38cb52fca1fbdc49\"","style":"nonce=\"1caa0b6daf1dab6d38cb52fca1fbdc49\""}}
ERROR - 2026-02-27 19:38:15 --> BudgetController::index failed to build executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-27 19:38:15 --> [SETUP] Status computed
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [VIEW_RENDER] App\Modules\User\Views\Budget\index
INFO - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:15 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"1caa0b6daf1dab6d38cb52fca1fbdc49\"","style":"nonce=\"1caa0b6daf1dab6d38cb52fca1fbdc49\""}}
INFO - 2026-02-27 19:38:15 --> themesMemory usage: 4194304
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [LIFECYCLE][END] status=200 duration_ms=76.06 memory_delta=0
INFO - 2026-02-27 19:38:15 --> [REQ_ID=0fd4ec36dae6] [PERF] Execution time=0.046602
DEBUG - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [REQUEST][END]
INFO - 2026-02-27 19:38:15 --> [REQ_ID=78197ed7f957] [PERF] Execution time=0.089696
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [REQUEST][START] GET /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [FILTER_BEFORE] /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=4f77e5148136] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:17 --> [REQ_ID=4f77e5148136] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=4f77e5148136] [METHOD_ENTRY] getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:17 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] getUserBudgetRecords
DEBUG - 2026-02-27 19:38:17 --> [CACHE_MISS] mymiwallet_development_budget_budget-records_uid_2_97d170e1550e
DEBUG - 2026-02-27 19:38:17 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"deleted":0}
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [LIFECYCLE][END] status=200 duration_ms=33.04 memory_delta=0
INFO - 2026-02-27 19:38:17 --> [REQ_ID=4f77e5148136] [PERF] Execution time=0.032888
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [REQUEST][END]
INFO - 2026-02-27 19:38:17 --> [REQ_ID=c2c62c6560c6] [PERF] Execution time=0.048314
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [REQUEST][START] GET /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [REQUEST][START] GET /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [REQUEST][START] GET /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [FILTER_BEFORE] /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=3f8232441dec] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:17 --> [REQ_ID=3f8232441dec] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=3f8232441dec] [METHOD_ENTRY] getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:17 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] getUserCreditBalances
DEBUG - 2026-02-27 19:38:17 --> [CACHE_MISS] mymiwallet_development_budget_credit-balances_uid_2_97d170e1550e
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [LIFECYCLE][END] status=200 duration_ms=20.85 memory_delta=0
INFO - 2026-02-27 19:38:17 --> [REQ_ID=3f8232441dec] [PERF] Execution time=0.020872
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [REQUEST][END]
INFO - 2026-02-27 19:38:17 --> [REQ_ID=c524627f7b8b] [PERF] Execution time=0.033363
DEBUG - 2026-02-27 19:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [FILTER_BEFORE] /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=344e5d02c0a4] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:17 --> [REQ_ID=344e5d02c0a4] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=344e5d02c0a4] [METHOD_ENTRY] getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:17 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:17 --> [CACHE_MISS] mymiwallet_development_budget_repayment-summary_uid_2_97d170e155
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [LIFECYCLE][END] status=200 duration_ms=16.47 memory_delta=0
INFO - 2026-02-27 19:38:17 --> [REQ_ID=344e5d02c0a4] [PERF] Execution time=0.015933
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [REQUEST][END]
INFO - 2026-02-27 19:38:17 --> [REQ_ID=159b1e33c320] [PERF] Execution time=0.058025
DEBUG - 2026-02-27 19:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [FILTER_BEFORE] /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=b685b7c6ba6f] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:17 --> [REQ_ID=b685b7c6ba6f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=b685b7c6ba6f] [METHOD_ENTRY] getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:17 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:17 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] getUserAvailableBalances
DEBUG - 2026-02-27 19:38:17 --> [CACHE_MISS] mymiwallet_development_budget_available-balances_uid_2_97d170e15
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [LIFECYCLE][END] status=200 duration_ms=18.82 memory_delta=0
INFO - 2026-02-27 19:38:17 --> [REQ_ID=b685b7c6ba6f] [PERF] Execution time=0.018266
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [REQUEST][END]
INFO - 2026-02-27 19:38:17 --> [REQ_ID=81ae5e0ca4b4] [PERF] Execution time=0.086646
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-27 19:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-27 19:38:17 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [METHOD_ENTRY] index
DEBUG - 2026-02-27 19:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:17 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:17 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:17 --> [BudgetController::METHOD_ENTRY] index
DEBUG - 2026-02-27 19:38:17 --> Dashboard::index() reached in BudgetController. User ID: 2
INFO - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:17 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"493a050d85a76d981b79e478a7c2316c\"","style":"nonce=\"493a050d85a76d981b79e478a7c2316c\""}}
ERROR - 2026-02-27 19:38:17 --> BudgetController::index failed to build executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-27 19:38:17 --> [SETUP] Status computed
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [VIEW_RENDER] App\Modules\User\Views\Budget\index
INFO - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:17 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"493a050d85a76d981b79e478a7c2316c\"","style":"nonce=\"493a050d85a76d981b79e478a7c2316c\""}}
INFO - 2026-02-27 19:38:17 --> themesMemory usage: 4194304
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [LIFECYCLE][END] status=200 duration_ms=62.16 memory_delta=0
INFO - 2026-02-27 19:38:17 --> [REQ_ID=48d56ce28470] [PERF] Execution time=0.051554
DEBUG - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [REQUEST][END]
INFO - 2026-02-27 19:38:17 --> [REQ_ID=cd49f30abf6a] [PERF] Execution time=0.072847
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [REQUEST][START] GET /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [REQUEST][START] GET /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [REQUEST][START] GET /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [REQUEST][START] GET /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [FILTER_BEFORE] /index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=f74179d39dbc] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:18 --> [REQ_ID=f74179d39dbc] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=f74179d39dbc] [METHOD_ENTRY] getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:18 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] getUserBudgetRecords
DEBUG - 2026-02-27 19:38:18 --> [CACHE_HIT] mymiwallet_development_budget_budget-records_uid_2_97d170e1550e
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [LIFECYCLE][END] status=200 duration_ms=17.90 memory_delta=0
INFO - 2026-02-27 19:38:18 --> [REQ_ID=f74179d39dbc] [PERF] Execution time=0.017623
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [REQUEST][END]
INFO - 2026-02-27 19:38:18 --> [REQ_ID=106a993be491] [PERF] Execution time=0.031445
DEBUG - 2026-02-27 19:38:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [FILTER_BEFORE] /index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=2d91192cc893] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:18 --> [REQ_ID=2d91192cc893] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=2d91192cc893] [METHOD_ENTRY] getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:18 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] getUserAvailableBalances
DEBUG - 2026-02-27 19:38:18 --> [CACHE_HIT] mymiwallet_development_budget_available-balances_uid_2_97d170e15
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [LIFECYCLE][END] status=200 duration_ms=17.53 memory_delta=0
INFO - 2026-02-27 19:38:18 --> [REQ_ID=2d91192cc893] [PERF] Execution time=0.017512
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [REQUEST][END]
INFO - 2026-02-27 19:38:18 --> [REQ_ID=3387c158463e] [PERF] Execution time=0.050934
DEBUG - 2026-02-27 19:38:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [FILTER_BEFORE] /index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=a21a19d5866e] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:18 --> [REQ_ID=a21a19d5866e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=a21a19d5866e] [METHOD_ENTRY] getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:18 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] getUserCreditBalances
DEBUG - 2026-02-27 19:38:18 --> [CACHE_HIT] mymiwallet_development_budget_credit-balances_uid_2_97d170e1550e
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [LIFECYCLE][END] status=200 duration_ms=15.90 memory_delta=0
INFO - 2026-02-27 19:38:18 --> [REQ_ID=a21a19d5866e] [PERF] Execution time=0.015677
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [REQUEST][END]
INFO - 2026-02-27 19:38:18 --> [REQ_ID=65028736e684] [PERF] Execution time=0.072517
DEBUG - 2026-02-27 19:38:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [FILTER_BEFORE] /index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [ROUTE] Controller=\App\Modules\APIs\Controllers\BudgetAPIController Method=getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Budget/getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=e0a115cb4d86] [INIT] App\Modules\APIs\Controllers\BudgetAPIController::GET
INFO - 2026-02-27 19:38:18 --> [REQ_ID=e0a115cb4d86] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=e0a115cb4d86] [METHOD_ENTRY] getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 19:38:18 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:18 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:18 --> [BudgetController::METHOD_ENTRY] getUserRepaymentSummary
DEBUG - 2026-02-27 19:38:18 --> [CACHE_HIT] mymiwallet_development_budget_repayment-summary_uid_2_97d170e155
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [LIFECYCLE][END] status=200 duration_ms=20.02 memory_delta=0
INFO - 2026-02-27 19:38:18 --> [REQ_ID=e0a115cb4d86] [PERF] Execution time=0.020019
DEBUG - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [REQUEST][END]
INFO - 2026-02-27 19:38:18 --> [REQ_ID=c9f9174788ef] [PERF] Execution time=0.105832
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [REQUEST][START] GET /index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [FILTER_BEFORE] /index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=add
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:22 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:38:22 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [METHOD_ENTRY] add
DEBUG - 2026-02-27 19:38:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:22 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:22 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:22 --> [BudgetController::METHOD_ENTRY] add
INFO - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:22 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9fcdb1af85440f51fef821fe38d694b1\"","style":"nonce=\"9fcdb1af85440f51fef821fe38d694b1\""}}
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [VIEW_RENDER] App\Modules\User\Views\Budget\Add
INFO - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:22 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9fcdb1af85440f51fef821fe38d694b1\"","style":"nonce=\"9fcdb1af85440f51fef821fe38d694b1\""}}
DEBUG - 2026-02-27 19:38:22 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:22 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 19:38:22 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-27 19:38:22 --> $formMode: Add
INFO - 2026-02-27 19:38:22 --> themesMemory usage: 4194304
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [LIFECYCLE][END] status=200 duration_ms=45.04 memory_delta=0
INFO - 2026-02-27 19:38:22 --> [REQ_ID=655da7e00cd2] [PERF] Execution time=0.036871
DEBUG - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [REQUEST][END]
INFO - 2026-02-27 19:38:22 --> [REQ_ID=cc44ea2b9535] [PERF] Execution time=0.056323
DEBUG - 2026-02-27 19:38:35 --> [REQ_ID=00d8b9d4752a] [REQUEST][START] POST /index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:38:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:35 --> [REQ_ID=00d8b9d4752a] [FILTER_BEFORE] /index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:38:35 --> [REQ_ID=00d8b9d4752a] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=accountManager
DEBUG - 2026-02-27 19:38:35 --> [REQ_ID=00d8b9d4752a] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:38:35 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
CRITICAL - 2026-02-27 19:38:35 --> [CSRF][EXCEPTION] The action you requested is not allowed.
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [REQUEST][START] GET /index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [FILTER_BEFORE] /index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=add
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Add/Income
DEBUG - 2026-02-27 19:38:55 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
DEBUG - 2026-02-27 19:38:55 --> [BudgetController::METHOD_ENTRY] initController
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [INIT] App\Modules\User\Controllers\BudgetController::GET
INFO - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [METHOD_ENTRY] add
DEBUG - 2026-02-27 19:38:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 19:38:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:55 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-27 19:38:55 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-27 19:38:55 --> [BudgetController::METHOD_ENTRY] add
INFO - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:55 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b4598cc6dd350ee8b51120cef1603382\"","style":"nonce=\"b4598cc6dd350ee8b51120cef1603382\""}}
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [VIEW_RENDER] App\Modules\User\Views\Budget\Add
INFO - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 19:38:55 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b4598cc6dd350ee8b51120cef1603382\"","style":"nonce=\"b4598cc6dd350ee8b51120cef1603382\""}}
DEBUG - 2026-02-27 19:38:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 19:38:55 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-27 19:38:55 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-27 19:38:55 --> $formMode: Add
INFO - 2026-02-27 19:38:55 --> themesMemory usage: 4194304
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [FILTER_AFTER]
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [LIFECYCLE][END] status=200 duration_ms=37.55 memory_delta=0
INFO - 2026-02-27 19:38:55 --> [REQ_ID=5cab9c224136] [PERF] Execution time=0.033432
DEBUG - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [REQUEST][END]
INFO - 2026-02-27 19:38:55 --> [REQ_ID=b49552e14422] [PERF] Execution time=0.047322
DEBUG - 2026-02-27 19:39:08 --> [REQ_ID=016e1492fc74] [REQUEST][START] POST /index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:39:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:39:08 --> [REQ_ID=016e1492fc74] [FILTER_BEFORE] /index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:39:08 --> [REQ_ID=016e1492fc74] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=accountManager
DEBUG - 2026-02-27 19:39:08 --> [REQ_ID=016e1492fc74] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/Budget/Account-Manager
DEBUG - 2026-02-27 19:39:08 --> [CSRF] token name=csrf_test_name hash=cbb5ec5a160a06fd8ce45ea108a5c811
CRITICAL - 2026-02-27 19:39:08 --> [CSRF][EXCEPTION] The action you requested is not allowed.
DEBUG - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [REQUEST][START] GET /index.php/Management/Assets
DEBUG - 2026-02-27 19:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [FILTER_BEFORE] /index.php/Management/Assets
DEBUG - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsAdminController Method=index
DEBUG - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Assets
DEBUG - 2026-02-27 19:40:52 --> [CSRF] token name=csrf_test_name hash=ef642c4ed5721eefda04a23aa6ec562b
DEBUG - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [REQUEST][END]
INFO - 2026-02-27 19:40:52 --> [REQ_ID=411c921b4fe1] [PERF] Execution time=0.056053
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 19:40:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 19:40:53 --> [CSRF] token name=csrf_test_name hash=4cacf92101a7c580af0d2e612a575527
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=5f5df9cea75c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 19:40:53 --> [REQ_ID=5f5df9cea75c] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [FILTER_AFTER]
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [LIFECYCLE][END] status=200 duration_ms=32.94 memory_delta=0
INFO - 2026-02-27 19:40:53 --> [REQ_ID=5f5df9cea75c] [PERF] Execution time=0.031230
DEBUG - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [REQUEST][END]
INFO - 2026-02-27 19:40:53 --> [REQ_ID=d89c5680f39c] [PERF] Execution time=0.045114
INFO - 2026-02-27 19:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 19:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 19:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 19:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 19:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 19:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040802
INFO - 2026-02-27 19:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 20:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 20:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 20:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 20:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-27 20:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 20:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.121719
INFO - 2026-02-27 20:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [REQUEST][END]
INFO - 2026-02-27 20:00:01 --> [REQ_ID=3632e84344f7] [PERF] Execution time=0.059618
INFO - 2026-02-27 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 20:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 20:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.041749
INFO - 2026-02-27 20:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-02-27 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 20:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 20:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 20:00:03 --> LOG_HEALTHCHECK debug marker=a8e0e5904173
INFO - 2026-02-27 20:00:03 --> LOG_HEALTHCHECK info marker=a8e0e5904173
NOTICE - 2026-02-27 20:00:03 --> LOG_HEALTHCHECK probe marker=a8e0e5904173
INFO - 2026-02-27 20:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 20:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.032847
INFO - 2026-02-27 20:00:03 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-02-27 20:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 20:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 20:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 20:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 20:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 20:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.761930
INFO - 2026-02-27 20:00:05 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 20:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 20:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 20:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [REQUEST][END]
INFO - 2026-02-27 20:15:02 --> [REQ_ID=ff1abdfbecce] [PERF] Execution time=0.064700
INFO - 2026-02-27 20:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 20:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.182267
INFO - 2026-02-27 20:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-02-27 20:17:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-02-27 20:17:06 --> [CSRF] token name=csrf_test_name hash=cb7d0f46ffff9ccea6e67d6c3cbc584f
DEBUG - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [REQUEST][END]
INFO - 2026-02-27 20:17:06 --> [REQ_ID=f0dcdc041323] [PERF] Execution time=0.054436
DEBUG - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-27 20:17:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-27 20:17:10 --> [CSRF] token name=csrf_test_name hash=86c91c12cfed59a0be902fc74457ac66
DEBUG - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [REQUEST][END]
INFO - 2026-02-27 20:17:10 --> [REQ_ID=9da7f745b9ac] [PERF] Execution time=0.013394
DEBUG - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-02-27 20:17:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-02-27 20:17:14 --> [CSRF] token name=csrf_test_name hash=1c340f2468f2807d3ce1c0e11cc0f841
DEBUG - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [REQUEST][END]
INFO - 2026-02-27 20:17:14 --> [REQ_ID=bb213ea338f9] [PERF] Execution time=0.013785
DEBUG - 2026-02-27 20:25:06 --> [REQ_ID=4cb1c977b7dd] [REQUEST][START] GET /index.php/How-To-Guides
DEBUG - 2026-02-27 20:25:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 20:25:07 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 20:25:07 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 20:25:07 --> [404] URI=https://www.mymiwallet.com/index.php/How-To-Guides
WARNING - 2026-02-27 20:25:07 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: none
DEBUG - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [REQUEST][START] GET /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-02-27 20:27:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [FILTER_BEFORE] /index.php/Management/Marketing/Content/Listing
DEBUG - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=contentListing
DEBUG - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Content/Listing
DEBUG - 2026-02-27 20:27:11 --> [CSRF] token name=csrf_test_name hash=7b27e4e83b6d25c905e7c399d209e4ff
DEBUG - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [REQUEST][END]
INFO - 2026-02-27 20:27:11 --> [REQ_ID=d4abb3ac6c3f] [PERF] Execution time=0.060499
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 20:27:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 20:27:12 --> [CSRF] token name=csrf_test_name hash=55bd7420e72f9028071003df5042ca46
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=8d1470c51012] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 20:27:12 --> [REQ_ID=8d1470c51012] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [FILTER_AFTER]
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [LIFECYCLE][END] status=200 duration_ms=66.89 memory_delta=0
INFO - 2026-02-27 20:27:12 --> [REQ_ID=8d1470c51012] [PERF] Execution time=0.066658
DEBUG - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [REQUEST][END]
INFO - 2026-02-27 20:27:12 --> [REQ_ID=bdeb39c14418] [PERF] Execution time=0.079993
INFO - 2026-02-27 20:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 20:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 20:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 20:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 20:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.137227
INFO - 2026-02-27 20:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [REQUEST][START] GET /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-02-27 20:36:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [FILTER_BEFORE] /index.php/Management/Marketing/Video-Creator
DEBUG - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=videoCreator
DEBUG - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Video-Creator
DEBUG - 2026-02-27 20:36:54 --> [CSRF] token name=csrf_test_name hash=dd102ee849373a82540add30d9c487d7
DEBUG - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [REQUEST][END]
INFO - 2026-02-27 20:36:54 --> [REQ_ID=9a8669344f79] [PERF] Execution time=0.059929
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 20:36:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 20:36:55 --> [CSRF] token name=csrf_test_name hash=dbe31a76b8b8c1cc10b64640401de1d6
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=8aaa36637426] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 20:36:55 --> [REQ_ID=8aaa36637426] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [FILTER_AFTER]
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [LIFECYCLE][END] status=200 duration_ms=323.17 memory_delta=0
INFO - 2026-02-27 20:36:55 --> [REQ_ID=8aaa36637426] [PERF] Execution time=0.322862
DEBUG - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [REQUEST][END]
INFO - 2026-02-27 20:36:55 --> [REQ_ID=2c365c931dd9] [PERF] Execution time=0.335821
INFO - 2026-02-27 20:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 20:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 20:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 20:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 20:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 20:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.249454
INFO - 2026-02-27 20:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 20:45:23 --> [REQ_ID=2ca6be6ff30e] [REQUEST][START] GET /
DEBUG - 2026-02-27 20:45:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:45:23 --> [REQ_ID=2ca6be6ff30e] [FILTER_BEFORE] /
DEBUG - 2026-02-27 20:45:23 --> [REQ_ID=2ca6be6ff30e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 20:45:23 --> [REQ_ID=2ca6be6ff30e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 20:45:23 --> [CSRF] token name=csrf_test_name hash=29f83f1c9595276818930864055ffef1
DEBUG - 2026-02-27 20:45:23 --> [REQ_ID=f89d8d44ebc8] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 20:45:23 --> [REQ_ID=f89d8d44ebc8] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 20:45:23 --> [REQ_ID=f89d8d44ebc8] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 20:45:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 20:45:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=f89d8d44ebc8] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 20:45:24 --> [REQ_ID=f89d8d44ebc8] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 20:45:24 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 20:45:24 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=2ca6be6ff30e] [FILTER_AFTER]
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=2ca6be6ff30e] [LIFECYCLE][END] status=200 duration_ms=830.55 memory_delta=4194304
INFO - 2026-02-27 20:45:24 --> [REQ_ID=f89d8d44ebc8] [PERF] Execution time=0.828349
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=2ca6be6ff30e] [REQUEST][END]
INFO - 2026-02-27 20:45:24 --> [REQ_ID=2ca6be6ff30e] [PERF] Execution time=0.871277
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=96f0b52b5a77] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 20:45:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=96f0b52b5a77] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=96f0b52b5a77] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=96f0b52b5a77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-27 20:45:24 --> [CSRF] token name=csrf_test_name hash=f6c9e1e9afa88ebc8cb540c8af24760f
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=306418f1b29d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 20:45:24 --> [REQ_ID=306418f1b29d] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 20:45:24 --> [REQ_ID=306418f1b29d] [METHOD_ENTRY] show
DEBUG - 2026-02-27 20:45:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 20:45:24 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 20:45:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=96f0b52b5a77] [FILTER_AFTER]
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=96f0b52b5a77] [LIFECYCLE][END] status=404 duration_ms=50.26 memory_delta=0
INFO - 2026-02-27 20:45:25 --> [REQ_ID=306418f1b29d] [PERF] Execution time=0.049977
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=96f0b52b5a77] [REQUEST][END]
INFO - 2026-02-27 20:45:25 --> [REQ_ID=96f0b52b5a77] [PERF] Execution time=0.064502
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 20:45:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-27 20:45:25 --> [CSRF] token name=csrf_test_name hash=ae72ab0afbf8fce336af300325d3dcd6
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=ef3c61c96290] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 20:45:25 --> [REQ_ID=ef3c61c96290] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=ef3c61c96290] [METHOD_ENTRY] show
DEBUG - 2026-02-27 20:45:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 20:45:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 20:45:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [FILTER_AFTER]
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [LIFECYCLE][END] status=404 duration_ms=17.29 memory_delta=0
INFO - 2026-02-27 20:45:25 --> [REQ_ID=ef3c61c96290] [PERF] Execution time=0.017018
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [REQUEST][END]
INFO - 2026-02-27 20:45:25 --> [REQ_ID=de6a156ed0e3] [PERF] Execution time=0.027032
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=622b4c7b7019] [REQUEST][START] GET /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 20:45:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=622b4c7b7019] [FILTER_BEFORE] /index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=622b4c7b7019] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=622b4c7b7019] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Setting-Financial-Goals
DEBUG - 2026-02-27 20:45:25 --> [CSRF] token name=csrf_test_name hash=ec6454f6c8bc3b28561cc2e58d589b60
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=b732426b23e9] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 20:45:25 --> [REQ_ID=b732426b23e9] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 20:45:25 --> [REQ_ID=b732426b23e9] [METHOD_ENTRY] show
DEBUG - 2026-02-27 20:45:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 20:45:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 20:45:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 20:45:25 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 20:45:25 --> [REQ_ID=b732426b23e9] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-27 20:45:26 --> [REQ_ID=b732426b23e9] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Determining_Your_Financial_Goals
INFO - 2026-02-27 20:45:26 --> [REQ_ID=b732426b23e9] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 20:45:26 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 20:45:26 --> [REQ_ID=622b4c7b7019] [FILTER_AFTER]
DEBUG - 2026-02-27 20:45:26 --> [REQ_ID=622b4c7b7019] [LIFECYCLE][END] status=200 duration_ms=1,114.14 memory_delta=8388608
INFO - 2026-02-27 20:45:26 --> [REQ_ID=b732426b23e9] [PERF] Execution time=1.114107
DEBUG - 2026-02-27 20:45:26 --> [REQ_ID=622b4c7b7019] [REQUEST][END]
INFO - 2026-02-27 20:45:26 --> [REQ_ID=622b4c7b7019] [PERF] Execution time=1.123531
INFO - 2026-02-27 21:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 21:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 21:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 21:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 21:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 21:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.071549
INFO - 2026-02-27 21:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [REQUEST][END]
INFO - 2026-02-27 21:00:01 --> [REQ_ID=1c65e8c0e2c9] [PERF] Execution time=0.055249
DEBUG - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [REQUEST][START] GET /index.php/Profile
DEBUG - 2026-02-27 21:03:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [FILTER_BEFORE] /index.php/Profile
DEBUG - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [ROUTE] Controller=\App\Controllers\App\Modules\User\Controllers\DashboardController Method=profile
DEBUG - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Profile
DEBUG - 2026-02-27 21:03:15 --> [CSRF] token name=csrf_test_name hash=54f3b501cf9a780d3612aeb07337f928
DEBUG - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [REQUEST][END]
INFO - 2026-02-27 21:03:15 --> [REQ_ID=fbbac1f1a54b] [PERF] Execution time=0.047958
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 21:03:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 21:03:16 --> [CSRF] token name=csrf_test_name hash=fb75ed10e470d3db3af72f7ece18a87c
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=e7021665fda6] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 21:03:16 --> [REQ_ID=e7021665fda6] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [FILTER_AFTER]
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [LIFECYCLE][END] status=200 duration_ms=68.19 memory_delta=0
INFO - 2026-02-27 21:03:16 --> [REQ_ID=e7021665fda6] [PERF] Execution time=0.067852
DEBUG - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [REQUEST][END]
INFO - 2026-02-27 21:03:16 --> [REQ_ID=290d4206aa42] [PERF] Execution time=0.084675
DEBUG - 2026-02-27 21:07:28 --> [REQ_ID=d5ea6c70baef] [REQUEST][START] GET /
DEBUG - 2026-02-27 21:07:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [FILTER_BEFORE] /
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 21:07:29 --> [CSRF] token name=csrf_test_name hash=ffa2d564d86a1ae3bd20afa05d6cb977
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 21:07:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 21:07:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 21:07:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 21:07:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [FILTER_AFTER]
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [LIFECYCLE][END] status=200 duration_ms=715.61 memory_delta=4194304
INFO - 2026-02-27 21:07:29 --> [REQ_ID=8c77d873f6d1] [PERF] Execution time=0.713218
DEBUG - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [REQUEST][END]
INFO - 2026-02-27 21:07:29 --> [REQ_ID=d5ea6c70baef] [PERF] Execution time=0.753785
DEBUG - 2026-02-27 21:12:30 --> [REQ_ID=1e7f509a5a79] [REQUEST][START] GET /index.php/Investments/News
DEBUG - 2026-02-27 21:12:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-27 21:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 21:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 21:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 21:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 21:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 21:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027057
INFO - 2026-02-27 21:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [REQUEST][END]
INFO - 2026-02-27 21:15:01 --> [REQ_ID=fb1f3fb8432e] [PERF] Execution time=0.060235
DEBUG - 2026-02-27 21:18:28 --> [REQ_ID=2dc563a392a1] [REQUEST][START] GET /
DEBUG - 2026-02-27 21:18:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:18:28 --> [REQ_ID=2dc563a392a1] [FILTER_BEFORE] /
DEBUG - 2026-02-27 21:18:28 --> [REQ_ID=2dc563a392a1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 21:18:28 --> [REQ_ID=2dc563a392a1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 21:18:28 --> [CSRF] token name=csrf_test_name hash=2270974c2b098b46792ba3f00678faa6
DEBUG - 2026-02-27 21:18:28 --> [REQ_ID=72d8d4c1cef9] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 21:18:28 --> [REQ_ID=72d8d4c1cef9] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 21:18:28 --> [REQ_ID=72d8d4c1cef9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 21:18:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 21:18:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 21:18:29 --> [REQ_ID=72d8d4c1cef9] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 21:18:29 --> [REQ_ID=72d8d4c1cef9] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 21:18:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 21:18:29 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 21:18:29 --> [REQ_ID=2dc563a392a1] [FILTER_AFTER]
DEBUG - 2026-02-27 21:18:29 --> [REQ_ID=2dc563a392a1] [LIFECYCLE][END] status=200 duration_ms=920.08 memory_delta=4194304
INFO - 2026-02-27 21:18:29 --> [REQ_ID=72d8d4c1cef9] [PERF] Execution time=0.917227
DEBUG - 2026-02-27 21:18:29 --> [REQ_ID=2dc563a392a1] [REQUEST][END]
INFO - 2026-02-27 21:18:29 --> [REQ_ID=2dc563a392a1] [PERF] Execution time=0.958966
INFO - 2026-02-27 21:30:02 --> [spark:ops:work] Started
INFO - 2026-02-27 21:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 21:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 21:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 21:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 21:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.120940
INFO - 2026-02-27 21:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-02-27 21:38:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-02-27 21:38:53 --> [CSRF] token name=csrf_test_name hash=213ef57aa47dfb6967d242e2399cebcd
DEBUG - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [REQUEST][END]
INFO - 2026-02-27 21:38:53 --> [REQ_ID=e33a4100602a] [PERF] Execution time=0.048079
INFO - 2026-02-27 21:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 21:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 21:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 21:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 21:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 21:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031163
INFO - 2026-02-27 21:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 21:50:13 --> [REQ_ID=d8c13a55c039] [REQUEST][START] GET /index.php/Budget/Financial-Institute
DEBUG - 2026-02-27 21:50:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 21:50:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Budget/Financial-Institute]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 21:50:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 21:50:13 --> [404] URI=https://www.mymiwallet.com/index.php/Budget/Financial-Institute
WARNING - 2026-02-27 21:50:13 --> 404 route miss: https://www.mymiwallet.com/index.php/Budget/Financial-Institute | referrer: none
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=106c775a26e7] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 21:50:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=106c775a26e7] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=106c775a26e7] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=106c775a26e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 21:50:31 --> [CSRF] token name=csrf_test_name hash=d4577c4b92b56ddf09a9ee934572ee3e
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [METHOD_ENTRY] show
DEBUG - 2026-02-27 21:50:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 21:50:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 21:50:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 21:50:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 21:50:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 21:50:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-27 21:50:31 --> [REQ_ID=4ccf01889f12] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 21:50:32 --> themesMemory usage: 12582912
DEBUG - 2026-02-27 21:50:32 --> [REQ_ID=106c775a26e7] [FILTER_AFTER]
DEBUG - 2026-02-27 21:50:32 --> [REQ_ID=106c775a26e7] [LIFECYCLE][END] status=200 duration_ms=1,186.94 memory_delta=8388608
INFO - 2026-02-27 21:50:32 --> [REQ_ID=4ccf01889f12] [PERF] Execution time=1.183849
DEBUG - 2026-02-27 21:50:32 --> [REQ_ID=106c775a26e7] [REQUEST][END]
INFO - 2026-02-27 21:50:32 --> [REQ_ID=106c775a26e7] [PERF] Execution time=1.207738
DEBUG - 2026-02-27 21:53:03 --> [REQ_ID=1419273ded4a] [REQUEST][START] GET /
DEBUG - 2026-02-27 21:53:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 21:53:03 --> [REQ_ID=1419273ded4a] [FILTER_BEFORE] /
DEBUG - 2026-02-27 21:53:03 --> [REQ_ID=1419273ded4a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 21:53:03 --> [REQ_ID=1419273ded4a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 21:53:03 --> [CSRF] token name=csrf_test_name hash=cb635db5250d774186e223c69419899d
DEBUG - 2026-02-27 21:53:03 --> [REQ_ID=244de48197b0] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 21:53:03 --> [REQ_ID=244de48197b0] [MEMORY][controller-start] 6291456
INFO - 2026-02-27 21:53:03 --> [REQ_ID=244de48197b0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 21:53:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 21:53:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 21:53:04 --> [REQ_ID=244de48197b0] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 21:53:04 --> [REQ_ID=244de48197b0] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 21:53:04 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 21:53:04 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-27 21:53:04 --> [REQ_ID=1419273ded4a] [FILTER_AFTER]
DEBUG - 2026-02-27 21:53:04 --> [REQ_ID=1419273ded4a] [LIFECYCLE][END] status=200 duration_ms=687.66 memory_delta=4194304
INFO - 2026-02-27 21:53:04 --> [REQ_ID=244de48197b0] [PERF] Execution time=0.685702
DEBUG - 2026-02-27 21:53:04 --> [REQ_ID=1419273ded4a] [REQUEST][END]
INFO - 2026-02-27 21:53:04 --> [REQ_ID=1419273ded4a] [PERF] Execution time=0.728475
INFO - 2026-02-27 22:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-27 22:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-27 22:00:02 --> [spark:ops:work] Started
INFO - 2026-02-27 22:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 22:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 22:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [REQUEST][END]
INFO - 2026-02-27 22:00:02 --> [REQ_ID=42f386014a52] [PERF] Execution time=0.057402
INFO - 2026-02-27 22:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 22:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.125900
INFO - 2026-02-27 22:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-27 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-27 22:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-27 22:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-27 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-27 22:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.039549
INFO - 2026-02-27 22:00:03 --> [SPARK_MEMORY] 20971520
INFO - 2026-02-27 22:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-27 22:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-27 22:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-27 22:00:04 --> LOG_HEALTHCHECK debug marker=6710b10c174b
INFO - 2026-02-27 22:00:04 --> LOG_HEALTHCHECK info marker=6710b10c174b
NOTICE - 2026-02-27 22:00:04 --> LOG_HEALTHCHECK probe marker=6710b10c174b
INFO - 2026-02-27 22:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-27 22:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.034437
INFO - 2026-02-27 22:00:04 --> [SPARK_MEMORY] 20971520
DEBUG - 2026-02-27 22:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-27 22:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-27 22:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-27 22:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-27 22:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-27 22:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.451135
INFO - 2026-02-27 22:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=ef4e2170cc2e] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-02-27 22:03:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=ef4e2170cc2e] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=ef4e2170cc2e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=ef4e2170cc2e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-02-27 22:03:05 --> [CSRF] token name=csrf_test_name hash=a68cc5d30ff735944406f3628b27d121
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=e7344bde137c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 22:03:05 --> [REQ_ID=e7344bde137c] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=e7344bde137c] [METHOD_ENTRY] index
DEBUG - 2026-02-27 22:03:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 22:03:05 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 22:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 22:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 22:03:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 22:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 22:03:05 --> [REQ_ID=e7344bde137c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-27 22:03:05 --> [REQ_ID=e7344bde137c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 22:03:06 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-27 22:03:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-27 22:03:06 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-27 22:03:06 --> [REQ_ID=ef4e2170cc2e] [FILTER_AFTER]
DEBUG - 2026-02-27 22:03:06 --> [REQ_ID=ef4e2170cc2e] [LIFECYCLE][END] status=200 duration_ms=799.28 memory_delta=4194304
INFO - 2026-02-27 22:03:06 --> [REQ_ID=e7344bde137c] [PERF] Execution time=0.796078
DEBUG - 2026-02-27 22:03:06 --> [REQ_ID=ef4e2170cc2e] [REQUEST][END]
INFO - 2026-02-27 22:03:06 --> [REQ_ID=ef4e2170cc2e] [PERF] Execution time=0.842782
INFO - 2026-02-27 22:15:02 --> [spark:ops:work] Started
INFO - 2026-02-27 22:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 22:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 22:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 22:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.039409
INFO - 2026-02-27 22:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [REQUEST][END]
INFO - 2026-02-27 22:15:02 --> [REQ_ID=c78252e97c83] [PERF] Execution time=0.061622
DEBUG - 2026-02-27 22:15:32 --> [REQ_ID=9c97f4e5f2e7] [REQUEST][START] GET /
DEBUG - 2026-02-27 22:15:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:15:32 --> [REQ_ID=9c97f4e5f2e7] [FILTER_BEFORE] /
DEBUG - 2026-02-27 22:15:32 --> [REQ_ID=9c97f4e5f2e7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-27 22:15:32 --> [REQ_ID=9c97f4e5f2e7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-27 22:15:32 --> [CSRF] token name=csrf_test_name hash=e5f544584ac34b0d02c159ceac63d516
DEBUG - 2026-02-27 22:15:32 --> [REQ_ID=d435f63cb994] [INIT] App\Controllers\Home::GET
INFO - 2026-02-27 22:15:32 --> [REQ_ID=d435f63cb994] [MEMORY][controller-start] 4194304
INFO - 2026-02-27 22:15:32 --> [REQ_ID=d435f63cb994] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 22:15:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 22:15:33 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-27 22:15:33 --> [REQ_ID=d435f63cb994] [VIEW_RENDER] themes/public/home
INFO - 2026-02-27 22:15:33 --> [REQ_ID=d435f63cb994] [MEMORY][commonData:start] 8388608
INFO - 2026-02-27 22:15:33 --> themesMemory usage: 8388608
DEBUG - 2026-02-27 22:15:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-27 22:15:33 --> [REQ_ID=9c97f4e5f2e7] [FILTER_AFTER]
DEBUG - 2026-02-27 22:15:33 --> [REQ_ID=9c97f4e5f2e7] [LIFECYCLE][END] status=200 duration_ms=797.39 memory_delta=4194304
INFO - 2026-02-27 22:15:33 --> [REQ_ID=d435f63cb994] [PERF] Execution time=0.796095
DEBUG - 2026-02-27 22:15:33 --> [REQ_ID=9c97f4e5f2e7] [REQUEST][END]
INFO - 2026-02-27 22:15:33 --> [REQ_ID=9c97f4e5f2e7] [PERF] Execution time=0.811056
DEBUG - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [REQUEST][START] GET /index.php/Marketplace
DEBUG - 2026-02-27 22:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [FILTER_BEFORE] /index.php/Marketplace
DEBUG - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [ROUTE] Controller=\App\Modules\ScriptStudio\Controllers\ScriptStudioController Method=marketplace
DEBUG - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Marketplace
DEBUG - 2026-02-27 22:22:20 --> [CSRF] token name=csrf_test_name hash=50f80ef0216338c68b21796a8e486d30
DEBUG - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [REQUEST][END]
INFO - 2026-02-27 22:22:20 --> [REQ_ID=68c3169d7f24] [PERF] Execution time=0.086674
DEBUG - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-27 22:22:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-27 22:22:23 --> [CSRF] token name=csrf_test_name hash=5a5388241e853d23bc2b230a890dd9aa
DEBUG - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [REQUEST][END]
INFO - 2026-02-27 22:22:23 --> [REQ_ID=194b90fdcba8] [PERF] Execution time=0.013962
INFO - 2026-02-27 22:30:01 --> [spark:ops:work] Started
INFO - 2026-02-27 22:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 22:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 22:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 22:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037771
INFO - 2026-02-27 22:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 22:37:28 --> [REQ_ID=0de32759d636] [REQUEST][START] GET /index.php/Features/Brokerage-Integration
DEBUG - 2026-02-27 22:37:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-27 22:37:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-27 22:37:29 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-27 22:37:29 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Brokerage-Integration
WARNING - 2026-02-27 22:37:29 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: none
INFO - 2026-02-27 22:45:02 --> [spark:ops:work] Started
INFO - 2026-02-27 22:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 22:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 22:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 22:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 22:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092926
INFO - 2026-02-27 22:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 22:46:06 --> [REQ_ID=db0aedcb45b9] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 22:46:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=db0aedcb45b9] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=db0aedcb45b9] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=db0aedcb45b9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-27 22:46:07 --> [CSRF] token name=csrf_test_name hash=5745fea831c3a422b937d9738ce19dd5
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [METHOD_ENTRY] show
DEBUG - 2026-02-27 22:46:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 22:46:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 22:46:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 22:46:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 22:46:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 22:46:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-27 22:46:07 --> [REQ_ID=a5cb52bc500a] [MEMORY][commonData:start] 10485760
INFO - 2026-02-27 22:46:08 --> themesMemory usage: 14680064
DEBUG - 2026-02-27 22:46:08 --> [REQ_ID=db0aedcb45b9] [FILTER_AFTER]
DEBUG - 2026-02-27 22:46:08 --> [REQ_ID=db0aedcb45b9] [LIFECYCLE][END] status=200 duration_ms=1,464.63 memory_delta=8388608
INFO - 2026-02-27 22:46:08 --> [REQ_ID=a5cb52bc500a] [PERF] Execution time=1.462746
DEBUG - 2026-02-27 22:46:08 --> [REQ_ID=db0aedcb45b9] [REQUEST][END]
INFO - 2026-02-27 22:46:08 --> [REQ_ID=db0aedcb45b9] [PERF] Execution time=1.507002
INFO - 2026-02-27 23:00:01 --> [spark:ops:work] Started
INFO - 2026-02-27 23:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 23:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 23:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 23:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 23:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042641
INFO - 2026-02-27 23:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 23:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [REQUEST][END]
INFO - 2026-02-27 23:00:01 --> [REQ_ID=975dd460237f] [PERF] Execution time=0.077281
DEBUG - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-02-27 23:13:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-02-27 23:13:52 --> [CSRF] token name=csrf_test_name hash=3e54e3b46d369979e1f1783a7bb0c01f
DEBUG - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [REQUEST][END]
INFO - 2026-02-27 23:13:52 --> [REQ_ID=f35d53dcf08c] [PERF] Execution time=0.056454
INFO - 2026-02-27 23:15:01 --> [spark:ops:work] Started
INFO - 2026-02-27 23:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 23:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 23:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 23:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [REQUEST][END]
INFO - 2026-02-27 23:15:01 --> [REQ_ID=6884ef4fc257] [PERF] Execution time=0.050586
INFO - 2026-02-27 23:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 23:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.205074
INFO - 2026-02-27 23:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-27 23:18:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-27 23:18:18 --> [CSRF] token name=csrf_test_name hash=1686acd3118c58cd8df0766dbd9b254e
DEBUG - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [REQUEST][END]
INFO - 2026-02-27 23:18:18 --> [REQ_ID=36586668735d] [PERF] Execution time=0.059597
DEBUG - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-02-27 23:18:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-02-27 23:18:43 --> [CSRF] token name=csrf_test_name hash=90ddd05711686f502ff87d603884c759
DEBUG - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [REQUEST][END]
INFO - 2026-02-27 23:18:43 --> [REQ_ID=8d4953f7c781] [PERF] Execution time=0.014791
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=cf9a9ed8b46b] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-27 23:18:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=cf9a9ed8b46b] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=cf9a9ed8b46b] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=cf9a9ed8b46b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-27 23:18:55 --> [CSRF] token name=csrf_test_name hash=ccd689a3ec0a66fb22d0d812ab509e56
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=4b3c1dd28a1e] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-27 23:18:55 --> [REQ_ID=4b3c1dd28a1e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 23:18:55 --> [REQ_ID=4b3c1dd28a1e] [METHOD_ENTRY] index
DEBUG - 2026-02-27 23:18:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-27 23:18:55 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-27 23:18:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-27 23:18:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-27 23:18:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-27 23:18:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-27 23:18:56 --> [REQ_ID=4b3c1dd28a1e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-27 23:18:56 --> [REQ_ID=4b3c1dd28a1e] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-27 23:18:56 --> [REQ_ID=4b3c1dd28a1e] [MEMORY][commonData:start] 6291456
INFO - 2026-02-27 23:18:56 --> themesMemory usage: 6291456
DEBUG - 2026-02-27 23:18:56 --> [REQ_ID=cf9a9ed8b46b] [FILTER_AFTER]
DEBUG - 2026-02-27 23:18:56 --> [REQ_ID=cf9a9ed8b46b] [LIFECYCLE][END] status=200 duration_ms=314.51 memory_delta=2097152
INFO - 2026-02-27 23:18:56 --> [REQ_ID=4b3c1dd28a1e] [PERF] Execution time=0.314110
DEBUG - 2026-02-27 23:18:56 --> [REQ_ID=cf9a9ed8b46b] [REQUEST][END]
INFO - 2026-02-27 23:18:56 --> [REQ_ID=cf9a9ed8b46b] [PERF] Execution time=0.324928
DEBUG - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-27 23:19:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-27 23:19:08 --> [CSRF] token name=csrf_test_name hash=78ea04ccfe8aa7201a6990093bf3cf7e
DEBUG - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [REQUEST][END]
INFO - 2026-02-27 23:19:08 --> [REQ_ID=b18f7b924fa1] [PERF] Execution time=0.012859
DEBUG - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-02-27 23:19:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-02-27 23:19:20 --> [CSRF] token name=csrf_test_name hash=77c360ec9eacd98e03453d31d5a0c478
DEBUG - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [REQUEST][END]
INFO - 2026-02-27 23:19:20 --> [REQ_ID=aa6f418be0ae] [PERF] Execution time=0.012204
DEBUG - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-02-27 23:19:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-02-27 23:19:33 --> [CSRF] token name=csrf_test_name hash=24b04eabfe6870a9319440cef74facc7
DEBUG - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [REQUEST][END]
INFO - 2026-02-27 23:19:33 --> [REQ_ID=46d84a51ad74] [PERF] Execution time=0.013747
INFO - 2026-02-27 23:30:02 --> [spark:ops:work] Started
INFO - 2026-02-27 23:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 23:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 23:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-27 23:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-27 23:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.055847
INFO - 2026-02-27 23:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [REQUEST][START] GET /index.php/Assets
DEBUG - 2026-02-27 23:43:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [FILTER_BEFORE] /index.php/Assets
DEBUG - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [ROUTE] Controller=\App\Modules\Management\Controllers\AssetsController Method=index
DEBUG - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Assets
DEBUG - 2026-02-27 23:43:35 --> [CSRF] token name=csrf_test_name hash=7ed03bacd998409c88eb5490cb66e5db
DEBUG - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [REQUEST][END]
INFO - 2026-02-27 23:43:35 --> [REQ_ID=959e55c7b46a] [PERF] Execution time=0.054597
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 23:43:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 23:43:41 --> [CSRF] token name=csrf_test_name hash=007d514a4a93e46ebe87e7035f17420a
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=8c548f6174c7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 23:43:41 --> [REQ_ID=8c548f6174c7] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [FILTER_AFTER]
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [LIFECYCLE][END] status=200 duration_ms=321.16 memory_delta=0
INFO - 2026-02-27 23:43:41 --> [REQ_ID=8c548f6174c7] [PERF] Execution time=0.319545
DEBUG - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [REQUEST][END]
INFO - 2026-02-27 23:43:41 --> [REQ_ID=a99ae47b3689] [PERF] Execution time=0.342738
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [REQUEST][START] GET /index.php/Account/Social-Media
DEBUG - 2026-02-27 23:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [FILTER_BEFORE] /index.php/Account/Social-Media
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=SocialMedia
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Social-Media
DEBUG - 2026-02-27 23:44:25 --> [CSRF] token name=csrf_test_name hash=1835d37e575a6bbf74bb2bfaa2ecb5d3
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [REQUEST][END]
INFO - 2026-02-27 23:44:25 --> [REQ_ID=087bf9bbf6d3] [PERF] Execution time=0.013950
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 23:44:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 23:44:25 --> [CSRF] token name=csrf_test_name hash=e52359a525920b9efc38d8aedd9cb173
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=fa80ed612a27] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 23:44:25 --> [REQ_ID=fa80ed612a27] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [FILTER_AFTER]
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [LIFECYCLE][END] status=200 duration_ms=56.15 memory_delta=0
INFO - 2026-02-27 23:44:25 --> [REQ_ID=fa80ed612a27] [PERF] Execution time=0.055988
DEBUG - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [REQUEST][END]
INFO - 2026-02-27 23:44:25 --> [REQ_ID=f31d450c1eb1] [PERF] Execution time=0.066182
INFO - 2026-02-27 23:45:01 --> [spark:ops:work] Started
INFO - 2026-02-27 23:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-27 23:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-27 23:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-27 23:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-27 23:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.019941
INFO - 2026-02-27 23:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [REQUEST][START] GET /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 23:45:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [FILTER_BEFORE] /index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=promote
DEBUG - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Promote/Solana
DEBUG - 2026-02-27 23:45:58 --> [CSRF] token name=csrf_test_name hash=0975bc210e8cc36580e9af22ef4f28f6
DEBUG - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [REQUEST][END]
INFO - 2026-02-27 23:45:58 --> [REQ_ID=cbb47843e737] [PERF] Execution time=0.057567
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-27 23:46:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-27 23:46:00 --> [CSRF] token name=csrf_test_name hash=7901b1e36dd3b5c3ee7ff097a735118b
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=2575c4e9dbcd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-27 23:46:00 --> [REQ_ID=2575c4e9dbcd] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [FILTER_AFTER]
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [LIFECYCLE][END] status=200 duration_ms=32.70 memory_delta=0
INFO - 2026-02-27 23:46:00 --> [REQ_ID=2575c4e9dbcd] [PERF] Execution time=0.032128
DEBUG - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [REQUEST][END]
INFO - 2026-02-27 23:46:00 --> [REQ_ID=460cfa1e9ef0] [PERF] Execution time=0.046524
DEBUG - 2026-02-27 23:57:32 --> [REQ_ID=e2da8a00ca75] [REQUEST][START] GET /index.php/forgot
DEBUG - 2026-02-27 23:57:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-27 23:57:32 --> [REQ_ID=e2da8a00ca75] [FILTER_BEFORE] /index.php/forgot
DEBUG - 2026-02-27 23:57:32 --> [REQ_ID=e2da8a00ca75] [ROUTE] Controller=\Myth\Auth\Controllers\AuthController Method=forgotPassword
DEBUG - 2026-02-27 23:57:32 --> [REQ_ID=e2da8a00ca75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/forgot
DEBUG - 2026-02-27 23:57:32 --> [CSRF] token name=csrf_test_name hash=b2ee8ebfc2106e13ba7f1ef9b759c03a
DEBUG - 2026-02-27 23:57:33 --> [REQ_ID=e2da8a00ca75] [FILTER_AFTER]
DEBUG - 2026-02-27 23:57:33 --> [REQ_ID=e2da8a00ca75] [LIFECYCLE][END] status=200 duration_ms=18.70 memory_delta=0
DEBUG - 2026-02-27 23:57:33 --> [REQ_ID=e2da8a00ca75] [REQUEST][END]
INFO - 2026-02-27 23:57:33 --> [REQ_ID=e2da8a00ca75] [PERF] Execution time=0.058419
