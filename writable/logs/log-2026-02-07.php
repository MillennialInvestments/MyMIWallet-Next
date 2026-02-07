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
CRITICAL - 2026-02-07 15:53:44 --> Error: Class "PHPUnit\Framework\TestCase" not found
[Method: CLI, Route: ops:config:lint]
in SYSTEMPATH/Test/CIUnitTestCase.php on line 41.
 1 VENDORPATH/composer/ClassLoader.php(576): include()
 2 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../codeigniter4/framework/system/Test/CIUnitTestCase.php')
 3 APPPATH/Commands/API/ApiAudit.php(331): Composer\Autoload\ClassLoader->loadClass('CodeIgniter\\Test\\CIUnitTestCase')
 4 VENDORPATH/composer/ClassLoader.php(576): include('/home/mymiteam/mymiwallet/site/current/app/Commands/API/ApiAudit.php')
 5 VENDORPATH/composer/ClassLoader.php(427): Composer\Autoload\{closure}('/home/mymiteam/mymiwallet/site/current/vendor/composer/../../app/Commands/API/ApiAudit.php')
 6 [internal function]: Composer\Autoload\ClassLoader->loadClass('App\\Commands\\API\\ApiAudit')
 7 SYSTEMPATH/CLI/Commands.php(119): class_exists('App\\Commands\\API\\ApiAudit')
 8 SYSTEMPATH/CLI/Commands.php(51): CodeIgniter\CLI\Commands->discoverCommands()
 9 SYSTEMPATH/Config/Services.php(178): CodeIgniter\CLI\Commands->__construct()
10 SYSTEMPATH/Config/BaseService.php(312): CodeIgniter\Config\Services::commands(false)
11 SYSTEMPATH/Config/BaseService.php(251): CodeIgniter\Config\BaseService::__callStatic('commands', [...])
12 SYSTEMPATH/Config/Services.php(175): CodeIgniter\Config\BaseService::getSharedInstance('commands')
13 SYSTEMPATH/Config/BaseService.php(321): CodeIgniter\Config\Services::commands()
14 SYSTEMPATH/Config/BaseService.php(202): CodeIgniter\Config\BaseService::__callStatic('commands', [])
15 SYSTEMPATH/Common.php(1027): CodeIgniter\Config\BaseService::get('commands')
16 SYSTEMPATH/CLI/Console.php(47): service('commands')
17 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
18 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
19 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-07 16:00:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 16:15:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 16:30:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 16:45:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 17:00:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 17:15:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 17:17:45 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 17:30:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 17:45:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:00:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:15:02 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:20:33 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:30:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:45:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 18:46:08 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given
[Method: GET, Route: Apex/Referral]
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
CRITICAL - 2026-02-07 19:00:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
CRITICAL - 2026-02-07 19:15:01 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
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
