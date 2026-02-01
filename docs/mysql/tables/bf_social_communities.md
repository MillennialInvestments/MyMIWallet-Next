# bf_social_communities

## Source
- Migration: 2025-12-23-000001_CreateCommunityAndTemplateTables.php
- Model:
- Code references: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:23, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:65, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:115, app/Models/SocialCommunityModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:189, docs/aiops/migration_model_audit.md:179, docs/aiops/migration_model_audit.md:254, docs/_aiops/doc-change-log.md:1742

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_social_communities` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_name` VARCHAR(150) NOT NULL,
  `community_type` VARCHAR(50) NOT NULL,
  `community_url` VARCHAR(255) NOT NULL,
  `join_url` VARCHAR(255) NOT NULL,
  `invite_code` VARCHAR(100) NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `status` VARCHAR(50) NOT NULL DEFAULT 'active',
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- platform_id INT(11) UNSIGNED NOT NULL
- community_name VARCHAR(150) NOT NULL
- community_type VARCHAR(50) NOT NULL
- community_url VARCHAR(255) NOT NULL
- join_url VARCHAR(255) NOT NULL
- invite_code VARCHAR(100) NULL
- is_primary TINYINT(1) NOT NULL
- status VARCHAR(50) NOT NULL
- notes TEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_social_communities`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

