# bf_email_drip_email_tracking

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DripCampaignModel.php:37, app/Models/DripCampaignModel.php:41, app/Models/DripCampaignModel.php:54, app/Models/DripCampaignModel.php:114, app/Models/DripCampaignModel.php:126, app/Models/DripCampaignModel.php:137, app/Models/DripCampaignModel.php:147, app/Models/DripCampaignModel.php:161, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:64, docs/_aiops/doc-change-log.md:1196

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_drip_email_tracking` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `campaign_id` int NOT NULL DEFAULT NULL,
  `step_id` int NOT NULL DEFAULT NULL,
  `message_id` varchar(255) NULL DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `opened_at` timestamp NULL DEFAULT NULL,
  `open_count` int NOT NULL DEFAULT 0,
  `first_clicked_at` timestamp NULL DEFAULT NULL,
  `last_clicked_at` timestamp NULL DEFAULT NULL,
  `click_count` int NOT NULL DEFAULT 0,
  `last_click_url` text NULL DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'sent',
  `bounce_reason` text NULL DEFAULT NULL,
  `open_rate` float NULL DEFAULT 0,
  `engagement_score` float NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int unsigned NOT NULL
- campaign_id int NOT NULL
- step_id int NOT NULL
- message_id varchar(255) NULL
- sent_at timestamp NOT NULL
- delivered_at timestamp NULL
- opened_at timestamp NULL
- open_count int NOT NULL
- first_clicked_at timestamp NULL
- last_clicked_at timestamp NULL
- click_count int NOT NULL
- last_click_url text NULL
- status varchar(50) NOT NULL
- bounce_reason text NULL
- open_rate float NULL
- engagement_score float NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_drip_email_tracking`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_email_tracking'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_email_tracking'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

