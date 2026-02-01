# bf_investment_stock_listing

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIInvestments.php:1657, app/Models/AccountsModel.php:442, app/Models/AccountsModel.php:535, app/Models/AccountsModel.php:542, app/Models/AlertsModel.php:83, app/Models/MyMICoinModel.php:236, app/Models/MyMICoinModel.php:242, app/Models/MyMICoinModel.php:263, app/Models/PublicModel.php:60, app/Models/TrackerModel.php:36, app/Models/TrackerModel.php:43, app/Models/TrackerModel.php:51, app/Models/WalletModel.php:514, app/Models/WalletModel.php:627, app/Models/WalletModel.php:635, app/Models/InvestmentModel.php:89, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:91, docs/_aiops/doc-change-log.md:1400

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_stock_listing` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `symbol` varchar(50) NOT NULL DEFAULT NULL,
  `company_name` varchar(255) NULL DEFAULT NULL,
  `market_cap` decimal(15,2) NULL DEFAULT NULL,
  `sector` varchar(50) NULL DEFAULT NULL,
  `industry` varchar(50) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- symbol varchar(50) NOT NULL
- company_name varchar(255) NULL
- market_cap decimal(15,2) NULL
- sector varchar(50) NULL
- industry varchar(50) NULL
- created_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_stock_listing`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_stock_listing'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_stock_listing'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

