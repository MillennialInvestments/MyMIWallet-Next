# bf_auth_logins

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:35, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:35, docs/_aiops/doc-change-log.md:1142

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auth_logins` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL DEFAULT NULL,
  `user_agent` varchar(255) NULL DEFAULT NULL,
  `id_type` varchar(255) NOT NULL DEFAULT NULL,
  `identifier` varchar(255) NOT NULL DEFAULT NULL,
  `user_id` int unsigned NULL DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT NULL,
  `success` tinyint(1) NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- ip_address varchar(255) NOT NULL
- user_agent varchar(255) NULL
- id_type varchar(255) NOT NULL
- identifier varchar(255) NOT NULL
- user_id int unsigned NULL
- date datetime NOT NULL
- success tinyint(1) NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auth_logins`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_logins'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_logins'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

