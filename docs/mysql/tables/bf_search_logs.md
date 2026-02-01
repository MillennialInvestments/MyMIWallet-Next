# bf_search_logs

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Search/Controllers/SearchController.php:33, docs/_aiops/doc-change-log.md:1721

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_search_logs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_search_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_search_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_search_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

