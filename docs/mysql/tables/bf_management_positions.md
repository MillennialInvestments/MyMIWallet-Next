# bf_management_positions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:966

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_management_positions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `name` varchar(100) NULL DEFAULT NULL,
  `username` varchar(50) NULL DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT NULL,
  `email` varchar(100) NULL DEFAULT NULL,
  `phone` varchar(15) NULL DEFAULT NULL,
  `department` varchar(50) NOT NULL DEFAULT NULL,
  `position` varchar(100) NOT NULL DEFAULT NULL,
  `is_filled` tinyint(1) NULL DEFAULT 0,
  `date_assigned` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- name varchar(100) NULL
- username varchar(50) NULL
- role_id int NOT NULL
- email varchar(100) NULL
- phone varchar(15) NULL
- department varchar(50) NOT NULL
- position varchar(100) NOT NULL
- is_filled tinyint(1) NULL
- date_assigned date NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_management_positions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_management_positions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_management_positions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

