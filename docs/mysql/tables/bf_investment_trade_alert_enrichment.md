# bf_investment_trade_alert_enrichment

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:1646

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_trade_alert_enrichment` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- symbol varchar(10) NULL
- summary text NULL
- keywords text NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_trade_alert_enrichment`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alert_enrichment'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alert_enrichment'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

