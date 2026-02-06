# bf_discord_templates

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordModel.php:21, app/Models/DiscordModel.php:194, app/Models/DiscordModel.php:202, app/Models/DiscordModel.php:252, app/Models/DiscordModel.php:256, app/Models/DiscordModel.php:261, app/Commands/DiscordWireCheck.php:84, docs/discord/discord_seed_v3.sql.md:2, docs/discord/server_setup_and_ci4_integration.md:42, docs/discord/server_setup_and_alert_routing.md:23, docs/discord/server_setup_and_alert_routing.md:77, docs/discord/server_setup_and_alert_routing.md:145, docs/discord/server_setup_and_alert_routing.md:186, docs/discord/_inventory.md:15, docs/discord/_inventory.md:19, docs/discord/_inventory.md:24, docs/discord/events_matrix.md:18, docs/discord/mysql_discord_schema.md:28, docs/discord_schema.sql.md:22, docs/discord_seed.sql.md:13, docs/OVERVIEW.md:234, docs/OVERVIEW.md:236, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:30, docs/functional_inventory/docs_to_code_map.md:34, docs/functional_inventory/docs_to_code_map.md:38, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:43, docs/functional_inventory/docs_to_code_map.md:47, docs/functional_inventory/docs_to_code_map.md:48, docs/functional_inventory/docs_to_code_map.md:51, docs/codex/reviews/Spark-Analysis-2026-02-01.md:334, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:58, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:58, docs/_aiops/doc-change-log.md:1271, docs/health/health_test_checklist.md:364, docs/health/modules/alerts.md:63, docs/health/modules/discord_zapier.md:10, docs/spark/categories/alerts/discord-wire-check.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_templates` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `template_key` varchar(100) NOT NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `content` text NOT NULL DEFAULT NULL,
  `embed_json` text NULL DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- template_key varchar(100) NOT NULL
- title varchar(255) NULL
- content text NOT NULL
- embed_json text NULL
- is_enabled tinyint(1) NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_templates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

