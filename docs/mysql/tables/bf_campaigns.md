# bf_campaigns

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Management/Controllers/EmailController.php:57, app/Modules/Management/Controllers/EmailController.php:58, app/Modules/Management/Controllers/EmailController.php:58, docs/_aiops/doc-change-log.md:1163

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_campaigns` (
  `name` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- name TEXT NULL
- id INT(11) UNSIGNED NOT NULL
- md TEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_campaigns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_campaigns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

