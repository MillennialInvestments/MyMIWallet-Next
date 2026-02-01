# bf_ai_ops_events

## Source
- Migration: 2026-01-01-000001_CreateAiOpsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:62, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:74, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:90, app/Libraries/AiOps/AiOpsManager.php:229, app/Libraries/AiOps/AiOpsManager.php:242, app/Libraries/AiOps/AiOpsManager.php:373, app/Libraries/AiOps/AiOpsManager.php:386, docs/ai-ops/observability-policy.md:6, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:24, docs/_aiops/doc-change-log.md:965, docs/spark/categories/maintenance/gap-sync.md:16

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_ops_events` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(64) NOT NULL,
  `event_type` VARCHAR(64) NOT NULL,
  `message` TEXT NULL,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem_created_at` (`subsystem`, `created_at`),
  KEY `event_type_created_at` (`event_type`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- subsystem VARCHAR(64) NOT NULL
- event_type VARCHAR(64) NOT NULL
- message TEXT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- subsystem_created_at (subsystem, created_at)
- event_type_created_at (event_type, created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_ai_ops_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

