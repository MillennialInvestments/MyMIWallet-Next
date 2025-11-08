# Auction Schema SQL

The following SQL statements provision the auction-related tables for MyMI Wallet. Run them sequentially against the MySQL database to create the required structures.

```sql
-- 1) Items listed for auction
CREATE TABLE IF NOT EXISTS bf_auction_items (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id          INT UNSIGNED NOT NULL,             -- seller
  title            VARCHAR(255) NOT NULL,
  slug             VARCHAR(255) UNIQUE,
  description      TEXT,
  category         VARCHAR(128),
  condition_grade  ENUM('new','open-box','used-like-new','used-good','used-fair') DEFAULT 'used-good',
  images_json      JSON NULL,                          -- array of urls
  fmv_source_json  JSON NULL,                          -- FMV sources + scores
  fmv_amount_cents BIGINT UNSIGNED DEFAULT 0,          -- computed fair value * 100
  reserve_cents    BIGINT UNSIGNED DEFAULT 0,          -- optional seller reserve
  min_increment    INT UNSIGNED DEFAULT 100,           -- in cents of MyMIGold (e.g., $1)
  status           ENUM('draft','listed','closed','settled','cancelled') DEFAULT 'draft',
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2) Auction lots (time windows around an item)
CREATE TABLE IF NOT EXISTS bf_auction_lots (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  item_id          INT UNSIGNED NOT NULL,
  starts_at        DATETIME NOT NULL,
  ends_at          DATETIME NOT NULL,
  anti_snipe_sec   INT UNSIGNED DEFAULT 120,           -- extend by 2 min
  extend_threshold_sec INT UNSIGNED DEFAULT 120,       -- last 2 min window
  currency         ENUM('MYMIGOLD') DEFAULT 'MYMIGOLD',
  status           ENUM('scheduled','live','ended','cancelled') DEFAULT 'scheduled',
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY idx_item (item_id)
);

-- 3) Bids
CREATE TABLE IF NOT EXISTS bf_auction_bids (
  id               BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  lot_id           INT UNSIGNED NOT NULL,
  bidder_id        INT UNSIGNED NOT NULL,
  amount_cents     BIGINT UNSIGNED NOT NULL,           -- MYMIGOLD cents
  leading          TINYINT(1) DEFAULT 0,               -- snapshot flag
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  KEY idx_lot (lot_id),
  KEY idx_lot_created (lot_id, created_at)
);

-- 4) Results / settlement
CREATE TABLE IF NOT EXISTS bf_auction_settlements (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  lot_id           INT UNSIGNED NOT NULL,
  item_id          INT UNSIGNED NOT NULL,
  seller_id        INT UNSIGNED NOT NULL,
  winner_id        INT UNSIGNED DEFAULT NULL,
  winning_cents    BIGINT UNSIGNED DEFAULT 0,
  fee_bps          INT UNSIGNED DEFAULT 500,           -- platform fee 5% default
  fee_cents        BIGINT UNSIGNED DEFAULT 0,
  payout_cents     BIGINT UNSIGNED DEFAULT 0,
  escrow_status    ENUM('none','held','released','refunded') DEFAULT 'none',
  status           ENUM('pending','awaiting_payment','paid','shipped','received','settled','refunded','dispute') DEFAULT 'pending',
  tx_meta_json     JSON NULL,                          -- chain tx ids / ledger refs
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_lot (lot_id)
);

-- 5) Balances (MYMIGOLD)
CREATE TABLE IF NOT EXISTS bf_auction_balances (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id          INT UNSIGNED NOT NULL,
  gold_cents       BIGINT NOT NULL DEFAULT 0,
  hold_cents       BIGINT NOT NULL DEFAULT 0,          -- escrow holds
  updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_user (user_id)
);

-- 6) Payments & conversions
CREATE TABLE IF NOT EXISTS bf_auction_payments (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id          INT UNSIGNED NOT NULL,
  lot_id           INT UNSIGNED DEFAULT NULL,
  method           ENUM('MYMIGOLD','BTC','ETH','CARD') DEFAULT 'MYMIGOLD',
  direction        ENUM('topup','payout','fee','refund') NOT NULL,
  amount_cents     BIGINT NOT NULL,
  rate_used        DECIMAL(16,8) DEFAULT NULL,         -- if BTC/ETH → Gold
  tx_ref           VARCHAR(191) DEFAULT NULL,          -- chain hash / PSP ref
  status           ENUM('pending','confirmed','failed') DEFAULT 'pending',
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  KEY idx_user (user_id),
  KEY idx_lot (lot_id)
);

-- 7) Watchlist / events
CREATE TABLE IF NOT EXISTS bf_auction_watchlist (
  id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id          INT UNSIGNED NOT NULL,
  lot_id           INT UNSIGNED NOT NULL,
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_watch (user_id, lot_id)
);

-- 8) Activity audit
CREATE TABLE IF NOT EXISTS bf_auction_activity (
  id               BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id          INT UNSIGNED DEFAULT NULL,
  lot_id           INT UNSIGNED DEFAULT NULL,
  item_id          INT UNSIGNED DEFAULT NULL,
  action           VARCHAR(64) NOT NULL,               -- 'create_item','place_bid','auto_extend', etc.
  meta_json        JSON NULL,
  created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

> **Note:** Execute each statement individually if your MySQL client does not allow multi-statement batches. Ensure appropriate permissions and backups are in place before modifying production databases.
