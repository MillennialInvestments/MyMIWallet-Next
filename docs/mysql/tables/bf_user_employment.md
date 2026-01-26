# bf_user_employment

## Source
- Migration: 2026-02-01-000100_CreateUserOnboardingTables.php
- Model:
- Code references: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:101, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:145, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:151, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:152, app/Modules/User/Controllers/OnboardingWalkthroughController.php:73, app/Modules/User/Controllers/OnboardingWalkthroughController.php:82, app/Services/OnboardingProgressService.php:236, app/Services/OnboardingProgressService.php:240, docs/testing/auth_onboarding_test_plan.md:23

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_employment` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `employment_type` VARCHAR(40) NULL,
  `company_name` VARCHAR(160) NULL,
  `business_name` VARCHAR(160) NULL,
  `job_title` VARCHAR(120) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- employment_type VARCHAR(40) NULL
- company_name VARCHAR(160) NULL
- business_name VARCHAR(160) NULL
- job_title VARCHAR(120) NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id) [UNIQUE]

## Verification
```sql
SHOW CREATE TABLE `bf_user_employment`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

