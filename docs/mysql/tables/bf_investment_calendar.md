# bf_investment_calendar

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DashboardModel.php:104, app/Models/MarketingModel.php:1462, app/Models/InvestmentModel.php:347, app/Models/InvestmentModel.php:426, app/Models/InvestmentModel.php:563, app/Models/InvestmentModel.php:576, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:84, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:84, docs/_aiops/doc-change-log.md:1466

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_calendar` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT NULL,
  `symbol` varchar(20) NULL DEFAULT NULL,
  `event_type` varchar(100) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `event_time` time NULL DEFAULT NULL,
  `earnings_report` text NULL DEFAULT NULL,
  `percent_gain_loss` decimal(5,2) NULL DEFAULT NULL,
  `open_price` decimal(10,2) NULL DEFAULT NULL,
  `close_price` decimal(10,2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `volume` bigint NULL DEFAULT NULL,
  `previous_close` decimal(10,2) NULL DEFAULT NULL,
  `forecast` varchar(100) NULL DEFAULT NULL,
  `actual` varchar(100) NULL DEFAULT NULL,
  `difference` decimal(10,2) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- date datetime NOT NULL
- symbol varchar(20) NULL
- event_type varchar(100) NOT NULL
- description text NULL
- event_time time NULL
- earnings_report text NULL
- percent_gain_loss decimal(5,2) NULL
- open_price decimal(10,2) NULL
- close_price decimal(10,2) NULL
- created_at timestamp NULL
- volume bigint NULL
- previous_close decimal(10,2) NULL
- forecast varchar(100) NULL
- actual varchar(100) NULL
- difference decimal(10,2) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_calendar`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_calendar'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_calendar'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

