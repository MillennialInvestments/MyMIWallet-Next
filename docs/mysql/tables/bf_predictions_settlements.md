# bf_predictions_settlements

## Source
- Migration: 2025-09-09-000070_CreatePredictionsSettlementsPayouts.php
- Model:
- Code references: app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:28, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:56, docs/predictions/mysql-migrations.md:120, docs/predictions/README.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_settlements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `winning_option_id` INT(11) UNSIGNED NOT NULL,
  `resolver_user_id` INT(11) UNSIGNED NULL,
  `resolution_note` TEXT NULL,
  `resolved_at` DATETIME NOT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id` (`market_id`),
  KEY `resolver_user_id` (`resolver_user_id`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`winning_option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`resolver_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- market_id INT(11) UNSIGNED NOT NULL
- winning_option_id INT(11) UNSIGNED NOT NULL
- resolver_user_id INT(11) UNSIGNED NULL
- resolution_note TEXT NULL
- resolved_at DATETIME NOT NULL
- created_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- market_id (market_id)
- resolver_user_id (resolver_user_id)

## Verification
```sql
SHOW CREATE TABLE `bf_predictions_settlements`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

