# bf_users_services_purchases

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AnalyticalModel.php:206, app/Modules/User/Controllers/WalletsController.php:1805, app/Modules/User/Controllers/WalletsController.php:2037, app/Services/BlockchainService.php:99

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_services_purchases` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` enum('active','unpaid','cancelled') NULL DEFAULT NULL,
  `purchase_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `user_id` int NULL DEFAULT NULL,
  `service_id` int NULL DEFAULT NULL,
  `service_name` varchar(1024) NULL DEFAULT NULL,
  `cost` decimal(5,2) NULL DEFAULT 0.00,
  `price` decimal(5,2) NULL DEFAULT 0.00,
  `tier` enum('basic','premium','gold') NULL DEFAULT 'basic',
  `service_features` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status enum('active','unpaid','cancelled') NULL
- purchase_time timestamp NULL
- user_id int NULL
- service_id int NULL
- service_name varchar(1024) NULL
- cost decimal(5,2) NULL
- price decimal(5,2) NULL
- tier enum('basic','premium','gold') NULL
- service_features json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_services_purchases`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_services_purchases'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_services_purchases'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

