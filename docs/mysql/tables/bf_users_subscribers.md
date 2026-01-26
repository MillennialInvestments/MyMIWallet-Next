# bf_users_subscribers

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EmailModel.php:306, app/Models/EmailModel.php:330, app/Models/EmailModel.php:335, app/Models/MarketingModel.php:111, app/Models/MarketingModel.php:1969, app/Models/MarketingModel.php:2006, app/Models/MarketingModel.php:2363, app/Models/ReferralModel.php:243, app/Models/SubscribeModel.php:57, app/Models/SubscribeModel.php:64

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_subscribers` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `email` varchar(45) NULL DEFAULT NULL,
  `referral` varchar(45) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `subject` varchar(255) NULL DEFAULT NULL,
  `topic` varchar(255) NULL DEFAULT NULL,
  `beta` tinyint(1) NULL DEFAULT 0,
  `date` datetime NULL DEFAULT NULL,
  `hostTime` varchar(45) NULL DEFAULT NULL,
  `time` varchar(45) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `user_ip` varchar(45) NULL DEFAULT NULL,
  `initial_sent` int NULL DEFAULT 0,
  `status` varchar(50) NULL DEFAULT 'active',
  `delivery_error` text NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `unsubscribe_token` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- email varchar(45) NULL
- referral varchar(45) NULL
- category varchar(255) NULL
- subject varchar(255) NULL
- topic varchar(255) NULL
- beta tinyint(1) NULL
- date datetime NULL
- hostTime varchar(45) NULL
- time varchar(45) NULL
- user_id int NULL
- user_ip varchar(45) NULL
- initial_sent int NULL
- status varchar(50) NULL
- delivery_error text NULL
- updated_at datetime NULL
- unsubscribe_token varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_subscribers`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

