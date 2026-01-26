# bf_users_certified_advisors

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AdvisorModel.php:8

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_certified_advisors` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `specialty` varchar(255) NULL DEFAULT NULL,
  `location` varchar(255) NULL DEFAULT NULL,
  `contact` varchar(255) NULL DEFAULT NULL,
  `bio` text NULL DEFAULT NULL,
  `certifications` text NULL DEFAULT NULL,
  `experience` int NULL DEFAULT NULL,
  `fee_structure` varchar(255) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- name varchar(255) NOT NULL
- specialty varchar(255) NULL
- location varchar(255) NULL
- contact varchar(255) NULL
- bio text NULL
- certifications text NULL
- experience int NULL
- fee_structure varchar(255) NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_certified_advisors`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_certified_advisors'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_certified_advisors'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

