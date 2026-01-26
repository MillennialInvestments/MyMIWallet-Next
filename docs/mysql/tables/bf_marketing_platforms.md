# bf_marketing_platforms

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2515, app/Models/MarketingModel.php:2531, app/Models/MarketingModel.php:2544, app/Models/MarketingModel.php:2552, app/Models/MarketingModel.php:2560

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_platforms` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform_key` varchar(50) NOT NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- platform_key varchar(50) NOT NULL
- name varchar(100) NOT NULL
- notes text NULL
- is_active tinyint(1) NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_platforms`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platforms'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platforms'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

