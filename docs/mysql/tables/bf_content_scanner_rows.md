# bf_content_scanner_rows

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ContentScannerRowModel.php:11, docs/content_engine/json_contract.md:37, docs/content_engine/security.md:6, docs/content_engine/sql_patch_notes.md:7, docs/content_engine/troubleshooting.md:15, docs/spark/categories/marketing/content-ingest-sample.md:13, docs/spark/categories/marketing/contentengine-smoke.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_content_scanner_rows` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `ingest_id` int unsigned NOT NULL DEFAULT NULL,
  `symbol` varchar(16) NOT NULL DEFAULT NULL,
  `raw_json` longtext NOT NULL DEFAULT NULL,
  `stage` decimal(10,4) NULL DEFAULT NULL,
  `mark` decimal(16,4) NULL DEFAULT NULL,
  `mark_pct_change` decimal(10,4) NULL DEFAULT NULL,
  `pct_chng_5d` decimal(10,4) NULL DEFAULT NULL,
  `market_cap_m` decimal(16,4) NULL DEFAULT NULL,
  `volume` bigint NULL DEFAULT NULL,
  `dollar_vol_m` decimal(16,4) NULL DEFAULT NULL,
  `abvvol` decimal(10,4) NULL DEFAULT NULL,
  `vol_365` decimal(10,4) NULL DEFAULT NULL,
  `high_52w` decimal(16,4) NULL DEFAULT NULL,
  `low_52w` decimal(16,4) NULL DEFAULT NULL,
  `pct_1mo_chg` decimal(10,4) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- ingest_id int unsigned NOT NULL
- symbol varchar(16) NOT NULL
- raw_json longtext NOT NULL
- stage decimal(10,4) NULL
- mark decimal(16,4) NULL
- mark_pct_change decimal(10,4) NULL
- pct_chng_5d decimal(10,4) NULL
- market_cap_m decimal(16,4) NULL
- volume bigint NULL
- dollar_vol_m decimal(16,4) NULL
- abvvol decimal(10,4) NULL
- vol_365 decimal(10,4) NULL
- high_52w decimal(16,4) NULL
- low_52w decimal(16,4) NULL
- pct_1mo_chg decimal(10,4) NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_content_scanner_rows`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_rows'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_rows'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

