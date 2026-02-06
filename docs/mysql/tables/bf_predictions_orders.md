# bf_predictions_orders

## Source
- Migration: 2025-09-09-000030_CreatePredictionsOrders.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:36, app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:41, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:30, app/Models/Predictions/OrdersModel.php:7, docs/predictions/mysql-migrations.md:46, docs/predictions/README.md:44, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:159, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:159, docs/aiops/migration_model_audit.md:156, docs/aiops/migration_model_audit.md:246, docs/_aiops/doc-change-log.md:1805

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_orders` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `side` ENUM('BUY','SELL') NOT NULL DEFAULT 'BUY',
  `stake_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `stake_asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `expected_payout` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `fee_bips` INT(11) NOT NULL DEFAULT 0,
  `state` ENUM('PENDING','FILLED','CANCELED') NOT NULL DEFAULT 'PENDING',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `option_id` (`option_id`),
  KEY `user_id_state` (`user_id`, `state`),
  KEY `market_id_state` (`market_id`, `state`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- option_id INT(11) UNSIGNED NOT NULL
- side ENUM(BUY,SELL) NOT NULL
- stake_amount DECIMAL(20,8) NOT NULL
- stake_asset VARCHAR(20) NOT NULL
- expected_payout DECIMAL(20,8) NOT NULL
- fee_bips INT(11) NOT NULL
- state ENUM(PENDING,FILLED,CANCELED) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- market_id (market_id)
- option_id (option_id)
- user_id_state (user_id, state)
- market_id_state (market_id, state)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_orders`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_orders'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

