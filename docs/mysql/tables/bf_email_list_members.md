# bf_email_list_members

## Source
- Migration: _None_
- Model:
- Code references: app/Models/EmailModel.php:25, app/Models/EmailModel.php:137, app/Models/EmailModel.php:175, app/Models/EmailModel.php:183, app/Models/EmailModel.php:243, app/Models/EmailModel.php:287, app/Models/EmailModel.php:302, app/Models/EmailModel.php:316, app/Models/EmailModel.php:321, app/Models/MarketingModel.php:1978, app/Models/MarketingModel.php:2359, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:65, docs/_aiops/doc-change-log.md:1199

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_list_members` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `list_id` int unsigned NOT NULL DEFAULT NULL,
  `user_id` int unsigned NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT NULL,
  `status` enum('subscribed','unsubscribed','bounced') NULL DEFAULT 'subscribed',
  `added_by` int unsigned NULL DEFAULT NULL,
  `added_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `unsubscribe_token` varchar(128) NULL DEFAULT NULL,
  `unsubscribed_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- list_id int unsigned NOT NULL
- user_id int unsigned NULL
- email varchar(255) NOT NULL
- status enum('subscribed','unsubscribed','bounced') NULL
- added_by int unsigned NULL
- added_at datetime NULL
- unsubscribe_token varchar(128) NULL
- unsubscribed_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_list_members`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_list_members'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_list_members'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

