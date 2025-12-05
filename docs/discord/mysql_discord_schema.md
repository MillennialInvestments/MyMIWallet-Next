# MySQL Schema — Discord Integration

Use these definitions to align migrations with what `MyMIDiscord` and `DiscordModel` expect. Apply them via migrations or manual SQL before enabling workers.

## Core tables

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_channels` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL UNIQUE,
  `name` VARCHAR(128) NULL,
  `channel_id` VARCHAR(64) NULL,
  `webhook_url` TEXT NULL,
  `role_id` VARCHAR(64) NULL,
  `category` VARCHAR(64) NULL,
  `priority` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `allow_embeds` TINYINT(1) NOT NULL DEFAULT 1,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `min_interval_sec` INT UNSIGNED NOT NULL DEFAULT 90,
  `last_sent_at` DATETIME NULL,
  `topic` VARCHAR(255) NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_templates` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `template_key` VARCHAR(64) NOT NULL UNIQUE,
  `title` VARCHAR(255) NULL,
  `content` TEXT NOT NULL,
  `embed_json` TEXT NULL,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_subscriptions` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `event_key` VARCHAR(128) NOT NULL,
  `channel_key` VARCHAR(64) NOT NULL,
  `template_key` VARCHAR(64) NOT NULL,
  `filters_json` JSON NULL,
  `priority` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `digest_window_sec` INT UNSIGNED NOT NULL DEFAULT 0,
  `max_per_window` INT UNSIGNED NOT NULL DEFAULT 0,
  `coalesce_key` VARCHAR(64) NULL,
  `digest_template_key` VARCHAR(64) NULL,
  `quiet_bypass` TINYINT(1) NOT NULL DEFAULT 0,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `ix_event_channel` (`event_key`, `channel_key`),
  KEY `ix_coalesce` (`coalesce_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_queue` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL,
  `payload_json` JSON NOT NULL,
  `dedupe_hash` CHAR(64) NOT NULL,
  `dedupe_key` VARCHAR(255) NULL,
  `coalesce_key` VARCHAR(64) NULL,
  `priority` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `status` ENUM('queued','sent','failed','dead') NOT NULL DEFAULT 'queued',
  `scheduled_at` DATETIME NOT NULL,
  `available_at` DATETIME NULL,
  `sent_at` DATETIME NULL,
  `attempts` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `error` VARCHAR(255) NULL,
  KEY `ix_queue_status` (`status`, `available_at`),
  KEY `ix_queue_dedupe` (`dedupe_hash`),
  KEY `ix_queue_coalesce` (`coalesce_key`, `channel_key`, `status`, `available_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_message_history` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `channel_key` VARCHAR(64) NOT NULL,
  `message_id` VARCHAR(64) NULL,
  `content_hash` CHAR(64) NOT NULL,
  `dedupe_hash` CHAR(64) NOT NULL,
  `normalized_hash` CHAR(64) NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  KEY `ix_history_normhash_created` (`normalized_hash`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Policy and logging tables

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_policies` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `rule_type` ENUM('blocklist','allowlist') NOT NULL,
  `pattern` VARCHAR(255) NOT NULL,
  `channel_key` VARCHAR(64) NULL,
  `action` ENUM('drop','mask') NOT NULL DEFAULT 'drop',
  `mask_with` VARCHAR(32) NULL,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_events_log` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `level` VARCHAR(16) NOT NULL,
  `event_key` VARCHAR(128) NULL,
  `channel_key` VARCHAR(64) NULL,
  `payload_json` JSON NULL,
  `details_json` JSON NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_discord_logs` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `level` VARCHAR(16) NOT NULL,
  `message` VARCHAR(255) NOT NULL,
  `context_json` JSON NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

```sql
CREATE TABLE IF NOT EXISTS `bf_error_logs` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `level` VARCHAR(16) NOT NULL,
  `message` VARCHAR(255) NOT NULL,
  `context` JSON NULL,
  `file` VARCHAR(255) NULL,
  `line` INT NULL,
  `ip_address` VARCHAR(64) NULL,
  `user_agent` VARCHAR(255) NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Seed hints

Use `discord_seed_v3.sql.md` as a starting point for digest templates and update it as new templates are added. Ensure `bf_discord_subscriptions` rows exist for each `event_key` in `events_matrix.md` and that `bf_discord_channels` contains matching `channel_key` values with pacing defaults.
