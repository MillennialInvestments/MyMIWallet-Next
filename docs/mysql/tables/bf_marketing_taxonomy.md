# bf_marketing_taxonomy

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2615, app/Models/MarketingModel.php:2641, app/Models/MarketingModel.php:2648, app/Models/MarketingModel.php:2654

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_taxonomy` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform_id` int unsigned NULL DEFAULT NULL,
  `content_type` enum('trade_alert','marketing','both') NOT NULL DEFAULT 'both',
  `tag_type` enum('hashtag','keyword') NOT NULL DEFAULT NULL,
  `tag_text` varchar(120) NOT NULL DEFAULT NULL,
  `category` varchar(64) NULL DEFAULT NULL,
  `weight` decimal(6,2) NOT NULL DEFAULT 1.00,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(100) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- platform_id int unsigned NULL
- content_type enum('trade_alert','marketing','both') NOT NULL
- tag_type enum('hashtag','keyword') NOT NULL
- tag_text varchar(120) NOT NULL
- category varchar(64) NULL
- weight decimal(6,2) NOT NULL
- is_default tinyint(1) NOT NULL
- is_active tinyint(1) NOT NULL
- created_by varchar(100) NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_taxonomy`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_taxonomy'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_taxonomy'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

