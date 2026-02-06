# bf_marketing_temp_scraper

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIMarketing.php:3079, app/Models/AlertsModel.php:179, app/Models/MarketingModel.php:704, app/Models/MarketingModel.php:712, app/Models/MarketingModel.php:728, app/Models/MarketingModel.php:933, app/Models/MarketingModel.php:943, app/Models/MarketingModel.php:1124, app/Models/MarketingModel.php:1165, app/Models/MarketingModel.php:1197, app/Models/MarketingModel.php:1238, app/Models/MarketingModel.php:1291, app/Models/MarketingModel.php:1310, app/Models/MarketingModel.php:1319, app/Models/MarketingModel.php:1394, app/Models/MarketingModel.php:1440, app/Models/MarketingModel.php:1488, app/Models/MarketingModel.php:1533, app/Models/MarketingModel.php:1579, app/Models/MarketingModel.php:1593, app/Models/MarketingModel.php:1713, app/Models/MarketingModel.php:1846, app/Models/MarketingModel.php:1955, app/Models/MarketingModel.php:2017, app/Models/MarketingModel.php:2026, app/Models/MarketingModel.php:2033, app/Models/MarketingModel.php:2161, app/Models/MarketingModel.php:2200, app/Models/MarketingModel.php:2208, app/Models/MarketingModel.php:2213, app/Models/MarketingModel.php:2268, app/Models/MarketingModel.php:2283, app/Models/MarketingModel.php:2289, app/Models/MarketingModel.php:2404, app/Modules/APIs/Controllers/ManagementController.php:797, app/Modules/APIs/Controllers/ManagementController.php:910, app/Modules/APIs/Controllers/ManagementController.php:911, app/Modules/APIs/Controllers/ManagementController.php:1661, app/Modules/APIs/Controllers/ManagementController.php:1716, app/Modules/Management/Controllers/MarketingController.php:1962, app/Modules/Management/Views/Marketing/EmailDetail.php:2, app/Modules/Marketing_New/Models/MarketingModel.php:21, app/Commands/NewsAudit.php:401, app/Commands/NewsAudit.php:405, app/Commands/NewsAudit.php:433, app/Commands/Scrapers/EmailScraperAudit.php:26, docs/ops/runbooks/database-log-review.md:18, docs/discord/_inventory.md:20, docs/discord/marketing_news_automation.md:7, docs/discord/marketing_news_automation.md:51, docs/discord/marketing_news_automation.md:82, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:24, docs/operations/05-database.md:18, docs/operations/05-database.md:28, docs/operations/05-database.md:35, docs/operations/04-cron-automation.md:23, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:35, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:126, docs/alerts/alerts_marketing_pipline.md:13, docs/kimi-k2-integration.md:99, docs/chatgpt/codex_executive_director/summary.md:34, docs/gap-audit/gap_report.md:27, docs/aiops/email-scraper-audit.md:10, docs/aiops/email-scraper-audit.md:23, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:144, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:144, docs/_aiops/doc-change-log.md:1700, docs/health/health_test_checklist.md:380, docs/health/health_test_checklist.md:386, docs/health/health_test_checklist.md:390, docs/health/health_test_checklist.md:405, docs/health/modules/marketing.md:5, docs/health/modules/marketing.md:11, docs/health/modules/marketing.md:28, docs/spark/categories/marketing/news-audit.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_temp_scraper` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(50) NULL DEFAULT NULL,
  `type` varchar(50) NULL DEFAULT NULL,
  `url` varchar(255) NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `formatted_summary` mediumtext NULL DEFAULT NULL,
  `content` longtext NULL DEFAULT NULL,
  `feature_score` float NULL DEFAULT 0,
  `email_identifier` varchar(255) NULL DEFAULT NULL,
  `email_date` datetime NULL DEFAULT NULL,
  `email_sender` varchar(255) NULL DEFAULT NULL,
  `email_subject` varchar(500) NULL DEFAULT NULL,
  `email_body` text NULL DEFAULT NULL,
  `email_attachments` text NULL DEFAULT NULL,
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
  `keyword_score` float NULL DEFAULT 0,
  `semantic_diversity_score` float NULL DEFAULT 0,
  `processed` tinyint(1) NULL DEFAULT 0,
  `date_scraped` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(50) NULL
- type varchar(50) NULL
- url varchar(255) NULL
- title varchar(255) NULL
- summary text NULL
- formatted_summary mediumtext NULL
- content longtext NULL
- feature_score float NULL
- email_identifier varchar(255) NULL
- email_date datetime NULL
- email_sender varchar(255) NULL
- email_subject varchar(500) NULL
- email_body text NULL
- email_attachments text NULL
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
- keyword_score float NULL
- semantic_diversity_score float NULL
- processed tinyint(1) NULL
- date_scraped datetime NOT NULL
- updated_on timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_temp_scraper`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

