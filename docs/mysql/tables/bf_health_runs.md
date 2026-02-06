# bf_health_runs

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:80, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:80, docs/_aiops/doc-change-log.md:1427, docs/health/health_runner_design.md:47, docs/health/health_runner_design.md:75

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_health_runs` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `rid` char(32) NOT NULL DEFAULT NULL,
  `command` varchar(190) NOT NULL DEFAULT 'health:run',
  `domain_filter` varchar(64) NULL DEFAULT NULL,
  `priority_filter` varchar(8) NULL DEFAULT NULL,
  `dry_run` tinyint(1) NOT NULL DEFAULT 1,
  `status` varchar(16) NOT NULL DEFAULT 'running',
  `total_checks` int unsigned NOT NULL DEFAULT 0,
  `pass_count` int unsigned NOT NULL DEFAULT 0,
  `fail_count` int unsigned NOT NULL DEFAULT 0,
  `warn_count` int unsigned NOT NULL DEFAULT 0,
  `skip_count` int unsigned NOT NULL DEFAULT 0,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `finished_at` datetime NULL DEFAULT NULL,
  `duration_ms` int unsigned NULL DEFAULT NULL,
  `env_json` json NULL DEFAULT NULL,
  `host` varchar(190) NULL DEFAULT NULL,
  `app_version` varchar(64) NULL DEFAULT NULL,
  `php_version` varchar(32) NULL DEFAULT NULL,
  `triggered_by_user_id` int unsigned NULL DEFAULT NULL,
  `triggered_by` varchar(32) NOT NULL DEFAULT 'cli',
  `ip_address` varchar(64) NULL DEFAULT NULL,
  `user_agent` varchar(255) NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL,
  `error_summary` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- rid char(32) NOT NULL
- command varchar(190) NOT NULL
- domain_filter varchar(64) NULL
- priority_filter varchar(8) NULL
- dry_run tinyint(1) NOT NULL
- status varchar(16) NOT NULL
- total_checks int unsigned NOT NULL
- pass_count int unsigned NOT NULL
- fail_count int unsigned NOT NULL
- warn_count int unsigned NOT NULL
- skip_count int unsigned NOT NULL
- started_at datetime NOT NULL
- finished_at datetime NULL
- duration_ms int unsigned NULL
- env_json json NULL
- host varchar(190) NULL
- app_version varchar(64) NULL
- php_version varchar(32) NULL
- triggered_by_user_id int unsigned NULL
- triggered_by varchar(32) NOT NULL
- ip_address varchar(64) NULL
- user_agent varchar(255) NULL
- notes text NULL
- error_summary text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_health_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_health_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_health_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

