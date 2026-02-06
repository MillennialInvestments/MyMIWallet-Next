# bf_user_discord_rewards

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:203, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:203, docs/_aiops/doc-change-log.md:2042

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_discord_rewards` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT NULL,
  `activity` varchar(100) NOT NULL DEFAULT NULL,
  `points_earned` int NULL DEFAULT 0,
  `timestamp` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- user_id int NOT NULL
- activity varchar(100) NOT NULL
- points_earned int NULL
- timestamp datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_discord_rewards`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_discord_rewards'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_discord_rewards'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

