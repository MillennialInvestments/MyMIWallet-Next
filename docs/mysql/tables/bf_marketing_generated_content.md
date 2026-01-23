-- Table: bf_marketing_generated_content
-- Sources: code: app/Models/MarketingModel.php:46, app/Models/MarketingModel.php:679, app/Models/MarketingModel.php:787, app/Models/MarketingModel.php:798, app/Models/MarketingModel.php:807, app/Models/MarketingModel.php:834, app/Models/MarketingModel.php:844, app/Models/MarketingModel.php:854, app/Models/MarketingModel.php:896, app/Models/MarketingModel.php:1022, app/Models/MarketingModel.php:1186, app/Models/MarketingModel.php:1328, app/Models/MarketingModel.php:1341, app/Models/MarketingModel.php:1417, app/Models/MarketingModel.php:1810, app/Models/MarketingModel.php:2195, app/Models/MarketingModel.php:2384, app/Models/MarketingModel.php:2417, app/Modules/APIs/Controllers/MarketingController.php:2152, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:51, docs/alerts/alerts_marketing_pipline.md:19
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_marketing_generated_content` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_generated_content` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_generated_content`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_content'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

