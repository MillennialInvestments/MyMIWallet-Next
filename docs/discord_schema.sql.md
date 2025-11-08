-- =========================================
-- MyMI Wallet - Discord Integration Schema
-- =========================================

-- Channels registry (maps logical keys to Discord channel/webhook IDs)
CREATE TABLE IF NOT EXISTS `bf_discord_channels` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL UNIQUE,
  `channel_id` VARCHAR(32) NULL,
  `webhook_url` TEXT NULL,
  `name` VARCHAR(128) NULL,
  `topic` VARCHAR(255) NULL,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `allow_embeds` TINYINT(1) NOT NULL DEFAULT 1,
  `min_interval_sec` INT NOT NULL DEFAULT 90,
  `last_sent_at` DATETIME NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Templates (string + optional embed JSON; mustache-like placeholders)
CREATE TABLE IF NOT EXISTS `bf_discord_templates` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `template_key` VARCHAR(64) NOT NULL UNIQUE,
  `title` VARCHAR(128) NULL,
  `content` TEXT NOT NULL,
  `embed_json` JSON NULL,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Event → Channel mapping + optional filters
CREATE TABLE IF NOT EXISTS `bf_discord_subscriptions` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `event_key` VARCHAR(64) NOT NULL,           -- e.g. 'alerts.opened', 'news.daily_digest'
  `channel_key` VARCHAR(64) NOT NULL,
  `template_key` VARCHAR(64) NOT NULL,
  `filters_json` JSON NULL,                    -- e.g. {"tickers":["AAPL","SPY"],"minScore":0.7}
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL,
  UNIQUE KEY `u_event_channel_template` (`event_key`,`channel_key`,`template_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Message queue with dedupe and scheduling
CREATE TABLE IF NOT EXISTS `bf_discord_queue` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL,
  `payload_json` JSON NOT NULL,                -- {content, embeds[], flags}
  `dedupe_hash` CHAR(64) NOT NULL,             -- sha256(content + embeds + channel_key)
  `status` ENUM('queued','sending','sent','failed','dead') NOT NULL DEFAULT 'queued',
  `attempts` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `scheduled_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `available_at` DATETIME NULL,                -- backoff next-attempt time
  `error` TEXT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `sent_at` DATETIME NULL,
  UNIQUE KEY `u_dedupe` (`dedupe_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Message history (for cross-run dedupe & moderation)
CREATE TABLE IF NOT EXISTS `bf_discord_message_history` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL,
  `message_id` VARCHAR(32) NULL,
  `content_hash` CHAR(64) NOT NULL,            -- sha256(sanitized content)
  `dedupe_hash` CHAR(64) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  KEY `k_channel_created` (`channel_key`,`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Optional: low-level API limit snapshots
CREATE TABLE IF NOT EXISTS `bf_discord_rate_limits` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `route` VARCHAR(64) NOT NULL,                -- 'webhook' or 'bot_message'
  `bucket` VARCHAR(64) NULL,
  `remaining` INT NULL,
  `reset_at` DATETIME NULL,
  `captured_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Operational logs (compact app-level)
CREATE TABLE IF NOT EXISTS `bf_discord_logs` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `level` ENUM('debug','info','warning','error','critical') NOT NULL,
  `message` VARCHAR(255) NOT NULL,
  `context_json` JSON NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;