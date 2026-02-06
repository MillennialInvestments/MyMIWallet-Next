# bf_aiops_runs

## Source
- Migration: 2026-03-20-000100_CreateAiOpsEmailScanTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:21, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:43, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:108, app/Models/AiOpsRunModel.php:11, docs/ops/n8n-capabilities-for-mymiwallet.md:52, docs/aiops/scrapers/alerts-email-scan.md:16, docs/aiops/scrapers/alerts-email-scan.md:56, docs/_aiops/doc-change-log.md:1055

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `run_key` VARCHAR(64) NOT NULL,
  `mailbox` VARCHAR(190) NOT NULL,
  `source_email` VARCHAR(255) NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'running',
  `started_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  `duration_seconds` INT NULL,
  `scanned_count` INT NOT NULL DEFAULT 0,
  `processed_count` INT NOT NULL DEFAULT 0,
  `duplicate_count` INT NOT NULL DEFAULT 0,
  `ticker_count` INT NOT NULL DEFAULT 0,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `run_key` (`run_key`),
  KEY `status` (`status`),
  KEY `started_at` (`started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- run_key VARCHAR(64) NOT NULL
- mailbox VARCHAR(190) NOT NULL
- source_email VARCHAR(255) NULL
- status VARCHAR(32) NOT NULL
- started_at DATETIME NULL
- finished_at DATETIME NULL
- duration_seconds INT NULL
- scanned_count INT NOT NULL
- processed_count INT NOT NULL
- duplicate_count INT NOT NULL
- ticker_count INT NOT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- run_key (run_key)
- status (status)
- started_at (started_at)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

