# Gap Report — MyMI Wallet (CI4)

## A) Executive Summary
- Doc requirements identified: **10**
- Implemented: **4**
- Incomplete: **2**
- Gaps: **4**
- Top priority gaps (P0/P1):
  1. **GAP-BUDGET-001** — Initial bank balance logic ignores transactions/as-of filters. 【F:docs/budgeting/architecture.md†L14-L41】【F:app/Models/BudgetModel.php†L420-L454】
  2. **GAP-PREDICTIONS-001** — Predictions migrations absent; schema from docs not provisioned. 【F:docs/predictions/README.md†L19-L33】
  3. **GAP-PREDICTIONS-002** — User routes point to missing `App\Modules\Predictions\Controllers` namespace, making UI unreachable. 【F:app/Config/Routes.php†L1340-L1348】
  4. **GAP-SEARCH-001** — `/API/Investments/searchTickers` method exists but no route is registered while auto-routing is disabled. 【F:docs/search/README.md†L5-L18】【F:app/Modules/APIs/Controllers/InvestmentsController.php†L214-L325】
  5. **GAP-WALLETS-001** — `/API/Wallets/summary` JSON endpoint and cache pre-warm CLI promised but not implemented. 【F:docs/wallets/wallets-index.md†L48-L106】【F:app/Config/Routes.php†L24-L36】
  6. **GAP-SECURITY-001** — Security remediation requires npm/Vite-only assets; legacy `public/assets/js` and `public/assets/vendor` remain. 【F:docs/security/2025-10-remediation.md†L4-L13】
  7. **GAP-DEVOPS-001** — Hardening playbook calls for `/system/healthz` + `/system/diag` endpoints; only ad-hoc `healthz` root route exists. 【F:docs/hardening-playbook.md†L35-L71】【F:app/Config/Routes.php†L15-L38】
  8. **GAP-CRON-001** — Cron/idempotency guardrails outlined but no manifest or telemetry hooks in code. 【F:docs/operations/04-cron-automation.md†L1-L33】
  9. **GAP-PREDICTIONS-003** — API stubs for liquidity and order cancellation return TODO responses. 【F:docs/predictions/README.md†L65-L94】【F:app/Modules/APIs/Controllers/PredictionsController.php†L31-L89】
  10. **GAP-SEARCH-002** — Site-wide search expansion noted as future work; no scaffolding present. 【F:docs/search/README.md†L18-L22】

## B) Doc Requirements Inventory
| Module | Requirement | Doc Source |
| --- | --- | --- |
| Wallets | Auth-guarded `/Wallets`, 60s budget cache, Solana fallback, future `/API/Wallets/summary`, cache pre-warm CLI. | 【F:docs/wallets/wallets-index.md†L5-L106】 |
| Budgeting | Initial bank balance = opening + posted transactions by `asOf`; controller/service/view split; debug API. | 【F:docs/budgeting/architecture.md†L14-L41】 |
| Search | `/API/Investments/searchTickers` with limit clamp, local-first + AlphaVantage fallback; navbar flow to `/Search` and `/Investments/Symbol/{symbol}`. | 【F:docs/search/README.md†L5-L18】 |
| Predictions | Config toggles, migrations for markets/options/orders/trades/positions/liquidity/settlements/payouts; REST + cron for locks/payouts. | 【F:docs/predictions/README.md†L19-L94】 |
| Alerts/Marketing | Email/TradingView ingestion → `bf_marketing_temp_scraper`/`bf_investment_trade_alerts`; news promotion; marketing generation hooks. | 【F:docs/alerts/alerts_marketing_pipline.md†L5-L33】 |
| Security | Remove vendored JS; npm/Vite builds; Argon2/PBKDF2 upgrades. | 【F:docs/security/2025-10-remediation.md†L4-L13】 |
| Hardening/DevOps | Add `/system/healthz` + `/system/diag`, standards configs, `/API/Management/*` stubs. | 【F:docs/hardening-playbook.md†L35-L71】 |
| Cron/Automation | Idempotent cron flows for alerts, marketing digest, AlphaVantage, Discord/Zapier distribution. | 【F:docs/operations/04-cron-automation.md†L1-L33】 |

