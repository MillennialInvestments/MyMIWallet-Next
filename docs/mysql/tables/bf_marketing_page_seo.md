# bf_marketing_page_seo

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Seeds/HowItWorksMetaSeeder.php:22, app/Models/PageSEOModel.php:8, app/Models/PublicModel.php:44, app/Models/PublicModel.php:52, app/Views/themes/dashboard/layouts/metadata-information.php:82, app/Views/themes/public/layouts/metadata-information copy.php:65, app/Views/themes/public/layouts/metadata-information copy.php:154, app/Modules/Management/Controllers/ServicesController.php:155, app/Modules/Management/Controllers/ServicesController.php:163, app/Modules/Management/Controllers/ServicesController.php:186, app/Modules/Management/Views/Web_Design/Sitemap_Generator.php:9, app/Services/MetaService.php:191, app/Services/MetaService.php:196, docs/ops/log-fixes/2026-01-01.md:13, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:129, docs/aiops/migration_model_audit.md:149, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1502

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_page_seo` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `source` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `deleted_at` datetime NULL DEFAULT NULL,
  `automated` int NULL DEFAULT NULL,
  `page_name` varchar(128) NULL DEFAULT NULL,
  `page_title` text NOT NULL DEFAULT NULL,
  `page_url` varchar(256) NOT NULL DEFAULT 'https://www.mymiwallet.com',
  `page_sitemap_url` varchar(512) NOT NULL DEFAULT 'https://www.mymiwallet.com',
  `page_internal_url` varchar(256) NULL DEFAULT NULL,
  `page_controller` varchar(128) NULL DEFAULT NULL,
  `page_controller_url` varchar(128) NULL DEFAULT NULL,
  `page_controller_directory` varchar(128) NULL DEFAULT NULL,
  `page_file_directory` varchar(256) NULL DEFAULT NULL,
  `page_image` varchar(256) NOT NULL DEFAULT 'https://www.mymiwallet.com.com/assets/images/Millennial-Investments-The-Best-In-Investments-Logo.png',
  `page_description` text NULL DEFAULT NULL,
  `page_address` varchar(512) NOT NULL DEFAULT '2304 Ashland Ave.',
  `page_city` varchar(128) NOT NULL DEFAULT 'Bossier City',
  `page_state` varchar(64) NOT NULL DEFAULT 'LA',
  `page_country` varchar(64) NOT NULL DEFAULT 'US',
  `page_zipcode` varchar(32) NOT NULL DEFAULT 71111,
  `page_facebook` varchar(128) NOT NULL DEFAULT 'https://www.facebook.com/MyMillennialInvestments',
  `active` varchar(32) NULL DEFAULT 0,
  `custom` varchar(32) NOT NULL DEFAULT 0,
  `linked` varchar(32) NULL DEFAULT 0,
  `functionality` varchar(32) NULL DEFAULT 0,
  `design` varchar(32) NULL DEFAULT 0,
  `mobile` varchar(32) NOT NULL DEFAULT 0,
  `seo` varchar(32) NULL DEFAULT 0,
  `ext_links` varchar(32) NULL DEFAULT 0,
  `grammar` varchar(32) NULL DEFAULT 0,
  `d_optimize` varchar(32) NULL DEFAULT 0,
  `load_perf` varchar(32) NULL DEFAULT 0,
  `additional_notes` varchar(32) NULL DEFAULT 0,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(50) NOT NULL
- source varchar(255) NULL
- created_at datetime NULL
- deleted_at datetime NULL
- automated int NULL
- page_name varchar(128) NULL
- page_title text NOT NULL
- page_url varchar(256) NOT NULL
- page_sitemap_url varchar(512) NOT NULL
- page_internal_url varchar(256) NULL
- page_controller varchar(128) NULL
- page_controller_url varchar(128) NULL
- page_controller_directory varchar(128) NULL
- page_file_directory varchar(256) NULL
- page_image varchar(256) NOT NULL
- page_description text NULL
- page_address varchar(512) NOT NULL
- page_city varchar(128) NOT NULL
- page_state varchar(64) NOT NULL
- page_country varchar(64) NOT NULL
- page_zipcode varchar(32) NOT NULL
- page_facebook varchar(128) NOT NULL
- active varchar(32) NULL
- custom varchar(32) NOT NULL
- linked varchar(32) NULL
- functionality varchar(32) NULL
- design varchar(32) NULL
- mobile varchar(32) NOT NULL
- seo varchar(32) NULL
- ext_links varchar(32) NULL
- grammar varchar(32) NULL
- d_optimize varchar(32) NULL
- load_perf varchar(32) NULL
- additional_notes varchar(32) NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_page_seo`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_page_seo'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_page_seo'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

