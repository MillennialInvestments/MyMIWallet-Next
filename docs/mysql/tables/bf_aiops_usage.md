# bf_aiops_usage

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:39, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:39, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:40, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:53, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:54, app/Modules/AIOps/Models/AIOpsUsageModel.php:9, docs/ops/aiops-schema-endpoints-spec.md:7, docs/ops/aiops-schema-endpoints-spec.md:138, docs/ops/n8n-capabilities-for-mymiwallet.md:55, docs/ops/n8n-capabilities-for-mymiwallet.md:60, docs/ops/n8n-capabilities-for-mymiwallet.md:61, docs/_aiops/doc-change-log.md:1001, docs/ai-cost-controls.md:10, docs/ai-cost-controls.md:31, docs/aiops-budgeting.md:13, docs/aiops-budgeting.md:27, docs/emergency-playbook.md:18

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_usage` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_usage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_usage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

