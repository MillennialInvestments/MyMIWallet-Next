# bf_social_distribution_queue

## Source
- Migration: 2025-12-23-000001_CreateCommunityAndTemplateTables.php
- Model:
- Code references: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:20, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:135, app/Models/SocialDistributionQueueModel.php:9, docs/automation/communities/cron_plan.md:11, docs/automation/communities/distribution_matrix.md:14, docs/communities/discord.md:56, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:190, docs/aiops/migration_model_audit.md:180, docs/aiops/migration_model_audit.md:255, docs/_aiops/doc-change-log.md:1745

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_social_distribution_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `generated_post_id` INT(11) UNSIGNED NOT NULL,
  `channel_key` VARCHAR(50) NOT NULL,
  `payload_json` TEXT NOT NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `last_error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`generated_post_id`) REFERENCES `bf_social_generated_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- generated_post_id INT(11) UNSIGNED NOT NULL
- channel_key VARCHAR(50) NOT NULL
- payload_json TEXT NOT NULL
- status VARCHAR(25) NOT NULL
- attempts INT(11) NOT NULL
- last_error TEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_social_distribution_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

