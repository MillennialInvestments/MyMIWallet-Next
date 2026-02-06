# bf_marketing_blog_posts

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:12, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:46, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:47, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:48, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:51, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:61, app/Libraries/DbInventory/InventoryScanner.php:16, app/Libraries/DbInventory/SqlGenerator.php:12, app/Models/MarketingModel.php:202, app/Models/MarketingModel.php:214, app/Models/MarketingModel.php:616, app/Models/MarketingModel.php:638, app/Modules/Management/Controllers/MarketingController.php:1063, app/Modules/Management/Controllers/MarketingController.php:1089, app/Modules/Management/Controllers/MarketingController.php:1102, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:109, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:109, docs/_aiops/doc-change-log.md:1577

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_blog_posts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `content` longtext NOT NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL DEFAULT NULL,
  `tags` text NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_on` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NOT NULL
- content longtext NOT NULL
- slug varchar(255) NOT NULL
- tags text NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_blog_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_blog_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_blog_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

