## Interactive Discord Commands (Discord → CI4)

This guide defines how Discord users can query MyMI Wallet (CI4) through slash commands, how to link a Discord identity to a CI4 account, and which existing APIs to leverage. It now includes channel/webhook setup, message-triggered `$TICKER` lookups, membership-based access control, and the CI4 routes needed to go live immediately.

## Existing Discord infrastructure

- **Controller:** `APIs\DiscordController` currently queues and broadcasts templated messages, handles cron-gated queue processing, and exposes health/coalesce helpers; reuse this class for interaction handlers instead of creating a new controller.【F:app/Modules/APIs/Controllers/DiscordController.php†L1-L94】
- **Library:** `MyMIDiscord` manages queueing, template rendering, sanitization, and digest/coalesce logic that should be reused for outbound Discord messages and follow-up edits.【F:app/Libraries/MyMIDiscord.php†L1-L200】
- **Model/templates:** `DiscordModel` (referenced by `MyMIDiscord`) already loads templates, queue rows, and channel subscriptions—plan to extend, not replace, when adding interaction-driven payloads.
- **Routes today:** No interaction routes are registered yet; new routes must be added under the existing `/API` group while following the same naming/namespace patterns described below.

## Existing social linking

- **Route & controller:** `/Account/Social-Media` is already defined and requires login, pointing to `DashboardController::SocialMedia`.【F:app/Config/Routes.php†L144-L165】【F:app/Modules/User/Controllers/DashboardController.php†L1169-L1174】
- **View:** The Social page is currently an “under construction” view with placeholder Facebook/Google buttons; no Discord provider UI exists yet, so Discord linking should add a lightweight panel here rather than a new page.【F:app/Modules/User/Views/Dashboard/Account/Social.php†L1-L55】
- **Data model:** No Discord-specific social table is present in the codebase; plan to extend any existing social-auth tables if discovered later, or introduce `bf_users_discord_links` as a follow-up migration (see Implementation Checklist) with `provider='discord'`, `external_id`, and `username` fields.

## Account Linking Flow

1. **User triggers `/mymi link` in Discord.** The bot generates a short-lived token and returns a URL such as `https://www.mymiwallet.com/index.php/Account/Social-Media?source=discord&code=<token>`.
2. **User signs in on the Social Media page.** The route `/Account/Social-Media` is already defined for authenticated users and hosts the linking screen.【F:app/Config/Routes.php†L144-L165】【F:app/Modules/User/Controllers/DashboardController.php†L1169-L1174】
3. **CI4 validates and stores the mapping.** Use either a new `bf_users_discord_links` table (columns: `id`, `user_id`, `discord_user_id`, `discord_username`, `link_token`, `created_at`, `updated_at`) or extend any existing social-account table with `provider='discord'` if available.
4. **Success confirmation.** After login, the page confirms that the Discord user is bound to the CI4 user account; future commands resolve `discord_user_id → user_id`.

### Linking endpoint sketch

- **Route:** `GET /Account/Social-Media?source=discord&code=<token>` (already routed to `DashboardController::SocialMedia`).【F:app/Config/Routes.php†L144-L165】
- **Token validation:** Create a lightweight model that validates the token, ensures it has not expired, and stores the mapping. Prefer reusing any shared token model; otherwise, add `DiscordLinkTokenModel` as a follow-up.
- **Authentication:** Requires the user to be signed in; otherwise redirect to login, then back to the Social Media page to complete linking.

## CI4 webhook and interaction endpoints

Wire these routes inside the existing `/API` group (matching the Alerts/Management/Investments style) to receive Discord traffic and drive outbound webhooks:

- **Interactions:** `$routes->post('API/Discord/interactions', 'APIs\DiscordController::handleInteraction');` — verifies signatures, dispatches slash commands, and returns JSON interaction responses. Rely on Discord signature verification instead of the `cronKey` filter used by Management routes.
- **Message create events (for `$TICKER`):** If using the Gateway, subscribe to `MESSAGE_CONTENT` intent and POST events to `API/Discord/interactions` (reuse handler) or a thin endpoint like `API/Discord/messageHook` that sanitizes content, extracts `$TICKER`, and calls the same service layer as the slash command.
- **Webhook delivery helper (optional):** `$routes->post('API/Discord/webhook', 'APIs\DiscordController::webhookProxy');` — accepts CI4-side payloads and relays to a configured Discord webhook URL (use for scheduled alerts/marketing posts).

