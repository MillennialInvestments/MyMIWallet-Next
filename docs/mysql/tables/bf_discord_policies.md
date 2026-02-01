# bf_discord_policies

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIDiscord.php:188, app/Models/DiscordModel.php:300, app/Models/DiscordModel.php:329, app/Models/DiscordModel.php:333, app/Models/DiscordModel.php:338, app/Commands/DiscordWireCheck.php:88, docs/discord/discord_schema_v3.sql.md:18, docs/discord/alerts_automation.md:40, docs/discord/alerts_automation.md:63, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:94, docs/discord/server_setup_and_alert_routing.md:191, docs/discord/_inventory.md:11, docs/discord/_inventory.md:18, docs/discord/mysql_discord_schema.md:98, docs/OVERVIEW.md:247, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:27, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:55, docs/_aiops/doc-change-log.md:1169, docs/spark/categories/alerts/discord-process-queue.md:13, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_policies` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `pattern` varchar(255) NOT NULL DEFAULT NULL,
  `action` enum('drop','mask') NOT NULL DEFAULT NULL,
  `rule_type` enum('blocklist','allowlist') NULL DEFAULT 'blocklist',
  `mask_with` varchar(255) NULL DEFAULT NULL,
  `is_enabled` tinyint(1) NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- pattern varchar(255) NOT NULL
- action enum('drop','mask') NOT NULL
- rule_type enum('blocklist','allowlist') NULL
- mask_with varchar(255) NULL
- is_enabled tinyint(1) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_policies`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_policies'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

