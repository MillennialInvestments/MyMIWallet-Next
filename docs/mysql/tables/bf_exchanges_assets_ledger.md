-- Table: bf_exchanges_assets_ledger
-- Sources: code: app/Models/ExchangeModel.php:96, app/Models/ExchangeModel.php:114, app/Models/ExchangeModel.php:133, app/Models/ExchangeModel.php:143, app/Models/ExchangeModel.php:148
-- Suspected columns: suspicious
CREATE TABLE IF NOT EXISTS `bf_exchanges_assets_ledger` (
  `suspicious` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets_ledger' AND column_name = 'suspicious');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_assets_ledger` ADD COLUMN `suspicious` TEXT NULL', 'SELECT ''column suspicious already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_assets_ledger`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets_ledger'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_assets_ledger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

