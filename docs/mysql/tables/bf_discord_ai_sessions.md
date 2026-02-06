# bf_discord_ai_sessions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DiscordAiSessionModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:51, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:51, docs/aiops/migration_model_audit.md:97, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1238

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_discord_ai_sessions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NULL DEFAULT NULL,
  `discord_user_id` varchar(64) NULL DEFAULT NULL,
  `channel_id` varchar(64) NULL DEFAULT NULL,
  `session_key` varchar(64) NOT NULL DEFAULT NULL,
  `topic` varchar(255) NULL DEFAULT NULL,
  `context_json` json NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NULL
- discord_user_id varchar(64) NULL
- channel_id varchar(64) NULL
- session_key varchar(64) NOT NULL
- topic varchar(255) NULL
- context_json json NULL
- is_active tinyint(1) NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_discord_ai_sessions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_ai_sessions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_discord_ai_sessions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

