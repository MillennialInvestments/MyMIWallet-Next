<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2026-02-23 00:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-02-23 00:00:02 --> guard_uri_placeholders failed: Class "Config\MyMIDBLoggerHandler" not found
ERROR - 2026-02-23 00:00:02 --> pre_system URI guard failed: Class "Config\MyMIDBLoggerHandler" not found
INFO - 2026-02-23 00:00:02 --> [spark:ops:work] Started
CRITICAL - 2026-02-23 00:00:02 --> Error: Class "Config\MyMIDBLoggerHandler" not found
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 SYSTEMPATH/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:ops:work] Started', [...])
 2 APPPATH/Commands/Ops/Work.php(30): log_message('info', '[spark:ops:work] Started', [...])
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:00:02 --> ErrorException: Uncaught Error: Class "Config\MyMIDBLoggerHandler" not found in /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Log/Logger.php:261
Stack trace:
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('critical', 'Error: Class "C...', Array)
#1 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Debug/Exceptions.php(123): log_message('critical', 'Error: {message...', Array)
#2 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#3 {main}
  thrown
【Previous Exception】
Error
Class "Config\MyMIDBLoggerHandler" not found
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:ops:work...', Array)
#1 /home/mymiteam/mymiwallet/site/current/app/Commands/Ops/Work.php(30): log_message('info', '[spark:ops:work...', Array)
#2 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Commands.php(74): App\Commands\Ops\Work->run(Array)
#3 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', Array)
#4 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(442): CodeIgniter\CLI\Console->run()
#5 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
#6 /home/mymiteam/mymiwallet/site/current/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#7 {main}
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
INFO - 2026-02-23 00:00:02 --> [spark:aiops:run] Intent
CRITICAL - 2026-02-23 00:00:02 --> Error: Class "Config\MyMIDBLoggerHandler" not found
[Method: CLI, Route: aiops:run]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 SYSTEMPATH/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:aiops:run] Intent', [...])
 2 APPPATH/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:aiops:run] Intent', [...])
 3 APPPATH/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent([], [], false)
 4 APPPATH/Commands/AIOps/Run.php(26): App\Commands\SafeBaseCommand->parseParams([])
 5 SYSTEMPATH/CLI/Commands.php(74): App\Commands\AIOps\Run->run([])
 6 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('aiops:run', [])
 7 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 8 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 9 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:00:02 --> ErrorException: Uncaught Error: Class "Config\MyMIDBLoggerHandler" not found in /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Log/Logger.php:261
Stack trace:
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('critical', 'Error: Class "C...', Array)
#1 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Debug/Exceptions.php(123): log_message('critical', 'Error: {message...', Array)
#2 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#3 {main}
  thrown
【Previous Exception】
Error
Class "Config\MyMIDBLoggerHandler" not found
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:aiops:ru...', Array)
#1 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:aiops:ru...', Array)
#2 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent(Array, Array, false)
#3 /home/mymiteam/mymiwallet/site/current/app/Commands/AIOps/Run.php(26): App\Commands\SafeBaseCommand->parseParams(Array)
#4 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Commands.php(74): App\Commands\AIOps\Run->run(Array)
#5 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('aiops:run', Array)
#6 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(442): CodeIgniter\CLI\Console->run()
#7 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
#8 /home/mymiteam/mymiwallet/site/current/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#9 {main}
[Method: CLI, Route: aiops:run]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
INFO - 2026-02-23 00:15:01 --> [spark:ops:work] Started
CRITICAL - 2026-02-23 00:15:01 --> Error: Class "Config\MyMIDBLoggerHandler" not found
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 SYSTEMPATH/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:ops:work] Started', [...])
 2 APPPATH/Commands/Ops/Work.php(30): log_message('info', '[spark:ops:work] Started', [...])
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:15:01 --> ErrorException: Uncaught Error: Class "Config\MyMIDBLoggerHandler" not found in /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Log/Logger.php:261
Stack trace:
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('critical', 'Error: Class "C...', Array)
#1 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Debug/Exceptions.php(123): log_message('critical', 'Error: {message...', Array)
#2 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#3 {main}
  thrown
【Previous Exception】
Error
Class "Config\MyMIDBLoggerHandler" not found
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:ops:work...', Array)
#1 /home/mymiteam/mymiwallet/site/current/app/Commands/Ops/Work.php(30): log_message('info', '[spark:ops:work...', Array)
#2 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Commands.php(74): App\Commands\Ops\Work->run(Array)
#3 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', Array)
#4 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(442): CodeIgniter\CLI\Console->run()
#5 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
#6 /home/mymiteam/mymiwallet/site/current/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#7 {main}
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
DEBUG - 2026-02-23 00:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
ERROR - 2026-02-23 00:15:01 --> guard_uri_placeholders failed: Class "Config\MyMIDBLoggerHandler" not found
ERROR - 2026-02-23 00:15:01 --> pre_system URI guard failed: Class "Config\MyMIDBLoggerHandler" not found
INFO - 2026-02-23 00:17:50 --> [spark:config:clear] Intent
CRITICAL - 2026-02-23 00:17:50 --> Error: Class "Config\MyMIDBLoggerHandler" not found
[Method: CLI, Route: config:clear]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 SYSTEMPATH/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:config:clear] Intent', [...])
 2 APPPATH/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:config:clear] Intent', [...])
 3 APPPATH/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent([], [...], true)
 4 APPPATH/Commands/ConfigClear.php(31): App\Commands\SafeBaseCommand->parseParams([])
 5 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ConfigClear->run([])
 6 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('config:clear', [])
 7 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 8 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 9 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:17:50 --> ErrorException: Uncaught Error: Class "Config\MyMIDBLoggerHandler" not found in /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Log/Logger.php:261
Stack trace:
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('critical', 'Error: Class "C...', Array)
#1 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Debug/Exceptions.php(123): log_message('critical', 'Error: {message...', Array)
#2 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#3 {main}
  thrown
【Previous Exception】
Error
Class "Config\MyMIDBLoggerHandler" not found
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:config:c...', Array)
#1 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:config:c...', Array)
#2 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent(Array, Array, true)
#3 /home/mymiteam/mymiwallet/site/current/app/Commands/ConfigClear.php(31): App\Commands\SafeBaseCommand->parseParams(Array)
#4 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Commands.php(74): App\Commands\ConfigClear->run(Array)
#5 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('config:clear', Array)
#6 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(442): CodeIgniter\CLI\Console->run()
#7 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
#8 /home/mymiteam/mymiwallet/site/current/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#9 {main}
[Method: CLI, Route: config:clear]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
INFO - 2026-02-23 00:19:39 --> [spark:config:clear] Intent
CRITICAL - 2026-02-23 00:19:39 --> Error: Class "App\Libraries\Logging\MyMIDBLoggerHandler" not found
[Method: CLI, Route: config:clear]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 SYSTEMPATH/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:config:clear] Intent', [...])
 2 APPPATH/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:config:clear] Intent', [...])
 3 APPPATH/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent([], [...], true)
 4 APPPATH/Commands/ConfigClear.php(31): App\Commands\SafeBaseCommand->parseParams([])
 5 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ConfigClear->run([])
 6 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('config:clear', [])
 7 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 8 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 9 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:19:39 --> ErrorException: Uncaught Error: Class "App\Libraries\Logging\MyMIDBLoggerHandler" not found in /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Log/Logger.php:261
Stack trace:
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('critical', 'Error: Class "A...', Array)
#1 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Debug/Exceptions.php(123): log_message('critical', 'Error: {message...', Array)
#2 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#3 {main}
  thrown
【Previous Exception】
Error
Class "App\Libraries\Logging\MyMIDBLoggerHandler" not found
#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Common.php(817): CodeIgniter\Log\Logger->log('info', '[spark:config:c...', Array)
#1 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(161): log_message('info', '[spark:config:c...', Array)
#2 /home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php(112): App\Commands\SafeBaseCommand->logIntent(Array, Array, true)
#3 /home/mymiteam/mymiwallet/site/current/app/Commands/ConfigClear.php(31): App\Commands\SafeBaseCommand->parseParams(Array)
#4 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Commands.php(74): App\Commands\ConfigClear->run(Array)
#5 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('config:clear', Array)
#6 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(442): CodeIgniter\CLI\Console->run()
#7 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
#8 /home/mymiteam/mymiwallet/site/current/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#9 {main}
[Method: CLI, Route: config:clear]
in SYSTEMPATH/Log/Logger.php on line 261.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
INFO - 2026-02-23 00:26:20 --> [spark:config:clear] Intent
INFO - 2026-02-23 00:26:23 --> [spark:spark-reset] Intent
DEBUG - 2026-02-23 00:26:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 00:26:57 --> App\Modules\User\Controllers\AlertsController initController executed
DEBUG - 2026-02-23 00:26:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 00:26:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 00:26:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 00:26:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMIAlerts: no authenticated user context detected.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 00:26:58 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMIInvestments: no session user detected; skipping personalized hydration.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:26:58 --> MyMIAlerts: no authenticated user context detected.
INFO - 2026-02-23 00:26:58 --> AlertsModel L404 - Alert updated successfully for ID 7405: Array
(
    [price] => 4.38
    [current_price] => 4.38
    [last_updated] => 2026-02-23 00:26:58
    [last_updated_time] => 2026-02-23 00:26:58
)

INFO - 2026-02-23 00:26:58 --> 🔄 Trying AlphaVantage for GRAB...
INFO - 2026-02-23 00:26:58 --> ✅ Alert snapshot inserted for GRAB with trade_id 7405
INFO - 2026-02-23 00:26:58 --> themesMemory usage: 8388608
CRITICAL - 2026-02-23 00:28:28 --> ErrorException: Allowed memory size of 536870912 bytes exhausted (tried to allocate 4194312 bytes)
[Method: CLI, Route: app:logs:consolidate]
in SYSTEMPATH/Database/BaseResult.php on line 199.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
INFO - 2026-02-23 00:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 00:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 00:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 00:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 00:42:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 00:42:34 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 00:42:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 00:42:35 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 00:42:35 --> LOGGER TEST ERROR - 00:42:35
DEBUG - 2026-02-23 00:42:35 --> LOGGER TEST DEBUG - 00:42:35
INFO - 2026-02-23 00:42:35 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 00:42:35 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 00:43:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 00:43:30 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 00:43:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 00:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 00:43:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 00:43:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 00:44:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 00:44:28 --> App\Modules\Management\Controllers\MarketingAdminController initController executed
DEBUG - 2026-02-23 00:44:28 --> MyMIMarketing: Pscrape library not installed; Google search scraping will use fallback.
DEBUG - 2026-02-23 00:44:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 00:44:28 --> MarketingController initialized. Memory: 6291456
INFO - 2026-02-23 00:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 00:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 00:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 00:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 00:51:45 --> [spark:config:clear] Intent
ERROR - 2026-02-23 00:52:00 --> Unknown column 'count' in 'field list'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (:normalized_message:, :sample_message:, :category:, :type:, :count:, :first_seen_at:, :last_seen_at:)', [...], false)
 5 APPPATH/Commands/Errors/ConsolidateErrors.php(137): CodeIgniter\Database\BaseBuilder->insert([...])
 6 APPPATH/Commands/Errors/ConsolidateErrors.php(57): App\Commands\Errors\ConsolidateErrors->consolidateRow([...], '', 'General', 'Error')
 7 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Errors\ConsolidateErrors->run([])
 8 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('app:logs:consolidate', [])
 9 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
