# bf_aiops_task_runs

## Source
- Migration: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model: app/Models/AiOpsTaskRunModel.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_task_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` BIGINT UNSIGNED NOT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'running',
  `stdout` LONGTEXT NULL,
  `stderr` LONGTEXT NULL,
  `exit_code` INT NULL,
  `result_json` JSON NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

> If your MySQL version does not support `JSON` (or you are on MariaDB), use `LONGTEXT` for `result_json` and validate payloads with `aiops_normalize_json()`.

## Required columns
- task_id BIGINT
- status VARCHAR(32)
- stdout LONGTEXT
- stderr LONGTEXT
- exit_code INT
- result_json JSON or LONGTEXT

## Required indexes
- PRIMARY KEY (`id`)
- KEY `task_id` (`task_id`)
- KEY `status` (`status`)
- KEY `created_at` (`created_at`)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_task_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_task_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```
