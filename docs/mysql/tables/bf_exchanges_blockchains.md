# bf_exchanges_blockchains

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ExchangeModel.php:319, app/Modules/Exchange/Views/Application_Manager.php:119, app/Modules/Exchange/Views/Application_Manager.php:153, app/Modules/Exchange/Views/Coin_Listing_Asset_Information/list_fields.php:32

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_blockchains` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_blockchains`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_blockchains'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_blockchains'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

