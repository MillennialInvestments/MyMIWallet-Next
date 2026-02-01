# bf_fin_positions_daily

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Fin/PositionDailyModel.php:8, app/Services/Fin/RiskService.php:95, app/Services/Fin/RiskService.php:104, app/Services/Fin/RiskService.php:107, docs/aiops/migration_model_audit.md:108, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1292

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_fin_positions_daily` (
  `user_id` TEXT NULL,
  `date` TEXT NULL,
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- user_id TEXT NULL
- date TEXT NULL
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_fin_positions_daily`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

