# bf_chat_archives

## Source
- Migration: 2026-04-15-000100_CreateChatGovernanceTables.php
- Model:
- Code references: app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:19, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:37, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:64, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:65, app/Models/ChatArchiveModel.php:11, docs/chatgpt/aiops/chat_governance_indexing.md:17, docs/chatgpt/aiops/chat_governance_indexing.md:46, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:40, docs/_aiops/doc-change-log.md:1082

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_chat_archives` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_file` VARCHAR(255) NOT NULL,
  `project` VARCHAR(120) NOT NULL DEFAULT 'default',
  `chat_date` DATE NULL,
  `title` VARCHAR(255) NULL,
  `overall_status` VARCHAR(40) NOT NULL DEFAULT 'unknown',
  `next_required_step` VARCHAR(40) NULL,
  `last_updated` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_file` (`chat_file`),
  KEY `project` (`project`),
  KEY `chat_date` (`chat_date`),
  KEY `overall_status` (`overall_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- chat_file VARCHAR(255) NOT NULL
- project VARCHAR(120) NOT NULL
- chat_date DATE NULL
- title VARCHAR(255) NULL
- overall_status VARCHAR(40) NOT NULL
- next_required_step VARCHAR(40) NULL
- last_updated DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- chat_file (chat_file) [UNIQUE]
- project (project)
- chat_date (chat_date)
- overall_status (overall_status)

## Verification
```sql
SHOW CREATE TABLE `bf_chat_archives`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_archives'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

