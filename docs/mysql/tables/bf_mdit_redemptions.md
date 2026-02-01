# bf_mdit_redemptions

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:94, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:112, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:173, app/Models/MDIT/MditRedemptionModel.php:10, docs/aiops/migration_model_audit.md:128, docs/aiops/migration_model_audit.md:235, docs/_aiops/doc-change-log.md:1565

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_redemptions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `wallet_address` VARCHAR(128) NOT NULL,
  `token_units` DECIMAL(18,8) NOT NULL,
  `requested_on` DATETIME NULL,
  `approved_on` DATETIME NULL,
  `approved_by` INT(11) UNSIGNED NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'REQUESTED',
  `payout_asset` VARCHAR(32) NULL,
  `payout_amount` DECIMAL(18,8) NULL,
  `notes` VARCHAR(512) NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `requested_on` (`requested_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- wallet_address VARCHAR(128) NOT NULL
- token_units DECIMAL(18,8) NOT NULL
- requested_on DATETIME NULL
- approved_on DATETIME NULL
- approved_by INT(11) UNSIGNED NULL
- status VARCHAR(32) NOT NULL
- payout_asset VARCHAR(32) NULL
- payout_amount DECIMAL(18,8) NULL
- notes VARCHAR(512) NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- status (status)
- requested_on (requested_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_redemptions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_redemptions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_redemptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

