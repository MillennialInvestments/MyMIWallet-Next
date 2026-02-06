# bf_users_services

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AnalyticalModel.php:192, app/Modules/User/Controllers/WalletsController.php:1555, app/Modules/User/Controllers/WalletsController.php:1644, app/Modules/User/Controllers/WalletsController.php:2004, app/Modules/User/Controllers/WalletsController.php:2020, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:248, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:248, docs/_aiops/doc-change-log.md:2240

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_services` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` int NULL DEFAULT NULL,
  `service` varchar(512) NULL DEFAULT NULL,
  `description` varchar(45) NULL DEFAULT NULL,
  `url_link` varchar(45) NULL DEFAULT NULL,
  `cost` decimal(8,2) NULL DEFAULT 0.00,
  `price` decimal(8,2) NULL DEFAULT 0.00,
  `discount` decimal(8,2) NULL DEFAULT 0.00,
  `net_price` int NULL DEFAULT 0,
  `call_limit` int NULL DEFAULT 0,
  `billing_type` varchar(128) NULL DEFAULT 'Monthly',
  `user_id` int unsigned NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status int NULL
- service varchar(512) NULL
- description varchar(45) NULL
- url_link varchar(45) NULL
- cost decimal(8,2) NULL
- price decimal(8,2) NULL
- discount decimal(8,2) NULL
- net_price int NULL
- call_limit int NULL
- billing_type varchar(128) NULL
- user_id int unsigned NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_services`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_services'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_services'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

