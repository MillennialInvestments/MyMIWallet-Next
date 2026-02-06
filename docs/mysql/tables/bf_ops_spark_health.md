# bf_ops_spark_health

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Ops/SparkHealthModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:155, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:155, docs/aiops/migration_model_audit.md:144, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1775

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_spark_health` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `hostname` varchar(128) NULL DEFAULT NULL,
  `app_env` varchar(32) NULL DEFAULT NULL,
  `php_version` varchar(32) NULL DEFAULT NULL,
  `ci_version` varchar(32) NULL DEFAULT NULL,
  `status` enum('ok','fail') NOT NULL DEFAULT 'ok',
  `command_count` int NOT NULL DEFAULT 0,
  `invalid_count` int NOT NULL DEFAULT 0,
  `invalid_files_json` mediumtext NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- created_at datetime NOT NULL
- hostname varchar(128) NULL
- app_env varchar(32) NULL
- php_version varchar(32) NULL
- ci_version varchar(32) NULL
- status enum('ok','fail') NOT NULL
- command_count int NOT NULL
- invalid_count int NOT NULL
- invalid_files_json mediumtext NULL
- notes text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_ops_spark_health`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_spark_health'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_spark_health'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

