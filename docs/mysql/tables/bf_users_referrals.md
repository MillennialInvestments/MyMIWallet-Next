# bf_users_referrals

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ReferralModel.php:79, app/Models/ReferralModel.php:94, app/Models/ReferralModel.php:111, app/Models/ReferralModel.php:126, app/Models/ReferralModel.php:149, app/Models/ReferralModel.php:166, app/Models/ReferralModel.php:237, app/Models/ReferralModel.php:302, app/Services/ReferralService.php:525, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:243, docs/_aiops/doc-change-log.md:1988

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_referrals` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `referrer_code` varchar(255) NOT NULL DEFAULT NULL,
  `signup_date` datetime NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `user_ip_address` varchar(45) NOT NULL DEFAULT NULL,
  `type` enum('email','social','link') NOT NULL DEFAULT NULL,
  `city` varchar(100) NULL DEFAULT NULL,
  `state` varchar(100) NULL DEFAULT NULL,
  `country` varchar(100) NULL DEFAULT NULL,
  `zipcode` varchar(10) NULL DEFAULT NULL,
  `total_spend` decimal(10,2) NULL DEFAULT 0.00,
  `days_active` int NULL DEFAULT 0,
  `active` tinyint(1) NULL DEFAULT 1,
  `referral_email` varchar(256) NULL DEFAULT NULL,
  `first_name` varchar(100) NULL DEFAULT NULL,
  `last_name` varchar(100) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `modified_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `deleted_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- referrer_code varchar(255) NOT NULL
- signup_date datetime NOT NULL
- user_id int NOT NULL
- user_ip_address varchar(45) NOT NULL
- type enum('email','social','link') NOT NULL
- city varchar(100) NULL
- state varchar(100) NULL
- country varchar(100) NULL
- zipcode varchar(10) NULL
- total_spend decimal(10,2) NULL
- days_active int NULL
- active tinyint(1) NULL
- referral_email varchar(256) NULL
- first_name varchar(100) NULL
- last_name varchar(100) NULL
- created_on datetime NULL
- modified_on datetime NULL
- deleted_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_referrals`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referrals'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referrals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

