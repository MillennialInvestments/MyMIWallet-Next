# bf_project_task_registry

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:167, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:167, docs/_aiops/doc-change-log.md:1838

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_project_task_registry` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_name` varchar(120) NOT NULL DEFAULT NULL,
  `category` varchar(64) NOT NULL DEFAULT NULL,
  `subcategory` varchar(64) NULL DEFAULT NULL,
  `component` varchar(128) NOT NULL DEFAULT NULL,
  `description` mediumtext NULL DEFAULT NULL,
  `status` enum('Active','Planned','Deprecated','Blocked','Implied','In Progress','Completed') NOT NULL DEFAULT 'Planned',
  `priority` tinyint unsigned NOT NULL DEFAULT 3,
  `blast_radius` enum('module','shared','global') NOT NULL DEFAULT 'module',
  `environment` enum('local','staging','prod','unknown') NOT NULL DEFAULT 'unknown',
  `primary_files` text NULL DEFAULT NULL,
  `notes` mediumtext NULL DEFAULT NULL,
  `tags_json` json NULL DEFAULT NULL,
  `external_ref` varchar(191) NULL DEFAULT NULL,
  `source` enum('manual','chatgpt','codex','email','log_triage','import') NOT NULL DEFAULT 'manual',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_run_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- project_name varchar(120) NOT NULL
- category varchar(64) NOT NULL
- subcategory varchar(64) NULL
- component varchar(128) NOT NULL
- description mediumtext NULL
- status enum('Active','Planned','Deprecated','Blocked','Implied','In Progress','Completed') NOT NULL
- priority tinyint unsigned NOT NULL
- blast_radius enum('module','shared','global') NOT NULL
- environment enum('local','staging','prod','unknown') NOT NULL
- primary_files text NULL
- notes mediumtext NULL
- tags_json json NULL
- external_ref varchar(191) NULL
- source enum('manual','chatgpt','codex','email','log_triage','import') NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NULL
- last_run_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_project_task_registry`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_project_task_registry'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_project_task_registry'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

