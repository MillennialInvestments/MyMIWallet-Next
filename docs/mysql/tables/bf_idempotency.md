# bf_idempotency

## Source
- Migration: _None_
- Model:
- Code references: app/Models/IdempotencyModel.php:8, docs/ops/runbooks/marketing-cron-playbook.md:23, docs/ops/runbooks/marketing-cron-playbook.md:30, docs/operations/04-cron-automation.md:15, docs/operations/04-cron-automation.md:15, docs/operations/04-cron-automation.md:16, docs/operations/04-cron-automation.md:24, docs/operations/04-cron-automation.md:36, docs/operations/04-cron-automation.md:50, docs/gap-audit/next-steps.md:67, docs/aiops/migration_model_audit.md:114, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1430

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_idempotency` (
  `response_json` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- response_json TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_idempotency`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_idempotency'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_idempotency'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

