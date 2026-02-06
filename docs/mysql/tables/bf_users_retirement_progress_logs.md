# bf_users_retirement_progress_logs

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:247, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:247, docs/_aiops/doc-change-log.md:2237

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_retirement_progress_logs` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `retirement_plan_id` int NOT NULL DEFAULT NULL,
  `progress_amount` decimal(18,2) NOT NULL DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- retirement_plan_id int NOT NULL
- progress_amount decimal(18,2) NOT NULL
- log_date timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_retirement_progress_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_progress_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_progress_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

