# bf_investment_advisor_log

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIAdvisor.php:32, app/Libraries/MyMIAdvisor.php:67, app/Libraries/MyMIAdvisor.php:561, docs/operations/02-libraries.md:23, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:87, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:39, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:42, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:59, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:96, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:102, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:81, docs/_aiops/doc-change-log.md:1346

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_advisor_log` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `advisor_type` varchar(50) NOT NULL DEFAULT 'default',
  `last_generated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `status` enum('generated','skipped','error') NULL DEFAULT 'generated',
  `summary` text NULL DEFAULT NULL,
  `script` text NULL DEFAULT NULL,
  `voiceover_url` varchar(255) NULL DEFAULT NULL,
  `voiceover_error` text NULL DEFAULT NULL,
  `media_json_url` text NULL DEFAULT NULL,
  `chart_url` text NULL DEFAULT NULL,
  `ticker` text NULL DEFAULT NULL,
  `media_zip_url` varchar(255) NULL DEFAULT NULL,
  `score` decimal(6,2) NULL DEFAULT NULL,
  `risk_rating` varchar(50) NULL DEFAULT NULL,
  `flag_opportunity` tinyint(1) NULL DEFAULT 0,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- advisor_type varchar(50) NOT NULL
- last_generated datetime NOT NULL
- status enum('generated','skipped','error') NULL
- summary text NULL
- script text NULL
- voiceover_url varchar(255) NULL
- voiceover_error text NULL
- media_json_url text NULL
- chart_url text NULL
- ticker text NULL
- media_zip_url varchar(255) NULL
- score decimal(6,2) NULL
- risk_rating varchar(50) NULL
- flag_opportunity tinyint(1) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_advisor_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_advisor_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_advisor_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

