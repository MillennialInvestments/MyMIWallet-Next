# bf_ops_queue

## Source
- Migration: 2026-01-15-000100_CreateOpsFoundation.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:36, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:52, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:112, app/Libraries/Ops/OpsJobRegistry.php:492, app/Libraries/Ops/OpsJobRegistry.php:502, app/Models/OpsQueueModel.php:12, docs/ops/n8n_responsibilities.md:81, docs/codex/01_pr1_foundations.md:37, docs/codex/01_pr1_foundations.md:86, docs/codex/01_pr1_foundations.md:123, docs/codex/01_pr1_foundations.md:144, docs/codex/02_pr2_worker_and_registry.md:71, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:153, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:153, docs/aiops/migration_model_audit.md:147, docs/aiops/migration_model_audit.md:241, docs/_aiops/doc-change-log.md:1766, docs/health/health_test_checklist.md:644, docs/health/modules/system_ops.md:62

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_queue` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `payload_json` LONGTEXT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `locked_until` DATETIME NULL,
  `last_error` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `job_key` (`job_key`),
  KEY `locked_until` (`locked_until`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- job_key VARCHAR(150) NOT NULL
- payload_json LONGTEXT NULL
- status VARCHAR(50) NOT NULL
- attempts INT(11) NOT NULL
- locked_until DATETIME NULL
- last_error LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- status (status)
- job_key (job_key)
- locked_until (locked_until)

## Verification
```sql
SHOW CREATE TABLE `bf_ops_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

