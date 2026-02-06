# bf_ops_command_inbox

## Source
- Migration: 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:95, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:96, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:116, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:122, app/Models/OpsCommandInboxModel.php:9, app/Commands/OpsFetchCommands.php:13, docs/ops/control_plane_assumptions.md:27, docs/codex/reviews/Spark-Analysis-2026-02-01.md:595, docs/cron/jobs/ops_analyze_commands.md:17, docs/cron/jobs/ops_fetch_commands.md:4, docs/sql/mysql.md:51, docs/sql/mysql.md:53, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:150, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:150, docs/aiops/migration_model_audit.md:145, docs/aiops/migration_model_audit.md:239, docs/_aiops/doc-change-log.md:1757, docs/spark/categories/system/ops-analyze-commands.md:13, docs/spark/categories/system/ops-fetch-commands.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_id` VARCHAR(255) NULL,
  `from_email` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `raw_body` LONGTEXT NULL,
  `parsed_json` LONGTEXT NULL,
  `ai_plan_json` LONGTEXT NULL,
  `ai_summary` TEXT NULL,
  `security_flags` LONGTEXT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'New',
  `meta_json` LONGTEXT NULL,
  `received_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `received_at` (`received_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- message_id VARCHAR(255) NULL
- from_email VARCHAR(255) NULL
- subject VARCHAR(255) NULL
- raw_body LONGTEXT NULL
- parsed_json LONGTEXT NULL
- ai_plan_json LONGTEXT NULL
- ai_summary TEXT NULL
- security_flags LONGTEXT NULL
- status VARCHAR(32) NOT NULL
- meta_json LONGTEXT NULL
- received_at DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- status (status)
- received_at (received_at)

## Verification
```sql
SHOW CREATE TABLE `bf_ops_command_inbox`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

