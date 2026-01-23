-- Table: bf_onboarding_steps
-- Sources: code: app/Services/OnboardingService.php:8
-- Suspected columns: code
CREATE TABLE IF NOT EXISTS `bf_onboarding_steps` (
  `code` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_onboarding_steps' AND column_name = 'code');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_onboarding_steps` ADD COLUMN `code` TEXT NULL', 'SELECT ''column code already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_onboarding_steps`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_onboarding_steps'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_onboarding_steps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

