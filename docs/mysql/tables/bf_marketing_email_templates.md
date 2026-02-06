# bf_marketing_email_templates

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Marketing/EmailTemplateModel.php:10, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:120, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:120, docs/aiops/migration_model_audit.md:137, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1613

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_email_templates` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `subject` varchar(255) NOT NULL DEFAULT NULL,
  `content` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- title varchar(255) NOT NULL
- subject varchar(255) NOT NULL
- content text NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_email_templates`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_templates'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

