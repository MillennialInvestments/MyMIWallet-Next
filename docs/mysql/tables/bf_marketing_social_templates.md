# bf_marketing_social_templates

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:3, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:7, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:141, docs/_aiops/doc-change-log.md:1538

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_social_templates` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `name` varchar(64) NOT NULL DEFAULT NULL,
  `template_body` text NOT NULL DEFAULT NULL,
  `media_hint` varchar(128) NULL DEFAULT NULL,
  `hashtags_hint` varchar(512) NULL DEFAULT NULL,
  `max_length` int unsigned NULL DEFAULT NULL,
  `allow_links` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(64) NULL DEFAULT 'system',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- active tinyint(1) NOT NULL
- platform varchar(32) NOT NULL
- name varchar(64) NOT NULL
- template_body text NOT NULL
- media_hint varchar(128) NULL
- hashtags_hint varchar(512) NULL
- max_length int unsigned NULL
- allow_links tinyint(1) NOT NULL
- created_by varchar(64) NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_social_templates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_social_templates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_social_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

