-- Table: bf_exchanges_listing_request
-- Sources: code: app/Models/ExchangeModel.php:297, app/Models/ExchangeModel.php:311, app/Models/ExchangeModel.php:334, app/Models/ExchangeModel.php:351, app/Models/AnalyticalModel.php:288, app/Models/AnalyticalModel.php:303, app/Models/AnalyticalModel.php:340, app/Models/AnalyticalModel.php:372, app/Models/AnalyticalModel.php:379, app/Models/AnalyticalModel.php:393, app/Models/AnalyticalModel.php:406, app/Modules/Management/Views/Web_Design/Test_Page/data-distribution.php:7, app/Modules/Exchange/Views/Coin_Listing_Asset_Information/list_fields.php:24, app/Modules/Exchange/Views/Application_Manager.php:72, app/Modules/Exchange/Views/Application_Manager.php:95, app/Modules/Exchange/Views/Application_Manager.php:203, app/Libraries/MyMIUser.php:433, app/Libraries/MyMIUsers.php:463
CREATE TABLE IF NOT EXISTS `bf_exchanges_listing_request` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_listing_request' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_listing_request` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_listing_request`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_listing_request'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_listing_request'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

