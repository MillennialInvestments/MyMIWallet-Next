# bf_investment_ticker_daily_counts

## Source
- Migration: 2026-03-20-000100_CreateAiOpsEmailScanTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:68, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:83, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:106, app/Models/InvestmentTickerDailyCountModel.php:11, docs/aiops/scrapers/alerts-email-scan.md:32

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_ticker_daily_counts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticker` VARCHAR(16) NOT NULL,
  `scan_date` DATE NOT NULL,
  `source` VARCHAR(64) NOT NULL DEFAULT 'email',
  `scanner_key` VARCHAR(64) NOT NULL DEFAULT '',
  `occurrences` INT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticker_scan_date_source_scanner_key` (`ticker`, `scan_date`, `source`, `scanner_key`),
  KEY `scan_date` (`scan_date`),
  KEY `scanner_key` (`scanner_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- ticker VARCHAR(16) NOT NULL
- scan_date DATE NOT NULL
- source VARCHAR(64) NOT NULL
- scanner_key VARCHAR(64) NOT NULL
- occurrences INT UNSIGNED NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- ticker_scan_date_source_scanner_key (ticker, scan_date, source, scanner_key) [UNIQUE]
- scan_date (scan_date)
- scanner_key (scanner_key)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_ticker_daily_counts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_ticker_daily_counts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_ticker_daily_counts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

