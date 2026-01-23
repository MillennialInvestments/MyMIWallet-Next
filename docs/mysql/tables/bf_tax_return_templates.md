-- Table: bf_tax_return_templates
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:57, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:73, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:92, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:147, app/Modules/Management/TaxAdmin/Models/TaxTemplatesModel.php:11, app/Modules/User/Tax/Models/TaxTemplateModel.php:11, docs/sql/tax_module_schema.sql:29, docs/sql/tax_module_schema.sql:54, docs/sql/tax_module_schema.sql:72, docs/sql/tax_seed_bossier_parish.sql:3
CREATE TABLE IF NOT EXISTS `bf_tax_return_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `authority` VARCHAR(150) NOT NULL,
  `frequency` ENUM('monthly','quarterly','annual') NOT NULL,
  `notes` TEXT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `name` VARCHAR(150) NOT NULL', 'SELECT ''column name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'authority');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `authority` VARCHAR(150) NOT NULL', 'SELECT ''column authority already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'frequency');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `frequency` ENUM(''monthly'',''quarterly'',''annual'') NOT NULL', 'SELECT ''column frequency already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'notes');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `notes` TEXT NULL', 'SELECT ''column notes already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'active');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `active` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column active already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_templates` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_tax_return_templates`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

