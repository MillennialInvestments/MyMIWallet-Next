# bf_discord_logs

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordModel.php:348, app/Models/DiscordModel.php:429, app/Commands/DiscordWireCheck.php:90, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:95, docs/discord/server_setup_and_alert_routing.md:189, docs/discord/mysql_discord_schema.md:123, docs/discord_schema.sql.md:84, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:51, docs/codex/reviews/Spark-Analysis-2026-02-01.md:340, docs/_aiops/doc-change-log.md:1253, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_logs` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `channel` varchar(128) NOT NULL DEFAULT NULL,
  `message` text NOT NULL DEFAULT NULL,
  `payload_json` json NULL DEFAULT NULL,
  `status` enum('sent','failed') NOT NULL DEFAULT NULL,
  `error_message` text NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- channel varchar(128) NOT NULL
- message text NOT NULL
- payload_json json NULL
- status enum('sent','failed') NOT NULL
- error_message text NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_logs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_logs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

