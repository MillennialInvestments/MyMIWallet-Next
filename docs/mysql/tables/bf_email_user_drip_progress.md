# bf_email_user_drip_progress

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DripCampaignModel.php:29, app/Models/DripCampaignModel.php:97, app/Models/DripCampaignModel.php:107, app/Models/DripCampaignModel.php:169

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_user_drip_progress` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `campaign_id` int NOT NULL DEFAULT NULL,
  `current_step_id` int NULL DEFAULT NULL,
  `next_step_id` int NULL DEFAULT NULL,
  `next_send_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `enrolled_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `last_email_sent_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int unsigned NOT NULL
- campaign_id int NOT NULL
- current_step_id int NULL
- next_step_id int NULL
- next_send_at timestamp NULL
- status varchar(50) NOT NULL
- enrolled_at timestamp NOT NULL
- last_email_sent_at timestamp NULL
- completed_at timestamp NULL
- updated_at timestamp NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_user_drip_progress`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_user_drip_progress'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_user_drip_progress'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

