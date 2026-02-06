# bf_aiops_workflows

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/AIOps/Models/AIOpsWorkflowsModel.php:9, docs/ops/aiops-schema-endpoints-spec.md:38, docs/ops/n8n-capabilities-for-mymiwallet.md:56, docs/ops/n8n-capabilities-for-mymiwallet.md:62, docs/ops/n8n-capabilities-for-mymiwallet.md:63, docs/_aiops/doc-change-log.md:1073

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_workflows` (
  `enabled` TEXT NULL,
  `slug` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- enabled TEXT NULL
- slug TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_workflows`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

