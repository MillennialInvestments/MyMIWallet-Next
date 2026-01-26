# bf_users_financial_institutions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/InstitutesModel.php:8

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_financial_institutions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `specialty` varchar(255) NOT NULL DEFAULT NULL,
  `location` varchar(255) NOT NULL DEFAULT NULL,
  `contact` varchar(255) NOT NULL DEFAULT NULL,
  `bio` text NOT NULL DEFAULT NULL,
  `certifications` text NOT NULL DEFAULT NULL,
  `experience` text NOT NULL DEFAULT NULL,
  `fee_structure` text NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- name varchar(255) NOT NULL
- specialty varchar(255) NOT NULL
- location varchar(255) NOT NULL
- contact varchar(255) NOT NULL
- bio text NOT NULL
- certifications text NOT NULL
- experience text NOT NULL
- fee_structure text NOT NULL
- created_at timestamp NULL
- updated_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_financial_institutions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_financial_institutions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_financial_institutions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

