# bf_marketing_content_versions

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:117

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_content_versions` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `queue_id` bigint unsigned NOT NULL DEFAULT NULL,
  `version` int unsigned NOT NULL DEFAULT NULL,
  `payload_body` mediumtext NOT NULL DEFAULT NULL,
  `edited_by` varchar(64) NULL DEFAULT 'system',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- queue_id bigint unsigned NOT NULL
- version int unsigned NOT NULL
- payload_body mediumtext NOT NULL
- edited_by varchar(64) NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_content_versions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_versions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_versions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

