# MyMI Wallet GTM: human gate register (2026-11-15)

How the remaining GTM work is split:

- **Agent work.** Code, tests, docs and PRs. Claude prepares these for
  review without asking. Per `AGENTS.md`, agents never auto-merge or deploy:
  a PR is merged only when Tim asks for it in the thread, and only Tim deploys.
- **Human gate.** Anything that changes production, touches secrets or
  customer data, needs an outside account, or is a legal or business call.
  Each gate below names one owner and one concrete ask. Nothing behind a gate
  happens until that owner says so in the thread.

Status of the 70 tasks in `tasks.csv`: 9 done, 9 in review, 13 in
progress, 39 proposed (after this change).

## Open gates

| # | Gate | Owner | Tasks | The ask |
| --- | --- | --- | --- | --- |
| G1 | Deploy the current main | Tim | 069 | Run the deploy block in the thread, then paste the health output |
| G2 | Options webhook secret | Tim | 027 | Check whether `OPTIONS_WEBHOOK_SECRET` is set in `shared/.env` (the check prints set or unset only). If TradingView alerts are used, set a new random value there and in each TradingView alert |
| G3 | Browser journey check | Tim | 016-019, 036 | Hard-refresh `/Dashboard` (no overlay, no console 403/404), then sign up, activate and reset with `healthcheck+signup1@mymiwallet.com` and confirm the emails are branded |
| G4 | Approve ADR 0002 (keep legacy login, not Shield) | Teddy | 013, 015 | Approve or reject. Approval closes 015 as "not needed" |
| G5 | Launch scope | Tim | 021, 038, 046-053, 065, 066 | DECIDED 2026-11-16: everything ships. All domains get certified; see G9 for the sandboxes this needs |
| G6 | Plaintext private keys (3 accounts) | Tim + Teddy | 045, 047, 048 | Keys encrypted in place by #716. Still open: notify the 3 users |
| G7 | Duplicate-email accounts (4 groups) | Tim | 059 | Choose per group: merge, disable the extra, or leave |
| G8 | Legal and financial compliance | Teddy / counsel | 057, 051 | Sign off Terms, Privacy Policy, investment and tax disclaimers |
| G9 | Provider sandboxes | Tim | 021, 035, 038, 046-048, 053 | Every provider in the launch-scope table below needs sandbox or test keys in the staging env file (never in chat). Required now that scope is everything |
| G10 | Staging | Tim + Teddy | 068 | Staging built 2026-11-15 (staging.mymiwallet.com, runbook `docs/_aiops/staging/STAGING-001-runbook.md`). Still open: certify a release candidate there before each prod release |
| G11 | Restore drill | Tim | 060 | Run the restore-check once by hand and paste the RESULT line |
| G12 | Postmark approval and DMARC | Tim | 017, 018 | Postmark account approval, one bounce-webhook test send, and the 2026-12-05 DMARC move to `p=quarantine` |
| G14 | Money switches | Tim (separate approval per switch) | 035, 043, 046, 047, 049 | Each switch below stays OFF in prod until Tim approves that one switch by name in the thread, after its domain is certified on staging |
| G13 | Load test window | Tim | 067 | Pick a low-traffic window for a short load test against prod, or skip until staging exists |

## Launch scope: everything (decided by Tim 2026-11-16)

Every product domain ships, so none can be hidden behind a flag instead of
being certified. **Money switches stay off** (G14): certification happens on
staging with sandbox keys, and each switch goes on in prod only with its own
separate approval from Tim.

