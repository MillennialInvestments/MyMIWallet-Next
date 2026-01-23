-- Table: bf_exchanges_assets
-- Sources: code: app/Models/SolanaModel.php:323, app/Models/SolanaModel.php:336, app/Models/SolanaModel.php:405, app/Models/SolanaModel.php:411, app/Models/SolanaModel.php:418, app/Models/SolanaModel.php:424, app/Models/SolanaModel.php:465, app/Models/SolanaModel.php:535, app/Models/SolanaModel.php:539, app/Models/SolanaModel.php:565, app/Models/ExchangeModel.php:48, app/Models/ExchangeModel.php:64, app/Models/ExchangeModel.php:74, app/Models/ExchangeModel.php:88, app/Models/AnalyticalModel.php:312, app/Models/AnalyticalModel.php:330, app/Models/AnalyticalModel.php:356, app/Models/AnalyticalModel.php:386, app/Models/AnalyticalModel.php:389, app/Models/AnalyticalModel.php:400, app/Models/AssetsModel.php:8, app/Models/MarketingModel.php:744, app/Models/InvestmentModel.php:225, app/Models/InvestmentModel.php:722, app/Models/InvestmentModel.php:730, app/Models/InvestmentModel.php:1307, app/Models/InvestmentModel.php:1450, app/Modules/Management/Views/Users/Assets.php:15, app/Modules/Management/Views/Assets/Applications/Approval.php:265, app/Modules/Management/Views/Assets/Applications/Details.php:224, app/Modules/APIs/Controllers/SolanaController.php:110, app/Modules/Exchange/Views/Application_Manager.php:147, app/Modules/Exchange/Controllers/ExchangeController.php:560, app/Modules/Exchange/Controllers/SolanaController.php:227, app/Services/TokenService.php:185, app/Libraries/MyMIInvestments.php:1452, app/Libraries/MyMIWallets.php:510, app/Libraries/MyMIWallet.php:385, app/Libraries/MyMIDexScreener.php:128, app/Libraries/MyMIDexScreener.php:181, app/Libraries/MyMIDexScreener.php:196, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:31
-- Suspected columns: id, symbol, blockchain_id, status, market, blockchain
CREATE TABLE IF NOT EXISTS `bf_exchanges_assets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `symbol` TEXT NULL,
  `blockchain_id` TEXT NULL,
  `status` TEXT NULL,
  `market` TEXT NULL,
  `blockchain` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `symbol` TEXT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'blockchain_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `blockchain_id` TEXT NULL', 'SELECT ''column blockchain_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'market');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `market` TEXT NULL', 'SELECT ''column market already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets' AND column_name = 'blockchain');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets` ADD COLUMN `blockchain` TEXT NULL', 'SELECT ''column blockchain already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_assets`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

