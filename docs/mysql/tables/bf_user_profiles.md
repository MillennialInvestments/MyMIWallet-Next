# bf_user_profiles

## Source
- Migration: 2026-02-01-000100_CreateUserOnboardingTables.php
- Model:
- Code references: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:54, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:98, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:155, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:156, app/Libraries/Privacy/DataErasureService.php:13, app/Libraries/Privacy/DataExportService.php:16, app/Models/ProfileModel.php:11, app/Modules/User/Controllers/OnboardingWalkthroughController.php:55, app/Modules/User/Controllers/OnboardingWalkthroughController.php:64, app/Services/OnboardingProgressService.php:222, app/Services/OnboardingProgressService.php:226, app/Services/SetupStatusService.php:228, app/Services/SetupStatusService.php:232, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:206, docs/aiops/migration_model_audit.md:161, docs/aiops/migration_model_audit.md:211, docs/aiops/migration_model_audit.md:250, docs/_aiops/doc-change-log.md:1838, docs/testing/auth_onboarding_test_plan.md:23

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_profiles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `first_name` VARCHAR(120) NULL,
  `last_name` VARCHAR(120) NULL,
  `email` VARCHAR(255) NULL,
  `phone` VARCHAR(40) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- first_name VARCHAR(120) NULL
- last_name VARCHAR(120) NULL
- email VARCHAR(255) NULL
- phone VARCHAR(40) NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_user_profiles`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

