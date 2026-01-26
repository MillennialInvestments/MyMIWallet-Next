# bf_backup_manifests

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/Backups/BackupService.php:59, app/Libraries/Backups/BackupService.php:93, app/Libraries/Backups/BackupService.php:107, app/Modules/Admin/Controllers/BackupsController.php:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_backup_manifests` (
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- created_at TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_backup_manifests`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_backup_manifests'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_backup_manifests'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

