# MYMI-GT-FORM-ROUTES-001: live broken form routes

Follows MYMI-GT-FORM-HARNESS-001 and MYMI-GT-FORM-LEDGER-001 (PR #712).

## Detection added

`php spark aiops:form:test --scan-all` now also fails an entry when:

| reason | meaning |
|---|---|
| `handler_missing` | the route exists but its controller method does not |
| `relative_url` | the URL has no leading `/`, so it resolves against the current page and breaks on nested pages |
| `token_only_route` | the route needs `apiToken` or `cronKey`, which a browser session never has |

JS calls on `//` comment lines are no longer counted (they were false positives).
`RequestMethodComparisonRatchetTest` fails on any `getMethod() === 'post'` style comparison
(CI4.5+ returns `POST`, so those branches never ran).

## Result

| | before (c5bb395, new checks) | after |
|---|---|---|
| Live FAILs (views that are rendered) | 100 | 39 |
| All FAILs | 171 | 108 (69 are in the 103 unreferenced views) |
| Gap baseline lines | 142 | 107 |

## What was fixed

* POST branch never ran (lower-case `getMethod()` compare): 11 controllers, including
  Drip campaign create, Marketing, Tax config, Institutes, Investments, Projects, Exchange,
  Solana and the alerts API.
* 22 relative URLs given a leading `/` or `site_url()`.
* CSRF: `public/assets/js/csrf-shim.js`, loaded by both theme headers, adds `X-CSRF-TOKEN`
  to same-origin non-GET `fetch()` and jQuery calls that forgot it. Never sent cross-origin.
* Admin pages calling token-only `API/*` routes from the browser now use session routes
  under `Management/...` (role:admin,team + CSRF) that point at the same methods:
  Marketing (Kimi, post media, insights, posting plan, compose, campaign links/fields,
  summaries, threads, digest, scraper, email reprocess, large/manual content, Twitter),
  Alerts (add trade alert, TradingView submit, weekly top performance, advisor generate,
  full metrics, signal preview), Users (ban, spam check), Projects (add, quick intake),
  Drip (create action, template preview), Chat usage settings/reset.
* Admin pages that existed but had no route: `Management/AuthHealth` (+ run auth smoke),
  `Management/EmailOutbox` (+ send test). Both `permission:admin.access`.
* New handlers:
  * `DashboardController::updateProfile` + `ProfileUpdateService`: own row only,
    whitelisted fields, never email/username/password/KYC/SSN.
  * `SupportController::submitRequest` (`POST Support/Manager`) and
    `submitArticleFeedback` (`POST Support/Feedback`) + `SupportRequestService`: rows in
    `bf_support_requests` (status Pending, the table the admin support views read). User id
    from the session only. Nothing is emailed.
  * `NewsletterController::subscribe` for the landing page and blog sign-up forms:
    `bf_users_subscribers` only, no email sent, duplicate answers like success.
  * `MarketingAPIController::savePostMedia`.
* Safety fixes found on the way:
  * Drip `previewTemplate` used the posted name in a view path (path traversal); now
    limited to `[A-Za-z0-9_-]`.
  * `getPendingActivationUsers()` included soft-deleted spam accounts; now excludes them.
  * `runKeywordBackfillBatch` limit was always 0 (`(int) $x ?? 10` precedence).
  * Dead keystroke search that requested `/search` (404) on every key press removed.

## Left on purpose (39 live FAILs) and why

**Money, crypto or payments (owner authority needed):**
Exchange buy/sell order managers and Account-Information; Solana swap, create token,
purchase, sell, edit wallet; Auctions bid (MyMIGold); Predictions place order (also the
API route has no auth filter); Projects commit/invest/sell legacy forms; MyMI Gold
purchase (x2); Memberships PurchaseCallback; Wallets import trades.

**Sends email or runs jobs at scale (owner authority needed):**
`massResendActivationEmails` (mass mail; query now excludes deleted accounts but the
route stays token-only), `Management/runCronManually` (runs the whole cron, including
drip email, which is off on purpose).

**Needs storage that does not exist (schema change = DB authority):**
Budget settings save, Retirement plan save, Advisor "save to notes", Economic data
fetch/search/like, Projects discussion comments.

**Never built / placeholders:** Investments `path/to/...` stubs (user_fields), watchlist
symbol refresh with no trade type, Marketing `addContent`, Exchanges `solana/market-refresh`.

**Unrouted modules (decide whether to expose):** Docs module (would publish `ROOTPATH/docs`),
Search module JSON API.

**CodeIgniter 3 code that cannot run on CI4:** Referral Program apply / new affiliate,
User Support Feedback (`$this->config->item`, `Template::block`).

## Second pass (2026-11-15, after the owner said "fix these too")

Live FAILs 39 -> 0 (all FAILs 108 -> 64; the rest are in views no route renders).
Gap baseline 107 -> 65 lines. Route handler baseline 186 -> 181 (Auctions fixed).

### Switches (Config\Features, all OFF by default)

The `feature` route filter was an empty stub. It now reads `Config\Features` and
returns 503 (JSON for AJAX) before any controller code runs. Turn one on by
setting it to `1` in the server `.env`:

| Switch | Covers |
|---|---|
| `FEATURE_SOLANA_TRADING` | Exchange/Solana Swap, Create-Token, Purchase, Sell (controller network guard still applies) |
| `FEATURE_AUCTIONS` | Auctions Create and Bid |
| `FEATURE_PROJECT_INVESTING` | Projects SubmitCommit, SubmitInvest, SubmitSell |
| `FEATURE_MYMIGOLD_PURCHASES` | Wallets/MyMIGPayPalCallback, and whether PayPal buttons for Gold are shown |
| `FEATURE_MEMBERSHIP_PURCHASES` | Memberships/PurchaseCallback, and whether the membership PayPal button is shown |
| `FEATURE_PREDICTIONS` (existed) | Predictions order and market routes |

With a purchase switch off, the PayPal button is not shown, so nobody can pay
for something we cannot record.

### Security fixes found on the way

* **MyMI Gold callback credited unverified purchases.** `handleMyMIGPayPalCallback`
  wrote a "completed" Gold purchase using the user id, amount and order id from the
  browser (GET or POST). Now: POST only, session user, switch, the order is fetched
  from PayPal server to server (`PayPalOrderVerifier`, needs `PAYPAL_REST_CLIENT_ID`,
  `PAYPAL_REST_SECRET`, optional `PAYPAL_REST_MODE=sandbox`), each order id is used
  once (`bf_payment_claims`), and Gold is computed from PayPal's captured amount.
  Without the PayPal REST keys every claim is stored as `unverified_not_configured`
  and nothing is credited.
* Predictions API: market create/settle, liquidity, and orders had no auth (several
  were GET). Admin routes now need `apiAdmin`; orders need login; all need the switch.
* Solana wallet disconnect could disconnect any user's wallet by id; now owner only.
* Referral applications were saved as `active = 1` from a hidden field; now pending
  review, and activation is admin only (POST).

### What each former FAIL does now

* CI3 rewrites: Referral apply (`Referral-Program/Apply`, `bf_users_referral_program`),
  admin review (`Referral-Program/Applications`, `Activate/{id}`), Support feedback
  (posts to `Support/Manager`).
* New storage (migrations, owner runs them): `2026-11-15-000200_CreateUsersReferralProgram`,
  `2026-11-15-000300_CreateFormFeatureTables` (`bf_user_preferences`,
  `bf_discord_ai_notes` if missing, `bf_project_comments`, `bf_project_sale_requests`,
  `bf_payment_claims`). Budget settings, retirement goals, liked economic series use
  `bf_user_preferences`; Advisor "Save to Notes" uses `bf_discord_ai_notes`. Until the
  migrations run these return a clear "not available yet" instead of an error.
* Economic data: `Investments/fetchEconomicData`, `searchEconomicData` (FRED, read only,
  cached 1 h), `likeEconomicData`.
* Retirement page: the save script had no form; a goals form was added.
* Projects: SubmitCommit/SubmitInvest record a commitment through the existing
  `MyMIProjects::recordCommitment`; SubmitSell records a pending sale request;
  AddComment stores a comment; user `Projects/Add` stores a `pending` proposal.
* MyMI Gold order form rebuilt on the shared PayPal purchase fields (it called
  CI3 `Template::block`, a fatal error).
* Removed dead CodeIgniter 3 screens that no route renders: Exchange Buy/Sell/
  Account_Information (+ field partials), Wallets Purchase_Gold (+ partial),
  Link_Account Import-Trades/Upload-Trades. The Exchange order book and trade import
  are features to build, not forms to fix.
* Admin: `massResendActivationEmails` accepts POST (admin session) with a confirm
  prompt; "Run CRON Now" posts to `Management/runCronManually` (admin only) with a
  confirm prompt.

### Before turning a switch on

1. Run the two migrations with `scripts/ops/db/run-migrations.php` (never plain
   `spark migrate` in production).
2. For purchases: add the PayPal REST keys and test one sandbox order on staging.
3. Solana: the controller's devnet/mainnet guard and the disabled private-key path
   still apply; swap stays non-functional until signing is designed.
