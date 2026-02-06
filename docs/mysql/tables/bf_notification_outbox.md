# bf_notification_outbox

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:149, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:149, docs/_aiops/doc-change-log.md:1748

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_notification_outbox` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `channel` varchar(32) NOT NULL DEFAULT NULL,
  `event` varchar(64) NOT NULL DEFAULT NULL,
  `reference_id` bigint NULL DEFAULT NULL,
  `debounce_key` varchar(191) NULL DEFAULT NULL,
  `payload_json` longtext NOT NULL DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'pending',
  `attempts` int NOT NULL DEFAULT 0,
  `last_error` text NULL DEFAULT NULL,
  `available_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- channel varchar(32) NOT NULL
- event varchar(64) NOT NULL
- reference_id bigint NULL
- debounce_key varchar(191) NULL
- payload_json longtext NOT NULL
- status varchar(16) NOT NULL
- attempts int NOT NULL
- last_error text NULL
- available_at datetime NOT NULL
- scheduled_at datetime NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_notification_outbox`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_notification_outbox'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_notification_outbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

