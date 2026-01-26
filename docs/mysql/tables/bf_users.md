# bf_users

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertsModel.php:1577, app/Models/AlertsModel.php:1578, app/Models/UserModel.php:212, app/Models/UserModel.php:213, app/Modules/Management/Controllers/UsersController.php:255, docs/discord/discord_to_ci4_commands.md:51, docs/discord/discord_to_ci4_commands.md:137, docs/discord/_inventory.md:29, docs/operations/05-database.md:13, docs/exports_schema.md:16, docs/exports_schema.md:67, docs/exports_schema.md:121, docs/exports_schema.md:138, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:31, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT 4,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  `reset_by` int NULL DEFAULT NULL,
  `account_type` varchar(32) NULL DEFAULT NULL,
  `signup_date` varchar(128) NULL DEFAULT NULL,
  `email` varchar(254) NOT NULL DEFAULT NULL,
  `password_hash` char(60) NULL DEFAULT NULL,
  `reset_hash` varchar(40) NULL DEFAULT NULL,
  `force_password_reset` tinyint(1) NULL DEFAULT 0,
  `referred` varchar(45) NULL DEFAULT NULL,
  `referral_code` varchar(128) NULL DEFAULT NULL,
  `reactivate` varchar(128) NULL DEFAULT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `display_name` varchar(255) NULL DEFAULT NULL,
  `display_name_changed` date NULL DEFAULT NULL,
  `first_name` varchar(256) NULL DEFAULT NULL,
  `middle_name` varchar(32) NULL DEFAULT NULL,
  `last_name` varchar(256) NULL DEFAULT NULL,
  `name_suffix` varchar(32) NULL DEFAULT NULL,
  `dob` varchar(45) NULL DEFAULT 'N/A',
  `ssn` varchar(32) NULL DEFAULT 'XXX-XX-XXXX',
  `phone` varchar(15) NOT NULL DEFAULT 'N/A',
  `address` varchar(512) NOT NULL DEFAULT 'N/A',
  `city` varchar(512) NOT NULL DEFAULT 'N/A',
  `state` varchar(128) NOT NULL DEFAULT 'N/A',
  `country` varchar(256) NULL DEFAULT 'US',
  `zipcode` varchar(15) NOT NULL DEFAULT 'N/A',
  `mailing_address` varchar(512) NULL DEFAULT 'N/A',
  `employment` varchar(128) NULL DEFAULT 'N/A',
  `occupation` varchar(256) NULL DEFAULT 'N/A',
  `salary` varchar(45) NULL DEFAULT 'N/A',
  `proof_identity` text NULL DEFAULT NULL,
  `proof_address` text NULL DEFAULT NULL,
  `timezone` varchar(40) NULL DEFAULT 'UTC',
  `language` varchar(20) NULL DEFAULT 'english',
  `type` varchar(128) NULL DEFAULT NULL,
  `admin` varchar(32) NULL DEFAULT 'No',
  `partner` int NOT NULL DEFAULT 0,
  `investor` varchar(32) NOT NULL DEFAULT 0,
  `beta_wallet` varchar(32) NULL DEFAULT NULL,
  `private_key` varchar(128) NULL DEFAULT NULL,
  `wallet_id` varchar(64) NULL DEFAULT NULL,
  `default_wallet` varchar(45) NULL DEFAULT NULL,
  `tt_columns` varchar(32) NULL DEFAULT 'No',
  `organization` varchar(256) NULL DEFAULT NULL,
  `picture` varchar(256) NULL DEFAULT NULL,
  `link` varchar(256) NULL DEFAULT NULL,
  `ref_signup_date` varchar(128) NULL DEFAULT NULL,
  `referrer` varchar(128) NOT NULL DEFAULT 'No',
  `referrer_code` varchar(128) NULL DEFAULT NULL,
  `promo_code` varchar(128) NULL DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(45) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_message` varchar(255) NULL DEFAULT NULL,
  `account_information` varchar(45) NULL DEFAULT 'No',
  `kyc` varchar(32) NOT NULL DEFAULT 'No',
  `kyc_verified` varchar(45) NOT NULL DEFAULT 'No',
  `features_activated` varchar(45) NULL DEFAULT 'No',
  `financial_assessment` varchar(32) NOT NULL DEFAULT 'No',
  `investment_assessment` varchar(32) NOT NULL DEFAULT 'No',
  `banking_accounts` varchar(45) NULL DEFAULT 'No',
  `banking_wallets` varchar(45) NULL DEFAULT 'No',
  `last_banking_update` varchar(45) NULL DEFAULT 'No',
  `banking_integration` varchar(45) NULL DEFAULT 'No',
  `credit_summary` varchar(45) NULL DEFAULT 'No',
  `credit_wallets` varchar(45) NULL DEFAULT 'No',
  `last_credit_update` varchar(45) NULL DEFAULT 'No',
  `credit_integration` varchar(45) NULL DEFAULT 'No',
  `debt_summary` varchar(45) NULL DEFAULT 'No',
  `debt_wallets` varchar(45) NULL DEFAULT 'No',
  `last_debt_update` varchar(45) NULL DEFAULT 'No',
  `debt_integration` varchar(45) NULL DEFAULT 'No',
  `budgeting_complete` varchar(32) NOT NULL DEFAULT 'No',
  `investment_wallets` varchar(45) NULL DEFAULT 'No',
  `last_investment_update` varchar(45) NULL DEFAULT 'No',
  `brokerage_integration` varchar(45) NULL DEFAULT 'No',
  `risk_assessment` varchar(32) NOT NULL DEFAULT 'No',
  `financial_goals` varchar(45) NULL DEFAULT 'No',
  `time_horizon` varchar(45) NULL DEFAULT 'No',
  `financial_rating` varchar(45) NULL DEFAULT 'No',
  `investment_experience` varchar(45) NULL DEFAULT 'No',
  `investment_knowledge` varchar(45) NULL DEFAULT 'No',
  `market_sentiment` varchar(45) NULL DEFAULT 'No',
  `investment_availability` varchar(45) NULL DEFAULT 'No',
  `personal_budgeting` varchar(32) NOT NULL DEFAULT 'No',
  `portfolio_manager` varchar(32) NOT NULL DEFAULT 'No',
  `automated_integration` varchar(32) NOT NULL DEFAULT 'No',
  `asset_creator` varchar(32) NOT NULL DEFAULT 'No',
  `account_review` int NULL DEFAULT 0,
  `marketing_review` int NULL DEFAULT 0,
  `request_ban` int NULL DEFAULT 0,
  `drip_campaign_type` enum('none','activation_drip','nudge_drip') NULL DEFAULT 'none',
  `drip_step_number` int unsigned NULL DEFAULT 0,
  `drip_last_sent_at` datetime NULL DEFAULT NULL,
  `drip_completed` tinyint(1) NULL DEFAULT 0,
  `email_verified_at` datetime NULL DEFAULT NULL,
  `email_bounced_at` datetime NULL DEFAULT NULL,
  `email_verification_token_hash` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- role_id int NOT NULL
- active tinyint(1) NOT NULL
- activate_hash varchar(40) NOT NULL
- reset_by int NULL
- account_type varchar(32) NULL
- signup_date varchar(128) NULL
- email varchar(254) NOT NULL
- password_hash char(60) NULL
- reset_hash varchar(40) NULL
- force_password_reset tinyint(1) NULL
- referred varchar(45) NULL
- referral_code varchar(128) NULL
- reactivate varchar(128) NULL
- username varchar(30) NOT NULL
- display_name varchar(255) NULL
- display_name_changed date NULL
- first_name varchar(256) NULL
- middle_name varchar(32) NULL
- last_name varchar(256) NULL
- name_suffix varchar(32) NULL
- dob varchar(45) NULL
- ssn varchar(32) NULL
- phone varchar(15) NOT NULL
- address varchar(512) NOT NULL
- city varchar(512) NOT NULL
- state varchar(128) NOT NULL
- country varchar(256) NULL
- zipcode varchar(15) NOT NULL
- mailing_address varchar(512) NULL
- employment varchar(128) NULL
- occupation varchar(256) NULL
- salary varchar(45) NULL
- proof_identity text NULL
- proof_address text NULL
- timezone varchar(40) NULL
- language varchar(20) NULL
- type varchar(128) NULL
- admin varchar(32) NULL
- partner int NOT NULL
- investor varchar(32) NOT NULL
- beta_wallet varchar(32) NULL
- private_key varchar(128) NULL
- wallet_id varchar(64) NULL
- default_wallet varchar(45) NULL
- tt_columns varchar(32) NULL
- organization varchar(256) NULL
- picture varchar(256) NULL
- link varchar(256) NULL
- ref_signup_date varchar(128) NULL
- referrer varchar(128) NOT NULL
- referrer_code varchar(128) NULL
- promo_code varchar(128) NULL
- last_login datetime NOT NULL
- last_ip varchar(45) NOT NULL
- created_on datetime NOT NULL
- deleted tinyint(1) NOT NULL
- banned tinyint(1) NOT NULL
- ban_message varchar(255) NULL
- account_information varchar(45) NULL
- kyc varchar(32) NOT NULL
- kyc_verified varchar(45) NOT NULL
- features_activated varchar(45) NULL
- financial_assessment varchar(32) NOT NULL
- investment_assessment varchar(32) NOT NULL
- banking_accounts varchar(45) NULL
- banking_wallets varchar(45) NULL
- last_banking_update varchar(45) NULL
- banking_integration varchar(45) NULL
- credit_summary varchar(45) NULL
- credit_wallets varchar(45) NULL
- last_credit_update varchar(45) NULL
- credit_integration varchar(45) NULL
- debt_summary varchar(45) NULL
- debt_wallets varchar(45) NULL
- last_debt_update varchar(45) NULL
- debt_integration varchar(45) NULL
- budgeting_complete varchar(32) NOT NULL
- investment_wallets varchar(45) NULL
- last_investment_update varchar(45) NULL
- brokerage_integration varchar(45) NULL
- risk_assessment varchar(32) NOT NULL
- financial_goals varchar(45) NULL
- time_horizon varchar(45) NULL
- financial_rating varchar(45) NULL
- investment_experience varchar(45) NULL
- investment_knowledge varchar(45) NULL
- market_sentiment varchar(45) NULL
- investment_availability varchar(45) NULL
- personal_budgeting varchar(32) NOT NULL
- portfolio_manager varchar(32) NOT NULL
- automated_integration varchar(32) NOT NULL
- asset_creator varchar(32) NOT NULL
- account_review int NULL
- marketing_review int NULL
- request_ban int NULL
- drip_campaign_type enum('none','activation_drip','nudge_drip') NULL
- drip_step_number int unsigned NULL
- drip_last_sent_at datetime NULL
- drip_completed tinyint(1) NULL
- email_verified_at datetime NULL
- email_bounced_at datetime NULL
- email_verification_token_hash varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

