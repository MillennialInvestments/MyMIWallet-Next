-- Table: bf_investment_filings
-- Sources: code: app/Models/AlertsModel.php:958, app/Models/AlertsModel.php:1222, app/Models/AlertsModel.php:1723, app/Models/AlertsModel.php:3204, app/Models/AlertsModel.php:3209, app/Models/InvestmentModel.php:612, app/Models/InvestmentModel.php:618
-- Suspected columns: symbol
CREATE TABLE IF NOT EXISTS `bf_investment_filings` (
  `symbol` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_filings' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_filings` ADD COLUMN `symbol` TEXT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_filings`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_filings'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_filings'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

