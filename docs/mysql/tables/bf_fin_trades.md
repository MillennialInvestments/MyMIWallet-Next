# bf_fin_trades

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Fin/TradeModel.php:8, app/Modules/Admin/Controllers/PrivacyController.php:53, app/Modules/Admin/Controllers/PrivacyController.php:74

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_fin_trades` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- user_id TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_fin_trades`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_trades'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

