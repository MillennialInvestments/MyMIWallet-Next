# bf_posts

## Source
- Migration: _None_
- Model:
- Code references: app/Services/SearchService.php:54, app/Services/SearchService.php:55

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_posts` (
  `status` TEXT NULL,
  `title` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- status TEXT NULL
- title TEXT NULL
- created_at TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

