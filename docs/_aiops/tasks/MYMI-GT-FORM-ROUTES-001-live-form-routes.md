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
