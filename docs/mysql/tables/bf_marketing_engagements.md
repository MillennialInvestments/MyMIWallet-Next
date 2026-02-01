# bf_marketing_engagements

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:121

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_engagements` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `queue_id` bigint unsigned NOT NULL DEFAULT NULL,
  `external_post_id` varchar(128) NULL DEFAULT NULL,
  `impressions` int unsigned NULL DEFAULT 0,
  `clicks` int unsigned NULL DEFAULT 0,
  `likes` int unsigned NULL DEFAULT 0,
  `comments` int unsigned NULL DEFAULT 0,
  `shares` int unsigned NULL DEFAULT 0,
  `collected_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- platform varchar(32) NOT NULL
- queue_id bigint unsigned NOT NULL
- external_post_id varchar(128) NULL
- impressions int unsigned NULL
- clicks int unsigned NULL
- likes int unsigned NULL
- comments int unsigned NULL
- shares int unsigned NULL
- collected_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_engagements`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_engagements'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_engagements'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

