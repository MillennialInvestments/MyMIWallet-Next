# bf_projects_token_allocations

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:182

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_token_allocations` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `token_id` int unsigned NOT NULL DEFAULT NULL,
  `role` enum('platform','creator','public','insurance_platform','insurance_creator','insurance_public') NOT NULL DEFAULT NULL,
  `units` bigint unsigned NOT NULL DEFAULT NULL,
  `pct` decimal(8,4) NOT NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- token_id int unsigned NOT NULL
- role enum('platform','creator','public','insurance_platform','insurance_creator','insurance_public') NOT NULL
- units bigint unsigned NOT NULL
- pct decimal(8,4) NOT NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_token_allocations`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_token_allocations'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_token_allocations'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

