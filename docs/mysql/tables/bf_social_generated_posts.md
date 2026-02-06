# bf_social_generated_posts

## Source
- Migration: 2025-12-23-000001_CreateCommunityAndTemplateTables.php
- Model:
- Code references: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:21, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:117, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:134, app/Models/SocialGeneratedPostModel.php:9, docs/automation/communities/cron_plan.md:7, docs/automation/communities/post_generation_rules.md:9, docs/communities/discord.md:56, docs/communities/facebook.md:54, docs/communities/linkedin.md:54, docs/communities/stocktwits.md:52, docs/communities/tiktok.md:54, docs/communities/twitch.md:54, docs/communities/x_twitter.md:53, docs/communities/youtube.md:60, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:191, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:191, docs/aiops/migration_model_audit.md:181, docs/aiops/migration_model_audit.md:256, docs/_aiops/doc-change-log.md:1958

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_social_generated_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_type` VARCHAR(50) NOT NULL,
  `source_id` INT(11) NOT NULL,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_id` INT(11) UNSIGNED NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `post_title` VARCHAR(255) NULL,
  `post_body` MEDIUMTEXT NOT NULL,
  `hashtags` TEXT NULL,
  `tickers` TEXT NULL,
  `cta_link` VARCHAR(255) NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'draft',
  `posted_at` DATETIME NULL,
  `external_post_url` VARCHAR(255) NULL,
  `error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `source_type_source_id` (`source_type`, `source_id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`community_id`) REFERENCES `bf_social_communities` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  FOREIGN KEY (`template_id`) REFERENCES `bf_social_post_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- source_type VARCHAR(50) NOT NULL
- source_id INT(11) NOT NULL
- platform_id INT(11) UNSIGNED NOT NULL
- community_id INT(11) UNSIGNED NULL
- template_id INT(11) UNSIGNED NOT NULL
- post_title VARCHAR(255) NULL
- post_body MEDIUMTEXT NOT NULL
- hashtags TEXT NULL
- tickers TEXT NULL
- cta_link VARCHAR(255) NULL
- status VARCHAR(25) NOT NULL
- posted_at DATETIME NULL
- external_post_url VARCHAR(255) NULL
- error TEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- source_type_source_id (source_type, source_id)

## Verification
```sql
SHOW CREATE TABLE `bf_social_generated_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

