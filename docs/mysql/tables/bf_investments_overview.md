# bf_investments_overview

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MyMICoinModel.php:91, app/Models/MyMIGoldModel.php:96, docs/_aiops/doc-change-log.md:1430

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investments_overview` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investments_overview`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investments_overview'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investments_overview'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

