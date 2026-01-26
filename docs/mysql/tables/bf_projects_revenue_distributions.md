# bf_projects_revenue_distributions

## Source
- Migration: _None_
- Model:
- Code references: app/Services/RevenueService.php:196

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_revenue_distributions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL DEFAULT NULL,
  `revenue_event_id` int NOT NULL DEFAULT NULL,
  `gross_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `platform_fee_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `net_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- project_id int NOT NULL
- revenue_event_id int NOT NULL
- gross_amount decimal(15,2) NOT NULL
- platform_fee_amount decimal(15,2) NOT NULL
- net_amount decimal(15,2) NOT NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_revenue_distributions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_distributions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_revenue_distributions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

