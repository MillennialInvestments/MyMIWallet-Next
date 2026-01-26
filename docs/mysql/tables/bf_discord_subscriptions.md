# bf_discord_subscriptions

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIDiscord.php:214, app/Models/DiscordModel.php:14, app/Models/DiscordModel.php:87, app/Models/DiscordModel.php:199, app/Models/DiscordModel.php:291, app/Models/DiscordModel.php:295, app/Models/DiscordModel.php:343, app/Commands/DiscordList.php:162, app/Commands/DiscordList.php:166, app/Commands/DiscordList.php:173, app/Commands/DiscordWireCheck.php:85, docs/discord/discord_schema_v3.sql.md:7, docs/discord/discord_seed_v3.sql.md:9, docs/discord/alerts_automation.md:38, docs/discord/alerts_automation.md:56, docs/discord/alerts_automation.md:69, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:82, docs/discord/server_setup_and_alert_routing.md:149, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:11, docs/discord/_inventory.md:15, docs/discord/_inventory.md:17, docs/discord/_inventory.md:18, docs/discord/_inventory.md:19, docs/discord/_inventory.md:24, docs/discord/_inventory.md:26, docs/discord/events_matrix.md:3, docs/discord/events_matrix.md:18, docs/discord/mysql_discord_schema.md:41, docs/discord/mysql_discord_schema.md:148, docs/discord_schema.sql.md:34, docs/discord_seed.sql.md:27, docs/OVERVIEW.md:234, docs/OVERVIEW.md:236, docs/OVERVIEW.md:247, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:30, docs/functional_inventory/docs_to_code_map.md:34, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/spark/categories/alerts/discord-list.md:13, docs/spark/categories/alerts/discord-process-queue.md:13, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_subscriptions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `event_key` varchar(64) NOT NULL DEFAULT NULL,
  `channel_key` varchar(64) NOT NULL DEFAULT NULL,
  `template_key` varchar(64) NOT NULL DEFAULT NULL,
  `filters_json` text NULL DEFAULT NULL,
  `digest_window_sec` int NULL DEFAULT 0,
  `max_per_window` int NULL DEFAULT 0,
  `priority` varchar(64) NULL DEFAULT NULL,
  `quiet_bypass` tinyint(1) NULL DEFAULT 0,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- event_key varchar(64) NOT NULL
- channel_key varchar(64) NOT NULL
- template_key varchar(64) NOT NULL
- filters_json text NULL
- digest_window_sec int NULL
- max_per_window int NULL
- priority varchar(64) NULL
- quiet_bypass tinyint(1) NULL
- is_enabled tinyint(1) NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_subscriptions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_subscriptions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

