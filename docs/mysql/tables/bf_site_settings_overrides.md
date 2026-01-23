-- Table: bf_site_settings_overrides
-- Sources: migrations: 2026-01-01-000001_CreateAiOpsTables.php | code: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:76, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:84, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:89, app/Libraries/SiteSettingsOverride.php:17, app/Libraries/SiteSettingsOverride.php:21, app/Libraries/SiteSettingsOverride.php:40, app/Libraries/SiteSettingsOverride.php:42, app/Libraries/SiteSettingsOverride.php:44, docs/aiops/README.md:10
CREATE TABLE IF NOT EXISTS `bf_site_settings_overrides` (
  `setting_key` VARCHAR(64) NOT NULL,
  `setting_value` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `updated_by` BIGINT NULL,
  PRIMARY KEY (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides' AND column_name = 'setting_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_site_settings_overrides` ADD COLUMN `setting_key` VARCHAR(64) NOT NULL', 'SELECT ''column setting_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides' AND column_name = 'setting_value');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_site_settings_overrides` ADD COLUMN `setting_value` VARCHAR(255) NOT NULL', 'SELECT ''column setting_value already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_site_settings_overrides` ADD COLUMN `updated_at` DATETIME NOT NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides' AND column_name = 'updated_by');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_site_settings_overrides` ADD COLUMN `updated_by` BIGINT NULL', 'SELECT ''column updated_by already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_site_settings_overrides`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

