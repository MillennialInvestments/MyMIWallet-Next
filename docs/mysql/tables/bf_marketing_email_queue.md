# bf_marketing_email_queue

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Marketing/EmailQueueModel.php:10, app/Models/CampaignModel.php:126, app/Models/CampaignModel.php:135, app/Models/CampaignModel.php:148, app/Models/CampaignModel.php:156, app/Models/EmailModel.php:30, app/Models/EmailModel.php:106, app/Models/EmailModel.php:115, app/Models/EmailModel.php:126, app/Models/EmailModel.php:130, app/Models/EmailModel.php:141, app/Models/EmailModel.php:158, app/Models/EmailModel.php:192, app/Models/EmailModel.php:202, app/Models/EmailModel.php:210, app/Models/EmailModel.php:228, app/Models/EmailModel.php:251, app/Models/EmailModel.php:268, app/Models/EmailModel.php:273, app/Models/MarketingModel.php:1104, app/Models/MarketingModel.php:1602, app/Models/MarketingModel.php:1990, app/Models/MarketingModel.php:1998, app/Models/MarketingModel.php:2056, app/Services/EmailService.php:62, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:119, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:119, docs/aiops/migration_model_audit.md:136, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1610

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_email_queue` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `campaign_id` int unsigned NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT NULL,
  `subject` varchar(255) NOT NULL DEFAULT NULL,
  `content` text NOT NULL DEFAULT NULL,
  `status` enum('pending','sent') NULL DEFAULT 'pending',
  `opened` int NULL DEFAULT 0,
  `open_tracking_id` int unsigned NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `preferred_send_time` time NULL DEFAULT NULL,
  `unsubscribe_token` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- campaign_id int unsigned NULL
- email varchar(255) NOT NULL
- subject varchar(255) NOT NULL
- content text NOT NULL
- status enum('pending','sent') NULL
- opened int NULL
- open_tracking_id int unsigned NULL
- scheduled_at datetime NULL
- created_at datetime NULL
- updated_at datetime NULL
- preferred_send_time time NULL
- unsubscribe_token varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_email_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

