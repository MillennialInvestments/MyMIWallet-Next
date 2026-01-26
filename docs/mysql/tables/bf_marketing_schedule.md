# bf_marketing_schedule

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:105, app/Models/MarketingModel.php:232, app/Models/MarketingModel.php:1064, app/Models/MarketingModel.php:1233, app/Models/MarketingModel.php:1450, app/Models/MarketingModel.php:1611, app/Models/MarketingModel.php:2427, app/Models/MarketingModel.php:2437, app/Services/DripCampaignService.php:157

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_schedule` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `post_date` date NOT NULL DEFAULT NULL,
  `schedule_time` datetime NULL DEFAULT NULL,
  `platform` varchar(50) NOT NULL DEFAULT NULL,
  `delivery_channel` varchar(50) NULL DEFAULT 'email',
  `subscriber_id` int NULL DEFAULT NULL,
  `campaign_id` int NULL DEFAULT NULL,
  `content_subject` varchar(255) NOT NULL DEFAULT NULL,
  `content_description` text NULL DEFAULT NULL,
  `content_script` longtext NULL DEFAULT NULL,
  `content_blob` longtext NULL DEFAULT NULL,
  `content_link` text NULL DEFAULT NULL,
  `additional_links` json NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `completed` int NULL DEFAULT NULL,
  `zapier_webhook_url` text NULL DEFAULT NULL,
  `dispatch_type` enum('manual','drip','auto') NULL DEFAULT 'manual',
  `post_status` enum('pending','scheduled','posted','failed') NULL DEFAULT 'pending',
  `retry_count` int NULL DEFAULT 0,
  `last_attempt_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- post_date date NOT NULL
- schedule_time datetime NULL
- platform varchar(50) NOT NULL
- delivery_channel varchar(50) NULL
- subscriber_id int NULL
- campaign_id int NULL
- content_subject varchar(255) NOT NULL
- content_description text NULL
- content_script longtext NULL
- content_blob longtext NULL
- content_link text NULL
- additional_links json NULL
- created_at timestamp NULL
- updated_at timestamp NULL
- completed int NULL
- zapier_webhook_url text NULL
- dispatch_type enum('manual','drip','auto') NULL
- post_status enum('pending','scheduled','posted','failed') NULL
- retry_count int NULL
- last_attempt_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_schedule`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

