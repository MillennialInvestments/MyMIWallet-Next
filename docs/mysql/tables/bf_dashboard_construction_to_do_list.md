# bf_dashboard_construction_to_do_list

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DesignModel.php:118, app/Models/DesignModel.php:126, app/Models/DesignModel.php:134, app/Models/DesignModel.php:142, app/Models/DesignModel.php:150, app/Models/DesignModel.php:158

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_dashboard_construction_to_do_list` (
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
SHOW CREATE TABLE `bf_dashboard_construction_to_do_list`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_construction_to_do_list'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_construction_to_do_list'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

