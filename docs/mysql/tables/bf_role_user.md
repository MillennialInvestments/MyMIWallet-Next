-- Table: bf_role_user
-- Sources: code: app/Models/RoleUserModel.php:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/ops/auth/03-database.md:9, docs/ops/auth/03-database.md:23, docs/health/modules/auth.md:12, docs/health/modules/auth.md:108, docs/health/health_test_checklist.md:14, docs/health/health_test_checklist.md:113
CREATE TABLE IF NOT EXISTS `bf_role_user` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_role_user' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_role_user` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_role_user`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_role_user'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_role_user'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

