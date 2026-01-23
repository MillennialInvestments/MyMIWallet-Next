-- Table: bf_projects
-- Sources: code: app/Models/ProjectsModel.php:7, app/Services/SearchService.php:35, app/Services/SearchService.php:36, app/Services/SearchService.php:87, docs/exports_schema.md:45, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:90, docs/operations/05-database.md:21, docs/OVERVIEW.md:120, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/07-myprojects-real-estate.md:98
-- Suspected columns: title, created_at
CREATE TABLE IF NOT EXISTS `bf_projects` (
  `title` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_projects' AND column_name = 'title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_projects` ADD COLUMN `title` TEXT NULL', 'SELECT ''column title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_projects' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_projects` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_projects`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

