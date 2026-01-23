-- Table: bf_user_tax_return_jurisdictions
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:123, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:143, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:20, app/Modules/User/Tax/Models/TaxReturnModel.php:67, app/Modules/User/Tax/Models/TaxReturnModel.php:187, app/Modules/User/Tax/Models/TaxReturnModel.php:209, app/Modules/User/Tax/Models/TaxReturnModel.php:224, docs/sql/tax_module_schema.sql:90
CREATE TABLE IF NOT EXISTS `bf_user_tax_return_jurisdictions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_id` INT(11) UNSIGNED NOT NULL,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `taxable_amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `tax_due` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'return_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `return_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column return_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'jurisdiction_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `jurisdiction_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column jurisdiction_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'taxable_amount');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `taxable_amount` DECIMAL(12,2) NOT NULL DEFAULT 0.00', 'SELECT ''column taxable_amount already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'tax_due');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `tax_due` DECIMAL(12,2) NOT NULL DEFAULT 0.00', 'SELECT ''column tax_due already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_tax_return_jurisdictions` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_user_tax_return_jurisdictions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tax_return_jurisdictions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

