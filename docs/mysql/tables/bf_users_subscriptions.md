# bf_users_subscriptions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:1578, app/Models/AlertsModel.php:1578, app/Models/AlertsModel.php:1579, app/Models/SubscribeModel.php:42, app/Models/UserModel.php:213, app/Models/UserModel.php:213, app/Models/UserModel.php:214

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_subscriptions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` int NULL DEFAULT 0,
  `user_id` int NOT NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT NULL,
  `subscribed_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `subscription_name` varchar(255) NULL DEFAULT NULL,
  `tier` enum('Free','Tier 1','Tier 2','Tier 3') NULL DEFAULT 'Free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- active int NULL
- user_id int NOT NULL
- email varchar(255) NOT NULL
- subscribed_on datetime NULL
- updated_on datetime NULL
- subscription_name varchar(255) NULL
- tier enum('Free','Tier 1','Tier 2','Tier 3') NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_subscriptions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

