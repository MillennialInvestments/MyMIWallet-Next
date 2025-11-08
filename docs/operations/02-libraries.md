# Libraries & Services

## Overview
Audits the custom library layer that powers wallets, budgeting, investments, marketing automation, and external integrations used across modules.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| MyMIWallets | ⚙️ Needs Review | Add null-safe guards and unit coverage for wallet aggregation helpers. | 🟠 High | Directly instantiates models/services and assumes MyMI trait helpers exist, risking fatal errors when traits fail. |
| MyMIBudget | ⚙️ Needs Review | Extract budgeting calculations into tested service with caching and numeric clamps. | 🟠 High | Heavy controller-style logic in library with repeated DB hits and minimal exception handling. |
| MyMIInvestments | ⚙️ Needs Review | Implement API rate-limit telemetry and dependency injection for investment services. | 🟠 High | Alpha Vantage access rotates keys but relies on global helpers and undefined cache sanitizers. |
| MyMIProjects | ⚙️ Needs Review | Harden inbox parsing and exchange adapter wiring; add retry limits. | 🟡 Medium | Email ingestion promotes leads but assumes `MyMIExchangeAdapter` availability and logs only on failure. |
| MyMIExchange | ❌ Broken/Unknown | Define `$this->db` and inject Solana/Gemini connectors; replace direct service calls with typed adapters. | 🔴 Critical | Methods reference `$this->db` and service locators that are never initialized, causing runtime errors. |
| MyMISolana | ⚙️ Needs Review | Centralize RPC endpoint health checks and secure metadata POST calls. | 🟡 Medium | RPC list assembled from env but metadata uploader hits Metaplex without error throttling. |
| MyMIAlphaVantage | ⚙️ Needs Review | Persist rotation state and expose telemetry on exhausted key pools. | 🟡 Medium | Rotates API keys yet silently returns null when pool empty; requires monitoring. |
| MyMIAnalytics | ⚙️ Needs Review | Break giant reporting method into query objects and add caching for totals. | 🟠 High | Single method composes dozens of queries without pagination or try/catch, making dashboards fragile. |
| MyMIMarketing | ⚙️ Needs Review | Gate summarization recursion depth and document NLP fallbacks per campaign. | 🟡 Medium | `summarizeContent` retries recursively and only logs when loops exceed depth. |
| MyMIAlerts | ⚙️ Needs Review | Replace placeholder webhooks with env-driven config and standardize history writes. | 🟠 High | Discord/Zapier hooks are literal placeholders and update cycle depends on debug logging toggles. |
| MyMIAdvisor | ⚙️ Needs Review | Ensure MyMIMomentum dependency loaded and throttle advisor generation jobs. | 🟡 Medium | Advisor pipeline writes to `bf_investment_advisor_log` but only guards on 15-minute window. |
| MyMIAssets | ❌ Broken/Unknown | Register BitcoinJS dependency properly and validate DigiByte core availability. | 🔴 Critical | Library references `BitcoinJS` helper without import and assumes DigiByte daemon present. |
| MyMICoin | ⚙️ Needs Review | Normalize user lookups and guard float math on empty balances. | 🟡 Medium | Coin totals rely on session auth and mix string/float conversions without validation. |
| MyMIGold | ❌ Broken/Unknown | Fix undefined `$orderInformation` usage and align with gold token supply tracking. | 🔴 Critical | `getOrderInformation` references undefined variables and many getters rely on global helpers. |
| MyMIUser | ⚙️ Needs Review | Split monolithic account hydration and avoid recursive service calls to itself. | 🟠 High | Library constructs multiple heavy models and calls `service('MyMIUser')` internally, risking recursion. |

## Findings (Evidence)
- `MyMIWallets` directly instantiates dependent libraries/models and assumes controller traits for service access, leaving no fallbacks when BaseLoader helpers are missing.【F:app/Libraries/MyMIWallets.php†L24-L188】
- `MyMIBudget` contains extensive budgeting math and repeated DB calls without guards, indicating need for extraction and caching.【F:app/Libraries/MyMIBudget.php†L27-L198】
- `MyMIInvestments` rotates Alpha Vantage calls but depends on helper `sanitizeCacheKey` and raw service lookups, risking undefined function errors.【F:app/Libraries/MyMIInvestments.php†L82-L199】
- `MyMIExchange` references `$this->db` and connector services that are never defined, so trading helpers will fatal at runtime.【F:app/Libraries/MyMIExchange.php†L56-L169】
- `MyMISolana` builds RPC endpoint lists and issues metadata POSTs without timeouts beyond curl defaults, making automation brittle.【F:app/Libraries/MyMISolana.php†L45-L179】
- `MyMIAlphaVantage` rotates API keys but silently returns null when pool exhausted, requiring monitoring to catch gaps.【F:app/Libraries/MyMIAlphaVantage.php†L20-L127】
- `MyMIAlerts` still ships placeholder Discord/Zapier hooks and logs, so production alerts depend on manual substitution.【F:app/Libraries/MyMIAlerts.php†L1606-L1746】
- `MyMIAssets` assumes a `BitcoinJS` helper exists and will throw if DigiByte Core is absent or not configured.【F:app/Libraries/MyMIAssets.php†L16-L103】
- `MyMIGold` accesses undefined `$orderInformation` and mixes helper/global state for token balances.【F:app/Libraries/MyMIGold.php†L108-L189】
- `MyMIUser` orchestrates numerous services, including self-service lookups, and writes session state, making it hard to test.【F:app/Libraries/MyMIUser.php†L34-L200】

## Required Fixes / Tasks
- [ ] Create a service registry and PHPStan baseline to validate constructor dependencies across `App\Libraries\*` (owner: Codex).
- [ ] Implement integration smoke tests for Exchange/Assets libraries to ensure connectors and DigiByte tooling are available (owner: Codex).
- [ ] Rotate and document Alpha Vantage + webhook secrets following [alphavantage-rotation-playbook.md](../ops/runbooks/alphavantage-rotation-playbook.md) (owner: Teddy/manual).

## Links & References
- `app/Libraries/MyMIWallets.php`, `MyMIBudget.php`, `MyMIInvestments.php`, `MyMIProjects.php`
- `app/Libraries/MyMIExchange.php`, `MyMISolana.php`, `MyMIAlphaVantage.php`, `MyMIAnalytics.php`
- `app/Libraries/MyMIMarketing.php`, `MyMIAlerts.php`, `MyMIAdvisor.php`, `MyMIAssets.php`
- `app/Libraries/MyMICoin.php`, `MyMIGold.php`, `MyMIUser.php`
