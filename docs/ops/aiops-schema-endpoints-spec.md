# AIOps Schema & Endpoints Spec (Design Only)

> **Note:** No migrations yet. This is a design spec to implement next.

## Tables

### `bf_aiops_usage`
- **Purpose:** Track LLM usage and costs per call/run.
- **Fields (suggested):**
  - `id` BIGINT PK
  - `date` DATE (or DATETIME)
  - `provider` VARCHAR(32) (openai, local, etc.)
  - `model` VARCHAR(64)
  - `tokens_in` INT
  - `tokens_out` INT
  - `cost_est` DECIMAL(10,4)
  - `subsystem` VARCHAR(64) (marketing, alerts, ops, news, etc.)
  - `request_id` VARCHAR(64) (uuid)
  - `workflow_slug` VARCHAR(128) NULL
  - `user_id` BIGINT NULL (if user-driven)
  - `meta_json` JSON NULL
  - `created_at` DATETIME
- **Indexes:** (`date`), (`subsystem`,`date`), (`request_id` UNIQUE)

### `bf_aiops_budget`
- **Purpose:** Daily budget cap and consumption.
- **Fields:**
  - `id` BIGINT PK
  - `date` DATE UNIQUE
  - `cap_usd` DECIMAL(10,2)
  - `used_usd` DECIMAL(10,2)
  - `hard_stop_percent` TINYINT (default 80)
  - `is_enabled` TINYINT (default 1)
  - `alerted_at_80` DATETIME NULL
  - `created_at` DATETIME
  - `updated_at` DATETIME

### `bf_aiops_workflows`
- **Purpose:** Map n8n workflows to internal policy.
- **Fields:**
  - `id` BIGINT PK
  - `slug` VARCHAR(128) UNIQUE (e.g., `marketing_daily_digest`)
  - `n8n_workflow_id` VARCHAR(64) NULL
  - `enabled` TINYINT DEFAULT 1
  - `subsystem` VARCHAR(64)
  - `description` VARCHAR(255) NULL
  - `created_at` DATETIME
  - `updated_at` DATETIME

### `bf_aiops_cache`
- **Purpose:** Response caching (summary by hash + scope).
- **Fields:**
  - `id` BIGINT PK
  - `cache_key` CHAR(64) UNIQUE (sha256)
  - `scope` VARCHAR(64) (e.g., `summary:marketaux`, `keywords:email`)
  - `source_hash` CHAR(64)
  - `payload_json` JSON
  - `expires_at` DATETIME NULL
  - `created_at` DATETIME

### `bf_aiops_dedupe`
- **Purpose:** Track hashes to avoid reprocessing.
- **Fields:**
  - `id` BIGINT PK
  - `source_type` VARCHAR(32) (email, news, alert)
  - `source_id` BIGINT/VARCHAR (depending)
  - `content_hash` CHAR(64) UNIQUE
  - `first_seen_at` DATETIME
  - `last_seen_at` DATETIME
  - `seen_count` INT DEFAULT 1

## API Endpoints (CI4)

All routes live under `/API/AIOps/*`:

- `GET /API/AIOps/health` → Enabled flags + today’s budget summary.
- `POST /API/AIOps/policy/check` → Main gate (validation, dedupe, cache, budget).
- `POST /API/AIOps/usage/log` → Record usage and update budget.
- `POST /API/AIOps/cache/store` → Persist cache payload with TTL.
- `GET /API/AIOps/cache/get` → Fetch cache by key.
- `POST /API/AIOps/toggle` → Admin-only toggle of AIOps/LLM flags.
- `POST /API/AIOps/test/policy` → Developer harness to exercise the gate without LLM.

## Policy check contract

**Input**
```json
{
  "workflow_slug": "marketing_daily_digest",
  "subsystem": "marketing",
  "source_type": "email",
  "title": "...",
  "content": "...",
  "source_id": "123",
  "cache_scope": "summary:email"
}
```

**Output**
```json
{
  "allowed": true,
  "reason": "OK|DISABLED|HARD_STOP|VALIDATION_FAIL|DEDUPED|CACHE_HIT",
  "request_id": "uuid",
  "content_hash": "sha256",
  "cache_key": "sha256",
  "budget": { "cap": 10.00, "used": 2.15, "percent": 21, "hard_stop_percent": 80 }
}
```

**Rules**
- Requires `aiops_enabled` and `aiops_llm_enabled`.
- Validates title/content (minimum lengths, stripped of tags).
- Computes `content_hash` (sha256 of normalized title/content/source identifiers).
- Dedupe: denies with `DEDUPED` when hash exists (updates `seen_count`/timestamps).
- Cache: denies with `CACHE_HIT` when a valid cache row matches `cache_key` (optionally returns payload).
- Budget: ensures today’s budget row exists; denies with `HARD_STOP` when `used/cap >= hard_stop_percent`.
- Alert: sends email to `team@mymiwallet.com` when usage reaches 80% (once per day).

## Usage log contract

**Input**
```json
{
  "request_id": "uuid",
  "provider": "openai",
  "model": "gpt-4.1-mini",
  "tokens_in": 1200,
  "tokens_out": 240,
  "cost_est": 0.0123,
  "workflow_slug": "marketing_daily_digest",
  "subsystem": "marketing",
  "meta": { "latency_ms": 2310 }
}
```

**Behavior**
- Inserts into `bf_aiops_usage`.
- Updates `bf_aiops_budget.used_usd` for today and returns the updated budget snapshot.

## Cache store/fetch contract

**Store Input**
```json
{
  "cache_key": "sha256",
  "scope": "summary:email",
  "source_hash": "sha256",
  "payload": { "summary": "...", "keywords": ["..."] },
  "ttl_seconds": 86400
}
```

**Fetch**
- `GET /API/AIOps/cache/get?cache_key=...`
- Returns payload when valid and not expired.

## Admin toggle

**Input**
```json
{ "aiops_enabled": 0, "aiops_llm_enabled": 0 }
```

- Protected by admin/permission filter.
- Writes through to SiteSettings override and cache.
