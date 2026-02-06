# bf_exchanges_assets_ledger

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ExchangeModel.php:96, app/Models/ExchangeModel.php:114, app/Models/ExchangeModel.php:133, app/Models/ExchangeModel.php:143, app/Models/ExchangeModel.php:148, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:71, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:71, docs/_aiops/doc-change-log.md:1358

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_assets_ledger` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `beta` int NULL DEFAULT 0,
  `active` int NULL DEFAULT 1,
  `status` varchar(45) NULL DEFAULT NULL,
  `deleted` int NULL DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT NULL,
  `acquired_at` datetime NULL DEFAULT NULL,
  `lockup_until` datetime NULL DEFAULT NULL,
  `completed_on` datetime NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `project_id` int NULL DEFAULT NULL,
  `token_id` int NULL DEFAULT NULL,
  `from_token` varchar(255) NOT NULL DEFAULT NULL,
  `to_token` varchar(255) NOT NULL DEFAULT NULL,
  `amount` decimal(20,10) NOT NULL DEFAULT NULL,
  `share_units` decimal(24,8) NULL DEFAULT 0.00000000,
  `cost_basis` decimal(15,2) NULL DEFAULT 0.00,
  `fees` decimal(20,10) NOT NULL DEFAULT NULL,
  `transaction_result` text NOT NULL DEFAULT NULL,
  `suspicious` tinyint(1) NULL DEFAULT 0,
  `suspicious_reason` varchar(255) NULL DEFAULT NULL,
  `reported` int NULL DEFAULT NULL,
  `reported_at` datetime NULL DEFAULT NULL,
  `reported_by` int NULL DEFAULT NULL,
  `kyc_status` varchar(50) NULL DEFAULT NULL,
  `service_fee` decimal(10,2) NULL DEFAULT 0.00,
  `total_fee` decimal(10,2) NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- beta int NULL
- active int NULL
- status varchar(45) NULL
- deleted int NULL
- created_on datetime NOT NULL
- acquired_at datetime NULL
- lockup_until datetime NULL
- completed_on datetime NULL
- user_id int NOT NULL
- project_id int NULL
- token_id int NULL
- from_token varchar(255) NOT NULL
- to_token varchar(255) NOT NULL
- amount decimal(20,10) NOT NULL
- share_units decimal(24,8) NULL
- cost_basis decimal(15,2) NULL
- fees decimal(20,10) NOT NULL
- transaction_result text NOT NULL
- suspicious tinyint(1) NULL
- suspicious_reason varchar(255) NULL
- reported int NULL
- reported_at datetime NULL
- reported_by int NULL
- kyc_status varchar(50) NULL
- service_fee decimal(10,2) NULL
- total_fee decimal(10,2) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_assets_ledger`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets_ledger'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets_ledger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

