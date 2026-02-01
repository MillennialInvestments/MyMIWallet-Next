# bf_users_onboarding

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:237

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_onboarding` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `kyc_verified` tinyint(1) NULL DEFAULT 0,
  `legal_policy_agreed` tinyint(1) NULL DEFAULT 0,
  `membership_customized` tinyint(1) NULL DEFAULT 0,
  `registered_robinhood` tinyint(1) NULL DEFAULT 0,
  `registered_tradingview` tinyint(1) NULL DEFAULT 0,
  `joined_discord` tinyint(1) NULL DEFAULT 0,
  `completed_budget` tinyint(1) NULL DEFAULT 0,
  `added_wallets` tinyint(1) NULL DEFAULT 0,
  `viewed_financial_summary` tinyint(1) NULL DEFAULT 0,
  `reminder_last_sent` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- kyc_verified tinyint(1) NULL
- legal_policy_agreed tinyint(1) NULL
- membership_customized tinyint(1) NULL
- registered_robinhood tinyint(1) NULL
- registered_tradingview tinyint(1) NULL
- joined_discord tinyint(1) NULL
- completed_budget tinyint(1) NULL
- added_wallets tinyint(1) NULL
- viewed_financial_summary tinyint(1) NULL
- reminder_last_sent timestamp NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_onboarding`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_onboarding'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_onboarding'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