`APIs\DiscordController` should reuse `DiscordModel`/`MyMIDiscord` for outbound posts, but add request verification for inbound Discord signatures and guild-level allowlists.【F:app/Modules/APIs/Controllers/DiscordController.php†L1-L94】

## Discord server & channel configuration

1. **Create channels & webhooks**
   - `#mymi-alerts` — create a webhook (copy URL into CI4 secrets) for automated trade alerts.
   - `#mymi-news` — webhook for news/marketing blasts.
   - `#mymi-earnings` — webhook for calendar summaries.
   - `#mymi-commands` — restrict to members; default slash-command channel.
   - `#mymi-support` — for membership/role issues; bot posts linking instructions.

2. **Roles tied to memberships**
   - Create Discord roles (e.g., `Free`, `Starter`, `Pro`, `Enterprise`). Map them to CI4 membership levels (e.g., `bf_users.membership_id` or subscription plans). Maintain a JSON/array map in CI4 (e.g., `config('Discord')->rolePlanMap`).
   - The interaction handler enforces access by checking the linked user’s membership status (active/expired) before serving paid endpoints (portfolio, advanced alerts).

3. **Bot permissions and intents**
   - **Scopes:** `bot`, `applications.commands`.
   - **Bot permissions:** Send Messages, Embed Links, Attach Files, Use Slash Commands, Manage Roles (if performing auto role-sync), Read Message History.
   - **Gateway intents:** `GUILD_MEMBERS` (for role sync), `MESSAGE_CONTENT` (for `$TICKER` plain-text triggers). Avoid DM intents unless needed.

4. **Automation bots**
   - Install the MyMI bot into the server with the OAuth URL generated from Client ID + required scopes/permissions.
   - Configure per-channel webhooks and store the URLs in CI4 env/secret management (never commit URLs).

## Existing CI4 APIs to reuse

### Alerts (trade alerts, history, earnings context)
- **Route:** `GET|POST /API/Alerts/getFilteredAlerts`
- **Controller:** `AlertsController::getFilteredAlerts()` gathers DataTables-style filters (`timeRange`, search query `q`, category, pagination, etc.) and returns alert rows plus totals.【F:app/Modules/APIs/Controllers/AlertsController.php†L1128-L1249】
- **Auth:** No explicit auth guard; apply Discord-side verification and, if user-specific data is requested, enforce an authenticated/linked user in the interaction handler.

### Management (news, marketing, system status)
- **News & marketing content:** `GET /API/Management/getNews` returns marketing/news alerts assembled by `MarketingModel` for broadcast or summaries.【F:app/Modules/APIs/Controllers/ManagementController.php†L900-L939】 Routes are under the `/API/Management` group (protected by the `cronKey` filter).【F:app/Config/Routes.php†L176-L208】
- **Assets/support/referrals:** `getAssets`, `getSupport`, and `getReferrals` are available in the same group for status-style dashboards.【F:app/Modules/APIs/Controllers/ManagementController.php†L900-L939】
- **Earnings calendar:** `getEarningsCalendar($apikey, $horizon)` queries Alpha Vantage for upcoming earnings windows and returns parsed CSV data.【F:app/Modules/APIs/Controllers/ManagementController.php†L624-L652】

- **Portfolio summary:** `fetchActiveTrades()` returns the authenticated user’s portfolio/active trades via `MyMIInvestments::getUserPortfolio` and fails if not logged in.【F:app/Modules/APIs/Controllers/InvestmentsController.php†L96-L131】
- **Symbol search:** `GET /API/Investments/searchTickers?query=...&limit=10` searches local tickers and optionally Alpha Vantage, returning symbol/name/exchange metadata with caching.【F:app/Modules/APIs/Controllers/InvestmentsController.php†L220-L369】
- **Routes:** The `/API/Investments` group exposes watchlist endpoints (`getInvestmentData`, `userWatchlist`, `addNewTradeToWatchlist`, etc.) for Discord portfolio/watchlist commands.【F:app/Config/Routes.php†L509-L527】 Ensure auth checks are added when exposing user data.

### Existing Discord broadcast plumbing (reuse for interactions)

- `DiscordController::broadcast`, `processQueue`, `coalesceNow`, and `health` already dispatch templated messages to Discord webhooks using `MyMIDiscord` and `DiscordModel`; interaction handlers should build on this pipeline rather than reimplementing outbound transport.【F:app/Modules/APIs/Controllers/DiscordController.php†L18-L94】

