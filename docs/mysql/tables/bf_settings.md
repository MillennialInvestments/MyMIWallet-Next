# bf_settings

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:187, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:187, docs/_aiops/doc-change-log.md:1946

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_settings` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL DEFAULT NULL,
  `key` varchar(255) NOT NULL DEFAULT NULL,
  `value` text NULL DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- class varchar(255) NOT NULL
- key varchar(255) NOT NULL
- value text NULL
- type varchar(31) NOT NULL
- context varchar(255) NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_settings`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_settings'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_settings'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

