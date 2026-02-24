<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-02-24 00:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 00:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 00:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 00:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-24 00:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 00:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 00:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 00:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 00:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 00:00:03 --> LOG_HEALTHCHECK debug marker=f15adb10ae16
INFO - 2026-02-24 00:00:03 --> LOG_HEALTHCHECK info marker=f15adb10ae16
NOTICE - 2026-02-24 00:00:03 --> LOG_HEALTHCHECK probe marker=f15adb10ae16
INFO - 2026-02-24 00:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 00:09:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:09:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:09:28 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:13:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:13:25 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 00:13:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:13:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:13:25 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:13:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:13:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 00:13:26 --> themesMemory usage: 6291456
INFO - 2026-02-24 00:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 00:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 00:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 00:17:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:17:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:17:34 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:26:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:02 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:26:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 00:26:03 --> LOGGER TEST ERROR - 00:26:03
DEBUG - 2026-02-24 00:26:03 --> LOGGER TEST DEBUG - 00:26:03
INFO - 2026-02-24 00:26:03 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:26:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:26:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:03 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:26:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 00:26:03 --> LOGGER TEST ERROR - 00:26:03
DEBUG - 2026-02-24 00:26:03 --> LOGGER TEST DEBUG - 00:26:03
INFO - 2026-02-24 00:26:03 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 00:26:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:26:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:04 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:26:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 00:26:04 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Terms-And-Conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 00:26:04 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions | referrer: none
DEBUG - 2026-02-24 00:26:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:04 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:04 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:26:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
ERROR - 2026-02-24 00:26:05 --> LOGGER TEST ERROR - 00:26:05
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> LOGGER TEST DEBUG - 00:26:05
INFO - 2026-02-24 00:26:05 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 00:26:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 00:26:05 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 00:26:05 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-24 00:26:05 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:26:05 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> [MetaService] slug=how-it-works/overview pageName= cacheHit= path=DB
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 00:26:06 --> [MetaService] slug=how-it-works/overview pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 00:26:06 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:26:06 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:26:06 --> MyMIUser L52 - initialized (first log).
INFO - 2026-02-24 00:26:06 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:06 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 00:26:06 --> [ACTIVATION] Activation link hit
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
WARNING - 2026-02-24 00:26:06 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:06 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 00:26:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 00:26:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 00:26:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 4194304
CRITICAL - 2026-02-24 00:26:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Purchase/MyMIGold]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 00:26:06 --> 404 route miss: https://www.mymiwallet.com/index.php/Purchase/MyMIGold | referrer: none
DEBUG - 2026-02-24 00:26:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:26:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:26:07 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
INFO - 2026-02-24 00:26:07 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 00:26:07 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-02-24 00:26:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 00:26:07 --> themesMemory usage: 14680064
DEBUG - 2026-02-24 00:26:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:26:07 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:26:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:26:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 00:26:08 --> LOGGER TEST ERROR - 00:26:08
DEBUG - 2026-02-24 00:26:08 --> LOGGER TEST DEBUG - 00:26:08
INFO - 2026-02-24 00:26:08 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 00:26:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 00:29:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:29:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:29:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:29:17 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-24 00:29:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:29:17 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
INFO - 2026-02-24 00:30:02 --> [spark:ops:work] Started
INFO - 2026-02-24 00:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 00:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 00:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 00:30:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:30:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:30:43 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 00:34:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 00:34:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 00:34:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 00:34:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 00:34:39 --> LOGGER TEST ERROR - 00:34:39
DEBUG - 2026-02-24 00:34:39 --> LOGGER TEST DEBUG - 00:34:39
INFO - 2026-02-24 00:34:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 00:34:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 00:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 00:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 00:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 00:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 01:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 01:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 01:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 01:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 01:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 01:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 01:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 01:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 01:17:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:17:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:17:12 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 01:24:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:24:13 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 01:24:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 01:24:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 01:24:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 01:24:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 01:24:13 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 01:24:14 --> themesMemory usage: 14680064
INFO - 2026-02-24 01:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 01:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 01:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 01:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 01:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 01:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 01:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 01:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 01:50:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:50:59 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 01:51:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:51:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 01:51:02 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 01:51:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 01:51:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: auth/resend-activation]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 01:51:53 --> 404 route miss: https://www.mymiwallet.com/index.php/auth/resend-activation | referrer: none
INFO - 2026-02-24 02:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 02:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 02:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 02:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-24 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 02:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 02:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 02:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 02:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 02:00:03 --> LOG_HEALTHCHECK debug marker=99694b0a5de8
INFO - 2026-02-24 02:00:03 --> LOG_HEALTHCHECK info marker=99694b0a5de8
NOTICE - 2026-02-24 02:00:03 --> LOG_HEALTHCHECK probe marker=99694b0a5de8
INFO - 2026-02-24 02:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 02:05:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:05:43 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:05:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:05:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 02:05:43 --> LOGGER TEST ERROR - 02:05:43
DEBUG - 2026-02-24 02:05:43 --> LOGGER TEST DEBUG - 02:05:43
INFO - 2026-02-24 02:05:43 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 02:05:43 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 02:12:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:12:21 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:12:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:12:22 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 02:12:22 --> LOGGER TEST ERROR - 02:12:22
DEBUG - 2026-02-24 02:12:22 --> LOGGER TEST DEBUG - 02:12:22
INFO - 2026-02-24 02:12:22 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 02:12:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 02:13:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:13:21 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:13:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:13:21 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 02:13:21 --> LOGGER TEST ERROR - 02:13:21
DEBUG - 2026-02-24 02:13:21 --> LOGGER TEST DEBUG - 02:13:21
INFO - 2026-02-24 02:13:21 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 02:13:21 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 02:13:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:13:25 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:13:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:13:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 02:13:26 --> LOGGER TEST ERROR - 02:13:26
DEBUG - 2026-02-24 02:13:26 --> LOGGER TEST DEBUG - 02:13:26
INFO - 2026-02-24 02:13:26 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 02:13:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 02:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 02:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 02:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 02:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 02:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 02:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 02:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 02:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 02:37:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:37:07 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:37:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:37:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 02:37:07 --> LOGGER TEST ERROR - 02:37:07
DEBUG - 2026-02-24 02:37:07 --> LOGGER TEST DEBUG - 02:37:07
INFO - 2026-02-24 02:37:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 02:37:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 02:39:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:39:19 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:39:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:39:20 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 02:39:20 --> LOGGER TEST ERROR - 02:39:20
DEBUG - 2026-02-24 02:39:20 --> LOGGER TEST DEBUG - 02:39:20
INFO - 2026-02-24 02:39:20 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 02:39:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 02:42:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:42:07 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 02:42:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 02:42:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 02:42:07 --> LOGGER TEST ERROR - 02:42:07
DEBUG - 2026-02-24 02:42:07 --> LOGGER TEST DEBUG - 02:42:07
INFO - 2026-02-24 02:42:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 02:42:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 02:42:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 02:42:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 02:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 02:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 02:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 02:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 03:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 03:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 03:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 03:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:13:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:13:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:13:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:13:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 03:13:40 --> LOGGER TEST ERROR - 03:13:40
DEBUG - 2026-02-24 03:13:40 --> LOGGER TEST DEBUG - 03:13:40
INFO - 2026-02-24 03:13:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 03:13:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 03:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 03:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 03:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 03:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 03:29:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:29:13 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:29:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:29:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 03:29:14 --> LOGGER TEST ERROR - 03:29:14
DEBUG - 2026-02-24 03:29:14 --> LOGGER TEST DEBUG - 03:29:14
INFO - 2026-02-24 03:29:14 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 03:29:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 03:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 03:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 03:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 03:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 03:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:31:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:31:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:31:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 03:31:17 --> LOGGER TEST ERROR - 03:31:17
DEBUG - 2026-02-24 03:31:17 --> LOGGER TEST DEBUG - 03:31:17
INFO - 2026-02-24 03:31:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 03:31:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 03:41:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:41:11 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:41:12 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:41:12 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 03:41:12 --> LOGGER TEST ERROR - 03:41:12
DEBUG - 2026-02-24 03:41:12 --> LOGGER TEST DEBUG - 03:41:12
INFO - 2026-02-24 03:41:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 03:41:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 03:42:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:42:24 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:42:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:42:24 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 03:42:24 --> LOGGER TEST ERROR - 03:42:24
DEBUG - 2026-02-24 03:42:24 --> LOGGER TEST DEBUG - 03:42:24
INFO - 2026-02-24 03:42:24 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 03:42:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 03:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 03:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 03:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 03:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 03:45:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:45:13 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 03:45:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:45:13 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:45:13 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:47:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:47:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:47:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:47:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 03:47:39 --> LOGGER TEST ERROR - 03:47:39
DEBUG - 2026-02-24 03:47:39 --> LOGGER TEST DEBUG - 03:47:39
INFO - 2026-02-24 03:47:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 03:47:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 03:47:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 03:47:42 --> CSRF token verified.
DEBUG - 2026-02-24 03:47:42 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 03:47:42 --> [REGISTRATION] Submission received
INFO - 2026-02-24 03:47:42 --> MailService queued email
INFO - 2026-02-24 03:47:42 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 03:47:42 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 03:47:42 --> Registration created user_id=11675, email=j.a.yla.wat.k.i.ns2.3@gmail.com, username=wVECfLgNyGHeLjZw, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 03:47:42 --> [REGISTRATION] User record created
INFO - 2026-02-24 03:47:42 --> OnboardingProgressService: created onboarding record for user_id=11675
INFO - 2026-02-24 03:47:43 --> Registration succeeded for j.a.yla.wat.k.i.ns2.3@gmail.com (event fe87443fba39a21f)
INFO - 2026-02-24 03:47:43 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 03:47:43 --> Registration redirecting to success guide for user_id=11675
DEBUG - 2026-02-24 03:47:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:47:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 03:47:43 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 03:47:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:47:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:47:58 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:48:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 03:48:06 --> CSRF token verified.
DEBUG - 2026-02-24 03:48:06 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 03:48:06 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 03:48:06 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 03:48:06 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 194.26.192.177, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 03:48:06 --> Auth attemptLogin() called with login identifier: j.a.yla.wat.k.i.ns2.3@gmail.com, remember: true
DEBUG - 2026-02-24 03:48:06 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 03:48:06 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 03:48:06 --> Auth attempt failed for identifier j.a.yla.wat.k.i.ns2.3@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 03:48:06 --> [AUTH] Login failure
WARNING - 2026-02-24 03:48:06 --> [AUTH] Login failed
DEBUG - 2026-02-24 03:48:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:48:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:48:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:25 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 03:48:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:48:25 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:48:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:48:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 03:48:26 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 03:48:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:32 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 03:48:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:48:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:48:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:48:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:37 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 03:48:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:48:37 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:37 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:48:37 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:48:37 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 03:48:37 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 03:48:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 03:48:43 --> CSRF token verified.
DEBUG - 2026-02-24 03:48:43 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 03:48:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:48:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:48:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:48:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 03:48:43 --> [SUPPORT] Account help requested
INFO - 2026-02-24 03:48:44 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-24 03:48:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:45 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 03:48:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:48:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 03:48:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 03:48:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 03:48:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 03:48:45 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 03:48:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:48:57 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 03:48:57 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 03:49:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:49:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:16 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:49:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:27 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:49:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:35 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:49:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:49:43 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:49:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 03:49:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 03:49:54 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-24 03:49:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 03:49:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 03:49:59 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-24 03:50:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 03:50:03 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 03:50:03 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-24 03:50:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:09 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:19 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:50:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:34 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:42 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 03:50:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 03:50:50 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 03:50:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 03:50:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 03:50:51 --> LOGGER TEST ERROR - 03:50:51
DEBUG - 2026-02-24 03:50:51 --> LOGGER TEST DEBUG - 03:50:51
INFO - 2026-02-24 03:50:51 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 03:50:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 04:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 04:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 04:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 04:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-24 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 04:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 04:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 04:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 04:00:03 --> LOG_HEALTHCHECK debug marker=e85c8c51e409
INFO - 2026-02-24 04:00:03 --> LOG_HEALTHCHECK info marker=e85c8c51e409
NOTICE - 2026-02-24 04:00:03 --> LOG_HEALTHCHECK probe marker=e85c8c51e409
INFO - 2026-02-24 04:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 04:08:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:08:58 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 04:08:58 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 04:14:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:14:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:14:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:14:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 04:14:37 --> LOGGER TEST ERROR - 04:14:37
DEBUG - 2026-02-24 04:14:37 --> LOGGER TEST DEBUG - 04:14:37
INFO - 2026-02-24 04:14:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:14:37 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 04:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 04:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 04:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 04:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 04:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 04:20:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 04:30:02 --> [spark:ops:work] Started
INFO - 2026-02-24 04:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 04:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 04:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 04:30:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:30:22 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:30:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:30:22 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 04:30:22 --> LOGGER TEST ERROR - 04:30:22
DEBUG - 2026-02-24 04:30:22 --> LOGGER TEST DEBUG - 04:30:22
INFO - 2026-02-24 04:30:22 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:30:22 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 04:34:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:34:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:34:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 04:42:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:42:00 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:42:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:42:00 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 04:42:00 --> LOGGER TEST ERROR - 04:42:00
DEBUG - 2026-02-24 04:42:00 --> LOGGER TEST DEBUG - 04:42:00
INFO - 2026-02-24 04:42:00 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:42:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 04:43:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:43:33 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:43:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:43:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 04:43:34 --> LOGGER TEST ERROR - 04:43:34
DEBUG - 2026-02-24 04:43:34 --> LOGGER TEST DEBUG - 04:43:34
INFO - 2026-02-24 04:43:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:43:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 04:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 04:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 04:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 04:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 04:47:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:47:18 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:47:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:47:18 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 04:47:18 --> LOGGER TEST ERROR - 04:47:18
DEBUG - 2026-02-24 04:47:18 --> LOGGER TEST DEBUG - 04:47:18
INFO - 2026-02-24 04:47:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:47:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 04:49:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:49:31 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:49:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:49:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 04:49:31 --> LOGGER TEST ERROR - 04:49:31
DEBUG - 2026-02-24 04:49:31 --> LOGGER TEST DEBUG - 04:49:31
INFO - 2026-02-24 04:49:31 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:49:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 04:54:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 04:54:50 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 04:54:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 04:54:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 04:54:51 --> LOGGER TEST ERROR - 04:54:51
DEBUG - 2026-02-24 04:54:51 --> LOGGER TEST DEBUG - 04:54:51
INFO - 2026-02-24 04:54:51 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 04:54:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 05:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 05:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 05:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 05:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 05:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:02:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:02:54 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 05:02:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:02:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 05:02:55 --> LOGGER TEST ERROR - 05:02:55
DEBUG - 2026-02-24 05:02:55 --> LOGGER TEST DEBUG - 05:02:55
INFO - 2026-02-24 05:02:55 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:02:55 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:02:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:02:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 05:02:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:02:57 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 05:02:57 --> LOGGER TEST ERROR - 05:02:57
DEBUG - 2026-02-24 05:02:57 --> LOGGER TEST DEBUG - 05:02:57
INFO - 2026-02-24 05:02:57 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:02:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:02:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:01 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 05:03:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:05 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:05 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:05 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:03:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:07 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:09 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:11 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:11 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:14 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:15 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:17 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:20 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:21 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:23 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:23 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:23 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:23 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:23 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:24 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:26 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:26 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:27 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:28 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:28 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 05:03:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 05:03:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 05:03:33 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-24 05:03:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 05:03:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Terms-And-Conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 05:03:35 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions | referrer: none
DEBUG - 2026-02-24 05:03:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 05:03:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:37 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:37 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-02-24 05:03:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:39 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-24 05:03:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:39 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 05:03:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:41 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 05:03:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:42 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:42 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:42 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-24 05:03:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:43 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 05:03:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:45 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 05:03:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:45 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:45 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 05:03:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:47 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 05:03:47 --> [ACTIVATION] Activation link hit
WARNING - 2026-02-24 05:03:47 --> [ACTIVATION] Activation failed: missing token
DEBUG - 2026-02-24 05:03:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:49 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 05:03:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:03:49 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 05:03:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:52 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 05:03:52 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 05:03:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:54 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:55 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:55 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:55 --> [MetaService] slug=how-it-works/account-settings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:03:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:56 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:56 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:56 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:56 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:57 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:57 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:57 --> [MetaService] slug=how-it-works/earnings pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:03:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:03:58 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:03:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:03:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:03:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:03:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:03:59 --> [MetaService] slug=how-it-works/overview pageName= cacheHit= path=DB
INFO - 2026-02-24 05:03:59 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:03:59 --> [MetaService] slug=how-it-works/overview pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:04:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:04:00 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:04:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:04:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:04:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:04:01 --> [MetaService] slug=how-it-works/investments pageName= cacheHit= path=DB
INFO - 2026-02-24 05:04:01 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:04:01 --> [MetaService] slug=how-it-works/investments pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:04:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:04:03 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:04:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:04:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:04:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:04:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:04:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:04:03 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit= path=DB
INFO - 2026-02-24 05:04:03 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 05:04:03 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 05:04:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:04:05 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:04:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:04:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:04:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:04:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:04:05 --> MyMICoin: guest context detected; skipping user-specific preload.
CRITICAL - 2026-02-24 05:04:05 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-It-Works/alerts]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 05:04:05 --> 404 route miss: https://www.mymiwallet.com/index.php/How-It-Works/alerts | referrer: none
DEBUG - 2026-02-24 05:10:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:10:20 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 05:10:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 05:10:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 05:10:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 05:10:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 05:10:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 05:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 05:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 05:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 05:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 05:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 05:22:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 05:22:12 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 05:22:12 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: none
INFO - 2026-02-24 05:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 05:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 05:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 05:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 05:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 05:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 05:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 05:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 06:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 06:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 06:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 06:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 06:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-24 06:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 06:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 06:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 06:00:03 --> LOG_HEALTHCHECK debug marker=dd99aaaf2368
INFO - 2026-02-24 06:00:03 --> LOG_HEALTHCHECK info marker=dd99aaaf2368
NOTICE - 2026-02-24 06:00:03 --> LOG_HEALTHCHECK probe marker=dd99aaaf2368
INFO - 2026-02-24 06:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-24 06:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 06:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 06:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 06:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 06:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 06:22:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 06:22:29 --> App\Modules\Blog\Controllers\PersonalBudgetingController initController executed
DEBUG - 2026-02-24 06:22:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 06:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 06:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 06:22:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 06:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 06:22:30 --> themesMemory usage: 14680064
INFO - 2026-02-24 06:30:02 --> [spark:ops:work] Started
INFO - 2026-02-24 06:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 06:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 06:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 06:32:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 06:32:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Dashboard/onboarding/profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 06:32:27 --> 404 route miss: https://www.mymiwallet.com/index.php/Dashboard/onboarding/profile | referrer: none
INFO - 2026-02-24 06:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 06:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 06:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 06:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 06:51:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 06:51:46 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 06:51:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 06:51:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 06:51:47 --> LOGGER TEST ERROR - 06:51:47
DEBUG - 2026-02-24 06:51:47 --> LOGGER TEST DEBUG - 06:51:47
INFO - 2026-02-24 06:51:47 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 06:51:47 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-24 07:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 07:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 07:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 07:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 07:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 07:11:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 07:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 07:11:16 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 07:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 07:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 07:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 07:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 07:22:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 07:22:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 07:22:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 07:22:06 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-24 07:22:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 07:22:06 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-24 07:25:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 07:25:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Due-Diligence-Database]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 07:25:10 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database | referrer: none
INFO - 2026-02-24 07:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 07:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 07:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 07:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 07:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 07:40:52 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 07:40:53 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
INFO - 2026-02-24 07:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 07:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 07:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 07:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 07:45:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 07:45:02 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 07:45:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 07:45:03 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 07:45:03 --> LOGGER TEST ERROR - 07:45:03
DEBUG - 2026-02-24 07:45:03 --> LOGGER TEST DEBUG - 07:45:03
INFO - 2026-02-24 07:45:03 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 07:45:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 08:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-24 08:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 08:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 08:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 08:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 08:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 08:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 08:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 08:00:04 --> LOG_HEALTHCHECK debug marker=2db59b85e289
INFO - 2026-02-24 08:00:04 --> LOG_HEALTHCHECK info marker=2db59b85e289
NOTICE - 2026-02-24 08:00:04 --> LOG_HEALTHCHECK probe marker=2db59b85e289
INFO - 2026-02-24 08:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 08:12:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:12:03 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 08:12:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:12:04 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 08:12:04 --> LOGGER TEST ERROR - 08:12:04
DEBUG - 2026-02-24 08:12:04 --> LOGGER TEST DEBUG - 08:12:04
INFO - 2026-02-24 08:12:04 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 08:12:04 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-24 08:15:02 --> [spark:ops:work] Started
INFO - 2026-02-24 08:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 08:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 08:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 08:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:15:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 08:15:16 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium_Features/Brokerage-Integrations]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 08:15:16 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
INFO - 2026-02-24 08:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 08:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 08:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 08:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 08:32:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:32:55 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:34:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:34:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:34:19 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:37:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:11 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 08:37:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:37:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 08:37:12 --> LOGGER TEST ERROR - 08:37:12
DEBUG - 2026-02-24 08:37:12 --> LOGGER TEST DEBUG - 08:37:12
INFO - 2026-02-24 08:37:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 08:37:12 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 08:37:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 08:37:16 --> CSRF token verified.
DEBUG - 2026-02-24 08:37:16 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 08:37:16 --> [REGISTRATION] Submission received
INFO - 2026-02-24 08:37:16 --> MailService queued email
INFO - 2026-02-24 08:37:16 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 08:37:16 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 08:37:16 --> Registration created user_id=11676, email=wbeal@totalcsi.com, username=MBXvrWBnpeuNBACGQzXO, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 08:37:16 --> [REGISTRATION] User record created
INFO - 2026-02-24 08:37:16 --> OnboardingProgressService: created onboarding record for user_id=11676
INFO - 2026-02-24 08:37:17 --> Registration succeeded for wbeal@totalcsi.com (event 901c723180594806)
INFO - 2026-02-24 08:37:17 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 08:37:17 --> Registration redirecting to success guide for user_id=11676
DEBUG - 2026-02-24 08:37:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:18 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 08:37:18 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 08:37:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:32 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 08:37:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:37:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 08:37:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 08:37:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 08:37:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 08:37:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:36 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:37:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 08:37:47 --> CSRF token verified.
DEBUG - 2026-02-24 08:37:47 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 08:37:47 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 08:37:47 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 08:37:47 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 193.189.100.206, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 08:37:47 --> Auth attemptLogin() called with login identifier: wbeal@totalcsi.com, remember: true
DEBUG - 2026-02-24 08:37:47 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 08:37:47 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 08:37:47 --> Auth attempt failed for identifier wbeal@totalcsi.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 08:37:47 --> [AUTH] Login failure
WARNING - 2026-02-24 08:37:47 --> [AUTH] Login failed
DEBUG - 2026-02-24 08:37:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:37:48 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:38:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:02 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 08:38:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:38:02 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 08:38:02 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 08:38:02 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 08:38:02 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 08:38:03 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 08:38:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:38:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 08:38:19 --> CSRF token verified.
DEBUG - 2026-02-24 08:38:19 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 08:38:19 --> [AUTH] Password reset requested
INFO - 2026-02-24 08:38:20 --> [AUTH] Password reset email sent
DEBUG - 2026-02-24 08:38:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:38:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:34 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 08:38:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:38:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 08:38:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 08:38:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 08:38:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 08:38:34 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 08:38:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:40 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 08:38:40 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 08:38:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:45 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:38:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:38:54 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:39:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:01 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:39:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:13 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:39:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 08:39:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 08:39:24 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-24 08:39:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:30 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:40 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:39:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 08:39:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 08:39:51 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-24 08:39:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:39:55 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:40:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:40:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:40:05 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:40:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 08:40:15 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 08:40:15 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-24 08:40:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:40:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:40:20 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 08:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:40:32 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 08:40:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:40:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 08:40:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 08:40:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 08:40:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 08:40:33 --> themesMemory usage: 10485760
INFO - 2026-02-24 08:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 08:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 08:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 08:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 08:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:45:09 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 08:45:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:45:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 08:45:10 --> LOGGER TEST ERROR - 08:45:10
DEBUG - 2026-02-24 08:45:10 --> LOGGER TEST DEBUG - 08:45:10
INFO - 2026-02-24 08:45:10 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 08:45:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 08:50:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 08:50:34 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 08:50:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 08:50:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 08:50:34 --> LOGGER TEST ERROR - 08:50:34
DEBUG - 2026-02-24 08:50:34 --> LOGGER TEST DEBUG - 08:50:34
INFO - 2026-02-24 08:50:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 08:50:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 09:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 09:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 09:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 09:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 09:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 09:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 09:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 09:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 09:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 09:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 09:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 09:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 09:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 09:35:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 09:35:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 09:35:30 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 09:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 09:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 09:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 09:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 10:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 10:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 10:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 10:00:01 --> [spark:aiops:run] Intent
DEBUG - 2026-02-24 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 10:00:03 --> LOG_HEALTHCHECK debug marker=37fd779e3b3d
INFO - 2026-02-24 10:00:03 --> LOG_HEALTHCHECK info marker=37fd779e3b3d
NOTICE - 2026-02-24 10:00:03 --> LOG_HEALTHCHECK probe marker=37fd779e3b3d
INFO - 2026-02-24 10:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 10:00:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:00:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:00:12 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 10:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 10:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 10:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 10:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:15:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:15:24 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:15:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:15:25 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 10:15:25 --> LOGGER TEST ERROR - 10:15:25
DEBUG - 2026-02-24 10:15:25 --> LOGGER TEST DEBUG - 10:15:25
INFO - 2026-02-24 10:15:25 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 10:15:25 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 10:26:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:26:26 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:26:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:26:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 10:26:27 --> LOGGER TEST ERROR - 10:26:27
DEBUG - 2026-02-24 10:26:27 --> LOGGER TEST DEBUG - 10:26:27
INFO - 2026-02-24 10:26:27 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 10:26:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 10:26:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:26:28 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:26:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:26:28 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 10:26:28 --> LOGGER TEST ERROR - 10:26:28
DEBUG - 2026-02-24 10:26:28 --> LOGGER TEST DEBUG - 10:26:28
INFO - 2026-02-24 10:26:28 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 10:26:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 10:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 10:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 10:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 10:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 10:30:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:30:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:30:19 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 10:31:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:31:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:31:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:31:58 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 10:31:58 --> LOGGER TEST ERROR - 10:31:58
DEBUG - 2026-02-24 10:31:58 --> LOGGER TEST DEBUG - 10:31:58
INFO - 2026-02-24 10:31:58 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 10:31:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 10:45:02 --> [spark:ops:work] Started
INFO - 2026-02-24 10:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 10:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 10:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 10:56:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:56:19 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:56:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:56:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 10:56:19 --> LOGGER TEST ERROR - 10:56:19
DEBUG - 2026-02-24 10:56:19 --> LOGGER TEST DEBUG - 10:56:19
INFO - 2026-02-24 10:56:19 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 10:56:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 10:57:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 10:57:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 10:57:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 10:57:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 10:57:18 --> LOGGER TEST ERROR - 10:57:18
DEBUG - 2026-02-24 10:57:18 --> LOGGER TEST DEBUG - 10:57:18
INFO - 2026-02-24 10:57:18 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 10:57:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 11:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 11:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 11:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 11:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 11:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:03:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:03:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:03:38 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 11:11:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:11:34 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 11:11:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 11:11:34 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 11:11:34 --> LOGGER TEST ERROR - 11:11:34
DEBUG - 2026-02-24 11:11:34 --> LOGGER TEST DEBUG - 11:11:34
INFO - 2026-02-24 11:11:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 11:11:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 11:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 11:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 11:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 11:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 11:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 11:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 11:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 11:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 11:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 11:32:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:32:51 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 11:32:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 11:32:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 11:32:52 --> LOGGER TEST ERROR - 11:32:52
DEBUG - 2026-02-24 11:32:52 --> LOGGER TEST DEBUG - 11:32:52
INFO - 2026-02-24 11:32:52 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 11:32:52 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-24 11:45:02 --> [spark:ops:work] Started
INFO - 2026-02-24 11:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 11:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 11:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 11:50:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:50:26 --> App\Modules\Blog\Controllers\NewsAndUpdates initController executed
DEBUG - 2026-02-24 11:50:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 11:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 11:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 11:50:26 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 11:50:26 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 11:53:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 11:53:18 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 11:53:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 11:53:19 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 11:53:19 --> LOGGER TEST ERROR - 11:53:19
DEBUG - 2026-02-24 11:53:19 --> LOGGER TEST DEBUG - 11:53:19
INFO - 2026-02-24 11:53:19 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 11:53:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 12:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 12:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 12:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 12:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-24 12:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 12:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 12:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 12:00:03 --> LOG_HEALTHCHECK debug marker=47f319bdb416
INFO - 2026-02-24 12:00:03 --> LOG_HEALTHCHECK info marker=47f319bdb416
NOTICE - 2026-02-24 12:00:03 --> LOG_HEALTHCHECK probe marker=47f319bdb416
INFO - 2026-02-24 12:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 12:12:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:39 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:12:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:12:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:12:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 12:12:40 --> LOGGER TEST ERROR - 12:12:40
DEBUG - 2026-02-24 12:12:40 --> LOGGER TEST DEBUG - 12:12:40
INFO - 2026-02-24 12:12:40 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:12:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:12:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:42 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:12:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:12:43 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:12:43 --> LOGGER TEST ERROR - 12:12:43
DEBUG - 2026-02-24 12:12:43 --> LOGGER TEST DEBUG - 12:12:43
INFO - 2026-02-24 12:12:43 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:12:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:12:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:12:52 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:12:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:12:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:12:53 --> LOGGER TEST ERROR - 12:12:53
DEBUG - 2026-02-24 12:12:53 --> LOGGER TEST DEBUG - 12:12:53
INFO - 2026-02-24 12:12:53 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:12:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:13:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:13:02 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:13:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:13:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:13:02 --> LOGGER TEST ERROR - 12:13:02
DEBUG - 2026-02-24 12:13:02 --> LOGGER TEST DEBUG - 12:13:02
INFO - 2026-02-24 12:13:02 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:13:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:13:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:13:07 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:13:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:13:08 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:13:08 --> LOGGER TEST ERROR - 12:13:08
DEBUG - 2026-02-24 12:13:08 --> LOGGER TEST DEBUG - 12:13:08
INFO - 2026-02-24 12:13:08 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:13:08 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:13:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:13:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 12:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 12:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 12:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 12:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:15:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:15:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:15:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:15:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:15:17 --> LOGGER TEST ERROR - 12:15:17
DEBUG - 2026-02-24 12:15:17 --> LOGGER TEST DEBUG - 12:15:17
INFO - 2026-02-24 12:15:17 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:15:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:17:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:17:25 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:17:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:17:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:17:26 --> LOGGER TEST ERROR - 12:17:26
DEBUG - 2026-02-24 12:17:26 --> LOGGER TEST DEBUG - 12:17:26
INFO - 2026-02-24 12:17:26 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 12:17:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:17:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:17:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:17:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:17:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:02 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:18:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:18:05 --> CSRF token verified.
DEBUG - 2026-02-24 12:18:05 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:18:05 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 12:18:05 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 12:18:05 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 76.234.126.68, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36
DEBUG - 2026-02-24 12:18:05 --> Auth attemptLogin() called with login identifier: tburks2392, remember: true
DEBUG - 2026-02-24 12:18:05 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-24 12:18:05 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-24 12:18:05 --> Auth attempt succeeded for identifier tburks2392. logged_in(): yes, user_id(): 2
DEBUG - 2026-02-24 12:18:05 --> Auth attempt succeeded. logged_in(): yes, user_id(): 2
DEBUG - 2026-02-24 12:18:05 --> Auth attemptLogin() - session user_id set to: 2
INFO - 2026-02-24 12:18:05 --> [AUTH] Login success
DEBUG - 2026-02-24 12:18:05 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-24 12:18:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:05 --> App\Modules\User\Controllers\DashboardController initController executed
DEBUG - 2026-02-24 12:18:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:05 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 12:18:05 --> [DASHBOARD] Enter
ERROR - 2026-02-24 12:18:05 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
ERROR - 2026-02-24 12:18:05 --> Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 12:18:05\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 12:18:05\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 12:18:05\'')
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
DEBUG - 2026-02-24 12:18:05 --> 📰 Daily dashboard news window 2026-02-24 00:00:00 -> 2026-02-24 23:59:59 returned 0 rows
DEBUG - 2026-02-24 12:18:05 --> [SETUP] Status computed
INFO - 2026-02-24 12:18:05 --> DashboardController L72 - $checkingSummary: 8784.01
INFO - 2026-02-24 12:18:05 --> getSolanaData: invalid address param
INFO - 2026-02-24 12:18:06 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:18:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:18:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: ops/health]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:18:06 --> 404 route miss: https://www.mymiwallet.com/index.php/ops/health | referrer: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-24 12:18:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:16 --> App\Modules\User\Controllers\DashboardController initController executed
DEBUG - 2026-02-24 12:18:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:16 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 12:18:16 --> [DASHBOARD] Enter
ERROR - 2026-02-24 12:18:16 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-24 12:18:16 --> 📰 Daily dashboard news window 2026-02-24 00:00:00 -> 2026-02-24 23:59:59 returned 0 rows
DEBUG - 2026-02-24 12:18:16 --> [SETUP] Status computed
INFO - 2026-02-24 12:18:17 --> DashboardController L72 - $checkingSummary: 8784.01
INFO - 2026-02-24 12:18:17 --> getSolanaData: invalid address param
INFO - 2026-02-24 12:18:17 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 12:18:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:33 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:18:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:33 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:33 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:33 --> Dashboard::index() reached in BudgetController. User ID: 2
DEBUG - 2026-02-24 12:18:33 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"db010881a1db00538da99f3661f43849\"","style":"nonce=\"db010881a1db00538da99f3661f43849\""}}
ERROR - 2026-02-24 12:18:33 --> BudgetController::index failed to build executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-24 12:18:33 --> [SETUP] Status computed
DEBUG - 2026-02-24 12:18:33 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"db010881a1db00538da99f3661f43849\"","style":"nonce=\"db010881a1db00538da99f3661f43849\""}}
INFO - 2026-02-24 12:18:33 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 12:18:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:34 --> App\Modules\APIs\Controllers\BudgetAPIController initController executed
DEBUG - 2026-02-24 12:18:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:34 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:34 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:35 --> App\Modules\APIs\Controllers\BudgetAPIController initController executed
DEBUG - 2026-02-24 12:18:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:35 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:35 --> App\Modules\APIs\Controllers\BudgetAPIController initController executed
DEBUG - 2026-02-24 12:18:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:35 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:35 --> App\Modules\APIs\Controllers\BudgetAPIController initController executed
DEBUG - 2026-02-24 12:18:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:18:35 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:35 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:39 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:18:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:39 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:39 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:39 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9aa3278b6babad0bee9209f72d19e3b5\"","style":"nonce=\"9aa3278b6babad0bee9209f72d19e3b5\""}}
DEBUG - 2026-02-24 12:18:39 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9aa3278b6babad0bee9209f72d19e3b5\"","style":"nonce=\"9aa3278b6babad0bee9209f72d19e3b5\""}}
INFO - 2026-02-24 12:18:39 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 12:18:39 --> $formMode: Add
INFO - 2026-02-24 12:18:39 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 12:18:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:18:40 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:18:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:18:40 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:18:40 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:18:40 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9ad9c44e4e70a29256a33ad2dd629471\"","style":"nonce=\"9ad9c44e4e70a29256a33ad2dd629471\""}}
DEBUG - 2026-02-24 12:18:40 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"9ad9c44e4e70a29256a33ad2dd629471\"","style":"nonce=\"9ad9c44e4e70a29256a33ad2dd629471\""}}
INFO - 2026-02-24 12:18:40 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 12:18:40 --> $formMode: Add
INFO - 2026-02-24 12:18:40 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 12:19:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:19:00 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:19:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:19:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:19:01 --> LOGGER TEST ERROR - 12:19:01
DEBUG - 2026-02-24 12:19:01 --> LOGGER TEST DEBUG - 12:19:01
INFO - 2026-02-24 12:19:01 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 12:19:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:27:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:27:15 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:27:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:27:15 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:27:15 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:27:15 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b7f9adce111b8b94c33411332e81dfca\"","style":"nonce=\"b7f9adce111b8b94c33411332e81dfca\""}}
DEBUG - 2026-02-24 12:27:15 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b7f9adce111b8b94c33411332e81dfca\"","style":"nonce=\"b7f9adce111b8b94c33411332e81dfca\""}}
INFO - 2026-02-24 12:27:15 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 12:27:15 --> $formMode: Add
INFO - 2026-02-24 12:27:15 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 12:27:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:27:23 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:27:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:27:23 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:27:23 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:27:23 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"4bd8fb0554d38730da4b2f1fa9a203d7\"","style":"nonce=\"4bd8fb0554d38730da4b2f1fa9a203d7\""}}
DEBUG - 2026-02-24 12:27:23 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"4bd8fb0554d38730da4b2f1fa9a203d7\"","style":"nonce=\"4bd8fb0554d38730da4b2f1fa9a203d7\""}}
INFO - 2026-02-24 12:27:23 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 12:27:23 --> $formMode: Add
INFO - 2026-02-24 12:27:23 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 12:27:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:27:44 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 12:27:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:27:44 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 12:27:44 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 12:27:44 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"060e533fd270ae9385bcaf79da8bd95d\"","style":"nonce=\"060e533fd270ae9385bcaf79da8bd95d\""}}
DEBUG - 2026-02-24 12:27:44 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"060e533fd270ae9385bcaf79da8bd95d\"","style":"nonce=\"060e533fd270ae9385bcaf79da8bd95d\""}}
INFO - 2026-02-24 12:27:44 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 12:27:44 --> $formMode: Add
INFO - 2026-02-24 12:27:44 --> themesMemory usage: 4194304
INFO - 2026-02-24 12:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 12:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 12:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 12:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 12:38:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:38:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:38:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:38:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 12:38:40 --> LOGGER TEST ERROR - 12:38:40
DEBUG - 2026-02-24 12:38:40 --> LOGGER TEST DEBUG - 12:38:40
INFO - 2026-02-24 12:38:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 12:38:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 12:38:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:38:54 --> CSRF token verified.
DEBUG - 2026-02-24 12:38:54 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:38:54 --> [REGISTRATION] Submission received
INFO - 2026-02-24 12:38:54 --> MailService queued email
INFO - 2026-02-24 12:38:54 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 12:38:54 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 12:38:54 --> Registration created user_id=11677, email=maslyukov.g@mt-system.ru, username=aoTmLPakbLrDjZDPEdXYf, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 12:38:54 --> [REGISTRATION] User record created
INFO - 2026-02-24 12:38:54 --> OnboardingProgressService: created onboarding record for user_id=11677
INFO - 2026-02-24 12:38:55 --> Registration succeeded for maslyukov.g@mt-system.ru (event b8fe7f0e684e88e5)
INFO - 2026-02-24 12:38:55 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 12:38:55 --> Registration redirecting to success guide for user_id=11677
DEBUG - 2026-02-24 12:38:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:38:57 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:38:57 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 12:39:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:10 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 12:39:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:39:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:39:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 12:39:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 12:39:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 12:39:11 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 12:39:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:29 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:39:39 --> CSRF token verified.
DEBUG - 2026-02-24 12:39:39 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:39:39 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 12:39:39 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 12:39:39 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 45.84.107.222, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 12:39:39 --> Auth attemptLogin() called with login identifier: maslyukov.g@mt-system.ru, remember: true
DEBUG - 2026-02-24 12:39:39 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 12:39:39 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 12:39:39 --> Auth attempt failed for identifier maslyukov.g@mt-system.ru. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 12:39:39 --> [AUTH] Login failure
WARNING - 2026-02-24 12:39:39 --> [AUTH] Login failed
DEBUG - 2026-02-24 12:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:39 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:39:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:54 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 12:39:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:39:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:39:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 12:39:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 12:39:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:39:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:39:58 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:04 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:40:11 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:40:11 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-24 12:40:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:28 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:35 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:45 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:40:55 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:41:02 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:41:02 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-24 12:41:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:18 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:41:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 12:41:32 --> CSRF token verified.
DEBUG - 2026-02-24 12:41:32 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:41:32 --> [AUTH] Password reset requested
INFO - 2026-02-24 12:41:33 --> [AUTH] Password reset email sent
DEBUG - 2026-02-24 12:41:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:33 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:41:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:49 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 12:41:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 12:41:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 12:41:49 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 12:41:49 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 12:41:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:41:53 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 12:41:53 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 12:41:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:41:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:41:58 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-24 12:42:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:42:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:42:03 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 12:42:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:42:14 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 12:42:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:42:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:42:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 12:42:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 12:42:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 12:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 12:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 12:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 12:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 12:48:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:48:49 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 12:48:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:48:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 12:48:49 --> LOGGER TEST ERROR - 12:48:49
DEBUG - 2026-02-24 12:48:49 --> LOGGER TEST DEBUG - 12:48:49
INFO - 2026-02-24 12:48:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 12:48:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 12:50:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 12:50:49 --> App\Modules\Blog\Controllers\NewsAndUpdates initController executed
DEBUG - 2026-02-24 12:50:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 12:50:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:50:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 12:50:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 12:50:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 12:54:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:54:13 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Terms-And-Conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:54:13 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions | referrer: none
DEBUG - 2026-02-24 12:57:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:57:57 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:57:57 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-24 12:59:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 12:59:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 12:59:23 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-24 13:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 13:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 13:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 13:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 13:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 13:06:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:06:20 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 13:06:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:06:20 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 13:06:20 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 13:06:20 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"2e90a26df9ecacb4e4137257d6c4795e\"","style":"nonce=\"2e90a26df9ecacb4e4137257d6c4795e\""}}
DEBUG - 2026-02-24 13:06:20 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"2e90a26df9ecacb4e4137257d6c4795e\"","style":"nonce=\"2e90a26df9ecacb4e4137257d6c4795e\""}}
INFO - 2026-02-24 13:06:20 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 13:06:20 --> $formMode: Add
INFO - 2026-02-24 13:06:20 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 13:08:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:08:29 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 13:08:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:08:29 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 13:08:29 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 13:08:29 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"eaae39f9347480fa76f1a3781e79cd17\"","style":"nonce=\"eaae39f9347480fa76f1a3781e79cd17\""}}
DEBUG - 2026-02-24 13:08:29 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"eaae39f9347480fa76f1a3781e79cd17\"","style":"nonce=\"eaae39f9347480fa76f1a3781e79cd17\""}}
INFO - 2026-02-24 13:08:29 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 13:08:29 --> $formMode: Add
INFO - 2026-02-24 13:08:29 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 13:08:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 13:08:58 --> CSRF token verified.
DEBUG - 2026-02-24 13:08:58 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 13:08:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:08:58 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 13:08:58 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 13:09:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 13:09:00 --> CSRF token verified.
DEBUG - 2026-02-24 13:09:00 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 13:09:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:09:00 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 13:09:00 --> BudgetController::constructor - sanitizedCacheKey exists? YES
INFO - 2026-02-24 13:12:07 --> [spark:logs:summarize-all] Intent
INFO - 2026-02-24 13:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 13:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 13:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 13:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:27:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 13:27:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: login.jsp]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 13:27:17 --> 404 route miss: https://www.mymiwallet.com/index.php/login.jsp | referrer: none
INFO - 2026-02-24 13:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 13:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 13:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 13:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 13:36:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:36:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:36:31 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 13:41:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:41:19 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 13:41:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:41:19 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 13:41:19 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 13:41:19 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b01b1f0bfa4f6d74cadfd00981c249df\"","style":"nonce=\"b01b1f0bfa4f6d74cadfd00981c249df\""}}
DEBUG - 2026-02-24 13:41:19 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"b01b1f0bfa4f6d74cadfd00981c249df\"","style":"nonce=\"b01b1f0bfa4f6d74cadfd00981c249df\""}}
INFO - 2026-02-24 13:41:19 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 13:41:19 --> $formMode: Add
INFO - 2026-02-24 13:41:19 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 13:42:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:42:17 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 13:42:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:42:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 13:42:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 13:42:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 13:42:17 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 13:42:18 --> themesMemory usage: 10485760
INFO - 2026-02-24 13:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 13:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 13:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 13:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 13:51:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:51:15 --> App\Modules\Blog\Controllers\NewsAndUpdates initController executed
DEBUG - 2026-02-24 13:51:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:51:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 13:51:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 13:51:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 13:51:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 13:51:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:51:21 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 13:51:21 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:51:21 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 13:51:21 --> LOGGER TEST ERROR - 13:51:21
DEBUG - 2026-02-24 13:51:21 --> LOGGER TEST DEBUG - 13:51:21
INFO - 2026-02-24 13:51:21 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 13:51:21 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 13:51:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 13:51:38 --> App\Modules\Blog\Controllers\NewsAndUpdates initController executed
DEBUG - 2026-02-24 13:51:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 13:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 13:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 13:51:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 13:51:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 14:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-02-24 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 14:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 14:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 14:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 14:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 14:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 14:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 14:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 14:00:04 --> LOG_HEALTHCHECK debug marker=335423113d03
INFO - 2026-02-24 14:00:04 --> LOG_HEALTHCHECK info marker=335423113d03
NOTICE - 2026-02-24 14:00:04 --> LOG_HEALTHCHECK probe marker=335423113d03
INFO - 2026-02-24 14:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 14:11:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:11:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:11:16 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 14:15:02 --> [spark:ops:work] Started
INFO - 2026-02-24 14:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-24 14:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 14:15:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 14:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 14:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 14:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 14:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 14:37:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:37:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 14:37:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:37:58 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 14:37:58 --> LOGGER TEST ERROR - 14:37:58
DEBUG - 2026-02-24 14:37:58 --> LOGGER TEST DEBUG - 14:37:58
INFO - 2026-02-24 14:37:58 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 14:37:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 14:38:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 14:38:02 --> CSRF token verified.
DEBUG - 2026-02-24 14:38:02 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 14:38:02 --> [REGISTRATION] Submission received
INFO - 2026-02-24 14:38:02 --> MailService queued email
INFO - 2026-02-24 14:38:02 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 14:38:02 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 14:38:02 --> Registration created user_id=11678, email=bob@bgplanning.com, username=zmeEHLCmsLqGujlfZUuD, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 14:38:02 --> [REGISTRATION] User record created
INFO - 2026-02-24 14:38:02 --> OnboardingProgressService: created onboarding record for user_id=11678
INFO - 2026-02-24 14:38:03 --> Registration succeeded for bob@bgplanning.com (event aec5abcdad27777c)
INFO - 2026-02-24 14:38:03 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 14:38:03 --> Registration redirecting to success guide for user_id=11678
DEBUG - 2026-02-24 14:38:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:03 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 14:38:04 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 14:38:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:17 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 14:38:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:38:17 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:38:17 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:38:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:22 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:38:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 14:38:31 --> CSRF token verified.
DEBUG - 2026-02-24 14:38:31 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 14:38:31 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 14:38:31 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 14:38:31 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 78.142.18.219, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 14:38:31 --> Auth attemptLogin() called with login identifier: bob@bgplanning.com, remember: false
DEBUG - 2026-02-24 14:38:31 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 14:38:31 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 14:38:31 --> Auth attempt failed for identifier bob@bgplanning.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 14:38:31 --> [AUTH] Login failure
WARNING - 2026-02-24 14:38:31 --> [AUTH] Login failed
DEBUG - 2026-02-24 14:38:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:31 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:38:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:45 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:38:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:54 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 14:38:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:38:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:38:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:38:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:38:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 14:38:55 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 14:38:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:38:58 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 14:38:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:38:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:38:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:38:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:38:58 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 14:38:58 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 14:39:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 14:39:03 --> CSRF token verified.
DEBUG - 2026-02-24 14:39:03 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 14:39:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:39:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:39:03 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 14:39:03 --> [SUPPORT] Account help requested
INFO - 2026-02-24 14:39:04 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-24 14:39:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:04 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 14:39:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:39:04 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:39:04 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:39:04 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:39:04 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 14:39:04 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 14:39:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:23 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 14:39:23 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 14:39:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:28 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 14:39:39 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 14:39:39 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-24 14:39:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:39:43 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 14:40:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:40:07 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 14:40:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 14:40:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 14:40:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 14:40:07 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit= path=DB
INFO - 2026-02-24 14:40:07 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 14:40:07 --> [MetaService] slug=how-it-works/marketing pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-24 14:42:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:42:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 14:42:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:42:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 14:42:18 --> LOGGER TEST ERROR - 14:42:18
DEBUG - 2026-02-24 14:42:18 --> LOGGER TEST DEBUG - 14:42:18
INFO - 2026-02-24 14:42:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 14:42:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 14:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 14:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 14:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-24 14:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 14:51:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:51:44 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 14:51:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:51:44 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-24 14:51:44 --> LOGGER TEST ERROR - 14:51:44
DEBUG - 2026-02-24 14:51:44 --> LOGGER TEST DEBUG - 14:51:44
INFO - 2026-02-24 14:51:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 14:51:44 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 14:58:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 14:58:14 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 14:58:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 14:58:14 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-24 14:58:14 --> LOGGER TEST ERROR - 14:58:14
DEBUG - 2026-02-24 14:58:14 --> LOGGER TEST DEBUG - 14:58:14
INFO - 2026-02-24 14:58:14 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 14:58:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 15:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 15:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-24 15:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-24 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 15:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 15:03:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:03:58 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 15:03:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 15:03:58 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 15:03:58 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 15:03:58 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"a6c30710c9934ce0629d35468e4e2c31\"","style":"nonce=\"a6c30710c9934ce0629d35468e4e2c31\""}}
DEBUG - 2026-02-24 15:03:58 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"a6c30710c9934ce0629d35468e4e2c31\"","style":"nonce=\"a6c30710c9934ce0629d35468e4e2c31\""}}
INFO - 2026-02-24 15:03:58 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 15:03:58 --> $formMode: Add
INFO - 2026-02-24 15:03:58 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 15:05:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:05:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:05:08 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 15:05:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 15:05:08 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 15:05:08 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 15:05:08 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"15188c558de317f017e5eb0c80d46edb\"","style":"nonce=\"15188c558de317f017e5eb0c80d46edb\""}}
DEBUG - 2026-02-24 15:05:08 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"15188c558de317f017e5eb0c80d46edb\"","style":"nonce=\"15188c558de317f017e5eb0c80d46edb\""}}
INFO - 2026-02-24 15:05:08 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 15:05:08 --> $formMode: Add
INFO - 2026-02-24 15:05:08 --> themesMemory usage: 6291456
INFO - 2026-02-24 15:06:36 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 15:06:36 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 15:06:36 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
DEBUG - 2026-02-24 15:13:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:13:24 --> App\Modules\User\Controllers\AlertsController initController executed
DEBUG - 2026-02-24 15:13:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 15:13:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 15:13:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 15:13:24 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-02-24 15:13:24 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 4.18
    [current_price] => 4.18
    [last_updated] => 2026-02-24 15:13:24
    [last_updated_time] => 2026-02-24 15:13:24
)

