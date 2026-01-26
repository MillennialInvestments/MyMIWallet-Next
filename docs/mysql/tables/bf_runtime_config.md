# bf_runtime_config

## Source
- Migration: 2026-01-15-000100_CreateOpsFoundation.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:77, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:87, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:110, app/Models/RuntimeConfigModel.php:11, docs/ops/n8n_responsibilities.md:80, docs/codex/01_pr1_foundations.md:49

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_runtime_config` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_key` VARCHAR(191) NOT NULL,
  `config_value` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `config_key` (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- config_key VARCHAR(191) NOT NULL
- config_value LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- config_key (config_key)

## Verification
```sql
SHOW CREATE TABLE `bf_runtime_config`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

