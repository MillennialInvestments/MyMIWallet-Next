# bf_projects_revenue_events

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:181, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:181, docs/_aiops/doc-change-log.md:1889

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_revenue_events` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `currency` varchar(8) NOT NULL DEFAULT 'USD',
  `event_date` date NOT NULL DEFAULT NULL,
  `source` enum('rental','sale','royalty','service','other') NOT NULL DEFAULT 'other',
  `notes` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- project_id int NOT NULL
- amount decimal(15,2) NOT NULL
- currency varchar(8) NOT NULL
- event_date date NOT NULL
- source enum('rental','sale','royalty','service','other') NOT NULL
- notes text NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_revenue_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

