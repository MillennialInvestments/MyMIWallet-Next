# AI Ops Control Plane

## Overview
The AI Ops Control Plane governs all AI-driven workflows inside MyMI Wallet. It enforces safety contracts, validates Spark command health, and produces machine-readable artifacts that can be consumed by CI/CD pipelines and dashboards.

## Core AIOps Spark Commands

| Command | Purpose | Classification | Key Flags |
| --- | --- | --- | --- |
| `aiops:copilot:validate` | Validate `.github/copilot-instructions.md` sections and Spark command safety rules. | Read-only | `--json`, `--notify`, `--db` |
| `spark:doctor` | Read-only system health inspector for Spark commands and cache permissions. | Read-only | `--json`, `--notify`, `--db` |
| `spark:fix` | Safe auto-heal for command metadata, cache directories, and autoload cache. **Dry-run by default.** | Requires approval | `--dry-run`, `--approve`, `--json`, `--notify`, `--db` |
| `aiops:command-index` | Classify Spark commands and generate governance index. | Read-only | `--json`, `--notify`, `--db` |

## Safety & Approval Rules
- Destructive actions are blocked unless `--approve` is provided.
- `spark:fix` defaults to dry-run and will not modify files without explicit approval.
- JSON output is available via `--json` and can be redirected to artifacts for CI.

## Machine-Readable Outputs
- `aiops:command-index` writes:
  - `docs/aiops/command-index.json`
  - `docs/aiops/command-index.csv`
- CI pipelines capture:
  - `copilot-validation.json`
  - `doctor.json`

## Notification Hooks
All AIOps commands support `--notify`, which sends alerts via Discord (when `DISCORD_ALERT_WEBHOOK` is configured) or falls back to email recipients from `AIOPS_ALERT_EMAIL` or `Config\Email::$recipients`.

## CI Enforcement
AIOps guardrails are enforced in GitHub Actions by running:
- `php spark aiops:copilot:validate --json > copilot-validation.json`
- `php spark spark:doctor --json > doctor.json`

The workflow fails if either command exits non-zero. Artifacts are uploaded for dashboards and future ingestion.

## Existing Integration Points
- **CodeIgniter 4 services** expose APIs under `/API/AiOps/*` and a management dashboard under `Management/AiOps`.
- **Gap Tracker Sync** (`spark gap:sync`) reads `docs/gap_tracker/gap_tracker.csv` and reports to `docs/gap_tracker/reports`.
- **n8n webhooks** trigger long-running workflows while logging to `bf_ai_ops_runs` and rollups in `bf_ai_ops_usage`.
- **Config overrides** are stored in `bf_site_settings_overrides`, letting admins toggle features without redeploys.

## Webhook and Chat Endpoints
- **n8n Base URL:** `https://aiops.mymiwallet.com` (proxied to port `8500` on the VPS).
- **AI Ops Chat UI:** `https://chat.mymiwallet.com` (proxied to port `8300`).
- **Main app:** continues serving on port `9010` via the standard `mymiwallet.com` proxy.

## Master Kill-Switch Behavior
- `aiOpsEnabled` in `app/Config/SiteSettings.php` is the master kill-switch. When `false`, no AI Ops workflows should start.
- `aiOpsAllowOverride` permits administrators to exceed capacity caps for critical jobs (still logged).
- Subsystem toggles (e.g., `aiSelfHostedEnabled`, `aiGapTrackerSyncEnabled`) gate specific workflows even when the master switch is on.

## Where Usage/Capacity is Shown
- **Dashboard:** `Management/AiOps` renders caps, usage, and recent events with progress indicators.
- **API:** `GET /API/AiOps/status` returns toggles, current-month caps, usage rollups, recent runs, and events.
- **Reports:** Gap Sync writes markdown reports under `docs/gap_tracker/reports/` for operational traceability.
