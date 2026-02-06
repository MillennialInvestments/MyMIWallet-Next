# bf_content_scanner_ingest

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ContentScannerIngestModel.php:11, docs/content_engine/security.md:9, docs/content_engine/sql_patch_notes.md:6, docs/content_engine/troubleshooting.md:15, docs/content_engine/troubleshooting.md:21, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:47, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:47, docs/aiops/migration_model_audit.md:90, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1199, docs/spark/categories/marketing/content-ingest-sample.md:13, docs/spark/categories/marketing/contentengine-smoke.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_content_scanner_ingest` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `scan_name` varchar(255) NOT NULL DEFAULT NULL,
  `quote_ts` datetime NULL DEFAULT NULL,
  `payload_hash` varchar(64) NOT NULL DEFAULT NULL,
  `source` varchar(64) NOT NULL DEFAULT 'manual_chatgpt',
  `row_count` int NOT NULL DEFAULT 0,
  `status` enum('received','processed','failed') NOT NULL DEFAULT 'received',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- scan_name varchar(255) NOT NULL
- quote_ts datetime NULL
- payload_hash varchar(64) NOT NULL
- source varchar(64) NOT NULL
- row_count int NOT NULL
- status enum('received','processed','failed') NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_content_scanner_ingest`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_ingest'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_ingest'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

