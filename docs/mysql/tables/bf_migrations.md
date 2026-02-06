# bf_migrations

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:146, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:146, docs/_aiops/doc-change-log.md:1733

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_migrations` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL DEFAULT NULL,
  `class` varchar(255) NOT NULL DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT NULL,
  `namespace` varchar(255) NOT NULL DEFAULT NULL,
  `time` int NOT NULL DEFAULT NULL,
  `batch` int unsigned NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- version varchar(255) NOT NULL
- class varchar(255) NOT NULL
- group varchar(255) NOT NULL
- namespace varchar(255) NOT NULL
- time int NOT NULL
- batch int unsigned NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_migrations`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_migrations'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_migrations'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

