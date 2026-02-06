# bf_circuit_breakers

## Source
- Migration: _None_
- Model:
- Code references: app/Models/CircuitBreakerModel.php:8, app/Modules/Status/Controllers/HealthController.php:43, docs/aiops/migration_model_audit.md:87, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1175

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_circuit_breakers` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_circuit_breakers`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_circuit_breakers'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_circuit_breakers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

