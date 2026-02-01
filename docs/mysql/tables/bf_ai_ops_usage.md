# bf_ai_ops_usage

## Source
- Migration: 2026-01-01-000001_CreateAiOpsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:45, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:60, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:91, app/Libraries/AiOps/AiOpsManager.php:181, app/Libraries/AiOps/AiOpsManager.php:281, app/Libraries/AiOps/AiOpsManager.php:310, app/Libraries/AiOps/AiOpsManager.php:315, app/Libraries/AiOps/AiOpsManager.php:385, docs/ai-ops/README.md:52, docs/ai-ops/observability-policy.md:11, docs/aiops/README.md:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:26, docs/_aiops/doc-change-log.md:971, docs/spark/categories/maintenance/gap-sync.md:16, docs/spark/roadmap.md:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_ops_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `month_key` CHAR(7) NOT NULL,
  `subsystem` VARCHAR(64) NOT NULL,
  `runs` INT NOT NULL DEFAULT 0,
  `runtime_seconds` INT NOT NULL DEFAULT 0,
  `requests` INT NOT NULL DEFAULT 0,
  `cache_hits` INT NOT NULL DEFAULT 0,
  `errors` INT NOT NULL DEFAULT 0,
  `capacity_used` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `month_key_subsystem` (`month_key`, `subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- month_key CHAR(7) NOT NULL
- subsystem VARCHAR(64) NOT NULL
- runs INT NOT NULL
- runtime_seconds INT NOT NULL
- requests INT NOT NULL
- cache_hits INT NOT NULL
- errors INT NOT NULL
- capacity_used DECIMAL(10,2) NOT NULL
- updated_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- month_key_subsystem (month_key, subsystem) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_ai_ops_usage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

