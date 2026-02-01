# bf_exchanges_coin_addresses

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIBitcoin.php:65, app/Libraries/MyMIDigibyte.php:32, app/Libraries/MyMIDigibyte.php:58, app/Models/SolanaModel.php:55, app/Models/SolanaModel.php:106, app/Models/SolanaModel.php:146, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:72, docs/_aiops/doc-change-log.md:1265

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_coin_addresses` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `chain` varchar(32) NOT NULL DEFAULT 'solana',
  `address` varchar(64) NOT NULL DEFAULT NULL,
  `label` varchar(128) NULL DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `default_key` varchar(96) NULL DEFAULT NULL STORED GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- chain varchar(32) NOT NULL
- address varchar(64) NOT NULL
- label varchar(128) NULL
- is_default tinyint(1) NOT NULL
- created_at datetime NULL
- updated_at datetime NULL
- default_key varchar(96) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_coin_addresses`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_coin_addresses'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_coin_addresses'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

