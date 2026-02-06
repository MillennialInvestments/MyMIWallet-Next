# bf_marketing_events

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:122, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:122, docs/_aiops/doc-change-log.md:1619

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_events` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `queue_id` bigint unsigned NOT NULL DEFAULT NULL,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `template_id` int unsigned NULL DEFAULT NULL,
  `summary_id` bigint unsigned NULL DEFAULT NULL,
  `utm_campaign` varchar(64) NULL DEFAULT 'mymi-evergreen',
  `utm_source` varchar(64) NULL DEFAULT NULL,
  `utm_medium` varchar(64) NULL DEFAULT NULL,
  `final_url` varchar(1024) NULL DEFAULT NULL,
  `posted_at` datetime NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- queue_id bigint unsigned NOT NULL
- platform varchar(32) NOT NULL
- template_id int unsigned NULL
- summary_id bigint unsigned NULL
- utm_campaign varchar(64) NULL
- utm_source varchar(64) NULL
- utm_medium varchar(64) NULL
- final_url varchar(1024) NULL
- posted_at datetime NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

