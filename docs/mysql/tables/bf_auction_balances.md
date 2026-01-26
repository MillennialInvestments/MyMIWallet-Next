# bf_auction_balances

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AuctionBalanceModel.php:8, app/Models/AuctionBalanceModel.php:51, app/Models/AuctionBalanceModel.php:66, app/Models/AuctionBalanceModel.php:94, app/Models/AuctionBalanceModel.php:109, app/Models/AuctionBalanceModel.php:137, app/Models/AuctionBalanceModel.php:166, app/Models/AuctionBalanceModel.php:194, app/Models/AuctionBalanceModel.php:202, docs/auctions/auction-schema.md:72, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auction_balances` (
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
SHOW CREATE TABLE `bf_auction_balances`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_balances'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_balances'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

