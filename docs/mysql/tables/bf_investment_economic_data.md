-- Table: bf_investment_economic_data
-- Sources: code: app/Models/InvestmentModel.php:600, app/Models/InvestmentModel.php:851, app/Libraries/MyMIInvestments.php:1460
CREATE TABLE IF NOT EXISTS `bf_investment_economic_data` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_economic_data' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_economic_data` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_economic_data`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_economic_data'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_economic_data'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

