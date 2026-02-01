# bf_aiops_task_runs

## Source
- Migration: 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:47, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:48, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:64, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:125, app/Models/AiOpsTaskRunModel.php:11, app/Commands/Ops/CommandsLint.php:173, docs/codex/reviews/review-2026-01-31.md:132, docs/codex/reviews/review-prompt-2026-01-31.md:131, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:30, docs/aiops/migration_model_audit.md:63, docs/aiops/migration_model_audit.md:220, docs/_aiops/doc-change-log.md:995, docs/_aiops/doc-change-log.md:2057, docs/spark/categories/system/ops-work.md:17, docs/next/Next-Steps.md:13, docs/management/Command_Runtime_Audit.md:79

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_task_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` BIGINT UNSIGNED NOT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'running',
  `stdout` LONGTEXT NULL,
  `stderr` LONGTEXT NULL,
  `exit_code` INT NULL,
  `result_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- task_id BIGINT UNSIGNED NOT NULL
- status VARCHAR(32) NOT NULL
- stdout LONGTEXT NULL
- stderr LONGTEXT NULL
- exit_code INT NULL
- result_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- task_id (task_id)
- status (status)
- created_at (created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_task_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

