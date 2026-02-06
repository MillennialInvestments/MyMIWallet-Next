# bf_push_subscriptions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/PushSubscriptionModel.php:8, app/Modules/Admin/Controllers/PrivacyController.php:54, app/Modules/Admin/Controllers/PrivacyController.php:73, docs/aiops/migration_model_audit.md:171, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1895

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_push_subscriptions` (
  `user_id` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- user_id TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_push_subscriptions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_push_subscriptions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_push_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

