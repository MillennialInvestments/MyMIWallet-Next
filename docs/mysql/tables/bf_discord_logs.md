-- Table: bf_discord_logs
-- Sources: code: app/Models/DiscordModel.php:348, app/Models/DiscordModel.php:429, app/Commands/DiscordWireCheck.php:72, docs/discord_schema.sql.md:84, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:95, docs/discord/server_setup_and_alert_routing.md:189, docs/discord/mysql_discord_schema.md:123
CREATE TABLE IF NOT EXISTS `bf_discord_logs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_logs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_logs` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_logs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_logs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

