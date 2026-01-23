-- Table: bf_exchanges
-- Sources: code: app/Models/MyMIGoldModel.php:49, app/Models/MyMIGoldModel.php:57, app/Models/SolanaModel.php:8, app/Models/ExchangeModel.php:8, app/Models/ExchangeModel.php:57, app/Models/ExchangeModel.php:153, app/Models/ExchangeModel.php:342, app/Models/ExchangeModel.php:358, app/Models/ExchangeModel.php:368, app/Models/MyMICoinModel.php:43, app/Models/MyMICoinModel.php:51, app/Modules/Management/Views/Users/Assets.php:9, app/Modules/Management/Views/Assets/Distribute.php:9, app/Modules/Exchange/Views/Order_Buy_Manager.php:167, app/Modules/Exchange/Views/Order_Sell_Manager.php:167, app/Libraries/MyMIExchange.php:313
-- Suspected columns: current_value
CREATE TABLE IF NOT EXISTS `bf_exchanges` (
  `current_value` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges' AND column_name = 'current_value');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges` ADD COLUMN `current_value` TEXT NULL', 'SELECT ''column current_value already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

