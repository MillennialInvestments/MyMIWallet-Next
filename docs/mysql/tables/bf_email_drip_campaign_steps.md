# bf_email_drip_campaign_steps

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DripCampaignModel.php:24, app/Models/DripCampaignModel.php:62, app/Models/DripCampaignModel.php:82, app/Models/DripCampaignModel.php:89, app/Models/MarketingModel.php:477, app/Models/MarketingModel.php:491, app/Models/MarketingModel.php:505, app/Models/MarketingModel.php:520, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:62, docs/_aiops/doc-change-log.md:1190

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_drip_campaign_steps` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `campaign_id` int NOT NULL DEFAULT NULL,
  `step_number` int NOT NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `subject` varchar(255) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `audience_tags` varchar(255) NULL DEFAULT NULL,
  `priority` varchar(50) NULL DEFAULT 'medium',
  `created_by` int NULL DEFAULT NULL,
  `view_file` varchar(255) NOT NULL DEFAULT NULL,
  `delay_days` int NOT NULL DEFAULT 0,
  `delay_hours` int NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `preview_html` text NULL DEFAULT NULL,
  `fallback_text` text NULL DEFAULT NULL,
  `dynamic_vars` text NULL DEFAULT NULL,
  `template_id` int NULL DEFAULT NULL,
  `rule_logic` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- campaign_id int NOT NULL
- step_number int NOT NULL
- name varchar(255) NOT NULL
- subject varchar(255) NOT NULL
- description text NULL
- audience_tags varchar(255) NULL
- priority varchar(50) NULL
- created_by int NULL
- view_file varchar(255) NOT NULL
- delay_days int NOT NULL
- delay_hours int NOT NULL
- is_active tinyint(1) NOT NULL
- created_at timestamp NOT NULL
- updated_at timestamp NOT NULL
- preview_html text NULL
- fallback_text text NULL
- dynamic_vars text NULL
- template_id int NULL
- rule_logic text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_drip_campaign_steps`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaign_steps'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaign_steps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

