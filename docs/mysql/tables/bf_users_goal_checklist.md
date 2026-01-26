# bf_users_goal_checklist

## Source
- Migration: _None_
- Model:
- Code references: app/Models/BudgetModel.php:670, app/Models/BudgetModel.php:671, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:673, app/Models/DashboardModel.php:117, app/Models/DashboardModel.php:122, app/Models/DashboardModel.php:131, app/Models/DashboardModel.php:136, app/Models/GoalsModel.php:10

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_goal_checklist` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` int NULL DEFAULT NULL,
  `active` int NULL DEFAULT NULL,
  `order_id` int NOT NULL DEFAULT NULL,
  `category` varchar(128) NULL DEFAULT NULL,
  `goal_type` enum('daily','weekly','monthly') NOT NULL DEFAULT NULL,
  `goal_description` text NULL DEFAULT NULL,
  `goal_completion_status` tinyint(1) NULL DEFAULT 0,
  `gold_reward` decimal(10,2) NOT NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `frequency` varchar(128) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `difficulty_level` varchar(128) NULL DEFAULT NULL,
  `sequence_order` varchar(128) NULL DEFAULT NULL,
  `max_redemption_times` varchar(128) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status int NULL
- active int NULL
- order_id int NOT NULL
- category varchar(128) NULL
- goal_type enum('daily','weekly','monthly') NOT NULL
- goal_description text NULL
- goal_completion_status tinyint(1) NULL
- gold_reward decimal(10,2) NOT NULL
- start_date date NULL
- end_date date NULL
- frequency varchar(128) NULL
- created_at timestamp NULL
- updated_at timestamp NULL
- difficulty_level varchar(128) NULL
- sequence_order varchar(128) NULL
- max_redemption_times varchar(128) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_goal_checklist`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