## C) Code Capabilities Inventory
| Module | Evidence | Notes |
| --- | --- | --- |
| Wallets | Budget cache with 60s TTL, Solana fallback, account collections, financial summary assembly. | 【F:app/Modules/User/Controllers/WalletsController.php†L322-L520】【F:app/Modules/User/Controllers/WalletsController.php†L655-L711】 |
| Budgeting | `BudgetModel::getInitialBankBalance` sums account balances but ignores transactions/as-of; controller uses service. | 【F:app/Models/BudgetModel.php†L420-L454】【F:app/Modules/User/Controllers/BudgetController.php†L250-L268】 |
| Search | `InvestmentsController::searchTickers` implements limit clamp, local-first + AlphaVantage fallback with caching. | 【F:app/Modules/APIs/Controllers/InvestmentsController.php†L214-L325】 |
| Predictions | Library orchestrates markets/orders; API controller exposes list/create/settle plus cron helpers; config present. | 【F:app/Libraries/MyMIPredictions.php†L38-L120】【F:app/Modules/APIs/Controllers/PredictionsController.php†L13-L106】【F:app/Config/Predictions.php†L1-L18】 |
| Alerts/Marketing | Extensive API routes for alert ingestion, market data enrichment, marketing generation, and distribution. | 【F:app/Config/Routes.php†L200-L284】【F:app/Config/Routes.php†L294-L347】 |
| Infrastructure | Root `healthz` route exists; auto-routing disabled; numerous public/user route groups defined. | 【F:app/Config/Routes.php†L15-L38】【F:app/Config/Routes.php†L1200-L1271】 |

## D) Module-by-Module Gap List

### Wallets
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| Expose `/API/Wallets/summary` + cache pre-warm CLI for dashboard JSON hydration. | 【F:docs/wallets/wallets-index.md†L48-L106】 | No API route or CLI command defined while auto-route is disabled. 【F:app/Config/Routes.php†L24-L36】 | 🔴 Gap | P1 | Add controller method + route and nightly cache warmer. |

### Budgeting
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| Initial bank balance must sum opening balance + posted transactions ≤ `asOf`. | 【F:docs/budgeting/architecture.md†L14-L41】 | Model only sums stored balances; no transaction join or date filter. 【F:app/Models/BudgetModel.php†L420-L454】 | 🔴 Gap | P0 | Implement transaction sums, status filters, and `asOf` parameter. |

### Search
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| `/API/Investments/searchTickers` reachable for navbar autocomplete. | 【F:docs/search/README.md†L5-L18】 | Controller method exists but no route registered with auto-routing disabled; SearchController relies on it. 【F:app/Modules/APIs/Controllers/InvestmentsController.php†L214-L325】【F:app/Modules/User/Controllers/SearchController.php†L63-L76】 | 🟡 Incomplete | P1 | Add GET route under `API/Investments/searchTickers`. |
| Expand search to site-wide content alongside tickers. | 【F:docs/search/README.md†L18-L22】 | No supporting endpoints or UI hooks beyond ticker search. | 🔴 Gap | P2 | Define schema + controller for multi-entity search. |

### Predictions
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| Provision predictions schema via migrations. | 【F:docs/predictions/README.md†L19-L33】 | No `CreatePredictions*` migrations in `app/Database/Migrations`. | 🔴 Gap | P1 | Add migrations for markets/options/orders/trades/positions/liquidity/settlements/payouts. |
| Wire UI routes to Predictions controller. | 【F:docs/predictions/README.md†L65-L94】 | Routes point to `App\Modules\Predictions\Controllers` namespace that does not exist; actual controller lives under `App\Modules\User\Controllers`. 【F:app/Config/Routes.php†L1340-L1348】【F:app/Modules/User/Controllers/PredictionsController.php†L1-L58】 | 🔴 Gap | P1 | Update route namespace or relocate controller. |
| Complete liquidity/order cancellation APIs. | 【F:docs/predictions/README.md†L65-L94】 | `addLiquidity` and `removeLiquidity` return TODO; cancel returns placeholder. 【F:app/Modules/APIs/Controllers/PredictionsController.php†L55-L89】 | 🟡 Incomplete | P2 | Implement logic and validation. |

