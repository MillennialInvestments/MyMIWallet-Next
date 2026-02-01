# bf_users_budgeting

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIBudget.php:1128, app/Models/AccountsModel.php:412, app/Models/AccountsModel.php:478, app/Models/BudgetModel.php:12, app/Models/BudgetModel.php:264, app/Models/BudgetModel.php:287, app/Models/BudgetModel.php:293, app/Models/BudgetModel.php:320, app/Models/BudgetModel.php:391, app/Models/BudgetModel.php:600, app/Models/BudgetModel.php:879, app/Models/BudgetModel.php:892, app/Models/BudgetModel.php:911, app/Models/BudgetModel.php:995, app/Models/BudgetModel.php:1041, app/Models/BudgetModel.php:1121, app/Models/BudgetModel.php:1342, app/Models/MgmtBudgetModel.php:8, app/Models/PlaidModel.php:129, app/Models/WalletModel.php:81, app/Models/WalletModel.php:658, app/Models/InvestmentModel.php:860, app/Models/InvestmentModel.php:865, app/Modules/Management/Views/Web_Design/Content_Creator/Budgeting/All_Arrays.php:2, app/Modules/Management/Views/Web_Design/Content_Creator/Budgeting/Paid_Status_Update.php:20, app/Modules/Management/Views/Web_Design/Content_Creator/Budgeting/Paid_Status_Update.php:28, app/Modules/Management/Views/Web_Design/Content_Creator/Forecasting_Data_Setup.php:114, app/Modules/User/Controllers/OnboardingWalkthroughController.php:130, app/Modules/User/Controllers/OnboardingWalkthroughController.php:159, app/Modules/User/Controllers/OnboardingWalkthroughController.php:272, app/Modules/User/Controllers/OnboardingWalkthroughController.php:301, app/Modules/User/Models/BudgetModuleModel.php:8, app/Modules/User/Views/Budget/Account_Manager-12152023.php:152, app/Modules/User/Views/Budget/Account_Manager-12152023.php:171, app/Modules/User/Views/Budget/Account_Manager-12152023.php:192, app/Modules/User/Views/Budget/Account_Manager-12152023.php:214, app/Modules/User/Views/Budget/Account_Manager-12152023.php:237, app/Modules/User/Views/Budget/Account_Manager-12152023.php:240, app/Modules/User/Views/Budget/Account_Manager-12152023.php:243, app/Modules/User/Views/Budget/Account_Manager-12152023.php:245, app/Modules/User/Views/Budget/Account_Manager-12152023.php:250, app/Modules/User/Views/Budget/Account_Manager-12152023.php:253, app/Modules/User/Views/Budget/Account_Manager-12152023.php:315, app/Modules/User/Views/Budget/Account_Manager-12152023.php:329, app/Modules/User/Views/Budget/Account_Manager-12152023.php:332, app/Modules/User/Views/Budget/Account_Manager-12232023.php:166, app/Modules/User/Views/Budget/Account_Manager-12232023.php:207, app/Modules/User/Views/Budget/Account_Manager-12232023.php:256, app/Modules/User/Views/Budget/Account_Manager-12232023.php:262, app/Modules/User/Views/Budget/Account_Manager-12232023.php:302, app/Modules/User/Views/Budget/Account_Manager-12232023.php:303, app/Modules/User/Views/Budget/Account_Manager-12232023.php:308, app/Modules/User/Views/Budget/Account_Manager-12232023.php:309, app/Modules/User/Views/Budget/Account_Manager.orig.php:48, app/Modules/User/Views/Budget/Account_Manager.orig.php:75, app/Modules/User/Views/Budget/Account_Manager.orig.php:102, app/Modules/User/Views/Budget/Account_Manager.orig.php:129, app/Modules/User/Views/Budget/Account_Manager.orig.php:156, app/Modules/User/Views/Budget/Account_Manager.orig.php:183, app/Modules/User/Views/Budget/Account_Manager.orig.php:210, app/Modules/User/Views/Budget/Account_Manager.orig.php:231, app/Modules/User/Views/Budget/Account_Manager.php:141, app/Modules/User/Views/Budget/Account_Manager.php:177, app/Modules/User/Views/Budget/Account_Manager.php:216, app/Modules/User/Views/Budget/Account_Manager.php:219, app/Modules/User/Views/Budget/Account_Manager.php:222, app/Modules/User/Views/Budget/Account_Manager.php:224, app/Modules/User/Views/Budget/Account_Manager.php:229, app/Modules/User/Views/Budget/Account_Manager.php:232, app/Modules/User/Views/Budget/Account_Manager.php:294, app/Modules/User/Views/Budget/Account_Manager.php:308, app/Modules/User/Views/Budget/Account_Manager.php:311, app/Modules/User/Views/Budget/Account_Manager.working10072022.php:42, app/Modules/User/Views/Budget/Recurring_Account_Schedule.orig.php:40, app/Modules/User/Views/Budget/Recurring_Account_Schedule.orig.php:459, app/Modules/User/Views/Budget/Recurring_Account_Schedule.orig.php:466, app/Modules/User/Views/Budget/index/Account_Manager-new.php:105, app/Modules/User/Views/Budget/index/Account_Manager-new.php:106, app/Modules/User/Views/Budget/index/Account_Manager-new.php:130, app/Modules/User/Views/Budget/index/Account_Manager-new.php:160, app/Modules/User/Views/Budget/index/Account_Manager-new.php:165, app/Modules/User/Views/Budget/index/Account_Manager-new.php:173, app/Modules/User/Views/Budget/Add.php:50, app/Modules/User/Views/Budget/Financial_Forecast.php:210, app/Modules/User/Views/Budget/Forecast.php:353, app/Modules/User/Views/Budget/Recurring_Account_Schedule-12232023.php:52, app/Modules/User/Views/Budget/Recurring_Account_Schedule-12232023.php:502, app/Modules/User/Views/Budget/Recurring_Account_Schedule-12232023.php:509, app/Modules/User/Views/Budget/Recurring_Account_Schedule.php:302, app/Modules/User/Views/Budget/Recurring_Account_Schedule.php:309, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:11, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:27, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:87, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:111, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:139, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:162, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:186, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:209, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:232, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working.php:253, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working102322.php:232, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working102322.php:396, app/Modules/User/Views/Budget/Recurring_Account_Schedule.working102322.php:403, app/Modules/User/Views/Wallets/Edit_Account.php:68, app/Services/OnboardingProgressService.php:250, app/Services/OnboardingProgressService.php:254, app/Services/OnboardingProgressService.php:255, app/Services/OnboardingProgressService.php:258, app/Services/OnboardingProgressService.php:263, app/Services/OnboardingProgressService.php:266, app/Services/OnboardingProgressService.php:269, app/Services/OnboardingProgressService.php:309, app/Services/OnboardingProgressService.php:313, app/Services/OnboardingProgressService.php:317, app/Services/OnboardingProgressService.php:321, app/Services/OnboardingProgressService.php:324, app/Services/SetupStatusService.php:187, app/Services/SetupStatusService.php:191, app/Services/SetupStatusService.php:192, app/Services/SetupStatusService.php:195, app/Services/SetupStatusService.php:201, app/Services/SetupStatusService.php:205, app/Services/SetupStatusService.php:209, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:220, docs/aiops/migration_model_audit.md:83, docs/aiops/migration_model_audit.md:140, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1904, docs/health/health_test_checklist.md:152, docs/health/health_test_checklist.md:171, docs/health/health_test_checklist.md:190, docs/health/health_test_checklist.md:210, docs/health/modules/budget.md:11, docs/health/modules/budget.md:28, docs/health/modules/budget.md:45, docs/health/modules/budget.md:64, docs/onboarding/budget_investments_quick_setup.md:10, docs/onboarding/budget_investments_quick_setup.md:12, docs/onboarding/budget_investments_quick_setup.md:20, docs/onboarding/budget_investments_quick_setup.md:22, docs/testing/auth_onboarding_test_plan.md:28, docs/testing/auth_onboarding_test_plan.md:32

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_budgeting` (
  `id` bigint NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(32) NULL DEFAULT 'Active',
  `deleted` varchar(45) NULL DEFAULT 0,
  `mode` varchar(45) NULL DEFAULT NULL,
  `paid` varchar(45) NULL DEFAULT 0,
  `paid_date` varchar(45) NULL DEFAULT NULL,
  `paid_time` varchar(45) NULL DEFAULT NULL,
  `beta` varchar(45) NULL DEFAULT NULL,
  `submitted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `unix_timestamp` varchar(128) NULL DEFAULT NULL,
  `designated_date` varchar(128) NULL DEFAULT NULL,
  `designated_date_override` varchar(45) NULL DEFAULT NULL,
  `initial_weeks_left` varchar(45) NULL DEFAULT NULL,
  `last_date` varchar(45) NULL DEFAULT NULL,
  `month` int NULL DEFAULT NULL,
  `day` int NULL DEFAULT NULL,
  `year` int NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `created_by` varchar(128) NULL DEFAULT NULL,
  `created_by_email` varchar(256) NULL DEFAULT NULL,
  `username` varchar(256) NULL DEFAULT NULL,
  `account_type` varchar(128) NULL DEFAULT NULL,
  `source_type` varchar(128) NULL DEFAULT NULL,
  `name` varchar(256) NULL DEFAULT NULL,
  `net_amount` varchar(256) NULL DEFAULT NULL,
  `gross_amount` varchar(256) NULL DEFAULT NULL,
  `monthly_payment` varchar(45) NULL DEFAULT NULL,
  `account_summary` varchar(45) NULL DEFAULT NULL,
  `wallet_id` varchar(45) NULL DEFAULT NULL,
  `is_debt` varchar(45) NULL DEFAULT 0,
  `is_cc_payment` int NULL DEFAULT 0,
  `intervals` varchar(32) NULL DEFAULT NULL,
  `recurring_account` varchar(45) NULL DEFAULT NULL,
  `recurring_account_primary` varchar(45) NULL DEFAULT NULL,
  `recurring_account_id` varchar(45) NULL DEFAULT NULL,
  `recurring_account_order` varchar(45) NULL DEFAULT NULL,
  `recurring_schedule` varchar(45) NULL DEFAULT NULL,
  `link` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint NOT NULL
