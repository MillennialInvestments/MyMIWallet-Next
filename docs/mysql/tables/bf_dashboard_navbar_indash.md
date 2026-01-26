# bf_dashboard_navbar_indash

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DesignModel.php:94, app/Models/DesignModel.php:102, app/Models/DesignModel.php:110, app/Modules/Management/Views/Web_Design/index.php:12, app/Modules/Management/Views/Web_Design/index.php:17

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar_indash` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_dashboard_navbar_indash`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_navbar_indash'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_navbar_indash'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

