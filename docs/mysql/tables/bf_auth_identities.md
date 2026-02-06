# bf_auth_identities

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:34, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:34, docs/_aiops/doc-change-log.md:1139

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auth_identities` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `secret` varchar(255) NOT NULL DEFAULT NULL,
  `secret2` varchar(255) NULL DEFAULT NULL,
  `expires` datetime NULL DEFAULT NULL,
  `extra` text NULL DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- type varchar(255) NOT NULL
- name varchar(255) NULL
- secret varchar(255) NOT NULL
- secret2 varchar(255) NULL
- expires datetime NULL
- extra text NULL
- force_reset tinyint(1) NOT NULL
- last_used_at datetime NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auth_identities`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_identities'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_identities'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

