# bf_users_retirement_plans

## Source
- Migration: _None_
- Model:
- Code references: app/Models/InvestmentModel.php:596, app/Models/InvestmentModel.php:1289, app/Models/InvestmentModel.php:1299, app/Models/InvestmentModel.php:1319, app/Models/InvestmentModel.php:1518, app/Models/InvestmentModel.php:1525, app/Models/InvestmentModel.php:1527, app/Models/InvestmentModel.php:1552

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_retirement_plans` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `investment_id` int NOT NULL DEFAULT NULL,
  `target_amount` decimal(18,2) NOT NULL DEFAULT NULL,
  `retirement_date` date NOT NULL DEFAULT NULL,
  `current_progress` decimal(18,2) NULL DEFAULT 0.00,
  `status` enum('Active','Completed','Cancelled') NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- investment_id int NOT NULL
- target_amount decimal(18,2) NOT NULL
- retirement_date date NOT NULL
- current_progress decimal(18,2) NULL
- status enum('Active','Completed','Cancelled') NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_retirement_plans`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_plans'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_plans'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

