<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [REQUEST][END]
INFO - 2026-02-28 00:00:01 --> [REQ_ID=7efd45f99eb4] [PERF] Execution time=0.057404
INFO - 2026-02-28 00:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 00:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 00:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-28 00:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 00:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.217944
INFO - 2026-02-28 00:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 00:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 00:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.003817
INFO - 2026-02-28 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 00:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 00:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 00:00:03 --> LOG_HEALTHCHECK debug marker=84b3fd5c648d
INFO - 2026-02-28 00:00:03 --> LOG_HEALTHCHECK info marker=84b3fd5c648d
NOTICE - 2026-02-28 00:00:03 --> LOG_HEALTHCHECK probe marker=84b3fd5c648d
INFO - 2026-02-28 00:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 00:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024911
INFO - 2026-02-28 00:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 00:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 00:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 00:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 00:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 00:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 00:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.272372
INFO - 2026-02-28 00:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> [CSRF] token name=csrf_test_name hash=e26ecadc4c015c323e9cc4aba4261113
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [REQUEST][END]
INFO - 2026-02-28 00:10:52 --> [REQ_ID=bb18f98157b7] [PERF] Execution time=0.052996
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:52 --> [CSRF] token name=csrf_test_name hash=a3b9096ccfb559aa382e0b5ac0788143
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=31287995b61e] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 00:10:52 --> [REQ_ID=31287995b61e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=31287995b61e] [METHOD_ENTRY] show
DEBUG - 2026-02-28 00:10:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 00:10:52 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 00:10:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 00:10:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 00:10:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 00:10:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [LIFECYCLE][END] status=404 duration_ms=97.88 memory_delta=2097152
INFO - 2026-02-28 00:10:52 --> [REQ_ID=31287995b61e] [PERF] Execution time=0.097871
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [REQUEST][END]
INFO - 2026-02-28 00:10:52 --> [REQ_ID=c89c916acdf1] [PERF] Execution time=0.113669
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-28 00:10:52 --> [CSRF] token name=csrf_test_name hash=c546610646e1ee37880f003b38130e9c
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [REQUEST][END]
INFO - 2026-02-28 00:10:52 --> [REQ_ID=464609f33d8f] [PERF] Execution time=0.009375
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 00:10:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 00:10:52 --> [CSRF] token name=csrf_test_name hash=56f0c5ecd3cd960f2b4ad90bfae130eb
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=97992323e16e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 00:10:52 --> [REQ_ID=97992323e16e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [LIFECYCLE][END] status=200 duration_ms=24.80 memory_delta=0
INFO - 2026-02-28 00:10:52 --> [REQ_ID=97992323e16e] [PERF] Execution time=0.024371
DEBUG - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [REQUEST][END]
INFO - 2026-02-28 00:10:52 --> [REQ_ID=3c0b3c54709d] [PERF] Execution time=0.033151
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=1dcc766b2d711cc11e68a36c5404916f
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=0dd7813dba0b] [PERF] Execution time=0.009979
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=b7f9e987e90e20d8e116ff00a2449d17
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=baa90d851d18] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 00:10:53 --> [REQ_ID=baa90d851d18] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [LIFECYCLE][END] status=200 duration_ms=14.00 memory_delta=0
INFO - 2026-02-28 00:10:53 --> [REQ_ID=baa90d851d18] [PERF] Execution time=0.013872
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=96dd52ca5ddb] [PERF] Execution time=0.022810
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [REQUEST][START] GET /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [FILTER_BEFORE] /index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investor-Profile
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=8333f9857cf3b3898acc1d1f446fa40d
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=7ec69af13ba4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 00:10:53 --> [REQ_ID=7ec69af13ba4] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=7ec69af13ba4] [METHOD_ENTRY] show
DEBUG - 2026-02-28 00:10:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 00:10:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 00:10:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 00:10:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 00:10:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 00:10:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [LIFECYCLE][END] status=404 duration_ms=19.99 memory_delta=0
INFO - 2026-02-28 00:10:53 --> [REQ_ID=7ec69af13ba4] [PERF] Execution time=0.019792
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=f0bafda2c39d] [PERF] Execution time=0.030679
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=00001205a39482c2ed2e19a7763d0823
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4fa387589af3] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 00:10:53 --> [REQ_ID=4fa387589af3] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [LIFECYCLE][END] status=200 duration_ms=17.71 memory_delta=0
INFO - 2026-02-28 00:10:53 --> [REQ_ID=4fa387589af3] [PERF] Execution time=0.017536
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=e94cc7c62e6b] [PERF] Execution time=0.027255
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [REQUEST][START] GET /index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [FILTER_BEFORE] /index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [ROUTE] Controller=\App\Controllers\AuthController Method=register
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=02699c9ab5a94b4418622449868699ca
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=4a66b2cd0625] [PERF] Execution time=0.010385
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 00:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 00:10:53 --> [CSRF] token name=csrf_test_name hash=8333f9857cf3b3898acc1d1f446fa40d
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=51aef5e0539d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 00:10:53 --> [REQ_ID=51aef5e0539d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [LIFECYCLE][END] status=200 duration_ms=14.70 memory_delta=0
INFO - 2026-02-28 00:10:53 --> [REQ_ID=51aef5e0539d] [PERF] Execution time=0.014595
DEBUG - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [REQUEST][END]
INFO - 2026-02-28 00:10:53 --> [REQ_ID=d88944016d59] [PERF] Execution time=0.023316
DEBUG - 2026-02-28 00:10:54 --> [REQ_ID=330b3637818b] [REQUEST][START] GET /index.php
DEBUG - 2026-02-28 00:10:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:54 --> [REQ_ID=330b3637818b] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-28 00:10:54 --> [REQ_ID=330b3637818b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 00:10:54 --> [REQ_ID=330b3637818b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 00:10:54 --> [CSRF] token name=csrf_test_name hash=8333f9857cf3b3898acc1d1f446fa40d
DEBUG - 2026-02-28 00:10:54 --> [REQ_ID=41376085a664] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 00:10:54 --> [REQ_ID=41376085a664] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 00:10:54 --> [REQ_ID=41376085a664] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 00:10:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 00:10:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=41376085a664] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 00:10:55 --> [REQ_ID=41376085a664] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 00:10:55 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 00:10:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=330b3637818b] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=330b3637818b] [LIFECYCLE][END] status=200 duration_ms=531.13 memory_delta=4194304
INFO - 2026-02-28 00:10:55 --> [REQ_ID=41376085a664] [PERF] Execution time=0.530754
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=330b3637818b] [REQUEST][END]
INFO - 2026-02-28 00:10:55 --> [REQ_ID=330b3637818b] [PERF] Execution time=0.541712
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [REQUEST][START] GET /
DEBUG - 2026-02-28 00:10:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [FILTER_BEFORE] /
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 00:10:55 --> [CSRF] token name=csrf_test_name hash=8333f9857cf3b3898acc1d1f446fa40d
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 00:10:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 00:10:55 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 00:10:55 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 00:10:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [LIFECYCLE][END] status=200 duration_ms=505.90 memory_delta=2097152
INFO - 2026-02-28 00:10:55 --> [REQ_ID=5f4ca1a5f94c] [PERF] Execution time=0.505767
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [REQUEST][END]
INFO - 2026-02-28 00:10:55 --> [REQ_ID=2758f5541030] [PERF] Execution time=0.517314
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-28 00:10:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-28 00:10:55 --> [CSRF] token name=csrf_test_name hash=d3a26a945cfa6a0c981b407164a0fad1
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [REQUEST][END]
INFO - 2026-02-28 00:10:55 --> [REQ_ID=99f67c6f96bc] [PERF] Execution time=0.022834
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 00:10:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 00:10:55 --> [CSRF] token name=csrf_test_name hash=4bee4b723779e077f3a5eb8fa414e2be
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=781a2981d418] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 00:10:55 --> [REQ_ID=781a2981d418] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [FILTER_AFTER]
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [LIFECYCLE][END] status=200 duration_ms=15.16 memory_delta=0
INFO - 2026-02-28 00:10:55 --> [REQ_ID=781a2981d418] [PERF] Execution time=0.014998
DEBUG - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [REQUEST][END]
INFO - 2026-02-28 00:10:55 --> [REQ_ID=e927e829cc5d] [PERF] Execution time=0.024491
INFO - 2026-02-28 00:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 00:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 00:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 00:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 00:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.095570
INFO - 2026-02-28 00:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 00:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [REQUEST][END]
INFO - 2026-02-28 00:15:02 --> [REQ_ID=3a022a031d38] [PERF] Execution time=0.061097
INFO - 2026-02-28 00:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 00:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 00:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 00:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 00:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.032608
INFO - 2026-02-28 00:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 00:43:52 --> [REQ_ID=7ec38f90c40e] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 00:43:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 00:43:52 --> [REQ_ID=7ec38f90c40e] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 00:43:52 --> [REQ_ID=7ec38f90c40e] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 00:43:52 --> [REQ_ID=7ec38f90c40e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 00:43:52 --> [CSRF] token name=csrf_test_name hash=d979cde773f53b0077cbe250e05db4a5
DEBUG - 2026-02-28 00:43:52 --> [REQ_ID=f07cc594ff51] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 00:43:52 --> [REQ_ID=f07cc594ff51] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 00:43:53 --> [REQ_ID=f07cc594ff51] [METHOD_ENTRY] show
DEBUG - 2026-02-28 00:43:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 00:43:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 00:43:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 00:43:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 00:43:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 00:43:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 00:43:53 --> [REQ_ID=f07cc594ff51] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 00:43:53 --> [REQ_ID=f07cc594ff51] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-28 00:43:53 --> [REQ_ID=f07cc594ff51] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 00:43:54 --> themesMemory usage: 14680064
DEBUG - 2026-02-28 00:43:54 --> [REQ_ID=7ec38f90c40e] [FILTER_AFTER]
DEBUG - 2026-02-28 00:43:54 --> [REQ_ID=7ec38f90c40e] [LIFECYCLE][END] status=200 duration_ms=1,444.39 memory_delta=8388608
INFO - 2026-02-28 00:43:54 --> [REQ_ID=f07cc594ff51] [PERF] Execution time=1.442440
DEBUG - 2026-02-28 00:43:54 --> [REQ_ID=7ec38f90c40e] [REQUEST][END]
INFO - 2026-02-28 00:43:54 --> [REQ_ID=7ec38f90c40e] [PERF] Execution time=1.486352
INFO - 2026-02-28 00:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 00:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 00:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 00:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 00:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 00:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.116996
INFO - 2026-02-28 00:45:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 01:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 01:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 01:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 01:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 01:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 01:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043749
INFO - 2026-02-28 01:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 01:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [REQUEST][END]
INFO - 2026-02-28 01:00:02 --> [REQ_ID=5c64675398d6] [PERF] Execution time=0.073526
DEBUG - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [REQUEST][START] GET /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-28 01:02:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [FILTER_BEFORE] /index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=goals
DEBUG - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/MyMI-Gold/Goals/Daily
DEBUG - 2026-02-28 01:02:16 --> [CSRF] token name=csrf_test_name hash=b9f28b5d8964fc5698b6b1799df83c75
DEBUG - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [REQUEST][END]
INFO - 2026-02-28 01:02:16 --> [REQ_ID=a963ad244b4f] [PERF] Execution time=0.054867
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 01:02:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 01:02:17 --> [CSRF] token name=csrf_test_name hash=a187b63f6ad5eaf4b91c9ff45e164be7
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=c80a2deda852] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 01:02:17 --> [REQ_ID=c80a2deda852] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [FILTER_AFTER]
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [LIFECYCLE][END] status=200 duration_ms=56.35 memory_delta=0
INFO - 2026-02-28 01:02:17 --> [REQ_ID=c80a2deda852] [PERF] Execution time=0.056098
DEBUG - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [REQUEST][END]
INFO - 2026-02-28 01:02:17 --> [REQ_ID=11dba5076f26] [PERF] Execution time=0.072128
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [REQUEST][START] GET /index.php/Exchange
DEBUG - 2026-02-28 01:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [FILTER_BEFORE] /index.php/Exchange
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [ROUTE] Controller=\App\Modules\Exchange\Controllers\ExchangeController Method=index
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Exchange
DEBUG - 2026-02-28 01:05:12 --> [CSRF] token name=csrf_test_name hash=792d892d7848700f2d9285267d473edf
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [REQUEST][END]
INFO - 2026-02-28 01:05:12 --> [REQ_ID=cd58ebfa91ac] [PERF] Execution time=0.055611
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 01:05:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 01:05:12 --> [CSRF] token name=csrf_test_name hash=7981f028436fc24d27c9fcc8a1e655b9
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=fc8f352915d5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 01:05:12 --> [REQ_ID=fc8f352915d5] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [FILTER_AFTER]
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [LIFECYCLE][END] status=200 duration_ms=35.94 memory_delta=0
INFO - 2026-02-28 01:05:12 --> [REQ_ID=fc8f352915d5] [PERF] Execution time=0.035658
DEBUG - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [REQUEST][END]
INFO - 2026-02-28 01:05:12 --> [REQ_ID=04179bb8fe44] [PERF] Execution time=0.047518
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-02-28 01:11:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=customizeMembership
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships/Customize
DEBUG - 2026-02-28 01:11:07 --> [CSRF] token name=csrf_test_name hash=3bef3be60a2fbab56c849e63f4c48d80
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [REQUEST][END]
INFO - 2026-02-28 01:11:07 --> [REQ_ID=6477c61202d5] [PERF] Execution time=0.056483
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=b5b6ac529513] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 01:11:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=b5b6ac529513] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=b5b6ac529513] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=b5b6ac529513] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 01:11:07 --> [CSRF] token name=csrf_test_name hash=8252da05414734c0f41e4db3bebb4675
DEBUG - 2026-02-28 01:11:07 --> [REQ_ID=36912110b184] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 01:11:07 --> [REQ_ID=36912110b184] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 01:11:08 --> [REQ_ID=b5b6ac529513] [FILTER_AFTER]
DEBUG - 2026-02-28 01:11:08 --> [REQ_ID=b5b6ac529513] [LIFECYCLE][END] status=200 duration_ms=233.00 memory_delta=0
INFO - 2026-02-28 01:11:08 --> [REQ_ID=36912110b184] [PERF] Execution time=0.231016
DEBUG - 2026-02-28 01:11:08 --> [REQ_ID=b5b6ac529513] [REQUEST][END]
INFO - 2026-02-28 01:11:08 --> [REQ_ID=b5b6ac529513] [PERF] Execution time=0.244352
DEBUG - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-02-28 01:15:02 --> [spark:ops:work] Started
INFO - 2026-02-28 01:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 01:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 01:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 01:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-28 01:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 01:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042290
INFO - 2026-02-28 01:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [REQUEST][END]
INFO - 2026-02-28 01:15:02 --> [REQ_ID=d7cceebf7f2b] [PERF] Execution time=0.082858
INFO - 2026-02-28 01:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 01:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 01:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 01:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 01:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 01:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.023291
INFO - 2026-02-28 01:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 01:36:13 --> [REQ_ID=b68d147133d8] [REQUEST][START] HEAD /
DEBUG - 2026-02-28 01:36:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 01:36:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 01:36:13 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 01:36:13 --> [404] URI=https://www.mymiwallet.com/index.php/
WARNING - 2026-02-28 01:36:13 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-28 01:41:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-28 01:41:32 --> [CSRF] token name=csrf_test_name hash=3f5e94bef7c27585267a2dd43044856f
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [METHOD_ENTRY] index
DEBUG - 2026-02-28 01:41:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 01:41:32 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 01:41:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 01:41:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 01:41:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 01:41:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 01:41:32 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [FILTER_AFTER]
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [LIFECYCLE][END] status=200 duration_ms=165.52 memory_delta=0
INFO - 2026-02-28 01:41:32 --> [REQ_ID=8708bb2733a3] [PERF] Execution time=0.163287
DEBUG - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [REQUEST][END]
INFO - 2026-02-28 01:41:32 --> [REQ_ID=a85fc2776481] [PERF] Execution time=0.205638
INFO - 2026-02-28 01:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 01:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 01:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 01:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 01:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 01:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037002
INFO - 2026-02-28 01:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [REQUEST][START] GET /index.php/Management/Budgets
DEBUG - 2026-02-28 01:47:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [FILTER_BEFORE] /index.php/Management/Budgets
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [ROUTE] Controller=\App\Modules\Management\Controllers\BudgetsAdminController Method=index
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Budgets
DEBUG - 2026-02-28 01:47:37 --> [CSRF] token name=csrf_test_name hash=75cd5be77c2f97fd889bf4c15734058f
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [REQUEST][END]
INFO - 2026-02-28 01:47:37 --> [REQ_ID=fba0e0e10ac9] [PERF] Execution time=0.051267
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 01:47:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 01:47:37 --> [CSRF] token name=csrf_test_name hash=826b6b23bdfa12914fe98abdd9e6c192
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=069ab11095a1] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 01:47:37 --> [REQ_ID=069ab11095a1] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [FILTER_AFTER]
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [LIFECYCLE][END] status=200 duration_ms=35.07 memory_delta=0
INFO - 2026-02-28 01:47:37 --> [REQ_ID=069ab11095a1] [PERF] Execution time=0.034982
DEBUG - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [REQUEST][END]
INFO - 2026-02-28 01:47:37 --> [REQ_ID=a6bbef725730] [PERF] Execution time=0.046562
DEBUG - 2026-02-28 01:59:56 --> [REQ_ID=57b42dc773d2] [REQUEST][START] GET /index.php/Privacy-Policy
DEBUG - 2026-02-28 01:59:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 01:59:56 --> [REQ_ID=57b42dc773d2] [FILTER_BEFORE] /index.php/Privacy-Policy
DEBUG - 2026-02-28 01:59:56 --> [REQ_ID=57b42dc773d2] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-02-28 01:59:56 --> [REQ_ID=57b42dc773d2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Privacy-Policy
DEBUG - 2026-02-28 01:59:56 --> [CSRF] token name=csrf_test_name hash=1e3563a02976b958b2903dd3cd5a3eab
DEBUG - 2026-02-28 01:59:56 --> [REQ_ID=4fee33926230] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 01:59:56 --> [REQ_ID=4fee33926230] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 01:59:56 --> [REQ_ID=4fee33926230] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 01:59:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 01:59:57 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
DEBUG - 2026-02-28 01:59:57 --> [REQ_ID=4fee33926230] [VIEW_RENDER] themes/public/privacyPolicy
INFO - 2026-02-28 01:59:57 --> [REQ_ID=4fee33926230] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 01:59:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 01:59:57 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-02-28 01:59:57 --> [REQ_ID=57b42dc773d2] [FILTER_AFTER]
DEBUG - 2026-02-28 01:59:57 --> [REQ_ID=57b42dc773d2] [LIFECYCLE][END] status=200 duration_ms=650.19 memory_delta=4194304
INFO - 2026-02-28 01:59:57 --> [REQ_ID=4fee33926230] [PERF] Execution time=0.648238
DEBUG - 2026-02-28 01:59:57 --> [REQ_ID=57b42dc773d2] [REQUEST][END]
INFO - 2026-02-28 01:59:57 --> [REQ_ID=57b42dc773d2] [PERF] Execution time=0.687636
DEBUG - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 02:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [REQUEST][END]
INFO - 2026-02-28 02:00:02 --> [REQ_ID=7ff4fed26b25] [PERF] Execution time=0.053092
INFO - 2026-02-28 02:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 02:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 02:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031578
INFO - 2026-02-28 02:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 02:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 02:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-28 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 02:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 02:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.005733
INFO - 2026-02-28 02:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 02:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 02:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 02:00:04 --> LOG_HEALTHCHECK debug marker=a41175866b4a
INFO - 2026-02-28 02:00:04 --> LOG_HEALTHCHECK info marker=a41175866b4a
NOTICE - 2026-02-28 02:00:04 --> LOG_HEALTHCHECK probe marker=a41175866b4a
INFO - 2026-02-28 02:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 02:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.104253
INFO - 2026-02-28 02:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 02:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 02:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 02:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 02:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 02:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 02:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.295155
INFO - 2026-02-28 02:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 02:01:30 --> [REQ_ID=b3e479e5d465] [REQUEST][START] GET /
DEBUG - 2026-02-28 02:01:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:01:30 --> [REQ_ID=b3e479e5d465] [FILTER_BEFORE] /
DEBUG - 2026-02-28 02:01:30 --> [REQ_ID=b3e479e5d465] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 02:01:30 --> [REQ_ID=b3e479e5d465] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 02:01:30 --> [CSRF] token name=csrf_test_name hash=9213d0349d8f3c6a8a1ab5652eae8aea
DEBUG - 2026-02-28 02:01:30 --> [REQ_ID=2c4a6675b912] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 02:01:30 --> [REQ_ID=2c4a6675b912] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 02:01:30 --> [REQ_ID=2c4a6675b912] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 02:01:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 02:01:31 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 02:01:31 --> [REQ_ID=2c4a6675b912] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 02:01:31 --> [REQ_ID=2c4a6675b912] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 02:01:31 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 02:01:31 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 02:01:31 --> [REQ_ID=b3e479e5d465] [FILTER_AFTER]
DEBUG - 2026-02-28 02:01:31 --> [REQ_ID=b3e479e5d465] [LIFECYCLE][END] status=200 duration_ms=628.05 memory_delta=4194304
INFO - 2026-02-28 02:01:31 --> [REQ_ID=2c4a6675b912] [PERF] Execution time=0.625904
DEBUG - 2026-02-28 02:01:31 --> [REQ_ID=b3e479e5d465] [REQUEST][END]
INFO - 2026-02-28 02:01:31 --> [REQ_ID=b3e479e5d465] [PERF] Execution time=0.667400
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [REQUEST][START] GET /
DEBUG - 2026-02-28 02:11:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [FILTER_BEFORE] /
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 02:11:25 --> [CSRF] token name=csrf_test_name hash=b3d740b553881508a852264086dd8d68
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 02:11:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 02:11:25 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 02:11:25 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 02:11:25 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [FILTER_AFTER]
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [LIFECYCLE][END] status=200 duration_ms=733.14 memory_delta=4194304
INFO - 2026-02-28 02:11:25 --> [REQ_ID=ee4f2c17c251] [PERF] Execution time=0.731200
DEBUG - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [REQUEST][END]
INFO - 2026-02-28 02:11:25 --> [REQ_ID=3759352c80d9] [PERF] Execution time=0.773254
INFO - 2026-02-28 02:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 02:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 02:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 02:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 02:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020933
INFO - 2026-02-28 02:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [REQUEST][END]
INFO - 2026-02-28 02:15:01 --> [REQ_ID=9792f7609e71] [PERF] Execution time=0.045668
DEBUG - 2026-02-28 02:16:24 --> [REQ_ID=63d5ab0fd3a7] [REQUEST][START] GET /index.php/Investments/Reports
DEBUG - 2026-02-28 02:16:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 02:16:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/Reports]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 02:16:24 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 02:16:24 --> [404] URI=https://www.mymiwallet.com/index.php/Investments/Reports
WARNING - 2026-02-28 02:16:24 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/Reports | referrer: none
DEBUG - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [REQUEST][START] GET /index.php/Budget/Financial-Forecaster
DEBUG - 2026-02-28 02:16:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [FILTER_BEFORE] /index.php/Budget/Financial-Forecaster
DEBUG - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialForecaster
DEBUG - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Forecaster
DEBUG - 2026-02-28 02:16:59 --> [CSRF] token name=csrf_test_name hash=31ff90d66b1fb3de3b026af9fd716848
DEBUG - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [REQUEST][END]
INFO - 2026-02-28 02:16:59 --> [REQ_ID=5ad0933431a4] [PERF] Execution time=0.024791
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 02:17:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 02:17:00 --> [CSRF] token name=csrf_test_name hash=d560f75d4d1bb165c4e887fdd65a183f
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=7763c1b1f14f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 02:17:00 --> [REQ_ID=7763c1b1f14f] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [FILTER_AFTER]
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [LIFECYCLE][END] status=200 duration_ms=46.19 memory_delta=0
INFO - 2026-02-28 02:17:00 --> [REQ_ID=7763c1b1f14f] [PERF] Execution time=0.045654
DEBUG - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [REQUEST][END]
INFO - 2026-02-28 02:17:00 --> [REQ_ID=0ac7c32806a0] [PERF] Execution time=0.064654
DEBUG - 2026-02-28 02:28:21 --> [REQ_ID=4a21d19b0aca] [REQUEST][START] GET /
DEBUG - 2026-02-28 02:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:28:21 --> [REQ_ID=4a21d19b0aca] [FILTER_BEFORE] /
DEBUG - 2026-02-28 02:28:21 --> [REQ_ID=4a21d19b0aca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 02:28:21 --> [REQ_ID=4a21d19b0aca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 02:28:21 --> [CSRF] token name=csrf_test_name hash=07f9b0123fe1a9a1b5a5792d3b3e4ef2
DEBUG - 2026-02-28 02:28:21 --> [REQ_ID=994d6ad6ffe4] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 02:28:21 --> [REQ_ID=994d6ad6ffe4] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 02:28:21 --> [REQ_ID=994d6ad6ffe4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 02:28:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 02:28:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 02:28:22 --> [REQ_ID=994d6ad6ffe4] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 02:28:22 --> [REQ_ID=994d6ad6ffe4] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 02:28:22 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 02:28:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 02:28:22 --> [REQ_ID=4a21d19b0aca] [FILTER_AFTER]
DEBUG - 2026-02-28 02:28:22 --> [REQ_ID=4a21d19b0aca] [LIFECYCLE][END] status=200 duration_ms=612.82 memory_delta=4194304
INFO - 2026-02-28 02:28:22 --> [REQ_ID=994d6ad6ffe4] [PERF] Execution time=0.610836
DEBUG - 2026-02-28 02:28:22 --> [REQ_ID=4a21d19b0aca] [REQUEST][END]
INFO - 2026-02-28 02:28:22 --> [REQ_ID=4a21d19b0aca] [PERF] Execution time=0.652190
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [REQUEST][START] GET /
DEBUG - 2026-02-28 02:28:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [FILTER_BEFORE] /
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 02:28:36 --> [CSRF] token name=csrf_test_name hash=8689551c7a0f6fb69868128486c7d2ab
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 02:28:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 02:28:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 02:28:36 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 02:28:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [FILTER_AFTER]
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [LIFECYCLE][END] status=200 duration_ms=530.15 memory_delta=2097152
INFO - 2026-02-28 02:28:36 --> [REQ_ID=ba638b321fb7] [PERF] Execution time=0.529981
DEBUG - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [REQUEST][END]
INFO - 2026-02-28 02:28:36 --> [REQ_ID=a15fd3051b18] [PERF] Execution time=0.539986
INFO - 2026-02-28 02:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 02:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 02:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 02:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 02:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.033475
INFO - 2026-02-28 02:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 02:30:42 --> [REQ_ID=ef7e1d99329e] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Charting
DEBUG - 2026-02-28 02:30:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 02:30:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 02:30:42 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 02:30:42 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting
WARNING - 2026-02-28 02:30:42 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: none
DEBUG - 2026-02-28 02:32:25 --> [REQ_ID=0a6d94b6d60c] [REQUEST][START] GET /index.php/Management/API
DEBUG - 2026-02-28 02:32:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 02:32:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 02:32:25 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 02:32:25 --> [404] URI=https://www.mymiwallet.com/index.php/Management/API
WARNING - 2026-02-28 02:32:25 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API | referrer: none
DEBUG - 2026-02-28 02:36:33 --> [REQ_ID=0c91cf83b11c] [REQUEST][START] GET /index.php/Premium-Features/Advanced-Trade-Tracker
DEBUG - 2026-02-28 02:36:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 02:36:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 02:36:33 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 02:36:33 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker
WARNING - 2026-02-28 02:36:33 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: none
DEBUG - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [REQUEST][START] GET /index.php/Investments
DEBUG - 2026-02-28 02:38:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [FILTER_BEFORE] /index.php/Investments
DEBUG - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=index
DEBUG - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Investments
DEBUG - 2026-02-28 02:38:59 --> [CSRF] token name=csrf_test_name hash=d69679219ef9b39598d87590d6e81fd8
DEBUG - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [REQUEST][END]
INFO - 2026-02-28 02:38:59 --> [REQ_ID=994f378fe587] [PERF] Execution time=0.054777
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 02:39:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 02:39:00 --> [CSRF] token name=csrf_test_name hash=5959ddf47955d265ffd1c1809eb4ebb3
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=c04b8beaa38b] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 02:39:00 --> [REQ_ID=c04b8beaa38b] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [FILTER_AFTER]
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [LIFECYCLE][END] status=200 duration_ms=54.16 memory_delta=0
INFO - 2026-02-28 02:39:00 --> [REQ_ID=c04b8beaa38b] [PERF] Execution time=0.053916
DEBUG - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [REQUEST][END]
INFO - 2026-02-28 02:39:00 --> [REQ_ID=58915447c72d] [PERF] Execution time=0.067602
INFO - 2026-02-28 02:45:02 --> [spark:ops:work] Started
INFO - 2026-02-28 02:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 02:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 02:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 02:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 02:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.058459
INFO - 2026-02-28 02:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 03:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 03:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 03:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 03:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-28 03:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 03:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.091978
INFO - 2026-02-28 03:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [REQUEST][END]
INFO - 2026-02-28 03:00:01 --> [REQ_ID=6479480f7de3] [PERF] Execution time=0.073624
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [REQUEST][START] GET /index.php/Legal/Privacy-Policy
DEBUG - 2026-02-28 03:01:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [FILTER_BEFORE] /index.php/Legal/Privacy-Policy
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [ROUTE] Controller=\App\Controllers\Home Method=privacyPolicy
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Privacy-Policy
DEBUG - 2026-02-28 03:01:56 --> [CSRF] token name=csrf_test_name hash=2619954928d4edd358f0df6388646845
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [REQUEST][END]
INFO - 2026-02-28 03:01:56 --> [REQ_ID=7392d01443a6] [PERF] Execution time=0.055314
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 03:01:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 03:01:56 --> [CSRF] token name=csrf_test_name hash=3892621727fb1a35015794f8cad77884
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=9a8f23db3aaa] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 03:01:56 --> [REQ_ID=9a8f23db3aaa] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [FILTER_AFTER]
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [LIFECYCLE][END] status=200 duration_ms=239.15 memory_delta=0
INFO - 2026-02-28 03:01:56 --> [REQ_ID=9a8f23db3aaa] [PERF] Execution time=0.239092
DEBUG - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [REQUEST][END]
INFO - 2026-02-28 03:01:56 --> [REQ_ID=508c6e83acf7] [PERF] Execution time=0.250637
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [REQUEST][START] GET /
DEBUG - 2026-02-28 03:06:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [FILTER_BEFORE] /
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 03:06:29 --> [CSRF] token name=csrf_test_name hash=4eefc2ac3363b87d70196d9759e3030e
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:06:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:06:29 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 03:06:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 03:06:29 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [FILTER_AFTER]
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [LIFECYCLE][END] status=200 duration_ms=611.34 memory_delta=4194304
INFO - 2026-02-28 03:06:29 --> [REQ_ID=4c87d89ba3f9] [PERF] Execution time=0.608430
DEBUG - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [REQUEST][END]
INFO - 2026-02-28 03:06:29 --> [REQ_ID=01ff1a0067fb] [PERF] Execution time=0.663050
INFO - 2026-02-28 03:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 03:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 03:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 03:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-02-28 03:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 03:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.126899
INFO - 2026-02-28 03:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [REQUEST][END]
INFO - 2026-02-28 03:15:01 --> [REQ_ID=1f57e4ec30f2] [PERF] Execution time=0.061459
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [REQUEST][START] GET /
DEBUG - 2026-02-28 03:17:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [FILTER_BEFORE] /
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 03:17:59 --> [CSRF] token name=csrf_test_name hash=65fc301dfc26719546fefc59f60238d6
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:17:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:17:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 03:17:59 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 03:17:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [FILTER_AFTER]
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [LIFECYCLE][END] status=200 duration_ms=576.97 memory_delta=4194304
INFO - 2026-02-28 03:17:59 --> [REQ_ID=b345b7a4160f] [PERF] Execution time=0.574669
DEBUG - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [REQUEST][END]
INFO - 2026-02-28 03:17:59 --> [REQ_ID=4487cf9f7c8d] [PERF] Execution time=0.618559
DEBUG - 2026-02-28 03:26:35 --> [REQ_ID=14fdd0d86131] [REQUEST][START] GET /
DEBUG - 2026-02-28 03:26:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:26:35 --> [REQ_ID=14fdd0d86131] [FILTER_BEFORE] /
DEBUG - 2026-02-28 03:26:35 --> [REQ_ID=14fdd0d86131] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 03:26:35 --> [REQ_ID=14fdd0d86131] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 03:26:35 --> [CSRF] token name=csrf_test_name hash=51ed7cb5392ddff405f0f03e95f03388
DEBUG - 2026-02-28 03:26:35 --> [REQ_ID=532b93bd2fc9] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 03:26:35 --> [REQ_ID=532b93bd2fc9] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:26:36 --> [REQ_ID=532b93bd2fc9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:26:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:26:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 03:26:36 --> [REQ_ID=532b93bd2fc9] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 03:26:36 --> [REQ_ID=532b93bd2fc9] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 03:26:36 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 03:26:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:26:36 --> [REQ_ID=14fdd0d86131] [FILTER_AFTER]
DEBUG - 2026-02-28 03:26:36 --> [REQ_ID=14fdd0d86131] [LIFECYCLE][END] status=200 duration_ms=605.86 memory_delta=4194304
INFO - 2026-02-28 03:26:36 --> [REQ_ID=532b93bd2fc9] [PERF] Execution time=0.603906
DEBUG - 2026-02-28 03:26:36 --> [REQ_ID=14fdd0d86131] [REQUEST][END]
INFO - 2026-02-28 03:26:36 --> [REQ_ID=14fdd0d86131] [PERF] Execution time=0.644276
DEBUG - 2026-02-28 03:28:42 --> [REQ_ID=fa9fdf0ac0c6] [REQUEST][START] GET /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-28 03:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:28:42 --> [REQ_ID=fa9fdf0ac0c6] [FILTER_BEFORE] /index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-28 03:28:42 --> [REQ_ID=fa9fdf0ac0c6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 03:28:42 --> [REQ_ID=fa9fdf0ac0c6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Purchase-MyMI-Gold
DEBUG - 2026-02-28 03:28:42 --> [CSRF] token name=csrf_test_name hash=78d66aa644614fa8bf1c82a5cfd10fab
DEBUG - 2026-02-28 03:28:42 --> [REQ_ID=7f8af3328a10] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 03:28:42 --> [REQ_ID=7f8af3328a10] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 03:28:43 --> [REQ_ID=7f8af3328a10] [METHOD_ENTRY] show
DEBUG - 2026-02-28 03:28:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:28:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 03:28:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 03:28:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 03:28:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 03:28:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 03:28:43 --> [REQ_ID=fa9fdf0ac0c6] [FILTER_AFTER]
DEBUG - 2026-02-28 03:28:43 --> [REQ_ID=fa9fdf0ac0c6] [LIFECYCLE][END] status=404 duration_ms=110.03 memory_delta=0
INFO - 2026-02-28 03:28:43 --> [REQ_ID=7f8af3328a10] [PERF] Execution time=0.108040
DEBUG - 2026-02-28 03:28:43 --> [REQ_ID=fa9fdf0ac0c6] [REQUEST][END]
INFO - 2026-02-28 03:28:43 --> [REQ_ID=fa9fdf0ac0c6] [PERF] Execution time=0.151264
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 03:29:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 03:29:26 --> [CSRF] token name=csrf_test_name hash=bc0a98cb7c49c164c252b8c99a2fb00a
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=7a0d50ac9e85] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 03:29:26 --> [REQ_ID=7a0d50ac9e85] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=7a0d50ac9e85] [METHOD_ENTRY] show
DEBUG - 2026-02-28 03:29:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:29:26 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 03:29:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 03:29:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 03:29:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 03:29:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [FILTER_AFTER]
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [LIFECYCLE][END] status=404 duration_ms=253.35 memory_delta=0
INFO - 2026-02-28 03:29:26 --> [REQ_ID=7a0d50ac9e85] [PERF] Execution time=0.253063
DEBUG - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [REQUEST][END]
INFO - 2026-02-28 03:29:26 --> [REQ_ID=8f71a1026a5a] [PERF] Execution time=0.262617
INFO - 2026-02-28 03:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 03:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 03:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 03:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 03:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 03:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041921
INFO - 2026-02-28 03:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 03:38:38 --> [REQ_ID=b12fafdc7337] [REQUEST][START] GET /
DEBUG - 2026-02-28 03:38:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:38:38 --> [REQ_ID=b12fafdc7337] [FILTER_BEFORE] /
DEBUG - 2026-02-28 03:38:38 --> [REQ_ID=b12fafdc7337] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 03:38:38 --> [REQ_ID=b12fafdc7337] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 03:38:38 --> [CSRF] token name=csrf_test_name hash=a939ea1101bfe91ef983afb264d13bdd
DEBUG - 2026-02-28 03:38:38 --> [REQ_ID=1352fd82b8ea] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 03:38:38 --> [REQ_ID=1352fd82b8ea] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:38:38 --> [REQ_ID=1352fd82b8ea] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:38:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:38:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:38:39 --> [REQ_ID=1352fd82b8ea] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 03:38:39 --> [REQ_ID=1352fd82b8ea] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 03:38:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 03:38:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:38:39 --> [REQ_ID=b12fafdc7337] [FILTER_AFTER]
DEBUG - 2026-02-28 03:38:39 --> [REQ_ID=b12fafdc7337] [LIFECYCLE][END] status=200 duration_ms=557.29 memory_delta=4194304
INFO - 2026-02-28 03:38:39 --> [REQ_ID=1352fd82b8ea] [PERF] Execution time=0.555267
DEBUG - 2026-02-28 03:38:39 --> [REQ_ID=b12fafdc7337] [REQUEST][END]
INFO - 2026-02-28 03:38:39 --> [REQ_ID=b12fafdc7337] [PERF] Execution time=0.595706
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [REQUEST][START] GET /index.php/activate-account?token=a72e5c9beb2d69ef2700188d7f0889c6
DEBUG - 2026-02-28 03:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [FILTER_BEFORE] /index.php/activate-account?token=a72e5c9beb2d69ef2700188d7f0889c6
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [ROUTE] Controller=\App\Controllers\AuthController Method=activateAccount
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/activate-account?token=a72e5c9beb2d69ef2700188d7f0889c6
DEBUG - 2026-02-28 03:42:15 --> [CSRF] token name=csrf_test_name hash=1f281cce5c2a42f907084263f9cb967b
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=76d6f7d6c647] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 03:42:15 --> [REQ_ID=76d6f7d6c647] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:42:15 --> [ACTIVATION] Activation link hit
ERROR - 2026-02-28 03:42:15 --> [ACTIVATION] Activation failed: user not found
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [FILTER_AFTER]
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [LIFECYCLE][END] status=302 duration_ms=225.91 memory_delta=0
INFO - 2026-02-28 03:42:15 --> [REQ_ID=76d6f7d6c647] [PERF] Execution time=0.223946
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [REQUEST][END]
INFO - 2026-02-28 03:42:15 --> [REQ_ID=2b99dc709e5f] [PERF] Execution time=0.267890
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-28 03:42:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-28 03:42:15 --> [CSRF] token name=csrf_test_name hash=57837d8aa47411e2a08096a523219595
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [METHOD_ENTRY] index
DEBUG - 2026-02-28 03:42:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:42:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 03:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 03:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 03:42:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 03:42:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 03:42:15 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [FILTER_AFTER]
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [LIFECYCLE][END] status=200 duration_ms=69.37 memory_delta=2097152
INFO - 2026-02-28 03:42:15 --> [REQ_ID=4faeb6862c4a] [PERF] Execution time=0.069122
DEBUG - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [REQUEST][END]
INFO - 2026-02-28 03:42:15 --> [REQ_ID=4764c9bf94fe] [PERF] Execution time=0.080997
INFO - 2026-02-28 03:45:02 --> [spark:ops:work] Started
INFO - 2026-02-28 03:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 03:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 03:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 03:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 03:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034936
INFO - 2026-02-28 03:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 03:52:11 --> [REQ_ID=0e3e4063fb3e] [REQUEST][START] GET /index.php
DEBUG - 2026-02-28 03:52:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:52:11 --> [REQ_ID=0e3e4063fb3e] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-28 03:52:11 --> [REQ_ID=0e3e4063fb3e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 03:52:11 --> [REQ_ID=0e3e4063fb3e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 03:52:11 --> [CSRF] token name=csrf_test_name hash=464159588b3bcbe73675cd0beac2c820
DEBUG - 2026-02-28 03:52:11 --> [REQ_ID=5e274589c195] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 03:52:11 --> [REQ_ID=5e274589c195] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 03:52:11 --> [REQ_ID=5e274589c195] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 03:52:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 03:52:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 03:52:12 --> [REQ_ID=5e274589c195] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 03:52:12 --> [REQ_ID=5e274589c195] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 03:52:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 03:52:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 03:52:12 --> [REQ_ID=0e3e4063fb3e] [FILTER_AFTER]
DEBUG - 2026-02-28 03:52:12 --> [REQ_ID=0e3e4063fb3e] [LIFECYCLE][END] status=200 duration_ms=722.82 memory_delta=4194304
INFO - 2026-02-28 03:52:12 --> [REQ_ID=5e274589c195] [PERF] Execution time=0.720485
DEBUG - 2026-02-28 03:52:12 --> [REQ_ID=0e3e4063fb3e] [REQUEST][END]
INFO - 2026-02-28 03:52:12 --> [REQ_ID=0e3e4063fb3e] [PERF] Execution time=0.761460
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [REQUEST][START] GET /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-28 03:52:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [FILTER_BEFORE] /index.php/Budget/Financial-Analysis
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=financialAnalysis
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget/Financial-Analysis
DEBUG - 2026-02-28 03:52:49 --> [CSRF] token name=csrf_test_name hash=11936f053fd90a20e9f8734b9ea5e6ef
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [REQUEST][END]
INFO - 2026-02-28 03:52:49 --> [REQ_ID=1088b9cac65f] [PERF] Execution time=0.017489
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 03:52:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 03:52:49 --> [CSRF] token name=csrf_test_name hash=ffc9591e9f5ea6540f1d31aa497ed59a
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=d153357f005f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 03:52:49 --> [REQ_ID=d153357f005f] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [FILTER_AFTER]
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [LIFECYCLE][END] status=200 duration_ms=22.81 memory_delta=0
INFO - 2026-02-28 03:52:49 --> [REQ_ID=d153357f005f] [PERF] Execution time=0.022633
DEBUG - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [REQUEST][END]
INFO - 2026-02-28 03:52:49 --> [REQ_ID=3f9660310390] [PERF] Execution time=0.034126
INFO - 2026-02-28 04:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 04:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 04:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 04:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 04:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [REQUEST][END]
INFO - 2026-02-28 04:00:01 --> [REQ_ID=8fc351bbb18d] [PERF] Execution time=0.049223
INFO - 2026-02-28 04:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 04:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038018
INFO - 2026-02-28 04:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 04:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 04:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009156
INFO - 2026-02-28 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 04:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 04:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 04:00:03 --> LOG_HEALTHCHECK debug marker=c8b914d6d066
INFO - 2026-02-28 04:00:03 --> LOG_HEALTHCHECK info marker=c8b914d6d066
NOTICE - 2026-02-28 04:00:03 --> LOG_HEALTHCHECK probe marker=c8b914d6d066
INFO - 2026-02-28 04:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 04:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.024835
INFO - 2026-02-28 04:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 04:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 04:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 04:00:04 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 04:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 04:00:04 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 04:00:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.294280
INFO - 2026-02-28 04:00:04 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [REQUEST][START] GET /index.php/Management/Alerts
DEBUG - 2026-02-28 04:06:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [FILTER_BEFORE] /index.php/Management/Alerts
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [ROUTE] Controller=\App\Modules\Management\Controllers\AlertsAdminController Method=index
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Alerts
DEBUG - 2026-02-28 04:06:34 --> [CSRF] token name=csrf_test_name hash=7ff7eafe1ee78184fa29ed6ff79e5f85
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [REQUEST][END]
INFO - 2026-02-28 04:06:34 --> [REQ_ID=89239b7a1fc3] [PERF] Execution time=0.058926
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:06:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:06:34 --> [CSRF] token name=csrf_test_name hash=75526d3013cd10137c6d5f46e620970d
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=a0fa1a477901] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:06:34 --> [REQ_ID=a0fa1a477901] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [FILTER_AFTER]
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [LIFECYCLE][END] status=200 duration_ms=130.80 memory_delta=0
INFO - 2026-02-28 04:06:34 --> [REQ_ID=a0fa1a477901] [PERF] Execution time=0.130584
DEBUG - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [REQUEST][END]
INFO - 2026-02-28 04:06:34 --> [REQ_ID=082e0741be10] [PERF] Execution time=0.142873
DEBUG - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-02-28 04:12:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-02-28 04:12:31 --> [CSRF] token name=csrf_test_name hash=fcc24c788553c05c2c03225552b6b807
DEBUG - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [REQUEST][END]
INFO - 2026-02-28 04:12:31 --> [REQ_ID=c82e2f1c870d] [PERF] Execution time=0.053666
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:12:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:12:32 --> [CSRF] token name=csrf_test_name hash=6e50f5a32c150b3b092acaf157141d34
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=e11739927858] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:12:32 --> [REQ_ID=e11739927858] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [FILTER_AFTER]
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [LIFECYCLE][END] status=200 duration_ms=38.95 memory_delta=0
INFO - 2026-02-28 04:12:32 --> [REQ_ID=e11739927858] [PERF] Execution time=0.036963
DEBUG - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [REQUEST][END]
INFO - 2026-02-28 04:12:32 --> [REQ_ID=368b337d8251] [PERF] Execution time=0.050312
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [REQUEST][START] GET /index.php/Management/Exchange
DEBUG - 2026-02-28 04:13:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [FILTER_BEFORE] /index.php/Management/Exchange
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [ROUTE] Controller=\App\Modules\Management\Controllers\ExchangeAdminController Method=index
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Exchange
DEBUG - 2026-02-28 04:13:12 --> [CSRF] token name=csrf_test_name hash=3eac36064f4c0eced97bd9715f555576
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [REQUEST][END]
INFO - 2026-02-28 04:13:12 --> [REQ_ID=4a791f266884] [PERF] Execution time=0.015384
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:13:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:13:12 --> [CSRF] token name=csrf_test_name hash=3561a63b652eaabc2ea069bf5bc82aa8
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=e6962e4341c4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:13:12 --> [REQ_ID=e6962e4341c4] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [FILTER_AFTER]
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [LIFECYCLE][END] status=200 duration_ms=41.84 memory_delta=0
INFO - 2026-02-28 04:13:12 --> [REQ_ID=e6962e4341c4] [PERF] Execution time=0.041815
DEBUG - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [REQUEST][END]
INFO - 2026-02-28 04:13:12 --> [REQ_ID=95b22ea668b4] [PERF] Execution time=0.052039
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=91bcd7a955bf] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-28 04:13:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=91bcd7a955bf] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=91bcd7a955bf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=91bcd7a955bf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-28 04:13:56 --> [CSRF] token name=csrf_test_name hash=de773af16bdc6199cd9749dec080cdee
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=11db03e76c19] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 04:13:56 --> [REQ_ID=11db03e76c19] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:13:56 --> [REQ_ID=11db03e76c19] [METHOD_ENTRY] show
DEBUG - 2026-02-28 04:13:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 04:13:56 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 04:13:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 04:13:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 04:13:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 04:13:56 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 04:13:56 --> [REQ_ID=11db03e76c19] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 04:13:57 --> [REQ_ID=11db03e76c19] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\MyMI_Gold
INFO - 2026-02-28 04:13:57 --> [REQ_ID=11db03e76c19] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 04:13:58 --> themesMemory usage: 12582912
DEBUG - 2026-02-28 04:13:58 --> [REQ_ID=91bcd7a955bf] [FILTER_AFTER]
DEBUG - 2026-02-28 04:13:58 --> [REQ_ID=91bcd7a955bf] [LIFECYCLE][END] status=200 duration_ms=1,275.03 memory_delta=8388608
INFO - 2026-02-28 04:13:58 --> [REQ_ID=11db03e76c19] [PERF] Execution time=1.274503
DEBUG - 2026-02-28 04:13:58 --> [REQ_ID=91bcd7a955bf] [REQUEST][END]
INFO - 2026-02-28 04:13:58 --> [REQ_ID=91bcd7a955bf] [PERF] Execution time=1.286309
DEBUG - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [REQUEST][START] GET /index.php/Projects
DEBUG - 2026-02-28 04:14:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [FILTER_BEFORE] /index.php/Projects
DEBUG - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [ROUTE] Controller=\App\Modules\User\Controllers\ProjectsController Method=index
DEBUG - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Projects
DEBUG - 2026-02-28 04:14:02 --> [CSRF] token name=csrf_test_name hash=b8c8254db69e67fe136db2de7b13a668
DEBUG - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [REQUEST][END]
INFO - 2026-02-28 04:14:02 --> [REQ_ID=4f10458f1ac1] [PERF] Execution time=0.010744
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:14:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:14:03 --> [CSRF] token name=csrf_test_name hash=f8b78e1031761726832d0609f5285ff5
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=e91107c321d7] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:14:03 --> [REQ_ID=e91107c321d7] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [FILTER_AFTER]
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [LIFECYCLE][END] status=200 duration_ms=16.89 memory_delta=0
INFO - 2026-02-28 04:14:03 --> [REQ_ID=e91107c321d7] [PERF] Execution time=0.016640
DEBUG - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [REQUEST][END]
INFO - 2026-02-28 04:14:03 --> [REQ_ID=06808e60cbd6] [PERF] Execution time=0.025084
DEBUG - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [REQUEST][END]
INFO - 2026-02-28 04:15:01 --> [REQ_ID=72da0267e06c] [PERF] Execution time=0.047782
INFO - 2026-02-28 04:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 04:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 04:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 04:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 04:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045250
INFO - 2026-02-28 04:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 04:16:17 --> [REQ_ID=5cb595a5297f] [REQUEST][START] GET /
DEBUG - 2026-02-28 04:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:16:17 --> [REQ_ID=5cb595a5297f] [FILTER_BEFORE] /
DEBUG - 2026-02-28 04:16:17 --> [REQ_ID=5cb595a5297f] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 04:16:17 --> [REQ_ID=5cb595a5297f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 04:16:17 --> [CSRF] token name=csrf_test_name hash=285b2254447611bd40bee0b9c313c579
DEBUG - 2026-02-28 04:16:17 --> [REQ_ID=f9cf7892c0f0] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 04:16:17 --> [REQ_ID=f9cf7892c0f0] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 04:16:17 --> [REQ_ID=f9cf7892c0f0] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 04:16:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 04:16:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 04:16:18 --> [REQ_ID=f9cf7892c0f0] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 04:16:18 --> [REQ_ID=f9cf7892c0f0] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 04:16:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 04:16:18 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 04:16:18 --> [REQ_ID=5cb595a5297f] [FILTER_AFTER]
DEBUG - 2026-02-28 04:16:18 --> [REQ_ID=5cb595a5297f] [LIFECYCLE][END] status=200 duration_ms=596.37 memory_delta=4194304
INFO - 2026-02-28 04:16:18 --> [REQ_ID=f9cf7892c0f0] [PERF] Execution time=0.594436
DEBUG - 2026-02-28 04:16:18 --> [REQ_ID=5cb595a5297f] [REQUEST][END]
INFO - 2026-02-28 04:16:18 --> [REQ_ID=5cb595a5297f] [PERF] Execution time=0.634761
INFO - 2026-02-28 04:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 04:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 04:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 04:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 04:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.027898
INFO - 2026-02-28 04:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [REQUEST][START] GET /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-28 04:41:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [FILTER_BEFORE] /index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=purchase
DEBUG - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets/Purchase/Memberships
DEBUG - 2026-02-28 04:41:24 --> [CSRF] token name=csrf_test_name hash=ddb108f2263c3a0e0d857f640004bb2f
DEBUG - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [REQUEST][END]
INFO - 2026-02-28 04:41:24 --> [REQ_ID=38b7eebe4a84] [PERF] Execution time=0.057725
DEBUG - 2026-02-28 04:41:25 --> [REQ_ID=303cd2247240] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:41:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:41:26 --> [CSRF] token name=csrf_test_name hash=09c35d373d7a72a078f995e14066db11
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=63d9dee57fa2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:41:26 --> [REQ_ID=63d9dee57fa2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [FILTER_AFTER]
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [LIFECYCLE][END] status=200 duration_ms=51.87 memory_delta=0
INFO - 2026-02-28 04:41:26 --> [REQ_ID=63d9dee57fa2] [PERF] Execution time=0.050490
DEBUG - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [REQUEST][END]
INFO - 2026-02-28 04:41:26 --> [REQ_ID=303cd2247240] [PERF] Execution time=0.064153
INFO - 2026-02-28 04:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 04:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 04:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 04:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 04:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 04:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030044
INFO - 2026-02-28 04:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 04:45:15 --> [REQ_ID=ce581a93f780] [REQUEST][START] GET /
DEBUG - 2026-02-28 04:45:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:45:15 --> [REQ_ID=ce581a93f780] [FILTER_BEFORE] /
DEBUG - 2026-02-28 04:45:15 --> [REQ_ID=ce581a93f780] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 04:45:15 --> [REQ_ID=ce581a93f780] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 04:45:15 --> [CSRF] token name=csrf_test_name hash=b4bfb16182fe6719999d6ecdd01a365a
DEBUG - 2026-02-28 04:45:15 --> [REQ_ID=7f30bc270048] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 04:45:15 --> [REQ_ID=7f30bc270048] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 04:45:15 --> [REQ_ID=7f30bc270048] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 04:45:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 04:45:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 04:45:16 --> [REQ_ID=7f30bc270048] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 04:45:16 --> [REQ_ID=7f30bc270048] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 04:45:16 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 04:45:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 04:45:16 --> [REQ_ID=ce581a93f780] [FILTER_AFTER]
DEBUG - 2026-02-28 04:45:16 --> [REQ_ID=ce581a93f780] [LIFECYCLE][END] status=200 duration_ms=621.76 memory_delta=4194304
INFO - 2026-02-28 04:45:16 --> [REQ_ID=7f30bc270048] [PERF] Execution time=0.619848
DEBUG - 2026-02-28 04:45:16 --> [REQ_ID=ce581a93f780] [REQUEST][END]
INFO - 2026-02-28 04:45:16 --> [REQ_ID=ce581a93f780] [PERF] Execution time=0.660517
DEBUG - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [REQUEST][START] GET /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-02-28 04:47:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [FILTER_BEFORE] /index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=investorProfile
DEBUG - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Investor-Profile
DEBUG - 2026-02-28 04:47:15 --> [CSRF] token name=csrf_test_name hash=d2f8787b8dc4ec92b08e0210e38d3077
DEBUG - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [REQUEST][END]
INFO - 2026-02-28 04:47:15 --> [REQ_ID=5130661bf946] [PERF] Execution time=0.052930
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:47:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:47:16 --> [CSRF] token name=csrf_test_name hash=2fae04e27ace48447144f181c20b354e
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=5282c54c8a05] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:47:16 --> [REQ_ID=5282c54c8a05] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [FILTER_AFTER]
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [LIFECYCLE][END] status=200 duration_ms=152.49 memory_delta=0
INFO - 2026-02-28 04:47:16 --> [REQ_ID=5282c54c8a05] [PERF] Execution time=0.151984
DEBUG - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [REQUEST][END]
INFO - 2026-02-28 04:47:16 --> [REQ_ID=f4d5bd3f447e] [PERF] Execution time=0.164338
DEBUG - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [REQUEST][START] GET /index.php/Knowledgebase/Assets
DEBUG - 2026-02-28 04:48:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [FILTER_BEFORE] /index.php/Knowledgebase/Assets
DEBUG - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [ROUTE] Controller=\App\Modules\User\Controllers\KnowledgebaseController Method=assets
DEBUG - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Knowledgebase/Assets
DEBUG - 2026-02-28 04:48:31 --> [CSRF] token name=csrf_test_name hash=7c1e6cace08147ac0908d049912f2307
DEBUG - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [REQUEST][END]
INFO - 2026-02-28 04:48:31 --> [REQ_ID=180a659a2dbd] [PERF] Execution time=0.011689
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 04:48:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 04:48:32 --> [CSRF] token name=csrf_test_name hash=63fa746da0c78b87b2d7d47a939d652f
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=5d31c16a0b21] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 04:48:32 --> [REQ_ID=5d31c16a0b21] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [FILTER_AFTER]
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [LIFECYCLE][END] status=200 duration_ms=37.46 memory_delta=0
INFO - 2026-02-28 04:48:32 --> [REQ_ID=5d31c16a0b21] [PERF] Execution time=0.036300
DEBUG - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [REQUEST][END]
INFO - 2026-02-28 04:48:32 --> [REQ_ID=b911c6e34628] [PERF] Execution time=0.046765
INFO - 2026-02-28 05:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 05:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 05:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 05:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 05:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 05:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.091794
INFO - 2026-02-28 05:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [REQUEST][END]
INFO - 2026-02-28 05:00:01 --> [REQ_ID=0ba72b4ae700] [PERF] Execution time=0.049241
INFO - 2026-02-28 05:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 05:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 05:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 05:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 05:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 05:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030998
INFO - 2026-02-28 05:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [REQUEST][END]
INFO - 2026-02-28 05:15:01 --> [REQ_ID=f207a2ef73d3] [PERF] Execution time=0.059397
DEBUG - 2026-02-28 05:15:59 --> [REQ_ID=0258b27c5b45] [REQUEST][START] GET /
DEBUG - 2026-02-28 05:15:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:15:59 --> [REQ_ID=0258b27c5b45] [FILTER_BEFORE] /
DEBUG - 2026-02-28 05:15:59 --> [REQ_ID=0258b27c5b45] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 05:15:59 --> [REQ_ID=0258b27c5b45] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 05:15:59 --> [CSRF] token name=csrf_test_name hash=e43ccab885edf7584539d36febf292a9
DEBUG - 2026-02-28 05:15:59 --> [REQ_ID=aaa6b26952d1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 05:15:59 --> [REQ_ID=aaa6b26952d1] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 05:15:59 --> [REQ_ID=aaa6b26952d1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 05:15:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 05:16:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 05:16:00 --> [REQ_ID=aaa6b26952d1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 05:16:00 --> [REQ_ID=aaa6b26952d1] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 05:16:00 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 05:16:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 05:16:00 --> [REQ_ID=0258b27c5b45] [FILTER_AFTER]
DEBUG - 2026-02-28 05:16:00 --> [REQ_ID=0258b27c5b45] [LIFECYCLE][END] status=200 duration_ms=718.50 memory_delta=4194304
INFO - 2026-02-28 05:16:00 --> [REQ_ID=aaa6b26952d1] [PERF] Execution time=0.717161
DEBUG - 2026-02-28 05:16:00 --> [REQ_ID=0258b27c5b45] [REQUEST][END]
INFO - 2026-02-28 05:16:00 --> [REQ_ID=0258b27c5b45] [PERF] Execution time=0.732049
DEBUG - 2026-02-28 05:27:49 --> [REQ_ID=d49e79915cc3] [REQUEST][START] GET /
DEBUG - 2026-02-28 05:27:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:27:49 --> [REQ_ID=d49e79915cc3] [FILTER_BEFORE] /
DEBUG - 2026-02-28 05:27:49 --> [REQ_ID=d49e79915cc3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 05:27:49 --> [REQ_ID=d49e79915cc3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 05:27:49 --> [CSRF] token name=csrf_test_name hash=2155fcb21ba206e95274a60d56e83786
DEBUG - 2026-02-28 05:27:49 --> [REQ_ID=376c1d2673ce] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 05:27:49 --> [REQ_ID=376c1d2673ce] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 05:27:49 --> [REQ_ID=376c1d2673ce] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 05:27:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 05:27:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 05:27:50 --> [REQ_ID=376c1d2673ce] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 05:27:50 --> [REQ_ID=376c1d2673ce] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 05:27:50 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 05:27:50 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 05:27:50 --> [REQ_ID=d49e79915cc3] [FILTER_AFTER]
DEBUG - 2026-02-28 05:27:50 --> [REQ_ID=d49e79915cc3] [LIFECYCLE][END] status=200 duration_ms=728.23 memory_delta=4194304
INFO - 2026-02-28 05:27:50 --> [REQ_ID=376c1d2673ce] [PERF] Execution time=0.726147
DEBUG - 2026-02-28 05:27:50 --> [REQ_ID=d49e79915cc3] [REQUEST][END]
INFO - 2026-02-28 05:27:50 --> [REQ_ID=d49e79915cc3] [PERF] Execution time=0.771701
INFO - 2026-02-28 05:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 05:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 05:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 05:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 05:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 05:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.186486
INFO - 2026-02-28 05:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 05:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 05:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 05:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 05:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 05:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 05:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.029513
INFO - 2026-02-28 05:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [REQUEST][START] GET /index.php/Management/Users
DEBUG - 2026-02-28 05:57:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [FILTER_BEFORE] /index.php/Management/Users
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [ROUTE] Controller=\App\Modules\Management\Controllers\UsersController Method=index
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Users
DEBUG - 2026-02-28 05:57:33 --> [CSRF] token name=csrf_test_name hash=bb9fba432ff3199622f36eb1a20a2746
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [REQUEST][END]
INFO - 2026-02-28 05:57:33 --> [REQ_ID=cc4eec4c45bd] [PERF] Execution time=0.048344
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 05:57:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 05:57:33 --> [CSRF] token name=csrf_test_name hash=3da6600643504174f1422cb1983bc700
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=59c87aad8159] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 05:57:33 --> [REQ_ID=59c87aad8159] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [FILTER_AFTER]
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [LIFECYCLE][END] status=200 duration_ms=172.94 memory_delta=0
INFO - 2026-02-28 05:57:33 --> [REQ_ID=59c87aad8159] [PERF] Execution time=0.172684
DEBUG - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [REQUEST][END]
INFO - 2026-02-28 05:57:33 --> [REQ_ID=15334f2ff00a] [PERF] Execution time=0.188592
INFO - 2026-02-28 06:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 06:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 06:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 06:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 06:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041889
INFO - 2026-02-28 06:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 06:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 06:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [REQUEST][END]
INFO - 2026-02-28 06:00:02 --> [REQ_ID=7133e6cf9267] [PERF] Execution time=0.081172
INFO - 2026-02-28 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 06:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 06:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.011742
INFO - 2026-02-28 06:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 06:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 06:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 06:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 06:00:03 --> LOG_HEALTHCHECK debug marker=374d7a794180
INFO - 2026-02-28 06:00:03 --> LOG_HEALTHCHECK info marker=374d7a794180
NOTICE - 2026-02-28 06:00:03 --> LOG_HEALTHCHECK probe marker=374d7a794180
INFO - 2026-02-28 06:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 06:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025947
INFO - 2026-02-28 06:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 06:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 06:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 06:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 06:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 06:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 06:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.268832
INFO - 2026-02-28 06:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [REQUEST][START] GET /index.php/Management/Wallets
DEBUG - 2026-02-28 06:02:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [FILTER_BEFORE] /index.php/Management/Wallets
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [ROUTE] Controller=\App\Modules\Management\Controllers\WalletsController Method=index
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Wallets
DEBUG - 2026-02-28 06:02:15 --> [CSRF] token name=csrf_test_name hash=d33e8e026ec9756d5a200533ae74a632
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [REQUEST][END]
INFO - 2026-02-28 06:02:15 --> [REQ_ID=20ebfda4f2b4] [PERF] Execution time=0.047317
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 06:02:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 06:02:15 --> [CSRF] token name=csrf_test_name hash=e2c8adda60c58932834e4948591cb03e
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7989ae83087e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 06:02:15 --> [REQ_ID=7989ae83087e] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [FILTER_AFTER]
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [LIFECYCLE][END] status=200 duration_ms=99.98 memory_delta=0
INFO - 2026-02-28 06:02:15 --> [REQ_ID=7989ae83087e] [PERF] Execution time=0.099919
DEBUG - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [REQUEST][END]
INFO - 2026-02-28 06:02:15 --> [REQ_ID=7ff25037241c] [PERF] Execution time=0.114940
DEBUG - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [REQUEST][START] GET /index.php/Management/Admin
DEBUG - 2026-02-28 06:04:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [FILTER_BEFORE] /index.php/Management/Admin
DEBUG - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [ROUTE] Controller=\App\Modules\Management\Controllers\AdminController Method=index
DEBUG - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Admin
DEBUG - 2026-02-28 06:04:17 --> [CSRF] token name=csrf_test_name hash=21ffa8fdbae4903cf7544668121bea39
DEBUG - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [REQUEST][END]
INFO - 2026-02-28 06:04:17 --> [REQ_ID=a1fd427a33b5] [PERF] Execution time=0.053859
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 06:04:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 06:04:18 --> [CSRF] token name=csrf_test_name hash=94e21f13488d8e451b5e6246310dff8c
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=e41d18650e35] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 06:04:18 --> [REQ_ID=e41d18650e35] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [FILTER_AFTER]
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [LIFECYCLE][END] status=200 duration_ms=52.16 memory_delta=0
INFO - 2026-02-28 06:04:18 --> [REQ_ID=e41d18650e35] [PERF] Execution time=0.051931
DEBUG - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [REQUEST][END]
INFO - 2026-02-28 06:04:18 --> [REQ_ID=3af01e99add8] [PERF] Execution time=0.064039
DEBUG - 2026-02-28 06:10:43 --> [REQ_ID=bc35cc470725] [REQUEST][START] GET /
DEBUG - 2026-02-28 06:10:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:10:43 --> [REQ_ID=bc35cc470725] [FILTER_BEFORE] /
DEBUG - 2026-02-28 06:10:43 --> [REQ_ID=bc35cc470725] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 06:10:43 --> [REQ_ID=bc35cc470725] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 06:10:43 --> [CSRF] token name=csrf_test_name hash=43481b20fadd35437eada5261c271533
DEBUG - 2026-02-28 06:10:43 --> [REQ_ID=def5ddd0091e] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 06:10:43 --> [REQ_ID=def5ddd0091e] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 06:10:43 --> [REQ_ID=def5ddd0091e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 06:10:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 06:10:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 06:10:44 --> [REQ_ID=def5ddd0091e] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 06:10:44 --> [REQ_ID=def5ddd0091e] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 06:10:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 06:10:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 06:10:44 --> [REQ_ID=bc35cc470725] [FILTER_AFTER]
DEBUG - 2026-02-28 06:10:44 --> [REQ_ID=bc35cc470725] [LIFECYCLE][END] status=200 duration_ms=764.14 memory_delta=4194304
INFO - 2026-02-28 06:10:44 --> [REQ_ID=def5ddd0091e] [PERF] Execution time=0.761950
DEBUG - 2026-02-28 06:10:44 --> [REQ_ID=bc35cc470725] [REQUEST][END]
INFO - 2026-02-28 06:10:44 --> [REQ_ID=bc35cc470725] [PERF] Execution time=0.804730
INFO - 2026-02-28 06:15:02 --> [spark:ops:work] Started
INFO - 2026-02-28 06:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 06:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 06:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 06:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038267
INFO - 2026-02-28 06:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [REQUEST][END]
INFO - 2026-02-28 06:15:02 --> [REQ_ID=8396f50365a5] [PERF] Execution time=0.116596
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 06:18:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 06:18:14 --> [CSRF] token name=csrf_test_name hash=fe871b1aeeef3020a513fad9ea4f2960
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=118f6e527c6e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 06:18:14 --> [REQ_ID=118f6e527c6e] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [FILTER_AFTER]
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [LIFECYCLE][END] status=200 duration_ms=58.91 memory_delta=0
INFO - 2026-02-28 06:18:14 --> [REQ_ID=118f6e527c6e] [PERF] Execution time=0.056608
DEBUG - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [REQUEST][END]
INFO - 2026-02-28 06:18:14 --> [REQ_ID=a8c8b401-8b77-4288-9ff5-f8417c21a71e] [PERF] Execution time=0.098252
INFO - 2026-02-28 06:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 06:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 06:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 06:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.080459
INFO - 2026-02-28 06:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [REQUEST][START] GET /index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-28 06:33:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [FILTER_BEFORE] /index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=campaigns
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Campaigns
DEBUG - 2026-02-28 06:33:45 --> [CSRF] token name=csrf_test_name hash=d631f2bffaeb9a3e14a339d8f557c033
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [REQUEST][END]
INFO - 2026-02-28 06:33:45 --> [REQ_ID=2954e6f98deb] [PERF] Execution time=0.056547
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 06:33:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 06:33:45 --> [CSRF] token name=csrf_test_name hash=181c26df121e1741bbedb9db5d7b5eb4
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=20c9e8c85dcd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 06:33:45 --> [REQ_ID=20c9e8c85dcd] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [FILTER_AFTER]
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [LIFECYCLE][END] status=200 duration_ms=157.64 memory_delta=0
INFO - 2026-02-28 06:33:45 --> [REQ_ID=20c9e8c85dcd] [PERF] Execution time=0.157578
DEBUG - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [REQUEST][END]
INFO - 2026-02-28 06:33:45 --> [REQ_ID=be5deb756c87] [PERF] Execution time=0.170502
INFO - 2026-02-28 06:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 06:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 06:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 06:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 06:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 06:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.080923
INFO - 2026-02-28 06:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [REQUEST][START] GET /index.php/Account
DEBUG - 2026-02-28 06:55:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [FILTER_BEFORE] /index.php/Account
DEBUG - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=account
DEBUG - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account
DEBUG - 2026-02-28 06:55:33 --> [CSRF] token name=csrf_test_name hash=a792a11430a758384555bb765b84bf50
DEBUG - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [REQUEST][END]
INFO - 2026-02-28 06:55:33 --> [REQ_ID=8c68406dd3a8] [PERF] Execution time=0.052860
DEBUG - 2026-02-28 06:55:34 --> [REQ_ID=a1db12ebc6d9] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 06:55:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 06:55:34 --> [REQ_ID=a1db12ebc6d9] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 06:55:34 --> [REQ_ID=a1db12ebc6d9] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 06:55:34 --> [REQ_ID=a1db12ebc6d9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 06:55:34 --> [CSRF] token name=csrf_test_name hash=6ac1700cab906d3457eb8e8257e6c88d
DEBUG - 2026-02-28 06:55:34 --> [REQ_ID=8e4b6acd851d] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 06:55:34 --> [REQ_ID=8e4b6acd851d] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 06:55:35 --> [REQ_ID=a1db12ebc6d9] [FILTER_AFTER]
DEBUG - 2026-02-28 06:55:35 --> [REQ_ID=a1db12ebc6d9] [LIFECYCLE][END] status=200 duration_ms=130.51 memory_delta=0
INFO - 2026-02-28 06:55:35 --> [REQ_ID=8e4b6acd851d] [PERF] Execution time=0.130289
DEBUG - 2026-02-28 06:55:35 --> [REQ_ID=a1db12ebc6d9] [REQUEST][END]
INFO - 2026-02-28 06:55:35 --> [REQ_ID=a1db12ebc6d9] [PERF] Execution time=0.141645
INFO - 2026-02-28 07:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 07:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 07:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 07:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 07:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-28 07:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 07:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.093386
INFO - 2026-02-28 07:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [REQUEST][END]
INFO - 2026-02-28 07:00:02 --> [REQ_ID=a26b27bfdac0] [PERF] Execution time=0.070450
DEBUG - 2026-02-28 07:02:36 --> [REQ_ID=feb9b7a4d7fa] [REQUEST][START] GET /
DEBUG - 2026-02-28 07:02:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 07:02:36 --> [REQ_ID=feb9b7a4d7fa] [FILTER_BEFORE] /
DEBUG - 2026-02-28 07:02:36 --> [REQ_ID=feb9b7a4d7fa] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 07:02:36 --> [REQ_ID=feb9b7a4d7fa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 07:02:36 --> [CSRF] token name=csrf_test_name hash=7cb7d2fcc7f8bbb1017e4321f4e7b850
DEBUG - 2026-02-28 07:02:36 --> [REQ_ID=9f8979aabbed] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 07:02:36 --> [REQ_ID=9f8979aabbed] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 07:02:36 --> [REQ_ID=9f8979aabbed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 07:02:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 07:02:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 07:02:37 --> [REQ_ID=9f8979aabbed] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 07:02:37 --> [REQ_ID=9f8979aabbed] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 07:02:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 07:02:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 07:02:37 --> [REQ_ID=feb9b7a4d7fa] [FILTER_AFTER]
DEBUG - 2026-02-28 07:02:37 --> [REQ_ID=feb9b7a4d7fa] [LIFECYCLE][END] status=200 duration_ms=825.49 memory_delta=4194304
INFO - 2026-02-28 07:02:37 --> [REQ_ID=9f8979aabbed] [PERF] Execution time=0.823630
DEBUG - 2026-02-28 07:02:37 --> [REQ_ID=feb9b7a4d7fa] [REQUEST][END]
INFO - 2026-02-28 07:02:37 --> [REQ_ID=feb9b7a4d7fa] [PERF] Execution time=0.862997
INFO - 2026-02-28 07:15:02 --> [spark:ops:work] Started
INFO - 2026-02-28 07:15:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 07:15:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 07:15:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-28 07:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 07:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.092364
INFO - 2026-02-28 07:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [REQUEST][END]
INFO - 2026-02-28 07:15:02 --> [REQ_ID=c2fa6351d592] [PERF] Execution time=0.081540
INFO - 2026-02-28 07:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 07:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 07:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 07:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 07:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 07:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031761
INFO - 2026-02-28 07:30:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 07:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 07:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 07:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 07:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 07:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 07:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.039109
INFO - 2026-02-28 07:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [REQUEST][END]
INFO - 2026-02-28 08:00:02 --> [REQ_ID=a47bdf203d57] [PERF] Execution time=0.102636
INFO - 2026-02-28 08:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-28 08:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 08:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 08:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 08:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 08:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.198273
INFO - 2026-02-28 08:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 08:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 08:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 08:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.009153
INFO - 2026-02-28 08:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 08:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 08:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 08:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 08:00:04 --> LOG_HEALTHCHECK debug marker=11efd1f241e9
INFO - 2026-02-28 08:00:04 --> LOG_HEALTHCHECK info marker=11efd1f241e9
NOTICE - 2026-02-28 08:00:04 --> LOG_HEALTHCHECK probe marker=11efd1f241e9
INFO - 2026-02-28 08:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 08:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028571
INFO - 2026-02-28 08:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 08:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 08:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 08:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 08:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 08:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 08:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.157647
INFO - 2026-02-28 08:00:05 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 08:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 08:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 08:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 08:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036931
INFO - 2026-02-28 08:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [REQUEST][END]
INFO - 2026-02-28 08:15:01 --> [REQ_ID=a375ebebb18b] [PERF] Execution time=0.044311
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [REQUEST][START] GET /index.php/Customer-Support
DEBUG - 2026-02-28 08:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [FILTER_BEFORE] /index.php/Customer-Support
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [ROUTE] Controller=\App\Controllers\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Customer-Support
DEBUG - 2026-02-28 08:20:15 --> [CSRF] token name=csrf_test_name hash=a60df7e2c83fd6bda11a91a6f4158e20
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [REQUEST][END]
INFO - 2026-02-28 08:20:15 --> [REQ_ID=e806516a9a53] [PERF] Execution time=0.046051
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 08:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 08:20:15 --> [CSRF] token name=csrf_test_name hash=7ab628e5e123a050b547696cbcbd2f36
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=0f7264420cd5] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 08:20:15 --> [REQ_ID=0f7264420cd5] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [FILTER_AFTER]
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [LIFECYCLE][END] status=200 duration_ms=52.43 memory_delta=0
INFO - 2026-02-28 08:20:15 --> [REQ_ID=0f7264420cd5] [PERF] Execution time=0.052183
DEBUG - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [REQUEST][END]
INFO - 2026-02-28 08:20:15 --> [REQ_ID=88ed6781d943] [PERF] Execution time=0.066906
INFO - 2026-02-28 08:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 08:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 08:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 08:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 08:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.096662
INFO - 2026-02-28 08:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 08:32:40 --> [REQ_ID=43e6efe11dc6] [REQUEST][START] GET /
DEBUG - 2026-02-28 08:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:32:40 --> [REQ_ID=43e6efe11dc6] [FILTER_BEFORE] /
DEBUG - 2026-02-28 08:32:40 --> [REQ_ID=43e6efe11dc6] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 08:32:40 --> [REQ_ID=43e6efe11dc6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 08:32:40 --> [CSRF] token name=csrf_test_name hash=ec530e528f18117602b462732c02856e
DEBUG - 2026-02-28 08:32:40 --> [REQ_ID=1057f8ecc2ef] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 08:32:40 --> [REQ_ID=1057f8ecc2ef] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 08:32:41 --> [REQ_ID=1057f8ecc2ef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 08:32:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 08:32:41 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 08:32:41 --> [REQ_ID=1057f8ecc2ef] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 08:32:41 --> [REQ_ID=1057f8ecc2ef] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 08:32:41 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 08:32:41 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 08:32:41 --> [REQ_ID=43e6efe11dc6] [FILTER_AFTER]
DEBUG - 2026-02-28 08:32:41 --> [REQ_ID=43e6efe11dc6] [LIFECYCLE][END] status=200 duration_ms=722.11 memory_delta=4194304
INFO - 2026-02-28 08:32:41 --> [REQ_ID=1057f8ecc2ef] [PERF] Execution time=0.720147
DEBUG - 2026-02-28 08:32:41 --> [REQ_ID=43e6efe11dc6] [REQUEST][END]
INFO - 2026-02-28 08:32:41 --> [REQ_ID=43e6efe11dc6] [PERF] Execution time=0.760057
DEBUG - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [REQUEST][START] GET /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-28 08:36:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [FILTER_BEFORE] /index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [ROUTE] Controller=\App\Controllers\Home Method=terms
DEBUG - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions
DEBUG - 2026-02-28 08:36:49 --> [CSRF] token name=csrf_test_name hash=b2de10381912014a8530a5c231629c9e
DEBUG - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [REQUEST][END]
INFO - 2026-02-28 08:36:49 --> [REQ_ID=223f9367e271] [PERF] Execution time=0.049469
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 08:36:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 08:36:50 --> [CSRF] token name=csrf_test_name hash=833ce6ba4345401a8138b070a1dbeeb8
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=c971b6defadd] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 08:36:50 --> [REQ_ID=c971b6defadd] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [FILTER_AFTER]
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [LIFECYCLE][END] status=200 duration_ms=50.40 memory_delta=0
INFO - 2026-02-28 08:36:50 --> [REQ_ID=c971b6defadd] [PERF] Execution time=0.050133
DEBUG - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [REQUEST][END]
INFO - 2026-02-28 08:36:50 --> [REQ_ID=056b47706951] [PERF] Execution time=0.062375
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [REQUEST][START] GET /index.php/Account/Activity
DEBUG - 2026-02-28 08:39:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [FILTER_BEFORE] /index.php/Account/Activity
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=activity
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Activity
DEBUG - 2026-02-28 08:39:25 --> [CSRF] token name=csrf_test_name hash=f83fe589bebf9ea5a992a3a3eac450ba
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [REQUEST][END]
INFO - 2026-02-28 08:39:25 --> [REQ_ID=2e6beb81fa33] [PERF] Execution time=0.053431
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 08:39:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 08:39:25 --> [CSRF] token name=csrf_test_name hash=717b148f614f3d9f921aedcb1f46d167
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=12cafe9aa4c4] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 08:39:25 --> [REQ_ID=12cafe9aa4c4] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [FILTER_AFTER]
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [LIFECYCLE][END] status=200 duration_ms=42.42 memory_delta=0
INFO - 2026-02-28 08:39:25 --> [REQ_ID=12cafe9aa4c4] [PERF] Execution time=0.042176
DEBUG - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [REQUEST][END]
INFO - 2026-02-28 08:39:25 --> [REQ_ID=732daa6b6252] [PERF] Execution time=0.055717
INFO - 2026-02-28 08:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 08:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 08:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 08:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 08:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 08:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.093143
INFO - 2026-02-28 08:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 08:56:53 --> [REQ_ID=3ce1291febe0] [REQUEST][START] GET /index.php/Features/Advanced-Investment-Portfoio-Manager
DEBUG - 2026-02-28 08:56:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 08:56:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Advanced-Investment-Portfoio-Manager]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 08:56:53 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 08:56:53 --> [404] URI=https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager
WARNING - 2026-02-28 08:56:53 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager | referrer: none
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [REQUEST][START] GET /index.php/My-Referrals
DEBUG - 2026-02-28 08:58:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [FILTER_BEFORE] /index.php/My-Referrals
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [ROUTE] Controller=\App\Modules\User\Controllers\ReferralController Method=index
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/My-Referrals
DEBUG - 2026-02-28 08:58:40 --> [CSRF] token name=csrf_test_name hash=22b8bb5d229c3646363fba507b601a7a
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [REQUEST][END]
INFO - 2026-02-28 08:58:40 --> [REQ_ID=7109e58a92a8] [PERF] Execution time=0.029289
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 08:58:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 08:58:40 --> [CSRF] token name=csrf_test_name hash=e68324c8e34e60aa94b3923524e47bb6
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=ab5a925139d8] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 08:58:40 --> [REQ_ID=ab5a925139d8] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [FILTER_AFTER]
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [LIFECYCLE][END] status=200 duration_ms=45.24 memory_delta=0
INFO - 2026-02-28 08:58:40 --> [REQ_ID=ab5a925139d8] [PERF] Execution time=0.044909
DEBUG - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [REQUEST][END]
INFO - 2026-02-28 08:58:40 --> [REQ_ID=e10e520c6300] [PERF] Execution time=0.058130
INFO - 2026-02-28 09:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 09:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 09:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 09:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 09:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 09:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.040249
INFO - 2026-02-28 09:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [REQUEST][END]
INFO - 2026-02-28 09:00:01 --> [REQ_ID=e53d461a3836] [PERF] Execution time=0.050306
DEBUG - 2026-02-28 09:05:43 --> [REQ_ID=9183cc41bd77] [REQUEST][START] GET /index.php/Terms-Of-Service
DEBUG - 2026-02-28 09:05:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:05:43 --> [REQ_ID=9183cc41bd77] [FILTER_BEFORE] /index.php/Terms-Of-Service
DEBUG - 2026-02-28 09:05:43 --> [REQ_ID=9183cc41bd77] [ROUTE] Controller=\App\Controllers\Home Method=termsOfService
DEBUG - 2026-02-28 09:05:43 --> [REQ_ID=9183cc41bd77] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Terms-Of-Service
DEBUG - 2026-02-28 09:05:43 --> [CSRF] token name=csrf_test_name hash=d8db322878f7978a0eb10034bd296e0a
DEBUG - 2026-02-28 09:05:43 --> [REQ_ID=675205499b20] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 09:05:43 --> [REQ_ID=675205499b20] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 09:05:44 --> [REQ_ID=675205499b20] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 09:05:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 09:05:44 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
DEBUG - 2026-02-28 09:05:44 --> [REQ_ID=675205499b20] [VIEW_RENDER] themes/public/termsOfService
INFO - 2026-02-28 09:05:44 --> [REQ_ID=675205499b20] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 09:05:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 09:05:44 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-28 09:05:44 --> [REQ_ID=9183cc41bd77] [FILTER_AFTER]
DEBUG - 2026-02-28 09:05:44 --> [REQ_ID=9183cc41bd77] [LIFECYCLE][END] status=200 duration_ms=687.96 memory_delta=4194304
INFO - 2026-02-28 09:05:44 --> [REQ_ID=675205499b20] [PERF] Execution time=0.685927
DEBUG - 2026-02-28 09:05:44 --> [REQ_ID=9183cc41bd77] [REQUEST][END]
INFO - 2026-02-28 09:05:44 --> [REQ_ID=9183cc41bd77] [PERF] Execution time=0.725982
DEBUG - 2026-02-28 09:06:59 --> [REQ_ID=61bc50ba0be0] [REQUEST][START] GET /
DEBUG - 2026-02-28 09:06:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:06:59 --> [REQ_ID=61bc50ba0be0] [FILTER_BEFORE] /
DEBUG - 2026-02-28 09:06:59 --> [REQ_ID=61bc50ba0be0] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 09:06:59 --> [REQ_ID=61bc50ba0be0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 09:06:59 --> [CSRF] token name=csrf_test_name hash=d27b5b293a56b44d9effcdc91a2327ea
DEBUG - 2026-02-28 09:06:59 --> [REQ_ID=57e1468932d5] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 09:06:59 --> [REQ_ID=57e1468932d5] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 09:07:00 --> [REQ_ID=57e1468932d5] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-28 09:07:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 09:07:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 09:07:00 --> [REQ_ID=57e1468932d5] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 09:07:00 --> [REQ_ID=57e1468932d5] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 09:07:00 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 09:07:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 09:07:00 --> [REQ_ID=61bc50ba0be0] [FILTER_AFTER]
DEBUG - 2026-02-28 09:07:00 --> [REQ_ID=61bc50ba0be0] [LIFECYCLE][END] status=200 duration_ms=579.20 memory_delta=4194304
INFO - 2026-02-28 09:07:00 --> [REQ_ID=57e1468932d5] [PERF] Execution time=0.579048
DEBUG - 2026-02-28 09:07:00 --> [REQ_ID=61bc50ba0be0] [REQUEST][END]
INFO - 2026-02-28 09:07:00 --> [REQ_ID=61bc50ba0be0] [PERF] Execution time=0.588812
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [REQUEST][START] GET /index.php/Management/Services
DEBUG - 2026-02-28 09:11:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [FILTER_BEFORE] /index.php/Management/Services
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [ROUTE] Controller=\App\Modules\Management\Controllers\ServicesController Method=index
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Services
DEBUG - 2026-02-28 09:11:21 --> [CSRF] token name=csrf_test_name hash=a03d92154f56db55e41bd85a5ac85d83
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [REQUEST][END]
INFO - 2026-02-28 09:11:21 --> [REQ_ID=753e8344891b] [PERF] Execution time=0.049554
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 09:11:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 09:11:21 --> [CSRF] token name=csrf_test_name hash=373ce09b406c77f22367e7d288e2cf3f
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=19fa9feb4ee2] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 09:11:21 --> [REQ_ID=19fa9feb4ee2] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [FILTER_AFTER]
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [LIFECYCLE][END] status=200 duration_ms=154.79 memory_delta=0
INFO - 2026-02-28 09:11:21 --> [REQ_ID=19fa9feb4ee2] [PERF] Execution time=0.154510
DEBUG - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [REQUEST][END]
INFO - 2026-02-28 09:11:21 --> [REQ_ID=d7bf7e644d4d] [PERF] Execution time=0.170522
INFO - 2026-02-28 09:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 09:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 09:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 09:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 09:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 09:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.038471
INFO - 2026-02-28 09:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [REQUEST][END]
INFO - 2026-02-28 09:15:01 --> [REQ_ID=b178bd722a9b] [PERF] Execution time=0.061163
DEBUG - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-02-28 09:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-02-28 09:16:17 --> [CSRF] token name=csrf_test_name hash=4b329623abe30655bd71e3eb174719ea
DEBUG - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [REQUEST][END]
INFO - 2026-02-28 09:16:17 --> [REQ_ID=f0c599f24538] [PERF] Execution time=0.051798
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 09:16:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 09:16:18 --> [CSRF] token name=csrf_test_name hash=86f044a9eb015cfc020ee000f8e05631
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=1697c6680d16] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 09:16:18 --> [REQ_ID=1697c6680d16] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [FILTER_AFTER]
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [LIFECYCLE][END] status=200 duration_ms=49.58 memory_delta=0
INFO - 2026-02-28 09:16:18 --> [REQ_ID=1697c6680d16] [PERF] Execution time=0.049350
DEBUG - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [REQUEST][END]
INFO - 2026-02-28 09:16:18 --> [REQ_ID=013e2ab025e8] [PERF] Execution time=0.061139
INFO - 2026-02-28 09:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 09:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 09:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 09:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 09:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 09:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.147276
INFO - 2026-02-28 09:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 09:40:31 --> [REQ_ID=037d8e3e327a] [REQUEST][START] GET /
DEBUG - 2026-02-28 09:40:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:40:31 --> [REQ_ID=037d8e3e327a] [FILTER_BEFORE] /
DEBUG - 2026-02-28 09:40:31 --> [REQ_ID=037d8e3e327a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 09:40:31 --> [REQ_ID=037d8e3e327a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 09:40:31 --> [CSRF] token name=csrf_test_name hash=6cedb7d7acaa6eeb6d79e1a90e7d76f0
DEBUG - 2026-02-28 09:40:31 --> [REQ_ID=dc72a635e2ba] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 09:40:31 --> [REQ_ID=dc72a635e2ba] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 09:40:31 --> [REQ_ID=dc72a635e2ba] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 09:40:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 09:40:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 09:40:32 --> [REQ_ID=dc72a635e2ba] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 09:40:32 --> [REQ_ID=dc72a635e2ba] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 09:40:32 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 09:40:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 09:40:32 --> [REQ_ID=037d8e3e327a] [FILTER_AFTER]
DEBUG - 2026-02-28 09:40:32 --> [REQ_ID=037d8e3e327a] [LIFECYCLE][END] status=200 duration_ms=739.08 memory_delta=4194304
INFO - 2026-02-28 09:40:32 --> [REQ_ID=dc72a635e2ba] [PERF] Execution time=0.737329
DEBUG - 2026-02-28 09:40:32 --> [REQ_ID=037d8e3e327a] [REQUEST][END]
INFO - 2026-02-28 09:40:32 --> [REQ_ID=037d8e3e327a] [PERF] Execution time=0.777536
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [REQUEST][START] GET /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-28 09:44:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [FILTER_BEFORE] /index.php/Management/Marketing/Ideas
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=ideas
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Ideas
DEBUG - 2026-02-28 09:44:01 --> [CSRF] token name=csrf_test_name hash=47ae5193bfc420d62d7cb842743daa66
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [REQUEST][END]
INFO - 2026-02-28 09:44:01 --> [REQ_ID=7863aae5a377] [PERF] Execution time=0.058474
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 09:44:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 09:44:01 --> [CSRF] token name=csrf_test_name hash=8d87dd6430cc319c31ad33d08fd8f8a2
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=98ed9da50a49] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 09:44:01 --> [REQ_ID=98ed9da50a49] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [FILTER_AFTER]
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [LIFECYCLE][END] status=200 duration_ms=52.83 memory_delta=0
INFO - 2026-02-28 09:44:01 --> [REQ_ID=98ed9da50a49] [PERF] Execution time=0.052606
DEBUG - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [REQUEST][END]
INFO - 2026-02-28 09:44:01 --> [REQ_ID=6ac2f0f60d31] [PERF] Execution time=0.064717
INFO - 2026-02-28 09:45:02 --> [spark:ops:work] Started
INFO - 2026-02-28 09:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 09:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 09:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 09:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 09:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035057
INFO - 2026-02-28 09:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [REQUEST][START] GET /index.php/Account/Connected-Accounts
DEBUG - 2026-02-28 09:46:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [FILTER_BEFORE] /index.php/Account/Connected-Accounts
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=connectedAccounts
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Connected-Accounts
DEBUG - 2026-02-28 09:46:55 --> [CSRF] token name=csrf_test_name hash=b12b0c2e6381bd5d8183279f4d88a413
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [REQUEST][END]
INFO - 2026-02-28 09:46:55 --> [REQ_ID=cffc95e94d0d] [PERF] Execution time=0.053834
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 09:46:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 09:46:55 --> [CSRF] token name=csrf_test_name hash=b8e60786068b07b70bd0074b2824700f
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=56f73e72e2be] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 09:46:55 --> [REQ_ID=56f73e72e2be] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [FILTER_AFTER]
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [LIFECYCLE][END] status=200 duration_ms=98.92 memory_delta=0
INFO - 2026-02-28 09:46:55 --> [REQ_ID=56f73e72e2be] [PERF] Execution time=0.098863
DEBUG - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [REQUEST][END]
INFO - 2026-02-28 09:46:55 --> [REQ_ID=10479217ccd5] [PERF] Execution time=0.110310
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [REQUEST][START] GET /index.php/Preview/Alert/GRAB
DEBUG - 2026-02-28 09:47:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [FILTER_BEFORE] /index.php/Preview/Alert/GRAB
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/GRAB
DEBUG - 2026-02-28 09:47:42 --> [CSRF] token name=csrf_test_name hash=af5244c343bd327e9c962c38c64bfcbb
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [METHOD_ENTRY] preview
DEBUG - 2026-02-28 09:47:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 09:47:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 09:47:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-28 09:47:42 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 09:47:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 09:47:42 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:47:42 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-02-28 09:47:42 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 4.22
    [current_price] => 4.22
    [last_updated] => 2026-02-28 09:47:42
    [last_updated_time] => 2026-02-28 09:47:42
)

INFO - 2026-02-28 09:47:42 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-02-28 09:47:42 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 09:47:42 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [FILTER_AFTER]
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [LIFECYCLE][END] status=200 duration_ms=501.70 memory_delta=2097152
INFO - 2026-02-28 09:47:42 --> [REQ_ID=59cdcf0ea086] [PERF] Execution time=0.501455
DEBUG - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [REQUEST][END]
INFO - 2026-02-28 09:47:42 --> [REQ_ID=71722746c401] [PERF] Execution time=0.511795
DEBUG - 2026-02-28 09:53:16 --> [REQ_ID=14b4eccd9462] [REQUEST][START] GET /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-28 09:53:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 09:53:16 --> [REQ_ID=14b4eccd9462] [FILTER_BEFORE] /index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-28 09:53:16 --> [REQ_ID=14b4eccd9462] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 09:53:16 --> [REQ_ID=14b4eccd9462] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Automated-Financial-Insights
DEBUG - 2026-02-28 09:53:16 --> [CSRF] token name=csrf_test_name hash=2964105bd553444451e46b624287ea82
DEBUG - 2026-02-28 09:53:16 --> [REQ_ID=1de2ede26276] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 09:53:16 --> [REQ_ID=1de2ede26276] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 09:53:17 --> [REQ_ID=1de2ede26276] [METHOD_ENTRY] show
DEBUG - 2026-02-28 09:53:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 09:53:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 09:53:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:53:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 09:53:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 09:53:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 09:53:17 --> [REQ_ID=14b4eccd9462] [FILTER_AFTER]
DEBUG - 2026-02-28 09:53:17 --> [REQ_ID=14b4eccd9462] [LIFECYCLE][END] status=404 duration_ms=189.38 memory_delta=0
INFO - 2026-02-28 09:53:17 --> [REQ_ID=1de2ede26276] [PERF] Execution time=0.187460
DEBUG - 2026-02-28 09:53:17 --> [REQ_ID=14b4eccd9462] [REQUEST][END]
INFO - 2026-02-28 09:53:17 --> [REQ_ID=14b4eccd9462] [PERF] Execution time=0.230791
INFO - 2026-02-28 10:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 10:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 10:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 10:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-28 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 10:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.050911
INFO - 2026-02-28 10:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [REQUEST][END]
INFO - 2026-02-28 10:00:01 --> [REQ_ID=fb23506a1312] [PERF] Execution time=0.054046
INFO - 2026-02-28 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 10:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 10:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.013523
INFO - 2026-02-28 10:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 10:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 10:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 10:00:03 --> LOG_HEALTHCHECK debug marker=9e0205ff1f4a
INFO - 2026-02-28 10:00:03 --> LOG_HEALTHCHECK info marker=9e0205ff1f4a
NOTICE - 2026-02-28 10:00:03 --> LOG_HEALTHCHECK probe marker=9e0205ff1f4a
INFO - 2026-02-28 10:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 10:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026989
INFO - 2026-02-28 10:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 10:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 10:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 10:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 10:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 10:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 10:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.425741
INFO - 2026-02-28 10:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [REQUEST][START] GET /index.php/Account/Billing
DEBUG - 2026-02-28 10:12:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [FILTER_BEFORE] /index.php/Account/Billing
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=billing
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Account/Billing
DEBUG - 2026-02-28 10:12:11 --> [CSRF] token name=csrf_test_name hash=d45fcf6d03ea526e61382a86c67d7469
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [REQUEST][END]
INFO - 2026-02-28 10:12:11 --> [REQ_ID=e0ac8b8dbd42] [PERF] Execution time=0.054039
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 10:12:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 10:12:11 --> [CSRF] token name=csrf_test_name hash=6eeda917daabce69a452fbec2c311fd9
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=681a93f2e710] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 10:12:11 --> [REQ_ID=681a93f2e710] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [FILTER_AFTER]
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [LIFECYCLE][END] status=200 duration_ms=51.60 memory_delta=0
INFO - 2026-02-28 10:12:11 --> [REQ_ID=681a93f2e710] [PERF] Execution time=0.051399
DEBUG - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [REQUEST][END]
INFO - 2026-02-28 10:12:11 --> [REQ_ID=d63f3f4e8488] [PERF] Execution time=0.064407
DEBUG - 2026-02-28 10:13:53 --> [REQ_ID=db07a8a3c222] [REQUEST][START] GET /
DEBUG - 2026-02-28 10:13:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:13:53 --> [REQ_ID=db07a8a3c222] [FILTER_BEFORE] /
DEBUG - 2026-02-28 10:13:53 --> [REQ_ID=db07a8a3c222] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 10:13:53 --> [REQ_ID=db07a8a3c222] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 10:13:53 --> [CSRF] token name=csrf_test_name hash=bfd2d3c70da60b9cc793d519750beb8f
DEBUG - 2026-02-28 10:13:53 --> [REQ_ID=b474150134ef] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 10:13:53 --> [REQ_ID=b474150134ef] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 10:13:53 --> [REQ_ID=b474150134ef] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 10:13:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 10:13:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 10:13:54 --> [REQ_ID=b474150134ef] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 10:13:54 --> [REQ_ID=b474150134ef] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 10:13:54 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 10:13:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 10:13:54 --> [REQ_ID=db07a8a3c222] [FILTER_AFTER]
DEBUG - 2026-02-28 10:13:54 --> [REQ_ID=db07a8a3c222] [LIFECYCLE][END] status=200 duration_ms=606.28 memory_delta=4194304
INFO - 2026-02-28 10:13:54 --> [REQ_ID=b474150134ef] [PERF] Execution time=0.604100
DEBUG - 2026-02-28 10:13:54 --> [REQ_ID=db07a8a3c222] [REQUEST][END]
INFO - 2026-02-28 10:13:54 --> [REQ_ID=db07a8a3c222] [PERF] Execution time=0.644944
DEBUG - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [REQUEST][END]
INFO - 2026-02-28 10:15:01 --> [REQ_ID=b62b755ae966] [PERF] Execution time=0.052311
INFO - 2026-02-28 10:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 10:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 10:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 10:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 10:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028046
INFO - 2026-02-28 10:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 10:23:46 --> [REQ_ID=9f7a049bcde3] [REQUEST][START] GET /
DEBUG - 2026-02-28 10:23:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [FILTER_BEFORE] /
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 10:23:47 --> [CSRF] token name=csrf_test_name hash=9ce35eedbbb99fd414aafd97861ae907
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 10:23:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 10:23:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 10:23:47 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 10:23:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [FILTER_AFTER]
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [LIFECYCLE][END] status=200 duration_ms=627.25 memory_delta=4194304
INFO - 2026-02-28 10:23:47 --> [REQ_ID=31fc62523135] [PERF] Execution time=0.625293
DEBUG - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [REQUEST][END]
INFO - 2026-02-28 10:23:47 --> [REQ_ID=9f7a049bcde3] [PERF] Execution time=0.666735
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a7dd9566543f] [REQUEST][START] GET /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-28 10:24:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a7dd9566543f] [FILTER_BEFORE] /index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a7dd9566543f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a7dd9566543f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Personal-Budgeting
DEBUG - 2026-02-28 10:24:31 --> [CSRF] token name=csrf_test_name hash=566ddb5f08c4adb7f4cddcdc0b85d5fc
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [METHOD_ENTRY] show
DEBUG - 2026-02-28 10:24:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 10:24:31 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 10:24:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 10:24:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 10:24:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 10:24:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Personal_Budgeting
INFO - 2026-02-28 10:24:31 --> [REQ_ID=a9747f085d0b] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 10:24:32 --> themesMemory usage: 12582912
DEBUG - 2026-02-28 10:24:32 --> [REQ_ID=a7dd9566543f] [FILTER_AFTER]
DEBUG - 2026-02-28 10:24:32 --> [REQ_ID=a7dd9566543f] [LIFECYCLE][END] status=200 duration_ms=1,064.12 memory_delta=6291456
INFO - 2026-02-28 10:24:32 --> [REQ_ID=a9747f085d0b] [PERF] Execution time=1.063399
DEBUG - 2026-02-28 10:24:32 --> [REQ_ID=a7dd9566543f] [REQUEST][END]
INFO - 2026-02-28 10:24:32 --> [REQ_ID=a7dd9566543f] [PERF] Execution time=1.077915
INFO - 2026-02-28 10:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 10:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 10:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 10:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 10:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.098091
INFO - 2026-02-28 10:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [REQUEST][START] GET /index.php/Management/Partners
DEBUG - 2026-02-28 10:36:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [FILTER_BEFORE] /index.php/Management/Partners
DEBUG - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [ROUTE] Controller=\App\Modules\Management\Controllers\PartnersController Method=index
DEBUG - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Partners
DEBUG - 2026-02-28 10:36:46 --> [CSRF] token name=csrf_test_name hash=26c32801a76b99bee21bec3edfb28181
DEBUG - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [REQUEST][END]
INFO - 2026-02-28 10:36:46 --> [REQ_ID=2bf036aff947] [PERF] Execution time=0.047000
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 10:36:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 10:36:47 --> [CSRF] token name=csrf_test_name hash=5e6e5df6625edcfc4a8afeff9df45e35
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=95e4f222c452] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 10:36:47 --> [REQ_ID=95e4f222c452] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [FILTER_AFTER]
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [LIFECYCLE][END] status=200 duration_ms=110.46 memory_delta=0
INFO - 2026-02-28 10:36:47 --> [REQ_ID=95e4f222c452] [PERF] Execution time=0.110201
DEBUG - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [REQUEST][END]
INFO - 2026-02-28 10:36:47 --> [REQ_ID=2fa00c3405c2] [PERF] Execution time=0.125365
INFO - 2026-02-28 10:45:02 --> [spark:ops:work] Started
INFO - 2026-02-28 10:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 10:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 10:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 10:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 10:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.028595
INFO - 2026-02-28 10:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 11:00:01 --> [spark:ops:work] Started
DEBUG - 2026-02-28 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-28 11:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 11:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 11:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 11:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 11:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.043472
INFO - 2026-02-28 11:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [REQUEST][END]
INFO - 2026-02-28 11:00:01 --> [REQ_ID=c30a10972856] [PERF] Execution time=0.065137
INFO - 2026-02-28 11:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 11:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 11:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 11:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 11:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 11:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036313
INFO - 2026-02-28 11:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [REQUEST][END]
INFO - 2026-02-28 11:15:01 --> [REQ_ID=5c638e9a77f3] [PERF] Execution time=0.044405
DEBUG - 2026-02-28 11:24:02 --> [REQ_ID=58c4fe0761ab] [REQUEST][START] GET /index.php/Management/Docs
DEBUG - 2026-02-28 11:24:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 11:24:02 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/Docs]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 11:24:02 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 11:24:02 --> [404] URI=https://www.mymiwallet.com/index.php/Management/Docs
WARNING - 2026-02-28 11:24:02 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/Docs | referrer: none
DEBUG - 2026-02-28 11:25:14 --> [REQ_ID=bf32979fba65] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-02-28 11:25:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:25:14 --> [REQ_ID=bf32979fba65] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-02-28 11:25:14 --> [REQ_ID=bf32979fba65] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-02-28 11:25:14 --> [REQ_ID=bf32979fba65] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-02-28 11:25:14 --> [CSRF] token name=csrf_test_name hash=cd79870e31413c4f611a42eac832aac5
DEBUG - 2026-02-28 11:25:14 --> [REQ_ID=50bcd721dd93] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 11:25:14 --> [REQ_ID=50bcd721dd93] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 11:25:15 --> [REQ_ID=50bcd721dd93] [METHOD_ENTRY] index
DEBUG - 2026-02-28 11:25:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:25:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 11:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 11:25:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 11:25:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:25:15 --> [REQ_ID=50bcd721dd93] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 11:25:15 --> [REQ_ID=50bcd721dd93] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:25:15 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-28 11:25:15 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 11:25:15 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 11:25:15 --> [REQ_ID=bf32979fba65] [FILTER_AFTER]
DEBUG - 2026-02-28 11:25:15 --> [REQ_ID=bf32979fba65] [LIFECYCLE][END] status=200 duration_ms=894.35 memory_delta=4194304
INFO - 2026-02-28 11:25:15 --> [REQ_ID=50bcd721dd93] [PERF] Execution time=0.892335
DEBUG - 2026-02-28 11:25:15 --> [REQ_ID=bf32979fba65] [REQUEST][END]
INFO - 2026-02-28 11:25:15 --> [REQ_ID=bf32979fba65] [PERF] Execution time=0.913620
INFO - 2026-02-28 11:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 11:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 11:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 11:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 11:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.026665
INFO - 2026-02-28 11:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 11:31:43 --> [REQ_ID=66be5b78fa31] [REQUEST][START] GET /index.php/Premium-Features/Due-Diligence-Database
DEBUG - 2026-02-28 11:31:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-28 11:31:43 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Due-Diligence-Database]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 11:31:43 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 11:31:43 --> [404] URI=https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database
WARNING - 2026-02-28 11:31:43 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database | referrer: none
DEBUG - 2026-02-28 11:35:17 --> [REQ_ID=16e8d8f422af] [REQUEST][START] GET /
DEBUG - 2026-02-28 11:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:35:17 --> [REQ_ID=16e8d8f422af] [FILTER_BEFORE] /
DEBUG - 2026-02-28 11:35:17 --> [REQ_ID=16e8d8f422af] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 11:35:17 --> [REQ_ID=16e8d8f422af] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 11:35:17 --> [CSRF] token name=csrf_test_name hash=49ef1cb61e29d1bc4d05fc449910efda
DEBUG - 2026-02-28 11:35:17 --> [REQ_ID=72e3a78cbbbf] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 11:35:17 --> [REQ_ID=72e3a78cbbbf] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 11:35:17 --> [REQ_ID=72e3a78cbbbf] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:35:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:35:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 11:35:18 --> [REQ_ID=72e3a78cbbbf] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 11:35:18 --> [REQ_ID=72e3a78cbbbf] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 11:35:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 11:35:18 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 11:35:18 --> [REQ_ID=16e8d8f422af] [FILTER_AFTER]
DEBUG - 2026-02-28 11:35:18 --> [REQ_ID=16e8d8f422af] [LIFECYCLE][END] status=200 duration_ms=670.31 memory_delta=4194304
INFO - 2026-02-28 11:35:18 --> [REQ_ID=72e3a78cbbbf] [PERF] Execution time=0.668409
DEBUG - 2026-02-28 11:35:18 --> [REQ_ID=16e8d8f422af] [REQUEST][END]
INFO - 2026-02-28 11:35:18 --> [REQ_ID=16e8d8f422af] [PERF] Execution time=0.710091
DEBUG - 2026-02-28 11:35:49 --> [REQ_ID=f9f839a0229f] [REQUEST][START] GET /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-28 11:35:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:35:49 --> [REQ_ID=f9f839a0229f] [FILTER_BEFORE] /index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-28 11:35:49 --> [REQ_ID=f9f839a0229f] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 11:35:49 --> [REQ_ID=f9f839a0229f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Exchange
DEBUG - 2026-02-28 11:35:49 --> [CSRF] token name=csrf_test_name hash=9e6be04184d9558e49f278760f91bd07
DEBUG - 2026-02-28 11:35:49 --> [REQ_ID=85ef1d490639] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 11:35:49 --> [REQ_ID=85ef1d490639] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 11:35:50 --> [REQ_ID=85ef1d490639] [METHOD_ENTRY] show
DEBUG - 2026-02-28 11:35:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:35:50 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 11:35:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:35:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 11:35:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 11:35:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 11:35:50 --> [REQ_ID=85ef1d490639] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:35:50 --> [REQ_ID=85ef1d490639] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Manage_Finances
INFO - 2026-02-28 11:35:50 --> [REQ_ID=85ef1d490639] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 11:35:51 --> themesMemory usage: 12582912
DEBUG - 2026-02-28 11:35:51 --> [REQ_ID=f9f839a0229f] [FILTER_AFTER]
DEBUG - 2026-02-28 11:35:51 --> [REQ_ID=f9f839a0229f] [LIFECYCLE][END] status=200 duration_ms=1,229.03 memory_delta=6291456
INFO - 2026-02-28 11:35:51 --> [REQ_ID=85ef1d490639] [PERF] Execution time=1.228678
DEBUG - 2026-02-28 11:35:51 --> [REQ_ID=f9f839a0229f] [REQUEST][END]
INFO - 2026-02-28 11:35:51 --> [REQ_ID=f9f839a0229f] [PERF] Execution time=1.244135
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [REQUEST][START] GET /
DEBUG - 2026-02-28 11:39:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [FILTER_BEFORE] /
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 11:39:14 --> [CSRF] token name=csrf_test_name hash=31c3ed624efd5cd1953d2ca5fdffe0b8
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:39:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:39:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 11:39:14 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 11:39:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [FILTER_AFTER]
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [LIFECYCLE][END] status=200 duration_ms=746.69 memory_delta=4194304
INFO - 2026-02-28 11:39:14 --> [REQ_ID=37219b85d14e] [PERF] Execution time=0.744684
DEBUG - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [REQUEST][END]
INFO - 2026-02-28 11:39:14 --> [REQ_ID=e23b5bd4f06b] [PERF] Execution time=0.785757
INFO - 2026-02-28 11:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 11:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 11:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 11:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 11:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 11:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.031238
INFO - 2026-02-28 11:45:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=23d683839351] [REQUEST][START] GET /index.php/How-It-Works/investments
DEBUG - 2026-02-28 11:46:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=23d683839351] [FILTER_BEFORE] /index.php/How-It-Works/investments
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=23d683839351] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=23d683839351] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/investments
DEBUG - 2026-02-28 11:46:47 --> [CSRF] token name=csrf_test_name hash=a45cf64410c588d57ae89011b343395f
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=70cc91a2befb] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 11:46:47 --> [REQ_ID=70cc91a2befb] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 11:46:47 --> [REQ_ID=70cc91a2befb] [METHOD_ENTRY] show
DEBUG - 2026-02-28 11:46:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:46:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 11:46:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:46:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 11:46:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 11:46:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:46:48 --> [REQ_ID=70cc91a2befb] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 11:46:48 --> [REQ_ID=70cc91a2befb] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:46:48 --> [MetaService] slug=how-it-works/investments pageName= cacheHit= path=DB
INFO - 2026-02-28 11:46:48 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 11:46:48 --> [MetaService] slug=how-it-works/investments pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 11:46:48 --> [REQ_ID=23d683839351] [FILTER_AFTER]
DEBUG - 2026-02-28 11:46:48 --> [REQ_ID=23d683839351] [LIFECYCLE][END] status=200 duration_ms=677.46 memory_delta=4194304
INFO - 2026-02-28 11:46:48 --> [REQ_ID=70cc91a2befb] [PERF] Execution time=0.674002
DEBUG - 2026-02-28 11:46:48 --> [REQ_ID=23d683839351] [REQUEST][END]
INFO - 2026-02-28 11:46:48 --> [REQ_ID=23d683839351] [PERF] Execution time=0.734449
DEBUG - 2026-02-28 11:48:55 --> [REQ_ID=91474126e31b] [REQUEST][START] GET /index.php/Purchase/MyMIGold
DEBUG - 2026-02-28 11:48:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=3ce7edb77ec6] [REQUEST][START] GET /index.php/How-It-Works/overview
DEBUG - 2026-02-28 11:51:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=3ce7edb77ec6] [FILTER_BEFORE] /index.php/How-It-Works/overview
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=3ce7edb77ec6] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=3ce7edb77ec6] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/overview
DEBUG - 2026-02-28 11:51:33 --> [CSRF] token name=csrf_test_name hash=8f22d1f815d6fec341359d78a5fff21a
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=9260764e1546] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 11:51:33 --> [REQ_ID=9260764e1546] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=9260764e1546] [METHOD_ENTRY] show
DEBUG - 2026-02-28 11:51:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:51:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 11:51:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:51:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 11:51:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 11:51:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:51:33 --> [REQ_ID=9260764e1546] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 11:51:33 --> [REQ_ID=9260764e1546] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 11:51:34 --> [MetaService] slug=how-it-works/overview pageName= cacheHit= path=DB
INFO - 2026-02-28 11:51:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 11:51:34 --> [MetaService] slug=how-it-works/overview pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 11:51:34 --> [REQ_ID=3ce7edb77ec6] [FILTER_AFTER]
DEBUG - 2026-02-28 11:51:34 --> [REQ_ID=3ce7edb77ec6] [LIFECYCLE][END] status=200 duration_ms=654.86 memory_delta=4194304
INFO - 2026-02-28 11:51:34 --> [REQ_ID=9260764e1546] [PERF] Execution time=0.652494
DEBUG - 2026-02-28 11:51:34 --> [REQ_ID=3ce7edb77ec6] [REQUEST][END]
INFO - 2026-02-28 11:51:34 --> [REQ_ID=3ce7edb77ec6] [PERF] Execution time=0.697570
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [REQUEST][START] GET /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-28 11:58:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [FILTER_BEFORE] /index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Determining-Your-Financial-Goals
DEBUG - 2026-02-28 11:58:40 --> [CSRF] token name=csrf_test_name hash=afed41d9019ec8450bf5b7541684ec3d
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=31034c1ab603] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 11:58:40 --> [REQ_ID=31034c1ab603] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=31034c1ab603] [METHOD_ENTRY] show
DEBUG - 2026-02-28 11:58:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 11:58:40 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 11:58:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:58:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 11:58:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 11:58:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [FILTER_AFTER]
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [LIFECYCLE][END] status=404 duration_ms=105.58 memory_delta=0
INFO - 2026-02-28 11:58:40 --> [REQ_ID=31034c1ab603] [PERF] Execution time=0.103124
DEBUG - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [REQUEST][END]
INFO - 2026-02-28 11:58:40 --> [REQ_ID=3bf302a4194d] [PERF] Execution time=0.147047
DEBUG - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [REQUEST][END]
INFO - 2026-02-28 12:00:01 --> [REQ_ID=7ae6fbbeecdb] [PERF] Execution time=0.060839
INFO - 2026-02-28 12:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-28 12:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 12:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 12:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 12:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 12:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.052155
INFO - 2026-02-28 12:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 12:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 12:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.016332
INFO - 2026-02-28 12:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 12:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 12:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 12:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 12:00:03 --> LOG_HEALTHCHECK debug marker=213b0998c2aa
INFO - 2026-02-28 12:00:03 --> LOG_HEALTHCHECK info marker=213b0998c2aa
NOTICE - 2026-02-28 12:00:03 --> LOG_HEALTHCHECK probe marker=213b0998c2aa
INFO - 2026-02-28 12:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 12:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.026358
INFO - 2026-02-28 12:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 12:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 12:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 12:00:04 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 12:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 12:00:04 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 12:00:04 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.541370
INFO - 2026-02-28 12:00:04 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [REQUEST][START] GET /index.php/Alerts
DEBUG - 2026-02-28 12:06:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [FILTER_BEFORE] /index.php/Alerts
DEBUG - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=index
DEBUG - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Alerts
DEBUG - 2026-02-28 12:06:47 --> [CSRF] token name=csrf_test_name hash=3e8717909afe7af3c9e96b0a1f2db15d
DEBUG - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [REQUEST][END]
INFO - 2026-02-28 12:06:47 --> [REQ_ID=04dd5f688db0] [PERF] Execution time=0.053637
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 12:06:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 12:06:48 --> [CSRF] token name=csrf_test_name hash=6fc4c1f0d1a77093246f66a85d3e0690
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=df7f49a08988] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 12:06:48 --> [REQ_ID=df7f49a08988] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [FILTER_AFTER]
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [LIFECYCLE][END] status=200 duration_ms=53.76 memory_delta=0
INFO - 2026-02-28 12:06:48 --> [REQ_ID=df7f49a08988] [PERF] Execution time=0.053558
DEBUG - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [REQUEST][END]
INFO - 2026-02-28 12:06:48 --> [REQ_ID=f43303f4af01] [PERF] Execution time=0.066179
INFO - 2026-02-28 12:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 12:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 12:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 12:15:01 --> [REQ_ID=41d1b34bd655] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
INFO - 2026-02-28 12:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 12:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.183647
INFO - 2026-02-28 12:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:15:02 --> [REQ_ID=41d1b34bd655] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 12:15:02 --> [REQ_ID=41d1b34bd655] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 12:15:02 --> [REQ_ID=41d1b34bd655] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 12:15:02 --> [REQ_ID=41d1b34bd655] [REQUEST][END]
INFO - 2026-02-28 12:15:02 --> [REQ_ID=41d1b34bd655] [PERF] Execution time=0.068177
INFO - 2026-02-28 12:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 12:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 12:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 12:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 12:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.042844
INFO - 2026-02-28 12:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 12:37:38 --> [REQ_ID=dd9e7a0a7944] [REQUEST][START] GET /index.php
DEBUG - 2026-02-28 12:37:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:37:38 --> [REQ_ID=dd9e7a0a7944] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-28 12:37:38 --> [REQ_ID=dd9e7a0a7944] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 12:37:38 --> [REQ_ID=dd9e7a0a7944] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 12:37:38 --> [CSRF] token name=csrf_test_name hash=41f03cdfb4b47d61c2e5b849ce739c8e
DEBUG - 2026-02-28 12:37:38 --> [REQ_ID=cc51eab5b2c3] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 12:37:38 --> [REQ_ID=cc51eab5b2c3] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 12:37:38 --> [REQ_ID=cc51eab5b2c3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 12:37:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 12:37:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 12:37:39 --> [REQ_ID=cc51eab5b2c3] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 12:37:39 --> [REQ_ID=cc51eab5b2c3] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 12:37:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 12:37:39 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 12:37:39 --> [REQ_ID=dd9e7a0a7944] [FILTER_AFTER]
DEBUG - 2026-02-28 12:37:39 --> [REQ_ID=dd9e7a0a7944] [LIFECYCLE][END] status=200 duration_ms=728.17 memory_delta=4194304
INFO - 2026-02-28 12:37:39 --> [REQ_ID=cc51eab5b2c3] [PERF] Execution time=0.726272
DEBUG - 2026-02-28 12:37:39 --> [REQ_ID=dd9e7a0a7944] [REQUEST][END]
INFO - 2026-02-28 12:37:39 --> [REQ_ID=dd9e7a0a7944] [PERF] Execution time=0.767882
DEBUG - 2026-02-28 12:42:39 --> [REQ_ID=0da3cf52157a] [REQUEST][START] GET /
DEBUG - 2026-02-28 12:42:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:42:39 --> [REQ_ID=0da3cf52157a] [FILTER_BEFORE] /
DEBUG - 2026-02-28 12:42:39 --> [REQ_ID=0da3cf52157a] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 12:42:39 --> [REQ_ID=0da3cf52157a] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 12:42:39 --> [CSRF] token name=csrf_test_name hash=4cb26bb4a5299b2db0189416428320e6
DEBUG - 2026-02-28 12:42:39 --> [REQ_ID=6b1aea43d1a1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 12:42:39 --> [REQ_ID=6b1aea43d1a1] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 12:42:39 --> [REQ_ID=6b1aea43d1a1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 12:42:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 12:42:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 12:42:40 --> [REQ_ID=6b1aea43d1a1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 12:42:40 --> [REQ_ID=6b1aea43d1a1] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 12:42:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 12:42:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 12:42:40 --> [REQ_ID=0da3cf52157a] [FILTER_AFTER]
DEBUG - 2026-02-28 12:42:40 --> [REQ_ID=0da3cf52157a] [LIFECYCLE][END] status=200 duration_ms=641.45 memory_delta=4194304
INFO - 2026-02-28 12:42:40 --> [REQ_ID=6b1aea43d1a1] [PERF] Execution time=0.639727
DEBUG - 2026-02-28 12:42:40 --> [REQ_ID=0da3cf52157a] [REQUEST][END]
INFO - 2026-02-28 12:42:40 --> [REQ_ID=0da3cf52157a] [PERF] Execution time=0.680614
INFO - 2026-02-28 12:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 12:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 12:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 12:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 12:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.036525
INFO - 2026-02-28 12:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [REQUEST][START] GET /
DEBUG - 2026-02-28 12:51:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [FILTER_BEFORE] /
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 12:51:45 --> [CSRF] token name=csrf_test_name hash=1bda147ea1837ead706b4edf3a6f7d98
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 12:51:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 12:51:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 12:51:45 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 12:51:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [FILTER_AFTER]
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [LIFECYCLE][END] status=200 duration_ms=656.66 memory_delta=4194304
INFO - 2026-02-28 12:51:45 --> [REQ_ID=e5394ce11b5f] [PERF] Execution time=0.654695
DEBUG - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [REQUEST][END]
INFO - 2026-02-28 12:51:45 --> [REQ_ID=9b8a81f93111] [PERF] Execution time=0.693788
DEBUG - 2026-02-28 12:57:06 --> [REQ_ID=4238cd986469] [REQUEST][START] GET /
DEBUG - 2026-02-28 12:57:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 12:57:06 --> [REQ_ID=4238cd986469] [FILTER_BEFORE] /
DEBUG - 2026-02-28 12:57:06 --> [REQ_ID=4238cd986469] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 12:57:06 --> [REQ_ID=4238cd986469] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 12:57:06 --> [CSRF] token name=csrf_test_name hash=66e5ec379a6b28077d86e318d5242027
DEBUG - 2026-02-28 12:57:06 --> [REQ_ID=36fc29333a8d] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 12:57:06 --> [REQ_ID=36fc29333a8d] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 12:57:06 --> [REQ_ID=36fc29333a8d] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 12:57:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 12:57:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 12:57:07 --> [REQ_ID=36fc29333a8d] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 12:57:07 --> [REQ_ID=36fc29333a8d] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 12:57:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 12:57:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 12:57:07 --> [REQ_ID=4238cd986469] [FILTER_AFTER]
DEBUG - 2026-02-28 12:57:07 --> [REQ_ID=4238cd986469] [LIFECYCLE][END] status=200 duration_ms=628.75 memory_delta=4194304
INFO - 2026-02-28 12:57:07 --> [REQ_ID=36fc29333a8d] [PERF] Execution time=0.626936
DEBUG - 2026-02-28 12:57:07 --> [REQ_ID=4238cd986469] [REQUEST][END]
INFO - 2026-02-28 12:57:07 --> [REQ_ID=4238cd986469] [PERF] Execution time=0.670024
INFO - 2026-02-28 13:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 13:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 13:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 13:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 13:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 13:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.114355
INFO - 2026-02-28 13:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 13:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [REQUEST][END]
INFO - 2026-02-28 13:00:02 --> [REQ_ID=3d91adab8201] [PERF] Execution time=0.051677
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=6b482de30c27] [REQUEST][START] GET /index.php/How-It-Works
DEBUG - 2026-02-28 13:10:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=6b482de30c27] [FILTER_BEFORE] /index.php/How-It-Works
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=6b482de30c27] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=index
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=6b482de30c27] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works
DEBUG - 2026-02-28 13:10:33 --> [CSRF] token name=csrf_test_name hash=0d1d93e481f5261bac233e6695ba1c3e
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=a9b83237593f] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 13:10:33 --> [REQ_ID=a9b83237593f] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=a9b83237593f] [METHOD_ENTRY] index
DEBUG - 2026-02-28 13:10:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:10:33 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:10:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:10:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:10:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:10:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:10:33 --> [REQ_ID=a9b83237593f] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 13:10:33 --> [REQ_ID=a9b83237593f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:10:34 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-28 13:10:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 13:10:34 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 13:10:34 --> [REQ_ID=6b482de30c27] [FILTER_AFTER]
DEBUG - 2026-02-28 13:10:34 --> [REQ_ID=6b482de30c27] [LIFECYCLE][END] status=200 duration_ms=686.98 memory_delta=4194304
INFO - 2026-02-28 13:10:34 --> [REQ_ID=a9b83237593f] [PERF] Execution time=0.684449
DEBUG - 2026-02-28 13:10:34 --> [REQ_ID=6b482de30c27] [REQUEST][END]
INFO - 2026-02-28 13:10:34 --> [REQ_ID=6b482de30c27] [PERF] Execution time=0.727272
INFO - 2026-02-28 13:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 13:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 13:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 13:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 13:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 13:15:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.106063
INFO - 2026-02-28 13:15:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [REQUEST][END]
INFO - 2026-02-28 13:15:02 --> [REQ_ID=5f5ba2e89f1f] [PERF] Execution time=0.070941
DEBUG - 2026-02-28 13:20:33 --> [REQ_ID=2e1f374c1207] [REQUEST][START] GET /index.php/Wallets
DEBUG - 2026-02-28 13:20:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:20:33 --> [REQ_ID=2e1f374c1207] [FILTER_BEFORE] /index.php/Wallets
DEBUG - 2026-02-28 13:20:33 --> [REQ_ID=2e1f374c1207] [ROUTE] Controller=\App\Modules\User\Controllers\WalletsController Method=index
DEBUG - 2026-02-28 13:20:33 --> [REQ_ID=2e1f374c1207] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Wallets
DEBUG - 2026-02-28 13:20:33 --> [CSRF] token name=csrf_test_name hash=06563a775412d58cbc2c88f4ac620f75
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=2e1f374c1207] [REQUEST][END]
INFO - 2026-02-28 13:20:34 --> [REQ_ID=2e1f374c1207] [PERF] Execution time=0.054735
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 13:20:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 13:20:34 --> [CSRF] token name=csrf_test_name hash=d0c24520bbf6c1ca5931223506467aa5
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=5093852683fc] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 13:20:34 --> [REQ_ID=5093852683fc] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [FILTER_AFTER]
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [LIFECYCLE][END] status=200 duration_ms=158.82 memory_delta=0
INFO - 2026-02-28 13:20:34 --> [REQ_ID=5093852683fc] [PERF] Execution time=0.158593
DEBUG - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [REQUEST][END]
INFO - 2026-02-28 13:20:34 --> [REQ_ID=4a90904acc09] [PERF] Execution time=0.169940
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [REQUEST][START] GET /index.php/Preview/Alert/IMNN
DEBUG - 2026-02-28 13:23:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [FILTER_BEFORE] /index.php/Preview/Alert/IMNN
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/IMNN
DEBUG - 2026-02-28 13:23:08 --> [CSRF] token name=csrf_test_name hash=1238d4519d090925a53fb33cf345e28d
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [METHOD_ENTRY] preview
DEBUG - 2026-02-28 13:23:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:23:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:23:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-28 13:23:08 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:23:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-28 13:23:08 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:23:08 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 13:23:08 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [FILTER_AFTER]
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [LIFECYCLE][END] status=200 duration_ms=167.75 memory_delta=2097152
INFO - 2026-02-28 13:23:08 --> [REQ_ID=012bcc598910] [PERF] Execution time=0.165645
DEBUG - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [REQUEST][END]
INFO - 2026-02-28 13:23:08 --> [REQ_ID=f13831356ba3] [PERF] Execution time=0.206261
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-28 13:28:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-28 13:28:08 --> [CSRF] token name=csrf_test_name hash=25a8084b5abfdcc7350f697774e40b6f
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [REQUEST][END]
INFO - 2026-02-28 13:28:08 --> [REQ_ID=d72cf5cb99a2] [PERF] Execution time=0.054251
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 13:28:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 13:28:08 --> [CSRF] token name=csrf_test_name hash=92dc24eb1857797fc3606183ca1547ac
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=0a0aed3d1f32] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 13:28:08 --> [REQ_ID=0a0aed3d1f32] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [FILTER_AFTER]
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [LIFECYCLE][END] status=200 duration_ms=213.46 memory_delta=0
INFO - 2026-02-28 13:28:08 --> [REQ_ID=0a0aed3d1f32] [PERF] Execution time=0.213225
DEBUG - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [REQUEST][END]
INFO - 2026-02-28 13:28:08 --> [REQ_ID=f337f458edc0] [PERF] Execution time=0.227061
DEBUG - 2026-02-28 13:28:13 --> [REQ_ID=36db6859bec3] [REQUEST][START] GET /index.php/Subscribe/Daily-Financial-News
DEBUG - 2026-02-28 13:28:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [REQUEST][START] GET /
DEBUG - 2026-02-28 13:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [FILTER_BEFORE] /
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 13:28:42 --> [CSRF] token name=csrf_test_name hash=994ec242c7822a048766876ca08810c2
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:28:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:28:42 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 13:28:42 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 13:28:42 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [FILTER_AFTER]
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [LIFECYCLE][END] status=200 duration_ms=576.88 memory_delta=4194304
INFO - 2026-02-28 13:28:42 --> [REQ_ID=2ed06f27c865] [PERF] Execution time=0.576691
DEBUG - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [REQUEST][END]
INFO - 2026-02-28 13:28:42 --> [REQ_ID=5a1b07d10597] [PERF] Execution time=0.588248
INFO - 2026-02-28 13:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 13:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 13:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 13:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 13:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 13:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.035573
INFO - 2026-02-28 13:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=00336ef1b54c] [REQUEST][START] GET /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-02-28 13:31:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=00336ef1b54c] [FILTER_BEFORE] /index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=00336ef1b54c] [ROUTE] Controller=\App\Modules\User\Controllers\AlertsController Method=preview
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=00336ef1b54c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Preview/Alert/NASDAQ-GUTS
DEBUG - 2026-02-28 13:31:53 --> [CSRF] token name=csrf_test_name hash=6dd904df2729e5362d52167d18049723
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=aafa4f57e516] [INIT] App\Modules\User\Controllers\AlertsController::GET
INFO - 2026-02-28 13:31:53 --> [REQ_ID=aafa4f57e516] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:31:53 --> [REQ_ID=aafa4f57e516] [METHOD_ENTRY] preview
DEBUG - 2026-02-28 13:31:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:31:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:31:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-28 13:31:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:31:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-28 13:31:53 --> [REQ_ID=aafa4f57e516] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-28 13:31:53 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:31:53 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-28 13:31:54 --> TwelveData batch response error: **symbol** or **figi** parameter is missing or invalid. Please provide a valid symbol according to API documentation: https://twelvedata.com/docs#reference-data
DEBUG - 2026-02-28 13:31:54 --> Marketstack fallback failed: 22 : The requested URL returned error: 403
DEBUG - 2026-02-28 13:31:54 --> [REQ_ID=aafa4f57e516] [VIEW_RENDER] themes/public/previewAlert
INFO - 2026-02-28 13:31:54 --> [REQ_ID=aafa4f57e516] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 13:31:54 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 13:31:54 --> [REQ_ID=00336ef1b54c] [FILTER_AFTER]
DEBUG - 2026-02-28 13:31:54 --> [REQ_ID=00336ef1b54c] [LIFECYCLE][END] status=200 duration_ms=697.36 memory_delta=2097152
INFO - 2026-02-28 13:31:54 --> [REQ_ID=aafa4f57e516] [PERF] Execution time=0.695265
DEBUG - 2026-02-28 13:31:54 --> [REQ_ID=00336ef1b54c] [REQUEST][END]
INFO - 2026-02-28 13:31:54 --> [REQ_ID=00336ef1b54c] [PERF] Execution time=0.737394
DEBUG - 2026-02-28 13:32:02 --> [REQ_ID=edf4c4af6d81] [REQUEST][START] GET /
DEBUG - 2026-02-28 13:32:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:32:02 --> [REQ_ID=edf4c4af6d81] [FILTER_BEFORE] /
DEBUG - 2026-02-28 13:32:02 --> [REQ_ID=edf4c4af6d81] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 13:32:02 --> [REQ_ID=edf4c4af6d81] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 13:32:02 --> [CSRF] token name=csrf_test_name hash=6387cafc9380a9d7dc1b569f5d571f46
DEBUG - 2026-02-28 13:32:02 --> [REQ_ID=1be27dde085e] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 13:32:02 --> [REQ_ID=1be27dde085e] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 13:32:02 --> [REQ_ID=1be27dde085e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:32:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:32:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 13:32:03 --> [REQ_ID=1be27dde085e] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 13:32:03 --> [REQ_ID=1be27dde085e] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 13:32:03 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 13:32:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 13:32:03 --> [REQ_ID=edf4c4af6d81] [FILTER_AFTER]
DEBUG - 2026-02-28 13:32:03 --> [REQ_ID=edf4c4af6d81] [LIFECYCLE][END] status=200 duration_ms=612.75 memory_delta=2097152
INFO - 2026-02-28 13:32:03 --> [REQ_ID=1be27dde085e] [PERF] Execution time=0.612428
DEBUG - 2026-02-28 13:32:03 --> [REQ_ID=edf4c4af6d81] [REQUEST][END]
INFO - 2026-02-28 13:32:03 --> [REQ_ID=edf4c4af6d81] [PERF] Execution time=0.622965
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=646f802ca1ff] [REQUEST][START] GET /index.php/Management
DEBUG - 2026-02-28 13:33:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=646f802ca1ff] [FILTER_BEFORE] /index.php/Management
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=646f802ca1ff] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAdminController Method=index
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=646f802ca1ff] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management
DEBUG - 2026-02-28 13:33:11 --> [CSRF] token name=csrf_test_name hash=530ce544827a30dfc6e3f52eecc8fb75
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=216fe59d9627] [INIT] App\Modules\Management\Controllers\ManagementAdminController::GET
INFO - 2026-02-28 13:33:11 --> [REQ_ID=216fe59d9627] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:33:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:33:11 --> [REQ_ID=216fe59d9627] [METHOD_ENTRY] index
DEBUG - 2026-02-28 13:33:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:33:11 --> [SERVICE] App\Services\BudgetService ::setUserId
INFO - 2026-02-28 13:33:11 --> [REQ_ID=216fe59d9627] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:33:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:11 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:11 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-28 13:33:11 --> getSolanaData: invalid address param
DEBUG - 2026-02-28 13:33:12 --> [REQ_ID=216fe59d9627] [VIEW_RENDER] App\Modules\Management\Views\index
INFO - 2026-02-28 13:33:12 --> [REQ_ID=216fe59d9627] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Income","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="created_by"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="account_type"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date >="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="designated_date <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="year"
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="month <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY="day <="
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"02","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"created_by":2,"account_type":"Expense","month":"01","year":"2026"}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_FIRST] App\Models\BudgetModel
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"created_by":2,"deleted":0}
DEBUG - 2026-02-28 13:33:12 --> [MODEL_WHERE] App\Models\BudgetModel KEY={"status":1,"paid":0,"created_by":2,"deleted":0}
INFO - 2026-02-28 13:33:12 --> getSolanaData: invalid address param
INFO - 2026-02-28 13:33:12 --> [REQ_ID=216fe59d9627] [PERF] Execution time=0.802214
DEBUG - 2026-02-28 13:43:24 --> [REQ_ID=94ebddb666fb] [REQUEST][START] GET /index.php/Support/Account
DEBUG - 2026-02-28 13:43:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:43:24 --> [REQ_ID=94ebddb666fb] [FILTER_BEFORE] /index.php/Support/Account
DEBUG - 2026-02-28 13:43:24 --> [REQ_ID=94ebddb666fb] [ROUTE] Controller=\App\Modules\Support\Controllers\AccountSupportController Method=index
DEBUG - 2026-02-28 13:43:24 --> [REQ_ID=94ebddb666fb] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support/Account
DEBUG - 2026-02-28 13:43:24 --> [CSRF] token name=csrf_test_name hash=92904b0a83457b8e88214f81090534ef
DEBUG - 2026-02-28 13:43:24 --> [REQ_ID=803d086c8908] [INIT] App\Modules\Support\Controllers\AccountSupportController::GET
INFO - 2026-02-28 13:43:24 --> [REQ_ID=803d086c8908] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:43:25 --> [REQ_ID=803d086c8908] [METHOD_ENTRY] index
DEBUG - 2026-02-28 13:43:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:43:25 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:43:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:43:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:43:25 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:43:25 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 13:43:25 --> [REQ_ID=803d086c8908] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:43:25 --> [REQ_ID=803d086c8908] [VIEW_RENDER] SupportModule/Support/account_help
INFO - 2026-02-28 13:43:25 --> [REQ_ID=803d086c8908] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 13:43:25 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 13:43:25 --> [REQ_ID=94ebddb666fb] [FILTER_AFTER]
DEBUG - 2026-02-28 13:43:25 --> [REQ_ID=94ebddb666fb] [LIFECYCLE][END] status=200 duration_ms=208.33 memory_delta=0
INFO - 2026-02-28 13:43:25 --> [REQ_ID=803d086c8908] [PERF] Execution time=0.205995
DEBUG - 2026-02-28 13:43:25 --> [REQ_ID=94ebddb666fb] [REQUEST][END]
INFO - 2026-02-28 13:43:25 --> [REQ_ID=94ebddb666fb] [PERF] Execution time=0.249880
INFO - 2026-02-28 13:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 13:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 13:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 13:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 13:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 13:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.204546
INFO - 2026-02-28 13:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=31ebc31ceadf] [REQUEST][START] GET /index.php/How-It-Works/account-settings
DEBUG - 2026-02-28 13:56:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=31ebc31ceadf] [FILTER_BEFORE] /index.php/How-It-Works/account-settings
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=31ebc31ceadf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=31ebc31ceadf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/account-settings
DEBUG - 2026-02-28 13:56:43 --> [CSRF] token name=csrf_test_name hash=a4d8bc53aa1533ef06be25ce311325f0
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=83c5b06215af] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 13:56:43 --> [REQ_ID=83c5b06215af] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:56:43 --> [REQ_ID=83c5b06215af] [METHOD_ENTRY] show
DEBUG - 2026-02-28 13:56:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:56:43 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:56:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:56:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:56:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:56:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:56:44 --> [REQ_ID=83c5b06215af] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 13:56:44 --> [REQ_ID=83c5b06215af] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:56:44 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit= path=DB
INFO - 2026-02-28 13:56:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 13:56:44 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 13:56:44 --> [REQ_ID=31ebc31ceadf] [FILTER_AFTER]
DEBUG - 2026-02-28 13:56:44 --> [REQ_ID=31ebc31ceadf] [LIFECYCLE][END] status=200 duration_ms=692.86 memory_delta=4194304
INFO - 2026-02-28 13:56:44 --> [REQ_ID=83c5b06215af] [PERF] Execution time=0.690740
DEBUG - 2026-02-28 13:56:44 --> [REQ_ID=31ebc31ceadf] [REQUEST][END]
INFO - 2026-02-28 13:56:44 --> [REQ_ID=31ebc31ceadf] [PERF] Execution time=0.735006
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [REQUEST][START] GET /
DEBUG - 2026-02-28 13:59:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [FILTER_BEFORE] /
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 13:59:17 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:59:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:59:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 13:59:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 13:59:17 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [LIFECYCLE][END] status=200 duration_ms=625.65 memory_delta=4194304
INFO - 2026-02-28 13:59:17 --> [REQ_ID=4a724097f0ea] [PERF] Execution time=0.624007
DEBUG - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [REQUEST][END]
INFO - 2026-02-28 13:59:17 --> [REQ_ID=d4a6c8b46dc7] [PERF] Execution time=0.666170
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=02317e18cd52] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 13:59:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=02317e18cd52] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=02317e18cd52] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=02317e18cd52] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 13:59:19 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=22da245b64d4] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 13:59:19 --> [REQ_ID=22da245b64d4] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 13:59:19 --> [REQ_ID=22da245b64d4] [METHOD_ENTRY] show
DEBUG - 2026-02-28 13:59:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 13:59:19 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 13:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 13:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 13:59:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 13:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 13:59:19 --> [REQ_ID=22da245b64d4] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 13:59:20 --> [REQ_ID=22da245b64d4] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-28 13:59:20 --> [REQ_ID=22da245b64d4] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 13:59:20 --> themesMemory usage: 12582912
DEBUG - 2026-02-28 13:59:20 --> [REQ_ID=02317e18cd52] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:20 --> [REQ_ID=02317e18cd52] [LIFECYCLE][END] status=200 duration_ms=1,075.44 memory_delta=6291456
INFO - 2026-02-28 13:59:20 --> [REQ_ID=22da245b64d4] [PERF] Execution time=1.075107
DEBUG - 2026-02-28 13:59:20 --> [REQ_ID=02317e18cd52] [REQUEST][END]
INFO - 2026-02-28 13:59:20 --> [REQ_ID=02317e18cd52] [PERF] Execution time=1.089713
DEBUG - 2026-02-28 13:59:21 --> [REQ_ID=aedc4d935afc] [REQUEST][START] POST /index.php/register
DEBUG - 2026-02-28 13:59:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:21 --> [REQ_ID=aedc4d935afc] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-28 13:59:21 --> [REQ_ID=aedc4d935afc] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-02-28 13:59:21 --> [REQ_ID=aedc4d935afc] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-28 13:59:21 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
INFO - 2026-02-28 13:59:21 --> CSRF token verified.
DEBUG - 2026-02-28 13:59:21 --> [REQ_ID=7fd23d71e188] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-28 13:59:21 --> [REQ_ID=7fd23d71e188] [MEMORY][controller-start] 8388608
INFO - 2026-02-28 13:59:21 --> [REGISTRATION] Submission received
INFO - 2026-02-28 13:59:21 --> MailService queued email
INFO - 2026-02-28 13:59:21 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-28 13:59:21 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-28 13:59:21 --> Registration created user_id=11695, email=sacho_borisov@web.de, username=NormanWab, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-28 13:59:21 --> [REGISTRATION] User record created
INFO - 2026-02-28 13:59:21 --> OnboardingProgressService: created onboarding record for user_id=11695
INFO - 2026-02-28 13:59:22 --> Registration succeeded for sacho_borisov@web.de (event f14ff15f65c711c1)
INFO - 2026-02-28 13:59:22 --> [REGISTRATION] Activation email queued
INFO - 2026-02-28 13:59:22 --> Registration redirecting to success guide for user_id=11695
DEBUG - 2026-02-28 13:59:22 --> [REQ_ID=aedc4d935afc] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:22 --> [REQ_ID=aedc4d935afc] [LIFECYCLE][END] status=302 duration_ms=1,093.98 memory_delta=0
INFO - 2026-02-28 13:59:22 --> [REQ_ID=7fd23d71e188] [PERF] Execution time=1.093586
DEBUG - 2026-02-28 13:59:22 --> [REQ_ID=aedc4d935afc] [REQUEST][END]
INFO - 2026-02-28 13:59:22 --> [REQ_ID=aedc4d935afc] [PERF] Execution time=1.105725
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=e90b9d34f14d] [REQUEST][START] GET /index.php/register/success
DEBUG - 2026-02-28 13:59:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=e90b9d34f14d] [FILTER_BEFORE] /index.php/register/success
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=e90b9d34f14d] [ROUTE] Controller=\App\Controllers\AuthController Method=registerSuccess
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=e90b9d34f14d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/register/success
DEBUG - 2026-02-28 13:59:23 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f9d3e12cc6f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 13:59:23 --> [REQ_ID=7f9d3e12cc6f] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 13:59:23 --> AuthController::registerSuccess view rendered.
INFO - 2026-02-28 13:59:23 --> [REQ_ID=7f9d3e12cc6f] [PERF] Execution time=0.015364
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 13:59:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 13:59:23 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=f0ea40af6131] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 13:59:23 --> [REQ_ID=f0ea40af6131] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [LIFECYCLE][END] status=200 duration_ms=21.62 memory_delta=0
INFO - 2026-02-28 13:59:23 --> [REQ_ID=f0ea40af6131] [PERF] Execution time=0.021660
DEBUG - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [REQUEST][END]
INFO - 2026-02-28 13:59:23 --> [REQ_ID=7f24ef1dab38] [PERF] Execution time=0.031132
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [REQUEST][START] POST /index.php/login
DEBUG - 2026-02-28 13:59:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 13:59:24 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
INFO - 2026-02-28 13:59:24 --> CSRF token verified.
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=d460861a0346] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-28 13:59:24 --> [REQ_ID=d460861a0346] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 13:59:24 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-28 13:59:24 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-28 13:59:24 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 185.65.133.107, ua: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36
DEBUG - 2026-02-28 13:59:24 --> Auth attemptLogin() called with login identifier: NormanWab, remember: false
DEBUG - 2026-02-28 13:59:24 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 13:59:24 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-02-28 13:59:24 --> [AUTH_FAILURE] 
DEBUG - 2026-02-28 13:59:24 --> Auth attempt failed for identifier NormanWab. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=NormanWab">Resend activation message one more time.</a>
WARNING - 2026-02-28 13:59:24 --> [AUTH] Login failure
WARNING - 2026-02-28 13:59:24 --> [AUTH] Login failed
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [LIFECYCLE][END] status=302 duration_ms=95.35 memory_delta=0
INFO - 2026-02-28 13:59:24 --> [REQ_ID=d460861a0346] [PERF] Execution time=0.095102
DEBUG - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [REQUEST][END]
INFO - 2026-02-28 13:59:24 --> [REQ_ID=ab41f471ee52] [PERF] Execution time=0.103459
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 13:59:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 13:59:25 --> [CSRF] token name=csrf_test_name hash=47794668ff3d672834a68910932d6fe2
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ccb90a5bf915] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 13:59:25 --> [REQ_ID=ccb90a5bf915] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [FILTER_AFTER]
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [LIFECYCLE][END] status=200 duration_ms=14.79 memory_delta=0
INFO - 2026-02-28 13:59:25 --> [REQ_ID=ccb90a5bf915] [PERF] Execution time=0.014662
DEBUG - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [REQUEST][END]
INFO - 2026-02-28 13:59:25 --> [REQ_ID=ceafaaddbb68] [PERF] Execution time=0.024078
DEBUG - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [REQUEST][END]
INFO - 2026-02-28 14:00:02 --> [REQ_ID=59d6e8bd61e5] [PERF] Execution time=0.030054
INFO - 2026-02-28 14:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 14:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 14:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 14:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-28 14:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 14:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.100413
INFO - 2026-02-28 14:00:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 14:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 14:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 14:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.022898
INFO - 2026-02-28 14:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 14:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 14:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 14:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 14:00:04 --> LOG_HEALTHCHECK debug marker=b9de5cbe9e27
INFO - 2026-02-28 14:00:04 --> LOG_HEALTHCHECK info marker=b9de5cbe9e27
NOTICE - 2026-02-28 14:00:04 --> LOG_HEALTHCHECK probe marker=b9de5cbe9e27
INFO - 2026-02-28 14:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 14:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.025019
INFO - 2026-02-28 14:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 14:00:05 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 14:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 14:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 14:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 14:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.384714
INFO - 2026-02-28 14:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=fdfcbef3bc38] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-02-28 14:10:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=fdfcbef3bc38] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=fdfcbef3bc38] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=fdfcbef3bc38] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-02-28 14:10:07 --> [CSRF] token name=csrf_test_name hash=31ab263b8c224cb199b55181a752c54f
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=af8acbb7e875] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-02-28 14:10:07 --> [REQ_ID=af8acbb7e875] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 14:10:07 --> [REQ_ID=af8acbb7e875] [METHOD_ENTRY] index
DEBUG - 2026-02-28 14:10:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:10:07 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 14:10:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:10:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 14:10:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 14:10:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 14:10:08 --> [REQ_ID=af8acbb7e875] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:10:08 --> [REQ_ID=af8acbb7e875] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-02-28 14:10:08 --> [REQ_ID=af8acbb7e875] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 14:10:08 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 14:10:08 --> [REQ_ID=fdfcbef3bc38] [FILTER_AFTER]
DEBUG - 2026-02-28 14:10:08 --> [REQ_ID=fdfcbef3bc38] [LIFECYCLE][END] status=200 duration_ms=320.11 memory_delta=2097152
INFO - 2026-02-28 14:10:08 --> [REQ_ID=af8acbb7e875] [PERF] Execution time=0.317514
DEBUG - 2026-02-28 14:10:08 --> [REQ_ID=fdfcbef3bc38] [REQUEST][END]
INFO - 2026-02-28 14:10:08 --> [REQ_ID=fdfcbef3bc38] [PERF] Execution time=0.374664
INFO - 2026-02-28 14:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 14:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 14:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 14:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 14:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041550
INFO - 2026-02-28 14:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 14:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [REQUEST][END]
INFO - 2026-02-28 14:15:01 --> [REQ_ID=907d0217def2] [PERF] Execution time=0.059636
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=080d4d2893e8] [REQUEST][START] GET /index.php/How-It-Works/earnings
DEBUG - 2026-02-28 14:22:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=080d4d2893e8] [FILTER_BEFORE] /index.php/How-It-Works/earnings
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=080d4d2893e8] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=080d4d2893e8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/earnings
DEBUG - 2026-02-28 14:22:01 --> [CSRF] token name=csrf_test_name hash=b87cdda8c8befde3ad9a29b9c777f4e4
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=ccd92ea85e2c] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 14:22:01 --> [REQ_ID=ccd92ea85e2c] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=ccd92ea85e2c] [METHOD_ENTRY] show
DEBUG - 2026-02-28 14:22:01 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:22:01 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 14:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 14:22:01 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 14:22:01 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:22:01 --> [REQ_ID=ccd92ea85e2c] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 14:22:01 --> [REQ_ID=ccd92ea85e2c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:22:02 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit= path=DB
INFO - 2026-02-28 14:22:02 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 14:22:02 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 14:22:02 --> [REQ_ID=080d4d2893e8] [FILTER_AFTER]
DEBUG - 2026-02-28 14:22:02 --> [REQ_ID=080d4d2893e8] [LIFECYCLE][END] status=200 duration_ms=872.71 memory_delta=4194304
INFO - 2026-02-28 14:22:02 --> [REQ_ID=ccd92ea85e2c] [PERF] Execution time=0.870122
DEBUG - 2026-02-28 14:22:02 --> [REQ_ID=080d4d2893e8] [REQUEST][END]
INFO - 2026-02-28 14:22:02 --> [REQ_ID=080d4d2893e8] [PERF] Execution time=0.914125
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=210653e2af61] [REQUEST][START] GET /index.php/How-It-Works/alerts
DEBUG - 2026-02-28 14:24:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=210653e2af61] [FILTER_BEFORE] /index.php/How-It-Works/alerts
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=210653e2af61] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=alerts
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=210653e2af61] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/alerts
DEBUG - 2026-02-28 14:24:48 --> [CSRF] token name=csrf_test_name hash=16b73f5721e26d4240f77265e726b08b
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=5edb30a9b36d] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 14:24:48 --> [REQ_ID=5edb30a9b36d] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 14:24:48 --> [REQ_ID=5edb30a9b36d] [METHOD_ENTRY] alerts
DEBUG - 2026-02-28 14:24:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:24:48 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 14:24:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:24:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 14:24:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 14:24:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 14:24:48 --> [REQ_ID=5edb30a9b36d] [PERF] Execution time=0.191488
CRITICAL - 2026-02-28 14:24:48 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/alerts]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-28 14:24:48 --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
WARNING - 2026-02-28 14:24:48 --> [404] URI=https://www.mymiwallet.com/index.php/How-It-Works/alerts
WARNING - 2026-02-28 14:24:48 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/alerts | referrer: none
INFO - 2026-02-28 14:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 14:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 14:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 14:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 14:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.097772
INFO - 2026-02-28 14:30:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 14:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 14:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 14:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 14:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 14:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 14:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034711
INFO - 2026-02-28 14:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 14:50:48 --> [REQ_ID=7f22113791c1] [REQUEST][START] GET /
DEBUG - 2026-02-28 14:50:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:50:48 --> [REQ_ID=7f22113791c1] [FILTER_BEFORE] /
DEBUG - 2026-02-28 14:50:48 --> [REQ_ID=7f22113791c1] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 14:50:48 --> [REQ_ID=7f22113791c1] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 14:50:48 --> [CSRF] token name=csrf_test_name hash=b8c75b5ec84ed540c5e674d829edabe6
DEBUG - 2026-02-28 14:50:48 --> [REQ_ID=2f84397565e3] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 14:50:48 --> [REQ_ID=2f84397565e3] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 14:50:48 --> [REQ_ID=2f84397565e3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:50:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:50:49 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 14:50:49 --> [REQ_ID=2f84397565e3] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 14:50:49 --> [REQ_ID=2f84397565e3] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 14:50:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 14:50:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 14:50:49 --> [REQ_ID=7f22113791c1] [FILTER_AFTER]
DEBUG - 2026-02-28 14:50:49 --> [REQ_ID=7f22113791c1] [LIFECYCLE][END] status=200 duration_ms=749.75 memory_delta=4194304
INFO - 2026-02-28 14:50:49 --> [REQ_ID=2f84397565e3] [PERF] Execution time=0.747120
DEBUG - 2026-02-28 14:50:49 --> [REQ_ID=7f22113791c1] [REQUEST][END]
INFO - 2026-02-28 14:50:49 --> [REQ_ID=7f22113791c1] [PERF] Execution time=0.831520
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [REQUEST][START] GET /
DEBUG - 2026-02-28 14:51:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [FILTER_BEFORE] /
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 14:51:37 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [MEMORY][commonData:start] 4194304
DEBUG - 2026-02-28 14:51:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:51:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 14:51:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 14:51:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [LIFECYCLE][END] status=200 duration_ms=546.67 memory_delta=4194304
INFO - 2026-02-28 14:51:37 --> [REQ_ID=2a3c5258f19a] [PERF] Execution time=0.545912
DEBUG - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [REQUEST][END]
INFO - 2026-02-28 14:51:37 --> [REQ_ID=b6fdc2692602] [PERF] Execution time=0.557428
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=9904ffd4e2a2] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=9904ffd4e2a2] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=9904ffd4e2a2] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=9904ffd4e2a2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:38 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=804f9b65a276] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 14:51:38 --> [REQ_ID=804f9b65a276] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 14:51:38 --> [REQ_ID=804f9b65a276] [METHOD_ENTRY] show
DEBUG - 2026-02-28 14:51:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:51:38 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 14:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 14:51:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 14:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 14:51:38 --> [REQ_ID=804f9b65a276] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:51:39 --> [REQ_ID=804f9b65a276] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-28 14:51:39 --> [REQ_ID=804f9b65a276] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 14:51:39 --> themesMemory usage: 12582912
DEBUG - 2026-02-28 14:51:39 --> [REQ_ID=9904ffd4e2a2] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:39 --> [REQ_ID=9904ffd4e2a2] [LIFECYCLE][END] status=200 duration_ms=995.26 memory_delta=6291456
INFO - 2026-02-28 14:51:39 --> [REQ_ID=804f9b65a276] [PERF] Execution time=0.995066
DEBUG - 2026-02-28 14:51:39 --> [REQ_ID=9904ffd4e2a2] [REQUEST][END]
INFO - 2026-02-28 14:51:39 --> [REQ_ID=9904ffd4e2a2] [PERF] Execution time=1.009389
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [REQUEST][START] POST /index.php/register
DEBUG - 2026-02-28 14:51:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [FILTER_BEFORE] /index.php/register
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptRegister
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/register
DEBUG - 2026-02-28 14:51:40 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
INFO - 2026-02-28 14:51:40 --> CSRF token verified.
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=76c6a08a99ce] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-28 14:51:40 --> [REQ_ID=76c6a08a99ce] [MEMORY][controller-start] 8388608
INFO - 2026-02-28 14:51:40 --> [REGISTRATION] Submission received
INFO - 2026-02-28 14:51:40 --> MailService queued email
INFO - 2026-02-28 14:51:40 --> [REGISTRATION] Validation passed (basic fields)
ERROR - 2026-02-28 14:51:40 --> Registration failed: {"password":"Validation.strong_password"}
INFO - 2026-02-28 14:51:40 --> MailService queued email
WARNING - 2026-02-28 14:51:40 --> [REGISTRATION] Validation failed (password fields)
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [LIFECYCLE][END] status=302 duration_ms=87.94 memory_delta=0
INFO - 2026-02-28 14:51:40 --> [REQ_ID=76c6a08a99ce] [PERF] Execution time=0.087338
DEBUG - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [REQUEST][END]
INFO - 2026-02-28 14:51:40 --> [REQ_ID=bd1fb24420d3] [PERF] Execution time=0.100112
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=f75243bc2c75] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=f75243bc2c75] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=f75243bc2c75] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=f75243bc2c75] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:41 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=22a24b6799f2] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 14:51:41 --> [REQ_ID=22a24b6799f2] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 14:51:41 --> [REQ_ID=22a24b6799f2] [METHOD_ENTRY] show
DEBUG - 2026-02-28 14:51:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:51:41 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 14:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 14:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 14:51:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 14:51:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 14:51:41 --> [REQ_ID=22a24b6799f2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:51:42 --> [REQ_ID=22a24b6799f2] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-28 14:51:42 --> [REQ_ID=22a24b6799f2] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 14:51:42 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 14:51:42 --> [REQ_ID=f75243bc2c75] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:42 --> [REQ_ID=f75243bc2c75] [LIFECYCLE][END] status=200 duration_ms=1,010.28 memory_delta=6291456
INFO - 2026-02-28 14:51:42 --> [REQ_ID=22a24b6799f2] [PERF] Execution time=1.010038
DEBUG - 2026-02-28 14:51:42 --> [REQ_ID=f75243bc2c75] [REQUEST][END]
INFO - 2026-02-28 14:51:42 --> [REQ_ID=f75243bc2c75] [PERF] Execution time=1.020902
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 14:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 14:51:44 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=4cbcd68f693e] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 14:51:44 --> [REQ_ID=4cbcd68f693e] [MEMORY][controller-start] 8388608
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [LIFECYCLE][END] status=200 duration_ms=16.43 memory_delta=0
INFO - 2026-02-28 14:51:44 --> [REQ_ID=4cbcd68f693e] [PERF] Execution time=0.016289
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [REQUEST][END]
INFO - 2026-02-28 14:51:44 --> [REQ_ID=44668d4b8516] [PERF] Execution time=0.025840
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [REQUEST][START] POST /index.php/login
DEBUG - 2026-02-28 14:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [ROUTE] Controller=\App\Controllers\AuthController Method=attemptLogin
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [LIFECYCLE][START] POST https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 14:51:44 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
INFO - 2026-02-28 14:51:44 --> CSRF token verified.
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=f2125f08a813] [INIT] App\Controllers\AuthController::POST
INFO - 2026-02-28 14:51:44 --> [REQ_ID=f2125f08a813] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 14:51:44 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-28 14:51:44 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-28 14:51:44 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 146.19.125.48, ua: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.66 Safari/537.36
DEBUG - 2026-02-28 14:51:44 --> Auth attemptLogin() called with login identifier: pancakehouse_germany, remember: false
DEBUG - 2026-02-28 14:51:44 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 14:51:44 --> Auth credentials normalised for attempt using key "username"
WARNING - 2026-02-28 14:51:44 --> [AUTH_FAILURE] 
DEBUG - 2026-02-28 14:51:44 --> Auth attempt failed for identifier pancakehouse_germany. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-02-28 14:51:44 --> [AUTH] Login failure
WARNING - 2026-02-28 14:51:44 --> [AUTH] Login failed
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [LIFECYCLE][END] status=302 duration_ms=30.92 memory_delta=0
INFO - 2026-02-28 14:51:44 --> [REQ_ID=f2125f08a813] [PERF] Execution time=0.030713
DEBUG - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [REQUEST][END]
INFO - 2026-02-28 14:51:44 --> [REQ_ID=b8b5ec83d5f8] [PERF] Execution time=0.039601
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 14:51:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 14:51:45 --> [CSRF] token name=csrf_test_name hash=cc43f71b7f99fe79f79be4987ea0c598
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=06b9e460053f] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 14:51:45 --> [REQ_ID=06b9e460053f] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [LIFECYCLE][END] status=200 duration_ms=15.50 memory_delta=0
INFO - 2026-02-28 14:51:45 --> [REQ_ID=06b9e460053f] [PERF] Execution time=0.015370
DEBUG - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [REQUEST][END]
INFO - 2026-02-28 14:51:45 --> [REQ_ID=df2c4dbb52d0] [PERF] Execution time=0.024995
DEBUG - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [REQUEST][START] GET /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-28 14:51:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [FILTER_BEFORE] /index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [ROUTE] Controller=\App\Modules\Management\Controllers\MarketingAdminController Method=postCreator
DEBUG - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Management/Marketing/Post-Creator
DEBUG - 2026-02-28 14:51:49 --> [CSRF] token name=csrf_test_name hash=d35f1a024488045a6564d965d22fe8b4
DEBUG - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [REQUEST][END]
INFO - 2026-02-28 14:51:49 --> [REQ_ID=03cd76e0a4bd] [PERF] Execution time=0.016393
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 14:51:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 14:51:50 --> [CSRF] token name=csrf_test_name hash=5d73b57f43c7b2450462c86f44fbd110
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=7735b7eb6e6c] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 14:51:50 --> [REQ_ID=7735b7eb6e6c] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [FILTER_AFTER]
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [LIFECYCLE][END] status=200 duration_ms=33.28 memory_delta=0
INFO - 2026-02-28 14:51:50 --> [REQ_ID=7735b7eb6e6c] [PERF] Execution time=0.033150
DEBUG - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [REQUEST][END]
INFO - 2026-02-28 14:51:50 --> [REQ_ID=984ed7c8ad2c] [PERF] Execution time=0.042700
DEBUG - 2026-02-28 14:59:30 --> [REQ_ID=5966952c69f5] [REQUEST][START] GET /index.php
DEBUG - 2026-02-28 14:59:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 14:59:30 --> [REQ_ID=5966952c69f5] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-28 14:59:30 --> [REQ_ID=5966952c69f5] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 14:59:30 --> [REQ_ID=5966952c69f5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 14:59:30 --> [CSRF] token name=csrf_test_name hash=8b23c5cc01014fb525f92830d762a962
DEBUG - 2026-02-28 14:59:30 --> [REQ_ID=0a82ff43e562] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 14:59:30 --> [REQ_ID=0a82ff43e562] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 14:59:30 --> [REQ_ID=0a82ff43e562] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 14:59:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 14:59:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 14:59:31 --> [REQ_ID=0a82ff43e562] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 14:59:31 --> [REQ_ID=0a82ff43e562] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 14:59:31 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 14:59:31 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 14:59:31 --> [REQ_ID=5966952c69f5] [FILTER_AFTER]
DEBUG - 2026-02-28 14:59:31 --> [REQ_ID=5966952c69f5] [LIFECYCLE][END] status=200 duration_ms=674.54 memory_delta=4194304
INFO - 2026-02-28 14:59:31 --> [REQ_ID=0a82ff43e562] [PERF] Execution time=0.672539
DEBUG - 2026-02-28 14:59:31 --> [REQ_ID=5966952c69f5] [REQUEST][END]
INFO - 2026-02-28 14:59:31 --> [REQ_ID=5966952c69f5] [PERF] Execution time=0.712630
DEBUG - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [REQUEST][END]
INFO - 2026-02-28 15:00:01 --> [REQ_ID=3894cc33e3da] [PERF] Execution time=0.036519
INFO - 2026-02-28 15:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 15:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 15:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 15:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 15:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 15:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.221637
INFO - 2026-02-28 15:00:01 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 15:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 15:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 15:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 15:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 15:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 15:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.037061
INFO - 2026-02-28 15:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [REQUEST][END]
INFO - 2026-02-28 15:15:01 --> [REQ_ID=ea4a088fcce5] [PERF] Execution time=0.058527
DEBUG - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [REQUEST][START] GET /index.php/Budget
DEBUG - 2026-02-28 15:17:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [FILTER_BEFORE] /index.php/Budget
DEBUG - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [ROUTE] Controller=\App\Modules\User\Controllers\BudgetController Method=index
DEBUG - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Budget
DEBUG - 2026-02-28 15:17:49 --> [CSRF] token name=csrf_test_name hash=93a08863d4b446d05b64ec9927899ce6
DEBUG - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [REQUEST][END]
INFO - 2026-02-28 15:17:49 --> [REQ_ID=1057a997b15b] [PERF] Execution time=0.055481
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 15:17:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 15:17:50 --> [CSRF] token name=csrf_test_name hash=5671c753bdaaba0bf44bb42adfd1b6f4
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=99d55cea3221] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 15:17:50 --> [REQ_ID=99d55cea3221] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [FILTER_AFTER]
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [LIFECYCLE][END] status=200 duration_ms=248.07 memory_delta=0
INFO - 2026-02-28 15:17:50 --> [REQ_ID=99d55cea3221] [PERF] Execution time=0.247712
DEBUG - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [REQUEST][END]
INFO - 2026-02-28 15:17:50 --> [REQ_ID=246b6c9df7a0] [PERF] Execution time=0.260020
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [REQUEST][START] GET /
DEBUG - 2026-02-28 15:30:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [FILTER_BEFORE] /
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 15:30:00 --> [CSRF] token name=csrf_test_name hash=4457f8e797f2989d7f7f8a8aed48c670
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 15:30:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 15:30:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 15:30:00 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 15:30:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [FILTER_AFTER]
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [LIFECYCLE][END] status=200 duration_ms=634.32 memory_delta=4194304
INFO - 2026-02-28 15:30:00 --> [REQ_ID=6d83ebb7a6e9] [PERF] Execution time=0.632314
DEBUG - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [REQUEST][END]
INFO - 2026-02-28 15:30:00 --> [REQ_ID=256000a1421e] [PERF] Execution time=0.672379
INFO - 2026-02-28 15:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 15:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 15:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 15:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 15:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 15:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.101070
INFO - 2026-02-28 15:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 15:32:12 --> [REQ_ID=6e9209ecaf17] [REQUEST][START] GET /
DEBUG - 2026-02-28 15:32:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [FILTER_BEFORE] /
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 15:32:13 --> [CSRF] token name=csrf_test_name hash=4633966213e51ba67d8fa935be933502
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 15:32:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 15:32:13 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 15:32:13 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 15:32:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [FILTER_AFTER]
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [LIFECYCLE][END] status=200 duration_ms=616.84 memory_delta=4194304
INFO - 2026-02-28 15:32:13 --> [REQ_ID=ee0fc7288064] [PERF] Execution time=0.614754
DEBUG - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [REQUEST][END]
INFO - 2026-02-28 15:32:13 --> [REQ_ID=6e9209ecaf17] [PERF] Execution time=0.655362
DEBUG - 2026-02-28 15:40:49 --> [REQ_ID=43a5a4a6e3c3] [REQUEST][START] GET /
DEBUG - 2026-02-28 15:40:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:40:49 --> [REQ_ID=43a5a4a6e3c3] [FILTER_BEFORE] /
DEBUG - 2026-02-28 15:40:49 --> [REQ_ID=43a5a4a6e3c3] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 15:40:49 --> [REQ_ID=43a5a4a6e3c3] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 15:40:49 --> [CSRF] token name=csrf_test_name hash=366cdf007a4e729ba796ce1289289977
DEBUG - 2026-02-28 15:40:49 --> [REQ_ID=6bcad02259ac] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 15:40:49 --> [REQ_ID=6bcad02259ac] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 15:40:49 --> [REQ_ID=6bcad02259ac] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 15:40:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 15:40:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 15:40:50 --> [REQ_ID=6bcad02259ac] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 15:40:50 --> [REQ_ID=6bcad02259ac] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 15:40:50 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 15:40:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 15:40:50 --> [REQ_ID=43a5a4a6e3c3] [FILTER_AFTER]
DEBUG - 2026-02-28 15:40:50 --> [REQ_ID=43a5a4a6e3c3] [LIFECYCLE][END] status=200 duration_ms=614.33 memory_delta=4194304
INFO - 2026-02-28 15:40:50 --> [REQ_ID=6bcad02259ac] [PERF] Execution time=0.611649
DEBUG - 2026-02-28 15:40:50 --> [REQ_ID=43a5a4a6e3c3] [REQUEST][END]
INFO - 2026-02-28 15:40:50 --> [REQ_ID=43a5a4a6e3c3] [PERF] Execution time=0.662580
INFO - 2026-02-28 15:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 15:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 15:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 15:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 15:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 15:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.034220
INFO - 2026-02-28 15:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [REQUEST][START] GET /index.php/Dashboard
DEBUG - 2026-02-28 15:48:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [FILTER_BEFORE] /index.php/Dashboard
DEBUG - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [ROUTE] Controller=\App\Modules\User\Controllers\DashboardController Method=index
DEBUG - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-28 15:48:20 --> [CSRF] token name=csrf_test_name hash=cba9398145be90cf4e318063f1c545df
DEBUG - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [REQUEST][END]
INFO - 2026-02-28 15:48:20 --> [REQ_ID=65730cf48ace] [PERF] Execution time=0.071215
INFO - 2026-02-28 16:00:02 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-28 16:00:02 --> [spark:ops:work] Started
INFO - 2026-02-28 16:00:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 16:00:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 16:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 16:00:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.030027
INFO - 2026-02-28 16:00:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [REQUEST][END]
INFO - 2026-02-28 16:00:02 --> [REQ_ID=ed3f3f4d17bd] [PERF] Execution time=0.055794
INFO - 2026-02-28 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 16:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 16:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 16:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.022732
INFO - 2026-02-28 16:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 16:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 16:00:04 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 16:00:04 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 16:00:04 --> LOG_HEALTHCHECK debug marker=c04e58345bd6
INFO - 2026-02-28 16:00:04 --> LOG_HEALTHCHECK info marker=c04e58345bd6
NOTICE - 2026-02-28 16:00:04 --> LOG_HEALTHCHECK probe marker=c04e58345bd6
INFO - 2026-02-28 16:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 16:00:04 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.130790
INFO - 2026-02-28 16:00:04 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 16:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 16:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 16:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 16:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 16:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 16:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.480236
INFO - 2026-02-28 16:00:05 --> [SPARK_MEMORY] 16777216
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [REQUEST][START] GET /index.php/Support
DEBUG - 2026-02-28 16:05:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [FILTER_BEFORE] /index.php/Support
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [ROUTE] Controller=\App\Modules\Support\Controllers\SupportController Method=index
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Support
DEBUG - 2026-02-28 16:05:53 --> [CSRF] token name=csrf_test_name hash=030722d42477bcd94e5bb680aeec3ffc
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [INIT] App\Modules\Support\Controllers\SupportController::GET
INFO - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [METHOD_ENTRY] index
DEBUG - 2026-02-28 16:05:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:05:53 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 16:05:53 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 16:05:53 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 16:05:53 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 16:05:53 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [VIEW_RENDER] SupportModule\Views\Support\index
INFO - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [MEMORY][commonData:start] 6291456
INFO - 2026-02-28 16:05:53 --> themesMemory usage: 6291456
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [FILTER_AFTER]
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [LIFECYCLE][END] status=200 duration_ms=104.87 memory_delta=2097152
INFO - 2026-02-28 16:05:53 --> [REQ_ID=c4efade783ed] [PERF] Execution time=0.102173
DEBUG - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [REQUEST][END]
INFO - 2026-02-28 16:05:53 --> [REQ_ID=4f3e6fd80f0d] [PERF] Execution time=0.147230
DEBUG - 2026-02-28 16:11:42 --> [REQ_ID=39b2ffd543ad] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:11:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:11:42 --> [REQ_ID=39b2ffd543ad] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:11:42 --> [REQ_ID=39b2ffd543ad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:11:42 --> [REQ_ID=39b2ffd543ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:11:42 --> [CSRF] token name=csrf_test_name hash=5e0ae7de399233a8f71dc6144f5d0de2
DEBUG - 2026-02-28 16:11:42 --> [REQ_ID=9edb249b0bb2] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:11:42 --> [REQ_ID=9edb249b0bb2] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:11:42 --> [REQ_ID=9edb249b0bb2] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:11:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:11:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 16:11:43 --> [REQ_ID=9edb249b0bb2] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:11:43 --> [REQ_ID=9edb249b0bb2] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 16:11:43 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 16:11:43 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 16:11:43 --> [REQ_ID=39b2ffd543ad] [FILTER_AFTER]
DEBUG - 2026-02-28 16:11:43 --> [REQ_ID=39b2ffd543ad] [LIFECYCLE][END] status=200 duration_ms=629.53 memory_delta=4194304
INFO - 2026-02-28 16:11:43 --> [REQ_ID=9edb249b0bb2] [PERF] Execution time=0.626993
DEBUG - 2026-02-28 16:11:43 --> [REQ_ID=39b2ffd543ad] [REQUEST][END]
INFO - 2026-02-28 16:11:43 --> [REQ_ID=39b2ffd543ad] [PERF] Execution time=0.669785
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:11:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:11:44 --> [CSRF] token name=csrf_test_name hash=61892c548c42fcc7c46528de5e9022a8
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:11:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:11:44 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:11:44 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:11:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [FILTER_AFTER]
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [LIFECYCLE][END] status=200 duration_ms=529.55 memory_delta=2097152
INFO - 2026-02-28 16:11:44 --> [REQ_ID=842cafdfdef3] [PERF] Execution time=0.528353
DEBUG - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [REQUEST][END]
INFO - 2026-02-28 16:11:44 --> [REQ_ID=a29269067cc8] [PERF] Execution time=0.538411
DEBUG - 2026-02-28 16:13:42 --> [REQ_ID=57a7eb478310] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:13:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:13:43 --> [CSRF] token name=csrf_test_name hash=7676a1163b479d355a58c4006ada32da
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:13:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:13:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 16:13:43 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 16:13:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [FILTER_AFTER]
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [LIFECYCLE][END] status=200 duration_ms=602.60 memory_delta=4194304
INFO - 2026-02-28 16:13:43 --> [REQ_ID=205136e58462] [PERF] Execution time=0.600442
DEBUG - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [REQUEST][END]
INFO - 2026-02-28 16:13:43 --> [REQ_ID=57a7eb478310] [PERF] Execution time=0.716550
INFO - 2026-02-28 16:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 16:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 16:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 16:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 16:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.053559
INFO - 2026-02-28 16:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 16:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [REQUEST][END]
INFO - 2026-02-28 16:15:01 --> [REQ_ID=1d206eb84f5c] [PERF] Execution time=0.059205
DEBUG - 2026-02-28 16:15:20 --> [REQ_ID=1588b8f52cca] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:15:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:15:20 --> [REQ_ID=1588b8f52cca] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:15:20 --> [REQ_ID=1588b8f52cca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:15:20 --> [REQ_ID=1588b8f52cca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:15:20 --> [CSRF] token name=csrf_test_name hash=d03dd5f6e931733e096a2d05b0a8fa93
DEBUG - 2026-02-28 16:15:20 --> [REQ_ID=d8b583001515] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:15:20 --> [REQ_ID=d8b583001515] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 16:15:20 --> [REQ_ID=d8b583001515] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:15:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:15:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:15:21 --> [REQ_ID=d8b583001515] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:15:21 --> [REQ_ID=d8b583001515] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:15:21 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:15:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:15:21 --> [REQ_ID=1588b8f52cca] [FILTER_AFTER]
DEBUG - 2026-02-28 16:15:21 --> [REQ_ID=1588b8f52cca] [LIFECYCLE][END] status=200 duration_ms=674.63 memory_delta=4194304
INFO - 2026-02-28 16:15:21 --> [REQ_ID=d8b583001515] [PERF] Execution time=0.672908
DEBUG - 2026-02-28 16:15:21 --> [REQ_ID=1588b8f52cca] [REQUEST][END]
INFO - 2026-02-28 16:15:21 --> [REQ_ID=1588b8f52cca] [PERF] Execution time=0.692145
DEBUG - 2026-02-28 16:21:29 --> [REQ_ID=8d1beb7f765e] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:21:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:21:29 --> [REQ_ID=8d1beb7f765e] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:21:29 --> [REQ_ID=8d1beb7f765e] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:21:29 --> [REQ_ID=8d1beb7f765e] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:21:29 --> [CSRF] token name=csrf_test_name hash=6583b45216f234ba7be04bff65faf307
DEBUG - 2026-02-28 16:21:29 --> [REQ_ID=9b3cb4900050] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:21:29 --> [REQ_ID=9b3cb4900050] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:21:29 --> [REQ_ID=9b3cb4900050] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:21:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:21:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:21:30 --> [REQ_ID=9b3cb4900050] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:21:30 --> [REQ_ID=9b3cb4900050] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 16:21:30 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 16:21:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:21:30 --> [REQ_ID=8d1beb7f765e] [FILTER_AFTER]
DEBUG - 2026-02-28 16:21:30 --> [REQ_ID=8d1beb7f765e] [LIFECYCLE][END] status=200 duration_ms=750.78 memory_delta=4194304
INFO - 2026-02-28 16:21:30 --> [REQ_ID=9b3cb4900050] [PERF] Execution time=0.748715
DEBUG - 2026-02-28 16:21:30 --> [REQ_ID=8d1beb7f765e] [REQUEST][END]
INFO - 2026-02-28 16:21:30 --> [REQ_ID=8d1beb7f765e] [PERF] Execution time=0.788246
DEBUG - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [REQUEST][START] GET /index.php/Trade-Tracker
DEBUG - 2026-02-28 16:25:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [FILTER_BEFORE] /index.php/Trade-Tracker
DEBUG - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [ROUTE] Controller=\App\Modules\User\Controllers\InvestmentsController Method=tradeTracker
DEBUG - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/Trade-Tracker
DEBUG - 2026-02-28 16:25:04 --> [CSRF] token name=csrf_test_name hash=19fa055436f3c37cd82d302f90b4fdfa
DEBUG - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [REQUEST][END]
INFO - 2026-02-28 16:25:04 --> [REQ_ID=96222f2a5966] [PERF] Execution time=0.054280
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [REQUEST][START] GET /index.php/login
DEBUG - 2026-02-28 16:25:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [FILTER_BEFORE] /index.php/login
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [ROUTE] Controller=\App\Controllers\AuthController Method=login
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/login
DEBUG - 2026-02-28 16:25:06 --> [CSRF] token name=csrf_test_name hash=570219b14ac8b3640b18c3966d586ad2
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=9f6ad280e866] [INIT] App\Controllers\AuthController::GET
INFO - 2026-02-28 16:25:06 --> [REQ_ID=9f6ad280e866] [MEMORY][controller-start] 4194304
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [FILTER_AFTER]
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [LIFECYCLE][END] status=200 duration_ms=53.27 memory_delta=0
INFO - 2026-02-28 16:25:06 --> [REQ_ID=9f6ad280e866] [PERF] Execution time=0.050936
DEBUG - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [REQUEST][END]
INFO - 2026-02-28 16:25:06 --> [REQ_ID=c3357f150926] [PERF] Execution time=0.067040
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:39 --> [CSRF] token name=csrf_test_name hash=f29dffe42e2c8d40046bcd33ea3b4c92
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:27:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 16:27:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 16:27:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [LIFECYCLE][END] status=200 duration_ms=587.86 memory_delta=4194304
INFO - 2026-02-28 16:27:39 --> [REQ_ID=1987e6acb48f] [PERF] Execution time=0.585916
DEBUG - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [REQUEST][END]
INFO - 2026-02-28 16:27:39 --> [REQ_ID=0e8f3276e7de] [PERF] Execution time=0.626315
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:40 --> [CSRF] token name=csrf_test_name hash=f88f3dda3a2d82b60d5f1c696a7e07e2
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:27:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:27:40 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:27:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [LIFECYCLE][END] status=200 duration_ms=528.17 memory_delta=2097152
INFO - 2026-02-28 16:27:40 --> [REQ_ID=faad37444bfd] [PERF] Execution time=0.527701
DEBUG - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [REQUEST][END]
INFO - 2026-02-28 16:27:40 --> [REQ_ID=0bd60ddb088c] [PERF] Execution time=0.537922
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:41 --> [CSRF] token name=csrf_test_name hash=544b600b611315edcabf27ba210a3a37
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:27:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:41 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:27:41 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:27:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [LIFECYCLE][END] status=200 duration_ms=523.26 memory_delta=2097152
INFO - 2026-02-28 16:27:41 --> [REQ_ID=dd8314264a2e] [PERF] Execution time=0.522755
DEBUG - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [REQUEST][END]
INFO - 2026-02-28 16:27:41 --> [REQ_ID=65b13dbdc617] [PERF] Execution time=0.532139
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:46 --> [CSRF] token name=csrf_test_name hash=ad7746b8493a353114580eb4fb29bd1d
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:27:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:46 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:27:46 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:27:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [LIFECYCLE][END] status=200 duration_ms=486.08 memory_delta=2097152
INFO - 2026-02-28 16:27:46 --> [REQ_ID=8fa39b208b58] [PERF] Execution time=0.485138
DEBUG - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [REQUEST][END]
INFO - 2026-02-28 16:27:46 --> [REQ_ID=703979fae5f2] [PERF] Execution time=0.503892
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:47 --> [CSRF] token name=csrf_test_name hash=8b01871d34b67bb5e0be018083a6a7ed
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:27:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:27:47 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:27:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [LIFECYCLE][END] status=200 duration_ms=490.82 memory_delta=2097152
INFO - 2026-02-28 16:27:47 --> [REQ_ID=e5670ced6d56] [PERF] Execution time=0.490548
DEBUG - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [REQUEST][END]
INFO - 2026-02-28 16:27:47 --> [REQ_ID=539aa5f7d085] [PERF] Execution time=0.499555
DEBUG - 2026-02-28 16:27:48 --> [REQ_ID=a79e504cde4c] [REQUEST][START] GET /
DEBUG - 2026-02-28 16:27:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:27:48 --> [REQ_ID=a79e504cde4c] [FILTER_BEFORE] /
DEBUG - 2026-02-28 16:27:48 --> [REQ_ID=a79e504cde4c] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:27:48 --> [REQ_ID=a79e504cde4c] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:27:48 --> [CSRF] token name=csrf_test_name hash=3eaf9b089b480f59d62d81458dbd37ae
DEBUG - 2026-02-28 16:27:48 --> [REQ_ID=5078bdd2f214] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:27:48 --> [REQ_ID=5078bdd2f214] [MEMORY][controller-start] 8388608
INFO - 2026-02-28 16:27:48 --> [REQ_ID=5078bdd2f214] [MEMORY][commonData:start] 8388608
DEBUG - 2026-02-28 16:27:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:27:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:49 --> [REQ_ID=5078bdd2f214] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:27:49 --> [REQ_ID=5078bdd2f214] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 16:27:49 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 16:27:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:27:49 --> [REQ_ID=a79e504cde4c] [FILTER_AFTER]
DEBUG - 2026-02-28 16:27:49 --> [REQ_ID=a79e504cde4c] [LIFECYCLE][END] status=200 duration_ms=468.39 memory_delta=0
INFO - 2026-02-28 16:27:49 --> [REQ_ID=5078bdd2f214] [PERF] Execution time=0.467792
DEBUG - 2026-02-28 16:27:49 --> [REQ_ID=a79e504cde4c] [REQUEST][END]
INFO - 2026-02-28 16:27:49 --> [REQ_ID=a79e504cde4c] [PERF] Execution time=0.657016
INFO - 2026-02-28 16:30:01 --> [spark:ops:work] Started
INFO - 2026-02-28 16:30:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 16:30:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 16:30:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.048650
INFO - 2026-02-28 16:30:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 16:41:48 --> [REQ_ID=ddb78e11db6b] [REQUEST][START] GET /index.php
DEBUG - 2026-02-28 16:41:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 16:41:48 --> [REQ_ID=ddb78e11db6b] [FILTER_BEFORE] /index.php
DEBUG - 2026-02-28 16:41:48 --> [REQ_ID=ddb78e11db6b] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 16:41:48 --> [REQ_ID=ddb78e11db6b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 16:41:48 --> [CSRF] token name=csrf_test_name hash=08bade55a6fa1c5ff46f50c761129f3e
DEBUG - 2026-02-28 16:41:48 --> [REQ_ID=4a2fc98306ae] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 16:41:48 --> [REQ_ID=4a2fc98306ae] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 16:41:48 --> [REQ_ID=4a2fc98306ae] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 16:41:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 16:41:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:41:49 --> [REQ_ID=4a2fc98306ae] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 16:41:49 --> [REQ_ID=4a2fc98306ae] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 16:41:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 16:41:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 16:41:49 --> [REQ_ID=ddb78e11db6b] [FILTER_AFTER]
DEBUG - 2026-02-28 16:41:49 --> [REQ_ID=ddb78e11db6b] [LIFECYCLE][END] status=200 duration_ms=913.10 memory_delta=4194304
INFO - 2026-02-28 16:41:49 --> [REQ_ID=4a2fc98306ae] [PERF] Execution time=0.910602
DEBUG - 2026-02-28 16:41:49 --> [REQ_ID=ddb78e11db6b] [REQUEST][END]
INFO - 2026-02-28 16:41:49 --> [REQ_ID=ddb78e11db6b] [PERF] Execution time=0.953728
INFO - 2026-02-28 16:45:02 --> [spark:ops:work] Started
INFO - 2026-02-28 16:45:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 16:45:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 16:45:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 16:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 16:45:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.142890
INFO - 2026-02-28 16:45:02 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 17:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 17:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 17:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 17:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 17:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 17:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.045844
INFO - 2026-02-28 17:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [REQUEST][END]
INFO - 2026-02-28 17:00:01 --> [REQ_ID=44daa4870aa4] [PERF] Execution time=0.054546
INFO - 2026-02-28 17:15:01 --> [spark:ops:work] Started
INFO - 2026-02-28 17:15:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 17:15:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 17:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 17:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 17:15:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.094161
INFO - 2026-02-28 17:15:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [REQUEST][START] GET /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [FILTER_BEFORE] /index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [ROUTE] Controller=\App\Modules\APIs\Controllers\AlertsAPIController Method=fetchEmailAlerts
DEBUG - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Alerts/fetchEmailAlerts
DEBUG - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [REQUEST][END]
INFO - 2026-02-28 17:15:01 --> [REQ_ID=c7008839266b] [PERF] Execution time=0.064871
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [REQUEST][START] GET /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 17:19:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Portfolio-Management
DEBUG - 2026-02-28 17:19:15 --> [CSRF] token name=csrf_test_name hash=d228b35c65ba81541fa749afee8032f6
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=976407ca11db] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 17:19:15 --> [REQ_ID=976407ca11db] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=976407ca11db] [METHOD_ENTRY] show
DEBUG - 2026-02-28 17:19:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:19:15 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 17:19:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 17:19:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 17:19:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 17:19:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [FILTER_AFTER]
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [LIFECYCLE][END] status=404 duration_ms=237.61 memory_delta=0
INFO - 2026-02-28 17:19:15 --> [REQ_ID=976407ca11db] [PERF] Execution time=0.235651
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [REQUEST][END]
INFO - 2026-02-28 17:19:15 --> [REQ_ID=35717b609caf] [PERF] Execution time=0.278357
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=64faa57bba91] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:19:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=64faa57bba91] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=64faa57bba91] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=64faa57bba91] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:19:15 --> [CSRF] token name=csrf_test_name hash=d228b35c65ba81541fa749afee8032f6
DEBUG - 2026-02-28 17:19:15 --> [REQ_ID=b23cacb6f471] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:19:15 --> [REQ_ID=b23cacb6f471] [MEMORY][controller-start] 4194304
INFO - 2026-02-28 17:19:15 --> [REQ_ID=b23cacb6f471] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:19:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:19:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
DEBUG - 2026-02-28 17:19:16 --> [REQ_ID=b23cacb6f471] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:19:16 --> [REQ_ID=b23cacb6f471] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:19:16 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:19:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-28 17:19:16 --> [REQ_ID=64faa57bba91] [FILTER_AFTER]
DEBUG - 2026-02-28 17:19:16 --> [REQ_ID=64faa57bba91] [LIFECYCLE][END] status=200 duration_ms=570.74 memory_delta=4194304
INFO - 2026-02-28 17:19:16 --> [REQ_ID=b23cacb6f471] [PERF] Execution time=0.570514
DEBUG - 2026-02-28 17:19:16 --> [REQ_ID=64faa57bba91] [REQUEST][END]
INFO - 2026-02-28 17:19:16 --> [REQ_ID=64faa57bba91] [PERF] Execution time=0.582175
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [REQUEST][START] GET /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 17:19:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [FILTER_BEFORE] /index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-28 17:19:17 --> [CSRF] token name=csrf_test_name hash=d228b35c65ba81541fa749afee8032f6
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [METHOD_ENTRY] show
DEBUG - 2026-02-28 17:19:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:19:17 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 17:19:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 17:19:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 17:19:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 17:19:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\Investment_Portfolio_Management
INFO - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:19:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [FILTER_AFTER]
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [LIFECYCLE][END] status=200 duration_ms=926.25 memory_delta=6291456
INFO - 2026-02-28 17:19:17 --> [REQ_ID=3e4688db7d51] [PERF] Execution time=0.926060
DEBUG - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [REQUEST][END]
INFO - 2026-02-28 17:19:17 --> [REQ_ID=f005f19fcc1d] [PERF] Execution time=0.935684
INFO - 2026-02-28 17:30:02 --> [spark:ops:work] Started
INFO - 2026-02-28 17:30:02 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 17:30:02 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 17:30:02 --> [spark:ops:work] Intent
INFO - 2026-02-28 17:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-28 17:30:02 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.044344
INFO - 2026-02-28 17:30:02 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:30:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:30:23 --> [CSRF] token name=csrf_test_name hash=e54868200b9bf4f0df07792d2eaa2faf
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:30:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:30:23 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 17:30:23 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 17:30:23 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [FILTER_AFTER]
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [LIFECYCLE][END] status=200 duration_ms=679.56 memory_delta=4194304
INFO - 2026-02-28 17:30:23 --> [REQ_ID=02a2fb3fd7a1] [PERF] Execution time=0.677376
DEBUG - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [REQUEST][END]
INFO - 2026-02-28 17:30:23 --> [REQ_ID=8a6dd661f965] [PERF] Execution time=0.719539
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:30:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:30:30 --> [CSRF] token name=csrf_test_name hash=bcb2521c9bf2b8ab3fb8d4e1df0a90ef
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:30:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:30:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:30:30 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:30:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [FILTER_AFTER]
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [LIFECYCLE][END] status=200 duration_ms=495.36 memory_delta=2097152
INFO - 2026-02-28 17:30:30 --> [REQ_ID=d2af583725df] [PERF] Execution time=0.495206
DEBUG - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [REQUEST][END]
INFO - 2026-02-28 17:30:30 --> [REQ_ID=185cfa4740a9] [PERF] Execution time=0.505364
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:30:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:30:31 --> [CSRF] token name=csrf_test_name hash=49dffd185b52aaef93abcb5a5e3b6314
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:30:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:30:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:30:31 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:30:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [FILTER_AFTER]
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [LIFECYCLE][END] status=200 duration_ms=500.44 memory_delta=2097152
INFO - 2026-02-28 17:30:31 --> [REQ_ID=9bda946ddc67] [PERF] Execution time=0.500216
DEBUG - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [REQUEST][END]
INFO - 2026-02-28 17:30:31 --> [REQ_ID=d53f4ab79efa] [PERF] Execution time=0.510600
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:30:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:30:37 --> [CSRF] token name=csrf_test_name hash=945799a75960cf793b10cc9fb7df70c3
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:30:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:30:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:30:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:30:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [FILTER_AFTER]
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [LIFECYCLE][END] status=200 duration_ms=507.02 memory_delta=2097152
INFO - 2026-02-28 17:30:37 --> [REQ_ID=272a59664743] [PERF] Execution time=0.506751
DEBUG - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [REQUEST][END]
INFO - 2026-02-28 17:30:37 --> [REQ_ID=e7674153ecca] [PERF] Execution time=0.517748
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:31:16 --> [CSRF] token name=csrf_test_name hash=e6feba0ed2a8a858dd1cd7a2fd2e689b
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:31:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:31:16 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:31:16 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:31:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [FILTER_AFTER]
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [LIFECYCLE][END] status=200 duration_ms=554.43 memory_delta=2097152
INFO - 2026-02-28 17:31:16 --> [REQ_ID=6403a568a06c] [PERF] Execution time=0.554143
DEBUG - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [REQUEST][END]
INFO - 2026-02-28 17:31:16 --> [REQ_ID=20d140a2e997] [PERF] Execution time=0.563451
DEBUG - 2026-02-28 17:32:56 --> [REQ_ID=2911528be816] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:32:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:32:56 --> [REQ_ID=2911528be816] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:32:56 --> [REQ_ID=2911528be816] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:32:56 --> [REQ_ID=2911528be816] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:32:56 --> [CSRF] token name=csrf_test_name hash=57dffb81addde134be22c1821b930ce9
DEBUG - 2026-02-28 17:32:56 --> [REQ_ID=a1213b986c29] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:32:56 --> [REQ_ID=a1213b986c29] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:32:56 --> [REQ_ID=a1213b986c29] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:32:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:32:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:32:57 --> [REQ_ID=a1213b986c29] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:32:57 --> [REQ_ID=a1213b986c29] [MEMORY][commonData:start] 10485760
INFO - 2026-02-28 17:32:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 17:32:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:32:57 --> [REQ_ID=2911528be816] [FILTER_AFTER]
DEBUG - 2026-02-28 17:32:57 --> [REQ_ID=2911528be816] [LIFECYCLE][END] status=200 duration_ms=564.58 memory_delta=4194304
INFO - 2026-02-28 17:32:57 --> [REQ_ID=a1213b986c29] [PERF] Execution time=0.561833
DEBUG - 2026-02-28 17:32:57 --> [REQ_ID=2911528be816] [REQUEST][END]
INFO - 2026-02-28 17:32:57 --> [REQ_ID=2911528be816] [PERF] Execution time=0.603419
DEBUG - 2026-02-28 17:32:59 --> [REQ_ID=7895373a65ad] [REQUEST][START] GET /
DEBUG - 2026-02-28 17:32:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:32:59 --> [REQ_ID=7895373a65ad] [FILTER_BEFORE] /
DEBUG - 2026-02-28 17:32:59 --> [REQ_ID=7895373a65ad] [ROUTE] Controller=\App\Controllers\Home Method=index
DEBUG - 2026-02-28 17:32:59 --> [REQ_ID=7895373a65ad] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/
DEBUG - 2026-02-28 17:32:59 --> [CSRF] token name=csrf_test_name hash=57dffb81addde134be22c1821b930ce9
DEBUG - 2026-02-28 17:32:59 --> [REQ_ID=f789bda58b41] [INIT] App\Controllers\Home::GET
INFO - 2026-02-28 17:32:59 --> [REQ_ID=f789bda58b41] [MEMORY][controller-start] 6291456
INFO - 2026-02-28 17:32:59 --> [REQ_ID=f789bda58b41] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:32:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:33:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:33:00 --> [REQ_ID=f789bda58b41] [VIEW_RENDER] themes/public/home
INFO - 2026-02-28 17:33:00 --> [REQ_ID=f789bda58b41] [MEMORY][commonData:start] 8388608
INFO - 2026-02-28 17:33:00 --> themesMemory usage: 8388608
DEBUG - 2026-02-28 17:33:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:33:00 --> [REQ_ID=7895373a65ad] [FILTER_AFTER]
DEBUG - 2026-02-28 17:33:00 --> [REQ_ID=7895373a65ad] [LIFECYCLE][END] status=200 duration_ms=506.43 memory_delta=2097152
INFO - 2026-02-28 17:33:00 --> [REQ_ID=f789bda58b41] [PERF] Execution time=0.506156
DEBUG - 2026-02-28 17:33:00 --> [REQ_ID=7895373a65ad] [REQUEST][END]
INFO - 2026-02-28 17:33:00 --> [REQ_ID=7895373a65ad] [PERF] Execution time=0.516114
INFO - 2026-02-28 17:45:01 --> [spark:ops:work] Started
INFO - 2026-02-28 17:45:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 17:45:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 17:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-28 17:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 17:45:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.020628
INFO - 2026-02-28 17:45:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [REQUEST][START] GET /index.php/How-It-Works/marketing
DEBUG - 2026-02-28 17:46:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [FILTER_BEFORE] /index.php/How-It-Works/marketing
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [ROUTE] Controller=\App\Modules\Blog\Controllers\HowItWorksController Method=show
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/How-It-Works/marketing
DEBUG - 2026-02-28 17:46:06 --> [CSRF] token name=csrf_test_name hash=e963d82ebd3a892a44d43d6bcdd525b5
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [INIT] App\Modules\Blog\Controllers\HowItWorksController::GET
INFO - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [MEMORY][controller-start] 6291456
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [METHOD_ENTRY] show
DEBUG - 2026-02-28 17:46:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-28 17:46:06 --> [SERVICE] App\Services\BudgetService ::setUserId
DEBUG - 2026-02-28 17:46:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 17:46:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-28 17:46:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-28 17:46:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [VIEW_RENDER] App\Modules\Blog\Views\HowItWorks\index
INFO - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [MEMORY][commonData:start] 6291456
DEBUG - 2026-02-28 17:46:06 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit= path=DB
INFO - 2026-02-28 17:46:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-28 17:46:06 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [FILTER_AFTER]
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [LIFECYCLE][END] status=200 duration_ms=694.15 memory_delta=4194304
INFO - 2026-02-28 17:46:06 --> [REQ_ID=7ce7d51e18ff] [PERF] Execution time=0.691786
DEBUG - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [REQUEST][END]
INFO - 2026-02-28 17:46:06 --> [REQ_ID=9181aaefc9a5] [PERF] Execution time=0.735709
INFO - 2026-02-28 18:00:01 --> [SPARK_START] App\Commands\AIOps\Run
INFO - 2026-02-28 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 18:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-28 18:00:01 --> [spark:ops:work] Started
INFO - 2026-02-28 18:00:01 --> [SPARK_START] App\Commands\Ops\Work
INFO - 2026-02-28 18:00:01 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 18:00:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [REQUEST][START] GET /index.php/API/Management/Run-CRON-Tasks
INFO - 2026-02-28 18:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-28 18:00:01 --> [SPARK_COMPLETE] App\Commands\Ops\Work duration=0.041272
INFO - 2026-02-28 18:00:01 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [FILTER_BEFORE] /index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [ROUTE] Controller=\App\Modules\Management\Controllers\ManagementAPIController Method=Run_CRON_Tasks
DEBUG - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [LIFECYCLE][START] GET https://www.mymiwallet.com/index.php/API/Management/Run-CRON-Tasks
DEBUG - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [REQUEST][END]
INFO - 2026-02-28 18:00:01 --> [REQ_ID=9e9370fe4dd8] [PERF] Execution time=0.105191
INFO - 2026-02-28 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-28 18:00:03 --> [SPARK_START] App\Commands\Logs\Summarize
INFO - 2026-02-28 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-28 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-28 18:00:03 --> [SPARK_COMPLETE] App\Commands\Logs\Summarize duration=0.026212
INFO - 2026-02-28 18:00:03 --> [SPARK_MEMORY] 18874368
INFO - 2026-02-28 18:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-28 18:00:03 --> [SPARK_START] App\Commands\App\Healthcheck
INFO - 2026-02-28 18:00:03 --> [SPARK_MEMORY] 16777216
INFO - 2026-02-28 18:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-28 18:00:03 --> LOG_HEALTHCHECK debug marker=03d7aeb4c44d
INFO - 2026-02-28 18:00:03 --> LOG_HEALTHCHECK info marker=03d7aeb4c44d
NOTICE - 2026-02-28 18:00:03 --> LOG_HEALTHCHECK probe marker=03d7aeb4c44d
INFO - 2026-02-28 18:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-28 18:00:03 --> [SPARK_COMPLETE] App\Commands\App\Healthcheck duration=0.028015
INFO - 2026-02-28 18:00:03 --> [SPARK_MEMORY] 18874368
DEBUG - 2026-02-28 18:00:04 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
WARNING - 2026-02-28 18:00:04 --> OllamaPatchRunner:L49 - Original Diff: 
DEBUG - 2026-02-28 18:00:05 --> OllamaPatchRunner:L51 - Retried Diff: 
DEBUG - 2026-02-28 18:00:05 --> OllamaPatchRunner:L142 - validateGeneratedPatch Content: 
DEBUG - 2026-02-28 18:00:05 --> OllamaPatchRunner:L53 - Validating Generated Patch Failed
INFO - 2026-02-28 18:00:05 --> [SPARK_COMPLETE] App\Commands\AIOps\Run duration=3.406403
INFO - 2026-02-28 18:00:05 --> [SPARK_MEMORY] 16777216
