# bf_ops_job_runs

## Source
- Migration: 2026-01-15-000100_CreateOpsFoundation.php, 2026-01-21-000110_AddOutputTextToOpsRuns.php
- Model:
- Code references: app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:13, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:25, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:30, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:34, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:35, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:54, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:75, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:111, app/Libraries/Ops/OpsJobRegistry.php:492, app/Libraries/Ops/OpsJobRegistry.php:509, app/Models/OpsRunsModel.php:11, docs/ops/n8n_responsibilities.md:82, docs/codex/01_pr1_foundations.md:24, docs/codex/02_pr2_worker_and_registry.md:7, docs/codex/02_pr2_worker_and_registry.md:20, docs/codex/02_pr2_worker_and_registry.md:72, docs/codex/03_pr3_management_ui.md:39, docs/spark/categories/system/ops-work.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_job_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_id` BIGINT UNSIGNED NOT NULL,
  `queue_id` BIGINT UNSIGNED NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'running',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `payload_json` LONGTEXT NULL,
  `result_json` LONGTEXT NULL,
  `output_json` LONGTEXT NULL,
  `output_text` LONGTEXT NULL,
  `last_error` LONGTEXT NULL,
  `started_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `status` (`status`),
  KEY `started_at` (`started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- job_id BIGINT UNSIGNED NOT NULL
- queue_id BIGINT UNSIGNED NULL
- status VARCHAR(50) NOT NULL
- attempts INT(11) NOT NULL
- payload_json LONGTEXT NULL
- result_json LONGTEXT NULL
- output_json LONGTEXT NULL
- output_text LONGTEXT NULL
- last_error LONGTEXT NULL
- started_at DATETIME NULL
- finished_at DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- job_id (job_id)
- status (status)
- started_at (started_at)

## Verification
```sql
SHOW CREATE TABLE `bf_ops_job_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

