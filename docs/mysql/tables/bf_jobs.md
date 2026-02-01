# bf_jobs

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/Queue/Queue.php:28, app/Libraries/Queue/Queue.php:38, app/Libraries/Queue/Queue.php:48, app/Libraries/Queue/Queue.php:57, app/Models/JobModel.php:8, app/Modules/Status/Controllers/HealthController.php:41, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:100, docs/aiops/migration_model_audit.md:122, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1433

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_jobs` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL DEFAULT NULL,
  `payload` text NOT NULL DEFAULT NULL,
  `attempts` tinyint NULL DEFAULT 0,
  `reserved_at` int NULL DEFAULT NULL,
  `available_at` int NOT NULL DEFAULT NULL,
  `created_at` int NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- queue varchar(255) NOT NULL
- payload text NOT NULL
- attempts tinyint NULL
- reserved_at int NULL
- available_at int NOT NULL
- created_at int NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_jobs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_jobs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

