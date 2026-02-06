# bf_esports_entries

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EsportsModel.php:40, app/Models/EsportsModel.php:55, app/Models/EsportsModel.php:107, app/Models/EsportsModel.php:113, app/Models/EsportsModel.php:118, app/Models/EsportsModel.php:305, app/Models/EsportsModel.php:316, docs/exports_schema.md:53, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/_aiops/doc-change-log.md:1325

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_esports_entries` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- event_id TEXT NULL
- id INT(11) UNSIGNED NOT NULL
- md TEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_esports_entries`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_entries'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_entries'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

