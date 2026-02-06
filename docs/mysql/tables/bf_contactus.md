# bf_contactus

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AnalyticalModel.php:18, app/Models/AnalyticalModel.php:19, app/Models/AnalyticalModel.php:20, app/Models/AnnouncementsModel.php:20, app/Models/AnnouncementsModel.php:20, app/Models/AnnouncementsModel.php:21, app/Models/AnnouncementsModel.php:21, app/Models/AnnouncementsModel.php:22, app/Models/AnnouncementsModel.php:22, app/Models/APIModel.php:20, app/Models/APIModel.php:20, app/Models/APIModel.php:21, app/Models/APIModel.php:21, app/Models/APIModel.php:22, app/Models/APIModel.php:22, app/Models/DashboardModel.php:29, app/Models/DashboardModel.php:30, app/Models/DashboardModel.php:31, app/Models/DesignModel.php:20, app/Models/DesignModel.php:20, app/Models/DesignModel.php:21, app/Models/DesignModel.php:21, app/Models/DesignModel.php:22, app/Models/DesignModel.php:22, app/Models/AlertsModel.php:54, app/Models/AlertsModel.php:54, app/Models/AlertsModel.php:55, app/Models/AlertsModel.php:55, app/Models/AlertsModel.php:56, app/Models/AlertsModel.php:56, docs/_aiops/doc-change-log.md:1187

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_contactus` (
  `Name` TEXT NULL,
  `email` TEXT NULL,
  `phone` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- Name TEXT NULL
- email TEXT NULL
- phone TEXT NULL
- id INT(11) UNSIGNED NOT NULL
- name TEXT NULL
- md TEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_contactus`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_contactus'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_contactus'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

