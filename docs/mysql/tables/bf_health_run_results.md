# bf_health_run_results

## Source
- Migration: _None_
- Model:
- Code references: docs/health/health_runner_design.md:47, docs/health/health_runner_design.md:78

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_health_run_results` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `run_id` bigint unsigned NOT NULL DEFAULT NULL,
  `registry_id` bigint unsigned NOT NULL DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'unknown',
  `attempts` int unsigned NOT NULL DEFAULT 1,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `finished_at` datetime NULL DEFAULT NULL,
  `duration_ms` int unsigned NULL DEFAULT NULL,
  `http_status` smallint unsigned NULL DEFAULT NULL,
  `error_code` varchar(64) NULL DEFAULT NULL,
  `error_message` text NULL DEFAULT NULL,
  `assertions_json` json NULL DEFAULT NULL,
  `request_debug_json` json NULL DEFAULT NULL,
  `response_debug_json` json NULL DEFAULT NULL,
  `domain` varchar(64) NULL DEFAULT NULL,
  `priority` varchar(8) NULL DEFAULT NULL,
  `type` varchar(32) NULL DEFAULT NULL,
  `target` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- run_id bigint unsigned NOT NULL
- registry_id bigint unsigned NOT NULL
- status varchar(16) NOT NULL
- attempts int unsigned NOT NULL
- started_at datetime NOT NULL
- finished_at datetime NULL
- duration_ms int unsigned NULL
- http_status smallint unsigned NULL
- error_code varchar(64) NULL
- error_message text NULL
- assertions_json json NULL
- request_debug_json json NULL
- response_debug_json json NULL
- domain varchar(64) NULL
- priority varchar(8) NULL
- type varchar(32) NULL
- target varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_health_run_results`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_health_run_results'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_health_run_results'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

