<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2026-02-05 02:41:54 --> CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'forecast_updated_at' in 'order clause'
[Method: CLI, Route: forecasts:refresh]
in SYSTEMPATH/Database/BaseConnection.php on line 684.
 1 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = :status:
ORDER BY `forecast_updated_at` ASC
 LIMIT 50', [...], false)
 2 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 3 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 4 APPPATH/Services/Forecasting/MyMIForecaster.php(61): CodeIgniter\BaseModel->findAll()
 5 APPPATH/Commands/ForecastRefresh.php(44): App\Services\Forecasting\MyMIForecaster->refreshForecastsForOpenAlerts(50)
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastRefresh->run([])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:refresh', [])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 02:41:54 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'forecast_updated_at' in 'order clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 332.
 1 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = \'Opened\'
ORDER BY `forecast_updated_at` ASC
 LIMIT 50')
 2 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = \'Opened\'
ORDER BY `forecast_updated_at` ASC
 LIMIT 50')
 3 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = :status:
ORDER BY `forecast_updated_at` ASC
 LIMIT 50', [...], false)
 4 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 5 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 6 APPPATH/Services/Forecasting/MyMIForecaster.php(61): CodeIgniter\BaseModel->findAll()
 7 APPPATH/Commands/ForecastRefresh.php(44): App\Services\Forecasting\MyMIForecaster->refreshForecastsForOpenAlerts(50)
 8 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastRefresh->run([])
 9 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:refresh', [])
10 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
11 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
12 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 02:41:54 --> [Caused by] mysqli_sql_exception: Unknown column 'forecast_updated_at' in 'order clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 327.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(327): mysqli->query('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = \'Opened\'
ORDER BY `forecast_updated_at` ASC
 LIMIT 50', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = \'Opened\'
ORDER BY `forecast_updated_at` ASC
 LIMIT 50')
 3 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = \'Opened\'
ORDER BY `forecast_updated_at` ASC
 LIMIT 50')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_trade_alerts`
WHERE `status` = :status:
ORDER BY `forecast_updated_at` ASC
 LIMIT 50', [...], false)
 5 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 7 APPPATH/Services/Forecasting/MyMIForecaster.php(61): CodeIgniter\BaseModel->findAll()
 8 APPPATH/Commands/ForecastRefresh.php(44): App\Services\Forecasting\MyMIForecaster->refreshForecastsForOpenAlerts(50)
 9 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastRefresh->run([])
10 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:refresh', [])
11 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
12 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
13 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 02:45:49 --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
[Method: GET, Route: Management/API]
in SYSTEMPATH/CodeIgniter.php on line 983.
 1 SYSTEMPATH/CodeIgniter.php(983): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
 2 SYSTEMPATH/CodeIgniter.php(360): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
 3 SYSTEMPATH/Boot.php(363): CodeIgniter\CodeIgniter->run()
 4 SYSTEMPATH/Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 5 FCPATH/index.php(68): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
CRITICAL - 2026-02-05 02:46:50 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: How-It-Works/Personal-Budgeting]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
CRITICAL - 2026-02-05 02:50:23 --> CodeIgniter\Database\Exceptions\DatabaseException: Table 'mymiwallet.bf_mdit_token_ledger' doesn't exist
[Method: CLI, Route: mdit:nav:compute_daily]
in SYSTEMPATH/Database/BaseConnection.php on line 684.
 1 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = :status:
 LIMIT 1', [...], false)
 2 SYSTEMPATH/Model.php(330): CodeIgniter\Database\BaseBuilder->get()
 3 SYSTEMPATH/BaseModel.php(715): CodeIgniter\Model->doFirst()
 4 APPPATH/Services/MDIT/MditNavService.php(27): CodeIgniter\BaseModel->first()
 5 APPPATH/Commands/MditNavComputeDaily.php(27): App\Services\MDIT\MditNavService->computeDailyNav('2026-02-05', 0.0, 0.0)
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\MditNavComputeDaily->run([])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('mdit:nav:compute_daily', [])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 02:50:23 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: Table 'mymiwallet.bf_mdit_token_ledger' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 332.
 1 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = \'MINTED\'
 LIMIT 1')
 2 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = \'MINTED\'
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = :status:
 LIMIT 1', [...], false)
 4 SYSTEMPATH/Model.php(330): CodeIgniter\Database\BaseBuilder->get()
 5 SYSTEMPATH/BaseModel.php(715): CodeIgniter\Model->doFirst()
 6 APPPATH/Services/MDIT/MditNavService.php(27): CodeIgniter\BaseModel->first()
 7 APPPATH/Commands/MditNavComputeDaily.php(27): App\Services\MDIT\MditNavService->computeDailyNav('2026-02-05', 0.0, 0.0)
 8 SYSTEMPATH/CLI/Commands.php(74): App\Commands\MditNavComputeDaily->run([])
 9 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('mdit:nav:compute_daily', [])
10 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
11 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
12 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 02:50:23 --> [Caused by] mysqli_sql_exception: Table 'mymiwallet.bf_mdit_token_ledger' doesn't exist
in SYSTEMPATH/Database/MySQLi/Connection.php on line 327.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(327): mysqli->query('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = \'MINTED\'
 LIMIT 1', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = \'MINTED\'
 LIMIT 1')
 3 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = \'MINTED\'
 LIMIT 1')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT SUM(`units`) AS `units`
FROM `bf_mdit_token_ledger`
WHERE `status` = :status:
 LIMIT 1', [...], false)
 5 SYSTEMPATH/Model.php(330): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(715): CodeIgniter\Model->doFirst()
 7 APPPATH/Services/MDIT/MditNavService.php(27): CodeIgniter\BaseModel->first()
 8 APPPATH/Commands/MditNavComputeDaily.php(27): App\Services\MDIT\MditNavService->computeDailyNav('2026-02-05', 0.0, 0.0)
 9 SYSTEMPATH/CLI/Commands.php(74): App\Commands\MditNavComputeDaily->run([])
10 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('mdit:nav:compute_daily', [])
11 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
12 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
13 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-05 05:21:41 --> ErrorException: Cannot redeclare Config\APISettings::__construct()
[Method: GET, Route: Preview/Alert/IMNN]
in APPPATH/Config/APISettings.php on line 403.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