10 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
11 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:52:00 --> CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'count' in 'field list'
[Method: CLI, Route: app:logs:consolidate]
in SYSTEMPATH/Database/BaseConnection.php on line 724.
 1 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (:normalized_message:, :sample_message:, :category:, :type:, :count:, :first_seen_at:, :last_seen_at:)', [...], false)
 2 APPPATH/Commands/Errors/ConsolidateErrors.php(137): CodeIgniter\Database\BaseBuilder->insert([...])
 3 APPPATH/Commands/Errors/ConsolidateErrors.php(57): App\Commands\Errors\ConsolidateErrors->consolidateRow([...], '', 'General', 'Error')
 4 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Errors\ConsolidateErrors->run([])
 5 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('app:logs:consolidate', [])
 6 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 7 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 8 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:52:00 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'count' in 'field list'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 310.
 1 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 2 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 3 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (:normalized_message:, :sample_message:, :category:, :type:, :count:, :first_seen_at:, :last_seen_at:)', [...], false)
 4 APPPATH/Commands/Errors/ConsolidateErrors.php(137): CodeIgniter\Database\BaseBuilder->insert([...])
 5 APPPATH/Commands/Errors/ConsolidateErrors.php(57): App\Commands\Errors\ConsolidateErrors->consolidateRow([...], '', 'General', 'Error')
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Errors\ConsolidateErrors->run([])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('app:logs:consolidate', [])
 8 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-23 00:52:00 --> [Caused by] mysqli_sql_exception: Unknown column 'count' in 'field list'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 300.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(300): mysqli->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(769): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 3 SYSTEMPATH/Database/BaseConnection.php(686): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (\'\', \'\', \'General\', \'Error\', 1, \'2025-04-12 10:39:38\', \'2025-04-12 10:39:38\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_error_consolidated_logs` (`normalized_message`, `sample_message`, `category`, `type`, `count`, `first_seen_at`, `last_seen_at`) VALUES (:normalized_message:, :sample_message:, :category:, :type:, :count:, :first_seen_at:, :last_seen_at:)', [...], false)
 5 APPPATH/Commands/Errors/ConsolidateErrors.php(137): CodeIgniter\Database\BaseBuilder->insert([...])
 6 APPPATH/Commands/Errors/ConsolidateErrors.php(57): App\Commands\Errors\ConsolidateErrors->consolidateRow([...], '', 'General', 'Error')
 7 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Errors\ConsolidateErrors->run([])
 8 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('app:logs:consolidate', [])
 9 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
