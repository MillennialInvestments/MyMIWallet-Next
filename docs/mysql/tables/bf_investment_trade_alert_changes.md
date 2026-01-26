# bf_investment_trade_alert_changes

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:1464, app/Models/AlertsModel.php:1943, app/Models/AlertsModel.php:1945, app/Models/AlertsModel.php:1951, app/Models/InvestmentModel.php:1470

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_trade_alert_changes` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `alert_id` int NOT NULL DEFAULT NULL,
  `change_type` enum('insert','update') NOT NULL DEFAULT NULL,
  `previous_status` varchar(128) NULL DEFAULT NULL,
  `new_status` varchar(128) NULL DEFAULT NULL,
  `previous_price` decimal(10,2) NULL DEFAULT NULL,
  `new_price` decimal(10,2) NULL DEFAULT NULL,
  `previous_volume` bigint NULL DEFAULT NULL,
  `new_volume` bigint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `change_detected` datetime NULL DEFAULT NULL,
  `ema_3` decimal(10,4) NULL DEFAULT NULL,
  `ema_8` decimal(10,4) NULL DEFAULT NULL,
  `ema_9` decimal(10,4) NULL DEFAULT NULL,
  `ema_13` decimal(10,4) NULL DEFAULT NULL,
  `ema_21` decimal(10,4) NULL DEFAULT NULL,
  `ema_34` decimal(10,4) NULL DEFAULT NULL,
  `ema_48` decimal(10,4) NULL DEFAULT NULL,
  `ema_100` decimal(10,4) NULL DEFAULT NULL,
  `ema_200` decimal(10,4) NULL DEFAULT NULL,
  `sma_50` decimal(10,4) NULL DEFAULT NULL,
  `sma_200` decimal(10,4) NULL DEFAULT NULL,
  `macd` decimal(10,4) NULL DEFAULT NULL,
  `rsi` decimal(10,4) NULL DEFAULT NULL,
  `volume` decimal(10,4) NULL DEFAULT NULL,
  `ema_3_8` varchar(10) NULL DEFAULT NULL,
  `ema_8_13` varchar(10) NULL DEFAULT NULL,
  `ema_13_34` varchar(10) NULL DEFAULT NULL,
  `ema_34_48` varchar(10) NULL DEFAULT NULL,
  `ema_consensus` varchar(10) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- alert_id int NOT NULL
- change_type enum('insert','update') NOT NULL
- previous_status varchar(128) NULL
- new_status varchar(128) NULL
- previous_price decimal(10,2) NULL
- new_price decimal(10,2) NULL
- previous_volume bigint NULL
- new_volume bigint NULL
- created_at timestamp NULL
- change_detected datetime NULL
- ema_3 decimal(10,4) NULL
- ema_8 decimal(10,4) NULL
- ema_9 decimal(10,4) NULL
- ema_13 decimal(10,4) NULL
- ema_21 decimal(10,4) NULL
- ema_34 decimal(10,4) NULL
- ema_48 decimal(10,4) NULL
- ema_100 decimal(10,4) NULL
- ema_200 decimal(10,4) NULL
- sma_50 decimal(10,4) NULL
- sma_200 decimal(10,4) NULL
- macd decimal(10,4) NULL
- rsi decimal(10,4) NULL
- volume decimal(10,4) NULL
- ema_3_8 varchar(10) NULL
- ema_8_13 varchar(10) NULL
- ema_13_34 varchar(10) NULL
- ema_34_48 varchar(10) NULL
- ema_consensus varchar(10) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_trade_alert_changes`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alert_changes'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alert_changes'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

