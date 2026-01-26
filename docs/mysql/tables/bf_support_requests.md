# bf_support_requests

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:21, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:63, app/Models/AnalyticalModel.php:468, app/Models/AnalyticalModel.php:475, app/Models/AnalyticalModel.php:483, app/Models/AnalyticalModel.php:490, app/Models/SupportModel.php:10, app/Modules/Management/Views/Support/Requests/Details.php:18, app/Modules/Management/Views/Support/Requests.php:8, app/Modules/Management/Views/Support/Requests.php:17, app/Modules/Management/Views/Support/Reporting.php:10, app/Modules/User/Views/Knowledgebase/Response.php:12, app/Modules/User/Views/Knowledgebase/Response.php:16, app/Modules/User/Views/Support/Communication_Manager.php:38

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_support_requests` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `details` text NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `res_id` int NULL DEFAULT NULL,
  `response` text NULL DEFAULT NULL,
  `status` varchar(50) NULL DEFAULT 'Pending',
  `topic` varchar(255) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id varchar(255) NULL
- email varchar(255) NULL
- name varchar(255) NULL
- details text NULL
- date date NULL
- time time NULL
- res_id int NULL
- response text NULL
- status varchar(50) NULL
- topic varchar(255) NULL
- created_on datetime NULL
- modified_on datetime NULL
- deleted_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_support_requests`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_support_requests'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_support_requests'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

