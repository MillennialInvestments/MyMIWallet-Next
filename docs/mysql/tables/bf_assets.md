# bf_assets

## Source
- Migration: _None_
- Model:
- Code references: app/Services/SearchService.php:44, app/Services/SearchService.php:45, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:31, docs/OVERVIEW.md:120, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/_aiops/doc-change-log.md:1028

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_assets` (
  `name` TEXT NULL,
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- name TEXT NULL
- created_at TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_assets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_assets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_assets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

