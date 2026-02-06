# bf_users_promotions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DashboardModel.php:63, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:240, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:240, docs/_aiops/doc-change-log.md:2210

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_promotions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` int NULL DEFAULT 0,
  `message` text NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- active int NULL
- message text NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_promotions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_promotions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_promotions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

