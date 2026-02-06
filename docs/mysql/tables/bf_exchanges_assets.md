# bf_exchanges_assets

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIDexScreener.php:128, app/Libraries/MyMIDexScreener.php:181, app/Libraries/MyMIDexScreener.php:196, app/Libraries/MyMIInvestments.php:1617, app/Libraries/MyMIWallet.php:385, app/Libraries/MyMIWallets.php:510, app/Models/AnalyticalModel.php:312, app/Models/AnalyticalModel.php:330, app/Models/AnalyticalModel.php:356, app/Models/AnalyticalModel.php:386, app/Models/AnalyticalModel.php:389, app/Models/AnalyticalModel.php:400, app/Models/AssetsModel.php:8, app/Models/ExchangeModel.php:48, app/Models/ExchangeModel.php:64, app/Models/ExchangeModel.php:74, app/Models/ExchangeModel.php:88, app/Models/MarketingModel.php:744, app/Models/SolanaModel.php:323, app/Models/SolanaModel.php:336, app/Models/SolanaModel.php:405, app/Models/SolanaModel.php:411, app/Models/SolanaModel.php:418, app/Models/SolanaModel.php:424, app/Models/SolanaModel.php:465, app/Models/SolanaModel.php:535, app/Models/SolanaModel.php:539, app/Models/SolanaModel.php:565, app/Models/InvestmentModel.php:225, app/Models/InvestmentModel.php:722, app/Models/InvestmentModel.php:730, app/Models/InvestmentModel.php:1307, app/Models/InvestmentModel.php:1450, app/Modules/APIs/Controllers/SolanaController.php:112, app/Modules/Exchange/Controllers/ExchangeController.php:560, app/Modules/Exchange/Controllers/SolanaController.php:229, app/Modules/Exchange/Views/Application_Manager.php:147, app/Modules/Management/Views/Assets/Applications/Approval.php:265, app/Modules/Management/Views/Assets/Applications/Details.php:224, app/Modules/Management/Views/Users/Assets.php:15, app/Services/TokenService.php:185, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:31, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:70, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:70, docs/aiops/migration_model_audit.md:70, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1355

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_assets` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int NULL DEFAULT NULL,
  `asset_role` enum('asset','token') NOT NULL DEFAULT 'asset',
  `asset_type` varchar(64) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `metadata_json` json NULL DEFAULT NULL,
  `location_text` varchar(255) NULL DEFAULT NULL,
  `external_refs_json` json NULL DEFAULT NULL,
  `parent_asset_id` int NULL DEFAULT NULL,
  `chain` enum('solana','evm','other') NULL DEFAULT NULL,
  `token_symbol` varchar(32) NULL DEFAULT NULL,
  `token_address` varchar(255) NULL DEFAULT NULL,
  `active` varchar(45) NULL DEFAULT 0,
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
  `is_tradable` int NULL DEFAULT 0,
  `listing_type` varchar(45) NULL DEFAULT NULL,
  `blockchain_id` varchar(45) NULL DEFAULT NULL,
  `blockchain` varchar(45) NULL DEFAULT NULL,
  `blockchain_name` varchar(45) NULL DEFAULT NULL,
  `dex_id` text NULL DEFAULT NULL,
  `dex_url` text NULL DEFAULT NULL,
  `dex_pair` text NULL DEFAULT NULL,
  `dex_swap_name` varchar(255) NULL DEFAULT NULL,
  `dex_swap_symbol` varchar(45) NULL DEFAULT NULL,
  `dex_swap_address` text NULL DEFAULT NULL,
  `symbol` varchar(45) NULL DEFAULT NULL,
  `coin_name` varchar(255) NULL DEFAULT NULL,
  `coin_address` text NULL DEFAULT NULL,
  `coin_quantity` varchar(45) NULL DEFAULT NULL,
  `coin_value` varchar(45) NULL DEFAULT 0,
  `initial_value` varchar(45) NULL DEFAULT NULL,
  `market_cap` varchar(45) NULL DEFAULT 0.00,
  `volume` text NULL DEFAULT NULL,
  `volume_array` text NULL DEFAULT NULL,
  `price_change` text NULL DEFAULT NULL,
  `liquidity` text NULL DEFAULT NULL,
  `fdv` text NULL DEFAULT NULL,
  `purpose` varchar(45) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `coin_file` text NULL DEFAULT NULL,
  `coin_logo` text NULL DEFAULT NULL,
  `coin_links` text NULL DEFAULT NULL,
  `decimals` varchar(45) NULL DEFAULT NULL,
  `total_supply` decimal(24,8) NULL DEFAULT 0.00000000,
  `minted_supply` decimal(24,8) NULL DEFAULT 0.00000000,
  `token_status` enum('draft','minted','retired') NULL DEFAULT 'draft',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `performance` varchar(45) NULL DEFAULT NULL,
  `coin_redistribution_count` int NULL DEFAULT NULL,
  `coin_redistribution_percentage` decimal(10,2) NULL DEFAULT NULL,
  `amount_of_new_coins_redistributed` decimal(20,8) NULL DEFAULT NULL,
  `total_summary_of_existing_coins_new_coins` decimal(20,8) NULL DEFAULT NULL,
  `amount_of_coins_available_for_sale` decimal(20,8) NULL DEFAULT NULL,
  `current_coin_value` decimal(20,8) NULL DEFAULT NULL,
  `amount_of_coins_purchased` decimal(20,8) NULL DEFAULT NULL,
  `cost_of_amount_of_coins_purchased` decimal(20,8) NULL DEFAULT NULL,
  `new_market_cap` decimal(20,8) NULL DEFAULT NULL,
  `new_coin_value` decimal(20,8) NULL DEFAULT NULL,
  `initial_coins_available` decimal(20,8) NULL DEFAULT NULL,
  `coins_remaining` decimal(20,8) NULL DEFAULT NULL,
  `coins_purchased` decimal(20,8) NULL DEFAULT NULL,
  `gas_fee` decimal(20,8) NULL DEFAULT NULL,
  `trans_percentage_fee` decimal(20,8) NULL DEFAULT NULL,
  `sales_tax_fee` decimal(20,8) NULL DEFAULT NULL,
  `gas_fee_costs` decimal(20,8) NULL DEFAULT NULL,
  `trans_percentage_costs` decimal(20,8) NULL DEFAULT NULL,
  `sales_tax_fee_cost` decimal(20,8) NULL DEFAULT NULL,
  `collected_fees` decimal(20,8) NULL DEFAULT NULL,
  `collected_fees_cost` decimal(20,8) NULL DEFAULT NULL,
  `fee_profits` decimal(20,8) NULL DEFAULT NULL,
  `user_total_transaction_cost` decimal(20,8) NULL DEFAULT NULL,
  `blog` varchar(255) NULL DEFAULT NULL,
  `coingeckoID` varchar(255) NULL DEFAULT NULL,
  `coinmarketcap` varchar(255) NULL DEFAULT NULL,
  `discord` varchar(255) NULL DEFAULT NULL,
  `discord_active` int NULL DEFAULT NULL,
  `facebook` varchar(255) NULL DEFAULT NULL,
  `facebook_active` int NULL DEFAULT NULL,
  `instagram` varchar(255) NULL DEFAULT NULL,
  `instagram_active` int NULL DEFAULT NULL,
  `medium` varchar(255) NULL DEFAULT NULL,
  `medium_active` int NULL DEFAULT NULL,
  `reddit` varchar(255) NULL DEFAULT NULL,
  `reddit_active` int NULL DEFAULT NULL,
  `telegram` varchar(255) NULL DEFAULT NULL,
  `telegram_active` int NULL DEFAULT NULL,
  `twitter` varchar(255) NULL DEFAULT NULL,
  `twitter_active` int NULL DEFAULT NULL,
  `website` varchar(255) NULL DEFAULT NULL,
  `website_active` int NULL DEFAULT NULL,
  `tags` text NULL DEFAULT NULL,
  `premium_tier` enum('basic','premium','gold') NULL DEFAULT 'basic',
  `marketing_features` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- project_id int NULL
- asset_role enum('asset','token') NOT NULL
- asset_type varchar(64) NULL
- name varchar(255) NULL
- metadata_json json NULL
- location_text varchar(255) NULL
- external_refs_json json NULL
- parent_asset_id int NULL
- chain enum('solana','evm','other') NULL
- token_symbol varchar(32) NULL
- token_address varchar(255) NULL
- active varchar(45) NULL
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
- is_tradable int NULL
- listing_type varchar(45) NULL
- blockchain_id varchar(45) NULL
- blockchain varchar(45) NULL
- blockchain_name varchar(45) NULL
- dex_id text NULL
- dex_url text NULL
- dex_pair text NULL
- dex_swap_name varchar(255) NULL
- dex_swap_symbol varchar(45) NULL
- dex_swap_address text NULL
- symbol varchar(45) NULL
- coin_name varchar(255) NULL
- coin_address text NULL
- coin_quantity varchar(45) NULL
- coin_value varchar(45) NULL
- initial_value varchar(45) NULL
- market_cap varchar(45) NULL
- volume text NULL
- volume_array text NULL
- price_change text NULL
- liquidity text NULL
- fdv text NULL
- purpose varchar(45) NULL
- description text NULL
- coin_file text NULL
- coin_logo text NULL
- coin_links text NULL
- decimals varchar(45) NULL
- total_supply decimal(24,8) NULL
- minted_supply decimal(24,8) NULL
- token_status enum('draft','minted','retired') NULL
- created_at datetime NULL
- updated_at datetime NULL
- performance varchar(45) NULL
- coin_redistribution_count int NULL
- coin_redistribution_percentage decimal(10,2) NULL
- amount_of_new_coins_redistributed decimal(20,8) NULL
- total_summary_of_existing_coins_new_coins decimal(20,8) NULL
- amount_of_coins_available_for_sale decimal(20,8) NULL
- current_coin_value decimal(20,8) NULL
- amount_of_coins_purchased decimal(20,8) NULL
- cost_of_amount_of_coins_purchased decimal(20,8) NULL
- new_market_cap decimal(20,8) NULL
- new_coin_value decimal(20,8) NULL
- initial_coins_available decimal(20,8) NULL
- coins_remaining decimal(20,8) NULL
- coins_purchased decimal(20,8) NULL
- gas_fee decimal(20,8) NULL
- trans_percentage_fee decimal(20,8) NULL
- sales_tax_fee decimal(20,8) NULL
- gas_fee_costs decimal(20,8) NULL
- trans_percentage_costs decimal(20,8) NULL
- sales_tax_fee_cost decimal(20,8) NULL
- collected_fees decimal(20,8) NULL
- collected_fees_cost decimal(20,8) NULL
- fee_profits decimal(20,8) NULL
- user_total_transaction_cost decimal(20,8) NULL
- blog varchar(255) NULL
- coingeckoID varchar(255) NULL
- coinmarketcap varchar(255) NULL
- discord varchar(255) NULL
- discord_active int NULL
- facebook varchar(255) NULL
- facebook_active int NULL
- instagram varchar(255) NULL
- instagram_active int NULL
- medium varchar(255) NULL
- medium_active int NULL
- reddit varchar(255) NULL
- reddit_active int NULL
- telegram varchar(255) NULL
- telegram_active int NULL
- twitter varchar(255) NULL
- twitter_active int NULL
- website varchar(255) NULL
- website_active int NULL
- tags text NULL
- premium_tier enum('basic','premium','gold') NULL
- marketing_features json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_assets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

