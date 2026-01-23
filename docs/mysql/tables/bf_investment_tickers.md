-- Table: bf_investment_tickers
-- Sources: code: app/Models/AlertsModel.php:108, app/Models/AlertsModel.php:212, app/Models/AlertsModel.php:216, app/Models/AlertsModel.php:255, app/Models/AlertsModel.php:432, app/Models/AlertsModel.php:573, app/Models/AlertsModel.php:574, app/Models/AlertsModel.php:574, app/Models/AlertsModel.php:1528, app/Models/AlertsModel.php:1542, app/Models/AlertsModel.php:1552, app/Models/AlertsModel.php:1569, app/Models/AlertsModel.php:1745, app/Models/AlertsModel.php:1819, app/Models/AlertsModel.php:1831, app/Models/AlertsModel.php:2866, app/Models/AlertsModel.php:2867, app/Models/AlertsModel.php:2899, app/Models/AlertsModel.php:2908, app/Models/AlertsModel.php:2935, app/Models/AlertsModel.php:2946, app/Models/AlertsModel.php:2954, app/Models/AlertsModel.php:2985, app/Models/InvestmentModel.php:528, app/Models/InvestmentModel.php:532, app/Models/InvestmentModel.php:646, app/Models/InvestmentModel.php:648, app/Modules/APIs/Models/InvestmentsTickersModel.php:9, app/Modules/APIs/Controllers/InvestmentsController.php:227, app/Libraries/MyMIAlerts.php:1892, app/Libraries/MyMIAlerts.php:1919, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/alerts_marketing_pipline.md:17, docs/operations/05-database.md:16, docs/operations/05-database.md:27, docs/chatgpt/mymi_alert_system/summary.md:73, docs/chatgpt/mymi_alert_system/summary.md:149, docs/chatgpt/mymi_alert_system/standards.md:127, docs/chatgpt/mymi_alert_system/inventory.md:52, docs/chatgpt/mymi_alert_system/inventory.md:105, docs/marketing/13-x-twitter-guide.md:42, docs/marketing/14-stocktwits-guide.md:42, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:25, docs/health/modules/alerts.md:45, docs/health/health_test_checklist.md:345, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:95
-- Suspected columns: symbol, exchange
CREATE TABLE IF NOT EXISTS `bf_investment_tickers` (
  `symbol` TEXT NULL,
  `exchange` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_tickers` ADD COLUMN `symbol` TEXT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers' AND column_name = 'exchange');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_tickers` ADD COLUMN `exchange` TEXT NULL', 'SELECT ''column exchange already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_tickers`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

