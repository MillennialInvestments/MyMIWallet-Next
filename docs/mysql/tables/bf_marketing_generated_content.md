# bf_marketing_generated_content

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:46, app/Models/MarketingModel.php:679, app/Models/MarketingModel.php:787, app/Models/MarketingModel.php:798, app/Models/MarketingModel.php:807, app/Models/MarketingModel.php:834, app/Models/MarketingModel.php:844, app/Models/MarketingModel.php:854, app/Models/MarketingModel.php:896, app/Models/MarketingModel.php:1022, app/Models/MarketingModel.php:1186, app/Models/MarketingModel.php:1328, app/Models/MarketingModel.php:1341, app/Models/MarketingModel.php:1417, app/Models/MarketingModel.php:1810, app/Models/MarketingModel.php:2195, app/Models/MarketingModel.php:2384, app/Models/MarketingModel.php:2417, app/Modules/APIs/Controllers/MarketingController.php:2152, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/alerts/alerts_marketing_pipline.md:19, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:123, docs/_aiops/doc-change-log.md:1487

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_generated_content` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `alert_id` int unsigned NULL DEFAULT NULL,
  `campaign_id` int unsigned NULL DEFAULT NULL,
  `step_id` int unsigned NULL DEFAULT NULL,
  `summary_id` int unsigned NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `post_text` text NULL DEFAULT NULL,
  `formatted_summary` mediumtext NULL DEFAULT NULL,
  `platform` varchar(50) NULL DEFAULT 'multi',
  `score` decimal(5,2) NULL DEFAULT 0.00,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `status` enum('pending','scheduled','posted') NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `shared_discord` datetime NULL DEFAULT NULL,
  `shared_linkedin` datetime NULL DEFAULT NULL,
  `shared_x` datetime NULL DEFAULT NULL,
  `shared_email` datetime NULL DEFAULT NULL,
  `engagement_score` float NULL DEFAULT 0,
  `clicks_estimated` int NULL DEFAULT 0,
  `voice_script` text NULL DEFAULT NULL,
  `facebook_message` text NULL DEFAULT NULL,
  `linkedin_message` text NULL DEFAULT NULL,
  `discord_message` text NULL DEFAULT NULL,
  `stocktwits_message` text NULL DEFAULT NULL,
  `tiktok_message` text NULL DEFAULT NULL,
  `youtube_message` text NULL DEFAULT NULL,
  `email_message` text NULL DEFAULT NULL,
  `hashtags` text NULL DEFAULT NULL,
  `promotional_links` json NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `last_enriched_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- alert_id int unsigned NULL
- campaign_id int unsigned NULL
- step_id int unsigned NULL
- summary_id int unsigned NULL
- title varchar(255) NULL
- description text NULL
- post_text text NULL
- formatted_summary mediumtext NULL
- platform varchar(50) NULL
- score decimal(5,2) NULL
- scheduled_at datetime NULL
- status enum('pending','scheduled','posted') NULL
- created_at datetime NOT NULL
- updated_at datetime NULL
- shared_discord datetime NULL
- shared_linkedin datetime NULL
- shared_x datetime NULL
- shared_email datetime NULL
- engagement_score float NULL
- clicks_estimated int NULL
- voice_script text NULL
- facebook_message text NULL
- linkedin_message text NULL
- discord_message text NULL
- stocktwits_message text NULL
- tiktok_message text NULL
- youtube_message text NULL
- email_message text NULL
- hashtags text NULL
- promotional_links json NULL
- keywords text NULL
- last_enriched_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_generated_content`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

