# bf_exchanges_transactions

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:75

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_transactions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `chain` varchar(32) NOT NULL DEFAULT NULL,
  `tx_hash` varchar(255) NOT NULL DEFAULT NULL,
  `direction` enum('in','out') NOT NULL DEFAULT NULL,
  `from_addr` varchar(255) NULL DEFAULT NULL,
  `to_addr` varchar(255) NULL DEFAULT NULL,
  `amount` decimal(24,8) NOT NULL DEFAULT NULL,
  `token_symbol` varchar(32) NULL DEFAULT NULL,
  `related_table` varchar(64) NULL DEFAULT NULL,
  `related_id` int NULL DEFAULT NULL,
  `status` enum('submitted','confirmed','failed') NOT NULL DEFAULT 'submitted',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- chain varchar(32) NOT NULL
- tx_hash varchar(255) NOT NULL
- direction enum('in','out') NOT NULL
- from_addr varchar(255) NULL
- to_addr varchar(255) NULL
- amount decimal(24,8) NOT NULL
- token_symbol varchar(32) NULL
- related_table varchar(64) NULL
- related_id int NULL
- status enum('submitted','confirmed','failed') NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_transactions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_transactions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_transactions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

