-- Table: bf_discord_message_history
-- Sources: code: app/Models/DiscordModel.php:102, app/Models/DiscordModel.php:110, app/Models/DiscordModel.php:127, app/Models/DiscordModel.php:169, app/Commands/DiscordWireCheck.php:69, docs/discord_schema.sql.md:63, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:93, docs/discord/_inventory.md:18, docs/discord/discord_schema_v3.sql.md:12, docs/discord/discord_schema_v3.sql.md:15, docs/discord/mysql_discord_schema.md:83, docs/OVERVIEW.md:247
-- Suspected columns: dedupe_hash
CREATE TABLE IF NOT EXISTS `bf_discord_message_history` (
  `dedupe_hash` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_message_history' AND column_name = 'dedupe_hash');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_message_history` ADD COLUMN `dedupe_hash` TEXT NULL', 'SELECT ''column dedupe_hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_message_history`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_message_history'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_message_history'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

