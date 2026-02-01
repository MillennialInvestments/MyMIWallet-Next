# bf_sec_filings

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:186

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_sec_filings` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `accession_number` varchar(32) NOT NULL DEFAULT NULL,
  `cik` varchar(12) NULL DEFAULT NULL,
  `filing_date` date NULL DEFAULT NULL,
  `form_type` varchar(16) NULL DEFAULT NULL,
  `document_url` text NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- accession_number varchar(32) NOT NULL
- cik varchar(12) NULL
- filing_date date NULL
- form_type varchar(16) NULL
- document_url text NULL
- created_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_sec_filings`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_sec_filings'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_sec_filings'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

