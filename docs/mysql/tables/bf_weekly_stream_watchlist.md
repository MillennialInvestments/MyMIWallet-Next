# bf_weekly_stream_watchlist

## Source
- Migration: _None_
- Model:
- Code references: app/Models/WeeklyStreamWatchlistModel.php:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_weekly_stream_watchlist` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `week_start_date` date NOT NULL DEFAULT NULL,
  `watchlist_name` varchar(128) NOT NULL DEFAULT NULL,
  `symbol` varchar(32) NOT NULL DEFAULT NULL,
  `score` decimal(10,4) NULL DEFAULT NULL,
  `notes` text NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- week_start_date date NOT NULL
- watchlist_name varchar(128) NOT NULL
- symbol varchar(32) NOT NULL
- score decimal(10,4) NULL
- notes text NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_weekly_stream_watchlist`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_weekly_stream_watchlist'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_weekly_stream_watchlist'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

