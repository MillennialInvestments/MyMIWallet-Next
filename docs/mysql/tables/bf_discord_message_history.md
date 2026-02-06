# bf_discord_message_history

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordModel.php:102, app/Models/DiscordModel.php:110, app/Models/DiscordModel.php:127, app/Models/DiscordModel.php:169, app/Commands/DiscordWireCheck.php:87, docs/discord/discord_schema_v3.sql.md:12, docs/discord/discord_schema_v3.sql.md:15, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:93, docs/discord/_inventory.md:18, docs/discord/mysql_discord_schema.md:83, docs/discord_schema.sql.md:63, docs/OVERVIEW.md:247, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:29, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/codex/reviews/Spark-Analysis-2026-02-01.md:337, docs/_aiops/doc-change-log.md:1256, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_message_history` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `external_message_id` varchar(128) NOT NULL DEFAULT NULL,
  `channel` varchar(128) NOT NULL DEFAULT NULL,
  `content_hash` char(64) NOT NULL DEFAULT NULL,
  `sent_at` datetime NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- external_message_id varchar(128) NOT NULL
- channel varchar(128) NOT NULL
- content_hash char(64) NOT NULL
- sent_at datetime NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_message_history`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_message_history'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_message_history'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

