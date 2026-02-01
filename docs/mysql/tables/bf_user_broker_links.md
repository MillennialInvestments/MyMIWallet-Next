# bf_user_broker_links

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIUser.php:71, app/Libraries/MyMIUser.php:676, app/Libraries/MyMIUser.php:681, app/Libraries/MyMIUser.php:686, docs/_aiops/doc-change-log.md:1820

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_broker_links` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_broker_links`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_broker_links'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_broker_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

