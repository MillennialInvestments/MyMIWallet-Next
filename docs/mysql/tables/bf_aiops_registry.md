# bf_aiops_registry

## Source
- Migration: 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:67, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:68, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:80, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:124, docs/codex/reviews/Spark-Analysis-2026-02-01.md:595, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:28, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:28, docs/_aiops/doc-change-log.md:1052

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_registry` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_key` VARCHAR(190) NOT NULL,
  `handler` VARCHAR(190) NOT NULL,
  `description` TEXT NULL,
  `safe_mode_allowed` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_key` (`task_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- task_key VARCHAR(190) NOT NULL
- handler VARCHAR(190) NOT NULL
- description TEXT NULL
- safe_mode_allowed TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- task_key (task_key) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_registry`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_registry'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

