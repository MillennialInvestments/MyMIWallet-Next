# bf_projects_investments

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:175, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:175, docs/_aiops/doc-change-log.md:1871

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_investments` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `project_id` int unsigned NOT NULL DEFAULT NULL,
  `investment_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `shares` decimal(15,2) NOT NULL DEFAULT NULL,
  `status` enum('active','closed','liquidated') NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- project_id int unsigned NOT NULL
- investment_amount decimal(15,2) NOT NULL
- shares decimal(15,2) NOT NULL
- status enum('active','closed','liquidated') NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_investments`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_investments'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_investments'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

