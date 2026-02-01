# bf_discord_events_log

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordModel.php:416, app/Commands/DiscordWireCheck.php:89, docs/discord/alerts_automation.md:41, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:95, docs/discord/server_setup_and_alert_routing.md:189, docs/discord/_inventory.md:11, docs/discord/mysql_discord_schema.md:111, docs/discord/python_workers.md:37, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:41, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:53, docs/_aiops/doc-change-log.md:1157, docs/spark/categories/alerts/discord-process-queue.md:13, docs/spark/categories/alerts/discord-test-liquidity.md:13, docs/spark/categories/alerts/discord-test.md:14, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_events_log` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `level` varchar(16) NOT NULL DEFAULT NULL,
  `event_key` varchar(64) NULL DEFAULT NULL,
  `channel_key` varchar(64) NULL DEFAULT NULL,
  `payload_json` json NULL DEFAULT NULL,
  `details_json` json NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- level varchar(16) NOT NULL
- event_key varchar(64) NULL
- channel_key varchar(64) NULL
- payload_json json NULL
- details_json json NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_events_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_events_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_events_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

