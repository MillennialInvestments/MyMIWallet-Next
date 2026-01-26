# bf_security_log

## Source
- Migration: _None_
- Model:
- Code references: app/Models/SecurityModel.php:30, app/Models/SecurityModel.php:40, app/Models/SecurityModel.php:45

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_security_log` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- user_id TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_security_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_security_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_security_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

