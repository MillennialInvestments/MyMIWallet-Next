# Predictions Module MySQL Schema

The following MySQL statements replicate the CodeIgniter 4 migrations for the Predictions module. Execute them in order to create the required tables and indexes.

## 1. Markets Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_markets` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(160) DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `category` VARCHAR(80) NOT NULL,
  `resolution_source` VARCHAR(160) NOT NULL,
  `currency_mode` ENUM('GOLD_CENTRIC','MULTI_ASSET') NOT NULL DEFAULT 'GOLD_CENTRIC',
  `state` ENUM('DRAFT','OPEN','LOCKED','RESOLVED','CANCELED') NOT NULL DEFAULT 'DRAFT',
  `open_at` DATETIME DEFAULT NULL,
  `lock_at` DATETIME DEFAULT NULL,
  `resolve_at` DATETIME DEFAULT NULL,
  `created_by` BIGINT UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_predictions_markets_slug` (`slug`),
  KEY `idx_predictions_markets_state_category_lock` (`state`,`category`,`lock_at`,`resolve_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 2. Options Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_options` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `label` VARCHAR(120) NOT NULL,
  `odds_bips` INT UNSIGNED NOT NULL DEFAULT 5000,
  `liquidity_gold` DECIMAL(24,8) NOT NULL DEFAULT 0.00000000,
  `is_winner` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_options_market_winner` (`market_id`,`is_winner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 3. Orders Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_orders` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `option_id` BIGINT UNSIGNED NOT NULL,
  `side` ENUM('BUY','SELL') NOT NULL DEFAULT 'BUY',
  `stake_amount` DECIMAL(24,8) NOT NULL,
  `stake_asset` VARCHAR(16) NOT NULL DEFAULT 'MIMG',
  `expected_payout` DECIMAL(24,8) NOT NULL,
  `fee_bips` INT UNSIGNED NOT NULL DEFAULT 50,
  `state` ENUM('OPEN','FILLED','CANCELED','REJECTED') NOT NULL DEFAULT 'OPEN',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_orders_user_market_option_state` (`user_id`,`market_id`,`option_id`,`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 4. Trades Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_trades` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` BIGINT UNSIGNED NOT NULL,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `option_id` BIGINT UNSIGNED NOT NULL,
  `stake_asset` VARCHAR(16) NOT NULL,
  `stake_amount` DECIMAL(24,8) NOT NULL,
  `fee_amount` DECIMAL(24,8) NOT NULL DEFAULT 0.00000000,
  `fill_odds_bips` INT UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_trades_order_user_market_option` (`order_id`,`user_id`,`market_id`,`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 5. Positions Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_positions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `option_id` BIGINT UNSIGNED NOT NULL,
  `avg_entry_odds_bips` INT UNSIGNED NOT NULL,
  `stake_asset` VARCHAR(16) NOT NULL,
  `stake_total` DECIMAL(24,8) NOT NULL,
  `payout_max` DECIMAL(24,8) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_predictions_positions_user_market_option` (`user_id`,`market_id`,`option_id`),
  KEY `idx_predictions_positions_user_market_option` (`user_id`,`market_id`,`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 6. Liquidity Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_liquidity` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `option_id` BIGINT UNSIGNED NOT NULL,
  `provider_user_id` BIGINT UNSIGNED NOT NULL,
  `asset` VARCHAR(16) NOT NULL DEFAULT 'MIMG',
  `amount` DECIMAL(24,8) NOT NULL,
  `state` ENUM('ACTIVE','REMOVED') NOT NULL DEFAULT 'ACTIVE',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_liquidity_market_option_provider` (`market_id`,`option_id`,`provider_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 7. Settlements Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_settlements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `winning_option_id` BIGINT UNSIGNED DEFAULT NULL,
  `resolver_user_id` BIGINT UNSIGNED NOT NULL,
  `resolution_note` VARCHAR(255) DEFAULT NULL,
  `resolved_at` DATETIME NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_settlements_market` (`market_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## 8. Payouts Table
```sql
CREATE TABLE IF NOT EXISTS `bf_predictions_payouts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `market_id` BIGINT UNSIGNED NOT NULL,
  `position_id` BIGINT UNSIGNED NOT NULL,
  `asset` VARCHAR(16) NOT NULL,
  `amount` DECIMAL(24,8) NOT NULL,
  `status` ENUM('PENDING','SENT','FAILED') NOT NULL DEFAULT 'PENDING',
  `tx_ref` VARCHAR(191) DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_predictions_payouts_user_market_status` (`user_id`,`market_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

> **Note:** Foreign key constraints are not included because the original migrations did not declare them. Add them as needed for your deployment.
