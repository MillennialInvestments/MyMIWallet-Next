# bf_predictions_positions

## Source
- Migration: 2025-09-09-000050_CreatePredictionsPositions.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:33, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:38, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:49, app/Models/Predictions/PositionsModel.php:7, docs/predictions/mysql-migrations.md:84, docs/predictions/README.md:46, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:161, docs/aiops/migration_model_audit.md:158, docs/aiops/migration_model_audit.md:248, docs/_aiops/doc-change-log.md:1652

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_positions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `avg_entry_odds_bips` INT(11) NOT NULL DEFAULT 0,
  `stake_asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `stake_total` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `payout_max` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_market_id_option_id` (`user_id`, `market_id`, `option_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `option_id` (`option_id`),
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
- avg_entry_odds_bips INT(11) NOT NULL
- stake_asset VARCHAR(20) NOT NULL
- stake_total DECIMAL(20,8) NOT NULL
- payout_max DECIMAL(20,8) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id_market_id_option_id (user_id, market_id, option_id) [UNIQUE]
- user_id (user_id)
- market_id (market_id)
- option_id (option_id)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_positions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

