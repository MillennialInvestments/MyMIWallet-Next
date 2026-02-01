# bf_projects_real_estate

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:177

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_real_estate` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `source` enum('address','zillow') NOT NULL DEFAULT NULL,
  `raw_input` text NOT NULL DEFAULT NULL,
  `zillow_url` varchar(512) NULL DEFAULT NULL,
  `zillow_id` varchar(64) NULL DEFAULT NULL,
  `address_line1` varchar(255) NULL DEFAULT NULL,
  `address_line2` varchar(255) NULL DEFAULT NULL,
  `city` varchar(120) NULL DEFAULT NULL,
  `state` char(2) NULL DEFAULT NULL,
  `postal_code` varchar(20) NULL DEFAULT NULL,
  `country` varchar(2) NULL DEFAULT 'US',
  `latitude` decimal(10,7) NULL DEFAULT NULL,
  `longitude` decimal(10,7) NULL DEFAULT NULL,
  `property_type` varchar(64) NULL DEFAULT NULL,
  `year_built` smallint NULL DEFAULT NULL,
  `beds` decimal(4,1) NULL DEFAULT NULL,
  `baths` decimal(4,1) NULL DEFAULT NULL,
  `sqft` int NULL DEFAULT NULL,
  `lot_sqft` int NULL DEFAULT NULL,
  `list_price` decimal(14,2) NULL DEFAULT NULL,
  `zestimate` decimal(14,2) NULL DEFAULT NULL,
  `rent_zestimate` decimal(14,2) NULL DEFAULT NULL,
  `taxes_annual` decimal(14,2) NULL DEFAULT NULL,
  `hoa_monthly` decimal(14,2) NULL DEFAULT NULL,
  `images_json` json NULL DEFAULT NULL,
  `features_json` json NULL DEFAULT NULL,
  `last_scraped_at` datetime NULL DEFAULT NULL,
  `status` enum('submitted','queued','scraped','review','approved','rejected') NULL DEFAULT 'submitted',
  `project_id` int unsigned NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- source enum('address','zillow') NOT NULL
- raw_input text NOT NULL
- zillow_url varchar(512) NULL
- zillow_id varchar(64) NULL
- address_line1 varchar(255) NULL
- address_line2 varchar(255) NULL
- city varchar(120) NULL
- state char(2) NULL
- postal_code varchar(20) NULL
- country varchar(2) NULL
- latitude decimal(10,7) NULL
- longitude decimal(10,7) NULL
- property_type varchar(64) NULL
- year_built smallint NULL
- beds decimal(4,1) NULL
- baths decimal(4,1) NULL
- sqft int NULL
- lot_sqft int NULL
- list_price decimal(14,2) NULL
- zestimate decimal(14,2) NULL
- rent_zestimate decimal(14,2) NULL
- taxes_annual decimal(14,2) NULL
- hoa_monthly decimal(14,2) NULL
- images_json json NULL
- features_json json NULL
- last_scraped_at datetime NULL
- status enum('submitted','queued','scraped','review','approved','rejected') NULL
- project_id int unsigned NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_real_estate`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_real_estate'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_real_estate'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

