# bf_project_comments

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:164

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_project_comments` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `comment` text NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- project_id int NOT NULL
- user_id int NOT NULL
- comment text NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_project_comments`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_project_comments'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_project_comments'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

