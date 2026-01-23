-- Table: bf_tax_rates
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:43, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:148, app/Modules/Management/TaxAdmin/Models/TaxJurisdictionsModel.php:21, app/Modules/Management/TaxAdmin/Models/TaxRatesModel.php:11, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:157, app/Modules/Management/TaxAdmin/Controllers/TaxConfig.php:158, app/Modules/User/Tax/Models/TaxJurisdictionModel.php:32, docs/sql/tax_module_schema.sql:15, docs/sql/tax_seed_bossier_parish.sql:36
CREATE TABLE IF NOT EXISTS `bf_tax_rates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jurisdiction_id` INT(11) UNSIGNED NOT NULL,
  `rate_total` DECIMAL(7,4) NOT NULL,
  `rate_components` JSON NULL,
  `effective_start` DATE NOT NULL,
  `effective_end` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'jurisdiction_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `jurisdiction_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column jurisdiction_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'rate_total');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `rate_total` DECIMAL(7,4) NOT NULL', 'SELECT ''column rate_total already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'rate_components');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `rate_components` JSON NULL', 'SELECT ''column rate_components already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'effective_start');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `effective_start` DATE NOT NULL', 'SELECT ''column effective_start already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'effective_end');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `effective_end` DATE NULL', 'SELECT ''column effective_end already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_rates` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_tax_rates`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_rates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

