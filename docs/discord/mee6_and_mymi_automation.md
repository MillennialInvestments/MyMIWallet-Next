# MEE6 + MyMIDiscord Automation

This guide documents how MEE6 complements the in-house MyMIDiscord pipeline today and how a MyMI-branded “MEE6-style” experience can evolve for premium upsells.

## Current split of responsibilities
- **MEE6 handles:** leveling/XP, welcome messages, periodic auto-messages, and role rewards.
- **MyMIDiscord handles:** financial alerts (liquidity, momentum, trade updates), marketing/news digests, earnings posts, ops/health notifications, and targeted digests.

Use both together to keep community engagement high while Discord receives real-time financial content from MyMIDiscord.

## MEE6 configuration steps (documentation only)
1. Enable XP/Levels per channel; prioritize free channels to encourage participation.
2. Configure welcome messages that link users to [MyMI Wallet](https://www.mymiwallet.com/) and Discord linking instructions.
3. Add auto-messages in free channels highlighting:
   - Premium alert channels (#trade-alerts-tier1/2/3).
   - MyMI Wallet features: budgeting, trade alerts, news dashboards.
   - Upgrade CTAs with URLs back to the dashboard.
4. Set role rewards to mirror MyMI tiers (Free/Basic/Premium/Gold) so MyMIDiscord and future role-sync jobs have consistent IDs.

## Roadmap for a MyMI-branded “MEE6-style” layer
Planned features backed by CI4 + MyMIDiscord + DiscordModel:
- **XP/Level system** tied to MyMI profile and on-site activity.
- **Badges** for trading performance and education milestones.
- **Slash/command set** that calls MyMI APIs (e.g., `!budget`, `!alerts`, `!watchlist NVDA`).
- **Role sync + gating**: lock commands/alerts behind Discord roles mapped to paid tiers.
- **Targeted CTAs**: send upgrade prompts to active free users using engagement metrics from Python workers.

### Likely code touchpoints
- `app/Libraries/MyMIDiscord.php` + `app/Models/DiscordModel.php` for outbound posts, queueing, and logging.
- `APIs\DiscordController` (existing controller) to host slash command handlers and webhook verification.
- A future `DiscordCommandsController` or slash-command service layer for parsing/gating commands.
- Nightly role-sync job consuming `config('Discord')->rolePlanMap` and user subscription data.

### Monetization hooks
- Map MyMI plans → Discord roles → channel access (see `premium_flows_and_upsell.md`).
- Inject upgrade CTAs into free/starter channels based on engagement analytics.
- Use digest posts to recap premium wins and link directly to subscription flows.
