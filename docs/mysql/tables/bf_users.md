-- Table: bf_users
-- Sources: code: app/Models/UserModel.php:212, app/Models/UserModel.php:213, app/Models/AlertsModel.php:1575, app/Models/AlertsModel.php:1576, app/Modules/Management/Controllers/UsersController.php:254, docs/exports_schema.md:16, docs/exports_schema.md:67, docs/exports_schema.md:121, docs/exports_schema.md:138, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:31, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/discord/discord_to_ci4_commands.md:51, docs/discord/discord_to_ci4_commands.md:137, docs/discord/_inventory.md:29, docs/operations/05-database.md:13
-- Suspected columns: email, id, csv, membership_id
CREATE TABLE IF NOT EXISTS `bf_users` (
  `email` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `csv` TEXT NULL,
  `membership_id` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users' AND column_name = 'email');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users` ADD COLUMN `email` TEXT NULL', 'SELECT ''column email already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users' AND column_name = 'csv');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users` ADD COLUMN `csv` TEXT NULL', 'SELECT ''column csv already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users' AND column_name = 'membership_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users` ADD COLUMN `membership_id` TEXT NULL', 'SELECT ''column membership_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

