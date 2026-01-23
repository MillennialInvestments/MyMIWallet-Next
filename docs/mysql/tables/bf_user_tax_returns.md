-- Table: bf_user_tax_returns
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:93, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:106, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:121, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:145, app/Modules/User/Tax/Models/TaxReturnModel.php:15, docs/sql/tax_module_schema.sql:57, docs/sql/tax_module_schema.sql:86, docs/sql/tax_module_schema.sql:101
CREATE TABLE IF NOT EXISTS `bf_user_tax_returns` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `filing_period_start` DATE NOT NULL,
  `filing_period_end` DATE NOT NULL,
  `due_date` DATE NOT NULL,
  `file_date` DATE NULL,
  `status` ENUM('draft','ready','filed','paid','delinquent','void') NOT NULL DEFAULT 'draft',
  `total_remitted` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'template_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `template_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column template_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'filing_period_start');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `filing_period_start` DATE NOT NULL', 'SELECT ''column filing_period_start already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'filing_period_end');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `filing_period_end` DATE NOT NULL', 'SELECT ''column filing_period_end already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'due_date');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `due_date` DATE NOT NULL', 'SELECT ''column due_date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'file_date');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `file_date` DATE NULL', 'SELECT ''column file_date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `status` ENUM(''draft'',''ready'',''filed'',''paid'',''delinquent'',''void'') NOT NULL DEFAULT ''draft''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'total_remitted');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `total_remitted` DECIMAL(12,2) NOT NULL DEFAULT 0.00', 'SELECT ''column total_remitted already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'notes');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `notes` TEXT NULL', 'SELECT ''column notes already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_returns` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_user_tax_returns`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_returns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

