-- Table: bf_marketing_page_seo
-- Sources: code: app/Database/Seeds/HowItWorksMetaSeeder.php:22, app/Views/themes/dashboard/layouts/metadata-information.php:82, app/Models/PublicModel.php:44, app/Models/PublicModel.php:52, app/Models/PageSEOModel.php:8, app/Modules/Management/Views/Web_Design/Sitemap_Generator.php:9, app/Modules/Management/Controllers/ServicesController.php:154, app/Modules/Management/Controllers/ServicesController.php:162, app/Modules/Management/Controllers/ServicesController.php:185, app/Services/MetaService.php:191, app/Services/MetaService.php:196, docs/ops/log-fixes/2026-01-01.md:13
CREATE TABLE IF NOT EXISTS `bf_marketing_page_seo` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_page_seo' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_page_seo` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_page_seo`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_page_seo'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_page_seo'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

