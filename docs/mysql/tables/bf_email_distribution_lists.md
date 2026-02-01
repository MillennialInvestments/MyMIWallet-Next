# bf_email_distribution_lists

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EmailModel.php:10, app/Models/EmailModel.php:59, app/Models/EmailModel.php:70, app/Models/EmailModel.php:167, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:61, docs/aiops/migration_model_audit.md:101, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1187

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_distribution_lists` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- name varchar(255) NOT NULL
- slug varchar(255) NOT NULL
- description text NULL
- is_active tinyint(1) NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_distribution_lists`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_distribution_lists'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_distribution_lists'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

