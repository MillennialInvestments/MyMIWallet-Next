# bf_marketing_schedule_content

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:136

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_schedule_content` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL DEFAULT NULL,
  `platform` varchar(50) NOT NULL DEFAULT NULL,
  `generated_content` text NOT NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- post_id int NOT NULL
- platform varchar(50) NOT NULL
- generated_content text NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_schedule_content`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule_content'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule_content'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

