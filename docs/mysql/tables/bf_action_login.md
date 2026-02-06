# bf_action_login

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Exchange/Views/Account_Information.php:59, docs/_aiops/doc-change-log.md:1025

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_action_login` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_action_login`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_action_login'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_action_login'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

