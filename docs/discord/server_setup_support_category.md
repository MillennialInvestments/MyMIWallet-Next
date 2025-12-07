# Discord Server Setup: Support Category as the Default Landing Zone

This guide operationalizes the **Support-first** entry path for MyMI Discord. New members land in the Support category, learn how to link their account, and see the rules for where to post content. The layout applies to both production and staging servers.

## Full channel layout (production + staging)
- **Alerts & trading**: `#trade-alerts`, `#trade-alerts-free`, `#trade-alerts-tier1`, `#trade-alerts-tier2`, `#trade-alerts-tier3`, `#alert-lifecycle`
- **News & marketing**: `#marketing-news`, `#earnings-watch`, `#daily-earnings`
- **Operations**: `#ops-status` / `#system-status`
- **Support (default landing)**: `#welcome-support` (pinned rules, onboarding, support CTA)
- **Staging**: `#staging-sandbox` (mirrors Support category rules; all staging webhooks point here)

Roles: Admin, Automation Bot (scoped to target channels), Moderator. Lock webhook/bot posting to automation channels and keep staging isolated.

## Make Support the default landing category
1) **Create category:** `Support`.
2) **Create channel:** `#welcome-support` as the first landing channel.
3) **Community onboarding:** Configure Community → Rules → Send new members to `#welcome-support`.
4) **MEE6 welcome:** In **MEE6 → Welcome**, set “Send new members to a specific channel” → `#welcome-support`.
5) **Pinned guidance:** Quick rules, how to link accounts, how to ask questions, and where to post alerts/DD/streams.

### Explicit MEE6 welcome message
```
👋 Welcome to MyMI Wallet!
1) Head to #welcome-support to see how the server works.
2) Run /mymi link to connect your MyMI Wallet account.
3) Use /mymi alerts, /mymi ticker, or $TICKER in chat to explore signals.
4) Need help? Tag @Support, visit /Support, or read How-It-Works.
```
Include links to **/mymi link**, **/mymi alerts**, `$TICKER` usage, and the Support/How-It-Works pages.

## Onboarding flow (Support-first)
- New users land in `#welcome-support` via Community Onboarding + MEE6.
- Pinned post links to `/Support/Discord` (web onboarding) and `/How-It-Works/Discord` for the full walkthrough.
- Slash commands `/mymi help` and `/mymi support` reuse the same onboarding steps via the **DiscordHelp** config and `/API/Discord/*` endpoints.

## Staging vs production
- Mirror the Support setup on the staging server (same category/channel names).
- Point all staging webhooks to `#staging-sandbox` until approved for promotion.
- Keep a staging Support welcome message so onboarding changes are tested safely before production.

## Additional Notes:
- New User redirected to #welcome
  - Determine/Set & Pin Rules & Requirements 
  - User Setup
    - How The Discord Works
    - How MyMI Wallet Works
    - Expanding/Listing & Describe MyMI Commands Definitions
      - Registering an account on MyMI Wallet
      - Linking your wallets to MyMI Wallet
      - Getting your Budget & Forecast Summary in Discord from MyMI Wallet
      - Track & Managing Trades from Discord
      - Search Assets/Cryptos/Stocks
      - Community Sharing & Connecting
      - Due Diligence Tracking
      - MyMI Projects Search / Discovery
      - Asset Creator / Management
      - Management: Marketing Automation
      - Management: Auto-Cleanup Processes & Data
      - How It Works: MyMI Budgeting -> Investments -> Assets -> Retirement
      - Trade Request: Trade Analysis (Charts) & Fundamentals (Text Summary based on data - Fundamental generator)
      - Financial/Economic News Requests
      - Support
- Membership Tiered Access Setup - Premium Access Memberships
- Discord Setup: Twitch/Youtube Live Streaming
- Where to share what?
- User Badges by completing the how-it-works listed above
- Instructions for Codex to build all the views and routes to accommodate for everything listed above