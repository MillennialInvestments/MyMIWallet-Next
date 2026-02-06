# bf_marketing_job_runs

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:125, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:125, docs/_aiops/doc-change-log.md:1631

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_job_runs` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `job` varchar(64) NOT NULL DEFAULT NULL,
  `started_at` datetime NOT NULL DEFAULT NULL,
  `finished_at` datetime NULL DEFAULT NULL,
  `status` enum('ok','warn','error') NOT NULL DEFAULT 'ok',
  `notes` varchar(1024) NULL DEFAULT NULL,
  `metrics_json` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- job varchar(64) NOT NULL
- started_at datetime NOT NULL
- finished_at datetime NULL
- status enum('ok','warn','error') NOT NULL
- notes varchar(1024) NULL
- metrics_json json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_job_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_job_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_job_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

