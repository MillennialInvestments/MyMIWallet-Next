-- Table: bf_discord_queue
-- Sources: code: app/Models/DiscordModel.php:36, app/Models/DiscordModel.php:53, app/Models/DiscordModel.php:65, app/Models/DiscordModel.php:72, app/Models/DiscordModel.php:79, app/Models/DiscordModel.php:120, app/Models/DiscordModel.php:124, app/Models/DiscordModel.php:145, app/Models/DiscordModel.php:150, app/Models/DiscordModel.php:380, app/Models/DiscordModel.php:381, app/Models/DiscordModel.php:382, app/Modules/APIs/Controllers/DiscordController.php:95, app/Modules/APIs/Controllers/DiscordController.php:102, app/Commands/DiscordWireCheck.php:68, app/Commands/DiscordWireCheck.php:92, app/Commands/DiscordWireCheck.php:93, app/Commands/DiscordWireCheck.php:94, app/Libraries/MyMIDiscord.php:229, app/Libraries/MyMIDiscord.php:277, docs/discord_schema.sql.md:47, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:37, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_ci4_integration.md:73, docs/discord/alerts_automation.md:9, docs/discord/alerts_automation.md:39, docs/discord/alerts_automation.md:62, docs/discord/server_setup_and_alert_routing.md:10, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:87, docs/discord/server_setup_and_alert_routing.md:102, docs/discord/_inventory.md:11, docs/discord/_inventory.md:18, docs/discord/_inventory.md:24, docs/discord/my_midiscord_server_setup_and_alert_routing.md:44, docs/discord/discord_schema_v3.sql.md:30, docs/discord/mysql_discord_schema.md:62, docs/OVERVIEW.md:247, docs/health/modules/discord_zapier.md:10, docs/health/modules/alerts.md:63, docs/health/health_test_checklist.md:364
-- Suspected columns: id, status, available_at
CREATE TABLE IF NOT EXISTS `bf_discord_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` TEXT NULL,
  `available_at` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_queue` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_queue` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue' AND column_name = 'available_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_queue` ADD COLUMN `available_at` TEXT NULL', 'SELECT ''column available_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_queue`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

