# bf_project_payouts

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ProjectPayoutsModel.php:7, docs/chatgpt/codex_executive_director/summary.md:42, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:166, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:166, docs/aiops/migration_model_audit.md:165, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1832

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_project_payouts` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `project_id` int unsigned NOT NULL DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `payout_date` date NULL DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'completed',
  `notes` text NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- project_id int unsigned NOT NULL
- amount decimal(15,2) NOT NULL
- payout_date date NULL
- status varchar(32) NOT NULL
- notes text NULL
- created_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_project_payouts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_project_payouts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_project_payouts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

