# bf_users_sessions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/SecurityModel.php:89, docs/ops/auth/03-database.md:8, docs/ops/auth/03-database.md:19, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:250, docs/_aiops/doc-change-log.md:2003

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_sessions` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `session_id` varchar(128) NOT NULL DEFAULT NULL,
  `ip_address` varchar(64) NULL DEFAULT NULL,
  `user_agent` varchar(512) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `last_seen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `revoked_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- user_id int NOT NULL
- session_id varchar(128) NOT NULL
- ip_address varchar(64) NULL
- user_agent varchar(512) NULL
- created_at datetime NOT NULL
- last_seen datetime NOT NULL
- revoked_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_sessions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_sessions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_sessions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

