# bf_company_logos

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:612, app/Models/MarketingModel.php:749, app/Models/MarketingModel.php:2086, app/Models/MarketingModel.php:2087, app/Models/MarketingModel.php:2092, app/Models/MarketingModel.php:2093, app/Models/MarketingModel.php:2099, app/Models/MarketingModel.php:2100, app/Models/MarketingModel.php:2115, app/Models/MarketingModel.php:2121, app/Models/MarketingModel.php:2122, app/Models/MarketingModel.php:2125, app/Models/MarketingModel.php:2126, app/Models/InvestmentModel.php:457, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:43, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:43, docs/_aiops/doc-change-log.md:1181

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_company_logos` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` int NULL DEFAULT 1,
  `symbol` varchar(10) NOT NULL DEFAULT NULL,
  `image_url` text NOT NULL DEFAULT NULL,
  `approved_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- status int NULL
- symbol varchar(10) NOT NULL
- image_url text NOT NULL
- approved_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_company_logos`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_company_logos'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_company_logos'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