10 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
11 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 01:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 01:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 01:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 01:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 01:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 01:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 01:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 01:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 01:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 01:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 01:22:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 01:22:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 01:22:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 01:22:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 01:22:38 --> LOGGER TEST ERROR - 01:22:38
DEBUG - 2026-02-23 01:22:38 --> LOGGER TEST DEBUG - 01:22:38
INFO - 2026-02-23 01:22:38 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 01:22:38 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 01:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 01:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 01:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 01:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 01:41:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 01:41:30 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 01:41:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 01:41:30 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 01:41:30 --> LOGGER TEST ERROR - 01:41:30
DEBUG - 2026-02-23 01:41:30 --> LOGGER TEST DEBUG - 01:41:30
INFO - 2026-02-23 01:41:30 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 01:41:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 01:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 01:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 01:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 01:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 01:55:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 01:55:33 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 01:55:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 01:55:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 01:55:34 --> LOGGER TEST ERROR - 01:55:34
DEBUG - 2026-02-23 01:55:34 --> LOGGER TEST DEBUG - 01:55:34
INFO - 2026-02-23 01:55:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 01:55:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 02:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 02:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 02:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 02:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-23 02:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 02:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 02:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 02:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 02:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 02:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 02:00:03 --> LOG_HEALTHCHECK debug marker=9ebeadcc7e7b
INFO - 2026-02-23 02:00:03 --> LOG_HEALTHCHECK info marker=9ebeadcc7e7b
NOTICE - 2026-02-23 02:00:03 --> LOG_HEALTHCHECK probe marker=9ebeadcc7e7b
INFO - 2026-02-23 02:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-23 02:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 02:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 02:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 02:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 02:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 02:30:02 --> [spark:ops:work] Started
INFO - 2026-02-23 02:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 02:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 02:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 02:41:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 02:41:55 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 02:41:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 02:41:55 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 02:41:55 --> LOGGER TEST ERROR - 02:41:55
DEBUG - 2026-02-23 02:41:55 --> LOGGER TEST DEBUG - 02:41:55
INFO - 2026-02-23 02:41:55 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 02:41:55 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 02:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 02:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 02:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 02:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 03:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 03:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 03:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 03:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 03:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 03:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 03:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 03:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 03:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 03:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 03:22:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 03:22:56 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 03:22:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 03:22:56 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 03:22:56 --> LOGGER TEST ERROR - 03:22:56
DEBUG - 2026-02-23 03:22:56 --> LOGGER TEST DEBUG - 03:22:56
INFO - 2026-02-23 03:22:56 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 03:22:56 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 03:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 03:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 03:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 03:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 03:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 03:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 03:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 03:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 03:50:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 03:50:19 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 03:50:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 03:50:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 03:50:20 --> LOGGER TEST ERROR - 03:50:20
DEBUG - 2026-02-23 03:50:20 --> LOGGER TEST DEBUG - 03:50:20
INFO - 2026-02-23 03:50:20 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 03:50:20 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 03:56:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 03:56:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 03:56:59 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 04:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 04:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-23 04:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 04:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 04:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 04:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 04:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 04:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 04:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 04:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 04:00:04 --> LOG_HEALTHCHECK debug marker=cc36ec4af89a
INFO - 2026-02-23 04:00:04 --> LOG_HEALTHCHECK info marker=cc36ec4af89a
NOTICE - 2026-02-23 04:00:04 --> LOG_HEALTHCHECK probe marker=cc36ec4af89a
INFO - 2026-02-23 04:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 04:05:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:05:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 04:05:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 04:05:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 04:05:57 --> LOGGER TEST ERROR - 04:05:57
DEBUG - 2026-02-23 04:05:57 --> LOGGER TEST DEBUG - 04:05:57
INFO - 2026-02-23 04:05:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 04:05:57 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 04:13:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:13:36 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 04:13:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 04:13:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 04:13:37 --> LOGGER TEST ERROR - 04:13:37
DEBUG - 2026-02-23 04:13:37 --> LOGGER TEST DEBUG - 04:13:37
INFO - 2026-02-23 04:13:37 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 04:13:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 04:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 04:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 04:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 04:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 04:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:15:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:15:06 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 04:15:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 04:15:07 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 04:15:07 --> LOGGER TEST ERROR - 04:15:07
DEBUG - 2026-02-23 04:15:07 --> LOGGER TEST DEBUG - 04:15:07
INFO - 2026-02-23 04:15:07 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 04:15:07 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 04:19:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:19:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:19:14 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 04:25:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:25:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 04:25:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 04:25:40 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 04:25:40 --> LOGGER TEST ERROR - 04:25:40
DEBUG - 2026-02-23 04:25:40 --> LOGGER TEST DEBUG - 04:25:40
INFO - 2026-02-23 04:25:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 04:25:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 04:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 04:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 04:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 04:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 04:43:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 04:43:28 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 04:43:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 04:43:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 04:43:28 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 04:43:28 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 04:43:28 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 04:43:29 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-23 04:43:29 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 04:43:29 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
INFO - 2026-02-23 04:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 04:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 04:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 04:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 04:57:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 04:57:17 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Dashboard/onboarding/recurring-expense]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 04:57:17 --> 404 route miss: https://www.mymiwallet.com/index.php/Dashboard/onboarding/recurring-expense | referrer: none
INFO - 2026-02-23 05:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 05:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 05:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 05:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 05:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 05:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 05:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 05:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 05:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 05:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:09 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 05:16:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 05:16:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 05:16:10 --> LOGGER TEST ERROR - 05:16:10
DEBUG - 2026-02-23 05:16:10 --> LOGGER TEST DEBUG - 05:16:10
INFO - 2026-02-23 05:16:10 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 05:16:10 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 05:16:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:11 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 05:16:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 05:16:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 05:16:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 05:16:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 05:16:11 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 05:16:12 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 05:16:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 05:16:13 --> CSRF token verified.
DEBUG - 2026-02-23 05:16:13 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 05:16:13 --> [REGISTRATION] Submission received
INFO - 2026-02-23 05:16:13 --> MailService queued email
INFO - 2026-02-23 05:16:13 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 05:16:13 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 05:16:13 --> Registration created user_id=11667, email=investor@volunteplo.com.ua, username=Kundnani Nicky Gope SCAM NSFX, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 05:16:13 --> [REGISTRATION] User record created
INFO - 2026-02-23 05:16:13 --> OnboardingProgressService: created onboarding record for user_id=11667
INFO - 2026-02-23 05:16:14 --> Registration succeeded for investor@volunteplo.com.ua (event a30742b49d188795)
INFO - 2026-02-23 05:16:14 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 05:16:14 --> Registration redirecting to success guide for user_id=11667
DEBUG - 2026-02-23 05:16:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:15 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 05:16:15 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 05:16:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:15 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 05:16:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 05:16:16 --> CSRF token verified.
DEBUG - 2026-02-23 05:16:16 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 05:16:16 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 05:16:16 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 05:16:16 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 146.19.125.48, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36 OpenWave/97.4.2043.44
DEBUG - 2026-02-23 05:16:16 --> Auth attemptLogin() called with login identifier: Kundnani Nicky Gope SCAM NSFX, remember: false
DEBUG - 2026-02-23 05:16:16 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-23 05:16:16 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-23 05:16:16 --> Auth attempt failed for identifier Kundnani Nicky Gope SCAM NSFX. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=Kundnani%2BNicky%2BGope%2BSCAM%2BNSFX">Resend activation message one more time.</a>
WARNING - 2026-02-23 05:16:16 --> [AUTH] Login failure
WARNING - 2026-02-23 05:16:16 --> [AUTH] Login failed
DEBUG - 2026-02-23 05:16:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:16:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 05:20:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:20:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 05:20:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 05:20:18 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 05:20:18 --> LOGGER TEST ERROR - 05:20:18
DEBUG - 2026-02-23 05:20:18 --> LOGGER TEST DEBUG - 05:20:18
INFO - 2026-02-23 05:20:18 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 05:20:18 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 05:24:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 05:24:10 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 05:24:10 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
INFO - 2026-02-23 05:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 05:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 05:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 05:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 05:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 05:40:51 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 05:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 05:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 05:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 05:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 06:00:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:00:00 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:00:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:00:00 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 06:00:00 --> LOGGER TEST ERROR - 06:00:00
DEBUG - 2026-02-23 06:00:00 --> LOGGER TEST DEBUG - 06:00:00
INFO - 2026-02-23 06:00:00 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 06:00:00 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 06:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 06:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 06:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 06:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 06:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 06:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-23 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 06:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 06:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 06:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 06:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 06:00:04 --> LOG_HEALTHCHECK debug marker=d7a3d637c561
INFO - 2026-02-23 06:00:04 --> LOG_HEALTHCHECK info marker=d7a3d637c561
NOTICE - 2026-02-23 06:00:04 --> LOG_HEALTHCHECK probe marker=d7a3d637c561
INFO - 2026-02-23 06:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 06:05:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:05:53 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:05:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:05:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:05:54 --> LOGGER TEST ERROR - 06:05:54
DEBUG - 2026-02-23 06:05:54 --> LOGGER TEST DEBUG - 06:05:54
INFO - 2026-02-23 06:05:54 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 06:05:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 06:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 06:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 06:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 06:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 06:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 06:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 06:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 06:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 06:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 06:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 06:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 06:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 06:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 06:51:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:51:08 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:51:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:51:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 06:51:09 --> LOGGER TEST ERROR - 06:51:09
DEBUG - 2026-02-23 06:51:09 --> LOGGER TEST DEBUG - 06:51:09
INFO - 2026-02-23 06:51:09 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 06:51:09 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 06:53:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:35 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:35 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:35 --> LOGGER TEST ERROR - 06:53:35
DEBUG - 2026-02-23 06:53:35 --> LOGGER TEST DEBUG - 06:53:35
INFO - 2026-02-23 06:53:35 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:35 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:53:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:36 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:36 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:36 --> LOGGER TEST ERROR - 06:53:36
DEBUG - 2026-02-23 06:53:36 --> LOGGER TEST DEBUG - 06:53:36
INFO - 2026-02-23 06:53:36 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:53:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:38 --> LOGGER TEST ERROR - 06:53:38
DEBUG - 2026-02-23 06:53:38 --> LOGGER TEST DEBUG - 06:53:38
INFO - 2026-02-23 06:53:38 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:53:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:39 --> LOGGER TEST ERROR - 06:53:39
DEBUG - 2026-02-23 06:53:39 --> LOGGER TEST DEBUG - 06:53:39
INFO - 2026-02-23 06:53:39 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:53:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:40 --> LOGGER TEST ERROR - 06:53:40
DEBUG - 2026-02-23 06:53:40 --> LOGGER TEST DEBUG - 06:53:40
INFO - 2026-02-23 06:53:40 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:53:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:53:40 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 06:53:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 06:53:41 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 06:53:41 --> LOGGER TEST ERROR - 06:53:41
DEBUG - 2026-02-23 06:53:41 --> LOGGER TEST DEBUG - 06:53:41
INFO - 2026-02-23 06:53:41 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 06:53:41 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 06:57:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:57:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 06:57:11 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 07:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 07:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 07:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 07:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 07:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 07:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 07:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 07:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 07:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 07:22:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:22:15 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 07:22:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:22:16 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 07:22:16 --> LOGGER TEST ERROR - 07:22:16
DEBUG - 2026-02-23 07:22:16 --> LOGGER TEST DEBUG - 07:22:16
INFO - 2026-02-23 07:22:16 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 07:22:16 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 07:27:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:27:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 07:27:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:27:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 07:27:39 --> LOGGER TEST ERROR - 07:27:39
DEBUG - 2026-02-23 07:27:39 --> LOGGER TEST DEBUG - 07:27:39
INFO - 2026-02-23 07:27:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 07:27:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 07:29:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:29:49 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 07:29:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:29:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 07:29:50 --> LOGGER TEST ERROR - 07:29:50
DEBUG - 2026-02-23 07:29:50 --> LOGGER TEST DEBUG - 07:29:50
INFO - 2026-02-23 07:29:50 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 07:29:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 07:30:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 07:30:00 --> CSRF token verified.
DEBUG - 2026-02-23 07:30:00 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 07:30:00 --> [REGISTRATION] Submission received
INFO - 2026-02-23 07:30:00 --> MailService queued email
INFO - 2026-02-23 07:30:00 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 07:30:00 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 07:30:00 --> Registration created user_id=11668, email=u.ru.lof.e.bex62.7@gmail.com, username=WUddIavKNOcGNfqtduAXatzk, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 07:30:00 --> [REGISTRATION] User record created
INFO - 2026-02-23 07:30:00 --> OnboardingProgressService: created onboarding record for user_id=11668
INFO - 2026-02-23 07:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 07:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 07:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 07:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 07:30:01 --> Registration succeeded for u.ru.lof.e.bex62.7@gmail.com (event 00f84462686470df)
INFO - 2026-02-23 07:30:01 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 07:30:01 --> Registration redirecting to success guide for user_id=11668
DEBUG - 2026-02-23 07:30:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:02 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 07:30:02 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 07:30:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:14 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 07:30:14 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:30:14 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 07:30:14 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 07:30:14 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 07:30:14 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 07:30:15 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 07:30:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:20 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:30:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 07:30:32 --> CSRF token verified.
DEBUG - 2026-02-23 07:30:32 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 07:30:32 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 07:30:32 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 07:30:32 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 185.220.101.4, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 07:30:32 --> Auth attemptLogin() called with login identifier: u.ru.lof.e.bex62.7@gmail.com, remember: true
DEBUG - 2026-02-23 07:30:32 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Registering-An-Account
DEBUG - 2026-02-23 07:30:32 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 07:30:32 --> Auth attempt failed for identifier u.ru.lof.e.bex62.7@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-23 07:30:32 --> [AUTH] Login failure
WARNING - 2026-02-23 07:30:32 --> [AUTH] Login failed
DEBUG - 2026-02-23 07:30:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:32 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:30:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:47 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:30:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:30:52 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 07:30:52 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 07:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 07:30:52 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 07:30:52 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 07:30:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 07:30:55 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 07:30:55 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 07:31:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 07:31:01 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 07:31:01 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 07:31:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:06 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:31:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:25 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:31:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:36 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:31:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 07:31:45 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 07:31:45 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-23 07:31:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:31:49 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:00 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:07 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:16 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:27 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 07:32:40 --> CSRF token verified.
DEBUG - 2026-02-23 07:32:40 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 07:32:40 --> [AUTH] Password reset requested
INFO - 2026-02-23 07:32:41 --> [AUTH] Password reset email sent
DEBUG - 2026-02-23 07:32:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:41 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 07:32:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:32:55 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 07:32:55 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:32:55 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 07:32:55 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 07:32:55 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 07:32:55 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 07:32:55 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 07:33:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:33:00 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 07:33:00 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 07:33:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 07:33:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 07:33:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 07:33:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 07:33:06 --> LOGGER TEST ERROR - 07:33:06
DEBUG - 2026-02-23 07:33:06 --> LOGGER TEST DEBUG - 07:33:06
INFO - 2026-02-23 07:33:06 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 07:33:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 07:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 07:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 07:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 07:45:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 08:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-23 08:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 08:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 08:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 08:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 08:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 08:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 08:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 08:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 08:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 08:00:03 --> LOG_HEALTHCHECK debug marker=8c4fbed62a0d
INFO - 2026-02-23 08:00:03 --> LOG_HEALTHCHECK info marker=8c4fbed62a0d
NOTICE - 2026-02-23 08:00:03 --> LOG_HEALTHCHECK probe marker=8c4fbed62a0d
INFO - 2026-02-23 08:00:03 --> [spark:app:healthcheck] Completed
INFO - 2026-02-23 08:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 08:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 08:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 08:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 08:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:15:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:15:24 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 08:15:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 08:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 08:15:24 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 08:15:24 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 08:15:25 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 08:16:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:16:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:16:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:16:38 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 08:16:38 --> LOGGER TEST ERROR - 08:16:38
DEBUG - 2026-02-23 08:16:38 --> LOGGER TEST DEBUG - 08:16:38
INFO - 2026-02-23 08:16:38 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 08:16:38 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 08:23:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:02 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:02 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:02 --> LOGGER TEST ERROR - 08:23:02
DEBUG - 2026-02-23 08:23:02 --> LOGGER TEST DEBUG - 08:23:02
INFO - 2026-02-23 08:23:02 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 08:23:02 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:18 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:19 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:19 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:19 --> LOGGER TEST ERROR - 08:23:19
DEBUG - 2026-02-23 08:23:19 --> LOGGER TEST DEBUG - 08:23:19
INFO - 2026-02-23 08:23:19 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:19 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:46 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:47 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:47 --> LOGGER TEST ERROR - 08:23:47
DEBUG - 2026-02-23 08:23:47 --> LOGGER TEST DEBUG - 08:23:47
INFO - 2026-02-23 08:23:47 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:47 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:48 --> LOGGER TEST ERROR - 08:23:48
DEBUG - 2026-02-23 08:23:48 --> LOGGER TEST DEBUG - 08:23:48
INFO - 2026-02-23 08:23:48 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:48 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:48 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:48 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:48 --> LOGGER TEST ERROR - 08:23:48
DEBUG - 2026-02-23 08:23:48 --> LOGGER TEST DEBUG - 08:23:48
INFO - 2026-02-23 08:23:49 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:49 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:50 --> LOGGER TEST ERROR - 08:23:50
DEBUG - 2026-02-23 08:23:50 --> LOGGER TEST DEBUG - 08:23:50
INFO - 2026-02-23 08:23:50 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:50 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:50 --> LOGGER TEST ERROR - 08:23:50
DEBUG - 2026-02-23 08:23:50 --> LOGGER TEST DEBUG - 08:23:50
INFO - 2026-02-23 08:23:50 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:23:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:23:51 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:23:51 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:23:51 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:23:51 --> LOGGER TEST ERROR - 08:23:51
DEBUG - 2026-02-23 08:23:51 --> LOGGER TEST DEBUG - 08:23:51
INFO - 2026-02-23 08:23:51 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 08:23:51 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:24:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:24:27 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:24:27 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:24:27 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:24:27 --> LOGGER TEST ERROR - 08:24:27
DEBUG - 2026-02-23 08:24:27 --> LOGGER TEST DEBUG - 08:24:27
INFO - 2026-02-23 08:24:27 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 08:24:27 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 08:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 08:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 08:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 08:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 08:30:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:30:49 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:30:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:30:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 08:30:49 --> LOGGER TEST ERROR - 08:30:49
DEBUG - 2026-02-23 08:30:49 --> LOGGER TEST DEBUG - 08:30:49
INFO - 2026-02-23 08:30:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 08:30:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 08:37:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 08:37:16 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 08:37:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 08:37:16 --> [MetaService] slug=getting-started pageName= cacheHit= path=DB
INFO - 2026-02-23 08:37:16 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 08:37:16 --> [MetaService] slug=getting-started pageName=Getting Started cacheHit= path=DB
INFO - 2026-02-23 08:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 08:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 08:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 08:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 08:53:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 08:53:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Advanced-Investment-Portfoio-Manager]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 08:53:36 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
INFO - 2026-02-23 09:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 09:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 09:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 09:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 09:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 09:07:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 09:07:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 09:07:54 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 09:12:14 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 09:12:14 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 09:12:14 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
INFO - 2026-02-23 09:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 09:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 09:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 09:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 09:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 09:17:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 09:17:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 09:17:58 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 09:26:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 09:26:11 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 09:26:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 09:26:12 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 09:26:12 --> LOGGER TEST ERROR - 09:26:12
DEBUG - 2026-02-23 09:26:12 --> LOGGER TEST DEBUG - 09:26:12
INFO - 2026-02-23 09:26:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 09:26:12 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 09:30:02 --> [spark:ops:work] Started
INFO - 2026-02-23 09:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 09:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 09:30:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 09:34:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 09:34:25 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 09:34:25 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
INFO - 2026-02-23 09:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 09:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 09:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 09:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 10:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 10:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-23 10:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 10:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 10:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 10:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 10:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 10:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 10:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 10:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 10:00:03 --> LOG_HEALTHCHECK debug marker=6cd348b8e3c3
INFO - 2026-02-23 10:00:03 --> LOG_HEALTHCHECK info marker=6cd348b8e3c3
NOTICE - 2026-02-23 10:00:03 --> LOG_HEALTHCHECK probe marker=6cd348b8e3c3
INFO - 2026-02-23 10:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 10:02:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:02:07 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 10:02:07 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 10:03:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:03:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:03:30 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 10:04:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:04:24 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 10:04:24 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 10:04:25 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-23 10:04:25 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 10:04:25 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-23 10:09:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:09:47 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 10:09:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 10:09:47 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 10:09:47 --> LOGGER TEST ERROR - 10:09:47
DEBUG - 2026-02-23 10:09:47 --> LOGGER TEST DEBUG - 10:09:47
INFO - 2026-02-23 10:09:47 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 10:09:47 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 10:14:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:14:34 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 10:14:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 10:14:34 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 10:14:34 --> LOGGER TEST ERROR - 10:14:34
DEBUG - 2026-02-23 10:14:34 --> LOGGER TEST DEBUG - 10:14:34
INFO - 2026-02-23 10:14:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 10:14:34 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 10:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 10:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 10:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 10:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 10:15:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 10:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 10:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 10:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 10:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 10:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 10:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 10:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 10:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 10:46:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 10:46:46 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 10:46:46 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-23 10:55:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 10:55:42 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 11:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 11:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 11:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 11:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 11:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 11:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 11:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 11:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 11:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 11:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:25:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:25:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:25:46 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 11:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 11:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 11:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 11:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 11:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 11:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 11:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 11:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 11:54:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:54:20 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 11:55:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:55:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 11:55:50 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 12:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-23 12:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 12:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 12:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 12:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 12:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 12:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 12:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 12:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 12:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 12:00:04 --> LOG_HEALTHCHECK debug marker=16c34e64e383
INFO - 2026-02-23 12:00:04 --> LOG_HEALTHCHECK info marker=16c34e64e383
NOTICE - 2026-02-23 12:00:04 --> LOG_HEALTHCHECK probe marker=16c34e64e383
INFO - 2026-02-23 12:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 12:03:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:03:32 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 12:03:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 12:03:32 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 12:03:32 --> LOGGER TEST ERROR - 12:03:32
DEBUG - 2026-02-23 12:03:32 --> LOGGER TEST DEBUG - 12:03:32
INFO - 2026-02-23 12:03:32 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 12:03:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 12:10:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:10:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:10:54 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 12:12:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:12:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:12:12 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 12:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 12:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 12:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 12:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 12:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 12:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 12:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 12:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 12:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 12:41:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 12:41:04 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 12:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 12:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 12:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 12:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 13:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 13:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 13:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 13:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 13:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 13:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 13:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 13:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 13:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 13:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:20:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:20:58 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 13:20:58 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:20:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 13:20:59 --> LOGGER TEST ERROR - 13:20:59
DEBUG - 2026-02-23 13:20:59 --> LOGGER TEST DEBUG - 13:20:59
INFO - 2026-02-23 13:20:59 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 13:20:59 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 13:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 13:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 13:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 13:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 13:36:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:36:16 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 13:36:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:36:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 13:36:17 --> LOGGER TEST ERROR - 13:36:17
DEBUG - 2026-02-23 13:36:17 --> LOGGER TEST DEBUG - 13:36:17
INFO - 2026-02-23 13:36:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 13:36:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 13:39:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:39:48 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 13:39:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:39:49 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 13:39:49 --> LOGGER TEST ERROR - 13:39:49
DEBUG - 2026-02-23 13:39:49 --> LOGGER TEST DEBUG - 13:39:49
INFO - 2026-02-23 13:39:49 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 13:39:49 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 13:39:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 13:39:55 --> CSRF token verified.
DEBUG - 2026-02-23 13:39:55 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 13:39:55 --> [REGISTRATION] Submission received
INFO - 2026-02-23 13:39:55 --> MailService queued email
INFO - 2026-02-23 13:39:55 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 13:39:55 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 13:39:55 --> Registration created user_id=11669, email=h.e.rr.er.a2.3.a.ng.el@gmail.com, username=QrJnFFckMzKtMVmxKrxdK, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 13:39:55 --> [REGISTRATION] User record created
INFO - 2026-02-23 13:39:55 --> OnboardingProgressService: created onboarding record for user_id=11669
INFO - 2026-02-23 13:39:58 --> Registration succeeded for h.e.rr.er.a2.3.a.ng.el@gmail.com (event baefd5e53493f542)
INFO - 2026-02-23 13:39:58 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 13:39:58 --> Registration redirecting to success guide for user_id=11669
DEBUG - 2026-02-23 13:39:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:39:58 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 13:39:58 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 13:40:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:09 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 13:40:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:40:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:40:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 13:40:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 13:40:09 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 13:40:11 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 13:40:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:16 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 13:40:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:40:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:40:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 13:40:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 13:40:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:40:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:23 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:40:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 13:40:31 --> CSRF token verified.
DEBUG - 2026-02-23 13:40:31 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 13:40:31 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 13:40:31 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 13:40:31 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 45.80.158.249, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 13:40:31 --> Auth attemptLogin() called with login identifier: h.e.rr.er.a2.3.a.ng.el@gmail.com, remember: false
DEBUG - 2026-02-23 13:40:31 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-23 13:40:31 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 13:40:31 --> Auth attempt failed for identifier h.e.rr.er.a2.3.a.ng.el@gmail.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-23 13:40:31 --> [AUTH] Login failure
WARNING - 2026-02-23 13:40:31 --> [AUTH] Login failed
DEBUG - 2026-02-23 13:40:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:32 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:40:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:40:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:40:56 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:04 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:15 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:24 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:24 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:32 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:41:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 13:41:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 13:41:42 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 13:41:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:41:47 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:42:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:01 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:42:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:11 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 13:42:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 13:42:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 13:42:23 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-23 13:42:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 13:42:27 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 13:42:27 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 13:42:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:32 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 13:42:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:42:32 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:42:32 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 13:42:32 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 13:42:32 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 13:42:32 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 13:42:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 13:42:38 --> CSRF token verified.
DEBUG - 2026-02-23 13:42:38 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 13:42:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 13:42:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 13:42:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 13:42:38 --> [SUPPORT] Account help requested
INFO - 2026-02-23 13:42:39 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-23 13:42:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:39 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 13:42:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 13:42:39 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 13:42:39 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 13:42:39 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 13:42:39 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 13:42:39 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 13:42:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:42:53 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 13:42:53 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 13:42:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:43:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:43:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 13:43:03 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 13:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 13:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 13:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 13:45:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 14:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 14:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 14:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 14:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-23 14:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 14:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 14:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 14:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 14:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 14:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 14:00:04 --> LOG_HEALTHCHECK debug marker=bfaecd1432d7
INFO - 2026-02-23 14:00:04 --> LOG_HEALTHCHECK info marker=bfaecd1432d7
NOTICE - 2026-02-23 14:00:04 --> LOG_HEALTHCHECK probe marker=bfaecd1432d7
INFO - 2026-02-23 14:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 14:03:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:03:46 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:03:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:03:46 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 14:03:46 --> LOGGER TEST ERROR - 14:03:46
DEBUG - 2026-02-23 14:03:46 --> LOGGER TEST DEBUG - 14:03:46
INFO - 2026-02-23 14:03:46 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:03:46 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 14:08:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:08:29 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:08:29 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:08:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 14:08:30 --> LOGGER TEST ERROR - 14:08:30
DEBUG - 2026-02-23 14:08:30 --> LOGGER TEST DEBUG - 14:08:30
INFO - 2026-02-23 14:08:30 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:08:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 14:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 14:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 14:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 14:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 14:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 14:21:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:21:07 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:21:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:21:08 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 14:21:08 --> LOGGER TEST ERROR - 14:21:08
DEBUG - 2026-02-23 14:21:08 --> LOGGER TEST DEBUG - 14:21:08
INFO - 2026-02-23 14:21:08 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:21:08 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 14:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 14:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 14:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 14:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 14:36:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:36:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:36:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:36:39 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 14:36:39 --> LOGGER TEST ERROR - 14:36:39
DEBUG - 2026-02-23 14:36:39 --> LOGGER TEST DEBUG - 14:36:39
INFO - 2026-02-23 14:36:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:36:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 14:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 14:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 14:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 14:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 14:49:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:49:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:49:34 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 14:53:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:53:54 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:53:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:53:54 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 14:53:54 --> LOGGER TEST ERROR - 14:53:54
DEBUG - 2026-02-23 14:53:54 --> LOGGER TEST DEBUG - 14:53:54
INFO - 2026-02-23 14:53:54 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:53:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 14:59:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:59:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:39 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 14:59:39 --> LOGGER TEST ERROR - 14:59:39
DEBUG - 2026-02-23 14:59:39 --> LOGGER TEST DEBUG - 14:59:39
INFO - 2026-02-23 14:59:39 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:59:39 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 14:59:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 14:59:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 14:59:40 --> LOGGER TEST ERROR - 14:59:40
DEBUG - 2026-02-23 14:59:40 --> LOGGER TEST DEBUG - 14:59:40
INFO - 2026-02-23 14:59:40 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 14:59:40 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 14:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:40 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:41 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-23 14:59:41 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 14:59:41 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
DEBUG - 2026-02-23 14:59:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:41 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:41 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:41 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:41 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:41 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:42 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:42 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:42 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:42 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:42 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:43 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:59:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:43 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:43 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:43 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:43 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:43 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:43 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:44 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 14:59:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:44 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:44 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:44 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:44 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:44 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:44 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:45 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 14:59:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:46 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:46 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:46 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:46 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:46 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:46 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:47 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 14:59:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:47 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:48 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 14:59:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:48 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 14:59:48 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 14:59:48 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 14:59:48 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 14:59:48 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 14:59:48 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 14:59:49 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 14:59:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 14:59:49 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 14:59:49 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-23 14:59:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 14:59:49 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Terms-And-Conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 14:59:49 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions | referrer: none
DEBUG - 2026-02-23 14:59:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 14:59:50 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 15:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 15:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 15:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 15:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 15:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 15:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 15:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 15:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 15:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 15:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:19:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:19:08 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:19:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:19:09 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 15:19:09 --> LOGGER TEST ERROR - 15:19:09
DEBUG - 2026-02-23 15:19:09 --> LOGGER TEST DEBUG - 15:19:09
INFO - 2026-02-23 15:19:09 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 15:19:09 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 15:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 15:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 15:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 15:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 15:34:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:34:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:34:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:34:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 15:34:57 --> LOGGER TEST ERROR - 15:34:57
DEBUG - 2026-02-23 15:34:57 --> LOGGER TEST DEBUG - 15:34:57
INFO - 2026-02-23 15:34:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 15:34:57 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 15:35:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:35:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:35:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:35:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 15:35:05 --> LOGGER TEST ERROR - 15:35:05
DEBUG - 2026-02-23 15:35:05 --> LOGGER TEST DEBUG - 15:35:05
INFO - 2026-02-23 15:35:05 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 15:35:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 15:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 15:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 15:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 15:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 15:51:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:51:30 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:51:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:51:31 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 15:51:31 --> LOGGER TEST ERROR - 15:51:31
DEBUG - 2026-02-23 15:51:31 --> LOGGER TEST DEBUG - 15:51:31
INFO - 2026-02-23 15:51:31 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 15:51:31 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 15:53:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:53:59 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:53:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:53:59 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 15:53:59 --> LOGGER TEST ERROR - 15:53:59
DEBUG - 2026-02-23 15:53:59 --> LOGGER TEST DEBUG - 15:53:59
INFO - 2026-02-23 15:53:59 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 15:53:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 15:54:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 15:54:10 --> CSRF token verified.
DEBUG - 2026-02-23 15:54:10 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 15:54:10 --> [REGISTRATION] Submission received
INFO - 2026-02-23 15:54:10 --> MailService queued email
INFO - 2026-02-23 15:54:10 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 15:54:10 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 15:54:10 --> Registration created user_id=11670, email=levine.jay@att.net, username=PHNdOAGJSGtqUATsKF, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 15:54:10 --> [REGISTRATION] User record created
INFO - 2026-02-23 15:54:10 --> OnboardingProgressService: created onboarding record for user_id=11670
INFO - 2026-02-23 15:54:11 --> Registration succeeded for levine.jay@att.net (event 02963e597c4cf13c)
INFO - 2026-02-23 15:54:11 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 15:54:11 --> Registration redirecting to success guide for user_id=11670
DEBUG - 2026-02-23 15:54:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:54:12 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 15:54:12 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 15:54:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 15:54:29 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 15:54:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 15:54:30 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 15:54:30 --> LOGGER TEST ERROR - 15:54:30
DEBUG - 2026-02-23 15:54:30 --> LOGGER TEST DEBUG - 15:54:30
INFO - 2026-02-23 15:54:30 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 15:54:30 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 16:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 16:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 16:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 16:00:02 --> [spark:aiops:run] Intent
DEBUG - 2026-02-23 16:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 16:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 16:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 16:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 16:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 16:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 16:00:04 --> LOG_HEALTHCHECK debug marker=4b45ff9d1fd7
INFO - 2026-02-23 16:00:04 --> LOG_HEALTHCHECK info marker=4b45ff9d1fd7
NOTICE - 2026-02-23 16:00:04 --> LOG_HEALTHCHECK probe marker=4b45ff9d1fd7
INFO - 2026-02-23 16:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 16:04:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 16:04:54 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 16:04:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 16:04:54 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 16:04:54 --> LOGGER TEST ERROR - 16:04:54
DEBUG - 2026-02-23 16:04:54 --> LOGGER TEST DEBUG - 16:04:54
INFO - 2026-02-23 16:04:54 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 16:04:54 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 16:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 16:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 16:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 16:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 16:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 16:15:23 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 16:15:23 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 16:15:23 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 16:15:24 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 16:15:24 --> LOGGER TEST ERROR - 16:15:24
DEBUG - 2026-02-23 16:15:24 --> LOGGER TEST DEBUG - 16:15:24
INFO - 2026-02-23 16:15:24 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 16:15:24 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 16:18:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 16:18:47 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 16:18:47 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 16:19:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 16:19:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 16:19:53 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-23 16:26:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 16:26:07 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 16:26:07 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 16:27:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 16:27:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 16:27:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 16:27:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 16:27:38 --> LOGGER TEST ERROR - 16:27:38
DEBUG - 2026-02-23 16:27:38 --> LOGGER TEST DEBUG - 16:27:38
INFO - 2026-02-23 16:27:38 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 16:27:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 16:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 16:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 16:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 16:30:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 16:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 16:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 16:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 16:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 16:47:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 16:47:33 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 16:47:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 16:47:34 --> [MetaService] slug=apex/referral pageName= cacheHit= path=DB
ERROR - 2026-02-23 16:47:34 --> LOGGER TEST ERROR - 16:47:34
DEBUG - 2026-02-23 16:47:34 --> LOGGER TEST DEBUG - 16:47:34
INFO - 2026-02-23 16:47:34 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 16:47:34 --> [MetaService] slug=apex/referral pageName=Apex Referral cacheHit= path=DB
DEBUG - 2026-02-23 17:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 17:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 17:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 17:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 17:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 17:05:56 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:05:56 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 17:05:56 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:05:57 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 17:05:57 --> LOGGER TEST ERROR - 17:05:57
DEBUG - 2026-02-23 17:05:57 --> LOGGER TEST DEBUG - 17:05:57
INFO - 2026-02-23 17:05:57 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 17:05:57 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 17:11:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:11:00 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 17:11:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:11:01 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 17:11:01 --> LOGGER TEST ERROR - 17:11:01
DEBUG - 2026-02-23 17:11:01 --> LOGGER TEST DEBUG - 17:11:01
INFO - 2026-02-23 17:11:01 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 17:11:01 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 17:11:47 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:11:47 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 17:11:47 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:11:47 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:11:47 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:11:47 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:11:47 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:11:47 --> themesMemory usage: 6291456
INFO - 2026-02-23 17:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 17:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 17:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 17:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 17:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 17:27:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:27:27 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 17:27:28 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:27:28 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 17:27:28 --> LOGGER TEST ERROR - 17:27:28
DEBUG - 2026-02-23 17:27:28 --> LOGGER TEST DEBUG - 17:27:28
INFO - 2026-02-23 17:27:28 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 17:27:28 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 17:27:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:27:40 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-23 17:27:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:27:40 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:27:40 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:27:40 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:27:40 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:27:40 --> themesMemory usage: 6291456
INFO - 2026-02-23 17:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 17:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 17:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 17:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 17:37:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:37:37 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 17:37:37 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:37:38 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 17:37:38 --> LOGGER TEST ERROR - 17:37:38
DEBUG - 2026-02-23 17:37:38 --> LOGGER TEST DEBUG - 17:37:38
INFO - 2026-02-23 17:37:38 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 17:37:38 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 17:37:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 17:37:43 --> CSRF token verified.
DEBUG - 2026-02-23 17:37:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 17:37:43 --> [REGISTRATION] Submission received
INFO - 2026-02-23 17:37:43 --> MailService queued email
INFO - 2026-02-23 17:37:44 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 17:37:44 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 17:37:44 --> Registration created user_id=11671, email=contact@tysons-dental.com, username=sUTXCoUiSvskCiJhLOzCsYgw, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 17:37:44 --> [REGISTRATION] User record created
INFO - 2026-02-23 17:37:44 --> OnboardingProgressService: created onboarding record for user_id=11671
INFO - 2026-02-23 17:37:45 --> Registration succeeded for contact@tysons-dental.com (event c57977032fb00302)
INFO - 2026-02-23 17:37:45 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 17:37:45 --> Registration redirecting to success guide for user_id=11671
DEBUG - 2026-02-23 17:37:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:37:45 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 17:37:45 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 17:37:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:37:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:37:59 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:38:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 17:38:07 --> CSRF token verified.
DEBUG - 2026-02-23 17:38:07 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 17:38:07 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 17:38:07 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 17:38:07 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 124.198.132.52, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 17:38:07 --> Auth attemptLogin() called with login identifier: contact@tysons-dental.com, remember: false
DEBUG - 2026-02-23 17:38:07 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-23 17:38:07 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 17:38:07 --> Auth attempt failed for identifier contact@tysons-dental.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-23 17:38:07 --> [AUTH] Login failure
WARNING - 2026-02-23 17:38:07 --> [AUTH] Login failed
DEBUG - 2026-02-23 17:38:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:38:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:38:22 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:38:22 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 17:38:22 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:38:22 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:38:22 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:38:22 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:38:22 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:38:23 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 17:38:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:38:45 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:38:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:38:57 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 17:38:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:38:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:38:57 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:38:57 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:38:57 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:39:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:07 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 17:39:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:39:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:39:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:39:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:39:07 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:39:07 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 17:39:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 17:39:15 --> CSRF token verified.
DEBUG - 2026-02-23 17:39:15 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 17:39:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:39:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:39:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:39:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:39:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:39:15 --> [SUPPORT] Account help requested
INFO - 2026-02-23 17:39:16 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-23 17:39:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:16 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 17:39:16 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 17:39:16 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 17:39:16 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 17:39:16 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 17:39:16 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 17:39:16 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 17:39:28 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 17:39:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 17:39:33 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-23 17:39:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:38 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:39:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:50 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:39:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:39:57 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:06 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:17 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:24 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 17:40:24 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 17:40:24 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 17:40:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:29 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:29 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:39 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:40:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 17:40:58 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 17:40:58 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 17:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:41:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 17:41:02 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 17:41:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 17:41:11 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 17:41:11 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
INFO - 2026-02-23 17:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 17:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 17:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 17:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 18:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-23 18:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 18:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 18:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 18:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 18:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 18:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 18:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 18:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 18:00:03 --> LOG_HEALTHCHECK debug marker=f4f8672b8e6f
INFO - 2026-02-23 18:00:03 --> LOG_HEALTHCHECK info marker=f4f8672b8e6f
NOTICE - 2026-02-23 18:00:03 --> LOG_HEALTHCHECK probe marker=f4f8672b8e6f
INFO - 2026-02-23 18:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 18:04:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:04:35 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:04:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:04:36 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 18:04:36 --> LOGGER TEST ERROR - 18:04:36
DEBUG - 2026-02-23 18:04:36 --> LOGGER TEST DEBUG - 18:04:36
INFO - 2026-02-23 18:04:36 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 18:04:36 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 18:07:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:07:39 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:07:39 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:07:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 18:07:40 --> LOGGER TEST ERROR - 18:07:40
DEBUG - 2026-02-23 18:07:40 --> LOGGER TEST DEBUG - 18:07:40
INFO - 2026-02-23 18:07:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 18:07:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 18:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 18:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 18:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 18:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 18:29:17 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:29:17 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:29:17 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:29:17 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 18:29:17 --> LOGGER TEST ERROR - 18:29:17
DEBUG - 2026-02-23 18:29:17 --> LOGGER TEST DEBUG - 18:29:17
INFO - 2026-02-23 18:29:17 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 18:29:17 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 18:29:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:29:26 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:29:26 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:29:26 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 18:29:26 --> LOGGER TEST ERROR - 18:29:26
DEBUG - 2026-02-23 18:29:26 --> LOGGER TEST DEBUG - 18:29:26
INFO - 2026-02-23 18:29:26 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 18:29:26 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 18:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 18:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 18:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 18:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 18:39:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:39:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:39:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 18:39:06 --> LOGGER TEST ERROR - 18:39:06
DEBUG - 2026-02-23 18:39:06 --> LOGGER TEST DEBUG - 18:39:06
INFO - 2026-02-23 18:39:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 18:39:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 18:39:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:39:15 --> CSRF token verified.
DEBUG - 2026-02-23 18:39:15 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 18:39:15 --> [REGISTRATION] Submission received
INFO - 2026-02-23 18:39:15 --> MailService queued email
INFO - 2026-02-23 18:39:15 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 18:39:15 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 18:39:15 --> Registration created user_id=11672, email=steve@kellercars.com, username=JUvjYdEkbdqZygdgK, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 18:39:15 --> [REGISTRATION] User record created
INFO - 2026-02-23 18:39:15 --> OnboardingProgressService: created onboarding record for user_id=11672
INFO - 2026-02-23 18:39:16 --> Registration succeeded for steve@kellercars.com (event 7dd1013b6a1ef92c)
INFO - 2026-02-23 18:39:16 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 18:39:16 --> Registration redirecting to success guide for user_id=11672
DEBUG - 2026-02-23 18:39:16 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:16 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 18:39:16 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 18:39:30 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:30 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 18:39:30 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:39:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:39:30 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 18:39:30 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 18:39:30 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:39:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:35 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 18:39:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 18:39:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 18:39:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 18:39:36 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 18:39:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:40 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:39:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:39:50 --> CSRF token verified.
DEBUG - 2026-02-23 18:39:50 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 18:39:50 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 18:39:50 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 18:39:50 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 107.189.30.86, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 18:39:50 --> Auth attemptLogin() called with login identifier: steve@kellercars.com, remember: false
DEBUG - 2026-02-23 18:39:50 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-23 18:39:50 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 18:39:50 --> Auth attempt failed for identifier steve@kellercars.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-23 18:39:50 --> [AUTH] Login failure
WARNING - 2026-02-23 18:39:50 --> [AUTH] Login failed
DEBUG - 2026-02-23 18:39:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:39:54 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:40:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:04 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:40:15 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:15 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 18:40:15 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 18:40:15 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 18:40:15 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 18:40:15 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 18:40:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:40:33 --> CSRF token verified.
DEBUG - 2026-02-23 18:40:33 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 18:40:33 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:40:33 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:40:33 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 18:40:33 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 18:40:33 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 18:40:33 --> [SUPPORT] Account help requested
INFO - 2026-02-23 18:40:34 --> [SUPPORT] Account help outcome
DEBUG - 2026-02-23 18:40:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:34 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 18:40:34 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:40:34 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 18:40:34 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 18:40:34 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 18:40:34 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 18:40:34 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 18:40:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:38 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 18:40:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 18:40:38 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-23 18:40:38 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 18:40:38 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-23 18:40:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:51 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 18:40:51 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 18:40:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:40:58 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:41:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:10 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:41:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 18:41:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 18:41:21 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 18:41:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:26 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:41:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 18:41:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 18:41:42 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 18:41:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:44 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:41:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 18:41:53 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 18:42:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 18:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 18:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 18:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 18:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 19:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 19:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 19:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 19:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 19:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 19:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 19:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 19:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 19:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 19:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 19:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 19:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 19:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 19:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 19:41:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 19:41:46 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 19:41:46 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: http://mymiwallet.com/
INFO - 2026-02-23 19:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 19:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 19:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 19:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 19:59:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 19:59:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Due-Diligence-Database]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 19:59:21 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database | referrer: https://www.mymiwallet.com/index.php/How-It-Works/MyMI-Gold
DEBUG - 2026-02-23 20:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 20:00:01 --> [spark:aiops:run] Intent
INFO - 2026-02-23 20:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 20:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 20:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 20:00:01 --> [spark:ops:work] Completed
INFO - 2026-02-23 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 20:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 20:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 20:00:03 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 20:00:03 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 20:00:03 --> LOG_HEALTHCHECK debug marker=fab3df9bafff
INFO - 2026-02-23 20:00:03 --> LOG_HEALTHCHECK info marker=fab3df9bafff
NOTICE - 2026-02-23 20:00:03 --> LOG_HEALTHCHECK probe marker=fab3df9bafff
INFO - 2026-02-23 20:00:03 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 20:04:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:04:06 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:04:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:04:07 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 20:04:07 --> LOGGER TEST ERROR - 20:04:07
DEBUG - 2026-02-23 20:04:07 --> LOGGER TEST DEBUG - 20:04:07
INFO - 2026-02-23 20:04:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:04:07 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 20:04:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:04:07 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:04:07 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:04:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:04:07 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:04:07 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:04:07 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:04:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:04:08 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:04:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:04:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:04:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:04:08 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:04:08 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:04:08 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:04:08 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:04:09 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:14:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:14:11 --> App\Modules\Support\Controllers\SupportController initController executed
DEBUG - 2026-02-23 20:14:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:14:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:14:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:14:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:14:11 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:14:11 --> themesMemory usage: 6291456
DEBUG - 2026-02-23 20:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 20:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 20:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 20:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 20:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 20:22:53 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:22:53 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:22:53 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:22:53 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 20:22:53 --> LOGGER TEST ERROR - 20:22:53
DEBUG - 2026-02-23 20:22:53 --> LOGGER TEST DEBUG - 20:22:53
INFO - 2026-02-23 20:22:53 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:22:53 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 20:27:35 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:27:35 --> App\Modules\Blog\Controllers\PersonalBudgetingController initController executed
DEBUG - 2026-02-23 20:27:35 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:27:35 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:27:35 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:27:35 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:27:35 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:27:36 --> themesMemory usage: 14680064
DEBUG - 2026-02-23 20:27:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:27:36 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:27:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:27:37 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 20:27:37 --> LOGGER TEST ERROR - 20:27:37
DEBUG - 2026-02-23 20:27:37 --> LOGGER TEST DEBUG - 20:27:37
INFO - 2026-02-23 20:27:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 20:27:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 20:27:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 20:27:43 --> CSRF token verified.
DEBUG - 2026-02-23 20:27:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:27:43 --> [REGISTRATION] Submission received
INFO - 2026-02-23 20:27:43 --> MailService queued email
INFO - 2026-02-23 20:27:43 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 20:27:43 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 20:27:43 --> Registration created user_id=11673, email=stacy.l.hensley@imegcorp.com, username=EAwcaAPCYRPpklHunZPt, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 20:27:43 --> [REGISTRATION] User record created
INFO - 2026-02-23 20:27:43 --> OnboardingProgressService: created onboarding record for user_id=11673
INFO - 2026-02-23 20:27:44 --> Registration succeeded for stacy.l.hensley@imegcorp.com (event 00836fea818ba74a)
INFO - 2026-02-23 20:27:44 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 20:27:44 --> Registration redirecting to success guide for user_id=11673
DEBUG - 2026-02-23 20:27:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:27:45 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:27:45 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 20:28:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:00 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:28:00 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:28:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:28:00 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:28:00 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:28:00 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:28:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:03 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:28:04 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:04 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:28:04 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:28:05 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 20:28:05 --> LOGGER TEST ERROR - 20:28:05
DEBUG - 2026-02-23 20:28:05 --> LOGGER TEST DEBUG - 20:28:05
INFO - 2026-02-23 20:28:05 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 20:28:05 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 20:28:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:05 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:28:05 --> [ACTIVATION] Activation link hit
ERROR - 2026-02-23 20:28:05 --> [ACTIVATION] Activation failed: user not found
DEBUG - 2026-02-23 20:28:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:05 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 20:28:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:28:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:28:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:28:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:28:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:28:05 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 20:28:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:06 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:28:06 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:28:06 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:28:06 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:28:06 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:28:06 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:28:07 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:28:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:11 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:21 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:28:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 20:28:25 --> CSRF token verified.
DEBUG - 2026-02-23 20:28:25 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:28:25 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 20:28:25 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 20:28:25 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 178.162.175.5, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 20:28:25 --> Auth attemptLogin() called with login identifier: stacy.l.hensley@imegcorp.com, remember: true
DEBUG - 2026-02-23 20:28:25 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-23 20:28:25 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 20:28:25 --> Auth attempt failed for identifier stacy.l.hensley@imegcorp.com. Error: Unable to log you in. Please check your password.
WARNING - 2026-02-23 20:28:25 --> [AUTH] Login failure
WARNING - 2026-02-23 20:28:25 --> [AUTH] Login failed
DEBUG - 2026-02-23 20:28:26 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:26 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:28:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:40 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:28:40 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 20:28:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 20:28:50 --> CSRF token verified.
DEBUG - 2026-02-23 20:28:50 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:28:50 --> [AUTH] Password reset requested
INFO - 2026-02-23 20:28:51 --> [AUTH] Password reset email sent
DEBUG - 2026-02-23 20:28:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:28:51 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:05 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 20:29:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:29:05 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:29:05 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:29:05 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:29:05 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:29:05 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 20:29:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:10 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:12 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:12 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:19 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:20 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:29:32 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:29:32 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 20:29:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:37 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:48 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:49 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:29:58 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:29:59 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 20:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 20:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 20:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 20:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 20:30:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:10 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:30:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:18 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:18 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:30:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:30:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:30:36 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 20:30:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:39 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:39 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 20:30:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:30:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:30:50 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-23 20:30:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:30:54 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 20:30:54 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:30:54 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 20:30:54 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 20:30:54 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 20:30:54 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 20:30:55 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:41:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:41:59 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:41:59 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:41:59 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 20:41:59 --> LOGGER TEST ERROR - 20:41:59
DEBUG - 2026-02-23 20:41:59 --> LOGGER TEST DEBUG - 20:41:59
INFO - 2026-02-23 20:41:59 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 20:41:59 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 20:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 20:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 20:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 20:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 20:45:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:45:49 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: HEAD, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:45:49 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 20:45:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 20:45:50 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 20:45:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 20:45:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:45:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: PROPFIND, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:45:50 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 20:45:50 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 20:45:50 --> LOGGER TEST ERROR - 20:45:50
DEBUG - 2026-02-23 20:45:50 --> LOGGER TEST DEBUG - 20:45:50
INFO - 2026-02-23 20:45:50 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 20:45:50 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 20:45:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:45:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: PROPFIND, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:45:50 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
DEBUG - 2026-02-23 20:45:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 20:45:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: PUT, Route: /]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 20:45:51 --> 404 route miss: https://www.mymiwallet.com/index.php/ | referrer: none
INFO - 2026-02-23 21:00:01 --> [spark:ops:work] Started
INFO - 2026-02-23 21:00:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 21:00:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 21:00:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 21:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:36 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 21:00:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:00:37 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 21:00:37 --> LOGGER TEST ERROR - 21:00:37
DEBUG - 2026-02-23 21:00:37 --> LOGGER TEST DEBUG - 21:00:37
INFO - 2026-02-23 21:00:37 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 21:00:37 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 21:00:38 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:38 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 21:00:38 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:00:38 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 21:00:38 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 21:00:38 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 21:00:38 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 21:00:39 --> themesMemory usage: 12582912
DEBUG - 2026-02-23 21:00:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 21:00:40 --> CSRF token verified.
DEBUG - 2026-02-23 21:00:40 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 21:00:40 --> [REGISTRATION] Submission received
INFO - 2026-02-23 21:00:40 --> MailService queued email
INFO - 2026-02-23 21:00:40 --> [REGISTRATION] Validation passed (basic fields)
INFO - 2026-02-23 21:00:40 --> [REGISTRATION] Validation passed (password fields)
INFO - 2026-02-23 21:00:40 --> Registration created user_id=11674, email=allzionmail@gmail.com, username=BrianWrofs, active=, requiresActivation=1, loginIdentifier=username
INFO - 2026-02-23 21:00:40 --> [REGISTRATION] User record created
INFO - 2026-02-23 21:00:40 --> OnboardingProgressService: created onboarding record for user_id=11674
INFO - 2026-02-23 21:00:41 --> Registration succeeded for allzionmail@gmail.com (event 4843d7d6c5ab6aaf)
INFO - 2026-02-23 21:00:41 --> [REGISTRATION] Activation email queued
INFO - 2026-02-23 21:00:41 --> Registration redirecting to success guide for user_id=11674
DEBUG - 2026-02-23 21:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:42 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 21:00:42 --> AuthController::registerSuccess view rendered.
DEBUG - 2026-02-23 21:00:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:42 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 21:00:43 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 21:00:43 --> CSRF token verified.
DEBUG - 2026-02-23 21:00:43 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 21:00:43 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 21:00:43 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 21:00:43 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: false, ip: 188.233.10.123, ua: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5042.0 Safari/537.36
DEBUG - 2026-02-23 21:00:43 --> Auth attemptLogin() called with login identifier: BrianWrofs, remember: false
DEBUG - 2026-02-23 21:00:43 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/How-It-Works/Investment-Dashboard
DEBUG - 2026-02-23 21:00:43 --> Auth credentials normalised for attempt using key "username"
DEBUG - 2026-02-23 21:00:43 --> Auth attempt failed for identifier BrianWrofs. Error: This user account is not yet activated. <a href="https://www.mymiwallet.com/index.php/resend-activate-account?login=BrianWrofs">Resend activation message one more time.</a>
WARNING - 2026-02-23 21:00:43 --> [AUTH] Login failure
WARNING - 2026-02-23 21:00:43 --> [AUTH] Login failed
DEBUG - 2026-02-23 21:00:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:00:44 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 21:11:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:11:09 --> App\Modules\Blog\Controllers\PersonalBudgetingController initController executed
DEBUG - 2026-02-23 21:11:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:11:09 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 21:11:09 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 21:11:09 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 21:11:09 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 21:11:11 --> themesMemory usage: 14680064
DEBUG - 2026-02-23 21:12:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:12:37 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:12:37 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 21:14:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:14:40 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 21:14:40 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:14:40 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 21:14:40 --> LOGGER TEST ERROR - 21:14:40
DEBUG - 2026-02-23 21:14:40 --> LOGGER TEST DEBUG - 21:14:40
INFO - 2026-02-23 21:14:40 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 21:14:40 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 21:15:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 21:15:01 --> [spark:ops:work] Started
INFO - 2026-02-23 21:15:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 21:15:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 21:15:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 21:22:20 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:22:20 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 21:22:20 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:22:20 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 21:22:20 --> LOGGER TEST ERROR - 21:22:20
DEBUG - 2026-02-23 21:22:20 --> LOGGER TEST DEBUG - 21:22:20
INFO - 2026-02-23 21:22:20 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 21:22:20 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 21:30:02 --> [spark:ops:work] Started
INFO - 2026-02-23 21:30:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 21:30:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 21:30:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 21:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 21:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 21:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 21:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 21:49:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 21:49:36 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 21:49:36 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 21:49:36 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 21:49:36 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 21:49:36 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 21:49:36 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 21:49:37 --> themesMemory usage: 14680064
DEBUG - 2026-02-23 22:00:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 22:00:02 --> [spark:aiops:run] Intent
INFO - 2026-02-23 22:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 22:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 22:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 22:00:02 --> [spark:ops:work] Completed
INFO - 2026-02-23 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 22:00:03 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 22:00:03 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
INFO - 2026-02-23 22:00:04 --> [spark:app:healthcheck] Started
INFO - 2026-02-23 22:00:04 --> [spark:app:healthcheck] Intent
DEBUG - 2026-02-23 22:00:04 --> LOG_HEALTHCHECK debug marker=3666b04a20b8
INFO - 2026-02-23 22:00:04 --> LOG_HEALTHCHECK info marker=3666b04a20b8
NOTICE - 2026-02-23 22:00:04 --> LOG_HEALTHCHECK probe marker=3666b04a20b8
INFO - 2026-02-23 22:00:04 --> [spark:app:healthcheck] Completed
DEBUG - 2026-02-23 22:11:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:11:13 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:11:13 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:11:13 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 22:11:13 --> LOGGER TEST ERROR - 22:11:13
DEBUG - 2026-02-23 22:11:13 --> LOGGER TEST DEBUG - 22:11:13
INFO - 2026-02-23 22:11:13 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:11:13 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
INFO - 2026-02-23 22:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 22:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 22:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
DEBUG - 2026-02-23 22:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 22:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 22:19:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:19:32 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:19:32 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:19:32 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 22:19:32 --> LOGGER TEST ERROR - 22:19:32
DEBUG - 2026-02-23 22:19:32 --> LOGGER TEST DEBUG - 22:19:32
INFO - 2026-02-23 22:19:32 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:19:32 --> [MetaService] slug= pageName=Home cacheHit= path=DB
INFO - 2026-02-23 22:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 22:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 22:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 22:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 22:32:57 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:32:57 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:32:57 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:32:58 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 22:32:58 --> LOGGER TEST ERROR - 22:32:58
DEBUG - 2026-02-23 22:32:58 --> LOGGER TEST DEBUG - 22:32:58
INFO - 2026-02-23 22:32:58 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:32:58 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 22:33:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:33:02 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:33:02 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:33:03 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 22:33:03 --> LOGGER TEST ERROR - 22:33:03
DEBUG - 2026-02-23 22:33:03 --> LOGGER TEST DEBUG - 22:33:03
INFO - 2026-02-23 22:33:03 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 22:33:03 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 22:37:05 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:05 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:37:05 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:37:06 --> [MetaService] slug= pageName= cacheHit=1 path=CACHE
ERROR - 2026-02-23 22:37:06 --> LOGGER TEST ERROR - 22:37:06
DEBUG - 2026-02-23 22:37:06 --> LOGGER TEST DEBUG - 22:37:06
INFO - 2026-02-23 22:37:06 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:37:06 --> [MetaService] slug= pageName=Home cacheHit=1 path=CACHE
DEBUG - 2026-02-23 22:37:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:27 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:37:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 22:37:31 --> CSRF token verified.
DEBUG - 2026-02-23 22:37:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:32 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:37:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:45 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 22:37:45 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:37:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:37:45 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 22:37:45 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 22:37:45 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:37:50 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:50 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 22:37:50 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:37:50 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:37:50 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 22:37:50 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 22:37:50 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 22:37:51 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:37:55 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:37:55 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:38:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 22:38:07 --> CSRF token verified.
DEBUG - 2026-02-23 22:38:07 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 22:38:07 --> AuthController L93: Auth:attemptLogin started.
INFO - 2026-02-23 22:38:07 --> AuthController L104: Auth:attemptLogin rules: {"login":"required","password":"required"}
INFO - 2026-02-23 22:38:07 --> AuthController L132: Auth:attemptLogin Login Variables: login: required, remember: true, ip: 109.69.67.17, ua: "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36"
DEBUG - 2026-02-23 22:38:07 --> Auth attemptLogin() called with login identifier: dionm.i.k.e.l6.8@gmail.com, remember: true
DEBUG - 2026-02-23 22:38:07 --> Auth attemptLogin() called. redirect_url in session: https://www.mymiwallet.com/index.php/Free/register
DEBUG - 2026-02-23 22:38:07 --> Auth credentials normalised for attempt using key "email"
DEBUG - 2026-02-23 22:38:08 --> Auth attempt failed for identifier dionm.i.k.e.l6.8@gmail.com. Error: Unable to log you in. Please check your credentials.
WARNING - 2026-02-23 22:38:08 --> [AUTH] Login failure
WARNING - 2026-02-23 22:38:08 --> [AUTH] Login failed
DEBUG - 2026-02-23 22:38:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:08 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:38:21 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:27 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:27 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 22:38:27 --> [REGISTRATION] Form loaded
DEBUG - 2026-02-23 22:38:31 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:31 --> App\Modules\Support\Controllers\AccountSupportController initController executed
DEBUG - 2026-02-23 22:38:31 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:38:31 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:38:31 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 22:38:31 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 22:38:31 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 22:38:31 --> themesMemory usage: 4194304
DEBUG - 2026-02-23 22:38:36 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 22:38:36 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Investments/News]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 22:38:36 --> 404 route miss: https://www.mymiwallet.com/index.php/Investments/News | referrer: none
DEBUG - 2026-02-23 22:38:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 22:38:41 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Customer-Support]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 22:38:41 --> 404 route miss: https://www.mymiwallet.com/index.php/Customer-Support | referrer: none
DEBUG - 2026-02-23 22:38:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:46 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:46 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:38:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:38:52 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:01 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:01 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 22:39:08 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Profile]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 22:39:08 --> 404 route miss: https://www.mymiwallet.com/index.php/Profile | referrer: none
DEBUG - 2026-02-23 22:39:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:13 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:13 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:25 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:25 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:32 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:32 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:40 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:51 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:52 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:39:52 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 22:39:59 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:40:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:40:00 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 22:45:01 --> [spark:ops:work] Started
INFO - 2026-02-23 22:45:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 22:45:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 22:45:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 22:50:41 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 22:50:41 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Terms-And-Conditions]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 22:50:41 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Terms-And-Conditions | referrer: none
DEBUG - 2026-02-23 22:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:50:42 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:50:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:50:42 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 22:50:42 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 22:50:42 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Legal/Privacy-Policy]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 22:50:42 --> 404 route miss: https://www.mymiwallet.com/index.php/Legal/Privacy-Policy | referrer: none
DEBUG - 2026-02-23 22:50:42 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:50:42 --> [MetaService] slug=privacy-policy pageName= cacheHit= path=DB
INFO - 2026-02-23 22:50:42 --> themesMemory usage: 8388608
DEBUG - 2026-02-23 22:50:42 --> [MetaService] slug=privacy-policy pageName=Privacy Policy cacheHit= path=DB
DEBUG - 2026-02-23 22:50:43 --> [MetaService] slug=terms-of-service pageName= cacheHit= path=DB
INFO - 2026-02-23 22:50:43 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:50:43 --> [MetaService] slug=terms-of-service pageName=Terms of Service cacheHit= path=DB
DEBUG - 2026-02-23 22:53:03 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 22:53:03 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 22:53:03 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 22:53:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:53:03 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 22:53:03 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 22:53:03 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 22:53:04 --> [MetaService] slug=how-it-works pageName= cacheHit= path=DB
INFO - 2026-02-23 22:53:04 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 22:53:04 --> [MetaService] slug=how-it-works pageName= cacheHit=1 path=CACHE
INFO - 2026-02-23 23:00:02 --> [spark:ops:work] Started
INFO - 2026-02-23 23:00:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 23:00:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 23:00:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 23:00:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 23:15:02 --> [spark:ops:work] Started
INFO - 2026-02-23 23:15:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 23:15:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 23:15:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 23:15:02 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
INFO - 2026-02-23 23:30:01 --> [spark:ops:work] Started
INFO - 2026-02-23 23:30:01 --> [spark:ops:work] Intent
WARNING - 2026-02-23 23:30:01 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 23:30:01 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 23:37:07 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:37:08 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:37:08 --> App\Controllers\AuthController initController executed
INFO - 2026-02-23 23:38:31 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Started
INFO - 2026-02-23 23:38:31 --> [spark:logs:summarize] Intent
INFO - 2026-02-23 23:38:31 --> [AIOPS][SPARK][GOVERNANCE][spark:logs:summarize] Completed
DEBUG - 2026-02-23 23:38:33 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:38:34 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:38:34 --> App\Controllers\AuthController initController executed
DEBUG - 2026-02-23 23:42:40 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:42:40 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium_Features/Brokerage-Integrations]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:42:40 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium_Features/Brokerage-Integrations | referrer: none
DEBUG - 2026-02-23 23:42:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:42:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Trade-Tracker]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:42:44 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Trade-Tracker | referrer: none
DEBUG - 2026-02-23 23:42:44 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:42:44 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: How-To-Guides]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:42:44 --> 404 route miss: https://www.mymiwallet.com/index.php/How-To-Guides | referrer: none
DEBUG - 2026-02-23 23:42:45 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:42:45 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Wallets]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:42:45 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Wallets | referrer: none
DEBUG - 2026-02-23 23:44:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:44:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Due-Diligence-Database]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:44:06 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Due-Diligence-Database | referrer: none
DEBUG - 2026-02-23 23:44:06 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:44:06 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Brokerage-Integration]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:44:06 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Brokerage-Integration | referrer: none
INFO - 2026-02-23 23:45:02 --> [spark:ops:work] Started
INFO - 2026-02-23 23:45:02 --> [spark:ops:work] Intent
WARNING - 2026-02-23 23:45:02 --> [DEPRECATED] str_starts_with(): Passing null to parameter #1 ($haystack) of type string is deprecated in APPPATH/Commands/Ops/Work.php on line 114.
 1 APPPATH/Commands/Ops/Work.php(114): str_starts_with(null, '--lock=')
 2 APPPATH/Commands/Ops/Work.php(39): App\Commands\Ops\Work->resolveOption([...], 'lock', 15)
 3 SYSTEMPATH/CLI/Commands.php(74): App\Commands\Ops\Work->run([...])
 4 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 5 SYSTEMPATH/Boot.php(442): CodeIgniter\CLI\Console->run()
 6 SYSTEMPATH/Boot.php(166): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