- status varchar(32) NULL
- deleted varchar(45) NULL
- mode varchar(45) NULL
- paid varchar(45) NULL
- paid_date varchar(45) NULL
- paid_time varchar(45) NULL
- beta varchar(45) NULL
- submitted_on datetime NOT NULL
- unix_timestamp varchar(128) NULL
- designated_date varchar(128) NULL
- designated_date_override varchar(45) NULL
- initial_weeks_left varchar(45) NULL
- last_date varchar(45) NULL
- month int NULL
- day int NULL
- year int NULL
- time varchar(32) NULL
- created_by varchar(128) NULL
- created_by_email varchar(256) NULL
- username varchar(256) NULL
- account_type varchar(128) NULL
- source_type varchar(128) NULL
- name varchar(256) NULL
- net_amount varchar(256) NULL
- gross_amount varchar(256) NULL
- monthly_payment varchar(45) NULL
- account_summary varchar(45) NULL
- wallet_id varchar(45) NULL
- is_debt varchar(45) NULL
- is_cc_payment int NULL
- intervals varchar(32) NULL
- recurring_account varchar(45) NULL
- recurring_account_primary varchar(45) NULL
- recurring_account_id varchar(45) NULL
- recurring_account_order varchar(45) NULL
- recurring_schedule varchar(45) NULL
- link text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_budgeting`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_budgeting'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

