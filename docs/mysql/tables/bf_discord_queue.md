# bf_discord_queue

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIDiscord.php:229, app/Libraries/MyMIDiscord.php:277, app/Models/DiscordModel.php:36, app/Models/DiscordModel.php:53, app/Models/DiscordModel.php:65, app/Models/DiscordModel.php:72, app/Models/DiscordModel.php:79, app/Models/DiscordModel.php:120, app/Models/DiscordModel.php:124, app/Models/DiscordModel.php:145, app/Models/DiscordModel.php:150, app/Models/DiscordModel.php:380, app/Models/DiscordModel.php:381, app/Models/DiscordModel.php:382, app/Modules/APIs/Controllers/DiscordController.php:96, app/Modules/APIs/Controllers/DiscordController.php:103, app/Commands/DiscordWireCheck.php:86, app/Commands/DiscordWireCheck.php:110, app/Commands/DiscordWireCheck.php:111, app/Commands/DiscordWireCheck.php:112, docs/discord/discord_schema_v3.sql.md:30, docs/discord/alerts_automation.md:9, docs/discord/alerts_automation.md:39, docs/discord/alerts_automation.md:62, docs/discord/server_setup_and_ci4_integration.md:73, docs/discord/server_setup_and_alert_routing.md:10, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:87, docs/discord/server_setup_and_alert_routing.md:102, docs/discord/_inventory.md:11, docs/discord/_inventory.md:18, docs/discord/_inventory.md:24, docs/discord/my_midiscord_server_setup_and_alert_routing.md:44, docs/discord/mysql_discord_schema.md:62, docs/discord_schema.sql.md:47, docs/OVERVIEW.md:247, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:37, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/health/health_test_checklist.md:364, docs/health/modules/alerts.md:63, docs/health/modules/discord_zapier.md:10, docs/spark/categories/alerts/discord-process-queue.md:13, docs/spark/categories/alerts/discord-test-liquidity.md:13, docs/spark/categories/alerts/discord-test.md:14, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_queue` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `channel_key` varchar(64) NOT NULL DEFAULT NULL,
  `payload_json` json NOT NULL DEFAULT NULL,
  `status` enum('queued','sent','failed','skipped') NULL DEFAULT 'queued',
  `priority` int NULL DEFAULT 5,
  `dedupe_key` varchar(128) NULL DEFAULT NULL,
  `coalesce_key` varchar(128) NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `available_at` datetime NULL DEFAULT NULL,
  `error` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `sent_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- channel_key varchar(64) NOT NULL
- payload_json json NOT NULL
- status enum('queued','sent','failed','skipped') NULL
- priority int NULL
- dedupe_key varchar(128) NULL
- coalesce_key varchar(128) NULL
- scheduled_at datetime NULL
- available_at datetime NULL
- error text NULL
- created_at datetime NULL
- sent_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

