# bf_auctions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AssetsModel.php:177, app/Models/AssetsModel.php:183, app/Models/AssetsModel.php:203, docs/_aiops/doc-change-log.md:1121

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auctions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auctions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auctions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auctions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

