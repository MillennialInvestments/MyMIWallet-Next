-- Table: bf_backup_manifests
-- Sources: code: app/Modules/Admin/Controllers/BackupsController.php:13, app/Libraries/Backups/BackupService.php:59, app/Libraries/Backups/BackupService.php:93, app/Libraries/Backups/BackupService.php:107
-- Suspected columns: created_at
CREATE TABLE IF NOT EXISTS `bf_backup_manifests` (
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_backup_manifests' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_backup_manifests` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_backup_manifests`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_backup_manifests'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_backup_manifests'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

