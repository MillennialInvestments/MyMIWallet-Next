# bf_users_anonymous

## Source
- Migration: _None_
- Model:
- Code references: app/Models/UserModel.php:178, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:217, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:217, docs/_aiops/doc-change-log.md:2120

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_anonymous` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `anonymous_id` varchar(20) NOT NULL DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- anonymous_id varchar(20) NOT NULL
- ip_address varchar(45) NOT NULL
- created_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_anonymous`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_anonymous'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_anonymous'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

