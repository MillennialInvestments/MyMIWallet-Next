# bf_esports_sponsorships

## Source
- Migration: _None_
- Model:
- Code references: docs/exports_schema.md:182, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/_aiops/doc-change-log.md:1244

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_esports_sponsorships` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_esports_sponsorships`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_sponsorships'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_sponsorships'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

