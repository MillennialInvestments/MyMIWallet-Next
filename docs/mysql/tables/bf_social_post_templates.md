# bf_social_post_templates

## Source
- Migration: 2025-12-23-000001_CreateCommunityAndTemplateTables.php
- Model:
- Code references: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:22, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:88, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:116, app/Models/SocialPostTemplateModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:193, docs/aiops/migration_model_audit.md:183, docs/aiops/migration_model_audit.md:258, docs/_aiops/doc-change-log.md:1754

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_social_post_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `template_key` VARCHAR(64) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `max_chars` INT(11) NULL,
  `hashtag_limit` INT(11) NULL,
  `supports_links` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_mentions` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_tickers` TINYINT(1) NOT NULL DEFAULT 1,
  `rules_json` TEXT NULL,
  `body_template` TEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `platform_id_template_key` (`platform_id`, `template_key`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- platform_id INT(11) UNSIGNED NOT NULL
- template_key VARCHAR(64) NOT NULL
- title VARCHAR(255) NOT NULL
- max_chars INT(11) NULL
- hashtag_limit INT(11) NULL
- supports_links TINYINT(1) NOT NULL
- supports_mentions TINYINT(1) NOT NULL
- supports_tickers TINYINT(1) NOT NULL
- rules_json TEXT NULL
- body_template TEXT NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- platform_id_template_key (platform_id, template_key)

## Verification
```sql
SHOW CREATE TABLE `bf_social_post_templates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

