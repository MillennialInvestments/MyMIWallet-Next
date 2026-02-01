# bf_users_watchlist

## Source
- Migration: _None_
- Model:
- Code references: app/Models/InvestmentModel.php:150, app/Models/InvestmentModel.php:586, app/Models/InvestmentModel.php:625, app/Modules/User/Controllers/OnboardingWalkthroughController.php:329, app/Modules/User/Controllers/OnboardingWalkthroughController.php:342, app/Services/WeeklyStreamService.php:111, app/Services/WeeklyStreamService.php:112, app/Services/OnboardingProgressService.php:333, app/Services/OnboardingProgressService.php:337, app/Services/SetupStatusService.php:242, app/Services/SetupStatusService.php:246, docs/chatgpt/codex_executive_director/summary.md:20, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:258, docs/_aiops/doc-change-log.md:2036, docs/health/health_test_checklist.md:231, docs/health/health_test_checklist.md:234, docs/health/modules/investments.md:10, docs/onboarding/budget_investments_quick_setup.md:13, docs/testing/auth_onboarding_test_plan.md:34

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_watchlist` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `symbol` varchar(10) NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `current_price` int NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- status int NULL
- symbol varchar(10) NOT NULL
- created_at timestamp NULL
- created_on datetime NULL
- current_price int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_watchlist`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_watchlist'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_watchlist'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

