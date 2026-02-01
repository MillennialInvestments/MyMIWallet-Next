# bf_trade_plans

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:202

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_trade_plans` (
  `id` bigint NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `symbol` varchar(16) NOT NULL DEFAULT NULL,
  `strategy` varchar(64) NOT NULL DEFAULT NULL,
  `direction` enum('LONG','SHORT') NOT NULL DEFAULT NULL,
  `entry` decimal(14,6) NOT NULL DEFAULT NULL,
  `stop_loss` decimal(14,6) NOT NULL DEFAULT NULL,
  `target_1` decimal(14,6) NULL DEFAULT NULL,
  `target_2` decimal(14,6) NULL DEFAULT NULL,
  `rr_ratio` decimal(10,4) NULL DEFAULT NULL,
  `risk_per_share` decimal(14,6) NULL DEFAULT NULL,
  `shares_total` int NULL DEFAULT NULL,
  `expected_profit_t1` decimal(14,2) NULL DEFAULT NULL,
  `expected_profit_t2` decimal(14,2) NULL DEFAULT NULL,
  `confidence_score` decimal(6,3) NOT NULL DEFAULT 0.000,
  `confirmations_json` mediumtext NULL DEFAULT NULL,
  `options_overlay_json` mediumtext NULL DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT NULL,
  `status` enum('PROPOSED','TRIGGERED','INVALID','COMPLETED') NOT NULL DEFAULT 'PROPOSED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint NOT NULL
- user_id int NOT NULL
- symbol varchar(16) NOT NULL
- strategy varchar(64) NOT NULL
- direction enum('LONG','SHORT') NOT NULL
- entry decimal(14,6) NOT NULL
- stop_loss decimal(14,6) NOT NULL
- target_1 decimal(14,6) NULL
- target_2 decimal(14,6) NULL
- rr_ratio decimal(10,4) NULL
- risk_per_share decimal(14,6) NULL
- shares_total int NULL
- expected_profit_t1 decimal(14,2) NULL
- expected_profit_t2 decimal(14,2) NULL
- confidence_score decimal(6,3) NOT NULL
- confirmations_json mediumtext NULL
- options_overlay_json mediumtext NULL
- created_on datetime NOT NULL
- updated_on datetime NULL
- status enum('PROPOSED','TRIGGERED','INVALID','COMPLETED') NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_trade_plans`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_trade_plans'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_trade_plans'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

