# bf_investment_signal_files

## Source
- Migration: 2026-01-17-000001_CreateInvestmentSignalsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:32, app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:63, app/Models/SignalFilesModel.php:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_signal_files` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `file_date` DATE NULL,
  `file_path` VARCHAR(255) NOT NULL,
  `file_name` VARCHAR(190) NOT NULL,
  `category` VARCHAR(64) NULL,
  `signal_type` VARCHAR(64) NULL,
  `file_hash` CHAR(64) NOT NULL,
  `rows_total` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_inserted` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_skipped` INT UNSIGNED NOT NULL DEFAULT 0,
  `processed_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_file_path_hash` (`file_path`, `file_hash`),
  KEY `week_key` (`week_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- week_key VARCHAR(8) NOT NULL
- file_date DATE NULL
- file_path VARCHAR(255) NOT NULL
- file_name VARCHAR(190) NOT NULL
- category VARCHAR(64) NULL
- signal_type VARCHAR(64) NULL
- file_hash CHAR(64) NOT NULL
- rows_total INT UNSIGNED NOT NULL
- rows_inserted INT UNSIGNED NOT NULL
- rows_skipped INT UNSIGNED NOT NULL
- processed_at DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- uq_signal_file_path_hash (file_path, file_hash) [UNIQUE]
- week_key (week_key)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_signal_files`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

