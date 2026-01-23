# bf_ai_usage

## Source
- Migration: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php
- Model: app/Models/AiUsageModel.php
- Code references: app/Models/AiUsageModel.php, docs/codex/01_pr1_foundations.md

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ai_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(150) NOT NULL,
  `action` VARCHAR(150) NULL,
  `user_id` BIGINT UNSIGNED NULL,
  `tokens_prompt` INT(11) NOT NULL DEFAULT 0,
  `tokens_completion` INT(11) NOT NULL DEFAULT 0,
  `cost_usd` DECIMAL(10,4) NOT NULL DEFAULT 0.0000,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- subsystem VARCHAR(150) NOT NULL
- action VARCHAR(150) NULL
- user_id BIGINT UNSIGNED NULL
- tokens_prompt INT(11) NOT NULL
- tokens_completion INT(11) NOT NULL
- cost_usd DECIMAL(10,4) NOT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- subsystem (subsystem)

## Verification
```sql
SHOW CREATE TABLE bf_ai_usage;
```
