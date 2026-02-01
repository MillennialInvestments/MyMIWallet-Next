# bf_investment_alert_history

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIAlerts.php:1481, app/Libraries/MyMIAlerts.php:1554, app/Libraries/MyMIAlerts.php:2129, app/Libraries/MyMIAlerts.php:2160, app/Models/AlertsModel.php:142, app/Models/AlertsModel.php:395, app/Models/AlertsModel.php:514, app/Models/AlertsModel.php:605, app/Models/AlertsModel.php:622, app/Models/AlertsModel.php:1203, app/Models/AlertsModel.php:1258, app/Models/AlertsModel.php:1275, app/Models/AlertsModel.php:1632, app/Models/AlertsModel.php:1648, app/Models/AlertsModel.php:1650, app/Models/AlertsModel.php:1663, app/Models/AlertsModel.php:1664, app/Models/AlertsModel.php:1718, app/Models/AlertsModel.php:1779, app/Models/AlertsModel.php:2054, app/Models/AlertsModel.php:2278, app/Models/AlertsModel.php:2282, app/Models/AlertsModel.php:2286, app/Models/AlertsModel.php:2290, app/Models/AlertsModel.php:2294, app/Models/AlertsModel.php:2298, app/Models/AlertsModel.php:2302, app/Models/AlertsModel.php:2307, app/Models/AlertsModel.php:2722, app/Models/AlertsModel.php:2789, app/Models/AlertsModel.php:2827, app/Models/AlertsModel.php:2833, app/Models/AlertsModel.php:2839, app/Models/AlertsModel.php:2902, app/Models/AlertsModel.php:2903, app/Models/AlertsModel.php:3218, app/Models/AlertsModel.php:3230, app/Models/AlertsModel.php:3281, app/Models/AlertsModel.php:3286, app/Models/AlertsModel.php:3303, app/Models/InvestmentModel.php:1576, app/Modules/APIs/Controllers/AlertsController.php:254, app/Modules/APIs/Controllers/AlertsController.php:2135, app/Modules/APIs/Controllers/AlertsController.php:2166, docs/ops/runbooks/database-log-review.md:16, docs/ops/n8n-capabilities-for-mymiwallet.md:18, docs/operations/05-database.md:17, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:126, docs/alerts/alerts_marketing_pipline.md:16, docs/alerts/thinkorswim_broker_ingestion.md:9, docs/alerts/thinkorswim_broker_ingestion.md:54, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:94, docs/chatgpt/codex_executive_director/summary.md:29, docs/chatgpt/mymi_alert_system/summary.md:81, docs/chatgpt/mymi_alert_system/summary.md:148, docs/chatgpt/mymi_alert_system/inventory.md:107, docs/chatgpt/mymi_alert_system/standards.md:133, docs/aiops/email-scraper-audit.md:22, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:83, docs/_aiops/doc-change-log.md:1352

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_alert_history` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` int NULL DEFAULT 1,
  `status` varchar(128) NOT NULL DEFAULT 'Opened',
  `occurrences` int NULL DEFAULT 1,
  `alert_count` int NULL DEFAULT 0,
  `distributed_count` int NULL DEFAULT 0,
  `trade_id` int NOT NULL DEFAULT 0,
  `created_on` varchar(128) NULL DEFAULT NULL,
  `updated_at` varchar(256) NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `display` varchar(128) NULL DEFAULT 'Yes',
  `alert_created` tinyint(1) NOT NULL DEFAULT 1,
  `send_alert` tinyint(1) NOT NULL DEFAULT 0,
  `sent_on` datetime NULL DEFAULT NULL,
  `alert_sent` tinyint(1) NOT NULL DEFAULT 0,
  `alerted_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `email_sent` int NULL DEFAULT 0,
  `submitted_date` varchar(128) NULL DEFAULT NULL,
  `ticker` varchar(10) NOT NULL DEFAULT NULL,
  `social_twitter` text NULL DEFAULT NULL,
  `social_facebook` text NULL DEFAULT NULL,
  `social_linkedin` text NULL DEFAULT NULL,
  `social_discord` text NULL DEFAULT NULL,
  `email_content` text NULL DEFAULT NULL,
  `blog_content` text NULL DEFAULT NULL,
  `voiceover_script` text NULL DEFAULT NULL,
  `category` varchar(128) NULL DEFAULT NULL,
  `market_session` varchar(128) NULL DEFAULT NULL,
  `type` varchar(128) NULL DEFAULT NULL,
  `free` varchar(128) NOT NULL DEFAULT 'No',
  `basic` varchar(128) NULL DEFAULT NULL,
  `premium` varchar(128) NULL DEFAULT NULL,
  `gold` varchar(128) NULL DEFAULT NULL,
  `exchange` varchar(128) NULL DEFAULT NULL,
  `company` varchar(128) NULL DEFAULT NULL,
  `open` decimal(10,2) NULL DEFAULT NULL,
  `high` decimal(10,2) NULL DEFAULT NULL,
  `high52` decimal(10,2) NULL DEFAULT NULL,
  `low` decimal(10,2) NULL DEFAULT NULL,
  `low52` decimal(10,2) NULL DEFAULT NULL,
  `price` decimal(10,2) NULL DEFAULT NULL,
  `volume` bigint NULL DEFAULT NULL,
  `volume_actual` bigint NULL DEFAULT NULL,
  `ema5` varchar(45) NULL DEFAULT NULL,
  `ema8` varchar(45) NULL DEFAULT NULL,
  `ema13` varchar(45) NULL DEFAULT NULL,
  `ema34` varchar(45) NULL DEFAULT NULL,
  `ema48` varchar(45) NULL DEFAULT NULL,
  `off_high` decimal(10,2) NULL DEFAULT NULL,
  `off_high52` decimal(10,2) NULL DEFAULT NULL,
  `off_low` decimal(10,2) NULL DEFAULT NULL,
  `off_low52` decimal(10,2) NULL DEFAULT NULL,
  `latest_trading_day` date NULL DEFAULT NULL,
  `previous_close` decimal(10,2) NULL DEFAULT NULL,
  `change` decimal(10,2) NULL DEFAULT NULL,
  `market_cap` varchar(20) NULL DEFAULT NULL,
  `change_percent` varchar(20) NULL DEFAULT NULL,
  `link` varchar(256) NOT NULL DEFAULT 'N/A',
  `current_price` varchar(128) NULL DEFAULT NULL,
  `potential_price` varchar(32) NULL DEFAULT NULL,
  `differential` varchar(32) NULL DEFAULT NULL,
  `potential_gain` varchar(32) NULL DEFAULT NULL,
  `stop_loss_percent` varchar(32) NULL DEFAULT NULL,
  `stop_loss_differential` varchar(32) NULL DEFAULT NULL,
  `stop_loss` varchar(32) NULL DEFAULT NULL,
  `support` varchar(128) NULL DEFAULT NULL,
  `max_entry` varchar(128) NULL DEFAULT NULL,
  `price_high` varchar(32) NULL DEFAULT 0.00,
  `percent_change` int NULL DEFAULT NULL,
  `last_updated` varchar(128) NULL DEFAULT NULL,
  `last_updated_time` varchar(128) NULL DEFAULT NULL,
  `updated_stop_loss_differential` varchar(128) NULL DEFAULT NULL,
  `updated_stop_loss` varchar(128) NULL DEFAULT NULL,
  `closing_date` varchar(128) NULL DEFAULT NULL,
  `closing_time` varchar(128) NULL DEFAULT NULL,
  `details` text NULL DEFAULT NULL,
  `updated_details` text NULL DEFAULT NULL,
  `closing_details` text NULL DEFAULT NULL,
  `financial_news` text NULL DEFAULT NULL,
  `video_link` varchar(256) NULL DEFAULT 'N/A',
  `send_msg` varchar(128) NULL DEFAULT NULL,
  `expdate` varchar(128) NULL DEFAULT NULL,
  `option_type` varchar(128) NULL DEFAULT NULL,
  `expiration` varchar(128) NULL DEFAULT NULL,
  `option_price` varchar(128) NULL DEFAULT NULL,
  `strike` varchar(128) NULL DEFAULT NULL,
  `chart_image` varchar(512) NULL DEFAULT NULL,
  `watchlist` varchar(128) NULL DEFAULT NULL,
  `tv_chart` varchar(256) NULL DEFAULT NULL,
  `tv_chart_type` varchar(20) NULL DEFAULT NULL,
  `notification_sent` tinyint NULL DEFAULT 0,
  `trade_description` text NULL DEFAULT NULL,
  `trade_chart_link` varchar(255) NULL DEFAULT NULL,
  `last_scrape_timestamp` datetime NULL DEFAULT NULL,
  `last_alert_processed` datetime NULL DEFAULT NULL,
  `processing_status` enum('Pending','Completed','Failed') NULL DEFAULT 'Pending',
  `trade_alert_id` int NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `market_sentiment` varchar(255) NULL DEFAULT NULL,
  `free_chart_link` varchar(255) NULL DEFAULT NULL,
  `premium_chart_link` varchar(255) NULL DEFAULT NULL,
  `ema_3_8` varchar(10) NULL DEFAULT NULL,
  `ema_8_13` varchar(10) NULL DEFAULT NULL,
  `ema_13_34` varchar(10) NULL DEFAULT NULL,
  `ema_34_48` varchar(10) NULL DEFAULT NULL,
  `ema_consensus` int NULL DEFAULT NULL,
  `trade_type` varchar(45) NULL DEFAULT 'N/A',
  `target_price` decimal(10,2) NULL DEFAULT NULL,
  `locked_profit_stop` decimal(10,2) NULL DEFAULT NULL,
  `trailing_stop_percent` decimal(5,2) NULL DEFAULT NULL,
  `alert_priority` varchar(128) NULL DEFAULT 'Normal',
  `analysis_summary` text NULL DEFAULT NULL,
  `ema_9` varchar(45) NULL DEFAULT NULL,
  `ema_21` varchar(45) NULL DEFAULT NULL,
  `ema_34` varchar(45) NULL DEFAULT NULL,
  `ema_48` varchar(45) NULL DEFAULT NULL,
  `ema_100` varchar(45) NULL DEFAULT NULL,
  `ema_200` varchar(45) NULL DEFAULT NULL,
  `ema_3` decimal(10,4) NULL DEFAULT NULL,
  `ema_8` decimal(10,4) NULL DEFAULT NULL,
  `ema_13` decimal(10,4) NULL DEFAULT NULL,
  `sma_50` decimal(10,4) NULL DEFAULT NULL,
  `sma_200` decimal(10,4) NULL DEFAULT NULL,
  `macd` decimal(10,4) NULL DEFAULT NULL,
  `rsi` decimal(10,4) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- active int NULL
- status varchar(128) NOT NULL
- occurrences int NULL
- alert_count int NULL
- distributed_count int NULL
- trade_id int NOT NULL
- created_on varchar(128) NULL
- updated_at varchar(256) NULL
- date datetime NULL
- display varchar(128) NULL
- alert_created tinyint(1) NOT NULL
- send_alert tinyint(1) NOT NULL
- sent_on datetime NULL
- alert_sent tinyint(1) NOT NULL
- alerted_on datetime NULL
- email_sent int NULL
- submitted_date varchar(128) NULL
- ticker varchar(10) NOT NULL
- social_twitter text NULL
- social_facebook text NULL
- social_linkedin text NULL
- social_discord text NULL
- email_content text NULL
- blog_content text NULL
- voiceover_script text NULL
- category varchar(128) NULL
- market_session varchar(128) NULL
- type varchar(128) NULL
- free varchar(128) NOT NULL
- basic varchar(128) NULL
- premium varchar(128) NULL
- gold varchar(128) NULL
- exchange varchar(128) NULL
- company varchar(128) NULL
- open decimal(10,2) NULL
- high decimal(10,2) NULL
- high52 decimal(10,2) NULL
- low decimal(10,2) NULL
- low52 decimal(10,2) NULL
- price decimal(10,2) NULL
- volume bigint NULL
- volume_actual bigint NULL
- ema5 varchar(45) NULL
- ema8 varchar(45) NULL
- ema13 varchar(45) NULL
- ema34 varchar(45) NULL
- ema48 varchar(45) NULL
- off_high decimal(10,2) NULL
- off_high52 decimal(10,2) NULL
- off_low decimal(10,2) NULL
- off_low52 decimal(10,2) NULL
- latest_trading_day date NULL
- previous_close decimal(10,2) NULL
- change decimal(10,2) NULL
- market_cap varchar(20) NULL
- change_percent varchar(20) NULL
- link varchar(256) NOT NULL
- current_price varchar(128) NULL
- potential_price varchar(32) NULL
- differential varchar(32) NULL
- potential_gain varchar(32) NULL
- stop_loss_percent varchar(32) NULL
- stop_loss_differential varchar(32) NULL
- stop_loss varchar(32) NULL
- support varchar(128) NULL
- max_entry varchar(128) NULL
- price_high varchar(32) NULL
- percent_change int NULL
- last_updated varchar(128) NULL
- last_updated_time varchar(128) NULL
- updated_stop_loss_differential varchar(128) NULL
- updated_stop_loss varchar(128) NULL
- closing_date varchar(128) NULL
- closing_time varchar(128) NULL
- details text NULL
- updated_details text NULL
- closing_details text NULL
- financial_news text NULL
- video_link varchar(256) NULL
- send_msg varchar(128) NULL
- expdate varchar(128) NULL
- option_type varchar(128) NULL
- expiration varchar(128) NULL
- option_price varchar(128) NULL
- strike varchar(128) NULL
- chart_image varchar(512) NULL
- watchlist varchar(128) NULL
- tv_chart varchar(256) NULL
- tv_chart_type varchar(20) NULL
- notification_sent tinyint NULL
- trade_description text NULL
- trade_chart_link varchar(255) NULL
- last_scrape_timestamp datetime NULL
- last_alert_processed datetime NULL
- processing_status enum('Pending','Completed','Failed') NULL
- trade_alert_id int NULL
- updated_on datetime NULL
- market_sentiment varchar(255) NULL
- free_chart_link varchar(255) NULL
- premium_chart_link varchar(255) NULL
- ema_3_8 varchar(10) NULL
- ema_8_13 varchar(10) NULL
- ema_13_34 varchar(10) NULL
- ema_34_48 varchar(10) NULL
- ema_consensus int NULL
- trade_type varchar(45) NULL
- target_price decimal(10,2) NULL
- locked_profit_stop decimal(10,2) NULL
- trailing_stop_percent decimal(5,2) NULL
- alert_priority varchar(128) NULL
- analysis_summary text NULL
- ema_9 varchar(45) NULL
- ema_21 varchar(45) NULL
- ema_34 varchar(45) NULL
- ema_48 varchar(45) NULL
- ema_100 varchar(45) NULL
- ema_200 varchar(45) NULL
- ema_3 decimal(10,4) NULL
- ema_8 decimal(10,4) NULL
- ema_13 decimal(10,4) NULL
- sma_50 decimal(10,4) NULL
- sma_200 decimal(10,4) NULL
- macd decimal(10,4) NULL
- rsi decimal(10,4) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_alert_history`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_history'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

