# bf_users_trades_logs

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:255

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_trades_logs` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `trade_id` int NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `action` varchar(255) NULL DEFAULT NULL,
  `log_details` text NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
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
- trade_id int NOT NULL
- user_id int NOT NULL
- action varchar(255) NULL
- log_details text NULL
- created_on datetime NULL
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
SHOW CREATE TABLE `bf_users_trades_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

