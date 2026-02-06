# bf_auction_items

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/FMVService.php:48, app/Models/AuctionBidModel.php:31, app/Models/AuctionItemModel.php:8, app/Models/AuctionItemModel.php:69, app/Models/AuctionItemModel.php:70, app/Models/AuctionItemModel.php:71, app/Models/AuctionLotModel.php:206, app/Models/AuctionSettlementModel.php:44, docs/auctions/auction-schema.md:7, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/migration_model_audit.md:73, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1106

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auction_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `md` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- md TEXT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_auction_items`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_items'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_items'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

