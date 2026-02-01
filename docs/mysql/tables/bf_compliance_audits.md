# bf_compliance_audits

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:44

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_compliance_audits` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `check_date` date NULL DEFAULT NULL,
  `check_details` text NULL DEFAULT NULL,
  `actions_taken` text NULL DEFAULT NULL,
  `regulatory_body` varchar(255) NULL DEFAULT NULL,
  `communication_log` text NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- check_date date NULL
- check_details text NULL
- actions_taken text NULL
- regulatory_body varchar(255) NULL
- communication_log text NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_compliance_audits`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_compliance_audits'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_compliance_audits'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

