CRITICAL - 2026-02-07 19:50:34 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:00:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 20:00:13 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:00:21 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:04:09 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:11:27 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: How-It-Works/Daily-Financial-News]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Modules/Blog/Controllers/HowItWorksController.php(41): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Blog\Controllers\HowItWorksController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:15:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 20:30:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 20:35:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: Support]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Modules/Support/Controllers/SupportController.php(28): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Support\Controllers\SupportController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 20:45:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 20:54:23 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Wallets/MyMIGPayPalCallback]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:00:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 21:15:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 21:17:29 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:25:44 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:27:07 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/Factories.php(236): App\Config\SiteSettings->__construct()
 7 SYSTEMPATH/Config/Factories.php(170): CodeIgniter\Config\Factories::createInstance('config', 'App\\Config\\SiteSettings', [])
 8 SYSTEMPATH/Config/Factories.php(189): CodeIgniter\Config\Factories::__callStatic('config', [])
 9 SYSTEMPATH/Common.php(208): CodeIgniter\Config\Factories::get('config', 'SiteSettings')
10 APPPATH/Controllers/BaseController.php(111): config('SiteSettings')
11 APPPATH/Controllers/Home.php(35): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
12 SYSTEMPATH/CodeIgniter.php(904): App\Controllers\Home->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
13 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
14 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
15 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
16 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
17 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:27:10 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: login]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Services/EventTracker.php(20): CodeIgniter\Database\BaseConnection->tableExists('bf_user_events')
 5 APPPATH/Controllers/AuthController.php(71): App\Services\EventTracker->track('auth.login_view')
 6 SYSTEMPATH/CodeIgniter.php(933): App\Controllers\AuthController->login()
 7 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
 8 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:27:19 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: login]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Services/EventTracker.php(20): CodeIgniter\Database\BaseConnection->tableExists('bf_user_events')
 5 APPPATH/Controllers/AuthController.php(71): App\Services\EventTracker->track('auth.login_view')
 6 SYSTEMPATH/CodeIgniter.php(933): App\Controllers\AuthController->login()
 7 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
 8 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:30:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: CLI, Route: ops:work]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Commands/OpsWork.php(126): CodeIgniter\Database\BaseConnection->tableExists('bf_aiops_settings')
 5 APPPATH/Commands/OpsWork.php(45): App\Commands\OpsWork->resolveSafeMode()
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\OpsWork->run([...])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('ops:work', [...])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 21:33:22 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: login]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Services/EventTracker.php(20): CodeIgniter\Database\BaseConnection->tableExists('bf_user_events')
 5 APPPATH/Controllers/AuthController.php(71): App\Services\EventTracker->track('auth.login_view')
 6 SYSTEMPATH/CodeIgniter.php(933): App\Controllers\AuthController->login()
 7 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
 8 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:33:28 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: login]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Services/EventTracker.php(20): CodeIgniter\Database\BaseConnection->tableExists('bf_user_events')
 5 APPPATH/Controllers/AuthController.php(71): App\Services\EventTracker->track('auth.login_view')
 6 SYSTEMPATH/CodeIgniter.php(933): App\Controllers\AuthController->login()
 7 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
 8 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 21:37:55 --> Error: Cannot use object of type Myth\Auth\Entities\User as array
[Method: POST, Route: login]
in APPPATH/Services/EventTracker.php on line 83.
 1 APPPATH/Services/EventTracker.php(36): App\Services\EventTracker->resolveReferralCode(2, Object(CodeIgniter\Session\Session))
 2 APPPATH/Controllers/AuthController.php(235): App\Services\EventTracker->track('auth.login_success', [], 2)
 3 SYSTEMPATH/CodeIgniter.php(933): App\Controllers\AuthController->attemptLogin()
 4 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\AuthController))
 5 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 6 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 7 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 8 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:03:53 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: API/Investments/GetUserWatchlist/2]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:08 --> ErrorException: Cannot declare class App\Config\SocialPlatforms, because the name is already in use
[Method: GET, Route: Wallets]
in APPPATH/Config/SocialPlatforms.php on line 7.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 22:04:28 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Assets]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:31 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Marketplace]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:34 --> Error: Call to undefined function App\Modules\Exchange\Controllers\getCuID()
[Method: GET, Route: Exchange]
in APPPATH/Modules/Exchange/Controllers/ExchangeController.php on line 66.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Exchange\Controllers\ExchangeController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:40 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Admin]
in APPPATH/Modules/Management/Controllers/AdminController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\AdminController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:47 --> Error: Call to undefined method App\Modules\Management\Controllers\AlertsController::getMyMIAlerts()
[Method: GET, Route: Management/Alerts]
in APPPATH/Modules/Management/Controllers/AlertsController.php on line 155.
 1 APPPATH/Modules/Management/Controllers/AlertsController.php(294): App\Modules\Management\Controllers\AlertsController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\AlertsController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\AlertsController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:50 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:53 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Assets]
in APPPATH/Modules/Management/Controllers/AssetsController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\AssetsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:56 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Budgeting]
in APPPATH/Modules/Management/Controllers/BudgetingController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\BudgetingController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:04:59 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Budgets]
in APPPATH/Modules/Management/Controllers/BudgetsController.php on line 75.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\BudgetsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:02 --> Error: Call to a member function close() on null
[Method: GET, Route: Management/Exchange]
in APPPATH/Modules/Management/Controllers/ExchangeController.php on line 257.
 1 SYSTEMPATH/CodeIgniter.php(498): App\Modules\Management\Controllers\ExchangeController->__destruct()
 2 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:02 --> [Caused by] Error: Call to a member function getUserWallets() on null
