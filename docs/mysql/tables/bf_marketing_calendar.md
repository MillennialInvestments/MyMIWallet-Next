# bf_marketing_calendar

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:1227, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:112, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:112, docs/_aiops/doc-change-log.md:1586

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_calendar` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL DEFAULT NULL,
  `time` varchar(10) NOT NULL DEFAULT NULL,
  `activity` text NOT NULL DEFAULT NULL,
  `link` varchar(255) NULL DEFAULT NULL,
  `completed` int NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- day varchar(10) NOT NULL
- time varchar(10) NOT NULL
- activity text NOT NULL
- link varchar(255) NULL
- completed int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_calendar`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_calendar'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_calendar'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

