-- Table: bf_discord_templates
-- Sources: code: app/Models/DiscordModel.php:21, app/Models/DiscordModel.php:194, app/Models/DiscordModel.php:202, app/Models/DiscordModel.php:252, app/Models/DiscordModel.php:256, app/Models/DiscordModel.php:261, app/Commands/DiscordWireCheck.php:66, docs/discord_schema.sql.md:22, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:30, docs/functional_inventory/docs_to_code_map.md:34, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/events_matrix.md:18, docs/discord/discord_seed_v3.sql.md:2, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:77, docs/discord/server_setup_and_alert_routing.md:145, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:15, docs/discord/_inventory.md:19, docs/discord/_inventory.md:24, docs/discord/mysql_discord_schema.md:28, docs/OVERVIEW.md:234, docs/OVERVIEW.md:236, docs/health/modules/discord_zapier.md:10, docs/health/modules/alerts.md:63, docs/health/health_test_checklist.md:364, docs/discord_seed.sql.md:13
-- Suspected columns: template_key, id
CREATE TABLE IF NOT EXISTS `bf_discord_templates` (
  `template_key` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates' AND column_name = 'template_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_templates` ADD COLUMN `template_key` TEXT NULL', 'SELECT ''column template_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_discord_templates` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_discord_templates`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

