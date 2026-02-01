# bf_ai_ops_runs

## Source
- Migration: 2026-01-01-000001_CreateAiOpsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:26, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:43, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:92, app/Libraries/AiOps/AiOpsManager.php:92, app/Libraries/AiOps/AiOpsManager.php:111, app/Libraries/AiOps/AiOpsManager.php:121, app/Libraries/AiOps/AiOpsManager.php:216, app/Libraries/AiOps/AiOpsManager.php:384, docs/aiops/README.md:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:25, docs/_aiops/doc-change-log.md:968, docs/spark/categories/maintenance/gap-sync.md:16

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_ops_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(64) NOT NULL,
  `subsystem` VARCHAR(64) NOT NULL,
  `status` VARCHAR(16) NOT NULL,
  `started_at` DATETIME NOT NULL,
  `finished_at` DATETIME NULL,
  `runtime_seconds` INT NULL,
  `message` TEXT NULL,
  `meta_json` LONGTEXT NULL,
  `created_by` BIGINT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_key_started_at` (`job_key`, `started_at`),
  KEY `subsystem_started_at` (`subsystem`, `started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- job_key VARCHAR(64) NOT NULL
- subsystem VARCHAR(64) NOT NULL
- status VARCHAR(16) NOT NULL
- started_at DATETIME NOT NULL
- finished_at DATETIME NULL
- runtime_seconds INT NULL
- message TEXT NULL
- meta_json LONGTEXT NULL
- created_by BIGINT NULL
- created_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- job_key_started_at (job_key, started_at)
- subsystem_started_at (subsystem, started_at)

## Verification
```sql
SHOW CREATE TABLE `bf_ai_ops_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

