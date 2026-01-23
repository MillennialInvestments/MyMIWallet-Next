-- Table: bf_discord_subscriptions
-- Sources: code: app/Models/DiscordModel.php:14, app/Models/DiscordModel.php:87, app/Models/DiscordModel.php:199, app/Models/DiscordModel.php:291, app/Models/DiscordModel.php:295, app/Models/DiscordModel.php:343, app/Commands/DiscordList.php:148, app/Commands/DiscordList.php:152, app/Commands/DiscordList.php:159, app/Commands/DiscordWireCheck.php:67, app/Libraries/MyMIDiscord.php:214, docs/discord_schema.sql.md:34, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:30, docs/functional_inventory/docs_to_code_map.md:34, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/events_matrix.md:3, docs/discord/events_matrix.md:18, docs/discord/discord_seed_v3.sql.md:9, docs/discord/alerts_automation.md:38, docs/discord/alerts_automation.md:56, docs/discord/alerts_automation.md:69, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:82, docs/discord/server_setup_and_alert_routing.md:149, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:11, docs/discord/_inventory.md:15, docs/discord/_inventory.md:17, docs/discord/_inventory.md:18, docs/discord/_inventory.md:19, docs/discord/_inventory.md:24, docs/discord/_inventory.md:26, docs/discord/discord_schema_v3.sql.md:7, docs/discord/mysql_discord_schema.md:41, docs/discord/mysql_discord_schema.md:148, docs/OVERVIEW.md:234, docs/OVERVIEW.md:236, docs/OVERVIEW.md:247, docs/discord_seed.sql.md:27
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_discord_subscriptions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_subscriptions' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_subscriptions` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_subscriptions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_subscriptions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

