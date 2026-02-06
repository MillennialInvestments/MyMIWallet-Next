# bf_projects_insurance_reserve

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:174, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:174, docs/_aiops/doc-change-log.md:1868

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_insurance_reserve` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL DEFAULT NULL,
  `token_id` int unsigned NOT NULL DEFAULT NULL,
  `policy_pct` decimal(6,3) NOT NULL DEFAULT NULL,
  `platform_units` bigint unsigned NULL DEFAULT 0,
  `creator_units` bigint unsigned NULL DEFAULT 0,
  `public_units` bigint unsigned NULL DEFAULT 0,
  `balance_units` bigint unsigned NULL DEFAULT 0,
  `balance_usd` decimal(14,2) NULL DEFAULT 0.00,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- project_id int unsigned NOT NULL
- token_id int unsigned NOT NULL
- policy_pct decimal(6,3) NOT NULL
- platform_units bigint unsigned NULL
- creator_units bigint unsigned NULL
- public_units bigint unsigned NULL
- balance_units bigint unsigned NULL
- balance_usd decimal(14,2) NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_insurance_reserve`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_insurance_reserve'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_insurance_reserve'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

