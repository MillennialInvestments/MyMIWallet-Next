-- Table: bf_support_requests
-- Sources: code: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:21, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:63, app/Models/SupportModel.php:10, app/Models/AnalyticalModel.php:468, app/Models/AnalyticalModel.php:475, app/Models/AnalyticalModel.php:483, app/Models/AnalyticalModel.php:490, app/Modules/Management/Views/Support/Requests.php:8, app/Modules/Management/Views/Support/Requests.php:17, app/Modules/Management/Views/Support/Reporting.php:10, app/Modules/Management/Views/Support/Requests/Details.php:18, app/Modules/User/Views/Support/Communication_Manager.php:38, app/Modules/User/Views/Knowledgebase/Response.php:12, app/Modules/User/Views/Knowledgebase/Response.php:16
CREATE TABLE IF NOT EXISTS `bf_support_requests` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_support_requests' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_support_requests` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_support_requests`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_support_requests'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_support_requests'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

