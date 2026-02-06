# bf_mdit_deposits

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:47, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:69, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:175, app/Models/MDIT/MditDepositModel.php:10, docs/codex/reviews/Spark-Analysis-2026-02-01.md:596, docs/aiops/migration_model_audit.md:124, docs/aiops/migration_model_audit.md:231, docs/_aiops/doc-change-log.md:1706

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_deposits` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `chain` VARCHAR(32) NOT NULL,
  `asset_symbol` VARCHAR(16) NOT NULL,
  `amount` DECIMAL(18,8) NOT NULL,
  `tx_hash` VARCHAR(191) NULL,
  `confirmations` INT(11) NOT NULL DEFAULT 0,
  `status` VARCHAR(32) NOT NULL DEFAULT 'CREATED',
  `idempotency_key` VARCHAR(191) NOT NULL,
  `provider_event_id` VARCHAR(191) NULL,
  `created_on` DATETIME NULL,
  `updated_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tx_hash` (`tx_hash`),
  UNIQUE KEY `idempotency_key` (`idempotency_key`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- wallet_address VARCHAR(128) NOT NULL
- chain VARCHAR(32) NOT NULL
- asset_symbol VARCHAR(16) NOT NULL
- amount DECIMAL(18,8) NOT NULL
- tx_hash VARCHAR(191) NULL
- confirmations INT(11) NOT NULL
- status VARCHAR(32) NOT NULL
- idempotency_key VARCHAR(191) NOT NULL
- provider_event_id VARCHAR(191) NULL
- created_on DATETIME NULL
- updated_on DATETIME NULL

## Required indexes
- PRIMARY (id)
- tx_hash (tx_hash) [UNIQUE]
- idempotency_key (idempotency_key) [UNIQUE]
- user_id (user_id)
- status (status)
- created_on (created_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_deposits`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_deposits'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_deposits'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

