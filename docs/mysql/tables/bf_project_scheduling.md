# bf_project_scheduling

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DesignModel.php:198, docs/_aiops/doc-change-log.md:1673

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_project_scheduling` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_project_scheduling`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_project_scheduling'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_project_scheduling'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

