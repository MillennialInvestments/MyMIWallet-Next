# bf_users_retirement

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:244

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_retirement` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `category` varchar(50) NULL DEFAULT 'Retirement',
  `current_age` int NOT NULL DEFAULT NULL,
  `retirement_age` int NOT NULL DEFAULT NULL,
  `monthly_savings` decimal(10,2) NOT NULL DEFAULT NULL,
  `current_savings` decimal(15,2) NOT NULL DEFAULT NULL,
  `target_value` decimal(15,2) NULL DEFAULT NULL,
  `annual_return_target` decimal(5,2) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int NULL DEFAULT NULL,
  `modified_by` int NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- category varchar(50) NULL
- current_age int NOT NULL
- retirement_age int NOT NULL
- monthly_savings decimal(10,2) NOT NULL
- current_savings decimal(15,2) NOT NULL
- target_value decimal(15,2) NULL
- annual_return_target decimal(5,2) NULL
- created_on datetime NULL
- modified_on datetime NULL
- created_by int NULL
- modified_by int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_retirement`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

