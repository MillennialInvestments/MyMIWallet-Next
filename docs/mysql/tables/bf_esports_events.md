# bf_esports_events

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EsportsModel.php:12, app/Models/EsportsModel.php:25, app/Models/EsportsModel.php:31, app/Models/EsportsModel.php:36, app/Models/EsportsModel.php:51, docs/exports_schema.md:21, docs/exports_schema.md:65, docs/exports_schema.md:84, docs/exports_schema.md:100, docs/exports_schema.md:119, docs/exports_schema.md:136, docs/exports_schema.md:159, docs/exports_schema.md:191, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/migration_model_audit.md:103, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1331

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_esports_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- md TEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_esports_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

