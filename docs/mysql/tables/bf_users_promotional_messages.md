# bf_users_promotional_messages

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:2279, app/Models/MarketingModel.php:2423

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_promotional_messages` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` varchar(255) NOT NULL DEFAULT NULL,
  `message` text NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `noto_count` int NULL DEFAULT 0,
  `email_noto_count` int NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- active varchar(255) NOT NULL
- message text NOT NULL
- created_at datetime NOT NULL
- updated_at datetime NULL
- noto_count int NULL
- email_noto_count int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_promotional_messages`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_promotional_messages'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_promotional_messages'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

