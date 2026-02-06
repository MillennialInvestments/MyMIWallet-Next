# bf_discord_ai_messages

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordAiMessageModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:49, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:49, docs/aiops/migration_model_audit.md:95, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1232

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_ai_messages` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `session_id` int unsigned NOT NULL DEFAULT NULL,
  `role` enum('user','assistant','system','tool') NOT NULL DEFAULT NULL,
  `content` mediumtext NOT NULL DEFAULT NULL,
  `meta_json` json NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- session_id int unsigned NOT NULL
- role enum('user','assistant','system','tool') NOT NULL
- content mediumtext NOT NULL
- meta_json json NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_ai_messages`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_ai_messages'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_ai_messages'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

