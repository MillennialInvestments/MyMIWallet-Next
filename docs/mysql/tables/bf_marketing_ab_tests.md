# bf_marketing_ab_tests

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:104, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:104, docs/_aiops/doc-change-log.md:1562

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_ab_tests` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `name` varchar(128) NOT NULL DEFAULT NULL,
  `status` enum('active','paused','completed') NOT NULL DEFAULT 'active',
  `metric` enum('ctr','engagement_rate') NOT NULL DEFAULT 'ctr',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- platform varchar(32) NOT NULL
- name varchar(128) NOT NULL
- status enum('active','paused','completed') NOT NULL
- metric enum('ctr','engagement_rate') NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_ab_tests`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ab_tests'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ab_tests'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

