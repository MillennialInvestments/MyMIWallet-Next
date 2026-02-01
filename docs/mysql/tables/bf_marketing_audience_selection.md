# bf_marketing_audience_selection

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:107

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_audience_selection` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `campaign_id` int unsigned NOT NULL DEFAULT NULL,
  `account_type` varchar(100) NOT NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- campaign_id int unsigned NOT NULL
- account_type varchar(100) NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_audience_selection`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_audience_selection'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_audience_selection'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

