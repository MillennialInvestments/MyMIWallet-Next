# bf_marketing_campaigns

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Marketing/EmailMarketingModel.php:10, app/Models/AnalyticalModel.php:130, app/Models/AnalyticalModel.php:145, app/Models/CampaignModel.php:9, app/Models/CampaignModel.php:71, app/Models/CampaignModel.php:82, app/Models/CampaignModel.php:178, app/Models/EmailModel.php:46, app/Models/EmailModel.php:53, app/Models/EmailModel.php:89, app/Models/EmailModel.php:98, app/Models/EmailModel.php:295, app/Models/MarketingModel.php:93, app/Models/MarketingModel.php:401, app/Models/MarketingModel.php:540, app/Models/MarketingModel.php:664, app/Models/MarketingModel.php:671, app/Models/MarketingModel.php:778, app/Models/MarketingModel.php:2243, app/Services/EmailService.php:25, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:113, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:113, docs/aiops/migration_model_audit.md:84, docs/aiops/migration_model_audit.md:134, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1589

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_campaigns` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `sched_id` int NULL DEFAULT 0,
  `status` int NULL DEFAULT 1,
  `beta` varchar(45) NULL DEFAULT NULL,
  `config_mode` varchar(128) NULL DEFAULT NULL,
  `form_mode` varchar(45) NULL DEFAULT NULL,
  `escalated` int NULL DEFAULT 0,
  `type` varchar(256) NULL DEFAULT 'N/A',
  `audience_type` varchar(100) NULL DEFAULT NULL,
  `stage` enum('Draft','Scheduled','Completed') NULL DEFAULT 'Draft',
  `is_draft` tinyint(1) NULL DEFAULT 1,
  `name` mediumtext NULL DEFAULT NULL,
  `slug` varchar(255) NULL DEFAULT NULL,
  `keyword` varchar(255) NULL DEFAULT NULL,
  `created_on` varchar(256) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `user_email` varchar(255) NULL DEFAULT NULL,
  `username` varchar(255) NULL DEFAULT NULL,
  `account_type` varchar(255) NULL DEFAULT NULL,
  `account_id` int NULL DEFAULT NULL,
  `assigned_on` varchar(256) NULL DEFAULT NULL,
  `assigned_to` varchar(256) NULL DEFAULT NULL,
  `completed_on` varchar(256) NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `auto_schedule_at` datetime NULL DEFAULT NULL,
  `description` mediumtext NULL DEFAULT NULL,
  `overall_campaign_description` longtext NULL DEFAULT NULL,
  `primary_content` longtext NULL DEFAULT NULL,
  `secondary_content` longtext NULL DEFAULT NULL,
  `html_content` longtext NULL DEFAULT NULL,
  `voice_script` longtext NULL DEFAULT NULL,
  `shared` varchar(32) NULL DEFAULT NULL,
  `shared_users` json NULL DEFAULT NULL,
  `blog` int NULL DEFAULT 0,
  `in_app` int NULL DEFAULT NULL,
  `email` int NULL DEFAULT 0,
  `discord` int NULL DEFAULT 0,
  `facebook` int NULL DEFAULT 0,
  `linkedin` int NULL DEFAULT 0,
  `telegram` int NULL DEFAULT 0,
  `twitter` int NULL DEFAULT 0,
  `website` int NULL DEFAULT 0,
  `promotional_links` json NULL DEFAULT NULL,
  `facebook_message` text NULL DEFAULT NULL,
  `linkedin_message` text NULL DEFAULT NULL,
  `discord_message` text NULL DEFAULT NULL,
  `stocktwits_message` text NULL DEFAULT NULL,
  `tiktok_message` text NULL DEFAULT NULL,
  `youtube_message` text NULL DEFAULT NULL,
  `email_message` text NULL DEFAULT NULL,
  `email_message_json` json NULL DEFAULT NULL,
  `email_subject` varchar(255) NULL DEFAULT NULL,
  `campaign_goal` text NULL DEFAULT NULL,
  `campaign_type` varchar(100) NULL DEFAULT NULL,
  `tone` varchar(100) NULL DEFAULT 'Informative',
  `cta` text NULL DEFAULT NULL,
  `distribution_ready` tinyint(1) NULL DEFAULT 0,
  `distribution_priority` int NULL DEFAULT 0,
  `distribution_notes` text NULL DEFAULT NULL,
  `review_status` varchar(50) NULL DEFAULT 'pending',
  `reviewed_by` varchar(100) NULL DEFAULT NULL,
  `reviewed_on` datetime NULL DEFAULT NULL,
  `additional_info` mediumtext NULL DEFAULT NULL,
  `hashtags` mediumtext NULL DEFAULT NULL,
  `tags` varchar(255) NULL DEFAULT NULL,
  `platforms` text NULL DEFAULT NULL,
  `platform_config` json NULL DEFAULT NULL,
  `distribution_log` text NULL DEFAULT NULL,
  `distribution_status` varchar(50) NULL DEFAULT 'pending',
  `distribution_attempts` int NULL DEFAULT 0,
  `distribution_successful` int NULL DEFAULT 0,
  `distribution_failed` int NULL DEFAULT 0,
  `distribution_last_attempt` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- sched_id int NULL
- status int NULL
- beta varchar(45) NULL
- config_mode varchar(128) NULL
- form_mode varchar(45) NULL
- escalated int NULL
- type varchar(256) NULL
- audience_type varchar(100) NULL
- stage enum('Draft','Scheduled','Completed') NULL
- is_draft tinyint(1) NULL
- name mediumtext NULL
- slug varchar(255) NULL
- keyword varchar(255) NULL
- created_on varchar(256) NULL
- created_by int NULL
- user_id int NULL
- user_email varchar(255) NULL
- username varchar(255) NULL
- account_type varchar(255) NULL
- account_id int NULL
- assigned_on varchar(256) NULL
- assigned_to varchar(256) NULL
- completed_on varchar(256) NULL
- scheduled_at datetime NULL
- auto_schedule_at datetime NULL
- description mediumtext NULL
- overall_campaign_description longtext NULL
- primary_content longtext NULL
- secondary_content longtext NULL
- html_content longtext NULL
- voice_script longtext NULL
- shared varchar(32) NULL
- shared_users json NULL
- blog int NULL
- in_app int NULL
- email int NULL
- discord int NULL
- facebook int NULL
- linkedin int NULL
- telegram int NULL
- twitter int NULL
- website int NULL
- promotional_links json NULL
- facebook_message text NULL
- linkedin_message text NULL
- discord_message text NULL
- stocktwits_message text NULL
- tiktok_message text NULL
- youtube_message text NULL
- email_message text NULL
- email_message_json json NULL
- email_subject varchar(255) NULL
- campaign_goal text NULL
- campaign_type varchar(100) NULL
- tone varchar(100) NULL
- cta text NULL
- distribution_ready tinyint(1) NULL
- distribution_priority int NULL
- distribution_notes text NULL
- review_status varchar(50) NULL
- reviewed_by varchar(100) NULL
- reviewed_on datetime NULL
- additional_info mediumtext NULL
- hashtags mediumtext NULL
- tags varchar(255) NULL
- platforms text NULL
- platform_config json NULL
- distribution_log text NULL
- distribution_status varchar(50) NULL
- distribution_attempts int NULL
- distribution_successful int NULL
- distribution_failed int NULL
- distribution_last_attempt datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_campaigns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_campaigns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

