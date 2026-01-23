-- Table: bf_wallet_providers
-- Sources: code: app/Models/WalletModel.php:887, app/Models/WalletModel.php:888
-- Suspected columns: enabled, sort_order
CREATE TABLE IF NOT EXISTS `bf_wallet_providers` (
  `enabled` TEXT NULL,
  `sort_order` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_wallet_providers' AND column_name = 'enabled');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_wallet_providers` ADD COLUMN `enabled` TEXT NULL', 'SELECT ''column enabled already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_wallet_providers' AND column_name = 'sort_order');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_wallet_providers` ADD COLUMN `sort_order` TEXT NULL', 'SELECT ''column sort_order already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_wallet_providers`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_wallet_providers'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_wallet_providers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

