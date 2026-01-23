-- Table: bf_investment_alert_history
-- Sources: code: app/Models/AlertsModel.php:140, app/Models/AlertsModel.php:393, app/Models/AlertsModel.php:512, app/Models/AlertsModel.php:603, app/Models/AlertsModel.php:620, app/Models/AlertsModel.php:1201, app/Models/AlertsModel.php:1256, app/Models/AlertsModel.php:1273, app/Models/AlertsModel.php:1630, app/Models/AlertsModel.php:1646, app/Models/AlertsModel.php:1648, app/Models/AlertsModel.php:1661, app/Models/AlertsModel.php:1662, app/Models/AlertsModel.php:1716, app/Models/AlertsModel.php:1777, app/Models/AlertsModel.php:2049, app/Models/AlertsModel.php:2237, app/Models/AlertsModel.php:2241, app/Models/AlertsModel.php:2245, app/Models/AlertsModel.php:2249, app/Models/AlertsModel.php:2253, app/Models/AlertsModel.php:2257, app/Models/AlertsModel.php:2261, app/Models/AlertsModel.php:2266, app/Models/AlertsModel.php:2681, app/Models/AlertsModel.php:2748, app/Models/AlertsModel.php:2786, app/Models/AlertsModel.php:2792, app/Models/AlertsModel.php:2798, app/Models/AlertsModel.php:2861, app/Models/AlertsModel.php:2862, app/Models/AlertsModel.php:3177, app/Models/AlertsModel.php:3189, app/Models/AlertsModel.php:3240, app/Models/AlertsModel.php:3245, app/Models/AlertsModel.php:3262, app/Models/InvestmentModel.php:1576, app/Modules/APIs/Controllers/AlertsController.php:253, app/Modules/APIs/Controllers/AlertsController.php:2134, app/Modules/APIs/Controllers/AlertsController.php:2165, app/Libraries/MyMIAlerts.php:1481, app/Libraries/MyMIAlerts.php:1554, app/Libraries/MyMIAlerts.php:2129, app/Libraries/MyMIAlerts.php:2160, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:126, docs/ops/runbooks/database-log-review.md:16, docs/ops/n8n-capabilities-for-mymiwallet.md:18, docs/alerts/thinkorswim_broker_ingestion.md:9, docs/alerts/thinkorswim_broker_ingestion.md:54, docs/alerts/alerts_marketing_pipline.md:16, docs/operations/05-database.md:17, docs/chatgpt/mymi_alert_system/summary.md:81, docs/chatgpt/mymi_alert_system/summary.md:148, docs/chatgpt/mymi_alert_system/standards.md:133, docs/chatgpt/mymi_alert_system/inventory.md:107, docs/chatgpt/codex_executive_director/summary.md:29, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:94
-- Suspected columns: ticker, send_alert, price, alerted_on, status, symbol
CREATE TABLE IF NOT EXISTS `bf_investment_alert_history` (
  `ticker` TEXT NULL,
  `send_alert` TEXT NULL,
  `price` TEXT NULL,
  `alerted_on` TEXT NULL,
  `status` TEXT NULL,
  `symbol` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'ticker');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `ticker` TEXT NULL', 'SELECT ''column ticker already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'send_alert');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `send_alert` TEXT NULL', 'SELECT ''column send_alert already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'price');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `price` TEXT NULL', 'SELECT ''column price already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'alerted_on');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `alerted_on` TEXT NULL', 'SELECT ''column alerted_on already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_alert_history` ADD COLUMN `symbol` TEXT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_alert_history`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

