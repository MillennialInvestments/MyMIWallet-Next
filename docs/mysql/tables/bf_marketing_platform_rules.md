# bf_marketing_platform_rules

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2573, app/Models/MarketingModel.php:2597, app/Models/MarketingModel.php:2605, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:131, docs/_aiops/doc-change-log.md:1511

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_platform_rules` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform_id` int unsigned NULL DEFAULT NULL,
  `rule_key` varchar(64) NOT NULL DEFAULT NULL,
  `rule_value` varchar(255) NOT NULL DEFAULT NULL,
  `description` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- platform_id int unsigned NULL
- rule_key varchar(64) NOT NULL
- rule_value varchar(255) NOT NULL
- description varchar(255) NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_platform_rules`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platform_rules'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platform_rules'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

