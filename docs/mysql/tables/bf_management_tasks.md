# bf_management_tasks

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AnalyticalModel.php:220, app/Models/AnalyticalModel.php:235, app/Models/AnalyticalModel.php:560, app/Models/AnalyticalModel.php:569, app/Views/themes/dashboard/layouts/metadata-information.php:85, app/Views/themes/dashboard/layouts/metadata-information.php:99, app/Views/themes/public/layouts/metadata-information copy.php:68, app/Views/themes/public/layouts/metadata-information copy.php:82, app/Views/themes/public/layouts/metadata-information copy.php:157, app/Views/themes/public/layouts/metadata-information copy.php:171, app/Modules/Management/Controllers/ServicesController.php:200

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_management_tasks` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(128) NULL DEFAULT NULL,
  `group` varchar(512) NULL DEFAULT NULL,
  `task` varchar(1024) NULL DEFAULT NULL,
  `title` varchar(1024) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `url` text NULL DEFAULT NULL,
  `page_id` varchar(45) NULL DEFAULT NULL,
  `task_url` text NULL DEFAULT NULL,
  `assigned_to` text NULL DEFAULT NULL,
  `assigned_by` text NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL,
  `created_on` text NULL DEFAULT NULL,
  `created_by` text NULL DEFAULT NULL,
  `completed_on` text NULL DEFAULT NULL,
  `completed_by` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(128) NULL
- group varchar(512) NULL
- task varchar(1024) NULL
- title varchar(1024) NULL
- description text NULL
- url text NULL
- page_id varchar(45) NULL
- task_url text NULL
- assigned_to text NULL
- assigned_by text NULL
- notes text NULL
- created_on text NULL
- created_by text NULL
- completed_on text NULL
- completed_by text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_management_tasks`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_management_tasks'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_management_tasks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

