-- Table: bf_discord_channels
-- Sources: code: app/Models/DiscordModel.php:27, app/Models/DiscordModel.php:138, app/Models/DiscordModel.php:159, app/Models/DiscordModel.php:189, app/Models/DiscordModel.php:201, app/Models/DiscordModel.php:226, app/Models/DiscordModel.php:230, app/Models/DiscordModel.php:235, app/Models/DiscordModel.php:384, app/Commands/DiscordList.php:29, app/Commands/DiscordList.php:96, app/Commands/DiscordList.php:100, app/Commands/DiscordList.php:105, app/Commands/DiscordList.php:154, app/Commands/DiscordWireCheck.php:65, app/Config/Discord.php:27, app/Config/Discord.php:43, docs/discord_schema.sql.md:6, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:33, docs/functional_inventory/docs_to_code_map.md:37, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_ci4_integration.md:60, docs/discord/server_setup_and_ci4_integration.md:78, docs/discord/alerts_automation.md:7, docs/discord/alerts_automation.md:13, docs/discord/alerts_automation.md:37, docs/discord/alerts_automation.md:55, docs/discord/alerts_automation.md:68, docs/discord/environments.md:22, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:71, docs/discord/server_setup_and_alert_routing.md:143, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:11, docs/discord/_inventory.md:15, docs/discord/_inventory.md:23, docs/discord/_inventory.md:24, docs/discord/my_midiscord_server_setup_and_alert_routing.md:6, docs/discord/my_midiscord_server_setup_and_alert_routing.md:44, docs/discord/mysql_discord_schema.md:8, docs/discord/mysql_discord_schema.md:148, docs/health/modules/discord_zapier.md:10, docs/health/modules/alerts.md:63, docs/health/health_test_checklist.md:364, docs/discord_seed.sql.md:2
-- Suspected columns: channel_key, id, min_interval_sec, target_webhook, webhook_url
CREATE TABLE IF NOT EXISTS `bf_discord_channels` (
  `channel_key` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `min_interval_sec` TEXT NULL,
  `target_webhook` TEXT NULL,
  `webhook_url` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels' AND column_name = 'channel_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_channels` ADD COLUMN `channel_key` TEXT NULL', 'SELECT ''column channel_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_channels` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels' AND column_name = 'min_interval_sec');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_channels` ADD COLUMN `min_interval_sec` TEXT NULL', 'SELECT ''column min_interval_sec already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels' AND column_name = 'target_webhook');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_channels` ADD COLUMN `target_webhook` TEXT NULL', 'SELECT ''column target_webhook already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels' AND column_name = 'webhook_url');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_channels` ADD COLUMN `webhook_url` TEXT NULL', 'SELECT ''column webhook_url already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_channels`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

