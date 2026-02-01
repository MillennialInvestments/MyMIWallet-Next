# bf_ops_jobs

## Source
- Migration: 2026-01-15-000100_CreateOpsFoundation.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:19, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:34, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:113, app/Database/Seeds/OpsJobsSeeder.php:93, app/Models/OpsJobsModel.php:11, docs/codex/01_pr1_foundations.md:14, docs/codex/01_pr1_foundations.md:26, docs/codex/01_pr1_foundations.md:67, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:152, docs/aiops/migration_model_audit.md:146, docs/aiops/migration_model_audit.md:240, docs/_aiops/doc-change-log.md:1604, docs/health/health_test_checklist.md:644, docs/health/modules/system_ops.md:62

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `handler` VARCHAR(255) NULL,
  `max_attempts` INT(11) NOT NULL DEFAULT 3,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `last_run_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_key` (`job_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- job_key VARCHAR(150) NOT NULL
- name VARCHAR(255) NOT NULL
- description TEXT NULL
- handler VARCHAR(255) NULL
- max_attempts INT(11) NOT NULL
- is_enabled TINYINT(1) NOT NULL
- last_run_at DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- job_key (job_key) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_ops_jobs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

