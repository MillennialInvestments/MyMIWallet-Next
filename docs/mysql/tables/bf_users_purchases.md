# bf_users_purchases

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:292, app/Models/MyMICoinModel.php:75, app/Models/MyMIGoldModel.php:89, app/Models/MyMIGoldModel.php:187, app/Models/WalletModel.php:443, app/Modules/User/Views/Wallets/Feature_Manager.php:101, app/Modules/User/Views/Wallets/Purchase_Manager.php:88, docs/_aiops/doc-change-log.md:2216

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_purchases` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_purchases`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_purchases'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_purchases'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