### Alerts & Marketing
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| Alert ingestion → marketing promotion pipeline across tables. | 【F:docs/alerts/alerts_marketing_pipline.md†L5-L33】 | API routes for email ingestion, market data enrichment, marketing generation/distribution are present. 【F:app/Config/Routes.php†L200-L284】【F:app/Config/Routes.php†L294-L347】 | ✅ Implemented | P1 | Validate data quality and idempotency per cron doc. |

### Security & DevOps
| Requirement | Doc Source | Evidence | Status | Priority | Notes |
| --- | --- | --- | --- | --- | --- |
| Enforce npm/Vite builds and remove vendored JS. | 【F:docs/security/2025-10-remediation.md†L4-L13】 | Legacy `public/assets/js` and `public/assets/vendor` remain. | 🔴 Gap | P1 | Migrate to bundled assets; purge vendored files. |
| Add `/system/healthz` + `/system/diag` endpoints and standards configs. | 【F:docs/hardening-playbook.md†L35-L71】 | Only root `healthz` route exists; no `/system/*` endpoints. 【F:app/Config/Routes.php†L15-L38】 | 🔴 Gap | P1 | Add system health/diag controllers and routes. |
| Cron idempotency & manifest for alerts/marketing/news pipelines. | 【F:docs/operations/04-cron-automation.md†L1-L33】 | No consolidated cron manifest or idempotency tokens observed. | 🔴 Gap | P1 | Generate manifest, add idempotent checkpoints and telemetry. |

## E) Broken/Orphaned Route + Method Findings
- `Predictions` user routes target `App\Modules\Predictions\Controllers` but only `App\Modules\User\Controllers\PredictionsController` exists, making `/Predictions/*` unreachable. 【F:app/Config/Routes.php†L1340-L1348】【F:app/Modules/User/Controllers/PredictionsController.php†L1-L58】
- `/API/Investments/searchTickers` has a controller method but no registered route with auto-routing disabled, breaking navbar search API calls. 【F:app/Modules/APIs/Controllers/InvestmentsController.php†L214-L325】【F:app/Config/Routes.php†L24-L36】

## F) External Integrations Readiness
| Integration | Docs Expectation | Code Evidence | Missing Steps |
| --- | --- | --- | --- |
| AlphaVantage (news/alerts) | Enrich alerts/news and rotate keys for cron. | Management routes to fetch news and update market data. 【F:app/Config/Routes.php†L218-L284】 | Add key rotation telemetry; manifest for cron cadence. |
| Discord (alerts/marketing) | Queue and distribute alerts/news. | Discord API routes for queue/process/broadcast. 【F:app/Config/Routes.php†L200-L210】【F:app/Config/Routes.php†L330-L347】 | Rate-limit handling and delivery telemetry not documented. |
| Solana (wallet) | Snapshot + network fallback for `/Wallets`. | WalletsController pulls Solana data with fallback to `SolanaService`. 【F:app/Modules/User/Controllers/WalletsController.php†L408-L458】 | No JSON endpoint for wallet summary; health badge future work. |
| Zapier (marketing) | Manual distribution from Management cron. | Route `sendToZapierManually` exists. 【F:app/Config/Routes.php†L218-L284】 | Response handling/monitoring not implemented. |

## G) Top 25 Next Tasks (Gap IDs)
1. GAP-BUDGET-001 — Implement transaction-aware initial balance with `asOf` filter.
2. GAP-PREDICTIONS-001 — Add migrations for predictions schema.
3. GAP-PREDICTIONS-002 — Fix Predictions route namespace or relocate controller.
4. GAP-SEARCH-001 — Register `/API/Investments/searchTickers` route.
5. GAP-WALLETS-001 — Ship `/API/Wallets/summary` + cache pre-warm CLI.
6. GAP-SECURITY-001 — Remove vendored JS; enforce npm/Vite pipeline.
7. GAP-DEVOPS-001 — Add `/system/healthz` and `/system/diag` endpoints.
8. GAP-CRON-001 — Publish cron manifest and add idempotency/telemetry.
9. GAP-PREDICTIONS-003 — Implement liquidity and cancel order APIs.
10. GAP-SEARCH-002 — Define site-wide search schema and controller.

