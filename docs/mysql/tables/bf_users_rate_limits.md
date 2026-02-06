# bf_users_rate_limits

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/Abuse/RateLimiter.php:20, app/Libraries/Abuse/RateLimiter.php:33, app/Libraries/Abuse/RateLimiter.php:39, app/Libraries/Abuse/RateLimiter.php:47, app/Libraries/Abuse/RateLimiter.php:57, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:241, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:241, docs/_aiops/doc-change-log.md:2219

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_rate_limits` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `scope` varchar(96) NOT NULL DEFAULT NULL,
  `rl_key` varchar(128) NOT NULL DEFAULT NULL,
  `count` int NOT NULL DEFAULT 0,
  `window_started` datetime NOT NULL DEFAULT NULL,
  `blocked_until` datetime NULL DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- scope varchar(96) NOT NULL
- rl_key varchar(128) NOT NULL
- count int NOT NULL
- window_started datetime NOT NULL
- blocked_until datetime NULL
- updated_at datetime NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_rate_limits`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_rate_limits'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_rate_limits'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

