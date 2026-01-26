# bf_site_settings_overrides

## Source
- Migration: 2026-01-01-000001_CreateAiOpsTables.php
- Model:
- Code references: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:76, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:84, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:89, app/Libraries/SiteSettingsOverride.php:17, app/Libraries/SiteSettingsOverride.php:21, app/Libraries/SiteSettingsOverride.php:40, app/Libraries/SiteSettingsOverride.php:42, app/Libraries/SiteSettingsOverride.php:44, docs/aiops/README.md:10

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_site_settings_overrides` (
  `setting_key` VARCHAR(64) NOT NULL,
  `setting_value` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `updated_by` BIGINT NULL,
  PRIMARY KEY (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- setting_key VARCHAR(64) NOT NULL
- setting_value VARCHAR(255) NOT NULL
- updated_at DATETIME NOT NULL
- updated_by BIGINT NULL

## Required indexes
- PRIMARY (setting_key)

## Verification
```sql
SHOW CREATE TABLE `bf_site_settings_overrides`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_site_settings_overrides'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

