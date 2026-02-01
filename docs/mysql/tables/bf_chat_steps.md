# bf_chat_steps

## Source
- Migration: 2026-04-15-000100_CreateChatGovernanceTables.php
- Model:
- Code references: app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:40, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:54, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:60, app/Database/Migrations/2026-04-15-000100_CreateChatGovernanceTables.php:61, app/Models/ChatStepModel.php:11, docs/chatgpt/aiops/chat_governance_indexing.md:18, docs/chatgpt/aiops/chat_governance_indexing.md:46, docs/_aiops/doc-change-log.md:1085

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_chat_steps` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_archive_id` BIGINT UNSIGNED NOT NULL,
  `step` VARCHAR(20) NOT NULL,
  `status` VARCHAR(30) NOT NULL DEFAULT 'unknown',
  `detected_at` DATETIME NOT NULL,
  `notes` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_archive_id_step` (`chat_archive_id`, `step`),
  KEY `chat_archive_id` (`chat_archive_id`),
  KEY `step` (`step`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- chat_archive_id BIGINT UNSIGNED NOT NULL
- step VARCHAR(20) NOT NULL
- status VARCHAR(30) NOT NULL
- detected_at DATETIME NOT NULL
- notes TEXT NULL

## Required indexes
- PRIMARY (id)
- chat_archive_id_step (chat_archive_id, step) [UNIQUE]
- chat_archive_id (chat_archive_id)
- step (step)
- status (status)

## Verification
```sql
SHOW CREATE TABLE `bf_chat_steps`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_steps'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_steps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

