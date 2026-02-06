# bf_social_platforms

## Source
- Migration: 2025-12-23-000001_CreateCommunityAndTemplateTables.php
- Model:
- Code references: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:24, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:44, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:64, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:87, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:114, app/Models/SocialPlatformModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:192, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:192, docs/aiops/migration_model_audit.md:182, docs/aiops/migration_model_audit.md:257, docs/_aiops/doc-change-log.md:1961

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_social_platforms` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_key` VARCHAR(32) NOT NULL,
  `display_name` VARCHAR(100) NOT NULL,
  `base_url` VARCHAR(255) NULL,
  `supports_groups` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_short_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_long_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_live` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_polls` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_threads` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- platform_key VARCHAR(32) NOT NULL
- display_name VARCHAR(100) NOT NULL
- base_url VARCHAR(255) NULL
- supports_groups TINYINT(1) NOT NULL
- supports_short_video TINYINT(1) NOT NULL
- supports_long_video TINYINT(1) NOT NULL
- supports_live TINYINT(1) NOT NULL
- supports_polls TINYINT(1) NOT NULL
- supports_threads TINYINT(1) NOT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_social_platforms`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

