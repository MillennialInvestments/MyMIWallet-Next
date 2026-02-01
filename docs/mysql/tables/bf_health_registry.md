# bf_health_registry

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:78, docs/_aiops/doc-change-log.md:1316, docs/health/health_runner_design.md:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_health_registry` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `domain` varchar(64) NOT NULL DEFAULT 'system',
  `name` varchar(190) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'route',
  `target` varchar(255) NOT NULL DEFAULT NULL,
  `priority` varchar(8) NOT NULL DEFAULT 'P2',
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `dry_run_supported` tinyint(1) NOT NULL DEFAULT 1,
  `timeout_ms` int unsigned NOT NULL DEFAULT 15000,
  `auth_mode` varchar(32) NOT NULL DEFAULT 'none',
  `request_method` varchar(12) NULL DEFAULT NULL,
  `request_path` varchar(255) NULL DEFAULT NULL,
  `payload_json` json NULL DEFAULT NULL,
  `headers_json` json NULL DEFAULT NULL,
  `expected_status` smallint unsigned NULL DEFAULT NULL,
  `expected_json_contains` json NULL DEFAULT NULL,
  `expected_schema_json` json NULL DEFAULT NULL,
  `cooldown_seconds` int unsigned NOT NULL DEFAULT 0,
  `max_runs_per_hour` int unsigned NULL DEFAULT NULL,
  `created_by` bigint unsigned NULL DEFAULT NULL,
  `updated_by` bigint unsigned NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- domain varchar(64) NOT NULL
- name varchar(190) NOT NULL
- description text NULL
- type varchar(32) NOT NULL
- target varchar(255) NOT NULL
- priority varchar(8) NOT NULL
- enabled tinyint(1) NOT NULL
- dry_run_supported tinyint(1) NOT NULL
- timeout_ms int unsigned NOT NULL
- auth_mode varchar(32) NOT NULL
- request_method varchar(12) NULL
- request_path varchar(255) NULL
- payload_json json NULL
- headers_json json NULL
- expected_status smallint unsigned NULL
- expected_json_contains json NULL
- expected_schema_json json NULL
- cooldown_seconds int unsigned NOT NULL
- max_runs_per_hour int unsigned NULL
- created_by bigint unsigned NULL
- updated_by bigint unsigned NULL
- created_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_health_registry`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_health_registry'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_health_registry'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

