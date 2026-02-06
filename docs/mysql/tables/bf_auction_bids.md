# bf_auction_bids

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AuctionBidModel.php:8, app/Models/AuctionBidModel.php:52, app/Models/AuctionBidModel.php:64, app/Models/AuctionBidModel.php:69, app/Models/AuctionSettlementModel.php:50, docs/auctions/auction-schema.md:41, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/migration_model_audit.md:72, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1103

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_auction_bids` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_auction_bids`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_bids'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_bids'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

