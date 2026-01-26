# bf_investment_signals

## Source
- Migration: 2026-01-17-000001_CreateInvestmentSignalsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:57, app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:62, app/Models/SignalsModel.php:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_signals` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `signal_date` DATE NULL,
  `symbol` VARCHAR(16) NOT NULL,
  `category` VARCHAR(64) NOT NULL,
  `signal_type` VARCHAR(64) NOT NULL,
  `source` VARCHAR(32) NOT NULL DEFAULT 'csv',
  `source_file` VARCHAR(255) NULL,
  `row_hash` CHAR(64) NOT NULL,
  `score` INT UNSIGNED NOT NULL DEFAULT 50,
  `appearances` INT UNSIGNED NOT NULL DEFAULT 1,
  `metrics_json` TEXT NULL,
  `status` VARCHAR(16) NOT NULL DEFAULT 'new',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_row` (`source_file`, `row_hash`),
  KEY `week_key_symbol` (`week_key`, `symbol`),
  KEY `category_signal_type` (`category`, `signal_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- week_key VARCHAR(8) NOT NULL
- signal_date DATE NULL
- symbol VARCHAR(16) NOT NULL
- category VARCHAR(64) NOT NULL
- signal_type VARCHAR(64) NOT NULL
- source VARCHAR(32) NOT NULL
- source_file VARCHAR(255) NULL
- row_hash CHAR(64) NOT NULL
- score INT UNSIGNED NOT NULL
- appearances INT UNSIGNED NOT NULL
- metrics_json TEXT NULL
- status VARCHAR(16) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- uq_signal_row (source_file, row_hash) [UNIQUE]
- week_key_symbol (week_key, symbol)
- category_signal_type (category, signal_type)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_signals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

