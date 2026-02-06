# bf_projects_coin_redistributions

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:171, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:171, docs/_aiops/doc-change-log.md:1856

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_coin_redistributions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `token_id` int unsigned NOT NULL DEFAULT NULL,
  `reissue_units` bigint unsigned NOT NULL DEFAULT NULL,
  `factor` decimal(16,12) NOT NULL DEFAULT NULL,
  `note` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- token_id int unsigned NOT NULL
- reissue_units bigint unsigned NOT NULL
- factor decimal(16,12) NOT NULL
- note varchar(255) NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_coin_redistributions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_coin_redistributions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_coin_redistributions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

