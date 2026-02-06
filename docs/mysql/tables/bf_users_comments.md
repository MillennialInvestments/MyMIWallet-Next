# bf_users_comments

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:726, app/Models/UserModel.php:76, app/Models/UserModel.php:133, docs/operations/05-database.md:26, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:225, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:225, docs/_aiops/doc-change-log.md:2150

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_comments` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NULL DEFAULT NULL,
  `anonymous_id` varchar(20) NULL DEFAULT NULL,
  `ticker` varchar(10) NOT NULL DEFAULT NULL,
  `comment_text` text NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id varchar(20) NULL
- anonymous_id varchar(20) NULL
- ticker varchar(10) NOT NULL
- comment_text text NOT NULL
- created_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_comments`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

