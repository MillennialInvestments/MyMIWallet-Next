# NexusArena / Esports Schema Rollout

The following SQL can be executed directly from MySQL Workbench (or any MySQL 8+ client) to provision the Phase 1 esports tables. Run the statements in order to satisfy foreign key dependencies. All tables use the `utf8mb4_unicode_ci` collation and the `InnoDB` engine.

```sql
-- 001: Creators (hosts/organizations running events)
CREATE TABLE IF NOT EXISTS bf_esports_creators (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  user_id           BIGINT UNSIGNED NOT NULL,
  display_name      VARCHAR(120) NOT NULL,
  code              VARCHAR(32) UNIQUE,
  take_rate_bps     INT UNSIGNED NOT NULL DEFAULT 7000,
  status            ENUM('active','suspended','archived') NOT NULL DEFAULT 'active',
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_creators_user FOREIGN KEY (user_id) REFERENCES bf_users(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 002: Events (tournaments/challenges)
CREATE TABLE IF NOT EXISTS bf_esports_events (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  project_id        BIGINT UNSIGNED NULL,
  creator_id        BIGINT UNSIGNED NOT NULL,
  title             VARCHAR(180) NOT NULL,
  game_title        VARCHAR(120) NOT NULL,
  platform          VARCHAR(64)  NOT NULL DEFAULT 'PC',
  format            VARCHAR(64)  NOT NULL,
  description       TEXT NULL,
  buy_in_cents      INT UNSIGNED NOT NULL DEFAULT 0,
  currency          VARCHAR(16) NOT NULL DEFAULT 'MyMIGold',
  max_entrants      INT UNSIGNED NULL,
  starts_at         DATETIME NOT NULL,
  ends_at           DATETIME NULL,
  status            ENUM('draft','open','locked','in_progress','completed','canceled','disputed') NOT NULL DEFAULT 'draft',
  rake_bps          INT UNSIGNED NOT NULL DEFAULT 1000,
  creator_bps       INT UNSIGNED NOT NULL DEFAULT 7000,
  sponsor_bps       INT UNSIGNED NOT NULL DEFAULT 0,
  webhook_source    ENUM('startgg','nexusarena','manual') NOT NULL DEFAULT 'startgg',
  external_event_id VARCHAR(128) NULL,
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_events_creator FOREIGN KEY (creator_id) REFERENCES bf_esports_creators(id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_events_project FOREIGN KEY (project_id) REFERENCES bf_projects(id)
    ON UPDATE CASCADE ON DELETE SET NULL,
  INDEX idx_events_status (status),
  INDEX idx_events_external (external_event_id),
  INDEX idx_events_start (starts_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 003: Entries (players/teams that joined)
CREATE TABLE IF NOT EXISTS bf_esports_entries (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  user_id           BIGINT UNSIGNED NOT NULL,
  team_name         VARCHAR(120) NULL,
  ign               VARCHAR(120) NULL,
  fee_cents         INT UNSIGNED NOT NULL,
  paid_currency     VARCHAR(16) NOT NULL DEFAULT 'MyMIGold',
  paid_tx_id        VARCHAR(128) NULL,
  status            ENUM('pending','paid','checked_in','played','disqualified','refunded') NOT NULL DEFAULT 'pending',
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_entries_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_entries_user FOREIGN KEY (user_id) REFERENCES bf_users(id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  UNIQUE KEY uq_entry_event_user (event_id, user_id),
  INDEX idx_entries_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 004: Prize Pools / Escrow (financial state per event)
CREATE TABLE IF NOT EXISTS bf_esports_pools (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  total_cents       BIGINT UNSIGNED NOT NULL DEFAULT 0,
  rake_cents        BIGINT UNSIGNED NOT NULL DEFAULT 0,
  net_pool_cents    BIGINT UNSIGNED NOT NULL DEFAULT 0,
  currency          VARCHAR(16) NOT NULL DEFAULT 'MyMIGold',
  state             ENUM('open','locked','settled','frozen') NOT NULL DEFAULT 'open',
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_pools_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  UNIQUE KEY uq_pool_event (event_id),
  INDEX idx_pools_state (state)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 005: Solana Escrow Mapping (program + accounts used)
CREATE TABLE IF NOT EXISTS bf_esports_escrows (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  program_id        VARCHAR(64) NOT NULL,
  escrow_account    VARCHAR(64) NOT NULL,
  mint_address      VARCHAR(64) NOT NULL,
  state             ENUM('initialized','funding','locked','released','canceled','frozen') NOT NULL DEFAULT 'initialized',
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_escrows_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  UNIQUE KEY uq_escrow_event (event_id),
  INDEX idx_escrows_state (state)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 006: Payouts (per winner / creator / sponsor / house)
CREATE TABLE IF NOT EXISTS bf_esports_payouts (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  user_id           BIGINT UNSIGNED NULL,
  role              ENUM('winner','creator','sponsor','house') NOT NULL,
  amount_cents      BIGINT UNSIGNED NOT NULL,
  currency          VARCHAR(16) NOT NULL DEFAULT 'MyMIGold',
  tx_id             VARCHAR(128) NULL,
  status            ENUM('pending','processing','completed','failed') NOT NULL DEFAULT 'pending',
  notes             VARCHAR(255) NULL,
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_payouts_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_payouts_user FOREIGN KEY (user_id) REFERENCES bf_users(id)
    ON UPDATE CASCADE ON DELETE SET NULL,
  INDEX idx_payouts_role_status (role, status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 007: Disputes (freeze pool if cheating suspected)
CREATE TABLE IF NOT EXISTS bf_esports_disputes (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  raised_by_user_id BIGINT UNSIGNED NULL,
  reason            VARCHAR(255) NOT NULL,
  evidence_url      VARCHAR(255) NULL,
  status            ENUM('open','review','resolved','dismissed') NOT NULL DEFAULT 'open',
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_disputes_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_disputes_user FOREIGN KEY (raised_by_user_id) REFERENCES bf_users(id)
    ON UPDATE CASCADE ON DELETE SET NULL,
  INDEX idx_disputes_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 008: Webhook Logs (audit + replay)
CREATE TABLE IF NOT EXISTS bf_esports_webhooks (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NULL,
  source            ENUM('startgg','nexusarena','manual') NOT NULL DEFAULT 'startgg',
  external_event_id VARCHAR(128) NULL,
  payload_digest    CHAR(64) NOT NULL,
  signature_valid   TINYINT(1) NOT NULL DEFAULT 0,
  http_code         INT NULL,
  payload           MEDIUMTEXT NULL,
  processed         TINYINT(1) NOT NULL DEFAULT 0,
  attempts          INT UNSIGNED NOT NULL DEFAULT 0,
  last_error        VARCHAR(255) NULL,
  next_attempt_at   DATETIME NULL,
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  processed_at      DATETIME NULL,
  CONSTRAINT fk_webhooks_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE SET NULL,
  INDEX idx_webhooks_source_processed (source, processed),
  INDEX idx_webhooks_external (external_event_id),
  INDEX idx_webhooks_digest (payload_digest)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 009: Background Jobs (DreamHost-friendly cron queue)
CREATE TABLE IF NOT EXISTS bf_esports_jobs (
  id          BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  job_type    VARCHAR(64) NOT NULL,
  payload     JSON NOT NULL,
  status      ENUM('queued','running','done','failed') NOT NULL DEFAULT 'queued',
  attempts    INT UNSIGNED NOT NULL DEFAULT 0,
  run_after   DATETIME NULL,
  last_error  VARCHAR(255) NULL,
  created_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at  DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_jobs_status (status, job_type),
  INDEX idx_jobs_run_after (run_after)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 010: Sponsorships (optional; attach branded prize pools)
CREATE TABLE IF NOT EXISTS bf_esports_sponsorships (
  id                BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  event_id          BIGINT UNSIGNED NOT NULL,
  sponsor_name      VARCHAR(160) NOT NULL,
  sponsor_bps       INT UNSIGNED NOT NULL DEFAULT 0,
  pledge_cents      BIGINT UNSIGNED NOT NULL DEFAULT 0,
  paid              TINYINT(1) NOT NULL DEFAULT 0,
  created_at        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at        DATETIME NULL ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_sponsorships_event FOREIGN KEY (event_id) REFERENCES bf_esports_events(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  INDEX idx_sponsor_paid (paid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Helpful seed (optional but recommended for local/dev)
INSERT INTO bf_esports_creators (user_id, display_name, code, take_rate_bps)
VALUES (1, 'NexusArena Host', 'NEXUS', 7000)
ON DUPLICATE KEY UPDATE
  display_name = VALUES(display_name),
  take_rate_bps = VALUES(take_rate_bps);

-- Feature flag bootstrap (only if bf_feature_flags exists)
INSERT INTO bf_feature_flags (flag, enabled, description)
VALUES ('esports.nexusarena', 1, 'Enable NexusArena esports integrations')
ON DUPLICATE KEY UPDATE
  description = VALUES(description);
```

> **Note:** If your environment uses prefixed table names or alternative user/project tables, adjust the foreign key references accordingly before running the script.