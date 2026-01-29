# bf_aiops_tasks

## Source
- Migration: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model: app/Models/AiOpsTaskModel.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_tasks` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_key` VARCHAR(190) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `severity` VARCHAR(8) NOT NULL DEFAULT 'P2',
  `domain` VARCHAR(64) NOT NULL,
  `prompt` TEXT NULL,
  `context_json` JSON NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'open',
  `assigned_to` VARCHAR(64) NOT NULL DEFAULT 'human',
  `locked_at` DATETIME NULL,
  `locked_by` VARCHAR(64) NULL,
  `last_error` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_key` (`task_key`),
  KEY `status` (`status`),
  KEY `locked_at` (`locked_at`),
  KEY `assigned_to` (`assigned_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

> If your MySQL version does not support `JSON` (or you are on MariaDB), use `LONGTEXT` for `context_json` and validate payloads with `aiops_normalize_json()`.

## Required columns
- task_key VARCHAR(190)
- title VARCHAR(255)
- severity VARCHAR(8)
- domain VARCHAR(64)
- prompt TEXT
- context_json JSON or LONGTEXT
- status VARCHAR(32)
- assigned_to VARCHAR(64)
- locked_at DATETIME
- locked_by VARCHAR(64)
- last_error LONGTEXT

## Required indexes
- PRIMARY KEY (`id`)
- UNIQUE KEY (`task_key`)
- KEY `status` (`status`)
- KEY `locked_at` (`locked_at`)
- KEY `assigned_to` (`assigned_to`)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_tasks`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_tasks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```
