# bf_act_logger

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMILogger.php:13, app/Models/AnalyticalModel.php:260, app/Models/AnalyticalModel.php:274, app/Modules/Management/Views/Alerts/Trades.php:666, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:22, docs/_aiops/doc-change-log.md:956

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_act_logger` (
  `id` bigint NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `created_by` varchar(45) NULL DEFAULT 'N/A',
  `beta` varchar(45) NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT NULL,
  `type_id` varchar(20) NOT NULL DEFAULT NULL,
  `controller` varchar(255) NOT NULL DEFAULT NULL,
  `method` varchar(255) NOT NULL DEFAULT NULL,
  `url` text NOT NULL DEFAULT NULL,
  `full_url` text NULL DEFAULT NULL,
  `token` text NOT NULL DEFAULT NULL,
  `comment` text NOT NULL DEFAULT NULL,
  `suspicious_flag` tinyint(1) NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint NOT NULL
- created_on timestamp NOT NULL
- created_by varchar(45) NULL
- beta varchar(45) NULL
- type varchar(255) NOT NULL
- type_id varchar(20) NOT NULL
- controller varchar(255) NOT NULL
- method varchar(255) NOT NULL
- url text NOT NULL
- full_url text NULL
- token text NOT NULL
- comment text NOT NULL
- suspicious_flag tinyint(1) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_act_logger`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_act_logger'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_act_logger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

