-- Table: bf_users_wallets
-- Sources: code: app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:135, app/Modules/APIs/Controllers/ChatController.php:141, app/Modules/APIs/Controllers/ChatController.php:142, app/Modules/APIs/Controllers/ChatController.php:150, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:8
CREATE TABLE IF NOT EXISTS `bf_users_wallets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallets' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallets` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_wallets`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallets'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

