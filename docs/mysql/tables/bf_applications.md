# bf_applications

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:10, app/Models/AnalyticalModel.php:7, app/Models/AnnouncementsModel.php:10, app/Models/APIModel.php:10, app/Models/DesignModel.php:10, app/Models/PlaidModel.php:8, app/Models/PublicModel.php:8, app/Models/SubscribeModel.php:8, app/Models/TrackerModel.php:8

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_applications` (
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
SHOW CREATE TABLE `bf_applications`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_applications'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_applications'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

