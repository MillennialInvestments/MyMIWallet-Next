# bf_users_discord_links

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/APIs/Controllers/DiscordController.php:249, docs/discord/discord_to_ci4_commands.md:16, docs/discord/discord_to_ci4_commands.md:22, docs/discord/discord_to_ci4_commands.md:146, docs/discord/discord_to_ci4_commands.md:178, docs/discord/discord_to_ci4_commands.md:204, docs/discord/_inventory.md:17, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:31, docs/functional_inventory/docs_to_code_map.md:51, docs/_aiops/doc-change-log.md:2162

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_discord_links` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_discord_links`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_discord_links'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_discord_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

