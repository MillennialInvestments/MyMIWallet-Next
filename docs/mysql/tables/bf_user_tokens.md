# bf_user_tokens

## Source
- Migration: _None_
- Model:
- Code references: app/Models/SolanaModel.php:479, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:210, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:210, docs/_aiops/doc-change-log.md:2093

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_tokens` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `token_address` varchar(255) NOT NULL DEFAULT NULL,
  `amount` decimal(20,8) NOT NULL DEFAULT 0.00000000,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- token_address varchar(255) NOT NULL
- amount decimal(20,8) NOT NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_tokens`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tokens'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_tokens'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

