-- Table: bf_discord_policies
-- Sources: code: app/Models/DiscordModel.php:300, app/Models/DiscordModel.php:329, app/Models/DiscordModel.php:333, app/Models/DiscordModel.php:338, app/Commands/DiscordWireCheck.php:70, app/Libraries/MyMIDiscord.php:188, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/alerts_automation.md:40, docs/discord/alerts_automation.md:63, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:94, docs/discord/server_setup_and_alert_routing.md:191, docs/discord/_inventory.md:11, docs/discord/_inventory.md:18, docs/discord/discord_schema_v3.sql.md:18, docs/discord/mysql_discord_schema.md:98, docs/OVERVIEW.md:247
-- Suspected columns: created_at, id, is_enabled
CREATE TABLE IF NOT EXISTS `bf_discord_policies` (
  `created_at` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_enabled` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_policies` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_policies` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies' AND column_name = 'is_enabled');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_policies` ADD COLUMN `is_enabled` TEXT NULL', 'SELECT ''column is_enabled already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_policies`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

