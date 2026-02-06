# bf_strategy_progress

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:194, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:194, docs/_aiops/doc-change-log.md:1979

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_strategy_progress` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `strategy_id` int NOT NULL DEFAULT NULL,
  `progress_percentage` decimal(5,2) NULL DEFAULT 0.00,
  `notes` text NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- strategy_id int NOT NULL
- progress_percentage decimal(5,2) NULL
- notes text NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_strategy_progress`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_strategy_progress'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_strategy_progress'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

