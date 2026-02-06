# bf_ai_usage

## Source
- Migration: 2026-01-15-000100_CreateOpsFoundation.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:89, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:104, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:109, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:24, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:64, app/Libraries/DbInventory/InventoryScanner.php:14, app/Libraries/DbInventory/SqlGenerator.php:10, app/Models/AiUsageModel.php:11, docs/ops/n8n_responsibilities.md:83, docs/codex/01_pr1_foundations.md:57, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:27, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:27, docs/aiops/migration_model_audit.md:64, docs/aiops/migration_model_audit.md:221, docs/_aiops/doc-change-log.md:1040

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(150) NOT NULL,
  `action` VARCHAR(150) NULL,
  `user_id` BIGINT UNSIGNED NULL,
  `tokens_prompt` INT(11) NOT NULL DEFAULT 0,
  `tokens_completion` INT(11) NOT NULL DEFAULT 0,
  `cost_usd` DECIMAL(10,4) NOT NULL DEFAULT 0.0000,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- subsystem VARCHAR(150) NOT NULL
- action VARCHAR(150) NULL
- user_id BIGINT UNSIGNED NULL
- tokens_prompt INT(11) NOT NULL
- tokens_completion INT(11) NOT NULL
- cost_usd DECIMAL(10,4) NOT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- subsystem (subsystem)

## Verification
```sql
SHOW CREATE TABLE `bf_ai_usage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

