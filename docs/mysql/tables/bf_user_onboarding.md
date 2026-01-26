# bf_user_onboarding

## Source
- Migration: 2026-02-01-000100_CreateUserOnboardingTables.php
- Model:
- Code references: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:11, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:51, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:159, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:160, app/Libraries/MyMIOnboarding.php:89, app/Models/UserModel.php:174, app/Models/UserModel.php:362, app/Models/UserModel.php:363, app/Models/UserModel.php:382, app/Services/OnboardingProgressService.php:20, app/Services/OnboardingProgressService.php:21, app/Services/OnboardingProgressService.php:28, app/Services/OnboardingProgressService.php:57, app/Services/OnboardingProgressService.php:83, app/Services/OnboardingProgressService.php:171, docs/operations/05-database.md:26, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/onboarding/budget_investments_quick_setup.md:8, docs/testing/auth_onboarding_test_plan.md:6

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_onboarding` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `steps_json` TEXT NULL,
  `first_verified_login_at` DATETIME NULL,
  `walkthrough_started_at` DATETIME NULL,
  `walkthrough_completed_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- steps_json TEXT NULL
- first_verified_login_at DATETIME NULL
- walkthrough_started_at DATETIME NULL
- walkthrough_completed_at DATETIME NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_user_onboarding`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

