-- Table: bf_content_ideas
-- Sources: code: app/Models/ContentIdeaModel.php:11, docs/content_engine/sql_patch_notes.md:8, docs/content_engine/security.md:10, docs/content_engine/scoring_rules.md:29, docs/content_engine/overview.md:36, docs/content_engine/troubleshooting.md:15
-- Suspected columns: recommended_platforms_json
CREATE TABLE IF NOT EXISTS `bf_content_ideas` (
  `recommended_platforms_json` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_content_ideas' AND column_name = 'recommended_platforms_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_content_ideas` ADD COLUMN `recommended_platforms_json` TEXT NULL', 'SELECT ''column recommended_platforms_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_content_ideas`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_ideas'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_ideas'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

