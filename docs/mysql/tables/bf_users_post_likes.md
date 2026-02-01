# bf_users_post_likes

## Source
- Migration: _None_
- Model:
- Code references: app/Models/InvestmentModel.php:842, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:238, docs/_aiops/doc-change-log.md:1964

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_post_likes` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `submitted_date` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- post_id int NOT NULL
- user_id int NOT NULL
- submitted_date datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_post_likes`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_post_likes'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_post_likes'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

