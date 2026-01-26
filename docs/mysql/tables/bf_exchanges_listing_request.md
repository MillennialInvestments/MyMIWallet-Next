# bf_exchanges_listing_request

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIUsers.php:463, app/Libraries/MyMIUser.php:433, app/Models/AnalyticalModel.php:288, app/Models/AnalyticalModel.php:303, app/Models/AnalyticalModel.php:340, app/Models/AnalyticalModel.php:372, app/Models/AnalyticalModel.php:379, app/Models/AnalyticalModel.php:393, app/Models/AnalyticalModel.php:406, app/Models/ExchangeModel.php:297, app/Models/ExchangeModel.php:311, app/Models/ExchangeModel.php:334, app/Models/ExchangeModel.php:351, app/Modules/Exchange/Views/Application_Manager.php:72, app/Modules/Exchange/Views/Application_Manager.php:95, app/Modules/Exchange/Views/Application_Manager.php:203, app/Modules/Exchange/Views/Coin_Listing_Asset_Information/list_fields.php:24, app/Modules/Management/Views/Web_Design/Test_Page/data-distribution.php:7

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_listing_request` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(45) NULL DEFAULT NULL,
  `unix_timestamp` varchar(45) NULL DEFAULT NULL,
  `date` varchar(45) NULL DEFAULT NULL,
  `time` varchar(45) NULL DEFAULT NULL,
  `partner` varchar(45) NULL DEFAULT 0,
  `user_id` varchar(45) NULL DEFAULT NULL,
  `user_email` varchar(90) NULL DEFAULT NULL,
  `first_name` varchar(45) NULL DEFAULT NULL,
  `middle_name` varchar(45) NULL DEFAULT NULL,
  `last_name` varchar(45) NULL DEFAULT NULL,
  `name_suffix` varchar(45) NULL DEFAULT NULL,
  `phone` varchar(45) NULL DEFAULT NULL,
  `company_name` varchar(45) NULL DEFAULT NULL,
  `address` varchar(45) NULL DEFAULT NULL,
  `city` varchar(45) NULL DEFAULT NULL,
  `state` varchar(45) NULL DEFAULT NULL,
  `country` varchar(45) NULL DEFAULT NULL,
  `zipcode` varchar(45) NULL DEFAULT NULL,
  `listing_type` varchar(45) NULL DEFAULT NULL,
  `blockchain_id` varchar(45) NULL DEFAULT NULL,
  `blockchain` varchar(45) NULL DEFAULT NULL,
  `blockchain_name` varchar(45) NULL DEFAULT NULL,
  `symbol` varchar(45) NULL DEFAULT NULL,
  `coin_name` varchar(45) NULL DEFAULT NULL,
  `coin_quantity` varchar(45) NULL DEFAULT NULL,
  `coin_value` varchar(45) NULL DEFAULT 0.00,
  `purpose` varchar(45) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `coin_file` varchar(45) NULL DEFAULT NULL,
  `coin_logo` varchar(45) NULL DEFAULT NULL,
  `coin_links` varchar(45) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(45) NULL
- unix_timestamp varchar(45) NULL
- date varchar(45) NULL
- time varchar(45) NULL
- partner varchar(45) NULL
- user_id varchar(45) NULL
- user_email varchar(90) NULL
- first_name varchar(45) NULL
- middle_name varchar(45) NULL
- last_name varchar(45) NULL
- name_suffix varchar(45) NULL
- phone varchar(45) NULL
- company_name varchar(45) NULL
- address varchar(45) NULL
- city varchar(45) NULL
- state varchar(45) NULL
- country varchar(45) NULL
- zipcode varchar(45) NULL
- listing_type varchar(45) NULL
- blockchain_id varchar(45) NULL
- blockchain varchar(45) NULL
- blockchain_name varchar(45) NULL
- symbol varchar(45) NULL
- coin_name varchar(45) NULL
- coin_quantity varchar(45) NULL
- coin_value varchar(45) NULL
- purpose varchar(45) NULL
- description text NULL
- coin_file varchar(45) NULL
- coin_logo varchar(45) NULL
- coin_links varchar(45) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_listing_request`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_listing_request'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_listing_request'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

