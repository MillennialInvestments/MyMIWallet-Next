# bf_wallets

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/Privacy/DataExportService.php:19, docs/_aiops/doc-change-log.md:2042

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_wallets` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- user_id TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_wallets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_wallets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_wallets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

