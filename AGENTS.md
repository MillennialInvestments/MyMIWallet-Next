# Repository Agent Instructions

## Repository Context

- **Repository name:** MyMI Wallet
- **Repository key:** `mymiwallet`
- **Primary domain:** `https://www.mymiwallet.com`
- **Application type:** fintech / budgeting / investment workflow platform
- **Framework:** CodeIgniter 4
- **Runtime target:** PHP 8.2 on Teddy's DreamHost VPS stack unless a task states otherwise
- **Centralized AIOps endpoint:** `https://aiops.timothyburks.com`

This repository participates in Teddy's centralized Codex ⇄ AIOps workflow. Codex and AIOps agents should coordinate through repository files without changing runtime application behavior unless the current task explicitly requires it.

## Agent Workflow Rules

1. Codex should complete requested code and documentation tasks when it can do so safely.
2. When work remains, Codex must create or update structured AIOps handoff task files under `docs/_aiops/tasks/`.
3. AIOps consumes queued handoff files from `docs/_aiops/tasks/`, builds repository context, may use Ollama for patch generation or review, and works on its own branch.
4. No agent should auto-merge pull requests or deploy changes.
5. No agent should commit secrets, production credentials, tokens, private keys, or sensitive customer data.
6. No agent should delete working functionality, migrations, routes, controllers, views, models, services, auth flows, dashboard behavior, or frontend layouts without explicit approval.
7. Existing CodeIgniter 4 conventions, project structure, Spark command safety patterns, and documentation conventions must be preserved.
8. Keep changes scoped to the requested task and prefer additive, low-risk updates with clear rollback paths.
9. All pull requests must include:
   - Tests and checks run.
   - Known risks.
   - Rollback notes.
   - AIOps follow-up status, including whether any files were queued in `docs/_aiops/tasks/`.

## CodeIgniter / Web App Expectations

- Application code primarily lives under `app/`.
- Spark commands should follow existing command conventions and safety requirements.
- Database changes must use CodeIgniter migrations and defensive schema guards.
- Do not assume sudo access or production database privileges.
- Do not modify `.env` with real secrets; document required variables instead.
- Operational artifacts and AIOps reports belong under `docs/_aiops/` unless an existing workflow specifies another generated-artifact path.

## Form & Route Certification Guidelines

- **CI4 Route Case-Sensitivity:** Route definitions and route groups in CodeIgniter 4 are case-sensitive. Form and JS actions must match route casing exactly, or provide explicit lowercase aliases in `app/Config/Routes.php`.
- **Absolute Paths in Views:** All `fetch()`, `$.ajax()`, `axios`, and `<form action="...">` paths must use leading slashes (e.g., `/Subscribe/Submit`) or `site_url(...)`. Relative URLs break when rendered on nested subpaths and fail audit checks.
- **HTTP Methods & Verbs:** In CI4.5+, `$request->getMethod()` returns uppercase (`POST`, `GET`). Form actions receiving POST submissions must be registered with `post()` or `match(['GET', 'POST'])`.
- **Browser UI vs. API Token Guards:** Endpoints called by browser UIs (including admin dashboards) must use session/role filters (e.g., `role:admin,team`, `permission:admin.access`, `login`), never token-only filters (`apiToken`, `cronKey`) which reject browser sessions.
- **Form Action Gap Ratchet:** `tests/baseline/form-action-gaps.txt` is an enforced shrink-only ratchet. Never add lines to get tests green; remove lines only as real route fixes land. Verify with `bash tests/smoke/form-certification-smoke.sh`.
- **IDOR Prevention on Mutations:** Any mutation handler (wallets, budgets, investments, projects) must resolve user identity strictly from the active session (`$this->cuID` or `auth()->id()`), never trusting `$request->getPost('user_id')`.

## Environments & Execution Safety

