-- Table: bf_tax_return_lines
-- Sources: migrations: 2025-01-01-000100_CreateTaxModuleTables.php | code: app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:74, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:107, app/Database/Migrations/2025-01-01-000100_CreateTaxModuleTables.php:146, app/Modules/Management/TaxAdmin/Models/TaxLinesModel.php:11, app/Modules/Management/TaxAdmin/Models/TaxTemplatesModel.php:24, app/Modules/User/Tax/Models/TaxTemplateModel.php:24, app/Modules/User/Tax/Models/TaxTemplateModel.php:33, docs/sql/tax_module_schema.sql:41, docs/sql/tax_module_schema.sql:87, docs/sql/tax_seed_bossier_parish.sql:9
CREATE TABLE IF NOT EXISTS `bf_tax_return_lines` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `line_number` INT(11) NOT NULL,
  `label` VARCHAR(255) NOT NULL,
  `type` ENUM('input','calc','info') NOT NULL,
  `calc_rule` VARCHAR(255) NULL,
  `requires_explain` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'template_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `template_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column template_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'line_number');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `line_number` INT(11) NOT NULL', 'SELECT ''column line_number already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'label');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `label` VARCHAR(255) NOT NULL', 'SELECT ''column label already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `type` ENUM(''input'',''calc'',''info'') NOT NULL', 'SELECT ''column type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'calc_rule');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `calc_rule` VARCHAR(255) NULL', 'SELECT ''column calc_rule already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'requires_explain');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `requires_explain` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column requires_explain already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'sort_order');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `sort_order` INT(11) NOT NULL', 'SELECT ''column sort_order already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_tax_return_lines` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_tax_return_lines`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_tax_return_lines'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

