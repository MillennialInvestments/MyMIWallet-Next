<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2026-02-02 02:28:45 --> CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'user_id' in 'field list'
[Method: CLI, Route: email:test]
in SYSTEMPATH/Database/BaseConnection.php on line 684.
 1 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (:user_id:, :to_email:, :subject:, :type:, :status:, :error_message:, :provider:, :meta_json:, :created_at:)', [...], false)
 2 SYSTEMPATH/Model.php(394): CodeIgniter\Database\BaseBuilder->insert()
 3 SYSTEMPATH/BaseModel.php(838): CodeIgniter\Model->doInsert([...])
 4 SYSTEMPATH/Model.php(797): CodeIgniter\BaseModel->insert([...], true)
 5 APPPATH/Libraries/MailService.php(187): CodeIgniter\Model->insert([...], true)
 6 APPPATH/Libraries/MailService.php(112): App\Libraries\MailService->sendEmail('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', null, 'generic', null, [...])
 7 APPPATH/Commands/TestEmail.php(39): App\Libraries\MailService->send('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', [...])
 8 SYSTEMPATH/CLI/Commands.php(74): App\Commands\TestEmail->run([])
 9 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('email:test', [])
10 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
11 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
12 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-02 02:28:45 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'user_id' in 'field list'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 332.
 1 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (NULL, \'tburks2392@gmail.com\', \'MyMI Wallet SMTP Test\', \'generic\', \'queued\', NULL, \'smtp\', \'{\\"source\\":\\"system\\"}\', \'2026-02-02 02:28:44\')')
 2 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (NULL, \'tburks2392@gmail.com\', \'MyMI Wallet SMTP Test\', \'generic\', \'queued\', NULL, \'smtp\', \'{\\"source\\":\\"system\\"}\', \'2026-02-02 02:28:44\')')
 3 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (:user_id:, :to_email:, :subject:, :type:, :status:, :error_message:, :provider:, :meta_json:, :created_at:)', [...], false)
 4 SYSTEMPATH/Model.php(394): CodeIgniter\Database\BaseBuilder->insert()
 5 SYSTEMPATH/BaseModel.php(838): CodeIgniter\Model->doInsert([...])
 6 SYSTEMPATH/Model.php(797): CodeIgniter\BaseModel->insert([...], true)
 7 APPPATH/Libraries/MailService.php(187): CodeIgniter\Model->insert([...], true)
 8 APPPATH/Libraries/MailService.php(112): App\Libraries\MailService->sendEmail('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', null, 'generic', null, [...])
 9 APPPATH/Commands/TestEmail.php(39): App\Libraries\MailService->send('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', [...])
