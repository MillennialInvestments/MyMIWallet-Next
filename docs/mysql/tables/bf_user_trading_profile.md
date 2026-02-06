# bf_user_trading_profile

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:212, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:212, docs/_aiops/doc-change-log.md:2099

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_trading_profile` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `daily_min_target` decimal(12,2) NOT NULL DEFAULT 0.00,
  `max_risk_per_trade_pct` decimal(6,3) NOT NULL DEFAULT 0.250,
  `max_daily_loss_pct` decimal(6,3) NOT NULL DEFAULT 1.000,
  `preferred_strategy` varchar(64) NOT NULL DEFAULT 'OPENING_BREAK_15',
  `timezone` varchar(64) NOT NULL DEFAULT 'America/Chicago',
  `enable_options_overlay` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- daily_min_target decimal(12,2) NOT NULL
- max_risk_per_trade_pct decimal(6,3) NOT NULL
- max_daily_loss_pct decimal(6,3) NOT NULL
- preferred_strategy varchar(64) NOT NULL
- timezone varchar(64) NOT NULL
- enable_options_overlay tinyint(1) NOT NULL
- created_on datetime NOT NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_trading_profile`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_trading_profile'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_trading_profile'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

