# bf_discord_links

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordLinkModel.php:11, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:54, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:54, docs/aiops/migration_model_audit.md:98, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1250

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_links` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NULL DEFAULT NULL,
  `discord_user_id` varchar(50) NOT NULL DEFAULT NULL,
  `discord_username` varchar(255) NULL DEFAULT NULL,
  `link_token` varchar(255) NULL DEFAULT NULL,
  `token_expires_at` datetime NULL DEFAULT NULL,
  `is_linked` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(32) NOT NULL DEFAULT 'pending',
  `ai_persona` varchar(64) NULL DEFAULT NULL,
  `last_seen_at` datetime NULL DEFAULT NULL,
  `scopes_json` json NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NULL
- discord_user_id varchar(50) NOT NULL
- discord_username varchar(255) NULL
- link_token varchar(255) NULL
- token_expires_at datetime NULL
- is_linked tinyint(1) NOT NULL
- status varchar(32) NOT NULL
- ai_persona varchar(64) NULL
- last_seen_at datetime NULL
- scopes_json json NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_links`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_links'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