INFO - 2026-02-24 15:13:24 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-02-24 15:13:24 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
INFO - 2026-02-24 15:13:24 --> themesMemory usage: 8388608
INFO - 2026-02-24 15:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 15:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 15:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 15:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:20:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:20:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 15:29:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:29:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:29:50 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 15:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 15:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 15:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 15:37:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:37:51 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 15:37:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 15:37:52 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 15:37:52 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 15:37:52 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 15:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 15:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 15:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 15:51:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 15:51:31 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 15:51:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 15:51:31 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 15:51:31 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 15:51:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 16:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 16:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-24 16:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 16:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 16:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 16:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 16:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 16:00:03 --> LOG_HEALTHCHECK debug marker=eacce0b65ebb
INFO - 2026-02-24 16:00:03 --> LOG_HEALTHCHECK info marker=eacce0b65ebb
NOTICE - 2026-02-24 16:00:03 --> LOG_HEALTHCHECK probe marker=eacce0b65ebb
INFO - 2026-02-24 16:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 16:02:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:02:15 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 16:02:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:02:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 16:02:16 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 16:02:16 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 16:07:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:07:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:07:10 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 16:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 16:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-24 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 16:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 16:15:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:15:33 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 16:15:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:15:33 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 16:15:33 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 16:15:33 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 16:26:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:26:24 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 16:26:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:26:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 16:26:24 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 16:26:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 16:26:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 16:26:30 --> CSRF token verified.
DEBUG - 2026-02-24 16:26:30 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 16:26:30 --> [REGISTRATION] Submission received
INFO - 2026-02-24 16:26:30 --> MailService queued email
INFO - 2026-02-24 16:26:30 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 16:26:30 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 16:26:30 --> Registration created user_id=11679, email=makhnov.n@mt-system.ru, username=VjBNwyHeJwbbFKFXz, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 16:26:30 --> [REGISTRATION] User record created
INFO - 2026-02-24 16:26:30 --> OnboardingProgressService: created onboarding record for user_id=11679
INFO - 2026-02-24 16:26:31 --> Registration succeeded for makhnov.n@mt-system.ru (event 5541b00fa1156316)
INFO - 2026-02-24 16:26:31 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 16:26:31 --> Registration redirecting to success guide for user_id=11679
DEBUG - 2026-02-24 16:26:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:26:32 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 16:26:32 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 16:26:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:26:46 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 16:26:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:26:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 16:26:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 16:26:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 16:26:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 16:26:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:26:52 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 16:26:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:26:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 16:26:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 16:26:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 16:26:52 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 16:26:53 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 16:27:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:06 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:27:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 16:27:18 --> CSRF token verified.
DEBUG - 2026-02-24 16:27:18 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 16:27:18 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 16:27:18 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 16:27:18 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.220.100.242, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 16:27:18 --> Auth attemptLogin() called with login identifier: makhnov.n@mt-system.ru, remember: true
DEBUG - 2026-02-24 16:27:18 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-24 16:27:18 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 16:27:18 --> Auth attempt failed for identifier makhnov.n@mt-system.ru. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 16:27:18 --> [AUTH] Login failure
WARNING - 2026-02-24 16:27:18 --> [AUTH] Login failed
DEBUG - 2026-02-24 16:27:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:19 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:27:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:36 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:27:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:40 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:27:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:50 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 16:27:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:27:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 16:27:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 16:27:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 16:27:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 16:27:51 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 16:27:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:27:53 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:02 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:14 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:30 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:38 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:47 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:28:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:28:56 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 16:29:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:29:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:29:03 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 16:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 16:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 16:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 16:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 16:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 16:47:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:47:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 16:47:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 16:47:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 16:47:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 16:47:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 16:55:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:55:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 16:55:15 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 17:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 17:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 17:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 17:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 17:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 17:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 17:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:27:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:27:54 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 17:27:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 17:27:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 17:27:55 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 17:27:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 17:28:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 17:28:00 --> CSRF token verified.
DEBUG - 2026-02-24 17:28:00 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:28:00 --> [REGISTRATION] Submission received
INFO - 2026-02-24 17:28:00 --> MailService queued email
INFO - 2026-02-24 17:28:00 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 17:28:00 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 17:28:00 --> Registration created user_id=11680, email=leilabradish@yahoo.com, username=GNsITaoikKfxQYTsEtTy, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 17:28:00 --> [REGISTRATION] User record created
INFO - 2026-02-24 17:28:00 --> OnboardingProgressService: created onboarding record for user_id=11680
INFO - 2026-02-24 17:28:01 --> Registration succeeded for leilabradish@yahoo.com (event 54c191b4a097b41d)
INFO - 2026-02-24 17:28:01 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 17:28:01 --> Registration redirecting to success guide for user_id=11680
DEBUG - 2026-02-24 17:28:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:01 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:28:01 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 17:28:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:14 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 17:28:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 17:28:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 17:28:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 17:28:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 17:28:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 17:28:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:19 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 17:28:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 17:28:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 17:28:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 17:28:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 17:28:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 17:28:20 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 17:28:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:25 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:28:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 17:28:37 --> CSRF token verified.
DEBUG - 2026-02-24 17:28:37 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:28:37 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 17:28:37 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 17:28:37 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.220.101.18, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 17:28:37 --> Auth attemptLogin() called with login identifier: leilabradish@yahoo.com, remember: true
DEBUG - 2026-02-24 17:28:37 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 17:28:37 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 17:28:38 --> Auth attempt failed for identifier leilabradish@yahoo.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 17:28:38 --> [AUTH] Login failure
WARNING - 2026-02-24 17:28:38 --> [AUTH] Login failed
DEBUG - 2026-02-24 17:28:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:38 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:28:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:51 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:28:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:28:57 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:16 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:26 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:35 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:29:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:29:54 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 17:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 17:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 17:30:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:04 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:30:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:13 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:30:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:23 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:30:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:31 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:30:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:42 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:30:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:30:52 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:30:52 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 17:30:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:31:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 17:31:01 --> CSRF token verified.
DEBUG - 2026-02-24 17:31:01 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 17:31:01 --> [AUTH] Password reset requested
INFO - 2026-02-24 17:31:02 --> [AUTH] Password reset email sent
DEBUG - 2026-02-24 17:31:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:31:03 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 17:31:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 17:31:16 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 17:31:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 17:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 17:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 17:31:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 17:31:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 17:31:16 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 17:36:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 17:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 17:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 17:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 18:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-24 18:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 18:00:02 --> [spark:ops:work] Intent
DEBUG - 2026-02-24 18:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 18:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 18:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 18:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 18:00:04 --> LOG_HEALTHCHECK debug marker=d69ef0eef3f6
INFO - 2026-02-24 18:00:04 --> LOG_HEALTHCHECK info marker=d69ef0eef3f6
NOTICE - 2026-02-24 18:00:04 --> LOG_HEALTHCHECK probe marker=d69ef0eef3f6
INFO - 2026-02-24 18:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 18:04:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 18:04:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 18:04:17 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: none
DEBUG - 2026-02-24 18:04:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 18:04:48 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/Reports]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 18:04:48 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/Reports | referrer: none
INFO - 2026-02-24 18:15:02 --> [spark:ops:work] Started
INFO - 2026-02-24 18:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 18:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 18:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:15:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:15:42 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 18:15:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 18:15:43 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 18:15:43 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 18:15:43 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 18:24:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:24:45 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 18:24:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 18:24:45 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 18:24:45 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 18:24:45 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 18:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 18:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 18:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 18:35:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:35:24 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 18:35:25 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 18:35:25 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
INFO - 2026-02-24 18:35:25 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 18:35:25 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
INFO - 2026-02-24 18:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 18:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 18:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 18:46:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:46:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:46:49 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 18:48:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:48:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 18:48:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 18:48:06 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 18:48:06 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 18:48:06 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 18:48:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:48:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 18:48:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 18:48:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 18:48:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 18:48:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 18:55:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:55:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 18:55:28 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 19:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 19:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:03:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:03:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:03:38 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:03:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:03:40 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 19:03:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 19:03:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 19:03:40 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 19:03:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 19:04:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:03 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:04:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 19:04:11 --> CSRF token verified.
DEBUG - 2026-02-24 19:04:11 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:04:11 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 19:04:11 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 19:04:11 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 192.42.116.14, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 19:04:11 --> Auth attemptLogin() called with login identifier: jk.p.x.200.0@gmail.com, remember: false
DEBUG - 2026-02-24 19:04:11 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 19:04:11 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 19:04:11 --> Auth attempt failed for identifier jk.p.x.200.0@gmail.com. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-02-24 19:04:11 --> [AUTH] Login failure
WARNING - 2026-02-24 19:04:11 --> [AUTH] Login failed
DEBUG - 2026-02-24 19:04:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:12 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:04:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:26 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:04:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:36 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 19:04:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 19:04:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 19:04:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 19:04:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 19:04:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 19:04:37 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 19:04:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:45 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 19:04:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 19:04:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 19:04:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 19:04:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 19:04:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 19:04:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:04:51 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:04:51 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 19:04:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 19:05:02 --> CSRF token verified.
DEBUG - 2026-02-24 19:05:02 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:05:02 --> [AUTH] Password reset requested
WARNING - 2026-02-24 19:05:02 --> [AUTH] Password reset request: user not found
DEBUG - 2026-02-24 19:05:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:16 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 19:05:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 19:05:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 19:05:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 19:05:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 19:05:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 19:05:16 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 19:05:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:22 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:05:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:37 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:05:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:05:55 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:06:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:05 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:06:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:13 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:06:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:22 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:06:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:37 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 19:06:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:06:59 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 19:15:01 --> [spark:ops:work] Intent
DEBUG - 2026-02-24 19:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 19:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 19:19:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:19:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:19:23 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 19:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 19:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 19:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 19:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 19:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 19:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 19:47:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 19:47:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 19:47:53 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-24 19:57:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 19:57:03 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 19:57:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 19:57:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 19:57:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 19:57:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 19:57:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 20:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 20:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 20:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-24 20:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-24 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 20:00:03 --> LOG_HEALTHCHECK debug marker=103c92dd4cde
INFO - 2026-02-24 20:00:03 --> LOG_HEALTHCHECK info marker=103c92dd4cde
NOTICE - 2026-02-24 20:00:03 --> LOG_HEALTHCHECK probe marker=103c92dd4cde
INFO - 2026-02-24 20:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-24 20:06:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:06:16 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 20:06:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:06:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:06:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:06:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:06:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:06:16 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 20:07:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:07:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:07:37 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 20:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 20:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:18:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:18:11 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 20:18:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:18:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 20:18:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 20:18:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 20:19:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:10 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 20:19:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:19:10 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 20:19:10 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 20:19:10 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 20:19:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 20:19:14 --> CSRF token verified.
DEBUG - 2026-02-24 20:19:14 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:19:14 --> [REGISTRATION] Submission received
INFO - 2026-02-24 20:19:14 --> MailService queued email
INFO - 2026-02-24 20:19:14 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 20:19:14 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 20:19:14 --> Registration created user_id=11681, email=rl.ho.u.ghj.r@gmail.com, username=HjmOtDoZxJtXBSTaIVnP, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 20:19:14 --> [REGISTRATION] User record created
INFO - 2026-02-24 20:19:14 --> OnboardingProgressService: created onboarding record for user_id=11681
INFO - 2026-02-24 20:19:15 --> Registration succeeded for rl.ho.u.ghj.r@gmail.com (event d941e5985390b987)
INFO - 2026-02-24 20:19:15 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 20:19:15 --> Registration redirecting to success guide for user_id=11681
DEBUG - 2026-02-24 20:19:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:15 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:19:15 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 20:19:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:29 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 20:19:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:19:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:19:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:19:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:19:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:19:31 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 20:19:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:34 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:19:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 20:19:44 --> CSRF token verified.
DEBUG - 2026-02-24 20:19:44 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:19:44 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 20:19:44 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 20:19:44 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 185.243.218.225, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 20:19:44 --> Auth attemptLogin() called with login identifier: rl.ho.u.ghj.r@gmail.com, remember: false
DEBUG - 2026-02-24 20:19:44 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-24 20:19:44 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 20:19:44 --> Auth attempt failed for identifier rl.ho.u.ghj.r@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 20:19:44 --> [AUTH] Login failure
WARNING - 2026-02-24 20:19:44 --> [AUTH] Login failed
DEBUG - 2026-02-24 20:19:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:44 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:19:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:19:58 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 20:19:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:19:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:19:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:19:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:19:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:20:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:03 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:11 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:22 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:30 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:41 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:20:49 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:20:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:00 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:21:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 20:21:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 20:21:00 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: none
DEBUG - 2026-02-24 20:21:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:11 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:21:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:21:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:21:41 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:22:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:00 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:22:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:22:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:18 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:22:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:29 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 20:22:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:22:29 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:22:29 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:22:29 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 20:22:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 20:22:40 --> CSRF token verified.
DEBUG - 2026-02-24 20:22:40 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 20:22:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:22:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:22:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:22:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:22:40 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:22:40 --> [SUPPORT] Account help requested
INFO - 2026-02-24 20:22:41 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-24 20:22:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:22:42 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 20:22:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:22:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:22:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:22:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:22:42 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:22:42 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 20:22:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:23:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:23:01 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:23:01 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 20:23:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:23:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:23:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 20:27:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 20:27:35 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 20:27:35 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-24 20:28:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:28:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:28:56 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 20:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 20:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 20:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 20:30:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:30:16 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 20:30:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:30:17 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 20:30:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 20:30:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 20:33:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 20:33:39 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 20:33:39 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: none
INFO - 2026-02-24 20:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 20:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 20:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 20:45:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:45:09 --> App\Modules\Blog\Controllers\BlogController initController executed
DEBUG - 2026-02-24 20:45:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:45:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:45:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:45:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:45:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:59:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 20:59:19 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 20:59:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 20:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 20:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 20:59:19 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 20:59:19 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 20:59:20 --> themesMemory usage: 14680064
DEBUG - 2026-02-24 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 21:00:01 --> [spark:ops:work] Started
INFO - 2026-02-24 21:00:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 21:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 21:13:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:13:28 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 21:13:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 21:13:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 21:13:28 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 21:13:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-24 21:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 21:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 21:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:19:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:19:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:19:30 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 21:20:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:20:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:20:58 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 21:24:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:24:28 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 21:24:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 21:24:29 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 21:24:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 21:24:29 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-24 21:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 21:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 21:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 21:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:35:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:35:17 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 21:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 21:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 21:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 21:45:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:45:23 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-24 21:45:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 21:45:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 21:45:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 21:45:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 21:45:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 21:45:24 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 21:55:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:55:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 21:55:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 22:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 22:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 22:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-24 22:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-24 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-24 22:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-24 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-24 22:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-24 22:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-24 22:00:04 --> LOG_HEALTHCHECK debug marker=bfa01e70d9e8
INFO - 2026-02-24 22:00:04 --> LOG_HEALTHCHECK info marker=bfa01e70d9e8
NOTICE - 2026-02-24 22:00:04 --> LOG_HEALTHCHECK probe marker=bfa01e70d9e8
INFO - 2026-02-24 22:00:04 --> [spark:app:healthcheck] Completed
INFO - 2026-02-24 22:15:01 --> [spark:ops:work] Started
INFO - 2026-02-24 22:15:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 22:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:20:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:20:43 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 22:20:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:20:44 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 22:20:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 22:20:44 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 22:24:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:24:52 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 22:24:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:24:53 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 22:24:53 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 22:24:53 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 22:24:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 22:24:59 --> CSRF token verified.
DEBUG - 2026-02-24 22:24:59 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 22:24:59 --> [REGISTRATION] Submission received
INFO - 2026-02-24 22:24:59 --> MailService queued email
INFO - 2026-02-24 22:25:00 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 22:25:00 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 22:25:00 --> Registration created user_id=11682, email=a.m.be.r.da.wn.wo.od.r.u.f.f@gmail.com, username=PWdefTHlZQLvLiWbCfkTu, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 22:25:00 --> [REGISTRATION] User record created
INFO - 2026-02-24 22:25:00 --> OnboardingProgressService: created onboarding record for user_id=11682
INFO - 2026-02-24 22:25:00 --> Registration succeeded for a.m.be.r.da.wn.wo.od.r.u.f.f@gmail.com (event 6479f8e5f48dc06c)
INFO - 2026-02-24 22:25:00 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 22:25:00 --> Registration redirecting to success guide for user_id=11682
DEBUG - 2026-02-24 22:25:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:01 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 22:25:01 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 22:25:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:14 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 22:25:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:25:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:25:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:25:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:25:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:25:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:18 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 22:25:18 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:25:18 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:25:18 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:25:18 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:25:18 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 22:25:19 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 22:25:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:27 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 22:25:40 --> CSRF token verified.
DEBUG - 2026-02-24 22:25:40 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 22:25:40 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 22:25:40 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 22:25:40 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 45.138.16.164, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-24 22:25:40 --> Auth attemptLogin() called with login identifier: a.m.be.r.da.wn.wo.od.r.u.f.f@gmail.com, remember: true
DEBUG - 2026-02-24 22:25:40 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-24 22:25:40 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-24 22:25:40 --> Auth attempt failed for identifier a.m.be.r.da.wn.wo.od.r.u.f.f@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-24 22:25:40 --> [AUTH] Login failure
WARNING - 2026-02-24 22:25:40 --> [AUTH] Login failed
DEBUG - 2026-02-24 22:25:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:40 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:25:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:25:54 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:02 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:12 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:25 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:35 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:42 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:26:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:26:56 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:26 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:35 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:27:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:27:56 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:28:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:28:04 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 22:28:04 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 22:28:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:28:10 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 22:28:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:28:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:28:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:28:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:28:10 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 22:28:10 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 22:28:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 22:28:20 --> CSRF token verified.
DEBUG - 2026-02-24 22:28:20 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 22:28:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:28:20 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:28:20 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 22:28:20 --> [SUPPORT] Account help requested
INFO - 2026-02-24 22:28:21 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-24 22:28:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:28:22 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-24 22:28:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:28:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:28:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:28:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:28:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 22:28:22 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 22:28:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:28:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:28:39 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 22:28:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:28:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 22:28:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 22:28:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 22:28:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 22:28:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 22:29:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:29:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:29:48 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 22:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 22:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 22:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 22:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:39:39 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 22:39:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:39:39 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 22:39:39 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 22:39:39 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"c5093b96676a2a18e470874e3533b106\"","style":"nonce=\"c5093b96676a2a18e470874e3533b106\""}}
DEBUG - 2026-02-24 22:39:39 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"c5093b96676a2a18e470874e3533b106\"","style":"nonce=\"c5093b96676a2a18e470874e3533b106\""}}
INFO - 2026-02-24 22:39:39 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 22:39:39 --> $formMode: Add
INFO - 2026-02-24 22:39:39 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 22:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:39:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:39:41 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 22:40:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:40:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:40:10 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 22:40:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:40:10 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 22:40:10 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 22:40:10 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"3a34310ed694b4a9a1e18ac8f769e83e\"","style":"nonce=\"3a34310ed694b4a9a1e18ac8f769e83e\""}}
DEBUG - 2026-02-24 22:40:10 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"3a34310ed694b4a9a1e18ac8f769e83e\"","style":"nonce=\"3a34310ed694b4a9a1e18ac8f769e83e\""}}
INFO - 2026-02-24 22:40:10 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 22:40:10 --> $formMode: Add
INFO - 2026-02-24 22:40:10 --> themesMemory usage: 4194304
DEBUG - 2026-02-24 22:41:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:41:29 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 22:41:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:41:29 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 22:41:29 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 22:41:29 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"386cf7e1f7c7224371f22c3631b0b945\"","style":"nonce=\"386cf7e1f7c7224371f22c3631b0b945\""}}
DEBUG - 2026-02-24 22:41:29 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"386cf7e1f7c7224371f22c3631b0b945\"","style":"nonce=\"386cf7e1f7c7224371f22c3631b0b945\""}}
INFO - 2026-02-24 22:41:29 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 22:41:29 --> $formMode: Add
INFO - 2026-02-24 22:41:29 --> themesMemory usage: 6291456
INFO - 2026-02-24 22:45:01 --> [spark:ops:work] Started
INFO - 2026-02-24 22:45:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 22:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 22:55:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 22:55:00 --> App\Modules\User\Controllers\BudgetController initController executed
DEBUG - 2026-02-24 22:55:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 22:55:00 --> BudgetController L53 Initialized with cuID: 2
DEBUG - 2026-02-24 22:55:00 --> BudgetController::constructor - sanitizedCacheKey exists? YES
DEBUG - 2026-02-24 22:55:00 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"4b0d58782cc82e9f407b56e4e7826595\"","style":"nonce=\"4b0d58782cc82e9f407b56e4e7826595\""}}
DEBUG - 2026-02-24 22:55:00 --> BudgetController::commonData snapshot: {"cuID":2,"cuEmail":"admin@timothyburks.com","totalAccountBalance":0,"nonce":{"script":"nonce=\"4b0d58782cc82e9f407b56e4e7826595\"","style":"nonce=\"4b0d58782cc82e9f407b56e4e7826595\""}}
INFO - 2026-02-24 22:55:00 --> $uri: https://www.mymiwallet.com/index.php/Budget/Add/Income
INFO - 2026-02-24 22:55:00 --> $formMode: Add
INFO - 2026-02-24 22:55:00 --> themesMemory usage: 6291456
INFO - 2026-02-24 23:00:02 --> [spark:ops:work] Started
INFO - 2026-02-24 23:00:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 23:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:07:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 23:07:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 23:07:28 --> 404 route miss: https://www.mymiwallet.com/index.php/Management/API | referrer: none
DEBUG - 2026-02-24 23:08:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-24 23:08:49 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-24 23:08:49 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
INFO - 2026-02-24 23:15:02 --> [spark:ops:work] Started
INFO - 2026-02-24 23:15:02 --> [spark:ops:work] Intent
INFO - 2026-02-24 23:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-24 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:16:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:16:27 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 23:16:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:16:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
INFO - 2026-02-24 23:16:28 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 23:16:28 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-24 23:20:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:14 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 23:20:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:20:14 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 23:20:14 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 23:20:14 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 23:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:15 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-24 23:20:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 23:20:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 23:20:15 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 23:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:15 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-24 23:20:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 23:20:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 23:20:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 23:20:15 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 23:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 23:20:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:20:17 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:20:17 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-24 23:23:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:23:40 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 23:23:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:23:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 23:23:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-24 23:23:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 23:23:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:23:41 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-24 23:23:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:23:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-24 23:23:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-24 23:23:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-24 23:23:41 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-24 23:23:42 --> themesMemory usage: 12582912
DEBUG - 2026-02-24 23:23:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 23:23:43 --> CSRF token verified.
DEBUG - 2026-02-24 23:23:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:23:43 --> [REGISTRATION] Submission received
INFO - 2026-02-24 23:23:43 --> MailService queued email
INFO - 2026-02-24 23:23:43 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-24 23:23:43 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-24 23:23:43 --> Registration created user_id=11683, email=160@kirisbyforum.fun, username=Anya160sn, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-24 23:23:43 --> [REGISTRATION] User record created
INFO - 2026-02-24 23:23:43 --> OnboardingProgressService: created onboarding record for user_id=11683
INFO - 2026-02-24 23:23:44 --> Registration succeeded for 160@kirisbyforum.fun (event 609a0c0bc4cfd1c6)
INFO - 2026-02-24 23:23:44 --> [REGISTRATION] Activation email queued
INFO - 2026-02-24 23:23:44 --> Registration redirecting to success guide for user_id=11683
DEBUG - 2026-02-24 23:23:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:23:45 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:23:45 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-24 23:23:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:23:45 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 23:23:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 23:23:46 --> CSRF token verified.
DEBUG - 2026-02-24 23:23:46 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:23:46 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 23:23:46 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 23:23:46 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 217.60.2.243, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0
DEBUG - 2026-02-24 23:23:46 --> Auth attemptLogin() called with login identifier: Anya160sn, remember: false
DEBUG - 2026-02-24 23:23:46 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-24 23:23:46 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-24 23:23:46 --> Auth attempt failed for identifier Anya160sn. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Anya160sn">Resend activation message one more time.</a>
WARNING - 2026-02-24 23:23:46 --> [AUTH] Login failure
WARNING - 2026-02-24 23:23:46 --> [AUTH] Login failed
DEBUG - 2026-02-24 23:23:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:23:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 23:26:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:45 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:26:45 --> [ACTIVATION] Activation link hit
DEBUG - 2026-02-24 23:26:45 --> [ACTIVATION] Token validated for user
INFO - 2026-02-24 23:26:45 --> [ACTIVATION] Account activated
INFO - 2026-02-24 23:26:45 --> [ACTIVATION] Redirect issued
DEBUG - 2026-02-24 23:26:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-24 23:26:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-24 23:26:46 --> CSRF token verified.
DEBUG - 2026-02-24 23:26:46 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:26:46 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-24 23:26:46 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-24 23:26:46 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 217.60.2.243, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0
DEBUG - 2026-02-24 23:26:46 --> Auth attemptLogin() called with login identifier: Anya160sn, remember: false
DEBUG - 2026-02-24 23:26:46 --> Auth attemptLogin() called. redirect_url in session: none
DEBUG - 2026-02-24 23:26:46 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-24 23:26:46 --> Auth attempt succeeded for identifier Anya160sn. logged_in(): yes, user_id(): 11683
DEBUG - 2026-02-24 23:26:46 --> Auth attempt succeeded. logged_in(): yes, user_id(): 11683
DEBUG - 2026-02-24 23:26:46 --> Auth attemptLogin() - session user_id set to: 11683
ERROR - 2026-02-24 23:26:46 --> Duplicate entry '160@kirisbyforum.fun-217.60.2.243' for key 'bf_user_ip_history.bf_user_ip_unique_email'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11683, \'160@kirisbyforum.fun\', \'217.60.2.243\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11683, \'160@kirisbyforum.fun\', \'217.60.2.243\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (11683, \'160@kirisbyforum.fun\', \'217.60.2.243\', \'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\', \'2026-02-24 23:26:46\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_user_ip_history` (`user_id`, `email`, `ip_address`, `user_agent`, `first_seen_at`, `last_seen_at`, `created_at`, `updated_at`) VALUES (:user_id:, :email:, :ip_address:, :user_agent:, :first_seen_at:, :last_seen_at:, :created_at:, :updated_at:)', [...], false)
 5 SYSTEMPATH/Model.php(356): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(898): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(665): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Models/UserIpHistoryModel.php(41): CodeIgniter\Model->insert([...])
 9 APPPATH/Controllers/AuthController.php(285): App\Models\UserIpHistoryModel->record(11683, '160@kirisbyforum.fun', '217.60.2.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Avast/131.0.0.0')
