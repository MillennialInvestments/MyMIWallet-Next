# bf_marketing_scraper

## Source
- Migration: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php
- Model: app/Models/MarketingModel.php
- Code references: app/Models/MarketingModel.php, app/Modules/Management/Controllers/MarketingController.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_scraper` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_id` TEXT NULL,
  `hash` TEXT NULL,
  `campaign` TEXT NULL,
  `status` VARCHAR(32) NULL,
  `meta_json` LONGTEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- source_id TEXT NULL
- hash TEXT NULL
- campaign TEXT NULL
- status VARCHAR(32) NULL
- meta_json LONGTEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE bf_marketing_scraper;
```
