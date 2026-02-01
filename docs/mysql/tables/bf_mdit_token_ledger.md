# bf_mdit_token_ledger

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:72, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:91, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:174, app/Models/MDIT/MditTokenLedgerModel.php:10, docs/aiops/migration_model_audit.md:129, docs/aiops/migration_model_audit.md:236, docs/_aiops/doc-change-log.md:1568

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_token_ledger` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `token_symbol` VARCHAR(16) NOT NULL,
  `units` DECIMAL(18,8) NOT NULL,
  `nav_at_mint` DECIMAL(18,8) NULL,
  `minted_on` DATETIME NULL,
  `burned_on` DATETIME NULL,
  `source_deposit_id` INT(11) UNSIGNED NULL,
  `source_redemption_id` INT(11) UNSIGNED NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'MINTED',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `source_deposit_id` (`source_deposit_id`),
  KEY `source_redemption_id` (`source_redemption_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- wallet_address VARCHAR(128) NOT NULL
- token_symbol VARCHAR(16) NOT NULL
- units DECIMAL(18,8) NOT NULL
- nav_at_mint DECIMAL(18,8) NULL
- minted_on DATETIME NULL
- burned_on DATETIME NULL
- source_deposit_id INT(11) UNSIGNED NULL
- source_redemption_id INT(11) UNSIGNED NULL
- status VARCHAR(32) NOT NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- status (status)
- source_deposit_id (source_deposit_id)
- source_redemption_id (source_redemption_id)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_token_ledger`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_token_ledger'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_token_ledger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

