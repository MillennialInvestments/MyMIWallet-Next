# bf_predictions_payouts

## Source
- Migration: 2025-09-09-000070_CreatePredictionsSettlementsPayouts.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:50, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:55, app/Models/Predictions/PayoutsModel.php:7, docs/predictions/mysql-migrations.md:135, docs/predictions/README.md:49, docs/predictions/README.md:112, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:136, docs/functional_inventory/docs_to_code_map.md:138

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_payouts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `position_id` INT(11) UNSIGNED NOT NULL,
  `asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `status` ENUM('PENDING','SENT','FAILED') NOT NULL DEFAULT 'PENDING',
  `tx_ref` VARCHAR(100) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `position_id` (`position_id`),
  KEY `status` (`status`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`position_id`) REFERENCES `bf_predictions_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- position_id INT(11) UNSIGNED NOT NULL
- asset VARCHAR(20) NOT NULL
- amount DECIMAL(20,8) NOT NULL
- status ENUM(PENDING,SENT,FAILED) NOT NULL
- tx_ref VARCHAR(100) NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- market_id (market_id)
- position_id (position_id)
- status (status)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_payouts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