10 SYSTEMPATH/CodeIgniter.php(951): App\Controllers\AuthController->attemptLogin()
11 SYSTEMPATH/CodeIgniter.php(497): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
12 SYSTEMPATH/CodeIgniter.php(340): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
13 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
14 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
15 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
INFO - 2026-02-24 23:26:46 --> [AUTH] Login success
INFO - 2026-02-24 23:26:46 --> OnboardingProgressService: first verified login recorded for user_id=11683
INFO - 2026-02-24 23:26:46 --> OnboardingProgressService: walkthrough started for user_id=11683
INFO - 2026-02-24 23:26:46 --> Auth attemptLogin() onboarding walkthrough queued for user_id=11683
DEBUG - 2026-02-24 23:26:46 --> Auth redirect destination: https://www.mymiwallet.com/index.php/Dashboard
DEBUG - 2026-02-24 23:26:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:47 --> App\Modules\User\Controllers\DashboardController initController executed
DEBUG - 2026-02-24 23:26:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:26:47 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 23:26:47 --> [DASHBOARD] Enter
ERROR - 2026-02-24 23:26:47 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
ERROR - 2026-02-24 23:26:47 --> Table 'mymiwallet.bf_squeeze_scorecards' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 23:26:47\'', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 23:26:47\'')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT COUNT(*) AS `numrows`
FROM `bf_squeeze_scorecards`
WHERE `score_total` >= 80
AND `as_of_datetime` >= \'2026-02-23 23:26:47\'')
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
DEBUG - 2026-02-24 23:26:47 --> 📰 Daily dashboard news window 2026-02-24 00:00:00 -> 2026-02-24 23:59:59 returned 0 rows
DEBUG - 2026-02-24 23:26:47 --> [SETUP] Status computed
INFO - 2026-02-24 23:26:47 --> DashboardController L72 - $checkingSummary: 0
INFO - 2026-02-24 23:26:47 --> DashboardController: onboarding walkthrough modal triggered for user_id=11683
INFO - 2026-02-24 23:26:47 --> getSolanaData: invalid address param
INFO - 2026-02-24 23:26:48 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 23:26:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:48 --> App\Modules\User\Controllers\DashboardController initController executed
DEBUG - 2026-02-24 23:26:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:26:48 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 23:26:48 --> No default Solana wallet for user 11683; provisioning...
DEBUG - 2026-02-24 23:26:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:49 --> App\Controllers\Home initController executed
DEBUG - 2026-02-24 23:26:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:26:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
INFO - 2026-02-24 23:26:49 --> themesMemory usage: 8388608
DEBUG - 2026-02-24 23:26:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-24 23:26:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:26:50 --> App\Modules\User\Controllers\DashboardController initController executed
DEBUG - 2026-02-24 23:26:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-24 23:26:50 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-24 23:26:50 --> [DASHBOARD] Enter
ERROR - 2026-02-24 23:26:50 --> DashboardController::index failed to load executive summary: Cache key contains reserved characters {}()/\@:
DEBUG - 2026-02-24 23:26:50 --> 📰 Daily dashboard news window 2026-02-24 00:00:00 -> 2026-02-24 23:59:59 returned 0 rows
DEBUG - 2026-02-24 23:26:50 --> [SETUP] Status computed
INFO - 2026-02-24 23:26:51 --> DashboardController L72 - $checkingSummary: 0
INFO - 2026-02-24 23:26:51 --> getSolanaData: invalid address param
INFO - 2026-02-24 23:26:51 --> themesMemory usage: 6291456
DEBUG - 2026-02-24 23:28:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:28:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-24 23:28:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-24 23:30:01 --> [spark:ops:work] Started
INFO - 2026-02-24 23:30:01 --> [spark:ops:work] Intent
INFO - 2026-02-24 23:30:01 --> [spark:ops:work] Completed
