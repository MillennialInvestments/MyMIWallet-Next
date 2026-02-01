# bf_investment_strategies

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIInvestments.php:1499, app/Libraries/MyMIInvestments.php:1507, app/Libraries/MyMIInvestments.php:1557, app/Libraries/MyMIInvestments.php:1565, app/Libraries/MyMIInvestments.php:1572, app/Models/InvestmentModel.php:1327, app/Models/InvestmentModel.php:1346, app/Models/InvestmentModel.php:1444, app/Models/InvestmentModel.php:1566, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:92, docs/_aiops/doc-change-log.md:1403

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_strategies` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `strategy_name` varchar(255) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- strategy_name varchar(255) NOT NULL
- description text NULL
- created_on datetime NULL
- modified_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_strategies`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_strategies'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_strategies'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

