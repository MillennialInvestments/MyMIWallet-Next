# bf_email_drip_campaigns

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DripCampaignModel.php:11, app/Models/MarketingModel.php:416, app/Models/MarketingModel.php:431, app/Models/MarketingModel.php:462, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:63, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:63, docs/aiops/migration_model_audit.md:100, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1289

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_drip_campaigns` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `trigger_event` varchar(100) NOT NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `audience_segment` varchar(100) NULL DEFAULT NULL,
  `goal` varchar(255) NULL DEFAULT NULL,
  `tags` text NULL DEFAULT NULL,
  `priority` enum('low','medium','high') NULL DEFAULT 'medium',
  `version` int NULL DEFAULT 1,
  `ab_test_group` varchar(20) NULL DEFAULT NULL,
  `enable_tracking` tinyint(1) NULL DEFAULT 1,
  `audience_tags` varchar(255) NULL DEFAULT NULL,
  `segment_id` int NULL DEFAULT NULL,
  `content_type` varchar(50) NULL DEFAULT 'email',
  `template_id` varchar(100) NULL DEFAULT NULL,
  `utm_source` varchar(100) NULL DEFAULT NULL,
  `utm_medium` varchar(100) NULL DEFAULT NULL,
  `utm_campaign` varchar(100) NULL DEFAULT NULL,
  `enable_ai` tinyint(1) NULL DEFAULT 0,
  `send_delay` int NULL DEFAULT 0,
  `schedule_time` time NULL DEFAULT NULL,
  `send_window` varchar(20) NULL DEFAULT NULL,
  `logic_json` json NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- name varchar(255) NOT NULL
- description text NULL
- trigger_event varchar(100) NOT NULL
- is_active tinyint(1) NOT NULL
- created_at timestamp NOT NULL
- updated_at timestamp NOT NULL
- audience_segment varchar(100) NULL
- goal varchar(255) NULL
- tags text NULL
- priority enum('low','medium','high') NULL
- version int NULL
- ab_test_group varchar(20) NULL
- enable_tracking tinyint(1) NULL
- audience_tags varchar(255) NULL
- segment_id int NULL
- content_type varchar(50) NULL
- template_id varchar(100) NULL
- utm_source varchar(100) NULL
- utm_medium varchar(100) NULL
- utm_campaign varchar(100) NULL
- enable_ai tinyint(1) NULL
- send_delay int NULL
- schedule_time time NULL
- send_window varchar(20) NULL
- logic_json json NULL
- created_by int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_drip_campaigns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaigns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

