# bf_aiops_settings

## Source
- Migration: 2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:83, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:84, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:92, app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php:123, app/Models/AiOpsSettingsModel.php:11, app/Commands/OpsWork.php:96, docs/codex/reviews/Spark-Analysis-2026-02-01.md:595, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:29, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:29, docs/aiops/migration_model_audit.md:61, docs/_aiops/doc-change-log.md:1058

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_settings` (
  `setting_key` VARCHAR(64) NOT NULL,
  `setting_value` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `updated_by` BIGINT NULL,
  PRIMARY KEY (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- setting_key VARCHAR(64) NOT NULL
- setting_value VARCHAR(255) NOT NULL
- updated_at DATETIME NULL
- updated_by BIGINT NULL

## Required indexes
- PRIMARY (setting_key)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_settings`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_settings'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_settings'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

