-- Table: bf_tax_audit_log
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:137, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:142, app/Modules/Management/TaxAdmin/Models/TaxAuditLogModel.php:11, docs/tax/README.md:16, docs/sql/tax_module_schema.sql:105
CREATE TABLE IF NOT EXISTS `bf_tax_audit_log` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `action` VARCHAR(50) NOT NULL,
  `entity_type` VARCHAR(50) NOT NULL,
  `entity_id` INT(11) UNSIGNED NOT NULL,
  `before_json` LONGTEXT NULL,
  `after_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'action');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `action` VARCHAR(50) NOT NULL', 'SELECT ''column action already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'entity_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `entity_type` VARCHAR(50) NOT NULL', 'SELECT ''column entity_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'entity_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `entity_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column entity_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'before_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `before_json` LONGTEXT NULL', 'SELECT ''column before_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'after_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `after_json` LONGTEXT NULL', 'SELECT ''column after_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_audit_log` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_tax_audit_log`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_audit_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

