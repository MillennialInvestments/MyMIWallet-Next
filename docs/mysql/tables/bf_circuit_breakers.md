-- Table: bf_circuit_breakers
-- Sources: code: app/Models/CircuitBreakerModel.php:8, app/Modules/Status/Controllers/HealthController.php:43
CREATE TABLE IF NOT EXISTS `bf_circuit_breakers` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_circuit_breakers' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_circuit_breakers` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_circuit_breakers`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_circuit_breakers'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_circuit_breakers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

