# bf_users_referral_program

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ReferralModel.php:10, app/Modules/User/Views/Referral_Program/Application_Manager.php:26, app/Modules/User/Views/Referral_Program/New_Affiliate_Information/Setup_Procedure.php:8, app/Modules/User/Views/Referral_Program/New_Affiliate_Information/user_fields.php:23, app/Modules/User/Views/Referral_Program/New_Affiliate_Procedure.php:8, app/Modules/User/Views/Referral_Program/Users.php:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_referral_program` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `referrer_code` varchar(50) NOT NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 0,
  `links_created` int NULL DEFAULT 0,
  `signup_date` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `user_type` varchar(50) NULL DEFAULT NULL,
  `first_name` varchar(100) NULL DEFAULT NULL,
  `last_name` varchar(100) NULL DEFAULT NULL,
  `email` varchar(100) NULL DEFAULT NULL,
  `phone` varchar(20) NULL DEFAULT NULL,
  `address` varchar(255) NULL DEFAULT NULL,
  `city` varchar(100) NULL DEFAULT NULL,
  `state` varchar(100) NULL DEFAULT NULL,
  `country` varchar(100) NULL DEFAULT NULL,
  `zipcode` varchar(20) NULL DEFAULT NULL,
  `paypal` varchar(100) NULL DEFAULT NULL,
  `basic_code` varchar(50) NULL DEFAULT NULL,
  `premium_code` varchar(50) NULL DEFAULT NULL,
  `gold_code` varchar(50) NULL DEFAULT NULL,
  `other_payment` varchar(100) NULL DEFAULT NULL,
  `advertisement` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- referrer_code varchar(50) NOT NULL
- active tinyint(1) NULL
- links_created int NULL
- signup_date datetime NULL
- user_type varchar(50) NULL
- first_name varchar(100) NULL
- last_name varchar(100) NULL
- email varchar(100) NULL
- phone varchar(20) NULL
- address varchar(255) NULL
- city varchar(100) NULL
- state varchar(100) NULL
- country varchar(100) NULL
- zipcode varchar(20) NULL
- paypal varchar(100) NULL
- basic_code varchar(50) NULL
- premium_code varchar(50) NULL
- gold_code varchar(50) NULL
- other_payment varchar(100) NULL
- advertisement text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_referral_program`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referral_program'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referral_program'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

