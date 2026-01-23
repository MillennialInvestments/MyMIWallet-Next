-- Table: bf_users_discord_links
-- Sources: code: app/Modules/APIs/Controllers/DiscordController.php:248, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:31, docs/functional_inventory/docs_to_code_map.md:51, docs/discord/discord_to_ci4_commands.md:16, docs/discord/discord_to_ci4_commands.md:22, docs/discord/discord_to_ci4_commands.md:146, docs/discord/discord_to_ci4_commands.md:178, docs/discord/discord_to_ci4_commands.md:204, docs/discord/_inventory.md:17
CREATE TABLE IF NOT EXISTS `bf_users_discord_links` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_discord_links' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_discord_links` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_discord_links`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_discord_links'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_discord_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

