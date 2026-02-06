# bf_auth_health_runs

## Source
- Migration: 2026-02-25-000001_CreateAuthHealthRuns.php
- Model:
- Code references: app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:33, app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:38, app/Models/AuthHealthRunModel.php:11, docs/codex/reviews/Spark-Analysis-2026-02-01.md:589, docs/aiops/migration_model_audit.md:79, docs/aiops/migration_model_audit.md:223, docs/_aiops/doc-change-log.md:1136, docs/auth/auth_smoke.md:4, docs/auth/auth_smoke.md:8, docs/auth/auth_smoke.md:49, docs/spark/categories/auth/auth-smoke.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auth_health_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `run_at` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  `score` INT(11) NOT NULL DEFAULT 0,
  `summary` VARCHAR(255) NOT NULL,
  `details_json` LONGTEXT NULL,
  `duration_ms` INT(11) NOT NULL DEFAULT 0,
  `server` VARCHAR(64) NOT NULL,
  `build_tag` VARCHAR(64) NULL,
  PRIMARY KEY (`id`),
  KEY `run_at` (`run_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- run_at DATETIME NOT NULL
- status VARCHAR(10) NOT NULL
- score INT(11) NOT NULL
- summary VARCHAR(255) NOT NULL
- details_json LONGTEXT NULL
- duration_ms INT(11) NOT NULL
- server VARCHAR(64) NOT NULL
- build_tag VARCHAR(64) NULL

## Required indexes
- PRIMARY (id)
- run_at (run_at)

## Verification
```sql
SHOW CREATE TABLE `bf_auth_health_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

