# bf_mdit_wallets

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:29, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:44, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:176, app/Models/MDIT/MditWalletModel.php:10, docs/codex/reviews/Spark-Analysis-2026-02-01.md:596, docs/aiops/migration_model_audit.md:130, docs/aiops/migration_model_audit.md:237, docs/_aiops/doc-change-log.md:1724

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_wallets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `chain` VARCHAR(32) NOT NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `status` VARCHAR(32) NOT NULL DEFAULT 'ACTIVE',
  `created_on` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wallet_address` (`wallet_address`),
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
- is_primary TINYINT(1) NOT NULL
- status VARCHAR(32) NOT NULL
- created_on DATETIME NULL

## Required indexes
- PRIMARY (id)
- wallet_address (wallet_address) [UNIQUE]
- user_id (user_id)
- status (status)
- created_on (created_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_wallets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_wallets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_wallets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

