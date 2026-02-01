# bf_projects_auctions

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:170

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_auctions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL DEFAULT NULL,
  `token_id` int unsigned NOT NULL DEFAULT NULL,
  `bucket_size` int unsigned NULL DEFAULT 1000,
  `bucket_price` decimal(12,4) NOT NULL DEFAULT NULL,
  `round_no` int unsigned NOT NULL DEFAULT NULL,
  `max_units_per_bid` int unsigned NOT NULL DEFAULT NULL,
  `starts_at` datetime NOT NULL DEFAULT NULL,
  `ends_at` datetime NOT NULL DEFAULT NULL,
  `status` enum('scheduled','live','filled','settling','closed') NULL DEFAULT 'scheduled',
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- project_id int unsigned NOT NULL
- token_id int unsigned NOT NULL
- bucket_size int unsigned NULL
- bucket_price decimal(12,4) NOT NULL
- round_no int unsigned NOT NULL
- max_units_per_bid int unsigned NOT NULL
- starts_at datetime NOT NULL
- ends_at datetime NOT NULL
- status enum('scheduled','live','filled','settling','closed') NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_auctions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_auctions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_auctions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

