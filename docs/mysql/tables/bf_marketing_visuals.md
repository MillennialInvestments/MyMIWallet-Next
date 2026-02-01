# bf_marketing_visuals

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:859, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:145, docs/_aiops/doc-change-log.md:1550

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_visuals` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `summary_id` int NOT NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `slug` varchar(255) NULL DEFAULT NULL,
  `voiceover_text` text NULL DEFAULT NULL,
  `voiceover_audio_url` varchar(512) NULL DEFAULT NULL,
  `storyboard_json` json NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `tags` text NULL DEFAULT NULL,
  `topic` varchar(255) NULL DEFAULT NULL,
  `platforms` varchar(255) NULL DEFAULT NULL,
  `output_format` varchar(50) NULL DEFAULT 'json',
  `template_reference` varchar(255) NULL DEFAULT NULL,
  `zapier_sent` tinyint(1) NULL DEFAULT 0,
  `zapier_sent_at` datetime NULL DEFAULT NULL,
  `status` varchar(50) NULL DEFAULT 'draft',
  `notes` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- summary_id int NOT NULL
- title varchar(255) NOT NULL
- slug varchar(255) NULL
- voiceover_text text NULL
- voiceover_audio_url varchar(512) NULL
- storyboard_json json NULL
- keywords text NULL
- tags text NULL
- topic varchar(255) NULL
- platforms varchar(255) NULL
- output_format varchar(50) NULL
- template_reference varchar(255) NULL
- zapier_sent tinyint(1) NULL
- zapier_sent_at datetime NULL
- status varchar(50) NULL
- notes text NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_visuals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_visuals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_visuals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

