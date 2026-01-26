# bf_marketing_scraper

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:17, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:62, app/Libraries/DbInventory/InventoryScanner.php:15, app/Libraries/DbInventory/SqlGenerator.php:11, app/Libraries/MyMIMarketing.php:3107, app/Libraries/MyMIMarketing.php:5392, app/Libraries/MyMIMarketing.php:5393, app/Models/AnalyticalModel.php:579, app/Models/MarketingModel.php:11, app/Models/MarketingModel.php:361, app/Models/MarketingModel.php:377, app/Models/MarketingModel.php:390, app/Models/MarketingModel.php:445, app/Models/MarketingModel.php:566, app/Models/MarketingModel.php:574, app/Models/MarketingModel.php:589, app/Models/MarketingModel.php:696, app/Models/MarketingModel.php:759, app/Models/MarketingModel.php:769, app/Models/MarketingModel.php:812, app/Models/MarketingModel.php:823, app/Models/MarketingModel.php:906, app/Models/MarketingModel.php:1001, app/Models/MarketingModel.php:1054, app/Models/MarketingModel.php:1073, app/Models/MarketingModel.php:1115, app/Models/MarketingModel.php:1133, app/Models/MarketingModel.php:1174, app/Models/MarketingModel.php:1253, app/Models/MarketingModel.php:1264, app/Models/MarketingModel.php:1428, app/Models/MarketingModel.php:1480, app/Models/MarketingModel.php:1674, app/Models/MarketingModel.php:1694, app/Models/MarketingModel.php:1705, app/Models/MarketingModel.php:1732, app/Models/MarketingModel.php:1743, app/Models/MarketingModel.php:1764, app/Models/MarketingModel.php:1791, app/Models/MarketingModel.php:1841, app/Models/MarketingModel.php:1948, app/Models/MarketingModel.php:2109, app/Models/MarketingModel.php:2190, app/Models/MarketingModel.php:2377, app/Models/MarketingModel.php:2449, app/Models/MarketingModel.php:2483, app/Models/MarketingModel.php:2496, app/Models/MarketingModel.php:2698, app/Modules/APIs/Controllers/MarketingController.php:2396, app/Modules/APIs/Controllers/MarketingController.php:2400, app/Modules/APIs/Controllers/ManagementController.php:1648, app/Modules/APIs/Controllers/ManagementController.php:1738, app/Modules/APIs/Controllers/ManagementController.php:1742, app/Modules/Management/Controllers/MarketingController.php:1057, app/Modules/Management/Controllers/MarketingController.php:1072, app/Modules/Management/Controllers/MarketingController.php:1325, app/Modules/Management/Controllers/MarketingController.php:2602, app/Modules/Management/Controllers/MarketingController.php:2729, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:3, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:6, app/Modules/Management/Views/Marketing/EmailDetail.php:2, app/Modules/Marketing_New/Models/MarketingModel.php:9, app/Modules/Advisor/Controllers/AdvisorController.php:106, app/Services/MarketingService.php:326, app/Services/MarketingService.php:382, app/Commands/NewsAudit.php:446, app/Commands/NewsAudit.php:450, app/Commands/NewsAudit.php:478, docs/discord/_inventory.md:20, docs/discord/marketing_news_automation.md:7, docs/discord/marketing_news_automation.md:21, docs/discord/marketing_news_automation.md:52, docs/discord/marketing_news_automation.md:82, docs/marketing/01-mymi-gold-and-coin.md:50, docs/marketing/01-mymi-gold-and-coin.md:156, docs/marketing/02-budgeting-and-investments-libraries.md:108, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/03-mymiexchange-solana.md:95, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/04-mymialerts-premium.md:98, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/05-memberships-and-custom-plans.md:100, docs/marketing/06-referrals-rewards.md:41, docs/marketing/06-referrals-rewards.md:98, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/07-myprojects-real-estate.md:98, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/08-mymi-apis-self-host.md:98, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/09-discord-coffee-and-stocks.md:128, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/10-linkedin-groups-guide.md:93, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/11-facebook-groups-guide.md:93, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/12-discord-no-links-guide.md:94, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/13-x-twitter-guide.md:95, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/14-stocktwits-guide.md:94, docs/marketing/15-youtube-guide.md:41, docs/marketing/15-youtube-guide.md:72, docs/marketing/15-youtube-guide.md:115, docs/marketing/16-tiktok-guide.md:41, docs/marketing/16-tiktok-guide.md:99, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:24, docs/operations/05-database.md:19, docs/operations/05-database.md:28, docs/operations/04-cron-automation.md:24, docs/OVERVIEW.md:176, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:35, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/alerts_marketing_pipline.md:18, docs/alerts/alerts_marketing_pipline.md:23, docs/alerts/alerts_marketing_pipline.md:27, docs/kimi-k2-integration.md:43, docs/kimi-k2-integration.md:57, docs/chatgpt/codex_executive_director/summary.md:36, docs/automation/communities/cron_plan.md:5, docs/health/health_test_checklist.md:405, docs/health/health_test_checklist.md:441, docs/health/health_test_checklist.md:459, docs/health/health_test_checklist.md:477, docs/health/modules/discord_zapier.md:44, docs/health/modules/marketing.md:28, docs/health/modules/marketing.md:62, docs/health/modules/marketing.md:80, docs/spark/categories/marketing/news-audit.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_scraper` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `source_id` int NULL DEFAULT NULL,
  `status` varchar(50) NULL DEFAULT NULL,
  `hash` varchar(255) NULL DEFAULT NULL,
  `type` varchar(100) NULL DEFAULT NULL,
  `url` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT 'General',
  `title` varchar(255) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `formatted_summary` mediumtext NULL DEFAULT NULL,
  `content` longtext NULL DEFAULT NULL,
  `blog_content` text NULL DEFAULT NULL,
  `email_identifier` varchar(100) NULL DEFAULT NULL,
  `email_date` datetime NULL DEFAULT NULL,
  `email_sender` varchar(255) NULL DEFAULT NULL,
  `email_subject` text NULL DEFAULT NULL,
  `email_body` longtext NULL DEFAULT NULL,
  `email_attachments` longtext NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `platforms` text NULL DEFAULT NULL,
  `cta` text NULL DEFAULT NULL,
  `voiceover_url` text NULL DEFAULT NULL,
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
  `trade_alert_subcategory` varchar(50) NULL DEFAULT NULL,
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
  `include_newsletter` int NULL DEFAULT NULL,
  `feature_score` float NULL DEFAULT 0,
  `keyword_score` float NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `grouped` tinyint(1) NULL DEFAULT 0,
  `date_created` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `generated_from_force` tinyint(1) NULL DEFAULT 0,
  `source` varchar(64) NULL DEFAULT NULL,
  `symbols` text NULL DEFAULT NULL,
  `date_scraped` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `topics_json` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- source_id int NULL
- status varchar(50) NULL
- hash varchar(255) NULL
- type varchar(100) NULL
- url varchar(255) NULL
- category varchar(255) NULL
- title varchar(255) NULL
- summary text NULL
- formatted_summary mediumtext NULL
- content longtext NULL
- blog_content text NULL
- email_identifier varchar(100) NULL
- email_date datetime NULL
- email_sender varchar(255) NULL
- email_subject text NULL
- email_body longtext NULL
- email_attachments longtext NULL
- keywords text NULL
- platforms text NULL
- cta text NULL
- voiceover_url text NULL
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
- trade_alert_subcategory varchar(50) NULL
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
- include_newsletter int NULL
- feature_score float NULL
- keyword_score float NULL
- created_at datetime NULL
- grouped tinyint(1) NULL
- date_created datetime NULL
- generated_from_force tinyint(1) NULL
- source varchar(64) NULL
- symbols text NULL
- date_scraped datetime NULL
- topics_json json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_scraper`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

