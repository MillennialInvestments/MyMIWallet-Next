# bf_campaign_auto_logs

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Management/Controllers/EmailController.php:56, app/Modules/Management/Controllers/EmailController.php:57, app/Modules/Management/Controllers/EmailController.php:58, app/Modules/Management/Controllers/EmailController.php:59, docs/_aiops/doc-change-log.md:1160

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_campaign_auto_logs` (
  `campaign_id` TEXT NULL,
  `created_at` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- campaign_id TEXT NULL
- created_at TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_campaign_auto_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