- **Canonical Repo (`/apps/TBI/repos/mymiwallet-next` on `gq-ai01`):** Lacks production DB credentials. Safe for dry-runs and PHPUnit tests. Do not run live submit tests here.
- **Staging Site (`https://staging.mymiwallet.com` on `gq-ai01`):** Deployed via `sudo bash scripts/ops/staging/mymi-staging.sh deploy <ref>`. Safe for live form submissions and destructive tests: run with `sudo -u www-data php -d display_errors=1 spark aiops:form:test --scan-all --submit --allow-destructive --approve`.
- **Production (`/apps/TBI/www/mymiwallet/current`):** Strictly read-only for agents. No direct file edits or unverified migrations.


## Release & Operations Lessons (2026-11)

- **Release path:** `scripts/ops/deploy/mymi-release.sh build main`, then `MIGRATE='<names>' bash mymi-release.sh activate <exact release name>`. Activate refuses a commit that staging is not running; deploy it to staging and pass `mymi-staging.sh form-test` (FAIL 0) first. Never hand someone a placeholder release name.
- **Never run plain `php spark migrate` in production.** `ShieldIdentityBackfill` (2026-10-26-180000) is intentionally unapplied; run only named migrations through `scripts/ops/db/run-migrations.php` (the `MIGRATE=` list).
- **CI4 file-locator cache:** `shared/writable/cache` stores absolute paths into the release that wrote it. After a switch or a prune it breaks spark and web requests. Release and staging scripts clear it on every switch; clear it by hand if you ever move `current` yourself.
- **Disk:** each release is a full copy (~0.5 GB). Releases auto-prune (`KEEP_RELEASES=4`) and builds refuse below `MIN_FREE_GB=3`. AIOps worktrees under `/apps/TBI/worktrees` are preserved until a certified successor closeout; never delete them for space.
- **Storage failures are real:** on 2026-11-16 the HP Smart Array (P244br) dropped its disk, `/` went read-only and MySQL stopped. Signs: `Read-only file system`, `lsblk` shows no `sda`. Do not deploy; recover by reboot (SysRq `b` if needed), then check `tune2fs -l` state, MySQL recovery and site health.
- **Backups:** nightly dump in `/var/backups/mymiwallet/mysql` (08:15 UTC), copied to gq-llm (`172.17.18.2:/srv/backups/mymiwallet/gq-ai01`) by `mymi-db-offsite.timer` (08:45/20:45 UTC) via `scripts/ops/backup/offsite-sync.sh`; `/var/backups/mymiwallet/.offsite-last-ok` records the last good copy. Weekly restore check runs Sundays.
- **Config gotchas:** `config('Auth')` is Shield's config; legacy Myth code reading it needs properties mirrored in `app/Config/Auth.php`. Production `DBPrefix` is empty (`auth_tokens`, not `bf_auth_tokens`). Read config that may not exist null-safely (`config('X')?->y ?? default`).
- **Request bodies:** `App\HTTP\IncomingRequest::getJSON()` returns null for non-JSON bodies, so `getJSON(true) ?: getPost()` is safe. JSON columns (e.g. `bf_projects.promotional_links`) reject empty or plain strings; encode before insert.
- **Diagnosing 500s:** errors that escape CodeIgniter land in `writable/logs/emergency.log` (JSON lines) with the page "System temporarily unavailable."
- **Staging must run the merged commit:** activate compares commit SHAs, not code. After a squash merge, deploy staging at the merge SHA (not the feature branch, even if the code is identical) before building the production release.
- **Migrations and schema checks:** `$db->fieldExists()` caches per connection, so a migration that adds a column and then checks it gets a stale answer ("duplicate column"). Use `getFieldData()` for column checks in migrations and `available()` guards.
- **New spark command not listed locally:** a stale `writable/cache/FileLocatorCache` hides it; delete that file (deploys already clear it).
- **Spark on staging/production:** always `cd /apps/TBI/www/mymiwallet-staging/current` (or `mymiwallet/current`) and run `sudo -u www-data php spark ...`; the repo checkout and other sites lack the command or the database.
- **Service worker:** `public/sw.js` must cache only `/assets/`. Caching signed-in pages or JSON served stale pages after deploys ("buttons do nothing").
- **Money and legal records:** Secure Transfer's investigation record (`bf_secure_transfer_audit`) is add-only and hash-chained; never update or delete rows, and verify with `securetransfer:audit --verify`. SOL fee receipts (`bf_solana_fee_receipts`) are one per transaction signature; reuse only through the service's atomic reclaim, never by editing rows. Test fee flows on staging with devnet (`SOLANA_FEE_RPC`), never mainnet SOL.
- **Operator style:** the owner runs server commands by hand from an iPad. Give one batched, copy-paste block per step, read-only checks first and mutating steps last behind explicit gates (`&&`, `FAIL 0` checks); write scratch output to `~`, not `/tmp`.

