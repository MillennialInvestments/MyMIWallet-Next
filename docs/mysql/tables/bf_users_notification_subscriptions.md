# bf_users_notification_subscriptions

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMINotifications.php:34, app/Libraries/MyMINotifications.php:46, app/Libraries/MyMINotifications.php:96, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:236, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:236, docs/_aiops/doc-change-log.md:2195

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_notification_subscriptions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `endpoint` text NOT NULL DEFAULT NULL,
  `public_key` text NOT NULL DEFAULT NULL,
  `auth_token` text NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL,
  `page_url` varchar(512) NULL DEFAULT NULL,
  `is_notified` int NULL DEFAULT NULL,
  `user_id` varchar(45) NULL DEFAULT NULL,
  `email` varchar(512) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- endpoint text NOT NULL
- public_key text NOT NULL
- auth_token text NOT NULL
- created_at datetime NOT NULL
- page_url varchar(512) NULL
- is_notified int NULL
- user_id varchar(45) NULL
- email varchar(512) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_notification_subscriptions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_notification_subscriptions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_notification_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

