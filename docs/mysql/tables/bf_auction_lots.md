# bf_auction_lots

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AuctionBidModel.php:31, app/Models/AuctionItemModel.php:70, app/Models/AuctionLotModel.php:10, app/Models/AuctionLotModel.php:119, app/Models/AuctionLotModel.php:147, app/Models/AuctionLotModel.php:204, app/Models/AuctionSettlementModel.php:38, docs/auctions/auction-schema.md:26, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/migration_model_audit.md:74, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1043

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auction_lots` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auction_lots`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_lots'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_lots'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

