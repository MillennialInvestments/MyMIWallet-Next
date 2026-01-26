# bf_predictions_markets

## Source
- Migration: 2025-09-09-000010_CreatePredictionsMarkets.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:36, app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:41, app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:26, app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:34, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:32, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:31, app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:28, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:25, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:48, app/Models/Predictions/MarketsModel.php:7, docs/predictions/mysql-migrations.md:7, docs/predictions/README.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_markets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(150) NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'General',
  `resolution_source` VARCHAR(150) NOT NULL DEFAULT 'Admin/Oracle',
  `currency_mode` ENUM('GOLD_CENTRIC','MULTI_ASSET') NOT NULL DEFAULT 'GOLD_CENTRIC',
  `state` ENUM('DRAFT','OPEN','LOCKED','RESOLVED','CANCELED') NOT NULL DEFAULT 'OPEN',
  `open_at` DATETIME NULL,
  `lock_at` DATETIME NULL,
  `resolve_at` DATETIME NULL,
  `created_by` INT(11) UNSIGNED NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `state` (`state`),
  KEY `category` (`category`),
  KEY `lock_at` (`lock_at`),
  KEY `created_by` (`created_by`),
  FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- slug VARCHAR(150) NULL
- title VARCHAR(255) NOT NULL
- description TEXT NULL
- category VARCHAR(100) NOT NULL
- resolution_source VARCHAR(150) NOT NULL
- currency_mode ENUM(GOLD_CENTRIC,MULTI_ASSET) NOT NULL
- state ENUM(DRAFT,OPEN,LOCKED,RESOLVED,CANCELED) NOT NULL
- open_at DATETIME NULL
- lock_at DATETIME NULL
- resolve_at DATETIME NULL
- created_by INT(11) UNSIGNED NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- slug (slug) [UNIQUE]
- state (state)
- category (category)
- lock_at (lock_at)
- created_by (created_by)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_markets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

