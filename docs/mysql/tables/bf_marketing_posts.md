# bf_marketing_posts

## Source
- Migration: _None_
- Model:
- Code references: app/Commands/NewsAudit.php:492, app/Commands/NewsAudit.php:493, docs/_aiops/doc-change-log.md:1520, docs/spark/categories/marketing/news-audit.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_posts` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

