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
- **Chat service permissions and env:** `mymi-wallet-chat.service` runs Node.js as a non-www-data user. Releases must keep `o+rX` permissions on the release directory and symlink `shared/chat.env` to `$R/chat/.env`, otherwise systemd fails at step `CHDIR` with Permission Denied and release health checks fail on `chat: FAILED`.
- **Migration runner file resolution:** `scripts/ops/db/run-migrations.php` expects full timestamped filenames (`YYYY-MM-DD-HHMMSS_<Name>`). A fallback glob matcher exists for short class names, but operator packets and automation must pass exact timestamped names for deterministic execution across release versions.
- **Staging and production release smoke tests:** Releases deployed via Composer `--no-dev` omit `vendor/bin/phpunit`. Smoke scripts executing on staging or production must invoke native CLI checks (`sudo -u www-data php spark aiops:form:test --scan-all`) instead of calling PHPUnit test suites.
- **Shared cache permissions on staging:** `FileLocatorCache` under `shared/writable/cache/` is owned by `www-data`. Operator shell users (`timoteo2392`) cannot delete it without `sudo`. Always run `sudo rm -f shared/writable/cache/FileLocatorCache` to prevent permission denial that silently retains stale Spark command lists.
- **CI4 CLI Broken Pipe (SIGPIPE) on piped `grep -q`:** CodeIgniter 4 CLI commands (e.g., `php spark list`) raise an unhandled `ErrorException: fwrite(): Write of ... bytes failed with errno=32 Broken pipe` if stdout is closed prematurely by tools like `grep -q` under `set -eo pipefail`. In automation and smoke scripts, always buffer CLI output into a shell variable or temp file first before inspecting substrings.

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

## Multi-Chain, Gold, Swaps & Reg D Offering Lessons (2026-11)

- **Keyed RPC Endpoint Ordering:** In multi-chain RPC configurations (`CRYPTO_PAY_ETHEREUM_RPC`, `CRYPTO_PAY_BASE_RPC`), always configure authenticated keyed providers first, keeping unauthenticated public nodes strictly as last-resort fallbacks to avoid RPC throttling during payment sweeps.
- **Sub-Millisecond OFAC Sanctions Screening:** Sanctions screening must operate with O(1) in-memory keyed lookups (`array<string, true>`) against local files to guarantee sub-millisecond evaluation (< 0.05 ms) without introducing blocking external HTTP dependencies in critical payment/swap paths.
- **Closed-Loop In-App Utility Credit Invariants:** Utility credits (MyMI Gold) must never expose withdrawal, export, cash-out, or peer-to-peer transfer endpoints. Refunds must return strictly to the original fiat/crypto funding method, and store checkouts must decouple USD base pricing from credit rates.
- **Non-Custodial Swaps Liquidity Gating:** Because testnets lack decentralized exchange liquidity, staging environments must default to quote-only mode (`SWAPS_EXECUTE=false`). MyMI must never take custody of keys or assets; transactions must be signed directly in user self-custody wallets after sanctions verification.
- **Reg D 506(c) Private Placement Offering Gating:** Private placement tokens (MyMI Coin) must enforce fail-closed accredited investor gating (`isVerifiedAndAccredited`) before deposit initiation or ledger minting. Offerings must have zero public purchase buttons, zero secondary exchange listings, and zero guaranteed return claims across all UI views and marketing materials.
- **Spark Command FileLocator Cache Flush:** When registering new Spark commands or migrating modules, a stale `shared/writable/cache/FileLocatorCache` will hide newly created commands from `php spark list`. Always flush this cache file before executing or smoke-testing new CLI commands.

## Operational Invariants & Test State Hardening (2026-11)

- **Migration List Word Splitting (`MIGRATE=`):** In `scripts/ops/deploy/mymi-release.sh`, the runner iterates over `$MIGRATE` using bash whitespace splitting: `for m in ${MIGRATE:-}; do`. Migration lists must be **space-separated**, NOT comma-separated (e.g. `MIGRATE='2026-11-22-000100_A 2026-11-22-000200_B'`). Comma-separated strings are parsed as a single literal filename, causing the release script to halt before any database mutation occurs.
- **Global Auth Singleton Mock Leaks:** Any PHPUnit test suite that mocks global authentication using `Services::injectMock('authentication', $mock)` must explicitly reset the singleton in `tearDown()` using `Services::resetSingle('authentication')`. Failure to do so corrupts subsequent unit tests that rely on legitimate session context or expect 401 unauthenticated responses across other domain test suites.
- **GitHub Actions Codeloader 429 Resilience:** Transient `HTTP/2 429` rate limits from `codeload.github.com` during `composer install` on public CI runners are non-deterministic. Never modify application code to resolve a CDN 429; trigger a workflow rerun (`gh run rerun <id>`) or rebase push.
- **Squash-Merge Commit Ancestry on Staging:** Staging must always run the exact squashed merge commit of `main` (not the pre-merge feature branch), because `mymi-release.sh activate` enforces an exact SHA equality check between staging and candidate production releases.

