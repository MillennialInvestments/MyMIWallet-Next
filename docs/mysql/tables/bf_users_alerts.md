# bf_users_alerts

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:216, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:216, docs/_aiops/doc-change-log.md:2117

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_alerts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `alert_type` varchar(50) NULL DEFAULT NULL,
  `alert_message` text NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `symbol` varchar(10) NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `last_triggered_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- alert_type varchar(50) NULL
- alert_message text NULL
- status tinyint(1) NULL
- created_on datetime NULL
- symbol varchar(10) NULL
- updated_on datetime NULL
- last_triggered_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_alerts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_alerts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_alerts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