10 SYSTEMPATH/CLI/Commands.php(74): App\Commands\TestEmail->run([])
11 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('email:test', [])
12 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
13 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
14 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-02 02:28:45 --> [Caused by] mysqli_sql_exception: Unknown column 'user_id' in 'field list'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 327.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(327): mysqli->query('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (NULL, \'tburks2392@gmail.com\', \'MyMI Wallet SMTP Test\', \'generic\', \'queued\', NULL, \'smtp\', \'{\\"source\\":\\"system\\"}\', \'2026-02-02 02:28:44\')', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (NULL, \'tburks2392@gmail.com\', \'MyMI Wallet SMTP Test\', \'generic\', \'queued\', NULL, \'smtp\', \'{\\"source\\":\\"system\\"}\', \'2026-02-02 02:28:44\')')
 3 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (NULL, \'tburks2392@gmail.com\', \'MyMI Wallet SMTP Test\', \'generic\', \'queued\', NULL, \'smtp\', \'{\\"source\\":\\"system\\"}\', \'2026-02-02 02:28:44\')')
 4 SYSTEMPATH/Database/BaseBuilder.php(2345): CodeIgniter\Database\BaseConnection->query('INSERT INTO `bf_email_outbox` (`user_id`, `to_email`, `subject`, `type`, `status`, `error_message`, `provider`, `meta_json`, `created_at`) VALUES (:user_id:, :to_email:, :subject:, :type:, :status:, :error_message:, :provider:, :meta_json:, :created_at:)', [...], false)
 5 SYSTEMPATH/Model.php(394): CodeIgniter\Database\BaseBuilder->insert()
 6 SYSTEMPATH/BaseModel.php(838): CodeIgniter\Model->doInsert([...])
 7 SYSTEMPATH/Model.php(797): CodeIgniter\BaseModel->insert([...], true)
 8 APPPATH/Libraries/MailService.php(187): CodeIgniter\Model->insert([...], true)
 9 APPPATH/Libraries/MailService.php(112): App\Libraries\MailService->sendEmail('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', null, 'generic', null, [...])
10 APPPATH/Commands/TestEmail.php(39): App\Libraries\MailService->send('tburks2392@gmail.com', 'MyMI Wallet SMTP Test', 'This is a test email from MyMI Wallet.', [...])
11 SYSTEMPATH/CLI/Commands.php(74): App\Commands\TestEmail->run([])
12 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('email:test', [])
13 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
14 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
15 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-02 02:28:47 --> CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'recorded_at' in 'where clause'
[Method: CLI, Route: forecasts:evaluate]
in SYSTEMPATH/Database/BaseConnection.php on line 684.
 1 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= :recorded_at:
ORDER BY `recorded_at` ASC
 LIMIT 100', [...], false)
 2 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 3 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 4 APPPATH/Services/Forecasting/ForecastAccuracyEvaluator.php(44): CodeIgniter\BaseModel->findAll()
 5 APPPATH/Commands/ForecastEvaluate.php(39): App\Services\Forecasting\ForecastAccuracyEvaluator->evaluateExpiredForecasts(100)
 6 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastEvaluate->run([])
 7 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:evaluate', [])
 8 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
 9 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
10 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-02 02:28:47 --> [Caused by] CodeIgniter\Database\Exceptions\DatabaseException: Unknown column 'recorded_at' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 332.
 1 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= \'2026-02-02 02:13:46\'
ORDER BY `recorded_at` ASC
 LIMIT 100')
 2 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= \'2026-02-02 02:13:46\'
ORDER BY `recorded_at` ASC
 LIMIT 100')
 3 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= :recorded_at:
ORDER BY `recorded_at` ASC
 LIMIT 100', [...], false)
 4 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 5 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 6 APPPATH/Services/Forecasting/ForecastAccuracyEvaluator.php(44): CodeIgniter\BaseModel->findAll()
 7 APPPATH/Commands/ForecastEvaluate.php(39): App\Services\Forecasting\ForecastAccuracyEvaluator->evaluateExpiredForecasts(100)
 8 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastEvaluate->run([])
 9 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:evaluate', [])
10 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
11 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
12 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2026-02-02 02:28:47 --> [Caused by] mysqli_sql_exception: Unknown column 'recorded_at' in 'where clause'
in SYSTEMPATH/Database/MySQLi/Connection.php on line 327.
 1 SYSTEMPATH/Database/MySQLi/Connection.php(327): mysqli->query('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= \'2026-02-02 02:13:46\'
ORDER BY `recorded_at` ASC
 LIMIT 100', 0)
 2 SYSTEMPATH/Database/BaseConnection.php(729): CodeIgniter\Database\MySQLi\Connection->execute('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= \'2026-02-02 02:13:46\'
ORDER BY `recorded_at` ASC
 LIMIT 100')
 3 SYSTEMPATH/Database/BaseConnection.php(646): CodeIgniter\Database\BaseConnection->simpleQuery('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= \'2026-02-02 02:13:46\'
ORDER BY `recorded_at` ASC
 LIMIT 100')
 4 SYSTEMPATH/Database/BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT *
FROM `bf_investment_forecast_history`
WHERE `recorded_at` <= :recorded_at:
ORDER BY `recorded_at` ASC
 LIMIT 100', [...], false)
 5 SYSTEMPATH/Model.php(286): CodeIgniter\Database\BaseBuilder->get()
 6 SYSTEMPATH/BaseModel.php(677): CodeIgniter\Model->doFindAll(0, 0)
 7 APPPATH/Services/Forecasting/ForecastAccuracyEvaluator.php(44): CodeIgniter\BaseModel->findAll()
 8 APPPATH/Commands/ForecastEvaluate.php(39): App\Services\Forecasting\ForecastAccuracyEvaluator->evaluateExpiredForecasts(100)
 9 SYSTEMPATH/CLI/Commands.php(74): App\Commands\ForecastEvaluate->run([])
10 SYSTEMPATH/CLI/Console.php(47): CodeIgniter\CLI\Commands->run('forecasts:evaluate', [])
11 SYSTEMPATH/Boot.php(388): CodeIgniter\CLI\Console->run()
12 SYSTEMPATH/Boot.php(133): CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))
13 ROOTPATH/spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