## Trading Intelligence, MCP & Options Accounting Lessons (2026-11)

- **Residual Runner Operating Rule:** An economically funded option campaign ($C_{\text{rec}} \ge D_0$) is **never reported as risk-free** in UI, analytics, or LLM responses. While the initial cash debit is recovered, remaining contracts carry opportunity cost and total loss of current market value if expiring worthless.
- **Fail-Closed IDOR Protection:** Any endpoint returning private positions, campaigns, trades, or portfolio balances (`/API/Options/positions`, `/Investments/Trade-Tracker/getTradeData`, etc.) must resolve user identity strictly from the active session (`$this->cuID` or `auth()->id()`), never from client-supplied parameters. Unauthenticated requests must immediately fail closed (`401 Unauthorized` or empty array).
- **Separation of Control Planes (MCPs):** Customer-facing and analytical research MCPs (e.g., `trading_mcp_server.py`) must operate with `SOURCE_MUTATION=false`, strictly read-only tools, and zero shell or mutation access. Administrative tools (`privacy:purge`, `aiops_bridge`) belong exclusively to internal operator control planes (`mymi_aiops_mcp.py`).
- **Data Provenance Metadata Contract:** Every financial MCP response must return explicit provenance: `provider`, `timestamp_utc`, `data_delay_sec`, `is_realtime`, `read_only=true`, and `mutation_allowed=false`.
- **Sub-Second CI4 Framework Bootstrapping in CLI:** In Python-to-PHP MCP bridges or CLI scripts, requiring `tests/_support/bootstrap.php` boots CodeIgniter 4 in < 0.2 seconds without web server dependencies or constant collision warnings.
- **Broker Import Symbology & Amount Disambiguation:** In brokerage CSV exports (e.g. Schwab), `Amount` represents net cash flow, not share or contract quantity. Always resolve `Quantity` for share/contract sizing, and use `OCCSymbolParser` for 21-char OCC symbology (`IREN  261120C00015000`) and human formats.
- **Transaction Signature Hashing:** Non-deduplicating execution hashing must incorporate `order_id` and timestamp alongside ticker/action so repeated fills at the same price are preserved as valid distinct fills.
- **12-Metric Options Campaign Accounting:** Decouple cash recovered ($C_{\text{rec}}$) from open liquidation value ($V_{\text{liq}}$). Recovery percentage evaluates against initial debit outlay ($D_0$), while fee-adjusted net P&L incorporates fees and mark-to-market liquidation value.
- **Silent UI Clamping Audits:** Audit frontend JS for artificial clamps like `Math.max(0, ...)` that erase negative returns, which distort tax, risk, and P&L records.
- **Zero Payload Debug Logging:** Never dump raw financial payloads into `log_message('debug', print_r($trades, true))`. Log only row counts or sanitized IDs.
- **Role Guidelines for AI Workforce:**
  - *Claude:* Architectural reviews, options contract parsing, and metadata contract compliance.
  - *ChatGPT:* Data modeling, 12-metric accounting math, and user journey clarity.
  - *Grok:* Red-team challenges, negative return boundaries, and fill deduplication invariants.
  - *Gemini / Antigravity:* Full-stack CI4 implementation, DataTables re-init guards, and deterministic PHPUnit suites.
