# bf_users_budgeting_goals

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:222

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_budgeting_goals` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `goal_name` varchar(255) NOT NULL DEFAULT NULL,
  `target_amount` decimal(10,2) NOT NULL DEFAULT NULL,
  `current_savings` decimal(10,2) NULL DEFAULT 0.00,
  `status` enum('active','completed','failed') NOT NULL DEFAULT 'active',
  `target_date` date NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `description` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- goal_name varchar(255) NOT NULL
- target_amount decimal(10,2) NOT NULL
- current_savings decimal(10,2) NULL
- status enum('active','completed','failed') NOT NULL
- target_date date NOT NULL
- created_at timestamp NULL
- updated_at timestamp NULL
- description text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_budgeting_goals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting_goals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting_goals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

