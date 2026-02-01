# bf_investment_scraper

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:11, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:14, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:23, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:32, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:42, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:45, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:162, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:163, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:166, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:168, app/Libraries/MyMIAlerts.php:747, app/Libraries/MyMIAlerts.php:901, app/Libraries/MyMIAlerts.php:1449, app/Models/AlertsModel.php:1285, app/Models/AlertsModel.php:1378, app/Models/AlertsModel.php:1401, app/Models/AlertsModel.php:1406, app/Models/AlertsModel.php:1410, app/Models/AlertsModel.php:1612, app/Models/AlertsModel.php:1890, app/Models/AlertsModel.php:1898, app/Models/AlertsModel.php:1898, app/Models/AlertsModel.php:1902, app/Models/AlertsModel.php:1911, app/Models/AlertsModel.php:1916, app/Models/AlertsModel.php:1964, app/Models/AlertsModel.php:1974, app/Models/AlertsModel.php:1980, app/Models/AlertsModel.php:2144, app/Models/AlertsModel.php:2356, app/Models/AlertsModel.php:2679, app/Models/AlertsModel.php:2693, app/Models/AlertsModel.php:2707, app/Models/AlertsModel.php:3506, app/Models/AlertsModel.php:3543, app/Models/AlertsModel.php:3544, app/Modules/APIs/Controllers/AlertsController.php:1948, app/Modules/APIs/Controllers/AlertsController.php:2026, app/Modules/Management/Controllers/AlertsController.php:606, app/Commands/AlertsAudit.php:40, app/Commands/AlertsAudit.php:78, app/Commands/AlertsAudit.php:350, app/Commands/Scrapers/EmailScraperAudit.php:23, docs/operations/05-database.md:14, docs/operations/05-database.md:27, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/thinkorswim_broker_ingestion.md:7, docs/alerts/thinkorswim_broker_ingestion.md:48, docs/chatgpt/codex_executive_director/summary.md:27, docs/chatgpt/mymi_alert_system/summary.md:42, docs/chatgpt/mymi_alert_system/summary.md:146, docs/chatgpt/mymi_alert_system/summary.md:152, docs/chatgpt/mymi_alert_system/inventory.md:101, docs/chatgpt/mymi_alert_system/inventory.md:192, docs/chatgpt/mymi_alert_system/standards.md:111, docs/aiops/email-scraper-audit.md:9, docs/aiops/email-scraper-audit.md:21, docs/aiops/email-scraper-audit.md:22, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:88, docs/_aiops/doc-change-log.md:1391, docs/health/health_test_checklist.md:302, docs/health/health_test_checklist.md:307, docs/health/health_test_checklist.md:311, docs/health/health_test_checklist.md:327, docs/health/modules/alerts.md:5, docs/health/modules/alerts.md:10, docs/health/modules/alerts.md:13, docs/health/modules/alerts.md:27, docs/forecasting/01_data_flow.md:8, docs/forecasting/01_data_flow.md:10, docs/forecasting/README.md:16, docs/spark/categories/alerts/alerts-audit.md:13, docs/product/Next_Codex_Tasks.md:35

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_scraper` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(50) NULL DEFAULT 'In Review',
  `email_type` enum('trade_alert','news','other') NOT NULL DEFAULT 'other',
  `news_vendor` varchar(255) NULL DEFAULT NULL,
  `symbols` varchar(255) NULL DEFAULT NULL,
  `type` varchar(100) NULL DEFAULT NULL,
  `url` varchar(255) NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `content` mediumtext NULL DEFAULT NULL,
  `email_identifier` varchar(100) NULL DEFAULT NULL,
  `email_date` datetime NULL DEFAULT NULL,
  `email_sender` varchar(255) NULL DEFAULT NULL,
  `email_subject` varchar(500) NULL DEFAULT NULL,
  `email_body` mediumtext NULL DEFAULT NULL,
  `email_attachments` longtext NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `scraped_at` datetime NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL,
  `modified_on` datetime NULL DEFAULT NULL,
  `links` text NULL DEFAULT NULL,
  `images` text NULL DEFAULT NULL,
  `videos` text NULL DEFAULT NULL,
  `metadata` text NULL DEFAULT NULL,
  `structured_data` text NULL DEFAULT NULL,
  `additional_html_elements` text NULL DEFAULT NULL,
  `page_performance_data` text NULL DEFAULT NULL,
  `network_requests` text NULL DEFAULT NULL,
  `user_interaction_points` text NULL DEFAULT NULL,
  `accessibility_information` text NULL DEFAULT NULL,
  `page_relationships` text NULL DEFAULT NULL,
  `seo_elements` text NULL DEFAULT NULL,
  `social_media_links` text NULL DEFAULT NULL,
  `comments_user_generated_content` text NULL DEFAULT NULL,
  `contact_information` text NULL DEFAULT NULL,
  `legal_information` text NULL DEFAULT NULL,
  `breadcrumbs` text NULL DEFAULT NULL,
  `date_time` datetime NULL DEFAULT NULL,
  `author_information` text NULL DEFAULT NULL,
  `ratings_reviews` text NULL DEFAULT NULL,
  `price_information` text NULL DEFAULT NULL,
  `location_data` text NULL DEFAULT NULL,
  `language_locale` text NULL DEFAULT NULL,
  `mobile_responsiveness` text NULL DEFAULT NULL,
  `security_information` text NULL DEFAULT NULL,
  `technology_stack` text NULL DEFAULT NULL,
  `server_information` text NULL DEFAULT NULL,
  `caching_information` text NULL DEFAULT NULL,
  `content_type` text NULL DEFAULT NULL,
  `character_set` text NULL DEFAULT NULL,
  `rss_atom_feeds` text NULL DEFAULT NULL,
  `pagination` text NULL DEFAULT NULL,
  `custom_data` text NULL DEFAULT NULL,
  `error_handling` text NULL DEFAULT NULL,
  `historical_changes` text NULL DEFAULT NULL,
  `user_reviews_ratings` text NULL DEFAULT NULL,
  `inventory_levels` text NULL DEFAULT NULL,
  `shipping_information` text NULL DEFAULT NULL,
  `bots_crawlers_information` text NULL DEFAULT NULL,
  `affiliate_links` text NULL DEFAULT NULL,
  `advertisements` text NULL DEFAULT NULL,
  `cookie_notices` text NULL DEFAULT NULL,
  `popups_modals` text NULL DEFAULT NULL,
  `browser_specific_data` text NULL DEFAULT NULL,
  `geolocation_specific_content` text NULL DEFAULT NULL,
  `ab_testing_variations` text NULL DEFAULT NULL,
  `user_agent_specific_content` text NULL DEFAULT NULL,
  `screen_size_specific_content` text NULL DEFAULT NULL,
  `device_specific_content` text NULL DEFAULT NULL,
  `browser_extension_data` text NULL DEFAULT NULL,
  `custom_scripts_analytics` text NULL DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Other',
  `tag` varchar(255) NULL DEFAULT NULL,
  `class` varchar(255) NULL DEFAULT NULL,
  `segment` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(50) NULL
- email_type enum('trade_alert','news','other') NOT NULL
- news_vendor varchar(255) NULL
- symbols varchar(255) NULL
- type varchar(100) NULL
- url varchar(255) NULL
- title varchar(255) NULL
- summary text NULL
- content mediumtext NULL
- email_identifier varchar(100) NULL
- email_date datetime NULL
- email_sender varchar(255) NULL
- email_subject varchar(500) NULL
- email_body mediumtext NULL
- email_attachments longtext NULL
- keywords text NULL
- scraped_at datetime NULL
- created_on datetime NULL
- modified_on datetime NULL
- links text NULL
- images text NULL
- videos text NULL
- metadata text NULL
- structured_data text NULL
- additional_html_elements text NULL
- page_performance_data text NULL
- network_requests text NULL
- user_interaction_points text NULL
- accessibility_information text NULL
- page_relationships text NULL
- seo_elements text NULL
- social_media_links text NULL
- comments_user_generated_content text NULL
- contact_information text NULL
- legal_information text NULL
- breadcrumbs text NULL
- date_time datetime NULL
- author_information text NULL
- ratings_reviews text NULL
- price_information text NULL
- location_data text NULL
- language_locale text NULL
- mobile_responsiveness text NULL
- security_information text NULL
- technology_stack text NULL
- server_information text NULL
- caching_information text NULL
- content_type text NULL
- character_set text NULL
- rss_atom_feeds text NULL
- pagination text NULL
- custom_data text NULL
- error_handling text NULL
- historical_changes text NULL
- user_reviews_ratings text NULL
- inventory_levels text NULL
- shipping_information text NULL
- bots_crawlers_information text NULL
- affiliate_links text NULL
- advertisements text NULL
- cookie_notices text NULL
- popups_modals text NULL
- browser_specific_data text NULL
- geolocation_specific_content text NULL
- ab_testing_variations text NULL
- user_agent_specific_content text NULL
- screen_size_specific_content text NULL
- device_specific_content text NULL
- browser_extension_data text NULL
- custom_scripts_analytics text NULL
- category varchar(255) NOT NULL
- tag varchar(255) NULL
- class varchar(255) NULL
- segment varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_scraper`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scraper'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