| Domain | Tasks | Agent work before launch | Human gate before launch | Money switch (stays OFF) |
| --- | --- | --- | --- | --- |
| Wallet ledger and CRUD | 032, 033 | Ledger invariant tests, owner-only CRUD tests | none | `FEATURE_WALLETS` |
| Transactions and imports | 034 | Import parser tests, duplicate-import guard; trade import UI is still to build | none | none |
| Payments, webhooks, reconciliation | 035 | Idempotency tests for every webhook, reconciliation report | G9: PayPal REST sandbox (`PAYPAL_REST_CLIENT_ID`/`SECRET`, `PAYPAL_REST_MODE=sandbox`) | `FEATURE_MYMIGOLD_PURCHASES`, `FEATURE_MEMBERSHIP_PURCHASES` |
| Dashboard and onboarding | 036 | Journey test on staging | G3 browser check | none |
| Budget, debt, credit | 037 | CRUD and math tests | none | none |
| Bank aggregation (Plaid) | 038 | Link, exchange, refresh, webhook tests against sandbox | G9: `PLAID_CLIENT_ID`, `PLAID_SANDBOX_SECRET`, `PLAID_ENVIRONMENT=sandbox`, redirect URI | none |
| Brokers and social connectors | 021 | Link and unlink tests | G9: SnapTrade (`SNAPTRADE_CLIENT_ID`/`API_KEY`), Robinhood (`ROBINHOOD_API_KEY`, seed), Tradovate (`TRADOVATE_CLIENT_ID`/`SECRET`), Alpaca (`ALPACA_API_KEY`) | none |
| Investments, watchlists, trade tracking | 039, 040 | Strategy and goal routes (024), watchlist tests | none | none |
| Market data and news | 041 | Freshness checks | Data keys present (Alpha Vantage, Finnhub) | none |
| Alerts | 042 | Create, evaluate, deliver, history tests | Discord webhooks set on staging | none |
| Referrals, memberships, subscriptions | 043 | Entitlement tests | G9 PayPal sandbox | `FEATURE_MEMBERSHIP_PURCHASES`, `FEATURE_MEMBERSHIP_SUBSCRIPTIONS` (monthly auto-renew; also needs `PAYPAL_WEBHOOK_ID` and `PAYPAL_PLAN_ID_<PLAN>`) |
| Support and notifications | 044 | Ticket and email tests | G12 Postmark approval | none |
| Privacy export and erasure | 045 | Export and erase tests | G8 retention policy sign-off | none |
| Exchange orders and balances | 046 | Order book and balance reconciliation are still to build (CI3 views removed in #713) | G9: exchange provider keys, once one is chosen | `FEATURE_AUCTIONS` and any exchange trading switch |
| Solana wallets and transactions | 047 | Dry-run tests on devnet | G9: `SOLANA_RPC_PRIMARY` devnet endpoint; G6 notice | `FEATURE_SOLANA_TRADING`, `SOLANA_ALLOW_MAINNET_BROADCAST`, `SOLANA_ALLOW_MAINNET_MINT`, `SOLANA_ALLOW_TRANSACTION_EXECUTION` |
| Bitcoin and DigiByte | 048 | Address and balance tests against testnet | G9: testnet node or RPC for `app/Config/DigiByte.php`; G6 notice | none yet; add one before any send path goes live |
| Projects and CoinVault | 049 | Contribution HMAC and payout approval tests | Partner client keys for CoinVault | `FEATURE_PROJECT_INVESTING` |
| Predictions and forecasts | 050 | Presentation and disclaimer tests | G8 wording | `FEATURE_PREDICTIONS` |
| Tax workflows | 051 | Calculation tests and disclaimers | G8 counsel sign-off | none |
| PropFirms | 052 | Route and view certification | none known | none |
| MDIT | 053 | On-ramp webhook signature tests | G9: on-ramp provider sandbox | treat on-ramp as money: add a switch before launch |
| Community, chat, advisor, search | 054 | Moderation and privacy tests | G8 if chat stores personal data | none |
| eSports | (054) | Webhook and settlement dry-run tests | G9: `ESPORTS_WEBHOOK_SECRET` | `ESPORTS_ENABLED`, `ESPORTS_DRY_RUN` stays on |
| Mobile app and SDK | 065, 066 | Contract tests for the API they use | Tim decides whether the app store release is part of launch day | none |

Order of work: W3 core journeys (032-045), then W4 domains (046-054), then
065/066. Each domain lands as its own PR, certified on staging before prod.

## Agent work queue (no gate needed)

1. 027/028: move the 17 in-controller checks onto route filters; CSRF method audit for GET routes that mutate.
2. 022-026: shrink `tests/baseline/route-handler-gaps.txt` (188 routes whose handler is missing).
3. 030: add nonces to inline scripts so CSP can leave report-only mode.
4. 029: RBAC test for every `admin/*` and `Management/*` route.
5. 032-054: certify every domain in the launch-scope table, in that order.
6. 008 / 009: triage the Dependabot and older AIOps PRs.
7. 061-063: risk-based coverage, cron inventory, SLO signals.
