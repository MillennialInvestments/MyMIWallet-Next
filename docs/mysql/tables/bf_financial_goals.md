# bf_financial_goals

## Source
- Migration: _None_
- Model:
- Code references: app/Models/InvestmentModel.php:1333, app/Models/InvestmentModel.php:1339, app/Models/InvestmentModel.php:1376, app/Models/InvestmentModel.php:1544

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_financial_goals` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `goal_name` varchar(255) NOT NULL DEFAULT NULL,
  `goal_type` varchar(50) NOT NULL DEFAULT NULL,
  `target_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `current_amount` decimal(15,2) NULL DEFAULT 0.00,
  `due_date` datetime NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- goal_name varchar(255) NOT NULL
- goal_type varchar(50) NOT NULL
- target_amount decimal(15,2) NOT NULL
- current_amount decimal(15,2) NULL
- due_date datetime NULL
- created_on datetime NULL
- modified_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_financial_goals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_financial_goals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_financial_goals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

