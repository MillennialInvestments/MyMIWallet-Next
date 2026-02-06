# bf_aiops_tasks

## Source
- Migration: 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:21, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:22, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:44, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:126, app/Models/AiOpsTaskModel.php:11, docs/codex/reviews/Spark-Analysis-2026-02-01.md:595, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:31, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:31, docs/aiops/migration_model_audit.md:62, docs/aiops/migration_model_audit.md:219, docs/_aiops/doc-change-log.md:1064, docs/spark/categories/system/ops-work.md:17, docs/management/Command_Discovery_And_Design.md:42, docs/management/Management_Roadmap.md:61, docs/management/Recommended_New_Commands.md:7, docs/management/Recommended_New_Commands.md:19, docs/management/Management_Command_Map.md:65, docs/product/Next_Codex_Tasks.md:30

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_tasks` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_key` VARCHAR(190) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `severity` VARCHAR(8) NOT NULL DEFAULT 'P2',
  `domain` VARCHAR(64) NOT NULL,
  `prompt` TEXT NULL,
  `context_json` LONGTEXT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'open',
  `assigned_to` VARCHAR(64) NOT NULL DEFAULT 'human',
  `locked_at` DATETIME NULL,
  `locked_by` VARCHAR(64) NULL,
  `last_error` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_key` (`task_key`),
  KEY `status` (`status`),
  KEY `locked_at` (`locked_at`),
  KEY `assigned_to` (`assigned_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- task_key VARCHAR(190) NOT NULL
- title VARCHAR(255) NOT NULL
- severity VARCHAR(8) NOT NULL
- domain VARCHAR(64) NOT NULL
- prompt TEXT NULL
- context_json LONGTEXT NULL
- status VARCHAR(32) NOT NULL
- assigned_to VARCHAR(64) NOT NULL
- locked_at DATETIME NULL
- locked_by VARCHAR(64) NULL
- last_error LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- task_key (task_key) [UNIQUE]
- status (status)
- locked_at (locked_at)
- assigned_to (assigned_to)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_tasks`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

