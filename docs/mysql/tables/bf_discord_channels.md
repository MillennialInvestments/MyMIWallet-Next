# bf_discord_channels

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordModel.php:27, app/Models/DiscordModel.php:138, app/Models/DiscordModel.php:159, app/Models/DiscordModel.php:189, app/Models/DiscordModel.php:201, app/Models/DiscordModel.php:226, app/Models/DiscordModel.php:230, app/Models/DiscordModel.php:235, app/Models/DiscordModel.php:384, app/Config/Discord.php:27, app/Config/Discord.php:43, app/Commands/DiscordList.php:36, app/Commands/DiscordList.php:110, app/Commands/DiscordList.php:114, app/Commands/DiscordList.php:119, app/Commands/DiscordList.php:168, app/Commands/DiscordWireCheck.php:83, docs/discord/alerts_automation.md:7, docs/discord/alerts_automation.md:13, docs/discord/alerts_automation.md:37, docs/discord/alerts_automation.md:55, docs/discord/alerts_automation.md:68, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_ci4_integration.md:60, docs/discord/server_setup_and_ci4_integration.md:78, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:71, docs/discord/server_setup_and_alert_routing.md:143, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:11, docs/discord/_inventory.md:15, docs/discord/_inventory.md:23, docs/discord/_inventory.md:24, docs/discord/environments.md:22, docs/discord/my_midiscord_server_setup_and_alert_routing.md:6, docs/discord/my_midiscord_server_setup_and_alert_routing.md:44, docs/discord/mysql_discord_schema.md:8, docs/discord/mysql_discord_schema.md:148, docs/discord_schema.sql.md:6, docs/discord_seed.sql.md:2, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:33, docs/functional_inventory/docs_to_code_map.md:37, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/health/health_test_checklist.md:364, docs/health/modules/alerts.md:63, docs/health/modules/discord_zapier.md:10, docs/spark/categories/alerts/discord-list.md:13, docs/spark/categories/alerts/discord-process-queue.md:13, docs/spark/categories/alerts/discord-test.md:14, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_channels` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `channel_key` varchar(64) NOT NULL DEFAULT NULL,
  `name` varchar(128) NULL DEFAULT NULL,
  `webhook_url` text NULL DEFAULT NULL,
  `channel_id` varchar(64) NULL DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `allow_embeds` tinyint(1) NOT NULL DEFAULT 1,
  `min_interval_sec` int NULL DEFAULT 60,
  `last_sent_at` datetime NULL DEFAULT NULL,
  `role_id` varchar(64) NULL DEFAULT NULL,
  `category` varchar(64) NULL DEFAULT NULL,
  `priority` int NOT NULL DEFAULT 5,
  `topic` varchar(255) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- channel_key varchar(64) NOT NULL
- name varchar(128) NULL
- webhook_url text NULL
- channel_id varchar(64) NULL
- is_enabled tinyint(1) NOT NULL
- allow_embeds tinyint(1) NOT NULL
- min_interval_sec int NULL
- last_sent_at datetime NULL
- role_id varchar(64) NULL
- category varchar(64) NULL
- priority int NOT NULL
- topic varchar(255) NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_channels`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_channels'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

