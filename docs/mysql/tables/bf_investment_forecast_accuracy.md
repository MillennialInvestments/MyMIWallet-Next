# bf_investment_forecast_accuracy

## Source
- Migration: 2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php
- Model:
- Code references: app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:11, app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:38, app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:44, app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php:45, app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:11, app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:31, app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:37, app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php:38, app/Models/InvestmentForecastAccuracyModel.php:9, docs/forecasting/advanced_forecasting_overview.md:11, docs/forecasting/forecast_accuracy_tracking.md:33

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_forecast_accuracy` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `forecast_id` BIGINT UNSIGNED NOT NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `evaluation_window` INT(6) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `hit_result` VARCHAR(16) NOT NULL DEFAULT 'unknown',
  `mfe` DECIMAL(16,6) NULL,
  `mae` DECIMAL(16,6) NULL,
  `window_start` DATETIME NULL,
  `window_end` DATETIME NULL,
  `evaluated_at` DATETIME NULL,
  `notes` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forecast_id` (`forecast_id`),
  KEY `ticker` (`ticker`),
  KEY `timeframe` (`timeframe`),
  KEY `evaluation_window` (`evaluation_window`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- forecast_id BIGINT UNSIGNED NOT NULL
- ticker VARCHAR(16) NOT NULL
- timeframe VARCHAR(16) NOT NULL
- evaluation_window INT(6) NOT NULL
- forecast_direction ENUM(bullish,bearish,neutral) NOT NULL
- confidence_score INT(3) NOT NULL
- target_price DECIMAL(16,6) NULL
- range_low DECIMAL(16,6) NULL
- range_high DECIMAL(16,6) NULL
- hit_result VARCHAR(16) NOT NULL
- mfe DECIMAL(16,6) NULL
- mae DECIMAL(16,6) NULL
- window_start DATETIME NULL
- window_end DATETIME NULL
- evaluated_at DATETIME NULL
- notes TEXT NULL
- created_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- forecast_id (forecast_id)
- ticker (ticker)
- timeframe (timeframe)
- evaluation_window (evaluation_window)
- created_at (created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_forecast_accuracy`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_accuracy'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_accuracy'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

