# bf_esports_pools

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EsportsModel.php:39, app/Models/EsportsModel.php:54, app/Models/EsportsModel.php:82, app/Models/EsportsModel.php:87, app/Models/EsportsModel.php:97, app/Models/EsportsModel.php:102, app/Models/EsportsModel.php:321, docs/exports_schema.md:74, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/_aiops/doc-change-log.md:1241

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_esports_pools` (
  `event_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- event_id TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_esports_pools`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_pools'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_pools'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

