-- =========================================
-- MyMI Wallet - Discord Integration Schema v3
-- Coalescing, policy filters, fuzzy dedupe, quiet-hour bypass
-- =========================================

-- Subscriptions: digest template + quiet-hour bypass
ALTER TABLE `bf_discord_subscriptions`
  ADD COLUMN `digest_template_key` VARCHAR(64) NULL AFTER `coalesce_key`,
  ADD COLUMN `quiet_bypass` TINYINT(1) NOT NULL DEFAULT 0 AFTER `max_per_window`;

-- History: normalized (fuzzy) hash for near-duplicate detection
ALTER TABLE `bf_discord_message_history`
  ADD COLUMN `normalized_hash` CHAR(64) NULL AFTER `content_hash`;

CREATE INDEX `ix_history_normhash_created` ON `bf_discord_message_history` (`normalized_hash`, `created_at`);

-- Policies: allow/block/mask by regex
CREATE TABLE IF NOT EXISTS `bf_discord_policies` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `rule_type` ENUM('blocklist','allowlist') NOT NULL,
  `pattern` VARCHAR(255) NOT NULL,            -- regex
  `channel_key` VARCHAR(64) NULL,             -- null = global
  `action` ENUM('drop','mask') NOT NULL DEFAULT 'drop',
  `mask_with` VARCHAR(32) NULL,               -- replacement when action='mask'
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Queue: small index improvement for large queues
CREATE INDEX `ix_queue_coalesce` ON `bf_discord_queue` (`coalesce_key`, `channel_key`, `status`, `available_at`);