INFO - 2026-02-23 23:45:02 --> [spark:ops:work] Completed
DEBUG - 2026-02-23 23:46:09 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:46:09 --> App\Controllers\Home initController executed
DEBUG - 2026-02-23 23:46:09 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 23:46:10 --> [MetaService] slug= pageName= cacheHit= path=FALLBACK
ERROR - 2026-02-23 23:46:10 --> LOGGER TEST ERROR - 23:46:10
DEBUG - 2026-02-23 23:46:10 --> LOGGER TEST DEBUG - 23:46:10
INFO - 2026-02-23 23:46:10 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 23:46:10 --> [MetaService] slug= pageName=Home cacheHit= path=DB
DEBUG - 2026-02-23 23:46:10 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:46:10 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 23:46:10 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 23:46:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:46:10 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 23:46:10 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 23:46:10 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:46:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:46:11 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 23:46:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 23:46:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:46:11 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:46:11 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 23:46:11 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 23:46:11 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 23:46:11 --> MyMICoin: guest context detected; skipping user-specific preload.
INFO - 2026-02-23 23:46:12 --> themesMemory usage: 10485760
DEBUG - 2026-02-23 23:47:00 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:47:00 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Features/Advanced-Investment-Portfoio-Manager]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:47:00 --> 404 route miss: https://www.mymiwallet.com/index.php/Features/Advanced-Investment-Portfoio-Manager | referrer: none
DEBUG - 2026-02-23 23:48:49 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
DEBUG - 2026-02-23 23:48:49 --> App\Modules\Blog\Controllers\HowItWorksController initController executed
DEBUG - 2026-02-23 23:48:49 --> MyMIUser L52 - initialized (first log).
DEBUG - 2026-02-23 23:48:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:48:49 --> MyMICoin: guest context detected; skipping user-specific preload.
WARNING - 2026-02-23 23:48:49 --> MyMIWallets initialized without numeric user context.
DEBUG - 2026-02-23 23:48:49 --> MyMICoin: guest context detected; skipping user-specific preload.
DEBUG - 2026-02-23 23:48:54 --> Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.
CRITICAL - 2026-02-23 23:48:54 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Premium-Features/Advanced-Charting]
in SYSTEMPATH/CodeIgniter.php on line 1001.
 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(417): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(113): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
WARNING - 2026-02-23 23:48:54 --> 404 route miss: https://www.mymiwallet.com/index.php/Premium-Features/Advanced-Charting | referrer: none
