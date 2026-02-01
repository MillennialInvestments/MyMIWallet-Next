# bf_chat_tool_runs

## Source
- Migration: 2026-01-15-000100_CreateChatToolRuns.php
- Model:
- Code references: app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php:26, app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php:31, app/Models/ChatToolRunModel.php:11, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:41, docs/aiops/migration_model_audit.md:85, docs/aiops/migration_model_audit.md:224, docs/_aiops/doc-change-log.md:1088, docs/chat/ARCHITECTURE.md:21, docs/chat/CI4_INTEGRATION.md:56, docs/chat/CI4_INTEGRATION.md:61, docs/chat/DEPLOYMENT.md:24, docs/chat/README.md:31, docs/chat/OPS.md:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_chat_tool_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `mode` VARCHAR(25) NOT NULL,
  `tool` VARCHAR(100) NOT NULL,
  `request_json` LONGTEXT NULL,
  `response_json` LONGTEXT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'success',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_tool` (`user_id`, `tool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- user_id BIGINT UNSIGNED NOT NULL
- mode VARCHAR(25) NOT NULL
- tool VARCHAR(100) NOT NULL
- request_json LONGTEXT NULL
- response_json LONGTEXT NULL
- status VARCHAR(20) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id_tool (user_id, tool)

## Verification
```sql
SHOW CREATE TABLE `bf_chat_tool_runs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

