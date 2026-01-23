-- Table: bf_esports_webhooks
-- Sources: code: app/Models/EsportsModel.php:138, app/Models/EsportsModel.php:143, app/Models/EsportsModel.php:148, app/Models/EsportsModel.php:154, app/Models/EsportsModel.php:170, docs/exports_schema.md:144, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51
-- Suspected columns: payload_digest, id
CREATE TABLE IF NOT EXISTS `bf_esports_webhooks` (
  `payload_digest` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks' AND column_name = 'payload_digest');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_esports_webhooks` ADD COLUMN `payload_digest` TEXT NULL', 'SELECT ''column payload_digest already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_esports_webhooks` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_esports_webhooks`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_webhooks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

