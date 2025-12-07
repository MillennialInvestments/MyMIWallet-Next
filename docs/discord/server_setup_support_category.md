# Discord Server Setup: Support Category as the Default Landing Zone

This guide explains the recommended server layout and how to make **Support** the first stop for new members.

## Discord server layout (recap)
- **Channels (production + staging):**
  - `#trade-alerts`, `#trade-alerts-free`, `#trade-alerts-tier1/2/3`
  - `#alert-lifecycle`
  - `#marketing-news`
  - `#earnings-watch` and `#daily-earnings`
  - `#ops-status` / `#system-status`
  - `#staging-sandbox`
- **Roles:** Admin, Automation Bot (scoped to target channels), Moderator.
- **Permissions:** Lock webhook/bot posting to automation channels; keep staging isolated.
- **Webhooks:** Create per-channel webhooks and store URLs securely (ENV/1Password). Use staging webhooks for testing.

## Make Support the default category
1. **Create category:** `Support`.
2. **Create channel:** `#welcome-support` (or your chosen welcome channel name).
3. **Channel topic & rules:** Pin quick rules, how to link accounts, and where to ask questions.
4. **Default landing channel:** Set server rules/Community onboarding to point new members to `#welcome-support`.
5. **MEE6 configuration:** In MEE6 → Welcome, set **Send new members to a specific channel** → `#welcome-support`.
6. **Auto-messages:** Enable a welcome message that includes:
   - How to run `/mymi link` to connect accounts.
   - How to request help (ping moderators or open a thread).
   - How to start using MyMI commands.

### Sample MEE6 welcome message template
```
👋 Welcome to MyMI Wallet!
1) Visit #welcome-support to read the rules.
2) Run /mymi link to connect your MyMI account.
3) Try /mymi alerts or $TICKER to see live data.
Need help? Tag @Support and we’ll respond.
```

## Automations that help new users
- **MEE6 welcome:** Directs members to `#welcome-support` with the template above.
- **Link prompt:** Discord bot replies to `/mymi link` with the secure token and guidance.
- **Onboarding guidance:** Pinned messages in `#welcome-support` describe how to create a MyMI Wallet account, link it, and find the right channels.

## Staging vs. production
- Mirror the Support setup in a staging server/category for testing onboarding changes.
- Keep staging webhooks pointed to `#staging-sandbox` until messages are approved.
