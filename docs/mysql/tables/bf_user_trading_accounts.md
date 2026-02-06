# bf_user_trading_accounts

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:211, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:211, docs/_aiops/doc-change-log.md:2096

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_trading_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `broker` varchar(64) NULL DEFAULT NULL,
  `nickname` varchar(64) NULL DEFAULT NULL,
  `account_type` varchar(32) NOT NULL DEFAULT 'EQUITIES',
  `balance` decimal(14,2) NOT NULL DEFAULT 0.00,
  `buying_power` decimal(14,2) NOT NULL DEFAULT 0.00,
  `multiplier` decimal(10,4) NOT NULL DEFAULT 1.0000,
  `max_daily_loss_amt` decimal(14,2) NULL DEFAULT NULL,
  `max_risk_per_trade_amt` decimal(14,2) NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- broker varchar(64) NULL
- nickname varchar(64) NULL
- account_type varchar(32) NOT NULL
- balance decimal(14,2) NOT NULL
- buying_power decimal(14,2) NOT NULL
- multiplier decimal(10,4) NOT NULL
- max_daily_loss_amt decimal(14,2) NULL
- max_risk_per_trade_amt decimal(14,2) NULL
- is_active tinyint(1) NOT NULL
- created_on datetime NOT NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_trading_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_trading_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_trading_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