in APPPATH/Modules/Management/Controllers/ExchangeController.php on line 101.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ExchangeController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:12 --> Error: Call to a member function getAlertInfo() on null
[Method: GET, Route: Management/Partners]
in APPPATH/Modules/Management/Controllers/PartnersController.php on line 98.
 1 APPPATH/Modules/Management/Controllers/PartnersController.php(109): App\Modules\Management\Controllers\PartnersController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\PartnersController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\PartnersController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:15 --> Error: Call to undefined function App\Modules\Management\Controllers\getCuID()
[Method: GET, Route: Management/Projects]
in APPPATH/Modules/Management/Controllers/ProjectsController.php on line 76.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ProjectsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:19 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Security]
in APPPATH/Modules/Management/Controllers/SecurityController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\SecurityController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:22 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Services]
in APPPATH/Modules/Management/Controllers/ServicesController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ServicesController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:25 --> Error: Call to undefined function App\Modules\Management\Controllers\getCuID()
[Method: GET, Route: Management/Users]
in APPPATH/Modules/Management/Controllers/UsersController.php on line 96.
 1 APPPATH/Modules/Management/Controllers/UsersController.php(139): App\Modules\Management\Controllers\UsersController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\UsersController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\UsersController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:05:27 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Wallets]
in APPPATH/Modules/Management/Controllers/WalletsController.php on line 92.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\WalletsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:55:33 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: API/Investments/GetUserWatchlist/2]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:55:41 --> ErrorException: Cannot declare class App\Config\SocialPlatforms, because the name is already in use
[Method: GET, Route: Wallets]
in APPPATH/Config/SocialPlatforms.php on line 7.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 22:55:47 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Assets]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:55:51 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Marketplace]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:55:54 --> Error: Call to undefined function App\Modules\Exchange\Controllers\getCuID()
[Method: GET, Route: Exchange]
in APPPATH/Modules/Exchange/Controllers/ExchangeController.php on line 66.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Exchange\Controllers\ExchangeController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:01 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Admin]
in APPPATH/Modules/Management/Controllers/AdminController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\AdminController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:10 --> TypeError: Cannot assign null to property App\Services\WeeklyStreamService::$db of type CodeIgniter\Database\BaseConnection
[Method: GET, Route: Management]
in APPPATH/Services/WeeklyStreamService.php on line 21.
 1 APPPATH/Modules/Management/Controllers/ManagementController.php(50): App\Services\WeeklyStreamService->__construct()
 2 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ManagementController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 3 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:18 --> Error: Call to undefined method App\Modules\Management\Controllers\AlertsController::getMyMIAlerts()
[Method: GET, Route: Management/Alerts]
in APPPATH/Modules/Management/Controllers/AlertsController.php on line 155.
 1 APPPATH/Modules/Management/Controllers/AlertsController.php(294): App\Modules\Management\Controllers\AlertsController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\AlertsController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\AlertsController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:21 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:31 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Assets]
in APPPATH/Modules/Management/Controllers/AssetsController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\AssetsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:34 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Budgeting]
in APPPATH/Modules/Management/Controllers/BudgetingController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\BudgetingController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:36 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Budgets]
in APPPATH/Modules/Management/Controllers/BudgetsController.php on line 75.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\BudgetsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:39 --> Error: Call to a member function close() on null
[Method: GET, Route: Management/Exchange]
in APPPATH/Modules/Management/Controllers/ExchangeController.php on line 257.
 1 SYSTEMPATH/CodeIgniter.php(498): App\Modules\Management\Controllers\ExchangeController->__destruct()
 2 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:39 --> [Caused by] Error: Call to a member function getUserWallets() on null
in APPPATH/Modules/Management/Controllers/ExchangeController.php on line 101.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ExchangeController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:49 --> Error: Call to a member function getAlertInfo() on null
[Method: GET, Route: Management/Partners]
in APPPATH/Modules/Management/Controllers/PartnersController.php on line 98.
 1 APPPATH/Modules/Management/Controllers/PartnersController.php(109): App\Modules\Management\Controllers\PartnersController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\PartnersController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\PartnersController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:52 --> Error: Call to undefined function App\Modules\Management\Controllers\getCuID()
[Method: GET, Route: Management/Projects]
in APPPATH/Modules/Management/Controllers/ProjectsController.php on line 76.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ProjectsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:54 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Security]
in APPPATH/Modules/Management/Controllers/SecurityController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\SecurityController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:56 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Services]
in APPPATH/Modules/Management/Controllers/ServicesController.php on line 72.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\ServicesController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:56:58 --> Error: Call to undefined function App\Modules\Management\Controllers\getCuID()
[Method: GET, Route: Management/Users]
in APPPATH/Modules/Management/Controllers/UsersController.php on line 96.
 1 APPPATH/Modules/Management/Controllers/UsersController.php(139): App\Modules\Management\Controllers\UsersController->commonData()
 2 SYSTEMPATH/CodeIgniter.php(933): App\Modules\Management\Controllers\UsersController->index()
 3 SYSTEMPATH/CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Modules\Management\Controllers\UsersController))
 4 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 22:57:00 --> Error: Call to a member function getUserWallets() on null
[Method: GET, Route: Management/Wallets]
in APPPATH/Modules/Management/Controllers/WalletsController.php on line 92.
 1 SYSTEMPATH/CodeIgniter.php(904): App\Modules\Management\Controllers\WalletsController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
 2 SYSTEMPATH/CodeIgniter.php(498): CodeIgniter\CodeIgniter->createController()
 3 SYSTEMPATH/CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
