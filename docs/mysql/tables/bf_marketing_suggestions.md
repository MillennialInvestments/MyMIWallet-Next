# bf_marketing_suggestions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2660, app/Models/MarketingModel.php:2677, app/Models/MarketingModel.php:2684, app/Models/MarketingModel.php:2690, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:142, docs/_aiops/doc-change-log.md:1541

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_suggestions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform_id` int unsigned NULL DEFAULT NULL,
  `content_type` enum('trade_alert','marketing','both') NOT NULL DEFAULT 'both',
  `tip_text` varchar(500) NOT NULL DEFAULT NULL,
  `priority` tinyint unsigned NOT NULL DEFAULT 5,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- platform_id int unsigned NULL
- content_type enum('trade_alert','marketing','both') NOT NULL
- tip_text varchar(500) NOT NULL
- priority tinyint unsigned NOT NULL
- is_active tinyint(1) NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_suggestions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_suggestions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_suggestions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