### Discord broadcast plumbing (reuse for interactions)
- `DiscordController::broadcast` and queue processing already dispatch templated messages to Discord webhooks using `MyMIDiscord` and `DiscordModel`. Extend to accept interaction payloads and respond with Discord interaction JSON after verifying signatures.【F:app/Modules/APIs/Controllers/DiscordController.php†L15-L94】

## Target architecture (Discord → CI4)

1. **Discord application & bot**
   - Create a Discord application (e.g., “MyMI Wallet”). Add a bot user and record the **Bot Token**, **Public Key**, **Client ID/Secret**.
   - Set the **Interactions Endpoint URL** to `https://www.mymiwallet.com/index.php/API/Discord/interactions`.
   - Prefer slash commands to avoid the message-content intent; only enable `SERVER MEMBERS` intent if guild member lookups are required.

2. **CI4 interaction endpoint**
   - Add a route such as `$routes->post('API/Discord/interactions', 'APIs\DiscordController::handleInteraction');` inside the API group.
   - Responsibilities:
     - Verify Discord signatures (public key).
     - Parse the command name and options from the interaction payload.
     - Resolve `discord_user_id` → CI4 `user_id` via the linking table.
     - Delegate to existing APIs (Alerts, Investments, Management) and format a compact JSON response.
     - Return errors as ephemeral messages with guidance (e.g., “Link your account via /mymi link”).

3. **Secure token/link model**
   - Use short-lived tokens for `/mymi link` responses. Store pending tokens with Discord user metadata to prevent impersonation.
   - When the Social Media page receives a valid token, persist the mapping and mark it consumed.

4. **Slash command registration**
   - Register commands via Discord’s API or a helper script (e.g., `php spark discord:registerCommands`).
   - Include the interaction endpoint URL, scopes (`applications.commands`), and bot permissions when generating the OAuth URL for guild installation.

## Command catalog

| Command | Purpose | CI4 endpoint(s) | Example response | Notes |
| --- | --- | --- | --- | --- |
| `/mymi link` | Start account linking and return Social-Media URL with token. | Proposed `API/Discord/createLinkToken` to generate token; landing at `/Account/Social-Media`. | Ephemeral message with link button. | Ensure token expiration and one-time use. |
| `/mymi alerts [timeRange] [symbol]` | Fetch latest alerts, optionally filtered. | `/API/Alerts/getFilteredAlerts` with `timeRange` (today, yesterday, last_7d), optional `q` or `category` for symbol filters. | Top 3–5 alerts showing ticker, category, entry/target prices, % change, and a “View alert” link. | Cache aggregated/global queries; paginate via “show more” buttons. |
| `/mymi portfolio [summary|positions]` | Return linked user’s portfolio snapshot. | `/API/Investments/fetchActiveTrades` (auth required). | Total value, day/week P&L, top holdings. | If not linked, respond with link prompt. |
| `/mymi watchlist [symbol]` | Show watchlist items or details for one symbol. | `/API/Investments/userWatchlist/{userId}` or `/API/Investments/getInvestmentData/{userId}` (enforce linked user). | List of watchlist tickers with latest price/targets; if symbol provided, show recent notes/targets. | Consider a lightweight cache for price lookups. |
| `/mymi earnings [today|this_week]` | Pull upcoming earnings. | `ManagementController::getEarningsCalendar($apikey, $horizon)` with a short horizon. | Symbols with date/time (BMO/AMC) and quick links to blog/calendar. | Cache API responses for the calendar horizon. |
| `/mymi news [topic]` | Summarize recent news/marketing posts. | `/API/Management/getNews` plus optional topic filter in the interaction handler. | Top 3 headlines with 1–2 line summaries and “Read more” links. | Respect `cronKey` or add an authenticated proxy endpoint for Discord. |
| `/mymi status` | Check system/data pipeline status. | `/API/Management/getAssets`, `/API/Management/getSupport`, or cron health endpoints (`runDailyAlphaVantageDataPipeline`, etc.). | Short text showing last run times, queue depth, or incident notes. | Use cached metrics; avoid heavy queries in interactions. |
| `/mymi ticker <symbol>` | Return the most recent alert for a symbol, else a TradingView chart + fundamentals/news. | `/API/Alerts/getFilteredAlerts` (filtered by symbol) → fallback to TradingView screenshot service; enrich with `/API/Investments/searchTickers` for metadata and `/API/Management/getNews` for recent headlines. | Embed with price/targets if alert exists; otherwise attach chart image + key fundamentals/news bullets. | Requires `MESSAGE_CONTENT` intent if also triggering on `$TICKER` text; ensure rate limiting. |

