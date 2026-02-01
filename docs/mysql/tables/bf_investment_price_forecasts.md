# bf_investment_price_forecasts

## Source
- Migration: 2026-03-10-000100_CreateInvestmentForecastingTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:11, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:32, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:102, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:103, app/Models/InvestmentPriceForecastModel.php:9, docs/aiops/migration_model_audit.md:120, docs/aiops/migration_model_audit.md:229, docs/_aiops/doc-change-log.md:1388, docs/forecasting/01_data_flow.md:20, docs/forecasting/03_analysis_modules.md:51, docs/forecasting/06_database_schema.md:3, docs/forecasting/06_database_schema.md:27, docs/forecasting/06_database_schema.md:62, docs/forecasting/06_database_schema.md:63, docs/forecasting/advanced_forecasting_overview.md:9, docs/spark/categories/forecasting/forecasts-refresh.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_price_forecasts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `alert_id` BIGINT UNSIGNED NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `signal_score` DECIMAL(10,4) NULL,
  `indicators_json` LONGTEXT NULL,
  `data_source` VARCHAR(32) NOT NULL DEFAULT 'alphavantage',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `ticker_timeframe` (`ticker`, `timeframe`),
  KEY `alert_id` (`alert_id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- alert_id BIGINT UNSIGNED NULL
- ticker VARCHAR(16) NOT NULL
- timeframe VARCHAR(16) NOT NULL
- forecast_direction ENUM(bullish,bearish,neutral) NOT NULL
- target_price DECIMAL(16,6) NULL
- range_low DECIMAL(16,6) NULL
- range_high DECIMAL(16,6) NULL
- confidence_score INT(3) NOT NULL
- signal_score DECIMAL(10,4) NULL
- indicators_json LONGTEXT NULL
- data_source VARCHAR(32) NOT NULL
- created_at DATETIME NOT NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- ticker_timeframe (ticker, timeframe)
- alert_id (alert_id)
- created_at (created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_price_forecasts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_price_forecasts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_price_forecasts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

