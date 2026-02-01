# bf_investment_forecast_history

## Source
- Migration: 2026-03-10-000100_CreateInvestmentForecastingTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:35, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:53, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:105, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:106, app/Models/InvestmentForecastHistoryModel.php:9, docs/aiops/migration_model_audit.md:118, docs/aiops/migration_model_audit.md:228, docs/_aiops/doc-change-log.md:1376, docs/forecasting/06_database_schema.md:22, docs/forecasting/06_database_schema.md:64, docs/forecasting/advanced_forecasting_overview.md:10, docs/spark/categories/forecasting/forecasts-refresh.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_forecast_history` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `forecast_id` BIGINT UNSIGNED NOT NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `timeframe` VARCHAR(16) NOT NULL,
  `forecast_direction` ENUM('bullish','bearish','neutral') NOT NULL,
  `target_price` DECIMAL(16,6) NULL,
  `range_low` DECIMAL(16,6) NULL,
  `range_high` DECIMAL(16,6) NULL,
  `confidence_score` INT(3) NOT NULL DEFAULT 0,
  `indicators_json` LONGTEXT NULL,
  `recorded_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forecast_id` (`forecast_id`),
  KEY `ticker` (`ticker`),
  KEY `recorded_at` (`recorded_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- forecast_id BIGINT UNSIGNED NOT NULL
- ticker VARCHAR(16) NOT NULL
- timeframe VARCHAR(16) NOT NULL
- forecast_direction ENUM(bullish,bearish,neutral) NOT NULL
- target_price DECIMAL(16,6) NULL
- range_low DECIMAL(16,6) NULL
- range_high DECIMAL(16,6) NULL
- confidence_score INT(3) NOT NULL
- indicators_json LONGTEXT NULL
- recorded_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- forecast_id (forecast_id)
- ticker (ticker)
- recorded_at (recorded_at)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_forecast_history`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_history'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

