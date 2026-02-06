# bf_investment_technical_snapshots

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:1520, app/Services/TechnicalSnapshotService.php:47, app/Services/TechnicalSnapshotService.php:84, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:93, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:93, docs/_aiops/doc-change-log.md:1511

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_technical_snapshots` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `ticker` varchar(10) NOT NULL DEFAULT NULL,
  `snapshot_date` date NOT NULL DEFAULT NULL,
  `ema_3` decimal(10,4) NULL DEFAULT NULL,
  `ema_8` decimal(10,4) NULL DEFAULT NULL,
  `ema_13` decimal(10,4) NULL DEFAULT NULL,
  `ema_21` decimal(10,4) NULL DEFAULT NULL,
  `ema_34` decimal(10,4) NULL DEFAULT NULL,
  `ema_48` decimal(10,4) NULL DEFAULT NULL,
  `ema_analysis` varchar(128) NULL DEFAULT '',
  `sma_50` decimal(10,4) NULL DEFAULT NULL,
  `sma_200` decimal(10,4) NULL DEFAULT NULL,
  `ross_analysis` varchar(128) NULL DEFAULT '',
  `rsi` decimal(5,2) NULL DEFAULT NULL,
  `macd` decimal(10,4) NULL DEFAULT NULL,
  `macd_signal` decimal(10,4) NULL DEFAULT NULL,
  `bollinger_band_width` decimal(10,4) NULL DEFAULT NULL,
  `adx` decimal(10,4) NULL DEFAULT NULL,
  `stochastic_k` decimal(10,4) NULL DEFAULT NULL,
  `stochastic_d` decimal(10,4) NULL DEFAULT NULL,
  `gap_up_flag` tinyint(1) NULL DEFAULT 0,
  `news_sentiment` varchar(32) NULL DEFAULT NULL,
  `volume` bigint NULL DEFAULT NULL,
  `volume_usd` bigint NULL DEFAULT NULL,
  `price` decimal(10,4) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- ticker varchar(10) NOT NULL
- snapshot_date date NOT NULL
- ema_3 decimal(10,4) NULL
- ema_8 decimal(10,4) NULL
- ema_13 decimal(10,4) NULL
- ema_21 decimal(10,4) NULL
- ema_34 decimal(10,4) NULL
- ema_48 decimal(10,4) NULL
- ema_analysis varchar(128) NULL
- sma_50 decimal(10,4) NULL
- sma_200 decimal(10,4) NULL
- ross_analysis varchar(128) NULL
- rsi decimal(5,2) NULL
- macd decimal(10,4) NULL
- macd_signal decimal(10,4) NULL
- bollinger_band_width decimal(10,4) NULL
- adx decimal(10,4) NULL
- stochastic_k decimal(10,4) NULL
- stochastic_d decimal(10,4) NULL
- gap_up_flag tinyint(1) NULL
- news_sentiment varchar(32) NULL
- volume bigint NULL
- volume_usd bigint NULL
- price decimal(10,4) NULL
- created_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_technical_snapshots`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_technical_snapshots'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_technical_snapshots'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

