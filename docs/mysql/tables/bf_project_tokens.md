# bf_project_tokens

## Source
- Migration: _None_
- Model:
- Code references: app/Services/TokenService.php:170, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:168, docs/_aiops/doc-change-log.md:1679

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_project_tokens` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL DEFAULT NULL,
  `chain` enum('solana','evm','other') NULL DEFAULT 'solana',
  `symbol` varchar(16) NOT NULL DEFAULT NULL,
  `decimals` tinyint unsigned NULL DEFAULT 0,
  `total_supply` bigint unsigned NOT NULL DEFAULT NULL,
  `minted_supply` bigint unsigned NULL DEFAULT 0,
  `config_json` json NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- project_id int unsigned NOT NULL
- chain enum('solana','evm','other') NULL
- symbol varchar(16) NOT NULL
- decimals tinyint unsigned NULL
- total_supply bigint unsigned NOT NULL
- minted_supply bigint unsigned NULL
- config_json json NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_project_tokens`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_project_tokens'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_project_tokens'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

