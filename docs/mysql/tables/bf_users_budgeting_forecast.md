# bf_users_budgeting_forecast

## Source
- Migration: _None_
- Model:
- Code references: app/Models/BudgetModel.php:350, app/Models/BudgetModel.php:661, app/Models/BudgetModel.php:1294, app/Models/BudgetModel.php:1321, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:221, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:221, docs/_aiops/doc-change-log.md:2138

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_budgeting_forecast` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `forecast_date` varchar(45) NULL DEFAULT NULL,
  `month` varchar(16) NOT NULL DEFAULT NULL,
  `income` decimal(10,2) NULL DEFAULT 0.00,
  `expenses` decimal(10,2) NULL DEFAULT 0.00,
  `disposable_income` decimal(10,2) NULL DEFAULT NULL STORED GENERATED,
  `investment_opportunity_flag` tinyint(1) NULL DEFAULT 0,
  `advisor_notes` text NULL DEFAULT NULL,
  `recommendation_score` decimal(5,2) NULL DEFAULT NULL,
  `risk_rating` varchar(32) NULL DEFAULT NULL,
  `synced_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- forecast_date varchar(45) NULL
- month varchar(16) NOT NULL
- income decimal(10,2) NULL
- expenses decimal(10,2) NULL
- disposable_income decimal(10,2) NULL
- investment_opportunity_flag tinyint(1) NULL
- advisor_notes text NULL
- recommendation_score decimal(5,2) NULL
- risk_rating varchar(32) NULL
- synced_on datetime NULL
- created_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_budgeting_forecast`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting_forecast'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting_forecast'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

