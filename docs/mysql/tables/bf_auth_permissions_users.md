# bf_auth_permissions_users

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:36

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auth_permissions_users` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `permission` varchar(255) NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- permission varchar(255) NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auth_permissions_users`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_permissions_users'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_permissions_users'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

