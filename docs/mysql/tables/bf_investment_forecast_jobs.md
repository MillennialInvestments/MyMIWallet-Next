# bf_investment_forecast_jobs

## Source
- Migration: 2026-03-10-000100_CreateInvestmentForecastingTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:56, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:72, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:108, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:109, app/Services/Forecasting/MyMIForecaster.php:155, app/Services/Forecasting/MyMIForecaster.php:171, app/Services/Forecasting/MyMIForecaster.php:191, app/Services/Forecasting/MyMIForecaster.php:201, app/Services/Forecasting/MyMIForecaster.php:209, docs/_aiops/doc-change-log.md:1379, docs/forecasting/06_database_schema.md:38, docs/forecasting/07_integration_points.md:29, docs/spark/categories/forecasting/forecasts-refresh.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_forecast_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `alert_id` BIGINT UNSIGNED NULL,
  `ticker` VARCHAR(16) NOT NULL,
  `status` VARCHAR(16) NOT NULL DEFAULT 'queued',
  `attempts` INT(3) NOT NULL DEFAULT 0,
  `run_after` DATETIME NULL,
  `payload_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `alert_id` (`alert_id`),
  KEY `status` (`status`),
  KEY `run_after` (`run_after`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- alert_id BIGINT UNSIGNED NULL
- ticker VARCHAR(16) NOT NULL
- status VARCHAR(16) NOT NULL
- attempts INT(3) NOT NULL
- run_after DATETIME NULL
- payload_json LONGTEXT NULL
- created_at DATETIME NOT NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- alert_id (alert_id)
- status (status)
- run_after (run_after)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_forecast_jobs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_jobs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_forecast_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

