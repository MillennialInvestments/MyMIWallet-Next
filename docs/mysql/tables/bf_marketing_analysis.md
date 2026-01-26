# bf_marketing_analysis

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2137

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_analysis` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `source_type` varchar(50) NOT NULL DEFAULT NULL,
  `source_identifier` varchar(255) NOT NULL DEFAULT NULL,
  `feature_score` float NULL DEFAULT NULL,
  `keyword_score` int NULL DEFAULT NULL,
  `semantic_diversity_score` int NULL DEFAULT NULL,
  `additional_data` json NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- source_type varchar(50) NOT NULL
- source_identifier varchar(255) NOT NULL
- feature_score float NULL
- keyword_score int NULL
- semantic_diversity_score int NULL
- additional_data json NULL
- created_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_analysis`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_analysis'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_analysis'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

