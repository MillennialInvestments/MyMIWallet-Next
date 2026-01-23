-- Table: bf_investment_scraper
-- Sources: code: app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:11, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:14, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:23, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:32, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:42, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:45, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:162, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:163, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:166, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:168, app/Models/AlertsModel.php:1283, app/Models/AlertsModel.php:1376, app/Models/AlertsModel.php:1399, app/Models/AlertsModel.php:1404, app/Models/AlertsModel.php:1408, app/Models/AlertsModel.php:1610, app/Models/AlertsModel.php:1885, app/Models/AlertsModel.php:1893, app/Models/AlertsModel.php:1893, app/Models/AlertsModel.php:1897, app/Models/AlertsModel.php:1906, app/Models/AlertsModel.php:1911, app/Models/AlertsModel.php:1959, app/Models/AlertsModel.php:1969, app/Models/AlertsModel.php:1975, app/Models/AlertsModel.php:2139, app/Models/AlertsModel.php:2315, app/Models/AlertsModel.php:2638, app/Models/AlertsModel.php:2652, app/Models/AlertsModel.php:2666, app/Models/AlertsModel.php:3465, app/Models/AlertsModel.php:3502, app/Models/AlertsModel.php:3503, app/Modules/Management/Controllers/AlertsController.php:603, app/Modules/APIs/Controllers/AlertsController.php:1947, app/Modules/APIs/Controllers/AlertsController.php:2025, app/Commands/AlertsAudit.php:33, app/Commands/AlertsAudit.php:71, app/Commands/AlertsAudit.php:327, app/Libraries/MyMIAlerts.php:747, app/Libraries/MyMIAlerts.php:901, app/Libraries/MyMIAlerts.php:1449, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/thinkorswim_broker_ingestion.md:7, docs/alerts/thinkorswim_broker_ingestion.md:48, docs/operations/05-database.md:14, docs/operations/05-database.md:27, docs/chatgpt/mymi_alert_system/summary.md:42, docs/chatgpt/mymi_alert_system/summary.md:146, docs/chatgpt/mymi_alert_system/summary.md:152, docs/chatgpt/mymi_alert_system/standards.md:111, docs/chatgpt/mymi_alert_system/inventory.md:101, docs/chatgpt/mymi_alert_system/inventory.md:192, docs/chatgpt/codex_executive_director/summary.md:27, docs/health/modules/alerts.md:5, docs/health/modules/alerts.md:10, docs/health/modules/alerts.md:13, docs/health/modules/alerts.md:27, docs/health/health_test_checklist.md:302, docs/health/health_test_checklist.md:307, docs/health/health_test_checklist.md:311, docs/health/health_test_checklist.md:327
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_investment_scraper` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scraper' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_scraper` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_scraper`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scraper'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

