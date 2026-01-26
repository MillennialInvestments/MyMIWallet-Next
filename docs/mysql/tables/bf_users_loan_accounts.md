# bf_users_loan_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Models/WalletModel.php:587

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_loan_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `beta` varchar(45) NULL DEFAULT 0,
  `status` varchar(45) NULL DEFAULT 0,
  `active` int NULL DEFAULT 0,
  `deleted` varchar(45) NULL DEFAULT 0,
  `current_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `date` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(32) NULL DEFAULT NULL,
  `username` varchar(512) NULL DEFAULT NULL,
  `wallet_id` varchar(128) NULL DEFAULT NULL,
  `fl_loginId` varchar(128) NULL DEFAULT NULL,
  `fl_institution_id` varchar(64) NULL DEFAULT NULL,
  `account_type` varchar(32) NULL DEFAULT NULL,
  `lender` varchar(512) NULL DEFAULT NULL,
  `nickname` varchar(32) NULL DEFAULT NULL,
  `account_status` varchar(45) NULL DEFAULT NULL,
  `account_number` varchar(512) NULL DEFAULT NULL,
  `due_date` varchar(45) NULL DEFAULT NULL,
  `loan_amount` varchar(32) NULL DEFAULT NULL,
  `loan_status` varchar(45) NULL DEFAULT NULL,
  `current_balance` varchar(32) NULL DEFAULT NULL,
  `available_balance` varchar(32) NULL DEFAULT NULL,
  `monthly_payment` varchar(32) NULL DEFAULT NULL,
  `interest_rate` varchar(45) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- beta varchar(45) NULL
- status varchar(45) NULL
- active int NULL
- deleted varchar(45) NULL
- current_timestamp datetime NOT NULL
- date varchar(32) NULL
- time varchar(32) NULL
- user_id varchar(32) NULL
- user_email varchar(32) NULL
- username varchar(512) NULL
- wallet_id varchar(128) NULL
- fl_loginId varchar(128) NULL
- fl_institution_id varchar(64) NULL
- account_type varchar(32) NULL
- lender varchar(512) NULL
- nickname varchar(32) NULL
- account_status varchar(45) NULL
- account_number varchar(512) NULL
- due_date varchar(45) NULL
- loan_amount varchar(32) NULL
- loan_status varchar(45) NULL
- current_balance varchar(32) NULL
- available_balance varchar(32) NULL
- monthly_payment varchar(32) NULL
- interest_rate varchar(45) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_loan_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_loan_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_loan_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

