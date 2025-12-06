# MyMI AI Copilot Foundations

This document captures the initial Discord + web foundations for MyMI AI.

## Database schema (apply via raw SQL)

Run these statements directly against MySQL to provision the AI tables and extend the Discord link mapping. They match Teddy's provided DDL.

```sql
ALTER TABLE `bf_discord_links`
    ADD COLUMN `ai_persona`      VARCHAR(64)  NULL AFTER `status`,
    ADD COLUMN `last_seen_at`    DATETIME     NULL AFTER `ai_persona`,
    ADD COLUMN `scopes_json`     JSON         NULL AFTER `last_seen_at`;

CREATE TABLE IF NOT EXISTS `bf_discord_ai_sessions` (
    `id`              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`         INT UNSIGNED NULL,
    `discord_user_id` VARCHAR(64)  NULL,
    `channel_id`      VARCHAR(64)  NULL,
    `session_key`     VARCHAR(64)  NOT NULL,
    `topic`           VARCHAR(255) NULL,
    `context_json`    JSON         NULL,
    `is_active`       TINYINT(1)   NOT NULL DEFAULT 1,
    `created_at`      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_session_key` (`session_key`),
    KEY `idx_user` (`user_id`),
    KEY `idx_discord` (`discord_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bf_discord_ai_messages` (
    `id`            INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    `session_id`    INT UNSIGNED  NOT NULL,
    `role`          ENUM('user','assistant','system','tool') NOT NULL,
    `content`       MEDIUMTEXT    NOT NULL,
    `meta_json`     JSON          NULL,
    `created_at`    DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_session` (`session_id`),
    CONSTRAINT `fk_ai_messages_sessions`
        FOREIGN KEY (`session_id`) REFERENCES `bf_discord_ai_sessions`(`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bf_discord_ai_notes` (
    `id`             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`        INT UNSIGNED NULL,
    `discord_user_id` VARCHAR(64) NULL,
    `title`          VARCHAR(255) NOT NULL,
    `note_type`      VARCHAR(64)  NULL, -- e.g. 'watchlist_idea', 'budget_goal'
    `content`        MEDIUMTEXT   NOT NULL,
    `tags`           VARCHAR(255) NULL,
    `encrypted`      TINYINT(1)   NOT NULL DEFAULT 0,
    `created_at`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_user` (`user_id`),
    KEY `idx_discord` (`discord_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## PHP services

- **`App\Libraries\MyMIAssistant`**
  - Resolves Discord → MyMI identity via `DiscordLinkModel`, enforces scopes from `scopes_json`, and updates `last_seen_at`.
  - Manages sessions/messages/notes in the new `bf_discord_ai_*` tables and stubs the prompt/response call path so the LLM can be swapped in later.
  - Pulls lightweight context (budget summary, open alerts, watchlist) based on allowed scopes.
  - Creates encrypted notes when users ask to "save this note" or when downstream callers request it.
- **`App\Libraries\CryptoHelper`**
  - XChaCha20-Poly1305 helper with versioned design; expects `AI_CRYPTO_KEY` (base64, 32 bytes) in the environment. Keeps the code crypto-agile for future PQC upgrades.

## API endpoints

- **POST `/API/AI/Chat`** – JSON: `{message, session_key?, source?, channel_id?}`. Returns `{reply, session_key, notes?, context}`.
- **GET `/API/AI/Notes`** – Authenticated; returns decrypted notes for the logged-in user (optionally filtered by Discord ID).
- **POST `/API/AI/LinkSettings`** – Authenticated; updates `ai_persona`, `scopes_json`, or unlinks the Discord mapping from the logged-in user.

Routes are registered under the existing `/API` group in `app/Config/Routes.php`.

## Discord + web UX

- **Slash command `/mymi`** now dispatches to `MyMIAssistant` for chat when no subcommand (or `ask`/`chat`) is provided, returning an ephemeral reply. Linking (`/mymi link`) still issues a token.
- **Dashboard widget** (User → Dashboard) exposes a lightweight AI chat panel and a saved-notes column that read from the new tables.
- **Account → Social Media** view now shows AI persona + scope checkboxes and an unlink toggle, wired to `/API/AI/LinkSettings`.

## Security notes

- All sensitive note content can be encrypted at rest via `CryptoHelper`; the stored payload tracks `ciphertext`, `nonce`, and `version` for future key rotation/PQC swaps.
- Discord interactions continue to enforce signature validation. API endpoints expect session auth + CSRF where applicable.

## Operations checklist

1. Apply the SQL above in production (raw statements; no migration file yet).
2. Provision `AI_CRYPTO_KEY` (base64-encoded 32-byte key) in the environment/secret store.
3. Register a Discord channel/subscription for `event_key = 'ai.chat'` if broadcasting AI responses to Discord channels is desired.
4. Re-register slash commands so `/mymi` includes the new chat behavior.
