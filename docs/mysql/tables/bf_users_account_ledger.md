# bf_users_account_ledger

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:33, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:215, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:215, docs/_aiops/doc-change-log.md:2111

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_account_ledger` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT NULL,
  `type` enum('N/A','Bank','Credit','Debt','Investment') NOT NULL DEFAULT NULL,
  `previous_balance` decimal(10,2) NOT NULL DEFAULT NULL,
  `new_balance` decimal(10,2) NOT NULL DEFAULT NULL,
  `difference` decimal(10,2) NOT NULL DEFAULT NULL,
  `action` enum('Addition','Subtraction') NOT NULL DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- account_id int NOT NULL
- user_id int NOT NULL
- type enum('N/A','Bank','Credit','Debt','Investment') NOT NULL
- previous_balance decimal(10,2) NOT NULL
- new_balance decimal(10,2) NOT NULL
- difference decimal(10,2) NOT NULL
- action enum('Addition','Subtraction') NOT NULL
- timestamp timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_account_ledger`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_account_ledger'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_account_ledger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

