# bf_email_bounces

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:59, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:59, docs/_aiops/doc-change-log.md:1277

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_bounces` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `email` varchar(190) NOT NULL DEFAULT NULL,
  `provider` varchar(64) NULL DEFAULT NULL,
  `event` varchar(32) NOT NULL DEFAULT NULL,
  `reason` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- user_id int NULL
- email varchar(190) NOT NULL
- provider varchar(64) NULL
- event varchar(32) NOT NULL
- reason varchar(255) NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_bounces`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_bounces'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_bounces'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

