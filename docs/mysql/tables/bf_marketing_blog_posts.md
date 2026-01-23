# bf_marketing_blog_posts

## Source
- Migration: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php
- Model: app/Models/MarketingModel.php
- Code references: app/Models/MarketingModel.php, app/Modules/Management/Controllers/MarketingController.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_blog_posts` (
  `slug` TEXT NULL,
  `status` VARCHAR(32) NULL,
  `excerpt` VARCHAR(512) NULL,
  `meta_json` LONGTEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- slug TEXT NULL
- status VARCHAR(32) NULL
- excerpt VARCHAR(512) NULL
- meta_json LONGTEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE bf_marketing_blog_posts;
```
