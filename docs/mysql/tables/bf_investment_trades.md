# bf_investment_trades

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/APIs/Controllers/ChatController.php:154, app/Modules/APIs/Controllers/ChatController.php:155, app/Modules/APIs/Controllers/ChatController.php:175, app/Modules/APIs/Controllers/ChatController.php:176, app/Modules/APIs/Controllers/ChatController.php:190, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:84, docs/notes/2025-12-01-feature-corrections.md:40, docs/_aiops/doc-change-log.md:1424

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_trades` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_trades`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trades'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

