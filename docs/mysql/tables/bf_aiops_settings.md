# bf_aiops_settings

## Source
- Migration: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model: app/Models/AiOpsSettingsModel.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_settings` (
  `setting_key` VARCHAR(64) NOT NULL,
  `setting_value` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `updated_by` BIGINT NULL,
  PRIMARY KEY (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- setting_key VARCHAR(64)
- setting_value VARCHAR(255)

## Required indexes
- PRIMARY KEY (`setting_key`)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_settings`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_settings'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_settings'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```
