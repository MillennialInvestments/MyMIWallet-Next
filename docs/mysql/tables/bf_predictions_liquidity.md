# bf_predictions_liquidity

## Source
- Migration: 2025-09-09-000060_CreatePredictionsLiquidity.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:31, app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:36, app/Models/Predictions/LiquidityModel.php:7, docs/predictions/mysql-migrations.md:103, docs/predictions/README.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:156, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:156, docs/aiops/migration_model_audit.md:153, docs/aiops/migration_model_audit.md:243, docs/_aiops/doc-change-log.md:1796

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_liquidity` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `provider_user_id` INT(11) UNSIGNED NOT NULL,
  `asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `state` ENUM('ACTIVE','REMOVED') NOT NULL DEFAULT 'ACTIVE',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id_option_id` (`market_id`, `option_id`),
  KEY `provider_user_id` (`provider_user_id`),
  KEY `state` (`state`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- option_id INT(11) UNSIGNED NOT NULL
- provider_user_id INT(11) UNSIGNED NOT NULL
- asset VARCHAR(20) NOT NULL
- amount DECIMAL(20,8) NOT NULL
- state ENUM(ACTIVE,REMOVED) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- market_id_option_id (market_id, option_id)
- provider_user_id (provider_user_id)
- state (state)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_liquidity`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

