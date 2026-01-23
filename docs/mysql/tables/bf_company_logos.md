-- Table: bf_company_logos
-- Sources: code: app/Models/MarketingModel.php:612, app/Models/MarketingModel.php:749, app/Models/MarketingModel.php:2086, app/Models/MarketingModel.php:2087, app/Models/MarketingModel.php:2092, app/Models/MarketingModel.php:2093, app/Models/MarketingModel.php:2099, app/Models/MarketingModel.php:2100, app/Models/MarketingModel.php:2115, app/Models/MarketingModel.php:2121, app/Models/MarketingModel.php:2122, app/Models/MarketingModel.php:2125, app/Models/MarketingModel.php:2126, app/Models/InvestmentModel.php:457
-- Suspected columns: symbol
CREATE TABLE IF NOT EXISTS `bf_company_logos` (
  `symbol` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_company_logos' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_company_logos` ADD COLUMN `symbol` TEXT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_company_logos`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_company_logos'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_company_logos'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

