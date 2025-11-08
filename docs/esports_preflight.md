# NexusArena Esports Preflight Discovery

## Reusable Services & Libraries
- `app/Libraries/MyMIGold.php` (`MyMIGold`) – handles account balances and transfers for MyMIGold tokens.
- `app/Libraries/MyMISolana.php` (`MyMISolana`) – Solana RPC + swap helper implementing `CryptoCurrencyInterface`.
- `app/Services/SolanaService.php` (`SolanaService`) – shared Solana RPC service used by wallet adapters.
- `app/Libraries/MyMIRaydium.php` (`MyMIRaydium`) – Raydium DEX swap wrapper.
- `app/Libraries/MyMISolflare.php` / `app/Libraries/MyMIPhantom.php` – wallet connectors that already invoke Solana escrow/swap logic.
- `app/Libraries/MyMIExchange.php` (`MyMIExchange`) – chain-agnostic swap facade delegating to Solana/Raydium adapters.
- `app/Libraries/MyMIDexScreener.php` – DEX market data client (existing rate-limits/cache pattern).
- `app/Libraries/MyMILogger.php` – writes to `bf_error_logs`; aligns with current logging handler expectations.
- `app/Libraries/MyMIAlerts.php`, `app/Libraries/MyMIMarketing.php` – webhook + queue style patterns we can mirror for idempotent ingestion.
- `app/Libraries/Abuse/RateLimiter.php` – demonstrates DB-backed throttling for API endpoints.

## Existing Controller & Route Patterns
- API controllers live under `App\Modules\APIs\Controllers\*` (e.g. `ManagementController`, `AlertsController`, `SearchController`). They extend the shared `BaseController` and use `ResponseTrait`.
- Primary API route group defined in `app/Config/Routes.php` as `$routes->group('API', ['namespace' => 'App\Modules\APIs\Controllers'], ...)`. Nested groups already include `/API/Esports` (added last iteration) and `/API/Management`.
- Avoid collisions with existing groups like `/API/Management`, `/API/Health`, `/API/Ops`, and `/API/Esports` (current scaffold). Reuse the existing `/API/Esports` namespace rather than registering new top-level routes.

## Database Helpers & Migration Style
- Numerous models and services query `bf_*` tables via `$this->db->table(...)` (e.g., `app/Libraries/MyMILogger.php`, `app/Libraries/Privacy/DataExportService.php`). Follow this Query Builder style inside `EsportsModel`.
- Migrations (e.g., `app/Database/Migrations/2025-09-10-000000_CreateEsportsTables.php`, `2025-09-02-000050_AntiAbuse.php`) use `$this->forge->addField()` with explicit indexes/foreign keys. New tables should follow the same Forge-based pattern.
- No existing `bf_esports_%` tables detected locally; MySQL CLI unavailable in container (`mysql` command missing), so schema drift must be checked manually before deployment.

## Logging, Alerting, and Webhook Patterns
- `log_message()` is used extensively for structured logs that feed `bf_error_logs` via `MyMILogger` and the configured handler.
- Webhook-style controllers (e.g., `app/Modules/APIs/Controllers/Webhooks/ZapierController.php`, `TradingViewController.php`) store payloads, perform signature checks, and enqueue follow-up work—useful templates for esports webhooks/jobs.
- CRON/queue flows handled through `ManagementController::runCRONTasks()` and marketing libraries illustrate rate-limited batching suitable for esports job processors.

## Namespace Alignment Recommendations
- Controllers: `App\Modules\APIs\Controllers\EsportsController` (existing) for HTTP entrypoints.
- Models: `App\Models\EsportsModel` (existing service binding via `Config\Services::esportsModel`).
- Libraries: `App\Libraries\MyMIEsports` plus adapters like `App\Libraries\MyMIEsportsStartGG`.
- Migrations: `App\Database\Migrations\*` following the `YYYY-MM-DD-HHMMSS_Description` naming convention.

## Route Collision Watchlist
- `/API/Esports/*` routes already reserved in `app/Config/Routes.php` (lines ~161-169). Extend within this group rather than creating duplicates.
- Ensure any new CRON/worker endpoints reuse the `/API/Esports` group with distinct method names (e.g., `/API/Esports/cronProcessJobs`) to avoid overlaps with `Management` CRON routes.

## Tooling & Environment Notes
- MySQL CLI not available in this container (`mysql` command missing). Schema verification must rely on migrations and manual inspection until database connectivity is configured.
- Large helper indices (e.g., `app/Libraries/test.txt`) contain legacy patterns; prefer referencing the curated controllers/libraries above for modern conventions.
- Esports job workers respect `ESPORTS_JOB_MAX_ATTEMPTS` and `ESPORTS_JOB_RETRY_BASE_SEC` to pace retries; defaults are tuned for DreamHost cron throughput.