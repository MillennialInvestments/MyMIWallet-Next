CRITICAL - 2026-02-07 06:54:22 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: Dashboard]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:54:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:54:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: Alerts]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:54:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:54:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:54:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: /]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:55:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:55:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:56:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:56:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:57:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:57:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:58:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:58:39 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:59:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 06:59:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Alerts/getLatestPrices]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 07:00:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: php_network_getaddresses: getaddrinfo for https failed: Name or service not known
[Method: GET, Route: API/Management/Run-CRON-Tasks]
in SYSTEMPATH/Database/BaseConnection.php on line 465.
 1 SYSTEMPATH/Database/BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH/Database/BaseConnection.php(1525): CodeIgniter\Database\BaseConnection->query('SHOW TABLES FROM `mymiwallet`')
 3 SYSTEMPATH/Database/BaseConnection.php(1545): CodeIgniter\Database\BaseConnection->listTables()
 4 APPPATH/Libraries/SiteSettingsOverride.php(17): CodeIgniter\Database\BaseConnection->tableExists('bf_site_settings_overrides')
 5 APPPATH/Config/SiteSettings.php(220): App\Libraries\SiteSettingsOverride->apply(Object(App\Config\SiteSettings))
 6 SYSTEMPATH/Config/BaseConfig.php(76): App\Config\SiteSettings->__construct()
 7 ROOTPATH/writable/cache/FactoriesCache_config(929): CodeIgniter\Config\BaseConfig::__set_state([...])
 8 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include('/home/mymiteam/mymiwallet/site/current/writable/cache/FactoriesCache_config')
 9 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
10 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
11 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
12 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 15:00:39 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:00:40 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:02:32 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:02:33 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:03:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:03:32 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:04:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:04:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:05:32 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:05:32 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:06:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:06:32 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:07:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:07:31 --> ErrorException: Constant expression contains invalid operations
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/Database.php on line 28.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:08:32 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 15:08:33 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: API/Alerts/getLatestPrices]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-07 07:09:32 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: API/Alerts/getLatestPrices]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1174.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 07:09:32 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: API/Alerts/getLatestPrices]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1174.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 07:10:32 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: API/Alerts/getLatestPrices]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1174.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-07 07:10:32 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: API/Alerts/getLatestPrices]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1174.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
