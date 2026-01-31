# AI Ops Control Plane

## What is the AI Ops Control Plane?
The AI Ops Control Plane provides centralized governance for all AI-driven workflows inside MyMI Wallet. It tracks capacity, enforces safety caps, records run history, and exposes APIs/management UI for day-to-day control. It is designed to work for both self-hosted LLM stacks (Ollama, n8n) and hosted providers.

## Integration with MyMI Wallet
- **CodeIgniter 4 services** expose APIs under `/API/AiOps/*` and a management dashboard under `Management/AiOps`.
- **Gap Tracker Sync** (spark command `gap:sync`) reads `docs/gap_tracker/gap_tracker.csv`, enriches missing fields, and reports to `docs/gap_tracker/reports`.
- **n8n webhooks** are used to trigger long-running or external workflows while logging to `bf_ai_ops_runs` and rollups in `bf_ai_ops_usage`.
- **Config overrides** can be stored in `bf_site_settings_overrides`, letting admins toggle features without redeploys.

## Webhook and Chat Endpoints
- **n8n Base URL:** `https://aiops.mymiwallet.com` (proxied to port `8500` on the VPS).
- **AI Ops Chat UI:** `https://chat.mymiwallet.com` (proxied to port `8300`).
- **Main app:** continue serving on port `9010` via the standard `mymiwallet.com` proxy.

## Master Kill-Switch Behavior
- `aiOpsEnabled` in `app/Config/SiteSettings.php` is the master kill-switch. When `false`, no AI Ops workflows should start.
- `aiOpsAllowOverride` permits administrators to exceed capacity caps for critical jobs (still logged).
- Subsystem toggles (e.g., `aiSelfHostedEnabled`, `aiGapTrackerSyncEnabled`) gate specific workflows even when the master switch is on.

## Where Usage/Capacity is Shown
- **Dashboard:** `Management/AiOps` renders caps, usage, and recent events with progress indicators.
- **API:** `GET /API/AiOps/status` returns toggles, current-month caps, usage rollups, recent runs, and events.
- **Reports:** Gap Sync writes markdown reports under `docs/gap_tracker/reports/` for operational traceability.

Test change for PR factory.