## `$TICKER` message trigger (alerts + TradingView fallback)

- **Intent & event flow:** Enable `MESSAGE_CONTENT` intent. The bot listens for messages matching `/\$([A-Za-z\.:-]{1,10})/`. On match, POST the event payload to `API/Discord/messageHook` (or reuse `handleInteraction` with a message-type discriminator).
- **Handler logic:**
  1. Normalize the symbol (upper-case, trim suffixes if needed).
  2. Query `/API/Alerts/getFilteredAlerts` with `q=<symbol>` sorted by newest; if found, return the latest alert summary (entry/target/stop, timestamp, P&L if available).
  3. If no alert exists, call `/API/Investments/searchTickers` to validate the symbol; if valid, request a TradingView static chart screenshot (e.g., headless Chromium hitting `https://www.tradingview.com/chart/?symbol=<SYMBOL>` or a lightweight image service) and embed it.
  4. Enrich the response with fundamentals/news via `/API/Management/getNews` filtered by symbol/company name.
  5. Apply membership gating: only paying tiers get full alert details; free tiers get a truncated preview + link to upgrade.
- **Rate limiting:** Maintain a per-channel and per-user cooldown (e.g., 1 request/5 seconds) to avoid hitting Discord rate limits and TradingView fetch limits.

## Membership and role sync (Discord ↔ CI4)

- **Mapping:** Maintain a map of CI4 plans → Discord roles (e.g., `Pro` → `role_id_123`). Store in `config('Discord')->rolePlanMap` or an env JSON string.
- **Sync job:** Nightly CRON or webhook-triggered job calls Discord’s `guilds/{guild.id}/members/{user.id}` endpoints to add/remove roles based on `bf_users` subscription status (paid, trial, past-due). Use `DISCORD_MYMI_AI_BOT_TOKEN` for authorization (keep `DISCORD_BOT_TOKEN` only as documented legacy fallback).
- **Access checks:** Interaction handler loads the linked CI4 user; if `membership_status` is expired/past-due, respond with an upgrade prompt and avoid returning premium data (portfolio, advanced alerts).
- **Audit:** Log role sync actions in CI4 (table `discord_role_sync_logs` or existing audit tables) to trace permission changes.

## Phase plan (reuse-first)

1. **Phase 0 – Recon:** Confirm existing Discord stack (controller/library/model/templates), current Social-Media route/view, and API endpoints listed above. Result: reuse `DiscordController` + `MyMIDiscord`, extend Social view, and lean on Alerts/Investments/Management controllers already present.
2. **Phase 1 – Routes:** Register `API/Discord/interactions` and `API/Discord/messageHook` inside the `/API` group (no `cronKey`; rely on signature verification). Keep naming/namespace consistent with existing routes.
3. **Phase 2 – Controller extensions:** Add `handleInteraction()` and `messageHook()` inside the existing `DiscordController`, delegating to private helpers that call Alerts/Investments/Management services. Handle PING with `{ "type": 1 }` immediately.
4. **Phase 3 – Linking:** Reuse `/Account/Social-Media` and update the view to surface Discord linking state; store mappings in an extended social-auth table or the proposed `bf_users_discord_links` table; reuse any shared token model if available.
5. **Phase 4 – Command dispatch:** For each command, call the existing controllers/models (no duplicated business logic). Format concise embeds and queue follow-ups through `MyMIDiscord` if needed.
6. **Phase 5 – Membership gating:** Read plan/subscription fields from existing user data to decide whether to return full data or upgrade prompts; map plans to Discord roles via config for role sync.
7. **Phase 6 – Logging & tests:** Use the existing logging pipeline (`log_message`, `DiscordModel::logEvent`) and document manual QA cases for linking, command success/failure, invalid signatures, and rate limits.

## Step-by-step setup for administrators

1. **Create the Discord application & bot**
   - In the Discord Developer Portal, create the “MyMI Wallet” application and add a Bot user.
   - Copy **Bot Token** and **Public Key** into CI4 configuration.
   - Under **OAuth2 → General**, set a redirect URI such as `https://www.mymiwallet.com/index.php/Account/Social-Media/discordCallback` if using OAuth-style flows.
   - Under **Interactions**, set the endpoint to `https://www.mymiwallet.com/index.php/API/Discord/interactions`.

