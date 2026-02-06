# bf_projects_providers

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:176, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:176, docs/_aiops/doc-change-log.md:1874

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects_providers` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `legal_name` varchar(255) NOT NULL DEFAULT NULL,
  `dba_name` varchar(255) NULL DEFAULT NULL,
  `ein` varchar(32) NULL DEFAULT NULL,
  `npi` varchar(32) NULL DEFAULT NULL,
  `address_line1` varchar(255) NULL DEFAULT NULL,
  `address_line2` varchar(255) NULL DEFAULT NULL,
  `city` varchar(100) NULL DEFAULT NULL,
  `state` varchar(50) NULL DEFAULT NULL,
  `postal_code` varchar(20) NULL DEFAULT NULL,
  `country` varchar(2) NULL DEFAULT 'US',
  `contact_name` varchar(255) NULL DEFAULT NULL,
  `contact_email` varchar(255) NULL DEFAULT NULL,
  `contact_phone` varchar(50) NULL DEFAULT NULL,
  `website` varchar(255) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- legal_name varchar(255) NOT NULL
- dba_name varchar(255) NULL
- ein varchar(32) NULL
- npi varchar(32) NULL
- address_line1 varchar(255) NULL
- address_line2 varchar(255) NULL
- city varchar(100) NULL
- state varchar(50) NULL
- postal_code varchar(20) NULL
- country varchar(2) NULL
- contact_name varchar(255) NULL
- contact_email varchar(255) NULL
- contact_phone varchar(50) NULL
- website varchar(255) NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects_providers`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_providers'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects_providers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

