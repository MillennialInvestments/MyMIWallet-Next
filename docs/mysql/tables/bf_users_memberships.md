# bf_users_memberships

## Source
- Migration: _None_
- Model:
- Code references: app/Models/DashboardModel.php:91, app/Models/DashboardModel.php:95, app/Models/DashboardModel.php:99, app/Models/MarketingModel.php:754, app/Modules/APIs/Controllers/ChatController.php:285, app/Modules/APIs/Controllers/ChatController.php:286, docs/marketing/01-mymi-gold-and-coin.md:49, docs/marketing/01-mymi-gold-and-coin.md:75, docs/marketing/01-mymi-gold-and-coin.md:164, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/02-budgeting-and-investments-libraries.md:60, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/06-referrals-rewards.md:41, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/15-youtube-guide.md:41, docs/marketing/16-tiktok-guide.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:26, docs/OVERVIEW.md:176, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_memberships` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `display` tinyint(1) NOT NULL DEFAULT 1,
  `identifier` varchar(255) NULL DEFAULT 'NUL',
  `category` varchar(50) NOT NULL DEFAULT NULL,
  `feature_level` int NULL DEFAULT 0,
  `feature_name` varchar(100) NOT NULL DEFAULT NULL,
  `feature_cost` decimal(10,2) NOT NULL DEFAULT NULL,
  `feature_description` text NOT NULL DEFAULT NULL,
  `feature_benefits` text NOT NULL DEFAULT NULL,
  `feature_link` text NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(50) NOT NULL
- active tinyint(1) NOT NULL
- display tinyint(1) NOT NULL
- identifier varchar(255) NULL
- category varchar(50) NOT NULL
- feature_level int NULL
- feature_name varchar(100) NOT NULL
- feature_cost decimal(10,2) NOT NULL
- feature_description text NOT NULL
- feature_benefits text NOT NULL
- feature_link text NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_memberships`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

