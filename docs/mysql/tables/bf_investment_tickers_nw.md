# bf_investment_tickers_nw

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:2804

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_tickers_nw` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `symbol` varchar(16) NOT NULL DEFAULT NULL,
  `source` varchar(64) NULL DEFAULT 'AlphaVantage',
  `reason` text NULL DEFAULT NULL,
  `failure_count` int NULL DEFAULT 1,
  `first_detected` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `last_detected` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- symbol varchar(16) NOT NULL
- source varchar(64) NULL
- reason text NULL
- failure_count int NULL
- first_detected datetime NULL
- last_detected datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_tickers_nw`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers_nw'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_tickers_nw'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

