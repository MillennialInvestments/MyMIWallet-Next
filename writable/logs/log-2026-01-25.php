<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2026-01-25 18:15:02 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: API/Alerts/fetchEmailAlerts]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1024.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-01-25 18:23:55 --> Error: Call to undefined method Closure::__set_state()
[Method: GET, Route: Management/Marketing/Schedule]
in ROOTPATH/writable/cache/FactoriesCache_config on line 1024.
 1 SYSTEMPATH/Cache/FactoriesCache/FileVarExportHandler.php(38): include()
 2 SYSTEMPATH/Cache/FactoriesCache.php(48): CodeIgniter\Cache\FactoriesCache\FileVarExportHandler->get('FactoriesCache_config')
 3 SYSTEMPATH/Boot.php(337): CodeIgniter\Cache\FactoriesCache->load('config')
 4 SYSTEMPATH/Boot.php(62): CodeIgniter\Boot::loadConfigCache()
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