## CodeIgniter 4.7 Boot-Failure Lessons (2026-11, PRs #791, #811, #814)

- **A Closure 404 override must return a string.** CI 4.7 `display404errors()` echoes the override's return value; returning a `Response` gives "Object of class Response could not be converted to string" and HTTP 500 on every missing page. Return `(string) $response->getBody()` (see `NotFoundOverrideTest`).
- **Use only framework classes that exist in the installed version.** CI 4.7 has the filter `Filters\PageCache`, not `Filters\ResponseCache`; connections have no `isConnected()` (use `simpleQuery('SELECT 1') !== false`). A missing class or method in a filter or health probe fails every request it touches, so check `vendor/codeigniter4/framework` before using one.
- **Never `addRedirect()` a path that is also a GET route.** The Router then redirects to the GET route's handler string (`/\App\...::index`), which clients get as HTTP 400 "disallowed characters". Keep one definition per path.
- **Let HTTP exceptions through `public/index.php`.** Catch `HTTPExceptionInterface` and rethrow before the generic `Throwable` catch, or scanner probes (`*.sql`, `wp-*`) are logged as EMERGENCY boot failures.
- **Header reads:** `getHeaderLine()` throws when a header is sent twice (for example `Cache-Control`); read `headers()` and join repeated values (`OpsJobRegistry::headerMap()`).
- **Every view variable must be passed.** A controller that renders a shared template without its data (`$title`, `$contentHtml`) is an EMERGENCY boot failure; redirect or render a real view instead. A shared partial (for example `stayConnected`) should fall back on its own (`$socialMedia ??= config('SocialMedia')`), because not every caller passes its data.
- **Verify on live, not only in tests.** After a deploy, read the MCP `mymi_status` emergency counts (24 h) and confirm each fixed message is gone before closing the issue. Before giving a production `activate` command, check the live revision and main again, and never glob release names.

## US Regulatory & Multi-Line Compliance Invariants ("Brick A" Standard)

Every AI agent and contributor must honor these federal and state legal constraints before drafting routes, database migrations, controllers, or UI components:

1. **FinCEN / State MTLs (Non-Custodial Invariant):**
   - MyMI Wallet is strictly non-custodial software. Never write code that stores, pools, or transmits user private keys on the server.
   - Non-custodial DEX swaps must construct unsigned transactions for client-side signing in user self-custody wallets.
2. **OFAC Sanctions & SDN Screening:**
   - Any transaction initiation (crypto checkout, non-custodial swap, address import) must evaluate recipient and sender addresses against local OFAC SDN lists using sub-millisecond in-memory lookups (`SanctionsListService`). Blocked transactions must fail closed (`AUTH_FAIL: sanctions_block`).
3. **Closed-Loop Stored Value (MyMI Gold):**
   - Utility credits must strictly satisfy 31 CFR § 1010.100(ff)(4)(iii). Never implement peer-to-peer transfers, secondary market trading, cash-out, or external export of in-app credits.
4. **SEC Reg D 506(c) Accredited Gating (MDIT & MyMI Coin):**
   - Private placement tokens and alternative trust assets must enforce fail-closed accredited investor gating (`isVerifiedAndAccredited`).
   - Zero public buy/invest buttons on unauthenticated or unaccredited pages; zero guaranteed yield/return claims; zero secondary exchange listings.
5. **SEC / FINRA Publisher Exemption (Investment Analytics & AI Copilot):**
   - Analytical models, AI chat insights, and rule engines (Apex, Topstep, Momentum) are educational tools under *Lowe v. SEC*. Every research page and copilot response must display standard disclaimers.
   - UI code must never clamp negative returns or describe funded positions as "risk-free".
6. **Privacy, Consent & GLBA (NPI Protection):**
   - Registration requires versioned consent logging in `bf_user_consent`.
   - Consumer financial records must resolve strictly from active session IDs (fail-closed IDOR).
   - Sensitive financial payloads must never be dumped into log files.
