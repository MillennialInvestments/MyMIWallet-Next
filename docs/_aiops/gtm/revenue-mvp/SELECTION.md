# Revenue MVP Selection (base SHA 80b9439e7caa64451e4a4e207d99cb5278e2e4c4)

REVENUE_MVP_SELECTED=MyMI Trade Alerts (canonical feature key `alerts.trade_alerts`, label "Trade alerts")

Method: cheap funnel (git/rg/route + config summaries). Only the Alerts, entitlement, membership and purchase surfaces were opened. Candidates 2 and 3 were NOT deeply inspected; their scores are low-confidence.

| Criterion | 1 Trade Alerts | 2 Budget forecasting/analysis | 3 Wallet/Solana/CoinVault |
|---|---|---|---|
| Existing implementation | Large: AlertsModel, AlertsAPIController (scanner, signals, processTradeAlerts, email/Discord delivery), user AlertsController, public previewAlert page, ops job `alerts.process` | Premium-catalog entries tier1 | Large but custody/crypto |
| One-sentence value | Yes | Moderate | Weak |
| Recurring value | Yes (new alerts/data) | Needs user data entry/bank link | Unclear |
| Data value | Market data + news + signals pipeline | User-supplied | n/a |
| Demoable pre-payment | Yes: public `/Alerts/Preview/{symbol}` and `/Preview/Alert/{symbol}` | Needs login and data | No |
| Entitlement readiness | Already gated: `premium_guard('alerts.trade_alerts')` at AlertsController index() and trades(); catalog min_tier tier1, trial true | Gated | Not gated |
| Dependencies | Payment + subscription write path + digest | Plaid/bank | Legal, custody |
| Operating cost | Market-data APIs (AlphaVantage/TwelveData/Polygon/MarketAux) | Low | High |
| Legal risk | Medium: manageable with "informational, not advice" framing | Low | High |

WHY_THIS_ONE: only candidate with a public demo surface, an enforced entitlement gate, and a continuous data pipeline already present.
WHY_NOT_THE_OTHER_TWO: (2) value depends on each user entering or linking data, so the demo is weak; (3) money-transmission/crypto compliance exposure and no gate.

MINIMUM_SELLABLE_SCOPE: public landing + plans -> register -> paid checkout (test mode first) -> subscription row -> `alerts.trade_alerts` access -> alerts feed with freshness timestamp -> account/cancel -> legal links + support.
DEFERRED_SCOPE: Discord/SMS/push delivery tiers, broker execution, AI media/social generation, referrals, tier differentiation, CoinVault, Solana, budgeting.

## Critical findings (evidence at 80b9439)
1. NO REAL PAYMENT PROCESSOR. `composer.json` has no stripe/braintree/paypal package; `APISettings::$stripApiKey` is empty (typo'd name); PayPal fields empty. `Pro.php` membership view displays a "BETA CREDIT CARD" (`SiteSettings::$betaCardNumber`) to the user.
2. `WalletsController::purchase()` (line ~2073) reads `membership_fee` from POST with default 100: client-controlled price. Must be replaced by server-side plan prices.
3. No code in WalletsController writes `bf_users_subscriptions`. Only AlertsModel, UserModel and PremiumEntitlementService reference it (read paths found; writer UNKNOWN). Treat membership creation as MISSING until proven.
4. Entitlement read path is solid: `PremiumEntitlementService::resolve()` maps starter/basic->tier1, pro->tier2, premium/gold->tier3.
5. Every paid plan satisfies tier1, so the four prices do not differentiate Trade Alerts today.
6. `tests/feature/AlertsRoutesTest.php` covers guest redirects and API reachability but not entitlement allow/deny.
7. Plan prices (SiteSettings): Starter 9.99, Basic 29.99, Pro 49.99, Premium 99.99 per month; NEWYEARS promo hard-codes -7/-20/-35/-70 in memberships view. PRICE_CONFLICT_FOUND: none among inspected files, but prices may be overridden elsewhere (DB/env) and the Pro view text says "$<fee>/month" while the checkout reads POSTed fee. Owner must confirm which tiers to sell for Alerts.
8. GTM-001/002 (exposed tracked credentials, unsafe tracked runtime config) are real prerequisites for adding payment secrets safely. Check live AIOps state; /apps/TBI was not reachable from this container, and `ai` was not installed here.
