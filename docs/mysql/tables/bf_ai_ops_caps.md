# bf_ai_ops_caps

## Source
- Migration: 2026-01-01-000001_CreateAiOpsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:11, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:24, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:93, app/Database/Seeds/AiOpsSeeder.php:12, app/Libraries/AiOps/AiOpsManager.php:180, app/Libraries/AiOps/AiOpsManager.php:265, app/Libraries/AiOps/AiOpsManager.php:383, app/Modules/APIs/Controllers/AiOpsController.php:27, app/Modules/APIs/Controllers/AiOpsController.php:27, app/Commands/AiOpsSeed.php:26, docs/ai-ops/README.md:33, docs/ai-ops/README.md:52, docs/ai-ops/cost-budget.md:23, docs/ai-ops/observability-policy.md:13, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:23, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:23, docs/_aiops/doc-change-log.md:1028, docs/spark/categories/aiops/aiops-seed.md:13, docs/spark/categories/aiops/aiops-seed.md:31, docs/spark/categories/maintenance/gap-sync.md:16, docs/spark/roadmap.md:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_ops_caps` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(64) NOT NULL,
  `cap_type` VARCHAR(24) NOT NULL DEFAULT 'CAPACITY',
  `cap_value` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `reset_period` VARCHAR(16) NOT NULL DEFAULT 'MONTHLY',
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- subsystem VARCHAR(64) NOT NULL
- cap_type VARCHAR(24) NOT NULL
- cap_value DECIMAL(10,2) NOT NULL
- reset_period VARCHAR(16) NOT NULL
- is_enabled TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- subsystem (subsystem) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_ai_ops_caps`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

