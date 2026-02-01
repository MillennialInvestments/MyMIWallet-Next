# bf_users_link_clicks

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:681, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:233, docs/_aiops/doc-change-log.md:1952

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_link_clicks` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `redirect_id` int NOT NULL DEFAULT NULL,
  `platform` varchar(50) NOT NULL DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT NULL,
  `user_agent` text NULL DEFAULT NULL,
  `clicked_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- redirect_id int NOT NULL
- platform varchar(50) NOT NULL
- ip_address varchar(45) NOT NULL
- user_agent text NULL
- clicked_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_link_clicks`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_link_clicks'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_link_clicks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

