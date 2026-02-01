# bf_predictions_options

## Source
- Migration: 2025-09-09-000020_CreatePredictionsOptions.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:27, app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:32, app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:35, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:33, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:32, app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:29, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:26, app/Models/Predictions/OptionsModel.php:7, docs/predictions/mysql-migrations.md:30, docs/predictions/README.md:43, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:158, docs/aiops/migration_model_audit.md:155, docs/aiops/migration_model_audit.md:245, docs/_aiops/doc-change-log.md:1643

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_options` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `label` VARCHAR(150) NOT NULL,
  `odds_bips` INT(11) NOT NULL DEFAULT 0,
  `liquidity_gold` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `is_winner` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id_label` (`market_id`, `label`),
  KEY `is_winner` (`is_winner`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- label VARCHAR(150) NOT NULL
- odds_bips INT(11) NOT NULL
- liquidity_gold DECIMAL(20,8) NOT NULL
- is_winner TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- market_id_label (market_id, label)
- is_winner (is_winner)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_options`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

