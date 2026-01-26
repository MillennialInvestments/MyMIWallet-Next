# bf_users_goal_completions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/BudgetModel.php:671, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:674, app/Models/DashboardModel.php:141, app/Models/DashboardModel.php:147, app/Modules/User/Views/Dashboard/Goals/Daily/browser_table.php:84

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_goal_completions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `goal_id` int NOT NULL DEFAULT NULL,
  `completion_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `reward_transferred` tinyint(1) NULL DEFAULT 0,
  `transaction_id` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- goal_id int NOT NULL
- completion_date timestamp NULL
- reward_transferred tinyint(1) NULL
- transaction_id varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_goal_completions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

