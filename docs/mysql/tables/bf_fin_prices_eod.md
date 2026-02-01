# bf_fin_prices_eod

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Fin/PriceEodModel.php:8, app/Services/Fin/PriceService.php:38, docs/aiops/migration_model_audit.md:109, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1295

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_fin_prices_eod` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_fin_prices_eod`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_prices_eod'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_prices_eod'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