2. **Configure CI4 environment**
   - Add to `.env` (or server secrets):
     - `DISCORD_MYMI_AI_BOT_TOKEN="..."`
     - `DISCORD_BOT_TOKEN="..."` (optional legacy fallback only)
     - `DISCORD_PUBLIC_KEY="..."`
     - `DISCORD_CLIENT_ID="..."`
     - `DISCORD_CLIENT_SECRET="..."`
     - `DISCORD_REDIRECT_URI="https://www.mymiwallet.com/index.php/Account/Social-Media/discordCallback"`
     - `DISCORD_WEBHOOK_ALERTS="..."`, `DISCORD_WEBHOOK_NEWS="..."`, `DISCORD_WEBHOOK_EARNINGS="..."` (channel-specific)
   - Optionally create `app/Config/Discord.php` to centralize webhook URLs, default channel keys, role maps, and the interaction public key.

3. **Implement the interaction endpoint**
   - Add a method `handleInteraction()` in `APIs\DiscordController` to:
     - Verify `X-Signature-Ed25519` and `X-Signature-Timestamp` headers.
     - Parse commands and dispatch to service methods.
     - Format Discord interaction responses (ephemeral for user-specific data).
   - Reuse `DiscordModel`/`MyMIDiscord` for queueing if long-running tasks are required.【F:app/Modules/APIs/Controllers/DiscordController.php†L15-L94】
   - Add a `messageHook()` if processing `$TICKER` messages outside slash commands; reuse the same service to avoid duplicate logic.

4. **Implement account linking**
   - Add a service to issue link tokens when `/mymi link` runs and store them in `bf_users_discord_links` (or reuse an existing social-auth table with `provider='discord'`).
   - Extend `DashboardController::SocialMedia` view to show Discord linking status and accept `source=discord&code=<token>` for confirmation.【F:app/Config/Routes.php†L144-L165】
   - On confirmation, persist `user_id`, `discord_user_id`, `discord_username`, and timestamps.

5. **Register slash commands**
   - Use Discord’s REST API (`applications/{app.id}/commands`) or a helper CLI to register:
     - `/mymi link`
     - `/mymi alerts`
     - `/mymi portfolio`
     - `/mymi watchlist`
     - `/mymi earnings`
     - `/mymi news`
     - `/mymi status`
     - `/mymi ticker`
   - Provide option definitions (e.g., `timeRange`, `symbol`, `topic`) and set default permissions. For `$TICKER` text, no command registration is needed—just the message intent.

6. **Performance, caching, and rate limits**
   - Keep responses concise (top 3–5 items) and provide “show more” buttons linking to the web app.
   - Cache global data (news, earnings, top alerts) for 1–5 minutes to share across users.
   - Respect Discord rate limits by returning a single interaction response and queueing any follow-up edits.

## Implementation checklist

- [ ] Routes added under `/API`: `Discord/interactions`, `Discord/messageHook`, optional `Discord/webhook` with signature verification noted.
- [ ] `DiscordController` extended with `handleInteraction()` (PING, signature verify, command dispatch) and `messageHook()` (shared ticker handler) using existing APIs.
- [ ] Social-Media view updated to show Discord link panel when `source=discord` and accept link tokens; login redirect preserved.
- [ ] Token storage decided: reuse shared token model if found; otherwise plan `bf_users_discord_links` + `DiscordLinkTokenModel` migration.
- [ ] Command responses reuse Alerts/Investments/Management controllers for data; membership gating enforced via existing plan fields.
- [ ] Role sync mapping defined in `config('Discord')->rolePlanMap`; cron/queue job planned for Discord role updates.

## Discord → CI4 flow summary

1. User runs a slash command or types `$TICKER` in Discord.
2. Discord POSTs an interaction/message event to CI4.
3. CI4 verifies the signature, resolves the Discord user mapping, and calls internal APIs (alerts, news, portfolio, watchlist, ticker search).
4. CI4 returns a concise JSON payload that Discord renders as an embed or ephemeral message; if a chart is needed, CI4 attaches the TradingView screenshot.
5. Optional follow-up messages can be queued via `MyMIDiscord` if longer processing is required.

By aligning Discord commands with existing CI4 routes and adding membership-aware role sync, MyMI Wallet becomes an interactive, user-driven system where Discord activity reinforces platform data flows and keeps alerts, news, portfolio insights, and ticker lookups available on demand.
