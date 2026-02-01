# bf_predictions_trades

## Source
- Migration: 2025-09-09-000040_CreatePredictionsTrades.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:34, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:39, app/Models/Predictions/TradesModel.php:7, app/_legacy/Models/Predictions/SettlementsModel.php:7, docs/predictions/mysql-migrations.md:66, docs/predictions/README.md:45, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:163, docs/aiops/migration_model_audit.md:159, docs/aiops/migration_model_audit.md:249, docs/_aiops/doc-change-log.md:1658

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_trades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) UNSIGNED NOT NULL,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `stake_asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `stake_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `fee_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `fill_odds_bips` INT(11) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `option_id` (`option_id`),
  FOREIGN KEY (`order_id`) REFERENCES `bf_predictions_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- order_id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- option_id INT(11) UNSIGNED NOT NULL
- stake_asset VARCHAR(20) NOT NULL
- stake_amount DECIMAL(20,8) NOT NULL
- fee_amount DECIMAL(20,8) NOT NULL
- fill_odds_bips INT(11) NOT NULL
- created_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- order_id (order_id)
- user_id (user_id)
- market_id (market_id)
- option_id (option_id)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_trades`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

