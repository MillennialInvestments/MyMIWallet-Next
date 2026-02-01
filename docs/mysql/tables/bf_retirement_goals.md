# bf_retirement_goals

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:184

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_retirement_goals` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `target_age` int unsigned NOT NULL DEFAULT NULL,
  `target_value` decimal(10,2) NOT NULL DEFAULT NULL,
  `current_savings` decimal(10,2) NOT NULL DEFAULT NULL,
  `monthly_contribution` decimal(10,2) NOT NULL DEFAULT NULL,
  `expected_annual_return` decimal(5,2) NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- target_age int unsigned NOT NULL
- target_value decimal(10,2) NOT NULL
- current_savings decimal(10,2) NOT NULL
- monthly_contribution decimal(10,2) NOT NULL
- expected_annual_return decimal(5,2) NOT NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_retirement_goals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_retirement_goals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_retirement_goals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

