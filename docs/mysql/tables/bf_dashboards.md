# bf_dashboards

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DesignModel.php:46, app/Models/DesignModel.php:54, app/Models/DesignModel.php:62, app/Modules/Management/Views/Web_Design/Edit_Dashboard.php:5, app/Modules/Management/Views/Web_Design/index.php:21, docs/_aiops/doc-change-log.md:1136

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_dashboards` (
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
SHOW CREATE TABLE `bf_dashboards`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboards'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboards'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

