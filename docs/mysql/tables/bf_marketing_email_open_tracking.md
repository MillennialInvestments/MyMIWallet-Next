# bf_marketing_email_open_tracking

## Source
- Migration: _None_
- Model:
- Code references: app/Models/CampaignModel.php:131, app/Models/CampaignModel.php:152, app/Models/EmailModel.php:111, app/Models/EmailModel.php:134, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:118, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:118, docs/_aiops/doc-change-log.md:1607

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_email_open_tracking` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `campaign_id` int unsigned NOT NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT NULL,
  `opened_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- campaign_id int unsigned NOT NULL
- email varchar(255) NOT NULL
- opened_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_email_open_tracking`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_open_tracking'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_open_tracking'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

