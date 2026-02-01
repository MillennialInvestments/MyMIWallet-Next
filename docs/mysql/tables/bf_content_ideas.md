# bf_content_ideas

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ContentIdeaModel.php:11, docs/content_engine/overview.md:36, docs/content_engine/scoring_rules.md:29, docs/content_engine/security.md:10, docs/content_engine/sql_patch_notes.md:8, docs/content_engine/troubleshooting.md:15, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:45, docs/aiops/migration_model_audit.md:88, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1103, docs/spark/categories/marketing/content-ingest-sample.md:13, docs/spark/categories/marketing/contentengine-smoke.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_content_ideas` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `ingest_id` int unsigned NOT NULL DEFAULT NULL,
  `symbol` varchar(16) NOT NULL DEFAULT NULL,
  `score_total` decimal(10,4) NULL DEFAULT NULL,
  `tier` enum('tier1','tier2','tier3','avoid') NOT NULL DEFAULT 'avoid',
  `reasons_json` text NULL DEFAULT NULL,
  `recommended_platforms_json` text NULL DEFAULT NULL,
  `status` enum('draft','approved','scheduled','posted','skipped') NOT NULL DEFAULT 'draft',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- ingest_id int unsigned NOT NULL
- symbol varchar(16) NOT NULL
- score_total decimal(10,4) NULL
- tier enum('tier1','tier2','tier3','avoid') NOT NULL
- reasons_json text NULL
- recommended_platforms_json text NULL
- status enum('draft','approved','scheduled','posted','skipped') NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_content_ideas`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_ideas'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_ideas'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

