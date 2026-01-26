# bf_marketing_newsletters

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:915, app/Models/MarketingModel.php:1218, app/Models/MarketingModel.php:2132, app/Models/MarketingModel.php:2273, app/Models/MarketingModel.php:2392, app/Models/MarketingNewsletterModel.php:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_newsletters` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `content` text NOT NULL DEFAULT NULL,
  `status` enum('draft','scheduled','sent','archived') NOT NULL DEFAULT 'draft',
  `scheduled_date` datetime NULL DEFAULT NULL,
  `sent_date` datetime NULL DEFAULT NULL,
  `target_audience` varchar(255) NULL DEFAULT 'all_users',
  `created_by` int NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `campaign_id` int NULL DEFAULT NULL,
  `priority` tinyint(1) NULL DEFAULT 0,
  `attachments` text NULL DEFAULT NULL,
  `preview_link` varchar(255) NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NOT NULL
- content text NOT NULL
- status enum('draft','scheduled','sent','archived') NOT NULL
- scheduled_date datetime NULL
- sent_date datetime NULL
- target_audience varchar(255) NULL
- created_by int NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NULL
- campaign_id int NULL
- priority tinyint(1) NULL
- attachments text NULL
- preview_link varchar(255) NULL
- notes text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_newsletters`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_newsletters'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_newsletters'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

