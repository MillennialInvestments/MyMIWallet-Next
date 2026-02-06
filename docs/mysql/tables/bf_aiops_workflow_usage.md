# bf_aiops_workflow_usage

## Source
- Migration: 2026-01-15-000100_AddChatAndAiOpsUsageTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:26, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:36, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:57, app/Modules/AIOps/Models/AIOpsWorkflowUsageModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:32, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:32, docs/_aiops/doc-change-log.md:1070, docs/ai-cost-controls.md:10, docs/ai-cost-controls.md:31, docs/ai-cost-controls.md:42, docs/aiops-budgeting.md:12, docs/aiops-budgeting.md:27, docs/emergency-playbook.md:18

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_workflow_usage` (
  `workflow_id` VARCHAR(64) NOT NULL,
  `workflow_slug` VARCHAR(190) NULL,
  `month` CHAR(7) NOT NULL,
  `usd_used` DECIMAL(10,4) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`workflow_id`, `month`),
  KEY `workflow_slug` (`workflow_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- workflow_id VARCHAR(64) NOT NULL
- workflow_slug VARCHAR(190) NULL
- month CHAR(7) NOT NULL
- usd_used DECIMAL(10,4) NOT NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (workflow_id, month)
- workflow_slug (workflow_slug)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_workflow_usage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

