# bf_auth_remember_tokens

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:38, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:38, docs/_aiops/doc-change-log.md:1151

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auth_remember_tokens` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL DEFAULT NULL,
  `hashedValidator` varchar(255) NOT NULL DEFAULT NULL,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `expires` datetime NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- selector varchar(255) NOT NULL
- hashedValidator varchar(255) NOT NULL
- user_id int unsigned NOT NULL
- expires datetime NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auth_remember_tokens`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_remember_tokens'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_remember_tokens'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

