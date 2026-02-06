# bf_investment_scanner_lineage

## Source
- Migration: 2026-03-20-000100_CreateAiOpsEmailScanTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:86, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:99, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:105, app/Models/InvestmentScannerLineageModel.php:11, docs/aiops/scrapers/alerts-email-scan.md:40

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_scanner_lineage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `scanner_key` VARCHAR(64) NOT NULL,
  `scanner_name` VARCHAR(190) NOT NULL,
  `source` VARCHAR(64) NOT NULL DEFAULT 'email',
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scanner_key_scanner_name_source` (`scanner_key`, `scanner_name`, `source`),
  KEY `scanner_key` (`scanner_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- scanner_key VARCHAR(64) NOT NULL
- scanner_name VARCHAR(190) NOT NULL
- source VARCHAR(64) NOT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- scanner_key_scanner_name_source (scanner_key, scanner_name, source) [UNIQUE]
- scanner_key (scanner_key)

## Verification
```sql
SHOW CREATE TABLE `bf_investment_scanner_lineage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scanner_lineage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scanner_lineage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

